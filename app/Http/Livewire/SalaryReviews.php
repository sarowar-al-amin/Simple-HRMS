<?php

namespace App\Http\Livewire;

use App\Models\Quarter;
use App\Models\SalaryReview;
use Livewire\Component;

class SalaryReviews extends Component
{
    public $index = null;
    public $field = null;
    public $salaryReviews = [];
    public $quarters;

    public function mount() {
        $this->quarters = Quarter::all()->pluck('id')->toArray();
    }

    protected $listeners = [
        'salaryReviewAdded' => 'foo'
    ];

    protected $rules = [
        'salaryReviews.*.id' => 'required',
    ];

    protected $validationAttributes = [
        'salaryReviews.*.id' => 'id',
    ];

    public function foo(){
        $this->salaryReviews = SalaryReview::all()->toArray();
    }

    public function edit($idx, $field) {
        $this->field = $idx.'.'.$field ;
    }

    public function save($idx, $field) {
        $this->validate();

        $salaryReview = $this->salaryReviews[$idx] ?? NULL;

        if(! is_null($salaryReview)) {
            SalaryReview::find($salaryReview['id'])?->update([
                $field => $salaryReview[$field]
            ]);
        }

        $this->index = null;
        $this->field = null;
    }

    public function delete($idx) {
        $salaryReview = $this->salaryReviews[$idx] ?? NULL;

        if(! is_null($salaryReview)) {
            SalaryReview::find($salaryReview['id'])?->delete();
        }
    }

    public function render()
    {
        $this->salaryReviews = SalaryReview::all()->toArray();

        return view('livewire.salary-reviews', [
            'salaryReviews' => $this->salaryReviews,
            'quarters' => $this->quarters
        ]);
    }
}