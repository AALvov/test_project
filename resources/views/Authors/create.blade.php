@extends('layout.app')
@section('title')
    Создание Автора
@endsection
@section('content')
    <style>
        span {
            margin-bottom: 10px;
        }
    </style>
    <h3> Добавление нового автора</h3>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/authors" style="display: flex; flex-direction: column" enctype="multipart/form-data">
        @csrf
        <span>      <label for="name">Имя</label>
        <input type="text" name="name" id="name">
  </span>
        <span>
             <label for="email">Email</label>
        <input type="email" name="email" id="email">
        </span><span><label for="phone">Номер телефона</label>
        <input type="tel" name="phone" id="phone"></span><span><label for="avatar">Аватар</label>
        <input type="file" accept="image/*," name="avatar" id="avatar"></span><span><input type="submit"
                                                                                                        value="Сохранить"
                                                                                                        class="btn">
        <a href="/authors" class="btn">Отмена</a></span>


    </form>
@endsection
