<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Greeting;

class GreetingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Greeting::truncate();

        Greeting::create([
            'author'  => 'Enggar Okta, S.Pd',
            'photo'   => NULL,
            'content' => "Assalamu'alaikum warahmatullahi wabarakatuh.\n\nPuji syukur kita panjatkan ke hadirat Allah SWT atas rahmat dan karunia-Nya, sehingga SMK Negeri 1 Seyegan terus berkembang menjadi pusat keunggulan vokasi.\nKami berkomitmen menyelenggarakan pendidikan berkualitas, berkarakter, dan berwawasan global demi mencetak lulusan yang siap bersaing dan berkontribusi positif bagi masyarakat.\nSelamat datang di website resmi kami. Semoga segala informasi yang kami sajikan bermanfaat bagi seluruh civitas akademika dan masyarakat.\n\nWassalamu\'alaikum warahmatullahi wabarakatuh.",
        ]);
    }
}
