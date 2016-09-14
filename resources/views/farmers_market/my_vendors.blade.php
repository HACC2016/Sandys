@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
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
										<?php $v = App\Vendor::find($vendor->vendor_id)?>
										<h4>{{$v->vendor_name}}</h4>
										<p>{{$v->vendor_owner_name}}</p>
										<p>{{$v->vendor_owner_phone}}</p>
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