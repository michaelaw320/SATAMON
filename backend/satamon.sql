-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2015 at 03:47 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
 ADD PRIMARY KEY (`id_pengaduan`), ADD KEY `id_taman` (`id_taman`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengaduan`
--
ALTER TABLE `pengaduan`
MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id dari pengaduan',AUTO_INCREMENT=38;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengaduan`
--
ALTER TABLE `pengaduan`
ADD CONSTRAINT `pengaduan_ibfk_1` FOREIGN KEY (`id_taman`) REFERENCES `taman` (`id_taman`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
