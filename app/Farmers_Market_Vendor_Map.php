<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers_Market_Vendor_Map extends Model
{
    //
    protected $table = 'farmers_market_vendor_maps';

    protected $fillable = [
        'farmers_market_id',
        'photo_id', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
