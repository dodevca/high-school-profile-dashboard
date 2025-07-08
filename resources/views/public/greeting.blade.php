@extends('public')

@section('content')

<section id="about" class="about py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 text-center">
                <img src="{{ asset('images/placeholder.webp') }}" class="img-fluid rounded mb-3" alt="Foto Kepala Sekolah">
                <h2 class="h6 fw-bold text-center">Drs. Suyatno, M.Pd.</h2>
                <h6 class="fw-bold text-muted">Kepala Sekolah SMK NEGERI 1 SEYEGAN</h6>
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content">
                <h3>Dua Sisi Mata Pisau</h3>
                <p>
                    Jika pisau berada di tangan orang yang baik, maka pisau menjadi baik. Ketika pisau berada di tangan orang yang jahat, maka pisau menjadi jahat. Pisau berada di tangan penodong, maka pisau dipakai untuk menyakiti, menodong dan tindakan berbahaya lainnya. Tapi pisau di tangan dokter bedah, maka pisau digunakan untuk menolong dan menyembuhkan. Demikian juga internet ibarat dua sisi mata pisau — ada yang baik dan juga buruk. Internet bersifat netral, tergantung cara kita memanfaatkannya.
                </p>
                <p>
                    SMK Negeri 1 Seyegan memanfaatkan teknologi sebagai sarana pelayanan informasi dan komunikasi pendidikan, melalui website resmi: 
                    <a href="#">http://www.smkn1seyegan.sch.id</a>. 
                    Website ini dikembangkan oleh tim TIK SMK Negeri 1 Seyegan yang mendedikasikan pengetahuan dan keterampilan mereka untuk mendukung transformasi digital pendidikan.
                </p>
                <p>
                    Seperti halnya sebuah majalah yang berfungsi sebagai media komunikasi, website ini juga menjadi sarana penyebaran informasi, hanya berbeda pada medianya: kertas untuk majalah, elektronik untuk website.
                </p>
                <p>
                    Komunikasi memegang peranan penting dalam interaksi manusia. Tidak hanya membantu memenuhi kebutuhan hidup, tetapi juga memengaruhi pembentukan budaya masyarakat.
                </p>
                <p>
                    Dalam perkembangannya, manusia menciptakan berbagai media komunikasi untuk mempermudah proses interaksi. SMK Negeri 1 Seyegan turut mengembangkan dan membudayakan penggunaan media tersebut dalam dunia pendidikan, khususnya media elektronik untuk menunjang pembelajaran digital.
                </p>
                <p>
                    Namun, setiap media tentu memiliki dua sisi: positif dan negatif. Sekolah sebagai pengelola komunitas pembelajar perlu mengantisipasi dampak buruk dari media komunikasi, agar tidak menjadi penghambat pendidikan. Tujuan yang baik bisa berubah menjadi ancaman jika tidak dikelola dengan bijak.
                </p>
                <p>
                    Perkembangan peradaban manusia sangat bergantung pada kemajuan media komunikasi. Seiring modernisasi dan kapitalisasi, media kini berperan tidak hanya menyampaikan informasi, tapi juga membentuk opini, budaya, dan perilaku. Ini juga berlaku dalam komunitas pembelajar.
                </p>
                <p>
                    Media massa menjadi sarana diskusi, pendidikan karakter, hingga penyebaran informasi secara cepat dan luas. Melalui media ini, sekolah dapat menjangkau masyarakat dan berkontribusi dalam menciptakan solusi pendidikan yang inklusif dan bermakna.
                </p>
                <p>
                    Media juga membuka ruang bagi peserta didik untuk mengekspresikan diri, berkompetisi, serta mengembangkan potensi dalam bidang teknologi dan komunikasi.
                </p>
                <p>
                    Semoga website SMK Negeri 1 Seyegan ini menjadi wadah yang bermanfaat dalam mendukung pertumbuhan pendidikan dan IPTEK di lingkungan sekolah serta masyarakat sekitar. Kami percaya bahwa dengan niat dan upaya yang tulus, pelayanan pendidikan akan semakin maju dan berdampak luas bagi masa depan bangsa.
                </p>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="#" class="btn btn-primary rounded-5 disabled" tabindex="-1" role="button" aria-disabled="true">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="#" class="btn btn-primary rounded-5">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>
        <div class="static-pagination d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="text-end"></h5>
            <span class="bg-secondary rounded-circle" style="width: 10px; height: 10px; display: inline-block;"></span>
            <h5>Visi dan Misi</h5>
        </div>
    </div>
</section>

@endsection