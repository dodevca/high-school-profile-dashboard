@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Pengumuman'],
        ]
    ])
    
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Edit Pengumuman</h4>
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

                {{-- Form --}}
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- ID (hidden) --}}
                    <input type="hidden" name="announcement-id" value="123">

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="Judul Dummy" required>
                    </div>

                    {{-- Isi Pengumuman --}}
                    <div class="mb-3">
                        <label for="content-textarea" class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control" id="content-textarea" name="content" rows="16">Isi dummy dari pengumuman yang bisa diedit.</textarea>
                    </div>

                    {{-- Lampiran Saat Ini --}}
                    <div class="mb-3">
                        <label for="current-attachment" class="form-label">Lampiran</label>
                        <br>
                        <a href="images/placeholder.webp" target="_blank" class="btn btn-outline-secondary">
                            <i class="bi bi-eye me-2"></i>Lihat lampiran
                        </a>
                    </div>

                    {{-- Divider --}}
                    <div class="position-relative border-top my-4">
                        <div class="position-absolute bg-white px-2" style="top:50%;left:50%;transform:translate(-50%,-50%);">
                            <span class="text-muted">atau ganti lampiran</span>
                        </div>
                    </div>

                    {{-- Ganti Lampiran --}}
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Unggah PDF atau Gambar</label>
                        <input class="form-control" type="file" id="attachment" name="attachment" accept="image/jpeg,image/jpg,image/gif,image/png,application/pdf,image/x-eps">
                    </div>

                    {{-- Checkbox Penting --}}
                    <div class="form-check form-check-warning mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="important" name="important" checked>
                        <label class="form-check-label text-warning" for="important">
                            Tandai sebagai pengumuman penting
                        </label>
                    </div>

                    {{-- Tombol Aksi --}}
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection