-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 16-02-2026 a las 14:34:20
-- Versión del servidor: 8.0.42
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebamvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambientes`
--

CREATE TABLE `ambientes` (
  `id` int NOT NULL,
  `ambientesnombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipoambientes` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `observaciones` varchar(270) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ambientes`
--

INSERT INTO `ambientes` (`id`, `ambientesnombre`, `tipoambientes`, `observaciones`) VALUES
(1, '201', 'Taller', 'ninguna'),
(2, '201', 'Taller', 'Aire dañado'),
(4, '201', 'Taller', 'Ninguna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `intentos` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `intentos`) VALUES
(13, 'Karen', 'Karen@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC', 0),
(40, 'Carlos', 'carlos@gmail.com', '$2a$07$asxx54ahjppf45sd87a5aujJpdTLqZR2T/0QGF4A.k/NKJuuv2OYe', 0),
(46, 'Alejandra', 'alejandra@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC', 0),
(47, 'Juana', 'juana@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC', 0),
(48, 'Daniela', 'daniela@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC', 0),
(49, 'Palma', 'palma@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC', 0),
(50, 'David', 'David@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC', 0),
(51, 'Jose', 'Jose@gmail.com', '$2a$07$asxx54ahjppf45sd87a5auxX9WRmhYe69XMj9LGnOrtdmXpAu0ufC', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambientes`
--
ALTER TABLE `ambientes`
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
-- AUTO_INCREMENT de la tabla `ambientes`
--
ALTER TABLE `ambientes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
