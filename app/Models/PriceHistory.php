<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PriceHistory extends Model
{
    protected $fillable = [
        'product_id',
        'old_name', 
        'new_name', 
        'old_vendor_name', 
        'new_vendor_name',
        'user_id',
        'old_mrp',
        'new_mrp',
        'old_discount',
        'new_discount',
        'old_discount_type',
        'new_discount_type',
        'old_price',
        'new_price',
        'old_landing_price',
        'new_landing_price',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}