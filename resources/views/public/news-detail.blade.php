@extends('public')

@section('content')
<section id="blog" class="blog py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 entries">
                <article class="entry entry-single">
                    <div class="text-center mb-3">
                        <img src="{{ $news->thumbnail ? asset('storage/' . $news->thumbnail) : asset('images/placeholder.webp') }}" alt="Gambar Berita" class="img-fluid rounded">
                    </div>
                    <h2 class="entry-title fs-3 fw-bold">
                        {{ $news->title }}
                    </h2>
                    <div class="entry-meta mb-3">
                        <ul class="list-unstyled d-flex gap-3">
                            <li class="d-flex align-items-center">
                                <i class="bx bx-time me-1"></i>
                                <time datetime="{{ $news->date_iso }}">
                                {{ $news->date_human }}
                                </time>
                            </li>
                        </ul>
                    </div>
                    <div class="entry-content">
                        {!! $news->content !!}
                    </div>
                </article>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <h3 class="sidebar-title">Cari</h3>
                    <div class="sidebar-item search-form mb-4">
                        <form method="get" action="{{ route('news.index') }}" class="border border-secondary rounded d-flex">
                            <input type="text" id="search" name="search" value="{{ request('search') }}" placeholder="Cari disini …" class="form-control rounded-start">
                            <button type="submit" class="btn btn-primary rounded-end">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                    </div>
                    <h3 class="sidebar-title">Berita Terbaru</h3>
                    <div class="sidebar-item recent-posts mb-0">
                        @foreach($recentNews as $key => $post)
                            <div class="post-item d-flex">
                                <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('images/placeholder.webp') }}" alt="Thumbnail" class="flex-shrink-0 me-3 rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <h4 class="ms-0 mb-1 fs-6">
                                        <a href="{{ route('news.view', [$post->id, $post->slug]) }}">{{ $post->title }}</a>
                                    </h4>
                                    <time class="ms-0" datetime="{{ \Carbon\Carbon::parse($post->date)->format('Y-m-d') }}">
                                        {{ $post->date }}
                                    </time>
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