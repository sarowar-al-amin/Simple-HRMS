<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;

class ScoreboardController extends Controller
{
    //
    public function index(){

        // $employees = DB::table('users')->get();
        // dd($employees);
        // return view('hr.scoreboard.scoreboard', compact('employees'));
        return view('hr.scoreboard.scoreboard');
    }

    // public function action(Request $request){
    // 	if($request->ajax())
    // 	{
    // 		if($request->action == 'edit')
    // 		{
    // 			$data = array(
    // 				'sbu'	=>	$request->sbu,
    // 			);
    // 			DB::table('users')
    // 				->where('id', $request->id)
    // 				->update($data);
    // 		}
    // 		if($request->action == 'delete')
    // 		{
    // 			DB::table('users')
    // 				->where('id', $request->id)
    // 				->delete();
    // 		}
    // 		return response()->json($request);
    // 	}
    // }

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
        $work = DB::table('users')
                    ->where('work_type', 'Non-billable(L&D)')
                    ->orwhere('work_type', 'Non-billable(Trainee)')
                    ->orwhere('work_type', 'Non-billable(Bench)')
                    ->count();
        // dd($work);
        $title = "All employee list (Non-editable table)";
        return view('hr.scoreboard.employeeList', compact(
            'name', 
            'employees', 
            'total',
            'trainee',
            'bench',
            'title',
            'work'
        ));
    }

    public function employeeAccordingToSbu(Request $request){
        $name = DB::table('users')
                    ->distinct()
                    ->select('sbu')
                    ->get();
        // $employees = DB::table('users')
        //     ->where('sbu', $request->sbu_name)
        //     ->get();
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
        $work = DB::table('users')
                ->where('sbu', $request->sbu_name)
                ->where(function ($query){
                    $query->where('work_type', 'Non-billable(L&D)')
                          ->orwhere('work_type', 'Non-billable(Trainee)')
                          ->orwhere('work_type', 'Non-billable(Bench)');
                })   
                ->count();
        // dd($work);
        $title = "Employee under " . $request->sbu_name;
        $sbu = $request->sbu_name;

        // dd($sbu);
        return view('hr.scoreboard.employeeListBySbu', compact(
            'name', 
            // 'employees',
            'total',
            'trainee',
            'bench',
            'title',
            'work',
            'sbu'
        ));
    }

    // function that's gonna show bench report
    public function benchReport(){
        return view('hr.scoreboard.bench');
    }
}
