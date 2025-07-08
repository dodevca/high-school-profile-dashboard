@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Sambutan'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Sambutan</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.greeting.update', $greeting->id) }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="author" class="form-label">Nama Penyambut</label>
                                <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $greeting->author) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                @if($greeting->photo)
                                    <img src="{{ asset('storage/' . $greeting->photo) }}" alt="Photo" class="mt-2" width="240">
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="content" class="form-label">Sambutan</label>
                                <textarea name="content" id="content" class="form-control" rows="16" required>{!! old('content', $greeting->content) !!}</textarea>
                            </div>
                        </div>
                        <div class="mt-3 text-end">
                            <button type="button" onclick="location.reload()" class="btn btn-outline-danger me-2">Batal</button>
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