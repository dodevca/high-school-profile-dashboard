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

        Module::create([
            'title'       => 'Modul Dasar Pemrograman',
            'description' => 'Modul ini membahas dasar-dasar pemrograman menggunakan bahasa PHP.',
            'file'        => 'modules/basis-pemrograman.pdf',
            'cover'       => 'covers/basis-pemrograman.jpg',
            'grade_level' => '10',
            'major_id'    => 1,
            'subject'     => 'Pemrograman',
            'semester'    => 'Ganjil',
        ]);

        Module::create([
            'title'       => 'Modul Jaringan Komputer',
            'description' => 'Materi lengkap tentang konsep dasar dan konfigurasi jaringan komputer.',
            'file'        => 'modules/jaringan-komputer.pdf',
            'cover'       => 'covers/jaringan-komputer.jpg',
            'grade_level' => '11',
            'major_id'    => 2,
            'subject'     => 'Jaringan',
            'semester'    => 'Genap',
        ]);
    }
}