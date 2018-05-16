-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 Mei 2018 pada 04.53
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penjadwalan`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_view_jadwal` ()  NO SQL
CREATE OR REPLACE
VIEW `view_jadwal`
AS SELECT 
jadwal_rapat.id, 
jadwal_rapat.tgl_pemesanan, 
jadwal_rapat.tgl_rapat, 
data_bidang.nama AS nama_bidang, 
data_ruangan.nama AS nama_ruang, 
jadwal_rapat.waktu_rapat, 
jadwal_rapat.nama_acara, 
jadwal_rapat.keterangan,
jadwal_rapat.status
FROM 
jadwal_rapat 
JOIN 
data_bidang 
ON jadwal_rapat.id_bidang = data_bidang.id_bidang 
JOIN 
data_ruangan 
ON jadwal_rapat.id_ruang = data_ruangan.id_ruang$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bidang`
--

CREATE TABLE `data_bidang` (
  `id_bidang` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_bidang`
--

INSERT INTO `data_bidang` (`id_bidang`, `nama`, `color`) VALUES
(1, 'Sekretariat', '#f56954'),
(2, 'Perencanaan Pengembangan Pendidikan (PPP)', '#00a65a'),
(4, 'Pembinaan Kesejahteraan Pegawai (PKP)', '#D81B60'),
(5, 'Informasi Data Pegawai (INKA)', '#39CCCC'),
(6, 'Unit Penilai Kompetensi ASN (UPENKOM)', '#ff851b');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kepala_bidang`
--

CREATE TABLE `data_kepala_bidang` (
  `id` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `jabatan` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nip` int(11) NOT NULL,
  `pangkat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_kepala_bidang`
--

INSERT INTO `data_kepala_bidang` (`id`, `id_bidang`, `jabatan`, `nama`, `nip`, `pangkat`) VALUES
(1, 1, 'Sekretaris', 'Black Panther', 1223212121, 'KING'),
(3, 5, 'KEPALA', 'KEPALA', 1234, 'KEPALA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_ruangan`
--

CREATE TABLE `data_ruangan` (
  `id_ruang` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_ruangan`
--

INSERT INTO `data_ruangan` (`id_ruang`, `nama`) VALUES
(4, 'Ruang Darma Wanita'),
(6, 'Ruang Perpustakaan'),
(7, 'Ruang PMMK'),
(2, 'Ruang Rapat 1'),
(3, 'Ruang Rapat 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_rapat`
--

CREATE TABLE `jadwal_rapat` (
  `id` int(11) NOT NULL,
  `id_bidang` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `tgl_pemesanan` date NOT NULL,
  `tgl_rapat` date NOT NULL,
  `waktu_rapat` enum('pagi','siang') NOT NULL,
  `nama_acara` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_rapat`
--

INSERT INTO `jadwal_rapat` (`id`, `id_bidang`, `id_ruang`, `tgl_pemesanan`, `tgl_rapat`, `waktu_rapat`, `nama_acara`, `keterangan`, `status`) VALUES
(1, 1, 4, '2018-05-03', '2018-05-03', 'pagi', 'Seminar Wanita', 'Dihadiri Ibu Sri Hartini', '1'),
(2, 1, 6, '2018-05-03', '2018-05-03', 'pagi', 'Seminar Perpustakaan', 'Dihadiri Bapak Pustakawan Dunia Dr. Idham Kholid, S.Perp', '1'),
(3, 1, 4, '2018-05-03', '2018-05-03', 'siang', 'Seminar Ukhti', '', '1'),
(4, 1, 2, '2018-05-03', '2018-05-05', 'pagi', 'Rapat Koordinasi Kesekretariat', '-', '1'),
(5, 5, 6, '2018-05-03', '2018-05-04', 'pagi', 'Rapat Rutin', '-', '0'),
(6, 1, 6, '2018-05-10', '2018-05-10', 'pagi', 'Apa saja', '', '0'),
(7, 6, 3, '2018-05-12', '2018-05-18', 'siang', 'Yesh', '', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `options`
--

CREATE TABLE `options` (
  `id` int(1) NOT NULL,
  `nama_singkat` varchar(10) NOT NULL,
  `nama_panjang` varchar(50) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `options`
--

INSERT INTO `options` (`id`, `nama_singkat`, `nama_panjang`, `nama_tempat`, `alamat`) VALUES
(1, 'SiPeru', 'Sistem Pemesanan Ruang', 'PT. Makmur Jaya Sentosa', 'Jl. Kaligayam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(2) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','petugas') DEFAULT NULL,
  `id_bidang` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `id_bidang`) VALUES
(1, 'admin', '$2y$10$BjxB/TRFM5QabIhJ5Ax3z.q/MI6UakXfjyorn78Ifpc1wtJPbLjZq', 'admin', 0),
(2, 'sekretaris', '$2y$10$nYgEWuABdNYkwdJFiIx1GOJsLjcc2QkhwHHyYPyKe3BRxEDdHNKMK', 'petugas', 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_jadwal`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_jadwal` (
`id` int(11)
,`tgl_pemesanan` date
,`tgl_rapat` date
,`nama_bidang` varchar(50)
,`nama_ruang` varchar(30)
,`waktu_rapat` enum('pagi','siang')
,`nama_acara` varchar(50)
,`keterangan` text
,`status` enum('1','0')
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_jadwal`
--
DROP TABLE IF EXISTS `view_jadwal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_jadwal`  AS  select `jadwal_rapat`.`id` AS `id`,`jadwal_rapat`.`tgl_pemesanan` AS `tgl_pemesanan`,`jadwal_rapat`.`tgl_rapat` AS `tgl_rapat`,`data_bidang`.`nama` AS `nama_bidang`,`data_ruangan`.`nama` AS `nama_ruang`,`jadwal_rapat`.`waktu_rapat` AS `waktu_rapat`,`jadwal_rapat`.`nama_acara` AS `nama_acara`,`jadwal_rapat`.`keterangan` AS `keterangan`,`jadwal_rapat`.`status` AS `status` from ((`jadwal_rapat` join `data_bidang` on((`jadwal_rapat`.`id_bidang` = `data_bidang`.`id_bidang`))) join `data_ruangan` on((`jadwal_rapat`.`id_ruang` = `data_ruangan`.`id_ruang`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bidang`
--
ALTER TABLE `data_bidang`
  ADD PRIMARY KEY (`id_bidang`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `data_kepala_bidang`
--
ALTER TABLE `data_kepala_bidang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_kepala_bidang_ibfk_1` (`id_bidang`);

--
-- Indexes for table `data_ruangan`
--
ALTER TABLE `data_ruangan`
  ADD PRIMARY KEY (`id_ruang`),
  ADD UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `jadwal_rapat`
--
ALTER TABLE `jadwal_rapat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_rapat_ibfk_1` (`id_bidang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bidang`
--
ALTER TABLE `data_bidang`
  MODIFY `id_bidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `data_kepala_bidang`
--
ALTER TABLE `data_kepala_bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_ruangan`
--
ALTER TABLE `data_ruangan`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jadwal_rapat`
--
ALTER TABLE `jadwal_rapat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_kepala_bidang`
--
ALTER TABLE `data_kepala_bidang`
  ADD CONSTRAINT `data_kepala_bidang_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `data_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal_rapat`
--
ALTER TABLE `jadwal_rapat`
  ADD CONSTRAINT `jadwal_rapat_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `data_bidang` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_rapat_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `data_ruangan` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
