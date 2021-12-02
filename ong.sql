-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2021 a las 17:26:59
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ong`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socios`
--

CREATE TABLE `socios` (
  `nombre` text COLLATE ucs2_spanish2_ci NOT NULL,
  `apellidos` text COLLATE ucs2_spanish2_ci NOT NULL,
  `dni` text COLLATE ucs2_spanish2_ci NOT NULL,
  `domicilio` text COLLATE ucs2_spanish2_ci NOT NULL,
  `edad` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `socios`
--

INSERT INTO `socios` (`nombre`, `apellidos`, `dni`, `domicilio`, `edad`) VALUES
('cd', '', '', '', 0),
('alex', 'Pernas', '24323242', 'Calle Toro n22', 37),
('Antón', 'Salas', '1234', '12345678', 22),
('', '', '', '', 0),
('pepe', 'trillo', '32165498I', 'Av. agua, num.3', 45);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
