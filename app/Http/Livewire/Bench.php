<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use DB;

class Bench extends Component
{
    public $employees = [];
    public $field;
    public $index;   

    // public function mount(){
    //     $this->employees = DB::table('users')
    //     ->where('team', 'bench')
    //     ->orderBy('sbu')
    //     ->get()
    //     ->toArray();
    // }

    protected $rules = [
        'employees.*.name' => 'required',
        'employees.*.email' => 'required'
    ];

    protected $validationAttributes = [
        'employees.*.name' => 'name',
        'employees.*.email' => 'email'
    ];

    public function save($idx) {
        $this->validate();

        $employee = $this->employees[$idx] ?? NULL;

        if(! is_null($employee)) {
            User::find($employee['id'])?->update($employee);
        }

        $this->index = null;
        $this->field = null;
    }

    public function delete($idx) {
        $employee = $this->employees[$idx] ?? NULL;

        if(! is_null($employee)) {
            User::find($employee['id'])?->delete();
        }
    }

    public function render()
    {
        // $this->employees = User::all()
        //             ->where('team', 'bench')
        //             ->toArray();
        // dd($this->employees);
        // $employees = 
        // dd($this->employees);
        $this->employees = DB::table('users')
                    ->where('team', 'bench')
                    ->orderBy('sbu')
                    ->get()
                    ->toArray();

        return view('livewire.bench', ['employees' => $this->employees]);
    }
}
