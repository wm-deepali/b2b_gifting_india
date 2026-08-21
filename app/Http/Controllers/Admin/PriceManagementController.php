<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\PriceHistory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PriceManagementController extends Controller
{
    /**
     * Columns this feature is allowed to read/write — kept in one place
     * so export, import, and the update() diff logic never drift apart.
     */
    protected array $priceColumns = [
        'name', 'vendor_name', 'mrp', 'discount', 'discount_type', 'price', 'landing_price',
    ];

    public function index(Request $request)
    {
        $products = Product::with(['categories', 'subcategories'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('vendor_name', 'like', '%' . $request->search . '%')
                    ->orWhere('sku', 'like', '%' . $request->search . '%')
                    ->orWhere('product_code', 'like', '%' . $request->search . '%');
            })
            ->when($request->category_id, function ($query) use ($request) {
                $query->whereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category_id);
                });
            })
            ->when($request->subcategory_id, function ($query) use ($request) {
                $query->whereHas('subcategories', function ($q) use ($request) {
                    $q->where('categories.id', $request->subcategory_id);
                });
            })
            ->orderBy('name')
            ->paginate(20)
            ->withQueryString();

        $categories = Category::whereNull('parent_id')->orderBy('name')->get(['id', 'name']);
        $subcategories = Category::whereNotNull('parent_id')->orderBy('name')->get(['id', 'name']);

        $stats = [
            'total' => Product::count(),
            'no_discount' => Product::where(function ($q) {
                $q->whereNull('discount')->orWhere('discount', 0);
            })->count(),
            'no_landing_price' => Product::whereNull('landing_price')->count(),
        ];

        return view('admin.price-management.index', compact('products', 'categories', 'subcategories', 'stats'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'vendor_name' => 'nullable|string|max:255',
            'mrp' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:amount,percentage',
            'price' => 'required|numeric|min:0',
            'landing_price' => 'nullable|numeric|min:0',
        ]);

        $old = $this->snapshot($product);

        $product->update($validated);

        $this->logIfChanged($product, $old);

        return response()->json([
            'success' => true,
            'name' => $product->name,
            'vendor_name' => $product->vendor_name,
            'mrp' => $product->mrp,
            'discount' => $product->discount,
            'price' => $product->price,
            'landing_price' => $product->landing_price,
        ]);
    }

    /**
     * Exports exactly the columns shown on the Price Management grid,
     * respecting whatever search/category filters are currently applied —
     * so "export what I'm looking at" works for filtered views too.
     */
    public function export(Request $request)
    {
        $products = Product::query()
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('vendor_name', 'like', '%' . $request->search . '%')
                    ->orWhere('sku', 'like', '%' . $request->search . '%')
                    ->orWhere('product_code', 'like', '%' . $request->search . '%');
            })
            ->when($request->category_id, function ($query) use ($request) {
                $query->whereHas('categories', function ($q) use ($request) {
                    $q->where('categories.id', $request->category_id);
                });
            })
            ->when($request->subcategory_id, function ($query) use ($request) {
                $query->whereHas('subcategories', function ($q) use ($request) {
                    $q->where('categories.id', $request->subcategory_id);
                });
            })
            ->orderBy('name')
            ->get(array_merge(['id'], $this->priceColumns));

        $headers = array_merge(['id'], $this->priceColumns);

        $response = new StreamedResponse(function () use ($products, $headers) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, $headers);

            foreach ($products as $product) {
                $row = [$product->id];
                foreach ($this->priceColumns as $col) {
                    $row[] = $product->{$col};
                }
                fputcsv($handle, $row);
            }

            fclose($handle);
        });

        $response->headers->set('Content-Type', 'text/csv');
        $response->headers->set(
            'Content-Disposition',
            'attachment; filename=price_management_' . now()->format('Y-m-d_His') . '.csv'
        );

        return $response;
    }

    /**
     * Bulk-updates ONLY existing products (matched by id) and ONLY the
     * price-management columns. Never creates a product. Blank cells in a
     * row are left untouched so partial-column re-uploads are safe.
     */
    public function importStore(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:csv,txt|max:10240',
        ]);

        $handle = fopen($request->file('file')->getRealPath(), 'r');
        $header = fgetcsv($handle);

        if (!$header) {
            fclose($handle);
            return back()->with('error', 'The uploaded file is empty.');
        }

        $header = array_map('trim', $header);

        if (!in_array('id', $header)) {
            fclose($handle);
            return back()->with('error', 'CSV must contain an "id" column — export the file first to get the right format.');
        }

        $updated = 0;
        $skipped = 0;
        $skippedRows = [];

        while (($row = fgetcsv($handle)) !== false) {
            // Guard against short/blank trailing rows.
            if (count($row) < count($header)) {
                $row = array_pad($row, count($header), null);
            }

            $data = array_combine($header, $row);

            if (empty($data['id']) || !is_numeric($data['id'])) {
                $skipped++;
                continue;
            }

            $product = Product::find($data['id']);

            if (!$product) {
                $skipped++;
                $skippedRows[] = $data['id'] . ' (not found)';
                continue;
            }

            $updates = [];

            foreach ($this->priceColumns as $col) {
                if (!array_key_exists($col, $data) || $data[$col] === null || $data[$col] === '') {
                    continue; // blank cell = leave this column untouched
                }

                if (in_array($col, ['mrp', 'discount', 'price', 'landing_price']) && !is_numeric($data[$col])) {
                    continue; // silently skip bad numeric cells rather than fail the whole row
                }

                if ($col === 'discount_type' && !in_array($data[$col], ['amount', 'percentage'])) {
                    continue;
                }

                $updates[$col] = $data[$col];
            }

            if (empty($updates)) {
                $skipped++;
                continue;
            }

            $old = $this->snapshot($product);

            $product->update($updates);

            $this->logIfChanged($product, $old);

            $updated++;
        }

        fclose($handle);

        return back()->with([
            'success' => "Import completed. Updated: {$updated}, Skipped: {$skipped}.",
            'skipped_rows' => $skippedRows,
        ]);
    }

    /**
     * Returns the price-change history for a single product, newest first.
     * Internal-use only — powers the "Logs" modal on Price Management page.
     */
    public function logs(Product $product)
    {
        $logs = PriceHistory::with('user:id,name')
            ->where('product_id', $product->id)
            ->latest()
            ->limit(50)
            ->get()
            ->map(function ($log) {
                return [
                    'user' => $log->user?->name ?? 'System',
                    'date' => $log->created_at->format('d M Y, h:i A'),
                    'name' => ['old' => $log->old_name, 'new' => $log->new_name],
                    'vendor_name' => ['old' => $log->old_vendor_name, 'new' => $log->new_vendor_name],
                    'mrp' => ['old' => $log->old_mrp, 'new' => $log->new_mrp],
                    'discount' => ['old' => $log->old_discount, 'new' => $log->new_discount],
                    'discount_type' => ['old' => $log->old_discount_type, 'new' => $log->new_discount_type],
                    'price' => ['old' => $log->old_price, 'new' => $log->new_price],
                    'landing_price' => ['old' => $log->old_landing_price, 'new' => $log->new_landing_price],
                ];
            });

        return response()->json(['logs' => $logs]);
    }

    /** Captures the price-management fields before a mutation, for diffing. */
    protected function snapshot(Product $product): array
    {
        $snap = [];
        foreach ($this->priceColumns as $col) {
            $snap[$col] = $product->{$col};
        }
        return $snap;
    }

    /** Writes a PriceHistory row only if at least one tracked field actually changed. */
    protected function logIfChanged(Product $product, array $old): void
    {
        $new = $this->snapshot($product);

        $changed = collect($old)->keys()->contains(function ($key) use ($old, $new) {
            return (string) $old[$key] !== (string) $new[$key];
        });

        if (!$changed) {
            return;
        }

        PriceHistory::create([
            'product_id' => $product->id,
            'user_id' => auth()->id(),
            'old_name' => $old['name'],
            'new_name' => $new['name'],
            'old_vendor_name' => $old['vendor_name'],
            'new_vendor_name' => $new['vendor_name'],
            'old_mrp' => $old['mrp'],
            'new_mrp' => $new['mrp'],
            'old_discount' => $old['discount'],
            'new_discount' => $new['discount'],
            'old_discount_type' => $old['discount_type'],
            'new_discount_type' => $new['discount_type'],
            'old_price' => $old['price'],
            'new_price' => $new['price'],
            'old_landing_price' => $old['landing_price'],
            'new_landing_price' => $new['landing_price'],
        ]);
    }
}