<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Farmers_Market_Hour;
use App\Farmers_Market;
use App\Review;

use App\Http\Requests;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->type_account == 1) {
            return view('farmers_market.home');
        }
        elseif(Auth::user()->type_account == 2) {
            return view('patron.home');
        }
        elseif(Auth::user()->type_account == 3) {
            return view('vendor.home');
        }
    }

    public function profile()
    {
        if(Auth::user()->type_account == 1) {
            $monday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($this->user->id, 1);
            $tuesday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($this->user->id, 2);
            $wednesday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($this->user->id, 3);
            $thursday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($this->user->id, 4);
            $friday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($this->user->id, 5);
            $saturday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($this->user->id, 6);
            $sunday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($this->user->id, 7);
            return view('profile.farmers_market')
                ->with('monday_hours', $monday_hours)
                ->with('tuesday_hours', $tuesday_hours)
                ->with('wednesday_hours', $wednesday_hours)
                ->with('thursday_hours', $thursday_hours)
                ->with('friday_hours', $friday_hours)
                ->with('saturday_hours', $saturday_hours)
                ->with('sunday_hours', $sunday_hours);
        }
        elseif(Auth::user()->type_account == 2) {
            return view('profile.user');
        }
        elseif(Auth::user()->type_account == 3) {
            return view('profile.vendor');
        }
    }
    public function profile_vendors_information() {
        return view('profile.vendors_information');
    }
    public function photos() {
        return view('profile.photos');
    }
    public function post_something(Request $request) {
        $file = $request->file('photo');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        /*
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;
 
        $entry->save();
        */
 
        //return redirect(url('/home'));
    }
    
    public function farmers_market_review() {
        return view('farmers_market_review');
    }
    public function post_farmers_market_review(Request $request, $id) {
        $review = new Review;
        $review->reviewed_id = $id;
        $review->reviewer_id = Auth::id();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
        $url = '/farmers_market/' . $id;
        return redirect($url);
    }
    public function post_photo() {
        return view('post_photo');
    }
    public function post_post_photo(Request $request) {
        echo $request->caption;
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
    }
}
