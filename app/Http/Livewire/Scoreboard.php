<?php

namespace App\Http\Livewire;

use DB;

use Livewire\Component;

class Scoreboard extends Component
{
    public function render()
    {
        $employees = DB::table('users')->get();
        return view('livewire.scoreboard',compact('employees'));
    }
}
