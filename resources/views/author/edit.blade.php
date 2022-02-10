@extends('layouts.app2')

@section('title', 'Изменение автора')

@section('header', 'Изменение автора')

@section('content')
    {{ Form::model($author, ['url' => route('authors.update', $author), 'method' => 'PATCH']) }}
        @include('author.form')
        {{ Form::submit('Обновить') }}
    {{ Form::close() }}
@endsection
