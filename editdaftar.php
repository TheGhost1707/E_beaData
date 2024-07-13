<?php
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

// Mendapatkan ID dari URL
$id = $_GET['id_adm'];

// Mengambil data berdasarkan ID
$sql = "SELECT * FROM administrasi WHERE id_adm = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "Data tidak ditemukan";
    exit;
}

$conn->close();

// Fungsi untuk mengecek file yang ada di server dan menghapusnya
function deleteFile($file) {
    $file_path = "uploads/" . $file;
    if (file_exists($file_path)) {
        unlink($file_path);
    }
}

// Fungsi untuk mengunggah file dan mengembalikan nama file yang diunggah
function uploadFile($file, $target_dir) {
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Batasi jenis file yang diizinkan
    if($fileType != "jpg" && $fileType != "png" && $fileType != "jpeg" && $fileType != "pdf" ) {
        echo "Maaf, hanya file JPG, JPEG, PNG & PDF yang diizinkan.";
        $uploadOk = 0;
    }

    // Periksa apakah $uploadOk 0 (kesalahan) atau 1 (lanjutkan unggahan)
    if ($uploadOk == 0) {
        echo "Maaf, file Anda tidak dapat diunggah.";
        return null;
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return basename($file["name"]);
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah file Anda.";
            return null;
        }
    }
}

// Proses update data jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id_adm'];
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $universitas = $_POST['universitas'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    // Direktori tujuan untuk mengunggah file
    $target_dir = "uploads/";

    // Fungsi untuk menghapus file yang lama dan mengunggah file yang baru
    function updateFile($file_post, $file_old, $target_dir) {
        global $conn, $id;

        // Jika ada file yang diunggah, update file baru
        if (!empty($file_post['name'])) {
            deleteFile($file_old); // Hapus file lama
            return uploadFile($file_post, $target_dir); // Upload file baru
        } else {
            return $file_old; // Gunakan file lama jika tidak diubah
        }
    }

    // Update data di database
    $ktp = updateFile($_FILES["doc_ktp"], $row['ktp'], $target_dir);
    $kk = updateFile($_FILES["doc_kk"], $row['kk'], $target_dir);
    $ktm = updateFile($_FILES["doc_ktm"], $row['ktm'], $target_dir);
    $sktm = updateFile($_FILES["doc_sktm"], $row['sktm'], $target_dir);
    $sertifikat = updateFile($_FILES["sertifikat"], $row['sertifikat'], $target_dir);
    $surat_pernyataan = updateFile($_FILES["pernyataan"], $row['surat_pernyataan'], $target_dir);

    // Simpan data ke database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Periksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    $sql = "UPDATE administrasi SET 
            nama='$nama', 
            npm='$npm', 
            universitas='$universitas', 
            alamat='$alamat', 
            no_hp='$no_hp', 
            email='$email', 
            ktp='$ktp', 
            kk='$kk', 
            ktm='$ktm', 
            sktm='$sktm', 
            sertifikat='$sertifikat', 
            surat_pernyataan='$surat_pernyataan' 
            WHERE id_adm=$id";

    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Edit Data Administrasi berhasil!");';
        echo 'window.location.href = "dashboard.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
         <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-scholar.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 50px;
        }

        .card {
            margin-top: 150px;
            width:800px;

        }
        @media (max-width: 767px) {
            .card{
                width:400px;
            }
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
    <div class="container-formedit">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title">Edit Data</h2>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?id_adm=" . $row['id_adm']); ?>"
                            method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id_adm" value="<?php echo $row['id_adm']; ?>">
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" id="nama" name="nama"
                                    value="<?php echo $row['nama']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="npm">NPM:</label>
                                <input type="text" class="form-control" id="npm" name="npm"
                                    value="<?php echo $row['npm']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="universitas">Universitas:</label>
                                <input type="text" class="form-control" id="universitas" name="universitas"
                                    value="<?php echo $row['universitas']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat:</label>
                                <textarea class="form-control" id="alamat" name="alamat"
                                    required><?php echo $row['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP:</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp"
                                    value="<?php echo $row['no_hp']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="<?php echo $row['email']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="doc_ktp">Upload KTP:</label>
                                <input type="file" class="form-control-file" id="doc_ktp" name="doc_ktp">
                                <?php if (!empty($row['ktp'])): ?>
                                <a href="uploads/<?php echo $row['ktp']; ?>" target="_blank">Lihat File</a>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="doc_kk">Upload KK:</label>
                                <input type="file" class="form-control-file" id="doc_kk" name="doc_kk">
                                <?php if (!empty($row['kk'])): ?>
                                <a href="uploads/<?php echo $row['kk']; ?>" target="_blank">Lihat File</a>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="doc_ktm">Upload KTM:</label>
                                <input type="file" class="form-control-file" id="doc_ktm" name="doc_ktm">
                                <?php if (!empty($row['ktm'])): ?>
                                <a href="uploads/<?php echo $row['ktm']; ?>" target="_blank">Lihat File</a>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="doc_sktm">Upload SKTM:</label>
                                <input type="file" class="form-control-file" id="doc_sktm" name="doc_sktm">
                                <?php if (!empty($row['sktm'])): ?>
                                <a href="uploads/<?php echo $row['sktm']; ?>" target="_blank">Lihat File</a>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="sertifikat">Upload Sertifikat:</label>
                                <input type="file" class="form-control-file" id="sertifikat" name="sertifikat">
                                <?php if (!empty($row['sertifikat'])): ?>
                                <a href="uploads/<?php echo $row['sertifikat']; ?>" target="_blank">Lihat File</a>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="pernyataan">Upload Surat Pernyataan:</label>
                                <input type="file" class="form-control-file" id="pernyataan" name="pernyataan">
                                <?php if (!empty($row['surat_pernyataan'])): ?>
                                <a href="uploads/<?php echo $row['surat_pernyataan']; ?>"
                                    target="_blank">Lihat File</a>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Data</button>
                        </form>
                    </div>
                </div>
            </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"
        integrity="sha384-E3w3p0jKjvuOJL7ls+eCkV2hFv8K6GpQyJcOUL3N4nQnV5/dCI9iW5+AQY3YhxAU"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh/jFcPV+QCfCIrbC2LlXb8fQpfJo2IquDhx4"
        crossorigin="anonymous"></script>
</body>

</html>
