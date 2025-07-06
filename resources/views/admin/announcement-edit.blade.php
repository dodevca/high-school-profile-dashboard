@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Pengumuman', 'url' => route('admin.announcement.index')],
            ['label' => $announcement->title],
        ]
    ])
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Edit Pengumuman</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.announcement.update', $announcement->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $announcement->title) }}" placeholder="Masukkan judul pengumuman" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Isi Pengumuman</label>
                            <textarea class="form-control" id="content" name="content" rows="16" placeholder="Tulis isi pengumuman di sini..." required>{{ old('content', $announcement->content) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="major_id" class="form-label">Jurusan</label>
                            <select class="form-select" id="major_id" name="major_id">
                                <option value="">— Semua Jurusan —</option>
                                <option value="1">Teknik Komputer dan Jaringan</option>
                                <option value="2">Rekayasa Perangkat Lunak</option>
                                <option value="3">Multimedia</option>
                            </select>
                            <div class="form-text">
                                Pilih jurusan terkait atau biarkan kosong untuk semua jurusan.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Unggah Gambar Lampiran Baru</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            @if($announcement->image)
                                <img src="{{ asset('storage/' . $announcement->image) }}" alt="Lampiran" class="img-thumbnail" style="max-width: 200px;">
                            @endif
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.announcement.index') }}" class="btn btn-outline-danger">Batal</a>
                            <button type="button" class="btn btn-primary" id="save">Simpan</button>
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
