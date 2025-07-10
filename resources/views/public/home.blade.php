@extends('public')

@section('content')
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active" style="background-image: url('{{ $information->hero ? asset('storage/' . $information->hero) : asset('images/placeholder.webp') }}')">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <p class="animate__animated animate__fadeInUp">Selamat Datang di</p>
                                <h2 class="animate__animated animate__fadeInDown">{{ $school->name }}</h2>
                            </div>
                        </div>
                    </div>
                    @if($announcements->count())
                        <div class="carousel-item" style="background-image: url('{{ $announcements[0]->image ? asset('storage/' . $announcements[0]->image) : asset('images/placeholder.webp') }}')">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">{{ $announcements[0]->title }}</h2>
                                    <p class="animate__animated animate__fadeInUp mb-4">
                                        {{ $announcements[0]->content }}
                                    </p>
                                    <a href="{{ route('announcement.view', [$events[0]->id, $events[0]->slug]) }}" class="btn btn-primary animate__animated animate__fadeInUp mb-5">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if($events->count())
                        <div class="carousel-item" style="background-image: url('{{ $events[0]->image ? asset('storage/' . $events[0]->image) : asset('images/placeholder.webp') }}')">
                            <div class="carousel-container">
                                <div class="carousel-content">
                                    <h2 class="animate__animated animate__fadeInDown">{{ $events[0]->title }}</h2>
                                    <p class="animate__animated animate__fadeInUp">
                                        {{ $events[0]->description }}
                                    </p>
                                    <a href="{{ route('event.view', [$events[0]->id, $events[0]->slug]) }}" class="btn btn-primary animate__animated animate__fadeInUp mb-5">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section id="featured" class="featured pb-5">
        <div class="container">
            <div class="row justify-content-center">
                @if($news->count())
                    @foreach($news as $key => $n)
                        <div class="col-lg-4 {{ $key > 1 ? 'mt-3 mt-lg-0' : '' }}">
                            <a href="{{ route('news.view', [$n->id, $n->slug]) }}">
                                <div class="icon-box rounded p-0 shadow-sm">
                                    <img src="{{ asset('storage/' . $n->thumbnail) }}" class="img-fluid rounded-top" style="aspect-ratio: 16 / 9; object-fit: cover;" alt="News Image">
                                    <div class="p-4">
                                        <h3 class="mb-0">{{ $n->title }}</h3>
                                        <p class="my-1 text-muted">
                                            <small>
                                                <i class="bx bx-calendar d-inline fs-6 me-1"></i>{{ $n->created_at_formatted }}
                                            </small>
                                        </p>
                                        <p>{{ $n->content }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center pb-5">
                        <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                        <p>Tidak ada berita.</p>
                    </div>
                @endif
            </div>
            @if($news->count())
                <div class="text-center mt-3">
                    <a href="{{ route('news.index') }}" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
                </div>
            @endif
        </div>
    </section>
    <section id="about" class="about py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ratio ratio-16x9 rounded-3 shadow">
                        <iframe 
                            src="{{ $information->youtube_url }}" 
                            class="rounded"
                            title="YouTube video" 
                            allow="autoplay; encrypted-media" 
                            allowfullscreen>
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-6 pt-4 pt-lg-0 content">
                    <h3 class="mb-4">Profil Singkat</h3>
                    {!! $information->short_profile !!}
                    <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-start">
                        <a href="{{ route('greeting') }}" class="btn btn-outline-primary mb-3 mb-lg-0 me-lg-2">Sambutan</a>
                        <a href="{{ route('information') }}" class="btn btn-outline-primary">Visi & Misi</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="services" class="services py-5">
        <div class="container">
            <div class="section-title text-center">
                <h2>Pengumuman</h2>
            </div>
            <div class="row justify-content-center">
                @if($announcements->count())
                    @foreach($announcements as $key => $a)
                        <div class="col-lg-4 col-md-6 {{ $key != 1 ? 'mt-3 mt-md-0' : '' }}">
                            <div class="icon-box text-start rounded p-3 shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <span class="badge text-bg-info">{{ $a->major ? $a->major->code : 'Semua' }}</span>
                                    <p class="text-end text-muted mb-0">{{ $a->created_at_formatted }}</p>
                                </div>
                                <h4><a href="{{ route('announcement.view', [$a->id, $a->slug]) }}">{{ $a->title }}</a></h4>
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('announcement.view', [$a->id, $a->slug]) }}" class="btn-link">Lihat &raquo;</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center pb-5">
                        <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                        <p>Tidak ada pengumuman.</p>
                    </div>
                @endif
            </div>
            <div class="text-center mt-3">
                <a href="{{ route('announcement.index') }}" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
            </div>
        </div>
    </section>
    <section id="counts" class="counts py-5">
        <div class="container">
            <div class="section-title text-center">
                <h2>Agenda Mendatang</h2>
            </div>
            <div class="row justify-content-center">
                @if($events->count())
                    @foreach($events as $key => $e)
                        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-start mb-4">
                            <div class="count-box rounded shadow-sm p-3 w-100">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <span class="purecounter m-0 mb-2" data-purecounter-start="0" data-purecounter-end="{{ $e->day }}" data-purecounter-duration="0">{{ $e->day }}</span>
                                        <h3 class="mb-0">{{ $e->month }}</h3>
                                    </div>
                                    <div class="px-2 py-1 rounded-5 bg-success text-white small">
                                        <div class="d-flex align-items-center">
                                            {{ $e->start_time_formatted }}
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-4">{{ $e->title }}</h4>
                                <a href="{{ route('event.view', [$e->id, $e->slug]) }}" class="text-end d-block mt-2">Selengkapnya &raquo;</a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center pb-5">
                        <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px;"></i>
                        <p>Tidak ada agenda.</p>
                    </div>
                @endif
            </div>
            @if($events->count())
                <div class="text-center mt-3">
                    <a href="{{ route('event.index') }}" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
                </div>
            @endif
        </div>
    </section>
    <section id="clients" class="clients py-5">
        <div class="container">
            <div class="section-title text-center">
                <h2>Album Terbaru</h2>
            </div>
            @if($albums->count())
                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        @foreach($albums as $g)
                            <div class="swiper-slide text-center">
                                <a href="{{ route('gallery.view', [$g->id, $g->slug]) }}">
                                    <img src="{{ asset('storage/' . $g->thumbnail) }}" class="img-fluid rounded" alt="Album Image">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination mt-4"></div>
                </div>
            @else
                <div class="text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px;"></i>
                    <p>Tidak ada album.</p>
                </div>
            @endif
        </div>
    </section>
@endsection