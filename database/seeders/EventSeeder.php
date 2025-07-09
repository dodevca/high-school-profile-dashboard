<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Event::truncate();

        $events = [
            [
                'title'       => 'Hari Olahraga Sekolah',
                'description' => '<p>Ayo meriahkan <strong>Hari Olahraga Sekolah</strong> dengan berbagai lomba atletik dan pertandingan persahabatan antar jurusan.</p>',
                'start_time'  => Carbon::now()->addWeek()->setTime(7, 0),
                'end_time'    => Carbon::now()->addWeek()->setTime(15, 0),
                'location'    => 'Lapangan Utama SMK N 1 Seyegan',
                'image'       => 'events/1.png',
                'type'        => 'Internal',
                'active'      => true,
            ],
            [
                'title'       => 'Pameran Karya Siswa',
                'description' => '<p>Jangan lewatkan <em>Pameran Karya Siswa</em> di aula utama, menampilkan hasil proyek RPL, TKJ, dan MM.</p>',
                'start_time'  => Carbon::now()->addDays(10)->setTime(9, 0),
                'end_time'    => Carbon::now()->addDays(10)->setTime(17, 0),
                'location'    => 'Aula Utama SMK N 1 Seyegan',
                'image'       => 'events/2.png',
                'type'        => 'External',
                'active'      => true,
            ],
            [
                'title'       => 'Pelatihan Pengembangan Kurikulum',
                'description' => '<p>Pelatihan bagi seluruh guru terkait <strong>pengembangan kurikulum</strong> berbasis kompetensi.</p>',
                'start_time'  => Carbon::now()->addDays(20)->setTime(8, 30),
                'end_time'    => Carbon::now()->addDays(20)->setTime(14, 30),
                'location'    => 'Ruang Serbaguna SMK N 1 Seyegan',
                'image'       => 'events/3.png',
                'type'        => 'Internal',
                'active'      => true,
            ],
            [
                'title'       => 'Study Tour ke Museum Sejarah',
                'description' => '<p>Study tour ke <a href="https://museumsejarah.example.com" target="_blank">Museum Sejarah</a> untuk memperkaya wawasan sejarah lokal.</p>',
                'start_time'  => Carbon::now()->addDays(30)->setTime(6, 0),
                'end_time'    => Carbon::now()->addDays(30)->setTime(18, 0),
                'location'    => 'Museum Sejarah Kota Yogyakarta',
                'image'       => 'events/4.png',
                'type'        => 'External',
                'active'      => true,
            ],
        ];

        foreach ($events as $e) {
            Event::create($e);
        }
    }
}
