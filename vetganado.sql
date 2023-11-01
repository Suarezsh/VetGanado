-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2023 a las 04:49:07
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vetganado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dosisvacunos`
--

CREATE TABLE `dosisvacunos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_vaca` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `dosis_cantidad` decimal(10,2) DEFAULT NULL,
  `dias_proxima_dosis` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `dosisvacunos`
--

INSERT INTO `dosisvacunos` (`id`, `id_usuario`, `id_vaca`, `fecha`, `descripcion`, `nombre_producto`, `dosis_cantidad`, `dias_proxima_dosis`, `observaciones`) VALUES
(1, 1, 1, '2023-09-10', 'rty', 'rtyu', '3456.00', 456, 'dfgh'),
(2, 1, 1, '2023-09-10', 'rty', 'rtyu', '3456.00', 456, 'dfgh'),
(3, 1, 1, '2023-09-10', 'rty', 'rtyu', '3456.00', 456, 'dfgh'),
(4, 1, 2, '2023-09-10', 'dfgh', 'dfty', '456.00', 45655, 'fvb'),
(5, 1, 4, '2023-09-10', 'inyeccion', 'mm', '100.00', 30, 'hdhhds'),
(6, 1, 5, '2023-09-11', 'purga', 'QQQQQ', '100.00', 30, 'ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `usuario`, `contraseña`) VALUES
(1, 'Suarez', 'suarez@example.com', 'suarez', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunos`
--

CREATE TABLE `vacunos` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `numero_identificacion` varchar(255) NOT NULL,
  `nombre_vacuno` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `raza` varchar(255) DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `padre` varchar(255) DEFAULT NULL,
  `madre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vacunos`
--

INSERT INTO `vacunos` (`id`, `id_usuario`, `numero_identificacion`, `nombre_vacuno`, `fecha_nacimiento`, `raza`, `sexo`, `padre`, `madre`) VALUES
(1, 1, '001', 'jb ', '2023-09-22', 'angus', 'hembra', 'k', 'ghj'),
(2, 1, '001', 'jb ', '2023-09-22', 'angus', 'hembra', 'k', 'ghj'),
(3, 1, '2134', 'jb m', '2023-09-02', 'jb bm', 'hembra', 'b j', 'b k'),
(4, 1, '33', 'h', '2023-09-07', 'bk', 'hembra', 'j', 'h'),
(5, 1, '578', 'Dina', '2022-02-04', 'angus', 'hembra', 'null', 'null');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dosisvacunos`
--
ALTER TABLE `dosisvacunos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vacunos`
--
ALTER TABLE `vacunos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dosisvacunos`
--
ALTER TABLE `dosisvacunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vacunos`
--
ALTER TABLE `vacunos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
