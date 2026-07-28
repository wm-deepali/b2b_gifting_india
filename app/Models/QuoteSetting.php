<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteSetting extends Model
{
    protected $fillable = [
        'company_logo',
        'company_name',
        'company_introduction',
        'address',
        'state_id',
        'city_id',
        'pincode',
        'email',
        'phone',
        'website',
        'gst_number',
        'id_prefix',
        'id_padding_length',
        'current_serial',
        'terms_conditions',
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}