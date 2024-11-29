<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 


class Listcolors extends Component
{
    public function render()
    {
        return view('livewire.listcolors')->with(['list'=>\App\Models\Color::all()]);
    }
    #[on('color-update')]

    public function updteColorlist(): void 
    {

    }
}
