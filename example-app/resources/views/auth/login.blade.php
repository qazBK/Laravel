@extends('layout.main')

@section('title', 'Авторизация')

@section('content')
        <div>
            <h1>Вход</h1>

            <form method="POST" action="{{ route("login_process") }}">
                @csrf

                <input name="email" type="text" placeholder="Email" />

                @error('email')
                    <p>{{ $message }}</p>
                @enderror

                <input name="password" type="password" placeholder="Пароль" />

                @error('password')
                    <p>{{ $message }}</p>
                @enderror

                <div>
                    <a href="{{ route("forgot") }}">Забыли пароль?</a>
                </div>

                <div>
                    <a href="{{ route("register") }}">Регистрация</a>
                </div>

                <button type="submit">Войти</button>
            </form>
        </div>
@endsection