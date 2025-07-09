<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Module;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module::truncate();

        for($i = 1; $i <= 22; $i++) {
            Module::create([
                'title'        => "Modul Pembelajaran {$i}",
                'description'  => "Deskripsi singkat untuk modul pembelajaran nomor {$i}.",
                'file'         => 'modules/example.pdf',
                'cover'        => null,
                'grade_level'  => rand(10, 12),
                'major_id'     => rand(1, 7),
                'subject'      => "Mata Pelajaran {$i}",
                'semester'     => $i % 2 === 1 ? 'Ganjil' : 'Genap',
            ]);
        }
    }
}