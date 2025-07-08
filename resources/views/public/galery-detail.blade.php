@extends('public')

@section('content')

<section>
    <div class="container">
        @php
            $result = (object)[
                'headline' => 'placeholder.webp',
                'title' => 'Judul Album Contoh',
                'date' => '2024-01-01',
                'description' => 'Deskripsi album ini adalah contoh teks yang menjelaskan isi dari album secara singkat.',
                'images' => json_encode([
                    'placeholder1.webp',
                    'placeholder2.webp',
                    'placeholder3.webp'
                ]),
            ];
        @endphp

        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('images/placeholder.webp') }}" class="rounded w-100 mb-4 mb-md-0" alt="Gambar utama">
            </div>
            <div class="col-md-6">
                <div class="rounded shadow p-4">
                    <div class="border-bottom pb-3">
                        <h3>{{ $result->title }}</h3>
                        <p class="mb-0">
                            Diunggah pada {{ \Carbon\Carbon::parse($result->date)->translatedFormat('d F Y') }}
                        </p>
                    </div>
                    <div class="pt-3">
                        <p>{{ $result->description }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row py-3">
            @foreach(json_decode($result->images) as $image)
                <div class="col-md-6 col-lg-4 py-3">
                    <img src="{{ asset('images/placeholder.webp') }}" class="rounded w-100" alt="Gambar album">
                </div>
            @endforeach
        </div>
    </div>
</section>


@endsection