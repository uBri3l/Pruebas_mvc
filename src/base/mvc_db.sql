-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 25-04-2026 a las 00:55:43
-- Versión del servidor: 10.6.25-MariaDB-ubu2204
-- Versión de PHP: 8.0.27

-- Eliminar base de datos si ya existe
DROP DATABASE IF EXISTS mvc_db;

-- Crear base de datos
CREATE DATABASE mvc_db;
USE mvc_db;

DROP TABLE IF EXISTS usuarios;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `rol` varchar(45) DEFAULT NULL,
  `creado_en` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `rol`, `creado_en`) VALUES
(1, 'Leandro Sanchez', 'sanchezleandrito@yahoo.com', 'Usuario', '2026-04-25 00:51:38'),
(2, 'Esteban Quito', 'kitikito23@gmail.com', 'Admin', '2026-04-24 20:19:08'),
(3, 'Gabriel Cantera', 'gabrielucaturu@gmail.com', 'Admin', '2026-04-25 00:51:27'),
(4, 'Joaquin Taborda', 'joacotaborda@gmail.com', 'Usuario', '2026-04-24 00:20:42'),
(5, 'Hermenegildo Herrera', 'supremacia23@gmail.com', 'Tester', '2026-04-25 00:23:42'),
(6, 'Sebastian Fegundez', 'sebitafefe@outlook.com', 'Gestor de Base de Datos', '2026-04-25 00:52:14');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
