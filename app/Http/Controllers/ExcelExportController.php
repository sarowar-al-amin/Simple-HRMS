<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\SalaryReview;
use Excel;

class ExcelExportController extends Controller
{
    //
    public function exportIntoExcel(){
        return Excel::download(new SalaryReview, 'salaryReview.xlsx');
    }

}
