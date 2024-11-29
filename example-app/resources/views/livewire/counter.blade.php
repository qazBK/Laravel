<div>
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button>

    <form wire:submit="save">
        <input type="text" wire:model="title">
        <button type="submit">Записать</button>
    </form>

    Список Color: 
    <ul>
    @foreach ($list as $item)
        <li wire:key="{{ $item->id }}"> 
        {{$item->title}}
        </li>
    @endforeach    
   <ul>
</div>
