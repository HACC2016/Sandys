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
                            <label style="padding-top: 10px">Items I'm Selling</label> ({{count($vendor_items)}}) <a style="padding-left:10px;" href="{{url('my_vendor_items')}}">Add A Vendor Item</a>
                            <ul class="list-group">
                                @if(count($vendor_items) == 0)
                                    <a href="{{url('/add_vendor_item')}}">
                                    You are currently not selling Anything.  Click Here to add items</a>
                                @else
                                    @foreach ($vendor_items as $vendor_item)
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-3" id="">
                                                    <img src="{{route('getentry', App\Photo::find($vendor_item->photo_id)->filename)}}" alt="ALT NAME" class="img-responsive" />
                                                </div>
                                                <div class="col-md-9" id="">
                                                    <h4>{{$vendor_item->item}}</h4>
                                                    <p>{{$vendor_item->description}}</p>
                                                    <p>${{$vendor_item->price}} per {{$vendor_item->price_per}}</p>
                                                </div>
                                            </div>
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

