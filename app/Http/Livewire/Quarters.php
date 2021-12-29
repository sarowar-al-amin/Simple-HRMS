<?php

namespace App\Http\Livewire;

use App\Models\Quarter;
use Carbon\Carbon;
use Livewire\Component;

class Quarters extends Component
{
    public $index = null;
    public $field = null;
    public $quarters = [];

    protected $listeners = [
        'quarterAdded' => 'foo'
    ];

    protected $rules = [
        'quarters.*.id' => 'required',
    ];

    protected $validationAttributes = [
        'quarters.*.id' => 'id',
    ];

    public function foo(){
        $this->quarters = Quarter::all()->toArray();
    }

    public function edit($idx, $field) {
        $this->field = $idx.'.'.$field ;
    }

    public function save($idx, $field) {
        $this->validate();

        $quarter = $this->quarters[$idx] ?? NULL;

        if(! is_null($quarter)) {
            Quarter::find($quarter['id'])?->update([
                $field => $quarter[$field]
            ]);
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

        return view('livewire.quarters', [
            'quarters' => $this->quarters
        ]);
    }
}