@extends('public')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="rounded shadow p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="bg-primary text-white rounded-5 px-3 py-2" style="font-size: 13px">
                        {{ $announcement->major_code ?? 'Semua' }}
                    </span>
                </div>
                <h2>{{ $announcement->title }}</h2>
                <div class="d-flex align-items-center gap-3">
                    <p class="mb-0">{{ $announcement->time_elapsed }}</p>
                    <div class="bg-dark" style="width:1px; height:1rem;"></div>
                    <p class="mb-0">{{ $announcement->created_at_formatted }}</p>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-8">
                    <div class="px-4">
                        {!! $announcement->content !!}
                    </div>
                </div>
                @if($announcement->image)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <h3 class="h5 text-start mb-3">Lampiran Pengumuman</h3>
                                <a href="{{ asset('storage/' . $announcement->image) }}" class="btn btn-primary mb-2" target="_blank">
                                    <i class="bx bx-show me-2"></i>Lihat Lampiran
                                </a>
                                <a href="{{ asset('storage/' . $announcement->image) }}" class="btn btn-outline-primary" download>
                                    <i class="bx bx-cloud-download me-2"></i>Unduh Lampiran
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection