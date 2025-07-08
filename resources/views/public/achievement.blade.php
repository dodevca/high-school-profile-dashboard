@extends('public')

@section('content')
@extends('layouts.app')

@section('main')
<section class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0">
                Hasil dari: <strong>Prestasi Juara Sains</strong>
            </h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3 w-100">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel me-2"></i>Terbaru
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Terbaru</a></li>
                        <li><a class="dropdown-item" href="#">Terlama</a></li>
                    </ul>
                </div>
                <div class="search-form w-100 order-1 order-lg-2">
                    <form class="d-flex border border-secondary rounded" method="get" action="#">
                        <input type="text" id="search" name="q" class="form-control border-0" placeholder="Cari disini ..." value="Prestasi Juara Sains">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="team py-5">
    <div class="container">
        <div class="row">
            @for ($i = 0; $i < 6; $i++)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch mb-4">
                <div class="member rounded w-100 shadow-sm p-3">
                    <div class="achievement-details-slider swiper mb-3">
                        <div class="swiper-wrapper align-items-center">
                            @for ($j = 0; $j < 2; $j++)
                                <div class="swiper-slide">
                                    <img src="{{ asset('images/placeholder.webp') }}" alt="Prestasi Siswa {{ $i + 1 }} - {{ $j + 1 }}" class="w-100 rounded" style="aspect-ratio: 4 / 3; object-fit: cover;">
                                </div>
                            @endfor
                        </div>
                        <div class="swiper-pagination d-flex justify-content-center mt-2"></div>
                    </div>
                    <h4>Nama Siswa {{ $i + 1 }}</h4>
                    <span>Jurusan {{ ['RPL', 'TKJ', 'AKL'][$i % 3] }}</span>
                    <ul class="list-unstyled mt-3">
                        <li class="fw-bold">Lomba Sains</li>
                        <li class="fw-bold">Nasional</li>
                        <li class="fw-bold">202{{ $i }}</li>
                    </ul>
                </div>
            </div>
            @endfor
        </div>

        <!-- Dummy pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Berikutnya</a></li>
            </ul>
        </nav>
    </div>
</section>
@endsection