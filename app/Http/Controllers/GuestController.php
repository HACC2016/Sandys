<?php

namespace App\Http\Controllers;

use Auth;
use App\Farmers_Market_Hour;
use App\Farmers_Market_Review;
use App\Farmers_Market;
use App\Review;
use Illuminate\Http\Request;

use App\Http\Requests;

class GuestController extends Controller
{
    public function find() {
    	date_default_timezone_set('US/Hawaii');
    	$day = Date("D");
    	$hour = Date("g");
    	$min = Date("i");
    	if($min > 0 && $min < 15) {
    		$min = 15;
    	}
    	elseif($min > 15 && $min < 30) {
    		$min = 30;
    	}
    	elseif($min > 30 && $min < 45) {
    		$min = 45;
    	}
    	elseif($min > 45 && $min < 60) {
    		$min = 0;
    	}
    	$period = Date("A");
        return view('find')
        	->with('day', $day)
        	->with('hour', $hour)
        	->with('min', $min)
        	->with('period', $period);
    }
    public function farmers_market($id) {
        $farmers_market = Farmers_Market::find($id);
        $farmers_market_reviews = Review::where('reviewed_id', $farmers_market->user_id)->get();

        return view('farmers_market')
            ->with('farmers_market', $farmers_market)
            ->with('farmers_market_reviews', $farmers_market_reviews);
    }
    public function farmers_market_review() {
        return view('farmers_market_review');
    }
    public function post_farmers_market_review(Request $request, $id) {
        $comment = new Review;
        $comment->reviewed_id = $id;
        $comment->reviewer_id = Auth::id();
        $comment->review = $request->review;
        $comment->save();
        $url = '/farmers_market/' . $id;
        return redirect($url);
    }
    
}
