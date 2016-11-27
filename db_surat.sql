-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2016 at 03:45 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.24


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_biaya/phpmu_cost`
--

CREATE TABLE `phpmu_biaya` (
  `id_biaya` int(5) NOT NULL,
  `id_kegiatan` int(5) NOT NULL,
  `rincian_biaya` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_biaya/phpmu_cost`
--

INSERT INTO `phpmu_biaya` (`id_biaya`, `id_kegiatan`, `rincian_biaya`, `jumlah`, `keterangan`) VALUES
(1, 1, 'Daily Cost (11 Days x Rp 800.000)', 8800000, ''),
(2, 1, 'Transportation Cost', 8000000, ''),
(3, 1, 'Rest Cost (10 Days x Rp 700.000)', 7000000, ''),
(4, 1, 'Food Cost (10 Days x 100000)', 1000000, 'All member are 5 people.'),
(5, 2, 'Bussiness Trip Cost (5 People x 120000)', 600000, ''),
(6, 2, '3 times  for Food in a day (5 People x 30000)', 450000, '');

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_dasar/phpmu_basic`
--

CREATE TABLE `phpmu_dasar` (
  `id_dasar` int(5) NOT NULL,
  `id_kegiatan` int(5) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_dasar/phpmu_basic`
--

INSERT INTO `phpmu_dasar` (`id_dasar`, `id_kegiatan`, `keterangan`) VALUES
(1, 1, 'Decision of Finance Division of OPTiM, Co,Ltd about management and finance'),
(2, 1, 'Decision of Ministry of Finance for Government in 2016'),
(4, 11, 'Decision of Health Division of OPTiM about fighting Dengue Fever.'),
(5, 2, 'Decision of Ministry of Health and Education about healthy life'),
(6, 2, 'The rule from Government in 2016.');

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_golongan/phpmu_position`
--

CREATE TABLE `phpmu_golongan` (
  `id_golongan` int(5) NOT NULL,
  `golongan` varchar(10) NOT NULL,
  `nama_golongan` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_golongan/phpmu_position`
--

INSERT INTO `phpmu_golongan` (`id_golongan`, `golongan`, `nama_golongan`) VALUES
(1, 'III/a', 'Staf 1'),
(2, 'III/c', 'Staf 2'),
(3, 'III/b', 'Staf 3'),
(4, 'III/d', 'Staf 4'),
(5, 'I/c', 'Young Staf'),
(6, 'II/c', 'Junior Staf');

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_karyawan/phpmu_employeer`
--

CREATE TABLE `phpmu_karyawan` (
  `id_karyawan` int(10) UNSIGNED NOT NULL,
  `id_golongan` int(5) NOT NULL,
  `nip_karyawan` varchar(45) NOT NULL,
  `nama_karyawan` varchar(255) NOT NULL DEFAULT '-',
  `jabatan_karyawan` varchar(255) NOT NULL DEFAULT '-',
  `kota_karyawan` varchar(45) NOT NULL DEFAULT '-'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_karyawan/phpmu_employeer`
--

INSERT INTO `phpmu_karyawan` (`id_karyawan`, `id_golongan`, `nip_karyawan`, `nama_karyawan`, `jabatan_karyawan`, `kota_karyawan`) VALUES
(1, 1, '198404042010122003', 'Yamada', 'Technology and Support', 'Kyoto'),
(3, 2, '198805272009122001', 'Tanaka', 'Bussiness and Economy', 'Tokyo'),
(4, 3, '197806092005011003', 'Yuki', 'Operator', 'Shinjuku'),
(5, 3, '198704072010122002', 'Yuuta', 'Management', 'Osaka'),
(7, 2, '197001261990011001', 'Tommy Utama', 'Network Operator', 'Fukushima'),
(8, 1, '198107042003121003', 'Willy', 'Health Staff', 'Hiroshima'),
(14, 2, '198312022010122002', 'Yamamoto kaori', 'International Relation', 'Nagasaki');

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_kegiatan/phpmu_activity`
--

CREATE TABLE `phpmu_kegiatan` (
  `id_kegiatan` int(10) UNSIGNED NOT NULL,
  `no_kegiatan` varchar(45) NOT NULL,
  `mata_anggaran` varchar(45) NOT NULL DEFAULT '-',
  `no_bukti` varchar(100) NOT NULL,
  `tahun_anggaran` varchar(45) NOT NULL DEFAULT '-',
  `nama_kegiatan` text NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `tempat_kegiatan` varchar(255) NOT NULL DEFAULT '-',
  `biaya` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_kegiatan/phpmu_activity`
--

INSERT INTO `phpmu_kegiatan` (`id_kegiatan`, `no_kegiatan`, `mata_anggaran`, `no_bukti`, `tahun_anggaran`, `nama_kegiatan`, `tgl_mulai`, `tgl_akhir`, `tempat_kegiatan`, `biaya`) VALUES
(1, '001.022125.0122/15155/01', '0176.0225.00215', '', '2016', 'Decision of Management and Finance', '2016-10-1', '2016-10-06', 'Fukushima', 'Management  and Finance of OPTiM, co,Ltd'),
(2, '002.031041.0122541/1501', '2063.050.524219', '', '2016', 'Implementation of Official Leader', '2016-10-1', '2016-10-06', 'Kyoto', 'Finance Division 2016'),
(11, '001.022125.0122/15155/23', '0176.0225.00216', '', '2016', 'Fighting of Dengue Fever', '2016-2-26', '2016-2-28', 'Padang', 'Health Division 2016');

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_pelaksana/phpmu_implementor`
--

CREATE TABLE `phpmu_pelaksana` (
  `id_pelaksana` int(10) UNSIGNED NOT NULL,
  `id_karyawan` int(10) UNSIGNED NOT NULL,
  `id_kegiatan` int(3) NOT NULL,
  `ket_pelaksana` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_pelaksana/phpmu_implementor`
--

INSERT INTO `phpmu_pelaksana` (`id_pelaksana`, `id_karyawan`, `id_kegiatan`, `ket_pelaksana`) VALUES
(8, 2, 2, ''),
(9, 1, 2, ''),
(10, 5, 1, ''),
(11, 2, 1, ''),
(12, 4, 2, ''),
(13, 7, 1, ''),
(15, 3, 1, ''),
(17, 3, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_pengikut/phpmu_follower`
--

CREATE TABLE `phpmu_pengikut` (
  `id_pengikut` int(5) NOT NULL,
  `id_pelaksana` int(5) NOT NULL,
  `id_karyawan` int(5) NOT NULL,
  `nama_pengikut` varchar(100) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_pengikut/phpmu_follower`
--

INSERT INTO `phpmu_pengikut` (`id_pengikut`, `id_pelaksana`, `id_karyawan`, `nama_pengikut`, `keterangan`) VALUES
(4, 13, 0, 'Smith', 'Otousan'),
(2, 10, 0, 'Watanabe', 'Aneesan'),
(3, 13, 14, '', ''),
(5, 9, 8, '', ''),
(6, 12, 0, 'Yan', 'oneesan'),
(7, 12, 7, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `phpmu_user`
--

CREATE TABLE `phpmu_user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `alamat_email` varchar(150) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `alamat_lengkap` text NOT NULL,
  `level` varchar(20) NOT NULL DEFAULT 'biasa',
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `waktu_daftar` datetime NOT NULL,
  `unit_kerja` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `phpmu_user`
--

INSERT INTO `phpmu_user` (`id_user`, `username`, `password`, `nama_lengkap`, `alamat_email`, `no_telpon`, `alamat_lengkap`, `level`, `status`, `waktu_daftar`, `unit_kerja`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Josua Antonius Naiborhu', 'josua.naiborhu94@gmail.com', '(+62)81293104630', 'Kober, Depok, West Java', 'user_admin', 'Y', '2015-06-03 00:00:00', '0'),
(2, 'josua', '8d05dd2f03981f86b56c23951f3f34d7', 'Josua Antonius', 'josua.naiborhu94@gmail.com', '(+62)81267771344', 'Hiroshima, Nagasaki, Japan', 'user_input', 'Y', '2015-06-03 00:00:00', 'F'),
(3, 'yan', 'ed1d859c50262701d92e5cbf39652792', 'Yan', 'yan.san@gmail.com', '(+62)87305450112', 'Shinjuku, Tokyo, Japan', 'user_biasa', 'Y', '2015-06-03 00:00:00', 'B'),
(4, 'watanabe', '6bec9c852847242e384a4d5ac0962ba0', 'Watanabe', 'watanabe.san@gmail.com', '(+62)81267771390', 'Kyoto, District, japan', 'user_biasa', 'Y', '2015-06-04 08:03:18', 'C'),
(5, 'amel', 'da0e22de18e3fbe1e96bdc882b912ea4', 'Amel Amelia', 'amel.amelia@gmail.com', '(+62)81289701234', 'Fukushima, District, Japan', 'user_input', 'Y', '0000-00-00 00:00:00', 'D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `phpmu_biaya/phpmu_cost`
--
ALTER TABLE `phpmu_biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `phpmu_dasar/phpmu_basic`
--
ALTER TABLE `phpmu_dasar`
  ADD PRIMARY KEY (`id_dasar`);

--
-- Indexes for table `phpmu_golongan/phpmu_position`
--
ALTER TABLE `phpmu_golongan`
  ADD PRIMARY KEY (`id_golongan`);

--
-- Indexes for table `phpmu_karyawan/phpmu_employeer`
--
ALTER TABLE `phpmu_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `phpmu_kegiatan/phpmu_activity`
--
ALTER TABLE `phpmu_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `phpmu_pelaksana/phpmu_implementor`
--
ALTER TABLE `phpmu_pelaksana`
  ADD PRIMARY KEY (`id_pelaksana`);

--
-- Indexes for table `phpmu_pengikut/phpmu_follower`
--
ALTER TABLE `phpmu_pengikut`
  ADD PRIMARY KEY (`id_pengikut`);

--
-- Indexes for table `phpmu_user`
--
ALTER TABLE `phpmu_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `phpmu_biaya/phpmu_cost`
--
ALTER TABLE `phpmu_biaya`
  MODIFY `id_biaya` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `phpmu_dasar/phpmu_basic`
--
ALTER TABLE `phpmu_dasar`
  MODIFY `id_dasar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `phpmu_golongan/phpmu_position`
--
ALTER TABLE `phpmu_golongan`
  MODIFY `id_golongan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phpmu_karyawan/phpmu_employeer`
--
ALTER TABLE `phpmu_karyawan`
  MODIFY `id_karyawan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `phpmu_kegiatan/phpmu_activity`
--
ALTER TABLE `phpmu_kegiatan`
  MODIFY `id_kegiatan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `phpmu_pelaksana/phpmu_implementor`
--
ALTER TABLE `phpmu_pelaksana`
  MODIFY `id_pelaksana` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `phpmu_pengikut/phpmu_follower`
--
ALTER TABLE `phpmu_pengikut`
  MODIFY `id_pengikut` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `phpmu_user`
--
ALTER TABLE `phpmu_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
