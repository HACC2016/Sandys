@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
	.nospacing {
		margin: 0px;
		padding: 0px;
	}
	.padding_bottom {
		margin-bottom: 0px;
		padding-bottom: 5px;
	}
	.padding-left {
		margin-bottom: 0px;
		padding-left: 10px;
	}
</style>
<div id="farmers_market"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<label><a href="/farmers_market/{{$farmers_market->id}}">{{$farmers_market->farmers_market_name}}</a> Vendors ({{count($vendors)}})</label>
					</div> 
					<div class="panel-body">
						<ul class="list-group">
							@foreach($vendors as $vendor)
								<li class="list-group-item">
								<p class="padding_bottom">
								<span class="padding_bottom" style="font-size: 20px;">
								<a href="/vendor/{{$vendor->vendor_id}}">{{App\Vendor::find($vendor->vendor_id)->vendor_name}}</a>
								</span>
								<span class="padding-left">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-half-o" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
								</span>
								<span class="padding-left">20 Reviews</span>
								</p>
								<p class="nospacing">Owner: {{App\Vendor::find($vendor->id)->vendor_owner_name}}</p>
								<p class="nospacing"><i class="fa fa-phone" aria-hidden="true"></i> {{App\Vendor::find($vendor->id)->vendor_owner_phone}}</p>
								</li>
							@endforeach	
						</ul>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection