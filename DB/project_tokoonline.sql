-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 06:41 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_tokoonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(100) NOT NULL,
  `admin_username` varchar(100) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_nama`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'Indra Rahmawan', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1352025327_avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_nama` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_hp` varchar(20) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_nama`, `customer_email`, `customer_hp`, `customer_alamat`, `customer_password`) VALUES
(3, 'Ahmad Jhony', 'jhony@gmail.com', '0927883733', 'jala sdjasl', '91ec1f9324753048c0096d036a694f86'),
(5, 'Jamaika Bob', 'jamaika@gmail.com', '08262122771', 'jalan rasta uye nomor 1', '91ec1f9324753048c0096d036a694f86'),
(6, 'Rosalina', 'rosalina@gmail.com', '082827287', 'jalan meruakaja', '91ec1f9324753048c0096d036a694f86'),
(7, 'suleha alala', 'suleha@gmail.com', '982737383737', 'sasdkajndkasjdn', 'ae2831cce9ac4de6a703a728f26cc07b'),
(8, 'INDRA RAHMAWAN', 'indrar0104@gmail.com', '081382789716', 'Jl. Daan Mogot Raya No.25-171 KM.21 (Samping CV.JAPAINDO), Kel. Batu Ceper, Kec. Batu Ceper, Kota Tangerang 15122', '7142293118beb4ced6d421af32c4bbfa');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_tanggal` date NOT NULL,
  `invoice_customer` int(11) NOT NULL,
  `invoice_nama` varchar(255) NOT NULL,
  `invoice_hp` varchar(255) NOT NULL,
  `invoice_alamat` text NOT NULL,
  `invoice_provinsi` varchar(255) NOT NULL,
  `invoice_kabupaten` varchar(255) NOT NULL,
  `invoice_kurir` varchar(255) NOT NULL,
  `invoice_berat` int(11) NOT NULL,
  `invoice_ongkir` int(11) NOT NULL,
  `invoice_total_bayar` int(11) NOT NULL,
  `invoice_status` int(11) NOT NULL,
  `invoice_resi` varchar(255) NOT NULL,
  `invoice_bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `invoice_tanggal`, `invoice_customer`, `invoice_nama`, `invoice_hp`, `invoice_alamat`, `invoice_provinsi`, `invoice_kabupaten`, `invoice_kurir`, `invoice_berat`, `invoice_ongkir`, `invoice_total_bayar`, `invoice_status`, `invoice_resi`, `invoice_bukti`) VALUES
(5, '2019-06-13', 5, 'Jamaika / Ibu ida', '9828272723', 'JL. makmur no.17 , rumahw arna putih', '1', '1', 'JNE', 300, 24000, 960000, 0, '', ''),
(6, '2019-06-13', 5, 'Jamaika Bob', '08272263637', 'Jalan Pentolan Nomor 1C, Rasta mania', 'Maluku', 'Maluku Tenggara', 'JNE - OKE', 300, 108000, 808500, 3, '', '577813088.jpg'),
(7, '2019-06-14', 6, 'Rosalina / Ibu Ros', '08282723833', 'jalan mewawaw nomor 34 A. Komplek Pertamburan,', 'Kalimantan Utara', 'Nunukan', 'Pos Indonesia - Paket Kilat Khusus', 200, 71500, 351500, 5, '', '2001382847.jpg'),
(8, '2019-07-25', 7, 'Suleha', '0897273737383', 'jalan merpati putih nomor 21, surabaya', 'Banten', 'Pandeglang', 'Pos Indonesia - Paket Kilat Khusus', 200, 13000, 353000, 5, '', '1048853755.jpg'),
(9, '2019-11-04', 8, 'INDRA RAHMAWAN', '081382789716', 'CV. JAPAINDO, Jl. Poris Indah Raya No.120, RT.003/RW.010, Cipondoh Indah, Kec. Cipondoh, Kota Tangerang, Banten 15148', 'Banten', 'Tangerang', 'JNE - OKE', 100, 8000, 88000, 3, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Tidak Berkategori'),
(3, 'Baju'),
(4, 'Celana'),
(5, 'Tas Selempang'),
(6, 'Sepatu'),
(7, 'Celana Pendek'),
(8, 'Jaket'),
(9, 'Aksesoris');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `produk_id` int(11) NOT NULL,
  `produk_nama` varchar(255) NOT NULL,
  `produk_kategori` int(11) NOT NULL,
  `produk_harga` int(11) NOT NULL,
  `produk_keterangan` text NOT NULL,
  `produk_jumlah` int(11) NOT NULL,
  `produk_berat` int(11) NOT NULL,
  `produk_foto1` varchar(255) DEFAULT NULL,
  `produk_foto2` varchar(255) DEFAULT NULL,
  `produk_foto3` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`produk_id`, `produk_nama`, `produk_kategori`, `produk_harga`, `produk_keterangan`, `produk_jumlah`, `produk_berat`, `produk_foto1`, `produk_foto2`, `produk_foto3`) VALUES
(6, 'Celana Tenun Dingin', 4, 200000, 'Sangat cocok untuk yang ingin tampil cantik. tersedia ukuran xl, xlx<br>', 10, 100, '1677114666_02274f49979c5062b85f01fbd51b256b.jpg', '1677114666_celana-tenun-asli-nusantara-001.jpg', '1677114666_celana-tenun-asli-nusantara-0016.jpg'),
(7, 'Sepatu Tenun Cantik', 6, 240000, '<p>Bla bla bla silahkan isi deskripsi keterangannya di sini<br></p>', 30, 100, '1902776456_3527635_670cf55c-fb40-4409-890a-4b7fa528cae1_1280_1280.jpg', '1902776456_sepatu_oke_210.jpg', ''),
(8, 'Baju Tenun Motif Baru', 3, 80000, '<p>Keren bla bla<br></p>', 2, 100, '1716291419_0_cba4a579-4fd2-41e4-9385-fb2d943ef134_720_701.jpg', '', ''),
(9, 'Celana Aladin Kain Tenun', 4, 300500, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 4, 200, '986206747_CT84_2U.jpg', '986206747_CT83_1.jpg', ''),
(10, 'Celana Tenun Cewek Berkualitas', 4, 400000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 4, 100, '1517011641_CT82_1U.jpg', '', ''),
(11, 'Kain Tenun Untuk Baju', 3, 80000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 20, 100, '611138101_Bahan_Pakaian_Tenun_Kain_Tenun_Ikat_Bali_CSM_05.jpg', '', ''),
(12, 'Baju Daster Tenun', 3, 120000, '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore mag Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum. na aliqua. Ut enim ad minim veniam,<br>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br>cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br>proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br></p>', 2, 100, '1602884192_Dress_Etnik_Unik_Tenun_Troso_Jepara_Motif_Batik_Toraja.jpg', '1602884192_e3b4e643b1a98e2cdc24fee8202ad381.jpg', ''),
(13, 'Baju daster bahan tenun', 3, 130000, '<p>Sangat cocok untuk dipakai kemana-mana..<br>isi deskripsi produk di <b><i></i></b><i></i>sini<i></i></p>', 20, 100, '1347063537_tenundaster.jpg', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `transaksi_invoice` int(11) NOT NULL,
  `transaksi_produk` int(11) NOT NULL,
  `transaksi_jumlah` int(11) NOT NULL,
  `transaksi_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `transaksi_invoice`, `transaksi_produk`, `transaksi_jumlah`, `transaksi_harga`) VALUES
(1, 0, 3, 1, 120000),
(2, 0, 1, 1, 1234),
(3, 0, 3, 1, 120000),
(4, 0, 1, 1, 1234),
(5, 1, 3, 1, 120000),
(6, 1, 1, 1, 1234),
(9, 3, 3, 1, 120000),
(10, 4, 4, 1, 123000),
(11, 5, 7, 2, 240000),
(12, 5, 8, 1, 80000),
(13, 5, 10, 1, 400000),
(14, 6, 10, 1, 400000),
(15, 6, 9, 1, 300500),
(16, 7, 11, 2, 80000),
(17, 7, 12, 1, 120000),
(18, 8, 13, 2, 130000),
(19, 8, 11, 1, 80000),
(20, 9, 11, 1, 80000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`produk_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `produk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
