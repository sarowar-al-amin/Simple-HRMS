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

    //Make sure the loged in user is authenticated user
    public function addNewEmployee(){
        if(is_null(Auth::user())){
            return redirect('login');
        }elseif((Auth::user()->role == 'Admin')){
            return view('add-new-employee.index');
        }else{
            return redirect()->back();
        }
    }

    //
    public function insertNewEmployee(Request $request){

        if(is_null(Auth::user())){
            return redirect('login');
        }
        $user = User::where('id', $request->employee_id)
            ->first();
        // dd($user);
        if(is_null($user)){
            User::create([
                'id' => $request->employee_id,
                'email' => $request->email,
                'name' => $request->name
            ]);

            // $user = User::where('id', $request->employee_id)
            // ->first();
            // dd($user->email);
            return redirect()->back();
        }else{
            return redirect()->back()->with('This ID or Email is already registered');
        }


    }
}
