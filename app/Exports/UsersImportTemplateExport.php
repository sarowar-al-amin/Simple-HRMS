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
            'password',
            'state',
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
            'mm',
            'team',
            'previous_team',
            'joining_date',
            'confirmation_date',
            'career_start_date',
            'experience',
            'blood_group',
            'engagement',
            'last_performance',
            'second_last_performance',
            'last_promotion',
            'second_last_promotion',
            //'eligibility',
            'comments',
            'eligible_salary_review',
            'eligible_bonus_review',
            'plan_1',
            'plan_2',
            'current_status',
            'available_from'
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
