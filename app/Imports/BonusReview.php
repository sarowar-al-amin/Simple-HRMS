<?php

namespace App\Imports;

use App\Models\BonusReviewMetadata;
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

class BonusReview implements
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
            $user = BonusReviewMetadata::create([
                'user_id' => $row['id'],
                'user_name' => $row['name'],
                'sbu' => $row['sbu_name'],
                'pm' => $row['pm'],
                'performance' => $row['performance_feedback'],
                'bonus_percentage' => $row['bonus_percentage'],
            ]);
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
