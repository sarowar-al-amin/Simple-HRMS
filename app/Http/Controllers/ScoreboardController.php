<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ScoreboardController extends Controller
{
    //
    public function index(){

        $employees = DB::table('users')->get();
        // dd($employees);
        return view('hr.scoreboard.scoreboard', compact('employees'));
    }

    public function action(Request $request){
    	if($request->ajax())
    	{
    		if($request->action == 'edit')
    		{
    			$data = array(
    				'sbu'	=>	$request->sbu,
    			);
    			DB::table('users')
    				->where('id', $request->id)
    				->update($data);
    		}
    		if($request->action == 'delete')
    		{
    			DB::table('users')
    				->where('id', $request->id)
    				->delete();
    		}
    		return response()->json($request);
    	}
    }
}
