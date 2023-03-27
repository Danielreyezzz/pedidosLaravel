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

INSERT INTO users (nombre, apellidos, nick, email,  password,  fecha_nacimiento, avatar, fecha_alta, activo, intentos, control) 
VALUES 
  ('Juan', 'Pérez', 'juanp', 'juanperez@example.com',  '123456',  '1990-01-01', 'avatar1.jpg', '2022-03-01', 1, 0, 0.0),
  ('Ana', 'García', 'anag', 'anagarcia@example.com',  'abcdef',  '1995-05-15', 'avatar2.jpg', '2022-03-05', 1, 0, 0.0),
  ('Pedro', 'Martínez', 'pedrom', 'pedromartinez@example.com',  'qwerty',  '1985-12-25', 'avatar3.jpg', '2022-03-10', 0, 2, 1.5),
  ('María', 'Sánchez', 'marias', 'mariasanchez@example.com',  'zxcvbn',  '2000-06-30', 'avatar4.jpg', '2022-03-15', 1, 0, 3.14),
  ('Carlos', 'González', 'carlosg', 'carlosgonzalez@example.com',  '123abc',  '1998-09-12', 'avatar5.jpg', '2022-03-20', 0, 5, 2.0);

INSERT INTO administradors (usuario, nombre, contrasea, superadmin, productos, pedidos, almacen, reparto, activo) 
VALUES 
  ('admin@gmail.com', 'Administrador', '123456', 1, 1, 1, 1, 1, 1),
  ('johndoe@gmail.com', 'John Doe', 'abcdef', 0, 1, 1, 0, 0, 1),
  ('janedoe@gmail.com', 'Jane Doe', 'qwerty', 0, 1, 0, 1, 0, 0),
  ('jimmy@gmail.com', 'Jimmy Carter', 'password', 0, 0, 1, 0, 1, 1),
  ('sarah@gmail.com', 'Sarah Johnson', 'letmein', 0, 1, 0, 0, 1, 1);


INSERT INTO administrador_entradas (administrador_id, fecha, hora) 
VALUES 
  (1, '2023-03-27', '10:30:00'),
  (2, '2023-03-26', '15:45:00'),
  (3, '2023-03-28', '08:00:00'),
  (1, '2023-03-25', '12:00:00'),
  (4, '2023-03-27', '17:30:00');

  INSERT INTO user_direccions (nombre_direccion, nombre, direccion, cp, provincia, poblacion, telefono, detalle, principal, user_id) 
VALUES 
  ('Casa', 'Juan Pérez', 'Calle del Sol, 1', '28001', 'Madrid', 'Madrid', '910111213', 'Portal 2, 2ºD', 1, 1),
  ('Trabajo', 'María López', 'Avenida de la Libertad, 34', '46005', 'Valencia', 'Valencia', '960222334', 'Edificio Sigma, planta 4', 0, 2),
  ('Apartamento', 'Pedro García', 'Calle Mayor, 8', '50001', 'Zaragoza', 'Zaragoza', '976333444', 'Puerta 3', 0, 3),
  ('Vacaciones', 'Lucía Martínez', 'Calle de la Playa, 15', '29640', 'Málaga', 'Benalmádena', '952444555', 'Urbanización Solymar, bloque 2, 3ºA', 0, 4),
  ('Casa de campo', 'Manuel Sánchez', 'Camino de la Sierra, s/n', '18010', 'Granada', 'La Zubia', '958555666', 'Casa roja junto al olivo', 0, 5);


INSERT INTO pedidos (fecha_inicio, fecha_fin, estado, fecha_entregado, id_hora_entrega, fecha_entrega, direccion_id, administrador_id, user_id, id_pago)
VALUES 
('2023-03-25', '2023-03-26', 1, '2023-03-26', 1, '2023-03-27', 1, 1, 1, 1),
('2023-03-24', '2023-03-25', 2, NULL, 2, '2023-03-28', 2, 2, 2, 2),
('2023-03-23', '2023-03-24', 1, '2023-03-24', 1, '2023-03-27', 3, 3, 3, 1),
('2023-03-22', '2023-03-23', 2, NULL, 2, '2023-03-29', 1, 1, 2, 2),
('2023-03-21', '2023-03-22', 1, '2023-03-22', 3, '2023-03-26', 2, 2, 1, 1);


INSERT INTO `pedido_estados` (`pedido_id`, `estado`, `observacion`, `fecha`, `hora`) VALUES
(1, 1, 'Pedido recibido', '2023-03-25', '10:00:00'),
(1, 2, 'Pago recibido', '2023-03-26', '11:30:00'),
(1, 3, 'Pedido en proceso de preparación', '2023-03-26', '15:00:00'),
(2, 1, 'Pedido recibido', '2023-03-27', '09:00:00'),
(2, 2, 'Pago pendiente', '2023-03-27', '12:00:00');


