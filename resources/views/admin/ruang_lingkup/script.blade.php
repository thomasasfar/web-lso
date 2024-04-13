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

    $('input').focus(function() {
        var fieldName = $(this).attr('name');
        $('#' + fieldName).removeClass('is-invalid');
        $('#' + fieldName + '_error').text('');
    });

    $('body').on('submit', '#ruanglingkupForm', function(e) {

        e.preventDefault();

        $('#error-messages').html('');
        $('input, select').removeClass('is-invalid').next('.invalid-feedback').remove();

        $('#spinner').show();
        $('#textSpinner').hide();

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
                $('#ruangLingkupTable').DataTable().ajax.reload();
            },
            error: function(xhr, status, error) {
                var err = JSON.parse(xhr.responseText);
                if (xhr.status == 422) {
                    $('#spinner').hide();
                    $('#textSpinner').show();
                    // Menangani kesalahan validasi
                    var errors = err.errors;
                    $.each(errors, function(key, value) {
                        // Tampilkan pesan kesalahan di bawah input yang sesuai
                        $('#' + key).addClass('is-invalid');
                        $('#' + key).after('<div class="invalid-feedback">' + value +
                            '</div>');
                    });
                } else {
                    $('#spinner').hide();
                    $('#textSpinner').show();
                    // Menangani kesalahan lainnya
                    console.error('Kesalahan:', error);
                }
            }
        });
    });

    //Delete
    $('body').on('click', '.tombol-del', function(e) {
        if (confirm(
                'Apakah anda yakin ingin menghapus data ini?'
            ) == true) {
            var id = $(this).data('id');
            var url = "{{ route('ruanglingkup.hapus', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(response) {
                    if (response.status) {
                        alert(response.message); // Pesan sukses
                        $('#ruangLingkupTable').DataTable().ajax.reload();
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
        }
    });
</script>
