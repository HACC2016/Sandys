<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('register/farmers_market', 'Auth\AuthController@register_farmers_market');
Route::post('register', 'Auth\AuthController@register');
Route::get('register/user', 'Auth\AuthController@register_farmers_market');
Route::post('register', 'Auth\AuthController@register');

Route::get('edit/farmers_market_name', 'EditFarmersMarketController@farmers_market_name');
Route::get('edit/street_address', 'EditFarmersMarketController@street_address');
Route::get('edit/city', 'EditFarmersMarketController@city');
Route::get('edit/zipcode', 'EditFarmersMarketController@zipcode');
Route::get('edit/organizer_name', 'EditFarmersMarketController@organizer_name');
Route::get('edit/organizer_phone_number', 'EditFarmersMarketController@organizer_phone_number');
Route::get('edit/website', 'EditFarmersMarketController@website');

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');
