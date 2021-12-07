<?php

namespace App\Http\Controllers;

use App\Models\SalaryReviewMetadata;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeReviewController extends Controller
{
    public function review($id){
        return view('hr.employees.review', [
            'employee' => User::findOrFail($id),
            'level' => config('employee_levels')[4]
        ]);
    }

    public function storeReview(Request $request, $id){
        SalaryReviewMetadata::create([
            'salary_review_id' => 1,
            'user_id' => $id,
            'feedbacks' => implode($request->feedbacks),
            'justifications' => implode($request->justifications),
            'behaviours' => implode($request->behaviours),
            'overall' => $request->performance,
            'promotion' => $request->promotion,
            'comment' => $request->comment
        ]);
    }

    public function show(){
        
    }
}
