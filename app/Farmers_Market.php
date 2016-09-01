<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers_Market extends Model
{
	protected $table = 'farmers_markets';

    protected $fillable = [
        'farmers_market_name', 'organizer_name', 'organizer_phone_number', 'street_address', 'city', 'zipcode', 'website', 'user_id', 'lat', 'lng', 'state', 'country', 'county', 
    ];
	public static function findFarmersMarketByUserId($id) {
		return Farmers_Market::where('user_id', $id)->first();
	}
	public static function getFarmersMarket($id) {
		return Farmers_Market::where('user_id', $id)->first();
	}
}
