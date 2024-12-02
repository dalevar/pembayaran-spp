<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TemplateExcelStudent;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TemplateExcelController extends Controller
{
    public function downloadTemplate()
    {
        return Excel::download(new TemplateExcelStudent, 'template-studets.xlsx');
    }
}
