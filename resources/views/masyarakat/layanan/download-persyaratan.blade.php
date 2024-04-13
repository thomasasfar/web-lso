<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        *{
            text-decoration: none;
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
            display : inline-block;
            margin-left: 635px;
        }

        button:hover{
            opacity: 0.7;
        }

        .download-title {   
            text-align: center;        
        }

        .banner {
            height : 400px;
            width : 1400px;
        }

        .isi-download-persyaratan {
            width : 750px;
            text-align: justify;
            margin-left : 300px;
            margin-right :350px;
            
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

    <img class=banner src="https://infosumbar.net/aset/arsip/2014/11/sayuran.jpeg">
    <h1 class="download-title">DOWNLOAD PERSYARATAN</h1>

    <div class=all-download>
        <div class="isi-download-persyaratan">
            <p>Penjelasan tentang golongan 1 Lorem ipsum dolor sit amet, 
                consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="button">
            <button>Download</button>
        </div>
    </div>
</body>
</html>