<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    public function headings():array{
        return [
            'id',
            'name',
            'role',
            'email',
            'password',
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
            'eligible_salary_review',
            'eligible_bonus_review',
            'q_1_jul_sep_performance',
            'q_1_jul_sep_percentage',
            'q_2_oct_dec_performance',
            'q_2_oct_dec_percentage',
            'q_3_jan_mar_performance',
            'q_3_jan_mar_percentage',
            'promotion_22a',
            'promotion_21b',
            'promotion_21a'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return collect(User::getUser());
    }
}
