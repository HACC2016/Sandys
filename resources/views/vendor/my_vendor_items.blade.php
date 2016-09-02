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
				                                    <img src="{{route('getentry', App\Photo::find($vendor_item->photo_id)->filename)}}" alt="ALT NAME" class="img-responsive" />
												</div>
												<div class="col-md-9" id="">
													<h4>{{$vendor_item->item}}</h4>
													<p>{{$vendor_item->description}}</p>
													<p>${{$vendor_item->price}} per {{$vendor_item->price_per}}</p>
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