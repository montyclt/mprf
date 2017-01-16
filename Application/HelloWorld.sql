-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.16-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para test
CREATE DATABASE IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `test`;

-- Volcando estructura para tabla test.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'User''s ID',
  `name` varchar(50) NOT NULL COMMENT 'User''s name',
  `age` int(11) NOT NULL COMMENT 'User''s age',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Created at',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'Updated at',
  `deleted_at` timestamp NULL DEFAULT NULL COMMENT 'Deleted at',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Users table';

-- Volcando datos para la tabla test.users: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
REPLACE INTO `users` (`id`, `name`, `age`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Pepe', 18, '2017-01-15 21:57:43', '2017-01-15 21:58:40', NULL),
	(2, 'Maria', 21, '2017-01-15 21:57:43', '2017-01-15 21:58:44', NULL),
	(3, 'Juan', 23, '2017-01-15 21:58:55', '2017-01-15 21:59:07', NULL),
	(4, 'Manolo', 20, '2017-01-15 21:59:03', '2017-01-15 21:59:09', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
