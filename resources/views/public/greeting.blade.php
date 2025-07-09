@extends('public')

@section('content')
    <section id="about" class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-center">
                    <img src="{{ $greeting->photo ? asset('storage/' . $greeting->photo) : asset('images/placeholder.webp') }}" class="img-fluid rounded mb-3" alt="Foto Kepala Sekolah">
                    <h2 class="h6 fw-bold text-center">{{ $greeting->author }}</h2>
                    <h6 class="fw-bold text-muted">Kepala Sekolah {{ $school->name }}</h6>
                </div>
                <div class="col-lg-8 pt-4 pt-lg-0 content">
                <h3 class="mb-3">Sambutan</h3>
                    {!! $greeting->content !!}
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <a href="#" class="btn btn-primary rounded-5 disabled invisible" tabindex="-1" role="button" aria-disabled="true">
                    <i class="bx bx-chevron-left me-2"></i>Sebelumnya
                </a>
                <a href="{{ route('information') }}" class="btn btn-primary rounded-5">
                    Selanjutnya<i class="bx bx-chevron-right ms-2"></i>
                </a>
            </div>
            <div class="static-pagination d-flex align-items-center justify-content-evenly gap-3 mt-3">
                <h5 class="text-end mb-0"></h5>
                <h5 class="small mb-0">Informasi Sekolah</h5>
            </div>
        </div>
    </section>
@endsection