@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Berita', 'url' => route('admin.news.index')],
            ['label' => 'Buat Baru'],
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
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="content-textarea" class="form-label">Isi Berita</label>
                            <textarea class="form-control" id="content-textarea" name="content" rows="16"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Unggah Thumbnail</label>
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <button class="btn btn-outline-danger" onclick="location.reload();">Batal</button>
                            <button type="button" class="btn btn-primary" id="add">Buat</button>
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