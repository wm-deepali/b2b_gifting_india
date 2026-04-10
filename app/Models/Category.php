<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'meta_title',
        'meta_description',
        'image',
        'is_popular',
        'status'
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

    // Products (main)
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