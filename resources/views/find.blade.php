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
				<div class="panel-heading">Find Farmers Market and Vendors by Criteria</div>

				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<form>
								<div class="form-group">
									<label for="exampleInputEmail1">On Which Island</label>
									<select class="form-control">
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
									<select class="form-control">
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
									<select class="form-control">
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
										<select class="form-control">
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
											<option>6</option>
											<option>7</option>
										</select>
										<select class="form-control">
											<option>00</option>
											<option>15</option>
											<option>30</option>
											<option>45</option>
										</select>
										<select class="form-control">
											<option>AM</option>
											<option>PM</option>
										</select>
									</div>
								</div>
								<button type="submit" class="btn btn-default">Submit</button> 
							</form>
						</li>
					</ul>
				</div> 
			</div>
		</div>
	</div>
</div>
@endsection