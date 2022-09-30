<?php

namespace App\Http\Livewire;

use App\Models\QuaterlyBonusCalculation;
use Livewire\Component;

class BonusReviewSubmissionForm extends Component
{
    public $employee, $level;

    public $review, $p_score, $p_rating, $v_score, $v_rating;
    public $knowledge_rating, $knowledge_score, $knowledge_justification;
    public $independence_rating, $independence_score, $independence_justification;
    public $influence_rating, $influence_score, $influence_justification;
    public $organizational_scope_rating, $organizational_scope_score, $organizational_scope_justification;
    public $job_contrast_rating, $job_contrast_score, $job_contrast_justification;
    public $execution_rating, $execution_score, $execution_justification;
    public $sbu_total_performance_rating, $sbu_total_performance_score, $sbu_bonus_recommendation, $sbu_comment;
    public $pm_total_performance_rating, $pm_total_performance_score, $pm_bonus_recommendation, $pm_comment;

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

    private function get_pr_score($a, $b, $c, $d, $e, $f) {
        if(($a == 0) || ($b == 0) || ($c == 0) || ($d == 0) || ($e == 0) || ($f == 0)) return null;
        return $a + $b + $c + $d + $e + $f;
    }

    private function get_pr_rating($score) {
        if(is_null($score)){
            return 'Complete Remain Select Option';
        } else if($score > 14) {
            return 'Exceeding Expectation Heavily';
        } else if($score > 8) {
            return 'Meet Expectation Very Well';
        } else {
            return 'Need Improvement';
        }
    }



    public function mount() {

        $this->review = QuaterlyBonusCalculation::where('user_id', $this->employee->id)->first();
        
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

            $this->sbu_total_performance_rating = $this->review->sbu_total_performance_rating;
            $this->sbu_total_performance_score = $this->review->sbu_total_performance_score;
            $this->sbu_bonus_recommendation = $this->review->sbu_promotion_recommendation;
            $this->sbu_comment = $this->review->sbu_comment;

            $this->pm_total_performance_rating = $this->review->pm_total_performance_rating;
            $this->pm_total_performance_score = $this->review->pm_total_performance_score;
            $this->pm_bonus_recommendation = $this->review->pm_promotion_recommendation;
            $this->pm_comment = $this->review->pm_comment;
        }
    }

    public function render()
    {
        $this->p_score = $this->get_pr_score($this->knowledge_score, $this->independence_score, $this->influence_score, $this->organizational_scope_score, $this->job_contrast_score, $this->execution_score);
        $this->p_rating = $this->get_pr_rating($this->p_score);
        
        return view('livewire.bonus-review-submission-form');
    }
}
