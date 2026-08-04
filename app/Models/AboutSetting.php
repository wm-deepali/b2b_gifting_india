<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSetting extends Model
{
    protected $guarded = [];

    protected $casts = [
        'tech_features' => 'array',
        'promise_cards' => 'array',
        'stats' => 'array',
    ];
}