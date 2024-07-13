<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $npm = $_POST['npm'];
    $univ = $_POST['univ'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $email = $_POST['email'];

    // Direktori tujuan untuk mengunggah file
    $target_dir = "uploads/";

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

    // Unggah setiap file yang diterima dan simpan nama file ke variabel
    $kk = uploadFile($_FILES["doc_kk"], $target_dir);
    $ktp = uploadFile($_FILES["doc_ktp"], $target_dir);
    $ktm = uploadFile($_FILES["doc_ktm"], $target_dir);
    $sktm = uploadFile($_FILES["doc_sktm"], $target_dir);
    $sertifikat = uploadFile($_FILES["sertifikat"], $target_dir);
    $surat_pernyataan = uploadFile($_FILES["pernyataan"], $target_dir);

    // Simpan data ke database (menggunakan PDO untuk keamanan)
    include 'config.php'; // Sesuaikan dengan konfigurasi koneksi database Anda

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("INSERT INTO administrasi (id_user, nama, npm, universitas, alamat, no_hp, email, ktp, kk, ktm, sktm, sertifikat, surat_pernyataan) 
                                VALUES (:id_user, :nama, :npm, :univ, :alamat, :no_hp, :email, :ktp, :kk, :ktm, :sktm, :sertifikat, :surat_pernyataan)");

        $stmt->bindParam(':id_user', $_SESSION['id_user']);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':npm', $npm);
        $stmt->bindParam(':univ', $univ);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':no_hp', $no_hp);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':ktp', $ktp);
        $stmt->bindParam(':kk', $kk);
        $stmt->bindParam(':ktm', $ktm);
        $stmt->bindParam(':sktm', $sktm);
        $stmt->bindParam(':sertifikat', $sertifikat);
        $stmt->bindParam(':surat_pernyataan', $surat_pernyataan);

        $stmt->execute();

        echo '<script>';
        echo 'alert("Pendaftaran Administrasi berhasil!");';
        echo 'window.location.href = "dashboard.php";';
        echo '</script>';
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
}
?>
