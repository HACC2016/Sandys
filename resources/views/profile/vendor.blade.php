@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
	    padding-left:0;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profile</div>

				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Vendor Name:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Vendor::findVendorMarketByUserId(Auth::user()->id)->vendor_name }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/vendor_name')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Vendor Owner Name:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Vendor::findVendorMarketByUserId(Auth::user()->id)->vendor_owner_name }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/website')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Vendor Owner Phone:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Vendor::findVendorMarketByUserId(Auth::user()->id)->vendor_owner_phone }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/website')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Website:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Vendor::findVendorMarketByUserId(Auth::user()->id)->website }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/website')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
									<a href="{{url('/change_password')}}">Change Password</a>
								</div>	
							</div>
						</li>
					</ul>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection