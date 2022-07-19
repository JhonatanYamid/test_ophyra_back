-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 19-07-2022 a las 06:33:21
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test_ophyra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_products`
--

DROP TABLE IF EXISTS `tbl_products`;
CREATE TABLE IF NOT EXISTS `tbl_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` int(11) NOT NULL,
  `description` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `title` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=76 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `price`, `description`, `title`, `image`) VALUES
(1, 1200, 'lorem ipsum dolor sit amet consectetur', 'producto 1', NULL),
(2, 5555, 'lorem ipsum dolor sit amet consectetur', 'producto 2', NULL),
(3, 3444, 'lorem ipsum dolor sit amet consectetur adipisicing elit', 'producto 3', NULL),
(75, 35, 'pp', 'prueba 1', 'images/62d64ebf9c0d0.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
