@extends('admin')

@section('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Pengumuman', 'url' => route('admin.announcement.index')],
            ['label' => $announcement->title],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
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
                            <label for="announcement-content" class="form-label">Isi Pengumuman</label>
                            <textarea class="form-control d-none" id="announcement-content" name="content" rows="16" placeholder="Tulis isi pengumuman di sini..." required>{!! old('content', $announcement->content) !!}</textarea>
                            <div id="quill-container" class="rounded-bottom" style="height: 398px;">
                                {!! old('content', $announcement->content) !!}
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="major_id" class="form-label">Jurusan</label>
                            <select class="form-select" id="major_id" name="major_id">
                                <option value="">Semua Jurusan</option>
                                @foreach($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-text">
                                Pilih jurusan terkait atau biarkan kosong untuk semua jurusan.
                            </div>
                        </div>
                        @if($announcement->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $announcement->image) }}" alt="Lampiran" class="img-thumbnail" style="width: 280px;">
                            </div>
                        @endif
                        <div class="mb-3">
                            <label for="image" class="form-label">Unggah Gambar Lampiran Baru</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            <div class="form-text">
                                Jenis berkas: jpg, jpeg, png, atau webp.
                                <br>
                                Ukuran maksimal: 2.0 MB.
                            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script src="{{ asset('js/alert.js') }}"></script>
    <script src="{{ asset('js/edit.js') }}"></script>
    <script>
        const quill = new Quill('#quill-container', {
            theme: 'snow'
        });
    </script>
    <script>
        $(function() {
            $('#save').on('click', function(){
                var html = quill.root.innerHTML;

                $('#announcement-content').val(html);

                saveData();
            });
        });
    </script>
@endsection
