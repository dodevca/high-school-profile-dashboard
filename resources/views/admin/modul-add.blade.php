@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Modul'],
        ]
    ])
    {{-- BREADCRUMB --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><i class="bi bi-house me-1"></i>Beranda</a>
        </li>
        <li><i class="bi bi-chevron-compact-right mx-1"></i></li>
        <li class="breadcrumb-item">
            <a href="#">Modul</a>
        </li>
        <li><i class="bi bi-chevron-compact-right mx-1"></i></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah</li>
    </ol>
</nav>

{{-- CONTENT --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-start">
                <h4 class="card-title">Tambah Modul</h4>
            </div>
            <div class="card-body">
                @if (session('errors'))
                    <div class="alert alert-warning my-3" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <ul class="mb-0 ps-3">
                                @foreach (session('errors') as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="Judul Dummy" required>
                    </div>

                    <div class="mb-3">
                        <label for="major" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="major" name="major" value="Teknik Informatika" required>
                    </div>

                    <div class="mb-3">
                        <label for="writer" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="writer" name="writer" value="Nama Penulis" required>
                    </div>

                    <div class="mb-3">
                        <label for="teacher" class="form-label">Pengajar</label>
                        <input type="text" class="form-control" id="teacher" name="teacher" value="Nama Pengajar" required>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tagar</label>
                        <input type="text" class="form-control" id="tags" name="tags" placeholder="Contoh: Laravel, Bootstrap, Blade">
                        <div class="form-text">Tulis tagar dipisahkan menggunakan tanda koma (,).</div>
                    </div>

                    <div class="mb-3">
                        <label for="modul" class="form-label">Unggah Modul</label>
                        <input class="form-control" type="file" id="modul" name="modul" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx" required>
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="#" class="btn btn-danger">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection