<script>
    let table;

    $(document).ready(function() {
        table = $('#myTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('klien.table') }}",
            columns: [{
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
                    data: 'gambar',
                    name: 'gambar',
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
                }
            ],
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'excel',
                    exportOptions: {
                        columns: [1, 2, 3, 4, 5, 6, 7, 8, 9,
                            10
                        ], // Kolom yang ingin diekspor (mulai dari indeks 0)
                    },
                    filename: 'data_excel', // Nama default untuk file Excel
                },
                {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [1, 2, 3], // Kolom yang ingin diekspor (mulai dari indeks 0)
                    },
                    filename: 'data_pdf', // Nama default untuk file PDF
                }
            ]
        });
    });

    //Tambah
    // $('body').on('click', '.tombol-tambah', function(e) {
    //     e.preventDefault();
    //     $('#modalKlien').modal('show');

    //     $.ajax({
    //         url: "{{ route('standard.list') }}",
    //         type: 'GET',
    //         success: function(data) {
    //             $('#id_standar').empty();
    //             console.log(data);

    //             // Looping data JSON
    //             $.each(data, function(key, value) {
    //                 // Pastikan properti id dan nama_standar ada
    //                 console.log(value.id, value.nama_standar);

    //                 // Append option ke dropdown dengan format yang benar
    //                 $('#id_standar').append('<option value="' + value
    //                     .id + '">' + value.nama_standar +
    //                     '</option>');
    //             });
    //         }
    //     });

    //     $.ajax({
    //         url: "{{ route('ruanglingkup.list') }}",
    //         type: 'GET',
    //         success: function(data) {
    //             $('#id_ruang_lingkup').empty();
    //             console.log(data);

    //             // Looping data JSON
    //             $.each(data, function(key, value) {
    //                 // Pastikan properti id dan nama_standar ada
    //                 console.log(value.id, value.nama);

    //                 // Append option ke dropdown dengan format yang benar
    //                 $('#id_ruang_lingkup').append('<option value="' +
    //                     value
    //                     .id + '">' + value.nama +
    //                     '</option>');
    //             });
    //         }
    //     });

    //     $('.tombol-simpan').click(function() {
    //         simpan();
    //     });
    // });

    //Tambah
    $('body').on('click', '.tombol-tambah', function(e) {
        e.preventDefault();
        $('#modalKlien').modal('show');

        $.ajax({
            url: "{{ route('standard.list') }}",
            type: 'GET',
            success: function(data) {
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
            }
        });

        $.ajax({
            url: "{{ route('ruanglingkup.list') }}",
            type: 'GET',
            success: function(data) {
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
            }
        });

        //ganti on form submit

        // $('.tombol-simpan').click(function() {
        //     simpan();
        // });
        $(document).ready(function() {
            $('#form').submit(function(e) {
                e.preventDefault();
                var data = $(this).serialize()
                var formData = new FormData(this);
                $.ajax({
                    url: "{{ route('klien.tambah') }}",
                    type: 'POST',
                    data: data,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        if (response.errors) {
                            console.log(response.errors);
                            $('.alert-danger').removeClass('d-none');
                            $('.alert-danger').html("<ul>");
                            $.each(response.errors, function(key, value) {
                                $('.alert-danger').find('ul').append(
                                    "<li>" + value +
                                    "</li>");
                            });
                            $('.alert-danger').append("</ul>");
                        } else {
                            $('.alert-success').removeClass('d-none');
                            $('.alert-success').html(response.success);
                        }
                        $('#myTable').DataTable().ajax.reload();
                    }

                });
            });
        });
    });

    //Edit
    $('body').on('click', '.tombol-edit', function(e) {
        var id = $(this).data('id');
        $.ajax({
            url: 'clientAjax/' + id + '/edit',
            type: 'GET',
            success: function(response) {
                $('#modalKlien').modal('show');

                $('#nama').val(response.result.nama);
                $('#alamat').val(response.result.alamat);
                $('#kontak').val(response.result.kontak);

                $.ajax({
                    url: "{{ route('standard.list') }}",
                    type: 'GET',
                    success: function(data) {
                        $('#id_standar').empty();
                        console.log(data);

                        // Looping data JSON
                        $.each(data, function(key, value) {
                            // Pastikan properti id dan nama_standar ada
                            console.log(value.id, value.nama_standar);

                            // Append option ke dropdown dengan format yang benar
                            $('#id_standar').append('<option value="' +
                                value
                                .id + '">' + value.nama_standar +
                                '</option>');
                        });

                        // Mengatur nilai default dari opsi standard
                        $('#id_standar').val(response.result.standard.id);
                    }
                });

                $('#validasi').val(response.result.validasi);
                $('#nomor_sertifikat').val(response.result.nomor_sertifikat);
                $('#tanggal_mulai_berlaku').val(response.result.tanggal_mulai_berlaku);
                $('#tanggal_habis_berlaku').val(response.result.tanggal_habis_berlaku);
                $('#status').val(response.result.status);

                $.ajax({
                    url: "{{ route('ruanglingkup.list') }}",
                    type: 'GET',
                    success: function(data) {
                        $('#id_ruang_lingkup').empty();
                        console.log(data);

                        // Looping data JSON
                        $.each(data, function(key, value) {
                            // Pastikan properti id dan nama_standar ada
                            console.log(value.id, value.nama);

                            // Append option ke dropdown dengan format yang benar
                            $('#id_ruang_lingkup').append(
                                '<option value="' +
                                value
                                .id + '">' + value.nama +
                                '</option>');
                        });
                        $('#id_ruang_lingkup').val(response.result
                            .id_ruang_lingkup);
                    }
                });

                console.log(response.result);

                $('.tombol-simpan').click(function() {
                    simpan(id);
                });
            }
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

    // fungsi simpan dan update
    function simpan(id = '') {
        // var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        // var gambar = $('#gambar').val();
        // if (!allowedExtensions.exec(gambar)) {
        //     alert('File harus berupa gambar.');
        //     return false;
        // }

        var formData = new FormData();

        // Append image file to FormData object
        var gambar = $('#gambar')[0].files[0];
        formData.append('gambar', gambar);

        // Append other form fields to FormData object
        formData.append('nama', $('#nama').val());
        formData.append('alamat', $('#alamat').val());
        formData.append('kontak', $('#kontak').val());
        formData.append('id_standar', $('#id_standar').val());
        formData.append('validasi', $('#validasi').val());
        formData.append('nomor_sertifikat', $('#nomor_sertifikat').val());
        formData.append('tanggal_mulai_berlaku', $('#tanggal_mulai_berlaku').val());
        formData.append('tanggal_habis_berlaku', $('#tanggal_habis_berlaku').val());
        formData.append('status', $('#status').val());
        formData.append('id_ruang_lingkup', $('#id_ruang_lingkup').val());

        if (id == '') {
            var var_url = 'clientAjax';
            var var_type = 'POST';
        } else {
            var var_url = "{{ route('klien.update', ['id' => ':id']) }}";
            var_url = var_url.replace(':id', id);
            var var_type = 'PUT';
        }
        $.ajax({
            url: var_url,
            type: var_type,
            data: {
                gambar: $('#gambar')[0].files,
                nama: $('#nama').val(),
                alamat: $('#alamat').val(),
                kontak: $('#kontak').val(),
                id_standar: $('#id_standar').val(),
                validasi: $('#validasi').val(),
                nomor_sertifikat: $('#nomor_sertifikat').val(),
                tanggal_mulai_berlaku: $('#tanggal_mulai_berlaku').val(),
                tanggal_habis_berlaku: $('#tanggal_habis_berlaku').val(),
                status: $('#status').val(),
                id_ruang_lingkup: $('#id_ruang_lingkup').val(),
            },
            success: function(response) {
                if (response.errors) {
                    console.log(response.errors);
                    $('.alert-danger').removeClass('d-none');
                    $('.alert-danger').html("<ul>");
                    $.each(response.errors, function(key, value) {
                        $('.alert-danger').find('ul').append("<li>" + value +
                            "</li>");
                    });
                    $('.alert-danger').append("</ul>");
                } else {
                    $('.alert-success').removeClass('d-none');
                    $('.alert-success').html(response.success);
                }
                $('#myTable').DataTable().ajax.reload();
            }

        });
    };
</script>
