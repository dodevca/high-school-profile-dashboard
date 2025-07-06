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
                    <h4 class="card-title">Buat Berita Baru</h4>
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

                {{-- Form Upload --}}
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    <div class="mb-3">
                        <label for="content-textarea" class="form-label">Isi Berita</label>
                        <textarea class="form-control" id="content-textarea" name="content" rows="16"></textarea>
                    </div>

                    <div class="position-relative border-top my-4">
                        <div class="position-absolute bg-white px-3 py-1" style="top:50%; left:50%; transform:translate(-50%,-50%);">
                            <span class="text-muted">Tambah headline</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Unggah Gambar</label>
                        <input class="form-control" type="file" id="image" name="image" accept="image/jpeg,image/jpg,image/png,image/gif">
                        <div class="form-text">Format: jpg, png, gif</div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="#" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection