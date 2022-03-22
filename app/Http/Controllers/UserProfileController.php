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
            if(is_null(Auth::user())){
                return redirect('login');
            }else{
                $user = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->first();
                // dd($user);
                return view('profile.index', compact('user'));
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

        // $user = new EnglishCommunicationSkill;
        // $user->user_id = Auth::user()->id;
        // $user->speaking = $request->speaking;
        // $user->writing = $request->writing;
        // $user->listening = $request->listening;
        // $user->save();
        $checker = DB::table('english_communication_skills')->where('user_id', Auth::user()->id)->first();
        dd($checker);

        // if()

        // $user = EnglishCommunicationSkill:: create([
        //     'user_id' => Auth::user()->id,
        //     'speaking' => $request->speaking,
        //     'writing' => $request->writing,
        //     'listening' => $request->listening
        // ]);
        return redirect()->back();
    }
}
