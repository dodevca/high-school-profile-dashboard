<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Major::create([
            'code'        => 'TI',
            'name'        => 'Teknik Informatika',
            'description' => 'Jurusan yang mempelajari ilmu komputer dan pemrograman.',
        ]);

        Major::create([
            'code'        => 'TKJ',
            'name'        => 'Teknik Komputer dan Jaringan',
            'description' => 'Jurusan yang fokus pada instalasi, konfigurasi, dan perawatan jaringan komputer.',
        ]);
    }
}
