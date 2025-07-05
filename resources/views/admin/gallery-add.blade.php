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
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Buat Album Baru</h4>
                </div>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-warning my-3" role="alert">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="title" name="title" required value="Judul Dummy">
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="5" required>Deskripsi dummy untuk album.</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="headline" class="form-label">Gambar Utama</label>
                        <input class="form-control" type="file" id="headline" name="headline" accept="image/jpeg,image/gif,image/png,image/jpg,image/webp" required>
                        <div class="mt-2">
                            <img src="{{ asset('images/placeholder.webp') }}" alt="Gambar Utama" class="img-thumbnail" width="150">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="images" class="form-label">Gambar Lainnya</label>
                        <input class="form-control" type="file" id="images" name="images[]" accept="image/jpeg,image/gif,image/png,image/jpg,image/webp" multiple required onchange="updateList()">
                        <ul id="file-list" class="ps-3 mt-2"></ul>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection