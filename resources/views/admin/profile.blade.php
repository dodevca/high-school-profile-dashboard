@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Profil'],
        ]
    ])
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-body d-flex align-items-center gap-3">
                    <div class="position-relative">
                        <img src="{{ asset('images/placeholder.webp') }}" alt="Profile" class="rounded-circle" width="80" height="80">
                    </div>
                    <div>
                        <h4 class="mb-1">John Doe</h4>
                        <p class="text-muted mb-2">admin@example.com</p>
                        <span class="badge bg-success">Terverivikasi</span>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <p class="mb-3">Harap masukkan kata sandi baru Anda di bawah ini. Anda akan keluar setelah menyetel ulang kata sandi.</p>
                    <form action="#" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#change-password-modal">Ganti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection