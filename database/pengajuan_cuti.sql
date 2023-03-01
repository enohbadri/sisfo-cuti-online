-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Jul 2019 pada 12.40
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pengajuan_cuti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cuti`
--

CREATE TABLE IF NOT EXISTS `cuti` (
`id` int(11) NOT NULL,
  `kode` varchar(8) NOT NULL,
  `pegawai_id` int(11) NOT NULL,
  `tglpengajuan` date DEFAULT NULL,
  `tanggal1` date DEFAULT NULL,
  `batascuti` date DEFAULT NULL,
  `keterangan` varchar(300) NOT NULL,
  `status` enum('A','T','W') DEFAULT 'W'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cuti`
--

INSERT INTO `cuti` (`id`, `kode`, `pegawai_id`, `tglpengajuan`, `tanggal1`, `batascuti`, `keterangan`, `status`) VALUES
(11, 'CT000001', 6, '2019-07-07', '2019-07-04', '2019-07-09', 'Keperluan Keluarga', 'A'),
(12, 'CT000002', 6, '2019-07-07', '2019-07-19', '2019-07-20', 'LIburan', 'A'),
(13, 'CT000003', 6, '2019-07-07', '2019-07-24', '2019-07-25', 'Mengurus Surat Izin Kendaraan', 'A'),
(14, 'CT000004', 2, '2019-07-07', '2019-07-04', '2019-07-04', 'LIburan', 'W'),
(15, 'CT000005', 6, '2019-07-07', '2019-07-30', '2019-07-31', 'Keluar Kota', 'W'),
(16, 'CT000006', 8, '2019-07-07', '2019-07-02', '2019-07-03', 'Keluar Daerah', 'W'),
(17, 'CT000007', 9, '2019-07-07', '2019-07-18', '2019-07-18', 'Perpanjangan STNK', 'W'),
(18, 'CT000008', 10, '2019-07-07', '2019-07-18', '2019-07-19', 'Resepsi Pernikahan', 'W'),
(19, 'CT000009', 6, '2019-07-08', '2019-07-03', '2019-07-05', 'Istirahat', 'W');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cutiproses`
--

CREATE TABLE IF NOT EXISTS `cutiproses` (
`idcp` int(20) NOT NULL,
  `kodecuti` varchar(11) NOT NULL,
  `tglapprove` date DEFAULT NULL,
  `approvement` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `cutiproses`
--

INSERT INTO `cutiproses` (`idcp`, `kodecuti`, `tglapprove`, `approvement`) VALUES
(10, 'CT000003', '2019-07-07', 2),
(11, 'CT000002', '2019-07-07', 2),
(12, 'CT000001', '2019-07-07', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE IF NOT EXISTS `departemen` (
`id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id`, `nama`) VALUES
(13, 'Machining'),
(14, 'Casting'),
(15, 'General Afair'),
(16, 'Sales'),
(17, 'Purcahasing'),
(18, 'Maintenance'),
(19, 'Casting Enginering');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
`id` int(11) NOT NULL,
  `gbrpgw` varchar(60) NOT NULL DEFAULT 'no_photo.jpg',
  `nik` varchar(8) NOT NULL,
  `noktp` varchar(16) NOT NULL,
  `npwp` varchar(21) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jkelamin` varchar(11) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `agama` varchar(16) NOT NULL,
  `statuspernikahan` varchar(16) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `cabang_id` int(11) NOT NULL,
  `password` varchar(500) NOT NULL,
  `status` varchar(11) DEFAULT 'Aktif'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `gbrpgw`, `nik`, `noktp`, `npwp`, `nama`, `jkelamin`, `alamat`, `agama`, `statuspernikahan`, `no_tlp`, `cabang_id`, `password`, `status`) VALUES
(6, 'no_photo.jpg', '12166109', '', '', 'Enoh Badri', 'Laki-laki', 'Kp.Linggarsari  Desa Linggarsari Kec Telagasari\r\nKab Karawang 41381', '', '', '085692141561', 13, 'e10adc3949ba59abbe56e057f20f883e', 'Tetap'),
(8, 'no_photo.jpg', '12164744', '', '', 'Rahmat Hidayat', 'Laki-laki', 'Desa Cilebar Kec Rawamerta RT/RW 003/001\r\nKab Karawang 41381', '', '', '085697761543', 19, 'e10adc3949ba59abbe56e057f20f883e', 'Kontrak'),
(9, 'no_photo.jpg', '12160944', '', '', 'Dheantika Fernanda', 'Perempuan', 'Desa Palumbon Sari No. 25 RT/RW 004/002\r\nKab Karawang 41381', '', '', '08568776152', 15, 'e10adc3949ba59abbe56e057f20f883e', 'Tetap'),
(10, 'no_photo.jpg', '12166187', '', '', 'Wijriyah', 'Perempuan', 'Desa Cilempung Kec Cilamaya Kulon RT/RW 004/002\r\nKab Karawang 41387', '', '', '0865441241', 17, 'e10adc3949ba59abbe56e057f20f883e', 'Kontrak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `nip` varchar(8) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(300) NOT NULL,
  `jenis_kelamin` varchar(9) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `blokir` varchar(1) NOT NULL,
  `level` enum('admin','pimpinan') DEFAULT 'admin'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nip`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `no_tlp`, `email`, `blokir`, `level`) VALUES
(1, 'PG001111', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 'Perum Jatihurip Blok 6 No. 202 RT.01 RW.013 , Desa Jatihurip - Sumedang', 'Laki-laki', '082130046934', 'admin@asama.co.id', 'N', 'admin'),
(2, 'PG001112', 'pimpinan', '90973652b88fe07d05a4304f0a945de8', 'Pimpinan', 'Jalan Cikutra No. 204A, Cibeunying Kidul, Jawa Barat 40125', 'Laki-laki', '08568333883', 'pimpinan@asama.co.id', 'N', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cutiproses`
--
ALTER TABLE `cutiproses`
 ADD PRIMARY KEY (`idcp`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `cutiproses`
--
ALTER TABLE `cutiproses`
MODIFY `idcp` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
