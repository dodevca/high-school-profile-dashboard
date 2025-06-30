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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nama Sekolah</label>
                                <input type="text" name="name" id="name" class="form-control" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="npsn" class="form-label">NPSN</label>
                                <input type="text" name="npsn" id="npsn" class="form-control" value="" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nss" class="form-label">NSS</label>
                                <input type="text" name="nss" id="nss" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="education_level" class="form-label">Tingkat Pendidikan</label>
                                <input type="text" name="education_level" id="education_level" class="form-control" value="" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Alamat</label>
                                <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="district" class="form-label">Kecamatan</label>
                                <input type="text" name="district" id="district" class="form-control" value="" required>
                            </div>
                            <div class="col-md-4">
                                <label for="city" class="form-label">Kota</label>
                                <input type="text" name="city" id="city" class="form-control" value="" required>
                            </div>
                            <div class="col-md-4">
                                <label for="province" class="form-label">Provinsi</label>
                                <input type="text" name="province" id="province" class="form-control" value="" required>
                            </div>
                            <div class="col-md-4">
                                <label for="postal_code" class="form-label">Kode Pos</label>
                                <input type="text" name="postal_code" id="postal_code" class="form-control" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="phone" class="form-label">Telepon</label>
                                <input type="text" name="phone" id="phone" class="form-control" value="">
                            </div>
                            <div class="col-md-4">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="">
                            </div>
                            <div class="col-md-6">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" name="logo" id="logo" class="form-control">
                                <img src="{{ asset('images/placeholder.webp') }}" alt="Logo" class="mt-2" width="120">
                            </div>
                            <div class="col-md-6">
                                <label for="vision" class="form-label">Visi</label>
                                <textarea name="vision" id="vision" class="form-control" rows="2" required></textarea>
                            </div>
                            <div class="col-12">
                                <label for="mission" class="form-label">Misi</label>
                                <textarea name="mission" id="mission" class="form-control" rows="4" required></textarea>
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection