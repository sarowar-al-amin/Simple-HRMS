<?php

namespace App\Http\Livewire;

use App\Models\SalaryReview22bMetadata;
use Livewire\Component;

class EmployeeReviewForm extends Component
{
    public $employee, $level;

    public $review;
    public $knowledge_rating, $knowledge_score, $knowledge_justification;
    public $independence_rating, $independence_score, $independence_justification;
    public $influence_rating, $influence_score, $influence_justification;
    public $organizational_scope_rating, $organizational_scope_score, $organizational_scope_justification;
    public $job_contrast_rating, $job_contrast_score, $job_contrast_justification;
    public $execution_rating, $execution_score, $execution_justification;
    public $ownership_rating, $ownership_score, $ownership_justification;
    public $passion_rating, $passion_score, $passion_justification;
    public $agility_rating, $agility_score, $agility_justification;
    public $team_spirit_rating, $team_spirit_score, $team_spirit_justification;
    public $honesty_rating, $honesty_score, $honesty_justification;
    public $sbu_total_performance_rating, $sbu_total_performance_score, $sbu_promotion_recommendation, $sbu_comment;
    public $pm_total_performance_rating, $pm_total_performance_score, $pm_promotion_recommendation, $pm_comment;

    private function get_rating($score) {
        if(is_null($score)){
            return 'N/A';
        } else if($score > 2) {
            return 'Exceeding Expectation Heavily';
        } else if($score > 1) {
            return 'Meet Expectation Very Well';
        } else {
            return 'Need Improvement';
        }
    }

    public function mount() {

        $this->review = SalaryReview22bMetadata::where('user_id', $this->employee->id)->first();
        
        if($this->review) {
            $this->knowledge_rating = $this->get_rating($this->review->knowledge_score);
            $this->knowledge_score = $this->review->knowledge_score;
            $this->knowledge_justification = $this->review->knowledge_justification;

            $this->independence_rating = $this->get_rating($this->review->independence_score);
            $this->independence_score = $this->review->independence_score;
            $this->independence_justification = $this->review->independence_justification;

            $this->influence_rating = $this->get_rating($this->review->influence_score);
            $this->influence_score = $this->review->influence_score;
            $this->influence_justification = $this->review->influence_justification;

            $this->organizational_scope_rating = $this->get_rating($this->review->organizational_scope_score);
            $this->organizational_scope_score = $this->review->organizational_scope_score;
            $this->organizational_scope_justification = $this->review->organizational_scope_justification;

            $this->job_contrast_rating = $this->get_rating($this->review->job_contrast_score);
            $this->job_contrast_score = $this->review->job_contrast_score;
            $this->job_contrast_justification = $this->review->job_contrast_justification;

            $this->execution_rating = $this->get_rating($this->review->execution_score);
            $this->execution_score = $this->review->execution_score;
            $this->execution_justification = $this->review->execution_justification;

            $this->ownership_rating = $this->get_rating($this->review->ownership_score);
            $this->ownership_score = $this->review->ownership_score;
            $this->ownership_justification = $this->review->ownership_justification;

            $this->passion_rating = $this->get_rating($this->review->passion_score);
            $this->passion_score = $this->review->passion_score;
            $this->passion_justification = $this->review->passion_justification;

            $this->agility_rating = $this->get_rating($this->review->agility_score);
            $this->agility_score = $this->review->agility_score;
            $this->agility_justification = $this->review->agility_justification;

            $this->team_spirit_rating = $this->get_rating($this->review->team_spirit_score);
            $this->team_spirit_score = $this->review->team_spirit_score;
            $this->team_spirit_justification = $this->review->team_spirit_justification;

            $this->honesty_rating = $this->get_rating($this->review->honesty_score);
            $this->honesty_score = $this->review->honesty_score;
            $this->honesty_justification = $this->review->honesty_justification;

            $this->sbu_total_performance_rating = $this->review->sbu_total_performance_rating;
            $this->sbu_total_performance_score = $this->review->sbu_total_performance_score;
            $this->sbu_promotion_recommendation = $this->review->sbu_promotion_recommendation;
            $this->sbu_comment = $this->review->sbu_comment;

            $this->pm_total_performance_rating = $this->review->pm_total_performance_rating;
            $this->pm_total_performance_score = $this->review->pm_total_performance_score;
            $this->pm_promotion_recommendation = $this->review->pm_promotion_recommendation;
            $this->pm_comment = $this->review->pm_comment;
        }
    }

    public function render()
    {
        return view('livewire.employee-review-form');
    }
}
