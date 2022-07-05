-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.7.33 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para stranger_things
CREATE DATABASE IF NOT EXISTS `stranger_things` /*!40100 DEFAULT CHARACTER SET utf16 COLLATE utf16_spanish_ci */;
USE `stranger_things`;

-- Volcando estructura para tabla stranger_things.personajes
CREATE TABLE IF NOT EXISTS `personajes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `alias` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nacimiento` int(11) NOT NULL,
  `estado` enum('vivo','fallecido','en coma','desconocido') COLLATE utf8_spanish_ci NOT NULL DEFAULT 'vivo',
  `info` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla stranger_things.personajes: ~18 rows (aproximadamente)
/*!40000 ALTER TABLE `personajes` DISABLE KEYS */;
INSERT INTO `personajes` (`id`, `nombre`, `apellido`, `alias`, `nacimiento`, `estado`, `info`) VALUES
	(1, 'Jane', 'Hopper', 'Once', 1971, 'vivo', ' Es interpretada por Millie Bobby Brown'),
	(2, 'Mike', 'Wheeler', 'Cara de Rana', 1971, 'vivo', ' Es interpretado por Finn Wolfhard.'),
	(3, 'Will', 'Byers', 'Chico Zombie', 1971, 'vivo', 'Es interpretado por Noah Schnapp.'),
	(4, 'Lucas', 'Sinclair', 'Stalker', 1971, 'vivo', 'Es interpretado por Caleb McLaughlin'),
	(5, 'Dustin', 'Henderson', 'Desdentado', 1971, 'vivo', ' Es interpretado por Gaten Matarazzo'),
	(6, 'Max', 'Mayfield', 'MadMax', 1971, 'en coma', 'Es interpretado por Sadie Sink'),
	(7, 'Jim', 'Hopper', 'Hop', 1940, 'vivo', 'Es interpretado por David Harbour'),
	(8, 'Joyce', 'Byers', 'Joy', 1942, 'vivo', 'Es interpretado por Winona Ryder'),
	(9, 'Bob', 'Newby', 'Superheroe', 1940, 'fallecido', 'Es interpretado por Sean Astin'),
	(10, 'Jonathan ', 'Byers', 'Jon', 1966, 'vivo', 'Es interpretado por Charlie Heaton'),
	(11, 'Nancy ', 'Wheeler', 'La princesa', 1966, 'vivo', ' Es interpretada por Natalia Dyer'),
	(12, 'Steve', 'Harrington', 'Mama Luchona', 1966, 'vivo', 'Es interpretado por Joe Keery'),
	(13, 'Robin', 'Buckley', 'Rob', 1968, 'vivo', 'Es interpretado por Maya Hawke'),
	(14, 'Billy ', 'Hargrove', 'SOS', 1967, 'fallecido', 'Es interpretado por Dacre Montgomery'),
	(15, 'Eddie', 'Munson', 'El Desterrado', 1965, 'vivo', 'Es  interpretado por Joseph Quinn'),
	(16, 'Demogorgon ', 'Monstruo', 'Hombre sin rostro', 1980, 'desconocido', 'Criatura humanoide depredadora'),
	(17, 'Ms', 'Kelly', 'Vecna', 1962, 'desconocido', 'Es interpretado por Regina Ting Chen'),
	(18, 'Martin ', 'Brenner', 'Papa', 1938, 'fallecido', 'Es interpretado por Matthew Modine');
/*!40000 ALTER TABLE `personajes` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
