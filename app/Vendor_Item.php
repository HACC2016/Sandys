<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor_Item extends Model
{
    protected $table = 'vendor_items';
    //

    protected $fillable = [
        'vendor_id', 
        'item', 
        'description', 
        'price', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
