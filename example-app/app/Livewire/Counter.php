<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;

    public $title = '';
 
    public function increment()
    {
        $this->count+=10;
    }
 
    public function decrement()
    {
        $this->count--;
    }

    public function render()
    {
        return view('livewire.counter')->with(['list'=>\App\Models\color::all()]);
    }


    public function save()
    {
  
        $this->count=(int)($this->title);
        $this->title='';

    }    
}
