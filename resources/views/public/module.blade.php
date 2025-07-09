@extends('public')

@section('content')
    <section class="navigation pt-5 pb-0 mb-4">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
                <h2 class="h4 mb-0">
                    @if(!empty($search))
                        “{{ $search }}”
                    @else
                        Daftar Modul {{ strtoupper($major_code) }}
                    @endif
                </h2>
                <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                    <div class="dropdown w-100 order-2 order-lg-1">
                        <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-funnel me-2"></i>
                            {!! $sortOptions[$sort] ?? 'Terbaru' !!}
                        </button>
                        <ul class="dropdown-menu">
                            @foreach($sortOptions as $value => $label)
                                <li>
                                    <a class="dropdown-item{{ $sort === $value ? ' active' : '' }}"
                                       href="{{ request()->fullUrlWithQuery(['sort' => $value, 'page' => 1]) }}">
                                        {!! $label !!}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="search-form w-100 order-1 order-lg-2">
                        <form class="border-0 p-0 bg-transparent" method="get" action="{{ route('module', $major_code) }}" style="min-width:280px">
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
        <div class="container overflow-hidden">
            @if($modules->count())
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Kelas</th>
                                <th scope="col">Semester</th>
                                <th scope="col">Pelajaran</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($modules as $m)
                                <tr>
                                    <td>{{ $m->title }}</td>
                                    <td>{{ $m->grade_level }}</td>
                                    <td>{{ $m->semester }}</td>
                                    <td>{{ $m->subject }}</td>
                                    <td class="text-end">
                                        <a href="{{ asset('storage/' . $m->file) }}" class="btn btn-primary rounded-pill" download>
                                            <i class="bx bx-cloud-download"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <nav aria-label="Page navigation">
                    {{ $modules->links('vendor.pagination.bootstrap-5') }}
                </nav>
            @else
                <div class="text-center py-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size:32px;"></i>
                    <p>Belum ada modul untuk jurusan ini.</p>
                </div>
            @endif
        </div>
    </section>
@endsection