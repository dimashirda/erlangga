/*
SQLyog Professional v10.42 
MySQL - 5.5.5-10.1.40-MariaDB : Database - erlangga_v2
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`erlangga_v2` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `erlangga_v2`;

/*Table structure for table `giro` */

DROP TABLE IF EXISTS `giro`;

CREATE TABLE `giro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nominal` int(20) DEFAULT NULL,
  `penjualan_id` int(11) DEFAULT NULL,
  `tanggal_cair` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `konfirmasi` int(1) DEFAULT NULL COMMENT '0=belum di cair, 1=sudah cair',
  `no_seri` varchar(255) DEFAULT NULL,
  `confirmed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
