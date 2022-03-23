<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\EnglishCommunicationSkill;

class UserProfileController extends Controller
{
    //
    public function index(){
        {
            if(is_null(Auth::user())){  //Make sure the loged in user is authenticated user
                return redirect('login');
            }else{
                $user = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->first();
                // dd($user);
                $english_skills = DB::table('english_communication_skills')
                    ->where('user_id', Auth::user()->id)
                    ->first();
                // dd($english_skills);
                // If there is no data regarding this user on 'English Communication Skill' table
                // Then create a row for this user with default value.
                // And assign that to the $english_sills variable
                if(is_null($english_skills)){
                    $user = EnglishCommunicationSkill:: create([
                        'user_id' => Auth::user()->id
                    ]);

                    $english_skills = DB::table('english_communication_skills')
                        ->where('user_id', Auth::user()->id)
                        ->first();
                }
                return view('profile.index', compact('user', 'english_skills'));
            }
        }
    }

    //
    public function update_index(){
        // Don't allowed unauthorized user
        if(is_null(Auth::user())){
            return redirect('login');
        }else{
            // return "It's working";

            return view('profile.update');
        }
    }

    //
    public function update_info(Request $request){
        // Don't allow unauthoraized user
        if(is_null(Auth::user())){
            return redirect('login');
        }

        // This checker is also useless since at the begin of sign in a row for the
        // loged in user is created automatically.
        // $checker = DB::table('english_communication_skills')->where('user_id', Auth::user()->id)->first();
        // // dd($checker);

        // // Now is condition is always true so
        // // Else portion is basically useless.
        // if($checker){
        //     // if user exists then update the data
        //     DB::table('english_communication_skills')
        //         ->where('user_id', Auth::user()->id)
        //         ->update([
        //             'speaking' => $request->speaking,
        //             'writing' => $request->writing,
        //             'listening' => $request->listening
        //         ]);

        // }else{
        //     //otherwise create the data
        //     // This portion will never run since
        //     //
        //     $user = EnglishCommunicationSkill:: create([
        //         'user_id' => Auth::user()->id,
        //         'speaking' => $request->speaking,
        //         'writing' => $request->writing,
        //         'listening' => $request->listening
        //     ]);
        // }

        DB::table('english_communication_skills')
        ->where('user_id', Auth::user()->id)
        ->update([
            'speaking' => $request->speaking,
            'writing' => $request->writing,
            'listening' => $request->listening
        ]);


        return redirect()->back();
    }
}
