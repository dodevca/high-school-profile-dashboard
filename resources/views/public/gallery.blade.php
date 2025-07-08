@extends('public')

@section('content')

<section id="" class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0">{{ !empty('') ? 'Hasil dari : Dummy Query' : 'Daftar Album SMK N 1 Seyegan' }}</h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
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
                    <form class="border border-secondary rounded" method="get" action="#">
                        <input type="text" id="search" name="q" value="Dummy Query" placeholder="Cari disini ..." class="form-control d-inline w-auto me-2">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="">
    <div class="container">
        @php
            $results = [
                ['album_id' => 1, 'slug' => 'album-pertama', 'headline' => 'placeholder.webp', 'title' => 'Album Pertama', 'date' => '2024-01-01'],
                ['album_id' => 2, 'slug' => 'album-kedua', 'headline' => 'placeholder.webp', 'title' => 'Album Kedua', 'date' => '2024-02-15'],
                ['album_id' => 3, 'slug' => 'album-ketiga', 'headline' => 'placeholder.webp', 'title' => 'Album Ketiga', 'date' => '2024-03-20'],
            ];
        @endphp

        @if(count($results) > 0)
            <div class="row">
                @foreach($results as $album)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <a href="#">
                            <div class="rounded shadow">
                                <img src="{{ asset('images/placeholder.webp') }}" class="w-100 h-auto rounded-top" style="aspect-ratio: 4 / 3; object-fit: cover;" alt="{{ $album['title'] }}">
                                <div class="px-4 py-3">
                                    <h4>{{ $album['title'] }}</h4>
                                    <p class="text-muted">
                                        <i class="bi bi-calendar me-2"></i>
                                        {{ \Carbon\Carbon::parse($album['date'])->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center pb-5">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Tidak ada album.</p>
            </div>
        @endif

        <!-- Pagination Replacement -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">3</a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
<!-- <section>
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="#" class="btn btn-primary rounded-5">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="#" class="btn btn-primary rounded-5 disabled" tabindex="-1" role="button" aria-disabled="true">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="text-end mb-0">Sarana Prasarana</h5>
            <span class="bg-secondary" style="width: 1px; height: 24px;"></span>
            <h5 class="mb-0"></h5>
        </div>
    </div>
</section> -->



@endsection