@extends('public')

@section('content')

<style>
    /* ====== Testimonials Section ====== */
    .testimonials {
        padding: 80px 0;
        background-color: #f8f9fa;
    }

    .testimonial-item {
        transition: all 0.3s ease-in-out;
        border-left: 4px solid #0d6efd;
        background-color: #ffffff;
        position: relative;
    }

    .testimonial-item h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color:rgb(14, 71, 20);
    }

    .testimonial-item p {
        font-size: 1rem;
        font-style: italic;
        color: #333;
        position: relative;
    }

    .quote-icon-left,
    .quote-icon-right {
        color: #0d6efd;
        font-size: 1.2rem;
        vertical-align: middle;
    }

    .testimonial-item ul {
        padding-left: 1.2rem;
        margin: 0;
    }

    .testimonial-item ul li {
        margin-bottom: 0.5rem;
        font-size: 1rem;
        color: #555;
    }

    /* ====== Navigation Buttons Section ====== */
    section .btn {
        padding: 0.6rem 1.4rem;
        font-size: 1rem;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: 500;
    }

    section h5 {
        font-weight: 600;
        color: #333;
    }

    section span.bg-secondary {
        display: inline-block;
        background-color: #6c757d !important;
    }

    /* ====== Responsive Tweaks ====== */
    @media (max-width: 768px) {
        .testimonial-item {
            margin-top: 30px;
        }

        .btn {
            font-size: 0.9rem;
        }

        .testimonials {
            padding: 60px 0;
        }
    }
</style>

<section id="testimonials" class="testimonials">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto mb-4">
                <iframe width="100%" height="480" class="rounded shadow"
                    src="https://www.youtube.com/embed/XdeM2zhzGdg?si=tYvgMsQ1-eZN8C6D" title="Video YouTube" allowfullscreen>
                </iframe>
            </div>

            <div class="col-lg-8 me-lg-auto">
                <div class="testimonial-item rounded p-4 bg-light shadow-sm">
                    <h3 class="mb-4">Visi Sekolah</h3>
                    <p class="mb-0">
                        <i class="bi bi-quote quote-icon-left"></i>Mewujudkan sekolah yang religius, berbudaya lokal dan industri untuk menghasilkan tamatan yang berkarakter,
                        berakhlak mulia serta unggul 
                        dalam bekerja maupun berwira usaha.
                        <i class="bi bi-quote quote-icon-right"></i>
                    </p>
                </div>
            </div>
            <div class="col-lg-8 ms-lg-auto">
                <div class="testimonial-item rounded mt-5 p-4 bg-light shadow-sm">
                    <h3 class="mb-4">Misi Sekolah</h3>
                    <ul class="mb-0">
                        <li>Menyelenggarakan program pendidikan dengan menanamkan sikap religius melalui implementasi ajaran agama dalam kehidupan sehari-hari di sekolah sesuai dengan agama yang dianut oleh masing-masing warga sekolah.</li>
                        <li>Menyelenggarakan program pendidikan dengan menanamkan sikap cinta budaya khususnya Daerah Istimewa Yogyakarta dalam kehidupan sehari-hari di sekolah.</li>
                        <li>Menghasilkan tamatan yang memiliki budaya industri yaitu sikap jujur, tanggung jawab, disiplin, kerjasama, dan peduli.</li>
                        <li>Menyelenggarakan manajemen yang tangguh, solid, partisipatif, dan transparan melalui implementasi sistem manajemen mutu berbasis ISO 9001:2015.</li>
                        <li>Menanamkan budaya kerja di industri dengan melaksanakan 5R (Ringkas, Rapi, Resik, Rawat, Rajin).</li>
                        <li>Menyelenggarakan program pendidikan dan pengajaran untuk membentuk peserta didik yang memiliki integritas tinggi, mandiri, berjiwa nasionalis, dan semangat gotong-royong.</li>
                        <li>Menyediakan sarana prasarana pembelajaran sesuai dengan standar pelayanan minimal dan mengacu pada sistem tata kelola DUDIKA untuk mendukung ketercapaian hasil belajar yang kompetitif serta melaksanakan kerja sama dengan DUDIKA dalam bidang peningkatan kualitas pembelajaran maupun penyaluran tamatan.</li>
                        <li>Melaksanakan evaluasi terhadap pencapaian kompetensi siswa secara berkala dan akuntabel.</li>
                        <li>Menyelenggarakan program pendidikan dan pengajaran dengan menanamkan sikap enterpreuner yang berfokus pada nilai-nilai sikap percaya diri, tangguh, ulet, kreatif, serta inovatif.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="#" class="btn btn-primary rounded-5">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="#" class="btn btn-primary rounded-5">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>

        <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="text-end mb-0">Sambutan Kepala Sekolah</h5>
            <span class="bg-secondary" style="width: 1px; height: 24px;"></span>
            <h5 class="mb-0">Tenaga Pendidik</h5>
        </div>
    </div>
</section>

@endsection