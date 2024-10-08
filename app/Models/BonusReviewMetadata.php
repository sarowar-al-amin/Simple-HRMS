<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class BonusReviewMetadata extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = false;

    public static function  getReview(){
        $review = DB::table('bonus_review_metadata')
            ->select(       
                'user_id',
                'user_name',
                'sbu',
                'pm',
                'team',
                'technical',
                'execution',
                'collaboration',
                'influence',
                'maturity',
                'sbu_score',
                'pm_score',
                'sbu_feedback',
                'pm_feedback',
                'approval_state')
            ->get()
            ->toArray();
        return $review;
    }
    // public function getPmScoreAttribute($value) {
    //     $value = is_null($this->technical) || is_null($this->execution) || is_null($this->collaboration) || is_null($this->influence) || is_null($this->maturity)
    //     ? null
    //     : $this->technical + $this->execution + $this->collaboration + $this->influence + $this->maturity;

    //     return $value;
    // }

    // public function getSbuScoreAttribute($value) {
    //     $value =  is_null($this->technical) || is_null($this->execution) || is_null($this->collaboration) || is_null($this->influence) || is_null($this->maturity)
    //     ? null
    //     : $this->technical + $this->execution + $this->collaboration + $this->influence + $this->maturity;

    //     return $value;
    // }

    // public function setPmScoreAttribute($value) {
    //     $value = is_null($this->technical) || is_null($this->execution) || is_null($this->collaboration) || is_null($this->influence) || is_null($this->maturity)
    //     ? null
    //     : $this->technical + $this->execution + $this->collaboration + $this->influence + $this->maturity;

    //     return $value;
    // }

    // public function setSbuScoreAttribute($value) {
    //     $value =  is_null($this->technical) || is_null($this->execution) || is_null($this->collaboration) || is_null($this->influence) || is_null($this->maturity)
    //     ? null
    //     : $this->technical + $this->execution + $this->collaboration + $this->influence + $this->maturity;

    //     return $value;
    // }

    // public function getPmFeedbackAttribute($value) {
    //     $x = $this->pm_score;
    //     $value = 'Exceed Expectation Heavily';

    //     if(is_null($x)){
    //         $value = null;
    //     } else if ($x<9) {
    //         $value = 'Need Improvement Heavily';
    //     } else if($x<16) {
    //         $value = 'Meet Expectation Very Well';
    //     } 

    //     return $value;
    // }

    // public function getSbuFeedbackAttribute($value) {
    //     $x = $this->pm_score;
    //     $value = 'Exceed Expectation Heavily';
        
    //     if(is_null($x)){
    //         $value = null;
    //     } else if ($x<9) {
    //         $value = 'Need Improvement';
    //     } else if($x<16) {
    //         $value = 'Meet Expectation Very Well';
    //     } 

    //     return $value;
    // }

    // public function setPmFeedbackAttribute($value) {
    //     $x = $this->pm_score;
    //     $value = 'Exceed Expectation Heavily';
        
    //     if(is_null($x)){
    //         $value = null;
    //     } else if ($x<9) {
    //         $value = 'Need Improvement';
    //     } else if($x<16) {
    //         $value = 'Meet Expectation Very Well';
    //     } 

    //     return $value;
    // }

    // public function setSbuFeedbackAttribute($value) {
    //     $x = $this->pm_score;
    //     $value = 'Exceed Expectation Heavily';
        
    //     if(is_null($x)){
    //         $value = null;
    //     } else if ($x<9) {
    //         $value = 'Need Improvement';
    //     } else if($x<16) {
    //         $value = 'Meet Expectation Very Well';
    //     } 

    //     return $value;
    // }
}
