<?php

namespace App\Imports;

use App\Models\Tutor;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithUpserts;
class TutorImport implements ToModel, WithHeadingRow, WithBatchInserts, WithUpserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tutor([
            'nombre' => $row['tutor'],
            'email' =>$row['email_tutor']
        ]);
    }
    public function batchSize(): int
    {
        return 1000;
    }

    public function uniqueBy()
    {
        return 'nombre';
    }
}
