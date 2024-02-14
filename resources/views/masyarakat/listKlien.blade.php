@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('masyarakat/navbar')

    <div class="container">


        <h1 style="text-align: center; font-weight:800; font-size: 40px; color:#333" class="my-3">DAFTAR KLIEN</h1>

        <p style="text-align: center">Lihat semua daftar klien disini</p>
        <div style="display: flex; justify-content: center; align-items: center;">
            <a href="" class="btn btn-dark" style="width: 128px">Disini</a>
        </div>
        <hr>

        <div class="container py-5">
            <div class="row">
                @foreach ($client as $c)
                    <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
                        <div class="card my-3 h-80">
                            @if ($c->gambar != '')
                                <img src="{{ asset('storage/images/klien/' . $c->gambar) }}" alt="{{ $c->gambar }}"
                                    class="card-img-top">
                            @else
                                <!-- Tampilkan gambar placeholder jika tidak ada gambar yang diunggah -->
                                <img src="{{ asset('images/klien/1.jpg') }}" alt="Gambar Placeholder"
                                    style="max-width: 100px;">
                            @endif
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-2">
                                    <h5 class="mb-0">{{ $c->nama }}</h5>
                                </div>

                                <div class="d-flex justify-content-between mb-2">
                                    <div class="ms-auto text-black">
                                        <i>{{ $c->alamat }}</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
