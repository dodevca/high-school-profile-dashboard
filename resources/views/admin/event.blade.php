@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Agenda'],
        ]
    ])
    @if (session('success'))
    <div class="alert alert-success text-white" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="d-flex flex-column flex-md-row align-items-center gap-2 order-md-2 w-100">
                        {{-- Search bar sebagai elemen baru --}}
                        <input type="text" class="form-control me-2" placeholder="Cari agenda..." aria-label="Search">
                        
                        <div class="dropdown">
                            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Urutkan: Terbaru
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">Mendatang</a></li>
                                <li><a class="dropdown-item" href="#">Terbaru</a></li>
                                <li><a class="dropdown-item" href="#">Terlama</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="mb-3 mb-md-0 order-1">
                        <a href="#" class="btn btn-primary w-100 w-md-auto">
                            <i class="bi bi-plus me-1"></i>Tambah Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Daftar Agenda --}}
    <div class="col-lg-12">
        <div class="card border-0 mb-0">
            <div class="card-header px-0 pb-3">
                <h4 class="card-title">Agenda Sekolah</h4>
            </div>
            <div class="card-body p-0">
                <div class="row">
                    {{-- Dummy data loop --}}
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="col-lg-12">
                            <div class="card bg-white mb-3">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="d-flex flex-column">
                                            <button type="button" class="btn p-0 text-start" data-bs-toggle="modal" data-bs-target="#modal{{ $i }}">
                                                <h5 class="mb-2">Agenda Dummy {{ $i }}</h5>
                                                <div class="badge bg-info text-dark mb-2">01-01-2025 - 02-01-2025</div>
                                                <div class="d-flex gap-3 text-muted small">
                                                    <div><i class="bi bi-calendar me-1"></i>01-01-2025</div>
                                                    <div><i class="bi bi-eye me-1"></i>123</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="d-flex gap-2 mt-3 mt-md-0">
                                            <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-pen"></i> Edit</a>
                                            <a href="#" class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal Detail --}}
                                <div class="modal fade" id="modal{{ $i }}" tabindex="-1" aria-labelledby="modalTitle{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center">
                                                <h5 class="modal-title" id="modalTitle{{ $i }}">Agenda Dummy {{ $i }}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table table-borderless">
                                                    <tr>
                                                        <td class="fw-bold">Dimulai</td>
                                                        <td>: 01-01-2025</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Berakhir</td>
                                                        <td>: 02-01-2025</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-bold">Deskripsi</td>
                                                        <td>:</td>
                                                    </tr>
                                                </table>
                                                <p class="ps-3">Deskripsi agenda dummy ke {{ $i }}.</p>
                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <a href="#" class="btn btn-outline-primary">Edit</a>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                    {{-- Jika tidak ada data --}}
                    @if (false)
                        <div class="col-12">
                            <div class="alert alert-warning w-100" role="alert">
                                Tidak ada agenda.
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Pagination Dummy --}}
        <div class="mt-4 d-flex justify-content-center">
            <nav>
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Selanjutnya</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@endsection