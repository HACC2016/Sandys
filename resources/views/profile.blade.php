@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profile</div>

				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
									Farmers Market Name:
								</div>	
								<div class="col-md-5" id="">
									{{Auth::user()->farmers_market_name}}
								</div>	
								<div class="col-md-3" style="text-align: left;" id="">
									<a href="{{url('/edit/farmers_market_name')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
									Street Address:
								</div>	
								<div class="col-md-5" id="">
									{{Auth::user()->street_address}}
								</div>	
								<div class="col-md-3" style="text-align: left;" id="">
									<a href="{{url('/edit/street_address')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
									City:
								</div>	
								<div class="col-md-5" id="">
									{{Auth::user()->city}}
								</div>	
								<div class="col-md-3" style="text-align: left;" id="">
									<a href="{{url('/edit/city')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
									Zipcode:
								</div>	
								<div class="col-md-5" id="">
									{{Auth::user()->zipcode}}
								</div>	
								<div class="col-md-3" style="text-align: left;" id="">
									<a href="{{url('/edit/zipcode')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
									Organizers Name:
								</div>	
								<div class="col-md-5" id="">
									{{Auth::user()->organizer_name}}
								</div>	
								<div class="col-md-3" style="text-align: left;" id="">
									<a href="{{url('/edit/organizer_name')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
									Organizers Phone Number:
								</div>	
								<div class="col-md-5" id="">
									{{Auth::user()->organizer_phone_number}}
								</div>	
								<div class="col-md-3" style="text-align: left;" id="">
									<a href="{{url('/edit/organizer_phone_number')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-4" style="text-align: right;" id="">
								Website:
								</div>	
								<div class="col-md-5" id="">
									{{Auth::user()->website}}
								</div>	
								<div class="col-md-3" style="text-align: left;" id="">
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

Farmers Market Name*
 Day(s) of week* (Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday)
 Start and end time*
 Street Address*
 City*
 Zip code*
 Island*
Additional Location information
 Website
 Organizer Contact Name*
 Organizer Phone Number*
 Organizer Email*
 Organizer login name*
 Organizer password*
 Date modified (mm/dd/ccyy)