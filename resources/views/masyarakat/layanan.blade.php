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

       .footer {
        background:green; padding-right :15px; padding-left:15px;
       }

        button {
            background-color: green;
            color:white;
            border: none;
            height:40px;
            width: 100px;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            opacity: 0.7;
        }

        .layanan-title {   
            text-align: center;        
        }

        .banner {
            height : 400px;
            width : 1400px;
        }

        .layanan-img {
            height:200px;
            widht:30px;
        }

        .gambarlayanan1 {
            display : inline-block;
            margin-left: 250px;
            margin-right: 50px;
        }

        .gambarlayanan2 {
            display : inline-block;
            margin-left: 250px;
            margin-right: 50px;
        }

        .gambarlayanan3 {
            display : inline-block;
            margin-left: 250px;
            margin-right: 50px;
        }
        .layanan1 {
            width:600px;
            display : inline-block;
        }

        .layanan2 {
            width:600px;
            display : inline-block;
        }

        .layanan3 {
            width:600px;
            display : inline-block;
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
    <h1 class=layanan-title>LAYANAN KAMI</h1>

    <div class="gambarlayanan1">
        <img class=layanan-img src="https://www.oregondairy.com/wp-content/uploads/2016/12/Organics-Header-640x515.jpg">
    </div>

    <div class="layanan1">
        <br><br><br><br><br>
        <h2>Sertifikasi Golongan 1</h2>
        <p>Penjelasan tentang golongan 1 Lorem ipsum dolor sit amet, 
        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <button>Lihat Detail ></button>
    </div>

    <div class="gambarlayanan2">
        <img class=layanan-img src="https://www.oregondairy.com/wp-content/uploads/2016/12/Organics-Header-640x515.jpg">
    </div>

    <div class="layanan2">    
        <br><br><br><br><br>
        <h2>Sertifikasi Golongan 2</h2>
        <p>Penjelasan tentang golongan 2 Lorem ipsum dolor sit amet, 
        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <button>Lihat Detail ></button>
    </div>

    <div class="gambarlayanan3">
        <img class=layanan-img src="https://www.oregondairy.com/wp-content/uploads/2016/12/Organics-Header-640x515.jpg">
    </div>

    <div class="layanan3">
        <br><br><br><br><br>
        <h2>Sertifikasi Golongan 3</h2>
        <p>Penjelasan tentang golongan 3 Lorem ipsum dolor sit amet, 
        consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        <button>Lihat Detail ></button>
    </div>


    <div class="footer">
        
                <ul>
                    <li><a href="#">Tentang</a></li>
                </ul>
    </div>
</body>
</html>