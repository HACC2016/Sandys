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
						<form method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label for="name">Event Name:</label>
							<input class="form-control" class="btn btn-default" name="event_name">
						</div>
						<div class="form-group">
							<label for="event_description">Description:</label>
							<textarea style="resize:none" class="form-control" rows="5" id="event_description" name="event_description"></textarea>
						</div>
						<div class="row" style="padding-bottom: 10px">
							<div class="form-group">
								<div class="col-md-4">
									<label for="month">Start Month:</label>
									<select class="form-control" name="start_month">
										<option value = "1">January</option>
										<option value = "2">February</option>
										<option value = "3">March</option>
										<option value = "4">April</option>
										<option value = "5">May</option>
										<option value = "6">June</option>
										<option value = "7">July</option>
										<option value = "8">August</option>
										<option value = "9">September</option>
										<option value = "10">October</option>
										<option value = "11">November</option>
										<option value = "12">December</option>
									</select>
								</div>
								<div class="col-md-4">
									<label for="day">Start Day:</label>
									<select class="form-control" name="start_day">
									@foreach(range(0, 32) as $i)
										<option>{{$i}}</option>
									@endforeach
									</select>
								</div>
								<div class="col-md-4">
									<label for="year">Start Year:</label>
									<select class="form-control" name="start_year">
										<option>2015</option>
										<option>2016</option>
										<option>2017</option>
										<option>2018</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom: 20px;">
							<div class="form-group">
								<div class="col-md-4">
									<label for="month">End Month:</label>
									<select class="form-control" name="end_month">
										<option value = "1">January</option>
										<option value = "2">February</option>
										<option value = "3">March</option>
										<option value = "4">April</option>
										<option value = "5">May</option>
										<option value = "6">June</option>
										<option value = "7">July</option>
										<option value = "8">August</option>
										<option value = "9">September</option>
										<option value = "10">October</option>
										<option value = "11">November</option>
										<option value = "12">December</option>
									</select>
								</div>
								<div class="col-md-4">
									<label for="day">End Day:</label>
									<select class="form-control" name="end_day">
										@foreach(range(0, 32) as $i)
											<option>{{$i}}</option>
										@endforeach
									</select>
								</div>
								<div class="col-md-4">
									<label for="year">End Year:</label>
									<select class="form-control" name="end_year">
										<option>2015</option>
										<option>2016</option>
										<option>2017</option>
										<option>2018</option>
									</select>
								</div>
							</div>
						</div>
						<button class="btn btn-default">Save</button>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection