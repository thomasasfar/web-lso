<nav class="p-1 sticky-top bg-body-tertiary">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none me-4">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>

            <ul class="nav col-12 col-lg-auto ms-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/"
                        class="nav-margin px-2 {{ Request::is('/') ? 'selected-nav' : 'not-selected-nav' }}">Tentang</a>
                </li>
                <li><a href="#"
                        class="nav-margin px-2 {{ Request::is('/layanan') ? 'selected-nav' : 'not-selected-nav' }}">Layanan</a>
                </li>
                <li><a href="/klien"
                        class="nav-margin px-2 {{ Request::is('/klien') ? 'selected-nav' : 'not-selected-nav' }}">Daftar
                        Klien</a></li>
                <li><a href="#"
                        class="nav-margin px-2 {{ Request::is('/galeri') ? 'selected-nav' : 'not-selected-nav' }}">Galeri</a>
                </li>
                <li><a href="#"
                        class="nav-margin px-2 {{ Request::is('/kontak') ? 'selected-nav' : 'not-selected-nav' }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
