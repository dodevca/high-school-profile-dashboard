@extends('public')

@section('content')
<section id="team" class="team py-5">
    <div class="container">
        <!-- Filter Buttons -->
        <div class="row mb-4">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters" class="list-unstyled d-flex gap-3">
                    <li data-filter="*" class="filter-active btn btn-outline-primary">Semua</li>
                    <li data-filter=".filter-app" class="btn btn-outline-primary">Lorem</li>
                    <li data-filter=".filter-card" class="btn btn-outline-primary">Ipsum</li>
                    <li data-filter=".filter-web" class="btn btn-outline-primary">Dolor</li>
                </ul>
            </div>
        </div>

        <!-- Team Members -->
        <div class="row portfolio-container">
            @for ($i = 0; $i < 9; $i++)
                @php
                    $filters = ['filter-app', 'filter-web', 'filter-card'];
                    $names = ['Walter White', 'Sarah Jhinson', 'William Anderson'];
                    $roles = ['Chief Executive Officer', 'Product Manager', 'CTO'];
                    $descriptions = [
                        'Magni qui quod omnis unde et eos fuga et exercitationem.',
                        'Repellat fugiat adipisci nemo illum nesciunt voluptas repellendus.',
                        'Voluptas necessitatibus occaecati quia. Earum totam consequuntur.',
                    ];
                    $index = $i % 3;
                @endphp
                <div class="col-lg-4 col-md-6 portfolio-item {{ $filters[$index] }}">
                    <div class="card member portfolio-wrap h-100 shadow rounded">
                        <img src="{{ asset('images/placeholder.webp') }}" class="card-img-top" alt="Team Member">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $names[$index] }}</h5>
                            <p class="text-muted">{{ $roles[$index] }}</p>
                            <p class="card-text">{{ $descriptions[$index] }}</p>
                            <div class="d-flex justify-content-center gap-2 mt-3">
                                <a href="#" class="text-primary"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="text-primary"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="text-primary"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
</section>
<section>
    <div class="container py-5">
        <div class="d-flex align-items-center justify-content-center gap-3">
            <a href="#" class="btn btn-primary rounded-5">
                <i class="bi bi-chevron-compact-left me-2"></i> Sebelumnya
            </a>
            <a href="#" class="btn btn-primary rounded-5">
                Selanjutnya <i class="bi bi-chevron-compact-right ms-2"></i>
            </a>
        </div>

        <div class="d-flex align-items-center justify-content-center gap-3 mt-4">
            <h5 class="mb-0 text-end">Visi dan Misi</h5>
            <span class="bg-secondary" style="width: 2px; height: 24px;"></span>
            <h5 class="mb-0">Sarana Prasarana</h5>
        </div>
    </div>
</section>

@endsection