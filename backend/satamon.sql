-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2015 at 03:49 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `satamon`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
`id_foto` int(11) NOT NULL COMMENT 'ID dari foto',
  `id_pengaduan` int(11) NOT NULL COMMENT 'ID dari pengaduan foto',
  `nama_foto` varchar(64) NOT NULL COMMENT 'Nama file foto',
  `jenis_foto` enum('png','jpg','gif','bmp') NOT NULL COMMENT 'Jenis ekstensi foto',
  `ukuran_foto` int(11) NOT NULL COMMENT 'Ukuran foto (dalam bytes)',
  `blob_foto` longblob NOT NULL COMMENT 'Data binary foto'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE IF NOT EXISTS `pengaduan` (
`id_pengaduan` int(11) NOT NULL COMMENT 'id dari pengaduan',
  `email_pengaduan` varchar(64) NOT NULL COMMENT 'Alamat e-mail dari pengadu',
  `isi_pengaduan` text NOT NULL COMMENT 'Teks berisi pengaduan yang diberikan',
  `jenis_pengaduan` enum('sampah','sarana','kriminal','misc') NOT NULL DEFAULT 'misc' COMMENT 'Jenis pengaduan yang diberikan',
  `status_pengaduan` enum('diterima','diproses','selesai','') NOT NULL DEFAULT 'diterima' COMMENT 'Status dari pengaduan',
  `waktu_pengaduan` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu ketika pengaduan masuk ke dalam sistem',
  `id_taman` int(11) NOT NULL COMMENT 'Key ke taman yang diadukan'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

-- --------------------------------------------------------

--
-- Table structure for table `taman`
--

CREATE TABLE IF NOT EXISTS `taman` (
`id_taman` int(11) NOT NULL,
  `nama_taman` varchar(64) NOT NULL,
  `latitude_taman` float NOT NULL,
  `longitude_taman` float NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `taman`
--

INSERT INTO `taman` (`id_taman`, `nama_taman`, `latitude_taman`, `longitude_taman`) VALUES
(1, 'Taman A', 100, 100),
(2, 'Taman B', 150, 150),
(3, 'Taman C', 200, 200);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto`
--
ALTER TABLE `foto`
 ADD PRIMARY KEY (`id_foto`,`id_pengaduan`), ADD KEY `id_pengaduan` (`id_pengaduan`);

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
 ADD PRIMARY KEY (`id_pengaduan`), ADD KEY `id_taman` (`id_taman`);

--
-- Indexes for table `taman`
--
ALTER TABLE `taman`
 ADD PRIMARY KEY (`id_taman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto`
--
ALTER TABLE `foto`
MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID dari foto';
--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id dari pengaduan',AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `taman`
--
ALTER TABLE `taman`
MODIFY `id_taman` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto`
--
ALTER TABLE `foto`
ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`id_pengaduan`) REFERENCES `pengaduan` (`id_pengaduan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_taman`) REFERENCES `taman` (`id_taman`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
