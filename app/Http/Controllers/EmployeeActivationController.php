<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use DB;

class EmployeeActivationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(is_null(Auth::user())){
          
            return redirect('login');
        }
        elseif(Auth::user()->role === 'Admin'){
            // echo"Here will be the activation form";
            return view('employee-activation.index');
        }
        else{
            redirect()->back()->with('flash', 'Sorry! you are not allowed to modify.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $users = User::where('state', 'inactive')->get();
        return $users;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        // echo $request->id." ".$request->state;
        if(is_null(Auth::user())){
          
            return redirect('login');
        }
        elseif(Auth::user()->role === 'Admin'){

           
            $user = User::where('id', $request->id)->first();
            $user->state = $request->state;
            $user->save();
            // dd($user->state);
            return redirect()->route('activation.index')->with('flash2', `successfully!`);

        }
        else{
            return redirect()->route('activation.index')->with('flash2', 'Sorry! you are not allowed to modify.');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
