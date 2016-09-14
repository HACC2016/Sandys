@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
	.btn_margin { margin-left: 5px; }
</style>
<div id="farmers_market_vendor_map"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
	                <div class="panel-heading">My Vendors Map
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
						
							@if (App\Farmers_Market_Vendor_Map::where('farmers_market_id', $id)->count() == 0)
								<div class="col-md-12" id="">
								This Farmers Market has not set up a Vendors Map.  Let them know that you would like one.

								</div>
							@else
								<div class="col-md-4">
									<ul class="list-group">
										<li class="list-group-item active clearfix">
											<form method="POST">
												My Vendors 
												<span class="pull-right">
													<a href="" v-on:click.stop.prevent="showAll" class="btn_margin pull-right btn btn-default">Show All</a>
													<a href="" v-on:click.stop.prevent="hideAll" class="btn_margin pull-right btn btn-default">Hide All</a>
												</span>

											</form>
										</li>
										<li class="list-group-item clearfix" v-for="vendor in vendors">
											<p>@{{ vendor.vendor_name }}
											<span style="float: right; "">
											<a v-on:click.stop.prevent="find($event, vendor.id)" style="" href="" class="btn btn-default fe_button">Find</a>
											</span></p>
										</li>
									</ul>
								</div>
								<div class="col-md-8" v-on:click.down="mapClick($event, this)" style="padding:0px">
                                    <img src="{{route('getentry', $photo->filename)}}" alt="ALT NAME" class="img-responsive" v-on:click="mapClick($event, this)" v-model="map" id="map">
                                </div>
							@endif
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/farmers_market_vendor_map.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection