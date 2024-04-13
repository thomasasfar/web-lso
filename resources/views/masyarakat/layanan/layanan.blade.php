@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('masyarakat/navbar')
    <style>
        button {
            background-color: green;
            color: white;
            border: none;
            height: 40px;
            width: 200px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.7;
        }
    </style>

    <div class="container px-5">
        <h1 style="text-align: center; font-weight:600; font-size: 40px; color:#333" class="my-3">LAYANAN KAMI</h1>
        <hr>

        <div class="container">
            @include('masyarakat.layanan.layanan_pagination_data')
        </div>
    </div>
    @include('masyarakat.footer.footer')
@endsection

@section('script')
    @include('masyarakat.footer.script')
@endsection
