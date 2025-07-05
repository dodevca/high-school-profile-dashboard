@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Galeri'],
        ]
    ])

    <div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="d-flex flex-column flex-md-row align-items-center gap-3 w-100">
                        {{-- Search Bar --}}
                        <form class="d-flex w-100" action="#" method="GET">
                            <input class="form-control me-2" type="search" placeholder="Cari album..." name="query">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </form>

                        {{-- Filter Dropdown --}}
                        <div class="dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownFilter" data-bs-toggle="dropdown" aria-expanded="false">
                                Urutkan : A-Z
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownFilter">
                                <li><a class="dropdown-item" href="#">A-Z</a></li>
                                <li><a class="dropdown-item" href="#">Z-A</a></li>
                                <li><a class="dropdown-item" href="#">Terbaru</a></li>
                                <li><a class="dropdown-item" href="#">Terlama</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-3 mt-md-0">
                        <a href="#" class="btn btn-primary"><i class="bi bi-plus me-1"></i>Tambah Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Album --}}
    <div class="col-lg-12">
        <div class="card bg-transparent border-0 mb-4">
            <div class="card-header px-0 pb-2 border-bottom-0">
                <h4 class="card-title">Daftar Album</h4>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    @php
                        $albums = [
                            [
                                'id' => 1,
                                'title' => 'Album Liburan',
                                'date' => '2025-06-01',
                                'headline' => 'images/placeholder.webp',
                                'totalImages' => 10
                            ],
                            [
                                'id' => 2,
                                'title' => 'Album Sekolah',
                                'date' => '2025-06-10',
                                'headline' => 'images/placeholder.webp',
                                'totalImages' => 8
                            ],
                        ];
                    @endphp

                    @if (count($albums) > 0)
                        @foreach ($albums as $album)
                        <div class="col-lg-12 mb-3">
                            <div class="card shadow-sm">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="d-flex align-items-center">
                                            <a href="#" class="d-flex align-items-center text-decoration-none">
                                                <img src="{{ $album['headline'] }}" class="rounded me-3" width="72" height="72" alt="Album image">
                                                <div>
                                                    <h5 class="mb-1">{{ $album['title'] }}</h5>
                                                    <div class="text-muted small d-flex flex-wrap gap-3">
                                                        <span><i class="bi bi-calendar me-1"></i>{{ $album['date'] }}</span>
                                                        <span><i class="bi bi-images me-1"></i>{{ $album['totalImages'] }}</span>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex gap-2 mt-3 mt-md-0">
                                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-pen"></i> Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                    <div class="col-12">
                        <div class="alert alert-warning" role="alert">
                            Tidak ada album.
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Pagination --}}
        <nav>
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
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection