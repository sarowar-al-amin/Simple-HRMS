<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersImportTemplateExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return [
            'id',
            'name',
            'role',
            'email',
            // 'password',
            'expertise_area',
            'employee_type',
            'managerial_capacity',
            'employee_category',
            'designation',
            'level',
            'partner',
            'sbu',
            'hr',
            'pm',
            'team',
            // 'eligible_salary_review',
            'eligible_bonus_review',
            // 'q1_jul_sep_performance',
            // 'q1_jul_sep_percentage',
            // 'q2_oct_dec_performance',
            // 'q2_oct_dec_percentage',
            // 'q3_jan_mar_performance',
            // 'q3_jan_mar_percentage',
            // 'promotion_22a',
            // 'promotion_21b',
            // 'promotion_21a'
            'q_4_april_jun_performance',
            'q_4_april_jun_percentage',
            'promotion_22b',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return collect();
    }
}
