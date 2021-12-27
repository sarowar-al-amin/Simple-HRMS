<?php

namespace App\Http\Controllers\Sbu;

use App\Http\Controllers\Controller;
use App\Models\SalaryReview;
use App\Models\SalaryReviewMetadata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeReviewController extends Controller
{
    public function index() {
        return view('sbu.employee-reviews.index',[
            'headings' => $headings = ['ID', 'Name', 'Team', 'Actions'],
            'employees' => User::where('sbu', Auth::user()->name)->get()
        ]);
    }

    public function create(User $user) {
        return view('sbu.employee-reviews.create', [
            'employee' => $user
        ]);
    }

    public function store(Request $request,User $user) {

        SalaryReviewMetadata::create([
            'salary_review_id' => '21D',
            'user_id' => $user->id,
            'categorical_feedbacks' => implode('#', $request->input('categorical_feedbacks')),
            'categorical_justifications' => implode('#', $request->input('categorical_justifications')),
            'behavioural_feedbacks' => implode('#', $request->input('behavioural_feedbacks')),
            'behavioural_justifications' => implode('#', $request->input('behavioural_justifications')),
            'performance' => $request->input('performance'),
            'promotion' => $request->input('promotion'),
            'sbu_comment' => $request->input('sbu_comment')
        ]);

        return redirect()->route('sbu.employee-reviews.index');
    }
}
