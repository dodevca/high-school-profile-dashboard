@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Guru'],
        ]
    ])
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header">
                <h4 class="mb-0">Edit Data Guru / Staff</h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- Foto --}}
                    <div class="mb-3 text-center">
                        <img src="{{ asset('images/placeholder.webp') }}" alt="Foto Guru" class="rounded-circle mb-2" width="120" height="120">
                        <div>
                            <label for="photo" class="form-label">Ganti Foto</label>
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                        </div>
                    </div>

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="Nama Guru Contoh" required>
                    </div>

                    {{-- Jabatan --}}
                    <div class="mb-3">
                        <label for="position" class="form-label">Jabatan</label>
                        <select class="form-select" id="position" name="position" required>
                            <option value="">Pilih Jabatan</option>
                            <option value="Guru" selected>Guru</option>
                            <option value="Staff TU">Staff TU</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                        </select>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection