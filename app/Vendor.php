<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
	protected $table = 'vendors';

    public static function findVendorMarketByUserId($id) {
        return Vendor::where('user_id', $id)->first();
    }
    //

    protected $fillable = [
        'user_id', 
        'vendor_name', 
        'vendor_owner_name', 
        'vendor_owner_phone', 
        'website', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
    //
}
