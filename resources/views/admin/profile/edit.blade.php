@extends('template')

@section('title')
    profil
@endsection

@section('konten')
    @include('admin.sidebar')
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

    <div class="p-4" id="main-content">
        <div class="container">
            <form id="profilForm" name="profilForm" enctype="multipart/form-data">
                <input type="hidden" name="profil_id" id="profil_id" value="{{ $data->id }}">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Gambar</label>
                    <div class="col-sm-12">
                        <input id="image" type="file" name="image" accept="image/*" onchange="readURL(this);">
                        <input type="hidden" name="hidden_image" id="hidden_image" value="{{ $data->image }}">
                    </div>
                    <img id="modal-preview" src="{{ asset('storage/images/tentang/' . $data->image) }}" alt="Preview"
                        class="form-group hidden" width="150" height="150">
                </div>
                <div class="mb-3">
                    <label for="konten" class="form-label">Konten</label>
                    <textarea id="summernote" cols="30" rows="10" id="konten" name="konten">{{ $data->konten }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary tombol-simpan">Simpan</button>
            </form>
        </div>
        <div class="p-4" id="main-content">
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
                            ['view', ['fullscreen', 'codeview', 'help']]
                        ]
                    });
                    $('.note-editable').css('font-weight', 'normal');

                });



                $('body').on('submit', '#profilForm', function(e) {

                    e.preventDefault();

                    var actionType = $('#tombol-simpan').val();
                    $('#tombol-simpan').html('Sending..');

                    var formData = new FormData(this);

                    $.ajax({
                        type: 'POST',
                        url: SITEURL + "/updateprofil",
                        data: formData,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: (data) => {
                            $('#tombol-simpan').html('Save Changes');
                            window.location.href = SITEURL + "/admin/profil";
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
            </script>
        @endsection
