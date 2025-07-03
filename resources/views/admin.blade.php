<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('meta_title', 'Dashboard')</title>
    <meta content="@yield('meta_description', 'Dashboard')" name="description">
    <meta content="@yield('meta_keyword', 'Dashboard')" name="keywords">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/logo.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel='stylesheet'>
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    @yield('stylesheet')
</head>
<body id="page-top">
    <div id="wrapper">
        <ul class="navbar-nav accordion bg-gradient-primary sidebar sidebar-dark" id="accordionSidebar">
            <li class="d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.home') }}" class="align-items-center d-flex justify-content-center sidebar-brand">
                    <img src="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/placeholder.webp') }}" alt="" class="img-fluid" style="max-width: 36px">
                    <div class="ms-3 sidebar-brand-text">{{ $school->name }}</div>
                </a>
                <div class="d-none d-md-inline text-center">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </li>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                <a href="{{ route('admin.home') }}" class="nav-link">
                    <i class='bx bx-home-alt'></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Konten</div>
            <li class="nav-item {{ request()->routeIs('admin.news.*') ? 'active' : '' }}">
                <a href="{{ route('admin.news.index') }}" class="nav-link">
                    <i class='bx bxs-news'></i>
                    <span>Berita</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.announcement.*') ? 'active' : '' }}">
                <a href="{{ route('admin.announcement.index') }}" class="nav-link">
                    <i class='bx bxs-megaphone'></i>
                    <span>Pengumuman</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.event.*') ? 'active' : '' }}">
                <a href="{{ route('admin.event.index') }}" class="nav-link">
                    <i class='bx bxs-calendar-event'></i>
                    <span>Agenda</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.modul.*') ? 'active' : '' }}">
                <a href="{{ route('admin.modul.index') }}" class="nav-link">
                    <i class='bx bxs-book'></i>
                    <span>Modul</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.achievement.*') ? 'active' : '' }}">
                <a href="{{ route('admin.achievement.index') }}" class="nav-link">
                    <i class='bx bxs-trophy'></i>
                    <span>Prestasi</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.teacher.*') ? 'active' : '' }}">
                <a href="{{ route('admin.teacher.index') }}" class="nav-link">
                    <i class='bx bxs-group'></i>
                    <span>Guru dan Staff</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <a href="{{ route('admin.gallery.index') }}" class="nav-link">
                    <i class='bx bxs-image'></i>
                    <span>Galeri</span>
                </a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">Pengaturan</div>
            <li class="nav-item {{ request()->routeIs('admin.major.*') ? 'active' : '' }}">
                <a href="{{ route('admin.major.index') }}" class="nav-link">
                    <i class='bx bxs-building-house'></i>
                    <span>Jurusan</span>
                </a>
            </li>
            <li class="nav-item {{ request()->routeIs('admin.setting.*') ? 'active' : '' }}">
                <a href="{{ route('admin.setting.index') }}" class="nav-link">
                    <i class='bx bxs-cog'></i>
                    <span>Informasi Sekolah</span>
                </a>
            </li>
            <hr class="d-none d-md-block sidebar-divider">
        </ul>
        <div class="flex-column d-flex" id="content-wrapper">
            <div id="content">
                @include('partials.alerts')
                <nav class="navbar navbar-expand navbar-light bg-white shadow mb-4 topbar">
                    <button class="btn btn-link d-md-none rounded-circle me-3" type="button" id="sidebarToggleTop" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-label="Toggle sidebar">
                        <i class="bx bx-menu"></i>
                    </button>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="small d-none d-lg-inline text-gray-600 me-2">Admin</span>
                                <i class="bx bxs-user"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow animated--grow-in" aria-labelledby="userDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.profile.index') }}">
                                        <i class="bx bx-user me-2"></i> Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-log-out me-2"></i> Logout
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="sticky-footer bg-white">
                <div class="my-auto container">
                    <div class="text-center copyright my-auto">
                        <span>&copy; {{ now()->year }} <strong>SMK N 1 Seyegan</strong>. All rights reserved.</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <!-- <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    @yield('script')
</body>
</html>