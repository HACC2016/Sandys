@extends('layouts.app')
<style>
	.no-gutter > [class*='col-'] {
	    padding-left:0;
	}
</style>
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
								<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-3" style="text-align: right;" id="">
									Farmers Market Hours:
								</div>	
								<div class="col-md-9" id="">
									<ul class="list-group">
										<form>
											<li class="list-group-item">
												<div class="row" id="">
													<div class="col-md-4" id="" style="padding-top: 10px">
														Monday: 
													</div>
													<div class="col-md-8" id="" style="padding-top: 5px">
														@if (count($monday_hours) == 0) 
															Not Open
															<span style="padding-left: 10px">
																<button class="btn btn-default">
																	Add A Time Slot
																</button>
															</span>
														@else
															@for ($i = 0; $i < count($monday_hours); $i++)
																<div class="row no-gutter" id="">
																	<div class="col-md-3" id="" style="padding-top: 5px">
																		Start Time:
																	</div>
																	<div class="col-md-3" id="">
																	    <select class="form-control" selected="3">
																			<option @if ($monday_hours[$i]->start_time_hour == 1) selected @endif>1</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 2) selected @endif>2</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 3) selected @endif>3</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 4) selected @endif>4</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 5) selected @endif>5</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 6) selected @endif>6</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 7) selected @endif>7</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 8) selected @endif>8</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 9) selected @endif>9</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 10) selected @endif>10</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 11) selected @endif>11</option>
																			<option @if ($monday_hours[$i]->start_time_hour == 12) selected @endif>12</option>
																		</select>
																		
																	</div>
																	<div class="col-md-3" id="">
																	    <select class="form-control">
																			<option @if ($monday_hours[$i]->start_time_min == 00) selected @endif>00</option>
																			<option @if ($monday_hours[$i]->start_time_min == 15) selected @endif>15</option>
																			<option @if ($monday_hours[$i]->start_time_min == 30) selected @endif>30</option>
																			<option @if ($monday_hours[$i]->start_time_min == 45) selected @endif>45</option>
																		</select>
																	</div>
																	<div class="col-md-3" id="">
																	    <select class="form-control">
																			<option @if ($monday_hours[$i]->start_time_period == 1) selected @endif>am</option>
																			<option @if ($monday_hours[$i]->start_time_period == 2) selected @endif>pm</option>
																		</select>
																	</div>
																</div>
																<div class="row no-gutter" id="">
																	<div class="col-md-3" id="" style="padding-top: 5px">
																		End Time:
																	</div>
																	<div class="col-md-3" id="">
																	    <select class="form-control" selected="3">
																			<option @if ($monday_hours[$i]->end_time_hour == 1) selected @endif>1</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 2) selected @endif>2</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 3) selected @endif>3</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 4) selected @endif>4</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 5) selected @endif>5</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 6) selected @endif>6</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 7) selected @endif>7</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 8) selected @endif>8</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 9) selected @endif>9</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 10) selected @endif>10</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 11) selected @endif>11</option>
																			<option @if ($monday_hours[$i]->end_time_hour == 12) selected @endif>12</option>
																		</select>
																		
																	</div>
																	<div class="col-md-3" id="">
																	    <select class="form-control">
																			<option @if ($monday_hours[$i]->end_time_min == 00) selected @endif>00</option>
																			<option @if ($monday_hours[$i]->end_time_min == 15) selected @endif>15</option>
																			<option @if ($monday_hours[$i]->end_time_min == 30) selected @endif>30</option>
																			<option @if ($monday_hours[$i]->end_time_min == 45) selected @endif>45</option>
																		</select>
																	</div>
																	<div class="col-md-3" id="">
																	    <select class="form-control">
																			<option @if ($monday_hours[$i]->end_time_period == 1) selected @endif>am</option>
																			<option @if ($monday_hours[$i]->end_time_period == 2) selected @endif>pm</option>
																		</select>
																	</div>
																</div>
															@endfor
														@endif
													</div>
												</div>
											</li>

										</form>
									</ul>				
								</div>	
							</div>
						</li>

							</div>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
