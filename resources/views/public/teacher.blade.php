@extends('public')

@section('content')
    <section id="team" class="team py-5">
        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="portfolio-flters" class="list-unstyled d-flex bg-transparent mb-0 gap-2">
                        <li data-filter="*" class="filter-active btn btn-outline-primary">Semua</li>
                        <li data-filter=".filter-0" class="btn btn-outline-primary">Kepala Sekolah</li>
                        <li data-filter=".filter-1" class="btn btn-outline-primary">Wakil Kepala Sekolah</li>
                        <li data-filter=".filter-2" class="btn btn-outline-primary">Guru</li>
                        <li data-filter=".filter-3" class="btn btn-outline-primary">Staff</li>
                        <li data-filter=".filter-4" class="btn btn-outline-primary">Lainnya</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                @if($teachers->count())
                    @foreach($teachers as $key => $t)
                        <div class="col-lg-3 col-md-4 portfolio-item filter-{{ $t->priority }}">
                            <div class="card member text-center portfolio-wrap h-100 shadow rounded">
                                <img src="{{ $t->photo ? asset('storage/' . $t->photo) : asset('images/placeholder.webp') }}" class="card-img-top mx-auto mb-3" alt="Team Member">
                                <div class="card-body text-center py-0">
                                    <h5 class="card-title p-0">{{ $t->name }}</h5>
                                    <p class="text-muted p-0 mb-1">{{ $t->position }}</p>
                                    <p class="card-text p-0">{{ $t->subject ?? '-' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <a href="{{ route('information') }}" class="btn btn-primary rounded-5">
                    <i class="bx bx-chevron-compact-left me-2"></i>Sebelumnya
                </a>
                <a href="{{ route('gallery.index') }}" class="btn btn-primary rounded-5">
                    Selanjutnya<i class="bx bx-chevron-compact-right ms-2"></i>
                </a>
            </div>
            <div class="static-pagination d-flex align-items-center justify-content-evenly gap-3 mt-3">
                <h5 class="small text-end mb-0">Informasi Sekolah</h5>
                <h5 class="small mb-0">Galeri</h5>
            </div>
        </div>
    </section>
@endsection