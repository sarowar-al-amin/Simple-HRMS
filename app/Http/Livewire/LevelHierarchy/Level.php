<?php

namespace App\Http\Livewire\LevelHierarchy;

use Livewire\Component;

class Level extends Component
{
    public $level;
    
    public function render()
    {
        return view('livewire.level-hierarchy.level');
    }
}
