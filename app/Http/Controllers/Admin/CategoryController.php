<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // ✅ List Page
    public function index()
    {
        $categories = Category::with('parent')->latest()->get();
        $parents = Category::whereNull('parent_id')->get();

        return view('admin.categories.index', compact('categories', 'parents'));
    }

    public function create()
    {
        $parents = Category::whereNull('parent_id')->get();

        return view('admin.categories.create', compact('parents'));
    }

    // ✅ Store Category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'image' => $imageName,

            // 🔥 main logic
            'parent_id' => $request->parent_id == 'parent' ? null : $request->parent_id,

            'is_popular' => $request->is_popular ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Added Successfully');
    }

    // ✅ Edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::whereNull('parent_id')->where('id', '!=', $id)->get();

        return view('admin.categories.edit', compact('category', 'parents'));
    }

    // ✅ Update
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required'
        ]);

        $image = $category->image;

        if ($request->hasFile('image')) {

            // delete old image
            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            // store new
            $image = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'meta_title' => $request->meta_title,
            'image' => $image,
            'meta_description' => $request->meta_description,

            'parent_id' => $request->parent_id == 'parent' ? null : $request->parent_id,

            'is_popular' => $request->is_popular ?? 0,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    // ✅ Delete
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // delete image from storage
        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return back()->with('success', 'Category Deleted Successfully');
    }
}