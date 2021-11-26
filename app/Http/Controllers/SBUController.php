<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SBUController extends Controller
{
    public function index()
    {
        return view('hr.sbus.index', [
            'sbus' => ['Raisul Islam', 'Miftah Zaman']
        ]);
    }

    public function show($name)
    {
        return view('hr.sbus.show', [
            'employees' => User::where('sbu', $name)->get()
        ]);
    }
}
