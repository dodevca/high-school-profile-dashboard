@extends('admin')

@section('content')
    @include('partials.breadcrumbs', [
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('admin.home')],
            ['label' => 'Agenda'],
        ]
    ])
    <div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 class="card-title">Edit Agenda</h4>
            </div>
            <div class="card-body">
                @if (session('errors'))
                    <div class="alert alert-warning my-3" role="alert">
                        <i class="bi bi-exclamation-triangle me-2"></i>
                        <ul class="mb-0 ps-3">
                            @foreach (session('errors') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 d-none">
                        <label for="event-id" class="form-label">Id</label>
                        <input type="text" class="form-control" id="event-id" name="event-id" value="123" required>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" value="Agenda Dummy" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="description" name="description" rows="10" required>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="date-start" class="form-label">Tanggal Mulai</label>
                            <div class="border border-light rounded py-4 px-3 mb-2">
                                <input type="text" id="inline-date" class="form-control d-none" name="date-start" value="2025-01-01" readonly required>
                                <span class="text-muted">2025-01-01</span> {{-- Placeholder visible date --}}
                            </div>
                            <input type="time" class="form-control mt-2" id="time" name="time-start" value="08:00" required>
                        </div>

                        <div class="col-md-6">
                            <label for="date-end" class="form-label">Tanggal Selesai</label>
                            <div class="border border-light rounded py-4 px-3 mb-2">
                                <input type="text" id="inline-date1" class="form-control d-none" name="date-end" value="2025-01-02" readonly required>
                                <span class="text-muted">2025-01-02</span> {{-- Placeholder visible date --}}
                            </div>
                            <input type="time" class="form-control mt-2" id="time1" name="time-end" value="12:00" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="#" class="btn btn-danger ms-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection