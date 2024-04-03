@extends('template')

@section('title', 'Profile')

@section('konten')
    @include('masyarakat/navbar')

    <section id="contact" class="contact">
        <div class="container-fluid" data-aos="fade-up">
            <div class="container">
                <div class="section-header">
                    <h1 class="text-center font-weight-bold my-2" style="font-size: 40px; color: #333">KONTAK</h1>
                    <p class="text-center font-weight-bold">Butuh bantuan? <span>Kubungi kami</span></p>
                    <hr>
                </div>

                <div class="row gy-4">
                    <!-- Informasi Alamat, Email, dan Telepon -->
                    <div class="col-md-6">
                        <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                            <div>
                                <h4><i class="icon bi bi-map flex-shrink-0"></i> Alamat</h4>
                                <p id="alamat"></p>
                            </div>
                        </div>

                        <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                            <div>
                                <h4><i class="icon bi bi-envelope flex-shrink-0"></i> E-mail</h4>
                                <p id="email"></p>
                            </div>
                        </div>

                        <div class="info-item d-flex align-items-center" style="margin-left: 1cm;">
                            <div>
                                <h4><i class="icon bi bi-telephone flex-shrink-0"></i> Telepon</h4>
                                <p id="telepon"></p>
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
                                width="480" height="320" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>


                    <!-- End Google Maps -->
                </div>
            </div>
        </div>
    </section>
    @include('masyarakat.footer.footer')
@endsection
@section('script')
    <script>
        var SITEURL = '{{ URL::to('') }}';

        $(document).ready(function() {
            $.ajax({
                url: "{{ route('footer.kontak') }}",
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    $.each(response, function(index, data) {
                        if (data.nama == 'alamat') {
                            $('#alamat').html(data.isi);
                        } else if (data.nama == 'email') {
                            $('#email').html(data.isi);
                        } else if (data.nama == 'telepon') {
                            $('#telepon').html(data.isi);
                        }
                    });
                }
            });
        });
    </script>
    @include('masyarakat.footer.script')
@endsection
