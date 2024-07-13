<?php
session_start();
include 'config.php'; // File untuk koneksi ke database

// Memeriksa apakah user sudah login
if (!isset($_SESSION['id_user'])) {
    header('Location: index.php'); // Redirect jika user belum login
    exit();
}

// Mengambil ID user yang sedang login
$id_user = $_SESSION['id_user'];
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Beasiswa Disdik - Beasiswa Mahasiswa Berprestasi</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-scholar.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
        body{
          background-color: #efeded;
        }
        .body-form {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            margin-top: 20px;
        }
        .container2 {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 800px;
        }
        .judul{
          margin-top: 100px;
          text-align: center
        }
        h4 {
            color: black;
            margin-bottom: 20px;
        }
        
        .form-group {
            margin-bottom: 15px;
        }
        
        label {
            display: block;
            margin-bottom: 5px;
            color: black;
        }
        
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="text"]:focus {
            border-color: #7a6ad8;
            outline: none; /* Menghilangkan outline bawaan browser */
        }
        .main-nav{
          margin-top:20px;
        }
    </style>
  </head>

<body>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="dashboard.php" class="logo">
                            <h1 style="font-size: 25px;">Bea-Data</h1>
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="dashboard.php">Home</a></li>
                            <li class="scroll-to-section"><a href="daftar.php">Administrasi</a></li>
                            <li class="scroll-to-section"><a href="logout.php">Logout</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <h2 class="judul">Daftar Beasiswa</h2>
    <div class="body-form">
        <div class="container2">
            <form method="post" action="proses_daftar.php" enctype="multipart/form-data">
                <h4>Data Diri</h4>
                <div class="form-group">
                    <label for="nama">Nama Lengkap</label>
                    <input type="text" id="nama" name="nama">
                    <label for="npm">Nomor Pokok Mahasiswa</label>
                    <input type="text" id="npm" name="npm">
                    <label for="univ">Universitas</label>
                    <select id="univ" name="univ">
                        <option value="pilih">Pilih Universitas</option>
                        <option value="UNPAK">Universitas Pakuan</option>
                        <option value="UI">Universitas Indonesia</option>
                        <option value="IPB">Institut Pertanian Bogor</option>
                        <option value="UIKA">Universitas Ibn Khaldun Bogor</option>
                        <option value="IBI">IBI Kesatuan Bogor</option>
                        <option value="UNJ">Universitas Negeri Jakarta</option>
                    </select>
                    <label for="alamat">Alamat</label>
                    <input type="text" id="alamat" name="alamat">
                    <label for="no.hp">No.HP</label>
                    <input type="text" id="no_hp" name="no_hp">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email">
                </div>
                <h4>Dokumen Administrasi</h4>
                <div class="form-group">
                    <label for="doc.kk">fotocopy KK</label>
                    <input type="file" id="doc_kk" name="doc_kk">
                    <label for="doc.ktp">fotocopy KTP</label>
                    <input type="file" id="doc_ktp" name="doc_ktp">
                    <label for="doc.ktm">fotocopy KTM</label>
                    <input type="file" id="doc_ktm" name="doc_ktm">
                    <label for="doc.sktm">fotocopy SKTM</label>
                    <input type="file" id="doc_sktm" name="doc_sktm">
                    <label for="sertifikat">Sertifikat/piagam <p>*prestasi SMA bidang akademik/non-akademi</p></label>
                    <input type="file" id="sertifikat" name="sertifikat">
                    <label for="pernyataan">Surat Pernyataan <p>terdapat di halaman home</p></label>
                    <input type="file" id="pernyataan" name="pernyataan">
                </div>
                <button type="submit" class="submit-btn">Submit</button>
            </form>
        </div>
    </div>
  <footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2036 Scholar Organization. All rights reserved. &nbsp;&nbsp;&nbsp; Design: <a href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>

  
  </body>
</html>