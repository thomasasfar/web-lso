@extends('template')

@section('title')
    Tambah Klien
@endsection

@section('konten')
    @include('admin.sidebar')
    <div class="p-4" id="main-content">

        <div class="container-xl px-4 mt-4">

            <div class="col-xl-11">
                <div class="card mb-4">
                    <div class="card-header">Tambah Klien</div>
                    <div class="card-body personal-info">
                        <div class="row gx-3 mb-3">
                            <form id="clientForm" name="clientForm" enctype="multipart/form-data">
                                <input type="hidden" name="client_id" id="client_id" value="{{ $data->id }}">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Gambar</label>
                                    <div class="col-sm-12">
                                        <input id="image" type="file" name="image" accept="image/*"
                                            onchange="readURL(this);">
                                        <input type="hidden" name="hidden_image" id="hidden_image"
                                            value="{{ $data->image }}">
                                    </div>
                                </div>

                                @if ($data->image != null)
                                    <img id="modal-preview" src="{{ asset('storage/images/klien/' . $data->image) }}"
                                        alt="Preview" class="form-group" width="240">
                                @else
                                    <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview"
                                        class="form-group visually-hidden" height="100">
                                @endif
                                <div id="error-messages"></div>
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama<i style="color: red">*</i><i
                                            style="color: red">*</i></label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        value="{{ $data->nama }}">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat<i style="color: red">*</i></label>
                                    <input type="text" class="form-control" id="alamat" name="alamat"
                                        value="{{ $data->alamat }}">
                                </div>
                                <div class="mb-3">
                                    <label for="kontak" class="form-label">Kontak<i style="color: red">*</i></label>
                                    <input type="text" class="form-control" id="kontak" name="kontak"
                                        value="{{ $data->kontak }}">
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="telepon" class="form-label">No Telepon<i
                                                style="color: red">*</i></label>
                                        <input type="text" class="form-control" id="telepon" name="telepon"
                                            value="{{ $data->telepon }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="{{ $data->email }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for= "selectstandard">Standard<i style="color: red">*</i></label>
                                    <select class="form-control" id="selectstandard" name="id_standard[]"
                                        multiple="multiple">

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="selectruanglingkup" class="form-label">Ruang Lingkup<i
                                            style="color: red">*</i></label>
                                    <select class="form-select" aria-label="Default select example"
                                        name="id_ruang_lingkup[]" id="selectruanglingkup" multiple = "multiple" required>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nomor_sertifikat" class="form-label">Nomor Sertifikat<i
                                            style="color: red">*</i></label>
                                    <input type="text" class="form-control" id="nomor_sertifikat"
                                        name="nomor_sertifikat" value="{{ $data->nomor_sertifikat }}">
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-4">
                                        <label for="validasi" class="form-label">Tanggal Penerbitan Sertifikat<i
                                                style="color: red">*</i></label>
                                        <input type="date" class="form-control" id="validasi" name="validasi"
                                            value="{{ $data->validasi }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_mulai_berlaku" class="form-label">Tanggal Mulai
                                            Berlaku<i style="color: red">*</i></label>
                                        <input type="date" class="form-control" id="tanggal_mulai_berlaku"
                                            name="tanggal_mulai_berlaku" value="{{ $data->tanggal_mulai_berlaku }}">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tanggal_habis_berlaku" class="form-label">Tanggal Berakhir<i
                                                style="color: red">*</i></label>
                                        <input type="date" class="form-control" id="tanggal_habis_berlaku"
                                            name="tanggal_habis_berlaku" value="{{ $data->tanggal_habis_berlaku }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="selectstatus" class="form-label">Status<i
                                            style="color: red">*</i></label>
                                    <select class="form-select" aria-label="Default select example" name="id_status"
                                        id="selectstatus" required>
                                        <option value="{{ $data->id_status }}" selected>{{ $data->status->nama }}
                                        </option>
                                    </select>
                                </div>
                                <a href="/admin/klien" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary tombol-simpan"><span id="spinner"
                                        class="spinner-border spinner-border-sm" style="display: none;"
                                        aria-hidden="true"></span>
                                    <span id="textSpinner">Simpan</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var SITEURL = '{{ URL::to('') }}';

        $(document).ready(function(data) {
            var id = <?php echo $data->id; ?>;
            console.log(id);

            $.get("{{ url('/getstandard') }}/" + id, function(data) {
                $('#selectstandard').html(data);
                console.log(data);
            });
            $("#selectstandard").select2({
                placeholder: 'Pilih Standard',
                allowClear: true,
                ajax: {
                    url: "{{ url('/selectstandard') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama_standar
                                }
                            })
                        }
                    }
                }
            });

            $.get("{{ url('/getruanglingkup') }}/" + id, function(data) {
                $('#selectruanglingkup').html(data);
                console.log(data);
            });
            $("#selectruanglingkup").select2({
                placeholder: 'Pilih Ruang Lingkup',
                allowClear: true,
                ajax: {
                    url: "{{ url('/selectruanglingkup') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });

            $("#selectstatus").select2({
                placeholder: 'Pilih Status',
                ajax: {
                    url: "{{ url('/selectstatus') }}",
                    processResults: function({
                        data
                    }) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    id: item.id,
                                    text: item.nama
                                }
                            })
                        }
                    }
                }
            });
        });

        $('input, select').focus(function() {
            var fieldName = $(this).attr('name');
            $('#' + fieldName).removeClass('is-invalid');
            $('#' + fieldName + '_error').text('');
        });

        $('body').on('submit', '#clientForm', function(e) {

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
                url: SITEURL + "/tambahklien",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $('#tombol-simpan').html('Save Changes');
                    window.location.href = SITEURL + "/admin/klien";
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

        function readURL(input, id) {
            id = id || '#modal-preview';
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $(id).attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
                $('#modal-preview').removeClass('visually-hidden');
                $('#start').hide();
            }
        }
    </script>
@endsection
