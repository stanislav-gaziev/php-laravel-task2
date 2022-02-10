@extends('layouts.app2')

@section('title', 'Список авторов')

@section('header', 'Список авторов')

@section('content')
    @if(Session::has('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    <a href="{{route('authors.create')}}">Создать автора</a></br></br>

    @foreach ($authors as $author)
        <h2><a href="{{route('authors.show', $author)}}">{{$author->full_name}}</a></h2>
        @if($author->books->count() > 0)
            <p>Количество книг: {{$author->books->count()}}</p>
        @endif
        <a href="{{route('authors.edit', $author)}}">Изменить</a> <a href="{{route('authors.destroy', $author)}}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Удалить</a></br></br>
    @endforeach
@endsection

@section('pagination')
    {{$authors->links()}}
@endsection
