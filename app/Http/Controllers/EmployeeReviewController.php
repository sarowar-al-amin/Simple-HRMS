<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeSalaryMetadataRequest;
use App\Models\SalaryReview;
use App\Models\SalaryReviewMetadata;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeReviewController extends Controller
{

    public function create(SalaryReview $salaryreview, $sbu, User $user){
        return view('hr.employee-reviews.create', [
            'salaryReview' => $salaryreview,
            'sbu' => $sbu,
            'employee' => $user,
            'level' => config('employee_levels')[4]
        ]);
    }

    public function store(storeSalaryMetadataRequest $request, SalaryReview $salaryreview, User $user){
        //dd($request->all());
        SalaryReviewMetadata::create([
            'user_id' => $user->id,
            'salary_review_id' => $salaryreview->id,
            'feedbacks' => implode('#', $request->input('feedbacks')),
            'justifications' => implode('#', $request->input('justifications')),
            'behaviours' => implode('#', $request->input('behaviours')),
            'performance' => $request->input('performance'),
            'promotion' => $request->input('promotion'),
            'comment' => $request->input('comment')
        ]);

        return back();

    }

    public function show(SalaryReview $salaryreview, User $user){
        return view('hr.employee-reviews.show', [
            'salaryReviewMetadata' => SalaryReviewMetadata::where('salary_review_id', $salaryreview->id)->where('user_id', $user->id)->first(),
            'level' => config('employee_levels')[4]
        ]);
    }
}
