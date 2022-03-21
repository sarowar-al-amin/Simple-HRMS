<?php

namespace App\Http\Livewire;

use App\Models\BonusReviewMetadata;
use Livewire\Component;

class BonusReview extends Component
{
    public $review,$field;
    public $ratings = ['Outstanding(4)', 'Very Satisfactory(3)', 'Satisfactory(2)', 'Unsatisfactory(1)', 'Poor(0)'];
    // protected $rules = [
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    // ];

    public function save($field) {

        $review = BonusReviewMetadata::where('user_id', $this->review['user_id']);

        if(!is_null($review)) {
            $review->update([
               $field => $this->review[$field] 
            ]);
        }

        $this->field = null;
    }
    
    public function render()
    {
        return view('livewire.bonus-review');
    }
}
