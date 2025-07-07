@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Berita', 'url' => route('admin.news.index')],
            ['label' => $news->title],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Edit Berita</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.news.update', $news->id) }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="content" class="form-label">Isi Berita</label>
                            <textarea class="form-control" id="content" name="content" rows="16">{{ old('content', $news->content) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Unggah Thumbnail Baru</label>
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail">
                            @if($news->thumbnail)
                                <img src="{{ asset('storage/' . $news->thumbnail) }}" alt="Logo" class="mt-2" width="120">
                            @endif
                        </div>
                        <div class="d-flex align-items-center justify-content-end gap-2">
                            <a href="{{ route('admin.news.index') }}" class="btn btn-outline-danger">Batal</a>
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