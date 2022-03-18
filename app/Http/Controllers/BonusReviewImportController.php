<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\BonusReview;

class BonusReviewImportController extends Controller
{
    //
    public function index(){
        return view('bonus-review.index');
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
