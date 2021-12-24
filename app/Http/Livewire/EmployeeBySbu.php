<?php

namespace App\Http\Livewire;

use Livewire\Component;
use DB;
use App\Models\User;

class EmployeeBySbu extends Component
{
    public $sbus;
    public $sbu;
    public $field;
    public $index;
    public $employees = [];

    // public function mount(){
    //     $this->sbus = DB::table('users')
    //                     ->distinct()
    //                     ->pluck('sbu');
                       
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
      
        $this->employees = User::all()
                ->where('sbu', $this->sbu)
                ->toArray();
        // dd($this->employees);
        $this->sbus = DB::table('users')
                        ->distinct()
                        ->pluck('sbu');

        return view('livewire.employee-by-sbu', [
            'employees' => $this->employees,
            'sbus' => $this->sbus
        ]);
    }
}
