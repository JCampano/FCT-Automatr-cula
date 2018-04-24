-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2018 a las 12:16:45
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `automatricula`
--
CREATE DATABASE IF NOT EXISTS `automatricula` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `automatricula`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `id_centro` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_curso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas_cursos`
--

DROP TABLE IF EXISTS `asignaturas_cursos`;
CREATE TABLE IF NOT EXISTS `asignaturas_cursos` (
  `cod_asignaturas` varchar(20) NOT NULL,
  `id_cursos` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

DROP TABLE IF EXISTS `centros`;
CREATE TABLE IF NOT EXISTS `centros` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_itinerario` int(5) NOT NULL,
  `nombre_itinerario` int(40) NOT NULL,
  `id_enseñanza` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enseñanzas`
--

DROP TABLE IF EXISTS `enseñanzas`;
CREATE TABLE IF NOT EXISTS `enseñanzas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_centro` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

DROP TABLE IF EXISTS `matriculas`;
CREATE TABLE IF NOT EXISTS `matriculas` (
  `id` int(5) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido 1` varchar(40) NOT NULL,
  `apellido 2` varchar(40) NOT NULL,
  `nie` varchar(9) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `fecha_nac` date NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `poblacion` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `cod_postal` int(5) NOT NULL,
  `tel_fijo` int(9) NOT NULL,
  `tel_movil` int(9) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `nombre_padre` varchar(40) NOT NULL,
  `apellidos_padre` varchar(40) NOT NULL,
  `tel_padre` int(9) NOT NULL,
  `correo_padre` varchar(50) NOT NULL,
  `nombre_madre` varchar(40) NOT NULL,
  `apellidos_madre` varchar(40) NOT NULL,
  `tel_madre` int(9) NOT NULL,
  `correo_madre` varchar(50) NOT NULL,
  `enseñanza` varchar(40) NOT NULL,
  `curso` varchar(10) NOT NULL,
  `itinerario` varchar(40) NOT NULL,
  `bloque_optativas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optativas`
--

DROP TABLE IF EXISTS `optativas`;
CREATE TABLE IF NOT EXISTS `optativas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_curso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

DROP TABLE IF EXISTS `personal`;
CREATE TABLE IF NOT EXISTS `personal` (
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` int(9) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `id_centro` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni`), ADD UNIQUE KEY `id` (`dni`), ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`codigo`), ADD UNIQUE KEY `id_curso` (`id_curso`), ADD KEY `id` (`codigo`);

--
-- Indices de la tabla `asignaturas_cursos`
--
ALTER TABLE `asignaturas_cursos`
  ADD KEY `id_asignaturas` (`cod_asignaturas`), ADD KEY `id_cursos` (`id_cursos`);

--
-- Indices de la tabla `centros`
--
ALTER TABLE `centros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`), ADD KEY `id_enseñanza` (`id_enseñanza`), ADD KEY `id` (`id`);

--
-- Indices de la tabla `enseñanzas`
--
ALTER TABLE `enseñanzas`
  ADD PRIMARY KEY (`id`), ADD KEY `id_centro` (`id_centro`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`), ADD KEY `dni` (`dni`), ADD KEY `dni_2` (`dni`), ADD KEY `dni_3` (`dni`), ADD KEY `dni_4` (`dni`);

--
-- Indices de la tabla `optativas`
--
ALTER TABLE `optativas`
  ADD PRIMARY KEY (`id`), ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`dni`), ADD KEY `id_centro` (`id_centro`), ADD KEY `id_centro_2` (`id_centro`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_centro`) REFERENCES `centros` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignaturas_cursos`
--
ALTER TABLE `asignaturas_cursos`
ADD CONSTRAINT `asignaturas_cursos_ibfk_1` FOREIGN KEY (`cod_asignaturas`) REFERENCES `asignaturas` (`codigo`) ON UPDATE CASCADE,
ADD CONSTRAINT `asignaturas_cursos_ibfk_2` FOREIGN KEY (`id_cursos`) REFERENCES `cursos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_enseñanza`) REFERENCES `enseñanzas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `enseñanzas`
--
ALTER TABLE `enseñanzas`
ADD CONSTRAINT `enseñanzas_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centros` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `alumnos` (`dni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `optativas`
--
ALTER TABLE `optativas`
ADD CONSTRAINT `optativas_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`id_centro`) REFERENCES `centros` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
