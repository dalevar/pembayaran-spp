<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{
    public function sheetName(): string
    {
        return 'Worksheet';
    }

    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        foreach ($collection as $index => $row) {
            if ($index === 0) continue;

            Student::create([
                'student_id' => $row[0],
                'name' => $row[1],
                'address' => $row[2],
                'gender' => $row[3],
                'parents' => $row[4],
                'major_id' => $row[5],
                'year' => $row[6]
            ]);
        }
    }
}
