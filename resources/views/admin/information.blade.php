@extends('admin')

@section('stylesheet')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Informasi Sekolah'],
        ]
    ])
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title mb-0">Informasi Sekolah</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form id="edit-form" action="{{ route('api.admin.information.update', $information->id) }}" method="PUT" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Sekolah</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $information->name) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="text" name="npsn" id="npsn" class="form-control" value="{{ old('npsn', $information->npsn) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nss" class="form-label">NSS</label>
                                <input type="text" name="nss" id="nss" class="form-control" value="{{ old('nss', $information->nss) }}">
                            </div>
                            <div class="col-md-6">
                                <label for="education_level" class="form-label">Tingkat Pendidikan</label>
                                <input type="text" name="education_level" id="education_level" class="form-control" value="{{ old('education_level', $information->education_level) }}" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" id="address" class="form-control" rows="4" required>{{ old('address', $information->address) }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="district" class="form-label">Kecamatan</label>
                                <input type="text" name="district" id="district" class="form-control" value="{{ old('district', $information->district) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" name="city" id="city" class="form-control" value="{{ old('city', $information->city) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="province" class="form-label">Provinsi</label>
                                <input type="text" name="province" id="province" class="form-control" value="{{ old('province', $information->province) }}" required>
                            </div>
                            <div class="col-md-4">
                                <label for="postal_code" class="form-label">Kode Pos</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control" value="{{ old('postal_code', $information->postal_code) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="{{ old('phone', $information->phone) }}">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $information->email) }}">
                            </div>
                            <div class="col-md-12">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                @if($information->logo)
                                    <img src="{{ asset('storage/' . $information->logo) }}" alt="Logo" class="img-thumbnail mt-2" width="120">
                                @endif
                                <div class="form-text">
                                    Jenis berkas: jpg, jpeg, png, atau webp.
                                    <br>
                                    Ukuran maksimal: 2.0 MB.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="vision" class="form-label">Visi</label>
                                <textarea name="vision" id="vision" class="form-control" rows="4" required>{{ old('vision', $information->vision) }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="mission" class="form-label">Misi</label>
                                <textarea name="mission" id="mission" class="form-control d-none" rows="10" required>{!! old('mission', $information->mission) !!}</textarea>
                                <div id="quill-container" class="rounded-bottom" style="height: 254px;">
                                    {!! old('mission', $information->mission) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="short-profile" class="form-label">Profil Singkat Sekolah</label>
                                <textarea name="short_profile" id="short-profile" class="form-control d-none" rows="16" required>{{ old('short_profile', $information->short_profile) }}</textarea>
                                <div id="quill-container-2" class="rounded-bottom" style="height: 398px;">
                                    {!! old('short_profile', $information->short_profile) !!}
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="youtube_url" class="form-label">Video Profil</label>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <input type="text" name="youtube_url" id="youtube_url" class="form-control" placeholder="Masukkan URL embed video youtube" value="{{ old('youtube_url', $information->youtube_url) }}">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="youtube_url_2" id="youtube_url_2" class="form-control" placeholder="Masukkan URL embed video youtube" value="{{ old('youtube_url_2', $information->youtube_url_2) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="hero" class="form-label">Hero</label>
                                <input type="file" name="hero" id="hero" class="form-control">
                                @if($information->hero)
                                    <img src="{{ asset('storage/' . $information->hero) }}" alt="Logo" class="img-thumbnail mt-2" width="280">
                                @endif
                                <div class="form-text">
                                    Jenis berkas: jpg, jpeg, png, atau webp.
                                    <br>
                                    Ukuran maksimal: 2.0 MB.
                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="{{ asset('js/alert.js') }}"></script>
<script src="{{ asset('js/edit.js') }}"></script>
<script>
  const quill = new Quill('#quill-container', {
    theme: 'snow'
  });

  const quill2 = new Quill('#quill-container-2', {
    theme: 'snow'
  });
</script>
<script>
    
    $(function() {
        $('#save').on('click', function(){
            var html = quill.root.innerHTML;
            var html2 = quill2.root.innerHTML;

            $('#mission').val(html);
            $('#short-profile').val(html2);

            saveData();
        });
    });
</script>
@endsection