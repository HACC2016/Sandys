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
				<div class="panel-heading">Profile</div>

				<div class="panel-body">
					<li class="list-group-item">
						<ul class="list-inline">
							<li><a href="{{ url('/profile' )}}">Basic Information</a></li>
							<li><a href="{{ url('/profile/vendors_information')}}">Vendors Information</a></li>
							<li><a href="{{ url('/profile/photos')}}">Photos</a></li>
						</ul>
					</li>
					<ul class="list-group">
							
					</ul>	
				</div>
			</div>
		</div>
	</div>
</div>
@endsection