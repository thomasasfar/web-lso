<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $('#myTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: "{{ route('klien.table') }}",
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
                    data: 'ruang_lingkup',
                    name: 'ruang_lingkup'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'standar',
                    name: 'standar'
                },
                {
                    data: 'kontak',
                    name: 'kontak',
                    visible: false
                },
                {
                    data: 'validasi',
                    name: 'validasi',
                    visible: false
                },
                {
                    data: 'nomor_sertifikat',
                    name: 'nomor_sertifikat',
                    visible: false
                },
                {
                    data: 'tanggal_mulai_berlaku',
                    name: 'tanggal_mulai_berlaku',
                    visible: false
                },
                {
                    data: 'tanggal_habis_berlaku',
                    name: 'tanggal_habis_berlaku',
                    visible: false
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
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8,
                            9
                        ], // Kolom yang ingin diekspor (mulai dari indeks 0)
                    },
                    filename: 'data_excel', // Nama default untuk file Excel
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8,
                            9
                        ], // Kolom yang ingin diekspor (mulai dari indeks 0)
                    },
                    filename: 'data_pdf', // Nama default untuk file PDF
                }
            ]
        });
    });



    //Delete
    $('body').on('click', '.tombol-del', function(e) {
        if (confirm('Yakin ingin menghapus data klien ini?') == true) {
            var id = $(this).data('id');
            var url = "{{ route('klien.hapus', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
            });
            $('#myTable').DataTable().ajax.reload();
        }
    });


    /*  When user click add user button */
    $('#tombol-tambah-klien').click(function() {
        $('#btn-save').val("create-product");
        $('#client_id').val('');
        $('#clientForm').trigger("reset");
        $('#clientCrudModal').html("Tambah Klien");
        $('#modalKlien').modal('show');
        $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
        $.get("{{ route('standard.list') }}", function(data) {
            $('#id_standar').empty();
            console.log(data);

            // Looping data JSON
            $.each(data, function(key, value) {
                // Pastikan properti id dan nama_standar ada
                console.log(value.id, value.nama_standar);

                // Append option ke dropdown dengan format yang benar
                $('#id_standar').append('<option value="' + value
                    .id + '">' + value.nama_standar +
                    '</option>');
            });
        });
        $.get("{{ route('ruanglingkup.list') }}", function(data) {
            $('#id_ruang_lingkup').empty();
            console.log(data);

            // Looping data JSON
            $.each(data, function(key, value) {
                // Pastikan properti id dan nama_standar ada
                console.log(value.id, value.nama);

                // Append option ke dropdown dengan format yang benar
                $('#id_ruang_lingkup').append('<option value="' +
                    value
                    .id + '">' + value.nama +
                    '</option>');
            });
        })
    });

    /* Edit */
    $('body').on('click', '.tombol-edit', function() {
        var id = $(this).data('id');
        $.get('client/' + id + '/edit', function(data) {
            console.log(data)
            // $('#title-error').hide();
            // $('#product_code-error').hide();
            // $('#description-error').hide();
            $('#clientCrudModal').html("Edit Data Klien");
            $('#tombol-simpan').val("Simpan");
            $('#modalKlien').modal('show');
            $('#client_id').val(data.id);

            $('#modal-preview').attr('alt', 'No image available');
            if (data.image) {
                console.log(data.image)
                $('#modal-preview').attr('src', SITEURL + '/storage/images/klien/' + data.image);
                $('#hidden_image').attr('src', SITEURL + '/storage/images/klien/' + data.image);
            }

            $('#nama').val(data.nama);
            $('#alamat').val(data.alamat);
            $('#kontak').val(data.kontak);

            $.get("{{ route('standard.list') }}", function(response) {
                $('#id_standar').empty();
                console.log(response);

                // Looping response JSON
                $.each(response, function(key, value) {
                    // Pastikan properti id dan nama_standar ada
                    console.log(value.id, value.nama_standar);

                    // Append option ke dropdown dengan format yang benar
                    $('#id_standar').append('<option value="' + value
                        .id + '">' + value.nama_standar +
                        '</option>');
                });
                $('#id_standar').val(data.id_standar);
            });

            $('#validasi').val(data.validasi);
            $('#nomor_sertifikat').val(data.nomor_sertifikat);
            $('#tanggal_mulai_berlaku').val(data.tanggal_mulai_berlaku);
            $('#tanggal_habis_berlaku').val(data.tanggal_habis_berlaku);
            $('#status').val(data.status);

            $.get("{{ route('ruanglingkup.list') }}", function(response) {
                $('#id_ruang_lingkup').empty();
                console.log(response);

                // Looping response JSON
                $.each(response, function(key, value) {
                    // Pastikan properti id dan nama_standar ada
                    console.log(value.id, value.nama);

                    // Append option ke dropdown dengan format yang benar
                    $('#id_ruang_lingkup').append('<option value="' +
                        value
                        .id + '">' + value.nama +
                        '</option>');
                });
                $('#id_ruang_lingkup').val(data.id_ruang_lingkup);
            })
        })
    });

    $('body').on('submit', '#clientForm', function(e) {

        e.preventDefault();

        var actionType = $('#tombol-simpan').val();
        $('#tombol-simpan').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "/tambahklien",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {

                $('#clientForm').trigger("reset");
                $('#modalKlien').modal('hide');
                $('#tombol-simpan').html('Save Changes');
                var oTable = $('#myTable').dataTable();
                oTable.fnDraw(false);
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
            $('#modal-preview').removeClass('hidden');
            $('#start').hide();
        }
    }
</script>
