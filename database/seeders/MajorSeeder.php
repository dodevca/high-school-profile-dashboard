<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Major;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $majors = [
            [
                'code' => 'TKP',
                'name' => 'Teknik Konstruksi dan Perumahan',
                'description' => 'Program keahlian yang mempelajari teknik pembangunan dan perancangan bangunan serta manajemen konstruksi untuk rumah tinggal dan infrastruktur pendukung.',
            ],
            [
                'code' => 'DPIB',
                'name' => 'Desain Pemodelan dan Informasi Bangunan',
                'description' => 'Bidang yang fokus pada perancangan, pemodelan 3D, dan manajemen informasi bangunan menggunakan perangkat lunak BIM (Building Information Modeling).',
            ],
            [
                'code' => 'TKRO',
                'name' => 'Teknik Kendaraan Ringan Otomotif',
                'description' => 'Jurusan yang mempelajari perawatan, perbaikan, dan diagnostik kendaraan ringan seperti mobil penumpang dan kendaraan komersial ringan.',
            ],
            [
                'code' => 'TFLM',
                'name' => 'Teknik Fabrikasi Logam dan Manufaktur',
                'description' => 'Program yang mengajarkan teknik pemotongan, pembentukan, pengelasan, dan permesinan logam untuk proses manufaktur komponen industri.',
            ],
            [
                'code' => 'TIOT',
                'name' => 'Teknik Ototronik',
                'description' => 'Bidang multidisiplin yang menggabungkan teknik otomotif dan elektronika untuk sistem kendali kendaraan dan otomasi mekanis.',
            ],
            [
                'code' => 'TBSM',
                'name' => 'Teknik dan Bisnis Sepeda Motor',
                'description' => 'Program keahlian yang mempelajari teknologi sepeda motor dan aspek bisnis seperti penjualan, pemasaran, serta manajemen bengkel.',
            ],
            [
                'code' => 'TKJ',
                'name' => 'Teknik Komputer dan Jaringan',
                'description' => 'Jurusan yang fokus pada instalasi, konfigurasi, dan pemeliharaan sistem komputer serta jaringan lokal dan internet.',
            ],
        ];
        
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Major::truncate();

        foreach ($majors as $data) {
            Major::updateOrCreate(
                ['code' => $data['code']],
                [
                    'name'        => $data['name'],
                    'description' => $data['description'],
                ]
            );
        }
    }
}
