@extends('public')

@section('content')

<section id="hero">
    <div class="hero-container">
        <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>
            <div class="carousel-inner" role="listbox">
                
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url('{{ asset('images/placeholder.webp') }}')">
                    <div class="carousel-container">
                        <div class="carousel-content">
                            <p class="animate__animated animate__fadeInUp">Selamat Datang di</p>
                            <h2 class="animate__animated animate__fadeInDown">SMK N 1 SEYEGAN</h2>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 (Dummy Pengumuman Penting) -->
                @if(true)
                    <div class="carousel-item" style="background-image: url('{{ asset('images/placeholder.webp') }}')">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Judul Pengumuman Penting</h2>
                                <p class="animate__animated animate__fadeInUp">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique...
                                </p>
                                <a href="#" class="btn btn-primary animate__animated animate__fadeInUp mb-5">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Slide 3 (Dummy Event) -->
                @if(true)
                    <div class="carousel-item" style="background-image: url('{{ asset('images/placeholder.webp') }}')">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animate__animated animate__fadeInDown">Nama Event Terbaru</h2>
                                <p class="animate__animated animate__fadeInUp">
                                    Deskripsi event yang menarik dan informatif akan ditampilkan di sini. Simak informasinya selengkapnya...
                                </p>
                                <a href="#" class="btn btn-primary animate__animated animate__fadeInUp mb-5">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Navigasi Carousel -->
            <a class="carousel-control-prev" href="#" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </div>
</section>
<section id="featured" class="featured">
    <div class="container">
        <div class="row justify-content-center">
            @if(true)
                @foreach(range(1, 3) as $key)
                    <div class="col-lg-4 {{ $key > 1 ? 'mt-4 mt-lg-0' : '' }}">
                        <a href="#">
                            <div class="icon-box rounded p-0 shadow-sm">
                                <img src="{{ asset('images/placeholder.webp') }}" class="img-fluid rounded-top" alt="News Image">
                                <div class="p-4">
                                    <h3 class="mb-0">Judul Berita {{ $key }}</h3>
                                    <p class="my-3 text-muted">
                                        <small>
                                            <i class="bi bi-calendar d-inline fs-6 me-2"></i>01-01-2025
                                        </small>
                                    </p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque habitant...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada berita.</p>
                </div>
            @endif
        </div>

        @if(true)
            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
            </div>
        @endif
    </div>
</section>

<section id="about" class="about py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="ratio ratio-16x9 rounded-3 shadow">
                    <iframe 
                        src="https://www.youtube.com/embed/Q_9gocspOh0?si=TIScVF5baaDFRU_P" 
                        title="YouTube video" 
                        allow="autoplay; encrypted-media" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
                <h3 class="mb-4">Profil Singkat</h3>
                <p class="fst-italic">
                    SMK Negeri 1 Seyegan merupakan sekolah menengah kejuruan yang berfokus pada pendidikan vokasi dan pengembangan keterampilan kerja bagi siswa tingkat menengah.
                </p>
                <ul style="list-style-type: disc; padding-left: 1.2rem;">
                    <li>Menyediakan berbagai program keahlian yang relevan dengan kebutuhan industri.</li>
                    <li>Didukung oleh tenaga pendidik profesional dan fasilitas pembelajaran yang lengkap.</li>
                    <li>Menjalin kerja sama dengan dunia usaha dan industri dalam program magang dan penempatan kerja.</li>
                </ul>
                <p>
                    Dengan komitmen mencetak lulusan yang kompeten, berkarakter, dan siap bersaing di dunia kerja maupun melanjutkan pendidikan, SMK Negeri 1 Seyegan terus berinovasi dalam meningkatkan kualitas pendidikan dan layanan.
                </p>
                <div class="d-flex flex-column flex-lg-row align-items-center justify-content-center justify-content-lg-start">
                    <a href="#" class="btn btn-primary mb-3 mb-lg-0 me-lg-2">Sambutan Kepala Sekolah</a>
                    <a href="#" class="btn btn-outline-primary">Visi Misi</a>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="services" class="services py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Pengumuman</h2>
        </div>
        <div class="row justify-content-center">
            @if(true)
                @foreach(range(1, 3) as $key)
                    <div class="col-lg-4 col-md-6 {{ $key != 1 ? 'mt-4 mt-md-0' : '' }}">
                        <div class="icon-box text-start rounded p-3 shadow-sm">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <button type="button" class="btn btn-warning btn-sm rounded-5" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="top" data-bs-content="Pengumuman bersifat penting">
                                    <small>Penting</small>
                                </button>
                                <p class="text-end text-muted mb-0">01-01-2025</p>
                            </div>
                            <h4><a href="#">Judul Pengumuman {{ $key }}</a></h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio...</p>
                            <div class="d-flex justify-content-end mt-4">
                                <a href="#" class="btn-link">Lihat pengumuman »</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px"></i>
                    <p>Tidak ada pengumuman.</p>
                </div>
            @endif
        </div>

        <div class="text-center mt-5">
            <a href="#" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
        </div>
    </div>
</section>
<section id="counts" class="counts py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Agenda Mendatang</h2>
        </div>
        <div class="row justify-content-center">
            @if(true)
                @foreach(range(1, 4) as $index)
                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch mb-4">
                        <div class="count-box rounded shadow-sm p-3 w-100">
                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <span class="purecounter m-0 mb-2" data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="0">15</span>
                                    <h3 class="mb-0">Juli</h3>
                                </div>
                                <div class="px-2 py-1 rounded-5 bg-primary text-white small">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-clock me-2"></i> 08:00
                                    </div>
                                </div>
                            </div>
                            <h4 class="mt-4">Judul Agenda {{ $index }}</h4>
                            <p class="h6">Deskripsi agenda singkat yang menjelaskan kegiatan tersebut...</p>
                            <a href="#" class="text-end d-block mt-2">Selengkapnya »</a>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12 text-center pb-5">
                    <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px;"></i>
                    <p>Tidak ada agenda.</p>
                </div>
            @endif
        </div>

        @if(true)
            <div class="text-center mt-5">
                <a href="#" class="btn btn-outline-primary rounded-5">Lebih banyak</a>
            </div>
        @endif
    </div>
</section>

<section id="clients" class="clients py-5">
    <div class="container">
        <div class="section-title text-center mb-5">
            <h2>Album Terbaru</h2>
        </div>
        @if(true)
            <div class="clients-slider swiper">
                <div class="swiper-wrapper align-items-center">
                    @foreach(range(1, 6) as $album)
                        <div class="swiper-slide text-center px-3">
                            <a href="#">
                                <img src="{{ asset('images/placeholder.webp') }}" class="img-fluid rounded" alt="Album Image">
                                <h3 class="h6 text-center mt-3">Album {{ $album }}</h3>
                            </a>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination mt-4"></div>
            </div>
        @else
            <div class="text-center pb-5">
                <i class="bi bi-exclamation-circle mb-3 text-warning" style="font-size: 32px;"></i>
                <p>Tidak ada album.</p>
            </div>
        @endif
    </div>
</section>

@endsection