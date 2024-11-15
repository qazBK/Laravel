@extends('layout.main')
<!--  https://laravel.su/docs/11.x/blade#rassirenie-maketa -->

@section('title')
Список машин
@endsection

@section('head')
Список машин
@endsection


@section('content')


<div>
<div class="p-2">
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Форма добавления
    </a>
  </div>
  <div class="collapse" id="collapseExample">
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@canany(['create'],\App\Model\Car::class)

<form action="?data=send" method="post">
    @csrf
    <div>
        @error('brand')
            <div>Ошибка: {{ $message }}</div>
        @enderror
      <label for="brand">brand: </label>
      <input type="text" name="brand"
       id="brand" @error('brand') style="background-color: yellow;" @enderror   
       value="{{ old('brand') }}"
       />
    </div>
    <div>
        @error('color')
            <div>Ошибка: {{ $message }}</div>
        @enderror
      <label for="color">color: </label>


      <select name="color" id="color" @error('color') style="background-color: yellow;" @enderror>
         <option value="">Выберите цвет</option>
         @foreach ($list_color as $row)
         <option value="{{$row->id}}">{{$row->title}}</option>
         @endforeach
       </select>

    </div>
    <div>
        @error('nambo')
            <div>Ошибка: {{ $message }}</div>
        @enderror
      <label for="nambo">nambo: </label>
      <input type="text" name="nambo"  @error('nambo') style="background-color: yellow;" @enderror
       id="nambo"
       value="{{ old('nambo') }}"
        />
    </div>
    <div>
      <input type="submit"
       value="Записать машину" />
    </div>
</form>

@endcanany
</div>
<h3>Список машин:</h3>
@foreach ($cars as $row)
    <div>  
       {{$row->brand}}.
       {{$row->color->title}}.
       {{$row->nambo}}.
       <a href="{{route('car.delete',['id' => $row->id])}}"> [Удалить]</a>
    
    </div>
@endforeach

</div>



@endsection