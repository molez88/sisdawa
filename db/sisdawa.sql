-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2017 at 04:48 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sisdawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` int(2) NOT NULL,
  `agama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `agama`) VALUES
(10, 'Islam');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(3) NOT NULL,
  `nm_kelas` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nm_kelas`) VALUES
(6, 'VIIA'),
(7, 'VIIB'),
(8, 'VIIC'),
(9, 'VIIIA'),
(10, 'VIIIB'),
(11, 'VIIIC'),
(12, 'IXA'),
(13, 'IXB'),
(14, 'IXC');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pekerjaan` int(2) NOT NULL,
  `nama_pekerjaan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Tidak Bekerja'),
(2, 'Ibu Rumah Tangga'),
(3, 'Karyawan Swasta'),
(4, 'Pegawai Negeri'),
(5, 'TNI / Polri'),
(6, 'Pejabat Negara / Daerah'),
(7, 'Pensiunan'),
(8, 'Wiraswasta'),
(9, 'Pedagang'),
(10, 'Pengusaha Jasa'),
(11, 'Dokter'),
(12, 'Bidan'),
(13, 'Pengacara'),
(14, 'Guru'),
(15, 'Akuntan'),
(16, 'Wartawan'),
(17, 'lainya'),
(18, 'Seniman'),
(19, 'Sopir'),
(20, 'Buruh'),
(21, 'Petani'),
(22, 'Nelayan'),
(23, 'Kuli'),
(24, 'Notaris'),
(25, 'PNS'),
(26, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id_pendidikan` int(1) NOT NULL,
  `nama_pendidikan` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id_pendidikan`, `nama_pendidikan`) VALUES
(1, 'Tidak Sekolah'),
(2, 'SD / Sederajat'),
(3, 'SMP / Sederajat'),
(4, 'SMA / Sederajat'),
(5, 'Strata 1'),
(6, 'Strata 2'),
(7, 'Strata 3');

-- --------------------------------------------------------

--
-- Table structure for table `penghasilan`
--

CREATE TABLE `penghasilan` (
  `id_penghasilan` int(2) NOT NULL,
  `penghasilan` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penghasilan`
--

INSERT INTO `penghasilan` (`id_penghasilan`, `penghasilan`) VALUES
(1, 'Kurang dari Rp. 750.000,-'),
(2, 'Rp. 750.000,- s/d Rp. 1.500.000,-'),
(3, 'Rp. 1.500.000,- s/d Rp. 2.500.000,-'),
(4, 'Rp. 2.500.000,- s/d Rp. 5.000.000,-'),
(5, 'Rp. 5.000.000,- s/d Rp. 10.000.000,-'),
(6, 'Lebih dari Rp. 10.000.000,00');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `nis` char(4) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `id_agama` int(2) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `status_dakel` enum('Anak Kandung','Anak Tiri','Anak Angkat') NOT NULL,
  `riwayat_kesehatan` varchar(255) NOT NULL,
  `anak_ke` int(2) NOT NULL,
  `jml_saudara` int(3) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto_siswa` varchar(255) DEFAULT NULL,
  `thn_masuk` year(4) NOT NULL,
  `kps` enum('Ya','Tidak') DEFAULT NULL,
  `kkm` enum('Ya','Tidak') DEFAULT NULL,
  `kip` enum('Ya','Tidak') DEFAULT NULL,
  `kms` enum('Ya','Tidak') DEFAULT NULL,
  `kks` enum('Ya','Tidak') DEFAULT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `nama_lengkap`, `gender`, `id_agama`, `tempat_lahir`, `tgl_lahir`, `status_dakel`, `riwayat_kesehatan`, `anak_ke`, `jml_saudara`, `alamat`, `telp`, `email`, `foto_siswa`, `thn_masuk`, `kps`, `kkm`, `kip`, `kms`, `kks`, `tgl`) VALUES
('3212', 'Yui', 'P', 10, 'Lahat', '2017-07-19', 'Anak Tiri', 'sehat', 3, 2, 'Lahat', '4234324434', '', NULL, 2021, 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', '2017-07-11 21:17:04'),
('2323', 'Hudan', 'L', 10, 'Tokyo', '2017-06-14', 'Anak Angkat', 'sakit', 2, 2, 'tokyo', '0838080213', '', 'gambar-11072017231516.jpg', 2026, 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', '2017-06-30 11:01:42');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_ortu`
--

CREATE TABLE `siswa_ortu` (
  `id_siswa_ortu` int(10) NOT NULL,
  `nis` char(4) NOT NULL,
  `ayah_nama` varchar(50) NOT NULL,
  `nik_ayah` varchar(50) NOT NULL,
  `ayah_tempat_lahir` varchar(50) NOT NULL,
  `ayah_tgl_lahir` date NOT NULL,
  `ayah_id_agama` int(2) NOT NULL,
  `ayah_id_pendidikan` int(2) NOT NULL,
  `ayah_id_pekerjaan` int(2) NOT NULL,
  `ayah_id_penghasilan` int(2) NOT NULL,
  `ayah_alamat` text NOT NULL,
  `ayah_telp` varchar(15) NOT NULL,
  `ibu_nama` varchar(50) NOT NULL,
  `nik_ibu` varchar(50) NOT NULL,
  `ibu_tempat_lahir` varchar(50) NOT NULL,
  `ibu_tgl_lahir` date NOT NULL,
  `ibu_id_agama` int(2) NOT NULL,
  `ibu_id_pendidikan` int(2) NOT NULL,
  `ibu_id_pekerjaan` int(2) NOT NULL,
  `ibu_id_penghasilan` int(2) NOT NULL,
  `ibu_alamat` varchar(50) NOT NULL,
  `ibu_telp` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_ortu`
--

INSERT INTO `siswa_ortu` (`id_siswa_ortu`, `nis`, `ayah_nama`, `nik_ayah`, `ayah_tempat_lahir`, `ayah_tgl_lahir`, `ayah_id_agama`, `ayah_id_pendidikan`, `ayah_id_pekerjaan`, `ayah_id_penghasilan`, `ayah_alamat`, `ayah_telp`, `ibu_nama`, `nik_ibu`, `ibu_tempat_lahir`, `ibu_tgl_lahir`, `ibu_id_agama`, `ibu_id_pendidikan`, `ibu_id_pekerjaan`, `ibu_id_penghasilan`, `ibu_alamat`, `ibu_telp`) VALUES
(19, '3212', 'dffdsf', '', 'sdfdfds', '2017-07-26', 10, 2, 1, 2, 'dfdfsdf', '4342343', 'fdfdfsdf', '', 'sddsa', '2017-07-04', 10, 2, 2, 2, 'dddsf', '3432432'),
(18, '2323', 'Yuo', '', 'fsdfdsf', '2017-06-20', 10, 2, 2, 2, 'sdfdfs', '5345435', 'fdsfdsf', '', 'dfdsfsdf', '2017-07-07', 10, 2, 2, 2, 'dfsdfdsf', '35343432432');

-- --------------------------------------------------------

--
-- Table structure for table `siswa_wali`
--

CREATE TABLE `siswa_wali` (
  `id_wali` int(4) NOT NULL,
  `nis` char(4) NOT NULL,
  `wali_nama` varchar(50) NOT NULL,
  `nik_wali` varchar(50) NOT NULL,
  `wali_tempat_lahir` varchar(50) NOT NULL,
  `wali_tgl_lahir` date NOT NULL,
  `wali_id_agama` int(2) NOT NULL,
  `wali_id_pendidikan` int(2) DEFAULT NULL,
  `wali_id_pekerjaan` int(2) DEFAULT NULL,
  `wali_id_penghasilan` int(2) NOT NULL,
  `wali_alamat` varchar(50) NOT NULL,
  `wali_notelp` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa_wali`
--

INSERT INTO `siswa_wali` (`id_wali`, `nis`, `wali_nama`, `nik_wali`, `wali_tempat_lahir`, `wali_tgl_lahir`, `wali_id_agama`, `wali_id_pendidikan`, `wali_id_pekerjaan`, `wali_id_penghasilan`, `wali_alamat`, `wali_notelp`) VALUES
(18, '3212', 'ffdfsdf', '', 'dfdsf', '2017-07-26', 10, 2, 1, 2, 'dfdfs', '2343423'),
(17, '2323', 'dfdfdsdf', '', 'dfdfsd', '2017-07-07', 10, 2, 2, 2, 'fdsfdsf', '534543');

-- --------------------------------------------------------

--
-- Table structure for table `th_akademik`
--

CREATE TABLE `th_akademik` (
  `id_th_akademik` int(2) NOT NULL,
  `th_ajaran` varchar(50) NOT NULL,
  `keterangan` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `th_akademik`
--

INSERT INTO `th_akademik` (`id_th_akademik`, `th_ajaran`, `keterangan`) VALUES
(26, '2000/2001', 'Ganjil'),
(27, '2001/2002', 'Genap'),
(28, '2002/2003', 'Ganjil'),
(29, '2003/2004', 'Genap');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_kelas`
--

CREATE TABLE `transaksi_kelas` (
  `id_transaksi_kelas` int(2) NOT NULL,
  `id_th_akademik` int(2) NOT NULL,
  `id_kelas` int(3) NOT NULL,
  `nis` char(4) NOT NULL,
  `tgl` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_kelas`
--

INSERT INTO `transaksi_kelas` (`id_transaksi_kelas`, `id_th_akademik`, `id_kelas`, `nis`, `tgl`) VALUES
(35, 26, 6, '3212', '2017-07-11 21:26:22'),
(36, 27, 9, '3212', '2017-07-11 21:26:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `level` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `email`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Mukhlis Muas', 'molez88@gmail.com', 'admin'),
(2, 'wahwah', 'cf5a7c1819d3a998a228bbae64229aa2', 'Sri Wahyuni', 'wahwa@gmail.com', 'operator'),
(3, 'mmm', 'a9b04dd9ee5f617f32d4c06c2797e76b', 'Muas muas', 'muasx@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `penghasilan`
--
ALTER TABLE `penghasilan`
  ADD PRIMARY KEY (`id_penghasilan`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_agama` (`id_agama`);

--
-- Indexes for table `siswa_ortu`
--
ALTER TABLE `siswa_ortu`
  ADD PRIMARY KEY (`id_siswa_ortu`),
  ADD KEY `ayah_id_agama` (`ayah_id_agama`),
  ADD KEY `ayah_id_pendidikan` (`ayah_id_pendidikan`),
  ADD KEY `ayah_id_pekerjaan` (`ayah_id_pekerjaan`),
  ADD KEY `ayah_id_penghasilan` (`ayah_id_penghasilan`),
  ADD KEY `ibu_id_agama` (`ibu_id_agama`),
  ADD KEY `ibu_id_pendidikan` (`ibu_id_pendidikan`),
  ADD KEY `ibu_id_pekerjaan` (`ibu_id_pekerjaan`),
  ADD KEY `siswa_id` (`nis`);

--
-- Indexes for table `siswa_wali`
--
ALTER TABLE `siswa_wali`
  ADD PRIMARY KEY (`id_wali`),
  ADD KEY `wali_id_agama` (`wali_id_agama`),
  ADD KEY `wali_id_pendidikan` (`wali_id_pendidikan`),
  ADD KEY `wali_id_pekerjaan` (`wali_id_pekerjaan`),
  ADD KEY `wali_id_penghasilan` (`wali_id_penghasilan`),
  ADD KEY `siswa_id` (`nis`);

--
-- Indexes for table `th_akademik`
--
ALTER TABLE `th_akademik`
  ADD PRIMARY KEY (`id_th_akademik`);

--
-- Indexes for table `transaksi_kelas`
--
ALTER TABLE `transaksi_kelas`
  ADD PRIMARY KEY (`id_transaksi_kelas`),
  ADD KEY `id_th_akademik` (`id_th_akademik`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `siswa_id` (`nis`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agama`
--
ALTER TABLE `agama`
  MODIFY `id_agama` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pekerjaan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id_pendidikan` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penghasilan`
--
ALTER TABLE `penghasilan`
  MODIFY `id_penghasilan` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `siswa_ortu`
--
ALTER TABLE `siswa_ortu`
  MODIFY `id_siswa_ortu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `siswa_wali`
--
ALTER TABLE `siswa_wali`
  MODIFY `id_wali` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `th_akademik`
--
ALTER TABLE `th_akademik`
  MODIFY `id_th_akademik` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `transaksi_kelas`
--
ALTER TABLE `transaksi_kelas`
  MODIFY `id_transaksi_kelas` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
