<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'sub_title',
        'summary',
        'sku',
        'min_qty',
        'delivery_time',
        'quality',
        'pan_india',
        'mrp',
        'discount',
        'discount_type',
        'price',
        'featured',
        'new_arrival',
        'sale',
        'details',
        'delivery_returns',
        'meta_title',
        'meta_description',
        'cart',
        'whatsapp',
        'call',
        'status'
    ];

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    // CATEGORY
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    // SUBCATEGORY
    public function subcategories()
    {
        return $this->belongsToMany(Category::class, 'product_subcategories', 'product_id', 'subcategory_id');
    }

    // OCCASIONS
    public function occasions()
    {
        return $this->belongsToMany(
            GiftingOccasion::class,
            'occasion_product',
            'product_id',
            'occasion_id'
        );
    }
    // CUSTOMIZATION
    public function customizations()
    {
        return $this->belongsToMany(Customization::class, 'customization_product');
    }

    // INCLUSIONS
    public function inclusions()
    {
        return $this->hasMany(ProductInclusion::class);
    }
}