<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $(document).ready(function() {
            $.ajax({
                url: '/banners', // ganti dengan URL yang benar untuk mengambil data banner
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Proses data yang diterima
                    if (data.length > 0) {
                        var carouselInner = $('.carousel-inner');
                        carouselInner.empty();
                        $.each(data, function(index, banner) {
                            var activeClass = index === 0 ? 'active' : '';
                            var carouselItem = '<div class="carousel-item ' +
                                activeClass + '" data-bs-interval="5000">' +
                                '<img src="/storage/images/banner/' + banner.image +
                                '" class="d-block w-100">' +
                                '</div>';
                            carouselInner.append(carouselItem);
                        });
                    }
                }
            });
        });

        $.ajax({
            url: "{{ route('tentang.profil') }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $.each(response, function(index, data) {
                    if (data.judul == 'profil') {
                        $('#profil-konten').html(data.konten);
                        $('#profil-gambar').attr('src', SITEURL +
                            '/storage/images/tentang/' + data.image)
                    } else if (data.judul == 'visi') {
                        $('#visi-konten').html(data.konten);
                    } else if (data.judul == 'misi') {
                        $('#misi-konten').html(data.konten);
                    } else if (data.judul == 'sejarah') {
                        $('#sejarah-konten').html(data.konten);
                        $('#sejarah-gambar').attr('src', SITEURL +
                            '/storage/images/tentang/' + data.image)
                    }
                });
            }
        });

    });
</script>
