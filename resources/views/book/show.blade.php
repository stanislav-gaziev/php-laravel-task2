@extends('layouts.app2')

@section('title')
    {{$book->name}}
@endsection

@section('header')
    {{$book->name}}
@endsection

@section('content')
    {{$book->price}}
@endsection
