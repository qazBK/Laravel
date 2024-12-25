<?php

namespace App\Livewire;

use Livewire\Component;


class StreettForm extends Component
{
    public $title;
    public $Region;
    public $Region_list;
    public function render()
    {
        $this->title= "R:".$this->Region;
        $this->Region_list = \App\Models\Region::all();
        return view('livewire.streett-form');
    }
}
