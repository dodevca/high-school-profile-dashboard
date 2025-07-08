@extends('public')

@section('content')
<section id="" class="pb-0">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-between gap-3 rounded shadow p-4">
            <h2 class="h4 mb-0">
                {{ !empty(request()->query('q')) ? "Hasil dari : " . ucwords(request()->query('q')) : "Agenda SMK N 2 Kupang" }}
            </h2>
            <div class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3">
                <div class="dropdown w-100 order-2 order-lg-1">
                    <button class="btn btn-outline-secondary dropdown-toggle rounded w-100" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-funnel me-2"></i>{{ ucwords(str_replace('-', ' ', request()->query('f', 'mendatang'))) }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Mendatang</a></li>
                        <li><a class="dropdown-item" href="#">Terbaru</a></li>
                        <li><a class="dropdown-item" href="#">Terlama</a></li>
                    </ul>
                </div>
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

<section id="counts" class="counts py-4">
    <div class="container">
        @php
            $dummyData = [
                ['date_start' => '2025-07-08 08:00:00', 'name' => 'Workshop Laravel', 'description' => 'Pelatihan Laravel bagi pemula', 'event_id' => 1, 'slug' => 'workshop-laravel'],
                ['date_start' => '2025-07-12 13:30:00', 'name' => 'Seminar IT', 'description' => 'Seminar teknologi informasi terbaru', 'event_id' => 2, 'slug' => 'seminar-it'],
                ['date_start' => '2025-07-15 09:00:00', 'name' => 'Workshop UI/UX', 'description' => 'Dasar-dasar desain antarmuka', 'event_id' => 3, 'slug' => 'workshop-uiux'],
                ['date_start' => '2025-07-18 10:00:00', 'name' => 'Pelatihan Cybersecurity', 'description' => 'Pengenalan dasar keamanan jaringan', 'event_id' => 4, 'slug' => 'pelatihan-cybersecurity'],
                ['date_start' => '2025-07-22 14:00:00', 'name' => 'Expo Teknologi SMK', 'description' => 'Pameran hasil karya siswa jurusan teknologi', 'event_id' => 5, 'slug' => 'expo-teknologi-smk']
            ];
        @endphp

        @if(count($dummyData) > 0)
            <div class="row g-3">
                @foreach($dummyData as $event)
                    @php
                        $date = \Carbon\Carbon::parse($event['date_start']);
                    @endphp
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-stretch">
                        <div class="border rounded shadow-sm p-3 w-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <span class="fw-bold fs-4">{{ $date->format('d') }}</span>
                                    <h3 class="fs-6 mb-0">{{ $date->translatedFormat('F') }}</h3>
                                </div>
                                <div class="bg-primary px-2 py-1 rounded-pill text-white">
                                    <small><i class="bi bi-clock me-1"></i>{{ $date->format('H:i') }}</small>
                                </div>
                            </div>
                            <h5 class="mt-4">{{ $event['name'] }}</h5>
                            <p>{{ strlen($event['description']) > 50 ? substr($event['description'], 0, 50) . '...' : $event['description'] }}</p>
                            <a href="#" class="text-decoration-none text-primary">Selengkapnya »</a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                <p>Tidak ada agenda.</p>
            </div>
        @endif

        <!-- Bootstrap 5.3 Pagination Dummy -->
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