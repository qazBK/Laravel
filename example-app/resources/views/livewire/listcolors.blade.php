<div>
    <ul class="borderlist">
        @foreach ($list as $item)
            <li wire:key="{{ $item->id }}"> 
            {{$item->title}}
            </li>
        @endforeach    
    <ul>
</div>