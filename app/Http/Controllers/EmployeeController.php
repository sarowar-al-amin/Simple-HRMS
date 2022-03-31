<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index() {
        if(is_null(Auth::user())){ //Make sure the loged in user is authenticated user
            return redirect('login');
        }elseif((Auth::user()->role == 'Admin')){
            return view('employees-index');
        }else{
            return redirect()->back();
        }
    }
}
