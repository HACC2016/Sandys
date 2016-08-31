@extends('layouts.app')

@section('content')
<div id="farmers_market_home">
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome
                    @if (Auth::user()->type_account == 1)
                        {{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->farmers_market_name }} 
                    @elseif (Auth::user()->type_account == 2)
                        {{Auth::user()->email}}
                    @elseif (Auth::user()->type_account == 3)
                        {{ App\Vendor::findVendorMarketByUserId(Auth::user()->id)->vendor_name }} 
                    @endif
                </div>

                <div class="panel-body">
                <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills">
  <li role="presentation" class="active"><a href="#">Home</a></li>
  <li role="presentation"><a href="#">Profile</a></li>
  <li role="presentation"><a href="#">Messages</a></li>
</ul>
</div>
</div>
                    <div class="row">
                        <div class="col-md-12" id="">
                            <form action="{{url('/post_something')}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea style="resize: none;" class="form-control" rows="5" id="comment" placeholder="Post Something"></textarea>
                                </div>
                                <input type="file" name="photo" v-model="photo">
                                <hr>
                                <span style="float:right;"><button type="submit" class="btn btn-default">Post</button></span>
                            </form>
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

