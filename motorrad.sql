-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-01-2024 a las 19:26:03
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `motorrad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motos`
--

CREATE TABLE `motos` (
  `id` int(11) NOT NULL,
  `año` varchar(10) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `potencia` varchar(50) NOT NULL,
  `cilindrada` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `precio` varchar(20) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `motos`
--

INSERT INTO `motos` (`id`, `año`, `modelo`, `potencia`, `cilindrada`, `tipo`, `precio`, `imagen`) VALUES
(1, '2024', 'C 400 GT', '34 cv', '350 cc', 'Scooter', '8290', 'img/c400x/cover-400x.webp'),
(2, '2024', 'C 400 X', '34 cv', '350 cc', 'Scooter', '7250', 'img/c400gt/cover-gt.webp'),
(3, '2023', 'CE 04', '42 cv', 'N.D', 'Scooter', '12930', 'img/ce04/cover_ce04.webp'),
(4, '2024', 'F 800 GS', '85 cv', '852 cc', 'Adventure', '11250', 'img/f800gs/cover-800-gs.webp'),
(5, '2023', 'F 850 GS Adventure', '95 cv', '853 cc', 'Adventure', '14130', 'img/f850gs_Adventure/cover-850-adv.webp'),
(6, '2024', 'F900 XR', '105 cv', '895 cc', 'Sport', '12920', 'img/f900xr_2024/cover-900xr.webp'),
(7, '2024', 'F 900 R', '105 cv', '895 cc', 'Roadster', '9720', 'img/f900r_2024/cover900r.webp'),
(8, '2024', 'G 310 GS', '34 cv', '313 cc', 'Adventure', '6900', 'img/g310gs_2024/cover-310gs.webp'),
(9, '2024', 'G 310 R', '34 cv', '313 cc', 'Roadster', '6050', 'img/g310r_2024/cover-rs.webp'),
(10, '2024', 'K 1600 B Bagger', '160 cv', '1649 cc', 'Touring', '30920', 'img/k1600b/cover-b.webp'),
(11, '2024', 'K 1600 GT', '158 cv', '1649 cc', 'Touring', '30620', 'img/k1600gt_2024/cover-gt.webp'),
(12, '2024', 'K 1600 GTL', '160 cv', '1649 cc', 'Touring', '31530', 'img/k1600gtl_2024/cover-gtl.webp'),
(13, '2023', 'M 1000 R', '210 cv', '999 cc', 'M', '25100', 'img/m1000r/cover-1000r.webp'),
(14, '2023', 'M 1000 RR', '210 cv', '999 cc', 'M', '25100', 'img/m1000rr/cover_m1000rr.webp'),
(15, '2023', 'R nineT', '109 cv', '1170 cc', 'Heritage', '13890', 'img/r-nine-t/cover-ninet.webp'),
(16, '2023', 'R nineT Scrambler', '109 cv', '1170 cc', 'Heritage', '15230', 'img/r-nine-t-scramber/cover-scramber.webp'),
(17, '2023', 'R NineT Urban G/S', '111 cv', '1170 cc', 'Heritage', '14640', 'img/r-nine-t_urban_gs/cover-urban.webp'),
(18, '2024', 'R 18 Classic', '95 cv', '1170 cc', 'Heritage', '21350', 'img/r18classic/cover-classic.webp'),
(19, '2024', 'R 18 B', '95 cv', '1170 cc', 'Heritage', '27300', 'img/r18b/cover-b_2.webp'),
(20, '2024', 'R 18 Transcontinental', '95 cv', '1170 cc', 'Heritage', '29595', 'img/r18transcontinent/cover-trans.webp'),
(21, '2024', 'R 18 Roctane', '95 cv', '1170 cc', 'Heritage', '27300', 'img/r18roctane/cover-roctane.webp'),
(22, '2023', 'R 1250 GS', '136 cv', '1254 cc', 'Adventure', '19880', 'img/r1250gs/cover-1250-gs.webp'),
(23, '2024', 'R 1250 GS Adventure', '136 cv', '1254 cc', 'Adventure', '22560', 'img/r1250gs-adventure/cover-adventure.webp'),
(24, '2023', 'R 1250 R', '136 cv', '1254 cc', 'Roadster', '16270', 'img/r1250r/cover-r1250r.webp'),
(25, '2024', 'R 1250 RT', '136 cv', '1254 cc', 'Touring', '23800', 'img/r1250rt/cover-r1250rt.webp'),
(26, '2023', 'R 1250 RS', '136 cv', '1254 cc', 'Sport', '16990', 'img/r1250rs/cover_r1250rs.webp'),
(27, '2023', 'R 1300 GS', '145 cv', '1300 cc', 'Adventure', '21290', 'img/r1300gs/cover_r1300gs.webp'),
(28, '2023', 'S 1000 R', '165 cv', '999 cc', 'Roadster', '17420', 'img/s1000r/cover_s1000r.webp'),
(29, '2023', 'S 1000 RR', '210 cv', '999 cc', 'Sport', '23700', 'img/s1000rr/cover_s1000rr.webp'),
(30, '2024', 'S 1000 XR', '170 cv', '999 cc', 'Sport', '22249', 'img/s1000xr/cover_s1000xr.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `correo` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contrasenya` varchar(255) NOT NULL,
  `comentario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `fecha_nacimiento`, `correo`, `telefono`, `contrasenya`, `comentario`) VALUES
(25, 'Ezequiel', 'Macchi', '0000-00-00', 'macchiezequiel@gmail.com', '', '$2y$10$Rr7XmaTWbBlyqJK42pMZ4eFMbMrd94/9E6MV7bxBgHpggjXhe7oJC', ''),
(26, 'Ezequiel', 'Ma', '0000-00-00', 'macchi_eo@hotmail.com', '', '$2y$10$ki6NWABUt0.Yej0w.0fUH.ajWxw.i9Syffxrd9tfbGomWdHGnVeka', ''),
(27, 'Ezequiel', 'Ma', '0000-00-00', 'macchi_eo@hotmail.com', '', '$2y$10$KSx9T3RB3oLrCR81An5hn.GCFLOSHfUOklJczVH..VwLrKM/wOgFm', ''),
(28, 'Ezequiel', 'Ma', '0000-00-00', 'macchi_eo@hotmail.com', '', '$2y$10$bOWqFaZDOs/TAhgWaqxUz.Lvv83dj9ai4rjI15JU9uxpuCps7uqoG', ''),
(29, 'Ezequiel', 'Macchi', '0000-00-00', 'macchi_eo@hotmail.com', '', '$2y$10$0rimHUZQJLatkjau5aazUOWN4wWCbJrkmtnGZX3B035x5lGyWs.VG', ''),
(30, 'Fran', 'Macchi', '0000-00-00', 'macchiezequiel@hotmail.com', '', '$2y$10$vAsxZPqDJDzi4LqAh1oBbeyMM0xPZaZykPh5X0FErg1MBCpXvDI1i', ''),
(31, 'Erik', 'Macchi', '2024-01-11', 'macchiezequiel@hotmail.com', '', '$2y$10$vU83Ayv187BO8yba08afs.TQLsSh7W2NTEJznrPZoQ7KYxvNCb.ZC', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `motos`
--
ALTER TABLE `motos`
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
-- AUTO_INCREMENT de la tabla `motos`
--
ALTER TABLE `motos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
