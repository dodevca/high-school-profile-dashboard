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
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Berita</h4>
                </div>
            </div>
            <div class="card-body">
                {{-- Notifikasi Error --}}
                @if (session()->has('errors'))
                    <div class="alert alert-warning my-3 d-flex align-items-start" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <ul class="mb-0 ps-3">
                            @foreach (session('errors') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Form Update --}}
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    {{-- ID Berita --}}
                    <div class="mb-3 d-none">
                        <label for="news-id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="news-id" name="news-id" value="123" required>
                    </div>

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="Judul Dummy Berita" required>
                    </div>

                    {{-- Isi Berita --}}
                    <div class="mb-3">
                        <label for="content-textarea" class="form-label">Isi Berita</label>
                        <textarea class="form-control" id="content-textarea" name="content" rows="16">Isi berita dummy yang panjang dan mendetail...</textarea>
                    </div>

                    {{-- Gambar Headline --}}
                    <div class="mb-3">
                        <label class="form-label">Headline Saat Ini</label><br>
                        <a href="images/placeholder.webp" class="btn btn-outline-secondary" target="_blank">
                            <i class="bi bi-eye me-2"></i>Lihat Headline
                        </a>
                    </div>

                    {{-- Separator --}}
                    <div class="position-relative border-top my-4">
                        <div class="position-absolute bg-white px-3 py-1" style="top:50%;left:50%;transform:translate(-50%,-50%);">
                            <span class="text-muted">atau ganti headline</span>
                        </div>
                    </div>

                    {{-- Upload File Baru --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Unggah Gambar Baru</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/jpeg,image/jpg,image/png,image/gif,image/x-eps,application/pdf">
                        <div class="form-text">Format: jpg, png, gif, pdf, eps</div>
                    </div>

                    {{-- Tombol --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
