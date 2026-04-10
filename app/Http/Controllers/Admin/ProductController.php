<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GiftingOccasion;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customization;
use App\Models\ProductInclusion;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */
    public function index(Request $request)
    {
        $query = Product::with('categories');

        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $products = $query->latest()->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        $categories = Category::whereNull('parent_id')->with('children')->get();
        $occasions = GiftingOccasion::where('status', 1)->get();
        $customizations = Customization::where('status', 1)->get();

        return view('admin.products.create', compact(
            'categories',
            'occasions',
            'customizations'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        // VALIDATION (basic)
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products', 'public');
        }

        // CREATE PRODUCT
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'sub_title' => $request->sub_title,
            'summary' => $request->summary,

            'sku' => $request->sku,
            'min_qty' => $request->min_qty,
            'delivery_time' => $request->delivery_time,

            'quality' => $request->quality ? 1 : 0,
            'pan_india' => $request->pan_india ? 1 : 0,

            'mrp' => $request->mrp,
            'discount' => $request->discount,
            'discount_type' => $request->discount_type,
            'price' => $request->price,

            'featured' => $request->featured ? 1 : 0,
            'new_arrival' => $request->new_arrival ? 1 : 0,
            'sale' => $request->sale ? 1 : 0,

            'details' => $request->details,
            'delivery_returns' => $request->delivery_returns,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,

            'cart' => $request->cart ? 1 : 0,
            'whatsapp' => $request->whatsapp ? 1 : 0,
            'call' => $request->call ? 1 : 0,

            'status' => $request->status ?? 1,
            'image' => $image,
        ]);

        /*
        |--------------------------------------------------------------------------
        | RELATIONS
        |--------------------------------------------------------------------------
        */

        // CATEGORY
        $product->categories()->sync($request->categories ?? []);

        // SUBCATEGORY
        $product->subcategories()->sync($request->sub_categories ?? []);

        // OCCASIONS
        $product->occasions()->sync($request->occasions ?? []);

        // CUSTOMIZATIONS
        $product->customizations()->sync($request->customizations ?? []);

        /*
        |--------------------------------------------------------------------------
        | INCLUSIONS (MULTIPLE)
        |--------------------------------------------------------------------------
        */
        if ($request->inclusions) {
            foreach ($request->inclusions as $inc) {
                if (!empty($inc)) {
                    ProductInclusion::create([
                        'product_id' => $product->id,
                        'title' => $inc
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product Created Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $product = Product::with([
            'categories',
            'subcategories',
            'occasions',
            'customizations',
            'inclusions'
        ])->findOrFail($id);

        $categories = Category::with('children')->get();
        $occasions = GiftingOccasion::all();
        $customizations = Customization::where('status', 1)->get();

        return view('admin.products.edit', compact(
            'product',
            'categories',
            'occasions',
            'customizations'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $image = $product->image;

        if ($request->hasFile('image')) {

            // delete old image
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }

            // store new
            $image = $request->file('image')->store('products', 'public');
        }

        // UPDATE PRODUCT
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'sub_title' => $request->sub_title,
            'summary' => $request->summary,

            'sku' => $request->sku,
            'min_qty' => $request->min_qty,
            'delivery_time' => $request->delivery_time,

            'quality' => $request->quality ? 1 : 0,
            'pan_india' => $request->pan_india ? 1 : 0,

            'mrp' => $request->mrp,
            'discount' => $request->discount,
            'discount_type' => $request->discount_type,
            'price' => $request->price,

            'featured' => $request->featured ? 1 : 0,
            'new_arrival' => $request->new_arrival ? 1 : 0,
            'sale' => $request->sale ? 1 : 0,

            'details' => $request->details,
            'delivery_returns' => $request->delivery_returns,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,

            'cart' => $request->cart ? 1 : 0,
            'whatsapp' => $request->whatsapp ? 1 : 0,
            'call' => $request->call ? 1 : 0,

            'status' => $request->status ?? 1,
            'image' => $image

        ]);

        /*
        |--------------------------------------------------------------------------
        | RELATIONS SYNC
        |--------------------------------------------------------------------------
        */
        $product->categories()->sync($request->categories ?? []);
        $product->subcategories()->sync($request->sub_categories ?? []);
        $product->occasions()->sync($request->occasions ?? []);
        $product->customizations()->sync($request->customizations ?? []);

        /*
        |--------------------------------------------------------------------------
        | INCLUSIONS UPDATE
        |--------------------------------------------------------------------------
        */
        // delete old
        $product->inclusions()->delete();

        // insert new
        if ($request->inclusions) {
            foreach ($request->inclusions as $inc) {
                if (!empty($inc)) {
                    ProductInclusion::create([
                        'product_id' => $product->id,
                        'title' => $inc
                    ]);
                }
            }
        }

        return redirect()->route('admin.products.index')
            ->with('success', 'Product Updated Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // delete image from storage
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        // delete product
        $product->delete();

        return response()->json([
            'message' => 'Product Deleted Successfully'
        ]);
    }
}