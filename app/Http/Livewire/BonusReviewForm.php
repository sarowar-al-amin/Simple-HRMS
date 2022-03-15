<?php

namespace App\Http\Livewire;

use App\Models\BonusReview;
use App\Models\Quarter;
use Livewire\Component;

class BonusReviewForm extends Component
{
    public $bonusReviewId, $quarterId, $bonusReviewStart, $bonusReviewEnd;

    public $quarters = [];

    protected $rules = [
        'bonusReviewId' => ['required'],
        'quarterId' => ['required'],
        'bonusReviewStart' => ['required'],
        'bonusReviewEnd' => ['required']
    ];

    public function mount() {
        $this->quarters = Quarter::all()->pluck('id')->toArray();
    }

    public function addBonusReview() {
        $this->validate();

        BonusReview::create([
            'id' => $this->bonusReviewId,
            'quarter_id' => $this->quarterId,
            'start' => $this->bonusReviewStart,
            'end' => $this->bonusReviewEnd
        ]);

        $this->emit('bonusReviewAdded');
    }

    public function render()
    {
        return view('livewire.bonus-review-form', [
            'quarters' => $this->quarters
        ]);
    }
}
