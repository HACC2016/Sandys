<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class EditFarmersMarketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
}
