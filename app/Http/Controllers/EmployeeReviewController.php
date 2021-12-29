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

        $employees = Auth::user()->role === 2 ? User::where('sbu', Auth::user()->name)->get() : User::where('pm', Auth::user()->name)->get();
        $reviews = array_map(fn ($employee) => SalaryReviewMetadata::where('user_id', $employee['id'])->first(), $employees->toArray());
        return view('employee-reviews.index',[
            'headings' => ['ID', 'Name', 'SBU Reviewed', 'PM Reviewd', 'Actions'],
            'employees' => $employees,
            'reviews' => $reviews
        ]);
    }

    public function create(User $user) {

        $level = EmployeeLevel::find($user->level);
        $level = EmployeeLevel::find($level->next_leve);

        return view('employee-reviews.create', [
            'employee' => $user,
            'level' => $level
        ]);
    }

    public function store(Request $request,User $user) {

        $sbu = null;
        $pm = null;

        if(Auth::user()->role === 2){
            $sbu = Auth::user()->name;
        }
        else{
            $pm = Auth::user()->name;
        }

        SalaryReviewMetadata::create([
            'salary_review_id' => '21D',
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
