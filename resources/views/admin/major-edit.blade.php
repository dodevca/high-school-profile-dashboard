@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Agenda', 'url' => route('admin.major.index')],
            ['label' => $major->title],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-start">
                    <h4 class="card-title mb-0">Edit Jurusan</h4>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.major.update', $major->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Jurusan</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $major->name) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Singkatan / Kode Jurusan</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $major->code) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="6" required>{{ old('description', $major->description) }}</textarea>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.major.index') }}" class="btn btn-outline-danger">Batal</a>
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
    $(function() {
        $('#save').on('click', saveData);
    });
</script>
@endsection
