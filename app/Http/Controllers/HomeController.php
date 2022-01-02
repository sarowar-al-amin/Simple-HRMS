<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function changePassword(Request $request) {

        $data = $request->validate([
            'old_password' => ['required', 'current_password'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password']
        ]);

        User::find(auth()->id())->update([
            'password' => Hash::make($data['password'])
        ]);

        return view('auth.login');
    }
}
