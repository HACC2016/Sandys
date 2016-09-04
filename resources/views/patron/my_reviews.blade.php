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
	                <div class="panel-heading">My Reviews ({{count($reviews)}})<a style="padding-left: 10px;" href="{{url('/add_new_review')}}">Add A New Review</a>
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
							<div class="col-md-12" id="">
								<ul class="list-group">
									@if(count($reviews) == 0)
										<a href="">You have not written any reviews. Click Here to add a New Review</a>
									@else
										@foreach ($reviews as $review)
											<li class="list-group-item">
												@if(App\User::find($review->reviewed_id)->type_account == 1)
													<h4><a href="{{url('farmers_market/'. App\User::getUserInformationTable($review->reviewed_id)->id)}}">{{App\User::getUserInformationTable($review->reviewed_id)->farmers_market_name}}</a></h4>
												@elseif(App\User::find($review->reviewed_id)->type_account == 2)
													<h4>{{App\User::getUserInformationTable($review->reviewed_id)->username}}</h4>
												@elseif(App\User::find($review->reviewed_id)->type_account == 3)
													<h4><a href="{{url('vendor/'. App\User::getUserInformationTable($review->reviewed_id)->id)}}">{{App\User::getUserInformationTable($review->reviewed_id)->vendor_name}}</a></h4>
												@endif
												<p>{{$review->review}}</p>
												<p>{{$review->rating}}</p>
												<a href="{{url('edit/review/' . $review->id)}}" class="btn btn-default">Edit</a>
			                                    <form method="POST" action="{{url('/delete/review')}}">
			                                        {{csrf_field()}}
			                                        <input type="hidden" readonly="readonly" value="{{$review->id}}" name="id">
			                                        <button class="btn btn-default">Delete</button>
			                                    </form>
											</li>
										@endforeach
									@endif
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