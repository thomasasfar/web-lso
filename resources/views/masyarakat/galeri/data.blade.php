<div class="row text-center text-lg-start">
    @foreach ($galeri as $g)
        <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="{{ asset('storage/images/galeri/' . $g->image) }}"
                    alt="{{ $g->image }}" style="height:200px; width:300px;">
            </a>
        </div>
    @endforeach
</div>
