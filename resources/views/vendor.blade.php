@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
</style>
<div id="farmers_market"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="row" id="">
							<div class="col-md-6">
								<h3>
									{{$vendor->vendor_name}}
								</h3>
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
							</div>
						</div>
						<div class="row" id="">
							<div class="col-md-12" id="">
								<h4>Reviews ({{count($vendor_reviews)}})</h4>	
								<ul class="list-group">
									@if (count($vendor_reviews) == 0)
									<li class="list-group-item">
										<a href="">No Reviews are available.  Click here to add a new review</a>
									</li>
									@else
										@foreach($vendor_reviews as $vendor_review)
											<li class="list-group-item">
				                                <h3><a href="{{url('/farmers_market/'. App\User::getUserInformationTable($vendor_review->reviewed_id)->id)}}">{{App\User::getNameOfUser($vendor_review->reviewed_id)}}</a></h3>
				                                <p>{{$vendor_review->review}}</p>
				                                <p>{{$vendor_review->rating}}</p>
											</li>
										@endforeach
									@endif
								</ul>
								<a href="{{url('/vendor/' . $vendor->id. '/review')}}" class="btn btn-default btn-sm">Review</a>
							</div>
						</div>
						<div class="row">
                        <div class="col-md-12">
                            <label style="padding-top: 10px">Items I'm Selling</label> ({{count($vendor_items)}})
                            <ul class="list-group">
                                @if(count($vendor_items) == 0)
                                	This Vendor has not listed any goods to be sold.  Contact them and ask them to put some up.
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
</div>
@endsection