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
            return view('bonus-reviews', [
                'headings' => ['ID', 'Name', 'PM', 'SBU Name', 'Performence Feedback(Previous Q)', 'Bonus Percentage(Previous Q)', 'Technical', 'Execution', 'Collaboration & Communication', 'Influence', 'Maturity', 'Score By PM', 'Score By SBU Head', 'PM Feedback', 'SBU Head Feedback']
            ]);
        }else{
            return view('home');
        }
    }
}
