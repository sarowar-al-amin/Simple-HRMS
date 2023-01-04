<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use App\Models\Quarter;
use App\Models\SalaryReview;
use App\Models\SalaryReview22bMetadata;
use App\Models\BonusReview;
use App\Models\BonusReviewMetadata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PreviousBonusAndSalaryReviewController extends Controller
{
    // 
    function salaryReview(User $user){
        //Without legitimate user form can't be created.
        if(is_null(Auth::user())){
    
            return redirect('login');
        }

        $author = Auth::user()->name;
        $employee = User::where('id', $user->id)->first();
        $sbu_name = $employee->sbu;
        $pm_name = $employee->pm;

        if($author != $sbu_name && $author != $pm_name && Auth::user()->role != 'Admin'){
            // return "Not authoriated";
            return redirect()->route('employee-salary-reviews.index')->with('warning', 'This user is unauthorized to you');
        }
        
        $salary_rivews = SalaryReview::select('id')->orderBy('start', 'desc')->get();
        $previous_review_id = $salary_rivews[1]->id;
        $currentLevel = EmployeeLevel::find($user->level);
        return view('previous-reviews.previous-salary-review', 
            [
                'employeeID' => $user,
                'previousSalaryReview' => $previous_review_id,
                'level' => $currentLevel
            ]
        );

    }

    // 
    function bonusReview(User $user){

        //Without legitimate user form can't be created.
        if(is_null(Auth::user())){
    
            return redirect('login');
        }

        $author = Auth::user()->name;
        $employee = User::where('id', $user->id)->first();
        $sbu_name = $employee->sbu;
        $pm_name = $employee->pm;

        if($author != $sbu_name && $author != $pm_name && Auth::user()->role != 'Admin'){
            // return "Not authoriated";
            return redirect()->route('employee-salary-reviews.index')->with('warning', 'This user is unauthorized to you');
        }

        
        $bonus_reviews = BonusReview::select('id')->orderBy('start', 'desc')->get();
        $bonus_review_id = $bonus_reviews[0]->id;
        $currentLevel = EmployeeLevel::find($user->level);

        return view('previous-reviews.previous-bonus-review', 
            [
                'employeeID' => $user,
                // 'previousBonusReviewID' => $previous_review_id,
                'level' => $currentLevel
            ]
        );
    }

    // 
    function previousSalaryReviewUpdate(User $user, Request $request){
        //Without legitimate user form can't be sotred.
        if(is_null(Auth::user())){
            
            return redirect('login');
        }

        $salary_rivews = SalaryReview::select('id')->orderBy('start', 'desc')->get();
        $previous_review_id = $salary_rivews[1]->id;
        $srm = SalaryReview22bMetadata::where('salary_review_id', $previous_review_id)->where('user_id', $user->id)->first();


        
        $total_performance = (int)($request->input('knowledge_score')+$request->input('independence_score')+$request->input('influence_score')+$request->input('organizational_scope_score')+$request->input('job_contrast_score')+$request->input('execution_score'));
        $sbu_total = $total_performance;
        $sbu_rating = $this->get_pr($sbu_total );
        $sbu_promote = $request->input('promotion_recommendation');
        $pm_total = $total_performance;
        $pm_rating = $this->get_pr($total_performance);
        $pm_promote = $request->input('promotion_recommendation');

        SalaryReview22bMetadata::updateOrInsert([
            'salary_review_id' =>  $previous_review_id,
            'user_id' => $user->id,
        ],
        [
            'salary_review_id' =>  $previous_review_id,
            'user_id' => $user->id,

            'knowledge_rating' => $this->get_rating($request->input('knowledge_score')),
            'knowledge_score' => $request->input('knowledge_score'),
            'knowledge_justification' => $request->input('knowledge_justification'),

            'independence_rating' => $this->get_rating($request->input('independence_score')),
            'independence_score' => $request->input('independence_score'),
            'independence_justification' => $request->input('independence_justification'),

            'influence_rating' => $this->get_rating($request->input('influence_score')),
            'influence_score' => $request->input('influence_score'),
            'influence_justification' => $request->input('influence_justification'),
            
            'organizational_scope_rating' => $this->get_rating($request->input('organizational_scope_score')),
            'organizational_scope_score' => $request->input('organizational_scope_score'),
            'organizational_scope_justification' => $request->input('organizational_scope_justification'),

            'job_contrast_rating' => $this->get_rating($request->input('job_contrast_score')),
            'job_contrast_score' => $request->input('job_contrast_score'),
            'job_contrast_justification' => $request->input('job_contrast_justification'),

            'execution_rating' => $this->get_rating($request->input('execution_score')),
            'execution_score' => $request->input('execution_score'),
            'execution_justification' => $request->input('execution_justification'),

            'ownership_rating' => $this->get_rating($request->input('ownership_score')),
            'ownership_score' => $request->input('ownership_score'),
            'ownership_justification' => $request->input('ownership_justification'),

            'passion_rating' => $this->get_rating($request->input('passion_score')),
            'passion_score' => $request->input('passion_score'),
            'passion_justification' => $request->input('passion_justification'),

            'agility_rating' => $this->get_rating($request->input('agility_score')),
            'agility_score' => $request->input('agility_score'),
            'agility_justification' => $request->input('agility_justification'),

            'team_spirit_rating' => $this->get_rating($request->input('team_spirit_score')),
            'team_spirit_score' => $request->input('team_spirit_score'),
            'team_spirit_justification' => $request->input('team_spirit_justification'),

            'honesty_rating' => $this->get_rating($request->input('honesty_score')),
            'honesty_score' => $request->input('honesty_score'),
            'honesty_justification' => $request->input('honesty_justification'),

            'sbu_total_performance_rating' => $sbu_rating,
            'sbu_total_performance_score' => $sbu_total,
            'sbu_promotion_recommendation' => $sbu_promote,
            'sbu_comment' => $request->input('sbu_comment'),

            'pm_total_performance_rating' => $pm_rating,
            'pm_total_performance_score' => $pm_total,
            'pm_promotion_recommendation' => $pm_promote,
            'pm_comment' => $request->input('pm_comment'),

        ]);
       
        return redirect()->route('employee-salary-reviews.index')->with('flash', 'Updated previous review successfully');

    }

    // 
    public function previousBonusReviewUpdate(Request $request,User $user) {


        //Without legitimate user form can't be sotred.
        if(is_null(Auth::user())){
            
            return redirect('login');
        }

        $sr = $request->previous_bonus_review_id;
        $srm = QuaterlyBonusCalculation::where('bonus_review_id', $sr->id)->where('user_id', $user->id)->first();
        
        $total_performance = (int)($request->input('knowledge_score')+$request->input('independence_score')+$request->input('influence_score')+$request->input('organizational_scope_score')+$request->input('job_contrast_score')+$request->input('execution_score'));
        
        $sbu_total = $total_performance;
        $sbu_rating = $this->get_pr($sbu_total );
        // $sbu_promote = $request->input('promotion_recommendation');
        $pm_total = $total_performance;
        $pm_rating = $this->get_pr($total_performance);
        // $pm_promote = $request->input('promotion_recommendation');

        QuaterlyBonusCalculation::updateOrInsert([
            'bonus_review_id' => $sr->id,
            'user_id' => $user->id,
        ],
        [
            'bonus_review_id' => $sr->id,
            'user_id' => $user->id,

            'knowledge_rating' => $this->get_rating($request->input('knowledge_score')),
            'knowledge_score' => $request->input('knowledge_score'),
            'knowledge_justification' => $request->input('knowledge_justification'),

            'independence_rating' => $this->get_rating($request->input('independence_score')),
            'independence_score' => $request->input('independence_score'),
            'independence_justification' => $request->input('independence_justification'),

            'influence_rating' => $this->get_rating($request->input('influence_score')),
            'influence_score' => $request->input('influence_score'),
            'influence_justification' => $request->input('influence_justification'),
            
            'organizational_scope_rating' => $this->get_rating($request->input('organizational_scope_score')),
            'organizational_scope_score' => $request->input('organizational_scope_score'),
            'organizational_scope_justification' => $request->input('organizational_scope_justification'),

            'job_contrast_rating' => $this->get_rating($request->input('job_contrast_score')),
            'job_contrast_score' => $request->input('job_contrast_score'),
            'job_contrast_justification' => $request->input('job_contrast_justification'),

            'execution_rating' => $this->get_rating($request->input('execution_score')),
            'execution_score' => $request->input('execution_score'),
            'execution_justification' => $request->input('execution_justification'),

            'sbu_total_performance_rating' => $sbu_rating,
            'sbu_total_performance_score' => $sbu_total,
            // 'sbu_bonus_recommendation' => $sbu_promote,
            'sbu_comment' => $request->input('sbu_comment'),

            'pm_total_performance_rating' => $pm_rating,
            'pm_total_performance_score' => $pm_total,
            // 'pm_bonus_recommendation' => $pm_promote,
            'pm_comment' => $request->input('pm_comment'),

        ]);

        return redirect()->route('previous-bonus-reviews-calculation.index')->with('flash', 'review successfully submitted');
    }

    private function get_rating($score) {
        if(is_null($score)){
            return 'N/A';
        } else if($score > 2) {
            return 'Exceeds Expectation';
        } else if($score > 1) {
            return 'Meets Expectation Very Well';
        } else {
            return 'Needs Improvement';
        }
    }

    private function get_pr($score) {
        if(is_null($score)){
            return ' Na';
        } else if($score > 14) {
            return 'Exceeds Expectation';
        } else if($score > 8) {
            return 'Meets Expectation Very Well';
        } else {
            return 'Needs Improvement';
        }
    }
}
