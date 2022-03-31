<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Imports\BonusReview;

class BonusReviewImportController extends Controller
{
    //
    public function index(){
        if(is_null(Auth::user())){ //Make sure the loged in user is authenticated user
            return redirect('login');
        }elseif((Auth::user()->role == 'Admin')){
            return view('bonus-review.index');
        }else{
            return redirect()->back();
        }
    }

    public function upload_excel(Request $request){

        $file = $request->file('file')->store('import');

        $import = new BonusReview;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            // echo "Failure occurs";
            return back()->withFailures($import->failures());
        }


        return redirect()->back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}
