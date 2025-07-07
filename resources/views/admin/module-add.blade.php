@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Modul', 'url' => route('admin.module.index')],
            ['label' => 'Tambah Modul'],
        ]
    ])
    <div class="row">
	<div class="col-lg-12">
		<div class="card shadow-sm">
			<div class="card-header">
				<h4 class="card-title mb-0">Tambah Modul</h4>
			</div>
			<div class="card-body">
				<form id="add-form" action="{{ route('api.admin.module.store') }}" method="POST" enctype="multipart/form-data"> @csrf <div class="mb-3">
						<label for="title" class="form-label">Judul Modul</label>
						<input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
					</div>
					<div class="mb-3">
						<label for="description" class="form-label">Deskripsi</label>
						<textarea id="description" name="description" class="form-control" rows="5">{{ old('description') }}</textarea>
					</div>
					<div class="mb-3">
						<label for="file" class="form-label">Unggah File Modul</label>
						<input type="file" id="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" required>
                        <div class="form-text">Format: PDF, Word, Excel, PowerPoint. Maksimal: 10MB.</div>
					</div>
					<div class="mb-3">
						<label for="major_id" class="form-label">Jurusan</label>
						<select id="major_id" name="major_id" class="form-select" required>
							<option value="" selected disabled>Pilih Jurusan</option>
                            @foreach($majors as $m)
                                <option value="{{ $m->id }}" {{ old('major_id') == $m->id ? 'selected' : '' }}>{{ $m->name }}</option>
                            @endforeach
                        </select>
					</div>
					<div class="mb-3">
						<label for="grade_level" class="form-label">Tingkat Kelas</label>
						<input type="text" id="grade_level" name="grade_level" class="form-control" value="{{ old('grade_level') }}" required>
					</div>
					<div class="mb-3">
						<label for="subject" class="form-label">Mata Pelajaran</label>
						<input type="text" id="subject" name="subject" class="form-control" value="{{ old('subject') }}">
					</div>
					<div class="mb-3">
						<label for="semester" class="form-label">Semester</label>
						<select id="semester" name="semester" class="form-select" required>
							<option value="Ganjil" {{ old('semester')=='Ganjil' ? 'selected':'' }}>Ganjil</option>
							<option value="Genap" {{ old('semester')=='Genap'  ? 'selected':'' }}>Genap</option>
						</select>
					</div>
					<div class="d-flex justify-content-end gap-2">
						<a href="{{ route('admin.module.index') }}" class="btn btn-outline-secondary"> Batal </a>
						<button type="button" id="add" class="btn btn-primary"> Simpan </button>
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
    $(function(){
        $('#add').on('click', addData);
    });
</script>
@endsection