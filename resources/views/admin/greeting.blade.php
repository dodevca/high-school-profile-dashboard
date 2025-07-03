@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Sambutan'],
        ]
    ])
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="mb-4">Sambutan</h4>
                    <form id="edit-form" action="{{ route('api.admin.greeting.update', $greeting->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="author" class="form-label">Nama Penyambut</label>
                                <input type="text" name="author" id="author" class="form-control" value="{{ old('author', $greeting->author) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="photo" class="form-label">Foto</label>
                                <input type="file" name="photo" id="photo" class="form-control">
                                @if($greeting->photo)
                                    <img src="{{ asset('storage/' . $greeting->photo) }}" alt="Photo" class="mt-2" width="240">
                                @endif
                            </div>
                            <div class="col-12">
                                <label for="content" class="form-label">Sambutan</label>
                                <textarea name="content" id="content" class="form-control" rows="10" required>{{ old('content', $greeting->content) }}</textarea>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection