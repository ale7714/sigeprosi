
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

INSERT INTO `desarrolla` (`nombreEquipo`, `nombreProyecto`, `idEtapa`) VALUES
('Jaiva', 'Proyecto Biblioteca', 3),
('Jaiva2', 'Proyecto Biblioteca', 3),
('Test', 'Proyecto Biblioteca', 3);

INSERT INTO `equipo` (`nombre`, `estado`) VALUES
('Jaiva', 1),
('Test', 1);

INSERT INTO `participa` (`correoUSBUsuario`, `idEtapa`, `nombreEquipo`) VALUES
('09-23456@usb.ve', 3, 'Jaiva'),
('09-23456@usb.ve', 3, 'Test'),
('09-45789@usb.ve', 3, 'Jaiva'),
('09-45789@usb.ve', 3, 'Test');

INSERT INTO `pertenece` (`nombreUnidadAdministrativa`, `correoUSBUsuario`, `cargo`, `telefono`) VALUES
('Biblioteca', 'torrezbiblio@usb.ve', 'Secretario', '041467890');

INSERT INTO `proyecto` (`nombre`, `numeroSolicitud`, `estado`, `idEtapa`) VALUES
('Proyecto Biblioteca', '4f4fd5eb', 1, 3);

INSERT INTO `seasocia` (`correoUSBUsuario`, `nombreProyecto`) VALUES
('edumilis@usb.ve', 'Proyecto Biblioteca'),
('torrezbiblio@usb.ve', 'Proyecto Biblioteca');

INSERT INTO `solicitud` (`nro`, `planteamiento`, `justificacion`, `email`, `tiempo`, `tecnologia`, `nroAfectados`, `nombreUnidadAdministrativa`, `estado`) VALUES
('4f4fd5eb', 'Sistema de enumeraciÃ³n de libros.', 'el sistema podrÃ­a ser util para que los estudiantes revisen los libros.', '08-11027@usb.ve', 'si por supuesto', 'poseemos dos servidores.', 1000, 'Biblioteca', 2);

INSERT INTO `telefonosolicitud` (`nroSolicitud`, `telefono`) VALUES
('4f4fd5eb', '02129786545');

INSERT INTO `tiene` (`nombreProyecto`, `idEtapa`) VALUES
('Proyecto Biblioteca', 3);

INSERT INTO `usuario` (`nombre`, `telefono`, `apellido`, `correoUSB`, `password`, `correoOpcional`, `activo`, `rol`, `carnetOCedula`) VALUES
('Victor', '', 'Rivero', '04-37494@usb.ve', 'faa77f5e39f651db2ffa4ce764004db1', '', 1, 0, ''),
('Ivanhoe ', '', 'Gamarra', '05-38194@usb.ve', '6cfcd7d8d5e31f97ea37a94e3933cc6f', '', 1, 0, ''),
('Alexandra', NULL, 'Paredes', '05-38680@usb.ve', 'e9be238502e6e51725f6cdcdb6c4458a', '', 1, 0, '05-38680@u'),
('Eric', '', 'Mendillo', '06-39902@usb.ve', '0e8aa81ade926659ef93f2af5f2baa3e', '', 1, 0, ''),
('Anselmo', '', 'Munoz', '07-41260@usb.ve', 'b61a27ee1b107f3afa064ff051799858', '', 1, 0, ''),
('Fernando', '', 'Sahmkow', '08-11027@usb.ve', 'f3b10516780afa89840cff7ef718be4b', '', 1, 0, '20220072'),
('Javier', '', 'Suarez', '09-23456@usb.ve', '657ac50163aac38039e8d4b7a23c21cd', '', 1, 3, '09-23456'),
('Frank', '', 'Kirt', '09-45789@usb.ve', '85971f99c2725deb7500b242b3a195df', '', 1, 3, '0945789'),
('Administrador', NULL, 'sigeprosi', 'admin@usb.ve', 'a65f68b5d67e8cbf97d30aeec673fef6', '', 1, 0, '0'),
('Edumilis', '', 'Mendez', 'edumilis@usb.ve', '0df92d04cdc5c2795d3a5a2c78338074', '', 1, 1, ''),
('Estudiante', '0212000000', 'USB', 'estudiante@usb.ve', '4a9cf8b021795498b2640fa9378c067e', '', 1, 3, ''),
('Kenyer', '', 'Dominguez', 'kenyer@usb.ve', '960bfc47187eaf5011d43554a8ab81ed', '', 1, 1, ''),
('Profesor', '', 'El profe', 'profe@usb.ve', '5e9ccd4d2e1fc645caaa81772ce1494f', '', 1, 2, ''),
('Un estudiante', '02128904567', 'Apellido Test', 'test@usb.ve', '4245cdc085ec6c951b50b21870069fd6', 'test@gmail.com', 1, 3, '20567097'),
('Juan', '04123227832', 'Torrez', 'torrezbiblio@usb.ve', '7fffffff', '', 1, 2, '');
