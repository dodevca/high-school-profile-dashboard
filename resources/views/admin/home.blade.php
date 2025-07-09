@extends('admin')

@section('content')
    <div class="row g-3">
        @foreach([
            'Berita'      => 'news',
            'Pengumuman'  => 'announcement',
            'Agenda'      => 'event',
            'Modul'       => 'module',
        ] as $label => $slug)
            <div class="col-md-6 col-lg-3">
                <a href="{{ route('admin.' . $slug . '.index') }}" class="text-decoration-none">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h6 class="mb-0 fw-bold text-dark">{{ $label }}</h6>
                            </div>
                            <h3 class="fw-bold text-primary">
                                {{ $totals[$slug] ?? 0 }}
                            </h3>
                            <p class="mb-0 text-muted">Total {{ strtolower($label) }}</p>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="row mt-4 g-3">
        <div class="col-12">
            <h4 class="fw-semibold mb-0">Pintasan</h4>
        </div>
        @php
            $shortcuts = [
                ['Buat Berita', route('admin.news.add'), 'bxs-news'],
                ['Buat Pengumuman', route('admin.announcement.add'), 'bxs-megaphone'],
                ['Buat Agenda', route('admin.event.add'), 'bxs-calendar-plus'],
                ['Album Baru', route('admin.gallery.add'), 'bxs-image-add'],
                ['Tambah Modul', route('admin.module.add'), 'bxs-book-alt'],
                ['Tambah Prestasi', route('admin.achievement.add'), 'bxs-trophy'],
                ['Tambah Guru/Staff', route('admin.teacher.add'), 'bxs-user-plus'],
                ['Edit Sambutan', route('admin.greeting.index'), 'bxs-detail'],
            ];
        @endphp
        @foreach($shortcuts as [$title, $url, $icon])
            <div class="col-6 col-md-4 col-lg-3">
                <a href="{{ url($url) }}" class="text-decoration-none">
                    <div class="card border-0 text-center h-100">
                        <div class="card-body">
                            <i class="bx {{ $icon }} text-primary mb-3" style="font-size: 2.5rem;"></i>
                            <h6 class="text-dark">{{ $title }}</h6>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
@endsection