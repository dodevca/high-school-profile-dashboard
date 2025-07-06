@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Guru'],
        ]
    ])
<div class="row mb-4">
    <div class="col-12">
        <div class="card p-3">
            <form method="GET" action="#" class="row g-2 align-items-center">

                {{-- Input Search --}}
                <div class="col-md">
                    <input type="text" class="form-control" placeholder="Cari nama guru/staff..." name="query" value="{{ request('query') }}">
                </div>

                {{-- Filter Jabatan --}}
                <div class="col-auto">
                    <select class="form-select" name="jabatan">
                        <option value="">Semua Jabatan</option>
                        <option value="Guru" {{ request('jabatan') == 'Guru' ? 'selected' : '' }}>Guru</option>
                        <option value="Staff TU" {{ request('jabatan') == 'Staff TU' ? 'selected' : '' }}>Staff TU</option>
                        <option value="Kepala Sekolah" {{ request('jabatan') == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                        <option value="Wakil Kepala Sekolah" {{ request('jabatan') == 'Wakil Kepala Sekolah' ? 'selected' : '' }}>Wakil Kepala Sekolah</option>
                    </select>
                </div>

                {{-- Tombol Cari --}}
                <div class="col-auto">
                    <button type="submit" class="btn btn-outline-secondary">Cari</button>
                </div>

                {{-- Dropdown Urutkan --}}
                <div class="col-auto">
                    <div class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="filterDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            Urutkan: A-Z
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterDropdown">
                            <li><a class="dropdown-item" href="#">A-Z</a></li>
                            <li><a class="dropdown-item" href="#">Z-A</a></li>
                            <li><a class="dropdown-item" href="#">Terbaru</a></li>
                            <li><a class="dropdown-item" href="#">Terlama</a></li>
                        </ul>
                    </div>
                </div>

                {{-- Tombol Tambah --}}
                <div class="col-auto">
                    <a href="#" class="btn btn-primary">Tambah Baru</a>
                </div>

            </form>
        </div>
    </div>
</div>

{{-- Daftar Guru dan Staff --}}
<div class="row">
    @for ($i = 1; $i <= 6; $i++)
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100">
                <div class="card-body d-flex flex-column align-items-center text-center">
                    <img src="{{ asset('images/placeholder.webp') }}" class="rounded-circle mb-3" width="100" height="100" alt="Foto Guru">
                    <h5 class="card-title">Nama Guru {{ $i }}</h5>
                    <p class="text-muted">Jabatan: Guru</p>
                    <div class="d-flex justify-content-center gap-2 mt-3">
                        <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-pen"></i></a>
                        <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
                    </div>
                </div>
            </div>
        </div>
    @endfor

    {{-- Jika Tidak Ada Data --}}
    @if (false)
        <div class="col-12">
            <div class="alert alert-warning">Tidak ada data guru dan staff.</div>
        </div>
    @endif
</div>
@endsection