<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        new DataTable('#kontakTable', {
            processing: true,
            serverSide: true,
            ajax: "{{ route('kontak.table') }}",
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
                    data: 'isi',
                    name: 'isi'
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

    /* Edit */
    $('body').on('click', '.tombol-edit', function() {
        var id = $(this).data('id');
        $.get('kontak/' + id + '/edit', function(data) {
            console.log(data)
            // $('#title-error').hide();
            // $('#product_code-error').hide();
            // $('#description-error').hide();
            $('#clientCrudModal').html("Edit Informasi " + data.nama);
            $('#tombol-simpan').val("Simpan");
            $('#modalKontak').modal('show');
            $('#kontak_id').val(data.id);

            $('#isi').val(data.isi);
        })
    });

    $('body').on('submit', '#kontakForm', function(e) {

        e.preventDefault();

        var actionType = $('#tombol-simpan').val();
        $('#tombol-simpan').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "/updatekontak",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {

                $('#kontakForm').trigger("reset");
                $('#modalKontak').modal('hide');
                $('#tombol-simpan').html('Save Changes');
                $('#kontakTable').DataTable().ajax.reload();
            },
            error: function(data) {
                console.log('Error:', data);
                $('#tombol-simpan').html('Save Changes');
            }
        });
    });
</script>
