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
-- Database: `seller`
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
  `stok` int(5) NOT NULL,
  `id_kategori` int(3) NOT NULL,
  `id_penjual` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_buku`, `judul_buku`, `harga_buku`, `informasi_buku`, `url_buku`, `gambar_buku`, `stok`, `id_kategori`, `id_penjual`) VALUES
(1, 'Buku Mahir Web Programming', 90000, 'Kategori(Sub): Komputer (Pemrograman) ISBN: 978-979-29-3963-7 Penulis: WAHANA KOMPUTER Ukuran⁄Halaman: 16x23 cm² ⁄ viii+268 halaman Edisi⁄Cetakan: I, 1st Published Tahun Terbit: 2013\r\n\r\nVisual Basic 2012 merupakan bahasa pemrograman yang paling populer di dunia komputer. Beraneka ragam program dapat dibuat dengan program ini. Mempelajari pemrograman di Visual Basic akan membuat Anda memiliki paradigma yang luas sebagai programmer yang dituntut harus serba bisa, di samping untuk selalu meningkatkan kemampuan dalam bidang IT. Pada buku ini dibahas dasar memanfaatkan Visual Basic 2012 untuk membangun beragam aplikasi berbasis Windows. Dengan memanfaatkan materi yang ada di buku ini, diharapkan pengguna yang masih pemula atau yang memiliki pengetahuan dasar tentang Visual Basic bisa memanfaatkan fitur-fitur Visual Basic 2012. Diharapkan juga pembaca bisa membuat program aplikasi sendiri sesuai bidang yang digeluti dengan mengembangkan lebih lanjut berbagai latihan yang sudah dipelajari dar', 'buku-mahir-web-programming', 'buku1.jpg', 10, 3, '2'),
(2, 'Panen Maksimal Budidaya Lele Unggulan', 50000, 'buku lele yang sangat bagus untuk dimiliki oleh para peternak lele yang akan memulai bisnisnya agar bisa mengetahui lebih baik bagaiman cara membuat usaha peternakan lele yang baik dan benar dengan cara yang baik dan benar pula.', 'panen-maksimal-budidaya-lele-unggulan', 'buku4.jpg', 10, 0, '2'),
(4, '4 Langkah Anti Gagal Dalam Menemukan Ide & Peluang', 64900, 'Buku yang sangat informatif untuk menentukan langkah dalam mencari peluang bisnis, tentang bagaimana awal dari memulai sebuah bisnis dengan cara yang benar  dan langkah-langkah yang benar ketika bisnis sudah dibangun.', '4-Langkah-Anti-Gagal-Dalam-Menemukan-Ide-Peluang', 'buku5.jpg', 95, 0, '3'),
(5, 'Komik Goblin Slayer: Brand New Day', 49000, 'Buku yang menceritakan lanjutan dari petualangan seorang yang memanggil dirinya seorang goblin slayer setelah sebelumnya sudah membalaskan dendamnya dengan membunuh raja goblin yang menghancurkan desanya.', 'komik-goblin-slayer-brand-new-day', 'komik1.jpg', 50, 0, '3'),
(17, 'Manga Sword Art Online: Project Alicization', 60000, 'Manga tentang peluangan kirito dalam underworld untuk menyelamatkan para manusia proyek dari suatu game !!!', 'sword-art-online-project-alicization', 'Project_Alicization_Manga_Vol_1_Cover.png', 300, 0, '2'),
(34, 'Novel Boruto Volume 5', 10000, 'Manga tentang petualangan baru dari seri naruto yang dilanjutkan oleh generasi berikutnya yaitu boruto !!!', 'novel-boruto-volume-5', 'boruto.jpg', 100, 1, '2'),
(35, 'Manga Fairy Tale 46-63', 50000, 'wow wow\r\n\r\nwkwkwk\r\n\r\n\r\nkwkwkwkw', 'manga-fairy-tale-46-63', 'fairy.jpg', 100, 1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komik'),
(2, 'Novel'),
(3, 'Buku Edukasi');

-- --------------------------------------------------------

--
-- Table structure for table `penjual`
--

CREATE TABLE `penjual` (
  `id_penjual` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat_toko` varchar(200) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penjual`
--

INSERT INTO `penjual` (`id_penjual`, `nama_toko`, `alamat_toko`, `user_id`) VALUES
(1, 'Lumina Store', 'bekasi sawangan', 1),
(2, 'Javabow Store', 'BSI 2 Blok G', 11),
(3, 'lalana store', 'BSI 2 Blok G', 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `penjual`
--
ALTER TABLE `penjual`
  ADD PRIMARY KEY (`id_penjual`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penjual`
--
ALTER TABLE `penjual`
  MODIFY `id_penjual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
