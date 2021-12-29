<?php

namespace App\Http\Controllers;

use App\Imports\Level;
use Illuminate\Http\Request;

class ExcelLevelImport extends Controller
{
    //
    public function index(){
        return view('levelImport.levelImport');
    }

    public function upload_excel(Request $request){

        $file = $request->file('file')->store('import');

        $import = new Level;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }


        return redirect()->back()->withStatus('Import in queue, we will send notification after import finished.');
    }
}
