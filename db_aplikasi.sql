-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2019 at 01:29 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kelahiran`
--

CREATE TABLE `tabel_kelahiran` (
  `no_kelahiran` varchar(30) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `tempat_lahir1` varchar(20) NOT NULL,
  `tgl_lahir1` varchar(30) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kelahiran`
--

INSERT INTO `tabel_kelahiran` (`no_kelahiran`, `no_kk`, `nama_anak`, `tempat_lahir1`, `tgl_lahir1`, `jk`, `status`) VALUES
('4567', '89034567', 'Amir', 'Depok', '2019-06-09', 'L', 'Akte Sedang Diproses'),
('56718920', '3271234567890977', 'Rayhan', 'Depok', '2019-06-27', 'L', 'Akte Sudah Jadi'),
('671280310', '123567234', 'Robi', 'Depok', '2018-05-09', 'L', 'Akte Sudah Jadi'),
('77777', '1234577', 'Reja', 'Depok', '2019-08-09', 'L', 'Akte Belum Diurus');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kematian`
--

CREATE TABLE `tabel_kematian` (
  `no_kematian` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `tempat_mati` varchar(30) NOT NULL,
  `tgl_mati` varchar(30) NOT NULL,
  `sebab_mati` varchar(30) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kematian`
--

INSERT INTO `tabel_kematian` (`no_kematian`, `nik`, `tempat_mati`, `tgl_mati`, `sebab_mati`, `status`) VALUES
('234567', '23456789', 'Jakarta', '2019-09-08', 'Sakit', 'Akte Belum Diurus'),
('678964', '123457', 'Tangerang', '2019-12-01', 'Kecelakaan', 'Akte Sudah Jadi');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_kk`
--

CREATE TABLE `tabel_kk` (
  `no_kk` varchar(30) NOT NULL,
  `penghuni` varchar(10) NOT NULL,
  `jamsos` varchar(5) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_kk`
--

INSERT INTO `tabel_kk` (`no_kk`, `penghuni`, `jamsos`, `username`) VALUES
('12345678', 'Tetap', 'Tidak', 'amin678'),
('1234577', 'Tetap', 'Tidak', 'lukmanhakim'),
('123567234', 'Kontrak', 'Ya', 'ahmad12'),
('3271234567890977', 'Tetap', 'Tidak', 'warsito77'),
('3271234567890987', 'Tetap', 'Tidak', 'budi90987'),
('89034567', 'Tetap', 'Tidak', 'raffi123');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pemasukan`
--

CREATE TABLE `tabel_pemasukan` (
  `invoice_iuran` varchar(10) NOT NULL,
  `no_kk` varchar(30) NOT NULL,
  `nominal` int(50) NOT NULL,
  `bulan` varchar(20) NOT NULL,
  `tgl_bayar` varchar(30) NOT NULL,
  `jenis` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pemasukan`
--

INSERT INTO `tabel_pemasukan` (`invoice_iuran`, `no_kk`, `nominal`, `bulan`, `tgl_bayar`, `jenis`) VALUES
('LPBAS4', '1234577', 200000, 'Juli', '2019-07-09', 'Sumbangan'),
('NQP7H8', '3271234567890977', 25000, 'Juli', '2019-07-09', 'Iuran Kas Bulanan'),
('T1NS25', '123567234', 20000, 'Juni', '2019-06-27', 'Iuran Kas Bulanan'),
('VJXAC8', '12345678', 20000, 'Juni', '2019-06-27', 'Iuran Kas Bulanan'),
('VRE375', '1234577', 25000, 'Juli', '2019-07-09', 'Iuran Kas Bulanan');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pengeluaran`
--

CREATE TABLE `tabel_pengeluaran` (
  `id_pengeluaran` int(10) NOT NULL,
  `nama_pengeluaran` varchar(50) NOT NULL,
  `nominal` int(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `tgl_input` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_pengeluaran`
--

INSERT INTO `tabel_pengeluaran` (`id_pengeluaran`, `nama_pengeluaran`, `nominal`, `nik`, `keterangan`, `tgl_input`) VALUES
(7, 'Iuran Sampah', 100000, '12345', 'Iuran pengangkutan sampah rutin', '2019-07-09');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_surat`
--

CREATE TABLE `tabel_surat` (
  `invoice` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `jenis_surat` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_surat`
--

INSERT INTO `tabel_surat` (`invoice`, `username`, `jenis_surat`, `keterangan`, `status`) VALUES
('-', 'ahmad12', 'Permohonan Surat Pengantar KTP', '-', 'Belum Diproses'),
('0A4VBGQ8', 'lukmanhakim', 'KTP', 'fffgg', 'Belum Diproses'),
('3V9D2Q7F', 'warsito77', 'Lain-Lain', 'Permohonan Surat Pengantar SIUP', 'Sudah Dapat Diambil'),
('ADF78BH1', 'ahmad12', 'Permohonan Surat Pengantar SKCK', '-', 'Sudah Dapat Diambil');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_user`
--

CREATE TABLE `tabel_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_user`
--

INSERT INTO `tabel_user` (`username`, `password`, `level`) VALUES
('admin', 'admin123', 'admin'),
('ahmad12', 'ahmad123', 'warga'),
('amin678', 'amin890', 'warga'),
('budi90987', '12345678', 'warga'),
('lukmanhakim', 'lukmanhakim123', 'warga'),
('raffi123', 'raffi123', 'warga'),
('raffi23', 'raffi23', 'warga'),
('warsito77', 'warsito77', 'warga');

-- --------------------------------------------------------

--
-- Table structure for table `tabel_warga`
--

CREATE TABLE `tabel_warga` (
  `no_kk` varchar(30) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tgl_lahir` varchar(30) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `status_kawin` varchar(12) NOT NULL,
  `status_keluarga` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabel_warga`
--

INSERT INTO `tabel_warga` (`no_kk`, `nik`, `nama`, `jk`, `tempat_lahir`, `tgl_lahir`, `agama`, `pekerjaan`, `pendidikan`, `status_kawin`, `status_keluarga`) VALUES
('1234577', '122222', 'Dini R.', 'Wanita', 'Depok', '1982-09-08', 'Islam', 'PNS', 'S1', 'Kawin', 'Istri'),
('1234577', '12345', 'Lukman A.', 'Pria', 'Sidoarjo', '1980-06-07', 'Islam', 'Karyawan Swasta', 'S1', 'Kawin', 'Kepala Keluarga'),
('3271234567890977', '123457', 'Lastri W', 'Wanita', 'Surabaya', '1978-08-08', 'Islam', 'IRT', 'SMK', 'Kawin', 'Istri'),
('3271234567890977', '3271234567890975', 'Warsito', 'Pria', 'Semarang', '1957-12-01', 'Islam', 'PNS', 'SMA', 'Kawin', 'Kepala Keluarga'),
('3271234567890987', '3271234567890986', 'Budi', 'Pria', 'Jakarta', '1972-04-10', 'Islam', 'PNS', 'S1', 'Kawin', 'Kepala Keluarga'),
('3271234567890987', '3271234567890988', 'Wati', 'Wanita', 'Purwekerto', '1976-05-12', 'Islam', 'PNS', 'S1', 'Kawin', 'Istri'),
('3271234567890987', '9810737193', 'Lastri', 'Wanita', 'Depok', '1999-02-09', 'Islam', 'Karyawan Swasta', 'SMK', 'Belum Kawi', 'Anak'),
('89034567', '9870564', 'Raffi', 'Pria', 'Jakarta', '1980-09-08', 'Islam', 'PNS', 'S1', 'Kawin', 'Kepala Keluarga'),
('89034567', '9870565', 'Siska', 'P', 'Depok', '1983-09-05', 'Islam', 'PNS', 'S1', 'Kawin', 'Istri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_kelahiran`
--
ALTER TABLE `tabel_kelahiran`
  ADD PRIMARY KEY (`no_kelahiran`);

--
-- Indexes for table `tabel_kematian`
--
ALTER TABLE `tabel_kematian`
  ADD PRIMARY KEY (`no_kematian`);

--
-- Indexes for table `tabel_kk`
--
ALTER TABLE `tabel_kk`
  ADD PRIMARY KEY (`no_kk`);

--
-- Indexes for table `tabel_pemasukan`
--
ALTER TABLE `tabel_pemasukan`
  ADD PRIMARY KEY (`invoice_iuran`);

--
-- Indexes for table `tabel_pengeluaran`
--
ALTER TABLE `tabel_pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `tabel_surat`
--
ALTER TABLE `tabel_surat`
  ADD PRIMARY KEY (`invoice`);

--
-- Indexes for table `tabel_user`
--
ALTER TABLE `tabel_user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tabel_warga`
--
ALTER TABLE `tabel_warga`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_pengeluaran`
--
ALTER TABLE `tabel_pengeluaran`
  MODIFY `id_pengeluaran` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
