@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
	.vendor_info p {
		margin: 0px;
		padding: 0px;
	}
	.item_info p {
		margin: 0px;
		padding: 0px;
	}
	.vendor_panel {
		margin: 15px;
	}
	.li_header {
		background-color: #f5f5f5;
	}
	.no_margin {
		margin: 0px;
	}
	.padding_top {
		padding-top: 10px;
	}
</style>
<form action="/charge" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js"
    class="stripe-button"
    data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
    data-image="/square-image.png"
    data-name="Demo Site"
    data-description="2 widgets ($20.00)"
    data-amount="2000">
  </script>
</form>
<div id="farmers_market_items"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading">
					<label><a href="/farmers_market/{{$farmers_market->id}}">{{$farmers_market->farmers_market_name}}</a> Vendors ({{count($items)}})</label>
					</div> 
					<div class="panel-body">
						<ul class="list-group">
							<li class="list-group-item">
							<input class="form-control" type="text" placeholder="Search For Item Here" v-on:keyup="itemChanged({{$farmers_market->id}})" v-model="item_name">
							<div class="padding_top" id="">
								
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" name="local" v-model="local" v-on:change="change">Local</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" name="nongmo" v-model="nongmo" v-on:change="change">Non GMO</label>
								</div>
								<div class="checkbox-inline">
									<label><input type="checkbox" value="" name="organic" v-model="organic" v-on:change="change">Organic</label>
								</div>	
							</div>
							</li>
                                <li class="list-group-item" v-for="item in items">
                                    <div class="row">
                                        <div class="col-md-3" id="">
                                            <img v-if="item.photo_id" style="max-height: 200px" v-bind:src="'/photo/getPhotoByPhotoId/' + item.photo_id" class="img-responsive" />
                                        </div>
                                        <div class="col-md-6 item_info" id="">
											<h4>@{{item.item}}</h4>
                                            <p>@{{item.description}}</p>
                                            <p>$@{{item.price}} per </p>
                                            <p>Grew/Made at @{{item.farm}}</p>
											<p>
											<span v-if="item.local" class="label label-success">Local</span>
											<span v-else class="label label-danger">Not Local</span>
											<span v-if="item.nongmo" class="label label-success">Non-GMO</span>
											<span v-else class="label label-danger">GMO</span>
											<span v-if="item.organic" class="label label-success">Organic</span>
											<span v-else class="label label-danger">Not Organic</span>
											</p>
                                        </div>
                                        <div class="col-md-3">
	                                        <div>
	                                        	<a class="btn btn-default" href="">Reserve Item</a>
                                        	</div>
                                        	<div style="padding-top: 10px;">
                                        	<a class="btn btn-default" href="/farmers_market/{{$farmers_market->id}}/vendor/@{{item.vendor_id}}/vendor_map">Find In Map</a>
                                        	</div>
                                        	<div style="padding-top: 10px;">
                                        	<form action="/charge" method="POST">
												<script
												src="https://checkout.stripe.com/checkout.js"
												class="stripe-button"
												data-key="pk_test_6pRNASCoBOKtIshFeQd4XMUh"
												data-image="/square-image.png"
												data-name="Demo Site"
												data-description="2 widgets ($20.00)"
												data-amount="2000">
												</script>
												</form>
                                        	</div>
	                                    </div>
                                    </div>
                                </li>
                            </li>
						</ul>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@include ('footer')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/farmers_market_items.js"></script>
@endsection