@extends('layouts.app')

@section('content')
<div id="farmers_market_home">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome {{App\User::getNameOfUser(Auth::id())}}
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Photos ({{count($photos)}})</label>
                            <a style="padding-left: 10px" href="{{url('/post_photo')}}">Post A Photo</a>
                            <a style="padding-left: 10px" href="{{url('/my_photos')}}">View All Photos</a>
                            <div class="row">
                            @foreach ($photos as $photo)
                                    <div class="col-md-3" id="">
                                        <img src="{{route('getentry', $photo->filename)}}" alt="ALT NAME" class="img-responsive" />
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label style="padding-top: 10px">What's Going On</label>
                            <ul class="list-group">
                                @if(count($posts) == 0)
                                    Theres Nothing going On.  Go Ahead and follow some farmers markets, vendors, or patrons in order to see what they're doing.
                                @else
                                    @foreach ($posts as $post)
                                            <li class="list-group-item">
                                                <h3>{{App\User::getNameOfUser($post->user_id)}}</h3>
                                                <p>{{$post->message}}</p>
                                            </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <label style="padding-top: 10px">Items I'm Selling</label> ({{count($vendor_items)}}) 
                            <a style="padding-left:10px;" href="{{url('my_vendor_items')}}">View My Vendor Items</a>
                            <a style="padding-left:10px;" href="{{url('add_vendor_item')}}">Add A Vendor Item</a>
                            <ul class="list-group" style="max-height: 300px; overflow:scroll;">
                                @if(count($vendor_items) == 0)
                                    <a href="{{url('/add_vendor_item')}}">
                                    You are currently not selling Anything.  Click Here to add items</a>
                                @else
                                    @foreach ($vendor_items as $vendor_item)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-3" id="">
                                                    @if($vendor_item->photo_id != null)
                                                        <img src="{{route('getentry', App\Photo::find($vendor_item->photo_id)->filename)}}" alt="ALT NAME" class="img-responsive" />
                                                    @endif
                                                </div>
                                                <div class="col-md-9" id="">
                                                    <h4>{{$vendor_item->item}}</h4>
                                                    <p>{{$vendor_item->description}}</p>
                                                    <p>${{$vendor_item->price}} per {{App\Vendor_Item::getPricePer($vendor_item->price_per)}}</p>
                                                    <p>
                                                    @if($vendor_item->local == 1)
                                                    <span class="label label-success">Local</span>
                                                    @else
                                                    <span class="label label-danger">Not Local</span>
                                                    @endif
                                                    @if($vendor_item->nongmo == 1)
                                                    <span class="label label-success">Non-GMO</span>
                                                    @else
                                                    <span class="label label-danger">GMO</span>
                                                    @endif
                                                    @if($vendor_item->organic == 1)
                                                    <span class="label label-success">Organic</span>
                                                    @else
                                                    <span class="label label-danger">Not Organic</span>
                                                    @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label style="padding-top: 10px">Farmers Markets You Are A Part Of</label>
                            <ul class="list-group">
                                @if(count($farmers_markets_part_of) == 0)
                                    <p>
                                    You are a part of no Farmers Markets.  Please notify the farmers market you are apart of to add you as a vendor.  If you are not part of any farmers markets please inquire about registering as a vendor under a farmers markets.  <a href="/find/farmers_markets">Click Here to Find Farmers Markets.</a>
                                    </p>
                                    <p>
                                    You can read up on the perks of being a farmers market here.
                                    </p>
                                @else
                                    @foreach ($farmers_markets_part_of as $farmers_market_part_of)
                                        <li class="list-group-item">
                                        <h4>{{App\Farmers_Market::find($farmers_market_part_of->farmers_market_id)->farmers_market_name}}</h4>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</div>
<div id="farmers_market_home">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/farmers_market_home.js"></script>
@endsection

