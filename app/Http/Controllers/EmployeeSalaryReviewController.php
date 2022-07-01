<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\EmployeeLevel;
use App\Models\Quarter;
use App\Models\SalaryReview;
use App\Models\SalaryReviewMetadata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class EmployeeSalaryReviewController extends Controller
{
    //

    public function index(){

        if(is_null(Auth::user())){
          
            return redirect('login');
        }
        elseif(Auth::user()->role === 'Admin'){
            $employees = User::orderBy('sbu')->orderBy('pm')->get();
        }
        else{
            $employees = Auth::user()->role === 'SBU' ? User::where('sbu', Auth::user()->name)->get()->sortBy('pm') : User::where('pm', Auth::user()->name)->get();
        }
        $reviews = array_map(fn ($employee) => SalaryReviewMetadata::where('user_id', $employee['id'])->first(), $employees->toArray());
        $lastDate = SalaryReview::first()->end;
        //dd($lastDate);
        return view('employee-salary-reviews.index',[
            'headings' => ['ID', 'Name', 'Salary Review', 'Bonus Review', 'SBU Reviewed', 'PM Reviewed', 'SBU', 'PM', 'Performance', 'Promotion', 'Comments'],
            'employees' => $employees,
            'reviews' => $reviews,
            'expired' => Carbon::createFromFormat('j M Y', $lastDate)->lt(today())
        ]);

        // return view('employee-salary-reviews.index');
    }
}
