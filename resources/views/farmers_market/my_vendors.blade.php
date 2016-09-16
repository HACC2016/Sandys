@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
	.no_spacing {
		margin: 0px;
		padding: 0px;
	}
	.list_header {
		font-size: 20px;
		margin: 0px;
		padding-bottom: 5px;
	}
</style>
<div id="add_vendor"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
	                <div class="panel-heading">My Vendors <a style="padding-left: 10px;" href="{{url('/add_vendor')}}">Add A Vendor</a>
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
							<div class="col-md-12" id="">
								<ul class="list-group">
								@foreach ($vendors as $vendor)
									<li class="list-group-item">
										<div class="row">
											<div class="col-md-9" id="">
												<?php $v = App\Vendor::find($vendor->vendor_id)?>
												<p class="list_header">{{$v->vendor_name}}</p>
												<p class="no_spacing">Owner: {{$v->vendor_owner_name}}</p>
												<p class="no_spacing">
												<i class="fa fa-phone" aria-hidden="true"></i>
												<span style="padding-left: 2px">
												{{$v->vendor_owner_phone}}
												</span>
												</p>
											</div>
											<div class="col-md-3" id="">
												<a href="/remove_vendor/{{$v->id}}" class="btn btn-default pull-right">Remove</a>
											</div>
										</div>
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
@endsection