-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-03-2012 a las 01:56:08
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
  `semana` int(3) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `fecha` date NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `puntos` int(3) NOT NULL,
  `idEtapa` int(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CLAVE_PRIMARIA` (`nombre`,`fecha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id`, `semana`, `nombre`, `fecha`, `descripcion`, `puntos`, `idEtapa`) VALUES
(1, 2, 'nuevo', '2012-02-29', 'Tarea que entregar', 24, 1),
(2, 6, 'viejo', '2012-02-29', 'Asignaciones por entregar', 17, 1),
(3, 6, 'esooo', '2012-03-22', 'El descanso de medio tiempo', 24, 1),
(4, 3, 'Actividad', '2012-02-11', 'Aprobar la materia', 100, 2),
(5, 4, 'Entrega 1', '2011-10-14', 'INICIO (1a iteraciÃ³n): Doc. VisiÃ³n del Sistema, Caso del Negocio (Modelo de Casos de Uso del Negoc', 3, 3),
(6, 6, 'Entrega 2', '2011-10-28', 'Prototipo Funcional con 10% de funcionalidad.', 5, 3),
(7, 6, 'Entrega 3', '2011-10-28', 'INICIO (1a iteraciÃ³n): ERS (Modelo de Casos de Uso Inicial, Requerimientos Funcionales y suplementa', 5, 3),
(8, 8, 'Entrega 4', '2011-11-11', 'INICIO (2a iteraciÃ³n): Doc. de Arquitectura del Software - Vista de Casos de Uso (Modelo de Casos d', 2, 3),
(9, 9, 'Entrega 5', '2011-11-18', 'Prototipo Funcional con 20% de funcionalidad.', 3, 3),
(10, 11, 'Entrega 6', '2011-12-02', 'Prototipo Arquitectural con 30% desarrollado y con validaciones.', 7, 3),
(11, 11, 'Entrega 7', '2011-12-02', 'Informe consolidado que incorpore todas las observaciones corregidas, en formato digital e impreso.\r', 10, 3),
(12, 7, 'Quices ', '2011-11-04', 'Quiz 1 y quiz 2', 10, 3),
(13, 1, 'Ejercicios/Practicas', '2011-09-16', 'Promedio de actividades durante todo el trimestre', 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividaditeracion`
--

CREATE TABLE IF NOT EXISTS `actividaditeracion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idIteracion` int(10) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(250) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  PRIMARY KEY (`id`,`idIteracion`),
  UNIQUE KEY `nombre` (`nombre`,`fechaInicio`,`fechaFin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Volcado de datos para la tabla `actividaditeracion`
--

INSERT INTO `actividaditeracion` (`id`, `idIteracion`, `nombre`, `descripcion`, `fechaInicio`, `fechaFin`) VALUES
(1, 11, 'lksjaflksaj', 'safjlaskfjlks', '2012-03-05', '0000-00-00'),
(2, 12, 'lksjaflksajsafsaf', 'safjlaskfjlks', '2012-03-05', '2012-03-05'),
(3, 12, 'asfsafsa', 'svscasc', '2012-03-05', '2012-03-08'),
(4, 14, 'lksjsfs', 'safjlaskfjlks', '2012-03-05', '2012-03-05'),
(5, 14, 'afasfsf', 'asfas', '2012-03-12', '2012-03-06'),
(6, 15, 'lksjsfsAAAA', 'safjlaskfjlks', '2012-03-05', '2012-03-05'),
(7, 15, 'NNNNN', 'NNNN', '2012-03-28', '2012-03-30'),
(8, 17, '1', 'safjlaskfjlks', '2012-03-05', '2012-03-05'),
(9, 18, '2', 'safjlaskfjlks', '2012-03-20', '2012-03-23'),
(10, 19, '3', 'safjlaskfjlks', '2012-03-20', '2012-03-23'),
(11, 20, '4', 'safjlaskfjlks', '2012-03-20', '2012-03-23'),
(12, 21, '5', 'safjlaskfjlks', '2012-03-20', '2012-03-23'),
(13, 22, '6', 'safjlaskfjlks', '2012-03-20', '2012-03-23'),
(14, 23, '7', 'safjlaskfjlks', '2012-03-20', '2012-03-23'),
(15, 24, '8', 'safjlaskfjlks', '2012-03-20', '2012-03-23'),
(16, 24, '9', 'asfasf', '2012-03-06', '2012-03-08'),
(17, 24, '', '', '0000-00-00', '0000-00-00'),
(18, 25, 'act1', 'dec1', '2012-03-26', '2012-03-21'),
(19, 25, 'act2', 'des2', '2012-03-27', '2012-03-09'),
(20, 25, 'acct3', 'act4', '2012-03-19', '2012-03-16'),
(21, 26, '99', '99', '2012-03-26', '2012-03-15'),
(22, 27, '999', '999', '2012-03-26', '2012-03-15'),
(23, 28, '9998', '999', '2012-03-26', '2012-03-15'),
(24, 28, 'J', 'J', '2012-03-13', '2012-03-27'),
(25, 29, '99984', '9994', '2012-03-26', '2012-03-15'),
(26, 30, '99984s', '9994s', '2012-03-26', '2012-03-15'),
(27, 31, '99984ss', '9994ss', '2012-03-26', '2012-03-15'),
(28, 32, 'z', 'z', '2012-03-20', '2012-03-02'),
(29, 33, 'yy', 'yy', '2012-03-06', '2012-03-23'),
(30, 34, 'zzzzzzz', 'zzzzz', '2012-03-19', '2012-03-24'),
(31, 35, 'hb hu ', 'bubiu', '2012-03-13', '2012-03-23'),
(32, 36, 'hb hu ff', 'bubiufff', '2012-03-13', '2012-03-23'),
(33, 37, 'hb hu ffggg', 'bubiufff', '2012-03-13', '2012-03-23'),
(34, 38, 'hb hu ffggglk;', 'bubiufff', '2012-03-13', '2012-03-23'),
(35, 39, '67', 'bubiufff', '2012-03-20', '2012-03-23'),
(36, 40, '9999', '9999', '2012-03-27', '2012-03-16'),
(37, 41, 'sssss', 'sssss', '2012-03-27', '2012-03-16'),
(38, 1, 'a', 'a', '2012-03-27', '2012-03-16'),
(39, 2, 'acto1', 'desc1', '2012-03-21', '2012-03-16'),
(40, 2, 'act2', 'desc2', '2012-03-27', '2012-03-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artefactositeracion`
--

CREATE TABLE IF NOT EXISTS `artefactositeracion` (
  `idIteracion` int(10) NOT NULL,
  `artefactos` varchar(100) NOT NULL,
  PRIMARY KEY (`idIteracion`,`artefactos`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casodeuso`
--

CREATE TABLE IF NOT EXISTS `casodeuso` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `completitud` int(3) NOT NULL DEFAULT '0',
  `idEquipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `casodeuso`
--

INSERT INTO `casodeuso` (`id`, `nombre`, `descripcion`, `completitud`, `idEquipo`) VALUES
(1, 'registrar Usuario', 'se permitira que un usuario cualquiera se registre', 0, 'Jaiva'),
(2, 'iniciar sesion', 'se permitira que un usuario registrado inicie sesion', 0, 'Jaiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE IF NOT EXISTS `catalogo` (
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`nombre`) VALUES
('Artefactos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterioscasodeuso`
--

CREATE TABLE IF NOT EXISTS `criterioscasodeuso` (
  `idCasoDeUso` int(10) NOT NULL,
  `criterios` varchar(50) NOT NULL,
  PRIMARY KEY (`idCasoDeUso`,`criterios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `criterioscasodeuso`
--

INSERT INTO `criterioscasodeuso` (`idCasoDeUso`, `criterios`) VALUES
(1, 'cu1'),
(2, 'a'),
(2, 'cu2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criteriospei`
--

CREATE TABLE IF NOT EXISTS `criteriospei` (
  `idPEI` int(10) NOT NULL,
  `criterios` varchar(100) NOT NULL,
  PRIMARY KEY (`idPEI`,`criterios`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `criteriospei`
--

INSERT INTO `criteriospei` (`idPEI`, `criterios`) VALUES
(1, 'a'),
(2, 'pec1');

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

--
-- Volcado de datos para la tabla `desarrolla`
--

INSERT INTO `desarrolla` (`nombreEquipo`, `nombreProyecto`, `idEtapa`) VALUES
('Jaiva', 'Proyecto Biblioteca', 3),
('Jaiva2', 'Proyecto Biblioteca', 3),
('Test', 'Proyecto Biblioteca', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE IF NOT EXISTS `elemento` (
  `nombreCatalogo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`nombreCatalogo`,`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`nombreCatalogo`, `nombre`) VALUES
('Artefactos', 'Documento Caso de Negocio'),
('Artefactos', 'Documento de Arquitectura de Software'),
('Artefactos', 'Documento Plan Creativo'),
('Artefactos', 'Documento Plan de Gerencia de Riesgos'),
('Artefactos', 'Documento Vision'),
('Artefactos', 'Plan de Implantacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `nombre` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`nombre`, `estado`) VALUES
('Jaiva', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esrecurso`
--

CREATE TABLE IF NOT EXISTS `esrecurso` (
  `correoUSB` varchar(50) NOT NULL,
  `idActividadIteracion` int(10) NOT NULL,
  PRIMARY KEY (`correoUSB`,`idActividadIteracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `esrecurso`
--

INSERT INTO `esrecurso` (`correoUSB`, `idActividadIteracion`) VALUES
('', 2),
('', 3),
('', 14),
('09-23456@usb.ve', 0),
('09-23456@usb.ve', 14),
('09-23456@usb.ve', 15),
('09-23456@usb.ve', 19),
('09-23456@usb.ve', 26),
('09-23456@usb.ve', 28),
('09-23456@usb.ve', 29),
('09-23456@usb.ve', 32),
('09-23456@usb.ve', 33),
('09-23456@usb.ve', 35),
('09-23456@usb.ve', 37),
('09-23456@usb.ve', 38),
('09-23456@usb.ve', 39),
('09-45789@usb.ve', 14),
('09-45789@usb.ve', 15),
('09-45789@usb.ve', 16),
('09-45789@usb.ve', 18),
('09-45789@usb.ve', 19),
('09-45789@usb.ve', 20),
('09-45789@usb.ve', 21),
('09-45789@usb.ve', 22),
('09-45789@usb.ve', 23),
('09-45789@usb.ve', 24),
('09-45789@usb.ve', 25),
('09-45789@usb.ve', 27),
('09-45789@usb.ve', 30),
('09-45789@usb.ve', 31),
('09-45789@usb.ve', 34),
('09-45789@usb.ve', 36),
('09-45789@usb.ve', 39),
('09-45789@usb.ve', 40);

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
-- Estructura de tabla para la tabla `iteracion`
--

CREATE TABLE IF NOT EXISTS `iteracion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `tipo` varchar(20) NOT NULL,
  `objetivos` varchar(250) NOT NULL,
  `idEquipo` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `iteracion`
--

INSERT INTO `iteracion` (`id`, `nombre`, `tipo`, `objetivos`, `idEquipo`, `estado`) VALUES
(1, 'a', 'Incepcion', 'a', 'Jaiva', 0),
(2, 'primera', 'Elaboracion', 'objetivos', 'Jaiva', 0);

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
  `idEtapa` int(100) NOT NULL,
  `nombreEquipo` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`idEtapa`,`nombreEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `participa`
--

INSERT INTO `participa` (`correoUSBUsuario`, `idEtapa`, `nombreEquipo`) VALUES
('09-23456@usb.ve', 3, 'Jaiva'),
('09-45789@usb.ve', 3, 'Jaiva');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pertenece`
--

CREATE TABLE IF NOT EXISTS `pertenece` (
  `nombreUnidadAdministrativa` varchar(100) NOT NULL,
  `correoUSBUsuario` varchar(50) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pertenece`
--

INSERT INTO `pertenece` (`nombreUnidadAdministrativa`, `correoUSBUsuario`, `cargo`, `telefono`) VALUES
('Biblioteca', 'torrezbiblio@usb.ve', 'Secretario', '041467890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perteneceiteracion`
--

CREATE TABLE IF NOT EXISTS `perteneceiteracion` (
  `idCasoDeUso` int(10) NOT NULL,
  `idIteracion` int(10) NOT NULL,
  PRIMARY KEY (`idCasoDeUso`,`idIteracion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perteneceiteracion`
--

INSERT INTO `perteneceiteracion` (`idCasoDeUso`, `idIteracion`) VALUES
(1, 2),
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoextraiteracion`
--

CREATE TABLE IF NOT EXISTS `productoextraiteracion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idIteracion` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idIteracion` (`idIteracion`,`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `productoextraiteracion`
--

INSERT INTO `productoextraiteracion` (`id`, `idIteracion`, `nombre`, `descripcion`) VALUES
(1, 1, 'a', 'a'),
(2, 2, 'pe1', 'descpe1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `nombre` varchar(50) NOT NULL,
  `numeroSolicitud` varchar(20) NOT NULL,
  `estado` int(1) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`nombre`, `numeroSolicitud`, `estado`, `idEtapa`) VALUES
('Proyecto Biblioteca', '4f4fd5eb', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasocia`
--

CREATE TABLE IF NOT EXISTS `seasocia` (
  `correoUSBUsuario` varchar(50) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`nombreProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seasocia`
--

INSERT INTO `seasocia` (`correoUSBUsuario`, `nombreProyecto`) VALUES
('edumilis@usb.ve', 'Proyecto Biblioteca'),
('torrezbiblio@usb.ve', 'Proyecto Biblioteca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `nro` varchar(20) NOT NULL,
  `planteamiento` varchar(200) NOT NULL,
  `justificacion` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
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
('4f4fd5eb', 'Sistema de enumeraciÃ³n de libros.', 'el sistema podrÃ­a ser util para que los estudiantes revisen los libros.', '08-11027@usb.ve', 'si por supuesto', 'poseemos dos servidores.', 1000, 'Biblioteca', 2);

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
('4f4fd5eb', '02129786545');

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

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`nombreProyecto`, `idEtapa`) VALUES
('Proyecto Biblioteca', 3);

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
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(20) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `correoUSB` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `correoOpcional` varchar(50) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL,
  `rol` int(2) NOT NULL,
  `carnetOCedula` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`correoUSB`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `telefono`, `apellido`, `correoUSB`, `password`, `correoOpcional`, `activo`, `rol`, `carnetOCedula`) VALUES
('Victor', '', 'Rivero', '04-37494@usb.ve', 'faa77f5e39f651db2ffa4ce764004db1', '', 1, 0, ''),
('Ivanhoe ', '', 'Gamarra', '05-38194@usb.ve', '6cfcd7d8d5e31f97ea37a94e3933cc6f', '', 1, 0, ''),
('Alexandra', NULL, 'Paredes', '05-38680@usb.ve', 'e9be238502e6e51725f6cdcdb6c4458a', '', 1, 0, '05-38680@u'),
('Eric', '', 'Mendillo', '06-39902@usb.ve', '0e8aa81ade926659ef93f2af5f2baa3e', '', 1, 0, ''),
('Anselmo', '', 'Munoz', '07-41260@usb.ve', 'b61a27ee1b107f3afa064ff051799858', '', 1, 0, ''),
('Fernando', '', 'Sahmkow', '08-11027@usb.ve', 'f3b10516780afa89840cff7ef718be4b', '', 1, 0, '20220072'),
('Javier', '', 'Suarez', '09-23456@usb.ve', '657ac50163aac38039e8d4b7a23c21cd', '', 1, 3, '09-23456'),
('Frank', '', 'Kirt', '09-45789@usb.ve', '82d6477a05183213b58b6753d4bb795e', '', 1, 5, '0945789'),
('Administrador', NULL, 'sigeprosi', 'admin@usb.ve', 'a65f68b5d67e8cbf97d30aeec673fef6', '', 1, 0, '0'),
('Edumilis', '', 'Mendez', 'edumilis@usb.ve', '0df92d04cdc5c2795d3a5a2c78338074', '', 1, 1, ''),
('Estudiante', '0212000000', 'USB', 'estudiante@usb.ve', '4a9cf8b021795498b2640fa9378c067e', '', 1, 3, ''),
('Kenyer', '', 'Dominguez', 'kenyer@usb.ve', '960bfc47187eaf5011d43554a8ab81ed', '', 1, 1, ''),
('Profesor', '', 'El profe', 'profe@usb.ve', 'bd846dc901c0113b5df9289a18944777', '', 1, 2, ''),
('Un estudiante', '02128904567', 'Apellido Test', 'test@usb.ve', '4245cdc085ec6c951b50b21870069fd6', 'test@gmail.com', 1, 3, '20567097'),
('Juan', '04123227832', 'Torrez', 'torrezbiblio@usb.ve', '7fffffff', '', 1, 2, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
