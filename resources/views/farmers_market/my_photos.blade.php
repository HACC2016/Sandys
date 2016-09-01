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
	                <div class="panel-heading">My Photos ({{count($photos)}})<a style="padding-left: 10px;" href="{{url('/post_photo')}}">Post A New Photo</a>
	                </div>
					<div class="panel-body">
						<div class="row" style="padding-top: 20px;">
                            @foreach ($photos as $photo)
                                <div class="col-md-3" id="">
                                    <img src="{{route('getentry', $photo->filename)}}" alt="ALT NAME" class="img-responsive" />
                                </div>
                            @endforeach
						</div>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection