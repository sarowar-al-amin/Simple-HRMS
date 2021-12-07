<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SbuList extends Component
{
    public $salaryReview;
    public $sbus;

    public function render()
    {
        return view('livewire.sbu-list');
    }
}
