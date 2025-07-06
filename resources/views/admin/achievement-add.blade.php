@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Prestasi'],
        ]
    ])
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="card-title mb-0">Tambah Prestasi</h4>
            </div>
            <div class="card-body">
                @if(session()->has('errors'))
                    <div class="alert alert-warning my-3" role="alert">
                        <div class="d-flex align-items-center mb-2">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>Terjadi kesalahan:</strong>
                        </div>
                        <ul class="mb-0 ps-3">
                            @foreach(session('errors')->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="type" class="form-label">Jenis Prestasi</label>
                        <input type="text" class="form-control" id="type" name="type" value="Akademik" required>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Siswa</label>
                        <input type="text" class="form-control" id="name" name="name" value="Nama Siswa" required>
                    </div>
                    <div class="mb-3">
                        <label for="major" class="form-label">Jurusan</label>
                        <input type="text" class="form-control" id="major" name="major" value="Rekayasa Perangkat Lunak" required>
                    </div>
                    <div class="mb-3">
                        <label for="level" class="form-label">Tingkat</label>
                        <input type="text" class="form-control" id="level" name="level" value="Nasional" required>
                    </div>
                    <div class="mb-3">
                        <label for="year" class="form-label">Tahun</label>
                        <select class="form-select" id="year" name="year" required>
                            <option value="">Pilih tahun</option>
                            @for($year = now()->year; $year >= 2000; $year--)
                                <option value="{{ $year }}">{{ $year }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="images" class="form-label">Unggah Foto <span class="text-muted">(Opsional)</span></label>
                        <input class="form-control" type="file" id="images" name="images[]" accept="image/*" multiple onchange="updateList()">
                        <div id="images-label" class="form-text mt-1">Pilih atau drop gambar di sini</div>
                        <ul id="file-list" class="mt-2 ps-3"></ul>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="#" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function updateList() {
        const input = document.getElementById('images');
        const output = document.getElementById('file-list');
        output.innerHTML = '';
        for (let i = 0; i < input.files.length; ++i) {
            const li = document.createElement('li');
            li.textContent = input.files[i].name;
            output.appendChild(li);
        }
    }
</script>
@endsection