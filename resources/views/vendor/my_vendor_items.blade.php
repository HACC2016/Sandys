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
	                <div class="panel-heading">My Vendor Items <a style="padding-left: 10px;" href="{{url('/add_vendor_item')}}">Add An Item</a>
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
							<div class="col-md-12" id="">
								<ul class="list-group">
									@foreach ($vendor_items as $vendor_item)
										<li class="list-group-item">
											<div class="row">
												<div class="col-md-3" id="">
													@if ($vendor_item->photo_id != null)
					                                    <img src="{{route('getentry', App\Photo::find($vendor_item->photo_id)->filename)}}" alt="ALT NAME" class="img-responsive" />
				                                    @endif
												</div>
												<div class="col-md-7" id="">
													<h4><a href="{{url('my_vendor_item/' . $vendor_item->id)}}">{{$vendor_item->item}}</a></h4>
													<p>{{$vendor_item->description}}</p>
													<p>${{$vendor_item->price}} per {{App\Vendor_Item::getPricePer($vendor_item->price_per)}}
													</p>
													<p>Grew/Made at {{$vendor_item->farm}}</p>
													<p>
													@if($vendor_item->local == 1)
													<span class="label label-success">Local</span>
													@else
													<span class="label label-danger">Not Local</span>
													@endif
													@if($vendor_item->nongmo == 1)
													<span class="label label-success">Non-GMO</span>
													@else
													<span class="label label-danger">GMO</span>
													@endif
													@if($vendor_item->organic == 1)
													<span class="label label-success">Organic</span>
													@else
													<span class="label label-danger">Not Organic</span>
													@endif
													</p>
												</div>
												<div class="col-md-2" id="">
													<a href="{{url('/vendor_item/' . $vendor_item->id . '/edit')}}" class="btn btn-default">Edit</a>
													<br>
													<a href="{{url('/vendor_item/'. $vendor_item->id . '/delete')}}" class="btn btn-default" style="margin-top: 5px">Delete</a>
												</div>
											</div>
										</li>
									@endforeach
								</ul>
							</div>						
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection