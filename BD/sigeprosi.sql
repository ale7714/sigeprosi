-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-02-2012 a las 01:02:25
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sigeprosi`
--
DROP DATABASE IF EXISTS `sigeprosi`;
CREATE DATABASE `sigeprosi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sigeprosi`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `puntos` int(3) NOT NULL,
  `idTrimestre` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

CREATE TABLE IF NOT EXISTS `avance` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombreProyecto` varchar(50) NOT NULL,
  `numero` int(2) NOT NULL,
  `artefactos` int(3) NOT NULL,
  `iteracion` int(2) NOT NULL,
  `porcentaje` int(3) NOT NULL,
  `idActividad` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombreProyecto` (`nombreProyecto`,`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `id` int(11) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `rol` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidadusb`
--

CREATE TABLE IF NOT EXISTS `comunidadusb` (
  `id` int(11) NOT NULL,
  `cedula` int(10) NOT NULL,
  `tipoCliente` tinyint(1) NOT NULL,
  `tipoProfesor` tinyint(1) NOT NULL,
  `tipoEvaluador` tinyint(1) NOT NULL,
  `tipoAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolla`
--

CREATE TABLE IF NOT EXISTS `desarrolla` (
  `carnet` varchar(10) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  `idTrimestre` int(10) NOT NULL,
  PRIMARY KEY (`carnet`,`nombreProyecto`,`idTrimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esevaluado`
--

CREATE TABLE IF NOT EXISTS `esevaluado` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idAvance` int(10) NOT NULL,
  `carnetEstudiante` varchar(10) NOT NULL,
  `cedulaComunidadUSB` varchar(10) NOT NULL,
  `nota` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAvance` (`idAvance`,`carnetEstudiante`,`cedulaComunidadUSB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(11) NOT NULL,
  `carnet` varchar(10) NOT NULL,
  PRIMARY KEY (`carnet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lidera`
--

CREATE TABLE IF NOT EXISTS `lidera` (
  `cedula` varchar(10) NOT NULL,
  `idTrimestre` int(10) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`cedula`,`idTrimestre`,`nombreProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacionesesevaluado`
--

CREATE TABLE IF NOT EXISTS `observacionesesevaluado` (
  `idEsEvaluado` int(10) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  PRIMARY KEY (`idEsEvaluado`,`observaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

CREATE TABLE IF NOT EXISTS `pertenece` (
  `nombreUnidadAdministrativa` varchar(100) NOT NULL,
  `cedulaComunidadUSB` varchar(10) NOT NULL,
  PRIMARY KEY (`nombreUnidadAdministrativa`,`cedulaComunidadUSB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenecea`
--

CREATE TABLE IF NOT EXISTS `pertenecea` (
  `numeroSolicitud` varchar(20) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`numeroSolicitud`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `id` int(11) NOT NULL,
  `tipoLider` int(11) NOT NULL,
  `tipoEvaluador` int(11) NOT NULL,
  `tipoAdmin` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `nombre` varchar(50) NOT NULL,
  `numeroSolicitud` int(20) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0 es activo 1 es inactivo',
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasocia`
--

CREATE TABLE IF NOT EXISTS `seasocia` (
  `id` int(11) NOT NULL,
  `numeroSolicitud` varchar(25) NOT NULL,
  PRIMARY KEY (`id`,`numeroSolicitud`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seevalua`
--

CREATE TABLE IF NOT EXISTS `seevalua` (
  `carnetEstudiante` varchar(10) NOT NULL,
  `cedulaComunidadUSB` int(10) NOT NULL,
  `idActividad` int(10) NOT NULL,
  `nota` int(3) NOT NULL,
  PRIMARY KEY (`carnetEstudiante`,`cedulaComunidadUSB`,`idActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `nro` varchar(20) NOT NULL,
  `planteamiento` varchar(200) NOT NULL,
  `justificacion` varchar(200) NOT NULL,
  `email` varchar(20) NOT NULL,
  `tiempo` varchar(15) NOT NULL,
  `tecnologia` varchar(100) NOT NULL,
  `nroAfectados` int(8) NOT NULL,
  `nombreUnidadAdministrativa` varchar(100) NOT NULL,
  `estado` int(3) NOT NULL,
  PRIMARY KEY (`nro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`nro`, `planteamiento`, `justificacion`, `email`, `tiempo`, `tecnologia`, `nroAfectados`, `nombreUnidadAdministrativa`, `estado`) VALUES
('06c0f673', 'fdkofkjlfjkldkjj', 'hggfhhghf', 'ale@usb.ve', 'gghgfhghfhggfhg', 'kjfkjfkfgkggk', 123, 'Asociacion de Amigos', 0),
('0ae5810d', 'cvdfggffd', 'fdsfdgdfgf', 'b@usb.ve', 'dffgfdgfdg', 'ggfdggfhgfgfhg', 123, 'Asociacion de Amigos', 0),
('213cb361', 'ffergetgtrrg ', 'yhhtth', 'c@usb.ve', 'htyhtyh', 'tnhhtyntntyntynrt', 12233, 'Centro de Documentacion y Archivo (CENDA)', 0),
('2a5547', 'cvcdfv', 'bgbgbgffgbgf', 'b@usb.ve', 'ggbdbgf', 'vfdsfg', 1223, 'Asociacion de Egresados', 0),
('2ed0850f', 'cddfd', 'gfgdd', 'a@usb.ve', 'ggfdf', 'gggf', 1223, 'ArteVision', 0),
('682abbad', 'tenemos ', 'help!', 'c@usb.ve', 'problema', 'un ', 123, 'Asociacion de Amigos', 0),
('7fffffff', 'dsdsfdg d', 'adsdasfsadfsdfffg', 'a@usb.ve', 'sadsfsdfdsfv', 'sdsdsfdsdf', 1223, 'ArteVision', 0),
('d6822a5', 'ffergetgtrrg ', 'yhhtth', 'c@usb.ve', 'htyhtyh', 'tnhhtyntntyntynrt', 12233, 'Centro de Documentacion y Archivo (CENDA)', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonosolicitud`
--

CREATE TABLE IF NOT EXISTS `telefonosolicitud` (
  `nroSolicitud` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nroSolicitud`,`telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `telefonosolicitud`
--

INSERT INTO `telefonosolicitud` (`nroSolicitud`, `telefono`) VALUES
('00685aa7', '04121234123'),
('00685aa7', '04141231234'),
('06c0f673', '04121234567'),
('0ae5810d', '02121234123'),
('213cb361', '04241234567'),
('2a5547', '04161234567'),
('2a5547', '04247654321'),
('2ed0850f', '04121234567'),
('2ed0850f', '04141234567'),
('2ed0850f', '04241234567'),
('682abbad', '04121234567'),
('682abbad', '04147654321'),
('7fffffff', '02121234567'),
('d6822a5', '04141234567'),
('d6822a5', '04261234567');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonounidadadministrativa`
--

CREATE TABLE IF NOT EXISTS `telefonounidadadministrativa` (
  `nombreUnidad` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nombreUnidad`,`telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestre`
--

CREATE TABLE IF NOT EXISTS `trimestre` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `anio` int(10) NOT NULL,
  `mesInicio` varchar(20) NOT NULL,
  `mesFin` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `anio` (`anio`,`mesInicio`,`mesFin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadadministrativa`
--

CREATE TABLE IF NOT EXISTS `unidadadministrativa` (
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correoUSB` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `correoOpcional` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `correoUSB`, `password`, `correoOpcional`, `activo`) VALUES
(1, 'Administrador', 'Sistema', 'admin@usb.ve', 'admin', NULL, 1),
(2, '', '', 'uno@usb.ve', '492c239d', '', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
