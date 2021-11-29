<?php

namespace App\Http\Livewire\EmployeeReview;

use Livewire\Component;

class EvaluationTab extends Component
{
    public $level;
    public $headers = ['Category', 'Indicators', 'Feedback', 'Justification'];
    public function render()
    {
        return view('livewire.employee-review.evaluation-tab');
    }
}
