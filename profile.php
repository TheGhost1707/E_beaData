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
    <link rel="stylesheet" href="user/assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-scholar.css">
    <link rel="stylesheet" href="user/assets/css/owl.css">
    <link rel="stylesheet" href="user/assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">

    <style>
   body{
          background-color: #efeded;
        }
        a {
    text-decoration: none;
    display: block;
}

a button {
    width: 100%;
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
                            <li class="scroll-to-section"><a href="profile.php" class="active">Profile</a></li>
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
  <!-- ***** Header Area End ***** -->
  <div class="container-profile">
    
        <div class="card">
            <h2>My Profile</h2>
            <br>
            <p><strong>Hallo Saya,</strong> John Doe</p>
            <p><strong>Universitas</strong> Universitas XYZ</p>
            <p><strong>Fakultas</strong> Fakultas Teknik</p>
            <p><strong>Jenis Kelamin</strong> Laki-laki</p>
            <hr>
            <a href="logout.php">
            <button type="submit" class="logout-btn">Logout</button>
            </a>
        </div>
        <div class="card">
            <h3>Edit Data Profile</h3>
            <form>
                <div class="form-group">
                    <label for="name">Nama</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="form-group">
                    <label for="university">Universitas</label>
                    <select id="university" name="university">
                        <option value="pilih">Pilih Universitas</option>
                        <option value="UNPAK">Universitas Pakuan</option>
                        <option value="UI">Universitas Indonesia</option>
                        <option value="IPB">Institut Pertanian Bogor</option>
                        <option value="IBN">Universitas Ibn Khaldun Bogor</option>
                        <option value="IBI">IBI Kesatuan Bogor</option>
                        <option value="UNJ">Universitas Negeri Jakarta</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="faculty">Fakultas</label>
                    <input type="text" id="faculty" name="faculty">
                </div>
                <div class="form-group">
                    <label for="gender">Jenis Kelamin</label>
                    <select id="gender" name="gender">
                        <option value="pilih-jk">Pilih jenis kelamin</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                </div>
                <button type="submit" class="submit-btn">Update</button>
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
  <script src="user/assets/js/custom-scripts.js"></script>

  
  </body>
</html>