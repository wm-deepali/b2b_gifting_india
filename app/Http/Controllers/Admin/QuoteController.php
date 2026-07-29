<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Quote;
use App\Models\State;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Customization;
use App\Models\QuoteSetting;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\QuoteProposalMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class QuoteController extends Controller
{
    public function index(Request $request)
    {
        $quotes = Quote::with('customer')
            ->withCount('items')
            ->when($request->search, function ($query) use ($request) {
                $query->where('proposal_id', 'like', '%' . $request->search . '%')
                    ->orWhereHas('customer', function ($q) use ($request) {
                        $q->where('business_name', 'like', '%' . $request->search . '%')
                            ->orWhere('mobile_number', 'like', '%' . $request->search . '%');
                    });
            })
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('admin.quotes.index', compact('quotes'));
    }

    public function create()
    {
        $states = State::orderBy('name')->get();
        $brands = Brand::orderBy('name')->get(['id', 'name']);
        $customizations = Customization::orderBy('name')->get(['id', 'name']);

        return view('admin.quotes.create', compact('states', 'brands', 'customizations'));
    }

    public function searchCustomer(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);

        $term = $request->search;

        $customer = Customer::with('state', 'city')
            ->where('mobile_number', $term)
            ->orWhere('email', $term)
            ->first();

        if (!$customer) {
            return response()->json(['found' => false]);
        }

        $cities = City::where('state_id', $customer->state_id)
            ->orderBy('name')
            ->get(['id', 'name']);

        return response()->json([
            'found' => true,
            'customer' => $customer,
            'cities' => $cities,
        ]);
    }

    public function searchProducts(Request $request)
    {
        $request->validate([
            'term' => 'nullable|string',
        ]);

        $products = Product::with(['images', 'customizations'])
            ->where('name', 'like', '%' . $request->term . '%')
            ->limit(10)
            ->get()
            ->map(function ($product) {
                return [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'detail' => strip_tags((string) $product->details),
                    'image' => $product->display_image ? asset('storage/' . $product->display_image) : null,
                    'sku' => $product->sku,
                    'brand_id' => $product->brand_id,
                    'customization_ids' => $product->customizations->pluck('id')->toArray(),
                ];
            });

        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|string|max:15',
            'customer_name' => 'required|string|max:255',
            'business_name' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'state_id' => 'nullable|exists:states,id',
            'city_id' => 'nullable|exists:cities,id',
            'pincode' => 'nullable|string|max:10',
            'gst_number' => 'nullable|string|max:20',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'nullable|exists:products,id',
            'items.*.brand_id' => 'nullable|exists:brands,id',
            'items.*.customization_ids' => 'nullable|array',
            'items.*.customization_ids.*' => 'exists:customizations,id',
            'items.*.product_name' => 'required|string|max:255',
            'items.*.product_image' => 'nullable|string',
            'items.*.product_detail' => 'nullable|string',
            'items.*.sku_code' => 'nullable|string|max:100',
            'items.*.hsn_code' => 'nullable|string|max:20',
            'items.*.colour' => 'nullable|string|max:100',
            'items.*.price' => 'required|numeric|min:0',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.tax_percentage' => 'required|numeric|min:0|max:100',
        ]);

        $quote = DB::transaction(function () use ($request) {

            $customer = Customer::updateOrCreate(
                ['mobile_number' => $request->mobile_number],
                [
                    'customer_name' => $request->customer_name,
                    'business_name' => $request->business_name,
                    'email' => $request->email,
                    'address' => $request->address,
                    'state_id' => $request->state_id,
                    'city_id' => $request->city_id,
                    'pincode' => $request->pincode,
                    'gst_number' => $request->gst_number,
                ]
            );

            $proposalId = $this->generateProposalId();

            $totalAmount = collect($request->items)->sum(function ($item) {
                $subtotal = $item['price'] * $item['quantity'];
                $tax = $subtotal * ($item['tax_percentage'] / 100);
                return $subtotal + $tax;
            });

            $quote = Quote::create([
                'proposal_id' => $proposalId,
                'customer_id' => $customer->id,
                'total_amount' => $totalAmount,
            ]);

            foreach ($request->items as $item) {

                $subtotal = $item['price'] * $item['quantity'];
                $taxAmount = $subtotal * ($item['tax_percentage'] / 100);

                $quoteItem = $quote->items()->create([
                    'product_id' => $item['product_id'] ?? null,
                    'brand_id' => $item['brand_id'] ?? null,
                    'product_name' => $item['product_name'],
                    'product_image' => $item['product_image'] ?? null,
                    'product_detail' => $item['product_detail'] ?? null,
                    'sku_code' => $item['sku_code'] ?? null,
                    'hsn_code' => $item['hsn_code'] ?? null,
                    'colour' => $item['colour'] ?? null,
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                    'tax_percentage' => $item['tax_percentage'],
                    'tax_amount' => $taxAmount,
                    'total_price' => $subtotal + $taxAmount,
                ]);

                if (!empty($item['customization_ids'])) {
                    $quoteItem->customizations()->sync($item['customization_ids']);
                }
            }

            return $quote;
        });

        return redirect()
            ->route('admin.quotes.preview', $quote->id)
            ->with('success', 'Proposal created successfully.');
    }

    public function preview(Quote $quote)
    {
        $quote->load('customer.state', 'customer.city', 'items.brand', 'items.customizations');
        $settings = QuoteSetting::with('state', 'city')->first();

        return view('admin.quotes.preview', compact('quote', 'settings'));
    }

    public function download(Quote $quote)
    {
        $quote->load('customer.state', 'customer.city', 'items.brand', 'items.customizations');
        $settings = QuoteSetting::with('state', 'city')->first();

        $pdf = $this->buildPdf($quote, $settings);

        return $pdf->download($quote->proposal_id . '.pdf');
    }

    public function sendEmail(Request $request, Quote $quote)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $quote->load('customer.state', 'customer.city', 'items.brand', 'items.customizations');
        $settings = QuoteSetting::with('state', 'city')->first();

        $pdf = $this->buildPdf($quote, $settings);

        Mail::to($request->email)->send(
            new QuoteProposalMail($quote, $settings, $pdf->output())
        );

        return back()->with('success', 'Proposal emailed to ' . $request->email . '.');
    }

    /**
     * Builds the DomPDF instance for a quote, resolving all images to local
     * file paths first so they render reliably (see resolveImagePath()).
     */
    private function buildPdf(Quote $quote, ?QuoteSetting $settings)
    {
        if ($settings) {
            $settings->pdf_logo_path = $settings->company_logo
                ? $this->resolveImagePath(asset('storage/' . $settings->company_logo))
                : null;

            $settings->pdf_qr_path = $settings->qr_code
                ? $this->resolveImagePath(asset('storage/' . $settings->qr_code))
                : null;
        }

        foreach ($quote->items as $item) {
            $item->pdf_image_path = $this->resolveImagePath($item->product_image);
        }

        return Pdf::loadView('admin.quotes.pdf', compact('quote', 'settings'))
            ->setPaper('a4')
            ->setOption('isRemoteEnabled', true); // fallback, in case a local path can't be resolved
    }

    /**
     * Convert a public storage URL (or already-local path) into an absolute
     * local file path DomPDF can read directly, instead of fetching over HTTP.
     */
    private function resolveImagePath(?string $imageUrl): ?string
    {
        if (empty($imageUrl)) {
            return null;
        }

        if (file_exists($imageUrl)) {
            return $imageUrl;
        }

        $marker = '/storage/';
        $pos = strpos($imageUrl, $marker);

        if ($pos !== false) {
            $relativePath = substr($imageUrl, $pos + strlen($marker));
            $localPath = storage_path('app/public/' . $relativePath);

            if (file_exists($localPath)) {
                return $localPath;
            }
        }

        return $imageUrl;
    }

    /**
     * Generates the next proposal ID atomically (never resets).
     */
    private function generateProposalId(): string
    {
        $settings = QuoteSetting::lockForUpdate()->first();

        if (!$settings) {
            $settings = QuoteSetting::create(['id' => 1]);
            $settings = QuoteSetting::lockForUpdate()->first();
        }

        $nextSerial = $settings->current_serial + 1;

        $settings->update(['current_serial' => $nextSerial]);

        return $settings->id_prefix . str_pad(
            (string) $nextSerial,
            $settings->id_padding_length,
            '0',
            STR_PAD_LEFT
        );
    }
}