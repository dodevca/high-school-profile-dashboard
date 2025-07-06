@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Modul'],
        ]
    ])
    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#"><i class="bi bi-house me-1"></i>Beranda</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">Modul</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Judul Modul Dummy</li>
    </ol>
</nav>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-start">
                <h4 class="card-title">Edit Modul</h4>
            </div>
            <div class="card-body">
                @if (session('errors'))
                    <div class="alert alert-warning my-3" role="alert">
                        <div class="d-flex align-items-start">
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

                    <input type="hidden" name="modul-id" value="123">

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="Judul Modul Dummy" required>
                    </div>

                    <div class="mb-3">
                        <label for="major" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="major" name="major" value="Teknik Informatika" required>
                    </div>

                    <div class="mb-3">
                        <label for="writer" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="writer" name="writer" value="John Doe" required>
                    </div>

                    <div class="mb-3">
                        <label for="teacher" class="form-label">Pengajar</label>
                        <input type="text" class="form-control" id="teacher" name="teacher" value="Jane Smith" required>
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tagar</label>
                        <input type="text" class="form-control" id="tags" name="tags" value="laravel,blade,module">
                        <div class="form-text">Tulis tagar dipisahkan menggunakan tanda koma (,).</div>
                    </div>

                    <div class="mb-3">
                        <label for="current-modul" class="form-label">Modul</label>
                        <input type="text" class="form-control" id="current-modul" name="current-modul" value="modul-dummy.pdf" readonly>
                        <a href="#" class="btn btn-outline-primary w-100 mt-2">
                            <i class="bi bi-eye"></i> Tampilkan Modul
                        </a>
                    </div>

                    <div class="text-center border-top my-4 position-relative">
                        <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">ganti dengan modul baru</span>
                    </div>

                    <div class="mb-3">
                        <label for="modul" class="form-label">Ganti Modul</label>
                        <input class="form-control" type="file" id="modul" name="modul" accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx">
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