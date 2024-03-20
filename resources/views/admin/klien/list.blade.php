@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    {{-- @include('admin/sidebar') --}}
    @extends('admin.sidebar')
@section('isi')
    <div class="container">
        <h1>Kelola Klien</h1>

        <!-- Button trigger modal Tambah -->
        <div class="my-2">
            <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah-klien">Tambah Klien</a>
        </div>

        <!-- Modal Tambah-->
        <div class="modal fade" id="modalKlien" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="clientForm" name="clientForm" enctype="multipart/form-data">
                    <input type="hidden" name="client_id" id="client_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="clientCrudModal">Tambah Klien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div> --}}
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
                            <div class="mb-3">
                                <label for="telepon" class="form-label">No Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <div class='form-group'>
                                    <label for= "selectstandard">Standard</label>
                                    <select class="form-select" id="selectstandard" name="id_standard[]"
                                        multiple="multiple">

                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="validasi" class="form-label">Tanggal Penerbitan Sertifikat</label>
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
                            <button type="submit" class="btn btn-primary tombol-simpan">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        {{-- <div class="col-sm-6" style="text-align: end">
        <button id="btnPrintKlien" class="btn btn-primary">print</button>
        <button id="btnExcel" class="btn btn-primary">excel</button>
    </div> --}}

        <table class="display" id="myTable">
            <thead>
                <tr>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Narahubung</th>
                    <th scope="col" style="display:none;">Telepon</th>
                    <th scope="col" style="display:none;">Email</th>
                    <th scope="col" style="display:none;">Alamat</th>
                    <th scope="col">Ruang Lingkup</th>
                    <th scope="col">Standar</th>
                    <th scope="col" style="display:none;">Validasi</th>
                    <th scope="col" style="display:none;">Nomor Sertifikat</th>
                    <th scope="col" style="display:none;">Tanggal Berlaku</th>
                    <th scope="col" style="display:none;">Tanggal Berakhir</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@section('script')
    @include('admin.klien.script')
@endsection
@endsection
