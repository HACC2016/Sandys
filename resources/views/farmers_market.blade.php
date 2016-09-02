@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
</style>
<div id="farmers_market"> <!-- vue container -->
<input type="hidden" v-model="lat" value="{{$farmers_market->lat}}">
<input type="hidden" v-model="lng" value="{{$farmers_market->lng}}">
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row" id="">
							<div class="col-md-6" id="">
								Name: {{$farmers_market->farmers_market_name}}
								<br>
								Address: {{$farmers_market->street_address}} <a href=""> directions </a>
								<br>
								State, County: {{$farmers_market->state}}, {{$farmers_market->county}}
								<br>
								website: {{$farmers_market->website}}
								<br>
								phone number: {{$farmers_market->organizer_phone_number}}
								<br>
								phone number: {{$farmers_market->organizer_name}}
								<br>
								@if (Auth::check())
								<a href="{{url('/follow/'.$farmers_market->user_id)}}" class="btn btn-default">Follow</a>
								@endif
							</div>
							<div class="col-md-6" id="">
								<div id="map" style="width: 100%; height: 140px;"></div>
							</div>
						</div>
						<div class="row" id="">
							<div class="col-md-12" id="">
								<h4>Reviews</h4>	
								<ul class="list-group">
									@if (count($farmers_market_reviews) != 0)
										@foreach ($farmers_market_reviews as $farmers_market_review)
											<li class="list-group-item">
												<h4>{{App\User::getNameOfUser($farmers_market_review->reviewer_id)}}</h4>
												<p>{{$farmers_market_review->review}}</p>
												<p>{{$farmers_market_review->created_at}}</p>
												<p>Rating: {{$farmers_market_review->rating}}/5</p>
											</li>
										@endforeach
									@else 
										No Reviews
									@endif
								</ul>
								<a href="{{$farmers_market->id}}/review" class="btn btn-default btn-sm">Review</a>
							</div>
						</div>
						<div class="row" id="">
							<div class="col-md-12" id="">
								<h4>Vendor List</h4>
								<ul class="list-group">
									@if(count($vendors_id) == 0)
										No Vendors Are Listed
									@else
										<ul class="list-group">
											@foreach ($vendors_id as $vendor_id)
												<li class="list-group-item">
												<h4>
													<a href="{{url('/vendor/'.$vendor_id->id)}}">{{App\Vendor::find($vendor_id->id)->vendor_name}}</a>
												</h4>
												</li>
											@endforeach
										</ul>
									@endif
								</ul>
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/farmers_market.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSlEzpoQVs5JupSo1ed2Wc9sLCvCsrppI&callback=initialize"> </script>
@endsection