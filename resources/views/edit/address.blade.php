@extends('layouts.app')

@section('content')
<div id="geocoder">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profile</div>
				<form method="POST" action="">
                {{ csrf_field() }}
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Street Address:
								</div>	
								<div class="col-md-6" id="">
									<ul class="list-group">
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													Street Address:
												</div>
												<div class="col-md-8" id="">
													<input @change="streetAddressChanged" type="text" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->street_address}}" class="form-control" id="" v-model="street_address" name="street_address"/>
												</div>
											</div>
										</li>
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													City:
												</div>
												<div class="col-md-8" id="">
													<input readonly="readonly" type="text" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->city}}" class="form-control" id="" v-model="city" name="city"/>
												</div>
											</div>
										</li>
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													Zipcode:
												</div>
												<div class="col-md-8" id="">
													<input readonly="readonly" type="text" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->zipcode}}" class="form-control" id="" v-model="zipcode" name="zipcode"/>
												</div>
											</div>
										</li>
										<li class="list-group-item" v-show="street_address_changed">
			                                <button type="submit" class="btn btn-primary form-control" v-on:click.stop.prevent="update_address">
			                                    <i class="fa fa-btn fa-refresh"></i> Update Map
			                                </button>
										</li>
										<li class="list-group-item">
											<div id="map" style="width: 100%; height: 480px;"></div>
										</li>
										<input readonly="readonly" type="hidden" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->lat}}" class="form-control" id="" v-model="lat" name="lat"/>
										<input readonly="readonly" type="hidden" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->lng}}" class="form-control" id="" v-model="lng" name="lng"/>
										<input readonly="readonly" type="hidden" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->state}}" class="form-control" id="" v-model="state" name="state"/>
										<input readonly="readonly" type="hidden" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->country}}" class="form-control" id="" v-model="country" name="country"/>
									</ul>
								</div>	
								<div class="col-md-3">
	                                <button  v-show="can_change" type="submit" class="btn btn-primary form-control">
	                                    <i class="fa fa-btn fa-user" ></i> Change
	                                </button>
								</div>
							</div>
						</li>
					</ul>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/geocoder.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSlEzpoQVs5JupSo1ed2Wc9sLCvCsrppI&callback=initialize"> </script>
@endsection