<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $('#standardTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('standard.table') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'id',
                    name: 'id',
                    visible: false
                },
                {
                    data: 'nama_standar',
                    name: 'nama_standar',
                    orderable: true,
                    searchable: true
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [1, 'desc']
            ]
        });
    });

    /*  When user click add user button */
    $('#tombol-tambah-standar').click(function() {
        $('#btn-save').val("Tambah");
        $('#standard_id').val('');
        $('#standardForm').trigger("reset");
        $('#standardCrudModal').html("Tambah Standar");
        $('#modalStandar').modal('show');
    });

    $('body').on('click', '.tombol-edit', function() {
        var id = $(this).data('id');
        $.get('standard/' + id + '/edit', function(data) {
            console.log(data)
            // $('#title-error').hide();
            // $('#product_code-error').hide();
            // $('#description-error').hide();
            $('#standardCrudModal').html("Edit Data Klien");
            $('#tombol-simpan').val("Simpan");
            $('#modalStandar').modal('show');
            $('#standard_id').val(data.id);

            $('#nama_standar').val(data.nama_standar);
        })
    });

    $('body').on('submit', '#standardForm', function(e) {

        e.preventDefault();

        var actionType = $('#tombol-simpan').val();
        $('#tombol-simpan').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "/tambahstandard",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {

                $('#standardForm').trigger("reset");
                $('#modalStandar').modal('hide');
                $('#tombol-simpan').html('Save Changes');
                // var oTable = $('#standardTable').dataTable();
                // oTable.fnDraw(false);
                $('#standardTable').DataTable().ajax.reload();
            },
            error: function(data) {
                console.log('Error:', data);
                $('#tombol-simpan').html('Save Changes');
            }
        });
    });

    //Delete
    $('body').on('click', '.tombol-del', function(e) {
        var nama = $(this).data('nama_standar')
        if (confirm(
                'Apakah anda yakin ingin menghapus standar ini?'
            ) == true) {
            var id = $(this).data('id');

            var url = "{{ route('standard.hapus', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(response) {
                    if (response.status) {
                        alert(response.message); // Pesan sukses
                        $('#standardTable').DataTable().ajax.reload();
                    }
                },
                error: function(xhr) {
                    if (xhr.status === 403) {
                        alert(xhr.responseJSON.message); // Pesan error dari server
                    } else {
                        alert('Terjadi kesalahan, silakan coba lagi.');
                    }
                }
            });
            $('#standardTable').DataTable().ajax.reload();
        }
    });
</script>
