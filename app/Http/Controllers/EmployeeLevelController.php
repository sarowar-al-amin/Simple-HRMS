<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeLevelController extends Controller
{
    public function index() {
        return view('hr.levels.index', [
            'levels' => config('employee_levels')
        ]);
    }
}
