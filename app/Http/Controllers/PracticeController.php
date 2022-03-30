<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;

class PracticeController extends Controller
{
    
    public function index(){
        $sbuData = DB::table('users')
                            ->selectRaw('sbu, count(id) as employees')
                            ->groupBy('sbu')
                            ->get();
        $typeData = DB::table('users')
                            ->selectRaw('employee_type, count(id) as employees')
                            ->groupBy('employee_type')
                            ->get();
        
        $manageData = DB::table('users')
                            ->selectRaw('managerial_capacity, count(id) as employees')
                            ->groupBy('managerial_capacity')
                            ->get();
        $categoryData = DB::table('users')
                            ->selectRaw('employee_category, count(id) as employees')
                            ->groupBy('employee_category')
                            ->get();
        $levelData = DB::table('users')
                            ->selectRaw('level, count(id) as employees')
                            ->groupBy('level')
                            ->orderBy('level')
                            ->get();
        $sbus = Arr::pluck($sbuData, 'sbu');
        $employees = Arr::pluck($sbuData, 'employees');

        $types = Arr::pluck($typeData, 'employee_type');
        $typeEmployees = Arr::pluck($typeData, 'employees');

        $manageTypes = Arr::pluck($manageData, 'managerial_capacity');
        $manageEmployees = Arr::pluck($manageData, 'employees');

        $categoryTypes = Arr::pluck($categoryData, 'employee_category');
        $categoryEmployees = Arr::pluck($categoryData, 'employees');

        $levelTypes = Arr::pluck($levelData, 'level');
        $levelEmployees = Arr::pluck($levelData, 'employees');

        return view('practice', [
            'sbus' => $sbus,
            'employees' => $employees,
            'types' => $types,
            'typeEmployees' => $typeEmployees,
            'manageTypes' => $manageTypes,
            'manageEmployees' => $manageEmployees,
            'categoryTypes' => $categoryTypes,
            'categoryEmployees' => $categoryEmployees,
            'levelTypes' => $levelTypes,
            'levelEmployees' => $levelEmployees
        ]);
    }
}
