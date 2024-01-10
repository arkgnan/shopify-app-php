/*
SQLyog Trial v13.1.9 (64 bit)
MySQL - 8.0.25-15 : Database - shopify_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `billings` */

DROP TABLE IF EXISTS `billings`;

CREATE TABLE `billings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `charge_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gid` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_url` (`shop_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `billings` */

/*Table structure for table `recurring_billing` */

DROP TABLE IF EXISTS `recurring_billing`;

CREATE TABLE `recurring_billing` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `charge_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gid` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_url` (`shop_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `recurring_billing` */

/*Table structure for table `sessions` */

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `session_token` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_url` (`shop_url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `sessions` */

/*Table structure for table `shops` */

DROP TABLE IF EXISTS `shops`;

CREATE TABLE `shops` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_url` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `hmac` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shop_url` (`shop_url`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `shops` */

insert  into `shops`(`id`,`shop_url`,`access_token`,`hmac`,`created_at`,`updated_at`) values 
(1,'icube-anan.myshopify.com','shpua_7515c3817b636c6941c6953b0d181b6a','c0afc7a74a64186b739a940c97017d5177e39555f235c12fda91ea75076e183b','2024-01-09 17:35:52','2024-01-09 17:35:52');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
