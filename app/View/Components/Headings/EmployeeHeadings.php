<?php

namespace App\View\Components\Headings;

use Illuminate\View\Component;

class EmployeeHeadings extends Component
{
    public $headings = ['ID', 'Name', 'Email', 'SBU', 'Actions'];

    public function __construct()
    {
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.headings.employee-headings');
    }
}
