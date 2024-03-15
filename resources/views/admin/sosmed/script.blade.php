<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: "{{ route('sosmed.table') }}",
            columns: [{
                    data: 'id',
                    name: 'id',
                    visible: false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'nama',
                    name: 'nama',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'alamat',
                    name: 'alamat'
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [0, 'desc']
            ],
        });
    });

    //Delete
    $('body').on('click', '.tombol-del', function(e) {
        if (confirm('Yakin ingin menghapus data sosmed ini?') == true) {
            var id = $(this).data('id');
            var url = "{{ route('sosmed.hapus', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
            });
            $('#myTable').DataTable().ajax.reload();
        }
    });

    /*  Tambah */
    $('#tombol-tambah').click(function() {
        $('#btn-save').val("create-product");
        $('#id').val('');
        $('#sosmedForm').trigger("reset");
        $('#CrudModal').html("Tambah Media Sosial");
        $('#modal').modal('show');
        $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
    });

    /* Edit */
    $('body').on('click', '.tombol-edit', function() {
        var id = $(this).data('id');
        $.get('sosmed/' + id + '/edit', function(data) {
            console.log(data)
            // $('#title-error').hide();
            // $('#product_code-error').hide();
            // $('#description-error').hide();
            $('#CrudModal').html("Edit Data Klien");
            $('#tombol-simpan').val("Simpan");
            $('#modal').modal('show');
            $('#id').val(data.id);
            $('#modal-preview').attr('alt', 'No image available');
            if (data.image) {
                console.log(data.image)
                $('#modal-preview').attr('src', SITEURL + '/storage/images/sosmed/' + data.image);
                $('#hidden_image').attr('src', SITEURL + '/storage/images/sosmed/' + data.image);
            }
            $('#nama').val(data.nama);
            $('#alamat').val(data.alamat);
        })
    });

    $('body').on('submit', '#sosmedForm', function(e) {
        e.preventDefault();

        var actionType = $('#tombol-simpan').val();
        $('#tombol-simpan').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "/tambahsosmed",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#sosmedForm').trigger("reset");
                $('#modal').modal('hide');
                $('#tombol-simpan').html('Save Changes');
                $('#myTable').DataTable().ajax.reload();
            },
            error: function(data) {
                console.log('Error:', data);
                $('#tombol-simpan').html('Save Changes');
            }
        });
    });

    function readURL(input, id) {
        id = id || '#modal-preview';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $(id).attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
            $('#modal-preview').removeClass('visually-hidden');
            $('#start').hide();
        }
    }
</script>
