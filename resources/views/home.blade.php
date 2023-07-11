@extends('layouts.app')
@section('title', 'Мой профиль')
@section('home', 'active')
@section('content')
<div class="container">
  @include('inc.header')
  <div class="container text-center" style="margin-top:20px;">
    <div class="row">
      <div class="col">
        <h5 style="margin-top:16px;">Сообщения</h5>
        @if(session()->has('delete'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
          {{session()->get('delete')}}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        @if(count($messages) !== 0)
        <div class="wrapper" style="box-sizing:border-box; overflow-x:scroll;">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Дата</th>
                <th scope="col">ФИО</th>
                <th scope="col">Email</th>
                <th scope="col" colspan="3">Действия</th>
              </tr>
            </thead>
            <tbody>
             @foreach($messages as $message)
             <tr>
              <th scope="row">{{$message->created->diffForHumans()}}</th>
              <td>{{$message->fio}}</td>
              <td>{{$message->email}}</td>
              <td><a href="{{route('showMessage', $message->id)}}">Посмотреть</a></td>
              <td>
                <form action="{{route('deleteMessage', $message->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <button type="submit" class="text-danger" style="outline: 0; border: 0;">Удалить</button>
                </form>

              </td>
            </div>

          </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center">
        {{$messages->links()}}
      </div>
      @else
      <p>Новых сообщений нет</p>
      @endif
    </div>
    <div class="col">
      <div class="d-flex justify-content-center align-items-center">
        <h5 style="margin-right:10px">Посты</h5>
        <a href="{{ route('newPost') }}" style="margin-bottom:10px;" class="btn btn-primary">Новый пост</a>
      </div>
      @if(session()->has('deletePost'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        {{session()->get('deletePost')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      @endif
      @if (count($posts) !== 0)
      <div class="wrapper" style="box-sizing:border-box; overflow-x:scroll;">
        <table class="table table-striped" style="box-sizing:border-box; overflow-x:scroll;">
          <thead>
            <tr>
              <th scope="col">Дата</th>
              <th scope="col">Название</th>
              <th scope="col" colspan="3">Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <th scope="row">{{$message->created->diffForHumans()}}</th>
              <td>{{$post->title}}</td>
              <td><a href="{{route('showNews', $post->id)}}">Посмотреть</a></td>
              <td><a href="{{route('editPost', $post->id)}}" class="text-success">Изменить</a></td>
              <td>
                <form action="{{route('deletePost', $post->id)}}" method="post">
                  @csrf
                  @method('delete')
                  <button type='submit' class="text-danger" style="border:0;outline:0;">ُУдалить</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center">
          {{$posts->links()}}
        </div>
        @else
        <p>Посты отсутствуют</p>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
