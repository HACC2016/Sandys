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
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<form method="POST" action="{{url('/add_new_vendor')}}">
								{{csrf_field()}}
								<div class="form-group" id="">
									<label for="vendor_name">Vendor Name</label>
									<input type="text" name="vendor_name" class="form-control" v-on:keyup="nameChanged" v-model="vendor_name">
								</div>
								<button class="btn btn-default">Add Vendor</button>
								</form>
							</div>
						</div>
						<div class="row" style="padding-top: 20px;">
							<div class="col-md-12" id="">
								<ul class="list-group">
									<li class="list-group-item" v-for="item in items">
										<div class="row" id="">
											<form method="POST">
											<div class="col-md-6">
											<p> @{{item.vendor_name}} </p>
											<p> @{{item.vendor_owner_name}} </p>
											<input type="hidden" readonly="readonly" name="vendor_id" value="@{{item.id}}">
											<p> <i class="fa fa-phone" aria-hidden="true"></i> @{{item.vendor_owner_phone}} </p>
											</div>
											{{csrf_field()}}
											<div class="col-md-6"><button class="btn btn-default">Add This Vendor</button></div>
											</form>
										</div>
									</li>
								</ul>
							</div>						
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/add_vendor.js"></script>
@endsection