<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::with('categories')
            ->latest()
            ->paginate(10);
        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        $categories = Category::active()
            ->orderBy('name')
            ->get();

        return view(
            'admin.brands.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'categories' => 'required|array'
        ]);

        $logo = null;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo')->store('brands', 'public');
        }

        $brand = Brand::create([
            'name' => $request->name,
            'logo' => $logo,
            'status' => $request->status ?? 1
        ]);

        // Save brand categories
        $brand->categories()->sync($request->categories);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand Created');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        $categories = Category::active()->orderBy('name')->get();

        $selectedCategories = $brand->categories
            ->pluck('id')
            ->toArray();

        return view(
            'admin.brands.edit',
            compact(
                'brand',
                'categories',
                'selectedCategories'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'categories' => 'required|array'
        ]);

        $brand = Brand::findOrFail($id);

        $logo = $brand->logo;

        if ($request->hasFile('logo')) {

            // delete old image
            if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
                Storage::disk('public')->delete($brand->logo);
            }

            // store new image
            $logo = $request->file('logo')->store('brands', 'public');
        }

        $brand->update([
            'name' => $request->name,
            'logo' => $logo,
            'status' => $request->status ?? 1
        ]);

        // Update category mapping
        $brand->categories()->sync($request->categories);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand Updated');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        // delete image from storage
        if ($brand->logo && Storage::disk('public')->exists($brand->logo)) {
            Storage::disk('public')->delete($brand->logo);
        }

        $brand->delete();

        return response()->json(['message' => 'Deleted']);
    }
}