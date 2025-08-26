<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        new DataTable('#myTable', {
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
                    data: 'kontak',
                    name: 'kontak'
                },
                {
                    data: 'telepon',
                    name: 'telepon',
                    visible: false
                },
                {
                    data: 'email',
                    name: 'email',
                    visible: false
                },
                {
                    data: 'alamat',
                    name: 'alamat',
                    visible: false
                },
                {
                    data: 'ruanglingkup',
                    name: 'ruanglingkup'
                },
                {
                    data: 'standar',
                    name: 'standar'
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
                    data: 'status',
                    name: 'status',
                },
                {
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                },
            ],
            layout: {
                topStart: {
                    buttons: [{
                            extend: 'excel',
                            title: null,
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5, 6, 7, 8,
                                    9, 10, 11, 12, 13
                                ], // Kolom yang ingin diekspor (mulai dari indeks 0)
                            },
                            filename: 'data_klien', // Nama default untuk file Excel
                        },
                        {
                            extend: 'pdf',
                            filename: 'data_klien',
                            orientation: 'landscape',
                            pageSize: 'LEGAL',
                            messageTop: null,
                            title: 'Data Klien LSO Sumbar',
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5, 6, 7, 8,
                                    9, 10, 11, 12, 13
                                ], // Kolom yang ingin diekspor (mulai dari indeks 0)
                            },
                            filename: 'data_klien', // Nama default untuk file PDF
                        },
                        {
                            extend: 'csv',
                            title: null,
                            exportOptions: {
                                columns: [1, 2, 3, 4, 5, 6, 7, 8,
                                    9, 10, 11, 12, 13
                                ], // Kolom yang ingin diekspor (mulai dari indeks 0)
                            },
                            filename: 'data_klien', // Nama default untuk file Excel
                        }
                    ]
                },
                bottomStart: ['pageLength', ]
            },
            order: [
                [0, 'desc']
            ],
            // dom: 'Bfrtip',
        });

        $('body').on('click', '.tombol-edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            window.location.href = 'klien/' + id + '/edit';
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

    $('#tombol-tambah-klien').click(function() {
        window.location.href = 'klien/create';
    });
</script>
