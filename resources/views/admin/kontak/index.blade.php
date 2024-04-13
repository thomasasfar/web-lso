@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('admin.sidebar')
    <div class="p-4" id="main-content">

        <div class="container">
            <h1>Kontak Kami</h1>

            {{-- <!-- Button trigger modal Tambah -->
        <div class="my-2">
            <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah">Add New</a>
        </div> --}}

            <!-- Modal Tambah-->
            <div class="modal fade" id="modalKontak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form id="kontakForm" name="kontakForm" enctype="multipart/form-data">
                        <input type="hidden" name="kontak_id" id="kontak_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="clientCrudModal">Edit Kontak</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="isi" class="form-label">Informasi</label>
                                    <input type="text" class="form-control" id="isi" name="isi">
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

            <table class="display nowrap" style="width:100%" id="kontakTable">
                <thead>
                    <tr>
                        <th scope="col" style="display:none;">ID</th>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Informasi</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('script')
    @include('admin.kontak.script')
@endsection
