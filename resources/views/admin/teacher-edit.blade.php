@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Guru dan Staff', 'url' => route('admin.teacher.index')],
            ['label' => $teacher->name],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Data Guru / Staff</h4>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @if($teacher->photo)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Lampiran" class="img-thumbnail" style="width: 280px;">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="photo" class="form-label">Ganti Foto</label>
                            <input class="form-control" type="file" id="photo" name="photo" accept="image/*">
                            <div class="form-text">
                                Jenis berkas: jpg, jpeg, png, atau webp.
                                <br>
                                Ukuran maksimal: 1.0 MB.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $teacher->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Jabatan</label>
                            <select class="form-select" id="position" name="position" required>
                                <option value="" disabled selected>Pilih Jabatan</option>
                                <option value="0|Kepala Sekolah" {{ old('type', $teacher->priority) ==0? 'selected':'' }}>Kepala Sekolah</option>
                                <option value="1|Wakil Kepala Sekolah" {{ old('type', $teacher->priority) ==1? 'selected':'' }}>Wakil Kepala Sekolah</option>
                                <option value="2|Guru" {{ old('type', $teacher->priority) ==2? 'selected':'' }}>Guru</option>
                                <option value="3|Staff" {{ old('type', $teacher->priority) ==3? 'selected':'' }}>Staff</option>
                                <option value="4|Lainnya" {{ old('type', $teacher->priority) ==4? 'selected':'' }}>Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" value="{{ old('nip', $teacher->nip) }}" placeholder="Masukkan NIP (opsional)">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject', $teacher->subject) }}" placeholder="Contoh: Matematika, IPA, dll" required>
                        </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.teacher.index') }}" class="btn btn-outline-danger">Batal</a>
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
    $(function() {
        $('#save').on('click', saveData);
    });
</script>
@endsection