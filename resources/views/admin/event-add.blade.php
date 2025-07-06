@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Agenda'],
        ]
    ])
    {{-- Breadcrumb --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#"><i class="bi bi-house me-1"></i>Beranda</a></li>
        <li class="breadcrumb-item"><a href="#">Agenda</a></li>
        <li class="breadcrumb-item active" aria-current="page">Buat</li>
    </ol>
</nav>

{{-- Content Section --}}
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Buat Agenda Baru</h4>
            </div>
            <div class="card-body">
                @if (session('errors'))
                    <div class="alert alert-warning my-3" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <ul class="mb-0 ps-3">
                            @foreach (session('errors') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="10" required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date-start" class="form-label">Tanggal Mulai</label>
                            <div class="border rounded p-3 bg-light">
                                <input type="text" id="inline-date" class="form-control d-none" name="date-start" readonly required>
                                <span class="text-muted">Tanggal akan dipilih via kalender (flatpickr)</span>
                            </div>
                            <input type="time" class="form-control mt-3" id="time" name="time-start" required>
                        </div>

                        <div class="col-md-6">
                            <label for="date-end" class="form-label">Tanggal Selesai</label>
                            <div class="border rounded p-3 bg-light">
                                <input type="text" id="inline-date1" class="form-control d-none" name="date-end" readonly required>
                                <span class="text-muted">Tanggal akan dipilih via kalender (flatpickr)</span>
                            </div>
                            <input type="time" class="form-control mt-3" id="time1" name="time-end" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="#" class="btn btn-danger ms-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection