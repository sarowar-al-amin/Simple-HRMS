<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeQuarterRequest;
use App\Http\Requests\updateQuarterRequest;
use App\Models\Quarter;
use App\Models\SalaryReview;
use Illuminate\Http\Request;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class QuarterController extends Controller
{
    
    public function index()
    {
        if(Auth::user()->role === 'Admin'){
            return view('quarters-index');
        }else{
            return view('home');
        }
        
    }

    public function create()
    {
        return view('hr.quarters.create');
    }

    public function store(storeQuarterRequest $request)
    {
        Quarter::create($request->all());
        return redirect(route('quarters.index'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function show(Quarter $quarter)
    {
        //
    }

    public function edit(Quarter $quarter)
    {
        return view('hr.quarters.edit', [
            'quarter' => $quarter
        ]);
    }

    public function update(updateQuarterRequest $request, Quarter $quarter)
    {
        $quarter->update($request->all());
        return redirect(route('quarters.index'));
    }

    public function destroy(Quarter $quarter)
    {

        $quarter->delete();
        return redirect()->route('quarters.index');
    }
}
