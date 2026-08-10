<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyUsSetting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'features' => 'array',
    ];
}