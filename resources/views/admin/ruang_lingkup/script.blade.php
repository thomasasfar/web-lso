<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $('#ruangLingkupTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('ruanglingkup.table') }}",
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
                    data: 'nama',
                    name: 'nama',
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
    $('#tombol-tambah').click(function() {
        $('#btn-save').val("Tambah");
        $('#ruang_lingkup_id').val('');
        $('#ruangLingkupForm').trigger("reset");
        $('#ruangLingkupCrudModal').html("Tambah Ruang Lingkup");
        $('#modalRuangLingkup').modal('show');
    });

    $('body').on('click', '.tombol-edit', function() {
        var id = $(this).data('id');
        $.get('ruanglingkup/' + id + '/edit', function(data) {
            console.log(data)
            // $('#title-error').hide();
            // $('#product_code-error').hide();
            // $('#description-error').hide();
            $('#ruangLingkupCrudModal').html("Edit Data Ruang Lingkup");
            $('#tombol-simpan').val("Simpan");
            $('#modalRuangLingkup').modal('show');
            $('#ruang_lingkup_id').val(data.id);

            $('#nama').val(data.nama);
        })
    });

    $('body').on('submit', '#standardForm', function(e) {

        e.preventDefault();

        var actionType = $('#tombol-simpan').val();
        $('#tombol-simpan').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "/tambahruanglingkup",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {

                $('#ruangLingkupForm').trigger("reset");
                $('#modalRuangLingkup').modal('hide');
                $('#tombol-simpan').html('Save Changes');
                var oTable = $('#ruangLingkupTable').dataTable();
                oTable.fnDraw(false);
            },
            error: function(data) {
                console.log('Error:', data);
                $('#tombol-simpan').html('Save Changes');
            }
        });
    });

    //Delete
    $('body').on('click', '.tombol-del', function(e) {
        if (confirm(
                'Menghapus ruang lingkup akan menghapus klien yang terdaftar pada ruang lingkup ini. Anda yakin ingin melanjutkan? '
                ) == true) {
            var id = $(this).data('id');
            var url = "{{ route('ruanglingkup.hapus', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
            });
            $('#ruangLingkupTable').DataTable().ajax.reload();
        }
    });
</script>
