-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-05-2017 a las 11:49:29
-- Versión del servidor: 5.7.18-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `status`, `created_at`, `updated_at`, `email`, `password_hash`, `password_reset_token`) VALUES
(1, 'admin', 'zmvjCiyO9z6QcAVkmSu-M4wzfreyCd2k', 10, 1493148453, 1493148453, 'jmurillo@grudu.org', '$2y$13$zhgAVUBWY5c0IUPha5Lli.Mdgc.IwMfHOhpc/v.yNNm5ha.QniMve', NULL),
(2, 'jmurillo', 'uhYyJhWPWW4GNgUsfES14n3bePnvhwGe', 10, 1493148505, 1493148505, 'admin@admin.com', '$2y$13$8k7dFkplNzTrtAWaNl8zxOfcFal39iw5E22IJn6CLtacHBeNOhkmC', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('yii2_example_group', '1', 1494941701),
('yii2_example_group', '3', 1493302134),
('yii2_see_home_group', '1', 1494941701),
('yii2_see_home_group', '2', 1493302994),
('yii2_see_home_group', '3', 1493302134),
('yii2_see_home_group', '4', 1493304280);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1493232743, 1493232743),
('permissionDisplayDetailedAbout', 2, 'Permission to display detailed about informations', NULL, NULL, 1492787312, 1492787312),
('permissionToSeeHome', 2, 'Permission to use the home page', NULL, NULL, 1492787313, 1492787313),
('permissionToUseContanctPage', 2, 'Permission to use the contanct page', NULL, NULL, 1492787312, 1492787312),
('yii2_example_group', 1, NULL, NULL, NULL, 1492787312, 1492787312),
('yii2_see_home_group', 1, NULL, NULL, NULL, 1492787313, 1492787313);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('yii2_example_group', 'permissionDisplayDetailedAbout'),
('yii2_see_home_group', 'permissionToSeeHome'),
('yii2_example_group', 'permissionToUseContanctPage');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_auth_assignment`
--

CREATE TABLE `back_auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_auth_item`
--

CREATE TABLE `back_auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `back_auth_item`
--

INSERT INTO `back_auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1493232198, 1493232198);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_auth_item_child`
--

CREATE TABLE `back_auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `back_auth_rule`
--

CREATE TABLE `back_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1492785890),
('m140506_102106_rbac_init', 1492785894),
('m161220_101944_create_user_table', 1492786655);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration_rbac`
--

CREATE TABLE `migration_rbac` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `migration_rbac`
--

INSERT INTO `migration_rbac` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1493143971),
('m140506_102106_rbac_init', 1493144223);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `status`, `created_at`, `updated_at`) VALUES
(1, 'jmurillo', 'nDs3iQfHsHvYjjGRgkaT_GJzq5Ep1sbp', 1, 1492786835, 1492786835),
(2, 'lcamacho', '0fE5jIp_Zee5mlvqUYPzkvkKZHao9EyE', 1, 1492797681, 1492797681),
(3, 'fsilva', '4RLEk3q2TlzjeCSTciYV6ul-0VLJXdaz', 1, 1492802509, 1492802509),
(4, 'vgazcon', 'BBqTpyDzUhw0nTB3VuZzt99NMxPDsGOh', 1, 1493211033, 1493211033);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `back_auth_assignment`
--
ALTER TABLE `back_auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `back_auth_item`
--
ALTER TABLE `back_auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `back_auth_item_child`
--
ALTER TABLE `back_auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `back_auth_rule`
--
ALTER TABLE `back_auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `migration_rbac`
--
ALTER TABLE `migration_rbac`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `auth_key` (`auth_key`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `back_auth_assignment`
--
ALTER TABLE `back_auth_assignment`
  ADD CONSTRAINT `back_auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `back_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `back_auth_item`
--
ALTER TABLE `back_auth_item`
  ADD CONSTRAINT `back_auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `back_auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `back_auth_item_child`
--
ALTER TABLE `back_auth_item_child`
  ADD CONSTRAINT `back_auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `back_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `back_auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `back_auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
