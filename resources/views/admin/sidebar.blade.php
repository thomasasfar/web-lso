<div class="sidebar pt-3 text-white " id="sidebar">
    <div class=" pe-5 ps-5">
        <div class="row">
            <div class=" p-0">
                <img src="/storage/images/webmaster/logo.png" style="max-height: 40px;" class="img-fluid" alt="...">
            </div>
        </div>
    </div>
    <li class="list-menu">
        <P class="fw-light fs-5  pe-5 ps-5">Hello, <span class="fw-bold" id="username"></span> ! </P>
    </li>
    <li class="p-3 ps-5 list-menu {{ Request::is('admin/profil') ? 'available' : '' }}">
        <a class="pb-2 text-white" href="/admin/profil">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    Tentang
                </div>
            </div>
        </a>
    </li>
    <li class="p-3 ps-5 list-menu {{ Request::is('admin/layanan') ? 'available' : '' }}">
        <a class="pb-2 text-white" href="/admin/layanan">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    Layanan <b class="float-end">&raquo;</b>
                </div>
            </div>
        </a>
        <ul class="submenu dropdown-menu">
            <li><a class="nav-link" href="#">Multi level 1</a></li>
            <li><a class="nav-link" href="#">Multi level 2</a></li>
            <li><a class="nav-link" href="#">Multi level 3</a></li>
        </ul>
    </li>
    <li class="p-3 ps-5 list-menu {{ Request::is('admin/klien') ? 'available' : '' }}">
        <a class="pb-2 text-white" href="/admin/klien">
            <div class="">
                <div class="col-9 ps-0 pt-1 text-start">
                    Klien
                </div>
            </div>
        </a>
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

{{-- <div class="p-4" id="main-content">
    @yield('isi')
</div> --}}
