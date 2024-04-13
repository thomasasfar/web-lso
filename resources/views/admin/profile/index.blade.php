@extends('template')

@section('title')
    Klien
@endsection

@section('konten')
    @include('admin.sidebar')
    <div class="p-4" id="main-content">
        <div class="container">
            <h1>Kelola Profil</h1>

            <div id="myTable_wrapper" class="dataTables_wrapper">
                <table class="table table-striped" id="profileTable">
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
    </div>
@endsection
@section('script')
    @include('admin.profile.script')
@endsection
