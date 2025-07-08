@extends('public')

@section('content')
@extends('layouts.app')

@section('main')
<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-start">
            <div class="col-lg-6">
                <!-- Swiper Carousel / Placeholder -->
                <div class="swiper mb-3">
                    <div class="swiper-wrapper">
                        @for ($i = 1; $i <= 3; $i++)
                            <div class="swiper-slide">
                                <img src="{{ asset('images/placeholder.webp') }}" alt="Prestasi Gambar {{ $i }}" class="img-fluid rounded shadow-sm w-100" style="aspect-ratio: 4/3; object-fit: cover;">
                            </div>
                        @endfor
                    </div>
                    <div class="swiper-pagination mt-3"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <h2 class="mb-1">Walter White</h2>
                <p class="text-muted">Rekayasa Perangkat Lunak</p>
                <ul class="list-unstyled mb-3">
                    <li><strong>Jenis Lomba:</strong> Lomba Sains</li>
                    <li><strong>Tingkat:</strong> Nasional</li>
                    <li><strong>Tahun:</strong> 2024</li>
                </ul>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugit similique labore libero perspiciatis perferendis nesciunt corporis quidem, ullam totam amet.
                </p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="text-primary"><i class="bi bi-twitter fs-5"></i></a>
                    <a href="#" class="text-primary"><i class="bi bi-facebook fs-5"></i></a>
                    <a href="#" class="text-primary"><i class="bi bi-instagram fs-5"></i></a>
                    <a href="#" class="text-primary"><i class="bi bi-linkedin fs-5"></i></a>
                </div>
            </div>
        </div>

        <div class="mt-5 text-center">
            <a href="#" class="btn btn-outline-primary rounded-pill">
                <i class="bi bi-chevron-left me-2"></i>Kembali ke Daftar Prestasi
            </a>
        </div>
    </div>
</section>
@endsection