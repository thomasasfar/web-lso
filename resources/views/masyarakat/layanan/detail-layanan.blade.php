@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('masyarakat/navbar')
    <style>
        .deskripsi {}
    </style>

    <div class="container mx-5 mb-5">
        <div class="my-3">
            <h1 style="text-align: center;" class="uppercase">{{ $layanan->nama }}</h1>
        </div>
        <hr>
        <div class="row g-0 text-left">
            <div class="col-md-4">
                <img class=layanan-img style="max-width: 300px"
                    src="{{ asset('storage/images/layanan/' . $layanan->image) }}">
            </div>
            <div class="col-md-8">
                <p>{!! $layanan->deskripsi !!}</p>
                <a href="{{ route('layanan.downloadPdf', $layanan->id) }}" class="btn btn-success">Download Persyaratan</a>
            </div>
        </div>
    </div>
    @include('masyarakat.footer.footer')
@endsection
@section('script')
    @include('masyarakat.footer.script')
@endsection
