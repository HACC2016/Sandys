@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
</style>
<div id="find_farmers_market">
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
											<option>Big Island</option>
											<option>Oahu</option>
											<option>Maui</option>
											<option>Molokai</option>
											<option>Lanai</option>
											<option>Kauai</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">Open On What Day</label>
										<select class="form-control" v-model="day">
											<option>Monday</option>
											<option>Tuesday</option>
											<option>Wednesday</option>
											<option>Thursday</option>
											<option>Friday</option>
											<option>Saturday</option>
											<option>Sunday</option>
										</select>
									</div>
									<div class="form-group">
										<label for="exampleInputEmail1">At What Time</label>
										<div class="form-inline">
											<select class="form-control" v-model="time_hour">
												<option>1</option>
												<option>2</option>
												<option>3</option>
												<option>4</option>
												<option>5</option>
												<option>6</option>
												<option>7</option>
												<option>8</option>
												<option>9</option>
												<option>10</option>
												<option>11</option>
												<option>12</option>
											</select>
											<select class="form-control" v-model="time_min">
												<option>00</option>
												<option>15</option>
												<option>30</option>
												<option>45</option>
											</select>
											<select class="form-control" v-model="time_period">
												<option>AM</option>
												<option>PM</option>
											</select>
										</div>
									</div>
									<button type="submit" class="btn btn-default">Submit</button> 
								</form>
							</li>
						</ul>
						<ul class="list-group">
							<article v-for="farmers_market in farmers_markets">
								<li class="list-group-item">
									<h3>
										@{{farmers_market.farmers_market_name}}
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
						<pre>
						@{{ $data | json}}
						</pre>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/find_farmers_market.js"></script>
@endsection