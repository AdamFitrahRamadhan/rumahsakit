-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2022 at 09:42 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `harga`) VALUES
(1, 'Nero ForteX', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(11) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `jenis_obat` varchar(50) DEFAULT NULL,
  `jenis_tindakan` varchar(50) DEFAULT NULL,
  `status_obat` varchar(1) NOT NULL,
  `status_bayar` varchar(1) NOT NULL,
  `total_harga` varchar(50) DEFAULT NULL,
  `total_bayar` varchar(50) DEFAULT NULL,
  `tanggal_bayar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `alamat`, `jenis_kelamin`, `telepon`, `jenis_obat`, `jenis_tindakan`, `status_obat`, `status_bayar`, `total_harga`, `total_bayar`, `tanggal_bayar`) VALUES
(2, 'savput', 'malang', 'PEREMPUAN', '08767842', '', '', '0', '', '', '', '0000-00-00'),
(3, 'a damn', 'malang', 'LAKI-LAKI', '08127412', '', '', '', '', '', '', '0000-00-00'),
(4, 'q', 'q`', 'PEREMPUAN', '1', 'OBAT-PILEK', 'RAWAT-PENGINAPAN', '2', '1', '500004', '50000', '2022-09-18'),
(5, 'Ling', 'Jakarta', 'LAKI-LAKI', '023423423', '', '', '', '', '', '', '0000-00-00'),
(8, 'a', 'a', 'LAKI-LAKI', '34', '', '', '0', '', '', '', '0000-00-00'),
(9, 'coba nama', 'coba alamaat', 'LAKI-LAKI', '123', NULL, NULL, '0', '0', NULL, NULL, '0000-00-00'),
(11, 'satu', 'alamat', 'PEREMPUAN', '123', NULL, NULL, '0', '0', NULL, NULL, '0000-00-00'),
(12, 'b', 'b', 'LAKI-LAKI', '12444', NULL, NULL, '1', '0', '', NULL, '0000-00-00'),
(13, 'a', 'a', 'PEREMPUAN', '123', NULL, NULL, '0', '0', NULL, NULL, '0000-00-00'),
(14, 'COBA', 'COBA', 'LAKI-LAKI', '12345', 'OBAT-BATUK', 'RAWAT-PENGINAPAN', '2', '1', '25000', '50000', '2022-09-18'),
(15, 'daftar', '1', 'PEREMPUAN', '1', NULL, NULL, '0', '0', NULL, NULL, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `id_tindakan` int(11) NOT NULL,
  `nama_tindakan` varchar(20) NOT NULL,
  `harga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`id_tindakan`, `nama_tindakan`, `harga`) VALUES
(2, 'Rawat', '2000000');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `level`) VALUES
(1, 'admin', 'admin', 'ADMIN'),
(5, 'adam', 'adam', 'RESEPSIONIS');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'RS Borobudur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`id_tindakan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tindakan`
--
ALTER TABLE `tindakan`
  MODIFY `id_tindakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
