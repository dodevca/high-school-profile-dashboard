@extends('public')

@section('content')
@extends('layouts.app')

@section('main')
<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-start">
            <!-- Galeri Prestasi -->
            <div class="col-lg-6">
                <div class="achievement-details-slider swiper mb-4">
                    <div class="swiper-wrapper">
                        @for ($i = 0; $i < 3; $i++)
                            <div class="swiper-slide">
                                <img src="{{ asset('images/placeholder.webp') }}" alt="Foto Prestasi {{ $i + 1 }}" class="w-100 rounded" style="aspect-ratio: 4 / 3; object-fit: cover;">
                            </div>
                        @endfor
                    </div>
                    <div class="swiper-pagination mt-3 d-flex justify-content-center"></div>
                </div>
            </div>

            <!-- Detail Informasi Prestasi -->
            <div class="col-lg-6">
                <h2 class="fw-bold">Juara 1 Lomba Sains Nasional</h2>
                <p class="text-muted mb-3">
                    Prestasi ini diraih dalam kompetisi tingkat nasional yang diikuti oleh berbagai sekolah menengah atas se-Indonesia.
                </p>

                <ul class="list-group mb-4">
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Nama Siswa:</strong> <span>Nama Siswa Contoh</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Jurusan:</strong> <span>Rekayasa Perangkat Lunak</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Tingkat Lomba:</strong> <span>Nasional</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Tahun:</strong> <span>2024</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <strong>Lokasi:</strong> <span>Jakarta</span>
                    </li>
                </ul>

                <a href="#" class="btn btn-outline-primary rounded-pill"><i class="bi bi-arrow-left me-2"></i>Kembali ke Daftar Prestasi</a>
            </div>
        </div>
    </div>
</section>
@endsection