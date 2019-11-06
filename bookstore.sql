-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2019 at 01:28 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(70) NOT NULL,
  `harga_buku` int(11) NOT NULL,
  `informasi_buku` varchar(1000) NOT NULL,
  `url_buku` varchar(70) NOT NULL,
  `gambar_buku` varchar(70) NOT NULL,
  `id_penjual` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_buku`, `judul_buku`, `harga_buku`, `informasi_buku`, `url_buku`, `gambar_buku`, `id_penjual`) VALUES
(1, 'Buku Mahir Web Programming', 90000, 'Kategori(Sub): Komputer (Pemrograman) ISBN: 978-979-29-3963-7 Penulis: WAHANA KOMPUTER Ukuran⁄Halaman: 16x23 cm² ⁄ viii+268 halaman Edisi⁄Cetakan: I, 1st Published Tahun Terbit: 2013\r\n\r\nVisual Basic 2012 merupakan bahasa pemrograman yang paling populer di dunia komputer. Beraneka ragam program dapat dibuat dengan program ini. Mempelajari pemrograman di Visual Basic akan membuat Anda memiliki paradigma yang luas sebagai programmer yang dituntut harus serba bisa, di samping untuk selalu meningkatkan kemampuan dalam bidang IT. Pada buku ini dibahas dasar memanfaatkan Visual Basic 2012 untuk membangun beragam aplikasi berbasis Windows. Dengan memanfaatkan materi yang ada di buku ini, diharapkan pengguna yang masih pemula atau yang memiliki pengetahuan dasar tentang Visual Basic bisa memanfaatkan fitur-fitur Visual Basic 2012. Diharapkan juga pembaca bisa membuat program aplikasi sendiri sesuai bidang yang digeluti dengan mengembangkan lebih lanjut berbagai latihan yang sudah dipelajari dar', 'buku-mahir-web-programming', 'buku1.jpg', '1'),
(2, 'Panen Maksimal Budidaya Lele Unggulan', 50000, 'buku lele yang sangat bagus untuk dimiliki oleh para peternak lele yang akan memulai bisnisnya agar bisa mengetahui lebih baik bagaiman cara membuat usaha peternakan lele yang baik dan benar dengan cara yang baik dan benar pula.', 'panen-maksimal-budidaya-lele-unggulan', 'buku4.jpg', '2'),
(3, 'The Shortcut of Matlab Programming', 100000, 'Buku yang sangat bagus untuk mempelajari bahasa pemrograman matlab dimana kebanyakan digunakan untuk memproses data-data untuk keperluan data scientist', 'the-shortcut-of-matlab-programming', 'buku2.jpg', '2'),
(4, '4 Langkah Anti Gagal Dalam Menemukan Ide & Peluang', 64900, 'Buku yang sangat informatif untuk menentukan langkah dalam mencari peluang bisnis, tentang bagaimana awal dari memulai sebuah bisnis dengan cara yang benar  dan langkah-langkah yang benar ketika bisnis sudah dibangun.', '4-langkah-anti-gagal-dalam-menemukan-ide-peluang-bisnis', 'buku5.jpg', '3'),
(5, 'Komik Goblin Slayer: Brand New Day', 49000, 'Buku yang menceritakan lanjutan dari petualangan seorang yang memanggil dirinya seorang goblin slayer setelah sebelumnya sudah membalaskan dendamnya dengan membunuh raja goblin yang menghancurkan desanya.', 'komik-goblin-slayer-brand-new-day', 'komik1.jpg', '4');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `id_user` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `id_user`) VALUES
(1, 11),
(2, 14),
(3, 15),
(4, 20);

-- --------------------------------------------------------

--
-- Table structure for table `cart_detail`
--

CREATE TABLE `cart_detail` (
  `cart_detail_id` int(11) NOT NULL,
  `cart_id` int(10) NOT NULL,
  `id_penjual` int(10) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `total_harga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_detail`
--

INSERT INTO `cart_detail` (`cart_detail_id`, `cart_id`, `id_penjual`, `id_buku`, `qty`, `total_harga`) VALUES
(22, 2, 2, 2, 2, 100000),
(25, 2, 1, 1, 1, 90000),
(26, 2, 3, 4, 1, 64900),
(31, 3, 3, 4, 2, 129800),
(33, 4, 4, 5, 2, 98000),
(37, 1, 3, 5, 1, 49000),
(38, 1, 2, 35, 1, 50000),
(39, 1, 2, 1, 1, 90000);

-- --------------------------------------------------------

--
-- Table structure for table `codeigniter_register`
--

CREATE TABLE `codeigniter_register` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  `verification_key` varchar(250) NOT NULL,
  `is_email_verified` enum('no','yes') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codeigniter_register`
--

INSERT INTO `codeigniter_register` (`id`, `name`, `email`, `password`, `verification_key`, `is_email_verified`) VALUES
(1, 'aaa', 'jaajaja@gmail.com', 'BzoNMQUx', 'cb73ff175bce29ca71aaa5f8ec94c88d', 'no'),
(2, 'aaaa', 'dika1k5@gmail.com', 'AG1dMgdh', '2c792a1dfb46f4a68e3fd6e8b6b380ba', 'no'),
(3, 'aaa', 'aaa@aaa.com', 'V2peYlZi', 'e656bdd4ec2111eff0f66b9dc7f68670', 'no'),
(4, 'jajaja', 'aaa@gmail.com', 'XWdbZwEmVWpSNgBtVGUNZAU4U2c=', 'e659cf75e3e23406884d4307301d84f7', 'no'),
(5, 'jajaja', 'jaja@gmail.com', 'VDkNYlA2VjVTYw==', '30ff461543772f80c8ea589550a16bde', 'no'),
(6, 'aaaa', 'dika1k10@gmail.com', 'XGENMQ05BzE=', '279dbb98e66c2cd9059453a995fed475', 'no'),
(7, 'aaaa', 'wkwk@gmail.com', 'BjddYQE6ADAFYQ==', '7fdffc7598017bca3b7c9da696b0489d', 'no'),
(8, 'aaaa', 'kwokwokwok@gmail.com', 'UGReYlVoUGY=', '9526bb651e2ed686816766ad8da67ca7', 'no'),
(9, 'joko', 'joko123@gmail.com', 'VWMBMwA+XmY=', 'c3e0a7ac9536bd05a34184267c549940', 'no'),
(10, 'www', 'wwww@gmail.com', 'UWcMMAc4AjRTPANhBDsAYQ==', 'd45ef5c77c46cae82c6f7ac07a9f6f7c', 'no'),
(11, 'Hilmi Farhandika', 'farhandika@gmail.com', 'V2MKPgQ9AzlQPA==', '4c88b80c0296424eb4d4b1d97820832d', 'yes'),
(12, 'joko', '1@gmail.com', 'XTBbNFI0', '856bd69774f8e507d88194fe857363f3', 'no'),
(13, 'belalang', 'belalang@gmail.com', 'XTAJZlUzVTZTYwA1', '9ff9f955b717f45a9a3317ca2d247657', 'no'),
(14, 'Anwar Setiawan', 'anwar@gmail.com', 'XTABblUz', '1ecba73a046816e683927e8934075077', 'yes'),
(15, 'Bunga', 'bunga@gmail.com', 'Uz5eMQNl', 'ebdf466d5f5656bff551f3bbbd91a0da', 'no'),
(16, 'aaaa', 'farhandika123@gmail.com', 'AD0MMAA0', 'e0602a209b51f089e2a95f151a6608f1', 'no'),
(17, 'mIASC', 'pyPZx', 'UkRcSQc1UGgCRA==', 'sucpr', 'no'),
(18, 'nvCoi', 'bSdTB', 'UWAAPFZbXl9UOQ==', 'vuEtd', 'no'),
(19, 'QXYkm', 'HskGZ', 'UHYANwMEUGBXKg==', 'LCEaZ', 'no'),
(20, 'javabow', 'javabow@gmail.com', 'BmtZNlA2', 'ee7a382d4a4fdb35b6bbf29844bc9df4', 'no'),
(21, 'uwu', 'uwu@uwu.com', 'XHVZc1d3', '5584275d234f7726ed7a8824ba9758b8', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id_detail` int(11) NOT NULL,
  `alamat_user` varchar(150) NOT NULL,
  `kodepos_user` varchar(6) NOT NULL,
  `nomorhp_user` varchar(15) NOT NULL,
  `jk_user` varchar(2) NOT NULL,
  `user_tl` varchar(20) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id_detail`, `alamat_user`, `kodepos_user`, `nomorhp_user`, `jk_user`, `user_tl`, `user_id`) VALUES
(9, 'wkowkwokowkw', '15116', '082277165445', '2', '12 oktober 1990', 15),
(11, 'BSI 2 Blok G no.66 Sawangan, Depok Jawa Barat', '19999', '082299158338', '1', '26 februari 1999', 11),
(12, 'Bekasi baru, planet mars', '19999', '082277165445', '1', '12 oktober 1990', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_detail_id`);

--
-- Indexes for table `codeigniter_register`
--
ALTER TABLE `codeigniter_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_detail`
--
ALTER TABLE `cart_detail`
  MODIFY `cart_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `codeigniter_register`
--
ALTER TABLE `codeigniter_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
