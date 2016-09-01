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
Route::get('/profile/vendors_information', 'HomeController@profile_vendors_information');
Route::get('/profile/photos', 'HomeController@photos');
Route::post('/post_something', 'HomeController@post_something');
Route::get('/post_photo', 'HomeController@post_photo');
Route::post('/post_photo', 'HomeController@post_post_photo');

Route::get('/my_photos', 'HomeController@my_photos');

Route::get('/find', 'GuestController@find');
Route::get('/farmers_market/{id}', 'GuestController@farmers_market');
Route::get('/farmers_market/{id}/review', 'HomeController@farmers_market_review');
Route::post('/farmers_market/{id}/review', 'HomeController@post_farmers_market_review');

Route::get('add_vendor', 'HomeController@add_vendor');
Route::post('add_vendor', 'HomeController@post_add_vendor');
Route::post('add_new_vendor', 'HomeController@post_add_new_vendor');
Route::get('my_vendors', 'HomeController@my_vendors');
Route::get('my_followers', 'HomeController@my_followers');
Route::get('add_post', 'HomeController@add_post');
Route::post('add_post', 'HomeController@post_add_post');


//API
Route::get('/like_post/{id}', function($id) {
	$post_like = new App\Post_Like;
	$post_like->user_id = Auth::id();
	$post_like->post_id = $id;
	$post_like->save();
	return Redirect::back();
});

Route::get('/follow/{id}', function($id) {
	$follow = new App\Follow;
	$follow->followed_id = $id;
	$follow->follower_id = Auth::id();
	$follow->save();
	return Redirect::back();

});

Route::get('api/farmers_market_reviews/{id}', function($id) {
	return App\Farmers_Market_Review::all();
});

Route::get('api/vendors/{name}', function($name) {
	return App\Vendor::where('vendor_name', 'LIKE', '%'.$name.'%')->get();
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

Route::get('photo/get/{filename}', [
	'as' => 'getentry', 'uses' => 'HomeController@get']);
 