<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Farmers_Market_Review extends Model
{
	protected $table = 'farmers_market_reviews';

    protected $fillable = [
        'user_id', 
        'farmers_market_id', 
        'review', 
        'rating', 
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
