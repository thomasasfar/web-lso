<div class="row pb-5 mb-4">
    @foreach ($client as $c)
        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
            <!-- Card-->
            <div class="card rounded shadow-sm border-0">
                <div class="card-body p-4">
                    @if ($c->image != '')
                        <img src="{{ asset('storage/images/klien/' . $c->image) }}" alt="{{ $c->image }}"
                            class="card-img-top">
                    @else
                        <!-- Tampilkan image placeholder jika tidak ada image yang diunggah -->
                        <img src="{{ asset('storage/images/klien/1.jpg') }}" alt="Gambar Placeholder">
                    @endif
                    <h5> <a href="#" class="text-dark">
                            <h5 class="mb-0">{{ $c->nama }}</h5>
                        </a></h5>
                    <p class="small text-muted font-italic">Lorem ipsum dolor sit amet, consectetur adipisicing
                        elit.</p>
                </div>
            </div>
        </div>
    @endforeach
</div>
{!! $client->links() !!}
