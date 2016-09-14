@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
	    padding-left:0;
	}
</style>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">Profile</div>

				<div class="panel-body">
							<li class="list-group-item">
								<ul class="list-inline">
								<li><a href="{{ url('/profile' )}}">Basic Information</a></li>
								<li><a href="{{ url('/profile/vendors_information')}}">Vendors Information</a></li>
								<li><a href="{{ url('/profile/photos')}}">Photos</a></li>
								</ul>
							</li>
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Farmers Market Name:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->farmers_market_name }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/farmers_market_name')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="address">
								<div class="col-md-3" style="text-align: right;" id="">
									Street Address:
								</div>	
								<div class="col-md-7" id="">
									<ul class="list-group">
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													Street Address:
												</div>
												<div class="col-md-8" id="">
													{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->street_address}}
												</div>
											</div>
										</li>
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													City:
												</div>
												<div class="col-md-8" id="">
													{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->city}}
												</div>
											</div>
										</li>
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													Zipcode:
												</div>
												<div class="col-md-8" id="">
													{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->zipcode}}
												</div>
											</div>
										</li>
										<li class="list-group-item">
											<div id="map" style="width: 100%; height: 480px;"></div>
										</li>
										<input readonly="readonly" type="hidden" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->lat}}" class="form-control" id="" v-model="lat" name="lat"/>
										<input readonly="readonly" type="hidden" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->lng}}" class="form-control" id="" v-model="lng" name="lng"/>
									</ul>
								</div>	
								<div class="col-md-2">
									<a href="{{url('/edit/address')}}">edit</a>
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									City:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->city}}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/city')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Zipcode:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->zipcode }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/zipcode')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Organizers Name:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->organizer_name }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/organizer_name')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Organizers Phone Number:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->organizer_phone_number }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/organizer_phone_number')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
								Website:
								</div>	
								<div class="col-md-7" id="">
									{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->website }}
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/website')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Farmers Market Hours:
								</div>	
								<div class="col-md-7" id="">
									<ul class="list-group">
										<form>
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="">
														Monday: 
													</div>
													<div class="col-md-8" id="" style=" ">
														@if (count($monday_hours) == 0) 
															Closed
															<span style="padding-left: 10px">
																<a href="/add_time_slot/1" class="btn btn-default">
																	Add A Time Slot
																</a>
															</span>
														@else
															@for ($i = 0; $i < count($monday_hours); $i++)
																<div class="row" id="">
																	<div class="col-md-12" id="" style="">
																	    {{$monday_hours[$i]->start_time_hour}} :
																	    {{$monday_hours[$i]->start_time_min}}
																	    @if ($monday_hours[$i]->start_time_period == 1) AM
																	    @else PM
																	    @endif
																	    -
																	    {{$monday_hours[$i]->end_time_hour}} :  
																	    {{$monday_hours[$i]->end_time_min}}
																	    @if ($monday_hours[$i]->end_time_period == 1) AM
																	    @else PM
																	    @endif
																	</div>
																</div>
															@endfor
															<a href="/add_time_slot/1" class="btn btn-default">
																Add Another Time Slot For Monday
															</a>
														@endif
													</div>
												</div>
											</li>			
											
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="">
														Tuesday: 
													</div>
													<div class="col-md-8" id="" style=" ">
														@if (count($tuesday_hours) == 0) 
															Closed
															<span style="padding-left: 10px">
																<a href="/add_time_slot/2" class="btn btn-default">
																	Add A Time Slot
																</a>
															</span>
														@else
															@for ($i = 0; $i < count($tuesday_hours); $i++)
																<div class="row" id="">
																	<div class="col-md-12" id="" style="">
																	    {{$tuesday_hours[$i]->start_time_hour}} :
																	    {{$tuesday_hours[$i]->start_time_min}}
																	    @if ($tuesday_hours[$i]->start_time_period == 1) AM
																	    @else PM
																	    @endif
																	    -
																	    {{$tuesday_hours[$i]->end_time_hour}} :  
																	    {{$tuesday_hours[$i]->end_time_min}}
																	    @if ($tuesday_hours[$i]->end_time_period == 1) AM
																	    @else PM
																	    @endif
																	</div>
																</div>
															@endfor
															<a href="/add_time_slot/2" class="btn btn-default">
																Add Another Time Slot For Tuesday
															</a>
														@endif
													</div>
												</div>
											</li>
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="">
														Wednesday: 
													</div>
													<div class="col-md-8" id="" style=" ">
														@if (count($wednesday_hours) == 0) 
															Closed
															<span style="padding-left: 10px">
																<a href="/add_time_slot/3" class="btn btn-default">
																	Add A Time Slot For Wednesday
																</a>
															</span>
														@else
															@for ($i = 0; $i < count($wednesday_hours); $i++)
																<div class="row" id="">
																	<div class="col-md-12" id="" style="">
																	    {{$wednesday_hours[$i]->start_time_hour}} :
																	    {{$wednesday_hours[$i]->start_time_min}}
																	    @if ($wednesday_hours[$i]->start_time_period == 1) AM
																	    @else PM
																	    @endif
																	    -
																	    {{$wednesday_hours[$i]->end_time_hour}} :  
																	    {{$wednesday_hours[$i]->end_time_min}}
																	    @if ($wednesday_hours[$i]->end_time_period == 1) AM
																	    @else PM
																	    @endif
																	</div>
																</div>
															@endfor
															<a href="/add_time_slot/3" class="btn btn-default">
																Add Another Time Slot For Wednesday
															</a>
														@endif
													</div>
												</div>
											</li>										
																	
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="">
														Thursday: 
													</div>
													<div class="col-md-8" id="" style=" ">
														@if (count($thursday_hours) == 0) 
															Closed
															<span style="padding-left: 10px">
																<a href="/add_time_slot/4" class="btn btn-default">
																	Add A Time Slot For Thursday
																</a>
															</span>
														@else
															@for ($i = 0; $i < count($thursday_hours); $i++)
																<div class="row" id="">
																	<div class="col-md-12" id="" style="">
																	    {{$thursday_hours[$i]->start_time_hour}} :
																	    {{$thursday_hours[$i]->start_time_min}}
																	    @if ($thursday_hours[$i]->start_time_period == 1) AM
																	    @else PM
																	    @endif
																	    -
																	    {{$thursday_hours[$i]->end_time_hour}} :  
																	    {{$thursday_hours[$i]->end_time_min}}
																	    @if ($thursday_hours[$i]->end_time_period == 1) AM
																	    @else PM
																	    @endif
																	</div>
																</div>
															@endfor
															<a href="/add_time_slot/4" class="btn btn-default">
																Add Another Time Slot For Thursday
															</a>
														@endif
													</div>
												</div>
											</li>										
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="">
														Friday: 
													</div>
													<div class="col-md-8" id="" style=" ">
														@if (count($friday_hours) == 0) 
															Closed
															<span style="padding-left: 10px">
																<a href="/add_time_slot/5" class="btn btn-default">
																	Add A Time Slot For Friday
																</a>
															</span>
														@else
															@for ($i = 0; $i < count($friday_hours); $i++)
																<div class="row" id="">
																	<div class="col-md-12" id="" style="">
																	    {{$friday_hours[$i]->start_time_hour}} :
																	    {{$friday_hours[$i]->start_time_min}}
																	    @if ($friday_hours[$i]->start_time_period == 1) AM
																	    @else PM
																	    @endif
																	    -
																	    {{$friday_hours[$i]->end_time_hour}} :  
																	    {{$friday_hours[$i]->end_time_min}}
																	    @if ($friday_hours[$i]->end_time_period == 1) AM
																	    @else PM
																	    @endif
																	</div>
																</div>
															@endfor
															<a href="/add_time_slot/5" class="btn btn-default">
																Add Another Time Slot For Friday
															</a>
														@endif
													</div>
												</div>
											</li>																			
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="">
														Saturday: 
													</div>
													<div class="col-md-8" id="" style=" ">
														@if (count($saturday_hours) == 0) 
															Closed
															<span style="padding-left: 10px">
																<a href="/add_time_slot/6" class="btn btn-default">
																	Add A Time Slot For Saturday
																</a>
															</span>
														@else
															@for ($i = 0; $i < count($saturday_hours); $i++)
																<div class="row" id="">
																	<div class="col-md-12" id="" style="">
																	    {{$saturday_hours[$i]->start_time_hour}} :
																	    {{$saturday_hours[$i]->start_time_min}}
																	    @if ($saturday_hours[$i]->start_time_period == 1) AM
																	    @else PM
																	    @endif
																	    -
																	    {{$saturday_hours[$i]->end_time_hour}} :  
																	    {{$saturday_hours[$i]->end_time_min}}
																	    @if ($saturday_hours[$i]->end_time_period == 1) AM
																	    @else PM
																	    @endif
																	</div>
																</div>
															@endfor
															<a href="/add_time_slot/6" class="btn btn-default">
																Add Another Time Slot For Saturday
															</a>
														@endif
													</div>
												</div>
											</li>				
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="">
														Sunday: 
													</div>
													<div class="col-md-8" id="" style=" ">
														@if (count($sunday_hours) == 0) 
															Closed
															<span style="padding-left: 10px">
																<a href="/add_time_slot/7" class="btn btn-default">
																	Add A Time Slot For Sunday
																</a>
															</span>
														@else
															@for ($i = 0; $i < count($sunday_hours); $i++)
																<div class="row" id="">
																	<div class="col-md-12" id="" style="">
																	    {{$sunday_hours[$i]->start_time_hour}} :
																	    {{$sunday_hours[$i]->start_time_min}}
																	    @if ($sunday_hours[$i]->start_time_period == 1) AM
																	    @else PM
																	    @endif
																	    -
																	    {{$sunday_hours[$i]->end_time_hour}} :  
																	    {{$sunday_hours[$i]->end_time_min}}
																	    @if ($sunday_hours[$i]->end_time_period == 1) AM
																	    @else PM
																	    @endif
																	</div>
																</div>
															@endfor
															<a href="/add_time_slot/7" class="btn btn-default">
																Add Another Time Slot For Sunday
															</a>
														@endif
													</div>
												</div>
											</li>		
											
										
									
										</form>
									</ul>					
								</div>	
								<div class="col-md-2" style="text-align: left;" id="">
									<a href="{{url('/edit/hours')}}">edit</a>
								</div>	
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">Twitter</div>
								<div class="col-md-7" style="text-align: " id=""> 
									@if ($twitter_info)
									{{$twitter_info->nickname}}
									@else
										<a href="/auth/twitter" class="btn btn-default">Add A Twitter Account</a>
									@endif
								</div>	
								<div class="col-md-2" style="text-align: right;" id="">
									@if ($twitter_info)
										<a href="">Change</a>
										<a style="padding-left: 10px;" href="">Remove</a>
									@else
									@endif
								</div>
							</div>
						</li>
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" id=""> </div>
								<div class="col-md-7" style="text-align: " id=""> <a href="{{url('/change_password')}}">Change Password</a>
								</div>	
							</div>
						</li>
					</ul>	
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/profile.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSlEzpoQVs5JupSo1ed2Wc9sLCvCsrppI&callback=initialize"> </script>
@endsection