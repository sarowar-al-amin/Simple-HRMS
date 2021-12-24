<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Employees extends Component
{
    public $index,$field,$sbu;
    public $employees = [];
    public $sbus,$partners,$hrs,$techs;

    public function mount() {
        $this->sbus = User::all()->pluck('sbu')->unique()->toArray();
        $this->partners = User::all()->pluck('partner')->unique()->toArray();
        $this->hrs = User::all()->pluck('hr')->unique()->toArray();
    }

    protected $rules = [
        'employees.*.name' => 'required',
        'employees.*.email' => 'required'
    ];

    protected $validationAttributes = [
        'employees.*.name' => 'name',
        'employees.*.email' => 'email'
    ];

    public function save($idx) {
        $this->validate();

        $employee = $this->employees[$idx] ?? NULL;

        if(! is_null($employee)) {
            User::find($employee['id'])?->update($employee);
        }

        $this->index = null;
        $this->field = null;
    }

    public function delete($idx) {
        $employee = $this->employees[$idx] ?? NULL;

        if(! is_null($employee)) {
            User::find($employee['id'])?->delete();
        }
    }

    public function render()
    {
        $this->employees = $this->sbu ? User::where('sbu', $this->sbu)->get()->toArray() : User::all()->toArray();

        return view('livewire.employees', [
            'employees' => $this->employees,
            'partners' => $this->partners,
            'sbus' => $this->sbus,
            'hrs' => $this->hrs
        ]);
    }
}
