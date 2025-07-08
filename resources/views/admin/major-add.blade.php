@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Jurusan', 'url' => route('admin.major.index')],
            ['label' => 'Tambah'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Tambah Jurusan Baru</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="add-form" action="{{ route('api.admin.major.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Masukkan nama jurusan">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Singkatan / Kode Jurusan</label>
                            <input type="text" class="form-control" id="code" name="code" required placeholder="Masukkan singkatan / kode jurusan">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Isi deskripsi jurusan" rows="10" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.event.index') }}" class="btn btn-outline-danger">Batal</a>
                            <button type="button" class="btn btn-primary" id="add">Tambah</button>
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