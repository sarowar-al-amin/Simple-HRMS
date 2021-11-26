<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\SalaryReview;
use Illuminate\Http\Request;

class SalaryReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(SalaryReview::all());
        // foreach (SalaryReview::all() as $salaryReview){
        //     dd($salaryReview->quarter());
        //     break;
        // }
        return view('hr.salary-reviews.index', [
            'salaryReviews' => SalaryReview::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.salary-reviews.create', [
            'quarters' => Quarter::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        $quarter = Quarter::firstWhere('name', $request->input('quarterName'));

        SalaryReview::create([
            'name' => $data['name'],
            'start' => $data['start'],
            'end' => $data['end'],
            'quarter_id' => $quarter->id,
        ]);        

        return redirect(route('salary-reviews.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SalaryReview  $salaryReview
     * @return \Illuminate\Http\Response
     */
    public function show(SalaryReview $salaryReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SalaryReview  $salaryReview
     * @return \Illuminate\Http\Response
     */
    public function edit(SalaryReview $salaryReview)
    {
        return view('hr.salary-reviews.edit', [
            'salaryReview' => $salaryReview,
            'quarters' => Quarter::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SalaryReview  $salaryReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SalaryReview $salaryReview)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        $quarter = Quarter::firstWhere('name', $request->input('quarterName'));

        $salaryReview->update([
            'name' => $data['name'],
            'start' => $data['start'],
            'end' => $data['end'],
            'quarter_id' => $quarter->id,
        ]);
        return redirect(route('salary-reviews.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SalaryReview  $salaryReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(SalaryReview $salaryReview)
    {
        $salaryReview->delete();
        return redirect(route('salary-reviews.index'));
    }
}
