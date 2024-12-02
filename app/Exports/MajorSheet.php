<?php

namespace App\Exports;

use App\Models\Major;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class MajorSheet implements FromCollection, WithHeadings
{
    /**
     * Definition Header column for template
     */
    public function headings(): array
    {
        return [
            'ID Jurusan',
            'Nama Jurusan'
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Major::select('id', 'name')->get();
    }
}
