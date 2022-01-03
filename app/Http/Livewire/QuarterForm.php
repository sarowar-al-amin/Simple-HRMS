<?php

namespace App\Http\Livewire;

use App\Models\Quarter;
use Livewire\Component;
use Livewire\Livewire;

class QuarterForm extends Component
{
    public $quarterId, $quarterStart, $quarterEnd;

    protected $rules = [
        'quarterId' => ['required', 'unique:quarters,id'],
        'quarterStart' => ['required'],
        'quarterEnd' => ['required']
    ];

    public function addQuarter() {

        $this->validate();

        Quarter::create([
            'id' => $this->quarterId,
            'start' => $this->quarterStart,
            'end' => $this->quarterEnd
        ]);

        $this->emit('quarterAdded');
    }

    public function render()
    {
        return view('livewire.quarter-form');
    }
}
