-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2017 a las 20:08:52
-- Versión del servidor: 10.1.22-MariaDB
-- Versión de PHP: 7.0.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Estructura de tabla para la tabla `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `application_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `application_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `application_url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `categoryap_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `application`
--

INSERT INTO `application` (`application_id`, `application_name`, `application_description`, `application_url`, `categoryap_id`) VALUES
(1, 'Profit', 'Lorem ipsum dolor sit amet, consectetur adipio', '#', 1),
(2, 'Correo', 'Lorem ipsum dolor sit amet, consectetur adipio', '#', 2),
(3, 'Profit', 'Ingresa a  Profit', '#', 1),
(4, 'Correo', 'Ingresa a tu correo Corporativo', '#', 2),
(5, 'Airshop', 'Ingresa a la Página web', '#', 3),
(6, 'Exotic', 'Página web', '#', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `application_category`
--

CREATE TABLE `application_category` (
  `categoryap_id` int(11) NOT NULL,
  `categoryap_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `categoryap_description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `application_category`
--

INSERT INTO `application_category` (`categoryap_id`, `categoryap_name`, `categoryap_description`) VALUES
(1, 'Aplicacion', 'aplicaciones, programas'),
(2, 'Correo', 'correo corporativo'),
(3, 'Pagina web', 'pagina web  de las marcas');

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
('yii2_see_home_group', '3', 1493302134),
('yii2_see_home_group', '5', 1495649714);

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
('yii2_example_group', 'permissionToUseContanctPage'),
('yii2_see_home_group', 'permissionToSeeHome');

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
-- Estructura de tabla para la tabla `business`
--

CREATE TABLE `business` (
  `business_id` int(11) NOT NULL,
  `business_rif` varchar(30) NOT NULL,
  `business_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mission_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `view_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `business`
--

INSERT INTO `business` (`business_id`, `business_rif`, `business_name`, `mission_description`, `view_description`) VALUES
(1, 'J-31257574-3', 'Grupo Dumit C.A', 'En Grupo Dumit, empresa perteneciente al sector Moda, operadora de las marcas: Carolina Herrera, Adolfo Dominguez, Bimba y Lola, Coach, Pronovias, Airshop ...', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `link`
--

CREATE TABLE `link` (
  `link_id` int(11) NOT NULL,
  `link_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `categoryli_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `link`
--

INSERT INTO `link` (`link_id`, `link_name`, `link_description`, `url`, `categoryli_id`) VALUES
(1, 'Banesco', 'Lorem ipsum dolor sit amet, consectetur adipio', 'http://www.banesco.com/', 1),
(2, 'Todoticket', 'Consulta el saldo de tus tarjetas', 'https://www.todoticket.com.ve/', 3),
(3, 'Banco Provincial', 'Ingresa a Provincial', 'http://www.provincial.com/', 1),
(4, 'Seguros  Mercantil', 'Ingresa a tu seguro aqui', 'www.segurosmercantil.com', 2),
(5, 'Seguros Universitas', 'Consulta tu seguro', 'www.segurosuniversitas.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `link_category`
--

CREATE TABLE `link_category` (
  `categoryli_id` int(11) NOT NULL,
  `categoryli_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `categoryli_description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `link_category`
--

INSERT INTO `link_category` (`categoryli_id`, `categoryli_name`, `categoryli_description`) VALUES
(1, 'Bancos', 'Páginas Bancos'),
(2, 'Seguros', 'Empresas de seguros'),
(3, 'Tickets Alimentación', 'Empresas de cestatickets');

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
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_channel` varchar(200) NOT NULL,
  `news_title` varchar(200) NOT NULL,
  `news_link` varchar(200) NOT NULL,
  `news_description` text NOT NULL,
  `categoryne_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`news_id`, `news_channel`, `news_title`, `news_link`, `news_description`, `categoryne_id`) VALUES
(1, 'CNN', 'Tecnologia', 'http://rss.cnn.com/rss/edition_technology.rss', 'Noticias tecnológica', 1),
(2, 'Xataka', 'Tecnología', 'http://www.xataka.com/atom.xml', 'Noticias de Tecnología', 1),
(4, 'ABC', 'Tecnología', 'http://www.abc.es/rss/feeds/abc_Tecnologia.xml', 'Noticias de tecnología', 1),
(8, 'Prueba', 'Prueba', 'http://www.fondosgratis.com.mx/archivos/rss.xml', 'Prueba', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_category`
--

CREATE TABLE `news_category` (
  `categoryne_id` int(11) NOT NULL,
  `categoryne_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `categoryne_description` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `news_category`
--

INSERT INTO `news_category` (`categoryne_id`, `categoryne_name`, `categoryne_description`) VALUES
(1, 'Tecnología', 'Noticias Tecnología'),
(2, 'Recursos Humanos', 'Noticias Recursos Humanos'),
(3, 'Interés', 'Noticias de interés'),
(4, 'Redes', 'noticias redes');

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
(2, 'lcamacho', '0fE5jIp_Zee5mlvqUYPzkvkKZHao9EyE', 0, 1492797681, 1497625676),
(3, 'fsilva', '4RLEk3q2TlzjeCSTciYV6ul-0VLJXdaz', 1, 1492802509, 1492802509),
(4, 'vgazcon', 'BBqTpyDzUhw0nTB3VuZzt99NMxPDsGOh', 1, 1493211033, 1493211033),
(5, 'ylopez', 'QZ16es8z1YBrRCluXa5lMDwj6S1YtT9B', 1, 1495649714, 1495649714);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `categoryap_id` (`categoryap_id`);

--
-- Indices de la tabla `application_category`
--
ALTER TABLE `application_category`
  ADD PRIMARY KEY (`categoryap_id`);

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
-- Indices de la tabla `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indices de la tabla `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `categoryli_id` (`categoryli_id`);

--
-- Indices de la tabla `link_category`
--
ALTER TABLE `link_category`
  ADD PRIMARY KEY (`categoryli_id`);

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
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `categoryne_id` (`categoryne_id`);

--
-- Indices de la tabla `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`categoryne_id`);

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
-- AUTO_INCREMENT de la tabla `application`
--
ALTER TABLE `application`
  MODIFY `application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `application_category`
--
ALTER TABLE `application_category`
  MODIFY `categoryap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `link`
--
ALTER TABLE `link`
  MODIFY `link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `link_category`
--
ALTER TABLE `link_category`
  MODIFY `categoryli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `news_category`
--
ALTER TABLE `news_category`
  MODIFY `categoryne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`categoryap_id`) REFERENCES `application_category` (`categoryap_id`);

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

--
-- Filtros para la tabla `link`
--
ALTER TABLE `link`
  ADD CONSTRAINT `link_ibfk_1` FOREIGN KEY (`categoryli_id`) REFERENCES `link_category` (`categoryli_id`);

--
-- Filtros para la tabla `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`categoryne_id`) REFERENCES `news_category` (`categoryne_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
