<style>
    body {
        margin: 0px;
        padding: 0px;
    }

    .container-fluid {
        margin: 0px;
        padding: 0px;
    }

    a:hover {
        color: bisque;
    }

    .clean {
        text-decoration: none;
        color: rgb(254, 254, 254);
    }

    .utama {
        top: 0;
        left: 0;
        position: sticky;
        /* background-color: #0d9276; */
        background-color: #02632a;
        padding: 10px 35px;
        justify-content: space-between;
        align-items: center;
        z-index: 1000;
        color: rgb(254, 254, 254);
    }

    .catalog {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
        padding: 0px 20px;
    }

    .kartu {
        padding: 10px;
        border-radius: 10px;
        background-color: #02632a;
        /* background-color: #0d9276; */
        color: rgb(254, 254, 254);
        /* color: black; */

        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: none;
        /* Tambahkan baris ini untuk menghilangkan border */
    }

    .keterangan {
        margin: 0px 10px 10px 10px;
    }

    .social-icons img {
        margin-right: 4px;
        /* Menambahkan margin kanan 10px */
        margin-bottom: 10px;
        /* Menambahkan margin bawah 10px */
    }


    .social-icons a {
        margin-right: 10px;
        color: white;
        font-size: 20px;
    }

    @media (max-width: 950px) {
        .catalog {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 700px) {

        /* Perbaiki penulisan media query */
        .catalog {
            grid-template-columns: 1fr;
        }
    }
</style>



<body>
    <section id="contact" class="contact">
        <div class="container-fluid" data-aos="fade-up">
            <main class="utama">
                <section class="catalog">
                    <div class="card kartu">
                        <div class="keterangan">
                            <div>
                                <h4>Alamat</h4>
                                <p id="alamat">
                                </p>
                            </div>
                            <div>
                                <h4>E-mail</h4>
                                <p id="email">
                                </p>
                            </div>
                            <div>
                                <h4>Telepon</h4>
                                <p id="telepon">
                                </p>
                            </div>
                            <div class="social-icons">
                            </div>
                        </div>
                    </div>
                    <div class="card kartu">
                        <div class="keterangan">
                            <h4>Quick Link</h4>
                            <ul>
                                <li><a href="/" class="clean">Tentang Kami</a></li>
                                <li>Download list klien</li>
                                <li>Layanan</li>
                                <li>Galeri</li>
                            </ul>
                        </div>
                    </div>
                    <div class="card kartu">

                        <div class="keterangan">
                            <h4>Temukan Kami di Sini</h4>
                            <div class="info-item d-flex align-items-center justify-content-start"
                                style="margin-top: 20px;">
                                <iframe
                                    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.190239865464!2d100.3598762!3d-0.9257309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b917b169e56d%3A0xc23d1e7718497384!2sLSO%20SUMBAR!5e0!3m2!1sid!2sid!4v1710313513927!5m2!1sid!2sid"
                                    width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>

                        </div>
                    </div>

                </section>
                <hr
                    style="margin: -10px 0 30px 0; color: white; font-weight: bold; border-bottom: 2px solid white; border-color: white;">
                <footer>© {{ now()->format('Y') }} | LSO Sumatra Barat</footer>
            </main>
</body>
