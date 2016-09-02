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
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form-group">
						<label for="item_name">Item Name</label>
						<input class="form-control" id="item_name" name="item_name">
					</div>
					<div class="form-group">
						<label for="photo">Photo</label>
						<input @change="previewThumbnail" class="" name="thumbnail" type="file">
						<img v-show="imageSrc" class="Image-input__image" :src="imageSrc">
					</div>
					<div class="form-group">
						<label for="description">Description:</label>
						<textarea style="resize:none" class="form-control" rows="3" id="description" name="description"></textarea>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label for="price">Price</label>
								<input type="number" value="0.00" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" id="price" name="price"/>
							</div>
							<div class="col-md-6">
								<label for="price_per">Price Per</label>
								<select class="form-control" name="price_per">
									<option value="1">Pound</option>
									<option value="2">Ounce</option>
									<option value="3">Bag</option>
									<option value="4">Each</option>
								</select>
							</div>
						</div>
					</div>
					<button class="btn btn-default">Add Item</button>
					</form>
				</div> 
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="/js/post_photo.js"></script>
@endsection