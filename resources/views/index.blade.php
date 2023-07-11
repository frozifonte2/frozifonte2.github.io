@extends('layouts.app')
@section('title', 'Главная страница')
@section('index', 'active')
@section('content')
<div class="container">
	@include('inc.header')
	<h1>Главная страница</h1>
	<h4>Последние новости</h4>
	<div class="row row-cols-1 row-cols-md-2 g-4">
		@if(count($posts) !== 0)
		@foreach($posts as $post)
		<div class="col">
			<div class="card">
				<div class="card-body">
					<h5 class="card-title"><a href="{{route('showNews', $post->id)}}">{{$post->title}}</a></h5>
					<p class="card-text">{{mb_substr($post->text, 0, 200) . '...'}}</p>
					<time>{{$post->created->format('d.m.y')}}</time>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	<a href="{{route('news')}}" style="margin-top:20px; display: block;">Все новости</a>
	@else
	<p>В данный момент новости отсутствуют</p>
	@endif
</div>

@endsection