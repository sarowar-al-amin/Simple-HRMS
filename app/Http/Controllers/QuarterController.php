<?php

namespace App\Http\Controllers;

use App\Models\Quarter;
use App\Models\SalaryReview;
use Illuminate\Http\Request;

class QuarterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hr.quarters.index', [
            'quarters' => Quarter::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hr.quarters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        Quarter::create($data);

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function edit(Quarter $quarter)
    {
        return view('hr.quarters.edit', [
            'quarter' => $quarter
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quarter $quarter)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
        ]);

        $quarter->update($data);

        return redirect(route('quarters.index'));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quarter  $quarter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quarter $quarter)
    {

        $quarter->delete();

        return redirect()->route('quarters.index');
    }
}
