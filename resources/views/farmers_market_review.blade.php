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
						<label for="comment">Comment:</label>
						<textarea style="resize:none" class="form-control" rows="5" id="comment" name="comment"></textarea>
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