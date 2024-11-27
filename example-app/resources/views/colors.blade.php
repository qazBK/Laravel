@extends('layout.main')
<!--  https://laravel.su/docs/11.x/blade#rassirenie-maketa -->

@section('title')
Цвета машин
@endsection

@section('head')
Цвета машин
@endsection

@section('content')
<div>

  <div class="p-2">
    <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      Добавить цвета...
    </a>
  </div>

  <div class="collapse" id="collapseExample">
    <div class="card card-body">

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Цвета:</h4>
        <form action="{{route('color')}}" method="post" class="needs-validation">
          @csrf

          <div class="row g-3">
            <div class="col-sm-6">
              <label for="firstName" class="form-label">Наименование</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="" value="" required>
              <div class="invalid-feedback">
                Наименование цвета
              </div>
            </div>

            <hr class="my-4">

            <button class="w-50 btn btn-primary btn-lg" type="submit">Записать</button>
          </div>
        </form>
      </div>


    </div>
  </div>

  <div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Наименование</th>
          <th scope="col">&nbsp;</th>
          <th scope="col">&nbsp;</th>
        </tr>
      </thead>

      <tbody>

        @foreach ($color as $row)
        <tr>
          <th scope="row">#</th>
          <td>{{$row->title}}</td>
          <td><a class="btn btn-outline-danger" role="button" href="{{route('color.delete',['id' => $row->id])}}">Удалить</a></td>
          
        </tr>

        @endforeach

      </tbody>
    </table>
  </div>
  <h3>Динамический запрос:</h3>
  <ul id="color-list">
    
  </ul>
  <script>

ColorListItem = document.querySelector('#color-list');

function item_add(data) {
  let li = document.createElement("li");
  li.innerText = data.title;
  ColorListItem.appendChild(li);
}

  function Color_List() {

    console.dir('Запрос');

    fetch('{{route('api.color.index')}}', {
        method: 'GET',
        headers: {
          'Content-Type': 'application/json'
        },
      })

      .then(response => {
        console.dir(response);
        return response.json();
      })

      .then(data_out => {
        console.dir(data_out);
        data_out.forEach((item) => item_add(item));
      });
  }


  let data = {};
  Color_List();

</script>

  @endsection

