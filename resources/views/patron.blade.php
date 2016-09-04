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
						<div class="row" id="">
							<div class="col-md-6">
							<h3>
								{{$patron->username}}
							</h3>
							</div>
						</div>
						<div class="row" id="">
							<div class="col-md-12" id="">
								<h4>Reviews Written ({{count($patron_reviews)}})</h4>	
								<ul class="list-group">
									@if (count($patron_reviews) == 0)
									<li class="list-group-item">
										<a href="">No Reviews are available.  Click here to add a new review</a>
									</li>
									@else
										@foreach ($patron_reviews as $patron_review)
											<li class="list-group-item">
												@if (App\User::find($patron_review->reviewed_id)->type_account == 1)
					                                <h3><a href="{{url('/farmers_market/'. App\User::getUserInformationTable($patron_review->reviewed_id)->id)}}">{{App\User::getNameOfUser($patron_review->reviewed_id)}}</a></h3>
					                            @elseif (App\User::find($patron_review->reviewed_id)->type_account == 2)
					                                <h3><a href="{{url('/patron/'. App\User::getUserInformationTable($patron_review->reviewed_id)->id)}}">{{App\User::getNameOfUser($patron_review->reviewed_id)}}</a></h3>
					                            @elseif (App\User::find($patron_review->reviewed_id)->type_account == 3)
					                                <h3><a href="{{url('/vendor/'. App\User::getUserInformationTable($patron_review->reviewed_id)->id)}}">{{App\User::getNameOfUser($patron_review->reviewed_id)}}</a></h3>
					                            @endif								
												<p>{{$patron_review->review}}</p>
												<p>{{$patron_review->rating}}</p>
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