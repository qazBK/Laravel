@extends('layout.main')


@section('title')
Главная страница
@endsection

@section('head')
Главная страница
@endsection

@section('content')

@livewire('StreettForm')
Текст главной страницы
@livewire('counter')

@livewire('listcolors')
@endsection