@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Modul'],
        ]
    ])
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center mb-3">
                    <div class="mb-3 mb-md-0 ms-md-auto w-100 w-md-auto">
                        <a href="#" class="btn btn-primary w-100 w-md-auto">
                            <i class="bi bi-plus me-1"></i>Tambah Modul
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Jurusan</th>
                                <th>Penulis</th>
                                <th>Pengajar</th>
                                <th>Tanggal</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 1; $i <= 5; $i++)
                                <tr>
                                    <td>Modul Pembelajaran {{ $i }}</td>
                                    <td>Teknik Informatika</td>
                                    <td>Penulis {{ $i }}</td>
                                    <td>Guru {{ $i }}</td>
                                    <td>2025-07-0{{ $i }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end">
                                            <a href="#" class="btn btn-outline-primary me-2">
                                                <i class="bi bi-eye"></i> Lihat
                                            </a>
                                            <a href="#" class="btn btn-outline-secondary me-2">
                                                <i class="bi bi-pen"></i>
                                            </a>
                                            <a href="#" class="btn btn-outline-danger">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th>Judul</th>
                                <th>Jurusan</th>
                                <th>Penulis</th>
                                <th>Pengajar</th>
                                <th>Tanggal</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection