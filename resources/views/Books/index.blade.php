@extends('layout.app')
@section('title')
    Книги
@endsection

@section('content')
    <a class="btn" href="{{route('books.create')}}">Добавить новую книгу</a>
    <table>
        <thead>
        <tr>
            <th>Название</th>
            <th>Автор</th>
            <th>Описание</th>
            <th>Цена</th>
            <th style="width: 20%"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->author->name}}</td>
                <td>{{$book->description}}</td>
                <td>{{$book->price}}
                </td>
                <td>
                    <a href="/books/{{$book->id}}" class="btn" style="margin-bottom: 0">Просмотр</a>
                    <a href="/books/{{$book->id}}/edit" class="btn" style="margin-bottom: 0">Обновить</a>
                    <form method="POST" style="display: inline-block" action="/books/{{$book->id}}">
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
