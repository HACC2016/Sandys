<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Auth;
use App\Farmers_Market;
use App\Patron;
use App\Vendor;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'type_account'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getUserInformationTable($id) {
         $user = User::find($id);
         if($user->type_account == 1) {
            return Farmers_Market::where('user_id', $user->id)->first();
         }
         elseif($user->type_account == 2) {
            return Patron::where('user_id', $user->id)->first();
         }
         elseif($user->type_account == 3) {
            return Vendor::where('user_id', $user->id)->first();
         }
    }

    public static function getUrlForUser($id) {
         $user = User::find($id);
         if($user->type_account == 1) {
            return "/farmers_market/" . User::getUserInformationTable($id)->id;
         }
         elseif($user->type_account == 2) {
            return "/patron/" . User::getUserInformationTable($id)->id;
         }
         elseif($user->type_account == 3) {
            return "/vendor/" . User::getUserInformationTable($id)->id;
         }
    }

    public static function getNameOfUser($id) {
         $user = User::find($id);
         if($user->type_account == 1) {
            return Farmers_Market::where('user_id', $user->id)->first()->farmers_market_name;
         }
         elseif($user->type_account == 2) {
            return Patron::where('user_id', $user->id)->first()->username;
         }
         elseif($user->type_account == 3) {
            return Vendor::where('user_id', $user->id)->first()->vendor_name;
         }
    }
}
