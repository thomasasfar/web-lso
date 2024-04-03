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
        <h1 class="raleway-1 text-center font-weight-bold " style="font-size: 40px; color: #333; margin-top: 40px;">PROFIL
        </h1>

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
                {{-- @for ($i = 0; $i < 4; $i++)
                    <div class="col-lg-3 col-md-6">
                        <div class="card" style="margin-bottom: 20px; background-color: transparent; border: none;">
                            <!-- Gambar Profil -->
                            <img src="{{ asset('images/banner/' . $image->gambar) }}" alt="Gambar Profil" class="img-fluid">
                        </div>
                    </div>
                @endfor --}}
            </div>
        </div>
    </div>

    @include('masyarakat.footer.footer')
@endsection
@section('script')
    @include('masyarakat.tentang.script')
    @include('masyarakat.footer.script')
@endsection
