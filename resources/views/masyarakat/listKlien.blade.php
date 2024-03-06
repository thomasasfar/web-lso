@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('masyarakat/navbar')

    <div class="container">


        <h1 style="text-align: center; font-weight:800; font-size: 40px; color:#333" class="my-3">DAFTAR KLIEN</h1>

        <p style="text-align: center">Lihat semua daftar klien disini</p>
        <br>
        <div style="display: flex; justify-content: center; align-items: center;">
            <a href="" class="btn btn-dark" style="width: 128px">Disini</a>
        </div>
        <br>
        <hr>

        <div class="container py-5">

            <div id="klien_table">
                @include('masyarakat.klien_pagination_data')
            </div>

        </div>

        <table class="table table-striped" id="myTable">
            <thead>
                <tr style="display:none;">
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Ruang Lingkup</th>
                    <th scope="col">Status</th>
                    <th scope="col">Standar</th>
                    <th scope="col" style="display:none;">Kontak</th>
                    <th scope="col" style="display:none;">Validasi</th>
                    <th scope="col" style="display:none;">Nomor Sertifikat</th>
                    <th scope="col" style="display:none;">Tanggal Berlaku</th>
                    <th scope="col" style="display:none;">Tanggal Berakhir</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
        </table>


    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.pagination a', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                fetch_user_data(page);
            });

            function fetch_user_data(page) {
                $.ajax({
                    url: "/pagination/ajax?page=" + page,
                    success: function(data) {
                        $('#klien_table').html(data);
                    }
                });
            }
        });
    </script>
@endsection
