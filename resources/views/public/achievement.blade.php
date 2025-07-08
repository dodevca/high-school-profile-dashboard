@extends('public')

@section('content')

<section class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0">
                Hasil dari : Pencarian Dummy
            </h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3 w-100 w-lg-auto">
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
                    <form method="GET" class="border-secondary rounded d-flex">
                        <input type="text" id="search" name="q" class="form-control" placeholder="Cari disini ..." value="dummy">
                        <button type="submit" class="btn btn-primary ms-2">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="team" class="team py-5">
    <div class="container">
        <div class="row">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                    <div class="member rounded mw-100 shadow-sm p-3">
                        <div class="achievement-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                @for ($j = 1; $j <= 2; $j++)
                                    <div class="swiper-slide">
                                        <img src="{{ asset('images/placeholder.webp') }}"
                                            alt="Nama Siswa Jurusan Tahun-{{ $j }}"
                                            class="w-100 mw-100 rounded m-0"
                                            style="aspect-ratio: 4 / 3; object-fit: cover;">
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-pagination d-flex justify-content-center mb-3"></div>
                        </div>
                        <h4>Nama Siswa {{ $i + 1 }}</h4>
                        <span>Jurusan Dummy</span>
                        <ul class="list-unstyled mt-3">
                            <li class="fw-bold">Jenis Prestasi</li>
                            <li class="fw-bold">Tingkat Nasional</li>
                            <li class="fw-bold">Tahun 2024</li>
                        </ul>
                    </div>
                </div>
            @endfor
        </div>

        {{-- Bootstrap 5.3 Pagination Element --}}
        <div class="d-flex justify-content-center mt-4">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</section>

@endsection
