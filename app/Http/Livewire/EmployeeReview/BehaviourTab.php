<?php

namespace App\Http\Livewire\EmployeeReview;

use Livewire\Component;

class BehaviourTab extends Component
{
    public $fields = [
        'Has ability to meet deadline',
        'Is committed',
        'Organize tasks properly',
        'Exploring Ability',
        'Client happiness',
        'Communication skill',
        'Has sense of urgency',
        'Team player'
    ];

    public function render()
    {
        return view('livewire.employee-review.behaviour-tab');
    }
}
