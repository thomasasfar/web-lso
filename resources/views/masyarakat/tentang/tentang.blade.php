@extends('template')

@section('title', 'Profile')

@section('konten')
    @include('masyarakat/navbar')

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banner as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval = "5000">
                    <img src="{{ asset('storage/images/banner/' . $image->image) }}" class="d-block w-100">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container my-3">
        <h1 class="text-center font-weight-bold" style="font-size: 40px; color: #333; margin-top: 40px;">PROFIL</h1>

        <div class="row workingspace">
            <div class="col-lg-6">
                <img id="profil-gambar" src="" alt="Gambar Profile" class="img-fluid custom-img">
            </div>
            <div class="col-lg-6">
                <div id="profil-konten"></div>
            </div>
        </div>

    </div>

    <div class="container-fluid" style="background-color: #80bb83; margin-top: 40px;">
        <div class="container my-3 py-5">
            <h1 class="text-center font-weight-bold" style="font-size: 40px; color: #333;">VISI dan MISI</h1>

            <div class="row workingspace">
                <div class="col-lg-6">
                    <h2 class="card-title" style="text-align: center;">VISI</h2>
                    <div id="visi-konten"></div>
                </div>
                <div class="col-lg-6">
                    <h2 class="card-title" style="text-align: center;">MISI</h2>
                    <div id="misi-konten"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <h1 class="text-center font-weight-bold" style="font-size: 40px; color: #333;">SEJARAH</h1>

        <div class="row workingspace">

            <div class="col-lg-6">
                <div id="sejarah-konten"></div>
            </div>
            <div class="col-lg-6">
                <img src="" alt="Gambar Profil" id="sejarah-gambar" class="img-fluid">
            </div>
        </div>

    </div>


    <div class="container-fluid" style="background-color: #80bb83; margin-top: 40px;">
        <div class="container my-3 py-5">
            <h1 class="text-center font-weight-bold" style="font-size: 40px; color: #333;">GALERI</h1>
            <div class="row workingspace">
                <!-- Gambar Profil -->
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="margin-bottom: 20px; background-color: transparent; border: none;">
                            <!-- Gambar Profil -->
                            <img src="{{ asset('images/banner/' . $image->gambar) }}" alt="Gambar Profil" class="img-fluid">
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <section id="contact" class="contact">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-header">
                <h1 class="text-center font-weight-bold" style="font-size: 40px; color: #333">KONTAK</h1>
                <p class="text-center font-weight-bold">Butuh bantuan? <span>Kubungi kami</span></p>
            </div>

            <div class="row gy-4">
                <!-- Informasi Alamat, Email, dan Telepon -->
                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                        <div>
                            <h4><i class="icon bi bi-map flex-shrink-0"></i> Alamat</h4>
                            <p>Jl.Lorem ipsum dolor sit amet consectetur. Vestibulum pulvinar tincidunt vulputate</p>
                        </div>
                    </div>

                    <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                        <div>
                            <h4><i class="icon bi bi-envelope flex-shrink-0"></i> E-mail</h4>
                            <p>customerservice@lsosumbar.com</p>
                        </div>
                    </div>

                    <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                        <div>
                            <h4><i class="icon bi bi-telephone flex-shrink-0"></i> Telepon</h4>
                            <p>+62 8 12892723789</p>
                        </div>
                    </div>

                    <!-- Tombol untuk Peta Lokasi -->
                    <div class="info-item d-flex align-items-center justify-content-start" style="margin-top: 20px;">
                        <a href="https://maps.app.goo.gl/JxCUFzPXobPHPWFh8" target="_blank" class="btn btn-secondary"
                            style="margin-left: 10%;">Peta Lokasi</a>
                    </div>
                    <!-- End Tombol untuk Peta Lokasi -->
                </div>
                <!-- End Informasi Alamat, Email, dan Telepon -->

                <!-- Google Maps -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.190239865464!2d100.3598762!3d-0.9257309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b917b169e56d%3A0xc23d1e7718497384!2sLSO%20SUMBAR!5e0!3m2!1sid!2sid!4v1710313513927!5m2!1sid!2sid"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>


                <!-- End Google Maps -->
            </div>
        </div>
    </section>
    <div class="container-fluid" style="background-color: #80bb83; margin-top: 40px;">
        <footer id="footer" class="footer">
            <div class="container">
                <div class="row gy-3">
                    <div class="col-lg-3 col-md-6 d-flex">
                        <div>
                            <h4><i class="bi bi-geo-alt icon"></i> Alamat</h4>
                            <p>Jl.Lorem ipsum dolor sit amet consectetur. Vestibulum pulvinar tincidunt vulputate</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                        <i class="bi bi-telephone icon"></i>
                        <div>
                            <h4>Reservasi</h4>
                            <p>
                                <strong>Telepon:</strong> +62 8 12892723789<br>
                                <strong>Email:</strong> customerservice@lsosumbar.com<br>
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links d-flex">
                        <i class="bi bi-clock icon"></i>
                        <div>
                            <h4>Jam buka</h4>
                            <p>
                                <strong>Senin-jumat:</strong> 8.00AM - 16.00PM<br>
                                <strong>Sabtu-Minggu:</strong> Tutup
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Ikuti kami</h4>
                        <div class="social-links d-flex">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <a href="#" class="scroll-top d-flex align-items-center justify-content-center">
                <i class="bi bi-arrow-up-short"></i>
            </a>

            <div id="preloader"></div>
        </footer>
    </div>
@endsection
@section('script')
    @include('masyarakat.tentang.script')
@endsection
