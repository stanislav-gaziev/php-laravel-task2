@extends('layouts.app2')

@section('title', 'Список книг')

@section('header', 'Список книг')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <a href="{{route('books.create')}}">Создать книгу</a></br></br>

    @foreach ($books as $book)
        <h2><a href="{{route('books.show', $book)}}">{{$book->name}}</a></h2>
        @if($book->authors->count() > 0)
            <p>Авторы: {{$book->authors->implode('full_name', ', ')}}</p>
        @endif
        <a href="{{route('books.edit', $book)}}">Изменить</a> <a href="{{route('books.destroy', $book)}}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a></br></br>
    @endforeach
@endsection

@section('pagination')
    {{$books->links()}}
@endsection
