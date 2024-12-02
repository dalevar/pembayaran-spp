<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class TemplateExcelStudent implements WithMultipleSheets
{
    
    public function sheets(): array
    {
        return [
            new StudentTemplateSheet(),
            new MajorSheet()
        ];
    }
}
