@extends('public')

@section('content')

<section>
    <div class="container">
        <div class="rounded shadow p-4">
            <div class="d-flex align-items-center gap-3 mb-3">
                <span class="bg-primary text-white rounded-5 px-3 py-2" style="font-size: 13px">
                    Pengumuman
                </span>
                {{-- Dummy kondisi penting --}}
                @if(true)
                    <span class="border border-warning rounded-5 px-3 py-2" style="font-size: 13px">
                        <i class="bi bi-exclamation-circle-fill text-warning me-2"></i>Penting
                    </span>
                @endif
            </div>
            <h2>Judul Pengumuman Dummy</h2>
            <div class="d-flex align-items-center gap-3">
                <p class="mb-0">2 hari lalu</p>
                <div class="bg-dark" style="width: 1px; height: 1rem;"></div>
                <p class="mb-0">08 Juli 2025</p>
            </div> 
        </div>

        <div class="row mt-5">
            <div class="col-md-8">
                <div>
                    <p>
                        Ini adalah konten pengumuman dummy. Anda dapat mengganti isi ini dengan konten asli dari database menggunakan controller Laravel.
                    </p>
                    <p>
                        Konten ini bisa berisi HTML lengkap dan ditampilkan langsung menggunakan `{!! $result->content !!}` jika dinamis.
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h3 class="h5 text-start mb-3">Lampiran Pengumuman</h3>
                        <a href="#" class="btn btn-primary mb-3" target="_blank">
                            <i class="bi bi-eye me-2"></i>Lihat Lampiran
                        </a>
                        <a href="files/placeholder.pdf" class="btn btn-outline-primary" download>
                            <i class="bi bi-cloud-download me-2"></i>Unduh Lampiran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection