<?php

namespace App\Http\Livewire;
use Livewire\Component;
use Livewire\WithPagination;

use App\Models\SalaryReviewMetadata;
use App\Models\User;


// use Livewire\Component;

class ReviewedEmployee extends Component
{
    use WithPagination;

    public $perPage = 10;
    public $search = '';
    public $orderBy = 'id';
    public $orderAsc = true;
    public function render()
    {
        $employees = User::get();
        // dd($employee);
        return view('livewire.reviewed-employee', [
            'users' => SalaryReviewMetadata::search($this->search)
                    ->orderBy($this->orderBy, $this->orderAsc ? 'asc' : 'desc')
                    ->simplePaginate($this->perPage),
            'employee' => $employees,
        ]);
    }
}
