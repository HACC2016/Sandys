@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
	.vendor_info p {
		margin: 0px;
		padding: 0px;
	}
	.item_info p {
		margin: 0px;
		padding: 0px;
	}
	.vendor_panel {
		margin: 15px;
	}
	.li_header {
		background-color: #f5f5f5;
	}
	.no_margin {
		margin: 0px;
	}
</style>
<div id="farmers_market"> <!-- vue container -->
<input type="hidden" v-model="lat" value="{{$farmers_market->lat}}">
<input type="hidden" v-model="lng" value="{{$farmers_market->lng}}">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row" id="">
						<div class="col-md-12 vendor_info">
								<ul class="list-group">
									<li class="list-group-item">
										<div class="row" id="">
											<div class="col-md-3" id="">
												<div id="map" style="width: 100%; height: 200px;"></div>
											</div>
											
											<div class="col-md-5" id="">
													
													
												
												<h2 style="padding: 0px; margin: 0px;">
													{{$farmers_market->farmers_market_name}}
												</h2>
												

												<p>Owner's Name:{{$farmers_market->organizer_name}}</p>
												<p><i class="fa fa-phone-square" aria-hidden="true"></i> {{$farmers_market->organizer_phone_number}}</p>
												<p><i class="fa fa-map-marker" aria-hidden="true"></i> {{$farmers_market->street_address}}</p>
												<p>{{$farmers_market->state}}, {{$farmers_market->state}}, {{$farmers_market->county}}</p>
												<p><a href="">Get Directions</p>
												<div style="padding-top: 10px;">
												<a href="/vendor/{{$farmers_market->id}}/review" class="btn btn-default"><i class="fa fa-pencil-square fa-lg"></i><span style="padding-left: 5px;">Write A Review</span></a>
												<a href="" class="btn btn-default"><i class="fa fa-camera-retro fa-lg"></i><span style="padding-left: 5px;">Add A Photo</span></a>	
												@if (Auth::check())
													@if (App\Follow::where('follower_id', Auth::id())->where('followed_id', $farmers_market->user_id)->count() == 0)
														<a href="{{url('/follow/'.$farmers_market->user_id)}}" class="btn btn-default"><i class="fa fa-check-square" aria-hidden="true"></i><span style="padding-left:5px">Follow</span></a>
													@else
														<a href="{{url('/unfollow/'.$farmers_market->user_id)}}" class="btn btn-default"><i class="fa fa-check-square" aria-hidden="true"></i><span style="padding-left:5px">UnFollow</span></a>
													@endif
												@endif
												</div>
											
												
											</div>
											<div class="col-md-4" id="">
												<ul class="list-group" style="margin-bottom: 0px">
													<li class="list-group-item li_header">
														Schedule
													</li>
													<li class="list-group-item">
														<p>
														<div class="row">
															<div class="col-md-4">
																Monday:	
															</div>
															<div class="col-md-8">
																@foreach ($monday_hours as $monday_hour)
																	{{$monday_hour->start_time_hour}}
																	:
																	@if($monday_hour->start_time_min == 0)
																	00
																	@else
																	{{$monday_hour->start_time_min}} 
																	@endif
																	@if($monday_hour->start_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																	 - 
																	{{$monday_hour->end_time_hour}}
																	:
																	@if($monday_hour->end_time_min == 0)
																	00
																	@else
																	{{$monday_hour->end_time_min}} 
																	@endif
																	@if($monday_hour->end_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																@endforeach
															</div>
														</div>
														</p>
														<p>
														<div class="row">
															<div class="col-md-4">
																Tuesday:	
															</div>
															<div class="col-md-8">
																@foreach ($tuesday_hours as $tuesday_hour)
																	{{$tuesday_hour->start_time_hour}}
																	:
																	@if($tuesday_hour->start_time_min == 0)
																	00
																	@else
																	{{$tuesday_hour->start_time_min}} 
																	@endif
																	@if($tuesday_hour->start_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																	 - 
																	{{$tuesday_hour->end_time_hour}}
																	:
																	@if($tuesday_hour->end_time_min == 0)
																	00
																	@else
																	{{$tuesday_hour->end_time_min}} 
																	@endif
																	@if($tuesday_hour->end_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																@endforeach
															</div>
														</div>
														</p>
														<p>
														<div class="row">
															<div class="col-md-4">
																Wednesday:	
															</div>
															<div class="col-md-8">
																@foreach ($wednesday_hours as $wednesday_hour)
																	{{$wednesday_hour->start_time_hour}}
																	:
																	@if($wednesday_hour->start_time_min == 0)
																	00
																	@else
																	{{$wednesday_hour->start_time_min}} 
																	@endif
																	@if($wednesday_hour->start_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																	 - 
																	{{$wednesday_hour->end_time_hour}}
																	:
																	@if($wednesday_hour->end_time_min == 0)
																	00
																	@else
																	{{$wednesday_hour->end_time_min}} 
																	@endif
																	@if($wednesday_hour->end_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																@endforeach
															</div>
														</div>
														</p>
														<p>
														<div class="row">
															<div class="col-md-4">
																Thursday:	
															</div>
															<div class="col-md-8">
																@foreach ($thursday_hours as $thursday_hour)
																	{{$thursday_hour->start_time_hour}}
																	:
																	@if($thursday_hour->start_time_min == 0)
																	00
																	@else
																	{{$thursday_hour->start_time_min}} 
																	@endif
																	@if($thursday_hour->start_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																	 - 
																	{{$thursday_hour->end_time_hour}}
																	:
																	@if($thursday_hour->end_time_min == 0)
																	00
																	@else
																	{{$thursday_hour->end_time_min}} 
																	@endif
																	@if($thursday_hour->end_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																@endforeach
															</div>
														</div>
														</p>
														<p>
														<div class="row">
															<div class="col-md-4">
																Friday:	
															</div>
															<div class="col-md-8">
																@foreach ($friday_hours as $friday_hour)
																	{{$friday_hour->start_time_hour}}
																	:
																	@if($friday_hour->start_time_min == 0)
																	00
																	@else
																	{{$friday_hour->start_time_min}} 
																	@endif
																	@if($friday_hour->start_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																	 - 
																	{{$friday_hour->end_time_hour}}
																	:
																	@if($friday_hour->end_time_min == 0)
																	00
																	@else
																	{{$friday_hour->end_time_min}} 
																	@endif
																	@if($friday_hour->end_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																@endforeach
															</div>
														</div>
														</p>
														<p>
														<div class="row">
															<div class="col-md-4">
																Saturday:	
															</div>
															<div class="col-md-8">
																@foreach ($saturday_hours as $saturday_hour)
																	{{$saturday_hour->start_time_hour}}
																	:
																	@if($saturday_hour->start_time_min == 0)
																	00
																	@else
																	{{$saturday_hour->start_time_min}} 
																	@endif
																	@if($saturday_hour->start_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																	 - 
																	{{$saturday_hour->end_time_hour}}
																	:
																	@if($saturday_hour->end_time_min == 0)
																	00
																	@else
																	{{$saturday_hour->end_time_min}} 
																	@endif
																	@if($saturday_hour->end_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																@endforeach
															</div>
														</div>
														</p>
														<p>
														<div class="row">
															<div class="col-md-4">
																Sunday:	
															</div>
															<div class="col-md-8">
																@foreach ($sunday_hours as $sunday_hour)
																	{{$sunday_hour->start_time_hour}}
																	:
																	@if($sunday_hour->start_time_min == 0)
																	00
																	@else
																	{{$sunday_hour->start_time_min}} 
																	@endif
																	@if($sunday_hour->start_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																	 - 
																	{{$sunday_hour->end_time_hour}}
																	:
																	@if($sunday_hour->end_time_min == 0)
																	00
																	@else
																	{{$sunday_hour->end_time_min}} 
																	@endif
																	@if($sunday_hour->end_time_period == 1)
																	AM
																	@else
																	PM
																	@endif
																@endforeach
															</div>
														</div>
														</p>
													</li>
												</ul>
												
											</div>
											
										</div>
									</li>
								</ul>
									
							</div>
						</div>
						<div class="row" id="">
							<div class="panel panel-default vendor_panel" id="" >
								<div class="panel-heading" style="padding: 10px; padding-bottom: 5px">
									<label>Reviews ({{count($farmers_market_reviews)}})</label><a style="padding-left: 10px" href="/vendor/{{$farmers_market->id}}/reviews">View All Reviews</a>
								</div>
								<div class="panel-body" id="" style="padding: 0px; padding-top: 15px; padding-bottom: 15px;">
									<div class="col-md-6" id="">
										<ul class="list-group" style="margin-bottom: 10px; max-height: 340px; overflow: auto">
											@if (count($farmers_market_reviews) == 0)
											<li class="list-group-item">
												<a href="">No Reviews are available.  Click here to add a new review</a>
											</li>
											@else
												@foreach($farmers_market_reviews as $farmers_market_review)
													<li class="list-group-item" style="padding: 10px;">
														<h4 style="margin-top: 0px"><a href="{{App\User::getUrlForUser($highest_review->reviewer_id)}}">{{App\User::getNameOfUser($farmers_market_review->reviewer_id)}}</a></h4>
						                                <p>{{$farmers_market_review->review}}</p>
						                                <p style="margin-bottom: 0px">Rating: {{$farmers_market_review->rating}}/5</p>
													</li>
												@endforeach
											@endif
										</ul>
										<a href="{{url('/farmers_market/' . $farmers_market->id. '/review')}}" class="btn btn-default btn-sm form-control">Add A Review</a>
									</div>
									<div class="col-md-6" id="">
										<h3>Average Rating: {{$average_rating}}</h3>
										@if(count($farmers_market_reviews) != 0)
										<div class="row">
											<div class="col-md-12">
												<label>Highest Rated Review</label>
												<ul class="list-group">
													<li class="list-group-item" style="padding: 10px;">
														<h4 style="margin-top: 0px"><a href="{{App\User::getUrlForUser($highest_review->reviewer_id)}}">{{App\User::getNameOfUser($highest_review->reviewer_id)}}</a></h4>
						                                <p>{{$highest_review->review}}</p>
						                                <p style="margin-bottom: 0px">Rating: {{$highest_review->rating}}/5</p>
													</li>
												</ul>
												<label>Lowest Rated Review</label>
												<ul class="list-group">
													<li class="list-group-item" style="padding: 10px;">
														<h4 style="margin-top: 0px"><a href="{{App\User::getUrlForUser($highest_review->reviewer_id)}}">{{App\User::getNameOfUser($lowest_review->reviewed_id)}}</a></h4>
						                                <p>{{$lowest_review->review}}</p>
						                                <p style="margin: 0px">Rating: {{$lowest_review->rating}}/5</p>
													</li>
												</ul>
											</div>
										</div>
										@endif
									</div>
										
								</div>
							</div>
						</div>
						<div class="row" id="" >
							<div class="col-md-6" id="" style="">
								<ul class="list-group">
									<li class="list-group-item li_header">
										<label>Search Items Being Sold At This Farmers Market ({{count($farmers_market_items)}})</label><a style="padding-left: 10px" href="/farmers_market/{{$farmers_market->id}}/vendors">View All Items Being Sold</a>
									</li>
									<li class="list-group-item">
									<input class="form-control" type="text" placeholder="Search For Vendor selling Item" v-on:keyup="itemChanged({{$farmers_market->id}})" v-model="item_name">
									</li>
									<div v-for="item in items">
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-6" id="">
													<h4 style="margin: 0px;">
													@{{item.item}}
													</h4>
													<p style="margin: 0px; padding: 0px;">
													@{{item.description}}
													</p style="margin: 0px; padding: 0px;">
													<a href="/vendor/@{{item.vendor_id}}">@{{item.vendor_name}}</a>
												</div>
												<div class="col-md-6" id="">
													<a href="">Locate Vendor On Vendor Map</a>
												</div>
											</div>
										</li>
									</div>
								</ul>
							</div>
							<div class="col-md-6" id="" style="">
								<ul class="list-group">
									<li class="list-group-item li_header">
										<label>Vendors ({{count($vendors_id)}})</label><a style="padding-left: 10px" href="/farmers_market/{{$farmers_market->id}}/vendors">View All Vendors</a><a style="padding-left: 10px" href="/farmers_market/{{$farmers_market->id}}/vendor_map">View Vendor Map</a>
									</li>
									@foreach ($vendors_id as $vendor_id)
										<li class="list-group-item">
										<h4 style="margin: 0px">
											<a href="{{url('/vendor/'.$vendor_id->id)}}">{{App\Vendor::find($vendor_id->id)->vendor_name}}</a>
										</h4>
										</li>
									@endforeach
								</ul>
							</div>
						</div>
						
						<div class="row" id="" >
							<div class="col-md-12" id="" style="">
								<ul class="list-group">
									<li class="list-group-item li_header">
										<label>Event List ({{count($events)}})</label><a style="padding-left: 10px" href="/farmers_market/{{$farmers_market->id}}/events">View All Events</a>
									</li>
									@foreach ($events as $event)
										<li class="list-group-item">
											<h4 class="no_margin" style="padding-top: 5px; padding-bottom: 5px;">{{$event->event_name}}</h4>
											<p class="no_margin">{{$event->event_description}}</p>
											<p class="no_margin">{{$event->event_description}}</p>
										</li>
									@endforeach
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