<style>
    .active {
        background-color: greenyellow;
    }
</style>

@auth
!!! Вы авторизованы !!! {{auth('web')->user()->email}}
@endauth

@guest
    ... Гость...
@endguest

<ul>
    <li><a href="{{route('car')}}" class="{{ Route::currentRouteName() == 'car' ? 'active' : '' }}" > Список машин </a></li>
    <li><a href="{{route('color')}}" class="{{ Route::currentRouteName() == 'color' ? 'active' : '' }}"> Список цветов </a></li>

    @if (Route::has('login'))
            @auth
            <li>
                <a href="{{ url('/logout') }}" >Выход</a>
            </li>
            @else
                <li>
                <a href="{{ route('login') }}" >Авторизация</a>
                </li>
                @if (Route::has('register'))
                <li>
                    <a href="{{ route('register') }}">Регистрация</a>
                </li>
                @endif
            @endauth
    @endif

</ul>