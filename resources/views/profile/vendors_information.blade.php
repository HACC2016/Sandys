@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
	    padding-left:0;
	}
</style>
<div id="profile_vendors_information">
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Profile</div>

				<div class="panel-body">
					<li class="list-group-item">
						<ul class="list-inline">
						<li><a href="{{ url('/profile' )}}">Basic Information</a></li>
						<li><a href="{{ url('/profile/vendors_information')}}">Vendors Information</a></li>
						</ul>
					</li>
					<ul class="list-group">
						<li class="list-group-item">
							<div class="row" id="">
								<div class="col-md-12">
									<ul class="list-group">
										<li class="list-group-item active">
											Vendors
										</li>
									</ul>
								</div>
							</div>	
						</li>
					</ul>	
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/profile_vendors_information.js"></script>
@endsection