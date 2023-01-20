-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-01-2023 a las 00:04:07
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `scsaaij-mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id` int(11) NOT NULL,
  `solicitante` varchar(100) NOT NULL,
  `sede` varchar(50) NOT NULL,
  `area` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `anydesk` varchar(2) NOT NULL,
  `fechaSoli` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`id`, `solicitante`, `sede`, `area`, `descripcion`, `anydesk`, `fechaSoli`, `status`) VALUES
(1, 'alexa guxman flores', 'cuautla', 'recursos humanos', 'el equipo numero 10 no enciende', 'SI', '2023-01-20 13:53:53', 0),
(2, 'alejandro soto dominguez', 'cuautla', 'recursos humanos', 'el equipo no enciende', 'SI', '2023-01-20 23:26:46', 1),
(3, 'pedro perez perez', 'cuautla', 'recursos humanos', 'el equipo enciende pero solo muestra una pantalla azul', 'SI', '2023-01-20 17:03:01', 2);

--
-- Disparadores `asistencias`
--
DELIMITER $$
CREATE TRIGGER `completar_after_update` AFTER UPDATE ON `asistencias` FOR EACH ROW BEGIN  
 IF NEW.status = 0 THEN
 INSERT INTO historial (idHistorial,idAsistencia)
 VALUES (New.id,NEW.id);
 END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `idHistorial` int(11) NOT NULL,
  `descripcionEquipo` varchar(255) NOT NULL,
  `inventario` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `numeroSerie` varchar(50) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `descripcionDictamen` text NOT NULL,
  `asistente` varchar(100) NOT NULL,
  `idAsistencia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `historial`
--

INSERT INTO `historial` (`idHistorial`, `descripcionEquipo`, `inventario`, `modelo`, `numeroSerie`, `marca`, `descripcionDictamen`, `asistente`, `idAsistencia`) VALUES
(1, '', '', '', '', '', '', '', 1),
(3, 'laptop color negra', '1', 'pavilion 2020', 'ASD-123', 'HP', 'Se realizo mantenimiento preventivo y correctivo al equipo, posteriormente se encendio y funciono sin problemas', 'Marcos Morales Pastrana', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsr` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apePat` varchar(50) NOT NULL,
  `apeMat` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `nomUsr` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsr`, `nombre`, `apePat`, `apeMat`, `telefono`, `nomUsr`, `password`, `tipo`, `status`) VALUES
(1, 'Pablo Antonio', 'Vergara', 'Escandon', '7351331097', 'pablovergara', '0179befe0458f9aeb5b74b20634a51fc8966f59e21348ab21e8d3271b68f4ceb', 'Administrador', 1),
(2, 'Andrea', 'Soto', 'Dominguez', '7351331097', 'andreasoto', '06f84548db44af40d52788768652b79315e397b3e5bff22a6edac795e2a86395', 'Pasante', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`idHistorial`),
  ADD KEY `foreign_key_idAsistencia` (`idAsistencia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `historial`
--
ALTER TABLE `historial`
  ADD CONSTRAINT `foreign_key_idAsistencia` FOREIGN KEY (`idAsistencia`) REFERENCES `asistencias` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
