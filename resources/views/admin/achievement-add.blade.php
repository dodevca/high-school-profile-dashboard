@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Prestasi'],
        ]
    ])
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-column flex-md-row align-items-center mb-3">
                    <div class="mb-3 mb-md-0 w-100 w-md-auto">
                        <a href="#" class="btn btn-primary w-100 w-md-auto">
                            <i class="bi bi-plus me-1"></i>Tambah Prestasi
                        </a>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead class="table-light">
                            <tr>
                                <th>Jenis Prestasi</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Tingkat</th>
                                <th>Tahun</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 5; $i++)
                                <tr>
                                    <td>Akademik</td>
                                    <td>Nama Siswa {{ $i + 1 }}</td>
                                    <td>Rekayasa Perangkat Lunak</td>
                                    <td>Nasional</td>
                                    <td>202{{ $i }}</td>
                                    <td>
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="#" class="btn btn-outline-primary btn-sm">
                                                <i class="bi bi-pen"></i> Edit
                                            </a>
                                            <a href="#" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor
                        </tbody>
                        <tfoot class="table-light">
                            <tr>
                                <th>Jenis Prestasi</th>
                                <th>Nama Siswa</th>
                                <th>Jurusan</th>
                                <th>Tingkat</th>
                                <th>Tahun</th>
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