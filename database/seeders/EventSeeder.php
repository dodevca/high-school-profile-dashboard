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

        Event::create([
            'title'        => 'Workshop Pemrograman Laravel',
            'description'  => 'Kami mengundang seluruh siswa jurusan RPL untuk mengikuti workshop dasar pemrograman Laravel yang akan dipandu oleh instruktur berpengalaman.',
            'start_time'   => Carbon::now()->addDays(5)->setTime(9, 00),
            'end_time'     => Carbon::now()->addDays(5)->setTime(12, 00),
            'location'     => 'Laboratorium Komputer SMK N 1 Seyegan',
            'image'        => 'images/placeholder.webp',
            'type'         => 'External',
            'active'       => true,
        ]);

        Event::create([
            'title'        => 'Hari Olahraga Sekolah',
            'description'  => 'Ayo meriahkan Hari Olahraga Sekolah dengan berbagai lomba atletik dan pertandingan persahabatan antar jurusan.',
            'start_time'   => Carbon::now()->addWeek()->setTime(7, 00),
            'end_time'     => Carbon::now()->addWeek()->setTime(15, 00),
            'location'     => 'Lapangan Utama SMK N 1 Seyegan',
            'image'        => 'images/placeholder.webp',
            'type'         => 'Internal',
            'active'       => true,
        ]);
    }
}
