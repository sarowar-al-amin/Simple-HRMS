<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EmployeeList extends Component
{
    public $employees;
    public $salaryReview;
    public $sbu;

    public function render()
    {
        return view('livewire.employee-list');
    }
}


