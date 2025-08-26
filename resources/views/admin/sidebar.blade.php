{{-- <style>
    .list-menu {
        list-style: none;
        margin: 20px 0 20px 0;
    }

    a {
        text-decoration: none;
    }

    .sidebar {
        width: 264px;
        height: 100vh;
        position: fixed;
        background-color: #126550;
    }

    #main-content {
        margin-left: 330px;
    }

    .available {
        background-color: #325446;
    }

    /* Style untuk submenu */
    .submenu {
        display: none;
        /* Sembunyikan submenu secara default */
        position: absolute;
        background-color: #325446;
        min-width: 160px;
        z-index: 1;
    }

    .submenu li {
        padding: 10px;
    }

    .submenu li a {
        color: white;
    }

    /* Tampilkan submenu saat elemen induk di-hover */
    .list-menu:hover .submenu {
        display: block;
    }
</style> --}}

{{-- <style>
    .list-menu {
        list-style: none;
        margin: 20px 0 20px 0;
        position: relative;
        /* Ubah posisi menjadi relative */
    }

    a {
        text-decoration: none;
    }

    .sidebar {
        width: 264px;
        height: 100vh;
        position: fixed;
        background-color: #126550;
    }

    #main-content {
        margin-left: 330px;
    }

    .available {
        background-color: #325446;
    }

    /* Style untuk submenu */
    .submenu {
        display: none;
        /* Sembunyikan submenu secara default */
        position: absolute;
        background-color: #325446;
        min-width: 160px;
        z-index: 1;
        left: 100%;
        /* Atur posisi submenu relatif terhadap menu utama */
        top: 0;
        /* Atur posisi submenu di bagian atas menu utama */
    }

    .submenu li {
        padding: 10px;
        list-style: none;
    }

    .submenu li a {
        color: white;
    }

    /* Tampilkan submenu saat elemen induk di-hover */
    .list-menu:hover .submenu {
        display: block;
    }
</style> --}}

<style>
    .list-menu {
        list-style: none;
        margin: 20px 0 20px 0;
        position: relative;
        /* Ubah posisi menjadi relative */
    }

    a {
        text-decoration: none;
    }

    .sidebar {
        width: 264px;
        height: 100vh;
        position: fixed;
        background-color: #126550;
    }

    #main-content {
        margin-left: 330px;
    }

    .available {
        background-color: #325446;
    }

    /* Style untuk submenu */
    .submenu {
        display: none;
        /* Sembunyikan submenu secara default */
        position: absolute;
        background-color: #325446;
        min-width: 160px;
        z-index: 1;
        left: 100%;
        /* Atur posisi submenu relatif terhadap menu utama */
        top: 0;
        /* Atur posisi submenu di bagian atas menu utama */
    }

    .submenu li {
        list-style: none;
        padding: 10px;
    }

    .submenu li a {
        color: white;
    }

    /* Tampilkan submenu saat elemen induk di-hover */
    .list-menu:hover .submenu {
        display: block;
    }

    /* Efek hover untuk menu */
    .list-menu:hover {
        background-color: #1a9e7e;
    }

    /* Efek hover untuk submenu */
    .list-menu:hover .submenu li:hover {
        background-color: #1a9e7e;
    }

    /* Efek hover untuk teks menu dan submenu */
    .list-menu:hover a,
    .list-menu:hover .submenu li a {
        color: #fff;
    }
</style>


<div class="sidebar pt-3 text-white" id="sidebar">
    <div class="pe-5 ps-5">
        <div class="row">
            <div class="p-0">
                <img src="/storage/images/webmaster/logo.png" style="max-height: 40px;" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
    <li class="list-menu">
        <P class="fw-light fs-5 pe-5 ps-5">Hello, <span class="fw-bold" id="username"></span> ! </P>
    </li>
    <li class="p-3 ps-5 list-menu {{ Request::is('admin/profil') || Request::is('admin/banner') ? 'available' : '' }}">
        <a class="pb-2 text-white" href="/admin/profil">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    Tentang
                </div>
            </div>
        </a>
        <ul class="submenu">
            <li><a href="/admin/profil">Kelola Profil</a></li>
            <li><a href="/admin/banner">Kelola Banner</a></li>
            <li><a href="/admin/kontak">Kelola Kontak</a></li>
        </ul>
    </li>
    <li class="p-3 ps-5 list-menu {{ Request::is('admin/layanan') ? 'available' : '' }}">
        <a class="pb-2 text-white" href="/admin/layanan">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    Layanan
                </div>
            </div>
        </a>
    </li>
    <li
        class="p-3 ps-5 list-menu {{ Request::is('admin/klien') || Request::is('admin/status') || Request::is('admin/standard') || Request::is('admin/ruanglingkup') ? 'available' : '' }}">
        <a class="pb-2 text-white" href="/admin/klien">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    Klien
                </div>
            </div>
        </a>
        <!-- Tambahkan submenu di bawah -->
        <ul class="submenu">
            <li><a href="/admin/klien">Kelola Klien</a></li>
            <li><a href="/admin/standard">Kelola Standar</a></li>
            <li><a href="/admin/ruanglingkup">Kelola Ruang Lingkup</a></li>
            <li><a href="/admin/status">Kelola Status</a></li>
        </ul>
    </li>
    <li class="p-3 ps-5 list-menu">
        <a class="pb-2 text-white" href="#">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    Kelola Admin
                </div>
            </div>
        </a>
    </li>
    <li class="p-3 ps-5 list-menu">
        <a class="pb-2 text-white" href="#" id="btn-logout">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    logout
                </div>
            </div>
        </a>
    </li>
</div>
