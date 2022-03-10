<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeSalaryReviewRequest;
use App\Http\Requests\updateSalaryReviewRequest;
use App\Models\Quarter;
use App\Models\SalaryReview;
use App\Models\SalaryReviewMetadata;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class SalaryReviewController extends Controller
{
    public function index()
    {
        if(is_null(Auth::user())){
            return redirect('login');
        }elseif(Auth::user()->role === 'Admin'){
            return view('salary-reviews-index');
        }else{
            return view('home');
        }
    }

    public function create()
    {
        return view('hr.salary-reviews.create', [
            'quarters' => Quarter::all()
        ]);
    }

    public function store(storeSalaryReviewRequest $request)
    {
        SalaryReview::create($request->all());        
        return redirect()->route('salary-reviews.index');
    }

    public function show(SalaryReview $salaryReview)
    {
        
    }

    public function edit(SalaryReview $salaryReview)
    {
        return view('hr.salary-reviews.edit', [
            'salaryReview' => $salaryReview,
            'quarters' => Quarter::all()
        ]);
    }

    public function update(updateSalaryReviewRequest $request, SalaryReview $salaryReview)
    {
        $salaryReview->update($request->all());
        return redirect(route('salary-reviews.index'));
    }

    public function destroy(SalaryReview $salaryReview)
    {
        $users = User::all();
        foreach($users as $user) {
            $user->second_last_performance = $user->last_performance;
            $user->second_last_promotion = $user->last_promotion;
            
            $sr = SalaryReviewMetadata::where('user_id', $user->id)->first();

            $user->last_performance = $sr?->performance;
            $user->last_promotion = $sr?->promotion;
            $user->comments = $sr?->sbu_comment;
        }
        $salaryReview->delete();
        return redirect(route('salary-reviews.index'));
    }
}
