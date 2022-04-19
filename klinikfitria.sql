-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2022 at 04:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `klinikfitria`
--

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `idobat` varchar(8) NOT NULL,
  `nama` text NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` varchar(8) NOT NULL,
  `nama` text NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgllahir` varchar(255) NOT NULL,
  `notelp` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rawat`
--

CREATE TABLE `rawat` (
  `idrawat` varchar(8) NOT NULL,
  `tglrawat` date NOT NULL,
  `totaltindakan` int(8) NOT NULL,
  `totalobat` int(8) NOT NULL,
  `totalharga` int(8) NOT NULL,
  `uangmuka` int(8) NOT NULL,
  `kurang` int(8) NOT NULL,
  `idpasien` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rawatobat`
--

CREATE TABLE `rawatobat` (
  `idrawatobat` varchar(8) NOT NULL,
  `idrawat` varchar(8) NOT NULL,
  `idobat` varchar(8) NOT NULL,
  `jumlah` int(8) NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rawattindakan`
--

CREATE TABLE `rawattindakan` (
  `idrawattindakan` varchar(8) NOT NULL,
  `idrawat` varchar(8) NOT NULL,
  `idtindakan` varchar(8) NOT NULL,
  `namadokter` text NOT NULL,
  `harga` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `idtindakan` varchar(8) NOT NULL,
  `namatindakan` text NOT NULL,
  `biaya` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`idobat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`idpasien`);

--
-- Indexes for table `rawat`
--
ALTER TABLE `rawat`
  ADD PRIMARY KEY (`idrawat`),
  ADD KEY `rawat_FK` (`idpasien`);

--
-- Indexes for table `rawatobat`
--
ALTER TABLE `rawatobat`
  ADD PRIMARY KEY (`idrawatobat`),
  ADD KEY `rawatobat_FK` (`idrawat`),
  ADD KEY `rawatobat_FK_1` (`idobat`);

--
-- Indexes for table `rawattindakan`
--
ALTER TABLE `rawattindakan`
  ADD PRIMARY KEY (`idrawattindakan`),
  ADD KEY `rawattindakan_FK` (`idrawat`),
  ADD KEY `rawattindakan_FK_1` (`idtindakan`);

--
-- Indexes for table `tindakan`
--
ALTER TABLE `tindakan`
  ADD PRIMARY KEY (`idtindakan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rawat`
--
ALTER TABLE `rawat`
  ADD CONSTRAINT `rawat_FK` FOREIGN KEY (`idpasien`) REFERENCES `pasien` (`idpasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawatobat`
--
ALTER TABLE `rawatobat`
  ADD CONSTRAINT `rawatobat_FK` FOREIGN KEY (`idrawat`) REFERENCES `rawat` (`idrawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawatobat_FK_1` FOREIGN KEY (`idobat`) REFERENCES `obat` (`idobat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawattindakan`
--
ALTER TABLE `rawattindakan`
  ADD CONSTRAINT `rawattindakan_FK` FOREIGN KEY (`idrawat`) REFERENCES `rawat` (`idrawat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rawattindakan_FK_1` FOREIGN KEY (`idtindakan`) REFERENCES `tindakan` (`idtindakan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
