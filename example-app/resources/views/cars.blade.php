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
      <label for="color">color: </label>
      <input type="text" name="color"
       id="color" required />
    </div>1
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



