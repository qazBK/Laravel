@extends('layout.main')
<!--  https://laravel.su/docs/11.x/blade#rassirenie-maketa -->

@section('title')
Список машин
@endsection

@section('head')
Список машин
@endsection

@section('menu')
 Меню
@endsection

@section('content')


<div>
Форма добавления 
<form action="?data=send" method="post">
    @csrf
    <div>
      <label for="brand">brand: </label>
      <input type="text" name="brand"
       id="brand" required />
    </div>
    <div>
      <label for="color_id">color: </label>


      <select name="color_id" id="color_id">
         <option value="">Выберите цвет</option>
         @foreach ($list_color as $row)
         <option value="{{$row->id}}">{{$row->title}}</option>
         @endforeach
       </select>

    </div>

    <div>
      <label for="nambo">nambo: </label>
      <input type="text" name="nambo"
       id="nambo" required />
    </div>
    <div>
      <input type="submit"
       value="Записать Машину" />
    </div>
</form>

<h3>Список машин:</h3>
@foreach ($cars as $row)
    <div>  
       {{$row->brand}}.
       {{$row->color}}.
       {{$row->nambo}}.
       <a href="{{route('car.delete',['id' => $row->id])}}"> [Удалить]</a>
    
    </div>
@endforeach

</div>



@endsection