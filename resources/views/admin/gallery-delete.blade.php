@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Galeri', 'url' => route('admin.gallery')],
            ['label' => 'Hapus Galeri'],
        ]
    ])

    <div class="card">
        <div class="card-body">
            <h4>Konfirmasi Hapus Galeri</h4>
            <p>Apakah Anda yakin ingin menghapus galeri <strong>{{ $gallery->title }}</strong>?</p>

            <div class="d-flex gap-2 mt-3">
                <form action="{{ route('admin.gallery.destroy', $gallery->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Ya, Hapus</button>
                </form>

                <a href="{{ route('admin.gallery') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </div>
@endsection
