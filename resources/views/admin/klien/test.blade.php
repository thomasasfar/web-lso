<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#laravel_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: SITEURL + "product-list",
                type: 'GET',
            },
            columns: [{
                    data: 'id',
                    name: 'id',
                    'visible': false
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'image',
                    name: 'image',
                    orderable: false
                },
                {
                    data: 'title',
                    name: 'title'
                },
                {
                    data: 'product_code',
                    name: 'product_code'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false
                },
            ],
            order: [
                [0, 'desc']
            ]
        });

        /*  When user click add user button */
        $('#create-new-product').click(function() {
            $('#btn-save').val("create-product");
            $('#product_id').val('');
            $('#productForm').trigger("reset");
            $('#productCrudModal').html("Add New Product");
            $('#ajax-product-modal').modal('show');
            $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
        });

        /* When click edit user */
        $('body').on('click', '.edit-product', function() {
            var product_id = $(this).data('id');
            $.get('product-list/' + product_id + '/edit', function(data) {
                $('#title-error').hide();
                $('#product_code-error').hide();
                $('#description-error').hide();
                $('#productCrudModal').html("Edit Product");
                $('#btn-save').val("edit-product");
                $('#ajax-product-modal').modal('show');
                $('#product_id').val(data.id);
                $('#title').val(data.title);
                $('#product_code').val(data.product_code);
                $('#description').val(data.description);

                $('#modal-preview').attr('alt', 'No image available');
                if (data.image) {
                    $('#modal-preview').attr('src', SITEURL + 'public/product/' + data.image);
                    $('#hidden_image').attr('src', SITEURL + 'public/product/' + data.image);
                }

            })
        });
        $('body').on('click', '#delete-product', function() {

            var product_id = $(this).data("id");

            if (confirm("Are You sure want to delete !")) {
                $.ajax({
                    type: "get",
                    url: SITEURL + "product-list/delete/" + product_id,
                    success: function(data) {
                        var oTable = $('#laravel_datatable').dataTable();
                        oTable.fnDraw(false);
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            }
        });

    });


    $('body').on('submit', '#productForm', function(e) {

        e.preventDefault();

        var actionType = $('#btn-save').val();
        $('#btn-save').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "product-list/store",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {

                $('#productForm').trigger("reset");
                $('#ajax-product-modal').modal('hide');
                $('#btn-save').html('Save Changes');
                var oTable = $('#laravel_datatable').dataTable();
                oTable.fnDraw(false);
            },
            error: function(data) {
                console.log('Error:', data);
                $('#btn-save').html('Save Changes');
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
