<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            'Rekayasa Perangkat Lunak',
            'Desain Komunikasi Visual',
            'Tata Kecantikan Kulit dan Rambut',
            'Farmasi Klinis dan Komunitas'
        ];
        
        $grades = ['X', 'XI', 'XII'];

        // Loop through each major and create classrooms for each grade level
        foreach ($majors as $majorName) {
            $major = Major::where('name', $majorName)->first();

            // Check if the major exists
            if ($major) {
                foreach ($grades as $grade) {
                    Classroom::create([
                        'name' => $grade,
                        'major_id' => $major->id,
                    ]);
                }
            } else {
                echo "Major $majorName not found.\n";
            }
        }
    }
}
