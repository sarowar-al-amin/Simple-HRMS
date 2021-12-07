<?php

namespace App\Http\Livewire\Quarters;

use Livewire\Component;

class QuarterRow extends Component
{
    public $quarter;

    public function render()
    {
        return view('livewire.quarters.quarter-row');
    }
}
