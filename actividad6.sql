-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 07-12-2021 a las 02:15:38
-- Versión del servidor: 8.0.21
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actividad6`
--
CREATE DATABASE IF NOT EXISTS `actividad6` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `actividad6`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `colortexto` varchar(7) DEFAULT NULL,
  `colorfondo` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`codigo`, `titulo`, `descripcion`, `inicio`, `fin`, `colortexto`, `colorfondo`) VALUES
(1, 'Clase de tai-chi', '', '2019-10-07 09:15:00', '2019-10-07 10:15:00', '#ffffff', '#94ceca'),
(2, 'Clase de pilates', '', '2019-10-07 11:00:00', '2019-10-07 11:50:00', '#ffffff', '#14868c'),
(3, 'Clase de tai-chi', '', '2019-10-08 09:15:00', '2019-10-08 10:15:00', '#ffffff', '#94ceca'),
(4, 'Clase de pilates', '', '2019-10-08 11:00:00', '2019-10-08 11:50:00', '#ffffff', '#14868c'),
(5, 'Clase de yoga', '', '2019-10-08 13:05:00', '2019-10-08 14:00:00', '#ffffff', '#2f416d'),
(6, 'Clase de calistenia', '', '2019-10-08 18:05:00', '2019-10-08 19:00:00', '#ffffff', '#5d1451'),
(7, 'Clase de calistenia', '', '2019-10-09 18:05:00', '2019-10-09 19:00:00', '#ffffff', '#5d1451'),
(8, 'Clase de calistenia', '', '2019-10-10 18:05:00', '2019-10-10 19:00:00', '#ffffff', '#5d1451'),
(9, 'Clase de tai-chi', '', '2019-10-11 09:15:00', '2019-10-11 10:15:00', '#ffffff', '#94ceca'),
(10, 'Clase de pilates', '', '2019-10-11 11:00:00', '2019-10-11 11:50:00', '#ffffff', '#14868c'),
(11, 'Almuerzo a la canasta', 'Trae cada uno su comida', '2019-10-07 12:15:00', '2019-10-07 13:00:00', '#ffffff', '#3788d8'),
(12, 'Clase de calistenia', '', '2019-10-07 18:05:00', '2019-10-07 19:00:00', '#ffffff', '#5d1451'),
(13, 'Clase de calistenia', '', '2019-10-11 18:05:00', '2019-10-11 19:00:00', '#ffffff', '#5d1451'),
(14, 'Reunión de personal', '', '2019-10-08 21:00:00', '2019-10-08 22:00:00', '#ffffff', '#3788d8'),
(15, 'Desayuno de grupo', '', '2019-10-10 07:00:00', '2019-10-10 08:00:00', '#ffffff', '#3788d8'),
(16, 'Cerrado por desinfección', '', '2019-10-12 00:05:00', '2019-10-12 23:55:00', '#ffffff', '#3788d8'),
(17, 'Día de descanso', '', '2019-10-13 00:05:00', '2019-10-13 23:55:00', '#ffffff', '#3788d8'),
(18, 'Clase de Matematicas', '', '2021-12-07 09:15:00', '2021-12-07 10:15:00', '#ffffff', '#94ceca'),
(19, 'Clase de Algebra', '', '2021-12-07 11:00:00', '2021-12-07 11:50:00', '#ffffff', '#14868c'),
(20, 'Clase de Fundamentos de diseño', '', '2021-12-07 09:15:00', '2021-12-07 10:15:00', '#ffffff', '#94ceca'),
(21, 'Clase de Historia', '', '2021-12-07 11:00:00', '2021-12-07 11:50:00', '#ffffff', '#14868c'),
(22, 'Clase de yoga', '', '2021-12-07 13:05:00', '2021-12-07 14:00:00', '#ffffff', '#2f416d'),
(23, 'Clase de calistenia', '', '2021-12-07 18:05:00', '2021-12-07 19:00:00', '#ffffff', '#5d1451'),
(24, 'Clase de calistenia', '', '2021-12-08 18:05:00', '2021-12-08 19:00:00', '#ffffff', '#5d1451'),
(25, 'Clase de calistenia', '', '2021-12-08 18:05:00', '2021-12-08 19:00:00', '#ffffff', '#5d1451'),
(26, 'Clase de tai-chi', '', '2021-12-09 09:15:00', '2021-12-09 10:15:00', '#ffffff', '#94ceca'),
(27, 'Clase de pilates', '', '2021-12-09 11:00:00', '2021-12-09 11:50:00', '#ffffff', '#14868c'),
(28, 'Almuerzo a la canasta', 'Trae cada uno su comida', '2021-12-10 12:15:00', '2021-12-10 13:00:00', '#ffffff', '#3788d8'),
(29, 'Clase de calistenia', '', '2021-12-10 18:05:00', '2021-12-10 19:00:00', '#ffffff', '#5d1451'),
(30, 'Clase de calistenia', '', '2021-12-09 18:05:00', '2021-12-09 19:00:00', '#ffffff', '#5d1451'),
(31, 'Reunión de personal', '', '2021-12-07 21:00:00', '2021-12-07 22:00:00', '#ffffff', '#3788d8'),
(32, 'Desayuno de grupo', '', '2021-12-08 07:00:00', '2021-12-08 08:00:00', '#ffffff', '#3788d8'),
(33, 'Cerrado por desinfección', '', '2021-12-11 00:05:00', '2021-12-11 23:55:00', '#ffffff', '#3788d8'),
(34, 'Día de descanso', '', '2021-12-14 00:05:00', '2021-12-14 23:55:00', '#ffffff', '#3788d8');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventospredefinidos`
--

DROP TABLE IF EXISTS `eventospredefinidos`;
CREATE TABLE IF NOT EXISTS `eventospredefinidos` (
  `codigo` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) DEFAULT NULL,
  `horainicio` time DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `colortexto` varchar(7) DEFAULT NULL,
  `colorfondo` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventospredefinidos`
--

INSERT INTO `eventospredefinidos` (`codigo`, `titulo`, `horainicio`, `horafin`, `colortexto`, `colorfondo`) VALUES
(1, 'Clase de tai-chi', '09:15:00', '10:15:00', '#ffffff', '#94ceca'),
(2, 'Clase de pilates', '11:00:00', '11:50:00', '#ffffff', '#14868c'),
(3, 'Clase de yoga', '13:05:00', '14:00:00', '#ffffff', '#2f416d'),
(4, 'Clase de calistenia', '18:05:00', '19:00:00', '#ffffff', '#5d1451');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `contrasena` varchar(80) NOT NULL,
  `nombres` varchar(120) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `contrasena`, `nombres`) VALUES
(1, 'luis', 'luis', 'Luis Piedrahita');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
