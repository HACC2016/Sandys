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
        $monday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '1')->get();
        $tuesday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '2')->get();
        $wednesday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '3')->get();
        $thursday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '4')->get();
        $friday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '5')->get();
        $saturday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '6')->get();
        $sunday_hours = Farmers_Market_Hour::where('user_id', $this->user->id)->where('day_of_week', '7')->get();
        return view('profile')
            ->with('monday_hours', $monday_hours)
            ->with('tuesday_hours', $tuesday_hours)
            ->with('wednesday_hours', $wednesday_hours)
            ->with('thursday_hours', $thursday_hours)
            ->with('friday_hours', $friday_hours)
            ->with('saturday_hours', $saturday_hours)
            ->with('sunday_hours', $sunday_hours);
    }
    

    public function find() {
        return view('find');
    }

}
