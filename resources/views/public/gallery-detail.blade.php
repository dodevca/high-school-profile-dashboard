@extends('public')

@section('content')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset($album->thumbnail ? 'storage/'.$album->thumbnail : 'images/placeholder.webp') }}" class="rounded w-100 mb-4 mb-md-0" alt="Gambar utama">
                </div>
                <div class="col-md-6">
                    <div class="rounded shadow p-4">
                        <div class="border-bottom pb-3">
                            <h3>{{ $album->title }}</h3>
                            <p class="mb-0">
                                Diunggah pada {{ $album->created_at_formatted }}
                            </p>
                        </div>
                        <div class="pt-3">
                            <p>{{ $album->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row py-3">
                @foreach($album->gallery_image as $image)
                    <div class="col-md-6 col-lg-4 py-3">
                        <img src="{{ asset($image->image ? 'storage/'.$image->image : 'images/placeholder.webp') }}" class="rounded w-100" alt="Gambar album">
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection