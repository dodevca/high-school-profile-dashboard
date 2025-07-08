@extends('public')

@section('content')

<section id="blog" class="blog py-5">
    <div class="container">
        <div class="row">
            {{-- Konten Utama --}}
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                    <div class="entry-img mb-3">
                        <img src="{{ asset('images/placeholder.webp') }}" alt="Gambar Berita" class="img-fluid rounded">
                    </div>
                    <h2 class="entry-title fs-3 fw-bold">
                        Judul Berita Dummy
                    </h2>
                    <div class="entry-meta mb-3">
                        <ul class="list-unstyled d-flex gap-3">
                            <li class="d-flex align-items-center">
                                <i class="bi bi-clock me-2"></i>
                                <time datetime="2024-01-01">1 Januari 2024</time>
                            </li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        <p>
                            Ini adalah isi lengkap dari berita dummy. Konten ini digunakan untuk menampilkan bagaimana berita akan ditampilkan dalam layout Laravel Blade.
                            Anda dapat mengganti isi ini dengan data dari controller Laravel.
                        </p>
                    </div>
                </article>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="sidebar-title">Search</h3>
                    <div class="sidebar-item search-form mb-4">
                        <form method="get" action="#" class="border border-secondary rounded d-flex">
                            <input type="text" id="search" name="q" value="{{ request('q') }}" placeholder="Cari disini ..." class="form-control rounded-start">
                            <button type="submit" class="btn btn-primary rounded-end"><i class="bi bi-search"></i></button>
                        </form>
                    </div>

                    <h3 class="sidebar-title">Berita Terbaru</h3>
                    <div class="sidebar-item recent-posts">
                        @php
                            $recents = [
                                [
                                    'title' => 'Berita Dummy 1',
                                    'date' => '8 Juli 2025',
                                    'image' => 'images/placeholder.webp',
                                ],
                                [
                                    'title' => 'Berita Dummy 2',
                                    'date' => '7 Juli 2025',
                                    'image' => 'images/placeholder.webp',
                                ],
                            ];
                        @endphp

                        @foreach($recents as $news)
                            <div class="post-item d-flex mb-3">
                                <img src="{{ asset($news['image']) }}" alt="Thumbnail" class="flex-shrink-0 me-3 rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h4 class="mb-1 fs-6">
                                        <a href="#">{{ $news['title'] }}</a>
                                    </h4>
                                    <time datetime="2025-07-08">{{ $news['date'] }}</time>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection