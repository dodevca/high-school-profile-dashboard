@extends('public')

@section('content')
@extends('layouts.app')

@section('main')
<section class="team-detail py-5">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-8 text-center">
                <h2 class="fw-bold">Walter White</h2>
                <p class="text-muted mb-3">Chief Executive Officer</p>
                <div class="d-flex justify-content-center gap-3 mb-3">
                    <a href="#" class="text-primary fs-4"><i class="bi bi-twitter"></i></a>
                    <a href="#" class="text-primary fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-primary fs-4"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-primary fs-4"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-6">
                <img src="{{ asset('images/placeholder.webp') }}" alt="Foto Walter White" class="img-fluid rounded shadow" style="aspect-ratio: 4 / 3; object-fit: cover;">
            </div>
            <div class="col-lg-6">
                <div class="ps-lg-4 mt-4 mt-lg-0">
                    <h4 class="fw-semibold">Tentang</h4>
                    <p>
                        Walter White adalah seorang pemimpin visioner yang telah memimpin perusahaan kami ke arah kesuksesan global. 
                        Dengan pengalaman lebih dari 20 tahun di industri, beliau dikenal atas inovasi, ketegasan, dan dedikasi tinggi.
                    </p>
                    <h5 class="mt-4">Kontak</h5>
                    <ul class="list-unstyled">
                        <li><strong>Email:</strong> walter.white@example.com</li>
                        <li><strong>Telepon:</strong> +62 812-3456-7890</li>
                        <li><strong>Alamat:</strong> Jl. Contoh No. 123, Jakarta</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection