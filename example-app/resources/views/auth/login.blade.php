@extends('layout.main')

@section('title', 'Авторизация')

@section('content')
        <div>
            <h1>Вход</h1>

            <form method="POST" action="{{ route("login_process") }}">
                @csrf

            <div class="row g-3">
                <div class="col-sm-4">                
                    <label for="email" class="form-label">E-mail:</label>
                    <input name="email" class="form-control" type="text" placeholder="Email"  required/>

                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>
                <div class="col-sm-4">                
                    <label for="password" class="form-label">Пароль:</label>
                    <input name="password" class="form-control" type="password" placeholder="Пароль" />

                    @error('password')
                        <p>{{ $message }}</p>
                    @enderror
                </div>                

                <div class="row g-3">
                    <div class="col-sm-8">                
                        <button class="w-100 btn btn-success" type="submit" >Войти</button>
                    </div>
                </div>

                    

                <div class="row g-3">
                    <div class="col-sm-4">                
                    <a class="w-100 btn btn-primary" href="{{ route("forgot") }}">Забыли пароль?</a>
                    </div>
                    <div class="col-sm-4">                
                    <a class="w-100 btn btn-primary" href="{{ route("register") }}">Регистрация</a>
                    </div>
                </div>


            </form>
        </div>
@endsection
