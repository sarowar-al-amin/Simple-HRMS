<?php

namespace App\Http\Livewire;

use App\Models\BonusReview;
use App\Models\Quarter;
use Livewire\Component;

class BonusReviews extends Component
{
    public $index = null;
    public $field = null;
    public $bonusReviews = [];
    public $quarters;

    public function mount() {
        $this->quarters = Quarter::all()->pluck('id')->toArray();
    }

    protected $listeners = [
        'bonusReviewAdded' => 'foo'
    ];

    protected $rules = [
        'bonusReviews.*.id' => 'required',
    ];

    protected $validationAttributes = [
        'bonusReviews.*.id' => 'id',
    ];

    public function foo(){
        $this->bonusReviews = BonusReview::all()->toArray();
    }

    public function edit($idx, $field) {
        $this->field = $idx.'.'.$field ;
    }

    public function save($idx, $field) {
        $this->validate();

        $bonusReview = $this->bonusReviews[$idx] ?? NULL;

        if(! is_null($bonusReview)) {
            BonusReview::find($bonusReview['id'])?->update([
                $field => $bonusReview[$field]
            ]);
        }

        $this->index = null;
        $this->field = null;
    }

    public function delete($idx) {
        $bonusReview = $this->bonusReviews[$idx] ?? NULL;

        if(! is_null($bonusReview)) {
            BonusReview::find($bonusReview['id'])?->delete();
        }
    }

    public function render()
    {
        $this->bonusReviews = BonusReview::all()->toArray();

        return view('livewire.bonus-reviews', [
            'bonusReviews' => $this->bonusReviews,
            'quarters' => $this->quarters
        ]);
    }
}
