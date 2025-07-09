@extends('public')

@section('content')
    <section class="navigation pt-5 pb-0 mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
                <h2 class="h4 mb-0">
                    @if(!empty($search))
                        “{{ $search }}”
                    @else
                        Blog
                    @endif
                </h2>
                <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                    <div class="dropdown w-100 order-2 order-lg-1">
                        <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-funnel me-2"></i>
                            {{ $sortOptions[$sort] ?? 'Terbaru' }}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($sortOptions as $value => $label)
                                <li>
                                    <a class="dropdown-item{{ $sort === $value ? ' active' : '' }}"
                                       href="{{ request()->fullUrlWithQuery(['sort' => $value, 'page' => 1]) }}">
                                        {{ $label }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-form w-100 order-1 order-lg-2">
                        <form class="border-0 p-0 bg-transparent" method="get" action="{{ route('news.index') }}" style="min-width:280px">
                            <div class="input-group">
                                <input class="form-control" type="search" name="search" value="{{ $search }}" placeholder="Cari disini ...">
                                <button class="btn btn-primary"><i class="bx bx-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="blog" class="blog pb-5">
        <div class="container" data-aos="fade-up">
            @if($news->count())
                <div class="row">
                    @foreach($news as $n)
                        <div class="col-lg-4 col-md-6 mb-4 entries">
                            <article class="d-flex flex-column justify-content-between h-100 entry rounded border p-0 pb-4">
                                <img src="{{ $n->thumbnail ? asset('storage/' . $n->thumbnail) : asset('images/placeholder.webp') }}" class="img-fluid rounded-top" alt="Gambar Berita">
                                <div class="py-2 px-4">
                                    <h2 class="entry-title fs-5 fw-bold">
                                        <a href="{{ route('news.view', [$n->id, $n->slug]) }}">
                                            {{ $n->title }}
                                        </a>
                                    </h2>
                                    <div class="entry-meta">
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex align-items-center">
                                            <i class="bx bx-time me-1"></i>
                                            <time datetime="{{ $n->date }}">{{ $n->date_human }}</time>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="entry-content">
                                        <p>{{ $n->content }}</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center justify-content-end pe-4">
                                    <a href="{{ route('news.view', [$n->id, $n->slug]) }}" class="btn btn-primary">Selengkapnya</a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation">
                    {{ $news->links('vendor.pagination.bootstrap-5') }}
                </nav>
            @else
                <div class="text-center">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada berita.</p>
                </div>
            @endif
        </div>
    </section>
@endsection