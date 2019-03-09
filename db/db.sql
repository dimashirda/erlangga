-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.36-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk erlangga_v2
CREATE DATABASE IF NOT EXISTS `erlangga_v2` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `erlangga_v2`;

-- membuang struktur untuk table erlangga_v2.barang
CREATE TABLE IF NOT EXISTS `barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(100) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.barang: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `barang` DISABLE KEYS */;
INSERT IGNORE INTO `barang` (`id`, `kode`, `nama`, `satuan`, `harga_jual`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'A101', 'Kertas A5', 'RIM', 2000, '2018-11-13 01:39:44', '2018-11-12 18:39:44', NULL),
	(2, 'A102', 'HVS A5', 'RIM', 2000, '2018-11-26 05:51:49', '2018-11-26 05:51:49', NULL);
/*!40000 ALTER TABLE `barang` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.barang_detail
CREATE TABLE IF NOT EXISTS `barang_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.barang_detail: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `barang_detail` DISABLE KEYS */;
INSERT IGNORE INTO `barang_detail` (`id`, `barang_id`, `jumlah`, `harga_beli`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 50, 1500, '2019-03-09 10:09:21', '2019-03-09 03:09:21', NULL),
	(2, 1, 695, 1800, '2019-03-07 14:44:08', '2019-03-07 07:44:08', NULL),
	(3, 2, 100, 1000, '2019-03-07 15:00:53', '2019-03-07 08:00:53', NULL),
	(4, 2, 545, 1900, '2019-03-07 14:45:47', '2019-03-07 07:45:47', NULL),
	(5, 1, 100, 2000, '2019-01-26 17:01:20', '2019-01-26 10:01:20', NULL),
	(6, 2, 100, 2000, '2019-03-07 14:46:37', '2019-03-07 07:46:37', NULL),
	(7, 1, 0, 1000, '2019-01-27 13:35:56', '2019-01-27 06:35:56', NULL),
	(10, 2, 200, 750, '2019-03-07 14:58:12', '2019-03-07 07:58:12', NULL),
	(11, 2, 1000, 150, '2019-03-09 03:09:21', '2019-03-09 03:09:21', NULL);
/*!40000 ALTER TABLE `barang_detail` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.log_barang
CREATE TABLE IF NOT EXISTS `log_barang` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_detail_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `flag` int(11) DEFAULT NULL COMMENT '1=jual,2=beli,3=potong',
  `penjualan_detail_id` int(11) DEFAULT NULL,
  `pembelian_detail_id` int(11) DEFAULT NULL,
  `pemotongan_detail_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.log_barang: ~14 rows (lebih kurang)
/*!40000 ALTER TABLE `log_barang` DISABLE KEYS */;
INSERT IGNORE INTO `log_barang` (`id`, `barang_detail_id`, `jumlah`, `created_at`, `updated_at`, `deleted_at`, `flag`, `penjualan_detail_id`, `pembelian_detail_id`, `pemotongan_detail_id`) VALUES
	(1, 1, 50, '2019-03-07 07:42:58', '2019-03-07 07:42:58', NULL, 3, NULL, NULL, 1),
	(2, 2, 95, '2019-03-07 07:42:58', '2019-03-07 07:42:58', NULL, 3, NULL, NULL, 2),
	(3, 1, 50, '2019-03-07 07:44:08', '2019-03-07 07:44:08', NULL, 3, NULL, NULL, 3),
	(4, 2, 100, '2019-03-07 07:44:08', '2019-03-07 07:44:08', NULL, 3, NULL, NULL, 4),
	(5, 1, 50, '2019-03-07 07:45:47', '2019-03-07 07:45:47', NULL, 3, NULL, NULL, 5),
	(6, 4, 95, '2019-03-07 07:45:47', '2019-03-07 07:45:47', NULL, 3, NULL, NULL, 6),
	(7, 1, 50, '2019-03-07 07:46:37', '2019-03-07 07:46:37', NULL, 3, NULL, NULL, 7),
	(8, 6, 95, '2019-03-07 07:46:37', '2019-03-07 07:46:37', NULL, 3, NULL, NULL, 8),
	(12, 1, 50, '2019-03-07 07:57:49', '2019-03-07 07:57:49', NULL, 3, NULL, NULL, 13),
	(13, 10, 100, '2019-03-07 07:57:49', '2019-03-07 07:57:49', NULL, 3, NULL, NULL, 14),
	(14, 1, 50, '2019-03-07 07:58:12', '2019-03-07 07:58:12', NULL, 3, NULL, NULL, 15),
	(15, 10, 100, '2019-03-07 07:58:12', '2019-03-07 07:58:12', NULL, 3, NULL, NULL, 16),
	(16, 1, 100, '2019-03-09 03:09:21', '2019-03-09 03:09:21', NULL, 3, NULL, NULL, 17),
	(17, 11, 1000, '2019-03-09 03:09:21', '2019-03-09 03:09:21', NULL, 3, NULL, NULL, 18);
/*!40000 ALTER TABLE `log_barang` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.log_transaksi
CREATE TABLE IF NOT EXISTS `log_transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_detail_id` int(11) DEFAULT NULL,
  `penjualan_id` int(11) DEFAULT NULL,
  `pembelian_id` int(11) DEFAULT NULL,
  `tipe` int(2) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `total_satuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.log_transaksi: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `log_transaksi` DISABLE KEYS */;
INSERT IGNORE INTO `log_transaksi` (`id`, `barang_detail_id`, `penjualan_id`, `pembelian_id`, `tipe`, `jumlah`, `created_at`, `updated_at`, `deleted_at`, `harga_satuan`, `total_satuan`) VALUES
	(1, 1, NULL, 11, 1, 5, '2019-01-26 09:58:21', '2019-01-26 09:58:21', NULL, 2000, 10000),
	(2, 1, NULL, 12, 1, 95, '2019-01-26 09:59:45', '2019-01-26 09:59:45', NULL, 2000, 190000),
	(3, 1, NULL, 13, 1, 95, '2019-01-26 10:01:20', '2019-01-26 10:01:20', NULL, 2000, 190000),
	(4, 3, 35, NULL, 2, 500, '2019-01-27 06:13:31', '2019-01-27 06:13:31', NULL, 3000, 1650000),
	(5, 4, 35, NULL, 2, 50, '2019-01-27 06:13:31', '2019-01-27 06:13:31', NULL, 3000, 1650000),
	(6, 7, NULL, 15, 1, 100, '2019-01-27 06:34:41', '2019-01-27 06:34:41', NULL, 1000, 100000),
	(7, 7, 36, NULL, 2, 100, '2019-01-27 06:35:56', '2019-01-27 06:35:56', NULL, 2000, 300000),
	(8, 1, 36, NULL, 2, 50, '2019-01-27 06:35:57', '2019-01-27 06:35:57', NULL, 2000, 300000),
	(9, 3, NULL, 16, 1, 100, '2019-03-07 08:00:53', '2019-03-07 08:00:53', NULL, 1000, 100000);
/*!40000 ALTER TABLE `log_transaksi` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `limit` int(11) DEFAULT NULL,
  `kredit` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.pelanggan: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `pelanggan` DISABLE KEYS */;
INSERT IGNORE INTO `pelanggan` (`id`, `nama`, `alamat`, `kota`, `telepon`, `limit`, `kredit`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Hamka', 'Jalan Pulau Moyo 1 Gang Garuda No. 6', 'Surabaya', '085730185024', 1000000, 30000, '2018-11-27 12:19:49', '2018-11-27 05:19:49', NULL),
	(2, 'a', 'a', 'a', '1', 1, 1, '2019-01-26 06:45:58', '2019-01-26 06:45:58', NULL);
/*!40000 ALTER TABLE `pelanggan` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.pembelian
CREATE TABLE IF NOT EXISTS `pembelian` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT NULL,
  `tanggal_jatuh_tempo` timestamp NULL DEFAULT NULL,
  `jenis_pembelian` varchar(50) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.pembelian: ~16 rows (lebih kurang)
/*!40000 ALTER TABLE `pembelian` DISABLE KEYS */;
INSERT IGNORE INTO `pembelian` (`id`, `users_id`, `supplier_id`, `tanggal_transaksi`, `tanggal_jatuh_tempo`, `jenis_pembelian`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, '2019-01-26 16:26:17', NULL, '2', 100000, '2019-01-26 09:26:17', '2019-01-26 09:26:17', NULL),
	(2, 1, 1, '2019-01-26 16:26:40', NULL, '2', 100000, '2019-01-26 09:26:40', '2019-01-26 09:26:40', NULL),
	(3, 2, 1, '2019-01-26 16:55:56', NULL, '2', 10000, '2019-01-26 09:55:56', '2019-01-26 09:55:56', NULL),
	(4, 2, 1, '2019-01-26 16:56:08', NULL, '2', 10000, '2019-01-26 09:56:08', '2019-01-26 09:56:08', NULL),
	(5, 2, 1, '2019-01-26 16:56:24', NULL, '2', 10000, '2019-01-26 09:56:24', '2019-01-26 09:56:24', NULL),
	(6, 2, 1, '2019-01-26 16:56:39', NULL, '2', 10000, '2019-01-26 09:56:39', '2019-01-26 09:56:39', NULL),
	(7, 2, 1, '2019-01-26 16:56:55', NULL, '2', 10000, '2019-01-26 09:56:55', '2019-01-26 09:56:55', NULL),
	(8, 2, 1, '2019-01-26 16:57:11', NULL, '2', 10000, '2019-01-26 09:57:11', '2019-01-26 09:57:11', NULL),
	(9, 2, 1, '2019-01-26 16:57:37', NULL, '2', 10000, '2019-01-26 09:57:37', '2019-01-26 09:57:37', NULL),
	(10, 2, 1, '2019-01-26 16:57:56', NULL, '2', 10000, '2019-01-26 09:57:56', '2019-01-26 09:57:56', NULL),
	(11, 2, 1, '2019-01-26 16:58:20', NULL, '2', 10000, '2019-01-26 09:58:20', '2019-01-26 09:58:20', NULL),
	(12, 2, 1, '2019-01-26 16:59:45', NULL, '2', 190000, '2019-01-26 09:59:45', '2019-01-26 09:59:45', NULL),
	(13, 2, 1, '2019-01-26 17:01:20', NULL, '2', 190000, '2019-01-26 10:01:20', '2019-01-26 10:01:20', NULL),
	(14, 2, 1, '2019-01-27 12:01:43', NULL, '2', 10000, '2019-01-27 05:01:43', '2019-01-27 05:01:43', NULL),
	(15, 2, 1, '2019-01-27 13:34:40', NULL, '2', 100000, '2019-01-27 06:34:40', '2019-01-27 06:34:40', NULL),
	(16, 1, 1, '2019-03-07 15:00:53', NULL, '2', 100000, '2019-03-07 08:00:53', '2019-03-07 08:00:53', NULL);
/*!40000 ALTER TABLE `pembelian` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.pembelian_detail
CREATE TABLE IF NOT EXISTS `pembelian_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `total_satuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.pembelian_detail: ~16 rows (lebih kurang)
/*!40000 ALTER TABLE `pembelian_detail` DISABLE KEYS */;
INSERT IGNORE INTO `pembelian_detail` (`id`, `pembelian_id`, `barang_id`, `jumlah`, `harga_satuan`, `created_at`, `updated_at`, `deleted_at`, `total_satuan`) VALUES
	(1, 2, 2, 12, 2000, '2019-01-26 09:26:40', '2019-01-26 09:26:40', NULL, 24000),
	(2, 2, 1, 38, 2000, '2019-01-26 09:26:40', '2019-01-26 09:26:40', NULL, 76000),
	(3, 3, 1, 5, 2000, '2019-01-26 09:55:56', '2019-01-26 09:55:56', NULL, 10000),
	(4, 4, 1, 5, 2000, '2019-01-26 09:56:08', '2019-01-26 09:56:08', NULL, 10000),
	(5, 5, 1, 5, 2000, '2019-01-26 09:56:24', '2019-01-26 09:56:24', NULL, 10000),
	(6, 6, 1, 5, 2000, '2019-01-26 09:56:39', '2019-01-26 09:56:39', NULL, 10000),
	(7, 7, 1, 5, 2000, '2019-01-26 09:56:55', '2019-01-26 09:56:55', NULL, 10000),
	(8, 8, 1, 5, 2000, '2019-01-26 09:57:11', '2019-01-26 09:57:11', NULL, 10000),
	(9, 9, 1, 5, 2000, '2019-01-26 09:57:37', '2019-01-26 09:57:37', NULL, 10000),
	(10, 10, 1, 5, 2000, '2019-01-26 09:57:56', '2019-01-26 09:57:56', NULL, 10000),
	(11, 11, 1, 5, 2000, '2019-01-26 09:58:20', '2019-01-26 09:58:20', NULL, 10000),
	(12, 12, 1, 95, 2000, '2019-01-26 09:59:45', '2019-01-26 09:59:45', NULL, 190000),
	(13, 13, 1, 95, 2000, '2019-01-26 10:01:20', '2019-01-26 10:01:20', NULL, 190000),
	(14, 14, 2, 5, 2000, '2019-01-27 05:01:43', '2019-01-27 05:01:43', NULL, 10000),
	(15, 15, 1, 100, 1000, '2019-01-27 06:34:40', '2019-01-27 06:34:40', NULL, 100000),
	(16, 16, 2, 100, 1000, '2019-03-07 08:00:53', '2019-03-07 08:00:53', NULL, 100000);
/*!40000 ALTER TABLE `pembelian_detail` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.pemotongan
CREATE TABLE IF NOT EXISTS `pemotongan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_awal_id` int(11) DEFAULT NULL,
  `barang_akhir_id` int(11) DEFAULT NULL,
  `jumlah_barang_akhir` int(11) DEFAULT NULL,
  `jumlah_barang_awal` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.pemotongan: ~7 rows (lebih kurang)
/*!40000 ALTER TABLE `pemotongan` DISABLE KEYS */;
INSERT IGNORE INTO `pemotongan` (`id`, `barang_awal_id`, `barang_akhir_id`, `jumlah_barang_akhir`, `jumlah_barang_awal`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 1, 2, 95, 50, '2019-03-07 07:42:58', '2019-03-07 07:42:58', NULL),
	(3, 1, 2, 100, 50, '2019-03-07 07:44:08', '2019-03-07 07:44:08', NULL),
	(4, 1, 2, 95, 50, '2019-03-07 07:45:47', '2019-03-07 07:45:47', NULL),
	(5, 1, 2, 95, 50, '2019-03-07 07:46:37', '2019-03-07 07:46:37', NULL),
	(9, 1, 2, 100, 50, '2019-03-07 07:57:49', '2019-03-07 07:57:49', NULL),
	(10, 1, 2, 100, 50, '2019-03-07 07:58:12', '2019-03-07 07:58:12', NULL),
	(11, 1, 2, 1000, 100, '2019-03-09 03:09:21', '2019-03-09 03:09:21', NULL);
/*!40000 ALTER TABLE `pemotongan` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.pemotongan_detail
CREATE TABLE IF NOT EXISTS `pemotongan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_detail_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `flag` int(11) DEFAULT NULL COMMENT '0=kurang,1=tambah',
  `pemotongan_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.pemotongan_detail: ~14 rows (lebih kurang)
/*!40000 ALTER TABLE `pemotongan_detail` DISABLE KEYS */;
INSERT IGNORE INTO `pemotongan_detail` (`id`, `barang_detail_id`, `jumlah`, `created_at`, `updated_at`, `deleted_at`, `flag`, `pemotongan_id`) VALUES
	(1, 1, 50, '2019-03-07 07:42:58', '2019-03-07 07:42:58', NULL, 0, 2),
	(2, 2, 95, '2019-03-07 07:42:58', '2019-03-07 07:42:58', NULL, 1, 2),
	(3, 1, 50, '2019-03-07 07:44:08', '2019-03-07 07:44:08', NULL, 0, 3),
	(4, 2, 100, '2019-03-07 07:44:08', '2019-03-07 07:44:08', NULL, 1, 3),
	(5, 1, 50, '2019-03-07 07:45:47', '2019-03-07 07:45:47', NULL, 0, 4),
	(6, 4, 95, '2019-03-07 07:45:47', '2019-03-07 07:45:47', NULL, 1, 4),
	(7, 1, 50, '2019-03-07 07:46:37', '2019-03-07 07:46:37', NULL, 0, 5),
	(8, 6, 95, '2019-03-07 07:46:37', '2019-03-07 07:46:37', NULL, 1, 5),
	(13, 1, 50, '2019-03-07 07:57:49', '2019-03-07 07:57:49', NULL, 0, 9),
	(14, 10, 100, '2019-03-07 07:57:49', '2019-03-07 07:57:49', NULL, 1, 9),
	(15, 1, 50, '2019-03-07 07:58:12', '2019-03-07 07:58:12', NULL, 0, 10),
	(16, 10, 100, '2019-03-07 07:58:12', '2019-03-07 07:58:12', NULL, 1, 10),
	(17, 1, 100, '2019-03-09 03:09:21', '2019-03-09 03:09:21', NULL, 0, 11),
	(18, 11, 1000, '2019-03-09 03:09:21', '2019-03-09 03:09:21', NULL, 1, 11);
/*!40000 ALTER TABLE `pemotongan_detail` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.penjualan
CREATE TABLE IF NOT EXISTS `penjualan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pelanggan_id` int(11) DEFAULT NULL,
  `users_id` int(11) DEFAULT NULL,
  `tanggal_transaksi` timestamp NULL DEFAULT NULL,
  `tanggal_jatuh_tempo` timestamp NULL DEFAULT NULL,
  `jenis_penjualan` varchar(50) DEFAULT NULL COMMENT '1=kredit,2=cash',
  `total` int(11) DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `potongan` int(11) DEFAULT NULL,
  `total_akhir` int(11) DEFAULT NULL,
  `uang_dibayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `terbayar` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.penjualan: ~36 rows (lebih kurang)
/*!40000 ALTER TABLE `penjualan` DISABLE KEYS */;
INSERT IGNORE INTO `penjualan` (`id`, `pelanggan_id`, `users_id`, `tanggal_transaksi`, `tanggal_jatuh_tempo`, `jenis_penjualan`, `total`, `diskon`, `potongan`, `total_akhir`, `uang_dibayar`, `kembalian`, `created_at`, `updated_at`, `deleted_at`, `terbayar`) VALUES
	(1, 1, 1, '2018-11-27 05:01:57', '2018-11-27 05:01:57', '1', 50000, 50, NULL, NULL, NULL, NULL, '2019-03-09 11:10:14', '2018-11-28 03:05:48', '2018-11-28 03:05:48', 0),
	(2, 1, 1, '2018-11-27 05:02:50', '2018-11-27 05:02:50', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:24:27', '2018-11-27 05:02:50', NULL, 25000),
	(3, 1, 1, '2018-11-27 05:08:12', '2018-11-27 05:08:12', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:10', '2018-11-27 05:08:12', NULL, 0),
	(4, 1, 1, '2018-11-27 05:08:45', '2018-11-27 05:08:45', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:09', '2018-11-27 05:08:45', NULL, 0),
	(5, 1, 1, '2018-11-27 05:09:12', '2018-11-27 05:09:12', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:09', '2018-11-27 05:09:12', NULL, 0),
	(6, 1, 1, '2018-11-27 05:09:15', '2018-11-27 05:09:15', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:08', '2018-11-27 05:09:15', NULL, 0),
	(7, 1, 1, '2018-11-27 05:09:37', '2018-11-27 05:09:37', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:08', '2018-11-27 05:09:37', NULL, 0),
	(8, 1, 1, '2018-11-27 05:10:23', '2018-11-27 05:10:23', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:07', '2018-11-27 05:10:23', NULL, 0),
	(9, 1, 1, '2018-11-27 05:11:45', '2018-11-27 05:11:45', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:07', '2018-11-27 05:11:45', NULL, 0),
	(10, 1, 1, '2018-11-27 05:12:10', '2018-11-27 05:12:10', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:06', '2018-11-27 05:12:10', NULL, 0),
	(11, 1, 1, '2018-11-27 05:12:22', '2018-11-27 05:12:22', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:05', '2018-11-27 05:12:22', NULL, 0),
	(12, 1, 1, '2018-11-27 05:14:20', '2018-11-27 05:14:20', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:05', '2018-11-27 05:14:20', NULL, 0),
	(13, 1, 1, '2018-11-27 05:15:04', '2018-11-27 05:15:04', '1', 50000, 50, NULL, 25000, NULL, NULL, '2019-03-09 11:10:04', '2018-11-27 05:15:04', NULL, 0),
	(14, 1, 1, '2018-11-27 05:19:49', '2018-11-27 05:19:49', '1', 30000, NULL, NULL, 30000, NULL, NULL, '2019-03-09 11:10:04', '2018-11-27 05:19:49', NULL, 0),
	(15, 1, 1, '2018-11-27 05:20:09', '2018-11-27 05:20:09', '1', 30000, NULL, NULL, 30000, NULL, NULL, '2019-03-09 12:21:13', '2019-03-09 05:21:13', NULL, 30000),
	(16, 1, 1, '2018-11-27 05:22:14', '2018-11-27 05:22:14', '1', 30000, NULL, NULL, 30000, NULL, NULL, '2019-03-09 11:10:03', '2018-12-02 01:52:29', '2018-12-02 01:52:29', 0),
	(17, 1, 1, '2018-11-27 05:23:00', '2018-11-27 05:23:00', '1', 30000, NULL, NULL, 30000, NULL, NULL, '2019-03-09 11:10:02', '2018-11-28 03:19:18', '2018-11-28 03:19:18', 0),
	(18, 1, 1, '2018-11-27 05:23:24', '2018-11-27 05:23:24', '1', 30000, NULL, NULL, 30000, NULL, NULL, '2019-03-09 11:10:01', '2018-11-28 03:01:55', '2018-11-28 03:01:55', 0),
	(19, 1, 1, '2018-11-27 05:23:57', NULL, '2', 10000, NULL, NULL, 10000, NULL, 0, '2019-03-09 11:10:01', '2018-11-28 03:03:41', '2018-11-28 03:03:41', 0),
	(20, 1, 1, '2018-11-27 12:28:13', NULL, '2', 2000, NULL, NULL, 2000, NULL, 0, '2019-03-09 11:10:00', '2018-11-27 05:28:13', NULL, 0),
	(21, 1, 1, '2018-11-27 12:30:56', NULL, '2', 2000, NULL, NULL, 2000, NULL, 0, '2019-03-09 11:09:59', '2018-11-27 05:30:56', NULL, 0),
	(22, 1, 1, '2018-11-28 11:58:00', NULL, '2', 18000, NULL, NULL, 18000, NULL, 2000, '2019-03-09 11:09:59', '2018-12-02 01:52:13', '2018-12-02 01:52:13', 0),
	(23, 1, 1, '2018-11-27 13:29:04', NULL, '2', 6000, NULL, NULL, 6000, NULL, 0, '2019-03-09 11:09:58', '2018-11-28 03:14:43', '2018-11-28 03:14:43', 0),
	(24, 1, 1, '2018-11-27 13:29:15', NULL, '2', 6000, NULL, NULL, 6000, NULL, 0, '2019-03-09 11:09:57', '2018-11-28 03:12:32', '2018-11-28 03:12:32', 0),
	(25, 1, 1, '2019-01-23 17:04:27', NULL, '2', 62500, NULL, NULL, 62500, NULL, 0, '2019-03-09 11:09:57', '2019-01-23 10:04:27', NULL, 0),
	(26, 1, 1, '2019-01-26 14:22:25', NULL, '2', 41000, NULL, NULL, 41000, 41000, 0, '2019-03-09 11:09:56', '2019-01-26 07:22:26', NULL, 0),
	(27, NULL, 1, '2019-01-26 15:58:45', NULL, '2', 51000, NULL, NULL, 51000, 51000, 0, '2019-03-09 11:09:55', '2019-01-26 08:58:45', '2019-01-26 16:00:43', 0),
	(28, NULL, 1, '2019-01-26 16:00:09', NULL, '2', 390000, NULL, NULL, 390000, 390000, 0, '2019-03-09 11:09:55', '2019-01-26 09:00:09', '2019-01-26 16:00:41', 0),
	(29, 1, 2, '2019-01-27 13:09:07', NULL, '2', 1650000, NULL, NULL, 1650000, 1650000, 0, '2019-03-09 11:09:54', '2019-01-27 06:09:07', NULL, 0),
	(30, 1, 2, '2019-01-27 13:11:01', NULL, '2', 1650000, NULL, NULL, 1650000, 1650000, 0, '2019-03-09 11:09:53', '2019-01-27 06:11:01', NULL, 0),
	(31, 1, 2, '2019-01-27 13:11:27', NULL, '2', 1650000, NULL, NULL, 1650000, 1650000, 0, '2019-03-09 11:09:53', '2019-01-27 06:11:27', NULL, 0),
	(32, 1, 2, '2019-01-27 13:11:56', NULL, '2', 1650000, NULL, NULL, 1650000, 1650000, 0, '2019-03-09 11:09:52', '2019-01-27 06:11:56', NULL, 0),
	(33, 1, 2, '2019-01-27 13:12:51', NULL, '2', 1650000, NULL, NULL, 1650000, 1650000, 0, '2019-03-09 11:09:51', '2019-01-27 06:12:51', NULL, 0),
	(34, 1, 2, '2019-01-27 13:13:18', NULL, '2', 1650000, NULL, NULL, 1650000, 1650000, 0, '2019-03-09 11:09:51', '2019-01-27 06:13:18', NULL, 0),
	(35, 1, 2, '2019-01-27 13:13:31', NULL, '2', 1650000, NULL, NULL, 1650000, 1650000, 0, '2019-03-09 11:09:50', '2019-01-27 06:13:31', NULL, 0),
	(36, 1, 2, '2019-01-27 13:35:56', NULL, '2', 300000, NULL, NULL, 300000, 300000, 0, '2019-03-09 11:09:45', '2019-01-27 06:35:56', NULL, 0);
/*!40000 ALTER TABLE `penjualan` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.penjualan_detail
CREATE TABLE IF NOT EXISTS `penjualan_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_id` int(11) DEFAULT NULL,
  `barang_id` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `total_satuan` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.penjualan_detail: ~56 rows (lebih kurang)
/*!40000 ALTER TABLE `penjualan_detail` DISABLE KEYS */;
INSERT IGNORE INTO `penjualan_detail` (`id`, `penjualan_id`, `barang_id`, `jumlah`, `harga_satuan`, `created_at`, `updated_at`, `deleted_at`, `total_satuan`) VALUES
	(1, 3, 2, 10, 20000, '2018-11-27 05:08:12', '2018-11-27 05:08:12', NULL, NULL),
	(2, 3, 1, 15, 30000, '2018-11-27 05:08:12', '2018-11-27 05:08:12', NULL, NULL),
	(3, 4, 2, 10, 20000, '2018-11-27 05:08:45', '2018-11-27 05:08:45', NULL, NULL),
	(4, 4, 1, 15, 30000, '2018-11-27 05:08:45', '2018-11-27 05:08:45', NULL, NULL),
	(5, 5, 2, 10, 20000, '2018-11-27 05:09:12', '2018-11-27 05:09:12', NULL, NULL),
	(6, 5, 1, 15, 30000, '2018-11-27 05:09:12', '2018-11-27 05:09:12', NULL, NULL),
	(7, 6, 2, 10, 20000, '2018-11-27 05:09:15', '2018-11-27 05:09:15', NULL, NULL),
	(8, 6, 1, 15, 30000, '2018-11-27 05:09:15', '2018-11-27 05:09:15', NULL, NULL),
	(9, 7, 2, 10, 20000, '2018-11-27 05:09:37', '2018-11-27 05:09:37', NULL, NULL),
	(10, 7, 1, 15, 30000, '2018-11-27 05:09:37', '2018-11-27 05:09:37', NULL, NULL),
	(11, 8, 2, 10, 20000, '2018-11-27 05:10:23', '2018-11-27 05:10:23', NULL, NULL),
	(12, 8, 1, 15, 30000, '2018-11-27 05:10:23', '2018-11-27 05:10:23', NULL, NULL),
	(13, 9, 2, 10, 20000, '2018-11-27 05:11:46', '2018-11-27 05:11:46', NULL, NULL),
	(14, 9, 1, 15, 30000, '2018-11-27 05:11:46', '2018-11-27 05:11:46', NULL, NULL),
	(15, 10, 2, 10, 20000, '2018-11-27 05:12:10', '2018-11-27 05:12:10', NULL, NULL),
	(16, 10, 1, 15, 30000, '2018-11-27 05:12:10', '2018-11-27 05:12:10', NULL, NULL),
	(17, 11, 2, 10, 20000, '2018-11-27 05:12:22', '2018-11-27 05:12:22', NULL, NULL),
	(18, 11, 1, 15, 30000, '2018-11-27 05:12:22', '2018-11-27 05:12:22', NULL, NULL),
	(19, 12, 2, 10, 20000, '2018-11-27 05:14:20', '2018-11-27 05:14:20', NULL, NULL),
	(20, 12, 1, 15, 30000, '2018-11-27 05:14:21', '2018-11-27 05:14:21', NULL, NULL),
	(21, 13, 2, 10, 20000, '2018-11-27 05:15:04', '2018-11-27 05:15:04', NULL, NULL),
	(22, 13, 1, 15, 30000, '2019-01-23 18:13:08', '2018-11-27 05:15:04', NULL, 30000),
	(23, 14, 1, 15, 30000, '2019-01-23 18:12:50', '2018-11-27 05:19:49', NULL, 30000),
	(24, 15, 1, 15, 30000, '2019-01-23 18:12:41', '2018-11-27 05:20:10', NULL, 30000),
	(25, 16, 1, 15, 30000, '2018-12-02 08:52:29', '2018-12-02 01:52:29', '2018-12-02 01:52:29', NULL),
	(26, 17, 1, 15, 30000, '2018-11-28 10:19:18', '2018-11-28 03:19:18', '2018-11-28 03:19:18', NULL),
	(27, 18, 1, 15, 30000, '2018-11-28 10:01:55', '2018-11-28 03:01:55', '2018-11-28 03:01:55', NULL),
	(28, 19, 1, 5, 10000, '2018-11-28 10:03:41', '2018-11-28 03:03:41', '2018-11-28 03:03:41', NULL),
	(29, 20, 2, 1, 2000, '2018-11-27 05:28:13', '2018-11-27 05:28:13', NULL, NULL),
	(30, 21, 2, 1, 2000, '2018-11-27 05:30:56', '2018-11-27 05:30:56', NULL, NULL),
	(31, 22, 2, 1, 2000, '2018-11-28 11:58:00', '2018-11-28 04:58:00', '2018-11-28 04:58:00', NULL),
	(32, 23, 2, 3, 6000, '2018-11-28 10:14:43', '2018-11-28 03:14:43', '2018-11-28 03:14:43', NULL),
	(33, 24, 2, 3, 6000, '2018-11-28 10:12:32', '2018-11-28 03:12:32', '2018-11-28 03:12:32', NULL),
	(34, 22, 2, 9, 18000, '2018-12-02 08:52:13', '2018-12-02 01:52:13', '2018-12-02 01:52:13', NULL),
	(35, 25, 1, 10, 5000, '2019-01-23 10:04:27', '2019-01-23 10:04:27', NULL, 50000),
	(36, 25, 2, 5, 2500, '2019-01-23 10:04:27', '2019-01-23 10:04:27', NULL, 12500),
	(37, 26, 1, 5, 2000, '2019-01-26 14:15:19', '2019-01-26 07:15:19', '2019-01-26 07:15:19', 10000),
	(38, 26, 2, 5, 2000, '2019-01-26 14:15:19', '2019-01-26 07:15:19', '2019-01-26 07:15:19', 10000),
	(39, 26, 1, 10, 20000, '2019-01-26 14:15:19', '2019-01-26 07:15:19', '2019-01-26 07:15:19', 200000),
	(40, 26, 1, 5, 3000, '2019-01-26 14:20:34', '2019-01-26 07:20:34', '2019-01-26 07:20:34', 15000),
	(41, 26, 1, 5, 3000, '2019-01-26 14:22:25', '2019-01-26 07:22:25', '2019-01-26 07:22:25', 15000),
	(42, 26, 2, 13, 2000, '2019-01-26 14:22:26', '2019-01-26 07:22:26', '2019-01-26 07:22:26', 26000),
	(43, 26, 1, 5, 3000, '2019-01-26 07:22:26', '2019-01-26 07:22:26', NULL, 15000),
	(44, 26, 2, 13, 2000, '2019-01-26 07:22:26', '2019-01-26 07:22:26', NULL, 26000),
	(45, 27, 1, 15, 3000, '2019-01-26 08:58:45', '2019-01-26 08:58:45', NULL, 45000),
	(46, 27, 2, 3, 2000, '2019-01-26 08:58:45', '2019-01-26 08:58:45', NULL, 6000),
	(47, 28, 2, 15, 2000, '2019-01-26 09:00:09', '2019-01-26 09:00:09', NULL, 30000),
	(48, 28, 1, 100, 3500, '2019-01-26 09:00:09', '2019-01-26 09:00:09', NULL, 350000),
	(49, 28, 2, 10, 1000, '2019-01-26 09:00:09', '2019-01-26 09:00:09', NULL, 10000),
	(50, 29, 2, 550, 3000, '2019-01-27 06:09:07', '2019-01-27 06:09:07', NULL, 1650000),
	(51, 31, 2, 550, 3000, '2019-01-27 06:11:27', '2019-01-27 06:11:27', NULL, 1650000),
	(52, 32, 2, 550, 3000, '2019-01-27 06:11:57', '2019-01-27 06:11:57', NULL, 1650000),
	(53, 33, 2, 550, 3000, '2019-01-27 06:12:51', '2019-01-27 06:12:51', NULL, 1650000),
	(54, 34, 2, 550, 3000, '2019-01-27 06:13:18', '2019-01-27 06:13:18', NULL, 1650000),
	(55, 35, 2, 550, 3000, '2019-01-27 06:13:31', '2019-01-27 06:13:31', NULL, 1650000),
	(56, 36, 1, 150, 2000, '2019-01-27 06:35:56', '2019-01-27 06:35:56', NULL, 300000);
/*!40000 ALTER TABLE `penjualan_detail` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.supplier
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `telepon` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.supplier: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `supplier` DISABLE KEYS */;
INSERT IGNORE INTO `supplier` (`id`, `nama`, `alamat`, `kota`, `telepon`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'CV SURYA NAGA SAPUTRA', 'Jalan Pulau Moyo 1 Gang Garuda No. 6', 'Surabaya', '085123091209', '2018-11-13 02:23:14', '2018-11-12 19:23:14', NULL);
/*!40000 ALTER TABLE `supplier` ENABLE KEYS */;

-- membuang struktur untuk table erlangga_v2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `role` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel erlangga_v2.users: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT IGNORE INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `role`) VALUES
	(1, 'dimas', NULL, '$2y$10$o9ybqWfXlNFHujxuw5SYNOzu7R6By9NTTTOn3Qt0knphaaAkBsCva', '4NxCJJiuonXQ0IKHOophEJPaHeslfRnhX59YA5kl7ARCg3mZMR6a8pTx9lA4', '2019-03-09 12:29:09', '2018-11-12 18:15:07', NULL, 1),
	(2, 'rara', NULL, '$2y$10$a.o1w7YzRBfisFzwWxF40Om0oxbgKJ9qR.hluD3wS73PtrGP3OvtW', NULL, '2019-01-26 09:34:32', '2019-01-26 09:34:32', NULL, 0),
	(3, 'junita', NULL, '$2y$10$0IfLPwaWRLHHXqfsbqhs2OjpzJ2ZBRhamDzONT7IGp8WF0XQlfcHS', '2mtuOPBahgvpfXstoal3Daexbuz35VJxTIUaGmGWee425a3tcPCzErFiQvbN', '2019-03-09 12:30:16', '2019-03-09 05:29:28', NULL, 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
