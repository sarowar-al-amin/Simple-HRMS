<?php

namespace App\Http\Controllers\Sbu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalaryReviewController extends Controller
{
    public function index() {
        return view('employee-reviews-index');
    }
}
