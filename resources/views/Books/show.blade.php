@extends('layout.app')
@section('title')
    Просмотр книги
@endsection
@section('content')
    <style>
        span {
            margin-bottom: 10px;
        }
    </style>
    <h3> Просмотр книги</h3>

    <form method="POST" action="/books" style="display: flex; flex-direction: column">
        @csrf
        <span>      <label for="name">Название</label>
        <input type="text" disabled name="name" id="name" value="{{$book->name}}">
  </span>
        <span>
             <label for="author">Автор</label>
            <input type="text" disabled id="author" name="author" value="{{$book->author->name}}">
        </span>
        <span><label for="description">Описание</label>
            <textarea disabled name="description" id="description">{{$book->description}}</textarea> </span>
        <span><label for="price">Цена</label>
        <input type="number" disabled min="0" name="price" id="price" value="{{$book->price}}"></span>
        <span>
        <a href="/books" class="btn">Отмена</a></span>


    </form>
@endsection
