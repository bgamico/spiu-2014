-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-11-2014 a las 01:35:05
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `finaldiciembre`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_actividad_sede1_idx` (`sede_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcar la base de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `nombre`, `descripcion`, `fecha`, `hora`, `direccion`, `sede_id`) VALUES
(1, 'Encuentro primer aniversario', 'La sede Atlántica conmemora su primer año de vida.', '2014-04-01', '2015-02-00 00:00:00', 'Calle siempre viva 233', 1),
(2, 'Seminarios', 'Seminario...', '2014-03-01', '0000-00-00 00:00:00', 'Calle siempre viva 232', 2),
(3, 'Festejos día del estudiante 2014', 'Encuentro recreativo para los estudiantes...', '2014-09-18', '2015-00-00 00:00:00', 'Av. Costanera 200', 1),
(4, 'Actividad de ejemplo', 'Es un ejemplo de actividad.', '2014-06-03', '2013-00-00 00:00:00', 'Av. Juan soulin 33', 1),
(5, 'Seminario', '...verificando que no exista una actividad con el mismo nombre por sede', '2014-03-06', '0000-00-00 00:00:00', 'Calle siempre viva 100', 1),
(6, 'akdñk', 'alksdñla', '0000-00-00', '0000-00-00 00:00:00', 'akljdlka', 3),
(7, 'asdñkjdsl', 'alksjdkl', '0000-00-00', '0000-00-00 00:00:00', 'lkajskldj', 3),
(8, 'aksdñl', 'dalskdñ', '0000-00-00', '0000-00-00 00:00:00', 'lksajkldas', 3),
(9, 'adshkj', 'kjsahkdjh', '0000-00-00', '0000-00-00 00:00:00', 'ksajhdkj', 3),
(10, 'asjdjdklsa', 'akdjslk', '0000-00-00', '0000-00-00 00:00:00', 'lkasjsdkl', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `avisos`
--

CREATE TABLE IF NOT EXISTS `avisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_aviso_sede1_idx` (`sede_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `avisos`
--

INSERT INTO `avisos` (`id`, `nombre`, `descripcion`, `fecha`, `sede_id`) VALUES
(1, 'aviso 1', 'El Directo de la carrera Lic. Luis Vivas info', '2014-03-05', 1),
(2, 'oijhjhlkjhj', 'El Director de la carrera de alimentos invita', '2014-03-06', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechas_de_examen`
--

CREATE TABLE IF NOT EXISTS `fechas_de_examen` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` datetime DEFAULT NULL,
  `materia` varchar(45) DEFAULT NULL,
  `sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fecha_de_examen_sede1_idx` (`sede_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `fechas_de_examen`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `nivel` int(11) DEFAULT '1',
  `url` varchar(100) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Volcar la base de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `titulo`, `nivel`, `url`, `parent_id`) VALUES
(1, 'Gestión de Usuarios', 1, '/usuario', 0),
(2, 'Listar usuarios', 1, '/usuario/get ', 1),
(3, 'Agregar usuario', 2, '/usuario/add ', 1),
(4, 'Gestión de PDI ', 2, '/pdi/get', 0),
(5, 'Consultar PDI', 2, '/pdi/get', 4),
(6, 'Editar PDI', 2, '/pdi/', 4),
(7, 'Eliminar PDI', 2, '/pdi/delete', 4),
(8, 'Agregar PDI', 2, '/pdi/add', 4),
(9, 'Gestión de Sedes', 1, '/sede', 0),
(10, 'Consultar sede', 2, '/sede/get', 9),
(11, 'Agregar sede', 2, '/sede/add', 9),
(12, 'Gestión de Perfil', 1, '/perfil', 0),
(13, 'Consultar perfil', 2, '/perfil/get', 12),
(14, 'Editar perfil', 2, '/perfilmanage/edit', 12),
(15, 'Gestión de Actividades', 1, '/actividad/get', 0),
(16, 'Consultar actividad', 2, '/actividad/get', 15),
(17, 'Agregar actividad', 2, '/actividad/add', 15),
(18, 'Gestión de Avisos', 1, '/aviso/get', 0),
(19, 'Consultar avisos', 2, '/aviso/get', 18),
(20, 'Editar avisos', 2, '/aviso/edit', 18),
(21, 'Eliminar avisos', 2, '/aviso/delete', 18),
(22, 'Agregar avisos', 2, '/aviso/add', 18),
(23, 'Fechas de Exámenes', 1, '/fecha/get', 0),
(24, 'Consultar fecha', 2, '/fecha/get', 23),
(25, 'Editar fecha', 2, '/fecha/edit', 23),
(26, 'Eliminar fecha', 2, '/fecha/delete', 23),
(27, 'Agregar fecha', 2, '/fecha/add', 23),
(28, 'Gestión de Usuarios', 1, '/usuario/operadores', 0),
(29, 'Gestión de Sedes', 1, '/sede/miSede', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pdis`
--

CREATE TABLE IF NOT EXISTS `pdis` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `latitud` int(11) DEFAULT NULL,
  `longitud` int(11) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `sede_sede_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pdi_sede1_idx` (`sede_sede_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `pdis`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `fec_nac` date DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `sede_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfil_sede1_idx` (`sede_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Volcar la base de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `apellido`, `telefono`, `documento`, `fec_nac`, `domicilio`, `email`, `sede_id`) VALUES
(1, 'admin', 'admin', 1234, 12345678, '2014-12-31', 'admin', 'admin@gmail.com', NULL),
(2, 'Bruno Javier', 'Amico', 15638118, 27828706, '1980-04-18', 'Calle siempre viva 233 Patagones', 'sistema@localhost.com', 1),
(3, 'sede', 'sede', 12345678, 12345678, '1991-03-10', 'sede', 'sede@gmail.com', 2),
(4, 'dani', 'monte', 1234, 12345678, '2014-12-31', 'lejos', 'dani@gmail.com', NULL),
(5, 'Agustin', 'Rivero', 15123456, 4012312, '2014-12-31', 'Gallardo 1023', '', NULL),
(6, 'Agustin', 'Rivero', 151234, 40123121, '2014-11-30', 'Gallardo 1023', 'arivero@domain.com', 1),
(7, 'Agustin', 'Rivero', 15123456, 4012312, '2014-12-31', 'Gallardo 1023', '', 3),
(8, 'Agustin', 'Rivero', 0, 4012312, '2014-12-31', 'Gallardo 1023', '', 3),
(9, 'Agustin', 'Rivero', 15123456, 4012312, '2013-11-30', 'Gallardo 1023', 'agus@mail.com', NULL),
(10, 'lkasjdl', 'laaksj', 132123, 23123123, '2013-12-29', 'asjdlk', 'lkasd@jaslkd.com', NULL),
(11, 'lkasjdl', 'laaksj', 132123, 23123123, '2013-12-29', 'asjdlk', 'lkasd@jaslkd.com', NULL),
(12, 'ñlkñsl', 'asdlj', 1231, 9183091, '2014-12-31', 'asdkl', 'jsdlak@akjsdl.com', NULL),
(13, 'akjdks', 'lksajdl', 980321, 3091820, '2014-12-31', 'asjldk', 'sodaisj@ajdhkja.casjd', 1),
(14, 'ldkasjl', 'lkasjlk', 15123456, 2983749, '2014-12-31', 'Gallardo 1023', 'sistema@localhost.com', 1),
(15, 'lautaro', 'lopez', 29840923, 98798987, '2014-12-31', 'zatti', 'llopez@domain.com', NULL),
(16, 'Luciano', 'Graciani', 999999999, 80312831, '2014-12-26', 'Viedma Barrio Jardin', 'lgraciani@domain.com', 1),
(17, 'nicolas', 'castro', 15214058, 35602513, '2014-12-31', 'asdklajs', 'alskdja@als.ajshd', NULL),
(18, 'agutin', 'rivero', 8301982, 2342398, '2014-12-31', 'alksjlkajsd', 'jalskdj@aljsd.cas', 1),
(19, 'Linus', 'Torvalds', 37123809, 40930423, '1969-12-28', 'Helsinki, Finlandia', 'ltorvalds@domain.com', NULL),
(20, 'Richard', 'Stallman', 128378192, 80239840, '1953-03-16', 'Manhattan, Nueva York, Estados Unidos', 'rstallman@domain.com', 2),
(21, 'Bill', 'Gates', 3479238, 98723749, '1955-10-28', 'Seattle, Washington, Estados Unidos', 'bgates@domain.com', 3),
(29, 'Steve', 'Jobs', 873294872, 80324892, '1955-02-24', 'San Francisco, California, Estados Unidos', 'sjobs@domain.com', 1),
(30, 'Mark', 'Zuckerberg', 7398172, 71927391, '1984-05-14', 'White Plains, Nueva York, Estados Unidos', 'mzuckerberg@domain.com', 1),
(38, 'Paul', 'Allen', 99999999, 99999999, '1953-01-21', 'Seattle, Washington, Estados Unidos', 'pallen@domain.com', 1),
(40, 'borrar', 'borrar', 9999999, 9999999, '2014-12-31', 'borrar', 'borrar@domain.com', 10),
(41, 'borrarb', 'borrarb', 999999, 72389127, '2013-11-28', 'borrarb', 'borrarb@domain.com', NULL),
(42, 'borrarc', 'borrarc', 98798789, 9999999, '2014-12-31', 'borrarc', 'borrarc@domain.com', NULL),
(46, 'editar', 'editar', 797987, 74923874, '2014-12-31', 'editar', 'editar@domain.com', NULL),
(47, 'editarb', 'editarb', 89172398, 3791827, '2014-12-31', 'editarb', 'editarb@domain.com', 1),
(48, 'editarc', 'editarc', 1732197, 3178272, '2014-12-31', 'editarc', 'editarc@domain.com', 2),
(49, 'Stephen', 'Wozniak', 9999999, 9999999, '1950-08-11', 'San José, California, Estados Unidos', 'swozniak@domain.com', 2),
(50, 'Larry', 'Page', 9999999, 9999999, '1973-03-26', 'East Lansing, Míchigan, Estados Unidos', 'lpage@domain.com', 4),
(51, 'Larry', 'Page', 111111111, 11111111, '1973-03-26', 'East Lansing, Míchigan, Estados Unidos', 'lpage@domain.com', 3),
(52, 'Albert', 'Einstein', 11111111, 81230981, '1879-03-14', 'Ulm, Alemania', 'aeinstein@domain.com', 2),
(53, 'borrar', 'borrar', 8098098, 81293819, '2014-12-31', 'lkajdlskj', 'borrar@domain.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) DEFAULT NULL,
  `accion` varchar(100) DEFAULT NULL,
  `menu_id` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcar la base de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `titulo`, `accion`, `menu_id`) VALUES
(1, 'Consultar usuario', 'user_get', 1),
(2, 'Editar usuario', 'user_edit', 0),
(3, 'Eliminar usuario', 'user_delete', 0),
(4, 'Agregar usuario', 'user_add', 0),
(5, 'Consultar PDI', 'pdi_get', 4),
(6, 'Editar PDI', 'pdi_edit', 0),
(7, 'Eliminar PDI', 'pdi_delete', 0),
(8, 'Agregar PDI', 'pdi_add', 0),
(9, 'Consultar sede', 'sede_get', 9),
(10, 'Editar sede', 'sede_edit', 0),
(11, 'Eliminar sede', 'sede_delete', 0),
(12, 'Agregar sede', 'sede_add', 0),
(15, 'Consultar actividad', 'act_get', 15),
(16, 'Editar actividad', 'act_edit', 0),
(17, 'Eliminar actividad', 'act_delete', 0),
(18, 'Agregar actividad', 'act_add', 0),
(19, 'Consultar Aviso', 'avi_get', 18),
(20, 'Editar Aviso', 'avi_edit', 0),
(21, 'Eliminar Aviso', 'avi_delete', 0),
(22, 'Agregar Aviso', 'avi_add', 0),
(23, 'Consultar fecha', 'fec_get', 23),
(24, 'Editar fecha', 'fec_edit', 0),
(25, 'Eliminar fecha', 'fec_delete', 0),
(26, 'Agregar fecha', 'fec_add', 0),
(27, 'Consultar operadores', 'user_operadores', 1),
(28, 'Consultar mi sede', 'sede_view', 29),
(29, 'Consultar perfil', 'perfil_get', 12),
(30, 'Editar perfil', 'perfil_edit', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_has_roles`
--

CREATE TABLE IF NOT EXISTS `permisos_has_roles` (
  `permisos_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`permisos_id`,`roles_id`),
  KEY `fk_permisos_has_role_role1_idx` (`roles_id`),
  KEY `fk_permisos_has_role_permisos1_idx` (`permisos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `permisos_has_roles`
--

INSERT INTO `permisos_has_roles` (`permisos_id`, `roles_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(29, 1),
(30, 1),
(2, 2),
(3, 2),
(4, 2),
(10, 2),
(27, 2),
(28, 2),
(29, 2),
(30, 2),
(5, 3),
(6, 3),
(7, 3),
(8, 3),
(15, 3),
(16, 3),
(17, 3),
(18, 3),
(19, 3),
(20, 3),
(21, 3),
(22, 3),
(23, 3),
(24, 3),
(25, 3),
(26, 3),
(29, 3),
(30, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `shortname` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `shortname`) VALUES
(1, 'Administrador General', 'admingral'),
(2, 'Administrador de Sede', 'adminsede'),
(3, 'Operador', 'opera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE IF NOT EXISTS `sedes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `sedes`
--

INSERT INTO `sedes` (`id`, `nombre`, `direccion`, `latitud`, `longitud`, `imagen`, `descripcion`) VALUES
(1, 'Sede Atlántica', 'Viedma', -41.0477, -62.8517, 'Jellyfish.jpg', 'Sede Atlántica de Viedma'),
(2, 'Sede Andina', 'Bariloche', -41.5415, -71.1914, 'logoNoticiasNet.png', 'Descripción de la sede bariloche'),
(3, 'Sede Alto Valle', 'General Roca', -39.935, -66.1897, '77243.jpg', 'Descripción de la sede alto valle'),
(4, 'asdjla', 'lkasjld', 12, 21, 'chiste_informatico_01_estimacion.jpg', 'aklsjdlakjsdlakalksjdlasjd'),
(5, 'Koala', 'ajldskjsalk', 8098, 980, 'Koala.jpg', 'dkjalsjdlajsdlajsldkja'),
(6, 'jasldkja', 'lkjaslk', 8083920, 9809, 'Hydrangeas.jpg', 'asdjlakjsdlkajsdkl'),
(7, 'Patagones', 'Villa Linnch', 12, 12, 'patagones.jpg', 'asdjlaksjdlka'),
(10, 'sede Atlánticas', NULL, NULL, NULL, NULL, NULL),
(11, 'Cipolletti', 'Calle siempre viva 232', 908, 9890, 'logoNoticiasNet2.png', 'descripcion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contrasena` varchar(100) NOT NULL DEFAULT '5f4dcc3b5aa765d61d8327deb882cf99',
  `role_id` int(11) DEFAULT '3',
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`),
  KEY `fk_usuario_perfil1_idx` (`perfil_id`),
  KEY `fk_usuario_rol1_idx` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `role_id`, `perfil_id`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 1),
(2, 'sede', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 2),
(3, 'operador', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 3),
(4, 'dani', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 4),
(5, 'nicolas', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 5),
(6, 'agus', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 6),
(7, 'gamico', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 7),
(8, 'mcambarieri', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 8),
(9, 'msanhueza', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 9),
(10, 'phiguain', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 10),
(11, 'prueba', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 11),
(12, 'ngarcia', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 12),
(13, 'ldifabio', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 13),
(14, 'aluquet', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 14),
(15, 'llopez', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 15),
(16, 'lgraciani', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 16),
(17, 'msosa', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 17),
(18, 'ryuniz', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 18),
(19, 'ltorvalds', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 19),
(20, 'rstallman', '5f4dcc3b5aa765d61d8327deb882cf99', 2, 20),
(21, 'bgates', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 21),
(28, 'sjobs', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 29),
(29, 'mzuckerberg', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 30),
(37, 'pallen', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 38),
(41, 'borrarc', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 42),
(51, 'lpage', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 51),
(52, 'aeinstein', '5f4dcc3b5aa765d61d8327deb882cf99', 3, 52);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `fk_actividad_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `avisos`
--
ALTER TABLE `avisos`
  ADD CONSTRAINT `fk_aviso_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `fechas_de_examen`
--
ALTER TABLE `fechas_de_examen`
  ADD CONSTRAINT `fk_fecha_de_examen_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pdis`
--
ALTER TABLE `pdis`
  ADD CONSTRAINT `fk_pdi_sede1` FOREIGN KEY (`sede_sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD CONSTRAINT `perfiles_ibfk_3` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `permisos_has_roles`
--
ALTER TABLE `permisos_has_roles`
  ADD CONSTRAINT `fk_permisos_has_role_permisos1` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_has_role_role1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
