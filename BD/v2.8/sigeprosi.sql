-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 01-06-2012 a las 11:18:25
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
CREATE DATABASE `sigeprosi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `sigeprosi`;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

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
(13, 1, 'Ejercicios/Practicas', '2011-09-16', 'Promedio de actividades durante todo el trimestre', 5, 3),
(14, 3, 'Entrega 1', '2012-04-20', 'INICIO (1a iteración): Doc. Visión del Sistema, Caso del Negocio (Modelo de Casos de Uso del Negoc', 3, 4),
(15, 6, 'Entrega 2', '2012-05-11', 'Prototipo Funcional con 10% de funcionalidad.', 5, 4),
(16, 8, 'Entrega 3', '2012-05-25', 'INICIO (1a iteración): ERS (Modelo de Casos de Uso Inicial, Requerimientos Funcionales y suplementa', 5, 4),
(17, 10, 'Entrega 4', '2012-06-08', 'INICIO (2a iteración): Doc. de Arquitectura del Software - Vista de Casos de Uso (Modelo de Casos d', 2, 4),
(18, 12, 'Entrega 5', '2012-06-22', 'Prototipo Funcional con 20% de funcionalidad.', 3, 4),
(19, 11, 'Entrega 6', '2012-07-06', 'Prototipo Arquitectural con 30% desarrollado y con validaciones.', 7, 4),
(20, 7, 'Quices ', '2012-07-13', 'Quiz 1 y quiz 2', 10, 4),
(21, 1, 'Ejercicios/Practicas', '2012-07-13', 'Promedio de actividades durante todo el trimestre', 10, 4),
(22, 3, 'Entrega 1', '2012-01-27', 'Documentos de levantamiento de informacion mas las minutas de reuniones con clientes.', 12, 5);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artefactositeracion`
--

CREATE TABLE IF NOT EXISTS `artefactositeracion` (
  `idIteracion` int(10) NOT NULL,
  `artefactos` int(10) NOT NULL,
  PRIMARY KEY (`idIteracion`,`artefactos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE IF NOT EXISTS `calificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correoUSB` varchar(50) NOT NULL,
  `idEntrega` int(11) NOT NULL,
  `nota` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `calificacion`
--

INSERT INTO `calificacion` (`id`, `correoUSB`, `idEntrega`, `nota`) VALUES
(23, 'testo1@usb.ve', 15, 6),
(24, 'testo2@usb.ve', 15, 7),
(25, 'testo3@usb.ve', 15, 9),
(26, 'testo4@usb.ve', 15, 8),
(27, 'testo1@usb.ve', 16, 19),
(28, 'testo2@usb.ve', 16, 18),
(29, 'testo3@usb.ve', 16, 14),
(30, 'testo4@usb.ve', 16, 15),
(31, 'testo1@usb.ve', 17, 3),
(32, 'testo2@usb.ve', 17, 7),
(33, 'testo3@usb.ve', 17, 2),
(34, 'testo4@usb.ve', 17, 8);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `casodeuso`
--

INSERT INTO `casodeuso` (`id`, `nombre`, `descripcion`, `completitud`, `idEquipo`) VALUES
(1, 'Registrar Usuario', ' ', 0, 'SolvingSystems'),
(2, 'Hacer login', ' ', 0, 'SolvingSystems');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE IF NOT EXISTS `catalogo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `idCategoria` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`id`, `nombre`, `idCategoria`) VALUES
(1, 'Artefactos', 1),
(2, 'Departamentos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `superCategoria` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `superCategoria`) VALUES
(1, 'General', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterioscasodeuso`
--

CREATE TABLE IF NOT EXISTS `criterioscasodeuso` (
  `idCasoDeUso` int(10) NOT NULL,
  `criterios` varchar(50) NOT NULL,
  PRIMARY KEY (`idCasoDeUso`,`criterios`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criteriospei`
--

CREATE TABLE IF NOT EXISTS `criteriospei` (
  `idPEI` int(10) NOT NULL,
  `criterios` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolla`
--

CREATE TABLE IF NOT EXISTS `desarrolla` (
  `nombreEquipo` varchar(50) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  PRIMARY KEY (`nombreEquipo`,`nombreProyecto`,`idEtapa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `desarrolla`
--

INSERT INTO `desarrolla` (`nombreEquipo`, `nombreProyecto`, `idEtapa`) VALUES
('SolvingSystems', 'Proyecto Test', 3),
('WinterSolutions', 'Proyecto Bolivarium', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE IF NOT EXISTS `documento` (
  `nombreEquipo` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  PRIMARY KEY (`nombreEquipo`,`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`nombreEquipo`, `nombre`, `ruta`) VALUES
('SolvingSystems', 'alex.pdf', 'C:/Users/DELL/Documents/xampp/htdocs/sigeprosi/documentos/SolvingSystems/'),
('WinterSolutions', 'apuntes3.pdf', 'C:/Users/DELL/Documents/xampp/htdocs/sigeprosi/documentos/WinterSolutions/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `elemento`
--

CREATE TABLE IF NOT EXISTS `elemento` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idCatalogo` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `registro` int(10) NOT NULL,
  `columna` int(10) NOT NULL,
  `desabilitado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `elemento`
--

INSERT INTO `elemento` (`id`, `idCatalogo`, `nombre`, `registro`, `columna`, `desabilitado`) VALUES
(1, 1, 'Documento Arquitectura de Software', 1, 0, 0),
(2, 1, 'Documento Vision', 0, 0, 0),
(3, 2, 'Computacion y Tecnologia de la Informacion', 0, 0, 0),
(4, 2, 'Procesos y Sistemas', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega`
--

CREATE TABLE IF NOT EXISTS `entrega` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvaluacion` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `notaMax` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `entrega`
--

INSERT INTO `entrega` (`id`, `idEvaluacion`, `nombre`, `notaMax`) VALUES
(15, 6, 'Quiz 1', 10),
(16, 7, 'Documento DAS', 10),
(17, 6, 'Quiz 2', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregapresentacion`
--

CREATE TABLE IF NOT EXISTS `entregapresentacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correoUSB` varchar(50) NOT NULL,
  `evaluacionPrevia` int(3) NOT NULL,
  `funcionalidad` int(11) NOT NULL,
  `interfaz` int(11) NOT NULL,
  `navegacion` int(11) NOT NULL,
  `conocimiento` int(11) NOT NULL,
  `usoHerramientas` int(11) NOT NULL,
  `comentarios` text NOT NULL,
  `idEvaluacion` int(11) NOT NULL,
  `nombreEquipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tupla` (`correoUSB`,`idEvaluacion`,`nombreEquipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `entregapresentacion`
--

INSERT INTO `entregapresentacion` (`id`, `correoUSB`, `evaluacionPrevia`, `funcionalidad`, `interfaz`, `navegacion`, `conocimiento`, `usoHerramientas`, `comentarios`, `idEvaluacion`, `nombreEquipo`) VALUES
(1, 'kenyer@usb.ve', 85, 100, 75, 60, 95, 95, 'Me agrado el sistema', 1, 'WinterSolutions');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo`
--

CREATE TABLE IF NOT EXISTS `equipo` (
  `nombre` varchar(50) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `equipo`
--

INSERT INTO `equipo` (`nombre`, `estado`) VALUES
('SolvingSystems', 1),
('WinterSolutions', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esevaluado`
--

CREATE TABLE IF NOT EXISTS `esevaluado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombreEquipo` varchar(50) NOT NULL,
  `idEvaluacion` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `esevaluado`
--

INSERT INTO `esevaluado` (`id`, `nombreEquipo`, `idEvaluacion`) VALUES
(10, 'SolvingSystems', 6),
(11, 'SolvingSystems', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `esrecurso`
--

CREATE TABLE IF NOT EXISTS `esrecurso` (
  `correoUSB` varchar(50) NOT NULL,
  `idActividadIteracion` int(10) NOT NULL,
  PRIMARY KEY (`correoUSB`,`idActividadIteracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `etapa`
--

INSERT INTO `etapa` (`nombre`, `numero`, `id`) VALUES
('Abr-Jul 2012', 1, 4),
('Ene-Mar 2012', 12, 5),
('Mi Planificacion', 45, 1),
('Nueva', 1, 2),
('SEP-DIC 2011', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `idEtapa` int(11) NOT NULL,
  `notaMax` int(11) NOT NULL,
  `esPresentacion` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `constancia` (`nombre`,`idEtapa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `evaluacion`
--

INSERT INTO `evaluacion` (`id`, `nombre`, `idEtapa`, `notaMax`, `esPresentacion`) VALUES
(6, 'Quices', 1, 10, 0),
(7, 'Ejercios Clase', 1, 10, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `headercatalogo`
--

CREATE TABLE IF NOT EXISTS `headercatalogo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idCatalogo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `columna` int(11) NOT NULL,
  `tipo` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `headercatalogo`
--

INSERT INTO `headercatalogo` (`id`, `idCatalogo`, `nombre`, `columna`, `tipo`) VALUES
(1, 1, 'Nombre', 1, 1),
(2, 1, 'Nombre', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `iteracion`
--

CREATE TABLE IF NOT EXISTS `iteracion` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) DEFAULT NULL,
  `tipo` int(2) NOT NULL,
  `objetivos` varchar(250) NOT NULL,
  `idEquipo` varchar(50) NOT NULL,
  `estado` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `iteracion`
--

INSERT INTO `iteracion` (`id`, `nombre`, `tipo`, `objetivos`, `idEquipo`, `estado`) VALUES
(4, 'Test', 0, 'Probar Iteracion', 'SolvingSystems', 0),
(5, 'Test', 0, 'Probar Iteracion', 'SolvingSystems', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lidera`
--

CREATE TABLE IF NOT EXISTS `lidera` (
  `correoUSBUsuario` varchar(50) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`idEtapa`,`nombreProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `mensaje` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacionesevalua`
--

CREATE TABLE IF NOT EXISTS `observacionesevalua` (
  `idEvalua` int(10) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  UNIQUE KEY `idEvalua` (`idEvalua`,`observaciones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participa`
--

CREATE TABLE IF NOT EXISTS `participa` (
  `correoUSBUsuario` varchar(50) NOT NULL,
  `idEtapa` int(100) NOT NULL,
  `nombreEquipo` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`idEtapa`,`nombreEquipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `participa`
--

INSERT INTO `participa` (`correoUSBUsuario`, `idEtapa`, `nombreEquipo`) VALUES
('testo1@usb.ve', 3, 'SolvingSystems'),
('testo2@usb.ve', 3, 'SolvingSystems'),
('testo3@usb.ve', 3, 'SolvingSystems'),
('testo4@usb.ve', 3, 'SolvingSystems'),
('testo5@usb.ve', 3, 'WinterSolutions'),
('testo6@usb.ve', 3, 'WinterSolutions');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pertenece`
--

INSERT INTO `pertenece` (`nombreUnidadAdministrativa`, `correoUSBUsuario`, `cargo`, `telefono`) VALUES
('Bolivarium', 'cliente@usb.ve', 'Secretario', '02122345687');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perteneceiteracion`
--

CREATE TABLE IF NOT EXISTS `perteneceiteracion` (
  `idCasoDeUso` int(10) NOT NULL,
  `idIteracion` int(10) NOT NULL,
  PRIMARY KEY (`idCasoDeUso`,`idIteracion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoextraiteracion`
--

CREATE TABLE IF NOT EXISTS `productoextraiteracion` (
  `id` int(10) NOT NULL,
  `idIteracion` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idIteracion` (`idIteracion`,`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `nombre` varchar(100) NOT NULL,
  `numeroSolicitud` varchar(20) NOT NULL,
  `estado` int(1) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`nombre`, `numeroSolicitud`, `estado`, `idEtapa`) VALUES
('Inventario Mecanica', '0f126ba9', 1, 4),
('Proyecto Bolivarium', '6814051e', 1, 3),
('Proyecto Test', '7fffffff', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasocia`
--

CREATE TABLE IF NOT EXISTS `seasocia` (
  `correoUSBUsuario` varchar(50) NOT NULL,
  `nombreProyecto` varchar(50) NOT NULL,
  PRIMARY KEY (`correoUSBUsuario`,`nombreProyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seasocia`
--

INSERT INTO `seasocia` (`correoUSBUsuario`, `nombreProyecto`) VALUES
('cliente@usb.ve', 'Proyecto Bolivarium'),
('jleon@usb.ve', 'Inventario Mecanica'),
('kenyer@usb.ve', 'Proyecto Bolivarium'),
('victor@usb.ve', 'Inventario Mecanica');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`nro`, `planteamiento`, `justificacion`, `email`, `tiempo`, `tecnologia`, `nroAfectados`, `nombreUnidadAdministrativa`, `estado`) VALUES
('0f126ba9', 'Necesitamos un sistema para llevar un control del inventario de los repuestos y herramientas para el laboratorio de los estudiantes.', 'Controlar el prÃ©stamo de las herramientas.', 'jleon@usb.ve', 'Los lunes en la', 'No tenemos computadoras en el laboratorio.', 30, 'Departamento de Mecanica', 2),
('2c2b44af', 'Sistema para curso en linea de nivelación de lectura y redacción de los estudiantes.', 'Ayudara a la mejora educativa del estudiante referente a la materia.', 'kiraelena@usb.ve', 'Solo jueves tod', 'Computadoras e impresoras.', 12, 'Departamento de Lengua y Literatura', 0),
('6814051e', 'test', 'tï¿½st', 'cliente@usb.ve', 'test', 'test', 200, 'Bolivarium', 2),
('6a96366d', 'Sistema de registro de usuarios que acceden al laboratorio.', 'Para llevar control de los usuarios del laboratorio, y entrega de informes.', 'jyannuzzo@usb.ve', 'Martes y mierco', 'Solo 2 computadoras', 25, 'Laboratorio E', 0),
('7fffffff', '32er2rwegfrwe', 'sdfregtr', 'test@usb.ve', 'sferg', 'efergtey', 345, 'Auditoria Interna', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonosolicitud`
--

CREATE TABLE IF NOT EXISTS `telefonosolicitud` (
  `nroSolicitud` varchar(20) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nroSolicitud`,`telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `telefonosolicitud`
--

INSERT INTO `telefonosolicitud` (`nroSolicitud`, `telefono`) VALUES
('0f126ba9', '02129064060'),
('0f126ba9', '04267852485'),
('2c2b44af', '02129063892'),
('2c2b44af', '02129063893'),
('2c2b44af', '04165362525'),
('6814051e', '02129870456'),
('6a96366d', '02129064168'),
('6a96366d', '04243265236'),
('7fffffff', '02124567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telefonounidadadministrativa`
--

CREATE TABLE IF NOT EXISTS `telefonounidadadministrativa` (
  `nombreUnidad` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  PRIMARY KEY (`nombreUnidad`,`telefono`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiene`
--

CREATE TABLE IF NOT EXISTS `tiene` (
  `nombreProyecto` varchar(50) NOT NULL,
  `idEtapa` int(10) NOT NULL,
  PRIMARY KEY (`nombreProyecto`,`idEtapa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tiene`
--

INSERT INTO `tiene` (`nombreProyecto`, `idEtapa`) VALUES
('Inventario Mecanica', 4),
('Proyecto Bolivarium', 3);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `telefono`, `apellido`, `correoUSB`, `password`, `correoOpcional`, `activo`, `rol`, `carnetOCedula`) VALUES
('Omar ', '04129521414', 'Vera ', '00-33452@usb.ve', '77f4b0511d18f5e044a3adf9991a656f', NULL, 1, 3, NULL),
('Maria', '02129061442', 'Diaz', '00-81120@usb.ve', 'afc2c575da1fb0ecf3d0655cc61964aa', NULL, 1, 3, NULL),
('Gabriel ', '04245246354', 'Villarreal ', '02-1990@usb.ve', '69cd5d02cd084356181ba09e4b11c3c0', NULL, 1, 3, NULL),
('Yomar ', '04242534214', 'Medina ', '02-35162@usb.ve', '9f517e63f4b8a67d0d4f13281338cdd2', NULL, 1, 3, NULL),
('Veronica ', '04265031403', 'Cabeza ', '03-83382@usb.ve', '1463e737775f8cc9f018abcaecf5c5e4', NULL, 1, 3, NULL),
('Victor', NULL, 'Rivero', '04-37494@usb.ve', 'faa77f5e39f651db2ffa4ce764004db1', '', 1, 0, '04-37494'),
('Ivanhoe ', NULL, 'Gamarra', '05-38194@usb.ve', '6cfcd7d8d5e31f97ea37a94e3933cc6f', '', 1, 0, '05-38194'),
('Alexandra', NULL, 'Paredes', '05-38680@usb.ve', 'e9be238502e6e51725f6cdcdb6c4458a', '', 1, 0, '05-38680'),
('Eric', NULL, 'Mendillo', '06-39902@usb.ve', '2d42b211e479cf44a08600924d17cf73', '', 1, 0, '06-39902'),
('Anselmo', NULL, 'Munoz', '07-41260@usb.ve', 'b61a27ee1b107f3afa064ff051799858', '', 1, 0, '07-41260'),
('Fernando', NULL, 'Sahmkow', '08-11027@usb.ve', 'f3b10516780afa89840cff7ef718be4b', '', 1, 0, '08-11027'),
('Administrador', NULL, 'sigeprosi', 'admin@usb.ve', 'a65f68b5d67e8cbf97d30aeec673fef6', '', 1, 0, '00-00000'),
('Armando', '02129063970', 'Zamora ', 'azamora@usb.ve', '882805eea6e68a72ec16e5e39195a5ba', NULL, 1, 4, NULL),
('cliente', NULL, 'cliente', 'cliente@usb.ve', 'db9a9561c825f90f1c92ef3819d74f06', NULL, 1, 4, NULL),
('Juan ', NULL, 'Leoni', 'jleon@usb.ve', '7cfaa4b6e1d76238ddca34701e6b1957', NULL, 1, 4, NULL),
('Jose', '04122352142', 'Megias ', 'jmegias@usb.ve', 'e9d094b3d8640182d894c727531a499b', NULL, 1, 4, NULL),
('Kenyer', '02129063328', 'Dominguez', 'kenyer@usb.ve', '960bfc47187eaf5011d43554a8ab81ed', '', 1, 1, ''),
('Alexo', '', 'Testo', 'testo1@usb.ve', '1b08a6f33697e189750c7901312b63d4', '', 1, 3, '3242354'),
('Fercho', '', 'Testo', 'testo2@usb.ve', '020dd1b783b86c7b35db400b2a59d4f0', '', 1, 3, '2345612'),
('Juancho', '', 'Testo', 'testo3@usb.ve', '9dc4565190b3035b74d36e8706163ead', '', 1, 5, '2456723'),
('Carcho', '', 'Testo', 'testo4@usb.ve', 'c1a31e8c43bc97e339acb11e5576e154', '', 1, 3, '32453456'),
('Jose', NULL, 'Perez', 'testo5@usb.ve', 'd8c083f5220e1f892b2f12df26f17dcb', NULL, 1, 3, '0967890'),
('Andrea', NULL, 'Larez', 'testo6@usb.ve', 'f9e28ce97013b6c50e27c96d5d981b0c', NULL, 1, 5, '0967890'),
('Victor', '02129062325', 'Sanchez', 'victor@usb.ve', '38311106d442386bfca8c26abe3aa8bc', NULL, 1, 2, NULL),
('Willmary ', '02129063489', 'Zurbaran ', 'willmedina@usb.ve', 'af1740175d1d97951c79d99e22423f6b', NULL, 1, 4, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
