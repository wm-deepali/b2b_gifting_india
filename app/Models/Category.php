<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'image',
        'status',
        'is_popular',
        'show_header',
        'show_footer'
    ];

    public function listings()
    {
        return $this->hasMany(Listing::class);
    }
}