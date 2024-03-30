@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    {{-- @include('admin/sidebar') --}}
    @extends('admin.sidebar')
@section('isi')
    <style type="text/css">
        img {
            display: block;
            max-width: 100%;
        }

        .preview {
            overflow: hidden;
            width: 160px;
            height: 160px;
            margin: 10px;
            border: 1px solid red;
        }
    </style>

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
                    <th scope="col">Nomor</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
        </table>
    </div>

    <div class="container mt-5">
        <div class="card">
            <h2 class="card-header">Laravel 9 Crop Image Before Upload - Wesley</h2>
            <div class="card-body">
                <h5 class="card-title">Please Select Image For Cropping</h5>
                <input type="file" name="image" class="image">
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary" id="crop">Crop & Save</button>
            </div>
        </div>
        <div class="img-container">
            <div class="row">
                <div class="col-md-7">
                    <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                </div>
                <div class="col-md-5">
                    <div class="preview"></div>
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

        var image = document.getElementById('image');
        var cropper;

        $("body").on("change", ".image", function(e) {
            var files = e.target.files;
            var done = function(url) {
                image.src = url;
                cropper.replace(url); // Memperbarui gambar di dalam preview
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
        });

        $(document).ready(function() {
            cropper = new Cropper(image, {
                aspectRatio: 20 / 9,
                viewMode: 3,
                preview: '.preview'
            });
        });

        $("#crop").click(function() {
            canvas = cropper.getCroppedCanvas({
                width: 2000,
                height: 900,
                imageSmoothingEnabled: true, // Menjaga kualitas gambar saat dicrop
                imageSmoothingQuality: 'high', // Menjaga kualitas gambar saat dicrop
                quality: 1 // Nilai antara 0 dan 1, 1 adalah kualitas tertinggi
            });
            canvas.toBlob(function(blob) {
                url = URL.createObjectURL(blob);
                var reader = new FileReader();
                reader.readAsDataURL(blob);
                reader.onloadend = function() {
                    var base64data = reader.result;
                    // Simpan gambar atau lakukan tindakan lain di sini
                    $.ajax({
                        type: "POST",
                        dataType: "json",
                        url: "/banner",
                        data: {
                            '_token': $('meta[name="_token"]').attr('content'),
                            'image': base64data
                        },
                        success: function(data) {
                            console.log(data);
                            $modal.modal('hide');
                            alert("Crop image successfully uploaded");
                        }
                    });
                    alert("Crop image successfully saved");
                }
            });
        });
    </script>
@endsection
@endsection
