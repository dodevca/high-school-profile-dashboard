@extends('public')

@section('content')
    <section class="navigation pt-5 pb-0 mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
                <h2 class="h4 mb-0">
                    @if(!empty($search))
                        “{{ $search }}”
                    @else
                        Pengumuman
                    @endif
                </h2>
                <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                    <div class="dropdown me-2 order-3 order-lg-2">
                        <button class="btn btn-outline-secondary dropdown-toggle rounded w-100"
                                type="button"
                                id="majorFilterDropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <i class="bi bi-funnel me-2"></i>
                            {{ $filterOptions[$majorId] ?? 'Semua Jurusan' }}
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="majorFilterDropdown">
                            @foreach($filterOptions as $id => $name)
                                <li>
                                    <a class="dropdown-item{{ $majorId == $id ? ' active' : '' }}"
                                    href="{{ request()->fullUrlWithQuery(['major_id' => $id, 'page' => 1]) }}">
                                        {{ $name }}
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
                        <form class="border-0 p-0 bg-transparent" method="get" action="{{ route('announcement.index') }}" style="min-width:280px">
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
        <div class="container">
            @if($announcements->count())
                <div class="row">
                    @foreach($announcements as $a)
                        <div class="col-lg-4 col-md-6 {{ $loop->first ? '' : 'mt-3 mt-md-0' }}">
                            <div class="icon-box text-start rounded p-3 shadow-sm">
                                <div class="d-flex align-items-center justify-content-between mb-4">
                                    <span class="badge text-bg-info">{{ $a->major_code }}</span>
                                    <p class="text-end text-muted mb-0">{{ $a->created_at_formatted }}</p>
                                </div>
                                <h4>
                                    <a href="{{ route('announcement.view', [$a->id, $a->slug]) }}">
                                        {{ $a->title }}
                                    </a>
                                </h4>
                                <p>{{ $a->content }}</p>
                                <div class="d-flex justify-content-end mt-3">
                                    <a href="{{ route('announcement.view', [$a->id, $a->slug]) }}"
                                       class="btn-link">
                                       Lihat &raquo;
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <nav aria-label="Page navigation">
                    {{ $announcements->links('vendor.pagination.bootstrap-5') }}
                </nav>
            @else
                <div class="text-center">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada pengumuman.</p>
                </div>
            @endif
        </div>
    </section>
@endsection