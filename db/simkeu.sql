-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 8.0.30 - MySQL Community Server - GPL
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Membuang struktur basisdata untuk simkeu
CREATE DATABASE IF NOT EXISTS `simkeu` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `simkeu`;

-- membuang struktur untuk table simkeu.donatur
CREATE TABLE IF NOT EXISTS `donatur` (
  `id_donatur` int NOT NULL AUTO_INCREMENT,
  `donatur` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_donatur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.donatur: ~1 rows (lebih kurang)
INSERT INTO `donatur` (`id_donatur`, `donatur`) VALUES
	(1, 'PT. Maju mundur');

-- membuang struktur untuk table simkeu.kelas
CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int NOT NULL AUTO_INCREMENT,
  `kelas` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.kelas: ~4 rows (lebih kurang)
INSERT INTO `kelas` (`id_kelas`, `kelas`) VALUES
	(1, '1A'),
	(2, '1B'),
	(3, '1C'),
	(5, '2C');

-- membuang struktur untuk table simkeu.santri
CREATE TABLE IF NOT EXISTS `santri` (
  `id_santri` int NOT NULL AUTO_INCREMENT,
  `nis` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_santri` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jenis_kelamin` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `alamat` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `no_hp` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nama_wali` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  PRIMARY KEY (`id_santri`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.santri: ~3 rows (lebih kurang)
INSERT INTO `santri` (`id_santri`, `nis`, `nama_santri`, `kelas`, `status`, `jenis_kelamin`, `alamat`, `no_hp`, `nama_wali`, `tanggal_lahir`, `tgl_jatuh_tempo`) VALUES
	(2, '1820803023', 'Izzani Ahlunadzar', '2A', 'non aktif', 'Laki-laki', 'camerun', '082212839283', 'balmond', '2000-01-18', '2025-02-01'),
	(3, '10579', 'Feby Saputra', '1A', 'non aktif', 'Laki-laki', 'kenten laut', '081232123499', 'anton jebot', '1922-02-01', '2025-02-01'),
	(4, '1190029872', 'M. Ridwan Tri Saputra', '1A', 'non aktif', 'Laki-laki', 'Texas', '089572838399', 'Dn Aidit', '2000-07-19', '2025-02-01'),
	(5, '1398902034', 'Fahrul Adib', '1B', 'non aktif', 'Laki-laki', 'Banyuasin', '082282076702', 'Rahasia', '2000-11-01', '2025-02-01');

-- membuang struktur untuk table simkeu.spp
CREATE TABLE IF NOT EXISTS `spp` (
  `id_spp` int NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `nis` int DEFAULT NULL,
  `nama` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kelas` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL,
  PRIMARY KEY (`id_spp`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.spp: ~4 rows (lebih kurang)
INSERT INTO `spp` (`id_spp`, `keterangan`, `jumlah`, `nis`, `nama`, `kelas`, `tanggal`, `tgl_jatuh_tempo`) VALUES
	(3, 'lunas', 1000000, 1190029872, 'M. Ridwan Tri Saputra', '1A', '2024-04-17', '2023-04-19'),
	(4, 'lunas', 3000000, 1820803023, 'Izzani Ahlunadzar', '2A', '2024-04-19', '2025-02-01'),
	(6, 'lunas', 2000000, 10579, 'Feby Saputra', '1A', '2024-04-19', '2025-02-01');

-- membuang struktur untuk table simkeu.tr_barber
CREATE TABLE IF NOT EXISTS `tr_barber` (
  `id_trBarber` int NOT NULL AUTO_INCREMENT,
  `jumlah` varchar(250) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_trBarber`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.tr_barber: ~2 rows (lebih kurang)
INSERT INTO `tr_barber` (`id_trBarber`, `jumlah`, `tanggal`) VALUES
	(2, '1000000', '2024-04-25'),
	(3, '13000', '2024-04-26');

-- membuang struktur untuk table simkeu.tr_donatur
CREATE TABLE IF NOT EXISTS `tr_donatur` (
  `id_trDonatur` int NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `no_wa` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `jumlah` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `jenis_bayar` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(350) COLLATE utf8mb4_general_ci NOT NULL,
  `bukti_bayar` varchar(250) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_trDonatur`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.tr_donatur: ~2 rows (lebih kurang)
INSERT INTO `tr_donatur` (`id_trDonatur`, `nama_perusahaan`, `email`, `no_wa`, `jumlah`, `jenis_bayar`, `alamat`, `bukti_bayar`, `tanggal`) VALUES
	(8, 'PT Indofood', 'fahruladib9@gmail.com', '6282282076702', '10000000', 'Cash', 'kenten laut', '1713681164_522969e7037ce2355812.jpg', '2024-04-21'),
	(9, 'PT Barakuda', 'admin@gmail.com', '082193827392', '2000000', 'Transfer', 'Texas', '1713681933_b66078b43a6122707b8a.jpg', '2024-04-21'),
	(10, 'PT Maju Mundur', 'admin@gmail.com', '6282282076702', '50000', 'Cash', 'Banyuasin', '1714145487_046bddc2f5c452eb8397.jpg', '2024-04-26');

-- membuang struktur untuk table simkeu.tr_koperasi
CREATE TABLE IF NOT EXISTS `tr_koperasi` (
  `id_trKoperasi` int NOT NULL AUTO_INCREMENT,
  `jumlah` varchar(250) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  PRIMARY KEY (`id_trKoperasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.tr_koperasi: ~1 rows (lebih kurang)
INSERT INTO `tr_koperasi` (`id_trKoperasi`, `jumlah`, `tanggal`) VALUES
	(2, '2000000', '2024-04-25');

-- membuang struktur untuk table simkeu.t_keluar
CREATE TABLE IF NOT EXISTS `t_keluar` (
  `id_tKeluar` int NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jumlah` varchar(250) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_tKeluar`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.t_keluar: ~2 rows (lebih kurang)
INSERT INTO `t_keluar` (`id_tKeluar`, `keterangan`, `jumlah`, `tanggal`) VALUES
	(1, 'bayar gaji pegawai', '3000000', '2024-04-25'),
	(3, 'bayar listrik', '250000', '2024-04-25');

-- membuang struktur untuk table simkeu.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuang data untuk tabel simkeu.users: ~4 rows (lebih kurang)
INSERT INTO `users` (`id_user`, `nama`, `username`, `password`, `role`, `tanggal_lahir`) VALUES
	(1, 'Fahrul Adib', 'sudendev', '2000-11-01', 'super admin', '2000-11-01'),
	(5, 'Feby Saputra', 'fbys', '2024-04-17', 'admin', '2024-04-01'),
	(6, 'M. Ridwan Tri Saputra', 'ridwan', '2024-04-17', 'pimpinan', '2024-04-17'),
	(8, 'Hijriadi Muharom', 'hijri', '2000-01-01', 'super admin', '2000-01-01');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
