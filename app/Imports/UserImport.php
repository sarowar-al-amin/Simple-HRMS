<?php


namespace App\Imports;


use App\Models\User;
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
            $user = User::create([
                'id' => $row['id'],
                'name' => $row['name'],
                'email' => $row['email'],
                'role' => $row['role'],
                'password' => $row['password'],
                'state' => $row['state'],
                'expertise_area' => $row['expertise_area'],
                'employee_type' => $row['employee_type'],
                'managerial_capacity' => $row['managerial_capacity'],
                'employee_category' => $row['employee_category'],
                'designation' => $row['designation'],
                'level' => $row['level'],
                'partner' => $row['partner'],
                'sbu' => $row['sbu'],
                'hr' => $row['hr'],
                'mm' => $row['mm'],
                'team' => $row['team'],
                'previous_team' => $row['previous_team'],
                'joining_date' => $row['joining_date'],
                'confirmation_date' => $row['confirmation_date'],
                'career_start_date' => $row['career_start_date'],
                'blood_group' => $row['blood_group'],
                'engagement' => $row['engagement'],
                'last_performance' => $row['last_performance'],
                'last_review' => $row['last_review'],
                'comments' => $row['comments'],
                'plan_1' => $row['plan_1'],
                'plan_2' => $row['plan_2'],
                'current_status' => $row['current_status'],
                'available_from' => $row['available_from'],
            ]);
        }
    }
    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:users,email']
        ];
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
