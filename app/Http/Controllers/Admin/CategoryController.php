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
    public function index(Request $request)
    {
        $query = Category::with('parent', 'children');

        // Parent categories dropdown
        $parentCategories = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        // Search
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Type filter
        if ($request->type == 'category') {

            $query->whereNull('parent_id');

        } elseif ($request->type == 'subcategory') {

            $query->whereNotNull('parent_id');

            if ($request->filled('category_id')) {
                $query->where('parent_id', $request->category_id);
            }
        }

        // Sorting
        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'desc');

        $allowedColumns = [
            'id',
            'name',
            'sort_order',
            'status',
            'is_popular'
        ];

        if (in_array($sortBy, $allowedColumns)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        $categories = $query
            ->paginate(10)
            ->appends($request->all());

        return view('admin.categories.index', compact(
            'categories',
            'parentCategories'
        ));
    }

    // ✅ Create
    public function create()
    {
        $parents = Category::whereNull('parent_id')->get();

        return view('admin.categories.create', compact('parents'));
    }

    // ✅ Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'sub_title' => $request->sub_title,

            // ✅ slug safe
            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->name),

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'image' => $image,

            // ✅ FIXED
            'parent_id' => $request->parent_id ?: null,

            // FLAGS
            'is_popular' => $request->is_popular ?? 0,
            'is_featured' => $request->is_featured ?? 0,
            'show_on_website' => $request->show_on_website ?? 1,

            // AUTO
            'is_sub_category' => $request->parent_id ? 1 : 0,
            'added_by' => 'admin',

            'status' => $request->status ?? 1,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category Added Successfully');
    }

    // ✅ Edit
    public function edit(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $parents = Category::whereNull('parent_id')
            ->where('id', '!=', $id)
            ->get();

        $redirect = $request->redirect;

        return view('admin.categories.edit', compact(
            'category',
            'parents',
            'redirect'
        ));
    }

    // ✅ Update
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $image = $category->image;

        if ($request->hasFile('image')) {

            if ($category->image && Storage::disk('public')->exists($category->image)) {
                Storage::disk('public')->delete($category->image);
            }

            $image = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'sub_title' => $request->sub_title,

            // ✅ slug safe
            'slug' => $request->slug
                ? Str::slug($request->slug)
                : $category->slug,

            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'image' => $image,

            // ✅ FIXED
            'parent_id' => $request->parent_id ?: null,

            'is_popular' => $request->is_popular ?? 0,
            'is_featured' => $request->is_featured ?? 0,
            'show_on_website' => $request->show_on_website ?? 1,

            'is_sub_category' => $request->parent_id ? 1 : 0,

            'status' => $request->status ?? 1,
            'sort_order' => $request->sort_order ?? 0,
        ]);

        return redirect($request->redirect ?? route('admin.categories.index'))
            ->with('success', 'Category Updated Successfully');
    }

    // ✅ Delete
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if ($category->image && Storage::disk('public')->exists($category->image)) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            'message' => 'Category Deleted Successfully'
        ]);
    }
}