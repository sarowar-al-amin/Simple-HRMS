<?php

namespace App\Http\Livewire;

use App\Models\Quarter;
use App\Models\SalaryReview;
use Livewire\Component;

class SalaryReviewForm extends Component
{
    public $salaryReviewId, $quarterId, $salaryReviewStart, $salaryReviewEnd;

    public $quarters = [];

    protected $rules = [
        'salaryReviewId' => ['required'],
        'quarterId' => ['required'],
        'salaryReviewStart' => ['required'],
        'salaryReviewEnd' => ['required']
    ];

    public function mount() {
        $this->quarters = Quarter::all()->pluck('id')->toArray();
    }

    public function addSalaryReview() {
        $this->validate();

        SalaryReview::create([
            'id' => $this->salaryReviewId,
            'quarter_id' => $this->quarterId,
            'start' => $this->salaryReviewStart,
            'end' => $this->salaryReviewEnd
        ]);

        $this->emit('salaryReviewAdded');
    }

    public function render()
    {
        return view('livewire.salary-review-form', [
            'quarters' => $this->quarters
        ]);
    }
}
