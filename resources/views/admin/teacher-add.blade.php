@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Guru dan Staff', 'url' => route('admin.teacher.index')],
            ['label' => 'Tambah Guru atau Staff'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Tambah Guru / Staff</h4>
                </div>
                <div class="card-body">
                    <form id="add-form" action="{{ route('api.admin.teacher.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label for="position" class="form-label">Jabatan</label>
                            <select class="form-select" id="position" name="position" required>
                                <option value="">Semua Jabatan</option>
                                <option value="0|Kepala Sekolah">Kepala Sekolah</option>
                                <option value="1|Wakil Kepala Sekolah">Wakil Kepala Sekolah</option>
                                <option value="2|Guru">Guru</option>
                                <option value="3|Staff">Staff</option>
                                <option value="4|Lainnya">Lainnya</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nip" class="form-label">NIP</label>
                            <input type="text" class="form-control" id="nip" name="nip" placeholder="Masukkan NIP (opsional)" value="" />
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Mata Pelajaran</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Contoh: Matematika, IPA, dll" required>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Upload Foto</label>
                            <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.teacher.index') }}" class="btn btn-outline-secondary">Batal</a>
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
    $(function() {
        $('#add').on('click', addData);
    });
</script>
@endsection