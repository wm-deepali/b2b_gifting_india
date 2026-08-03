<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class PriceManagementController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with(['categories', 'subcategories'])
            ->when($request->search, function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
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
            'mrp' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'discount_type' => 'nullable|in:flat,percentage',
            'price' => 'required|numeric|min:0',
            'landing_price' => 'nullable|numeric|min:0',
        ]);

        $product->update($validated);

        return response()->json([
            'success' => true,
            'mrp' => $product->mrp,
            'discount' => $product->discount,
            'price' => $product->price,
            'landing_price' => $product->landing_price,
        ]);
    }
}