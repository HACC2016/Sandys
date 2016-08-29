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
								<div class="col-md-3" style="text-align: right;" id="">
									Street Address:
								</div>	
								<div class="col-md-6" id="">
									<ul class="list-group">
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													Street Addres:					
												</div>
												<div class="col-md-8" id="">
													<input type="text" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->street_address}}" class="form-control" id="">
												</div>
											</div>
										</li>
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													City:
												</div>
												<div class="col-md-8" id="">
													<input type="text" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->city}}" class="form-control" id="">
												</div>
											</div>
										</li>
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-4" id="">
													Zipcode:
												</div>
												<div class="col-md-8" id="">
													<input type="text" value="{{ App\Farmers_Market::findFarmersMarketByUserId(Auth::user()->id)->zipcode}}" class="form-control" id="">
												</div>
											</div>
										</li>
									</ul>								</div>	
								<div class="col-md-3">
	                                <button type="submit" class="btn btn-primary form-control">
	                                    <i class="fa fa-btn fa-user"></i> Change
	                                </button>
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
