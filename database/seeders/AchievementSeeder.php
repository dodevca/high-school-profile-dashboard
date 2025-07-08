<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Achievement;
use Carbon\Carbon;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::truncate();

        $data = [
            [
                'title'       => 'Juara 1 Lomba Matematika Nasional',
                'category'    => 'Ekstrakulikuler',
                'level'       => 'Nasional',
                'rank'        => 'Juara 1',
                'achieved_by' => 'Tim OSN',
                'achieved_at' => Carbon::create(2024, 8, 15),
                'description' => 'Prestasi gemilang di bidang matematika tingkat nasional.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Juara 2 Lomba Tari Tradisional',
                'category'    => 'Ekstrakulikuler',
                'level'       => 'Provinsi',
                'rank'        => 'Juara 2',
                'achieved_by' => 'Grup Tari Sekolah',
                'achieved_at' => Carbon::create(2024, 5, 20),
                'description' => 'Penampilan tari tradisional terbaik di tingkat provinsi.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Penghargaan Sekolah Adiwiyata',
                'category'    => 'Sekolah',
                'level'       => 'Nasional',
                'rank'        => 'Terpilih',
                'achieved_by' => 'SMK N 1 Seyegan',
                'achieved_at' => Carbon::create(2023, 11, 10),
                'description' => 'Sekolah terpilih program adiwiyata nasional.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Juara Harapan Lomba Karya Tulis',
                'category'    => 'Murid',
                'level'       => 'Kabupaten/Kota',
                'rank'        => 'Juara Harapan',
                'achieved_by' => 'Siswa A',
                'achieved_at' => Carbon::create(2024, 2, 5),
                'description' => 'Karya tulis ilmiah tentang teknologi informasi.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Juara 3 Catur Antar Sekolah',
                'category'    => 'Ekstrakulikuler',
                'level'       => 'Kabupaten/Kota',
                'rank'        => 'Juara 3',
                'achieved_by' => 'Tim Catur',
                'achieved_at' => Carbon::create(2024, 3, 12),
                'description' => 'Persaingan ketat di kejuaraan catur antar sekolah.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Guru Teladan Tingkat Provinsi',
                'category'    => 'Guru',
                'level'       => 'Provinsi',
                'rank'        => 'Juara 1',
                'achieved_by' => 'Bapak/Ibu Guru',
                'achieved_at' => Carbon::create(2023, 9, 30),
                'description' => 'Penghargaan guru teladan di tingkat provinsi.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Penghargaan Sekolah Sehat',
                'category'    => 'Sekolah',
                'level'       => 'Kabupaten/Kota',
                'rank'        => 'Terpilih',
                'achieved_by' => 'SMK N 1 Seyegan',
                'achieved_at' => Carbon::create(2023, 6, 18),
                'description' => 'Sekolah dengan program hidup sehat terbaik.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Juara 1 Lomba Poster Lingkungan',
                'category'    => 'Ekstrakulikuler',
                'level'       => 'Sekolah',
                'rank'        => 'Juara 1',
                'achieved_by' => 'Siswa B',
                'achieved_at' => Carbon::create(2024, 1, 25),
                'description' => 'Poster kreatif tentang pelestarian lingkungan.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Juara 2 Lomba Debat Bahasa Inggris',
                'category'    => 'Murid',
                'level'       => 'Nasional',
                'rank'        => 'Juara 2',
                'achieved_by' => 'Tim Debat',
                'achieved_at' => Carbon::create(2024, 4, 8),
                'description' => 'Debat bahasa Inggris tingkat nasional.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Juara 1 Lomba Fotografi',
                'category'    => 'Ekstrakulikuler',
                'level'       => 'Kabupaten/Kota',
                'rank'        => 'Juara 1',
                'achieved_by' => 'Siswa C',
                'achieved_at' => Carbon::create(2023, 12, 2),
                'description' => 'Fotografi terbaik tentang keindahan kabupaten.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Penghargaan Tenaga Kependidikan Berprestasi',
                'category'    => 'Guru',
                'level'       => 'Nasional',
                'rank'        => 'Terpilih',
                'achieved_by' => 'Staff TU',
                'achieved_at' => Carbon::create(2023, 8, 14),
                'description' => 'Tenaga kependidikan berprestasi di tingkat nasional.',
                'photo'       => 'achievements/placeholder.webp',
            ],
            [
                'title'       => 'Juara 3 Lomba Paduan Suara',
                'category'    => 'Ekstrakulikuler',
                'level'       => 'Provinsi',
                'rank'        => 'Juara 3',
                'achieved_by' => 'Paduan Suara Sekolah',
                'achieved_at' => Carbon::create(2024, 3, 28),
                'description' => 'Kelompok paduan suara terbaik di provinsi.',
                'photo'       => 'achievements/placeholder.webp',
            ],
        ];

        foreach($data as $item) {
            Achievement::create($item);
        }
    }
}
