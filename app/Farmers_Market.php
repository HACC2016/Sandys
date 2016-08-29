<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers_Market extends Model
{
	protected $table = 'farmers_markets';

	public static function findByUserId($id) {
		return Farmers_Market::where('user_id', $id)->get();
	}
}
