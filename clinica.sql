-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-01-2022 a las 04:05:05
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `ncargo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `ncargo`) VALUES
(1, 'Nefrólogo'),
(2, 'Trabajadora Social');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita_medica`
--

CREATE TABLE `cita_medica` (
  `id_cita` int(11) NOT NULL,
  `paciente` varchar(60) DEFAULT NULL,
  `fecha_cita` date DEFAULT NULL,
  `hora_cita` varchar(20) DEFAULT NULL,
  `medico` varchar(60) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cita_medica`
--

INSERT INTO `cita_medica` (`id_cita`, `paciente`, `fecha_cita`, `hora_cita`, `medico`, `estado`) VALUES
(9, 'Geovanny', '2022-01-29', '04:04', 'Dra. Elizabeth Gonzalez Gonzalez', 0),
(10, 'Geovanny', '2022-01-29', '05:05', 'Dra. Elizabeth Gonzalez Gonzalez', 1),
(11, 'Geovanny', '2022-01-29', '05:05', 'Dra. Elizabeth Gonzalez Gonzalez', 1),
(12, 'jj', '2022-01-29', '07:44', 'Dra. Elizabeth Gonzalez Gonzalez', 0),
(13, 'sele', '2022-01-29', '04:05', 'Dra. Elizabeth Gonzalez Gonzalez', 0),
(14, 'luis', '2022-01-29', '05:05', 'Dra. Elizabeth Gonzalez Gonzalez', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expendiente_medico`
--

CREATE TABLE `expendiente_medico` (
  `id_historias` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `peso` varchar(50) DEFAULT NULL,
  `estatura` int(11) DEFAULT NULL,
  `presionarterial` varchar(20) DEFAULT NULL,
  `dianostico` text,
  `cuadro_clinico` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `expendiente_medico`
--

INSERT INTO `expendiente_medico` (`id_historias`, `nombres`, `cedula`, `edad`, `peso`, `estatura`, `presionarterial`, `dianostico`, `cuadro_clinico`) VALUES
(1, 'EDWIN', '123456789', 0, '5', 0, '45', 'regular', 'normal'),
(2, 'LUIS MENDOZA', '12155454', 15, '55', 51, '45', 'regular', 'grave'),
(3, 'Juanito', '12155454', 15, '55', 51, '45', 'regular', 'estable'),
(6, 'Maria', '12345678', 15, '120', 56, '65', 'fatal', 'intervencion'),
(10, 'LUcho', '23456798', 12, '33', 23, '33', 'grave', 'mal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia_clinica`
--

CREATE TABLE `historia_clinica` (
  `id_historias` int(11) NOT NULL,
  `nombres` varchar(50) DEFAULT NULL,
  `apellidos` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `cedula` varchar(50) DEFAULT NULL,
  `codigo_historial` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `genero` varchar(50) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `contrasena` varchar(50) DEFAULT NULL,
  `cargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `usuario`, `contrasena`, `cargo`) VALUES
(1, 'jonathan', 'villa97', 1),
(5, 'gova', '12345', 2),
(6, 'hh', 'hh', 1),
(7, 'gg', 'gg', 2),
(8, 'ss', 'ss', 2),
(9, 'qq', 'qq', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `cita_medica`
--
ALTER TABLE `cita_medica`
  ADD PRIMARY KEY (`id_cita`);

--
-- Indices de la tabla `expendiente_medico`
--
ALTER TABLE `expendiente_medico`
  ADD PRIMARY KEY (`id_historias`);

--
-- Indices de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  ADD PRIMARY KEY (`id_historias`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cargo` (`cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cita_medica`
--
ALTER TABLE `cita_medica`
  MODIFY `id_cita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `expendiente_medico`
--
ALTER TABLE `expendiente_medico`
  MODIFY `id_historias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `historia_clinica`
--
ALTER TABLE `historia_clinica`
  MODIFY `id_historias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `id_cargo` FOREIGN KEY (`cargo`) REFERENCES `cargo` (`idcargo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
