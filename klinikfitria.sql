-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 06:43 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

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

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`idobat`, `nama`, `harga`) VALUES
('TS123', 'Sakit Kelapa', 145000),
('TS12311', '1244233', 12323),
('TS123878', 'sdfghjl;kjhjgh', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `idpasien` varchar(8) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgllahir` date NOT NULL,
  `notelp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`idpasien`, `nama`, `alamat`, `tgllahir`, `notelp`) VALUES
('TS221100', 'Yoga', 'Surakarta', '2000-04-25', '0813431901'),
('TS222', 'Andi', 'jakarta', '1999-04-29', '082255111');

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

--
-- Dumping data for table `rawat`
--

INSERT INTO `rawat` (`idrawat`, `tglrawat`, `totaltindakan`, `totalobat`, `totalharga`, `uangmuka`, `kurang`, `idpasien`) VALUES
('TS112', '2014-05-19', 1, 1, 2, 1000000, -999998, 'TS222'),
('TS11200', '2022-04-19', 200000, 2000000, 2200000, 10000, 2190000, 'TS222');

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
  `biaya` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rawattindakan`
--

INSERT INTO `rawattindakan` (`idrawattindakan`, `idrawat`, `idtindakan`, `namadokter`, `biaya`) VALUES
('TS123', 'TS11200', 'TS1092', 'Dr. Siti Aminah, Sp. M', 9100000);

-- --------------------------------------------------------

--
-- Table structure for table `tindakan`
--

CREATE TABLE `tindakan` (
  `idtindakan` varchar(8) NOT NULL,
  `namatindakan` varchar(255) NOT NULL,
  `biaya` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tindakan`
--

INSERT INTO `tindakan` (`idtindakan`, `namatindakan`, `biaya`) VALUES
('TS00111', 'Operasi Usus Buntu', 35000000),
('TS002', 'Operasi Mata Anak', 150000000),
('TS0021', 'Operasi Mata', 150000000),
('TS0910', 'Terapi Jalan', 800000),
('TS10', 'Suntik Parises', 9000000),
('TS1000', 'Terapi Asam Lambung', 900000),
('TS1092', 'Operasi Usus Sapi', 9100000),
('TS111239', 'Puasa Mutih', 1999208),
('TS1134', 'Medical Check-Up', 500000),
('TS11343', 'Laser Lambung', 1290000),
('TS19431', 'Puasa Sayur', 11200000);

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
