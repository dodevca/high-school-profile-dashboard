@extends('public')

@section('content')
<!-- @extends('layouts.app')

@section('main') -->
<section class="py-5">
    <div class="container">
        <div class="row g-5 align-items-center">
            <div class="col-md-5">
                <div class="card shadow-sm border-0 rounded overflow-hidden">
                    <img src="{{ asset('images/placeholder.webp') }}" alt="Foto {{ $teacher->name ?? 'Guru' }}" class="img-fluid w-100" style="aspect-ratio: 4 / 3; object-fit: cover;">
                </div>
            </div>
            <div class="col-md-7">
                <h2 class="fw-bold">{{ $teacher->name ?? 'Nama Guru' }}</h2>
                <h5 class="text-muted mb-3">{{ $teacher->role ?? 'Jabatan Guru' }}</h5>
                <p class="mb-4">
                    {{ $teacher->description ?? 'Deskripsi tentang guru ini akan ditampilkan di sini. Anda dapat menambahkan latar belakang pendidikan, pengalaman mengajar, dan lainnya.' }}
                </p>
                <div class="d-flex gap-3">
                    @if(!empty($teacher->twitter))
                        <a href="{{ $teacher->twitter }}" class="text-primary"><i class="bi bi-twitter"></i></a>
                    @endif
                    @if(!empty($teacher->facebook))
                        <a href="{{ $teacher->facebook }}" class="text-primary"><i class="bi bi-facebook"></i></a>
                    @endif
                    @if(!empty($teacher->instagram))
                        <a href="{{ $teacher->instagram }}" class="text-primary"><i class="bi bi-instagram"></i></a>
                    @endif
                    @if(!empty($teacher->linkedin))
                        <a href="{{ $teacher->linkedin }}" class="text-primary"><i class="bi bi-linkedin"></i></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection