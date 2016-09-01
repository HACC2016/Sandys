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
                    <ul class="list-group">
                    @foreach ($posts as $post)
                            <li class="list-group-item">
                                <h3>{{App\User::getNameOfUser($post->user_id)}}</h3>
                                <p>{{$post->message}}</p>
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

