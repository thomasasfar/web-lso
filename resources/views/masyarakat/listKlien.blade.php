@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('masyarakat/navbar')

    <div class="container">

        <h1 style="text-align: center; font-weight:600; font-size: 40px; color:#333" class="my-3">DAFTAR KLIEN</h1>

        <p style="text-align: center">Lihat semua daftar klien disini</p>
        <div style="display: flex; justify-content: center; align-items: center;">
            <a href="/download" class="btn btn-dark">Unduh Daftar Klien</a>
        </div>
        <br>
        <hr>

        <div class="container py-5">
            <div id="klien_table">
                @include('masyarakat.klien_pagination_data')
            </div>

        </div>
    </div>
    @include('masyarakat.footer.footer')
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
    @include('masyarakat.footer.script')
@endsection
