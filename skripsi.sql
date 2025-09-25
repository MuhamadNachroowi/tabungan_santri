-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table skripsi.tb_admin
CREATE TABLE IF NOT EXISTS `tb_admin` (
  `id_admin` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_admin` varchar(50) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_admin: ~1 rows (approximately)
INSERT INTO `tb_admin` (`id_admin`, `nama_admin`, `jekel`, `alamat`) VALUES
	('A001', 'Abdul Basit', 'Laki-laki', 'wonosobo');

-- Dumping structure for table skripsi.tb_kamar
CREATE TABLE IF NOT EXISTS `tb_kamar` (
  `KodeKmr` int NOT NULL,
  `NamaKmr` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `wali_kamar` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`KodeKmr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_kamar: ~8 rows (approximately)
INSERT INTO `tb_kamar` (`KodeKmr`, `NamaKmr`, `wali_kamar`) VALUES
	(101, '01', 'Latif'),
	(102, '02', 'Latif'),
	(103, '03', 'Latif'),
	(104, '04', 'Latif'),
	(105, '05', 'Latif'),
	(106, '06', 'Latif'),
	(107, '07', 'Latif'),
	(108, '08', 'Latif');

-- Dumping structure for table skripsi.tb_pembina
CREATE TABLE IF NOT EXISTS `tb_pembina` (
  `NIP` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NamaPembina` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `JenisKelamin` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `AlamatPembina` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NoHp` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_pembina: ~2 rows (approximately)
INSERT INTO `tb_pembina` (`NIP`, `NamaPembina`, `JenisKelamin`, `AlamatPembina`, `NoHp`) VALUES
	('P001', 'Latif', 'Laki-laki', 'Temanggung', '081123421453'),
	('P002', 'Irfan', 'Laki-laki', 'Magelang', '081123321124');

-- Dumping structure for table skripsi.tb_pengambilan
CREATE TABLE IF NOT EXISTS `tb_pengambilan` (
  `id_pengambilan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kamar` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_pengambilan` date NOT NULL,
  PRIMARY KEY (`id_pengambilan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_pengambilan: ~0 rows (approximately)

-- Dumping structure for table skripsi.tb_penitipan
CREATE TABLE IF NOT EXISTS `tb_penitipan` (
  `id_penitipan` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kamar` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_penitipan` date NOT NULL,
  `jenis` enum('tunai','transfer') NOT NULL,
  `status` enum('success','pending','batal') NOT NULL,
  `snap_token` varchar(255) DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_penitipan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_penitipan: ~3 rows (approximately)
INSERT INTO `tb_penitipan` (`id_penitipan`, `nis`, `nama`, `kamar`, `nominal`, `tgl_penitipan`, `jenis`, `status`, `snap_token`, `order_id`) VALUES
	('328', 'U003', 'Abdul Doel', '', '50000', '2022-07-15', 'transfer', 'pending', 'a82fc380-87af-4d08-90c2-0db9355ef8b6', '712412330'),
	('591', 'S001', 'Ahmad', '01', '50000', '2020-01-19', 'transfer', 'pending', '77854030-5e31-404d-a5e4-b296198d4619', '320386945'),
	('647', 'S001', 'Ahmad', '01', '200000', '2024-06-19', 'transfer', 'pending', '3d11744f-866c-4791-83e0-d9d66057d969', '533825025');

-- Dumping structure for table skripsi.tb_santri
CREATE TABLE IF NOT EXISTS `tb_santri` (
  `NIS` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NamaSantri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `JenisKelamin` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TempatLahir` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `TanggalLahir` date NOT NULL,
  `KodeKmr` int NOT NULL,
  `AlamatSantri` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `NoHpOrtu` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`NIS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_santri: ~35 rows (approximately)
INSERT INTO `tb_santri` (`NIS`, `NamaSantri`, `JenisKelamin`, `TempatLahir`, `TanggalLahir`, `KodeKmr`, `AlamatSantri`, `NoHpOrtu`) VALUES
	('S001', 'Rizal Fariq Ahmad', 'Laki-Laki', 'Jombang', '2000-02-03', 101, 'Jombang', '08921321123'),
	('S002', 'Naufal Alingga A', 'Laki-Laki', 'Mojokerto', '2001-03-04', 101, 'Mojokerto', '08512345674'),
	('S003', 'Rafa Barakka', 'Laki-Laki', 'Mojokerto', '1995-08-05', 101, 'Mojokerto', '08723212312'),
	('S004', 'Agung Tirto Nugroho', 'Laki-Laki', 'Jombang', '2001-06-06', 102, 'Jombang', '08592182392'),
	('S005', 'Gattan Azriel Harista', 'Laki-Laki', 'Jombang', '2001-11-16', 102, 'Jombang', '08512332421'),
	('S006', 'M Alfa Fahruddin', 'Laki-Laki', 'Jombang', '2000-03-31', 102, 'Jombang', '08967847212'),
	('S007', 'Fahri Aulia Najib', 'Laki-Laki', 'Mojokerto', '2002-01-02', 102, 'Mojokerto', '0821232123'),
	('S008', 'M Arya Najib', 'Laki-Laki', 'Jombang', '2000-08-19', 102, 'Jombang', '082123213421'),
	('S009', 'M Muttafaquh Fiddin', 'Laki-Laki', 'Pasuruan', '2001-07-10', 102, 'Pasuruan', '08598029321'),
	('S010', 'M Lutfi Nasiqin', 'Laki-Laki', 'Jombang', '2001-10-17', 102, 'Jombang', '08190892021'),
	('S011', 'M Raqy Suharsono', 'Laki-Laki', 'Mojokerto', '2002-02-02', 102, 'Mojokerto', '085908738921'),
	('S012', 'Dar\'y Isomul Anam', 'Laki-Laki', 'Kediri', '2022-07-06', 103, 'Kediri', '081862278732'),
	('S013', 'Muhammad Rofiqoturrohman', 'Laki-Laki', 'Jombang', '2001-07-03', 103, 'Jombang', '081121232452'),
	('S014', 'A Zafif Zanitra Zaed', 'Laki-Laki', 'Kediri', '2001-11-22', 103, 'Kediri', '089121323434'),
	('S015', 'Wahyu Nur Hidayatullah', 'Laki-Laki', 'Jombang', '2000-08-25', 103, 'Jombang', '086786526213'),
	('S016', 'M Zidan Azyan', 'Laki-Laki', 'Malang', '2002-02-13', 105, 'Malang', '089989098782'),
	('S017', 'Muhammad Bani Sabil', 'Laki-Laki', 'Blitar', '2000-11-16', 105, 'Blitar', '081980738726'),
	('S018', 'Reno Purwanto', 'Laki-Laki', 'Mojokerto', '2001-07-06', 105, 'Mojokerto', '08723214211'),
	('S019', 'Shohib Wafa Al Fairuz', 'Laki-Laki', 'Jombang', '2000-05-17', 105, 'Jombang', '085909898676'),
	('S020', 'Muhammad Abdul Rozak', 'Laki-Laki', 'Jombang', '2001-11-23', 105, 'Jombang', '081565748219'),
	('S021', 'Sayyid Maulana Akbar', 'Laki-Laki', 'Kediri', '2001-07-06', 106, 'Kediri', '08902939029'),
	('S022', 'Ahmad Fauzul Hikam', 'Laki-Laki', 'Jombang', '2002-02-21', 106, 'Jombang', '081909898090'),
	('S023', 'Farhan Ali Fazany', 'Laki-Laki', 'Mojokerto', '2000-10-11', 106, 'Mojokerto', '082145678475'),
	('S024', 'M Aziz Annur', 'Laki-Laki', 'Jombang', '2000-11-23', 106, 'Jombang', '085234578594'),
	('S025', 'M Fahrul Amri', 'Laki-Laki', 'Mojokerto', '2001-09-14', 106, 'Mojokerto', '081890737484'),
	('S026', 'Akmal Putra Shobur', 'Laki-Laki', 'Jombang', '2001-11-22', 107, 'Jombang', '089087635364'),
	('S027', 'Ramy Fajar Prasetyo', 'Laki-Laki', 'Jombang', '2000-12-23', 107, 'Jombang', '082182927373'),
	('S028', 'M Thariq Adzim', 'Laki-Laki', 'Kediri', '2002-08-17', 107, 'Kediri', '089753645463'),
	('S029', 'M Amiruddin', 'Laki-Laki', 'Jombang', '2002-01-30', 107, 'Jombang', '085265758484'),
	('S030', 'Risky Adi Kurniawan', 'Laki-Laki', 'Surabaya', '2001-04-01', 107, 'Surabaya', '08121221839'),
	('S031', 'M Syarif Fauzan Adhim', 'Laki-Laki', 'Jombang', '2001-11-23', 108, 'Jombang', '089075658484'),
	('S032', 'M Dzaki Dhiya Ulhaq', 'Laki-Laki', 'Kediri', '2002-03-07', 108, 'Kediri', '089087869695'),
	('S033', 'Andika Dwi Rahma', 'Laki-Laki', 'Surabaya', '2000-12-30', 108, 'Surabaya', '08145657474'),
	('S034', 'M Hasyim Asyary', 'Laki-Laki', 'Jombang', '2001-06-14', 108, 'Jombang', '081276768595'),
	('S035', 'M Zidan Ahmadi Putra', 'Laki-Laki', 'Madiun', '2001-07-08', 108, 'Madiun', '08963837474');

-- Dumping structure for table skripsi.tb_tabungan
CREATE TABLE IF NOT EXISTS `tb_tabungan` (
  `id_tabungan` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kamar` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_tabungan` date NOT NULL,
  PRIMARY KEY (`id_tabungan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_tabungan: ~0 rows (approximately)

-- Dumping structure for table skripsi.tb_transaksi
CREATE TABLE IF NOT EXISTS `tb_transaksi` (
  `id_transaksi` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `nominal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_transaksi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_transaksi: ~0 rows (approximately)

-- Dumping structure for table skripsi.tb_uangbelanja
CREATE TABLE IF NOT EXISTS `tb_uangbelanja` (
  `id_uangbelanja` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nis` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kamar` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nominal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `Ket` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tgl_uangbelanja` date NOT NULL,
  PRIMARY KEY (`id_uangbelanja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_uangbelanja: ~0 rows (approximately)

-- Dumping structure for table skripsi.tb_user
CREATE TABLE IF NOT EXISTS `tb_user` (
  `id_user` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `level` enum('Admin','Pembina','Walisantri') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_user: ~40 rows (approximately)
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
	('', 'latief', '306688fc66898bf11ee91353fef1283b', 'Pembina'),
	('A001', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
	('P001', 'pembina', '377a610343a9812be993e0e755b2e00f', 'Pembina'),
	('P002', 'latief', '306688fc66898bf11ee91353fef1283b', 'Pembina'),
	('P003', 'rosyid', '8b2273a08a0230f81406638c4cb9a714', 'Pembina'),
	('S001', 'S001', '798df8d1c24a97ced3d593b243e34e2e', 'Walisantri'),
	('S002', 'S002', '967e512220153866fe33c433f2402c51', 'Walisantri'),
	('S003', 'S003', '18cad507d614764422047ec3f324a493', 'Walisantri'),
	('S004', 'S004', '570a79ce750f240e69ae5dcadc92ead5', 'Walisantri'),
	('S005', 'S005', 'e75c347d7113e83d6eafe19e62c0008d', 'Walisantri'),
	('S006', 'S006', '142f370813cda536cb29ecc55f09bc0c', 'Walisantri'),
	('S007', 'S007', '735167a2e4894aec6567a54ad071676d', 'Walisantri'),
	('S008', 'S008', 'ad10e50acf312bbdf882616317952b20', 'Walisantri'),
	('S009', 'S009', '8b2a45c56e7e21a1d01dea0b8e2e3447', 'Walisantri'),
	('S010', 'S010', 'c1228799e3f80e9005ab7f04af628b10', 'Walisantri'),
	('S011', 'S011', '518701e6fbbc3e88d29983006674e487', 'Walisantri'),
	('S013', 'S013', '6e666341bdea74c2fa1e568e4b5498d9', 'Walisantri'),
	('S014', 'S014', 'e87a16996cf64e0f1033e1d6cf7e4dc4', 'Walisantri'),
	('S015', 'S015', '23d67fc834944e3896c12e6df9060b67', 'Walisantri'),
	('S016', 'S016', '864df7412c26f9e21802a661470c7490', 'Walisantri'),
	('S017', 'S017', 'ba2b71b2630608998f62fe71838f3ac6', 'Walisantri'),
	('S018', 'S018', '90da9ef60a7b4211fe2b488aa3106afe', 'Walisantri'),
	('S019', 'S019', 'dc5c88cacf58852d551c586c0b98f4ee', 'Walisantri'),
	('S020', 'S020', '2e7b46d7b1f1248f6af910b812a75904', 'Walisantri'),
	('S021', 'S021', '531af49b0dccf1bfeb9c3b46d1d4f42e', 'Walisantri'),
	('S022', 'S022', 'dab2f77955e5eed093cf0cee1ac93010', 'Walisantri'),
	('S023', 'S023', '0bc4532d367174de8359b4fc323903c2', 'Walisantri'),
	('S024', 'S024', '09444ea36e5fc9b126d6bffb72303577', 'Walisantri'),
	('S025', 'S025', '944b66f7d808798046e2915d4e9508ce', 'Walisantri'),
	('S026', 'S026', 'faed2834ca44e95e4fa07a7ef738418a', 'Walisantri'),
	('S027', 'S027', 'e2499e8483c26f7797ac926258ab9fc7', 'Walisantri'),
	('S028', 'S028', '87a1b9369f7f324b45fa23f14784321e', 'Walisantri'),
	('S029', 'S029', '8ec337e1c409abf505cc51288cd91f7d', 'Walisantri'),
	('S030', 'S030', '7b9bf267397923a877e2905d7a61df07', 'Walisantri'),
	('S031', 'S031', '61f3dc0008d687ec55a5f933c163eb40', 'Walisantri'),
	('S032', 'S032', '7582349e6eedcc8e29a6e847cd9cd857', 'Walisantri'),
	('S033', 'S033', 'd0248eb2e646b076e75d35275afd5f81', 'Walisantri'),
	('S034', 'S034', 'a8869a0c7b7125b1363e5433a82a0851', 'Walisantri'),
	('S035', 'S035', '81c123a9db59a621eeaa750908fbb51a', 'Walisantri'),
	('U003', 'walisantri', 'f834de41878e9f6506657d4b7126c30b', 'Walisantri');

-- Dumping structure for table skripsi.tb_walisantri
CREATE TABLE IF NOT EXISTS `tb_walisantri` (
  `id_walisantri` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_walisantri` varchar(50) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_walisantri`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table skripsi.tb_walisantri: ~35 rows (approximately)
INSERT INTO `tb_walisantri` (`id_walisantri`, `nama_walisantri`, `jekel`, `alamat`) VALUES
	('S001', 'Wali Ahmad', 'Laki-laki', 'Wonosobo'),
	('S002', 'Wali Basit', 'Laki-laki', 'Wonsobo'),
	('S003', 'Wali Rafa Barakka', 'Laki-laki', 'Mojokerto'),
	('S004', 'Wali Agung Tirto Nugroho', 'Laki-laki', 'Jombang'),
	('S005', 'Wali Gattan Azriel Harista', 'Laki-laki', 'Jombang'),
	('S006', 'Wali M Alfa Fahruddin', 'Laki-laki', 'Jombang'),
	('S007', 'Wali Fahri Aulia Najib', 'Laki-laki', 'Mojokerto'),
	('S008', 'Wali M Arya Najib', 'Laki-laki', 'Jombang'),
	('S009', 'Wali Rafli', 'Laki-laki', 'Wonosobo'),
	('S010', 'Wali M Lutfi Nasiqin', 'Laki-laki', 'Jombang'),
	('S011', 'Wali M Raqy Suharsono', 'Laki-laki', 'Mojokerto'),
	('S013', 'Wali Muhammad Rofiqoturrohman', 'Laki-laki', 'Jombang'),
	('S014', 'Wali A Zafif Zanitra Zaed', 'Laki-laki', 'Kediri'),
	('S015', 'Wali Wahyu Nur Hidayatullah', 'Laki-laki', 'Jombang'),
	('S016', 'Wali M Zidan Azyan', 'Laki-laki', 'Malang'),
	('S017', 'Wali Muhammad Bani Sabil', 'Laki-laki', 'Blitar'),
	('S018', 'Wali Reno Purwanto', 'Laki-laki', 'Mojokerto'),
	('S019', 'Wali Shohib Wafa Al Fairuz', 'Laki-laki', 'Jombang'),
	('S020', 'Wali Muhammad Abdul Rozak', 'Laki-laki', 'Jombang'),
	('S021', 'Wali Sayyid Maulana Akbar', 'Laki-laki', 'Kediri'),
	('S022', 'Wali Ahmad Fauzul Hikam', 'Laki-laki', 'Jombang'),
	('S023', 'Wali Farhan Ali Fazany', 'Laki-laki', 'Mojokerto'),
	('S024', 'Wali M Aziz Annur', 'Laki-laki', 'Jombang'),
	('S025', 'Wali M Fahrul Amri', 'Laki-laki', 'Mojokerto'),
	('S026', 'Wali Akmal Putra Shobur', 'Laki-laki', 'Jombang'),
	('S027', 'Wali Ramy Fajar Prasetyo', 'Laki-laki', 'Jombang'),
	('S028', 'Wali M Thariq Adzim', 'Laki-laki', 'Kediri'),
	('S029', 'Wali M Amiruddin', 'Laki-laki', 'Jombang'),
	('S030', 'Wali Risky Adi Kurniawan', 'Laki-laki', 'Surabaya'),
	('S031', 'Wali M Syarif Fauzan Adhim', 'Laki-laki', 'Jombang'),
	('S032', 'Wali M Dzaki Dhiya Ulhaq', 'Laki-laki', 'Kediri'),
	('S033', 'Wali Andika Dwi Rahma', 'Laki-laki', 'Surabaya'),
	('S034', 'Wali M Hasyim Asyary', 'Laki-laki', 'Jombang'),
	('S035', 'Wali M Zidan Ahmadi Putra', 'Laki-laki', 'Madiun'),
	('U003', 'Abdul Doel', 'Laki-laki', 'Wonosobo');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
