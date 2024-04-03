<style>
    .cursor:hover {
        background-color: beige;
    }
</style>

<div class="row pb-5 mb-4">
    @foreach ($client as $c)
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <!-- Card-->
            <a href="{{ route('detail.klien', $c->id) }}">
                <div class="card rounded shadow-sm border-0 cursor">
                    <div class="card-body p-4">
                        @if ($c->image != '')
                            <img src="{{ asset('storage/images/klien/' . $c->image) }}" alt="{{ $c->image }}"
                                class="card-img-top">
                        @else
                            <!-- Tampilkan image placeholder jika tidak ada image yang diunggah -->
                            <img src="{{ asset('storage/images/klien/1.jpg') }}" alt="Gambar Placeholder">
                        @endif
                        <h5>
                            <h5 class="mb-0">{{ $c->nama }}</h5>
                        </h5>
                        <p class="small text-muted font-italic">{{ $c->alamat }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>
{!! $client->links() !!}
