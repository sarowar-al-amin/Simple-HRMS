<?php

namespace App\Http\Livewire\Quarters;

use App\Models\Quarter;
use Livewire\Component;

class Quarterlist extends Component
{
    public $index = null;
    public $field = null;
    public $quarters = [];

    // protected $listeners = [
    //     'refresh' => '$refresh'
    // ];

    // protected $rules = [
    //     'users.*.name' => 'required',
    //     'users.*.email' => 'required'
    // ];

    // protected $validationAttributes = [
    //     'users.*.name' => 'name',
    //     'users.*.email' => 'email'
    // ];

    public function edit($idx, $field) {
        $this->field = $idx.'.'.$field ;
    }

    public function save($idx) {
        $this->validate();

        $quarter = $this->quarters[$idx] ?? NULL;

        if(! is_null($quarter)) {
            Quarter::find($quarter['id'])?->update($quarter);
        }

        $this->index = null;
        $this->field = null;
    }

    public function delete($idx) {
        $quarter = $this->quarters[$idx] ?? NULL;

        if(! is_null($quarter)) {
            Quarter::find($quarter['id'])?->delete();
        }
    }

    public function render()
    {
        $this->quarters = Quarter::all()->toArray();

        return view('livewire.quarters.quarterlist', [
            'quarters' => $this->quarters
        ]);
    }
}
