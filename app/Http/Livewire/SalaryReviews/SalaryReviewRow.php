<?php

namespace App\Http\Livewire\SalaryReviews;

use Livewire\Component;

class SalaryReviewRow extends Component
{
    public $salaryReview;

    public function render()
    {
        return view('livewire.salary-reviews.salary-review-row');
    }
}
