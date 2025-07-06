<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Announcement::truncate();

        Announcement::create([
            'title'     => 'Libur Sekolah Hari Jumat',
            'content'   => '<p>Sehubungan dengan peringatan hari besar, SMK N 1 Seyegan akan meliburkan kegiatan pembelajaran pada hari Jumat, 17 Juli 2025. Semua siswa diharapkan kembali pada Senin, 20 Juli 2025.</p>',
            'major_id'  => null,
            'image'     => 'images/placeholder.webp',
            'active'    => true
        ]);

        Announcement::create([
            'title'     => 'Workshop Keamanan Jaringan untuk TKJ',
            'content'   => '<p>Jurusan Teknik Komputer dan Jaringan akan mengadakan workshop keamanan jaringan pada tanggal 25 Juli 2025 di laboratorium TKJ. Peserta diharapkan mendaftar ke wali kelas masing-masing.</p>',
            'major_id'  => null,
            'image'     => 'images/placeholder.webp',
            'active'    => true
        ]);
    }
}
