@can('menu') 
@else
@endcan
<div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
    
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto  text-decoration-none">
      <span class="fs-4">Меню</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item"><a href="#" class="nav-link active" aria-current="page"> Домой </a></li>

      <li><a href="{{route('car')}}" {{ Route::currentRouteName() == 'car' ? 'aria-current="page"' : '' }} class="nav-link"> Машины </a></li>
      <li><a href="{{route('color')}}" {{ Route::currentRouteName() == 'color' ? 'aria-current="page"' : ''}} class="nav-link "> Цвета </a></li>
      
      <li>
        <a href="#" class="nav-link "> Бренды </a>
      </li>
      <li>
        <a href="#" class="nav-link ">  Настройки</a>
      </li>

@if (Route::has('login'))
      @auth
      <li>
          <a href="{{ url('/logout') }}" class="nav-link ">
                    Выход</a>
      </li>
      @else
          <li>
          <a href="{{ route('login') }}" class="nav-link ">Авторизация</a>
          </li>
          @if (Route::has('register'))
          <li>
              <a href="{{ route('register') }}" class="nav-link ">Регистрация</a>
          </li>
          @endif
      @endauth
@endif
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center  text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>
            @auth
            {{auth('web')->user()->email}}

            @can( 'super') 
             (Super)
            @endcan

            @endauth
            @guest
            ... Гость...
            @endguest        
        </strong>
      </a>

  

      <ul class="dropdown-menu text-small shadow">
        <li><a class="dropdown-item" href="#">Профиль</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Выход</a></li>
      </ul>
    </div>
  </div>

  <div class="b-example-divider b-example-vr"></div>