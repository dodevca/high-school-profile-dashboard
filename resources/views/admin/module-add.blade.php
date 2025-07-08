@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Modul', 'url' => route('admin.module.index')],
            ['label' => 'Tambah'],
        ]
    ])
    <div class="row">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title mb-0">Tambah Modul Baru</h4>
			</div>
			<div class="card-body">
				<form id="add-form" action="{{ route('api.admin.module.store') }}" method="POST" enctype="multipart/form-data"> @csrf <div class="mb-3">
						<label for="title" class="form-label">Judul Modul</label>
						<input type="text" id="title" name="title" class="form-control" placeholder="Masukkan judul modul" value="{{ old('title') }}" required>
					</div>
					<div class="mb-3">
						<label for="description" class="form-label">Deskripsi</label>
						<textarea id="description" name="description" class="form-control" placeholder="Tulis deskirpsi modul..." rows="10">{{ old('description') }}</textarea>
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
						<input type="text" id="grade_level" name="grade_level" class="form-control" placeholder="Kelas 10, 11, dsb" required>
					</div>
					<div class="mb-3">
						<label for="semester" class="form-label">Semester</label>
						<select id="semester" name="semester" class="form-select" required>
							<option value="" selected disabled>Pilih semester</option>
							<option value="Ganjil" {{ old('semester')=='Ganjil' ? 'selected':'' }}>Ganjil</option>
							<option value="Genap" {{ old('semester')=='Genap'  ? 'selected':'' }}>Genap</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="subject" class="form-label">Mata Pelajaran</label>
						<input type="text" id="subject" name="subject" class="form-control" placeholder="Masukkan mata pelajaran" value="{{ old('subject') }}">
					</div>
					<div class="mb-3">
						<label for="file" class="form-label">Unggah File Modul</label>
						<input type="file" id="file" name="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx" required>
                        <div class="form-text">
							Jenis berkas: .pdf, .doc, .docx, .xls, .xlsx, .ppt, atau .pptx.
							<br>
							Ukuran maksimal: 20.0 MB.
						</div>
					</div>
					<div class="d-flex justify-content-end gap-2">
						<a href="{{ route('admin.module.index') }}" class="btn btn-outline-danger">Batal</a>
						<button type="button" id="add" class="btn btn-primary">Tambah</button>
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