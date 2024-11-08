@extends('layout.main')
<!--  https://laravel.su/docs/11.x/blade#rassirenie-maketa -->

@section('title')
Список  цветов
@endsection

@section('head')
Список цветов
@endsection

@section('menu')
 Меню
@endsection

@section('content')
<div>

</div>
@endsection

<form action="?data=send" method="post">
    @csrf
    <div>

      <input type="text" name="title"
       id="title" @error('title') style="background-color: yellow;" @enderror   
       value="{{ old('title') }}"
       />
    </div>

    <div>
      <input type="submit"
       value="Записать цвет" />
    </div>
</form>

<h3>Список цветов:</h3>
@foreach ($color as $row)
    <div>  
       {{ $row->title }}
       <a href="{{route('color.delete',['id' => $row->id])}}"> [Удалить]</a>
    </div>
@endforeach
