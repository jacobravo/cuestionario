-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para cuestionario
CREATE DATABASE IF NOT EXISTS `cuestionario` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `cuestionario`;

-- Volcando estructura para tabla cuestionario.respuestas_usuario
CREATE TABLE IF NOT EXISTS `respuestas_usuario` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_responde` int(11) NOT NULL DEFAULT '0',
  `id_pregunta` int(11) NOT NULL DEFAULT '0',
  `respuesta_dada` varchar(255) NOT NULL,
  `fecha_respuesta` datetime NOT NULL,
  PRIMARY KEY (`id_respuesta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
