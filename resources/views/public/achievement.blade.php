@extends('public')

@section('content')
    <section class="navigation pt-5 pb-0 mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
                <h2 class="h4 mb-0">
                    @if(!empty($search))
                        “{{ $search }}”
                    @else
                        Daftar Prestasi
                    @endif
                </h2>
                <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                    <div class="dropdown w-100 w-lg-auto">
                        <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-tags me-2"></i>
                            {{ $category ?: 'Semua Kategori' }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item{{ $category==''?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['category'=>'','page'=>1]) }}">
                                    Semua Kategori
                                </a></li>
                            <li><a class="dropdown-item{{ $category=='Murid'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['category'=>'Murid','page'=>1]) }}">
                                    Murid
                                </a></li>
                            <li><a class="dropdown-item{{ $category=='Guru'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['category'=>'Guru','page'=>1]) }}">
                                    Guru
                                </a></li>
                            <li><a class="dropdown-item{{ $category=='Sekolah'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['category'=>'Sekolah','page'=>1]) }}">
                                    Sekolah
                                </a></li>
                            <li><a class="dropdown-item{{ $category=='Ekstrakurikuler'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['category'=>'Ekstrakulikuler','page'=>1]) }}">
                                    Ekstrakurikuler
                                </a></li>
                        </ul>
                    </div>
                    <div class="dropdown w-100 w-lg-auto">
                        <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-award me-2"></i>
                            {{ $level ?: 'Semua Tingkat' }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item{{ $level==''?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['level'=>'','page'=>1]) }}">
                                    Semua Tingkat
                                </a></li>
                            <li><a class="dropdown-item{{ $level=='Sekolah'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['level'=>'Sekolah','page'=>1]) }}">
                                    Sekolah
                                </a></li>
                            <li><a class="dropdown-item{{ $level=='Kecamatan'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['level'=>'Kecamatan','page'=>1]) }}">
                                    Kecamatan
                                </a></li>
                            <li><a class="dropdown-item{{ $level=='Kabupaten/Kota'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['level'=>'Kabupaten/Kota','page'=>1]) }}">
                                    Kabupaten/Kota
                                </a></li>
                            <li><a class="dropdown-item{{ $level=='Provinsi'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['level'=>'Provinsi','page'=>1]) }}">
                                    Provinsi
                                </a></li>
                            <li><a class="dropdown-item{{ $level=='Nasional'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['level'=>'Nasional','page'=>1]) }}">
                                    Nasional
                                </a></li>
                            <li><a class="dropdown-item{{ $level=='Internasional'?' active':'' }}"
                                href="{{ request()->fullUrlWithQuery(['level'=>'Internasional','page'=>1]) }}">
                                    Internasional
                                </a></li>
                        </ul>
                    </div>
                    <div class="dropdown w-100 w-lg-auto">
                        <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-funnel me-2"></i>
                            {{ $sortOptions[$sort] ?? 'Terbaru' }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($sortOptions as $value => $label)
                                <li>
                                    <a class="dropdown-item{{ $sort === $value ? ' active' : '' }}"
                                    href="{{ request()->fullUrlWithQuery(['sort' => $value, 'page' => 1]) }}">
                                        {{ $label }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-form w-100 w-lg-auto">
                        <form class="border-0 p-0 bg-transparent" method="get" action="{{ route('achievement') }}" style="min-width:280px">
                            <div class="input-group">
                                <input class="form-control" type="search" name="search" value="{{ $search }}" placeholder="Cari disini ...">
                                <button class="btn btn-primary"><i class="bx bx-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="team" class="team pb-5">
        <div class="container">
            @if($achievements->count())
                <div class="row">
                    @foreach($achievements as $a)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="card h-100 shadow-sm">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $a->title }}</h5>
                                    <div class="mb-2">
                                        <span class="badge bg-secondary">{{ $a->category }}</span>
                                        <span class="badge bg-info text-dark">{{ $a->level }}</span>
                                    </div>
                                    <p class="mb-1"><strong>Perolehan:</strong> {{ $a->rank }}</p>
                                    <p class="mb-1"><strong>Oleh:</strong> {{ $a->achieved_by }}</p>
                                    <p class="text-muted mb-2"><small>{{ $a->achieved_at_formatted }}</small></p>
                                    @if($a->photo)
                                        <img src="{{ asset('storage/'.$a->photo) }}" class="img-fluid rounded mb-2" alt="Foto Prestasi">
                                    @else
                                        <img src="{{ asset('images/placeholder.webp') }}" class="img-fluid rounded mb-2" alt="No Image">
                                    @endif
                                    @if($a->description)
                                        <p class="mb-0">{{ $a->description }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation">
                    {{ $achievements->links('vendor.pagination.bootstrap-5') }}
                </nav>
            @else
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Tidak ada prestasi.
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
