@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Modul', 'url' => route('admin.module.index')],
            ['label' => $module->title],
        ]
    ])
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edit Modul</h4>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.module.update', $module->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul Modul</label>
                            <input type="text" id="title" name="title" class="form-control" value="{{ old('title', $module->title) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea id="description" name="description" class="form-control" rows="6" required>{{ old('description', $module->description) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">File Modul</label>
                            <div class="input-group">
                                <input type="text"class="form-control" value="{{ basename($module->file) }}" readonly>
                                <a href="{{ asset('storage/'.$module->file) }}" target="_blank" class="btn btn-outline-primary">
                                    <i class="bx bx-show me-1"></i> Lihat
                                </a>
                            </div>
                        </div>
                        <div class="position-relative border-top my-4">
                            <span class="position-absolute top-50 start-50 translate-middle bg-white px-3 text-muted">
                                Ganti file modul
                            </span>
                        </div>
                        <div class="mb-3">
                            <input type="file" id="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx">
                            <div class="form-text">
                                Jenis berkas: .pdf, .doc, .docx, .xls, .xlsx, .ppt, atau .pptx.
                                <br>
                                Ukuran maksimal: 20.0 MB.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="major_id" class="form-label">Jurusan</label>
                            <select id="major_id" name="major_id" class="form-select" required>
                                @foreach($majors as $m)
                                    <option value="{{ $m->id }}" {{ $m->id == old('major_id', $module->major_id) ? 'selected' : '' }}>{{ $m->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="grade_level" class="form-label">Tingkat Kelas</label>
                            <input type="text" id="grade_level" name="grade_level" class="form-control" value="{{ old('grade_level', $module->grade_level) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="semester" class="form-label">Semester</label>
                            <select id="semester" name="semester" class="form-select" required>
                                <option value="Ganjil" {{ old('semester', $module->semester) == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                <option value="Genap"  {{ old('semester', $module->semester) == 'Genap'  ? 'selected' : '' }}>Genap</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Mata Pelajaran</label>
                            <input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject', $module->subject) }}">
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.module.index') }}" class="btn btn-outline-danger">Batal</a>
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
    $(function(){
        $('#save').on('click', saveData);
    });
</script>
@endsection
