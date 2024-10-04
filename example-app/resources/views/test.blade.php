<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@php
    $info = DB::table('infos')->get();
@endphp

@foreach ($info as $row)
    <div>  
        <h2>{{$row->title}}</h2>
        <code>{{$row->text}}</code>
    </div>
@endforeach
</body>
</html>