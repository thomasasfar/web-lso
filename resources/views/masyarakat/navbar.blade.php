<nav class="navbar navbar-expand-lg bg-body-tertiary" style="height: 64px">
    <div class="container-fluid font-nav">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="container mx-5">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('storage/images/webmaster/header.png') }}" alt="Bootstrap" max-width="400"
                        height="56">
                </a>
            </div>

            <ul class="navbar-nav col-12 col-lg-auto ms-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/"
                        class="nav-margin px-2 {{ Request::is('/') ? 'selected-nav' : 'not-selected-nav' }}">TENTANG</a>
                </li>
                <li><a href="/layanan"
                        class="nav-margin px-2 {{ Request::is('layanan') ? 'selected-nav' : 'not-selected-nav' }}">LAYANAN</a>
                </li>
                <li><a href="/klien"
                        class="nav-margin px-2 {{ Request::is('klien') ? 'selected-nav' : 'not-selected-nav' }}">DAFTAR
                        KLIEN</a></li>
                <li><a href="/galeri"
                        class="nav-margin px-2 {{ Request::is('galeri') ? 'selected-nav' : 'not-selected-nav' }}">GALERI</a>
                </li>
                <li><a href="/kontak"
                        class="nav-margin px-2 {{ Request::is('kontak') ? 'selected-nav' : 'not-selected-nav' }}">KONTAK</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
