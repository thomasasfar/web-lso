@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('admin.sidebar')
    <div class="p-4" id="main-content">
        <div class="container">
            <h1>Media Sosial</h1>

            <!-- Button trigger modal Tambah -->
            <div class="my-2">
                <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah">Tambah</a>
            </div>

            <!-- Modal Tambah-->
            <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="sosmedForm" name="sosmedForm" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="CrudModal">Tambah sosmed</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama Media Sosial</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat Media Sosial (link)</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat">
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Icon</label>
                                    <div class="col-sm-12">
                                        <input id="image" type="file" name="image" accept="image/*"
                                            onchange="readURL(this);">
                                        <input type="hidden" name="hidden_image" id="hidden_image">
                                    </div>
                                </div>

                                <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview"
                                    class="form-group visually-hidden" height="40">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary tombol-simpan">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <table class="display nowrap" style="width:100%" id="myTable">
                <thead>
                    <tr>
                        <th scope="col" style="display:none;">ID</th>
                        <th scope="col" style="width: 3%">No</th>
                        <th scope="col">Nama Sosmed</th>
                        <th scope="col">Alamat (link)</th>
                        <th scope="col">Icon</th>
                        <th scope="col" style="width: 10%">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.sosmed.script')
@endsection
