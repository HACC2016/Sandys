<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Farmers_Market;
use App\Vendor;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if($data['type_account'] == 1) {
            return Validator::make($data, [
                'farmers_market_name' => 'required|max:255',
                'street_address' => 'required',
                'city' => 'required',
                'zipcode' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'state' => 'required',
                'country' => 'required',
                'county' => 'required',
                'organizer_name' => 'required',
                'organizer_phone_number' => 'required|regex:/[123456789]\d{6}/',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);
        }
        elseif($data['type_account'] == 2) {
            return Validator::make($data, [
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

        }
        elseif($data['type_account'] == 3) {
            return Validator::make($data, [
                'vendor_name' => 'required',
                'vendor_owner_name' => 'required',
                'vendor_owner_phone' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required|min:6|confirmed',
            ]);

        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type_account' => $data['type_account'],
        ]);
        if($data['type_account'] == 1) {
            Farmers_Market::create([
                'farmers_market_name' => $data['farmers_market_name'],
                'street_address' => $data['street_address'],
                'city' => $data['city'],
                'zipcode' => $data['zipcode'],
                'lat' => $data['lat'],
                'lng' => $data['lng'],
                'state' => $data['state'],
                'country' => $data['country'],
                'county' => $data['county'],
                'organizer_name' => $data['organizer_name'],
                'organizer_phone_number' => $data['organizer_phone_number'],
                'user_id' => $user->id
            ]);
        }
        elseif($data['type_account'] == 2) {
        }
        elseif($data['type_account'] == 3) {
            Vendor::create([
                'vendor_name' => $data['vendor_name'],
                'vendor_owner_phone' => $data['vendor_owner_phone'],
                'vendor_owner_name' => $data['vendor_owner_name'],
                'user_id' => $user->id
            ]);
        }
        return $user;
    }

    public function register_farmers_market() { return view('auth.register'); }
    public function register_user() { return view('auth.register_user'); }
    public function register_vendor() { return view('auth.register_vendor'); }
}
