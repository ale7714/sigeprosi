-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-02-2012 a las 04:00:30
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
  `idEtapa` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CLAVE_PRIMARIA` (`nombre`,`fecha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolla`
--

CREATE TABLE IF NOT EXISTS `desarrolla` (
  `nombreEquipo` varchar(50) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  PRIMARY KEY (`nombreEquipo`,`nombreProyecto`,`idEtapa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `nombre` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapa`
--

CREATE TABLE IF NOT EXISTS `etapa` (
  `nombre` varchar(30) NOT NULL,
  `numero` int(1) NOT NULL,
  `id` int(100) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CLAVE_PRIMARIA` (`nombre`,`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evalua`
--

CREATE TABLE IF NOT EXISTS `evalua` (
  `correoUSBUsuarioCUSB` varchar(50) NOT NULL,
  `correoUSBUsuarioEst` varchar(50) NOT NULL,
  `idActividad` int(10) NOT NULL,
  `nota` int(3) NOT NULL,
  `id` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CLAVE_PRIMARIA` (`correoUSBUsuarioCUSB`,`correoUSBUsuarioEst`,`idActividad`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lidera`
--

CREATE TABLE IF NOT EXISTS `lidera` (
  `correoUSBUsuario` varchar(50) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`idEtapa`,`nombreProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacionesevalua`
--

CREATE TABLE IF NOT EXISTS `observacionesevalua` (
  `idEvalua` int(10) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  UNIQUE KEY `idEvalua` (`idEvalua`,`observaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participa`
--

CREATE TABLE IF NOT EXISTS `participa` (
  `correoUSBUsuario` varchar(50) NOT NULL,
  `idTrimestre` int(10) NOT NULL,
  `nombreEquipo` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`idTrimestre`,`nombreEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

CREATE TABLE IF NOT EXISTS `pertenece` (
  `nombreUnidadAdministrativa` varchar(100) NOT NULL,
  `correoUSBUsuario` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `nombre` varchar(50) NOT NULL,
  `numeroSolicitud` int(20) NOT NULL,
  `estado` int(1) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasocia`
--

CREATE TABLE IF NOT EXISTS `seasocia` (
  `correoUSBUsuario` varchar(50) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`nombreProyecto`)
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonosolicitud`
--

CREATE TABLE IF NOT EXISTS `telefonosolicitud` (
  `nroSolicitud` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nroSolicitud`,`telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE IF NOT EXISTS `tiene` (
  `nombreProyecto` varchar(50) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  PRIMARY KEY (`nombreProyecto`,`idEtapa`)
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
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `correoUSB` varchar(50) NOT NULL,
  `password` varchar(15) NOT NULL,
  `correoOpcional` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `rol` int(2) NOT NULL,
  `carnetOCedula` varchar(10) NOT NULL,
  PRIMARY KEY (`correoUSB`),
  UNIQUE KEY `carnetOCedula` (`carnetOCedula`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `observacionesevalua`
--
ALTER TABLE `observacionesevalua`
  ADD CONSTRAINT `observacionesevalua_ibfk_1` FOREIGN KEY (`idEvalua`) REFERENCES `evalua` (`id`);

--
-- Filtros para la tabla `telefonosolicitud`
--
ALTER TABLE `telefonosolicitud`
  ADD CONSTRAINT `telefonosolicitud_ibfk_1` FOREIGN KEY (`nroSolicitud`) REFERENCES `solicitud` (`nro`);

--
-- Filtros para la tabla `telefonounidadadministrativa`
--
ALTER TABLE `telefonounidadadministrativa`
  ADD CONSTRAINT `telefonounidadadministrativa_ibfk_1` FOREIGN KEY (`nombreUnidad`) REFERENCES `unidadadministrativa` (`nombre`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_5` FOREIGN KEY (`correoUSB`) REFERENCES `lidera` (`correoUSBUsuario`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`correoUSB`) REFERENCES `evalua` (`correoUSBUsuarioCUSB`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`correoUSB`) REFERENCES `pertenece` (`correoUSBUsuario`),
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`correoUSB`) REFERENCES `seasocia` (`correoUSBUsuario`),
  ADD CONSTRAINT `usuario_ibfk_4` FOREIGN KEY (`correoUSB`) REFERENCES `participa` (`correoUSBUsuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
