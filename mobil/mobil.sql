-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2015 at 08:28 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `username`, `password`, `status`) VALUES
('admin@localhost.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'terdaftar'),
('fierachmach@rocketmail.com', 'luthfirh_', '200820e3227815ed1756a6b531e7e0d2', 'terdaftar');

--
-- Triggers `admin`
--
DROP TRIGGER IF EXISTS `admin_insert`;
DELIMITER //
CREATE TRIGGER `admin_insert` AFTER INSERT ON `admin`
 FOR EACH ROW insert into pemberitahuan values(null, 'admin', new.username, 'Menunggu konfirmasi')
//
DELIMITER ;
DROP TRIGGER IF EXISTS `admin_update`;
DELIMITER //
CREATE TRIGGER `admin_update` AFTER UPDATE ON `admin`
 FOR EACH ROW begin
insert into pemberitahuan values(null, 'admin', new.username, 'telah terdaftar');
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `bayar_cicilan`
--

CREATE TABLE IF NOT EXISTS `bayar_cicilan` (
  `kode_cicilan` int(5) NOT NULL AUTO_INCREMENT,
  `kode_kredit` int(5) NOT NULL,
  `tanggal_cicilan` date NOT NULL,
  `jumlah_cicilan` int(9) NOT NULL,
  `cicilan_ke` int(2) NOT NULL,
  `cicilan_sisa_ke` int(2) NOT NULL,
  `cicillan_sisa_harga` int(9) NOT NULL,
  PRIMARY KEY (`kode_cicilan`),
  KEY `kode_kredit` (`kode_kredit`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `bayar_cicilan`
--

INSERT INTO `bayar_cicilan` (`kode_cicilan`, `kode_kredit`, `tanggal_cicilan`, `jumlah_cicilan`, `cicilan_ke`, `cicilan_sisa_ke`, `cicillan_sisa_harga`) VALUES
(11, 13, '2015-02-21', 12, 0, 12, 438000000);

--
-- Triggers `bayar_cicilan`
--
DROP TRIGGER IF EXISTS `cicilan_bayar`;
DELIMITER //
CREATE TRIGGER `cicilan_bayar` AFTER UPDATE ON `bayar_cicilan`
 FOR EACH ROW insert into pemberitahuan values(null, 'cicilan', new.kode_cicilan, 'insert')
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `beli_cash`
--

CREATE TABLE IF NOT EXISTS `beli_cash` (
  `kode_cash` int(5) NOT NULL AUTO_INCREMENT,
  `ktp` varchar(30) NOT NULL,
  `kode_mobil` varchar(50) NOT NULL,
  `cash_tanggal` date NOT NULL,
  `cash_bayar` int(9) NOT NULL,
  PRIMARY KEY (`kode_cash`),
  KEY `ktp` (`ktp`),
  KEY `kode_mobil` (`kode_mobil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `beli_cash`
--

INSERT INTO `beli_cash` (`kode_cash`, `ktp`, `kode_mobil`, `cash_tanggal`, `cash_bayar`) VALUES
(4, '21345', 'BMWM42012', '2015-02-21', 500000000);

-- --------------------------------------------------------

--
-- Table structure for table `kredit`
--

CREATE TABLE IF NOT EXISTS `kredit` (
  `kode_kredit` int(5) NOT NULL AUTO_INCREMENT,
  `ktp` varchar(30) NOT NULL,
  `kode_paket` int(5) NOT NULL,
  `kode_mobil` varchar(50) NOT NULL,
  `tanggal_kredit` date NOT NULL,
  `fotokopi_ktp` tinyint(1) NOT NULL,
  `fotokopi_kk` tinyint(1) NOT NULL,
  `fotokopi_slip_gaji` tinyint(1) NOT NULL,
  PRIMARY KEY (`kode_kredit`),
  KEY `ktp` (`ktp`),
  KEY `kode_paket` (`kode_paket`),
  KEY `kode_mobil` (`kode_mobil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `kredit`
--

INSERT INTO `kredit` (`kode_kredit`, `ktp`, `kode_paket`, `kode_mobil`, `tanggal_kredit`, `fotokopi_ktp`, `fotokopi_kk`, `fotokopi_slip_gaji`) VALUES
(13, '12345', 2, 'SBRWRXSTI', '2015-02-21', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `kode_mobil` varchar(50) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `warna` varchar(50) NOT NULL,
  `harga_mobil` int(9) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  PRIMARY KEY (`kode_mobil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`kode_mobil`, `merk`, `type`, `warna`, `harga_mobil`, `gambar`) VALUES
('BMWM42012', 'BMW M4 2012', 'Mobil Sport', 'Merah', 500000000, 'mobil39883427.jpg'),
('PRSCHSPRD123', 'Porsche Spider', 'Mobil Klasik', 'Kuning', 300000000, 'harga2077941e.jpg'),
('SBR123', 'Subaru WRX STI 2008', 'Sedan', 'Biru', 300000000, '20130408_014840_20130407_SubaruWRXConcept.jpg'),
('SBRWRXSTI', 'Subaru WRX STI', 'Mobil Sport', 'Biru', 450000000, '2014029940791.jpg');

--
-- Triggers `mobil`
--
DROP TRIGGER IF EXISTS `mobil_delete`;
DELIMITER //
CREATE TRIGGER `mobil_delete` AFTER DELETE ON `mobil`
 FOR EACH ROW begin
delete from pemberitahuan where data = old.kode_mobil;
insert into pemberitahuan values(null, 'mobil', old.kode_mobil, 'delete');
end
//
DELIMITER ;
DROP TRIGGER IF EXISTS `mobil_insert`;
DELIMITER //
CREATE TRIGGER `mobil_insert` AFTER INSERT ON `mobil`
 FOR EACH ROW insert into pemberitahuan values(null, 'mobil', new.kode_mobil, 'insert')
//
DELIMITER ;
DROP TRIGGER IF EXISTS `mobil_update`;
DELIMITER //
CREATE TRIGGER `mobil_update` AFTER UPDATE ON `mobil`
 FOR EACH ROW insert into pemberitahuan values(null, 'mobil', new.kode_mobil, 'update')
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `paket_kredit`
--

CREATE TABLE IF NOT EXISTS `paket_kredit` (
  `kode_paket` int(5) NOT NULL AUTO_INCREMENT,
  `harga_paket` int(9) NOT NULL,
  `uang_muka` int(9) NOT NULL,
  `paket_jumlah_cicilan` int(2) NOT NULL,
  `bunga` int(2) NOT NULL,
  `nilai_cicilan` int(9) NOT NULL,
  PRIMARY KEY (`kode_paket`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `paket_kredit`
--

INSERT INTO `paket_kredit` (`kode_paket`, `harga_paket`, `uang_muka`, `paket_jumlah_cicilan`, `bunga`, `nilai_cicilan`) VALUES
(2, 100, 12000000, 12, 1, 8),
(3, 100, 10000000, 24, 2, 4),
(4, 100, 20000000, 36, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pembeli`
--

CREATE TABLE IF NOT EXISTS `pembeli` (
  `ktp` varchar(30) NOT NULL,
  `nama_pembeli` varchar(50) NOT NULL,
  `alamat_pembeli` text NOT NULL,
  `telelpon_pembeli` varchar(12) NOT NULL,
  PRIMARY KEY (`ktp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembeli`
--

INSERT INTO `pembeli` (`ktp`, `nama_pembeli`, `alamat_pembeli`, `telelpon_pembeli`) VALUES
('12345', 'Luthfi Rahmad Hidayattullah', 'Puluhan', '85643453240'),
('21345', 'Rose Delima', 'Karanganyar', '85641237');

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan`
--

CREATE TABLE IF NOT EXISTS `pemberitahuan` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `tabel` varchar(15) NOT NULL,
  `data` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id`, `tabel`, `data`, `keterangan`) VALUES
(19, 'mobil', 'SBRWRXSTI', 'insert'),
(20, 'mobil', 'SBR123', 'update'),
(21, 'cicilan', '2', 'insert'),
(22, 'admin', 'luthfirh_', 'Menunggu konfirmasi'),
(23, 'admin', 'luthfirh_', 'telah terdaftar'),
(24, 'mobil', 'BMWM32012', 'delete'),
(27, 'mobil', 'BMWM42012', 'delete'),
(28, 'mobil', 'BMWM42012', 'insert');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bayar_cicilan`
--
ALTER TABLE `bayar_cicilan`
  ADD CONSTRAINT `bayar_cicilan_ibfk_1` FOREIGN KEY (`kode_kredit`) REFERENCES `kredit` (`kode_kredit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `beli_cash`
--
ALTER TABLE `beli_cash`
  ADD CONSTRAINT `beli_cash_ibfk_2` FOREIGN KEY (`kode_mobil`) REFERENCES `mobil` (`kode_mobil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `beli_cash_ibfk_1` FOREIGN KEY (`ktp`) REFERENCES `pembeli` (`ktp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kredit`
--
ALTER TABLE `kredit`
  ADD CONSTRAINT `kredit_ibfk_3` FOREIGN KEY (`kode_paket`) REFERENCES `paket_kredit` (`kode_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kredit_ibfk_1` FOREIGN KEY (`ktp`) REFERENCES `pembeli` (`ktp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kredit_ibfk_2` FOREIGN KEY (`kode_mobil`) REFERENCES `mobil` (`kode_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
