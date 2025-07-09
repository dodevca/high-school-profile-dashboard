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

        $announcements = [
            [
                'title'     => 'Libur Sekolah Hari Jumat',
                'content'   => '<p>Sehubungan dengan peringatan hari besar, SMK N 1 Seyegan akan meliburkan kegiatan pembelajaran pada hari Jumat, 17 Juli 2025. Semua siswa diharapkan kembali pada Senin, 20 Juli 2025.</p>',
                'major_id'  => null,
                'image'     => 'announcements/5.jpg',
                'active'    => true,
            ],
            [
                'title'     => 'Pendaftaran Olimpiade Matematika',
                'content'   => '<p>Pendaftaran <strong>Olimpiade Matematika</strong> tingkat kabupaten dibuka hingga 25 Juli 2025. Silakan hubungi guru matematika untuk informasi lebih lanjut.</p>',
                'major_id'  => 3,
                'image'     => 'announcements/6.jpg',
                'active'    => true,
            ],
            [
                'title'     => 'Workshop Desain Grafis',
                'content'   => '<p>Jangan lewatkan <em>Workshop Desain Grafis</em> untuk jurusan Multimedia, akan diadakan pada 30 Juli 2025 di Laboratorium Komputer.</p>',
                'major_id'  => 6,
                'image'     => 'announcements/7.jpg',
                'active'    => true,
            ],
        ];

        foreach($announcements as $a) {
            Announcement::create($a);
        }
    }
}
