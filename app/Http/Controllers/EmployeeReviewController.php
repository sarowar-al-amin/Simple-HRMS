<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use App\Models\Quarter;
use App\Models\SalaryReview;
use App\Models\SalaryReview22bMetadata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Str;

class EmployeeReviewController extends Controller
{
    public function index() {
        // Check user is authenticate or not.
        // If user is admin/SBU/PM let them complete their tasks.
        // If user is not legitimate redirect back them to login page.
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
        return view('employee-reviews.index',[
            'headings' => ['ID', 'Name', 'Salary Review', 'Bonus Review', 'SBU Reviewed', 'PM Reviewed', 'SBU', 'PM', 'Performance', 'Promotion', 'Comments', 'Actions'],
            'employees' => $employees,
            'reviews' => $reviews,
            'expired' => Carbon::createFromFormat('j M Y', $lastDate)->lt(today())
        ]);
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
            return redirect('/employee-salary-review')->with('warning', 'That user is not under your authorization');
        }

        $currentLevel = EmployeeLevel::find($user->level);
        $nextLevel = EmployeeLevel::find($currentLevel->next_level);

        return view('employee-reviews.create', [
            'employee' => $user,
            'currentLevel' => $currentLevel,
            'nextLevel' => $nextLevel
        ]);
    }

    // 
    public function view(User $user) {
        
        //Without legitimate user form can't be created.
        if(is_null(Auth::user())){         
            return redirect('login');
        }elseif(Auth::user()->role === 'SBU'){
            $currentLevel = EmployeeLevel::find($user->level);
            $nextLevel = EmployeeLevel::find($currentLevel->next_level);
    
            return view('employee-reviews.view', [
                'employee' => $user,
                'currentLevel' => $currentLevel,
                'nextLevel' => $nextLevel
            ]);
        }else{
            return view('home');
        }
    }
    // 
    public function store(Request $request,User $user) {

        //Without legitimate user form can't be sotred.
        if(is_null(Auth::user())){
            
            return redirect('login');
        }
        $data = $request->validate([
            "categorical_feedbacks.*" => ['required'],
            'behavioural_feedbacks.*' => ['required'],
            'promotion' => ['required'],
            'performance' => ['required'],
            'sbu_comment' => ['required']
        ]);

        $sr = SalaryReview::firstOrFail();
        $srm = SalaryReview22bMetadata::where('salary_review_id', $sr->id)->where('user_id', $user->id)->first();
        $sbu = $srm?->sbu;
        $pm = $srm?->pm;

        if(Auth::user()->role === 'SBU'){
            $sbu = Auth::user()->name;
        }
        else if(Auth::user()->role === 'PM'){
            $pm = Auth::user()->name;
        }

        SalaryReview22bMetadata::updateOrInsert([
            'salary_review_id' => $sr->id,
            'user_id' => $user->id,
        ],
        [
            'salary_review_id' => $sr->id,
            'user_id' => $user->id,

            'knowledge_rating' => $request->input('knowledge_rating'),
            'knowledge_score' => $request->input('knowledge_score'),
            'knowledge_justification' => $request->input('knowledge_rating'),

            'indepndence_rating' => $request->input('indepndence_rating'),
            'indepndence_score' => $request->input('indepndence_score'),
            'indepndence_justification' => $request->input('indepndence_rating'),

            'influence_rating' => $request->input('influence_rating'),
            'influence_score' => $request->input('influence_score'),
            'influence_justification' => $request->input('influence_rating'),
            
            'organizational_scope_rating' => $request->input('organizational_scope_rating'),
            'organizational_scope_score' => $request->input('organizational_scope_score'),
            'organizational_scope_justification' => $request->input('organizational_scope_rating'),

            'job_contrast_rating' => $request->input('job_contrast_rating'),
            'job_contrast_score' => $request->input('job_contrast_score'),
            'job_contrast_justification' => $request->input('job_contrast_rating'),

            'execution_rating' => $request->input('execution_rating'),
            'execution_score' => $request->input('execution_score'),
            'execution_justification' => $request->input('execution_rating'),

            'ownershi[p_rating' => $request->input('ownershi[p_rating'),
            'ownershi[p_score' => $request->input('ownershi[p_score'),
            'ownershi[p_justification' => $request->input('ownershi[p_rating'),

            'passion_rating' => $request->input('passion_rating'),
            'passion_score' => $request->input('passion_score'),
            'passion_justification' => $request->input('passion_rating'),

            'agility_rating' => $request->input('agility_rating'),
            'agility_score' => $request->input('agility_score'),
            'agility_justification' => $request->input('agility_rating'),

            'team_spirit_rating' => $request->input('team_spirit_rating'),
            'team_spirit_score' => $request->input('team_spirit_score'),
            'team_spirit_justification' => $request->input('team_spirit_rating'),

            'honesty_rating' => $request->input('honesty_rating'),
            'honesty_score' => $request->input('honesty_score'),
            'honesty_justification' => $request->input('honesty_rating'),

            'performance' => $request->input('performance'),
            'promotion' => $request->input('promotion'),
            'sbu_comment' => $request->input('sbu_comment'),
            'sbu' => $sbu,
            'pm' => $pm
        ]);



        return redirect()->route('employee-salary-review.index')->with('flash', 'review successfully submitted');
    }
}
