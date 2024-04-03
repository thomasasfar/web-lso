@extends('template')

@section('title')
    Galeri
@endsection

@section('konten')
    @extends('admin.sidebar')
@section('isi')
    <div class="container">
        <h1>Kelola Galeri</h1>

        <!-- Button trigger modal Tambah -->
        <div class="my-2">
            <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah">Tambah</a>
        </div>

        <!-- Modal Tambah-->
        <div class="modal fade" id="modalGaleri" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="galeriForm" name="galeriForm" enctype="multipart/form-data">
                    <input type="hidden" name="id" id="id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="galeriCrudModal">Tambah Klien</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            {{-- <div class="mb-3">
                        <label for="image" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div> --}}
                            <div id="error-messages"></div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Gambar</label>
                                <div class="col-sm-12">
                                    <input id="image" type="file" name="image" accept="image/*"
                                        onchange="readURL(this);">
                                    <input type="hidden" name="hidden_image" id="hidden_image">
                                </div>
                            </div>

                            <img id="modal-preview" src="https://via.placeholder.com/150" alt="Preview"
                                class="form-group visually-hidden" style="max-width: 320px">
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <input type="text" class="form-control" id="caption" name="caption">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary tombol-simpan" style="width: 80px; padding: 6px;">
                                <span id="spinner" class="spinner-border spinner-border-sm" style="display: none;"
                                    aria-hidden="true"></span>
                                <span id="textSpinner">Simpan</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="display nowrap" style="width:100%" id="myTable">
            <thead>
                <tr>
                    <th scope="col" style="display:none;">ID</th>
                    <th scope="col">No</th>
                    <th scope="col">Caption</th>
                    <th scope="col">Gambar</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection
@endsection

@section('script')
@include('admin.galeri.script')
@endsection
