@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Berita'],
        ]
    ])

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-between order-md-2 w-100 w-md-auto">
                        
                        {{-- Search Bar --}}
                        <form class="input-group mb-3 me-md-3" role="search">
                            <input type="search" class="form-control" placeholder="Cari berita..." aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit">Cari</button>
                        </form>

                        {{-- Dropdown Filter --}}
                        <div class="dropdown me-md-3 mt-3 mt-md-0 border-end order-md-1">
                            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton03" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="h6">Urutkan:</span> Terbaru
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton03">
                                <li><a class="dropdown-item" href="#">Terbaru</a></li>
                                <li><a class="dropdown-item" href="#">Terlama</a></li>
                            </ul>
                        </div>
                    </div>

                    {{-- Tombol Tambah Baru --}}
                    <div class="me-md-3 mb-3 mb-md-0 order-2 order-md-1 w-100 w-md-auto">
                        <a href="#" class="btn btn-primary w-100 w-md-auto"><i class="bi bi-plus me-1"></i>Tambah Baru</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Berita Aktif --}}
    <div class="col-lg-12">
        <div class="card border-0 mb-0">
            <div class="card-header d-flex align-items-center justify-content-between px-0 pb-3">
                <h4 class="card-title mb-0">Berita Aktif</h4>
            </div>
            <div class="card-body px-0">
                <div class="row">
                    {{-- Dummy Data --}}
                    @for ($i = 1; $i <= 3; $i++)
                        <div class="col-lg-12 mb-3">
                            <div class="card bg-white">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap align-items-center justify-content-between">
                                        <div class="d-flex align-items-start">
                                            <button type="button" class="btn p-0 text-start" data-bs-toggle="modal" data-bs-target="#modal{{ $i }}">
                                                <h5 class="mb-2">Judul Berita {{ $i }}</h5>
                                                <div class="d-flex flex-wrap text-muted small">
                                                    <div class="me-3"><i class="bi bi-calendar me-1"></i>2025-07-04</div>
                                                    <div class="me-3"><i class="bi bi-eye me-1"></i>123</div>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="d-flex align-items-center mt-3 mt-md-0">
                                            <a href="#" class="btn btn-outline-primary me-2"><i class="bi bi-pen"></i> Edit</a>
                                            <a href="#" class="btn btn-outline-secondary"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </div>
                                </div>

                                {{-- Modal --}}
                                <div class="modal fade" id="modal{{ $i }}" tabindex="-1" aria-labelledby="modalTitle{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-scrollable">
                                        <div class="modal-content">
                                            <div class="modal-header justify-content-center">
                                                <h5 class="modal-title" id="modalTitle{{ $i }}">Judul Berita {{ $i }}</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Berita ini merupakan contoh dummy data.</p>
                                                <div class="text-center pt-3 border-top">
                                                    <a href="#" class="btn btn-outline-secondary"><i class="bi bi-file-earmark me-2"></i>Headline</a>
                                                </div>
                                            </div>
                                            <div class="modal-footer border-0 justify-content-center">
                                                <a href="#" class="btn btn-outline-primary"><i class="bi bi-pen"></i>Edit</a>
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="bi bi-x"></i>Tutup</button>
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
                                <div class="text-warning">Tidak ada berita.</div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Dummy Pagination --}}
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center mt-4">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item active">
                    <a class="page-link" href="#">1</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

@endsection