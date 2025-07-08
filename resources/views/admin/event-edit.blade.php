@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Agenda', 'url' => route('admin.event.index')],
            ['label' => $event->title],
        ]
    ])
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h4 class="card-title mb-0">Edit Agenda</h4>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.event.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Agenda</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description" rows="10" required>{{ old('description', $event->description) }}</textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Mulai</label>
                                <input type="date" class="form-control mb-2" id="start_date" name="start_date" value="{{ old('start_date', $event->start_time->format('Y-m-d')) }}" required>
                                <input type="time" class="form-control" id="start_time" name="start_time" value="{{ old('start_time', $event->start_time->format('H:i')) }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Selesai</label>
                                <input type="date" class="form-control mb-2" id="end_date" name="end_date" value="{{ old('end_date', $event->end_time->format('Y-m-d')) }}" required>
                                <input type="time" class="form-control" id="end_time" name="end_time" value="{{ old('end_time', $event->end_time->format('H:i')) }}" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokasi</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $event->location) }}" required>
                        </div>
                        @if($event->image)
                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $event->image) }}" alt="Lampiran" class="img-thumbnail" style="max-width: 280px;">
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
                        <div class="mb-3">
                            <label for="type" class="form-label">Tipe Agenda</label>
                            <select class="form-select" id="type" name="type" required>
                                <option value="Internal" {{ old('type', $event->type) =='Internal'? 'selected':'' }}>Internal</option>
                                <option value="External" {{ old('type', $event->type) =='External'? 'selected':'' }}>Eksternal</option>
                            </select>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.event.index') }}" class="btn btn-outline-danger">Batal</a>
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