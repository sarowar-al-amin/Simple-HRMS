<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Exports\SalaryReview;
use App\Exports\BonusReviewTemplate;
use App\Exports\BonusReviewExport;
use Excel;

class ExcelExportController extends Controller
{
    public function index(){
        if(is_null(Auth::user())){ //Make sure the loged in user is authenticated user
            return redirect('login');
        }elseif((Auth::user()->role == 'Admin')){
            return view('exportFile.exportSalary');
        }else{
            return redirect()->back();
        }
    }
    //
    public function exportIntoExcel(){
        // if(!Gate::allows('admin', auth()->user())){
        //     abrot(403);
        // }
        return Excel::download(new SalaryReview, 'salaryReview.xlsx');
    }

    public function exportBonusReviewTemplate(){
        return Excel::download(new BonusReviewTemplate, 'bonusReviewTemplate.xlsx');
    }

    public function exportBonusReviewView(){
        if(is_null(Auth::user())){ //Make sure the loged in user is authenticated user
            return redirect('login');
        }elseif((Auth::user()->role == 'Admin')){
            // return 'It is working';
            return view('exportFile.exportBonusReview');
        }else{
            return redirect()->back();
        }
    }

    public function exportBonusReview(){
        return Excel::download(new BonusReviewExport, 'bonusReview.xlsx');
    }

}
