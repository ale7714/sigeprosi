-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-01-2012 a las 04:35:28
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


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

DROP TABLE IF EXISTS `actividad`;
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

--
-- Volcar la base de datos para la tabla `actividad`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avance`
--

DROP TABLE IF EXISTS `avance`;
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

--
-- Volcar la base de datos para la tabla `avance`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comunidadusb`
--

DROP TABLE IF EXISTS `comunidadusb`;
CREATE TABLE IF NOT EXISTS `comunidadusb` (
  `id` int(11) NOT NULL,
  `cedula` int(10) NOT NULL,
  `tipoCliente` tinyint(1) NOT NULL,
  `tipoProfesor` tinyint(1) NOT NULL,
  `tipoEvaluador` tinyint(1) NOT NULL,
  `tipoAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `comunidadusb`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolla`
--

DROP TABLE IF EXISTS `desarrolla`;
CREATE TABLE IF NOT EXISTS `desarrolla` (
  `carnet` varchar(10) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  `idTrimestre` int(10) NOT NULL,
  PRIMARY KEY (`carnet`,`nombreProyecto`,`idTrimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `desarrolla`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esevaluado`
--

DROP TABLE IF EXISTS `esevaluado`;
CREATE TABLE IF NOT EXISTS `esevaluado` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idAvance` int(10) NOT NULL,
  `carnetEstudiante` varchar(10) NOT NULL,
  `cedulaComunidadUSB` varchar(10) NOT NULL,
  `nota` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idAvance` (`idAvance`,`carnetEstudiante`,`cedulaComunidadUSB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `esevaluado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

DROP TABLE IF EXISTS `estudiante`;
CREATE TABLE IF NOT EXISTS `estudiante` (
  `id` int(11) NOT NULL,
  `carnet` varchar(10) NOT NULL,
  PRIMARY KEY (`carnet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `estudiante`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lidera`
--

DROP TABLE IF EXISTS `lidera`;
CREATE TABLE IF NOT EXISTS `lidera` (
  `cedula` varchar(10) NOT NULL,
  `idTrimestre` int(10) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`cedula`,`idTrimestre`,`nombreProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `lidera`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacionesesevaluado`
--

DROP TABLE IF EXISTS `observacionesesevaluado`;
CREATE TABLE IF NOT EXISTS `observacionesesevaluado` (
  `idEsEvaluado` int(10) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  PRIMARY KEY (`idEsEvaluado`,`observaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `observacionesesevaluado`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

DROP TABLE IF EXISTS `pertenece`;
CREATE TABLE IF NOT EXISTS `pertenece` (
  `nombreUnidadAdministrativa` varchar(100) NOT NULL,
  `cedulaComunidadUSB` varchar(10) NOT NULL,
  PRIMARY KEY (`nombreUnidadAdministrativa`,`cedulaComunidadUSB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `pertenece`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
CREATE TABLE IF NOT EXISTS `proyecto` (
  `nombre` varchar(50) NOT NULL,
  `numeroSolicitud` int(20) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `proyecto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasocia`
--

DROP TABLE IF EXISTS `seasocia`;
CREATE TABLE IF NOT EXISTS `seasocia` (
  `cedula` varchar(10) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`cedula`,`nombreProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `seasocia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seevalua`
--

DROP TABLE IF EXISTS `seevalua`;
CREATE TABLE IF NOT EXISTS `seevalua` (
  `carnetEstudiante` varchar(10) NOT NULL,
  `cedulaComunidadUSB` int(10) NOT NULL,
  `idActividad` int(10) NOT NULL,
  `nota` int(3) NOT NULL,
  PRIMARY KEY (`carnetEstudiante`,`cedulaComunidadUSB`,`idActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `seevalua`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
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
-- Volcar la base de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`nro`, `planteamiento`, `justificacion`, `email`, `tiempo`, `tecnologia`, `nroAfectados`, `nombreUnidadAdministrativa`, `estado`) VALUES
('09c91556', 'gdfgdf', 'gfdhhf', 'a@usb.ve', 'hfd', 'fgfghfd', 233, 'Apoyo Logistico', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `teledonounidadadministrativa`
--

DROP TABLE IF EXISTS `telefonounidadadministrativa`;
CREATE TABLE IF NOT EXISTS `telefonounidadadministrativa` (
  `nombreUnidad` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nombreUnidad`,`telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `teledonounidadadministrativa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonosolicitud`
--

DROP TABLE IF EXISTS `telefonosolicitud`;
CREATE TABLE IF NOT EXISTS `telefonosolicitud` (
  `nroSolicitud` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nroSolicitud`,`telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `telefonosolicitud`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestre`
--

DROP TABLE IF EXISTS `trimestre`;
CREATE TABLE IF NOT EXISTS `trimestre` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `anio` int(10) NOT NULL,
  `mesInicio` varchar(20) NOT NULL,
  `mesFin` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `anio` (`anio`,`mesInicio`,`mesFin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `trimestre`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidadadministrativa`
--

DROP TABLE IF EXISTS `unidadadministrativa`;
CREATE TABLE IF NOT EXISTS `unidadadministrativa` (
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `unidadadministrativa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correoUSB` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `correoOpcional` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

