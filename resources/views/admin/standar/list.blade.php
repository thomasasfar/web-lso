@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    {{-- @include('admin/sidebar') --}}
    @extends('admin.sidebar')
@section('isi')
    <div class="container">
        <h1>Kelola Standar</h1>

        <!-- Button trigger modal Tambah -->
        <div class="my-2">
            <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah-standar">Add New</a>
        </div>

        <!-- Modal Tambah-->
        <div class="modal fade" id="modalStandar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="standardForm" name="standardForm">
                    <input type="hidden" name="standard_id" id="standard_id">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="standardCrudModal">Tambah Standar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="nama_standar" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama_standar" name="nama_standar">
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

        <div id="myTable_wrapper" class="dataTables_wrapper">
            <table class="table table-striped" id="standardTable">
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
@endsection

@section('script')
    @include('admin.standar.script')
@endsection
@endsection
