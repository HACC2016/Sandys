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
	                <div class="panel-heading">My Events ({{count($events)}})<a style="padding-left: 10px;" href="{{url('/add_event')}}">Add An Event</a>
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
							<div class="col-md-12" id="">
								<ul class="list-group">
								@foreach ($events as $event)
									<li class="list-group-item">
										<div class="row" id="">
											<div class="col-md-6" id="">
												<h4>{{$event->event_name}}</h4>
												<p>{{$event->event_description}}</p>
											</div>
											<div class="col-md-6" id="">
												<p>Start Time: {{$event->start_month}} {{$event->start_day}} {{$event->start_year}}</p>
												<p>End Time: {{$event->end_month}} {{$event->end_day}} {{$event->end_year}}</p>
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