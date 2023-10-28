-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 04:11 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tk4`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `satuan` int(30) NOT NULL,
  `id_pengguna` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `keterangan`, `satuan`, `id_pengguna`) VALUES
(1, 'Sabun cuci', 'sabun cuci 700 gram', 21000, 5),
(2, 'Alat pel', 'alat pel lantai', 30000, 8),
(3, 'Sapu', 'sapu ijuk', 22000, 3),
(4, 'Gelas plastik', 'gelas plastik sedang', 2000, 4),
(5, 'Mie instan kuah rasa soto', 'mie instan rasa soto kuah', 3500, 2),
(6, 'Piring kaca', 'piring makan kaca', 15000, 9),
(7, 'Kipas tangan', 'kipas tangan motif bunga', 20000, 10),
(8, 'sepatu', 'sepatu baru', 32000, 1),
(9, 'Kain lap kanebo', 'kanebo kecil', 18000, 6),
(10, 'Sabun cuci piring', 'sabun cuci piring botol besar', 24000, 7);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(256) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `nama_akses`, `keterangan`) VALUES
(1, 'All [Privileges]', 'Memberikan seluruh hak akses, kecuali GRANT OPTION'),
(2, 'Alter', 'Hak akses untuk mengubah tabel '),
(3, 'Create', 'Hak akses untuk membuat tabel dan database'),
(4, 'Select', 'Hak akses untuk melihat data '),
(5, 'Insert', 'Hak akses untuk menambahkan data '),
(6, 'Drop', 'Hak akses untuk menghapus database, tabel, dan view'),
(7, 'Delete', 'Hak akses untuk menghapus data '),
(8, 'Update', 'Hak akses untuk memperbarui data '),
(9, 'Show Databases', 'Hak akses untuk melihat seluruh database'),
(10, 'Create User', 'Hak akses untuk membuat, menghapus, dan mengubah user');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(10) NOT NULL,
  `nama_pelanggan` varchar(256) NOT NULL,
  `alamat_pelanggan` varchar(256) NOT NULL,
  `no_telp_pelanggan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat_pelanggan`, `no_telp_pelanggan`) VALUES
(4, 'Rangga', 'Tulungagung', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `jumlah_pembelian` int(30) NOT NULL,
  `harga_beli` int(30) NOT NULL,
  `total_harga_beli` int(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `jumlah_pembelian`, `harga_beli`, `total_harga_beli`, `id_pengguna`, `id_barang`) VALUES
(1, 3, 11000, 33000, 3, 2),
(3, 1, 12000, 12000, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_depan` varchar(256) NOT NULL,
  `nama_belakang` varchar(256) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `id_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `password`, `nama_depan`, `nama_belakang`, `no_hp`, `alamat`, `id_akses`) VALUES
(1, 'Sinta', 'sinta123', 'Sinta', 'Anggraini', '081901361923', 'Pondok Jati, Jakarta Timur', 6),
(2, 'Abdul', 'abdl23', 'Abdullah', 'Mubarok', '089852368413', 'Ciputat, Tangerang Selatan', 1),
(3, 'Audi', 'odirhma', 'Audi', 'Rahma Anjani', '081308402318', 'Kebagusan, Jakarta Selatan', 10),
(4, 'Anton', 'anthonyy', 'Anthony', 'Wijaya', '081892654101', 'Kemanggisan, Jakarta Barat', 1),
(5, 'Agustian', 'agusriyant0', 'Agustian', 'Riyanto', '089832891032', 'Setiabudi, Jakarta Selatan', 3),
(6, 'Putri', 'putri13', 'Putri', 'Wardhani', '081382901237', 'Grogol, Jakarta Barat', 8),
(7, 'Nugroho', 'nugrohoo', 'Aji', 'Nugroho', '081378910234', 'Bekasi', 9),
(8, 'Samsul', 'samsul98', 'Samsul', 'Firmansyah', '087890128931', 'Gambir', 7),
(9, 'Dea', 'deaputri01', 'Dea', 'Putri', '081390189014', 'Palmerah, Jakarta Barat', 5),
(10, 'Bee96', 'Bee96', 'Kinara', 'Berlian', '085627075310', 'Lebak Bulus, Jakarta Selatan', 4);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `jumlah_penjualan` int(30) NOT NULL,
  `harga_jual` int(30) NOT NULL,
  `total_harga_jual` int(255) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `jumlah_penjualan`, `harga_jual`, `total_harga_jual`, `id_pengguna`, `id_barang`) VALUES
(1, 2, 10000, 20000, 6, 2),
(4, 2, 20000, 40000, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(255) NOT NULL,
  `nama_role` int(255) NOT NULL,
  `keterangan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(10) NOT NULL,
  `nama_supplier` char(20) NOT NULL,
  `alamat_supplier` varchar(256) NOT NULL,
  `no_telp_supplier` varchar(30) NOT NULL,
  `kode_pos` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `IdPengguna` (`id_pengguna`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD KEY `IdAkses` (`id_akses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `pembelian_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_ibfk_1` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
