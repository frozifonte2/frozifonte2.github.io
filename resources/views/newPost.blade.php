@extends('layouts.app')
@section('title', 'Новый пост')
@section('content')
<div class="container">
	@include('inc.header')
	<a class="btn btn-secondary" href="{{route('home')}}" style="margin-bottom:20px">Назад</a>
	@if(session()->has('post'))
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
	  {{session()->get('post')}}
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<form action="{{route('storePost')}}" method="post">
		@csrf
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Название</label>
			<input type="text" name="title" class="form-control" required>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Текст</label>
			<textarea type="text" name="text" class="form-control" row="120" required></textarea>
		</div>
		<button class="btn btn-success">Отправить</button>
	</form>
</div>
@endsection