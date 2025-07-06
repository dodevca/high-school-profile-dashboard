@extends('auth')

@section('content')
<section class="login-content d-flex align-items-center" style="min-height: 100dvh">
    <div class="container">
        <div class="row align-items-center justify-content-center height-self-center">
            <div class="col-lg-8">
                <div class="card auth-card">
                    <div class="card-body p-0">
                        <div class="row align-items-center auth-content">
                            <div class="col-lg-6 content-left">
                                <div class="p-3">
                                    <h2 class="mb-2">Log In</h2>
                                    <p class="text-muted">Masuk untuk mengakses dashboard.</p>
                                    <form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input type="text" name="email" class="form-control" placeholder="Masukkan email" value="{{ old('username', $remembered['username'] ?? '') }}" required>
                                            <label>Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="password" name="password" class="form-control" placeholder="Masukkan password" value="{{ old('password', $remembered['password'] ?? '') }}" required>
                                            <label>Password</label>
                                        </div>
                                        <div class="form-check mb-3">
                                            <input type="checkbox" name="remember" id="remember" class="form-check-input" value="1" @if(old('remember') || isset($remembered)) checked @endif>
                                            <label class="form-check-label" for="remember">Ingat Saya</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">Masuk</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 bg-primary rounded-end content-right p-5 d-none d-lg-block">
                                <img src="{{ $school->logo ? asset('storage/' . $school->logo) : asset('images/placeholder.webp') }}" class="img-fluid image-right" alt="Logo">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection