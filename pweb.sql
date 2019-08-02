-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-08-2019 a las 16:04:50
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pweb`
--
CREATE DATABASE IF NOT EXISTS `pweb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `pweb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `txt_desc` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_icon` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT '0',
  `sn_habilitada` int(11) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `txt_desc`, `txt_icon`, `id_padre`, `sn_habilitada`) VALUES
(1, 'Paquetes', 'icon icon-paquetes', 0, -1),
(2, 'Vuelos', 'icon icon-vuelos', 0, -1),
(3, 'Hoteles', 'icon icon-hoteles', 0, -1),
(4, '5 Estrellas', 'icon icon-hoteles', 3, -1),
(5, '4 Estrellas', 'icon icon-hoteles', 3, -1),
(6, '3 Estrellas', 'icon icon-hoteles', 3, -1),
(8, 'All inclusive', 'icon icon-paquetes', 1, -1),
(9, 'Media pension', 'icon icon-paquetes', 1, -1),
(10, 'Equipos', '', 0, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id_comentario` int(11) NOT NULL AUTO_INCREMENT,
  `id_producto` int(11) NOT NULL,
  `ip_origen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `txt_nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_comentario` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `cant_estrellas` int(11) NOT NULL,
  `sn_aprobado` int(11) NOT NULL,
  PRIMARY KEY (`id_comentario`),
  KEY `id_producto` (`id_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_producto`, `ip_origen`, `fecha`, `txt_nombre`, `txt_email`, `txt_comentario`, `cant_estrellas`, `sn_aprobado`) VALUES
(10, 14, '192.168.1.2', '2018-10-03', 'Luz', 'luz@luz.com', 'test', 5, 0),
(11, 14, '192.168.1.2', '2018-10-03', 'Gabi', 'gabi@gabi.com', 'Un desastre todo...\r\n\r\nNunca mas!', 1, -1),
(13, 5, '192.168.1.2', '2018-10-03', 'Pedro', 'pedro@pedro.com', 'Muy buen hotel!', 2, -1),
(14, 6, '192.168.1.2', '2018-10-03', 'luz', 'luz@luz.com', 'test', 5, 0),
(15, 19, '192.168.1.2', '2018-10-03', 'luz', 'luz@luz.com', 'test', 5, 0),
(17, 17, '::1', '2018-10-03', 'Lautaro', 'lauta@lauta.com', 'Bastante bien', 3, -1),
(18, 9, '123', '2018-10-05', 'Gabriel', 'gaby@gaby.com', 'Bastante bien!', 4, -1),
(19, 12, '::1', '2018-10-05', 'Kiko', 'kiko@kiko.com', 'Safable!!', 3, -1),
(20, 22, '::1', '2018-12-07', 'Cesar', 'v@a.com', 'test', 5, -1),
(21, 14, '::1', '2019-08-01', 'Francisco', 'fran.alcaraz70@gmail.com', 'fafafafaf', 5, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE IF NOT EXISTS `contacto` (
  `id_contacto` int(11) NOT NULL AUTO_INCREMENT,
  `ip_origen` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `txt_nombre` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `txt_apellido` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `txt_email` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `txt_telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `txt_asunto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_mensaje` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_contacto`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `ip_origen`, `fecha`, `txt_nombre`, `txt_apellido`, `txt_email`, `txt_telefono`, `txt_asunto`, `txt_mensaje`) VALUES
(1, '::1', '2018-10-03', 'Pedrito', 'Pe', 'a@a.com', '41115554', 'Asunto', 'Mensaje<br />\r\n<br />\r\nasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `id_marca` int(11) NOT NULL,
  `txt_desc` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `txt_desc`) VALUES
(0, 'Vaporesso'),
(0, 'Smok'),
(0, 'Voopoo'),
(0, 'IJOY'),
(0, 'ELEMENT'),
(0, 'NASTY'),
(0, 'PALERMO VAPORS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_permisos`
--

CREATE TABLE IF NOT EXISTS `perfil_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perfil_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_perfil_id` (`perfil_id`),
  KEY `fk_permiso_id` (`permiso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_permisos`
--

INSERT INTO `perfil_permisos` (`id`, `perfil_id`, `permiso_id`) VALUES
(40, 1, 1),
(41, 1, 2),
(42, 1, 3),
(43, 1, 4),
(44, 1, 5),
(45, 1, 7),
(46, 1, 8),
(47, 1, 9),
(48, 1, 10),
(49, 1, 11),
(50, 1, 12),
(51, 1, 13),
(52, 1, 14),
(53, 1, 15),
(54, 1, 16),
(55, 1, 17),
(56, 1, 18),
(57, 1, 19),
(58, 1, 20),
(59, 1, 21),
(60, 1, 22),
(61, 1, 23),
(62, 1, 24),
(63, 1, 25),
(64, 1, 26),
(65, 1, 27),
(66, 1, 28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `cod` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `cod`) VALUES
(1, 'Agregar usuarios', 'user.add'),
(2, 'Modificar usuarios', 'user.edit'),
(3, 'Borrar Usuarios', 'user.del'),
(4, 'Ver Usuarios', 'user.see'),
(5, 'Agregar Perfiles', 'profile.add'),
(7, 'Modificar Perfiles', 'profile.edit'),
(8, 'Borrar Perfiles', 'profile.del'),
(9, 'Ver Perfiles', 'profile.see'),
(10, 'Agregar Productos', 'product.add'),
(11, 'Modificar Productos', 'product.edit'),
(12, 'Borrar Productos', 'product.del'),
(13, 'Ver Productos', 'product.see'),
(14, 'Agregar Categorias', 'category.add'),
(15, 'Modificar Categorias', 'category.edit'),
(16, 'Borrar Categorias', 'category.del'),
(17, 'Ver Categorias', 'category.see'),
(18, 'Agregar Regiones', 'region.add'),
(19, 'Modificar Regiones', 'region.edit'),
(20, 'Borrar Regiones', 'region.del'),
(21, 'Ver Regiones', 'region.see'),
(22, 'Ver Comentarios', 'comment.see'),
(23, 'Desaprobar Comentarios', 'comment.dis'),
(24, 'Aprobar Comentarios', 'comment.app'),
(25, 'Agregar Marcas', 'marca.add'),
(26, 'Modificar Marcas', 'marca.edit'),
(27, 'Borrar Marcas', 'marca.del'),
(28, 'Ver Marca', 'marca.see');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precios`
--

CREATE TABLE IF NOT EXISTS `precios` (
  `id_producto` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `precio` decimal(18,2) NOT NULL,
  PRIMARY KEY (`id_producto`,`fecha_desde`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id_producto`, `fecha_desde`, `precio`) VALUES
(3, '2018-10-03', '4000.00'),
(5, '2018-10-03', '5472.00'),
(6, '2018-10-03', '8540.00'),
(7, '2018-10-03', '6575.00'),
(8, '2018-10-03', '8540.00'),
(9, '2018-10-03', '4520.00'),
(10, '2018-10-03', '7585.00'),
(11, '2018-10-03', '6545.00'),
(12, '2018-10-03', '5445.00'),
(13, '2018-10-03', '14630.86'),
(14, '2018-10-03', '38941.12'),
(14, '2018-10-06', '88941.12'),
(15, '2018-10-03', '28363.01'),
(16, '2018-10-03', '29666.71'),
(17, '2018-10-03', '24544.52'),
(18, '2018-10-03', '29397.47'),
(19, '2018-10-03', '38640.72'),
(20, '2018-10-03', '50691.83'),
(21, '2018-10-03', '44121.97'),
(22, '2018-10-03', '44209.39'),
(23, '2018-10-03', '29811.04'),
(24, '2018-10-03', '26647.01'),
(25, '2018-10-03', '54021.96'),
(26, '2018-10-03', '27663.75'),
(27, '2018-10-03', '55562.87'),
(28, '2018-10-03', '32318.12'),
(29, '2018-10-03', '39666.98'),
(30, '2018-10-03', '42510.56'),
(31, '2019-08-02', '15000.00'),
(32, '2019-08-02', '1515151515.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `region` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `txt_desc` varchar(300) CHARACTER SET latin1 NOT NULL,
  `alt` varchar(300) CHARACTER SET latin1 NOT NULL,
  `img` varchar(800) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(800) CHARACTER SET latin1 NOT NULL,
  `sn_destacado` int(11) DEFAULT '0',
  `sn_habilitado` int(11) DEFAULT '0',
  `marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `tipo_producto` (`region`),
  KEY `idx_id_categoria` (`categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `region`, `categoria`, `txt_desc`, `alt`, `img`, `descripcion`, `sn_destacado`, `sn_habilitado`, `marca`) VALUES
(3, 1, 4, 'Hotel en Europa', 'Hotel en Europa', 'img/productos/producto3.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, 0),
(5, 1, 4, 'Hotel en Playa Paraiso', 'Hoteles en Playa Paraiso', 'img/productos/producto5.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, NULL),
(6, 1, 5, 'Hotel en Las Vegas', 'Hoteles en Las Vegas', 'img/productos/producto6.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, NULL),
(7, 1, 5, 'Hotel en Brasil', 'Hoteles en Brasil', 'img/productos/producto7.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, NULL),
(8, 1, 5, 'Hotel en New York', 'Hoteles en New York', 'img/productos/producto8.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, NULL),
(9, 1, 5, 'Hotel en Isla Mauricio', 'Hoteles en Isla Mauricio', 'img/productos/producto9.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', -1, -1, NULL),
(10, 3, 6, 'Hotel en California', 'Hoteles en California', 'img/productos/producto10.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, NULL),
(11, 1, 6, 'Hotel en Indonesia', 'Hoteles en Indonesia', 'img/productos/producto11.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, NULL),
(12, 1, 4, 'Hotel en Italia - Turín', 'Hoteles en Italia - Turín', 'img/productos/producto12.png', 'En un hotel tenés cero preocupaciones. Disfrutá dejar en las manos de otros la limpieza, el orden y, en algunos casos, incluso una o más comidas. Generalmente son muy seguros y poseen varias formas de pago. Además, los hoteles suelen contar con servicios extra que pueden serte útiles para tu viaje, como traslado al aeropuerto, estacionamiento, restaurante, entre otros.', 0, -1, NULL),
(13, 1, 2, 'Vuelo a Miami', 'Vuelo a Miami', 'img/productos/producto13.png', 'Comprá tus pasajes aéreos al mejor precio y con la mejor financiación. Conseguí vuelos baratos para viajar donde quieras y hacé que el cielo sea tu límite. Hay una gran variedad de pasajes de avión, aerolíneas y destinos para que elijas el que más te conviene. Encontrá los mejores vuelos y ¡preparate para viajar!', 0, -1, NULL),
(14, 1, 2, 'Vuelo a Rio', 'Vuelo a Rio', 'img/productos/producto14.png', 'Comprá tus pasajes aéreos al mejor precio y con la mejor financiación. Conseguí vuelos baratos para viajar donde quieras y hacé que el cielo sea tu límite. Hay una gran variedad de pasajes de avión, aerolíneas y destinos para que elijas el que más te conviene. Encontrá los mejores vuelos y ¡preparate para viajar!', -1, -1, NULL),
(15, 1, 2, 'Vuelo a Florianópolis', 'Vuelo a Florianópolis', 'img/productos/producto15.png', 'Comprá tus pasajes aéreos al mejor precio y con la mejor financiación. Conseguí vuelos baratos para viajar donde quieras y hacé que el cielo sea tu límite. Hay una gran variedad de pasajes de avión, aerolíneas y destinos para que elijas el que más te conviene. Encontrá los mejores vuelos y ¡preparate para viajar!', 0, -1, NULL),
(16, 1, 2, 'Vuelo a Santiago', 'Vuelo a Santiago', 'img/productos/producto16.png', 'Comprá tus pasajes aéreos al mejor precio y con la mejor financiación. Conseguí vuelos baratos para viajar donde quieras y hacé que el cielo sea tu límite. Hay una gran variedad de pasajes de avión, aerolíneas y destinos para que elijas el que más te conviene. Encontrá los mejores vuelos y ¡preparate para viajar!', 0, -1, NULL),
(17, 1, 2, 'Vuelo a San Andres', 'Vuelo a San Andres', 'img/productos/producto17.png', 'Comprá tus pasajes aéreos al mejor precio y con la mejor financiación. Conseguí vuelos baratos para viajar donde quieras y hacé que el cielo sea tu límite. Hay una gran variedad de pasajes de avión, aerolíneas y destinos para que elijas el que más te conviene. Encontrá los mejores vuelos y ¡preparate para viajar!', 0, -1, NULL),
(18, 1, 2, 'Vuelo a Bariloche', 'Vuelo a Bariloche', 'img/productos/producto18.png', 'Comprá tus pasajes aéreos al mejor precio y con la mejor financiación. Conseguí vuelos baratos para viajar donde quieras y hacé que el cielo sea tu límite. Hay una gran variedad de pasajes de avión, aerolíneas y destinos para que elijas el que más te conviene. Encontrá los mejores vuelos y ¡preparate para viajar!', 0, -1, NULL),
(19, 1, 8, 'Paquetes en Oferta', 'Paquetes en Oferta', 'img/productos/producto19.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(20, 1, 8, 'Paquetes en Familia', 'Paquetes en Familia', 'img/productos/producto20.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(21, 1, 8, 'Paquete a Argentina', 'Paquete a Argentina', 'img/productos/producto21.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(22, 1, 8, 'Paquete a Brasil', 'Paquete a Brasil', 'img/productos/producto22.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', -1, -1, NULL),
(23, 1, 8, 'Paquete al Caribe', 'Paquete al Caribe', 'img/productos/producto23.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(24, 1, 9, 'Paquete a Asia', 'Paquete a Asia', 'img/productos/producto24.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(25, 1, 9, 'Paquete a Cuba', 'Paquete a Cuba', 'img/productos/producto25.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(26, 1, 9, 'Paquete a Estados Unidos', 'Paquete a Estados Unidos', 'img/productos/producto26.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(27, 1, 9, 'Paquete a California', 'Paquete a California', 'img/productos/producto27.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(28, 1, 9, 'Paquete a Grecia', 'Paquete a Grecia', 'img/productos/producto28.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(29, 1, 8, 'Paquete a Perú', 'Paquete a Perú', 'img/productos/producto29.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(30, 1, 8, 'Paquetes All Inclusive', 'Paquetes All Inclusive', 'img/productos/producto30.png', 'Al comprar tus paquetes turísticos podés conseguir un valor más bajo en tu viaje, ya que al sumar un alojamiento o un auto, obtenés un descuento significativo. ¡Comprar paquetes de viaje siempre te va a resultar más barato! Podés armar tu paquete a medida, ahorrar en el valor total y gastar esa plata en tu viaje. ¡Aprovechá viajes baratos a un sinfín de destinos!', 0, -1, NULL),
(31, NULL, 1, 'xsdsadsadsad', 'dsadsadasdas', 'img/productos/producto31.png', 'dsadsadsadasdsa', 0, -1, 0),
(32, NULL, 10, 'fafafaf', 'DSADASDAS', 'img/productos/producto32.png', 'DSADASDSADSAHFBSJFBDSIFHBASHK', -1, -1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regiones`
--

CREATE TABLE IF NOT EXISTS `regiones` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `txt_desc` varchar(300) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `regiones`
--

INSERT INTO `regiones` (`id_region`, `txt_desc`) VALUES
(1, 'General - Todas'),
(2, 'America'),
(3, 'Europa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `salt` varchar(50) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `email`, `tipo`, `activo`, `salt`) VALUES
(1, 'Admin', 'Sistema', 'admin', '207acd61a3c1bd506d7e9a4535359f8a', 'admin@carrito.com', 1, 1, 'salt'),
(2, 'Francisco', 'Alcaraz', 'falcaraz', '5f7fad6b95bfbf91d5d8e5f8f7dfb746', 'fran.alcaraz70@gmail.com', 0, 1, '5d4392c6544fa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfiles`
--

CREATE TABLE IF NOT EXISTS `usuarios_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_id` (`usuario_id`),
  KEY `fk_perfil_id2` (`perfil_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_perfiles`
--

INSERT INTO `usuarios_perfiles` (`id`, `usuario_id`, `perfil_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  ADD CONSTRAINT `fk_perfil_id` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  ADD CONSTRAINT `fk_permiso_id` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`);

--
-- Filtros para la tabla `precios`
--
ALTER TABLE `precios`
  ADD CONSTRAINT `precios_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`region`) REFERENCES `regiones` (`id_region`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD CONSTRAINT `fk_perfil_id2` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  ADD CONSTRAINT `fk_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
