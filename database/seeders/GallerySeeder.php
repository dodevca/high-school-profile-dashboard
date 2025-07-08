<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Gallery;
use App\Models\GalleryImage;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        GalleryImage::truncate();
        Gallery::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        for($i = 1; $i <= 5; $i++) {
            $gallery = Gallery::create([
                'title'        => "Album Contoh {$i}",
                'description'  => "Ini adalah deskripsi untuk album contoh nomor {$i}.",
                'thumbnail'    => "thumbnails/$i.jpg",
                'published_at' => Carbon::now()->subDays(5 - $i),
            ]);

            $images = [];
            for ($j = 1; $j <= 3; $j++) {
                $images[] = [
                    'gallery_id' => $gallery->id,
                    'image'      => "album/placeholder.webp",
                    'caption'    => "Caption gambar {$j} untuk album {$i}",
                ];
            }

            GalleryImage::insert($images);
        }
    }
}
