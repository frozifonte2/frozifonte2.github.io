@extends('layouts.app')
@section('title', 'Форма обратной связи')
@section('form', 'active')
@section('content')
<div class="container">
	@include('inc.header')
	<h1>Связаться</h1>
	@if(session()->has('message'))
	<div class="alert alert-primary alert-dismissible fade show" role="alert">
		{{session()->get('message')}}
		<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	</div>
	@endif
	<form action="{{route('storeMessage')}}" method="post">
		@csrf
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">ФИО</label>
			<input type="text" name="fio" class="form-control" required>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Адрес</label>
			<input type="text" name="address" class="form-control" required>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Телефон</label>
			<input type="phone" name="phone" class="form-control" required>
		</div>
		<div class="mb-3">
			<label for="exampleFormControlInput1" class="form-label">Email</label>
			<input type="email" name="email" class="form-control"  required>
		</div>
		<button class="btn btn-secondary">Отправить</button>
	</form>

</div>


@endsection