<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentTemplateSheet implements WithHeadings
{
    /**
     * Definition Header column for template
     */
    public function headings(): array
    {
        return [
            'NIS',
            'Nama Lengkap',
            'Alamat',
            'Jenis Kelamin (L/P)',
            'HP/WA Ortu',
            'Kode Jurusan',
            'Tahun Masuk'
        ];
    }

    /**
     * first data for template
     */
    public function array(): array
    {
        return [

        ];
    }
}
