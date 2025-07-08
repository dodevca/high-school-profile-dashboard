@extends('public')

@section('content')
@extends('layouts.app')

@section('main')
<section class="team py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul class="nav nav-pills gap-2" id="portfolio-filters">
                    <li class="nav-item">
                        <a class="nav-link active" data-filter="*" href="#">Semua</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-filter=".filter-app" href="#">Lorem</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-filter=".filter-card" href="#">Ipsum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-filter=".filter-web" href="#">Dolor</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container g-4">
            @php
                $teams = [
                    ['name' => 'Walter White', 'role' => 'Chief Executive Officer', 'filter' => 'filter-app'],
                    ['name' => 'Sarah Jhinson', 'role' => 'Product Manager', 'filter' => 'filter-web'],
                    ['name' => 'William Anderson', 'role' => 'CTO', 'filter' => 'filter-card'],
                ];
            @endphp

            @for ($i = 0; $i < 3; $i++)
                @foreach ($teams as $member)
                    <div class="col-lg-4 col-md-6 portfolio-item {{ $member['filter'] }}">
                        <div class="card h-100 shadow-sm border-0 rounded">
                            <img src="{{ asset('images/placeholder.webp') }}" alt="Foto {{ $member['name'] }}" class="card-img-top rounded-top" style="aspect-ratio: 4 / 3; object-fit: cover;">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $member['name'] }}</h5>
                                <p class="text-muted">{{ $member['role'] }}</p>
                                <p class="card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, dicta.
                                </p>
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
                                    <a href="#" class="text-primary"><i class="bi bi-facebook"></i></a>
                                    <a href="#" class="text-primary"><i class="bi bi-instagram"></i></a>
                                    <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endfor
        </div>
    </div>
</section>

@section('beforeFooter')
<section class="py-5">
    <div class="container">
        <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
            <a href="#" class="btn btn-primary rounded-pill">
                <i class="bi bi-chevron-compact-left me-2"></i>Sebelumnya
            </a>
            <a href="#" class="btn btn-primary rounded-pill">
                Selanjutnya<i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>
        <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="mb-0">Visi dan Misi</h5>
            <span class="bg-secondary rounded-circle d-inline-block" style="width: 10px; height: 10px;"></span>
            <h5 class="mb-0">Sarana Prasarana</h5>
        </div>
    </div>
</section>
@endsection