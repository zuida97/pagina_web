-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-07-2018 a las 16:01:06
-- Versión del servidor: 10.1.31-MariaDB
-- Versión de PHP: 7.2.3

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
-- Estructura de tabla para la tabla `tbl_productos`
--

CREATE TABLE `tbl_productos` (
  `id` int(11) NOT NULL,
  `cod_producto` varchar(50) NOT NULL,
  `nom_producto` varchar(50) NOT NULL,
  `desc_producto` blob NOT NULL,
  `tipo_producto` varchar(25) NOT NULL,
  `costo_prod` int(11) NOT NULL,
  `cant_prod` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_productos`
--

INSERT INTO `tbl_productos` (`id`, `cod_producto`, `nom_producto`, `desc_producto`, `tipo_producto`, `costo_prod`, `cant_prod`, `archivo`) VALUES
(24, 'APR-ZAR-234', 'Dahua 720 ', 0x43c3a16d61726120446168756120484443564920446f6d6f20314d50203732305020322e386d6d20495232302e, 'Cámara de seguridad', 24990, 15, 'dahua720.jpg'),
(27, 'GF7-FD3-SDG', 'FOTOELEC 5193SDT - HONEYWELL', 0x35313933534454204445544543544f522048554d4f20464f544f454c45432059205445524d49434f2054454d502046494a4120484f4e455957454c4c, 'Detector de humo', 19990, 26, '5193sdt-detector-humo-fotoelec-y-termico-temp-fija-honeywell_36229.jpg'),
(28, 'HFI-4FS-GRE', 'OPALUX ST-91B', 0x4375656e746120636f6e20756e4c454420696e64696361646f7220646520616c61726d61206f70657261746976612c20436f6e207465636e6f6c6f67c3ad6120666f746f656cc3a96374726963612073656e7369626c6520612063616e74696461646573206d61796f72657320656e20696e63656e64696f732068756d65616e746573, 'Detector de humo', 29990, 40, '2008424.jpg'),
(26, 'MH9-H8E-HDK', 'Kit Cian 3000 - Cian 1500', 0x4d696e6920616c61726d61732064652070756572746120792076656e74616e612e, 'Alarma', 14990, 34, 'mini-alarmas-puertas-y-ventanas-seguridad.jpg'),
(25, 'ZRW-2E4-XGD', 'CCD 105 ', 0x43c3a16d6172612043434420484420313032345020332e366d6d2e, 'Cámara de seguridad', 39990, 36, 'camd7n.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_servicios`
--

CREATE TABLE `tbl_servicios` (
  `id_servicio` int(11) NOT NULL,
  `nom_servicio` varchar(100) NOT NULL,
  `desc_servicio` blob NOT NULL,
  `costo_servicio` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `clave` varchar(42) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `nombres`, `apellidos`, `username`, `clave`, `estado`) VALUES
(3, 'jorge', 'ruiz', 'user1', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  ADD PRIMARY KEY (`cod_producto`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`username`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_productos`
--
ALTER TABLE `tbl_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tbl_servicios`
--
ALTER TABLE `tbl_servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
