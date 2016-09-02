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
			<div class="col-md-10 col-md-offset-1">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="POST">
						{{csrf_field()}}
						<div class="form-group">
							<label for="name">Farmers Market Or Vendor Name</label>
							<input style="resize:none" class="form-control" rows="5" id="name" name="name">
						</div>
						<div class="form-group">
							<label for="comment">Review:</label>
							<textarea style="resize:none" class="form-control" rows="5" id="review" name="review"></textarea>
						</div>
						<div class="form-group">
							<label for="rating">Rating</label>
							<select style="" class="form-control" id="rating" name="rating">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<button class="btn btn-default">Send Review</button>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection