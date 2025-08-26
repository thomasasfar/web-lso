@php
    use Illuminate\Support\Str;
@endphp

@foreach ($layanan as $l)
    <div class="card my-5" style="border:0px">
        <div class="row g-0 text-left">
            <div class="col-md-4">
                <img class=layanan-img style="max-width: 300px" src="{{ asset('storage/images/layanan/' . $l->image) }}">
            </div>
            <div class="col-md-8">
                <h2>{{ $l->nama }}</h2>
                <p>{!! \Illuminate\Support\Str::words($l->deskripsi, 72, '...') !!}</p>
                <a href="{{ route('detail.layanan', $l->id) }}" class="btn btn-success">Lihat Detail ></a href="#">
            </div>
        </div>
    </div>
@endforeach

{!! $layanan->links() !!}
