<?php

namespace App\Http\Livewire;

use App\Models\BonusReviewMetadata;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReviewBoard extends Component
{
    public $headings,$headingTooltips, $query, $sortBy, $sortOptions, $perPage, $pageOptions;
    public $reviews = [];

    public function mount() {
        $this->fill([
            'query' => '',
            'sortBy' => 'user_id',
            'sortOptions' => ['user_id', 'user_name', 'sbu', 'pm'],
            'perPage' => 50,
            'pageOptions' => [15, 30, 50, 75],
            'headings' => ['ID', 'Name', 'PM', 'SBU Name', 'Performence Feedback(Previous Q)', 'Bonus Percentage(Previous Q)', 'Technical', 'Execution', 'Collaboration & Communication', 'Influence', 'Maturity', 'Score By PM', 'Score By SBU Head', 'PM Feedback', 'SBU Head Feedback'],
            'headingTooltips' => [
                'This category focuses on technical skills, including an engineer’s mastery, best practices, code reviews, code stewardship, quality & testing, design, and debugging',
                'This category focuses on the way that an engineer gets things done: planning, scoping, estimation skills, getting unstuck, taking ownership, strategic alignment, product/business understanding, and vision',
                'This category describes teamwork, communication skills, asking for and giving feedback, collaborating, and documentation',
                'This category looks at an engineer’s level of impact and influence within the organization, including leadership, knowledge sharing, mentoring, hiring, onboarding, and representation of our brand',
                'This category looks at the traits that make an engineer trustworthy and professional: accountability, self-awareness, respect, consensus building, handling conflict, and receiving feedback'
            ]
        ]);
    }

    public function render()
    {
        $reviews = BonusReviewMetadata::where('user_id', 'like', '%'.$this->query.'%')->orWhere('user_name', 'like', '%'.$this->query.'%')->orWhere('sbu', 'like', '%'.$this->query.'%')->orWhere('pm', 'like', '%'.$this->query.'%')->orderBy($this->sortBy ?? 'user_id')->get();

        if(Auth::user()->role === 'SBU'){
            $reviews = $reviews->where('sbu', Auth::user()->name);
        } else if(Auth::user()->role === 'PM') {
            $reviews = $reviews->where('pm', Auth::user()->name);
        }
        
        $this->reviews = $reviews->toArray();
        
        return view('livewire.review-board');
    }
}
