-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2021 at 09:38 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nis` varchar(8) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `telp_anggota` varchar(32) NOT NULL,
  `jenis_kelamin` varchar(16) NOT NULL,
  `tp_lhr` varchar(32) NOT NULL,
  `tgl_lhr` varchar(32) NOT NULL,
  `alamat_anggota` varchar(255) NOT NULL,
  `kelas` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nis`, `nama_anggota`, `telp_anggota`, `jenis_kelamin`, `tp_lhr`, `tgl_lhr`, `alamat_anggota`, `kelas`) VALUES
(7, '0001', 'First', '1234', 'Laki-Laki', 'Semarang', '2021-06-20', 'Surakarta', 'bhs2'),
(9, '0002', 'Yoga Pratama', '111', 'Laki-Laki', 'Semarang', '2000-06-21', 'Semarang', 'sos1');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis` varchar(128) NOT NULL,
  `tahun_terbit` varchar(16) NOT NULL,
  `penerbit` varchar(64) NOT NULL,
  `kategori` varchar(64) NOT NULL,
  `jumlah_buku` int(11) NOT NULL,
  `lokasi_buku` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `penulis`, `tahun_terbit`, `penerbit`, `kategori`, `jumlah_buku`, `lokasi_buku`) VALUES
(1, 'Kamus Besar Bahasa Indonesia', 'W.J.S. Poerwadarminta', '1999', 'NN', 'kamus', 3, '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(4) NOT NULL,
  `nama_kelas` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
('bhs1', 'Bahasa 1'),
('bhs2', 'Bahasa 2'),
('ipa1', 'MIPA 1'),
('ipa2', 'MIPA 2'),
('ipa3', 'MIPA 3'),
('sos1', 'Sosial 1'),
('sos2', 'Sosial 2'),
('sos3', 'Sosial 3');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_anggota` int(11) DEFAULT NULL,
  `id_buku` int(11) DEFAULT NULL,
  `tgl_pinjam` varchar(64) NOT NULL,
  `tgl_kembali` varchar(64) NOT NULL,
  `tgl_dikembalikan` varchar(64) DEFAULT NULL,
  `jml_dipinjam` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`, `tgl_dikembalikan`, `jml_dipinjam`, `status`, `denda`) VALUES
(1, 7, 1, 'sekarang', 'besok', 'lusa', 1, 1, 0),
(2, 9, 1, '2021-06-21', '2021-06-21', NULL, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(128) NOT NULL,
  `telp_petugas` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `telp_petugas`, `username`, `password`, `role`) VALUES
(1, 'Admin', '1111', 'admin', '$2y$10$0JjOd364/7Vi/X2nWrkFI.CYjcE5wxAfrhiBKxR3ODyygwS.RlKtG', 1),
(5, 'Yoga Pratama', '1122', 'pratama', '$2y$10$gGoTDeHmLgyLBs0CQJrox.5lFZl7hLa3pi2BHFLHHAb9r.rbdyQIe', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`),
  ADD KEY `kelas` (`kelas`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `tr_anggota` (`id_anggota`),
  ADD KEY `tr_buku` (`id_buku`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anggota`
--
ALTER TABLE `anggota`
  ADD CONSTRAINT `kelas_anggota` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `tr_anggota` FOREIGN KEY (`id_anggota`) REFERENCES `anggota` (`id_anggota`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `tr_buku` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
