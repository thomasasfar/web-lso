<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $('#layananTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('layanan.table') }}",
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
                    data: 'aksi',
                    name: 'aksi',
                    orderable: false,
                    searchable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });

        $('body').on('click', '.tombol-edit', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            window.location.href = 'layanan/' + id + '/edit';
        });
    });

    //Delete
    $('body').on('click', '.tombol-del', function(e) {
        if (confirm('Yakin ingin menghapus data klien ini?') == true) {
            var id = $(this).data('id');
            var url = "{{ route('layanan.hapus', ['id' => ':id']) }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
            });
            $('#layananTable').DataTable().ajax.reload();
        }
    });

    /*  When user click add user button */
    $('#tombol-tambah').click(function() {
        window.location.href = 'layanan/create';
    });

</script>
