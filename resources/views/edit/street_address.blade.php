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
									Street Address:
								</div>	
								<div class="col-md-5" id="">
									<input type="text" value="{{Auth::user()->street_address}}" class="form-control" id="exampleInputPassword1">
								</div>	
								<div class="col-md-3">
	                                <button type="submit" class="btn btn-primary form-control">
	                                    <i class="fa fa-btn fa-user"></i> Register
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
