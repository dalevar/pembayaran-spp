<?php

namespace Database\Seeders;

use App\Models\AcademicYear;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicYear::create([
            'year_start' => '2022',
            'year_end' => '2023',
            'description' => '2022 - 2023',
            'status' => 'inactive'
        ]);
        AcademicYear::create([
            'year_start' => '2023',
            'year_end' => '2024',
            'description' => '2023 - 2024',
            'status' => 'inactive'
        ]);
        AcademicYear::create([
            'year_start' => '2024',
            'year_end' => '2025',
            'description' => '2024 - 2025',
            'status' => 'active'
        ]);
    }
}
