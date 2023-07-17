@extends('layout.app')
@section('title')
    Просмотр Автора
@endsection
@section('content')
    <style>
        span {
            margin-bottom: 10px;
        }
    </style>
    <h3> Просмотр автора</h3>
    <form method="POST" action="/authors" style="display: flex; flex-direction: column" enctype="multipart/form-data">
        @csrf
        <span>      <label for="name">Имя</label>
        <input type="text" name="name" id="name" disabled value="{{$author->name}}">
  </span>
        <span>
             <label for="email">Email</label>
        <input type="email" name="email" id="email" disabled value="{{$author->email}}">
        </span>
        <span><label for="phone">Номер телефона</label>
        <input type="tel" name="phone" disabled value="{{$author->phone}}" id="phone"></span><span><label
                for="avatar">Аватар</label>
        <img src="{{asset('storage/authors/') .'/'. $author->avatar}}" alt="avatar" id="avatar" width="300px" height="300px">
        </span>
        <span>
        <a href="/authors" class="btn">Отмена</a></span>


    </form>
@endsection
