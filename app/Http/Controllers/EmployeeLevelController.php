<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLevel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class EmployeeLevelController extends Controller
{
    public function index() {

        // Without logged in traffic can't see this a bit
        if(is_null(Auth::user())){
            
            return redirect('login');
        }

        return view('hr.levels.index', [
            'levels' => EmployeeLevel::all()
        ]);
    }
}
