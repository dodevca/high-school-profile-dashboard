@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Informasi Sekolah'],
        ]
    ])
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body">
                    <h4 class="mb-4">Informasi Sekolah</h4>
                    <form id="edit-form" action="{{ route('api.admin.information.update', ['id' => $information->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
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
                                <textarea name="address" id="address" class="form-control" rows="3" required>{{ old('address', $information->address) }}</textarea>
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
                                    <img src="{{ asset('storage/' . $information->logo) }}" alt="Logo" class="mt-2" width="120">
                                @endif
                            </div>
                            <div class="col-md-12">
                                <label for="vision" class="form-label">Visi</label>
                                <textarea name="vision" id="vision" class="form-control" rows="2" required>{{ old('vision', $information->vision) }}</textarea>
                            </div>
                            <div class="col-12">
                                <label for="mission" class="form-label">Misi</label>
                                <textarea name="mission" id="mission" class="form-control" rows="4" required>{{ old('mission', $information->mission) }}</textarea>
                            </div>
                        </div>
                        <div class="mt-4 text-end">
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
    document.addEventListener('DOMContentLoaded', () => {
        const saveButton = document.querySelector('#save');

        saveButton.addEventListener('click', async e => {
            e.preventDefault();

            saveData();
        });
    });
</script>
@endsection