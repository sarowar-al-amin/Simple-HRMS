<?php

namespace App\Http\Livewire;

use App\Models\BonusReviewMetadata;
use Livewire\Component;

class BonusReview extends Component
{
    public $review,$field;
    public $ratings = ['Outstanding(4)', 'Very Satisfactory(3)', 'Satisfactory(2)', 'Unsatisfactory(1)', 'Poor(0)'];
    public $ratingTooltips = [
        "In terms of quality and time, technical skills and knowledge, ingenuity, creativity and initiative. Employees at this performance level should have demonstrated exceptional job mastery in all major areas of responsibility. Employee achievement and contribution's to the organization are of marked excellence",
        "Performance exceeded expectation. All goals, objectives, and targets were achieved above the established standards",
        "Performance met expectations In terms of quality of work, efficiency and timeliness. The most critical quarterly goals were met",
        "Performance failed to meet expectation's, and/or one or more of the most critical goals were not meet",
        "expectations, and/or reasonable progress toward critical goals was not made. Significant Improvement is needed in one or more important areas"
    ];
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
