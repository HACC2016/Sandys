<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Farmers_Market_Hour;
use App\Farmers_Market;
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
    public function address()
    {
        return view('edit.address');
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
    public function postAddress(Request $request)
    {
        echo $request->input('street_address');
        echo "<br>";
        echo $request->input('city');
        echo "<br>";
        echo $request->input('zipcode');
        echo "<br>";
        echo $request->input('lat');
        echo "<br>";
        echo $request->input('lng');
        echo "<br>";
        echo $request->input('state');
        echo "<br>";
        echo $request->input('country');
        $farmers_market = Farmers_Market::findFarmersMarketByUserId($this->user->id);
        $farmers_market->street_address = $request->input('street_address');
        $farmers_market->city = $request->input('city');
        $farmers_market->zipcode = $request->input('zipcode');
        $farmers_market->lat = $request->input('lat');
        $farmers_market->lng = $request->input('lng');
        $farmers_market->country = $request->input('country');
        $farmers_market->state = $request->input('state');
        $farmers_market->save();
        return redirect('/edit/address');
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
