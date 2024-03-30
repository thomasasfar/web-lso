<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        new DataTable('#myTable', {
            processing: true,
            serverSide: true,
            ajax: "{{ route('galeri.table') }}",
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
                    data: 'caption',
                    name: 'caption',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'image',
                    name: 'image'
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

    $('body').on('click', '.tombol-del', function(e) {
        if (confirm('Yakin ingin menghapus data klien ini?') == true) {
            var id = $(this).data('id');
            var url = "{{ route('galeri.hapus', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
            });
            $('#myTable').DataTable().ajax.reload();
        }
    });

    $('#tombol-tambah').click(function() {
        $('#btn-save').val("create-product");
        $('#id').val('');
        $('#galeriForm').trigger("reset");
        $('#galeriCrudModal').html("Tambah Klien");
        $('#modalGaleri').modal('show');
        $('#modal-preview').addClass('visually-hidden');
        // $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
    });

    $('body').on('click', '.tombol-edit', function() {
        var id = $(this).data('id');
        $.get('galeri/' + id + '/edit', function(data) {
            console.log(data)
            $('#galeriCrudModal').html("Edit Data Klien");
            $('#tombol-simpan').val("Simpan");
            $('#modalGaleri').modal('show');
            $('#id').val(data.id);

            $('#modal-preview').attr('alt', 'No image available');
            if (data.image) {
                console.log(data.image)
                $('#modal-preview').removeClass('visually-hidden')
                $('#modal-preview').attr('src', SITEURL + '/storage/images/galeri/' + data.image);
                $('#hidden_image').val(data.image);
            }

            $('#caption').val(data.caption);
        })
    });

    $('body').on('submit', '#galeriForm', function(e) {

        e.preventDefault();

        var actionType = $('#tombol-simpan').val();
        $('#tombol-simpan').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "/admin/galeri",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#galeriForm').trigger("reset");
                $('#modalGaleri').modal('hide');
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
        }
    }
</script>
