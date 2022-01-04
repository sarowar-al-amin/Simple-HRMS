<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use App\Models\Quarter;
use App\Models\SalaryReview;
use App\Models\SalaryReviewMetadata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeReviewController extends Controller
{
    public function index() {
        if(Auth::user()->role === 'Admin'){
            $employees = User::all()->sortBy('sbu');
        }
        else{
            $employees = Auth::user()->role === 'SBU' ? User::where('sbu', Auth::user()->name)->get() : User::where('pm', Auth::user()->name)->get();
        }
        $reviews = array_map(fn ($employee) => SalaryReviewMetadata::where('user_id', $employee['id'])->first(), $employees->toArray());
        $lastDate = SalaryReview::first()->end;
        //dd($lastDate);
        return view('employee-reviews.index',[
            'headings' => ['ID', 'Name', 'Salary Review', 'Bonus Review', 'SBU Reviewed', 'PM Reviewd', 'SBU', 'Performance', 'Promotion', 'Comments', 'Actions'],
            'employees' => $employees,
            'reviews' => $reviews,
            'expired' => Carbon::createFromFormat('j M Y', $lastDate)->lt(today())
        ]);
    }

    public function create(User $user) {
        $currentLevel = EmployeeLevel::find($user->level);
        $nextLevel = EmployeeLevel::find($currentLevel->next_level);

        return view('employee-reviews.create', [
            'employee' => $user,
            'currentLevel' => $currentLevel,
            'nextLevel' => $nextLevel
        ]);
    }

    public function store(Request $request,User $user) {

        $data = $request->validate([
            "categorical_feedbacks.*" => ['required'],
            'behavioural_feedbacks.*' => ['required'],
            'promotion' => ['required'],
            'performance' => ['required'],
            'sbu_comment' => ['required']
        ]);

        $sr = SalaryReview::firstOrFail();
        //$srm = SalaryReviewMetadata::where('salary_review_id', $sr->id)->where('user_id', $user->id)->firstOrFail();
        $sbu = null;
        $pm = null;

        if(Auth::user()->role === 'SBU'){
            $sbu = Auth::user()->name;
        }
        else if(Auth::user()->role === 'PM'){
            $pm = Auth::user()->name;
        }

        SalaryReviewMetadata::updateOrInsert([
            'salary_review_id' => $sr->id,
            'user_id' => $user->id,
        ],
        [
            'salary_review_id' => $sr->id,
            'user_id' => $user->id,
            'categorical_feedbacks' => implode('#', $request->input('categorical_feedbacks')),
            'categorical_justifications' => implode('#', $request->input('categorical_justifications')),
            'behavioural_feedbacks' => implode('#', $request->input('behavioural_feedbacks')),
            'behavioural_justifications' => implode('#', $request->input('behavioural_justifications')),
            'performance' => $request->input('performance'),
            'promotion' => $request->input('promotion'),
            'sbu_comment' => $request->input('sbu_comment'),
            'sbu' => $sbu,
            'pm' => $pm
        ]);



        return redirect()->route('employee-reviews.index')->with('flash', 'review successfully submitted');
    }
}
