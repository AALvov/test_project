@extends('layout.app')
@section('title')
    Редактирование Книги
@endsection
@section('content')
    <style>
        span {
            margin-bottom: 10px;
        }
    </style>
    <h3> Редактирование Книги</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/books/{{$book->id}}" style="display: flex; flex-direction: column"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <span>      <label for="name">Название</label>
        <input type="text" name="name" id="name" value="{{$book->name}}">
  </span>
        <span>
             <label for="author">Автор</label>
        <select name="author_id" id="author">
            <option value="{{$book->author->id}}">{{$book->author->name}}</option>
            @foreach(\App\Models\Author::all() as $author)
                @if($author->id === $book->author->id)
                    @continue
                @else
                    <option value="{{$author->id}}">{{$author->name}}</option>
                @endif
            @endforeach
        </select>
        </span>
        <span><label for="description">Описание</label>
            <textarea type="textarea" name="description" id="description">{{$book->description}}</textarea>
            </span>
        <span><label for="price">Цена</label>
        <input type="number" min="0" name="price" id="price" value="{{$book->price}}"></span>

        <span><input type="submit"
                     value="Сохранить"
                     class="btn">
        <a href="/books" class="btn">Отмена</a></span>


    </form>
@endsection
