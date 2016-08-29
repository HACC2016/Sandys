<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Farmers_Market;

class Farmers_Market_Hour extends Model
{
	protected $table = 'farmers_market_hours';
	public static function getHoursByFarmersMarketIdAndDay($id, $day) {
		return Farmers_Market_Hour::where('farmers_market_id', $id)->where('day_of_week', $day)->get();
	}
    //
}
