<div>
    <h1>{{ $count }}</h1>
 
    <button wire:click="increment">+</button>
 
    <button wire:click="decrement">-</button>

    <form wire:submit="save">
        <input type="text" wire:model="title">
        <button type="submit">Записать</button>
    </form>

    Список Color: 

<form wire:submit="create_color">
    <input type="text" wire:model="title_color">
    <button type="submit" >Создать новый Цвет</button>
</form>

<ul>
    @foreach ($list as $item)
        <li wire:key="{{ $item->id }}"> 
            @if($item->id == $active_edit_color)    
                <input type="text" wire:model="newValue">
                <button wire:click="update_color('{{ $item->id }}')">Записать</button>
                <button type="button" wire:confirm="Точно удаляем?" wire:click="delete_color('{{ $item->id }}')"> Удалить </button>
            @else
                {{$item->title}}
                <button type="button" wire:click="edit_color('{{ $item->id }}')" > Редактировать </button>
            @endif
            </li>
    @endforeach    
   <ul>
</div>
