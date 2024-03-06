@extends('template')

@section('title')
    Layanan
@endsection

@section('konten')
    {{-- @include('admin/sidebar') --}}
    @extends('admin.sidebar')
@section('isi')
    <style>
        .note-editable ul {
            list-style: disc !important;
            list-style-position: inside !important;
        }

        .note-editable ol {
            list-style: decimal !important;
            list-style-position: inside !important;
        }

        .note-editor .dropdown-toggle::after {
            all: unset;
        }

        .note-editor .note-dropdown-menu {
            box-sizing: content-box;
        }

        .note-editor .note-modal-footer {
            box-sizing: content-box;
        }
    </style>


    <div class="container">
        <form id="layananForm" name="clientForm" enctype="multipart/form-data">
            <input type="hidden" name="layanan_id" id="layanan_id" value="{{ $data->id }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}">
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Gambar</label>
                <div class="col-sm-12">
                    <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                    <input type="hidden" name="hidden_image" id="hidden_image" value="{{ $data->image }}">
                </div>
                <img id="modal-preview" src="{{ asset('storage/images/layanan/' . $data->image) }}" alt="Preview"
                    class="form-group hidden" width="150" height="150">
            </div>
            <div class="mb-3">
                <label class="col-sm-2 control-label" for="file">Formulir (pdf)</label>
                <div class="col-sm-12">
                    <input type="file" id="file" class="form-label" name="file"
                        onchange="updatePdfPreview(this);">
                    <input type="hidden" name="hidden_pdf" id="hidden_pdf" value="{{ $data->file }}">
                </div>
                <div id="pdf-preview" class="mt-2">
                    @if ($data->file)
                        <a href="{{ asset('storage/pdfs/layanan/' . $data->file) }}" download>
                            <img src="{{ asset('storage/images/webmaster/pdf-icon.png') }}" alt="PDF Icon" width="50"
                                height="50">
                            <p>{{ basename($data->file) }}</p>
                        </a>
                    @else
                        <p>No PDF file available</p>
                    @endif
                </div>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Deskripsi</label>
                <textarea id="summernote" cols="30" rows="10" id="deskripsi" name="deskripsi">{{ $data->deskripsi }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary tombol-simpan">Simpan</button>
        </form>
    </div>
@endsection
@endsection
@section('script')
<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $('#summernote').summernote({
            tabsize: 2,
            height: 120,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
        $('.note-editable').css('font-weight', 'normal');

    });



    $('body').on('submit', '#layananForm', function(e) {

        e.preventDefault();

        var actionType = $('#tombol-simpan').val();
        $('#tombol-simpan').html('Sending..');

        var formData = new FormData(this);

        $.ajax({
            type: 'POST',
            url: SITEURL + "/tambahlayanan",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $('#tombol-simpan').html('Save Changes');
                window.location.href = SITEURL + "/admin/layanan";
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
        }
    }

    function updatePdfPreview(input) {
        var file = input.files[0];
        if (file) {
            var pdfFileName = file.name;
            $('#pdf-preview').html('<a href="' + URL.createObjectURL(file) +
                '" download><img src="{{ asset('storage/images/webmaster/pdf-icon.png') }}" alt="PDF Icon" width="50" <p>' +
                pdfFileName + '</p> height="50"></a>'
            );
        } else {
            $('#pdf-preview').html('<p>No PDF file selected</p>');
        }
    }
</script>
@endsection
