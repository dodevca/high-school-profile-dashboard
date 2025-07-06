@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Guru'],
        ]
    ])
<div class="row">
    <div class="col-lg-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Tambah Guru / Staff</h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Nama --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                    </div>

                    {{-- Jabatan --}}
                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <select class="form-select" id="jabatan" name="jabatan" required>
                            <option value="" selected>Pilih jabatan</option>
                            <option value="Guru">Guru</option>
                            <option value="Staff TU">Staff TU</option>
                            <option value="Kepala Sekolah">Kepala Sekolah</option>
                            <option value="Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                        </select>
                    </div>

                    {{-- Mapel --}}
                    <div class="mb-3">
                        <label for="mapel" class="form-label">Mata Pelajaran</label>
                        <input type="text" class="form-control" id="mapel" name="mapel" placeholder="Contoh: Matematika, IPA, dll" required>
                    </div>

                    {{-- Foto --}}
                    <div class="mb-3">
                        <label for="foto" class="form-label">Upload Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                        <div class="form-text">Opsional. Disarankan rasio persegi dan ukuran di bawah 1MB.</div>
                    </div>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection