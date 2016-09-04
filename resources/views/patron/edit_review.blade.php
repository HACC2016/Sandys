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
							<label for="name">Farmers Market Or Vendor Name:</label>
							<h4>{{App\User::getNameOfUser($review->reviewed_id)}}</h4>
						</div>
						<div class="form-group">
							<label for="comment">Review:</label>
							<textarea style="resize:none" class="form-control" rows="5" id="review" name="review">{{$review->review}}</textarea>
						</div>
						<div class="form-group">
							<label for="rating">Rating</label>
							<select style="" class="form-control" id="rating" name="rating">
								<option @if($review->rating == 1) selected @endif >1</option>
								<option @if($review->rating == 2) selected @endif>2</option>
								<option @if($review->rating == 3) selected @endif>3</option>
								<option @if($review->rating == 4) selected @endif>4</option>
								<option @if($review->rating == 5) selected @endif>5</option>
							</select>
						</div>
						<button class="btn btn-default">Save</button>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection