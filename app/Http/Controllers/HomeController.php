<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Farmers_Market_Hour;
use App\Farmers_Market;
use App\Review;
use App\Photo;
use App\Vendor;
use App\Post;
use App\Follow;
use App\User;
use App\Vendor_Item;
use App\Farmers_Market_Vendor;
use App\Event;
use App\Farmers_Market_Vendor_Map;
use App\Twitter_Info;
use App\Post_Comment;
use Twitter;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;

use Socialite;

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
        if(Auth::user()->type_account == 1) {
            $photos = Photo::where('poster_id', Auth::id())
                ->take(4)
                ->get();
            $vendors = Farmers_Market_Vendor::where('farmers_market_id', Farmers_Market::getFarmersMarket(Auth::id())->id)
                ->get();
            $follows = Follow::where('followed_id', Auth::id())->get();
            $posts = Post::where('user_id', Auth::id())->get();
            $events = Event::where('user_id', Auth::id())->get();
            return view('farmers_market.home')
                ->with('photos', $photos)
                ->with('vendors', $vendors)
                ->with('posts', $posts)
                ->with('events', $events)
                ->with('follows', $follows);
        }
        elseif(Auth::user()->type_account == 2) {
            $follows = Follow::where('follower_id', Auth::id())->get();
            $posts = Post::orderBy('created_at');
            for($i = 0; $i < count($follows); $i++) {
                $posts = $posts->orWhere('user_id', $follows[$i]->followed_id);
            }
            $posts = $posts->get();
            $my_reviews = Review::where('reviewer_id', Auth::id())->get();
            return view('patron.home')
                ->with('posts', $posts)
                ->with('follows', $follows)
                ->with('my_reviews', $my_reviews);
        }
        elseif(Auth::user()->type_account == 3) {
            $vendor = Vendor::where('user_id', Auth::id())->first();
            $photos = Photo::where('poster_id', Auth::id())
                ->take(4)
                ->get();
            $follows = Follow::where('followed_id', Auth::id())->get();
            $posts = Post::where('user_id', Auth::id())->get();
            $farmers_markets_part_of = Farmers_Market_Vendor::where('vendor_id', $vendor->id)->get();
            $vendor_items = Vendor_Item::where('vendor_id', $vendor->id)->get();
            return view('vendor.home')
                ->with('photos', $photos)
                ->with('vendor', $vendor)
                ->with('posts', $posts)
                ->with('vendor_items', $vendor_items)
                ->with('farmers_markets_part_of', $farmers_markets_part_of)
                ->with('follows', $follows);
        }
    }

    public function profile()
    {
        if(Auth::user()->type_account == 1) {
            $farmers_market_id = User::getUserInformationTable(Auth::id())->id;
            $monday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($farmers_market_id, 1);
            $tuesday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($farmers_market_id, 2);
            $wednesday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($farmers_market_id, 3);
            $thursday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($farmers_market_id, 4);
            $friday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($farmers_market_id, 5);
            $saturday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($farmers_market_id, 6);
            $sunday_hours = Farmers_Market_Hour::getHoursByFarmersMarketIdAndDay($farmers_market_id, 7);
            $twitter_info = Twitter_Info::where('user_id', Auth::id())->first();
            return view('profile.farmers_market')
                ->with('monday_hours', $monday_hours)
                ->with('tuesday_hours', $tuesday_hours)
                ->with('wednesday_hours', $wednesday_hours)
                ->with('thursday_hours', $thursday_hours)
                ->with('friday_hours', $friday_hours)
                ->with('saturday_hours', $saturday_hours)
                ->with('twitter_info', $twitter_info)
                ->with('sunday_hours', $sunday_hours);
        }
        elseif(Auth::user()->type_account == 2) {
            return view('profile.user');
        }
        elseif(Auth::user()->type_account == 3) {
            return view('profile.vendor');
        }
    }
    public function profile_vendors_information() {
        return view('profile.vendors_information');
    }
    public function photos() {
        return view('profile.photos');
    }
    public function farmers_market_review() {
        return view('farmers_market_review');
    }
    public function post_farmers_market_review(Request $request, $id) {
        $review = new Review;
        $review->reviewed_id = Farmers_Market::find($id)->user_id;
        $review->reviewer_id = Auth::id();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
        $url = '/farmers_market/' . $id;
        return redirect($url);
    }
    public function post_photo() {
        return view('post_photo');
    }
    public function post_post_photo(Request $request) {
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put('/photos/'. $file->getFilename().'.'.$extension,  File::get($file));
        $photo = new Photo();
        $photo->poster_id = Auth::id();
        $photo->mime = $file->getclientmimetype();
        $photo->original_filename = $file->getClientOriginalName();
        $photo->filename = $file->getFilename().'.'.$extension;
        $photo->caption = $request->caption;
        $photo->save();
        return redirect(url('/home'));
    }

    
    

    public function add_vendor(){
        return view('farmers_market.add_vendor');
    }
    public function post_add_vendor(Request $request){
        echo $request->vendor_id;
        $farmers_market_vendor = new Farmers_Market_Vendor;
        $farmers_market_vendor->vendor_id = $request->vendor_id;
        $farmers_market_id = Farmers_Market::getFarmersMarket(Auth::id())->id;
        $farmers_market_vendor->farmers_market_id = $farmers_market_id;
        $farmers_market_vendor->save();
        return redirect(url('/my_vendors'));
    }

    public function post_add_new_vendor(Request $request){
        echo $request->vendor_name;
        $farmers_market_id = Farmers_Market::getFarmersMarket(Auth::id())->id;
        $vendor = new Vendor;
        $vendor->vendor_name = $request->vendor_name;
        $vendor->user_id = null;
        $vendor->save();
        $farmers_market_vendor = new Farmers_Market_Vendor;
        $farmers_market_vendor->vendor_id = $vendor->id;
        $farmers_market_id = Farmers_Market::getFarmersMarket(Auth::id())->id;
        $farmers_market_vendor->farmers_market_id = $farmers_market_id;
        $farmers_market_vendor->save();
        return redirect(url('/my_vendors'));
    }

    public function my_vendors() {
        $farmers_market_id = Farmers_Market::getFarmersMarket(Auth::id())->id;
        $vendors = Farmers_Market_Vendor::where('farmers_market_id', $farmers_market_id)->get();
        return view('farmers_market.my_vendors')
            ->with('vendors', $vendors);
    }

    public function my_photos() {
        $photos = Photo::where('poster_id', Auth::id())
            ->get();
        return view('farmers_market.my_photos')
            ->with('photos', $photos);
    }

    public function my_followers() {
        $follows = Follow::where('followed_id', Auth::id())->get();
        return view('farmers_market.my_followers')
            ->with('follows', $follows);
    }

    public function add_post() {
        return view('farmers_market.add_post');
    }

    public function post_add_post(Request $request) {
        $post = new Post;
        $post->message = $request->message;
        $post->user_id = Auth::id();
        $post->save();
        $this->post_tweet($post->message);
        return redirect(url('/home'));
    }

    public function write_new_review() {
        return view('write_new_review');
    }

    public function add_vendor_item() {
        return view('vendor.add_vendor_item');
    }

    public function post_add_vendor_item(Request $request) {
        $vendor_item = new Vendor_Item;
        $file = $request->file('thumbnail');
        if($file != null) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put('photos/' . $file->getFilename().'.'.$extension,  File::get($file));
            $photo = new Photo();
            $photo->poster_id = Auth::id();
            $photo->mime = $file->getclientmimetype();
            $photo->original_filename = $file->getClientOriginalName();
            $photo->filename = $file->getFilename().'.'.$extension;
            $photo->save();
            $vendor_item->photo_id = $photo->id;
        }
        else {
            $vendor_item->photo_id = null;
        }
        $vendor_item->item = $request->item_name;
        $vendor_item->vendor_id = User::getUserInformationTable(Auth::id())->id;
        $vendor_item->description = $request->description;
        $vendor_item->price = $request->price;
        $vendor_item->price_per = $request->price_per;
        if(isset($request->local)) {
            $vendor_item->local = true;
        }
        else {
            $vendor_item->local = false;
        }
        if(isset($request->nongmo)) {
            $vendor_item->nongmo = true;
        }
        else {
            $vendor_item->nongmo = false;
        }
        if(isset($request->organic)) {
            $vendor_item->organic = true;
        }
        else {
            $vendor_item->organic = false;
        }
        $vendor_item->farm = $request->farm;
        $vendor_item->save();
        return redirect(url('/my_vendor_items'));
    }

    public function my_vendor_items() {
        $vendor_items = Vendor_Item::where('vendor_id', User::getUserInformationTable(Auth::id())->id)->get();
        return view('vendor.my_vendor_items')
            ->with('vendor_items', $vendor_items);
    }
    public function add_vendor_review() {
        return view('add_vendor_review');
    }
    public function post_add_vendor_review(Request $request, $id) {
        $review = new Review;
        $review->reviewed_id = Vendor::find($id)->user_id;
        $review->reviewer_id = Auth::id();
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
        $url = '/vendor/' . $id;
        echo Vendor::find($id);
        return redirect($url);
    }
    public function my_reviews() {
        $reviews = Review::where('reviewer_id', Auth::id())->get();
        return view('patron.my_reviews')
            ->with('reviews', $reviews);
    }
    public function edit_review($id) {
        $review = Review::find($id);
        return view('patron.edit_review')
            ->with('review', $review);
    }
    public function post_edit_review(Request $request, $id) {
        $review = Review::find($id);
        if($review->reviewer_id != Auth::id()) {
            return redirect('/my_reviews');
        }
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->save();
        return redirect('/my_reviews');
    }
    public function add_event() {
        return view('farmers_market.add_event');
    }
    public function post_add_event(Request $request) {
        $event = new Event;
        $event->user_id = Auth::id();
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;
        $event->start_month = $request->start_month;
        $event->start_day = $request->start_day;
        $event->start_year = $request->start_year;
        $event->end_month = $request->end_month;
        $event->end_day = $request->end_day;
        $event->end_year = $request->end_year;
        $event->save();
        return redirect('/my_events');
    }
    public function my_events() {
        $events = Event::where('user_id', Auth::id())->get();
        return view('farmers_market.my_events')
            ->with('events', $events);
    }
    public function my_vendor_map() {
        $id = User::getUserInformationTable(Auth::id())->id;
        $map = Farmers_Market_Vendor_Map::where('farmers_market_id', $id)->first();
        $photo = null;
        if($map != null) {
            $photo = Photo::find($map->photo_id);
        }
        $vendor_ids = Farmers_Market_Vendor::where('farmers_market_id', $id)->get();
        return view('farmers_market.my_vendor_map')
            ->with('photo', $photo)
            ->with('vendor_ids', $vendor_ids)
            ->with('id', $id);
    }
    public function post_my_vendor_map(Request $request) {
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put('/photos/' . $file->getFilename().'.'.$extension,  File::get($file));
        $photo = new Photo();
        $photo->poster_id = Auth::id();
        $photo->mime = $file->getclientmimetype();
        $photo->original_filename = $file->getClientOriginalName();
        $photo->filename = $file->getFilename().'.'.$extension;
        $photo->save();
        $farmers_market_vendor_map = new Farmers_Market_Vendor_Map();
        $farmers_market_vendor_map->farmers_market_id = User::getUserInformationTable(Auth::id())->id;
        $farmers_market_vendor_map->photo_id = $photo->id;
        $farmers_market_vendor_map->save();
        return redirect(url('/my_vendor_map'));
    }
    public function edit_vendor_item($id) {
        $vendor_item = Vendor_Item::find($id);
        return view('vendor.edit_vendor_item')
            ->with('vendor_item', $vendor_item);
    }
    public function post_edit_vendor_item(Request $request, $id) {
        $vendor_item = Vendor_Item::find($id);
        $file = $request->file('thumbnail');
        if($file != null) {
            $extension = $file->getClientOriginalExtension();
            Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
            $photo = new Photo();
            $photo->poster_id = Auth::id();
            $photo->mime = $file->getclientmimetype();
            $photo->original_filename = $file->getClientOriginalName();
            $photo->filename = $file->getFilename().'.'.$extension;
            $photo->save();
            $vendor_item->photo_id = $photo->id;
        }
        else {
            $vendor_item->photo_id = null;
        }
        $vendor_item->item = $request->item_name;
        $vendor_item->vendor_id = User::getUserInformationTable(Auth::id())->id;
        $vendor_item->description = $request->description;
        $vendor_item->price = $request->price;
        $vendor_item->price_per = $request->price_per;
        $vendor_item->farm = $request->farm;
        if(isset($request->local)) {
            $vendor_item->local = true;
        }
        else {
            $vendor_item->local = false;
        }
        if(isset($request->nongmo)) {
            $vendor_item->nongmo = true;
        }
        else {
            $vendor_item->nongmo = false;
        }
        if(isset($request->organic)) {
            $vendor_item->organic = true;
        }
        else {
            $vendor_item->organic = false;
        }
        $vendor_item->save();
        return redirect(url('/my_vendor_items'));
    }
    public function my_vendor_item($id) {
        $my_vendor_item = Vendor_Item::find($id);
        return view('vendor.my_vendor_item')
            ->with('my_vendor_item', $my_vendor_item);
    }
    public function add_time_slot($id) {
        return view('add_farmers_market_hour');
    }
    public function post_add_time_slot(Request $request, $id) {
        $fmh = new Farmers_Market_Hour;
        $fmh->farmers_market_id = User::getUserInformationTable(Auth::id())->id;
        $fmh->day_of_week = $id;
        $fmh->start_time_hour = $request->start_hour;
        $fmh->start_time_min = $request->start_min;
        $fmh->start_time_period = $request->start_period;
        $fmh->end_time_hour = $request->end_hour;
        $fmh->end_time_min = $request->end_min;
        $fmh->end_time_period = $request->end_period;
        $fmh->save();
        return redirect(url('/profile'));
    }

    public function redirectToProvider()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('twitter')->user();
        } catch (Exception $e) {
            return redirect('auth/twitter');
        }

        if(Twitter_Info::where('user_id', Auth::id())->count() == 0) {
           $twitter_info = new Twitter_Info;
           $twitter_info->user_id = Auth::id();
           $twitter_info->token = $user->token;
           $twitter_info->tokenSecret = $user->tokenSecret;
           $twitter_info->nickname = $user->nickname;
           $twitter_info->avatar = $user->avatar;
           $twitter_info->save();
        }
        return redirect('/profile');
    }
    public function post_tweet($message) {
        $twitter_info = Twitter_Info::where('user_id', Auth::id())->first();
        if($twitter_info) {
            Twitter::reconfig(['ACCESS_TOKEN' => $twitter_info->token, 'ACCESS_TOKEN_SECRET' => $twitter_info->token_secret]);
            return Twitter::postTweet(
                array('status' => $message, 
                    'format' => 'json')); 
        }
    }
    public function twitterChange() {

    }
    public function twitterRemove() {
        
    }
    public function post_comment(Request $request, $id) {
        $pc = new Post_Comment;
        $pc->user_id = Auth::id();
        $pc->post_id = $id;
        $pc->comment = $request->comment;
        $pc->save();
        return Redirect::back();
    }
    public function remove_vendor($id) {
        $farmers_market = Farmers_Market::getFarmersMarket(Auth::id());
        $vendor = Farmers_Market_Vendor::where('farmers_market_id', $farmers_market->id)
        ->where('vendor_id', $id)
        ->first();
        $vendor->delete();
        return Redirect::back();
    }
    public function farmers_market_add_photo($id) {
        return view('farmers_market.add_photo');
    }
    public function post_farmers_market_add_photo(Request $request, $id) {
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put('/photos/'. $file->getFilename().'.'.$extension,  File::get($file));
        $photo = new Photo();
        $photo->poster_id = Auth::id();
        $photo->for_id = Farmers_Market::find($id)->user_id;
        $photo->mime = $file->getclientmimetype();
        $photo->original_filename = $file->getClientOriginalName();
        $photo->filename = $file->getFilename().'.'.$extension;
        $photo->caption = $request->caption;
        $photo->save();
        return redirect(url('/farmers_market/' . $id));
    }
}
