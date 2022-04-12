<?php

namespace App\Exports;

use App\Models\BonusReviewMetadata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BonusReviewExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return [
            'id',
            'name',
            'sbu name',
            'pm',
            'team',
            'technical',
            'execution',
            'collaboration & communication',
            'influence',
            'maturity',
            'sbu_score',
            'pm_score',
            'sbu_feedback',
            'pm_feedback',
            'approval'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return collect(BonusReviewMetadata::getReview());
    }
}
