<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farmers_Market_Hour;
class EditFarmersMarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    public function farmers_market_name()
    {
        return view('edit.farmers_market_name');
    }
    public function street_address()
    {
        return view('edit.street_address');
    }
    public function city()
    {
        return view('edit.city');
    }
    public function zipcode()
    {
        return view('edit.zipcode');
    }
    public function organizer_name()
    {
        return view('edit.organizer_name');
    }
    public function organizer_phone_number()
    {
        return view('edit.organizer_phone_number');
    }
    public function website()
    {
        return view('edit.website');
    }
    public function password()
    {
        return view('edit.password');
    }
    public function hours()
    {
        $monday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '1')->get();
        $tuesday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '2')->get();
        $wednesday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '3')->get();
        $thursday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '4')->get();
        $friday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '5')->get();
        $saturday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '6')->get();
        $sunday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '7')->get();
        return view('edit.hours')
            ->with('monday_hours', $monday_hours)
            ->with('tuesday_hours', $tuesday_hours)
            ->with('wednesday_hours', $wednesday_hours)
            ->with('thursday_hours', $thursday_hours)
            ->with('friday_hours', $friday_hours)
            ->with('saturday_hours', $saturday_hours)
            ->with('sunday_hours', $sunday_hours);
    }
}
