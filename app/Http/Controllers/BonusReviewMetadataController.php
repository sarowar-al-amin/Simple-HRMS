<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusReviewMetadataController extends Controller
{
    public function index() {
        if(is_null(Auth::user())){
            return redirect('login');
        }elseif(Auth::user()->role === 'Admin'){
            return view('bonus-reviews');
        }else{
            return view('home');
        }
    }
}
