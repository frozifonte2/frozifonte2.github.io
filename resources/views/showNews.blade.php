@extends('layouts.app')
@section('title', $post[0]->title)
@section('content')
<div class="container">
    @include('inc.header')
    <div class="container" style="margin-top:20px;">
        <div class="row">
            <div class="col">
              <h5 class="text-center" style="margin-top:16px;">{{$post[0]->title}}</h5>
              <p>{{$post[0]->text}}</p>
          </div>
      </div>
  </div>
  <hr>
  <h4>Добавить комментарий</h4>
  @if(session()->has('comment'))
  <div class="alert alert-primary alert-dismissible fade show" role="alert">
    {{session()->get('comment')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<hr>
<form action="{{route('storeComment', $post[0]->id)}}" method="post">
    @csrf
    @guest
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Введите имя:</label>
        <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1" placeholder="">
    </div>
    @endguest
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Введите сообщение</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Оставить комментарий</button>
</form>
<hr>
@if($comments->count() !== 0)
<h4 style="margin-bottom: 10px;">Комментарии ({{$comments->count()}})</h4>
<hr>
@foreach($comments as $comment)
<div class="card" style="margin-bottom: 10px;">
    <div class="card-body">
        <p><strong>{{$comment->user_name}}:</strong></p>
        {{$comment->comment}}
    </div>
</div>
@endforeach
<hr>
{{$comments->links()}}
<hr>
@endif
<h4>Другие новости</h4>
<div class="row row-cols-1 row-cols-md-2 g-4" style="margin-top:10px;">
    @foreach($posts as $postt)
    @if($postt->id !== $post[0]->id)
    <div class="col" style="margin-top: 10px;">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><a href="{{route('showNews', $postt->id)}}">{{$postt->title}}</a></h5>
                <p class="card-text">{{mb_substr($postt->text, 0, 100) . '...'}}</p>
                <time>{{$postt->created->format('d.m.y')}}</time>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    {{$posts->links()}}
</div>
</div>
@endsection
