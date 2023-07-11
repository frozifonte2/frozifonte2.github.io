@extends('layouts.app')
@section('title', 'Сообщение')
@section('content')
<div class="container">
	<nav class="navbar navbar-expand-lg text-center bg-body-tertiary " style="justify-content:center;background-color: #fff;padding-top: 10px;padding-bottom: 10px;">
		<div class="container-fluid text-center">
			<a class="navbar-brand" href="#">Demis Group</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="{{route('index')}}">Главная</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('news')}}">Новости</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{route('form')}}">Связаться</a>
					</li>
				</ul>
			</div>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link active"  href="#" aria-current="page">Профиль</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container" style="margin-top:20px;">
		<a href="{{route('home')}}" class="btn btn-secondary" style="margin-bottom: 20px;">Назад</a>
		@foreach($message as $mess)
		<div class="col">
			<p><strong>Имя: </strong> {{ $mess->fio }}</p>
			<p><strong>Адрес: </strong> {{ $mess->address }}</p>
			<p><strong>Номер телефона:</strong> {{ $mess->phone }}</p>
			<p><strong>Email: </strong> {{$mess->email}}</p>
		</div>
		@endforeach
	</div>
</div>
@endsection