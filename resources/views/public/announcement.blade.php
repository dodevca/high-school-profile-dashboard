@extends('public')

@section('content')

<section id="" class="navigation pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0">
                {{-- Dummy Query --}}
                {{ !empty(request('q')) ? 'Hasil dari : ' . ucwords(request('q')) : 'Pengumuman SMK N 2 Kupang' }}
            </h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel me-2"></i>{{ ucwords(request('f', 'Terbaru')) }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Terbaru</a></li>
                        <li><a class="dropdown-item" href="#">Terlama</a></li>
                    </ul>
                </div>
                <div class="search-form w-100 order-1 order-lg-2">
                    <form method="get" class="border border-secondary rounded d-flex">
                        <input type="text" id="search" name="q" value="{{ request('q') }}" placeholder="Cari disini ..." class="form-control rounded-start">
                        <button type="submit" class="btn btn-primary rounded-end"><i class="bi bi-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="blog" class="blog py-5">
    <div class="container" data-aos="fade-up">
        @php
            $announcements = [
                [
                    'announcement_id' => 1,
                    'slug' => 'contoh-pengumuman',
                    'title' => 'Contoh Judul Pengumuman',
                    'date' => now()->toDateString(),
                    'timeElapsed' => '2 hari lalu',
                    'important' => true,
                    'content' => 'Ini adalah isi pengumuman yang cukup panjang untuk ditampilkan sebagai ringkasan.'
                ],
                // Tambahkan dummy lainnya jika perlu
            ];
        @endphp

        @if(count($announcements) > 0)
            <div class="row">
                @foreach($announcements as $announcement)
                    <div class="col-lg-4 col-md-6 mb-4 entries">
                        <article class="d-flex flex-column justify-content-between h-100 entry rounded border p-3">
                            <div>
                                <h2 class="entry-title fs-5 fw-bold">
                                    <a href="#">{{ $announcement['title'] }}</a>
                                </h2>
                                <div class="entry-meta mb-2">
                                    <ul class="list-unstyled mb-0">
                                        <li class="d-flex align-items-center mb-1">
                                            <i class="bi bi-clock me-2"></i>
                                            <time datetime="{{ \Carbon\Carbon::parse($announcement['date'])->format('Y-m-d') }}">
                                                {{ $announcement['timeElapsed'] }}
                                            </time>
                                        </li>
                                        @if($announcement['important'])
                                            <li class="d-flex align-items-center">
                                                <div class="d-inline-flex align-items-center bg-warning px-2 py-1 rounded-5 text-white">
                                                    <i class="bi bi-exclamation-lg me-1"></i>
                                                    <span>Penting</span>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="entry-content">
                                    <p>
                                        {{ \Illuminate\Support\Str::limit(strip_tags($announcement['content']), 150, '...') }}
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center justify-content-end">
                                <a href="#" class="btn btn-primary">Selengkapnya</a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Tidak ada pengumuman.</p>
            </div>
        @endif

        {{-- Pagination (Bootstrap 5.3 style) --}}
        <nav class="mt-4 d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item disabled"><span class="page-link">«</span></li>
                <li class="page-item active"><span class="page-link">1</span></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">»</a></li>
            </ul>
        </nav>
    </div>
</section>

@endsection