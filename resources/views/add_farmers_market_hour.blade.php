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
							<form method="POST">
								{{csrf_field()}}
								<div class="row" id="">
									<div class="col-md-3" id="" style="padding-top: 5px;">
										Start Time:
									</div>	
									<div class="col-md-2" id="">
										<select class="form-control" name="start_hour">
											@foreach (range(1, 12) as $i)
												<option>{{$i}}</option>
											@endforeach
										</select>
									</div>	
									<div class="col-md-2" id="">
										<select class="form-control" name="start_min">
											<option value="00">00</option>
											<option value="15">15</option>
											<option value="30">30</option>
											<option value="45">45</option>										
										</select>
									</div>	
									<div class="col-md-2" id="">
										<select class="form-control" name="start_period">
											<option value="1">AM</option>
											<option value="2">PM</option>
										</select>
									</div>	
								</div>
								<div class="row" id="">
									<div class="col-md-3" id="" style="padding-top: 5px;">
										End Time:
									</div>	
									<div class="col-md-2" id="">
										<select class="form-control" name="end_hour">
											@foreach (range(1, 12) as $i)
												<option>{{$i}}</option>
											@endforeach
										</select>
									</div>	
									<div class="col-md-2" id="">
										<select class="form-control" name="end_min">
											<option value="00">00</option>
											<option value="15">15</option>
											<option value="30">30</option>
											<option value="45">45</option>
										</select>
									</div>	
									<div class="col-md-2" id="">
										<select class="form-control" name="end_period">
											<option value="1">AM</option>
											<option value="2">PM</option>
										</select>
									</div>	
								</div>
								<button class="btn btn-default" type="submit">Add Farmers Market Hours</button>
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
