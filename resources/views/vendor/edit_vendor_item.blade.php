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
			<div class="col-md-12" id="">
				
				<div class="panel panel-default">
					<div class="panel-body">
						<form method="POST" enctype="multipart/form-data">
						{{csrf_field()}}
						<div class="form-group">
							<label for="item_name">Item Name</label>
							<input class="form-control" id="item_name" name="item_name" value="{{$vendor_item->item}}">
						</div>
						<div class="form-group">
							<label for="photo">Photo</label>
							<input @change="previewThumbnail" class="" name="thumbnail" type="file">
							<img v-show="imageSrc" class="Image-input__image" :src="imageSrc">
						</div>
						<div class="form-group">
							<label for="description">Description:</label>
							<textarea style="resize:none" class="form-control" rows="3" id="description" name="description">{{$vendor_item->description}}</textarea>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label for="price">Price</label>
									<input type="number" value="{{$vendor_item->price}}" min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" id="price" name="price"/>
								</div>
								<div class="col-md-6">
									<label for="price_per">Price Per</label>
									<select class="form-control" name="price_per">
										<option @if($vendor_item->price_per == 1) selected @endif value="1">Pound</option>
										<option @if($vendor_item->price_per == 2) selected @endif value="2">Ounce</option>
										<option @if($vendor_item->price_per == 3) selected @endif value="3">Bag</option>
										<option @if($vendor_item->price_per == 4) selected @endif value="4">Each</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-md-6">
									<label for="price">Check all that applies</label>
									<div class="checkbox">
										<label><input type="checkbox" value="" name="local" @if($vendor_item->local) checked @endif>Local</label>
									</div>
									<div class="checkbox">
										<label><input @if($vendor_item->nongmo) checked @endif type="checkbox" value="" name="nongmo">Non GMO</label>
									</div>
									<div class="checkbox">
										<label><input @if($vendor_item->organic) checked @endif type="checkbox" value="" name="organic">Organic</label>
									</div>
								</div>
								<div class="col-md-6">
									<label for="Farm">Farm Grown At</label>
									<input type="text" name="farm" class="form-control" value="{{$vendor_item->farm}}">
								</div>
							</div>
						</div>
						<div class="form-group" id="">
						</div>
						<button class="btn btn-default">Edit Item</button>
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