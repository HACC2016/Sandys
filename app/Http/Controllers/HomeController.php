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

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
            return view('farmers_market.home')
                ->with('photos', $photos)
                ->with('vendors', $vendors)
                ->with('posts', $posts)
                ->with('follows', $follows);
        }
        elseif(Auth::user()->type_account == 2) {
            $follows = Follow::where('follower_id', Auth::id())->get();
            $posts = Post::orderBy('created_at');
            for($i = 0; $i < count($follows); $i++) {
                $posts = $posts->orWhere('user_id', $follows[$i]->followed_id);
            }
            $posts = $posts->get();
            return view('patron.home')
                ->with('posts', $posts);
        }
        elseif(Auth::user()->type_account == 3) {
            $vendor = Vendor::where('user_id', Auth::id())->first();
            $photos = Photo::where('poster_id', Auth::id())
                ->take(4)
                ->get();
            $follows = Follow::where('followed_id', Auth::id())->get();
            $posts = Post::where('user_id', Auth::id())->get();
            $vendor_items = Vendor_Item::where('vendor_id', $vendor->id)->get();
            return view('vendor.home')
                ->with('photos', $photos)
                ->with('posts', $posts)
                ->with('vendor_items', $vendor_items)
                ->with('follows', $follows);
        }
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
            return view('profile.farmers_market')
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
        $review->reviewed_id = $id;
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
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $photo = new Photo();
        $photo->poster_id = Auth::id();
        $photo->mime = $file->getclientmimetype();
        $photo->original_filename = $file->getClientOriginalName();
        $photo->filename = $file->getFilename().'.'.$extension;
        $photo->caption = $request->caption;
        $photo->save();
        return redirect(url('/home'));
    }

    
    public function get($filename){
        $entry = Photo::where('filename', '=', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);
        return (new Response($file, 200))
              ->header('Content-Type', $entry->mime);
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
        return redirect(url('/home'));
    }

    public function write_new_review() {
        return view('write_new_review');
    }

    public function add_vendor_item() {
        return view('vendor.add_vendor_item');
    }

    public function post_add_vendor_item(Request $request) {
        $file = $request->file('thumbnail');
        $extension = $file->getClientOriginalExtension();
        Storage::disk('local')->put($file->getFilename().'.'.$extension,  File::get($file));
        $photo = new Photo();
        $photo->poster_id = Auth::id();
        $photo->mime = $file->getclientmimetype();
        $photo->original_filename = $file->getClientOriginalName();
        $photo->filename = $file->getFilename().'.'.$extension;
        $photo->save();
        $vendor_item = new Vendor_Item;
        $vendor_item->item = $request->item_name;
        $vendor_item->vendor_id = User::getUserInformationTable(Auth::id())->id;
        $vendor_item->description = $request->description;
        $vendor_item->price = $request->price;
        $vendor_item->price_per = $request->price_per;
        $vendor_item->photo_id = $photo->id;
        $vendor_item->save();
        return redirect(url('/my_vendor_items'));
    }

    public function my_vendor_items() {
        $vendor_items = Vendor_Item::where('vendor_id', User::getUserInformationTable(Auth::id())->id)->get();
        return view('vendor.my_vendor_items')
            ->with('vendor_items', $vendor_items);
    }
}
