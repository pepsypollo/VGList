-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-06-2018 a las 09:59:55
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vgdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis`
--

CREATE TABLE `analisis` (
  `id` int(5) NOT NULL,
  `contenido` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_juego` int(5) NOT NULL,
  `id_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `n_cat` int(2) NOT NULL,
  `categoria` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`n_cat`, `categoria`) VALUES
(0, 'General');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

CREATE TABLE `juego` (
  `id` int(5) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicacion` date NOT NULL,
  `sinopsis` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_plat` int(3) NOT NULL,
  `imagen` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `juego`
--

INSERT INTO `juego` (`id`, `nombre`, `publicacion`, `sinopsis`, `id_plat`, `imagen`) VALUES
(1, 'Prueba', '2017-11-23', 'Sinopsis de prueba', 1, '/img/juego/default.png'),
(2, 'prueba', '2018-06-05', 'sdfdf', 1, '/img/juego/default.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `id_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_juego` int(5) NOT NULL,
  `favorito` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(10) NOT NULL,
  `contenido` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_post` int(5) NOT NULL,
  `id_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `contenido`, `id_post`, `id_user`) VALUES
(1, 'Hola que tal', 1, 'pepe'),
(2, 'Hola que tal', 1, 'paco'),
(6, 'asdasd', 1, 'paco'),
(8, 'xcv', 1, 'pepe'),
(9, 'dfgdfg', 1, 'pepe'),
(10, 'dfg', 4, 'pepe'),
(11, 'ccc', 5, 'pepe'),
(12, 'eee', 6, 'pepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(5) NOT NULL,
  `titulo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `contenido`, `imagen`, `id_usuario`) VALUES
(1, 'Prueba', 'Resize images with PHP, support PNG, JPG - Stack Overflow\r\nhttps://stackoverflow.com/.../resize-images-with-php-support-png...\r\nTraducir esta página\r\nfunction resize($newWidth, $targetFile, $originalFile) { $info ..... file */ $imgString = file_get_contents($file[\'tmp_name\']); /* create image from string */ $image ...\r\nphp - fixed width div, resizing text on the fly based on length ...\r\nhttps://stackoverflow.com/.../fixed-width-div-resizing-text-on-the-...\r\nTraducir esta página\r\n12 mar. 2010 - But the catch is, the length of the title string pulled from your MySQL database varies wildly. ... some standard font size, then resize until you get a reasonable width. ... I\'ve had some luck using a pretty simple approach in php', '/img/noticia/default.png', 'paco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `n_plat` int(3) NOT NULL,
  `plataforma` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`n_plat`, `plataforma`) VALUES
(0, 'Indefinido'),
(1, 'PS4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE `post` (
  `id` int(5) NOT NULL,
  `titulo` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `n_cat` int(2) NOT NULL,
  `id_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `titulo`, `n_cat`, `id_user`) VALUES
(1, 'Prueba', 0, 'pepe'),
(4, 'dfg', 0, 'pepe'),
(5, 'dfgdfg', 0, 'pepe'),
(6, 'sdf', 0, 'pepe');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_analisis`
--

CREATE TABLE `puntos_analisis` (
  `id_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_analisis` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_juego`
--

CREATE TABLE `puntos_juego` (
  `id_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_juego` int(5) NOT NULL,
  `puntuacion` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `puntos_juego`
--

INSERT INTO `puntos_juego` (`id_usuario`, `id_juego`, `puntuacion`) VALUES
('paco', 1, 5),
('paco', 2, 7),
('pepe', 1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntos_recomendacion`
--

CREATE TABLE `puntos_recomendacion` (
  `id_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_recomendacion` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recomendacion`
--

CREATE TABLE `recomendacion` (
  `id` int(5) NOT NULL,
  `contenido` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_juego` int(5) NOT NULL,
  `id_juego2` int(5) NOT NULL,
  `id_usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `img` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `allow` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`img`, `user`, `pass`, `email`, `allow`) VALUES
('/img/user/default.png', 'paco', 'user', 'paco@gmail.com', 1),
('/img/user/default.png', 'pepe', 'admin', 'pepe.esp.ort@gmail.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_juego` (`id_juego`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`n_cat`);

--
-- Indices de la tabla `juego`
--
ALTER TABLE `juego`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_plat` (`id_plat`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`id_usuario`,`id_juego`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`n_plat`);

--
-- Indices de la tabla `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `n_cat` (`n_cat`);

--
-- Indices de la tabla `puntos_analisis`
--
ALTER TABLE `puntos_analisis`
  ADD PRIMARY KEY (`id_usuario`,`id_analisis`),
  ADD KEY `id_analisis` (`id_analisis`);

--
-- Indices de la tabla `puntos_juego`
--
ALTER TABLE `puntos_juego`
  ADD PRIMARY KEY (`id_usuario`,`id_juego`),
  ADD KEY `id_juego` (`id_juego`);

--
-- Indices de la tabla `puntos_recomendacion`
--
ALTER TABLE `puntos_recomendacion`
  ADD PRIMARY KEY (`id_usuario`,`id_recomendacion`),
  ADD KEY `id_recomendacion` (`id_recomendacion`);

--
-- Indices de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_juego` (`id_juego`),
  ADD KEY `id_juego2` (`id_juego2`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `analisis`
--
ALTER TABLE `analisis`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `juego`
--
ALTER TABLE `juego`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `post`
--
ALTER TABLE `post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `analisis`
--
ALTER TABLE `analisis`
  ADD CONSTRAINT `analisis_ibfk_1` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id`),
  ADD CONSTRAINT `analisis_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`user`);

--
-- Filtros para la tabla `juego`
--
ALTER TABLE `juego`
  ADD CONSTRAINT `juego_ibfk_1` FOREIGN KEY (`id_plat`) REFERENCES `plataforma` (`n_plat`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`user`),
  ADD CONSTRAINT `lista_ibfk_2` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id`);

--
-- Filtros para la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD CONSTRAINT `mensaje_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`user`),
  ADD CONSTRAINT `mensaje_ibfk_3` FOREIGN KEY (`id_post`) REFERENCES `post` (`id`);

--
-- Filtros para la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD CONSTRAINT `noticias_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`user`);

--
-- Filtros para la tabla `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`user`),
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`n_cat`) REFERENCES `categoria` (`n_cat`);

--
-- Filtros para la tabla `puntos_analisis`
--
ALTER TABLE `puntos_analisis`
  ADD CONSTRAINT `puntos_analisis_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`user`),
  ADD CONSTRAINT `puntos_analisis_ibfk_2` FOREIGN KEY (`id_analisis`) REFERENCES `analisis` (`id`);

--
-- Filtros para la tabla `puntos_juego`
--
ALTER TABLE `puntos_juego`
  ADD CONSTRAINT `puntos_juego_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`user`),
  ADD CONSTRAINT `puntos_juego_ibfk_2` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id`);

--
-- Filtros para la tabla `puntos_recomendacion`
--
ALTER TABLE `puntos_recomendacion`
  ADD CONSTRAINT `puntos_recomendacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`user`),
  ADD CONSTRAINT `puntos_recomendacion_ibfk_2` FOREIGN KEY (`id_recomendacion`) REFERENCES `recomendacion` (`id`);

--
-- Filtros para la tabla `recomendacion`
--
ALTER TABLE `recomendacion`
  ADD CONSTRAINT `recomendacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`user`),
  ADD CONSTRAINT `recomendacion_ibfk_2` FOREIGN KEY (`id_juego`) REFERENCES `juego` (`id`),
  ADD CONSTRAINT `recomendacion_ibfk_3` FOREIGN KEY (`id_juego2`) REFERENCES `juego` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
