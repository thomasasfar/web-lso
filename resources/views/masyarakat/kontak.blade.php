@extends('template')

@section('title', 'Profile')

@section('konten')
    @include('masyarakat/navbar')

    <section id="contact" class="contact">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-header">
                <h1 class="text-center font-weight-bold" style="font-size: 40px; color: #333">KONTAK</h1>
                <p class="text-center font-weight-bold">Butuh bantuan? <span>Kubungi kami</span></p>
            </div>
    
            <div class="row gy-4">
                <!-- Informasi Alamat, Email, dan Telepon -->
                <div class="col-md-6">
                    <div class="info-item d-flex align-items-center"style="margin-left: 1cm;">
                        <i class="icon bi bi-map flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <h4>Lembaga Sertifikasi Organik (LSO) Sumbar</h4>
                            <p>Jl.Lorem ipsum dolor sit amet consectetur. Vestibulum pulvinar tincidunt vulputate</p>
                        </div>
                    </div>
            
                    <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                        <i class="icon bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>E-mail</h3>
                            <p>customerservice@lsosumbar.com</p>
                        </div>
                    </div>
            
                    <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                        <i class="icon bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Telepon</h3>
                            <p>+62 8 12892723789</p>
                        </div>
                    </div>
            
                    <!-- Tombol untuk Peta Lokasi -->
                    <div class="info-item d-flex align-items-center justify-content-start" style="margin-top: 20px;">
                        <a href="https://maps.app.goo.gl/JxCUFzPXobPHPWFh8" target="_blank" class="btn btn-secondary" style="margin-left: 10%;">Peta Lokasi</a>
                    </div>
                    <!-- End Tombol untuk Peta Lokasi -->
                </div>
                <!-- End Informasi Alamat, Email, dan Telepon -->
            
                <!-- Google Maps -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <iframe style="border: 0; width: 100%; min-height: 350px;"
                            src="https://maps.app.goo.gl/JxCUFzPXobPHPWFh8"
                            frameborder="0" allowfullscreen></iframe>
                    </div>
                </div>
                <!-- End Google Maps -->
            </div>

            

    
</section>
@endsection
