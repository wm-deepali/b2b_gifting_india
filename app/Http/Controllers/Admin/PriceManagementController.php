<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\PriceHistory;
use Illuminate\Http\Request;

class PriceManagementController extends Controller
{
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

        // Capture old values BEFORE updating, so we can log the diff.
        $old = [
            'name' => $product->name,
            'vendor_name' => $product->vendor_name,
            'mrp' => $product->mrp,
            'discount' => $product->discount,
            'discount_type' => $product->discount_type,
            'price' => $product->price,
            'landing_price' => $product->landing_price,
        ];

        $product->update($validated);

        $new = [
            'name' => $product->name,
            'vendor_name' => $product->vendor_name,
            'mrp' => $product->mrp,
            'discount' => $product->discount,
            'discount_type' => $product->discount_type,
            'price' => $product->price,
            'landing_price' => $product->landing_price,
        ];

        // Only write a history row if something actually changed.
        $changed = collect($old)->keys()->contains(function ($key) use ($old, $new) {
            return (string) $old[$key] !== (string) $new[$key];
        });

        if ($changed) {
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
}