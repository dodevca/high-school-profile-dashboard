@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Galeri', 'url' => route('admin.gallery.index')],
            ['label' => 'Buat Album'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Buat Album Baru</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="add-form" action="{{ route('api.admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan judul album" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="6" placeholder="Tulis deskripsi album..." required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input class="form-control" type="file" id="thumbnail" name="thumbnail" accept="image/jpeg,image/gif,image/png,image/jpg,image/webp" required>
                        </div>
                        <div class="mb-3">
                            <label for="images" class="form-label">Isi Album</label>
                            <input class="form-control" type="file" id="images" name="images[]" accept="image/jpeg,image/gif,image/png,image/jpg,image/webp" multiple required onchange="updateList()">
                            <ul id="file-list" class="ps-3 mt-2"></ul>
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
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/add.js') }}"></script>
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

    $(function() {
        $('#add').on('click', addData);
    });
</script>
@endsection
