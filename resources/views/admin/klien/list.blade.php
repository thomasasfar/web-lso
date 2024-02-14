@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    {{-- @include('admin/sidebar') --}}
    @extends('admin.sidebar')
@section('isi')
    <h1>Kelola Klien</h1>

    <!-- Button trigger modal Tambah -->
    <div class="my-2">
        <button type="button" class="btn btn-primary tombol-tambah">
            Tambah Klien
        </button>
    </div>

    <!-- Modal Tambah-->
    <div class="modal fade" id="modalKlien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="form" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
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
                        <div class="form-group">
                            <label for="id_standar">Standar</label>
                            <select class="form-select" id="id_standar" name="standar">

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="validasi" class="form-label">Validasi</label>
                            <input type="date" class="form-control" id="validasi" name="validasi">
                        </div>
                        <div class="mb-3">
                            <label for="nomor_sertifikat" class="form-label">Nomor Sertifikat</label>
                            <input type="text" class="form-control" id="nomor_sertifikat" name="nomor_sertifikat">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_mulai_berlaku" class="form-label">Tanggal Mulai Berlaku</label>
                            <input type="date" class="form-label" id="tanggal_mulai_berlaku"
                                name="tanggal_mulai_berlaku">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_habis_berlaku" class="form-label">Tanggal Berakhir</label>
                            <input type="date" class="form-label" id="tanggal_habis_berlaku"
                                name="tanggal_habis_berlaku">
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status">
                        </div>
                        <div class="mb-3">
                            <label for="id_ruanglingkup" class="form-label">Ruang Lingkup</label>
                            <select class="form-select" aria-label="Default select example" name="id_ruang_lingkup"
                                id="id_ruang_lingkup" required>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary tombol-simpan  ">Tambah</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- <div class="col-sm-6" style="text-align: end">
        <button id="btnPrintKlien" class="btn btn-primary">print</button>
        <button id="btnExcel" class="btn btn-primary">excel</button>
    </div> --}}

    <div id="myTable_wrapper" class="dataTables_wrapper">
        <table class="table table-striped" id="myTable">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Ruang Lingkup</th>
                    <th scope="col">Status</th>
                    <th scope="col">Standar</th>
                    <th scope="col" style="display:none;">Kontak</th>
                    <th scope="col" style="display:none;">Gambar</th>
                    <th scope="col" style="display:none;">Validasi</th>
                    <th scope="col" style="display:none;">Nomor Sertifikat</th>
                    <th scope="col" style="display:none;">Tanggal Berlaku</th>
                    <th scope="col" style="display:none;">Tanggal Berakhir</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>

<script>
    $('#form').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            url: 'clientAjax',
            type: 'POST', // Tambahkan tanda kutip pada 'POST'
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.errors) {
                    console.log(response.errors);
                    $('.alert-danger').removeClass('d-none');
                    $('.alert-danger').html("<ul>");
                    $.each(response.errors, function(key, value) {
                        $('.alert-danger ul').append("<li>" + value + "</li>"); // Mengubah cara pemanggilan
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
</script>
@endsection

@section('script')
    @include('admin.klien.script')
@endsection
@endsection
