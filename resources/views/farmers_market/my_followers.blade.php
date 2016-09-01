@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
</style>
<div id="add_vendor"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
	                <div class="panel-heading">My Vendors <a style="padding-left: 10px;" href="{{url('/add_vendor')}}">Add A Vendor</a>
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
							<div class="col-md-12" id="">
								<ul class="list-group">
								@foreach ($follows as $follow)
									<li class="list-group-item">
										<h4>
											<?php
												if(App\User::find($follow->follower_id)->type_account == 1) {
													echo App\User::getUserInformationTable($follow->follower_id)->farmers_market_name;
												}
												elseif(App\User::find($follow->follower_id)->type_account == 2) {
													echo App\User::getUserInformationTable($follow->follower_id)->username;
												}
												elseif(App\User::find($follow->follower_id)->type_account == 3) {
													echo App\User::getUserInformationTable($follow->follower_id)->vendor_name;
												}
											?>
										</h4>
										<button class="btn btn-default">Message</button>
										<button class="btn btn-default">Block</button>
									</li>
								@endforeach
								</ul>
							</div>						
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection