<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="/css/app.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>


    <main>
        <h1 class="visually-hidden">@yield('head')</h1>
      
        <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
              <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <span class="fs-4">@yield('title')</span>
            </a>
      
            <ul class="nav nav-pills">
              <li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Домой</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Машины</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Цвета</a></li>
              <li class="nav-item"><a href="#" class="nav-link">Бренды</a></li>
            </ul>
          </header>


          <div class="b-example-divider"></div>
          <div class="container-fluid pb-3">
            <div class="d-grid gap-3" style="grid-template-columns: 1fr 5fr;">
              <div class="bg-body-tertiary border rounded-3">
                @hasSection('menu')
                @yield('menu')
                @endif    
            
                @sectionMissing('menu')
                 @include('menu')
                @endif    
                  
              </div>
              <div class="bg-body-tertiary border rounded-3">
                <div class="container">
                    @yield('content')
                </div>
              </div>
            </div>
          </div>          

          <div class="b-example-divider"></div>          
      </main>
    


    <script src="/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>