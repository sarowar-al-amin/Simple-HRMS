<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserProfileController extends Controller
{
    //
    public function index(){
        if(is_null(Auth::user())){
            return redirect('login');
        }else{
            // return view('home');
            // dd($request->id)
            $user = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->first();
            // dd($user);
            return view('profile.index', compact('user'));
        }
    }
}
