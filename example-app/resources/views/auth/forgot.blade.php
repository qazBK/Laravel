extends('layout.main')

@section('title', 'Восстановление пароля')

@section('content')
    <div>
        <div>
            <h1>Восстановление пароля</h1>

            <form method="POST" action="{{ route("forgot_process") }}">
                @csrf

                <input name="email" type="text" placeholder="Email" />

                @error('email')
                    <p>{{ $message }}</p>
                @enderror

                <div>
                    <a href="{{ route("login") }}" >Вспомнил пароль</a>
                </div>

                <button type="submit">Восстановить</button>
            </form>
        </div>
    </div>
@endsection