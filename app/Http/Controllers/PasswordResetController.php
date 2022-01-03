<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use DB;

class PasswordResetController extends Controller
{
    //
    public function index(){
        return view('password.resetpassword');
    }

    public function resetPassword(Request $request){
        // dd($request->password);
       $id = DB::table('users')->where('id', $request->id)->update(['password' => Hash::make($request->password)]);
        // dd($id);
        return redirect()->back();      
    }
}
