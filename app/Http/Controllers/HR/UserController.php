<?php

namespace App\Http\Controllers\HR;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserMetadata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('hr.employees.index', [
            'employees' => User::all()
        ]);
    }

    public function create()
    {
        return view('hr.employees.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'id' => ['required'],
            'role' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'sbu' => ['required'],
            'joining_date' => ['required'],
            'confirmation_date' => ['required'],
            'career_start_date' => ['required'],
            'expertise' => ['required'],
            'partner' => ['required'],
            'employee_type' => ['required'],
            'managerial_capacity' => ['required'],
            'hr' => ['required'],
            'employee_category' => ['required'],
            'project_manager' => ['required'],
            'blood_group' => ['required'],
            'designation' => ['required'],
            'level' => ['required'],
            'project_name' => ['required']
        ]);

        User::create([
            'id' => $data['id'],
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'sbu' => $data['sbu'],
            'joining_date' => $data['joining_date'],
            'confirmation_date' => $data['confirmation_date'],
            'career_start_date' => $data['career_start_date']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'expertise',
            'value' => $data['expertise']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'partner',
            'value' => $data['partner']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'employee_type',
            'value' => $data['employee_type']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'managerial_capacity',
            'value' => $data['managerial_capacity']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'hr',
            'value' => $data['hr']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'employee_category',
            'value' => $data['employee_category']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'project_manager',
            'value' => $data['project_manager']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'blood_group',
            'value' => $data['blood_group']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'designation',
            'value' => $data['designation']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'level',
            'value' => $data['level']
        ]);

        UserMetadata::create([
            'user_id' => $data['id'],
            'key' => 'project_name',
            'value' => $data['project_name']
        ]);
        
        return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        return view('hr.employees.edit', [
            'employee' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'id' => ['required'],
            'role' => ['required'],
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
            'sbu' => ['required'],
            'joining_date' => ['required'],
            'confirmation_date' => ['required'],
            'career_start_date' => ['required']
        ]);

        

        $user->update([
            'id' => $data['id'],
            'role' => $data['role'],
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'sbu' => $data['sbu'],
            'joining_date' => $data['joining_date'],
            'confirmation_date' => $data['confirmation_date'],
            'career_start_date' => $data['career_start_date']
        ]);


        return redirect(route('users.index'));
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('users.index'));
    }
}
