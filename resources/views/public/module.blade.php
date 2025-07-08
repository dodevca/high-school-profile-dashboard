@extends('public')

@section('content')
<section id="" class="pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0">
                {{ request()->query('q') ? "Hasil dari : " . ucwords(request()->query('q')) : "Daftar Modul Jurusan " . ucwords(request()->query('major', 'Permesinan')) }}
            </h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">

                <!-- Dropdown Jurusan -->
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-mortarboard-fill me-2"></i>{{ ucwords(request()->query('major', 'Permesinan')) }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Semua</a></li>
                        <li><a class="dropdown-item" href="#">Permesinan</a></li>
                    </ul>
                </div>

                <!-- Dropdown Filter -->
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel-fill me-2"></i>{{ ucwords(request()->query('f', 'terbaru')) }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Terbaru</a></li>
                        <li><a class="dropdown-item" href="#">Terlama</a></li>
                    </ul>
                </div>

                <!-- Form Pencarian -->
                <div class="search-form w-100 order-1 order-lg-2">
                    <form method="get" class="border border-secondary rounded d-flex">
                        <input type="text" id="search" name="q" value="{{ request()->query('q') }}" placeholder="Cari disini ..." class="form-control border-0">
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<section id="" class="py-4">
    <div class="container overflow-hidden">

        @php
            $dummyModules = [
                ['title' => 'Modul CNC Dasar', 'teacher' => 'Bapak Dedi', 'writer' => 'Ibu Rina', 'modul' => 'cnc-dasar.pdf'],
                ['title' => 'Modul Pneumatik', 'teacher' => 'Ibu Sari', 'writer' => 'Pak Andi', 'modul' => 'pneumatik.pdf']
            ];
        @endphp

        @if(count($dummyModules) > 0)
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col" style="width:40%">Judul</th>
                            <th scope="col" style="width:25%">Guru</th>
                            <th scope="col" style="width:25%">Penulis</th>
                            <th scope="col" style="width:10%">Unduh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($dummyModules as $modul)
                            <tr>
                                <td><strong>{{ $modul['title'] }}</strong></td>
                                <td><a href="#">{{ $modul['teacher'] }}</a></td>
                                <td><a href="#">{{ $modul['writer'] }}</a></td>
                                <td>
                                    <a href="#" class="btn btn-primary rounded-pill" download>
                                        <i class="bi bi-cloud-download"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Belum ada modul diunggah.</p>
            </div>
        @endif

        <!-- Dummy Pagination Bootstrap 5 -->
        <nav class="mt-4 d-flex justify-content-center">
            <ul class="pagination">
                <li class="page-item disabled"><a class="page-link" href="#">Sebelumnya</a></li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Berikutnya</a></li>
            </ul>
        </nav>

    </div>
</section>
@endsection