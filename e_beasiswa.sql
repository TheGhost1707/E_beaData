-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2024 at 04:08 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_beasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(3) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','univ','mhs') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `level`) VALUES
(2, 'Universitas Indonesia', 'UI123', 'admin'),
(3, 'Institut Pertanian Bogor', 'IPB111', ''),
(4, 'Universitas Negeri Jakarta', 'UNJ111', ''),
(5, 'Universitas Pakuan', 'UNPAK111', 'admin'),
(6, 'IBI Kesatuan Bogor', 'IBI111', ''),
(7, 'Universitas Ibn Khaldun Bogor', 'IBN111', ''),
(8, 'admin', 'adm', 'admin'),
(10, 'univ', 'tes', 'univ');

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id_adm` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `universitas` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `ktp` varchar(30) NOT NULL,
  `kk` varchar(30) NOT NULL,
  `ktm` varchar(30) NOT NULL,
  `sktm` varchar(30) NOT NULL,
  `sertifikat` varchar(30) NOT NULL,
  `surat_pernyataan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id_adm`, `id_user`, `nama`, `npm`, `universitas`, `alamat`, `no_hp`, `email`, `ktp`, `kk`, `ktm`, `sktm`, `sertifikat`, `surat_pernyataan`) VALUES
(28, 1, 'Naellya', '085021017', 'UNPAK', 'Perumahan bougenville 6', '08996677554', 'qrlnmwln@gmail.com', 'girl (1).png', 'parents.png', 'Logo Universitas Pakuan laluah', 'Poster TOEIC.jpg', '00000001.jpg', 'SK Muhamad Akbar Maulana.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `fail_survei`
--

CREATE TABLE `fail_survei` (
  `id` int(3) NOT NULL,
  `nama_penanggung` varchar(50) NOT NULL,
  `kd_mahasiswa` varchar(50) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `universitas` varchar(80) NOT NULL,
  `dokumentasi_1` varchar(50) NOT NULL,
  `dokumentasi_2` varchar(50) NOT NULL,
  `kesesuaian` char(5) NOT NULL,
  `catatan_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fail_survei`
--

INSERT INTO `fail_survei` (`id`, `nama_penanggung`, `kd_mahasiswa`, `npm`, `universitas`, `dokumentasi_1`, `dokumentasi_2`, `kesesuaian`, `catatan_pic`) VALUES
(5, 'Sutrisno', 'Fahrul Ahmad', '1706055321', 'universitas Indonesia', 'uploads/Screenshot (8).png', 'uploads/Screenshot (2).png', 'tidak', 'keterangan tidak sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(6, 'Sutrisno', 'Agmiranda Arilla', '1706053456', 'Universitas Indonesia', 'uploads/Screenshot (16).png', 'uploads/Screenshot (2).png', 'iya', 'keterangan sama dengan saat wawancara'),
(7, 'Sutrisno', 'Nur Fadilah', '1303621013	', 'Universitas Negeri Jakarta', 'uploads/Screenshot (3).png', 'uploads/Screenshot (2).png', 'iya', 'keterangan sama dengan saat wawancara'),
(8, 'Sutrisno', 'Ajeng Pitaloka', '1303621014', 'Universitas Negeri Jakarta', 'uploads/Screenshot (8).png', 'uploads/Screenshot (1).png', 'iya', 'keterangan sama dengan saat wawancara'),
(9, 'Sutrisno', 'Annisa Safrida', 'G84120010', 'Institut Pertanian Bogor', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara'),
(10, 'Fahmi ', 'Nita Rahma', '192230012', 'IBI Kesatuan Bogor', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara');

-- --------------------------------------------------------

--
-- Table structure for table `fail_wawancara`
--

CREATE TABLE `fail_wawancara` (
  `id` int(3) NOT NULL,
  `kd_mahasiswa` varchar(50) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `universitas` varchar(80) NOT NULL,
  `jawaban_1` varchar(50) NOT NULL,
  `jawaban_2` varchar(50) NOT NULL,
  `jawaban_3` varchar(50) NOT NULL,
  `jawaban_4` varchar(50) NOT NULL,
  `jawaban_5` varchar(50) NOT NULL,
  `jawaban_6` varchar(50) NOT NULL,
  `jawaban_7` varchar(50) NOT NULL,
  `jawaban_8` varchar(50) NOT NULL,
  `jawaban_9` varchar(50) NOT NULL,
  `jawaban_10` varchar(50) NOT NULL,
  `jawaban_11` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fail_wawancara`
--

INSERT INTO `fail_wawancara` (`id`, `kd_mahasiswa`, `npm`, `universitas`, `jawaban_1`, `jawaban_2`, `jawaban_3`, `jawaban_4`, `jawaban_5`, `jawaban_6`, `jawaban_7`, `jawaban_8`, `jawaban_9`, `jawaban_10`, `jawaban_11`) VALUES
(3, 'Widya Ningsih', '065123183', 'Universitas Pakuan', 'ya', 'ya', 'ya milik pribadi', 'ayah kasir toko swalayan', '3.5 jt', '5, anak ke 1', '3', 'belum bekerja', 'Punya satu motor', 'juara silat', 'tidak pernah'),
(4, 'Fatih Azzam', '1303621012', 'Universitas Negeri Jakarta', 'ya', 'ya', 'ya milik pribadi', 'ayah buruh pabrik, ibu irt', '2,4 jt', '4, anak ke 1', '2', 'belum bekerja', 'Punya satu motor', 'setifikat lomba tajwid', 'tidak pernah');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_survei`
--

CREATE TABLE `hasil_survei` (
  `id` int(3) NOT NULL,
  `nama_penanggung` varchar(50) NOT NULL,
  `kd_mahasiswa` varchar(50) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `universitas` varchar(80) NOT NULL,
  `dokumentasi_1` varchar(50) NOT NULL,
  `dokumentasi_2` varchar(50) NOT NULL,
  `kesesuaian` char(5) NOT NULL,
  `catatan_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_survei`
--

INSERT INTO `hasil_survei` (`id`, `nama_penanggung`, `kd_mahasiswa`, `npm`, `universitas`, `dokumentasi_1`, `dokumentasi_2`, `kesesuaian`, `catatan_pic`) VALUES
(5, 'Sutrisno', 'Adilah Rizaki ', 'N096JPMN2', 'Universitas Indonesia', 'uploads/1704271961_Screenshot (2).png', 'uploads/1704271961_Screenshot (3).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(6, 'Sutrisno', 'Fahrul Ahmad', '08502101412', 'Universitas Negeri Jakarta', 'uploads/Screenshot (8).png', 'uploads/Screenshot (5).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(7, 'Sutrisno', 'Syifa Adinata', '1706053321', 'Universitas Ibn Khaldun Bogor', 'uploads/Screenshot (7).png', 'uploads/Screenshot (8).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(8, 'Mayang', 'Canva Ardanto', '065123112', 'Universitas Pakuan', 'uploads/Screenshot (3).png', 'uploads/Screenshot (8).png', 'iya', 'keterangan sama dengan saat wawancara'),
(9, 'Mayang', 'Rumia Nabila Sari', '067123186', 'Universitas Pakuan', 'uploads/Screenshot (6).png', 'uploads/Screenshot (14).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(12, 'Nurul', 'M. Darmawan', 'B9028736122', 'Institut Pertanian Bogor', 'uploads/Screenshot (7).png', 'uploads/Screenshot (8).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(13, 'Fahmi ', 'Dwi Nugroho', '192230018', 'IBI Kesatuan Bogor', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara'),
(15, 'Mayang', 'Naelliya', '085021014', 'Universitas Pakuan', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_wawancara`
--

CREATE TABLE `hasil_wawancara` (
  `id` int(3) NOT NULL,
  `kd_mahasiswa` varchar(50) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `universitas` varchar(80) NOT NULL,
  `jawaban_1` varchar(50) NOT NULL,
  `jawaban_2` varchar(50) NOT NULL,
  `jawaban_3` varchar(50) NOT NULL,
  `jawaban_4` varchar(50) NOT NULL,
  `jawaban_5` varchar(50) NOT NULL,
  `jawaban_6` varchar(50) NOT NULL,
  `jawaban_7` varchar(50) NOT NULL,
  `jawaban_8` varchar(50) NOT NULL,
  `jawaban_9` varchar(50) NOT NULL,
  `jawaban_10` varchar(50) NOT NULL,
  `jawaban_11` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hasil_wawancara`
--

INSERT INTO `hasil_wawancara` (`id`, `kd_mahasiswa`, `npm`, `universitas`, `jawaban_1`, `jawaban_2`, `jawaban_3`, `jawaban_4`, `jawaban_5`, `jawaban_6`, `jawaban_7`, `jawaban_8`, `jawaban_9`, `jawaban_10`, `jawaban_11`) VALUES
(8, 'Fahrul Ahmad', '1706053321', 'Universitas Indonesia', 'Yatim', 'Ibu', 'milik pribadi', 'ibu buruh cuci', 'kurang dari sejuta', '3, anak ke 1', '2', 'belum bekerja', 'tidak ada', 'tidak ada', 'Beasiswa tryout'),
(9, 'Syifa Adinata', '1706055321', 'Universitas Indonesia', 'Ya, Masih ada', 'Ya dengan Orang tua', 'sewa per bulan', 'ayah kerja serabutan', 'ayah dengan gaji kurang dari satu juta perbulan', 'keluarga ada 5, anak ke 2', '4', 'belum bekerja', 'Punya satu motor', 'tidak ada', 'tidak pernah'),
(10, 'Dwi Nugroho', '192230018	', 'IBI Kesatuan Bogor', 'Yatim', 'ya', 'kontrak', 'ibu buruh cuci', 'kurang dari sejuta', '3', '1', 'belum bekerja', 'tidak ada', 'penghargaan lomba poster', 'tidak pernah'),
(11, 'Nita Rahma', '192230012', 'IBI Kesatuan Bogor', 'ya', 'ya', 'ya milik pribadi', 'ayah kerja serabutan, ibu jualan makanan', 'ayah 2 jt, ibu 1,5 jt', '5, anak ke 1', '2', 'belum bekerja', 'Punya satu motor', 'penghargaan karya tulis ', 'tidak pernah'),
(12, 'Omar Syahbana', '192230011', 'IBI Kesatuan Bogor', 'ya', 'ya', 'ya milik pribadi', 'ayah kerja serabutan', 'kurang dari sejuta', '4, anak ke 1', '2', 'belum bekerja', 'Punya satu motor', 'penghargaan Toefl', 'tidak pernah'),
(14, 'Canva Ardanto', '065123112', 'Universitas Pakuan', 'Tidak, Yatim Piatu', 'Tinggal dengan bibi', 'kontrak', 'bibi dan paman memiliki toko buah di pasar', '3,4 jt', '4, anak ke 1', '2', 'belum bekerja', 'satu motor, satu mobil pick up', 'penghargaan design digital dan manual', 'tidak pernah'),
(15, 'Naelliya', '085021014', 'Universitas Pakuan', 'ya', 'ya', 'ya milik pribadi', 'ayah kerja serabutan', 'kurang dari sejuta', '5, anak ke 1', '4', 'ya', 'Punya satu motor', 'tidak ada', 'tidak pernah');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id_profile` int(3) NOT NULL,
  `id_user` int(3) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `universitas` varchar(30) NOT NULL,
  `fakultas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `survei`
--

CREATE TABLE `survei` (
  `id` int(3) NOT NULL,
  `nama_penanggung` varchar(50) NOT NULL,
  `kd_mahasiswa` varchar(50) NOT NULL,
  `universitas` varchar(80) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `dokumentasi_1` varchar(50) NOT NULL,
  `dokumentasi_2` varchar(50) NOT NULL,
  `kesesuaian` char(5) NOT NULL,
  `catatan_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survei`
--

INSERT INTO `survei` (`id`, `nama_penanggung`, `kd_mahasiswa`, `universitas`, `npm`, `dokumentasi_1`, `dokumentasi_2`, `kesesuaian`, `catatan_pic`) VALUES
(19, 'Sutrisno', 'Adilah Rizaki ', 'Institut Pertanian Bogor', 'G1341700133', 'uploads/1704640719_Screenshot (5).png', 'uploads/1704640719_Screenshot (19).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(20, 'Sutrisno', 'Syifa Adinata', 'Universitas Indonesia', '1706053321', 'uploads/1704640642_kondisi rumah.jpeg', 'uploads/1704640642_bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara'),
(21, 'Sutrisno', 'Fahrul Ahmad', 'Universitas Negeri Jakarta', '08502101412', 'uploads/Screenshot (8).png', 'uploads/Screenshot (5).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(22, 'Nurul', 'M. Darmawan', 'Institut Pertanian Bogor', 'B9028736122', 'uploads/Screenshot (7).png', 'uploads/Screenshot (8).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(23, 'Mayang', 'Rumia Nabila Sari', 'Universitas Pakuan', '067123186', 'uploads/Screenshot (6).png', 'uploads/Screenshot (14).png', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(24, 'Mayang', 'Canva Ardanto', 'Universitas Pakuan', '065123112', 'uploads/Screenshot (3).png', 'uploads/Screenshot (8).png', 'iya', 'keterangan sama dengan saat wawancara'),
(32, 'Fahmi ', 'Omar Syahbana', 'IBI Kesatuan Bogor', '192230011	', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara'),
(34, 'Fahmi ', 'Dwi Nugroho', 'IBI Kesatuan Bogor', '192230018', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara'),
(37, 'Mayang', 'Naelliya', 'Universitas Pakuan', '085021014', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara, data yang dapat ditambahkan adalah kakaknya bebrapa kali bekerja tetapi belum sempat bekerja lagi'),
(38, 'Sutrisno', 'Fahrul Ahmad', 'Institut Pertanian Bogor', '0850210141', 'uploads/kondisi rumah.jpeg', 'uploads/bersama.jpg', 'iya', 'keterangan sama dengan saat wawancara');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id` int(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id`, `nama`, `status`) VALUES
(1, 'Universitas Indonesia', 'UII UAA'),
(2, 'Universitas Pakuan', 'Swasta'),
(3, 'Institut Pertanian Bogor', 'Negeri'),
(7, 'universitas Malang', 'Negeri');

-- --------------------------------------------------------

--
-- Table structure for table `user_mhs`
--

CREATE TABLE `user_mhs` (
  `id_user` int(3) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL,
  `universitas` varchar(30) NOT NULL,
  `nama` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_mhs`
--

INSERT INTO `user_mhs` (`id_user`, `username`, `password`, `universitas`, `nama`) VALUES
(1, 'nael', '123', 'Universitas Pakuan', 'Naellya Kamal'),
(2, 'akbar', '123', 'Universitas Siang Malam', 'Muhamad Akbar Maulana');

-- --------------------------------------------------------

--
-- Table structure for table `wawancara`
--

CREATE TABLE `wawancara` (
  `id` int(11) NOT NULL,
  `kd_mahasiswa` varchar(50) NOT NULL,
  `npm` varchar(12) NOT NULL,
  `universitas` varchar(80) NOT NULL,
  `jawaban_1` varchar(50) NOT NULL,
  `jawaban_2` varchar(50) NOT NULL,
  `jawaban_3` varchar(50) NOT NULL,
  `jawaban_4` varchar(50) NOT NULL,
  `jawaban_5` varchar(50) NOT NULL,
  `jawaban_6` varchar(50) NOT NULL,
  `jawaban_7` varchar(50) NOT NULL,
  `jawaban_8` varchar(50) NOT NULL,
  `jawaban_9` varchar(50) NOT NULL,
  `jawaban_10` varchar(50) NOT NULL,
  `jawaban_11` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wawancara`
--

INSERT INTO `wawancara` (`id`, `kd_mahasiswa`, `npm`, `universitas`, `jawaban_1`, `jawaban_2`, `jawaban_3`, `jawaban_4`, `jawaban_5`, `jawaban_6`, `jawaban_7`, `jawaban_8`, `jawaban_9`, `jawaban_10`, `jawaban_11`) VALUES
(20, 'Fahrul Ahmad', '1706053321', 'Universitas Indonesia', 'Yatim', 'Ibu', 'milik pribadi', 'ibu buruh cuci', 'kurang dari sejuta', '3, anak ke 1', '2', 'belum bekerja', 'tidak ada', 'tidak ada', 'Beasiswa tryout'),
(23, 'Syifa Adinata', '1706053321', 'Universitas Indonesia', 'ya', 'Ya dengan Orang tua', 'ya milik pribadi', 'ayah kerja serabutan', 'kurang dari sejuta', 'keluarga ada 6, anak ke 2', '2', 'belum bekerja', 'Punya satu motor', 'kejuaraan paskibra', 'tidak pernah'),
(24, 'Agmiranda Arilla', '1706053456', 'Universitas Indonesia', 'ya', 'ya', 'ya milik pribadi', 'ayah karyawan kontrak pabrik', '2 juta', '5, anak ke 1', '2', 'belum bekerja', 'Punya satu motor', 'sertifikat lulusan terbaik', 'tidak pernah'),
(25, 'Adilah Rizaki ', 'G1341700133', 'Institut Pertanian Bogor', 'Tidak, Yatim', 'ya', 'ya milik pribadi', 'ibu pedagang sayur di pasar', '1,5 jt', '4, anak ke 1', '3', 'belum bekerja', 'Punya satu motor', 'kejuaraan paduan suara', 'tidak pernah'),
(26, 'M. Darmawan', 'B9028736122', 'Institut Pertanian Bogor', 'ya', 'ya', 'sewa per bulan', 'ayah buruh pabrik, ibu karyawan toko', 'ayah 2 jt, ibu 1 jt', '6, anak ke 2', '4', 'belum bekerja', 'Punya satu motor', 'sertifikat anggota paskibra terbaik', 'tidak pernah'),
(27, 'Annisa Safrida', 'G84120010', 'Institut Pertanian Bogor', 'Tidak, Piatu', 'ya', 'ya milik pribadi', 'ayah peternak ayam', 'kurang lebih 3 jt', '5, anak ke 1', '4', 'belum bekerja', 'tidak ada', 'penghargaan debat', 'beasiswa siswa berprestasi'),
(29, 'Nur Fadilah', '1303621013', 'Universitas Negeri Jakarta', 'ya', 'ya', 'ya milik pribadi', 'ayah kerja serabutan', '3 jt', '7, anak ke 2', '5', 'belum bekerja', 'Punya satu motor', 'sertifikat lomba puisi', 'tidak pernah'),
(30, 'Ajeng Pitaloka', '1303621014', 'Universitas Negeri Jakarta', 'ya', 'ya', 'sewa per bulan', 'ayah karyawan kontrak, ibu ART', 'ayah 2 jt, ibu 2 jt', '6, anak ke 2', '3', 'belum bekerja', 'Punya satu motor', 'lomba cerpen dan puisi', 'tidak pernah'),
(31, 'Rumia Nabila Sari', '067123186', 'Universitas Pakuan', 'ya', 'Ya dengan Orang tua', 'sewa per bulan', 'ayah kerja serabutan, ibu jualan makanan', 'ayah 2 jt, ibu 1 jt', '4, anak ke 1', '2', 'belum bekerja', 'Punya satu motor', 'sertifikat design', 'tidak pernah'),
(33, 'Canva Ardanto', '065123112', 'Universitas Pakuan', 'Tidak, Yatim Piatu', 'Tinggal dengan bibi', 'kontrak', 'bibi dan paman memiliki toko buah di pasar', '3,4 jt', '4, anak ke 1', '2', 'belum bekerja', 'satu motor, satu mobil pick up', 'penghargaan design digital dan manual', 'tidak pernah'),
(34, 'Omar Syahbana', '192230011', 'IBI Kesatuan Bogor', 'ya', 'ya', 'ya milik pribadi', 'ayah kerja serabutan', 'kurang dari sejuta', '4, anak ke 1', '2', 'belum bekerja', 'Punya satu motor', 'penghargaan Toefl', 'tidak pernah'),
(35, 'Nita Rahma', '192230012', 'IBI Kesatuan Bogor', 'ya', 'ya', 'ya milik pribadi', 'ayah kerja serabutan, ibu jualan makanan', 'ayah 2 jt, ibu 1,5 jt', '5, anak ke 1', '2', 'belum bekerja', 'Punya satu motor', 'penghargaan karya tulis ', 'tidak pernah'),
(36, 'Dwi Nugroho', '192230018	', 'IBI Kesatuan Bogor', 'Yatim', 'ya', 'kontrak', 'ibu buruh cuci', 'kurang dari sejuta', '3', '1', 'belum bekerja', 'tidak ada', 'penghargaan lomba poster', 'tidak pernah'),
(37, 'Naelliya', '085021014', 'Universitas Pakuan', 'ya', 'ya', 'ya milik pribadi', 'ayah kerja serabutan', 'kurang dari sejuta', '5, anak ke 1', '4', 'ya', 'Punya satu motor', 'tidak ada', 'tidak pernah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id_adm`);

--
-- Indexes for table `fail_survei`
--
ALTER TABLE `fail_survei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fail_wawancara`
--
ALTER TABLE `fail_wawancara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_survei`
--
ALTER TABLE `hasil_survei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hasil_wawancara`
--
ALTER TABLE `hasil_wawancara`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id_profile`);

--
-- Indexes for table `survei`
--
ALTER TABLE `survei`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_mhs`
--
ALTER TABLE `user_mhs`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wawancara`
--
ALTER TABLE `wawancara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id_adm` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `fail_survei`
--
ALTER TABLE `fail_survei`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `fail_wawancara`
--
ALTER TABLE `fail_wawancara`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hasil_survei`
--
ALTER TABLE `hasil_survei`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hasil_wawancara`
--
ALTER TABLE `hasil_wawancara`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id_profile` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `survei`
--
ALTER TABLE `survei`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_mhs`
--
ALTER TABLE `user_mhs`
  MODIFY `id_user` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wawancara`
--
ALTER TABLE `wawancara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
