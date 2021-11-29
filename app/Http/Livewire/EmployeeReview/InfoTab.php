<?php

namespace App\Http\Livewire\EmployeeReview;

use Livewire\Component;

class InfoTab extends Component
{
    public $employee;

    public function render()
    {
        return view('livewire.employee-review.info-tab');
    }
}
