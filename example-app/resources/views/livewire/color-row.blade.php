<div>
<li> 
        <input type="text" x-ref="title_row_{{ $item->id }}" value="{{ $item->title}}"
        wire:change.debounce="update_color_id('{{ $item->id }}', $refs.title_row_{{ $item->id }}.value)">
        <a href="#" wire:confirm="Точно удаляем?" wire:click.prevent="delete_color('{{ $item->id }}')">x</a>
</li>
</div>