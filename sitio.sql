-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2021 a las 03:33:29
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sitio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE DATABASE `sitio`;

USE `sitio`;

CREATE TABLE `imagenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(70) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `nombre`, `imagen`, `usuario_id`) VALUES
(14, 'lago', 'lago.jpg', 4),
(15, 'luna', 'luna.jpg', 4),
(16, 'paisaje', 'paisaje.jpg', 4),
(29, 'roma', 'roma.jpg', 10),
(33, 'portal', 'portal.jpg', 11),
(34, 'puente', 'puente.jpg', 11),
(35, 'esferas', 'esferas.jpg', 13),
(36, 'tokio', 'tokio.jpg', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` enum('admin','usuario') COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigoPostal` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `email`, `password`, `tipo`, `nombres`, `apellidos`, `direccion`, `ciudad`, `codigoPostal`, `Telefono`, `descripcion`) VALUES
(1, 'admin', '', '81dc9bdb52d04dc20036dbd8313ed055', 'admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'florcita', 'florencia@hotmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', 'Florencia', 'Suarez', 'Capital', 'Buenos Aires', '1088', '1550385604', 'Estudiante'),
(10, 'usuario', 'usuario@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '', '', '', '', '', '', ''),
(11, 'operario', 'operario@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '', '', '', '', '', '', ''),
(13, 'cliente', 'cliente@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'usuario', '', '', '', '', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
