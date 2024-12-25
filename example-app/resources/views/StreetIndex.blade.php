

@foreach ($list as $row)

    Улица {{$row->Title}}
    город {{$row->City->Title}}
    обласьть {{$row->City->Region->Title}} <br><br>

@endforeach
