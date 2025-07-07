<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        News::truncate();

        News::create([
            'title'      => 'Launching Website Sekolah',
            'slug'       => Str::slug('Launching Website Sekolah'),
            'content'    => 'Kami dengan gembira mengumumkan peluncuran situs web sekolah baru kami, yang dirancang untuk menyediakan informasi dan sumber daya terkini bagi siswa, orang tua, dan staf.',
            'thumbnail'  => 'images/placeholder.webp',
            'active'     => true,
        ]);

        News::create([
            'title'      => 'Hari Olahraga Tahunan',
            'slug'       => Str::slug('Hari Olahraga Tahunan'),
            'content'    => 'Bergabunglah dengan kami di Hari Olahraga Tahunan, yang menampilkan pertandingan atletik untuk semua tingkat kelas. Mari rayakan kerja sama tim dan kompetisi yang sehat!',
            'thumbnail'  => 'images/placeholder.webp',
            'active'     => true,
        ]);
    }
}
