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

-- Volcando estructura para tabla cuestionario.preguntas
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `enunciado` varchar(255) NOT NULL,
  `respuesta_correcta` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cuestionario.preguntas: 3 rows
/*!40000 ALTER TABLE `preguntas` DISABLE KEYS */;
REPLACE INTO `preguntas` (`id_pregunta`, `enunciado`, `respuesta_correcta`) VALUES
	(1, '¿Qué te gustaría que agregáramos al informe?', NULL),
	(2, '¿La información es correcta? SÍ/NO/MÁS O MENOS', NULL),
	(3, '¿Del 1 al 5, es rápido el sitio?', NULL);
/*!40000 ALTER TABLE `preguntas` ENABLE KEYS */;

-- Volcando estructura para tabla cuestionario.respuestas_usuario
CREATE TABLE IF NOT EXISTS `respuestas_usuario` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario_responde` int(11) NOT NULL DEFAULT '0',
  `id_pregunta` int(11) NOT NULL DEFAULT '0',
  `respuesta_dada` varchar(255) NOT NULL,
  `fecha_respuesta` datetime NOT NULL,
  PRIMARY KEY (`id_respuesta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cuestionario.respuestas_usuario: 3 rows
/*!40000 ALTER TABLE `respuestas_usuario` DISABLE KEYS */;
REPLACE INTO `respuestas_usuario` (`id_respuesta`, `id_usuario_responde`, `id_pregunta`, `respuesta_dada`, `fecha_respuesta`) VALUES
	(1, 1, 1, 'sefrwsefewfewf', '2020-03-13 01:14:30'),
	(2, 1, 2, 'Sí', '2020-03-13 01:14:30'),
	(3, 1, 3, '5', '2020-03-13 01:14:30');
/*!40000 ALTER TABLE `respuestas_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla cuestionario.tipo_usuario
CREATE TABLE IF NOT EXISTS `tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cuestionario.tipo_usuario: 2 rows
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
REPLACE INTO `tipo_usuario` (`id_tipo_usuario`, `nombre`) VALUES
	(1, 'administrador'),
	(2, 'usuario');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;

-- Volcando estructura para tabla cuestionario.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_user` int(11) NOT NULL DEFAULT '0',
  `nombre` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pass` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla cuestionario.usuarios: 2 rows
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
REPLACE INTO `usuarios` (`id_usuario`, `id_tipo_user`, `nombre`, `mail`, `pass`) VALUES
	(1, 1, 'admin', 'admin@test.com', '21232f297a57a5a743894a0e4a801fc3'),
	(2, 2, 'usuario', 'usuario@test.com', 'f8032d5cae3de20fcec887f395ec9a6a');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
