<?php

namespace App\Http\Livewire;

use App\Models\SalaryReviewMetadata;
use Livewire\Component;

class EmployeeReviewForm extends Component
{
    public $employee;

    public $employeeReview;
    public $behaviouralFeedbacks = [];
    public $categoricalFeedbacks = [];

    public function mount() {
        $this->employeeReview = SalaryReviewMetadata::where('user_id', $this->employee->id)->first();
        if($this->employeeReview) {
            $this->behaviouralFeedbacks = explode('#', $this->employeeReview->behavioural_feedbacks);
            $this->categoricalFeedbacks = explode('#', $this->employeeReview->categorical_feedbacks);
        }
    }

    public function render()
    {
        return view('livewire.employee-review-form');
    }
}
