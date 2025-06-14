@extends('admin')

@section('content')
<div class="row g-4">
    @foreach(['Berita' => 'news', 'Pengumuman' => 'announcement', 'Agenda' => 'event', 'Modul' => 'modul', 'Prestasi' => 'achievement'] as $label => $slug)
        <div class="col-md-6 col-lg-3">
            <a href="{{ route('admin.' . $slug . '.index') }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h6 class="mb-0 text-dark">{{ $label }}</h6>
                            <span class="badge bg-success">Aktif</span>
                        </div>
                        <h3 class="fw-bold text-primary">123</h3>
                        <p class="mb-0 text-muted">Total {{ strtolower($label) }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
<div class="row mt-5">
    <div class="col-12 mb-3">
        <h4 class="fw-semibold">Pintasan</h4>
    </div>
    @php
        $shortcuts = [
            ['Buat Berita', 'berita/tambah', 'bi-newspaper'],
            ['Buat Pengumuman', 'pengumuman/tambah', 'bi-megaphone-fill'],
            ['Tambah Agenda', 'agenda/tambah', 'bi-calendar-plus-fill'],
            ['Galeri Baru', 'galeri/tambah', 'bi-image-fill'],
            ['Tambah Modul', 'modul/tambah', 'bi-book-fill'],
            ['Tambah Prestasi', 'prestasi/tambah', 'bi-trophy-fill'],
        ];
    @endphp
    @foreach($shortcuts as [$title, $url, $icon])
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <a href="{{ url($url) }}" class="text-decoration-none">
                <div class="card shadow-sm border-0 text-center h-100">
                    <div class="card-body">
                        <i class="bi {{ $icon }} text-primary mb-3" style="font-size: 2.5rem;"></i>
                        <h6 class="text-dark">{{ $title }}</h6>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
@endsection