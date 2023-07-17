@extends('layout.app')
@section('title')
    Авторы
@endsection

@section('content')
    <a class="btn" href="{{route('authors.create')}}">Добавить нового Автора</a>
    <table>
        <thead>
        <tr>
            <th>Имя</th>
            <th>email</th>
            <th>Телефон</th>
            <th>Аватар</th>
            <th style="width: 20%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{$author->name}}</td>
                <td>{{$author->email}}</td>
                <td>{{$author->phone}}</td>
                <td><img src="{{asset('storage/authors/') .'/'. $author->avatar}}" width="300px" height="300px" alt="">
                </td>
                <td>
                    <a href="/authors/{{$author->id}}" class="btn" style="margin-bottom: 0">Просмотр</a>
                    <a href="/authors/{{$author->id}}/edit" class="btn" style="margin-bottom: 0">Обновить</a>
                    <form method="POST" style="display: inline-block" action="/authors/{{$author->id}}">
                        @method('DELETE')
                        @csrf
                        <input type="submit" style="margin-bottom: 0" class="btn" value="Удалить">
                    </form>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
