<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
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
