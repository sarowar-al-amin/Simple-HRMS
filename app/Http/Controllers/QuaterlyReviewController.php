<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuaterlyReviewController extends Controller
{
    //
    public function index(){
        if(is_null(Auth::user())){
            return redirect('login');
        }elseif(Auth::user()->role === 'Admin'){
            // $userlist = DB::table('salary_review_metadata')
            //     ->distinct()
            //     ->get();
            // dd($userlist);
            return view('quaterly-review.index');
        }else{
            return view('home');
        }
    }
}
