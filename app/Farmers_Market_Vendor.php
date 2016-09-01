<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers_Market_Vendor extends Model
{
    //
    protected $table = 'farmers_market_vendors';

    protected $fillable = [
    	'vendor_id',
    	'farmers_market_id',
    ];
	public static function findFarmersMarketByUserId($id) {
		return Farmers_Market::where('user_id', $id)->first();
	}
}
