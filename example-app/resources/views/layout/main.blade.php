<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="/css/app.css" rel="stylesheet">
</head>
<body>

    Заголовок Раздела: <hr>
    <h1>@yield('head')</h1>
    <hr>Конец Заголовка раздела<hr>

    @hasSection('menu')
        Заголовок Меню: <hr>
        @yield('menu')
        <hr>Конец Меню раздела<hr>
    @endif    

    @sectionMissing('menu')
    <hr> Нет меню <hr>
    @endif    


    Начало контента: <hr>
    @yield('content')
    <hr>
    Конец контента: <hr>

    <script src="/js/app.js"></script>
</body>
</html>