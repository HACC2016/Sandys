<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Farmers_Market_Hour;
use App\Farmers_Market;

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
        return view('home');
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
            return view('profile')
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
    }
}
