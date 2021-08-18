-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2021 at 02:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_diskusi`
--

CREATE TABLE `tb_diskusi` (
  `id` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nama` varchar(100) NOT NULL,
  `diskusi` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_diskusi`
--

INSERT INTO `tb_diskusi` (`id`, `time`, `nama`, `diskusi`) VALUES
(3, '2021-08-12 02:17:23', 'Ghifari Ilham', 'tes pesan'),
(4, '2021-08-12 02:17:28', 'Ghifari Ilham', 'tes pesan kedua'),
(5, '2021-08-12 02:35:26', 'Admin 2', 'Selamat pagi'),
(6, '2021-08-12 07:49:16', 'Ghifari Ilham', 'terakhir'),
(7, '2021-08-17 18:46:23', 'Admin 2', 'tes terakhir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapbarkel`
--

CREATE TABLE `tb_lapbarkel` (
  `id` int(11) NOT NULL,
  `nofrak` varchar(500) NOT NULL,
  `tanggal` varchar(1000) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `namatek` varchar(1000) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tipe` varchar(500) NOT NULL,
  `satuan` varchar(500) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `graf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lapbarkel`
--

INSERT INTO `tb_lapbarkel` (`id`, `nofrak`, `tanggal`, `id_barang`, `namatek`, `nama`, `tipe`, `satuan`, `jumlah`, `keterangan`, `graf`) VALUES
(1, '160821000001', '2021-08-16', 'BR000001', 'Ghifari Ilham', 'Router Nokia', 'ONT', 'BH', 10, 'Pasang Baru', 1),
(2, '160821000001', '2021-08-16', 'BR000002', 'Ghifari Ilham', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Pasang Baru', 1),
(3, '160821000002', '2021-08-16', 'BR000001', 'Ghifari Ilham', 'Router Nokia', 'ONT', 'BH', 10, 'Pasang Baru', 1),
(4, '160821000002', '2021-08-16', 'BR000002', 'Ghifari Ilham', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Pasang Baru', 1),
(5, '160821000003', '2021-08-16', 'BR000001', 'Ghifari Ilham', 'Router Nokia', 'ONT', 'BH', 10, 'Pasang Baru', 1),
(6, '160821000003', '2021-08-16', 'BR000002', 'Ghifari Ilham', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Pasang Baru', 1),
(7, '160821000004', '2021-08-16', 'BR000001', 'Ghifari Ilham', 'Router Nokia', 'ONT', 'BH', 10, 'Pasang Baru', 1),
(8, '160821000004', '2021-08-16', 'BR000002', 'Ghifari Ilham', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Pasang Baru', 1),
(9, '160821000005', '2021-08-16', 'BR000001', 'Ghifari Ilham', 'Router Nokia', 'ONT', 'BH', 10, 'Pasang Baru', 1),
(10, '160821000005', '2021-08-16', 'BR000002', 'Ghifari Ilham', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Pasang Baru', 1),
(11, '160821000006', '2021-08-16', 'BR000001', 'Ghifari Ilham', 'Router Nokia', 'ONT', 'BH', 10, 'Pasang Baru', 1),
(12, '160821000006', '2021-08-16', 'BR000002', 'Ghifari Ilham', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Pasang Baru', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lapbarmas`
--

CREATE TABLE `tb_lapbarmas` (
  `id` int(11) NOT NULL,
  `tanggal` varchar(1000) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tipe` varchar(500) NOT NULL,
  `satuan` varchar(500) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `pengirim` varchar(1000) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `graf` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lapbarmas`
--

INSERT INTO `tb_lapbarmas` (`id`, `tanggal`, `id_barang`, `nama`, `tipe`, `satuan`, `jumlah`, `pengirim`, `keterangan`, `graf`) VALUES
(1, '2021-08-15', 'BR000002', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Vendor', 'Barang baru', 1),
(2, '2021-08-16', 'BR000001', 'Router Nokia', 'ONT', 'BH', 10, 'Vendor', 'Barang baru', 1),
(3, '2021-08-16', 'BR000002', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Vendor', 'Barang baru', 1),
(4, '2021-08-16', 'BR000001', 'Router Nokia', 'ONT', 'BH', 10, 'Vendor', 'pengadaan', 1),
(5, '2021-08-16', 'BR000002', 'SetTopBox ZTE', 'STB', 'BH', 10, 'Vendor', 'pengadaan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_material`
--

CREATE TABLE `tb_material` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(20) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tipe` varchar(500) NOT NULL,
  `satuan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_material`
--

INSERT INTO `tb_material` (`id`, `id_barang`, `nama`, `tipe`, `satuan`) VALUES
(1, 'BR000001', 'Router Nokia', 'ONT', 'BH'),
(2, 'BR000002', 'SetTopBox ZTE', 'STB', 'BH');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `menu` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `id_menu`, `menu`) VALUES
(1, 1, 'Dashboard'),
(2, 2, 'Pengadaan'),
(3, 3, 'Transaksi'),
(4, 4, 'Laporan'),
(5, 5, 'Data_gudang'),
(6, 6, 'Administrator'),
(7, 7, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengumuman`
--

CREATE TABLE `tb_pengumuman` (
  `id` int(11) NOT NULL,
  `pengumuman` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_satuan`
--

CREATE TABLE `tb_satuan` (
  `id` int(11) NOT NULL,
  `satuan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_satuan`
--

INSERT INTO `tb_satuan` (`id`, `satuan`) VALUES
(1, 'BH'),
(2, 'METER');

-- --------------------------------------------------------

--
-- Table structure for table `tb_stokgudang`
--

CREATE TABLE `tb_stokgudang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(200) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `tipe` varchar(500) NOT NULL,
  `satuan` varchar(500) NOT NULL,
  `whjember` int(11) NOT NULL,
  `soinvjemkotin` int(11) NOT NULL,
  `soinvjemkotout` int(11) NOT NULL,
  `soinvjember` int(11) NOT NULL,
  `soinvtguin` int(11) NOT NULL,
  `soinvtguout` int(11) NOT NULL,
  `soinvgen` int(11) NOT NULL,
  `soinvbwi` int(11) NOT NULL,
  `soinvbws` int(11) NOT NULL,
  `soinvsit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_stokgudang`
--

INSERT INTO `tb_stokgudang` (`id`, `id_barang`, `nama`, `tipe`, `satuan`, `whjember`, `soinvjemkotin`, `soinvjemkotout`, `soinvjember`, `soinvtguin`, `soinvtguout`, `soinvgen`, `soinvbwi`, `soinvbws`, `soinvsit`) VALUES
(1, 'BR000001', 'Router Nokia', 'ONT', 'BH', 100, 200, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'BR000002', 'SetTopBox ZTE', 'STB', 'BH', 100, 200, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipe`
--

CREATE TABLE `tb_tipe` (
  `id` int(11) NOT NULL,
  `tipe` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tipe`
--

INSERT INTO `tb_tipe` (`id`, `tipe`) VALUES
(1, 'ONT'),
(2, 'STB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password2` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `gudang` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `alamat` varchar(1000) NOT NULL,
  `telpon` varchar(50) NOT NULL,
  `id_wilayah` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `password`, `password2`, `nama`, `nik`, `gudang`, `foto`, `alamat`, `telpon`, `id_wilayah`, `role`, `is_active`) VALUES
(0, 'admin0@telkom.com', '$2y$10$JgMGGvFvM9DOhsNvEXGwbuvvKFLLX2Es5XfiQTO3UbQlyookeBdGi', 'gh123456', 'Ghifari Ilham', 'E32181989', 'Mangli', 'download.jpg', 'Perum. BMP Mangli', '0881xxxxx', 1, 1, 1),
(2, 'admin2@telkom.com', '$2y$10$G5K3jqXAfZ33Pva4YZn.O.1WTcpnDkeRtSTVZtUWcGesBI4d91w/W', 'admin2', 'Admin 2', '00000002', 'SO INV JEMBER KOTA IN', 'default.jpg', '', '', 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_useraccess`
--

CREATE TABLE `tb_useraccess` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_useraccess`
--

INSERT INTO `tb_useraccess` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(5, 1, 6),
(6, 1, 7),
(7, 2, 1),
(8, 2, 2),
(9, 2, 3),
(10, 2, 5),
(11, 2, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_diskusi`
--
ALTER TABLE `tb_diskusi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lapbarkel`
--
ALTER TABLE `tb_lapbarkel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lapbarmas`
--
ALTER TABLE `tb_lapbarmas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_material`
--
ALTER TABLE `tb_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_stokgudang`
--
ALTER TABLE `tb_stokgudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tipe`
--
ALTER TABLE `tb_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_useraccess`
--
ALTER TABLE `tb_useraccess`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_diskusi`
--
ALTER TABLE `tb_diskusi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_lapbarkel`
--
ALTER TABLE `tb_lapbarkel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_lapbarmas`
--
ALTER TABLE `tb_lapbarmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_material`
--
ALTER TABLE `tb_material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_pengumuman`
--
ALTER TABLE `tb_pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_satuan`
--
ALTER TABLE `tb_satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_stokgudang`
--
ALTER TABLE `tb_stokgudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_tipe`
--
ALTER TABLE `tb_tipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_useraccess`
--
ALTER TABLE `tb_useraccess`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
