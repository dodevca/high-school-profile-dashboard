@extends('admin')

@section('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Agenda', 'url' => route('admin.event.index')],
            ['label' => 'Buat']
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">Buat Agenda Baru</h4>
                </div>
                <div class="card-body">
                    <form id="add-form" action="{{ route('api.admin.event.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul agenda" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control d-none"  id="description" name="description" rows="10" placeholder="Tulis deskripsi agenda..." required></textarea>
                            <div id="quill-container" class="rounded-bottom" style="height: 254px;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mulai</label>
                                <input type="date" class="form-control mb-2" id="start_date" name="start_date" required>
                                <input type="time" class="form-control" id="start_time" name="start_time" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Selesai</label>
                                <input type="date" class="form-control mb-2" id="end_date" name="end_date" required>
                                <input type="time" class="form-control" id="end_time" name="end_time" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Masukkan lokasi agenda" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Unggah Gambar Lampiran</label>
                            <input class="form-control" type="file" id="image" name="image" accept="image/*">
                            <div class="form-text">
                                Jenis berkas: jpg, jpeg, png, atau webp.
                                <br>
                                Ukuran maksimal: 2.0 MB.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="type" class="form-label">Jenis Agenda</label>
                            <select class="form-select" id="type" name="type" required>
                                <option disabled selected>Pilih tipe</option>
                                <option value="Internal">Internal</option>
                                <option value="External">Eksternal</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.event.index') }}" class="btn btn-outline-danger">Batal</a>
                            <button type="button" class="btn btn-primary" id="add">Buat</button>
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
    <script src="{{ asset('js/add.js') }}"></script>
    <script>
        const quill = new Quill('#quill-container', {
            placeholder: 'Tulis deskripsi agenda...',
            theme: 'snow'
        });
    </script>
    <script>
        $(function() {
            $('#add').on('click', function(){
                var html = quill.root.innerHTML;

                $('#description').val(html);

                addData();
            });
        });
    </script>
@endsection
