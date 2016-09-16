@extends('layouts.app')

@section('content')
<style>
	.no-gutter > [class*='col-'] {
		padding-left:0;
	}
	.nospacing {
		margin: 0px;
		padding: 0px;
	}
	.padding_bottom {
		margin-bottom: 0px;
		padding-bottom: 5px;
	}
	.padding-left {
		margin-bottom: 0px;
		padding-left: 10px;
	}
	.created_at {
		font-size: 12px;
	}
</style>
<div id="farmers_market"> <!-- vue container -->
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<ul class="list-group">
							<li class="list-group-item">
								<p class="padding_bottom" style="font-size: 20px;">
									<a href="{{App\User::getUrlForUser($post->user_id)}}">
										{{App\User::getNameOfUser($post->user_id)}}
									</a>
								</p>
								<p class="nospacing">{{$post->message}}</p>
								<p class="nospacing created_at">{{$post->created_at->format('m/d/Y')}}</p>
								<p class="no_margin">
								<a href="/post/{{$post->id}}/likes">{{App\Post_Like::where('post_id', $post->id)->count()}}</a>
								<a href="">
								<i style="padding-left: 2px;" class="fa fa-thumbs-o-up" aria-hidden="true"></i></a>
								<span style="padding-left: 20px;">
								{{App\Post_Comment::where('post_id', $post->id)->count()}}
								<i style="padding-left: 2px;" class="fa fa-commenting-o" aria-hidden="true" href=""></i>
								</span>
								</p>
							</li>
							@foreach ($post_comments as $post_comment)
							<li class="list-group-item">
								<p class="padding_bottom" style="font-size: 20px;">
									<a href="{{App\User::getUrlForUser($post_comment->user_id)}}">
										{{App\User::getNameOfUser($post_comment->user_id)}}
									</a>
								</p>
								<p class="nospacing">{{$post_comment->comment}}</p>
								<p class="nospacing">{{$post_comment->created_at->format('m/d/Y')}}</p>
							</li>
							@endforeach
							<form method="POST">
							{{csrf_field()}}
							<li class="list-group-item">
							<textarea style="resize:none" class="form-control" rows="5" id="comment" name="comment" placeholder="add a comment"></textarea>
							<div style="padding-top: 10px">
							<button class="btn btn-default">Comment</button>
							</div>
							</form>
							</li>
						</ul>
					</div> 
				</div>
			</div>
		</div>
	</div>
</div>
@endsection