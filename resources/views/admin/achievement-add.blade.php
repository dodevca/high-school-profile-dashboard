@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Prestasi', 'url' => route('admin.achievement.index')],
            ['label' => 'Tambah Prestasi'],
        ]
    ])
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Tambah Prestasi</h4>
                </div>
                <div class="card-body">
                    <form id="add-form" action="{{ route('api.admin.achievement.store') }}" method="POST" enctype="multipart/form-data"> @csrf {{-- Judul --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Prestasi</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="" disabled selected>Pilih Kategori</option>
                                <option value="Murid" {{ old('category') == 'Murid' ? 'selected':'' }}>Murid</option>
                                <option value="Guru" {{ old('category') == 'Guru' ? 'selected':'' }}>Guru</option>
                                <option value="Sekolah" {{ old('category') == 'Sekolah' ? 'selected':'' }}>Sekolah</option>
                                <option value="Ekstrakulikuler" {{ old('category') == 'Ekstrakulikuler' ? 'selected':'' }}>Ekstrakurikuler</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Tingkat</label>
                            <select id="level" name="level" class="form-select" required>
                                <option value="" disabled selected>Pilih Tingkat</option>
                                <option value="Sekolah" {{ old('level') == 'Sekolah' ? 'selected':'' }}>Sekolah</option>
                                <option value="Kecamatan" {{ old('level') == 'Kecamatan' ? 'selected':'' }}>Kecamatan</option>
                                <option value="Kabupaten/Kota" {{ old('level') == 'Kabupaten/Kota' ? 'selected':'' }}>Kabupaten/Kota</option>
                                <option value="Provinsi" {{ old('level') == 'Provinsi' ? 'selected':'' }}>Provinsi</option>
                                <option value="Nasional" {{ old('level') == 'Nasional' ? 'selected':'' }}>Nasional</option>
                                <option value="Internasional" {{ old('level') == 'Internasional' ? 'selected':'' }}>Internasional</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rank" class="form-label">Perolehan</label>
                            <input type="text" id="rank" name="rank" class="form-control" value="{{ old('rank') }}" placeholder="Juara 1, Juara Harapan, dsb." required>
                        </div>
                        <div class="mb-3">
                            <label for="achieved_by" class="form-label">Dicapai Oleh</label>
                            <input type="text" id="achieved_by" name="achieved_by" class="form-control" value="{{ old('achieved_by') }}" placeholder="Nama siswa / tim / guru" required>
                        </div>
                        <div class="mb-3">
                            <label for="achieved_at" class="form-label">Tanggal Pencapaian</label>
                            <input type="date" id="achieved_at" name="achieved_at" class="form-control" value="{{ old('achieved_at') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi (Opsional)</label>
                            <textarea id="description" name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Unggah Foto</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.achievement.index') }}" class="btn btn-outline-secondary">Batal</a>
                            <button type="button" id="add" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/add.js') }}"></script>
    <script>
        $(function(){
            $('#add').on('click', addData);
        });
    </script>
@endsection