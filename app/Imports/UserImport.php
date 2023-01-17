<?php


namespace App\Imports;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use Illuminate\Support\Facades\Hash;

use Throwable;

// use Illuminate\Support\Collection;
// use Maatwebsite\Excel\Concerns\ToCollection;

class UserImport implements 
    ToCollection,
    WithHeadingRow,
    SkipsOnError,
    WithValidation,
    SkipsOnFailure,
    WithChunkReading,
    ShouldQueue,
    WithEvents
{
    use Importable, SkipsErrors, SkipsFailures, RegistersEventListeners;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        //
        foreach ($rows as $row) {
            User::upsert(
                [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'email' => $row['email'],
                    // 'role' => $row['role'],
                    // 'password' => Hash::make('password'),
                    // 'expertise_area' => $row['expertise_area'],
                    // 'employee_type' => $row['employee_type'],
                    // 'managerial_capacity' => $row['managerial_capacity'],
                    // 'employee_category' => $row['employee_category'],
                    // 'designation' => $row['designation'],
                    // 'level' => $row['level'],
                    // 'partner' => $row['partner'],
                    // 'sbu' => $row['sbu'],
                    // 'hr' => $row['hr'],
                    // 'pm' => $row['pm'],
                    // 'team' => $row['team'],
                    // 'eligible_salary_review' => $row['eligible_salary_review'],
                    // 'eligible_bonus_review' => $row['eligible_bonus_review'],
                    // // 'q_1_jul_sep_performance' => $row['q1_jul_sep_performance'],
                    // // 'q_1_jul_sep_percentage' => $row['q1_jul_sep_percentage']*100,
                    // // 'q_2_oct_dec_performance' => $row['q2_oct_dec_performance'],
                    // // 'q_2_oct_dec_percentage' => $row['q2_oct_dec_percentage']*100,
                    // // 'q_3_jan_mar_performance' => $row['q3_jan_mar_performance'],
                    // // 'q_3_jan_mar_percentage' => $row['q3_jan_mar_percentage']*100,
                    // // 'promotion_22a' => $row['promotion_22a'],
                    // // 'promotion_21b' => $row['promotion_21b'],
                    // // 'promotion_21a' => $row['promotion_21a'],
                    // // 'q_4_april_jun_performance' => $row['q_4_april_jun_performance'],
                    // // 'q_4_april_jun_percentage' => $row['q_4_april_jun_percentage']*100,
                    // // 'promotion_22b' => $row['promotion_22b'],
                    'career_start_date' => $row['career_start_date'],
                    'experience' => $row['experience']

                ],
                [

                    // 'name' => $row['name'],
                    // 'email' => $row['email'],
                    // 'role' => $row['role'],
                    // // 'password' => Hash::make('password'),
                    // 'expertise_area' => $row['expertise_area'],
                    // 'employee_type' => $row['employee_type'],
                    // 'managerial_capacity' => $row['managerial_capacity'],
                    // 'employee_category' => $row['employee_category'],
                    // 'designation' => $row['designation'],
                    // 'level' => $row['level'],
                    // 'partner' => $row['partner'],
                    // 'sbu' => $row['sbu'],
                    // 'hr' => $row['hr'],
                    // 'pm' => $row['pm'],
                    // 'team' => $row['team'],
                    // 'eligible_salary_review' => $row['eligible_salary_review'],
                    // 'eligible_bonus_review' => $row['eligible_bonus_review'],
                    // // 'q_1_jul_sep_performance' => $row['q1_jul_sep_performance'],
                    // // 'q_1_jul_sep_percentage' => $row['q1_jul_sep_percentage']*100,
                    // // 'q_2_oct_dec_performance' => $row['q2_oct_dec_performance'],
                    // // 'q_2_oct_dec_percentage' => $row['q2_oct_dec_percentage']*100,
                    // // 'q_3_jan_mar_performance' => $row['q3_jan_mar_performance'],
                    // // 'q_3_jan_mar_percentage' => $row['q3_jan_mar_percentage']*100,
                    // // 'promotion_22a' => $row['promotion_22a'],
                    // // 'promotion_21b' => $row['promotion_21b'],
                    // // 'promotion_21a' => $row['promotion_21a'],
                    // // 'q_4_april_jun_performance' => $row['q_4_april_jun_performance'],
                    // // 'q_4_april_jun_percentage' => $row['q_4_april_jun_percentage']*100,
                    // // 'promotion_22b' => $row['promotion_22b'],
                    'career_start_date' => $row['career_start_date'],
                    'experience' => $row['experience'],

                ]
            );
        }
    }
    public function rules(): array
    { 
        return [];
    }


    public function chunkSize(): int
    {
        return 1000;
    }

    public static function afterImport(AfterImport $event)
    {
    }

    public function onFailure(Failure ...$failure)
    {
    }
}
