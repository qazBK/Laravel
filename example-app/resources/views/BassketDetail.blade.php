<div>
@foreach ($list as $row)
      {{$row->Title}}
      Price: {{$row->Price}}
      Amount: {{$row->Amount}} <br>
@endforeach
</div>
