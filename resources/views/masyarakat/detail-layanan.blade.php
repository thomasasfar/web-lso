<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="css/style.css">
    <link rel="stylesheet" type="css/style.css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Document</title>
</head>
<body>
    <style>
        *{
        text-decoration: none;
        list-style: none;
        }

        .navbar{
            background: whitesmoke; padding-right: 15px; padding-left: 15px;
        }

        .navdiv{
            display: flex; align-items: center; justify-content: space-between;
        }

        .logo a{
        font-size: 35px; font-weight: 600; color : black;
        }

       li{
        list-style: none; display: inline-block;
       }
       
       li a {
        color: black; font-size: 18px; font-weight: bold; margin-right: 25px;
       }
        button {
            background-color: green;
            color:white;
            border: none;
            height:40px;
            width: 100px;
            border-radius:5px;
            cursor:pointer;
            margin-left: 600px;
        }

        button:hover{
            opacity: 0.7;
        }

        .detail-layanan-title {   
            text-align: center; 
            background-color: green;  
            color:white;     
        }
        
        .nama-layanan {
            height:30px;
            background-color: green;
        } 

        .deskripsi {
            
        }
    </style>

    <nav class="navbar">
        <div class="navdiv">
            <label class="logo">LSO Sumbar</label>
            <ul>
                <li><a href="#">Tentang</a></li>
                <li><a href="layanan">Layanan</a></li>
                <li><a href="#">Daftar Klien</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Kontak</a></li>
            </ul>
        </div>
    </nav>
    <div class="nama-layanan">
        <h1 class=detail-layanan-title>NAMA LAYANAN</h1>
    </div>

    <div class="deskripsi">
        <p>Penjelasan tentang golongan 1 Lorem ipsum dolor sit amet, 
            consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
            Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
    
    <button>Download Persyaratan</button>

   {{-- ?footer
  <footer class="footer">
    <div class="container">
        <div class="row">
            <div class="footer-col">
                <h4>Tentang LSO</h4>
                <ul>
                    <li><a href="#">Visi & Misi</a></li>
                    <li><a href="#">Sejarah</a></li>
                    <li><a href="#">Galeri</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Layanan</h4>
                <ul>
                    <li><a href="#">Daftar Layanan</a></li>
                    <li><a href="#">Download Persyaratan</a></li>
                    <li><a href="#">Daftar Klien</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Kontak</h4>
                <ul>
                    <li><a href="#"><i class="fab fa-facebook-f" ></i>081923382</a></li>
                    <li><a href="#"><i class='bx bxl-instagram' ></i>lsosumbar</a></li>
                    <li><a href="#"><i class='bx bxl-twitter' ></i>lsosumbar</a></li>
                    <li><a href="#"><i class='bx bxl-facebook-circle' >LSOSumbar</i></a></li>
                    <li><a href="#"><i class='bx bxl-youtube'></i>lso_sumbar</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Alamat</h4>
                <ul>
                    <li><a href="#">Jalan lorem ipsum lorem ipsum ni 89 padang</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h4>Jam Buka</h4>
                <ul>
                    <li><a href="#">08.00-17.00 WIB</a></li>
                </ul>
            </div>
        </div>
    </div>
  </footer> --}}
</body>
</html>