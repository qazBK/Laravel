@extends('layout.main')

@section('title')
Главная страница
@endsection

@section('head')
Главная страница
@endsection

@section('content')

Текст главной страницы
@livewire('counter')

@livewire('listcolors')
@endsection