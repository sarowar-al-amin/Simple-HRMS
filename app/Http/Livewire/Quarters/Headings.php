<?php

namespace App\Http\Livewire\Quarters;

use Livewire\Component;

class Headings extends Component
{
    public $headings = ['Name', 'Start', 'End', 'Actions'];

    public function render()
    {
        return view('livewire.quarters.headings');
    }
}
