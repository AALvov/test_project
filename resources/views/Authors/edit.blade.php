@extends('layout.app')
@section('title')
    Редактирование Автора
@endsection
@section('content')
    <style>
        span {
            margin-bottom: 10px;
        }
    </style>
    <h3> Редактирование автора</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/authors/{{$author->id}}" style="display: flex; flex-direction: column"
          enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <span>      <label for="name">Имя</label>
        <input type="text" name="name" id="name" value="{{$author->name}}">
  </span>
        <span>
             <label for="email">Email</label>
        <input type="email" name="email" id="email" value="{{$author->email}}">
        </span><span><label for="phone">Номер телефона</label>
        <input type="tel" name="phone" value="{{$author->phone}}" id="phone"></span><span><label
                for="avatar">Аватар</label>
        <input type="file" accept="image/*," name="avatar" id="avatar">
        <img src="{{asset('storage/authors/') .'/'. $author->avatar}}" alt="avatar" width="300px" height="300px">
            <input type="hidden" name="hidden_image" value="{{$author->avatar}}">
        </span><span><input type="submit"
                            value="Сохранить"
                            class="btn">
        <a href="/authors" class="btn">Отмена</a></span>


    </form>
@endsection
