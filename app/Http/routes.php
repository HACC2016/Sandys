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
Route::get('register/user', 'Auth\AuthController@register_user');
Route::get('register/vendor', 'Auth\AuthController@register_vendor');
Route::post('register', 'Auth\AuthController@register');

Route::get('edit/farmers_market_name', 'EditFarmersMarketController@farmers_market_name');
route::get('edit/address', 'editfarmersmarketcontroller@address');
route::post('edit/address', 'editfarmersmarketcontroller@postAddress');
Route::get('edit/organizer_name', 'EditFarmersMarketController@organizer_name');
Route::get('edit/organizer_phone_number', 'EditFarmersMarketController@organizer_phone_number');
Route::get('edit/website', 'EditFarmersMarketController@website');
Route::get('edit/hours', 'EditFarmersMarketController@hours');

Route::get('/home', 'HomeController@index');
Route::get('/profile', 'HomeController@profile');


Route::get('/find', 'GuestController@find');
Route::get('/farmers_market/{id}', 'GuestController@farmers_market');

//API
Route::get('api/farmers_market_reviews/{id}', function($id) {
	return App\Farmers_Market_Review::all();
});

Route::get('api/farmers_markets/queried', function() {
	$island = Request::input('island');
	$day = Request::input('day');
	$query = DB::table('farmers_markets');
	if($island != null) {
		$query = $query->where('county', $island);
	}
	return $query->get();
});

Route::get('api/farmers_markets', function() {
	return App\Farmers_Market::all();
});
