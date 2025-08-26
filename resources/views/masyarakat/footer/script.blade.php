<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $.ajax({
            url: "{{ route('footer.kontak') }}",
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                $.each(response, function(index, data) {
                    if (data.nama == 'alamat') {
                        $('#alamat').html(data.isi);
                    } else if (data.nama == 'email') {
                        $('#email').html(data.isi);
                    } else if (data.nama == 'telepon') {
                        $('#telepon').html(data.isi);
                    }
                });
            }
        });

        $.ajax({
            url: "{{ route('footer.sosmed') }}", // Sesuaikan dengan rute yang sesuai
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                displaySocialMedia(response);
            }
        });
    });

    function displaySocialMedia(socialMedia) {
        var socialIcons = $('.social-icons');
        $.each(socialMedia, function(index, data) {
            var icon = $('<a>').attr('href', data.alamat).html(
                '<img src="/storage/images/sosmed/' + data.image +
                '" alt="' + data.name + '" style="width: 32px; height: auto;">'
            ); // Ganti ukuran gambar sesuai kebutuhan di sini
            socialIcons.append(icon);
        });
    }
</script>
