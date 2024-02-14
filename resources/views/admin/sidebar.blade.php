<div>
    <div class="sidebar pt-3 text-white" id="sidebar">
        <div class=" pe-5 ps-5">
            <div class="row">
                <div class=" p-0">
                    <img src="/img/logo.png" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
        <li>
            <P class="fw-light fs-5  pe-5 ps-5">Hello, <span class="fw-bold" id="username"></span> ! </P>
        </li>
        <li class="p-3 ps-5 ">
            <a class="pb-2 text-white" href="#">
                <div class="">
                    <div class="col-9 ps-0 pt-1 text-start">
                        Tentang
                    </div>
                </div>
            </a>
        </li>
        <li class="p-3 ps-5 ">
            <a class="pb-2 text-white" href="#">
                <div class="">
                    <div class="col-9 ps-0 pt-1 text-start">
                        Layanan
                    </div>
                </div>
            </a>
        </li>
        <li class="p-3 ps-5 {{ Request::is('admin/klien') ? 'available':''}}">
            <a class="pb-2 text-white" href="#">
                <div class="">
                    <div class="col-9 ps-0 pt-1 text-start">
                        Klien
                    </div>
                </div>
            </a>
        </li>
        <li class="p-3 ps-5">
            <a class="pb-2 text-white" href="#">
                <div class="">
                    <div class="col-9 ps-0 pt-1 text-start">
                        Kelola Admin
                    </div>
                </div>
            </a>
        </li>
        <li class="p-3 ps-5">
            <a class="pb-2 text-white" href="#" id="btn-logout">
                <div class="">
                    <div class="col-9 ps-0 pt-1 text-start">
                        logout
                    </div>
                </div>
            </a>
        </li>
    </div>
</div>
<div class="p-4" id="main-content">
    @yield('isi')
</div>
