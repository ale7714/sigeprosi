
--
-- Volcado de datos para la tabla `etapa`
--

INSERT INTO `etapa` (`nombre`, `numero`, `id`) VALUES
('Mi Planificacion', 45, 1),
('Nueva', 1, 2),
('SEP-DIC 2011', 1, 3);


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

