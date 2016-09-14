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
                    <label>What's Going On</label>
                    @if (count($posts) == 0)
                        <div class="row" id="">
                            <div class="col-md-12" id="">
                                No one posted anything yet.  Either message businesses to post whats going on.  Or follow more people.
                            </div>
                        </div>
                    @endif
                    <ul class="list-group">
                    @foreach ($posts as $post)
                        <li class="list-group-item">
                            @if (App\User::find($post->user_id)->type_account == 1)
                                <h4><a href="{{url('/farmers_market/'. App\User::getUserInformationTable($post->user_id)->id)}}">{{App\User::getNameOfUser($post->user_id)}}</a></h4>
                            @elseif (App\User::find($post->user_id)->type_account == 2)
                                <h4><a href="{{url('/patron/'. App\User::getUserInformationTable($post->user_id)->id)}}">{{App\User::getNameOfUser($post->user_id)}}</a></h4>
                            @elseif (App\User::find($post->user_id)->type_account == 2)
                                <h4><a href="{{url('/vendor/'. App\User::getUserInformationTable($post->user_id)->id)}}">{{App\User::getNameOfUser($post->user_id)}}</a></h4>
                            @endif
                            <p>{{$post->message}}</p>
                            <p>
                                @if (App\Post_Like::where('user_id', Auth::id())->where('post_id', $post->id)->count() == 0)
                                    <a href="{{url('/like_post/'.$post->id)}}" class="btn btn-default">Like</a>
                                @else
                                    <a href="{{url('/unlike_post/'.$post->id)}}" class="btn btn-default">Unlike</a>
                                @endif
                                </p>
                            <p>
                                {{App\Post_Like::count()}}<i style="padding-left: 10px;" class="fa fa-thumbs-o-up" aria-hidden="true"></i>
                            </p>
                        </li>
                    @endforeach

                    </ul>
                    <label>My Reviews ({{count($my_reviews)}})</label>
                    <a style="padding-left:10px" href="{{url('/write_new_review')}}">Write A New Review</a>
                    <a style="padding-left:10px" href="{{url('/my_reviews')}}">View My Reviews</a>
                    @if (count($my_reviews) == 0)
                        <p> You have written no Reviews yet. </p>
                    @else
                        <ul class="list-group">
                            @foreach ($my_reviews as $my_review)
                                <li class="list-group-item">
                                    <p>{{$my_review->review}}</p>
                                    <p>{{$my_review->rating}}</p>
                                    <a href="{{url('edit/review/' . $my_review->id)}}" class="btn btn-default">Edit</a>
                                    <form method="POST" action="{{url('/delete/review')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" readonly="readonly" value="{{$my_review->id}}" name="id">
                                        <button class="btn btn-default">Delete</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <label>People You're Following ({{count($follows)}})</label> <a style="padding-left: 10px" href="">View All Follows</a>
                    <ul class="list-group">
                    @foreach ($follows as $follow)
                        <li class="list-group-item">
                            @if (App\User::find($follow->followed_id)->type_account == 1)
                                <h4><a href="{{url('/farmers_market/'. App\User::getUserInformationTable($follow->followed_id)->id)}}">{{App\User::getNameOfUser($follow->followed_id)}}</a></h4>
                            @elseif (App\User::find($follow->followed_id)->type_account == 2)
                                <h4><a href="{{url('/patron/'. App\User::getUserInformationTable($follow->followed_id)->id)}}">{{App\User::getNameOfUser($follow->followed_id)}}</a></h4>
                            @elseif (App\User::find($follow->followed_id)->type_account == 2)
                                <h4><a href="{{url('/vendor/'. App\User::getUserInformationTable($follow->followed_id)->id)}}">{{App\User::getNameOfUser($follow->followed_id)}}</a></h4>
                            @endif
                        </li>
                    @endforeach

                    </ul>
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

