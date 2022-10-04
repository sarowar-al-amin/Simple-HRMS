<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use App\Models\Quarter;
use App\Models\BonusReview;
use App\Models\QuaterlyBonusCalculation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeBonusCalculationController extends Controller
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
        $reviews = array_map(fn ($employee) => QuaterlyBonusCalculation::where('user_id', $employee['id'])->first(), $employees->toArray());
        $lastDate = BonusReview::first()->end;
        // dd($employees);

        return view('bonus-review-calculation.index',[
            'headings' => ['ID', 'Name','Bonus Eligibility', 'SBU Reviewed', 'PM Reviewed', 'SBU', 'PM', 'Performance', 'Comments', 'PM Performance', 'PM Comments'],
            'employees' => $employees,
            'reviews' => $reviews,
            'expired' => Carbon::createFromFormat('j M Y', $lastDate)->lt(today())
        ]);

        // return view('employee-salary-reviews.index');
    }

    public function create(User $user) {
        
        //Without legitimate user form can't be created.
        if(is_null(Auth::user())){
            
            return redirect('login');
        }

        $author = Auth::user()->name;
        $employee = User::where('id', $user->id)->first();
        $sbu_name = $employee->sbu;
        $pm_name = $employee->pm;

        if($author != $sbu_name && $author != $pm_name && Auth::user()->role != 'Admin'){
            return route('employee-bonus-reviews-calculation.index')->with('warning', 'That user is not under your authorization');
        }

        $currentLevel = EmployeeLevel::find($user->level);
        // $nextLevel = EmployeeLevel::find($currentLevel->next_level);
        // dd($employee);
        return view('bonus-review-calculation.create', [
            'employee' => $user,
            'currentLevel' => $currentLevel,
            'nextLevel' => $currentLevel,
        ]);
    }


    public function view(User $user) {
        
        //Without legitimate user form can't be created.
        if(is_null(Auth::user())){         
            return redirect('login');
        }elseif(Auth::user()->role === 'SBU'){
            $currentLevel = EmployeeLevel::find($user->level);
            // $nextLevel = EmployeeLevel::find($currentLevel->next_level);
    
            return view('bonus-review-calculation.view', [
                'employee' => $user,
                'currentLevel' => $currentLevel,
                'nextLevel' => $currentLevel
            ]);
        }else{
            return view('home');
        }
    }


    public function store(Request $request,User $user) {


        //Without legitimate user form can't be sotred.
        if(is_null(Auth::user())){
            
            return redirect('login');
        }

        $sr = BonusReview::firstOrFail();
        $srm = QuaterlyBonusCalculation::where('bonus_review_id', $sr->id)->where('user_id', $user->id)->first();


        
        $total_performance = (int)($request->input('knowledge_score')+$request->input('independence_score')+$request->input('influence_score')+$request->input('organizational_scope_score')+$request->input('job_contrast_score')+$request->input('execution_score'));
        

        if(Auth::user()->role == 'SBU'){
            $sbu_total = $total_performance;
            $sbu_rating = $this->get_pr($sbu_total );
            // $sbu_promote = $request->input('promotion_recommendation');

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
    
            ]);
        }
        else if(Auth::user()->role == 'PM'){
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

                'pm_total_performance_rating' => $pm_rating,
                'pm_total_performance_score' => $pm_total,
                // 'pm_bonus_recommendation' => $pm_promote,
                'pm_comment' => $request->input('pm_comment'),
    
            ]);
        }else{

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

        }
       


        return redirect()->route('employee-bonus-reviews-calculation.index')->with('flash', 'review successfully submitted');
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
