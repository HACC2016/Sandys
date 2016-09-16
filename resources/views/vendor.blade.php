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
</style>
<div id="farmers_market"> <!-- vue container -->
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
											
											<div class="col-md-6" id="">
													
													
												
												<h2 style="padding: 0px; margin: 0px;">
													{{$vendor->vendor_name}}
												</h2>
												

												@if ($vendor->vendor_owner_name != "")
													<p>Owner's Name:{{$vendor->vendor_owner_name}}</p>
												@endif
												@if ($vendor->vendor_owner_phone != "")
													<p>Owner's Phone Number:{{$vendor->vendor_owner_phone}}</p>
												@endif
												@if ($vendor->website != "")
													<p>Website: {{$vendor->website}}</p>
												@endif
												@if($vendor->user_id == null)
													Vendor is not claimed.  Click to claim Vendor
												@endif
												<p>
												<a href="">Message This Vendor</a>
												</p>
												<a href="/vendor/{{$vendor->id}}/review" class="btn btn-default"><i class="fa fa-pencil-square fa-lg"></i><span style="padding-left: 5px;">Write A Review</span></a>
												<a href="" class="btn btn-default"><i class="fa fa-camera-retro fa-lg"></i><span style="padding-left: 5px;">Add A Photo</span></a>	
											
												
											</div>
											<div class="col-md-6" id="">
												<ul class="list-group">
													<li class="list-group-item li_header">
														Schedule
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
									<label>Reviews ({{count($vendor_reviews)}})</label><a style="padding-left: 10px" href="/vendor/{{$vendor->id}}/reviews">View All Reviews</a>
								</div>
								<div class="panel-body" id="" style="padding: 0px; padding-top: 15px; padding-bottom: 15px;">
									<div class="col-md-6" id="">
										<ul class="list-group" style="margin-bottom: 10px; max-height: 340px; overflow: auto">
											@if (count($vendor_reviews) == 0)
											<li class="list-group-item">
												<a href="">No Reviews are available.  Click here to add a new review</a>
											</li>
											@else
												@foreach($vendor_reviews as $vendor_review)
													<li class="list-group-item" style="padding: 10px;">
														<h4 style="margin-top: 0px"><a href="{{App\User::getUrlForUser($highest_review->reviewer_id)}}">{{App\User::getNameOfUser($vendor_review->reviewer_id)}}</a></h4>
						                                <p>{{$vendor_review->review}}</p>
						                                <p style="margin-bottom: 0px">Rating: {{$vendor_review->rating}}/5</p>
													</li>
												@endforeach
											@endif
										</ul>
										<a href="{{url('/vendor/' . $vendor->id. '/review')}}" class="btn btn-default btn-sm form-control">Add A Review</a>
									</div>
									<div class="col-md-6" id="">
										<h3>Average Rating: {{$average_rating}}</h3>
										@if(count($vendor_reviews) != 0)
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
						<div class="row">
							<div class="panel panel-default vendor_panel" id="">
								<div class="panel-heading" style="padding: 10px; padding-bottom: 5px">
									<label style="padding-top: 10px">Items I'm Selling</label> ({{count($vendor_items)}})<a style="padding-left: 10px" href="/vendor/{{$vendor->id}}/vendor_items">View All Items Being Sold</a>
								</div>
								<div class="panel-body" id="" style="padding: 0px; padding-top: 15px; padding-bottom: 15px;">
			                        <div class="col-md-12">
			                            <ul class="list-group" style="max-height: 500px; overflow: auto;">
			                                @if(count($vendor_items) == 0)
			                                	This Vendor has not listed any goods to be sold.  Contact them and ask them to put some up.
			                                @else
				                                <li class="list-group-item" style="background-color: #f5f5f5">
				                                	Items
				                                </li>
			                                   @foreach ($vendor_items as $vendor_item)
			                                        <li class="list-group-item">
			                                            <div class="row">
			                                                <div class="col-md-3" id="">
			                                                	@if($vendor_item->photo_id != null)
			                                                    <img style="max-height: 200px" src="{{route('getentry', App\Photo::find($vendor_item->photo_id)->filename)}}" alt="ALT NAME" class="img-responsive" />
			                                                    @endif
			                                                </div>
			                                                <div class="col-md-9 item_info" id="">
			                                                    <h4>{{$vendor_item->item}}</h4>
			                                                    <p>{{$vendor_item->description}}</p>
			                                                    <p>${{$vendor_item->price}} per {{App\Vendor_Item::getPricePer($vendor_item->price_per)}}</p>
			                                                    <p>Grew/Made at {{$vendor_item->farm}}</p>
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
	                        </div>
	                    </div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection