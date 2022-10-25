@extends('news.layout')
@section('content')
<div class="container-fluid">
	<div class="row">
		<h4>Content</h4>
	</div>
	<form action="{{route('news.update',$news)}}" method="POST">
		@method('PUT')
		@csrf
		<div class="row form-group">
			<textarea name="news" class="form-control" value="">{{$news->content}}</textarea>
		</div>
		@error('news')
			<div class="alert alert-danger" role="alert"> {{$message}}</div>
		@enderror
		<div class="row form-group">
			<button class="btn btn-primary">Save</button>
		</div>
	</form>
</div>
@endsection