@extends('public')

@section('content')
    <section class="navigation pt-5 pb-0 mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
                <h2 class="h4 mb-0">
                    @if(!empty($search))
                        “{{ $search }}”
                    @else
                        Daftar Album
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
                        <form class="border-0 p-0 bg-transparent" method="get" action="{{ route('gallery.index') }}" style="min-width:280px">
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
    <section class="pb-5">
        <div class="container">
            @if($albums->count())
                <div class="row">
                    @foreach($albums as $album)
                        <div class="col-lg-4 col-md-6 mb-4">
                            <a href="{{ route('gallery.view', [$album->id, $album->slug]) }}">
                                <div class="rounded shadow">
                                    <img src="{{ asset($album->thumbnail ? 'storage/'.$album->thumbnail : 'images/placeholder.webp') }}" class="w-100 h-auto rounded-top" style="aspect-ratio: 4/3; object-fit: cover;" alt="{{ $album->title }}">
                                    <div class="p-3">
                                        <h4 class="mb-1">{{ $album->title }}</h4>
                                        <p class="text-muted mb-0">
                                            <i class="bx bx-calendar me-1"></i>
                                            {{ $album->created_at_formatted }}
                                            &nbsp;|&nbsp;
                                            <i class="bx bx-image me-1"></i>
                                            {{ $album->gallery_image_count }} gambar
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation">
                    {{ $albums->links('vendor.pagination.bootstrap-5') }}
                </nav>
            @else
                <div class="text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada album.</p>
                </div>
            @endif
        </div>
    </section>
    <section>
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <a href="{{ route('teacher') }}" class="btn btn-primary rounded-5" tabindex="-1" role="button" aria-disabled="true">
                    <i class="bx bx-chevron-left me-2"></i>Sebelumnya
                </a>
                <a href="#" class="btn btn-primary rounded-5 disabled invisible">
                    Selanjutnya<i class="bx bx-chevron-right ms-2"></i>
                </a>
            </div>
            <div class="static-pagination d-flex align-items-center justify-content-evenly gap-3 mt-3">
                <h5 class="text-end mb-0">Tenaga Pendidik</h5>
                <h5 class="small mb-0"></h5>
            </div>
        </div>
    </section>
@endsection
