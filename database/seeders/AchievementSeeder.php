<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::truncate();

        Achievement::create([
            'title'        => 'Lomba Robot Nasional 2025',
            'category'     => 'Ekstrakulikuler',
            'level'        => 'Nasional',
            'rank'         => 'Juara 1',
            'achieved_by'  => 'Tim Robotika SMK N 1 Seyegan',
            'achieved_at'  => '2025-06-15',
            'description'  => 'Tim Robotika SMK N 1 Seyegan berhasil meraih Juara 1 pada Lomba Robot Nasional 2025 di Jakarta.',
            'photo'        => 'achievements/robot-nasional-2025.jpg',
        ]);

        Achievement::create([
            'title'        => 'Olimpiade Matematika Provinsi DIY',
            'category'     => 'Murid',
            'level'        => 'Provinsi',
            'rank'         => 'Juara 2',
            'achieved_by'  => 'Anisa Rahma (XI TKJ)',
            'achieved_at'  => '2025-05-10',
            'description'  => 'Anisa Rahma dari kelas XI TKJ meraih Juara 2 pada Olimpiade Matematika tingkat Provinsi DIY.',
            'photo'        => 'achievements/olimpiade-matematika-diy-2025.jpg',
        ]);
    }
}
