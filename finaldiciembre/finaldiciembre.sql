-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-11-2014 a las 18:55:40
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
(1, 'Gestión de Usuarios', 1, '/usuario/get', 0),
(2, 'Listar usuarios', 1, '/usuario/get ', 1),
(3, 'Agregar usuario', 2, '/usuario/add ', 1),
(4, 'Gestión de PDI ', 2, '/pdi/get', 0),
(5, 'Consultar PDI', 2, '/pdi/get', 4),
(6, 'Editar PDI', 2, '/pdi/', 4),
(7, 'Eliminar PDI', 2, '/pdi/delete', 4),
(8, 'Agregar PDI', 2, '/pdi/add', 4),
(9, 'Gestión de Sedes', 1, '/sede/get', 0),
(10, 'Consultar sede', 2, '/sede/get', 9),
(11, 'Agregar sede', 2, '/sede/add', 9),
(12, 'Gestión de Perfil', 1, '/perfil/get', 0),
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
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfil_sede1_idx` (`sede_id`),
  KEY `fk_perfil_user1_idx` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Volcar la base de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `apellido`, `telefono`, `documento`, `fec_nac`, `domicilio`, `email`, `sede_id`, `user_id`) VALUES
(1, 'admin', 'admin', 1234, 12345678, '2014-12-31', 'admin', 'admin@gmail.com', NULL, 1),
(2, 'Bruno Javier', 'Amico', 15638118, 27828706, '1980-04-18', 'Calle siempre viva 233 Patagones', 'sistema@localhost.com', 1, 2),
(3, 'sede', 'sede', 12345678, 12345678, '1991-03-10', 'sede', 'sede@gmail.com', 2, 3),
(5, 'Agustin', 'Rivero', 15123456, 4012312, '2014-12-31', 'Gallardo 1023', '', NULL, 5),
(6, 'Agustin', 'Rivero', 15123456, 4012312, '2014-11-30', 'Gallardo 1023', '', 3, 6),
(7, 'Agustin', 'Rivero', 15123456, 4012312, '2014-12-31', 'Gallardo 1023', '', 3, 7),
(8, 'Agustin', 'Rivero', 0, 4012312, '2014-12-31', 'Gallardo 1023', '', 3, 8),
(9, 'Agustin', 'Rivero', 15123456, 4012312, '2013-11-30', 'Gallardo 1023', 'agus@mail.com', NULL, 9),
(10, 'lkasjdl', 'laaksj', 132123, 23123123, '2013-12-29', 'asjdlk', 'lkasd@jaslkd.com', NULL, 10),
(11, 'lkasjdl', 'laaksj', 132123, 23123123, '2013-12-29', 'asjdlk', 'lkasd@jaslkd.com', NULL, 11),
(12, 'ñlkñsl', 'asdlj', 1231, 9183091, '2014-12-31', 'asdkl', 'jsdlak@akjsdl.com', NULL, 12),
(13, 'akjdks', 'lksajdl', 980321, 3091820, '2014-12-31', 'asjldk', 'sodaisj@ajdhkja.casjd', 1, 13),
(14, 'ldkasjl', 'lkasjlk', 15123456, 2983749, '2014-12-31', 'Gallardo 1023', 'sistema@localhost.com', 1, 14),
(15, 'nicolas', 'castro', 29840923, 35602513, '2014-12-31', 'odaoisu', 'sajdlajs@asjdlk.com', 1, 15),
(16, 'nicolas', 'castro', 1321, 35602513, '2014-12-31', 'alksdjals', 'laskdjal@ajkld.com', 1, 16),
(17, 'nicolas', 'castro', 15214058, 35602513, '2014-12-31', 'asdklajs', 'alskdja@als.ajshd', NULL, 17),
(18, 'agutin', 'rivero', 8301982, 2342398, '2014-12-31', 'alksjlkajsd', 'jalskdj@aljsd.cas', 1, 18),
(19, 'prueba', 'prueba', 879879, 80980, '2013-12-30', 'prueba', 'prueba@dsad.ccm', 1, 19),
(20, 'prueba', 'prueba', 879879, 80980, '2013-12-30', 'prueba', 'prueba@dsad.ccm', 1, 20),
(21, 'prueba', 'prueba', 879879, 80980, '2013-12-30', 'prueba', 'prueba@dsad.ccm', 2, 22),
(22, 'prueba', 'prueba', 879879, 80980, '2013-12-30', 'prueba', 'prueba@dsad.ccm', 2, 23),
(23, 'jfsldjl', 'sdfjlk', 80809, 80980, '2014-11-07', 'hakdjska', 'hkajhdakj', NULL, 19),
(25, 'ahsjh', 'dshakjh', 0, 0, '2014-11-27', 'asdhj', 'sajkhkj', NULL, 19),
(26, 'ahsjh', 'dshakjh', 78979, 98798, '2014-11-27', 'asdhj', 'sajkhkj', NULL, 19),
(27, 'ahsjh', 'dshakjh', 78979, 98798, '2014-11-27', 'asdhj', 'sajkhkj', NULL, 19),
(28, 'ahskdj', 'jdskha', 897987, 80098, '2014-12-31', 'ahskdjhs', 'hakjs@kkc.c', 1, 24),
(29, 'ahskdj', 'jdskha', 897987, 80098, '2014-12-31', 'ahskdjhs', 'hakjs@kkc.c', 1, 25),
(30, 'ahskjdh', 'kdjahk', 0, 79879, '2013-11-29', '7897987', 'sjahkdj@jdask.cc', 1, 26),
(31, 'ahskjdh', 'kdjahk', 0, 79879, '2013-11-29', '7897987', 'sjahkdj@jdask.cc', 1, 27),
(32, 'ahskjdh', 'kdjahk', 0, 79879, '2013-11-29', '7897987', 'sjahkdj@jdask.cc', 1, 28),
(33, '', '', 0, 0, '0000-00-00', '', '', 1, 29);

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
(27, 'Consultar operadores', 'user_operadores', 28),
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
  `role_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcar la base de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `role_id`) VALUES
(1, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(2, 'sede', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(3, 'operador', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(5, 'nicolas', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(6, 'agus', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(7, 'gamico', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(8, 'mcambarieri', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(9, 'msanhueza', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(10, 'phiguain', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(11, 'prueba', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(12, 'ngarcia', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(13, 'ldifabio', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(14, 'aluquet', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(15, 'llopez', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(16, 'lgraciani', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(17, 'msosa', '5f4dcc3b5aa765d61d8327deb882cf99', 3),
(18, 'ryuniz', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(19, 'choelechoel', '5f4dcc3b5aa765d61d8327deb882cf99', 2),
(20, 'choelechoellkjlkjl', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(22, 'choelechoellkjlkjlsjsjsj', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(23, 'venezuela', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(24, 'europa', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(25, 'francia', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(26, 'japon', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(27, 'japones', '5f4dcc3b5aa765d61d8327deb882cf99', 1),
(28, 'japonesa', '5f4dcc3b5aa765d61d8327deb882cf99', 1);

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
  ADD CONSTRAINT `fk_perfil_sede1` FOREIGN KEY (`sede_id`) REFERENCES `sedes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos_has_roles`
--
ALTER TABLE `permisos_has_roles`
  ADD CONSTRAINT `fk_permisos_has_role_permisos1` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_permisos_has_role_role1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
