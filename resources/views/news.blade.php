@extends('layouts.app')
@section('title', 'Список новостей')
@section('news', 'active')
@section('content')
<div class="container">
	@include('inc.header')
	<h1>Все новости</h1>
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
		{{$posts->links()}}
		@else
		<p>В данный момент новости отсутствуют</p>
		@endif
	</div>
</div>
@endsection