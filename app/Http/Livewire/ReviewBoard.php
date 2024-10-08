<?php

namespace App\Http\Livewire;

use App\Models\BonusReviewMetadata;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReviewBoard extends Component
{
    public $headingTooltips, $query, $sortBy, $dir, $sortOptions, $perPage, $pageOptions;
    public $reviews = [];

    public function mount() {
        $this->fill([
            'query' => '',
            'sortBy' => 'user_id',
            'dir' => 'asc',
            'sortOptions' => ['user_id', 'user_name', 'sbu', 'pm'],
            'perPage' => 50,
            'pageOptions' => [15, 30, 50, 75],
            'headingTooltips' => [
                'This category focuses on technical skills, including an engineer’s mastery, best practices, code reviews, code stewardship, quality & testing, design, and debugging',
                'This category focuses on the way that an engineer gets things done: planning, scoping, estimation skills, getting unstuck, taking ownership, strategic alignment, product/business understanding, and vision',
                'This category describes teamwork, communication skills, asking for and giving feedback, collaborating, and documentation',
                'This category looks at an engineer’s level of impact and influence within the organization, including leadership, knowledge sharing, mentoring, hiring, onboarding, and representation of our brand',
                'This category looks at the traits that make an engineer trustworthy and professional: accountability, self-awareness, respect, consensus building, handling conflict, and receiving feedback'
            ]
        ]);
    }

    public function order($field) {
        $this->dir = $this->sortBy === $field && $this->dir === 'asc' ? 'desc' : 'asc';
        $this->sortBy = $field;
    }

    public function render()
    {
        $reviews = BonusReviewMetadata::where('user_id', 'like', '%'.$this->query.'%')->orWhere('user_name', 'like', '%'.$this->query.'%')->orWhere('sbu', 'like', '%'.$this->query.'%')->orWhere('pm', 'like', '%'.$this->query.'%')->orderBy($this->sortBy, $this->dir)->get();

        if(Auth::user()->role === 'SBU'){
            $reviews = $reviews->where('sbu', Auth::user()->name);
        } else if(Auth::user()->role === 'PM') {
            $reviews = $reviews->where('pm', Auth::user()->name);
        }
        
        $this->reviews = $reviews->toArray();
        
        return view('livewire.review-board');
    }
}
