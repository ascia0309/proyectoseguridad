-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2018 a las 19:59:03
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdseguridad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menid` int(11) NOT NULL,
  `mensubid` int(11) DEFAULT NULL,
  `mennombre` varchar(45) DEFAULT NULL,
  `mencontrolador` varchar(45) DEFAULT NULL,
  `menaccion` varchar(20) DEFAULT NULL,
  `menicono` varchar(30) DEFAULT NULL,
  `menorden` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menid`, `mensubid`, `mennombre`, `mencontrolador`, `menaccion`, `menicono`, `menorden`) VALUES
(1, NULL, 'Usuario', 'Principal', NULL, NULL, 1),
(2, 1, 'busqueda usuario', 'Principal', 'index', NULL, 2),
(3, 1, 'Asignar Perfil', 'Usuario', 'listar', NULL, 3),
(4, NULL, 'Venta', 'Usuario', NULL, NULL, 4),
(5, 4, 'realizar venta', 'Usuario', 'listar', NULL, 5),
(6, 4, 'consulta venta', 'Principal', 'editar', NULL, 6),
(7, NULL, 'Inicio', 'Principal', NULL, NULL, 7),
(8, 7, 'Principal', 'Principal', 'index', NULL, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mep`
--

CREATE TABLE IF NOT EXISTS `mep` (
  `mepid` int(11) NOT NULL,
  `perid` int(11) NOT NULL,
  `menid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mep`
--

INSERT INTO `mep` (`mepid`, `perid`, `menid`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 4),
(5, 2, 4),
(6, 1, 7),
(7, 3, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `perid` int(11) NOT NULL,
  `pernombre` varchar(20) DEFAULT NULL,
  `perdescripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`perid`, `pernombre`, `perdescripcion`) VALUES
(1, 'Administrador', NULL),
(2, 'Vendedor', NULL),
(3, 'Secretaria', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usuid` int(11) NOT NULL,
  `perid` int(11) NOT NULL,
  `usudni` varchar(8) DEFAULT NULL,
  `usuemail` varchar(30) DEFAULT NULL,
  `usucontrasenia` varchar(1000) DEFAULT NULL,
  `usunombres` varchar(20) DEFAULT NULL,
  `usuapellidos` varchar(30) DEFAULT NULL,
  `usucelular` varchar(9) DEFAULT NULL,
  `usuestado` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuid`, `perid`, `usudni`, `usuemail`, `usucontrasenia`, `usunombres`, `usuapellidos`, `usucelular`, `usuestado`) VALUES
(1, 1, '46701111', 'admin@seguridad.com', 'admin', 'Administrador', 'Administrador', '993111119', 1),
(2, 1, '87654311', 'manuel@hotmail.com', 'manuel', 'Manuel', 'Janampa Huarango', '987654312', 1),
(3, 2, '98765121', 'hinata@hotmail.com', 'hinata', 'Hinata', 'Uzumai Hyugan', '987654122', 1),
(4, 3, '98121212', 'sasuke@hotmail.com', 'sasuke', 'Sasuke', 'Uchia H', '987654312', 1),
(5, 2, '81728171', 'mario@htomail.com', 'mario', 'Mario', 'Cordova Huarhuachi', '998876551', 1),
(6, 1, '91822211', 'hoho@hotmail.com', 'hoho', 'Hugo', 'Manrique Jorge', '987654312', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menid`),
  ADD KEY `fk_menu_menu1_idx` (`mensubid`);

--
-- Indices de la tabla `mep`
--
ALTER TABLE `mep`
  ADD PRIMARY KEY (`mepid`,`perid`,`menid`),
  ADD KEY `fk_perfil_has_menu_menu1_idx` (`menid`),
  ADD KEY `fk_perfil_has_menu_perfil1_idx` (`perid`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`perid`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuid`),
  ADD KEY `fk_usuario_perfil_idx` (`perid`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `menid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `mep`
--
ALTER TABLE `mep`
  MODIFY `mepid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `perid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_menu_menu1` FOREIGN KEY (`mensubid`) REFERENCES `menu` (`menid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mep`
--
ALTER TABLE `mep`
  ADD CONSTRAINT `fk_perfil_has_menu_menu1` FOREIGN KEY (`menid`) REFERENCES `menu` (`menid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_perfil_has_menu_perfil1` FOREIGN KEY (`perid`) REFERENCES `perfil` (`perid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_perfil` FOREIGN KEY (`perid`) REFERENCES `perfil` (`perid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
