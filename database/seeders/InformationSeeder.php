<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Information;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Information::truncate();

        Information::create([
            'name'            => 'SMK Negeri 1 Seyegan',
            'npsn'            => '20234567',
            'nss'             => '30123456',
            'education_level' => 'SMK',
            'address'         => 'Jl. Kebonagung Street KM 8, Jamblangan, Margomulyo, Seyegan, Sleman, Yogyakarta',
            'district'        => 'Seyegan',
            'city'            => 'Sleman',
            'province'        => 'Yogyakarta',
            'postal_code'     => '55561',
            'phone'           => '(0274) 866442',
            'email'           => 'smkn1seyegan@gmail.com',
            'logo'            => null,
            'vision'          => 'Menjadi pusat keunggulan vokasi berstandar nasional dan berdaya saing global.',
            'mission'         => "1. Meningkatkan kompetensi lulusan melalui kurikulum berbasis industri.\n2. Membangun budaya kolaborasi dengan dunia usaha dan dunia industri.\n3. Mengoptimalkan sarana-prasarana penunjang pembelajaran.",
        ]);
    }
}
