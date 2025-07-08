@extends('admin')

@section('content')
@include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Prestasi', 'url' => route('admin.achievement.index')],
            ['label' => $achievement->title],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Edit Prestasi</h4>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.achievement.update', $achievement->id) }}" method="POST" enctype="multipart/form-data"> @csrf @method('PUT') {{-- Judul --}}
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Prestasi</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $achievement->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategori</label>
                            <select id="category" name="category" class="form-select" required>
                                <option value="" disabled>Pilih Kategori</option>
                                @foreach(['Murid','Guru','Sekolah','Ekstrakurikuler'] as $cat)
                                    <option value="{{ $cat }}" {{ old('category', $achievement->category)==$cat ? 'selected':'' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="level" class="form-label">Tingkat</label>
                            <select id="level" name="level" class="form-select" required>
                                <option value="" disabled>Pilih Tingkat</option>
                                @foreach(['Sekolah','Kecamatan','Kabupaten/Kota','Provinsi','Nasional','Internasional'] as $lvl)
                                    <option value="{{ $lvl }}" {{ old('level', $achievement->level)==$lvl ? 'selected':'' }}>{{ $lvl }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="rank" class="form-label">Perolehan</label>
                            <input type="text" id="rank" name="rank" class="form-control" value="{{ old('rank', $achievement->rank) }}" placeholder="Juara 1, Juara Harapan, dsb." required>
                        </div>
                        <div class="mb-3">
                            <label for="achieved_by" class="form-label">Dicapai Oleh</label>
                            <input type="text" id="achieved_by" name="achieved_by" class="form-control" value="{{ old('achieved_by', $achievement->achieved_by) }}" placeholder="Nama siswa / tim / guru" required>
                        </div>
                        <div class="mb-3">
                            <label for="achieved_at" class="form-label">Tanggal Pencapaian</label>
                            <input type="date" id="achieved_at" name="achieved_at" class="form-control" value="{{ old('achieved_at', $achievement->achieved_at->format('Y-m-d')) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control" rows="10">{{ old('description', $achievement->description) }}</textarea>
                        </div>
                        @if($achievement->photo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $achievement->photo) }}" alt="Foto Prestasi" class="img-thumbnail" style="width: 280px;">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="photo" class="form-label">Unggah Foto Baru</label>
                            <input type="file" id="photo" name="photo" class="form-control" accept="image/*">
                            <div class="form-text">
                                Jenis berkas: jpg, jpeg, png, atau webp.
                                <br>
                                Ukuran maksimal: 5.0 MB.
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.achievement.index') }}" class="btn btn-outline-danger">Batal</a>
                            <button type="button" id="save" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/edit.js') }}"></script>
<script>
    $(function(){
        $('#save').on('click', saveData);
    });
</script>
@endsection