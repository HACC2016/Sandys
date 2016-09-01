@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
</style>
<div id="find"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-heading">Find Farmers Market and Vendors by Criteria</div>

					<div class="panel-body">
						<ul class="list-group">
							<li class="list-group-item">
								<form method="POST" v-on:submit.prevent="onSubmitForm">
									<div class="form-group">
										<label for="exampleInputEmail1">On Which Island</label>
										<select class="form-control" v-model="island">
											<option value="Hawaii County">Big Island</option>
											<option value="Honolulu County">Honolulu</option>
											<option value="Maui County">Maui</option>
											<option value="Maui County">Lanai</option>
											<option value="Kauai County">Kauai</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Open On What Day</label>
										<select class="form-control" v-model="day">
											<option value="1" @if ($day=="Mon") echo selected @endif>Monday</option>
											<option value="2" @if ($day=="Tue") echo selected @endif>Tuesday</option>
											<option value="3" @if ($day=="Wed") echo selected @endif >Wednesday</option>
											<option value="4" @if ($day=="Thu") echo selected @endif>Thursday</option>
											<option value="5" @if ($day=="Fri") echo selected @endif>Friday</option>
											<option value="6" @if ($day=="Sat") echo selected @endif>Saturday</option>
											<option value="7" @if ($day=="Sun") echo selected @endif>Sunday</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">At What Time</label>
										<div class="form-inline">
											<select class="form-control" v-model="time_hour">
												<option @if ($hour == "1") echo selected @endif>1</option>
												<option @if ($hour == "2") echo selected @endif>2</option>
												<option @if ($hour == "3") echo selected @endif>3</option>
												<option @if ($hour == "4") echo selected @endif>4</option>
												<option @if ($hour == "5") echo selected @endif>5</option>
												<option @if ($hour == "6") echo selected @endif>6</option>
												<option @if ($hour == "7") echo selected @endif>7</option>
												<option @if ($hour == "8") echo selected @endif>8</option>
												<option @if ($hour == "9") echo selected @endif>9</option>
												<option @if ($hour == "10") echo selected @endif>10</option>
												<option @if ($hour == "11") echo selected @endif>11</option>
												<option @if ($hour == "12") echo selected @endif>12</option>
											</select>
											<select class="form-control" v-model="time_min">
												<option @if ($min == 0) echo selected @endif>00</option>
												<option @if ($min == 15) echo selected @endif>15</option>
												<option @if ($min == 30) echo selected @endif>30</option>
												<option @if ($min == 45) echo selected @endif>45</option>
											</select>
											<select class="form-control" v-model="time_period">
												<option @if ($period == "AM") echo selected @endif>AM</option>
												<option @if ($period == "PM") echo selected @endif>PM</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-default">Submit</button> 
								</form>
							</li>
						</ul>
						<ul class="list-group">
							<li class="list-group-item">
								Results Template
								<a class="btn btn-default" v-on:click.stop="listTemplate">List</a>
								<a class="btn btn-default" v-on:click.stop="mapTemplate">Map</a>
							</li>
						</ul>
						<ul class="list-group" v-show="list">
							<article v-for="farmers_market in farmers_markets">
								<li class="list-group-item">
									<h3>
										<a href="/farmers_market/@{{farmers_market.id}}">
											@{{farmers_market.farmers_market_name}}
										</a>
									</h3>
									<p>
										@{{farmers_market.street_address}}
									</p>
									<p>
										@{{farmers_market.organizer_name}}
									</p>
									<p>
										@{{farmers_market.organizer_phone_number}}
									</p>
									<p>
										@{{farmers_market.website}}
									</p>
								</li>
							</article>
						</ul>
						<ul class="list-group" v-show="map">
							<li class="list-group-item">
								<div id="map" style="width: 100%; height: 480px;"></div>
							</li>
						</ul>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/find.js"></script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSlEzpoQVs5JupSo1ed2Wc9sLCvCsrppI&callback=initialize"> </script>
@endsection