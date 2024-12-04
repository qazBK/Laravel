<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; //Добавить!!!  для событий 

class ColorRow extends Component
{
    public $item;

    public function mount($item)
    {
        $this->item=$item;
    }

    #[On('color-update')] 
    public function updateColorList()
    {
        // ...
    }

    public function render()
    {
        return view('livewire.color-row');
    }

    public function update_color_id(string $id,string $title)
    {
        $item= \App\Models\Color::find($id);
        $item->title = $title;
        $item->save();     
        $this->dispatch('color-update'); 
    }  

    public function delete_color(string $id)
    {
        \App\Models\Color::find($id)->delete();
        $this->dispatch('color-update'); 
    } 

}