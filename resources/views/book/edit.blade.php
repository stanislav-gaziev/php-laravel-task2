@extends('layouts.app2')

@section('title', 'Изменение книги')

@section('header', 'Изменение книги')

@section('content')
    {{ Form::model($book, ['url' => route('books.update', $book), 'method' => 'PATCH']) }}
        @include('book.form')
        {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
