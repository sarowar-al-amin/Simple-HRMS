<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use App\Models\SalaryReview;
use App\Models\SalaryReviewMetadata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeReviewController extends Controller
{
    public function index() {

        $employees = Auth::user()->role === 'SBU' ? User::where('sbu', Auth::user()->name)->get() : User::where('pm', Auth::user()->name)->get();
        $reviews = array_map(fn ($employee) => SalaryReviewMetadata::where('user_id', $employee['id'])->first(), $employees->toArray());
        return view('employee-reviews.index',[
            'headings' => ['ID', 'Name', 'SBU Reviewed', 'PM Reviewd', 'Actions'],
            'employees' => $employees,
            'reviews' => $reviews
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

        $sbu = null;
        $pm = null;
        $sr = SalaryReview::firstOrFail();

        if(Auth::user()->role === 'SBU'){
            $sbu = Auth::user()->name;
        }
        else{
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

        return redirect()->route('employee-reviews.index');
    }
}
