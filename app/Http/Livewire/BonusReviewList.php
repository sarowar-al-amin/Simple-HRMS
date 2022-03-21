<?php

namespace App\Http\Livewire;

use App\Models\BonusReviewMetadata;
use Livewire\Component;

class BonusReviewList extends Component
{
    public $index = null;
    public $field = null;
    public $reviews = [];

    public function mount() {
        $this->reviews = BonusReviewMetadata::all()->toArray();
    }

    // protected $listeners = [
    //     'bonusReviewAdded' => 'foo'
    // ];

    // protected $rules = [
    //     'reviews.*.technical' => 'required',
    // ];

    // protected $validationAttributes = [
    //     'bonusReviews.*.id' => 'id',
    // ];

    // public function foo(){
    //     $this->bonusReviews = BonusReviewMetadata::all()->toArray();
    // }

    // public function edit($idx, $field) {
    //     $this->field = $idx.'.'.$field ;
    // }

    public function save($idx, $field) {
        //$this->validate();

        $review = $this->reviews[$idx] ?? NULL;

        if(! is_null($review)) {
            BonusReviewMetadata::where('user_id', $review['user_id'])?->update([
                $field => $review[$field]
            ]);
        }

        $this->index = null;
        $this->field = null;
    }

    public function render()
    {
        $this->bonusReviews = BonusReviewMetadata::all()->toArray();

        return view('livewire.bonus-review-list', [
            'reviews' => $this->bonusReviews,
            'ratings' => ['Outstanding(4)', 'Very Satisfactory(3)', 'Satisfactory(2)', 'Unsatisfactory(1)', 'Poor(0)']
        ]);
    }
}
