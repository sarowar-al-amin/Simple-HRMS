<?php

namespace App\Http\Livewire\EmployeeResult;

use Livewire\Component;

class Performance extends Component
{
    public $level;
    public $salaryReviewMetadata;
    public $headers = ['Category', 'Indicators', 'Feedback', 'Justification'];
    
    public function render()
    {
        return view('livewire.employee-result.performance');
    }
}
