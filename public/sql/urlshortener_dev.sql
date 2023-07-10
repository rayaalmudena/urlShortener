-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-07-2023 a las 19:57:02
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `urlshortener_dev`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `url_shortener`
--

CREATE TABLE `url_shortener` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `string` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `custom_alias` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `url_shortener_analitics`
--

CREATE TABLE `url_shortener_analitics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url_shortener_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `url_shortener`
--
ALTER TABLE `url_shortener`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_shortener_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `url_shortener_analitics`
--
ALTER TABLE `url_shortener_analitics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url_shortener_analitics_url_shortener_id_foreign` (`url_shortener_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `url_shortener`
--
ALTER TABLE `url_shortener`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `url_shortener_analitics`
--
ALTER TABLE `url_shortener_analitics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `url_shortener`
--
ALTER TABLE `url_shortener`
  ADD CONSTRAINT `url_shortener_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `url_shortener_analitics`
--
ALTER TABLE `url_shortener_analitics`
  ADD CONSTRAINT `url_shortener_analitics_url_shortener_id_foreign` FOREIGN KEY (`url_shortener_id`) REFERENCES `url_shortener` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
