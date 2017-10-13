-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 13, 2017 at 05:51 
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(8) NOT NULL,
  `nama_admin` varchar(30) NOT NULL,
  `alamat` varchar(60) NOT NULL,
  `tlp` char(13) NOT NULL,
  `email` char(20) NOT NULL,
  `username` char(15) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `alamat`, `tlp`, `email`, `username`, `password`) VALUES
(1, 'admin', 'klaten', '08888', 'aa@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(8) NOT NULL,
  `nama_pengguna` varchar(30) NOT NULL,
  `jk_pengguna` enum('Pria','Wanita') NOT NULL,
  `email_pengguna` char(20) NOT NULL,
  `password_pengguna` varchar(32) NOT NULL,
  `tlp_pengguna` char(13) NOT NULL,
  `alamat_pengguna` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `jk_pengguna`, `email_pengguna`, `password_pengguna`, `tlp_pengguna`, `alamat_pengguna`) VALUES
(1, 'dedi', 'Pria', 'dedi@gmail.com', 'c5897fbcc14ddcf30dca31b2735c3d7e', '088888', 'klaten'),
(2, 'dgdgd', 'Wanita', 'dgdfgdf', '8d509c28896865f8640f328f30f15721', '5353535', 'gdfgfdg'),
(3, 'vsdfsdf', 'Pria', 'sdfdsfdsf', '33e78d60bc1f9dcc7291c891e6f069e4', 'dfsdsfds', 'dfssdfsdf'),
(4, 'dxfsdfsdf', 'Pria', 'dsfdsfsd', 'd6e9c56d7f078d298ed4695d899effbe', '', ''),
(5, 'aa', 'Pria', 'ss', '3691308f2a4c2f6983f2880d32e29c84', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `perpustakaan`
--

CREATE TABLE `perpustakaan` (
  `id_perpustakaan` int(8) NOT NULL,
  `nama_perpustakaan` varchar(40) NOT NULL,
  `alamat` varchar(120) NOT NULL,
  `tlp` char(13) NOT NULL,
  `email` char(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `url_perpustakaan` varchar(60) NOT NULL,
  `logo_perpustakaan` char(15) NOT NULL,
  `profil_perpustakaan` varchar(250) NOT NULL,
  `fasilitas_perpustakaan` varchar(150) NOT NULL,
  `prosedur_pendaftaran_anggota` varchar(250) NOT NULL,
  `prosedur_peminjaman` varchar(250) NOT NULL,
  `prosedur_pengembalian` varchar(250) NOT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `status_verifikasi` enum('Diterima','Ditolak') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perpustakaan`
--

INSERT INTO `perpustakaan` (`id_perpustakaan`, `nama_perpustakaan`, `alamat`, `tlp`, `email`, `password`, `url_perpustakaan`, `logo_perpustakaan`, `profil_perpustakaan`, `fasilitas_perpustakaan`, `prosedur_pendaftaran_anggota`, `prosedur_peminjaman`, `prosedur_pengembalian`, `latitude`, `longitude`, `tgl_daftar`, `status_verifikasi`) VALUES
(1, 'AKAKOM', 'jogja', '084343', 'aka@aka.com', '6ac933301a3933c8a22ceebea7000326', '', '', '', '', '', '', '', 0, 0, '0000-00-00', ''),
(2, 'a', 'a', '08766', 'aa@gmail.com', '4124bc0a9335c27f086f24ba207a4912', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL),
(3, 'a', 'a', '08', 'a', '0cc175b9c0f1b6a831c399e269772661', 'sfd', '', 'dfs', 'aaa', 'dgdfg', 'fdgdfg', 'fgdgdf', 33, 3, NULL, NULL),
(4, 'b', 'b', '09', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 'dds', 'sdsd', 'ds', 'sd', 'f', 'f', 'f', -3322, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  ADD PRIMARY KEY (`id_perpustakaan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `perpustakaan`
--
ALTER TABLE `perpustakaan`
  MODIFY `id_perpustakaan` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
