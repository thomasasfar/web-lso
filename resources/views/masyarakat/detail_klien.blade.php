@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('masyarakat/navbar')

    <style>
        /* Mengurangi spasi antar elemen */
        .spasi {
            margin-bottom: 10px;
            /* Menyesuaikan margin bawah */
        }

        .card {
            border-radius: 0.5rem;
            /* Menyesuaikan border radius */
        }

        .img-fluid {
            max-height: 250px;
            /* Menyesuaikan maksimal tinggi gambar */
            width: auto;
            /* Menjaga rasio aspek gambar */
            margin-bottom: 15px;
            /* Menyesuaikan margin bawah */
        }

        .card-body {
            padding: 1.5rem;
            /* Menyesuaikan padding */
        }

        .text-muted {
            font-size: 0.9rem;
            /* Menyesuaikan ukuran font */
        }
    </style>

    <div class="container my-3">
        <div class="card mx-auto shadow" style="max-width: 800px;"> <!-- Menyesuaikan lebar maksimal card -->
            <div class="container text-center">
                <div class="row justify-content-center">
                    <div class="col-md-8 mt-3"> <!-- Menyesuaikan kolom untuk gambar -->
                        <img src="{{ asset('storage/images/klien/' . $data->image) }}" class="img-fluid" alt="..."
                            style="max-height: 250px;"> <!-- Menyesuaikan ukuran gambar -->
                    </div>
                </div>
            </div>
            <div class="card-body p-3"> <!-- Menyesuaikan padding card body -->
                <h5 class="card-title text-primary">{{ $data->nama }}</h5>
                <p class="card-text">{{ $data->alamat }}</p>
                <p class="card-text"><small class="text-muted">Kontak : {{ $data->kontak }}</small></p>
                <p class="card-text"><small class="text-muted spasi">Standards:
                        {{ $detailStandards->pluck('standard.nama_standar')->implode(', ') }}
                    </small></p>
                <p class="card-text"><small class="text-muted spasi">Ruang Lingkup:
                        {{ $detailRuangLingkups->pluck('ruanglingkup.nama')->implode(', ') }}
                    </small></p>
            </div>
        </div>
    </div>
@endsection
