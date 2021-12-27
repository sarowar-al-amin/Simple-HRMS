<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\UserImport;

class ExcelImportController extends Controller
{

    public function index(){
        return view('employeeImport.employeeImport');
    }

    public function upload_excel(Request $request){

        $file = $request->file('file')->store('import');

        $import = new UserImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }


        return redirect()->back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}
