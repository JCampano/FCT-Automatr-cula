-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-06-2018 a las 00:11:21
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `automatricula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(5) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido1` varchar(40) NOT NULL,
  `apellido2` varchar(40) NOT NULL,
  `nie` varchar(9) NOT NULL,
  `fecha_nac` date NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `poblacion` varchar(40) NOT NULL,
  `provincia` varchar(40) NOT NULL,
  `cod_postal` int(5) NOT NULL,
  `tel_fijo` int(9) NOT NULL,
  `tel_movil` int(9) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `dni_padre` varchar(9) NOT NULL,
  `nombre_padre` varchar(40) NOT NULL,
  `apellidos_padre` varchar(40) NOT NULL,
  `tel_padre` int(9) NOT NULL,
  `correo_padre` varchar(50) NOT NULL,
  `dni_madre` varchar(9) NOT NULL,
  `nombre_madre` varchar(40) NOT NULL,
  `apellidos_madre` varchar(40) NOT NULL,
  `tel_madre` int(9) NOT NULL,
  `correo_madre` varchar(50) NOT NULL,
  `cambio_datos` varchar(500) DEFAULT NULL,
  `fecha_alta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id`, `dni`, `clave`, `nombre`, `apellido1`, `apellido2`, `nie`, `fecha_nac`, `direccion`, `poblacion`, `provincia`, `cod_postal`, `tel_fijo`, `tel_movil`, `correo`, `dni_padre`, `nombre_padre`, `apellidos_padre`, `tel_padre`, `correo_padre`, `dni_madre`, `nombre_madre`, `apellidos_madre`, `tel_madre`, `correo_madre`, `cambio_datos`, `fecha_alta`) VALUES
(1, '00000000A', '12345', 'Ricardo', 'Linterna', 'Farola', 'Y0000000A', '1980-05-16', 'Calle Rábano', 'Dos Hermanas', 'Sevilla', 41089, 954674535, 608546576, 'rlinternaquealumbra@gmail.com', '30456765F', 'Pepe', 'Linterna Avispa', 654325676, 'plinternapicaduraletallobezno@gmail.com', '29456765V', 'Josefina', 'Helios Farola', 654678798, 'jdiosadelsol@gmail.com', NULL, '2017-02-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_itinerario` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`codigo`, `nombre`, `id_itinerario`) VALUES
('02BACHCIENTECFIL', 'Filosofía', 1),
('02BACHCIENTECLEN', 'Lengua y Literatura', 1),
('02BACHCIENTECMAT', 'Matemáticas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_enseñanza` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `id_enseñanza`) VALUES
(1, '2º ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enseñanzas`
--

CREATE TABLE `enseñanzas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `enseñanzas`
--

INSERT INTO `enseñanzas` (`id`, `nombre`) VALUES
(1, 'Bachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_optativas`
--

CREATE TABLE `grupo_optativas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_curso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupo_optativas`
--

INSERT INTO `grupo_optativas` (`id`, `nombre`, `id_curso`) VALUES
(1, 'Ciencias', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `imagen` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `id_usuario`, `imagen`) VALUES
(1, 1, 'imgAlumnos/1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itinerarios`
--

CREATE TABLE `itinerarios` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_curso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `itinerarios`
--

INSERT INTO `itinerarios` (`id`, `nombre`, `id_curso`) VALUES
(1, 'Ciencias tecnológicas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `id` int(5) NOT NULL,
  `cod_matricula` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(5) NOT NULL,
  `id_alumno` int(5) NOT NULL,
  `id_itinerario` int(5) NOT NULL,
  `finalizada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`id`, `cod_matricula`, `fecha`, `hora`, `id_alumno`, `id_itinerario`, `finalizada`) VALUES
(1, '1111111111', '2018-03-19', '12:00', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas_registradas`
--

CREATE TABLE `matriculas_registradas` (
  `id_matricula` int(5) NOT NULL,
  `id_usuario` int(5) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `matriculas_registradas`
--

INSERT INTO `matriculas_registradas` (`id_matricula`, `id_usuario`, `fecha`) VALUES
(1, 1, '2017-06-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optativas`
--

CREATE TABLE `optativas` (
  `id` int(5) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `id_grupo_optativas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `optativas`
--

INSERT INTO `optativas` (`id`, `nombre`, `id_grupo_optativas`) VALUES
(1, 'Química', 1),
(2, 'Física', 1),
(3, 'Biología', 1),
(4, 'Electrotecnia', 1),
(5, 'Informática', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `optativas_elegidas`
--

CREATE TABLE `optativas_elegidas` (
  `id` int(5) NOT NULL,
  `cod_matricula` varchar(40) NOT NULL,
  `id_optativa2` int(5) NOT NULL,
  `id_optativa3` int(5) NOT NULL,
  `id_optativa4` int(5) NOT NULL,
  `id_optativa1` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `optativas_elegidas`
--

INSERT INTO `optativas_elegidas` (`id`, `cod_matricula`, `id_optativa2`, `id_optativa3`, `id_optativa4`, `id_optativa1`) VALUES
(1, '1111111111', 4, 2, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(5) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `clave` varchar(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `telefono` int(9) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `dni`, `clave`, `nombre`, `apellidos`, `telefono`, `tipo`) VALUES
(1, '11111111A', '12345', 'David', 'de Vega', 657456543, 'administrador'),
(2, '30456765F', '12345', 'José Antonio', 'Campano Laborda', 954675867, 'administrativo'),
(3, '29456765D', 'asdas', 'Adrián', 'Yiampasila', 954675869, 'gestor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `id` (`codigo`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_enseñanza` (`id_enseñanza`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `enseñanzas`
--
ALTER TABLE `enseñanzas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `grupo_optativas`
--
ALTER TABLE `grupo_optativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_alumno_2` (`id_alumno`),
  ADD UNIQUE KEY `cod_matricula` (`cod_matricula`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_itinerario` (`id_itinerario`),
  ADD KEY `cod_matricula_2` (`cod_matricula`);

--
-- Indices de la tabla `matriculas_registradas`
--
ALTER TABLE `matriculas_registradas`
  ADD PRIMARY KEY (`id_matricula`),
  ADD KEY `id_matricula` (`id_matricula`),
  ADD KEY `id_usuario` (`id_usuario`) USING BTREE;

--
-- Indices de la tabla `optativas`
--
ALTER TABLE `optativas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_grupo_optativas` (`id_grupo_optativas`);

--
-- Indices de la tabla `optativas_elegidas`
--
ALTER TABLE `optativas_elegidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_matricula` (`cod_matricula`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `enseñanzas`
--
ALTER TABLE `enseñanzas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `grupo_optativas`
--
ALTER TABLE `grupo_optativas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `optativas`
--
ALTER TABLE `optativas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `optativas_elegidas`
--
ALTER TABLE `optativas_elegidas`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`id_enseñanza`) REFERENCES `enseñanzas` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_optativas`
--
ALTER TABLE `grupo_optativas`
  ADD CONSTRAINT `grupo_optativas_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `itinerarios`
--
ALTER TABLE `itinerarios`
  ADD CONSTRAINT `itinerarios_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`);

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `matriculas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id`),
  ADD CONSTRAINT `matriculas_ibfk_2` FOREIGN KEY (`id_itinerario`) REFERENCES `itinerarios` (`id`);

--
-- Filtros para la tabla `matriculas_registradas`
--
ALTER TABLE `matriculas_registradas`
  ADD CONSTRAINT `matriculas_registradas_ibfk_1` FOREIGN KEY (`id_matricula`) REFERENCES `matriculas` (`id`);

--
-- Filtros para la tabla `optativas`
--
ALTER TABLE `optativas`
  ADD CONSTRAINT `optativas_ibfk_1` FOREIGN KEY (`id_grupo_optativas`) REFERENCES `grupo_optativas` (`id`);

--
-- Filtros para la tabla `optativas_elegidas`
--
ALTER TABLE `optativas_elegidas`
  ADD CONSTRAINT `optativas_elegidas_ibfk_1` FOREIGN KEY (`cod_matricula`) REFERENCES `matriculas` (`cod_matricula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
