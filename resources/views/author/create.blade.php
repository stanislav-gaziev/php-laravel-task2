@extends('layouts.app2')

@section('title', 'Новый автор')

@section('header', 'Новый автор')

@section('content')
    {{ Form::model($author, ['url' => route('authors.store')]) }}
        @include('author.form')
        {{ Form::submit('Создать') }}
    {{ Form::close() }}
@endsection
