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
                    <h4 class="card-title">Buat Pengumuman Baru</h4>
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

                    {{-- Judul --}}
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>

                    {{-- Isi Pengumuman --}}
                    <div class="mb-3">
                        <label for="content-textarea" class="form-label">Isi Pengumuman</label>
                        <textarea class="form-control" id="content-textarea" name="content" rows="16"></textarea>
                    </div>

                    {{-- Upload Lampiran --}}
                    <div class="mb-3">
                        <label for="attachment" class="form-label">Unggah Lampiran</label>
                        <input class="form-control" type="file" id="attachment" name="attachment" accept="image/jpeg,image/jpg,image/png,image/gif,application/pdf,image/x-eps">
                        <div class="form-text">Format: jpg, png, gif, pdf, eps</div>
                    </div>

                    {{-- Checkbox Penting --}}
                    <div class="form-check form-check-warning mb-3">
                        <input class="form-check-input" type="checkbox" value="1" id="important" name="important">
                        <label class="form-check-label text-warning" for="important">
                            Tandai sebagai pengumuman penting
                        </label>
                    </div>

                    {{-- Tombol Aksi --}}
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="#" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection