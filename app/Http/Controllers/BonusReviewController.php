<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusReviewController extends Controller
{
    public function index()
    {
        if(is_null(Auth::user())){
            return redirect('login');
        }elseif(Auth::user()->role === 'Admin'){
            return view('bonus-reviews-index');
        }else{
            return view('home');
        }
    }
}
