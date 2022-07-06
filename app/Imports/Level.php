<?php

namespace App\Imports;

use App\Models\EmployeeLevel;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\RegistersEventListeners;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Events\AfterImport;
use Maatwebsite\Excel\Validators\Failure;
use Throwable;
class Level implements
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
                EmployeeLevel::upsert(
                [
                    'id' => $row['id'],
                    'next_level' => $row['next_level'],
                    'rank' => $row['rank'],
                    'basic' => $row['basic'],
                    'increment' => $row['increment'],
                    'gross' => $row['gross'],
                    'objective_details'  => $row['objective_details'],
                    'summary_details'  => $row['summary_details'],
                    'knowledge_details'  => $row['knowledge_details'],
                    'independence_details'  => $row['independence_details'],
                    'influence_details'  => $row['influence_details'],
                    'organizational_scope_details'  => $row['organizational_scope_details'],
                    'job_contrast_details'  => $row['job_contrast_details'],
                    'execution_details'  => $row['execution_details'],
                    'knowledge_questions'  => $row['knowledge_questions'],
                    'independence_questions'  => $row['independence_questions'],
                    'influence_questions'  => $row['influence_questions'],
                    'organizational_scope_questions'  => $row['organizational_scope_questions'],
                    'job_contrast_questions'  => $row['job_contrast_questions'],
                    'execution_questions'  => $row['execution_questions']
                ],
                
                [
                    'next_level' => $row['next_level'],
                    'rank' => $row['rank'],
                    'basic' => $row['basic'],
                    'increment' => $row['increment'],
                    'gross' => $row['gross'],
                    'objective_details'  => $row['objective_details'],
                    'summary_details'  => $row['summary_details'],
                    'knowledge_details'  => $row['knowledge_details'],
                    'independence_details'  => $row['independence_details'],
                    'influence_details'  => $row['influence_details'],
                    'organizational_scope_details'  => $row['organizational_scope_details'],
                    'job_contrast_details'  => $row['job_contrast_details'],
                    'execution_details'  => $row['execution_details'],
                    'knowledge_questions'  => $row['knowledge_questions'],
                    'independence_questions'  => $row['independence_questions'],
                    'influence_questions'  => $row['influence_questions'],
                    'organizational_scope_questions'  => $row['organizational_scope_questions'],
                    'job_contrast_questions'  => $row['job_contrast_questions'],
                    'execution_questions'  => $row['execution_questions']
                ]
            );
            
        }
    }

    public function rules(): array
    {
        // return [
        //     '*.id' => ['id', 'unique:employee_levels,id']
        // ];
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
