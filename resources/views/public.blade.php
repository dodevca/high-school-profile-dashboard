<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('meta_title', 'Beranda')</title>
    <meta content="@yield('meta_description', 'Beranda')" name="description">
    <meta content="@yield('meta_keyword', 'Beranda')" name="keywords">
    <meta name="robots" content="noindex, nofollow" />
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel='stylesheet'>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('home') }}"><img src="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/logo.png') }}" alt="" class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar fw-bold">
                <ul>
                    <li><a class="{{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="{{ request()->routeIs('greeting') ? 'active' : '' }}" href="{{ route('greeting') }}">Sambutan</a></li>
                            <li><a class="{{ request()->routeIs('information') ? 'active' : '' }}" href="{{ route('information') }}">Informasi Sekolah</a></li>
                            <li><a class="{{ request()->routeIs('teacher') ? 'active' : '' }}" href="{{ route('teacher') }}">Tenaga Pendidik</a></li>
                            <li><a class="{{ request()->routeIs('gallery.*') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Galeri</a></li>
                        </ul>
                    </li>
                    <li><a class="{{ request()->routeIs('achievement') ? 'active' : '' }}" href="{{ route('achievement') }}">Prestasi</a></li>
                    <li class="dropdown"><a href="#"><span>Akademik</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="{{ request()->routeIs('module.index', 1) ? 'active' : '' }}" href="{{ route('module.index', 1) }}">TKJ</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Informasi</span><i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="{{ request()->routeIs('announcement.*') ? 'active' : '' }}" href="{{ route('announcement.index') }}">Pengumuman</a></li>
                            <li><a class="{{ request()->routeIs('event.*') ? 'active' : '' }}" href="{{ route('event.index') }}">Agenda</a></li>
                        </ul>
                    </li>
                    <li><a class="{{ request()->routeIs('news.*') ? 'active' : '' }}" href="{{ route('news.index') }}">Blog</a></li>
                </ul>
                <i class="bx bx-menu mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    @yield('hero')
    <main id="main" class="bg-light">
        @yield('content')
    </main>
    <footer class="bg-dark text-light pt-5">
        <div class="container">
            <div class="row gy-4 align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-3">{{ $school->name ?? 'Nama Sekolah' }}</h5>
                    <p class="mb-1"><i class="bx bx-map me-2"></i>{{ $school->address ?? 'Alamat sekolah' }}</p>
                    <p class="mb-1"><i class="bx bx-phone me-2"></i>{{ $school->phone ?? 'Nomor telepon sekolah' }}</p>
                    <p class="mb-3"><i class="bx bx-envelope me-2"></i>{{ $school->email ?? 'Email sekolah' }}</p>
                    <div class="d-flex gap-2">
                        <a href="#" class="text-white"><i class="bx bxl-facebook fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bx bxl-instagram fs-4"></i></a>
                        <a href="#" class="text-white"><i class="bx bxl-youtube fs-4"></i></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <h5 class="mb-3">Navigasi</h5>
                    <ul class="list-unstyled">
                        <li><a class="text-light text-decoration-none" href="{{ route('teacher') }}">Tenaga Pendidik</a></li>
                        <li><a class="text-light text-decoration-none" href="{{ route('gallery.index') }}">Galeri</a></li>
                        <li><a class="text-light text-decoration-none" href="{{ route('announcement.index') }}">Pengumuman</a></li>
                        <li><a class="text-light text-decoration-none" href="{{ route('news.index') }}">Blog</a></li>
                    </ul>
                </div>
            </div>
            <hr class="border-light my-4">
            <div class="text-center pb-3 small">
                &copy; {{ now()->year }} <strong>{{ $school->name ?? 'Nama Sekolah' }}</strong>. All rights reserved.
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>