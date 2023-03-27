-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 212.227.168.122:3306
-- Tiempo de generación: 26-03-2023 a las 23:21:26
-- Versión del servidor: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin_qmado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `id_administrador` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf32 COLLATE utf32_spanish2_ci NOT NULL,
  `contrasea` varchar(20) NOT NULL,
  `superadmin` int(11) NOT NULL,
  `productos` int(11) NOT NULL,
  `pedidos` int(11) NOT NULL,
  `almacen` int(11) NOT NULL,
  `reparto` int(11) NOT NULL,
  `activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores_entradas`
--

CREATE TABLE `administradores_entradas` (
  `id_hora` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `estado` int(11) NOT NULL COMMENT '0 Iniciado; 1 Finalizado; 2 Entregado; 3 Cancelado; 5 Preparado; 6 En reparto',
  `fecha_entregado` date NOT NULL,
  `id_hora_entrega` int(11) NOT NULL,
  `fecha_entrega` date NOT NULL,
  `id_direccion` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `id_repartidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_estados`
--

CREATE TABLE `pedidos_estados` (
  `id_estado` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `estado` int(11) NOT NULL COMMENT '1 Finalizado; 2 Entragado; 3 Cancelado; 4 Modificado; 5 Preparado; 6 En reparto',
  `observacion` longtext CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(70) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidos` varchar(150) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `nick` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
... (92 líneas restantes)
)




