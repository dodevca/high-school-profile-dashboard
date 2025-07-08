@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Galeri', 'url' => route('admin.gallery.index')],
            ['label' => $album->title],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">Edit Album</h4>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.gallery.update', $album->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $album->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description', $album->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="headline" class="form-label">Ganti Thumbnail</label>
                            <input class="form-control" type="file" id="headline" name="headline" accept="image/*">
                            @if($album->thumbnail)
                                <img src="{{ asset('storage/' . $album->thumbnail) }}" class="img-thumbnail" width="72">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Daftar Gambar</label>
                            @foreach($album->gallery_image as $img)
                                <div class="card mb-2" data-id="{{ $img->id }}">
                                    <div class="card-body d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center gap-3">
                                            <img src="{{ asset('storage/' . $img->image) }}" class="img-thumbnail" width="72">
                                        </div>
                                        <button type="button" class="btn btn-outline-danger btn-sm btn-delete-image" data-id="{{ $img->id }}">
                                            <i class="bx bx-trash"></i>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Tambah Gambar Baru</label>
                            <input class="form-control" type="file" id="images" name="images[]" accept="image/*" multiple onchange="updateList()">
                            <ul id="file-list" class="ps-3 mt-2"></ul>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.gallery.index') }}" class="btn btn-outline-secondary">Batal</a>
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
    function updateList() {
        var input = document.getElementById('images');
        var list  = document.getElementById('file-list');
        list.innerHTML = '';
        Array.from(input.files).forEach(function(file){
            var li = document.createElement('li');
            li.textContent = file.name;
            list.appendChild(li);
        });
    }

$(function(){
    $('#save').on('click', saveData);
    
    $('#edit-form').on('click', '.btn-delete-image', function(){
        var btn = $(this), id = btn.data('id');
        if (!confirm('Yakin ingin menghapus gambar ini?')) return;
        $.ajax({
            url: '/api/admin/gallery/{{ $album->id }}/'+id,
            method: 'POST',
            data: { _method: 'DELETE' },
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        }).done(function(){
            btn.closest('[data-id]') .remove();
            showAlert('success', 'Gambar berhasil dihapus.');
        }).fail(function(xhr){
            showAlert('danger', xhr.responseJSON.error || 'Gagal menghapus gambar.');
        });
    });
});
</script>
@endsection