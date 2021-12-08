<?php

namespace App\Http\Livewire\EmployeeResult;

use Livewire\Component;

class FinalResult extends Component
{
    public $salaryReviewMetadata;

    public function render()
    {
        return view('livewire.employee-result.final-result');
    }
}
