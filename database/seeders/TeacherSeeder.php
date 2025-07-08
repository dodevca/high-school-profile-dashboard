<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::truncate();

        Teacher::create([
            'name'     => 'Ahmad Enggar Okta, M.Pd',
            'position' => 'Kepala Sekolah',
            'nip'      => '197002151995031002',
            'priority' => 0,
            'photo'    => 'teachers/1.png',
            'subject'  => 'Administrasi Pendidikan',
        ]);

        Teacher::create([
            'name'     => 'Drs. Deden Santoso, M.Pd',
            'position' => 'Wakil Kepala Sekolah',
            'nip'      => '196501011990031001',
            'priority' => 1,
            'photo'    => 'teachers/5.png',
            'subject'  => 'Manajemen Pendidikan',
        ]);

        Teacher::create([
            'name'     => 'Siti Gemilang, S.Pd',
            'position' => 'Guru',
            'nip'      => '198005102010022003',
            'priority' => 2,
            'photo'    => 'teachers/6.png',
            'subject'  => 'Matematika',
        ]);

        Teacher::create([
            'name'     => 'Gilang Santoso, S.Pd',
            'position' => 'Guru',
            'nip'      => '198507232012042004',
            'priority' => 2,
            'photo'    => 'teachers/7.png',
            'subject'  => 'Bahasa Inggris',
        ]);
    }
}
