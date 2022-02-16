-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2022 at 08:20 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psb`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_admin` varchar(255) DEFAULT NULL,
  `role_user` varchar(255) DEFAULT NULL,
  `id_user` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`Id`, `email`, `password`, `nama_admin`, `role_user`, `id_user`) VALUES
(2, 'admin@gmail.com', '$2y$10$AIxith3klXwMIMT/t3CpHOasClDF8l1JWV66U1zob78mXT4wksaJq', 'Riyan', '0', NULL),
(23, 'rezanithe88@gmail.com', '$2y$10$w1tOUSq.HlaGvGQ48Jh7Qui/Ljx2HlmvhsVtCahWSWPgitkw8fDvO', '', '1', 12),
(24, 'azmifadillah25@gmail.com', '$2y$10$gYlTpW0vYVNRrioL4LiJHuKAXzkVe1IaooHuNTuANvcb9G3MlyL4a', 'AZMI', '0', NULL),
(25, 'yamayam88@gmail.com', '$2y$10$Ujkl7rx5RYCYOJ5jG5EM1ON5wnSV2cVzRGiODbrSMw7SMCNnAW0ka', '', '1', 13),
(26, 'gabutnyaa88@gmail.com', '$2y$10$lzN15EqLc0VrpMcbogPiuuqTqQHRDroagihtHOZLwkNrUVQAvGii2', '', '1', 14);

-- --------------------------------------------------------

--
-- Table structure for table `detail_pendaftaran`
--

CREATE TABLE `detail_pendaftaran` (
  `Id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_pembimbing` int(11) DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `status_pendaftaran` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pendaftaran`
--

INSERT INTO `detail_pendaftaran` (`Id`, `id_user`, `id_admin`, `id_pembimbing`, `tanggal_daftar`, `status_pendaftaran`) VALUES
(11, 12, 24, 2, '2022-02-09', '1'),
(12, 13, 24, 1, '2022-02-11', '1'),
(13, 14, 24, NULL, '2022-02-09', '2');

-- --------------------------------------------------------

--
-- Table structure for table `dinas`
--

CREATE TABLE `dinas` (
  `Id` int(11) NOT NULL,
  `nama_dinas` varchar(150) NOT NULL,
  `nama_bidang` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dinas`
--

INSERT INTO `dinas` (`Id`, `nama_dinas`, `nama_bidang`) VALUES
(1, 'Dinas Komunikasi Informatika dan Statistik Kota Banjarmasin', 'Sekretariat'),
(2, 'Dinas Komunikasi Informatika dan Statistik Kota Banjarmasin', 'Pengembang Aplikasi');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `senin` text NOT NULL,
  `selasa` text NOT NULL,
  `rabu` text NOT NULL,
  `kamis` text NOT NULL,
  `jumat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `id_dinas`, `senin`, `selasa`, `rabu`, `kamis`, `jumat`) VALUES
(1, 2, 'Briefing', 'Praktek Pengembangan Aplikasi', 'Praktek Pengembangan Aplikasi', 'Briefing', 'Praktek Pengembangan Aplikasi'),
(2, 1, 'Pengarsipan', 'Pengetikan', 'Pengetikan', 'Pembagian', 'Pengarsipan');

-- --------------------------------------------------------

--
-- Table structure for table `pembimbing`
--

CREATE TABLE `pembimbing` (
  `Id` int(11) NOT NULL,
  `nama_pembimbing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembimbing`
--

INSERT INTO `pembimbing` (`Id`, `nama_pembimbing`) VALUES
(1, 'Pembimbing 1'),
(2, 'Pembimbing 2');

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `Id` int(11) NOT NULL,
  `nik` char(25) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nama_panggilan` varchar(50) DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` char(1) DEFAULT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `nama_akademik` varchar(200) NOT NULL,
  `jurusan_akademik` varchar(200) NOT NULL,
  `alamat_akademik` text NOT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_dinas` int(11) NOT NULL,
  `nama_ayah` varchar(255) DEFAULT NULL,
  `tempat_lahir_ayah` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ayah` date DEFAULT NULL,
  `pekerjaan_ayah` varchar(255) DEFAULT NULL,
  `telp_ayah` varchar(15) DEFAULT NULL,
  `nama_ibu` varchar(255) DEFAULT NULL,
  `tempat_lahir_ibu` varchar(255) DEFAULT NULL,
  `tanggal_lahir_ibu` date DEFAULT NULL,
  `pekerjaan_ibu` varchar(255) DEFAULT NULL,
  `telp_ibu` varbinary(15) DEFAULT NULL,
  `upload_surat` varchar(255) DEFAULT NULL,
  `upload_foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`Id`, `nik`, `nama`, `nama_panggilan`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `telepon`, `alamat`, `nama_akademik`, `jurusan_akademik`, `alamat_akademik`, `tgl_masuk`, `tgl_keluar`, `id_dinas`, `nama_ayah`, `tempat_lahir_ayah`, `tanggal_lahir_ayah`, `pekerjaan_ayah`, `telp_ayah`, `nama_ibu`, `tempat_lahir_ibu`, `tanggal_lahir_ibu`, `pekerjaan_ibu`, `telp_ibu`, `upload_surat`, `upload_foto`) VALUES
(12, '6371042510990010', 'Azmi Fadillah', 'Azmi', 'Banjarmasin', '1999-10-25', 'L', '085654786069', 'Jalan Kuin Utara', 'POLITEKNIK NEGERI BANJARMASIN', 'MANAJEMEN INFORMATIKA', 'JALAN ULM', '2022-02-08', '2022-03-08', 1, 'Muhammad Saleh', 'Negara', '1966-10-02', 'ASN', '082251023085', 'Wardiatul Azizah', 'Amuntai', '1976-02-06', 'IRT', 0x303839393939313139393131, '06-02-10app.PNG', '06-02-10install corel.PNG'),
(13, '6371020202020020', 'Dhea', 'D', 'Satui', '2002-02-13', 'P', '085383229011', 'Jalan Jalan', 'Univertias Apa', 'Teknik Informatika', 'Jalan Kan', '2022-02-09', '2022-03-09', 1, 'Rosadi', 'Banjarmasin', '1980-11-13', 'HR', '085644549930', 'Yustin', 'Nganjuk', '1980-12-08', 'Investor', 0x303839393939313139393131, '07-02-551.PNG', '07-02-482.PNG'),
(14, '1238812388123', 'M Samad', 'Mad', 'Palu', '1998-01-03', 'L', '086766798898', 'Jalanin ni ai dulu', 'UNISKA', 'TI', 'JL. ADIYAKSA', '2022-02-09', '2022-03-09', 2, 'Ahmed', 'Kapuas', '1980-01-01', 'Professor', '081288883288', 'Siti', 'Majalengka', '1980-02-01', 'Chef', 0x303835323737323737373132, '08-02-09contoh.png', '08-02-17AzmiFadillah.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`);

--
-- Indexes for table `detail_pendaftaran`
--
ALTER TABLE `detail_pendaftaran`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pembimbing`
--
ALTER TABLE `pembimbing`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `detail_pendaftaran`
--
ALTER TABLE `detail_pendaftaran`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dinas`
--
ALTER TABLE `dinas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pembimbing`
--
ALTER TABLE `pembimbing`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `akun_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_pendaftaran`
--
ALTER TABLE `detail_pendaftaran`
  ADD CONSTRAINT `detail_pendaftaran_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `pendaftaran` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pendaftaran_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `akun` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
