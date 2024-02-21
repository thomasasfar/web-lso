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
                            @if ($c->image != '')
                                <img src="{{ asset('storage/images/klien/' . $c->image) }}" alt="{{ $c->image }}"
                                    class="card-img-top">
                            @else
                                <!-- Tampilkan image placeholder jika tidak ada image yang diunggah -->
                                <img src="{{ asset('storage/images/klien/1.jpg') }}" alt="Gambar Placeholder">
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

@section('script')
<script>
	$(document).ready(function(){

	    $(document).on('click', '.pagination a', function(event){
	        event.preventDefault();
	        var page = $(this).attr('href').split('page=')[1];
	        fetch_user_data(page);
	    });

	    function fetch_user_data(page)
	    {
	        $.ajax({
                url:"/pagination/ajax?page="+page,
                success:function(data)
                {
                    $('#user_table').html(data);
                }
	        });
	    }
	});
</script>
@endsection
