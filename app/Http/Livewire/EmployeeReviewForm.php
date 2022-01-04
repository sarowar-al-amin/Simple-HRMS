<?php

namespace App\Http\Livewire;

use App\Models\SalaryReviewMetadata;
use Livewire\Component;

class EmployeeReviewForm extends Component
{
    public $employee,$level,$field;

    public $employeeReview;
    public $behaviouralFeedbacks = [];
    public $categoricalFeedbacks = [];
    public $behaviouralJustifications = [];
    public $categoricalJustifications = [];
    public $performence,$promotion,$comment;

    
    public function mount() {

        $this->employeeReview = SalaryReviewMetadata::where('user_id', $this->employee->id)->first();
        
        if($this->employeeReview) {
            $this->behaviouralFeedbacks = explode('#', $this->employeeReview->behavioural_feedbacks);
            $this->categoricalFeedbacks = explode('#', $this->employeeReview->categorical_feedbacks);
            $this->behaviouralJustifications = explode('#', $this->employeeReview->behavioural_justifications);
            $this->categoricalJustifications = explode('#', $this->employeeReview->categorical_justifications);
            $this->performance = $this->employeeReview->performance;
            $this->promotion = $this->employeeReview->promotion;
            $this->comment = $this->employeeReview->sbu_comment;
        }
    }

    public function render()
    {      
        return view('livewire.employee-review-form');
    }
}
