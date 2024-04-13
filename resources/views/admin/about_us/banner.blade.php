@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('admin.sidebar')

    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 320px;
            height: 320px;
            margin: 10px;
            border: 1px solid red;
        }

        .modal-lg {
            max-width: 1000px !important;
        }
    </style>
    <div class="p-4" id="main-content">

        <div class="container">
            <h1>Kelola Banner</h1>

            <!-- Button trigger modal Tambah -->
            <div class="my-2">
                <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah-banner">Tambah Banner</a>
            </div>

            {{-- table --}}
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" style="display: none;">ID</th>
                        <th scope="col" style="width: 3%;">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col" style="width: 10%;">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalLabel">Upload Banner</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="preview-gambar" class="img-container visually-hidden">
                            <div class="row">
                                <div class="col-md-7">
                                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                                </div>
                                <div class="col-md-5">
                                    <div class="preview"></div>
                                </div>
                            </div>
                        </div>
                        <!-- Form input gambar -->
                        <input type="file" name="image" class="image">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            aria-label="Close">Cancel</button>
                        <button type="button" id="crop" class="btn btn-primary" disabled>Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: "{{ route('banner.list') }}",
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
                        data: 'image',
                        name: 'image',
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
        });

        $('#tombol-tambah-banner').click(function() {
            $('#modal').modal('show');
            $('.image').val('');
            $('#preview-gambar').addClass('visually-hidden')
        });

        $('body').on('click', '.tombol-del', function(e) {
            if (confirm('Yakin ingin menghapus banner ini?') == true) {
                var id = $(this).data('id');
                var url = "{{ route('banner.hapus', ['id' => ':id']) }}";
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'DELETE',
                });
                $('#myTable').DataTable().ajax.reload();
            }
        });

        $('#modal').on("change", ".image", function(e) {
            $("#preview-gambar").removeClass('visually-hidden');
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                $('#modal').modal('show');
                cropper.replace(url);
            };
            var reader;
            var file;
            var url;
            if (files && files.length > 0) {
                file = files[0];
                if (URL) {
                    done(URL.createObjectURL(file));
                } else if (FileReader) {
                    reader = new FileReader();
                    reader.onload = function(e) {
                        done(reader.result);
                    };
                    reader.readAsDataURL(file);
                }
            }

            if (this.files && this.files[0]) {
                $("#crop").prop('disabled', false);
            } else {
                $("#crop").prop('disabled', true);
            }
        });

        $('#modal').on('shown.bs.modal', function() {
            cropper = new Cropper(image, {
                aspectRatio: 20 / 9,
                viewMode: 3,
                preview: '.preview'
            });
        }).on('hidden.bs.modal', function() {
            $("#crop").prop('disabled', true);
            cropper.destroy();
            cropper = null;
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 2000,
                height: 900,
                imageSmoothingEnabled: true,
                imageSmoothingQuality: 'high',
                quality: 1
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "/banner",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $('#modal').modal('hide');
                            alert("Crop image successfully uploaded");
                        }
                    });
                }
            });
        });
    </script>
@endsection
