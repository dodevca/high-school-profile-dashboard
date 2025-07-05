@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Galeri'],
        ]
    ])

    <div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h5 class="mb-2 mb-md-0">{{ $album['title'] }}</h5>
                <div class="d-flex flex-column flex-md-row gap-2">
                    @if ($action == 'edit')
                        <a href="#" class="btn btn-secondary"><i class="bi bi-eye me-1"></i>Preview</a>
                    @else
                        <a href="#" class="btn btn-secondary"><i class="bi bi-pen me-1"></i>Edit</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if ($action == 'edit')
    {{-- Form Edit --}}
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Edit {{ $album['title'] }}</h4>
            </div>
            <div class="card-body">
                {{-- Error Alert --}}
                @if (session('errors'))
                    <div class="alert alert-warning">
                        <ul class="mb-0 ps-3">
                            @foreach (session('errors') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="album-id" value="{{ $album['id'] }}">

                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" value="{{ $album['title'] }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" rows="5" required>{{ $album['description'] }}</textarea>
                    </div>

                    {{-- Gambar Headline --}}
                    <div class="mb-3">
                        <label class="form-label">Daftar Gambar</label>

                        {{-- Headline utama --}}
                        <div class="card mb-2">
                            <div class="card-body d-flex justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $album['headline'] }}" class="img-thumbnail" width="72">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="headline" checked>
                                        <label class="form-check-label">Atur sebagai headline</label>
                                    </div>
                                </div>
                                <button class="btn btn-outline-secondary" disabled><i class="bi bi-trash"></i></button>
                            </div>
                        </div>

                        {{-- Gambar lainnya --}}
                        @foreach ($album['images'] as $image)
                        <div class="card mb-2">
                            <div class="card-body d-flex justify-content-between">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $image }}" class="img-thumbnail" width="72">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="headline">
                                        <label class="form-check-label">Atur sebagai headline</label>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-danger"><i class="bi bi-trash"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-outline-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>

    {{-- Form Upload Gambar --}}
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Tambah Gambar</h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="album-id" value="{{ $album['id'] }}">

                    <div class="mb-3">
                        <label for="images" class="form-label">Pilih Gambar</label>
                        <input class="form-control" type="file" name="images[]" id="images" multiple required>
                    </div>

                    <button type="submit" class="btn btn-secondary">Unggah</button>
                </form>
            </div>
        </div>
    </div>

    @else
    {{-- Tampilan Preview --}}
    <div class="col-lg-12">
        <div class="row g-4">
            <div class="col-md-6 col-lg-7">
                <img src="{{ $album['headline'] }}" class="img-fluid rounded">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $album['title'] }}</h5>
                        <p>{{ $album['description'] }}</p>
                    </div>
                </div>
            </div>

            @foreach ($album['images'] as $image)
            <div class="col-6 col-md-4 col-lg-3">
                <img src="{{ $image }}" class="img-fluid rounded">
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection