-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-05-2018 a las 12:32:48
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
  `clave` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido 1` varchar(40) NOT NULL,
  `apellido 2` varchar(40) NOT NULL,
  `nie` varchar(9) NOT NULL,
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
  `correo_madre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`dni`, `clave`, `nombre`, `apellido 1`, `apellido 2`, `nie`, `fecha_nac`, `direccion`, `poblacion`, `provincia`, `cod_postal`, `tel_fijo`, `tel_movil`, `correo`, `nombre_padre`, `apellidos_padre`, `tel_padre`, `correo_padre`, `nombre_madre`, `apellidos_madre`, `tel_madre`, `correo_madre`) VALUES
('00000000A', '1234', 'Ricardo', 'Linterna', 'Farola', 'Y0000000A', '1980-05-16', 'Calle Rábano', 'Dos Hermanas', 'Sevilla', 41089, 954674535, 608546576, 'rlinternaquealumbra@gmail.com', 'Pepe', 'Linterna Avispa', 654325676, 'plinternapicaduraletallobezno@gmail.com', 'Josefina', 'Helios Farola', 654678798, 'jdiosadelsol@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

DROP TABLE IF EXISTS `asignaturas`;
CREATE TABLE IF NOT EXISTS `asignaturas` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_itinerario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_enseñanza` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enseñanzas`
--

DROP TABLE IF EXISTS `enseñanzas`;
CREATE TABLE IF NOT EXISTS `enseñanzas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

DROP TABLE IF EXISTS `imagenes`;
CREATE TABLE IF NOT EXISTS `imagenes` (
  `id` int(5) NOT NULL,
  `dni_alumno` varchar(9) NOT NULL,
  `imagen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerarios`
--

DROP TABLE IF EXISTS `itinerarios`;
CREATE TABLE IF NOT EXISTS `itinerarios` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_curso` int(5) NOT NULL
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
  `dni_alumno` varchar(9) NOT NULL,
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
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`dni`), ADD UNIQUE KEY `id` (`dni`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`codigo`), ADD UNIQUE KEY `id_curso` (`id_itinerario`), ADD KEY `id` (`codigo`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`), ADD KEY `id_enseñanza` (`id_enseñanza`), ADD KEY `id` (`id`);

--
-- Indices de la tabla `enseñanzas`
--
ALTER TABLE `enseñanzas`
  ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`), ADD KEY `dni_alumno` (`dni_alumno`);

--
-- Indices de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  ADD PRIMARY KEY (`id`), ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`), ADD KEY `dni` (`dni_alumno`), ADD KEY `dni_2` (`dni_alumno`), ADD KEY `dni_3` (`dni_alumno`), ADD KEY `dni_4` (`dni_alumno`);

--
-- Indices de la tabla `optativas`
--
ALTER TABLE `optativas`
  ADD PRIMARY KEY (`id`), ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `enseñanzas`
--
ALTER TABLE `enseñanzas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `optativas`
--
ALTER TABLE `optativas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
ADD CONSTRAINT `asignaturas_ibfk_1` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_enseñanza`) REFERENCES `enseñanzas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`dni_alumno`) REFERENCES `alumnos` (`dni`);

--
-- Filtros para la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
ADD CONSTRAINT `itinerarios_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`dni_alumno`) REFERENCES `alumnos` (`dni`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `optativas`
--
ALTER TABLE `optativas`
ADD CONSTRAINT `optativas_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
