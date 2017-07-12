-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2017 a las 22:48:34
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
(4, 'ABC', 'Tecnología', 'http://www.abc.es/rss/feeds/abc_Tecnologia.xml', 'Noticias de tecnología', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_business`
--

CREATE TABLE `news_business` (
  `nbusiness_id` int(11) NOT NULL,
  `nbusiness_title` varchar(200) NOT NULL,
  `nbusiness_description` text NOT NULL,
  `nbusiness_image` varchar(100) NOT NULL,
  `nbusiness_date` date NOT NULL,
  `categoryne_id` int(11) NOT NULL,
  `nbusiness_active` smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `news_business`
--

INSERT INTO `news_business` (`nbusiness_id`, `nbusiness_title`, `nbusiness_description`, `nbusiness_image`, `nbusiness_date`, `categoryne_id`, `nbusiness_active`) VALUES
(1, 'Beneficio de Guarderia', 'Todos aquellos empleados cuyo salarios sea menor a Bs. 325.000,00 mensuales\r\ny tengan hijos en edades comprendidas entre los 3 meses y 5 años y 11 meses ;\r\ntendrán acceso al Beneficio del pago de Guardería; el cual consta de un 40% del\r\nSalario Mínimo Vigente; para esto tendrás que:\r\n• Entregar Acta de Nacimiento de tu Hijo\r\n• Carta de no otorgación del Beneficio de parte del trabajo del padre o de la madre\r\ndel niño (según sea el caso)\r\n• Registro mercantil de la Guardería\r\n• Inscripción ante el Ministerio de Educación de la Guardería\r\n• RIF de la Guardería\r\nCon estos documentos puedes pasar\r\npor la Coordinación de\r\nCompensación y Beneficios con la\r\nSrta. Leydy Delgado a formalizar el\r\nexpediente y en donde recibirás los\r\npróximos pasos a seguir.', 'uploads/Beneficio de Guarderia.jpg', '2017-07-06', 2, 1),
(2, 'prueba', 'prueba', 'uploads/prueba.jpg', '2017-07-06', 2, 1),
(4, 'prueba3', 'prueba3', 'uploads/prueba3.jpg', '2017-07-06', 2, 1),
(5, 'PRUEBA4', 'PRUEBA4', 'uploads/PRUEBA4.jpg', '2017-07-06', 2, 1),
(6, 'prueba5', 'prueba5', 'uploads/prueba5.jpg', '2017-07-06', 2, 1),
(7, 'prueba6', 'prueba6', 'uploads/prueba6.jpg', '2017-07-07', 2, 1);

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
(5, 'ylopez', 'QZ16es8z1YBrRCluXa5lMDwj6S1YtT9B', 1, 1495649714, 1495649714),
(6, 'Invitado', 'au3a87ZWsRzMKDXJiHmGgbs-Sp-RABBp', 0, 1499112670, 1499112670),
(7, 'ebarrios', 'qlSVgdHPhaMnVrHhbJThb-KMVSdSsW7e', 1, 1499112670, 1499112670),
(8, 'jfranco', 'S6e2VNnZnVN-J7G7K5JD1P6HPzYLwAFK', 1, 1499112671, 1499112671),
(9, 'dzapata', '3MSiCL4Jt8HyuYgDBmimQckE5LKe_IJd', 1, 1499112671, 1499112671),
(10, 'lmontiel', 'MQ2ia-57cXYksRSLvYnSik1ar_1SobEA', 1, 1499112671, 1499112671),
(11, 'GDCONFER', '86xMIzcDo0Gdl-gQzsnHBUfda8qN89zK', 1, 1499112671, 1499112671),
(12, 'imarquez', '0rynie2gzxQ4YU9gc0c696BqzAf3CWRB', 1, 1499112671, 1499112671),
(13, 'ligonzalez', 'p3VX07As9Zggo5AK6iTmiY5yj4nbNpdF', 1, 1499112671, 1499112671),
(14, 'getback', '6LU9llhirXjXhV9VeYaNASmGH5-4_H7b', 1, 1499112671, 1499112671),
(15, 'eramirez', 'j6JFyJg6-YOYJGAdJ8bvqWZe9Q7Wwix8', 1, 1499112671, 1499112671),
(16, 'tdoumet', 'R6jmxSNhJUkppkflKGzX0-t6UbCKQHIT', 1, 1499112671, 1499112671),
(17, 'ypatino', 'lszrT0sgO6UsYZE1zlzpGF4yeIF7yPqG', 1, 1499112671, 1499112671),
(18, 'farriojas', '9VWZolTCMRK3EUL1RuKcM_UlV3apQR2L', 1, 1499112671, 1499112671),
(19, 'ychirinos', 'T6wICbbOn11k3W-i5tCPYmkthfoxiGM1', 1, 1499112671, 1499112671),
(20, 'xin.mgtaca', 'IEKqH_hvfNnDcKfzbT_9euRBh5o3pABV', 1, 1499112671, 1499112671),
(21, 'xin.tolon', '2D42W8RRz775cM89XHregVXJs_tK6p4B', 1, 1499112671, 1499112671),
(22, 'arojas', 'YLgvPawP8titzaBfFMM5WkpFumISJpPK', 1, 1499112671, 1499112671),
(23, 'pmarcano', 'KpnyumYMGlnUbfUQ1UTyHUQ7oHujs0JL', 1, 1499112671, 1499112671),
(24, 'dbastidas', '7sYoETyQyxuB-DC8qR0N69EQL9RCFK5C', 1, 1499112671, 1499112671),
(25, 'vst.hatillo', '_KVx6sKTzuFrLL88Brc25SgySrPERbNJ', 1, 1499112671, 1499112671),
(26, 'vvismara', 'WjXiLdC7rGLzf8PQDNFbfB-q1xtT3pE0', 1, 1499112671, 1499112671),
(27, 'vst.liderdamas', 'm0iToL5Zu4p-182tz69SOElF3nD5HS9E', 1, 1499112671, 1499112671),
(28, 'vst.lidercaballeros', 'lFwxyDI6aXnmIRJhrxanWyuh0hIbGFJk', 1, 1499112671, 1499112671),
(29, 'oguevara', 'jJQsGzZDpggf99wArp_icox744nCBS-m', 1, 1499112671, 1499112671),
(30, 'aishopccct', '1uCE7UL3JUiwNlG7YvJsBqonXcC-SZ81', 1, 1499112671, 1499112671),
(31, 'afigueroa', 'hsmwTIPznQUXFzzH9oEQa6Oj7Iuc-CeZ', 1, 1499112671, 1499112671),
(32, 'aislido', 'i5TYpSFyvWGkLpoIdzacHdcUPVrxZOXX', 1, 1499112671, 1499112671),
(33, 'xin.ccct', 'MGsRzaM7eoZLDQG3xsYHjk0HrsYNnBob', 1, 1499112671, 1499112671),
(34, 'elopez', 'evSqtZWvfP6z3zIa8cVSEbmjalnAmPZZ', 1, 1499112671, 1499112671),
(35, 'recepcionpb01', 'Z74RksCKhYskTxr-iYImQGfRQscyy1Ga', 1, 1499112671, 1499112671),
(36, 'ICG18', 'Q4A6lSXKWCg4gykTSYWTwWL9PZGomBRz', 1, 1499112671, 1499112671),
(37, 'icg19', 'FV7sYZ4n53xd3nWfZ-ctQ4vTqpLOehXg', 0, 1499112672, 1499112672),
(38, 'ICG20', 'LoRp9D7jfhgTGZAbPSpnSe5vka8mD6eH', 0, 1499112672, 1499112672),
(39, 'mcaldeira', 'xsHYieXiRrzhNDIAR9HnMpSQ9-SfnO_w', 1, 1499112672, 1499112672),
(40, 'rcelis', '39SCn3kQ-6j5bgwj_WDFQxrL7l8MjzF7', 1, 1499112672, 1499112672),
(41, 'amoncada', 's0MpMeMglxunTJwzOF81vwx-u83y67_u', 1, 1499112672, 1499112672),
(42, 'krbtgt', 'hbYjh0I3USnucAsvYfD_Pc1L9SQNEy9-', 0, 1499112672, 1499112672),
(43, 'SUPPORT_388945a0', 'XJl_tOildYSnuwnvijMBuYFVQvXbw0RL', 0, 1499112672, 1499112672),
(44, 'IWAM_GDPROFIT', 'cw9prLeaGeGxepRxAgH4EDS5FSyRqkeR', 1, 1499112672, 1499112672),
(45, 'recepcionpb02', 'pzdDBXv2puQ2VoNJPzTK0ox6fkJlKL8j', 1, 1499112672, 1499112672),
(46, 'zortega', 'ld5A8BoSHdnEyDuc1OwW7V7-yI0Y7Ywr', 1, 1499112672, 1499112672),
(47, 'xin.samccs', 'aLumItRQHCoWGobwjZVgEzhk6aFYKHr2', 1, 1499112672, 1499112672),
(48, 'yizquiel', 'gVMVIyhtVh3WPZAtyQL8Wi03UP10dHYu', 1, 1499112672, 1499112672),
(49, 'mvelasquez', 'vsgmWZx2sOXY0fxDyGzKSWl1wbLfgx2g', 1, 1499112672, 1499112672),
(50, 'recepcion02', 'xZfxdO_FCrdgl5H3SjULOD9tM3rgh65A', 1, 1499112672, 1499112672),
(51, 'Recepcion', 'nCPEIkzBtKfuZ7o6Qq7hMJbG7WhVphYF', 1, 1499112672, 1499112672),
(52, 'saghandour', 'rF_AdNVZVNUnGTJ3aFQkKGNgxt7Omxv5', 1, 1499112672, 1499112672),
(53, 'ytorres', '73vpR8VVtmz50ugYVG1o_BhwEbcrVsKf', 1, 1499112672, 1499112672),
(54, 'areitich', 'rGgpxCYWu4a65XohIJoNJR9FAH2KUcPs', 1, 1499112672, 1499112672),
(55, 'vst.ccct', 'D36KCgqN2CsVfIG23VR6UxfiP62X3gdT', 1, 1499112672, 1499112672),
(56, 'vst.samccs', 'Pg0QsxKFRFwPBnFQoJGGunAE5dhPtj1S', 1, 1499112672, 1499112672),
(57, 'vst.tolon', '78CRpqM4G6Qyq9MP4_rlZTD_Q3iblqkP', 1, 1499112672, 1499112672),
(58, 'vst.mgtaca', 'H0K0qvocjfT5-51YaOkOi766f5e0dHHz', 1, 1499112672, 1499112672),
(59, 'vst.millenium', '6Mmh0x_rrFiQFkgeGL2DkBQVEonT7siq', 1, 1499112672, 1499112672),
(60, 'khernandez', 'qSDk59UtlJXnFLyT8Qm3uq0GKTdV_j9u', 1, 1499112672, 1499112672),
(61, 'xin.lider', 'HnBOu3QaFQiHFACqKguMhH5DxpHU0RJR', 1, 1499112672, 1499112672),
(62, 'mjimenez', 'pNU19ZmayCi0gqQ-X0uANXx1f_jX2AiR', 1, 1499112672, 1499112672),
(63, 'operez', 'TVkIpETW-S_f3JehUFPYwDhHf7FLyDz7', 1, 1499112672, 1499112672),
(64, 'apaiva', 'pmMZk8mbxvicM-MFEW_wirW1D1Ypht1p', 1, 1499112672, 1499112672),
(65, 'abonaldy', '477YU2bTQJHs1xa49_7h0ombCsStiaf8', 1, 1499112672, 1499112672),
(66, 'pcasique', 'VXjtCpS2dk4Ht2bsCLZK6f0PEK9rl5aq', 1, 1499112672, 1499112672),
(67, 'ghernandez', 'DsBVzFydA7efRDB7MvSCGasWRFg6yLoJ', 1, 1499112672, 1499112672),
(68, 'svasquez', 'Vtrvw-oGZZZdrZEwEfspz2AAajnJiItg', 1, 1499112672, 1499112672),
(69, 'gpabon', '8MvqBrM9gx33mlyzg_H-opumnX-DY15q', 1, 1499112672, 1499112672),
(70, 'avielma', 'DCoCDhb2HxfThgkmZ4cSnqZflCj_8jFK', 1, 1499112672, 1499112672),
(71, 'ediaz', '_vaF7vnTh4yovBaBfnOQTfRAXAXfpiMd', 1, 1499112672, 1499112672),
(72, 'ysubieta', '2YkWrzCfzg8LLQp96-bfKWwDZBus1tD6', 1, 1499112672, 1499112672),
(73, 'mvillanueva', 'nTjxXJ6Kdc2LfeG7D7wxV0-EmwWQkLmV', 1, 1499112673, 1499112673),
(74, 'calvarez', 'etCEiMfwJH_Pq8NRUshKpUFqrQkCKzi0', 1, 1499112673, 1499112673),
(75, 'sramirez', 'vf-Uf1f8GgCay7DfUIOuu4KBOic1RdtX', 1, 1499112673, 1499112673),
(76, 'lgarcia', 'jI0jKWBxdHtAO_OLJHkNkO7CKZ-_vSIL', 1, 1499112673, 1499112673),
(77, 'emesa', '7L3MK3hajqQEnfnqU2BHbw3j_Ifwwx4C', 1, 1499112673, 1499112673),
(78, 'gsorrentino', 'c2E2QeclN2BAc1JCh7Bhe2Prf1xWz062', 1, 1499112673, 1499112673),
(79, 'jKiss', 'Lo1DltuizlJEewj5sbh8sc56-Kp0KZh5', 1, 1499112673, 1499112673),
(80, 'kchacon', 'PQlCtpP9zlWrCcJzvJCljhhvu7GyY9LO', 1, 1499112673, 1499112673),
(81, 'eblanco', 'Caq8YoOyRCWebhsRaLoYjLIcnKjgzo31', 1, 1499112673, 1499112673),
(82, 'ehernandez', '5wIYRqNz7BaZutOpMmr8iqoOhWS380H4', 0, 1499112673, 1499112673),
(83, 'ndsantos', 'wb-Pssx3Opv1COXLRzIyzflTMLoT4ZHE', 1, 1499112673, 1499112673),
(84, 'ygarcia', 'xt0skmx9RtEVay-x8NIAh7-Lbiaidinq', 1, 1499112673, 1499112673),
(85, 'eperalta', 'lnalKJhUVxnIdNQqvQyNiDjmgmwyvjq7', 1, 1499112673, 1499112673),
(86, 'abatatina', 'bO9QX8u6GcLDqG2PNQN_KmAdGQO93L3f', 1, 1499112673, 1499112673),
(87, 'juzcategui', 'Fw_0MwkG8lD973R1P7rrrvI5ECkW2evT', 1, 1499112673, 1499112673),
(88, 'addiaz', 'oBT6cQpr1-DwqRC6hxFnFGIiY9AUoOon', 1, 1499112673, 1499112673),
(89, 'cmartinez', 'XSdBY3psfHkD7UlfNJrFyaLJBuK4_NSk', 1, 1499112673, 1499112673),
(90, 'ymelo', 'ymvaOZTzuizhzFC2hEIhsQuaRYJV-xfu', 1, 1499112673, 1499112673),
(91, 'aissagd', 'zw1AhFAS7TCM_oNKrI-1Rkg_ShF1YSbc', 1, 1499112673, 1499112673),
(92, 'agarcia', 'qVvBMhVLY9YIEH_BP4hJWfpZhb80DdzO', 0, 1499112673, 1499112673),
(93, 'aiscab', 'gH8GeijsLcizEA8TaeF7_gkQHgMh9YNS', 1, 1499112673, 1499112673),
(94, 'aalvarado', '9-zmqyxr0ynDw-WLn0MGdBJH3y-hzkLX', 0, 1499112673, 1499112673),
(95, 'lrequena', 'erfppikf9MwB4kXCRVKYGSEdGlTxc10V', 1, 1499112673, 1499112673),
(96, 'capacitacion', 'Olebz6H94XZgxCQqAL6kCZBpceQ2nlYY', 1, 1499112673, 1499112673),
(97, 'ybriceño', 'JIUE2DeRLo4fDf573PG3KNk5KAusAi9L', 1, 1499112673, 1499112673),
(98, 'ngoncalves', 'Ox4mPxJeYAHQBl9D8PSoOu8T5Ww2hjM7', 0, 1499112673, 1499112673),
(99, 'kgonzalez', 'jtc2DIsWhniJWjI1T7DnNfK3L0Ip0gfq', 1, 1499112673, 1499112673),
(100, 'sgomez', 'p-a9HAAHDlIMMY0BRKbZfeYiwAH5wrct', 1, 1499112673, 1499112673),
(101, 'ralves', 'X_xQ0TvnGM0KLb0TxMQqGzZ_DOcgF0pD', 1, 1499112673, 1499112673),
(102, 'varevalo', 'rnrIYOGxdlnWhLsGSDLVK2wm_O8YVb3B', 1, 1499112673, 1499112673),
(103, 'cguzman', 'ZcbIx6krd3FhqDQdCWoUpXdoiUUZugCP', 1, 1499112673, 1499112673),
(104, 'yrivas', '6dSWNaTME5n6AQx_xcCXf57f5FmSDTdF', 1, 1499112673, 1499112673),
(105, 'rserpa', 'Bg0FPq9zcMbk5ohn1_lGyfI2RkzmYE1d', 1, 1499112673, 1499112673),
(106, 'esanabria', 'ivKIHbJwJ0c1T3qnwR7YudUOsuOZrAib', 1, 1499112673, 1499112673),
(107, 'dleal', 'Y5KKM5blUPYvHqAg3PFO6xba9pZGLXnu', 1, 1499112673, 1499112673),
(108, 'ablanco', 'SBsaIV8cdZDekUAJwYKwNPnJvMcqmaRw', 1, 1499112673, 1499112673),
(109, 'lrojas', 'Podz5bnXLfdcUxSy1Pt5a_FvjR0Y027U', 1, 1499112673, 1499112673),
(110, 'hmoreno', '5HhMDXZ_a12nqnkB6lrBRglp9bMLSYGt', 1, 1499112673, 1499112673),
(111, 'kortuno', 'rTzwiexmJiA9q5LGmR9mK-YB8M6VjpUt', 1, 1499112673, 1499112673),
(112, 'druiz', '1NgAAvy4JkBSLd59TtO9jP5ICFS6_qan', 1, 1499112673, 1499112673),
(113, 'cguereguan', '4HtBaWl_1pIzVYNbCTf6Bg-Wbh2Pb1hA', 1, 1499112673, 1499112673),
(114, 'rmontero', '0CxOJX9xdlba4V_g7uNjppPifE-i6-Zo', 1, 1499112674, 1499112674),
(115, 'mapamate', 'iGu0jeY17lTlD2lOEf_kuWap7QkEpVkn', 1, 1499112674, 1499112674),
(116, 'adiaz', 'GJYtte2FNrUjhFZNSNtDjauIZFBYOOMU', 1, 1499112674, 1499112674),
(117, 'IUSR_GDPROFIT', '5OfHBWIbpMglq4BfsvldRZEJHZLSe3LL', 1, 1499112674, 1499112674),
(118, 'Omendez', '2l6gHQUchLY8ljcq1P233odKxWbOMUhb', 1, 1499112674, 1499112674),
(119, 'Naifmillenium', 'Z03PZC7S67q5O8zw5md6B05SkJWrBV_H', 1, 1499112674, 1499112674),
(120, 'Orinok', '5U3poFgYINj-JfF1EOC69ynhrRK195Of', 1, 1499112674, 1499112674),
(121, 'Ozono', 'F1T8pMNXf0XlbRp8mPAY8lxUpyYDaZL8', 1, 1499112674, 1499112674),
(122, 'Sanignacio', 'KrzDPiBOVrmrF6De0d4Iybi5tM0yl1LI', 1, 1499112674, 1499112674),
(123, 'GDA_Inve01', 'BFXA9pQ8XBWcpnDrbUzg6AQwVskM97GQ', 1, 1499112674, 1499112674),
(124, 'Tango', '4AxT9gZ7vL55sJtG0cq8hO7Vglj6gdL7', 1, 1499112674, 1499112674),
(125, 'Tolon', 'xbFiTTtml_Y8DcjFvwBjc42lD6OK14bS', 1, 1499112674, 1499112674),
(126, 'Valencia', 'mnEu51cQxMPqzYK2GB2IvuZN_7_GC1U2', 1, 1499112674, 1499112674),
(127, 'GDA_Owner', 'XtDVjnk6Kw1F0oSsw7CeRyGOxx5NLuLq', 1, 1499112674, 1499112674),
(128, 'Contabilidad1', 'xgLtw_uV7WpmtRrkL38OS5nIg27RsxSg', 1, 1499112674, 1499112674),
(129, 'Mchachati', '2yWR1o9gJUYsm2yVlpswH7p97wSXN23T', 1, 1499112674, 1499112674),
(130, 'ICG01', 'bOwSyobJj8hOgVL01u4jq4sh7Z-9p-TG', 0, 1499112674, 1499112674),
(131, 'Maturin', 'EdH2NBcVGhUdMXAVcmY8X_VBcl6syNYx', 1, 1499112674, 1499112674),
(132, 'ICG02', 'eIyuRU_4IoUvxXlKFkJpv0YDmlFbSueg', 0, 1499112674, 1499112674),
(133, 'ICG03', '6-qY_E_jyAOQxFTrAgn7ZHYDsGN_Wu95', 0, 1499112674, 1499112674),
(134, 'ICG04', 'r3hEfUUTO2fHHBDOzWpiEInUqH_TbTHB', 0, 1499112674, 1499112674),
(135, 'ICG05', 'g3VtXGPBZViLHCbQn-xJf--QZxal9Je7', 1, 1499112674, 1499112674),
(136, 'ICG06', 'JqBtXMTrHebHu0G8DS3dvjt4smWQ5e5t', 0, 1499112674, 1499112674),
(137, 'ICG07', 'RrclofixwSiAKREOkM_1mGg773mxQ5Se', 0, 1499112674, 1499112674),
(138, 'ICG08', 'lh-7qGb0Ytfn4TT_yKTT8xagNsNpdmNy', 0, 1499112674, 1499112674),
(139, 'sanlong', 'xApLjc-gB47TCfAEWFuSw7tj7arwdz2X', 0, 1499112674, 1499112674),
(140, 'contabilidad9', '653EMa88ydr7l3GEXuQEClX7toGWq1aV', 1, 1499112674, 1499112674),
(141, 'contabilidad10', '896kamZDb7fL9mniDv7-2-X6v7vkZUVY', 1, 1499112674, 1499112674),
(142, 'mcsamaniego', 'SjUn7MHO9mrN31_nn4vB9E9uFUfevOvM', 1, 1499112674, 1499112674),
(143, 'naifmaturin', 'w9_FLpP7-6j38BMi3UeS4cU5L-ux-nmM', 1, 1499112674, 1499112674),
(144, 'L19', '1JbpOyELIQlu5f-2iUwflw3vC-dQHHkJ', 1, 1499112674, 1499112674),
(145, 'ICG10', 'MoC9PmUjnDsqOHZj_nuc0OO4IqucMzGu', 0, 1499112674, 1499112674),
(146, 'crevilla', 'ZDaD5l1yhYTcep3FtiBSF5rnx5RkDJDQ', 0, 1499112674, 1499112674),
(147, 'Administrador', 'hoplPv69Szi4GmeD7FDU4SPsOh1ABFKB', 1, 1499112674, 1499112674),
(148, 'vwalo', 'niL-egeCYVLBdqkDls4focEbl4MpHvYP', 1, 1499112674, 1499112674),
(149, 'wbaldes', 'T2fHj5y_mNdGstcOsg5J8Xw4SC7t6C8j', 1, 1499112674, 1499112674),
(150, 'GDA_inv01', 'bnrEwNq2ALvO3Y5zkiGVuyG5p4d1w2Qd', 1, 1499112674, 1499112674),
(151, 'GDA_Super01', '-m-yke5wIoevPw1rim8JEUR6kPF2gVOB', 1, 1499112674, 1499112674),
(152, 'GDA_Manager', '4XLgemy2veHrcXAyZWl0P3jpXW4_zfJ_', 1, 1499112674, 1499112674),
(153, 'lrodriguez', '50vrlsekKv5_zpGlo7k6ecwLTmHSkndt', 1, 1499112674, 1499112674),
(154, 'AHatillo', '0BxwMUE7TAP8lsu_xZn5yzFazY87vgrs', 1, 1499112674, 1499112674),
(155, 'aishtilider', 'w0UYbpvo-Xe8cJ7EScXLHsm3xFTecOsE', 1, 1499112674, 1499112674),
(156, 'aishmillenium', 'betd7r_w9mqnp4shM4vsTf5R2GUXZuxY', 1, 1499112674, 1499112674),
(157, 'GDA_Admin', 'qOWz4n3ZECbr-wcxC8y9_K7vf5a0QFAQ', 1, 1499112674, 1499112674),
(158, 'Carolinaherrera', '5SClnHEwhWix6oLYKMwI8i0zqPUFnEP_', 1, 1499112674, 1499112674),
(159, 'L153', 'DX6s83oXJ2mSvS_VKO7PuTEChpJ3EboE', 1, 1499112674, 1499112674),
(160, 'contabilidad2', 'EijoOQTgB461Xo50xN34rhHgT0I_9NKU', 1, 1499112674, 1499112674),
(161, 'contabilidad3', 'cXN8YKFURZvlN5KNE9SGnzE49o0E_Cuh', 1, 1499112675, 1499112675),
(162, 'contabilidad4', '0fPnoT20tQ59W7AoKmBOjGk7IposR5Os', 1, 1499112675, 1499112675),
(163, 'contabilidad5', 'eJCo5zbMrN9dSeZ9R7VAD93mYqeot0KT', 1, 1499112675, 1499112675),
(164, 'contabilidad6', 'RiTz7vGzmi4TK_01QUuWwPGtwIkwP4TK', 1, 1499112675, 1499112675),
(165, 'contabilidad7', 'SCbmyYOb0dwSgJMOtFVN4TBntiIrXV5g', 1, 1499112675, 1499112675),
(166, 'contabilidad8', 'OmKIJ8d1sIIMN5EYNUd2VG1jkabYQU7N', 1, 1499112675, 1499112675),
(167, 'dzorrilla', 'FE87Dyguek3bGlV-sJQ47kMItAlKBubE', 0, 1499112675, 1499112675),
(168, 'F05', 'CDeMB-hNcoj6Qjisrd8j6cpkmfqScgLc', 1, 1499112675, 1499112675),
(169, 'Forest', 'foeoTMA5ND3AIGPSnNvPIRqJJQfU2vBW', 1, 1499112675, 1499112675),
(170, 'Foru', 'yhuxtUJ5jZ5WLDI4XTt2up48JkFvP3cn', 1, 1499112675, 1499112675),
(171, 'Guatire', 'nTsVe3-JjQei7Ejl2qMbnFInQfL5mk0J', 1, 1499112675, 1499112675),
(172, 'ICG09', 'WgXyG1zJkOtb1dfsFgEjyfxWF1ctiNeq', 0, 1499112675, 1499112675),
(173, 'Sramos', '9yetqoiusw5m3QpJgJNr0JrAS5PgFRaA', 1, 1499112675, 1499112675),
(174, 'vrebolledo', 'TQPQto73RkJKKjtSnPNG0mKLvDYScAaN', 1, 1499112675, 1499112675),
(175, 'joanne.parks', 'PPqFHlaioh9jeNMFOIZpzPv6qX6k5Jzq', 1, 1499112675, 1499112675),
(176, 'island.fboutique', 'tD0uGGU2fMoTxlrD1R96EwdK_BXHaop7', 1, 1499112675, 1499112675),
(177, 'tropical.vanity', 'UceROJErFb4oxbiW18Nmn3fNNGHGs1VN', 1, 1499112675, 1499112675),
(178, 'corporacion.vanity', '58_q30aQZYjspqkBCH3tS7WdCuWUKVMM', 1, 1499112675, 1499112675),
(179, 'lady.fashions', 'fgOmfqFrofhnrWD5CjzzfMRWgVJU6zSA', 1, 1499112675, 1499112675),
(180, 'lider.fashions', 'p_8aL9OJHRuGLGfquz849yMSq5B20Uws', 1, 1499112675, 1499112675),
(181, 'andrea.parks', 'I1V7NBjrNuJ3TNzz0GYWLFFRdz9trYQG', 1, 1499112675, 1499112675),
(182, 'metropolitan.fashion', 'UgAXThflhxm-5MEUlXL5KB5mNysPByVJ', 1, 1499112675, 1499112675),
(183, 'liko.fashion', 'RPX2ZdDeHnM0dnA6qBejcUOdyLmxcLU1', 1, 1499112675, 1499112675),
(184, 'lider.fashion', 'hq0d29P0BZl-SuKomUnvfgAFexUw_2sl', 1, 1499112675, 1499112675),
(185, 'venecor.lnaranjos', '_C2ZXQshsr2j-7pNggtBYgG_5dX_WvOW', 1, 1499112675, 1499112675),
(186, 'lady.fashion', '--AlNgHO1QJi19p3BIfC0sQhZDjoHkNg', 1, 1499112675, 1499112675),
(187, 'joanne.park', 'eed3ekRuicDr41UcaJ6D1CttV7Q_r9-N', 1, 1499112675, 1499112675),
(188, 'mdelima', '9zrhOumhdgotRsJkrZkahSEQHLTn54cO', 1, 1499112675, 1499112675),
(189, 'le.park', 'H56_RlVqaN1pnCVDiAx-sIWs6LwROPBS', 1, 1499112675, 1499112675),
(190, 'inv.adomars', '8dDRh6kybCepYJvS1Gg9O8_ZZhMO4E_l', 1, 1499112675, 1499112675),
(191, 'inv.adomar', '1Q215icNYWwgUHQPvJ9HQP9GysmIQben', 1, 1499112675, 1499112675),
(192, 'andrea.park', 'qf6DON2tjg7FtUijHnW1T6OiHwpVG9dS', 1, 1499112675, 1499112675),
(193, 'jmenendez', 'tMRMRrT-cpZtMgtNJzuoEz-OtcebKPba', 1, 1499112675, 1499112675),
(194, 'cmoreno', 'WrEVo2TIZZkX7FzZGdQHEOY7TrxerhRp', 1, 1499112675, 1499112675),
(195, 'amontilla', 'bRKmih74llNeTE1B1q7nQNEtAa0FPSbL', 1, 1499112675, 1499112675),
(196, 'amaturin', 'ejGsAuxiAuTqQE-JcL3prYgvwzPOlJmQ', 1, 1499112675, 1499112675),
(197, 'ccervantes', '2-WhV52rovWHoq1ytaj0DbtMULi5v16I', 1, 1499112675, 1499112675),
(198, 'adtolon', '9k_UU-d7Ynfgbv28rsUSG7kYmACYvYU9', 1, 1499112675, 1499112675),
(199, 'ecapote', '6oTD_JhCGjVmdxHlxo7NuiSyASCGuirB', 1, 1499112675, 1499112675),
(200, 'yfragoza', 'xsnzsbJsClUVquD_RIxJ3PkUhNT27tZy', 1, 1499112675, 1499112675),
(201, 'vanity.island', 'wgKVLyFLcszu3gJiMmS7fAd7J5VMFzbf', 1, 1499112675, 1499112675),
(202, 'falfonzo', 'IVYBTJFwaEutMwYk5C5KoRiWcAWUsHmT', 1, 1499112675, 1499112675),
(203, 'CFlores', 'PxxuUTcrI9bLaJyFbheaUDEj6YCVGUFB', 1, 1499112675, 1499112675),
(204, 'CHMercedes', 'iW7ubh9qeHVP30IPT1OwaybDc4w7QqHS', 1, 1499112675, 1499112675),
(205, 'LDelgado', '-klThzo0H-fMEtpzXvmpRs8hlvqfE6gd', 1, 1499112676, 1499112676),
(206, 'MQuercia', 'h-7r28vzPy8qwQmosLVRTMqHUVKitwGq', 1, 1499112676, 1499112676),
(207, 'ICG11', 'iIfrbs9F6CEiLByT3sujlOyhFsxRb2yZ', 0, 1499112676, 1499112676),
(208, 'ICG12', 'GBTJMiLOYeyjP1q0SP5dSOXEXZumBHzt', 0, 1499112676, 1499112676),
(209, 'xinhatillo', 'mwa0k-Ahf0bW8FvrcR7B9-WCj9TXSmvK', 1, 1499112676, 1499112676),
(210, 'Adolfoaeropuerto', '9RdbHJVddfqhN30wzrg3JRdYNSk_61bj', 1, 1499112676, 1499112676),
(211, 'Arecreo', 'mFmkWEA8j4Qe0IH9EIE21RKeYC4mp3hx', 1, 1499112676, 1499112676),
(212, 'Pronoviasmercedes', 'iZOJ-E31ifwBEiZQ7XUhCLV1F09mqyRv', 1, 1499112676, 1499112676),
(213, 'Aishopbarcelona', 'jGmNJMsB0I31t_SLBL7qDrrexfuTWrUL', 1, 1499112676, 1499112676),
(214, 'Coachtolon', 'kbo9u2plnzkn_VBR-Ki0UkAVSWtdDz5b', 1, 1499112676, 1499112676),
(215, 'Aishopfe', 'GoJnQS4kjQMOBIsRiAV8J8Gp7Dx9u9B2', 1, 1499112676, 1499112676),
(216, 'CHaeropuerto', 'cilehVywIDw6maflVEo-LrDj3N0VUDGs', 1, 1499112676, 1499112676),
(217, 'ipinto', 'wESWn3y_l2BhZ3H5uzaljgx8zwI7Cfro', 1, 1499112676, 1499112676),
(218, 'Sancristobal', 'wabfFuaFGzfVkJG73iFEx9XUFFhJwF1V', 1, 1499112676, 1499112676),
(219, 'ICG13', '577XwT-Z_hwzJy6IYRDrfKvwf_C1O3U_', 0, 1499112676, 1499112676),
(220, 'ICG14', 'OeFpJEqBdWlDqq7sobekp4BZv-hLFMZA', 0, 1499112676, 1499112676),
(221, 'ICG15', 'O0wudckHBFtbXeY0EKZiGj9YDJfumMhv', 0, 1499112676, 1499112676),
(222, 'ICG16', 'poZPdZUPJdcio9dRkjPj0nPSf7q7zM9m', 0, 1499112676, 1499112676),
(223, 'ICG17', 'mW4rUQzYgSY1o42ZpV0m3zKRQ5wzTjor', 0, 1499112676, 1499112676),
(224, 'Aldo', 'UhijT6NYKOMGnZUtgrbUjM6T28tSp0P7', 1, 1499112676, 1499112676),
(225, 'Aishopm', 'Fdc9OvsrfPWJUlxONUP_mkvDGeGMaTII', 1, 1499112676, 1499112676),
(226, 'CHMargarita', 'cZnKCTLFu2UU7YEB10k1Jid_F1zfcGON', 1, 1499112676, 1499112676),
(227, 'PGMargarita', 'jxq-DgwSKqSAFAfoFS1drygYAVgvXcYy', 1, 1499112676, 1499112676),
(228, 'aromero', 'NF1Nu6vwOn3kIqDs0k3agFP-TVXWtfOo', 1, 1499112676, 1499112676),
(229, 'amedina', '651_0boGAqcshm9DgcmB6ve-dKXFWXdd', 0, 1499112676, 1499112676),
(230, 'ysalazar', 'mG3atfBBXO9av9nADf0bYDNF6h3-N6oQ', 1, 1499112676, 1499112676);

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
-- Indices de la tabla `news_business`
--
ALTER TABLE `news_business`
  ADD PRIMARY KEY (`nbusiness_id`),
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
-- AUTO_INCREMENT de la tabla `news_business`
--
ALTER TABLE `news_business`
  MODIFY `nbusiness_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `news_category`
--
ALTER TABLE `news_category`
  MODIFY `categoryne_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;
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

--
-- Filtros para la tabla `news_business`
--
ALTER TABLE `news_business`
  ADD CONSTRAINT `news_business_ibfk_1` FOREIGN KEY (`categoryne_id`) REFERENCES `news_category` (`categoryne_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
