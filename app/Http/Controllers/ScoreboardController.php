<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

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

    //
    public function employeeList(){
        $name = DB::table('users')
        ->distinct()
        ->select('sbu')
        ->get();
        // dd($sbu);
        $employees = DB::table('users')->get();
        $total = DB::table('users')->count();
        $trainee = DB::table('users')
                    ->where('designation', 'Trainee')
                    ->count();
        // dd($trainee);
        $bench = DB::table('users')
                    ->where('team', 'bench')
                    ->count();
        // dd($bench);

        return view('hr.scoreboard.employeeList', compact(
            'name', 
            'employees', 
            'total',
            'trainee',
            'bench'
        ));
    }

    public function employeeAccordingToSbu(Request $request){
        $name = DB::table('users')
        ->distinct()
        ->select('sbu')
        ->get();
        $employees = DB::table('users')
            ->where('sbu', $request->sbu_name)
            ->get();
        // dd($employees);
        $total = DB::table('users')
                    ->where('sbu', $request->sbu_name)
                    ->count();
        // dd($total);
        $trainee = DB::table('users')
                    ->where('sbu', $request->sbu_name)
                    ->where('designation', 'Trainee')
                    ->count();
        // dd($trainee);
        $bench = DB::table('users')
                    ->where('sbu', $request->sbu_name)
                    ->where('team', 'bench')
                    ->count();
        // dd($bench);
        return view('hr.scoreboard.employeeList', compact(
            'name', 
            'employees',
            'total',
            'trainee',
            'bench'
        ));
    }
}
