-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2018 a las 22:31:33
-- Versión del servidor: 10.1.33-MariaDB
-- Versión de PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_seguridad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nosotros`
--

CREATE TABLE `tbl_nosotros` (
  `id` int(11) NOT NULL,
  `tituloq` varchar(100) NOT NULL,
  `descripcionq` varchar(1000) NOT NULL,
  `titulom` varchar(100) NOT NULL,
  `descripcionm` varchar(1000) NOT NULL,
  `titulov` varchar(100) NOT NULL,
  `descripcionv` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_nosotros`
--

INSERT INTO `tbl_nosotros` (`id`, `tituloq`, `descripcionq`, `titulom`, `descripcionm`, `titulov`, `descripcionv`) VALUES
(1, '¿Quiénes Somos?', 'asdfsdfvadf<sdfzhtaf', 'Misión', 'fafgdfjhyujkuililkthfgw', 'Visión', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_nosotros`
--
ALTER TABLE `tbl_nosotros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_nosotros`
--
ALTER TABLE `tbl_nosotros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
