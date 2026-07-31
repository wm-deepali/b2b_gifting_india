<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteItem extends Model
{
    protected $fillable = [
        'quote_id',
        'product_id',
        'brand_id',
        'product_name',
        'product_image',
        'product_detail',
        'sku_code',
        'hsn_code',
        'colour',
        'price',
        'branding_charges',
        'quantity',
        'tax_percentage',
        'tax_amount',
        'total_price',
    ];

    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function customizations()
    {
        return $this->belongsToMany(Customization::class, 'quote_item_customization');
    }
}