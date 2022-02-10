@extends('layouts.app2')

@section('title', 'Новая книга')

@section('header', 'Новая книга')

@section('content')
    {{ Form::model($book, ['url' => route('books.store')]) }}
        @include('book.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
