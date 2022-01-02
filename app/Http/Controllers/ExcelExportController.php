<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\SalaryReview;
use Excel;

class ExcelExportController extends Controller
{
    public function index(){
        return view('exportFile.exportSalary');
    }
    //
    public function exportIntoExcel(){
        if(!Gate::allows('admin', auth()->user())){
            abrot(403);
        }
        return Excel::download(new SalaryReview, 'salaryReview.xlsx');
    }

}
