-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 05:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nova_pembayaransekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id_keb` int(11) NOT NULL,
  `jenis_keb` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`id_keb`, `jenis_keb`, `harga`, `deskripsi`) VALUES
(6, 'Biaya Perlengkapan Pendidikan - AGS - 2016/207', '50000', 'Tunjangan dana pendidikan bulan Agustus'),
(7, 'Daftar Ulang', '975000', 'Administrasi daftar ulang untuk calon pserta didik baru');

-- --------------------------------------------------------

--
-- Table structure for table `logging_siswa`
--

CREATE TABLE `logging_siswa` (
  `id_logsis` int(12) NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal-waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logging_siswa`
--

INSERT INTO `logging_siswa` (`id_logsis`, `status`, `tanggal-waktu`, `nama`) VALUES
(1, 'Tambah Data', '2023-11-21 03:59:04', 'Arya Syauqila'),
(2, 'Hapus Data', '2023-11-21 04:01:12', ''),
(3, 'Tambah Data', '2023-11-21 07:55:03', 'Naufa Asyiqa'),
(4, 'Update Data', '2023-11-22 02:20:34', 'hsdhgfsd'),
(5, 'Update Data', '2023-11-22 02:20:48', 'Arya Syauqila'),
(6, 'Hapus Data', '2023-11-22 02:55:41', 'noar'),
(7, 'Hapus Data', '2023-11-22 03:52:44', 'araa'),
(8, 'Update Data', '2023-11-22 04:03:41', 'Fahsya Acitra'),
(9, 'Tambah Data', '2023-11-24 08:01:02', 'pa heri'),
(10, 'Tambah Data', '2024-02-24 03:52:54', 'asya');

-- --------------------------------------------------------

--
-- Table structure for table `logging_transaksi`
--

CREATE TABLE `logging_transaksi` (
  `id_logtrans` int(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `no_transaksi` int(12) NOT NULL,
  `id_keb` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `id_operator` int(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `logging_transaksi`
--

INSERT INTO `logging_transaksi` (`id_logtrans`, `status`, `waktu`, `no_transaksi`, `id_keb`, `id_siswa`, `id_operator`) VALUES
(1, 'Tambah Data', '2023-11-21 08:07:10', 534668787, 6, 10, 1),
(2, 'Tambah Data', '2023-11-21 08:13:39', 2147483647, 7, 5, 1),
(3, 'Update Data', '2023-11-22 02:53:21', 2147483647, 7, 9, 1),
(4, 'Update Data', '2023-11-22 02:53:24', 2147483647, 7, 5, 1),
(5, 'Tambah Data', '2023-11-22 02:54:04', 2147483647, 6, 11, 1),
(6, 'Tambah Data', '2023-11-22 03:55:28', 2147483647, 8, 11, 2),
(7, 'Update Data', '2023-11-22 03:59:41', 2147483647, 6, 5, 1),
(8, 'Update Data', '2023-11-22 04:01:27', 2147483647, 8, 10, 2),
(9, 'Update Data', '2023-11-22 04:03:17', 2147483647, 6, 11, 1),
(10, 'Tambah Data', '2023-11-24 07:59:02', 12345, 7, 10, 2),
(11, 'Tambah Data', '2023-11-24 08:01:52', 12677799, 6, 12, 3),
(12, 'Update Data', '2023-11-24 09:09:23', 2147483647, 6, 11, 1),
(13, 'Update Data', '2024-02-24 03:53:56', 12677799, 6, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE `operator` (
  `id_operator` int(12) NOT NULL,
  `nip_operator` int(12) NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki') NOT NULL,
  `nama_operator` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id_operator`, `nip_operator`, `jenis_kelamin`, `nama_operator`) VALUES
(1, 987654, 'perempuan', 'sintiya'),
(2, 2147483647, 'laki-laki', 'Kharisma Guntoro'),
(3, 234567890, 'perempuan', 'Sasa Santan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(12) NOT NULL,
  `nis_siswa` int(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kelas` varchar(255) NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis_siswa`, `nama`, `kelas`, `jenis_kelamin`) VALUES
(5, 987654321, 'Fahsya Acitra', 'XII PPLG 2', 'laki-laki'),
(10, 2147483647, 'Arya Syauqila', 'XII PPLG 1', 'perempuan'),
(11, 1272371, 'Naufa Asyiqa', 'XII AKL 1', 'perempuan'),
(12, 123467, 'pa heri', '12 pplg 2', 'laki-laki'),
(13, 67125137, 'asya', '12', 'laki-laki');

--
-- Triggers `siswa`
--
DELIMITER $$
CREATE TRIGGER `add` AFTER INSERT ON `siswa` FOR EACH ROW INSERT INTO logging_siswa (STATUS,nama) VALUES ('Tambah Data',new.nama)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del` BEFORE DELETE ON `siswa` FOR EACH ROW INSERT INTO logging_siswa (STATUS,nama) VALUES ('Hapus Data',old.nama)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upd` AFTER UPDATE ON `siswa` FOR EACH ROW INSERT INTO logging_siswa (STATUS,nama) VALUES ('Update Data',new.nama)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_login`
--

CREATE TABLE `tb_login` (
  `id` int(12) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('operator','admin','kepala_sekolah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tb_login`
--

INSERT INTO `tb_login` (`id`, `username`, `password`, `level`) VALUES
(2, 'operator', '$2y$10$mmN.aChoPxAFnnIXZAWwUeI5.vpI6BUB0kj8DwPjAyZuN9jCeXJ/.', 'operator'),
(3, 'admin', '$2y$10$Lkg/QY70I5QgHM5lTUMlzeVmeEIr3DuFKMzFroYN6CqsG/ic2mH1W', 'admin'),
(4, 'kepala_sekolah', '$2y$10$P7MONagdcn/uYT0/XF7ILOgROT4a5Q6dDARhD2gYrSGNHsxwDtIlK', 'kepala_sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(12) NOT NULL,
  `id_keb` int(12) NOT NULL,
  `no_transaksi` int(12) NOT NULL,
  `id_siswa` int(12) NOT NULL,
  `id_operator` int(12) NOT NULL,
  `tanggal_waktu` datetime NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `uang_bayar` varchar(200) NOT NULL,
  `sisa_bayar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_keb`, `no_transaksi`, `id_siswa`, `id_operator`, `tanggal_waktu`, `tempat`, `uang_bayar`, `sisa_bayar`) VALUES
(8, 6, 534668787, 10, 1, '2023-11-21 03:17:09', 'Depok', '8000000', '200000'),
(10, 6, 2147483647, 11, 1, '2023-11-24 10:09:23', 'Lumajang', '30000', '20000'),
(12, 7, 12345, 10, 2, '2023-11-24 08:59:02', 'Depok', '900000', '75000'),
(13, 6, 12677799, 10, 3, '2024-02-24 04:53:56', 'Depok', '45000', '5000');

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `add-tra` AFTER INSERT ON `transaksi` FOR EACH ROW INSERT INTO logging_transaksi (STATUS,no_transaksi,id_keb,id_siswa,id_operator) VALUES ('Tambah Data',new.no_transaksi,new.id_keb,new.id_siswa,new.id_operator)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `del-tra` BEFORE DELETE ON `transaksi` FOR EACH ROW INSERT INTO logging_transaksi (STATUS,no_transaksi,id_keb,id_siswa,id_operator) VALUES ('Hapus Data',old.no_transaksi,old.id_keb,old.id_siswa,old.id_operator)
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `upd-tra` AFTER UPDATE ON `transaksi` FOR EACH ROW INSERT INTO logging_transaksi (STATUS,no_transaksi,id_keb,id_siswa,id_operator) VALUES ('Update Data',new.no_transaksi,new.id_keb,new.id_siswa,new.id_operator)
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id_keb`);

--
-- Indexes for table `logging_siswa`
--
ALTER TABLE `logging_siswa`
  ADD PRIMARY KEY (`id_logsis`);

--
-- Indexes for table `logging_transaksi`
--
ALTER TABLE `logging_transaksi`
  ADD PRIMARY KEY (`id_logtrans`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_operator`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indexes for table `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_operator` (`id_operator`),
  ADD KEY `transaksi_ibfk_2` (`id_siswa`),
  ADD KEY `id_keb` (`id_keb`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id_keb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logging_siswa`
--
ALTER TABLE `logging_siswa`
  MODIFY `id_logsis` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logging_transaksi`
--
ALTER TABLE `logging_transaksi`
  MODIFY `id_logtrans` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_operator` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_operator`) REFERENCES `operator` (`id_operator`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_keb`) REFERENCES `kegiatan` (`id_keb`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
