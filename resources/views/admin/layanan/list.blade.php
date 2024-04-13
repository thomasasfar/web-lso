@extends('template')

@section('title')
    Layanan
@endsection

@section('konten')
    @include('admin/sidebar')
    <div class="p-4" id="main-content">

        <div class="container">
            <h1>Kelola Layanan</h1>

            <!-- Button trigger modal Tambah -->
            <div class="my-2">
                <a href="javascript:void(0)" class="btn btn-info ml-3" id="tombol-tambah">Tambah Layanan</a>
            </div>

            <div id="myTable_wrapper" class="dataTables_wrapper">
                <table class="table table-striped" id="layananTable">
                    <thead>
                        <tr>
                            <th scope="col" style="display:none;">ID</th>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="p-4" id="main-content">

        @endsection

        @section('script')
            @include('admin.layanan.script')
        @endsection
    @endsection
