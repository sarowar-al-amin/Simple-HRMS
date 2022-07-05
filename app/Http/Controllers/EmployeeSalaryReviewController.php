<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use App\Models\Quarter;
use App\Models\SalaryReview;
// use App\Models\SalaryReviewMetadata;
use App\Models\SalaryReview22bMetadata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class EmployeeSalaryReviewController extends Controller
{
    //

    public function index(){

        if(is_null(Auth::user())){
          
            return redirect('login');
        }
        elseif(Auth::user()->role === 'Admin'){
            $employees = User::orderBy('sbu')->orderBy('pm')->get();
        }
        else{
            $employees = Auth::user()->role === 'SBU' ? User::where('sbu', Auth::user()->name)->get()->sortBy('pm') : User::where('pm', Auth::user()->name)->get();
        }
        $reviews = array_map(fn ($employee) => SalaryReview22bMetadata::where('user_id', $employee['id'])->first(), $employees->toArray());
        $lastDate = SalaryReview::first()->end;
        //dd($lastDate);
        return view('employee-salary-reviews.index',[
            'headings' => ['ID', 'Name', 'Salary Review', 'Bonus Review', 'SBU Reviewed', 'PM Reviewed', 'SBU', 'PM', 'Performance', 'Promotion', 'Comments', 'Actions'],
            'employees' => $employees,
            'reviews' => $reviews,
            'expired' => Carbon::createFromFormat('j M Y', $lastDate)->lt(today())
        ]);

        // return view('employee-salary-reviews.index');
    }

    public function store(Request $request,User $user) {


        //Without legitimate user form can't be sotred.
        if(is_null(Auth::user())){
            
            return redirect('login');
        }

        $sr = SalaryReview::firstOrFail();
        $srm = SalaryReview22bMetadata::where('salary_review_id', $sr->id)->where('user_id', $user->id)->first();

        $total_performance = $request->input('knowledge_rating')+$request->input('independence_rating')+$request->input('influence_rating')+$request->input('organizational_scope_rating')+$request->input('job_contrast_rating')+$request->input('execution_rating');

        if(Auth::user()->role === 'SBU'){
            $sbu_total = $total_performance;
            $sbu_rating = $this->get_pr($sbu_total);
        }
        else if(Auth::user()->role === 'PM'){
            $pm_total = $total_performance;
            $pm_rating = $this->get_pr($pm_total);
        }

        SalaryReview22bMetadata::updateOrInsert([
            'salary_review_id' => $sr->id,
            'user_id' => $user->id,
        ],
        [
            'salary_review_id' => $sr->id,
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
            'sbu_promotion_recommendation' => $request->input('sbu_promotion_recommendation'),
            'sbu_comment' => $request->input('sbu_comment'),

            'pm_total_performance_rating' => $pm_rating,
            'pm_total_performance_score' => $pm_total,
            'pm_promotion_recommendation' => $request->input('pm_promotion_recommendation'),
            'pm_comment' => $request->input('pm_comment'),

        ]);

        return redirect()->route('employee-salary-reviews.index')->with('flash', 'review successfully submitted');
    }

    private function get_rating($score) {
        if(is_null($score)){
            return 'N/A';
        } else if($score > 2) {
            return 'Exceeds Expectation';
        } else if($score > 1) {
            return 'Meets Expectation';
        } else {
            return 'Needs Improvement';
        }
    }

    // private function get_pt($knowledge, $independence, $influence, $organizational_scope, $job_contrast, $execution) {
    //     if(is_null($knowledge) || is_null($independence) || is_null($influence) || is_null($organizational_scope) || is_null($job_contrast) || is_null($execution)) {
    //         return null;
    //     }

    //     return $knowledge + $independence + $influence + $organizational_scope + $job_contrast + $execution;
    // }

    // private function get_vt($ownership, $passion, $agility, $team_spirit, $honesty) {
    //     if(is_null($ownership) || is_null($passion) || is_null($agility) || is_null($team_spirit) || is_null($honesty)) {
    //         return null;
    //     }

    //     return $ownership + $passion + $agility + $team_spirit + $honesty;
    // }

    private function get_pr($score) {
        if(is_null($score)){
            return 'N/A';
        } else if($score > 14) {
            return 'Exceeds Expectation';
        } else if($score > 8) {
            return 'Meets Expectation';
        } else {
            return 'Needs Improvement';
        }
    }

    // private function get_vr($score) {
    //     if(is_null($score)){
    //         return 'N/A';
    //     } else if($score > 12) {
    //         return 'Exceeds Expectation';
    //     } else if($score > 7) {
    //         return 'Meets Expectation';
    //     } else {
    //         return 'Needs Improvement';
    //     }
    // }
}
