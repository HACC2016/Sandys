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
                            <label>My Vendors ({{count($vendors)}})</label>
                            <a style="padding-left: 10px" href="{{url('/add_vendor')}}">Add A Vendor</a>
                            <a style="padding-left: 10px" href="{{url('/my_vendors')}}">View My Vendors</a>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label>My Followers ({{count($follows)}})</label>
                            <a style="padding-left: 10px" href="{{url('/my_followers')}}">View My Followers</a>
                        </div>
                    </div>
                </div>
                <div class="panel-heading">Posts <a style="padding-left: 10px" href="{{url('/add_post')}}">Add A New Post</a>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($posts as $post)
                            <li class="list-group-item">
                                <h4>{{App\User::getNameOfUser($post->user_id)}}</h4>
                                <p>{{$post->message}}</p>
                                <p>{{$post->created_at}}</p>
                                <p>
                                <a href="{{url('/like_post/'.$post->id)}}" class="btn btn-default">Like</a>
                                </p>
                                <p>
                                {{App\Post_Like::where('user_id', $post->user_id)->count()}}<i style="padding-left: 10px;" class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                                </p>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/farmers_market_home.js"></script>
@endsection

