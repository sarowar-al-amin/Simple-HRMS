<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Quarters\Headings;
use App\Models\employee;
use App\Models\User;
use Livewire\Component;

class Employees extends Component
{
    public $headings = ['ID', 'Name', 'Email', 'Expertise Area', 'Partner',	'Employee Type', 'Managerial Capacity',	'SBU', 'HR',
                        'Joining Date', 'Confirmation Date', 'Career Start Date', 'Total Experience', 'Employee category',	'PM',
                        'Blood Group', 'Designation',	'Level', 'Team', 'Actions'];

    public $index = null;
    public $field = null;
    public $employees = [];
    public $sbus,$partners,$hrs,$techs;

    public function mount() {
        $this->index = $this->field = null;
        $this->sbus = User::all()->pluck('sbu')->unique()->toArray();
        $this->partners = User::all()->pluck('partner')->unique()->toArray();
        $this->hrs = User::all()->pluck('hr')->unique()->toArray();
    }

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
        $this->employees = User::all()->toArray();

        return view('livewire.employees', [
            'employees' => $this->employees,
            'partners' => $this->partners,
            'sbus' => $this->sbus,
            'hrs' => $this->hrs
        ]);
    }
}
