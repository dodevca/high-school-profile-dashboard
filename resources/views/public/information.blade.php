@extends('public')

@section('stylesheet')
    <style>
        .testimonials {
            padding: 3rem 0;
            background-color: #f8f9fa;
        }

        .testimonial-item {
            transition: all 0.3s ease-in-out;
            border-left: 4px solid #00809D;
            background-color: #ffffff;
            position: relative;
        }

        .testimonial-item h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color:rgb(14, 71, 20);
        }

        .testimonial-item p {
            font-size: 1rem;
            font-style: italic;
            color: #333;
            position: relative;
        }

        .quote-icon-left,
        .quote-icon-right {
            color: #00809D;
            font-size: 1.2rem;
            vertical-align: middle;
        }

        .testimonial-item ul {
            padding-left: 1.2rem;
            margin: 0;
        }

        .testimonial-item ul li {
            margin-bottom: 0.5rem;
            font-size: 1rem;
            color: #555;
        }

        section .btn {
            padding: 0.6rem 1.4rem;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: 500;
        }

        section h5 {
            font-weight: 600;
            color: #333;
        }

        section span.bg-secondary {
            display: inline-block;
            background-color: #6c757d !important;
        }

        @media (max-width: 768px) {
            .testimonial-item {
                margin-top: 30px;
            }

            .btn {
                font-size: 0.9rem;
            }

            .testimonials {
                padding: 60px 0;
            }
        }
    </style>
@endsection

@section('content')
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto mb-4">
                    <iframe width="100%" height="480" class="rounded shadow"
                        src="{{ $information->youtube_url_2 }}" title="Video YouTube" allowfullscreen>
                    </iframe>
                </div>
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $information->name }}</h5>
                            <ul class="list-unstyled mb-2">
                                <li><strong>Alamat:</strong>
                                    {{ $information->address }}, 
                                    {{ $information->district }}, 
                                    {{ $information->city }}, 
                                    {{ $information->province }}
                                    @if($information->postal_code)
                                        , {{ $information->postal_code }}
                                    @endif
                                </li>
                                @if($information->phone)
                                    <li><strong>Telepon:</strong> {{ $information->phone }}</li>
                                @endif
                                @if($information->email)
                                    <li><strong>Email:</strong> {{ $information->email }}</li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Profil Singkat</h5>
                            {!! $information->short_profile !!}
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 me-lg-auto">
                    <div class="testimonial-item rounded p-4 bg-light shadow-sm">
                        <h3 class="mb-3">Visi Sekolah</h3>
                        <p class="mb-0">
                            <i class="bi bi-quote quote-icon-left"></i>
                            {{ $information->vision }}
                            <i class="bi bi-quote quote-icon-right"></i>
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 ms-lg-auto">
                    <div class="testimonial-item rounded mt-5 p-4 bg-light shadow-sm">
                        <h3 class="mb-3">Misi Sekolah</h3>
                        {!! $information->mission !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="d-flex align-items-center justify-content-center gap-3">
                <a href="{{ route('greeting') }}" class="btn btn-primary rounded-5">
                    <i class="bx bx-chevron-left me-2"></i>Sebelumnya
                </a>
                <a href="{{ route('teacher') }}" class="btn btn-primary rounded-5">
                    Selanjutnya<i class="bx bx-chevron-right ms-2"></i>
                </a>
            </div>
            <div class="static-pagination d-flex align-items-center justify-content-evenly gap-3 mt-3">
                <h5 class="small text-end mb-0">Sambutan</h5>
                <h5 class="small mb-0">Tenaga Pendidik</h5>
            </div>
        </div>
    </section>
@endsection