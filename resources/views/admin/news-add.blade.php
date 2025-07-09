@extends('admin')

@section('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Berita', 'url' => route('admin.news.index')],
            ['label' => 'Buat'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Buat Berita Baru</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="add-form" action="{{ route('api.admin.news.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul berita" required>
                        </div>
                        <div class="mb-3">
                            <label for="news-content" class="form-label">Konten</label>
                            <textarea class="form-control d-none" id="news-content" name="content" placeholder="Masukkan konten berita..." rows="16"></textarea>
                            <div id="quill-container" class="rounded-bottom" style="height: 398px;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Unggah Gambar</label>
                            <input class="form-control" type="file" accept="image/*" id="thumbnail" name="thumbnail">
                            <div class="form-text">
                                Jenis berkas: jpg, jpeg, png, atau webp.
                                <br>
                                Ukuran maksimal: 2.0 MB.
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-outline-danger">Batal</a>
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
            placeholder: 'Masukkan konten berita...',
            theme: 'snow'
        });
    </script>
    <script>
        $(function() {
            $('#add').on('click', function(){
                var html = quill.root.innerHTML;

                $('#news-content').val(html);

                addData();
            });
        });
    </script>
@endsection