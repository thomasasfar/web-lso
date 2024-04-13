@extends('template')

@section('title')
    Ruang Lingkup
@endsection

@section('konten')
    @include('admin.sidebar')
    <div class="p-4" id="main-content">

        <div class="container">
            <h1>Kelola Ruang Lingkup</h1>

            <!-- Button trigger modal Tambah -->
            <div class="my-2">
                <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah">Add New</a>
            </div>

            <!-- Modal Tambah-->
            <div class="modal fade" id="modalRuangLingkup" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <form id="ruanglingkupForm" name="ruangLingkupForm">
                        <input type="hidden" name="ruang_lingkup_id" id="ruang_lingkup_id">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="ruangLingkupCrudModal">Tambah Ruang Lingkup</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                            </div>
                            <div id="error-messages"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                <button type="submit" class="btn btn-primary tombol-simpan"><span id="spinner"
                                        class="spinner-border spinner-border-sm" style="display: none;"
                                        aria-hidden="true"></span>
                                    <span id="textSpinner">Simpan</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div id="myTable_wrapper" class="dataTables_wrapper">
                <table class="table table-striped" id="ruangLingkupTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.ruang_lingkup.script')
@endsection
