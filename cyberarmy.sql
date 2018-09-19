-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 02, 2018 at 05:37 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cyberarmy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_costumer`
--

CREATE TABLE `tb_costumer` (
  `kd_costumer` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `perusahaan` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `hak` enum('perusahaan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_costumer`
--

INSERT INTO `tb_costumer` (`kd_costumer`, `username`, `email`, `password`, `perusahaan`, `no_tlp`, `hak`) VALUES
('CTR20180426075843', 'fullsnackdev\r\n', 'afrizaldea@gmail.com', 'e68135b0bbc4ef18e9e673dbe79501a2b732a9d2', 'fullsnack', '1234', 'perusahaan'),
('CTR20180426093417', 'magangbdv', 'magang@bdv.com', 'e68135b0bbc4ef18e9e673dbe79501a2b732a9d2', 'magang', '1234', 'perusahaan'),
('CTR20180427055725', 'bdv', 'bdv@bdv.bdv', 'e68135b0bbc4ef18e9e673dbe79501a2b732a9d2', 'bdv', '123', 'perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_d_costumer`
--

CREATE TABLE `tb_d_costumer` (
  `kd_costumer` varchar(30) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `no_tlp` varchar(16) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_d_costumer`
--

INSERT INTO `tb_d_costumer` (`kd_costumer`, `username`, `nama_perusahaan`, `no_tlp`, `alamat`) VALUES
('CTR20180426075843', 'fullsnackdev', 'fullsnack', '123456', 'BUBAT 12234'),
('CTR20180426093417', 'magangbdv', 'magang', '123451263', 'gba'),
('CTR20180427055725', 'bdv', 'bdv', '12346', 'gerlong');

-- --------------------------------------------------------

--
-- Table structure for table `tb_d_user`
--

CREATE TABLE `tb_d_user` (
  `kd_user` varchar(50) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `biografi` text NOT NULL,
  `pendidikan` varchar(255) NOT NULL,
  `jurusan` varchar(255) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `no_baju` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `no_rekening` int(30) NOT NULL,
  `sertifikasi` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_d_user`
--

INSERT INTO `tb_d_user` (`kd_user`, `first_name`, `last_name`, `biografi`, `pendidikan`, `jurusan`, `no_tlp`, `no_baju`, `bank`, `no_rekening`, `sertifikasi`, `foto`) VALUES
('USR001', '', '', '', '', '', '', '', '', 0, '', ''),
('USR20180427051623', '', 'afrizalf', '', '', '', '', '', '', 0, '', 'Playful_Etsy_Shop_Icon.png'),
('USR20180427051907', '', '', '', '', '', '', '', '', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ktp`
--

CREATE TABLE `tb_ktp` (
  `kd_user` varchar(255) NOT NULL,
  `NIK` int(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_ktp`
--

INSERT INTO `tb_ktp` (`kd_user`, `NIK`, `foto`) VALUES
('USR20180427051623', 1234123, 'Photo_on_10-04-18_at_06_516.jpg'),
('USR20180427051907', 123412344, 'Photo_on_10-04-18_at_06_49.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_passport`
--

CREATE TABLE `tb_passport` (
  `kd_user` varchar(255) NOT NULL,
  `Passport` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `kd_program` varchar(255) NOT NULL,
  `nama_organisasi` varchar(255) NOT NULL,
  `deskripsi_singkat` text NOT NULL,
  `deskripsi` text NOT NULL,
  `informasi_target` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `nama_aplikasi` varchar(255) NOT NULL,
  `kd_costumer` varchar(255) NOT NULL,
  `status` enum('ya','tidak','tolak') NOT NULL,
  `baca` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`kd_program`, `nama_organisasi`, `deskripsi_singkat`, `deskripsi`, `informasi_target`, `foto`, `nama_aplikasi`, `kd_costumer`, `status`, `baca`) VALUES
('APK20180426092634', 'fullsnack', 'bebebe', '                                            <p>\r\n                                                <font color=\"#424242\">\r\n    </font>&nbsp;&nbsp;&nbsp;&nbsp;<font color=\"#424242\">Gunakan ruang ini untuk membicarakan tentang program dan target - cobalah untuk membingkai konteks dari apa yang akan diuji oleh peneliti. Bayangkan Anda adalah penguji, melihat halaman ini (dan target Anda) untuk pertama kalinya - informasi apa yang ingin / perlu Anda lihat? (misalnya \"Untuk program ini, kami mengundang para peneliti untuk menguji aplikasi front-end store dan back-end management kami. Aplikasi ini dibangun di atas teknologi XYZ dan digunakan oleh pengguna untuk melakukan ABC. Tujuan kami dengan program ini adalah memastikan bahwa pelanggan dan karyawan kami menggunakan platform aman yang bebas dari kerentanan keamanan. \")\r\n                                            </font></p><font color=\"#424242\">\r\n    <br>\r\n    ------\r\n    <br>\r\n    <b>Hadiah</b>\r\n    <br>\r\n    ```<br>\r\n    P1: 500 - 1000 Point<br>\r\n    P2: 350 - 450 Point<br>\r\n    P3: 100 - 300 Point<br>\r\n    P4: 15 - 80 Point<br>\r\n    P5: 1 - 10 Point <br>\r\n    ```</font>\r\n    ', '12312', 'foto1524727594', 'fullsnack', 'CTR20180426075843', 'ya', 'belum'),
('APK20180430154635', 'fullsnack', 'android aplikasi rusak', '                                            <p><font color=\"#424242\"><span style=\"caret-color: rgb(66, 66, 66);\">apa aja terserah</span></font></p>', 'api', 'foto1525095995', 'fullsnack droid', 'CTR20180426075843', 'ya', 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program_submit`
--

CREATE TABLE `tb_program_submit` (
  `no` int(11) NOT NULL,
  `kd_program` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kd_user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `keparahan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `URL` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Deskripsi` text COLLATE utf8_unicode_ci NOT NULL,
  `permintaan_http` text COLLATE utf8_unicode_ci,
  `attachment` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `komentar` text COLLATE utf8_unicode_ci,
  `status_terima` enum('iya','tidak') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'tidak',
  `konfirmasi` enum('iya','tidak') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_program_submit`
--

INSERT INTO `tb_program_submit` (`no`, `kd_program`, `kd_user`, `info`, `target`, `keparahan`, `URL`, `Deskripsi`, `permintaan_http`, `attachment`, `komentar`, `status_terima`, `konfirmasi`) VALUES
(3, 'APK20180426092634', 'USR20180427051623', 'jos', '12312', 'Insecure Data Storage', 'http://localhost/api', 'ini rusak bro', NULL, '', NULL, 'tidak', 'iya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sim`
--

CREATE TABLE `tb_sim` (
  `kd_user` varchar(255) NOT NULL,
  `no_sim` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_target`
--

CREATE TABLE `tb_target` (
  `kd_program` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `platform` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tb_target`
--

INSERT INTO `tb_target` (`kd_program`, `target`, `platform`) VALUES
('APK20180410075055', 'asset', 'Android'),
('APK20180410112136', 'ssl', 'Android'),
('APK20180410112559', 'directory', 'API'),
('APK20180410112644', 'iosapps', 'IOS'),
('APK20180416141945', 'app', 'Android'),
('APK20180416144354', 'asset', 'Android');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `kd_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `score` int(11) NOT NULL,
  `hak` enum('Admin','Researcher') NOT NULL,
  `baca` enum('sudah','belum') NOT NULL,
  `status_email` enum('1','0') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`kd_user`, `username`, `password`, `email`, `score`, `hak`, `baca`, `status_email`) VALUES
('USR001', 'admin', 'admin', 'admin@admin.admin', 0, 'Admin', 'belum', '1'),
('USR20180427051623', 'afrizal', 'e68135b0bbc4ef18e9e673dbe79501a2b732a9d2', 'afrizaldea@gmail.com', 15, 'Researcher', 'belum', '1'),
('USR20180427051907', 'dea', 'e68135b0bbc4ef18e9e673dbe79501a2b732a9d2', 'afrizaldea94@gmail.com', 0, 'Researcher', 'belum', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_verifikasi`
--

CREATE TABLE `tb_verifikasi` (
  `kd_user` varchar(255) NOT NULL,
  `no_sim` varchar(255) DEFAULT NULL,
  `NIK` varchar(255) DEFAULT NULL,
  `Passport` varchar(255) DEFAULT NULL,
  `status` enum('aktif','tidak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_verifikasi`
--

INSERT INTO `tb_verifikasi` (`kd_user`, `no_sim`, `NIK`, `Passport`, `status`) VALUES
('USR001', NULL, NULL, NULL, 'aktif'),
('USR20180427051623', NULL, '1234123', NULL, 'tidak'),
('USR20180427051907', NULL, '123412344', NULL, 'tidak');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_number` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `test_name` int(11) NOT NULL,
  `test_valid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_costumer`
--
ALTER TABLE `tb_costumer`
  ADD PRIMARY KEY (`kd_costumer`);

--
-- Indexes for table `tb_d_costumer`
--
ALTER TABLE `tb_d_costumer`
  ADD PRIMARY KEY (`kd_costumer`),
  ADD UNIQUE KEY `no_tlp` (`no_tlp`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tb_d_user`
--
ALTER TABLE `tb_d_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indexes for table `tb_ktp`
--
ALTER TABLE `tb_ktp`
  ADD PRIMARY KEY (`kd_user`),
  ADD UNIQUE KEY `NIK` (`NIK`);

--
-- Indexes for table `tb_passport`
--
ALTER TABLE `tb_passport`
  ADD PRIMARY KEY (`kd_user`),
  ADD UNIQUE KEY `Passport` (`Passport`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`kd_program`);

--
-- Indexes for table `tb_program_submit`
--
ALTER TABLE `tb_program_submit`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tb_sim`
--
ALTER TABLE `tb_sim`
  ADD PRIMARY KEY (`kd_user`),
  ADD UNIQUE KEY `no_sim` (`no_sim`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`kd_user`);

--
-- Indexes for table `tb_verifikasi`
--
ALTER TABLE `tb_verifikasi`
  ADD PRIMARY KEY (`kd_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_program_submit`
--
ALTER TABLE `tb_program_submit`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
