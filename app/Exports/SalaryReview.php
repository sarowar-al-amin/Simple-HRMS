<?php

namespace App\Exports;

use App\Models\Salary;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalaryReview implements FromCollection, WithHeadings
{
    public function headings():array{
        return [
            'salary_review_id',
            'user_id', 
            // 'user_name', 
            'performance', 
            'promotion', 
            'sbu_comment'
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Salary::all();
        return collect(Salary::getReview());
    }
}
