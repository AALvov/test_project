@extends('layout.app')
@section('title')
    Создание Книги
@endsection
@section('content')
    <style>
        span {
            margin-bottom: 10px;
        }
    </style>
    <h3> Добавление новой книги</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/books" style="display: flex; flex-direction: column">
        @csrf
        <span>      <label for="name">Название</label>
        <input type="text" name="name" id="name">
  </span>
        <span>
             <label for="author">Автор</label>
        <select name="author_id" id="author">
                <option value=""></option>
            @foreach(\App\Models\Author::all() as $author)
                <option value="{{$author->id}}">{{$author->name}}</option>

            @endforeach
        </select>
        </span><span><label for="description">Описание</label>
        <textarea name="description" id="description"></textarea>
            </span>
        <span><label for="price">Цена</label>
        <input type="number" min="0" name="price" id="price"></span>
        <span><input type="submit"
                     value="Сохранить"
                     class="btn">
        <a href="/books" class="btn">Отмена</a></span>


    </form>
@endsection
