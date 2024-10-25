@php

@endphp
<style>
    .active {
        background-color: greenyellow;
    }
</style>

<ul>
    <li><a href="{{route('car')}}" class="{{ Route::currentRouteName() == 'car' ? 'active' : '' }}" > Список машин </a></li>
    <li><a href="{{route('color')}}" class="{{ Route::currentRouteName() == 'color' ? 'active' : '' }}"> Список цветов </a></li>
</ul>