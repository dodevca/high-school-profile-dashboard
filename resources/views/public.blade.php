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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body>
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">
            <div class="contact-info d-flex align-items-center">
                <i class="bi bi-envelope-fill d-flex align-items-center"><a href="mailto:contact@example.com">smkn1seyegan@gmail.com</a></i>
                <i class="bi bi-telephone-fill d-flex align-items-center ms-4"><span>(0274) 866442</span></i>
            </div>
            <div class="social-links d-none d-md-flex align-items-center">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
            </div>
            </div>
    </section>
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <a href="{{ route('home.index') }}"><img src="{{ asset('images/logo.png') }}" alt="" class="img-fluid"></a>
            </div>
            <nav id="navbar" class="navbar fw-bold">
                <ul>
                    <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.index') }}">Beranda</a></li>
                    <li class="dropdown"><a href="#"><span>Profil</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.greeting') }}">Sambutan</a></li>
                            <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.vision') }}">Visi Misi</a></li>
                            <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.teachers') }}">Tenaga Pendidik</a></li>
                            <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('home.infrastructure') }}">Sarana Prasarana</a></li>
                            <li><a class="{{ request()->routeIs('home.index') ? 'active' : '' }}" href="{{ route('gallery.index') }}">Galeri</a></li>
                        </ul>
                    </li>
                    <li><a class="{{ request()->routeIs('achievement.index') ? 'active' : '' }}" href="{{ route('achievement.index') }}">Prestasi</a></li>
                    <li class="dropdown"><a href="#"><span>Akademik</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li class="dropdown {{ request()->routeIs('modul.index') ? 'active' : '' }}">
                                <a href="#"><span>Modul</span> <i class="bi bi-chevron-right"></i></a>
                                <ul>
                                    <li><a href="#">TKJ</a></li>
                                </ul>
                                </li>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Informasi</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a class="{{ request()->routeIs('announcement.index') ? 'active' : '' }}" href="{{ route('announcement.index') }}">Pengumuman</a></li>
                            <li><a class="{{ request()->routeIs('event.index') ? 'active' : '' }}" href="{{ route('event.index') }}">Agenda</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('news.index') }}">Blog</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
        </div>
    </header>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>