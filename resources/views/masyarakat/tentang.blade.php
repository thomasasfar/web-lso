@extends('template')

@section('title')
    Profile
@endsection

@section('konten')
    @include('masyarakat/navbar')

    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($banner as $image)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval = "5000">
                    <img src="{{ asset('images/banner/' .$image->gambar) }}" class="d-block w-100">
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

    <div>
        <h1 style="text-align: center; font-weight:800; font-size: 40px; color:#333" class="my-3">PROFIL</h1>
    </div>
@endsection
