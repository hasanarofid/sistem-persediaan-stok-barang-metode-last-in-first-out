-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 29, 2024 at 03:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `username`, `password`, `nama`, `telepon`, `foto`) VALUES
(12, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0812838281', '14062024082728admin.png'),
(19, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user 1', '0812838281', '22092020020520employee3.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_ajuan`
--

CREATE TABLE `tb_ajuan` (
  `no_ajuan` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `val` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_ajuan`
--

INSERT INTO `tb_ajuan` (`no_ajuan`, `tanggal`, `kode_brg`, `nama_brg`, `stok`, `jml_ajuan`, `petugas`, `val`) VALUES
(112, '2020-09-22', '92938', 'Ssd IOS 1 tb', 91, 2, 'Petugas', 1),
(212, '2020-09-22', '92938', 'Ssd IOS 1 tb', 91, 3, 'Petugas', 1),
(222, '2020-09-22', '99105', 'Handphone Maus', 13, 2, 'Petugas', 0),
(224, '2020-09-22', '92938', 'Ssd IOS 1 tb', 91, 2, 'Petugas', 0),
(990, '2020-09-22', '99101', 'Flashdisk 12 gb', 1, 2, 'Kliment Vederov', 0),
(992, '2020-09-19', '99102', 'Handphone Xue hua piao piao', 93, 1, 'Petugas 1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kode_brg` int(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `rak` varchar(255) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kode_brg`, `nama_brg`, `stok`, `rak`, `supplier`, `foto`, `warna`, `size`) VALUES
(1, 'Elega Polo Multicolor Maroon ', 150, '6', '1', 'kaosdefault.jpg', 'Multicolor Maroon', 'M - XXL'),
(2, 'Elega Polo Multicolor misty ', 150, '6', '1', 'kaosdefault.jpg', 'Multicolor Misty', 'M - XXL'),
(3, 'Elega Polo strip dusty pink', 150, '7', '1', 'kaosdefault.jpg', 'dusty pink', 'M - XXL'),
(4, 'Elega Polo strip mineralblue', 150, '7', '1', 'kaosdefault.jpg', 'mineralblue', 'M - XXL'),
(5, 'Elega Polo strip olive', 150, '7', '1', 'kaosdefault.jpg', 'olive', 'M - XXL'),
(6, 'Elega Polo strip tielblue', 150, '7', '1', 'kaosdefault.jpg', 'tielblue', 'M - XXL'),
(7, 'Elega Polo strip navi', 150, '7', '1', 'kaosdefault.jpg', 'navi', 'M - XXL'),
(8, 'Elega Polo strip sage ', 150, '7', '1', 'kaosdefault.jpg', 'sage', 'M - XXL'),
(9, 'Elega Polo strip dark green', 150, '7', '1', 'kaosdefault.jpg', 'darkgreen', 'M - XXL'),
(10, 'Elega Polo strip  maroon', 150, '7', '1', 'kaosdefault.jpg', 'maroon', 'M - XXL'),
(11, 'Elega Polo strip begie', 150, '7', '1', 'kaosdefault.jpg', 'beige', 'M - XXL'),
(12, 'Elega Polo strip almond', 150, '7', '1', 'kaosdefault.jpg', 'almond', 'M - XXL'),
(13, 'Elega Polo strip cream choco', 150, '7', '1', 'kaosdefault.jpg', 'creamchoco', 'M - XXL'),
(14, 'Elega Polo strip coffie', 150, '7', '1', 'kaosdefault.jpg', 'coffee', 'M - XXL'),
(15, 'Elega Polo strip misty', 150, '7', '1', 'kaosdefault.jpg', 'misty', 'M - XXL'),
(16, 'Elega Polo strip dark grey', 150, '7', '1', 'kaosdefault.jpg', 'darkgrey', 'M - XXL'),
(17, 'Elega Polo strip twotone', 150, '7', '1', 'kaosdefault.jpg', 'twotone', 'M - XXL'),
(18, 'Elega Polo strip black', 150, '7', '1', 'kaosdefault.jpg', 'black', 'M - XXL'),
(19, 'Elega Polo strip white', 150, '7', '1', 'kaosdefault.jpg', 'white', 'M - XXL'),
(20, 'Elega Polo dusty pink', 150, '8', '1', 'kaosdefault.jpg', 'dusty pink', 'M - XXL'),
(21, 'Elega Polo mineralblue', 150, '8', '1', 'kaosdefault.jpg', 'mineralblue', 'M - XXL'),
(22, 'Elega Polo olive', 150, '8', '1', 'kaosdefault.jpg', 'olive', 'M - XXL'),
(23, 'Elega Polo tielblue', 150, '8', '1', 'kaosdefault.jpg', 'tielblue', 'M - XXL'),
(24, 'Elega Polo navi', 150, '8', '1', 'kaosdefault.jpg', 'navi', 'M - XXL'),
(25, 'Elega Polo sage ', 150, '8', '1', 'kaosdefault.jpg', 'sage', 'M - XXL'),
(26, 'Elega Polo dark green', 150, '8', '1', 'kaosdefault.jpg', 'darkgreen', 'M - XXL'),
(27, 'Elega Polo maroon', 150, '8', '1', 'kaosdefault.jpg', 'maroon', 'M - XXL'),
(28, 'Elega Polo begie', 150, '8', '1', 'kaosdefault.jpg', 'beige', 'M - XXL'),
(29, 'Elega Polo almond', 150, '8', '1', 'kaosdefault.jpg', 'almond', 'M - XXL'),
(30, 'Elega Polo cream choco', 150, '8', '1', 'kaosdefault.jpg', 'creamchoco', 'M - XXL'),
(31, 'Elega Polo coffie', 150, '8', '1', 'kaosdefault.jpg', 'coffee', 'M - XXL'),
(32, 'Elega Polo misty', 150, '8', '1', 'kaosdefault.jpg', 'misty', 'M - XXL'),
(33, 'Elega Polo dark grey', 150, '8', '1', 'kaosdefault.jpg', 'darkgrey', 'M - XXL'),
(34, 'Elega Polo twotone', 150, '8', '1', 'kaosdefault.jpg', 'twotone', 'M - XXL'),
(35, 'Elega Polo black', 150, '8', '1', 'kaosdefault.jpg', 'black', 'M - XXL'),
(36, 'Elega Polo white', 150, '8', '1', 'kaosdefault.jpg', 'white', 'M - XXL');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_in`
--

CREATE TABLE `tb_barang_in` (
  `id_brg_in` int(11) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `noinv` varchar(11) NOT NULL,
  `supplier` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_masuk` int(11) NOT NULL,
  `jam` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang_in`
--

INSERT INTO `tb_barang_in` (`id_brg_in`, `tanggal`, `noinv`, `supplier`, `kode_brg`, `nama_brg`, `stok`, `jml_masuk`, `jam`, `petugas`) VALUES
(1, '19-12-2002', '1', 'CV. Tes', '22922', 'Kancut', 11, 22, '07.00', 'Budi\r\n'),
(5, '2020-09-19', '001', 'CV.Abadi Sentosa', '99102', 'Handphone Xue hua piao piao', 92, 1, '10:11 am', 'Hibiki Chan <3  >_<'),
(7, '2020-09-19', '001', 'CV.Abadi Sentosa', '99102', 'Handphone Xue hua piao piao', 93, 1, '10:58 am', 'Petugas satu'),
(8, '2020-09-22', '0022', 'CV.Abadi Sentosa', '93333', 'Speaker Diskotik', 22, 9, '07:28 am', 'Petugas'),
(9, '2020-09-22', '121', 'CV Indah Pertiwi', '99101', 'Flashdisk 12 gb', 1, 22, '09:49 am', 'Petugas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang_out`
--

CREATE TABLE `tb_barang_out` (
  `no_brg_out` int(11) NOT NULL,
  `no_ajuan` int(11) NOT NULL,
  `tanggal_ajuan` varchar(255) NOT NULL,
  `tanggal_out` varchar(255) NOT NULL,
  `petugas` varchar(255) NOT NULL,
  `kode_brg` varchar(11) NOT NULL,
  `nama_brg` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jml_ajuan` int(11) NOT NULL,
  `jml_keluar` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telepon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama`, `telepon`) VALUES
(11, 'Abdul', 'e80a0702d314d055d05af996fe60cff9', 'Kliment Vederov', '0812822929'),
(12, 'petugas1', 'd41d8cd98f00b204e9800998ecf8427e', 'Lyudmilla Pavlichenko', '0812838281'),
(14, 'biksu', 'd41d8cd98f00b204e9800998ecf8427e', 'Leonid Budovkin', '0812822929'),
(15, 'viktor', '4e3c1f58d4ace2057d5e18f4a5a478fb', 'Viktor Reznov', '081282939999'),
(16, 'vlad', 'd701fde59d74f76803087b6632186caf', 'Vladimir Vorosilov', '0812838222'),
(17, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'Petugas', '081280328889');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rak`
--

CREATE TABLE `tb_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_rak`
--

INSERT INTO `tb_rak` (`id_rak`, `nama_rak`) VALUES
(6, 'Elega Polo Multicolor'),
(7, 'Elega Polo strip'),
(8, 'Elega Polo Shirt');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sup`
--

CREATE TABLE `tb_sup` (
  `id_sup` int(11) NOT NULL,
  `nama_sup` varchar(255) NOT NULL,
  `kontak_sup` varchar(255) NOT NULL,
  `alamat_sup` text NOT NULL,
  `telepon_sup` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_sup`
--

INSERT INTO `tb_sup` (`id_sup`, `nama_sup`, `kontak_sup`, `alamat_sup`, `telepon_sup`) VALUES
(1, 'bajumaker', 'bajumaker.gmail.com', 'Jl. Pekan 5 , Bandung', '081208828388'),
(2, 'bennie', 'bennie@aman.com', 'JL. Matahari 56, Bandung', '0820283882883');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tb_ajuan`
--
ALTER TABLE `tb_ajuan`
  ADD PRIMARY KEY (`no_ajuan`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kode_brg`);

--
-- Indexes for table `tb_barang_in`
--
ALTER TABLE `tb_barang_in`
  ADD PRIMARY KEY (`id_brg_in`);

--
-- Indexes for table `tb_barang_out`
--
ALTER TABLE `tb_barang_out`
  ADD PRIMARY KEY (`no_brg_out`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_rak`
--
ALTER TABLE `tb_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indexes for table `tb_sup`
--
ALTER TABLE `tb_sup`
  ADD PRIMARY KEY (`id_sup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_ajuan`
--
ALTER TABLE `tb_ajuan`
  MODIFY `no_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=998;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `kode_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_barang_in`
--
ALTER TABLE `tb_barang_in`
  MODIFY `id_brg_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_rak`
--
ALTER TABLE `tb_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_sup`
--
ALTER TABLE `tb_sup`
  MODIFY `id_sup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
