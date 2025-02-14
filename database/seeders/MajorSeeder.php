<?php

namespace Database\Seeders;

use App\Models\Major;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::create(['name' => 'Rekayasa Perangkat Lunak']);
        Major::create(['name' => 'Desain Komunikasi Visual']);
        Major::create(['name' => 'Tata Kecantikan Kulit dan Rambut']);
        Major::create(['name' => 'Farmasi Klinis dan Komunitas']);
    }
}
