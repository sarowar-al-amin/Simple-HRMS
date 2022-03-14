<?php

namespace App\Http\Controllers;

use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if(is_null(Auth::user())){
            return redirect('login');
        }
        // Initial login send you to the profile page
        return redirect('profile');
    }

    public function showChangePassword(){
        if(is_null(Auth::user())){
            return redirect('login');
        }
        // home page is responsible for changing password
        return view('home');
    }

    public function changePassword(Request $request) {

        // Before changing password confirm that it's legit user
        if(is_null(Auth::user())){
            return redirect('login');
        }

        $data = $request->validate([
            'old_password' => ['required', 'current_password'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);

        User::find(auth()->id())->update([
            'password' => Hash::make($data['password'])
        ]);

        return redirect()->route('employee-levels')->with('message', 'password successfully changed');
    }
}
