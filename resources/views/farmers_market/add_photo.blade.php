@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
</style>
<div id="post_photo"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label for="photo">Photo</label>
							<input @change="previewThumbnail" class="" name="thumbnail" type="file">
							<img v-show="imageSrc" class="Image-input__image" :src="imageSrc">
						</div>
						<div class="form-group">
							<label for="comment">Caption:</label>
							<textarea style="resize:none" class="form-control" rows="3" id="caption" name="caption"></textarea>
						</div>
						<button class="btn btn-default">Add Photo</button>
						</form>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/post_photo.js"></script>
@endsection