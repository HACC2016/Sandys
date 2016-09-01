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
	                <div class="panel-heading">Add A Post
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
							<div class="col-md-12" id="">
								<form method="POST">
									<div class="form-group">
									{{csrf_field()}}
										<label for="comment">Message:</label>
										<textarea style="resize: none" class="form-control" rows="5" id="message" name="message"></textarea>
									</div>
									<button class="btn btn-default">Post</button>
								</form>
							</div>						
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection