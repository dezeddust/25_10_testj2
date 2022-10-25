@extends('news.layout')
@section('content')
<div class="container-fluid">
	<div class="row">
		<h4>Content</h4>
	</div>
	<form action="{{route('news.post_news')}}" method="POST">
		@csrf
		<div class="row form-group">
			<textarea name="news" class="form-control"> What's on your mind?</textarea>
		</div>
		<div class="row form-group">
			<button class="btn btn-primary">Post</button>
		</div>
	</form>
</div>

<div class="container-fluid">
	<div class="row">
		@foreach($news as $each)
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="jumbotron">
			{{$each->content}} <br>
				<a href="{{route('news.edit',$each)}}">Edit</a> <br>
				{{$each->updated_at->diffForHumans()}}
			</div>
		</div>
		@endforeach
	</div>
</div>
@endsection