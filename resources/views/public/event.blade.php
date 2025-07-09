@extends('public')

@section('content')
    <section class="navigation pt-5 pb-0 mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
                <h2 class="h4 mb-0">
                    @if(!empty($search))
                        “{{ $search }}”
                    @else
                        Agenda
                    @endif
                </h2>
                <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                    <div class="dropdown me-2 order-3 order-lg-2">
                        <button class="btn btn-outline-secondary dropdown-toggle rounded w-100"
                                type="button"
                                id="typeFilterDropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-funnel me-2"></i>
                            {{ $filterOptions[$type] }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="typeFilterDropdown">
                            @foreach($filterOptions as $val => $label)
                                <li>
                                    <a class="dropdown-item{{ $type === $val ? ' active' : '' }}"
                                    href="{{ request()->fullUrlWithQuery(['type'=>$val,'page'=>1]) }}">
                                        {{ $label }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
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
                        <form class="border-0 p-0 bg-transparent" method="get" action="{{ route('event.index') }}" style="min-width:280px">
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
    <section id="counts" class="counts pb-5">
        <div class="container">
            @if($events->count())
                <div class="row g-3">
                    @foreach($events as $e)
                        <div class="col-lg-3 col-md-6 d-md-flex align-items-md-start mb-4">
                            <div class="count-box rounded shadow-sm p-3 w-100">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <span class="purecounter m-0 mb-2" data-purecounter-start="0" data-purecounter-end="{{ $e->day }}" data-purecounter-duration="0">
                                            {{ $e->day }}
                                        </span>
                                        <h3 class="mb-0">{{ $e->month }}</h3>
                                    </div>
                                    <div class="px-2 py-1 rounded-5 bg-success text-white small">
                                        <div class="d-flex align-items-center">
                                            {{ $e->start_time_formatted }}
                                        </div>
                                    </div>
                                </div>
                                <h4 class="mt-4">{{ $e->title }}</h4>
                                <p class="small text-info">{{ $e->type == 'Internal' ? $e->type : 'Eksternal' }}</p>
                                <p>{{ $e->description }}</p>
                                <a href="{{ route('event.view', [$e->id, $e->slug]) }}"
                                class="text-end d-block mt-2">
                                    Selengkapnya &raquo;
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation">
                    {{ $events->links('vendor.pagination.bootstrap-5') }}
                </nav>
            @else
                <div class="text-center">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px;"></i>
                    <p>Tidak ada agenda.</p>
                </div>
            @endif
        </div>
    </section>
@endsection