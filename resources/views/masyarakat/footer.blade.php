@extends('template')

@section('title', 'Profile')

@section('konten')
    @include('masyarakat/navbar')
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>
    
    body {
        margin: 0px;
        padding: 0px;
    }

    

    .container-fluid{
        margin: 0px;
        padding: 0px;
    }
    
    main {
        top: 0;
        left: 0;
        position: sticky;
        background-color: #0d9276;
        padding: 10px 35px;
        justify-content: space-between;
        align-items: center;
        z-index: 1000;
    }

    .catalog {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr;
        gap: 20px;
        padding: 0px 20px;
    }

    .card {
        padding: 10px;
        border-radius: 10px;
        background-color: #0d9276;
        color: rgb(254, 254, 254);
        
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        border: none; /* Tambahkan baris ini untuk menghilangkan border */
    }

    .keterangan {
        margin: 0px 10px 10px 10px;
    }

    @media (max-width: 950px) {
        .catalog {
            grid-template-columns: 1fr 1fr;
        }
    }

    @media (max-width: 700px) { /* Perbaiki penulisan media query */
        .catalog {
            grid-template-columns: 1fr;
        }
    }
</style>


      
<body>
        
    
    <section id="contact" class="contact">
        <div class="container-fluid" data-aos="fade-up">
            <div class="section-header">
                <h1 class="text-center font-weight-bold" style="font-size: 40px; color: #333">KONTAK</h1>
                <p class="text-center font-weight-bold">Butuh bantuan? <span>Hubungi kami</span></p>
            </div>
    
            <main>
                
          
                <section class="catalog">
                  <div class="card">
                    <div class="keterangan">
                            <div>
                                <h3>Alamat</h3>
                                <p>Jl.Lorem ipsum dolor sit amet consectetur. Vestibulum pulvinar tincidunt vulputate</p>
                            </div>
                            <div>
                                <h3>E-mail</h3>
                                <p>customerservice@lsosumbar.com</p>
                            </div>
                            <div>
                                <h3>Telepon</h3>
                                <p>+62 8 12892723789</p>
                            </div>
                    </div>
                  </div>
                  <div class="card"> 
                    <div class="keterangan">
                      <h4>Quick Link</h4>
                      <ul>
                        <li> Beranda</li>
                        <li>Produk</li>
                        <li>Keranjang</li>
                        <li>Kontak</li>
                      </ul>
                      
                    </div>
                  </div>
                  <div class="card">
                    
                    <div class="keterangan">
                        <h4>Temukan Kami di Sini</h4>
                        <div class="info-item d-flex align-items-center justify-content-start" style="margin-top: 20px;">
                            <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15957.190239865464!2d100.3598762!3d-0.9257309!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b917b169e56d%3A0xc23d1e7718497384!2sLSO%20SUMBAR!5e0!3m2!1sid!2sid!4v1710313513927!5m2!1sid!2sid"
                            width="600" height="250" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                      
                    </div>
                  </div>
                  
                </section>
                <hr style="margin: -10px 0 30px 0; color: white; font-weight: bold; border-bottom: 2px solid white; border-color: white;">
                <footer >2024.LSO Sumatra Barat</footer>
              </main>
            </body>
              
@endsection
