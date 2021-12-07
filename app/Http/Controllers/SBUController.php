<?php

namespace App\Http\Controllers;

use App\Models\SalaryReview;
use App\Models\User;
use Illuminate\Http\Request;

class SBUController extends Controller
{
    public function index(SalaryReview $salaryreview)
    {
        return view('hr.sbus.index', [
            'salaryReview' => $salaryreview,
            'sbus' => ['Raisul Islam', 'Miftah Zaman']
        ]);
    }

    public function show(SalaryReview $salaryreview, $sbu)
    {
        return view('hr.sbus.show', [
            'salaryReview' => $salaryreview,
            'employees' => User::where('sbu', $sbu)->get()
        ]);
    }
}
