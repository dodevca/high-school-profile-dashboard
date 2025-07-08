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
        Teacher::create([
            'name'     => 'Drs. Deden, M.Pd',
            'position' => 'Wakil Kepala Sekolah',
            'nip'      => '196501011990031001',
            'priority' => 1,
            'photo'    => 'teacher/ahmad-fauzi.jpg',
            'subject'  => 'Manajemen Pendidikan',
        ]);

        Teacher::create([
            'name'     => 'Rancob, S.Pd',
            'position' => 'Guru',
            'nip'      => '197203152000122002',
            'priority' => 2,
            'photo'    => 'teacher/siti-aisyah.jpg',
            'subject'  => 'Matematika',
        ]);
    }
}
