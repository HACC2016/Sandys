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
							<h4>
								{{$vendor->vendor_name}}
							</h4>
							@if($vendor->user_id == null)
								Vendor is not claimed.  Click to claim Vendor
							@endif
							</div>
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection