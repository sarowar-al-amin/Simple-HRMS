<?php

namespace App\Http\Livewire;

use App\Models\BonusReview as ModelsBonusReview;
use App\Models\BonusReviewMetadata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use PhpOffice\PhpSpreadsheet\Writer\Ods\Thumbnails;

class BonusReview extends Component
{
    public $review,$field,$ratings,$ratingTooltips,$approved,$sbus,$pms,$teams,$dateOver;

    public function mount() {
        $this->fill([
            'ratings' => ['Outstanding(4)', 'Very Satisfactory(3)', 'Satisfactory(2)', 'Unsatisfactory(1)', 'Poor(0)'],
            'ratingTooltips' => [
                "In terms of quality and time, technical skills and knowledge, ingenuity, creativity and initiative. Employees at this performance level should have demonstrated exceptional job mastery in all major areas of responsibility. Employee achievement and contribution's to the organization are of marked excellence",
                "Performance exceeded expectation. All goals, objectives, and targets were achieved above the established standards",
                "Performance met expectations In terms of quality of work, efficiency and timeliness. The most critical quarterly goals were met",
                "Performance failed to meet expectation's, and/or one or more of the most critical goals were not meet",
                "expectations, and/or reasonable progress toward critical goals was not made. Significant Improvement is needed in one or more important areas"
            ],
            'approved' => $this->review['approval'],
            'sbus' => User::all()->sortBy('sbu')->pluck('sbu')->unique()->toArray(),
            'pms' => User::all()->sortBy('pm')->pluck('pm')->unique()->toArray(),
            'teams' => User::all()->sortBy('team')->pluck('team')->unique()->toArray(),
        ]);
        // Initial State 'Imcomplete'
        $this->review['approval_state'] = $this->getApprovalState($this->review['sbu_score']);
        $review = BonusReviewMetadata::where('user_id', $this->review['user_id']);
        if(!is_null($review)) {
            $review->update($this->review);
        }


        $lastDate = ModelsBonusReview::first()->end;
        $this->dateOver = Carbon::createFromFormat('j M Y', $lastDate)->lt(today());
    }
    
    // protected $rules = [
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    //     'review.technical' => ['required'],
    // ];

    public function getScore() {
        
        $review = $this->review;
        
        $value =  is_null($review['technical']) || is_null($review['execution']) || is_null($review['collaboration']) || is_null($review['influence']) || is_null($review['maturity'])
        ? null
        : $review['technical'] + $review['execution'] + $review['collaboration'] + $review['influence'] + $review['maturity'];

        return $value;
    }

    public function getFeedback($score) {
        if(is_null($score)) {
            return 'N/A';
        }

        $feedback = 'Exceed Expectations Heavily';

        if($score < 15) {
            $feedback = 'Meet Expectations Very Well';
        }

        if($score < 8) {
            $feedback = 'Need Improvement';
        }

        return $feedback;
    }

    // Initial state 'incomplete' & after completing state will be 'Approve'
    public function getApprovalState($sbuScore) {
        $state = 'Incomplete';

        if($this->approved) {
            $state = 'Approved';
        }else if ($sbuScore){
            $state = 'Approve';
        }

        return $state;
    }

    public function save($field) {

        $review = BonusReviewMetadata::where('user_id', $this->review['user_id']);
        $role = Auth::user()->role;

        if($role === 'Admin' || $role === 'SBU') {
            $this->review['sbu_score'] = $this->getScore();
            $this->review['sbu_feedback'] = $this->getFeedback($this->review['sbu_score']);
        } else {
            $this->review['pm_score'] = $this->getScore();
            $this->review['pm_feedback'] = $this->getFeedback($this->review['pm_score']);
        }

        $this->review['approval_state'] = $this->getApprovalState($this->review['sbu_score']);

        if(!is_null($review)) {
            $review->update($this->review);
        }

        $this->field = null;
    }

    public function approve() {

        $review = BonusReviewMetadata::where('user_id', $this->review['user_id']);

        $this->review['sbu_score'] = is_null($this->review['sbu_score']) ? $this->review['pm_score'] : $this->review['sbu_score'];
        $this->review['sbu_feedback'] = is_null($this->review['sbu_feedback']) ? $this->review['pm_feedback'] : $this->review['sbu_feedback'];
        $this->review['approval'] = $this->approved = true;

        if(!is_null($review)) {
            $review->update($this->review);
        }
    }
    
    public function render()
    {
        return view('livewire.bonus-review');
    }
}
