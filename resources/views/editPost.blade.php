@extends('layouts.app')
@section('title', 'Редактировать пост')
@section('content')
<div class="container">
	@include('inc.header')
	<a class="btn btn-secondary" href="{{route('home')}}" style="margin-bottom:20px">Назад</a>
	@if(session()->has('editPost'))
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		{{session()->get('editPost')}}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<form action="{{route('patchPost', $post->id)}}" method="post">
		@csrf
		@method('patch')
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Название</label>
			<input type="text" name="title" class="form-control" value="{{$post->title}}">
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Текст</label>
			<textarea type="text" name="text" class="form-control" row="120">{{$post->text}}</textarea>
		</div>
		<button type="submit" class="btn btn-success">Отредактировать</button>
	</form>
</div>
@endsection