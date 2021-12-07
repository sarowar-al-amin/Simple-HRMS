<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeSalaryReviewRequest;
use App\Http\Requests\updateSalaryReviewRequest;
use App\Models\Quarter;
use App\Models\SalaryReview;
use Illuminate\Http\Request;

class SalaryReviewController extends Controller
{
    public function index()
    {
        return view('hr.salary-reviews.index', [
            'salaryReviews' => SalaryReview::all()
        ]);
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
        $salaryReview->delete();
        return redirect(route('salary-reviews.index'));
    }
}
