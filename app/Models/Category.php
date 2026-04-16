<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'old_id',
        'name',
        'slug',
        'parent_id',
        'sub_title',
        'meta_title',
        'meta_description',
        'image',

        // ✅ existing
        'is_popular',
        'status',

        // ✅ ADDED (missing fields)
        'added_by',
        'is_featured',
        'show_on_website',
        'is_sub_category',
    ];

    // Parent
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Children
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // PRODUCTS (CATEGORY)
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    // PRODUCTS (SUBCATEGORY)
    public function subcategoryProducts()
    {
        return $this->belongsToMany(Product::class, 'product_subcategories', 'subcategory_id', 'product_id');
    }
}