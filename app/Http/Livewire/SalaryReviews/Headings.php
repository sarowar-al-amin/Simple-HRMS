<?php

namespace App\Http\Livewire\SalaryReviews;

use Livewire\Component;

class Headings extends Component
{
    public $headings = ['ID', 'Quarter', 'Start', 'End', 'Actions'];

    public function render()
    {
        return view('livewire.salary-reviews.headings');
    }
}
