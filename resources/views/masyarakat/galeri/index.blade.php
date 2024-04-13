@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('masyarakat/navbar')

    <div class="container my-3">
        <h1 style="text-align: center; font-weight:600; font-size: 40px; color:#333" class="my-3">GALERI</h1>
        <hr>

        <div class="container py-5">
            <div id="data-wrapper">
                @include('masyarakat.galeri.data')
            </div>
        </div>

        <div class="text-center" id="load-more-container">
            <!-- Tombol Load More -->
            @if ($galeri->hasMorePages())
                <button class="btn btn-dark load-more-data"><i class="fa fa-refresh"></i> Load More</button>
            @endif
        </div>

        <!-- Data Loader -->
        <div class="auto-load text-center" style="display: none;">
            <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                <path fill="#000"
                    d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                        from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                </path>
            </svg>
        </div>
    </div>
    @include('masyarakat.footer.footer')
@endsection

@section('script')
    <script>
        var ENDPOINT = "{{ route('galeri.index') }}";
        var page = 1;

        $(".load-more-data").click(function() {
            page++;
            infinteLoadMore(page);
        });

        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })
                .done(function(response) {
                    if (response.html == '') {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response.html);

                    // Periksa apakah masih ada halaman berikutnya
                    if (!response.has_more) {
                        $("#load-more-container").hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
    </script>
    @include('masyarakat.footer.script')
@endsection
@section('script')
    <script>
        var ENDPOINT = "{{ route('galeri.index') }}";
        var page = 1;

        $(".load-more-data").click(function() {
            page++;
            infinteLoadMore(page);
        });

        function infinteLoadMore(page) {
            $.ajax({
                    url: ENDPOINT + "?page=" + page,
                    datatype: "html",
                    type: "get",
                    beforeSend: function() {
                        $('.auto-load').show();
                    }
                })
                .done(function(response) {
                    if (response.html == '') {
                        $('.auto-load').html("We don't have more data to display :(");
                        return;
                    }
                    $('.auto-load').hide();
                    $("#data-wrapper").append(response.html);

                    // Periksa apakah masih ada halaman berikutnya
                    if (!response.has_more) {
                        $("#load-more-container").hide();
                    }
                })
                .fail(function(jqXHR, ajaxOptions, thrownError) {
                    console.log('Server error occured');
                });
        }
    </script>
    @include('masyarakat.footer.script')
@endsection

@section('script')
    @include('masyarakat.footer.script')
@endsection
