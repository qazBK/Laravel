<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 

class Counter extends Component
{
    public $count = 1;
    public $title = '';
    public $title_color = '';

    public $active_edit_color='';

    public $newValue='';

    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;

        $this->count = pow($this->count,2);
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

    public function create_color()
    {

        if ($this->title_color!="") {

            $new = new \App\Models\Color();
            $new->title = $this->title_color;
            $new->save();
            $this->title_color='';
            $this->dispatch('color-update'); 
        }        
    }    
  
    public function delete_color(string $id)
    {
        \App\Models\Color::find($id)->delete();
        $this->dispatch('color-update'); 
    }    

    public function update_color(string $id)
    {
        
        $item= \App\Models\Color::find($id);
        $item->title = $this->newValue;
        $item->save();     
        
        $this->newValue='';
        $this->active_edit_color='';
        $this->dispatch('color-update'); 
    }    

    public function edit_color(string $id)
    {
        $item= \App\Models\Color::find($id);
        $this->newValue=$item->title;
        $this->active_edit_color=$id;
    }   
}