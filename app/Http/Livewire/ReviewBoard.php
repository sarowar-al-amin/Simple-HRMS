<?php

namespace App\Http\Livewire;

use App\Models\BonusReviewMetadata;
use Livewire\Component;

class ReviewBoard extends Component
{
    public $headings, $query, $sortBy, $sortOptions, $perPage, $pageOptions;
    public $reviews = [];

    public function mount() {
        $this->fill([
            'query' => '',
            'sortBy' => 'user_id',
            'sortOptions' => ['user_id', 'user_name', 'sbu', 'pm'],
            'perPage' => 50,
            'pageOptions' => [15, 30, 50, 75],
            'headings' => ['ID', 'Name', 'PM', 'SBU Name', 'Performence Feedback(Previous Q)', 'Bonus Percentage(Previous Q)', 'Technical', 'Execution', 'Collaboration & Communication', 'Influence', 'Maturity', 'Score By PM', 'Score By SBU Head', 'PM Feedback', 'SBU Head Feedback']
        ]);
    }

    public function render()
    {
        $this->reviews = BonusReviewMetadata::where('user_id', 'like', '%'.$this->query.'%')->orWhere('user_name', 'like', '%'.$this->query.'%')->orWhere('sbu', 'like', '%'.$this->query.'%')->orWhere('pm', 'like', '%'.$this->query.'%')->orderBy($this->sortBy)->get()->toArray();
        return view('livewire.review-board');
    }
}
