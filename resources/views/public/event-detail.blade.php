@extends('public')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="rounded shadow p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <span class="bg-primary text-white rounded-5 px-3 py-2" style="font-size: 13px">
                        Agenda {{ $event->type == 'Internal' ? $event->type : 'Eksternal' }}
                    </span>
                </div>
                <h2>{{ $event->title }}</h2>
                <p class="mb-0">Dipublikasikan pada {{ $event->date }}</p>
            </div>
            <div class="card border-0 mt-4">
                <div class="card-body">
                    @if($event->image)
                        <div class="text-center">
                            <img src="{{ asset('storage/' . $event->image) }}" class="card-img-top" style="max-width: 360px" alt="...">
                        </div>
                    @endif
                    <div class="d-flex flex-column flex-md-row align-items-center justify-content-center mb-3 py-3 gap-3">
                        <div class="rounded p-3 text-center">
                            <h4 class="fw-bold">{{ $event->date_start }}</h4>
                            <h5 class="mb-0">
                                <i class="bi bi-clock-fill text-muted me-2"></i>
                                {{ $event->time_start }}
                            </h5>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bi bi-dash-lg"></i>
                            <p class="mb-0 mx-2 d-none d-md-block">sampai</p>
                            <i class="bi bi-dash-lg"></i>
                        </div>
                        <div class="rounded p-3 text-center">
                            <h4 class="fw-bold">{{ $event->date_end }}</h4>
                            <h5 class="mb-0">
                                <i class="bi bi-clock-fill text-muted me-2"></i>
                                {{ $event->time_end }}
                            </h5>
                        </div>
                    </div>
                    <div class="pt-3 border-top">
                        {!! $event->description !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection