@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
</style>
<div id="farmers_market"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label for="comment">Instructions:</label>
							<div>
							Download and fill out the pdf below.  You can then either email it completed forms to us, or you can drop it off at our sites.  We are open from 6 pm to 10 pm every day.  Once recieved we will notify you through this app, and through email.
							</div>
						</div>
						<div class="form-group">
							<label for="rating">Download</label>
						</div>
						<a class="btn btn-default" href="/farmers_market_vendor_apps/Farmers-Market-Handbook-2015.pdf" download>
							Click to download vendor application Forms
						</a>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection