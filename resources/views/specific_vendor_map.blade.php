@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
	.btn_margin { margin-left: 5px; }
</style>
<div id="my_vendor_map"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
	                <div class="panel-heading">My Vendors Map
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
							<img src="http://sandysfoodmarket.dev/photo/get/phpvBwwCn.png" alt="ALT NAME" class="img-responsive" v-on:click="mapClick($event, this)" v-model="map" id="map">	
							<img src="/images/map-marker.png" height="30" width="30" id="mapmarkerundefined" class="mapmarker" style="left: {{$marker->left * 100}}%; top: {{$marker->top*100}}%; position: absolute; visibility: visible;" data-toggle="tooltip" data-placement="top" title="new vendor">
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
@endsection