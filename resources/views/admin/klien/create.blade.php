@extends('template')

@section('title')
    Layanan
@endsection

@section('konten')
    {{-- @include('admin/sidebar') --}}
    @extends('admin.sidebar')
@section('isi')
    <div class="container-xl px-4 mt-4">

        <div class="col-xl-11">
            <div class="card mb-4">
                <div class="card-header">Tambah Klien</div>
                <div class="card-body personal-info">
                    <div class="row gx-3 mb-3">
                        <form id="clientForm" name="clientForm" enctype="multipart/form-data">
                            <input type="hidden" name="client_id" id="client_id">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-12">
                                    <input id="image" type="file" name="image" accept="image/*"
                                        onchange="readURL(this);">
                                    <input type="hidden" name="hidden_image" id="hidden_image">
                                </div>
                            </div>
                            <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview"
                                class="form-group visually-hidden" height="100">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                            <div class="mb-3">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input type="text" class="form-control" id="kontak" name="kontak">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-6">
                                    <label for="telepon" class="form-label">No Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" name="email">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for= "selectstandard">Standard</label>
                                <select class="form-control" id="selectstandard" name="id_standard[]" multiple="multiple">

                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="selectruanglingkup" class="form-label">Ruang Lingkup</label>
                                <select class="form-select" aria-label="Default select example" name="id_ruang_lingkup[]"
                                    id="selectruanglingkup" multiple = "multiple" required>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_sertifikat" class="form-label">Nomor Sertifikat</label>
                                <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat">
                            </div>
                            <div class="row gx-3 mb-3">
                                <div class="col-md-4">
                                    <label for="validasi" class="form-label">Tanggal Penerbitan Sertifikat</label>
                                    <input type="date" class="form-control" id="validasi" name="validasi">
                                </div>
                                <div class="col-md-4">
                                    <label for="tanggal_mulai_berlaku" class="form-label">Tanggal Mulai Berlaku</label>
                                    <input type="date" class="form-control" id="tanggal_mulai_berlaku"
                                        name="tanggal_mulai_berlaku">
                                </div>
                                <div class="col-md-4">
                                    <label for="tanggal_habis_berlaku" class="form-label">Tanggal Berakhir</label>
                                    <input type="date" class="form-control" id="tanggal_habis_berlaku"
                                        name="tanggal_habis_berlaku">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="selectstatus" class="form-label">Status</label>
                                <select class="form-select" aria-label="Default select example" name="id_status"
                                    id="selectstatus" required>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary tombol-simpan">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@endsection
@section('script')
<script>
    var SITEURL = '{{ URL::to('') }}';

    $(document).ready(function() {
        $('#modal-preview').attr('src', 'https://via.placeholder.com/150');
        $('#client_id').val('');

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
                $('#tombol-simpan').html('Save Changes');
                window.location.href = SITEURL + "/admin/klien";
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
            $('#modal-preview').removeClass('visually-hidden');
            $('#start').hide();
        }
    }
</script>
@endsection