-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2022 a las 18:06:20
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cavallaro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dibujos`
--

CREATE TABLE `dibujos` (
  `id` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `dibujo` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dibujos`
--

INSERT INTO `dibujos` (`id`, `id_usuario`, `dibujo`, `reg_date`) VALUES
(1, 2, 'dibujos/622174f41da57.png', '2022-03-04 02:09:56'),
(2, 2, 'dibujos/6221758312082.png', '2022-03-04 02:12:19'),
(3, 3, 'dibujos/6221773fa0369.png', '2022-03-04 02:19:43'),
(4, 3, 'dibujos/622177a3dcece.png', '2022-03-04 02:21:23'),
(5, 3, 'dibujos/622177eea1353.png', '2022-03-04 02:22:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `usuario` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `clave` text COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `bio` varchar(255) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `apellido`, `clave`, `imagen`, `bio`, `reg_date`) VALUES
(1, 'admin', '', '', '0192023a7bbd73250516f069df18b500', 'imagen_default.jpg', '', '2022-03-04 01:59:33'),
(5, 'delficav', 'Delfina', 'Cavallaro', 'd41d8cd98f00b204e9800998ecf8427e', 'static-assets-upload13184615027117699797.png', 'Alumna de Artes Multimediales', '2022-03-05 16:57:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dibujos`
--
ALTER TABLE `dibujos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dibujos`
--
ALTER TABLE `dibujos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
