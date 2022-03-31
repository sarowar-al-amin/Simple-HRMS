<?php

namespace App\Exports;

// use App\Models\BonusReviewMetadata;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BonusReviewTemplate implements FromCollection, WithHeadings
{
    public function headings():array{
        return [
            'id',
            'name',
            // 'user_name',
            'sbu_name',
            'pm',
            'performance_feedback',
            'percentage'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Salary::all();
        return collect();
    }
}
