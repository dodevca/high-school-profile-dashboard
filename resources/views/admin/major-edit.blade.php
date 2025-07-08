@extends('admin')

@section('content')
@include('partials.breadcrumbs', [
    'breadcrumbs' => [
        ['label' => 'Dashboard', 'url' => route('admin.home')],
        ['label' => 'Jurusan'],
    ]
])

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-body d-flex flex-column flex-md-row justify-content-between align-items-center">
                <h5 class="mb-2 mb-md-0">{{ $major->name }}</h5>
                <div class="d-flex flex-column flex-md-row gap-2">
                    @if ($action == 'edit')
                        <a href="{{ route('admin.majors.show', $major->id) }}" class="btn btn-secondary"><i class="bi bi-eye me-1"></i>Preview</a>
                    @else
                        <a href="{{ route('admin.majors.edit', $major->id) }}" class="btn btn-secondary"><i class="bi bi-pen me-1"></i>Edit</a>
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
                <h4>Edit {{ $major->name }}</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.majors.update', $major->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Jurusan</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $major->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi (TAMBAHAN BIAR BERHASIL PUSH)</label>
                        <textarea class="form-control" name="description" rows="5" required>{{ old('description', $major->description) }}</textarea>
                    </div>

                    {{-- Logo --}}
                    <div class="mb-3">
                        <label class="form-label">Logo Jurusan</label>
                        <div class="card mb-2">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $major->logo ? asset('storage/' . $major->logo) : asset('images/placeholder.webp') }}" class="img-thumbnail" width="72">
                                    <span>Logo Saat Ini</span>
                                </div>
                                <button class="btn btn-outline-secondary" disabled><i class="bi bi-trash"></i></button>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('admin.majors.index') }}" class="btn btn-outline-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>

    {{-- Form Upload Logo --}}
    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header">
                <h4>Ubah Logo</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.majors.uploadLogo', $major->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="logo" class="form-label">Pilih Gambar</label>
                        <input class="form-control" type="file" name="logo" id="logo" accept="image/*" required>
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
                <img src="{{ $major->logo ? asset('storage/' . $major->logo) : asset('images/placeholder.webp') }}" class="img-fluid rounded">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-body">
                        <h5>{{ $major->name }}</h5>
                        <p>{{ $major->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
