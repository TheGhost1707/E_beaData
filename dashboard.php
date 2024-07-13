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

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "e_beasiswa";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data administrasi berdasarkan user yang sedang login
$sql = "SELECT id_adm, nama, npm, universitas FROM administrasi WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $id_user);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Beasiswa Disdik - Beasiswa Mahasiswa Berprestasi</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-scholar.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <style>
        .iframe-container {
            width: 100%;
            height: 600px;
        }
        .iframe-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .body-table {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        table {
            width: 80%;
            border-collapse: collapse;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #4e73df;
            color: white;
        }
        td {
            background-color: white;
        }
        .status {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 15px;
            color: white;
        }
        .status.proses {
            background-color: #ffa500;
        }
        .status.selesai {
            background-color: #28a745;
        }
        .main-nav{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <a href="dashboard.php" class="logo">
                            <h1 style="font-size: 25px;">Bea-Data</h1>
                        </a>
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="dashboard.php" class="active">Home</a></li>
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

    <div class="main-banner" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="owl-carousel owl-banner">
                        <div class="item item-2">
                            <div class="header-text">
                                <span class="category">Beasiswa Disdik</span>
                                <h2>Beasiswa Mahasiswa Berprestasi dari Keluarga Kurang Mampu</h2>
                                <p>Ekonomi bukanlah hambatan untuk mendapatkan kualitas pendidikan yang memadai.</p>
                            </div>
                        </div>
                        <div class="item item-3">
                            <div class="header-text">
                                <span class="category">Our Time</span>
                                <h2>Every Year!</h2>
                                <p>Akan dibuka saat mahasiswa sudah memasuki minggu perkuliahan. Coba Kesempatanmu Di sini!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services section" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/images/paperwork.png" alt="online degrees">
                        </div>
                        <div class="main-content">
                            <h4>Tahap Administrasi</h4>
                            <p>Calon penerima beasiswa diminta melengkapi berkas-berkas untuk keperluan administrasi</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/images/meeting.png" alt="short courses">
                        </div>
                        <div class="main-content">
                            <h4>Tahap Wawancara</h4>
                            <p>Calon penerima beasiswa yang lolos seleksi administrasi akan melakukan tahap wawancara langsung ke kantor Dinas Pendidikan Kota Bogor</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="service-item">
                        <div class="icon">
                            <img src="assets/images/evaluation.png" alt="web experts">
                        </div>
                        <div class="main-content">
                            <h4>Tahap Survei</h4>
                            <p>Staff dari Dinas Pendidikan Kota Bogor maupun staff universitas akan datang ke tempat tinggal calon penerima beasiswa</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="section courses" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>Collaboration</h6>
                        <h2>University</h2>
                    </div>
                </div>
            </div>
            <ul class="event_filter">
                <li>
                    <a class="is_active" href="#!" data-filter="*">Show All</a>
                </li>
                <li>
                    <a href="#!" data-filter=".design">Negeri</a>
                </li>
                <li>
                    <a href="#!" data-filter=".development">Swasta</a>
                </li>
            </ul>
            <div class="row event_box">
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src="assets/images/logo ui.png" alt=""></a>
                            <span class="category">Negeri</span>
                        </div>
                        <div class="down-content">
                            <span class="author">S1</span>
                            <h4>Universitas Indonesia</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 development">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src="assets/images/logo unpak.png" alt=""></a>
                            <span class="category">Swasta</span>
                        </div>
                        <div class="down-content">
                            <span class="author">S1</span>
                            <h4>Universitas Pakuan</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 design wordpress">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src="assets/images/logo ipb.png" alt=""></a>
                            <span class="category">Negeri</span>
                        </div>
                        <div class="down-content">
                            <span class="author">S1</span>
                            <h4>Institut Pertanian Bogor</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 development">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src="assets/images/logo ibn.png" alt=""></a>
                            <span class="category">Swasta</span>
                        </div>
                        <div class="down-content">
                            <span class="author">S1</span>
                            <h4>Universitas Ibn Khaldun Bogor</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress development">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src="assets/images/logo ibi.png" alt=""></a>
                            <span class="category">Swasta</span>
                        </div>
                        <div class="down-content">
                            <span class="author">S1</span>
                            <h4>IBI Kesatuan Bogor</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 align-self-center mb-30 event_outer col-md-6 wordpress design">
                    <div class="events_item">
                        <div class="thumb">
                            <a href="#"><img src="assets/images/logo unj.png" alt=""></a>
                            <span class="category">Negeri</span>
                        </div>
                        <div class="down-content">
                            <span class="author">S1</span>
                            <h4>Universitas Negeri Jakarta</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="contact-us section" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="section-heading">
                        <h6>Surat Pernyataan</h6>
                        <h2>Silahakan download untuk melakukan pendaftaran beasiswa.</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-us-content">
                        <form id="contact-form" action="" method="post">
                            <div class="row">
                                <div class="col-lg-12 iframe-container">
                                    <iframe src="doct/Surat Pernyataan Beadata.pdf"></iframe>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <h2 style="text-align: center;">Riwayat Administrasi</h2>
    <br>
    <div class="body-table">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Npm</th>
                    <th>Universitas</th>
                    <th>Edit</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_adm"] . "</td>";
                        echo "<td>" . $row["nama"] . "</td>";
                        echo "<td>" . $row["npm"] . "</td>";
                        echo "<td>" . $row["universitas"] . "</td>";
                        echo "<td><a href='editdaftar.php?id_adm=" . $row["id_adm"] . "'><button type='button' class='btn btn-primary'>Edit</button></a></td>";
                        echo "<td><button type='button' class='btn btn-warning'>proses</button></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6' style='text-align:center;'>Tidak ada data</td></tr>";
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <footer>
        <div class="container">
            <div class="col-lg-12">
                <p>Copyright © 2036 Scholar Organization. All rights reserved. &nbsp;&nbsp;&nbsp; Design: <a href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a></p>
            </div>
        </div>
    </footer>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/counter.js"></script>
    <script src="assets/js/custom.js"></script>
</body>
</html>
