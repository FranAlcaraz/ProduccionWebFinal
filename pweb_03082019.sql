-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-08-2019 a las 03:30:19
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

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `txt_desc` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_icon` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `id_padre` int(11) NOT NULL DEFAULT '0',
  `sn_habilitada` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `txt_desc`, `txt_icon`, `id_padre`, `sn_habilitada`) VALUES
(10, 'Equipos', '', 0, -1),
(11, 'Liquidos', '', 0, -1),
(12, 'Atomizador', '', 10, -1),
(13, 'Mods', '', 10, -1),
(14, 'Resistencias', '', 0, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `ip_origen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `txt_nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_email` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_comentario` varchar(800) COLLATE utf8_spanish_ci NOT NULL,
  `cant_estrellas` int(11) NOT NULL,
  `sn_aprobado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_producto`, `ip_origen`, `fecha`, `txt_nombre`, `txt_email`, `txt_comentario`, `cant_estrellas`, `sn_aprobado`) VALUES
(22, 36, '192.168.0.1', '2019-08-03', 'Francisco', 'fran.alcaraz70@gmail.com', 'El mejor para empezar a vapear', 3, -1),
(23, 36, '192.168.0.6', '2019-08-03', 'Nicolas', 'nico@nico.com.ar', 'Malísimo. Nunca más compro acá', 1, -1),
(24, 37, '192.168.0.123', '2019-08-03', 'Franco', 'fran@fra.com.ar', 'El mejor. Le pones un poco de CBC y quedas re loco', 5, -1),
(25, 44, '192.168.0.10', '2019-08-04', 'Thomas', 'thomas@thomas.com.ar', 'Lo compre para mi vieja, lo termine usando yo. es una genialidad.', 5, -1),
(26, 46, '192.168.0.22', '2019-08-04', 'Pilar', 'Pilar@pilar.com.ar', 'el vendedor un genio, el liquido masomenos.', 3, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `ip_origen` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `txt_nombre` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `txt_apellido` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `txt_email` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `txt_telefono` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `txt_asunto` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `txt_mensaje` varchar(1000) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `ip_origen`, `fecha`, `txt_nombre`, `txt_apellido`, `txt_email`, `txt_telefono`, `txt_asunto`, `txt_mensaje`) VALUES
(1, '::1', '2018-10-03', 'Pedrito', 'Pe', 'a@a.com', '41115554', 'Asunto', 'Mensaje<br />\r\n<br />\r\nasd'),
(2, '::1', '2019-08-03', 'Francisco', 'Alcaraz', 'fran.alcaraz70@gmail.com', '91133476454', 'sdsadsadsad', 'dsadsadsadasas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id_marca` int(11) NOT NULL,
  `txt_desc` varchar(300) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id_marca`, `txt_desc`) VALUES
(1, 'General - Todas'),
(2, 'Voopoo'),
(3, 'Smok'),
(4, 'IJOY'),
(5, 'ELEMENT'),
(7, 'NASTY'),
(8, 'Vaporesso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`) VALUES
(1, 'Administrador'),
(2, 'Empleado'),
(3, 'Visual'),
(4, 'Comentarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil_permisos`
--

CREATE TABLE `perfil_permisos` (
  `id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfil_permisos`
--

INSERT INTO `perfil_permisos` (`id`, `perfil_id`, `permiso_id`) VALUES
(67, 3, 13),
(68, 3, 17),
(69, 3, 22),
(70, 3, 28),
(71, 1, 1),
(72, 1, 2),
(73, 1, 3),
(74, 1, 4),
(75, 1, 5),
(76, 1, 7),
(77, 1, 8),
(78, 1, 9),
(79, 1, 10),
(80, 1, 11),
(81, 1, 12),
(82, 1, 13),
(83, 1, 14),
(84, 1, 15),
(85, 1, 16),
(86, 1, 17),
(87, 1, 22),
(88, 1, 23),
(89, 1, 24),
(90, 1, 25),
(91, 1, 26),
(92, 1, 27),
(93, 1, 28),
(94, 4, 22),
(95, 4, 23),
(96, 4, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `cod` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `precios` (
  `id_producto` int(11) NOT NULL,
  `fecha_desde` date NOT NULL,
  `precio` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `precios`
--

INSERT INTO `precios` (`id_producto`, `fecha_desde`, `precio`) VALUES
(36, '2019-08-03', '5000.00'),
(37, '2019-08-03', '1500.00'),
(38, '2019-08-03', '4500.00'),
(39, '2019-08-03', '15000.00'),
(40, '2019-08-03', '7500.00'),
(41, '2019-08-03', '2500.00'),
(42, '2019-08-03', '800.00'),
(43, '2019-08-03', '900.00'),
(44, '2019-08-03', '6000.00'),
(45, '2019-08-03', '8000.00'),
(46, '2019-08-03', '800.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `marca` int(11) DEFAULT NULL,
  `categoria` int(11) NOT NULL,
  `txt_desc` varchar(300) CHARACTER SET latin1 NOT NULL,
  `alt` varchar(300) CHARACTER SET latin1 NOT NULL,
  `img` varchar(800) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(800) CHARACTER SET latin1 NOT NULL,
  `sn_destacado` int(11) DEFAULT '0',
  `sn_habilitado` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `marca`, `categoria`, `txt_desc`, `alt`, `img`, `descripcion`, `sn_destacado`, `sn_habilitado`) VALUES
(36, 8, 13, 'Avenger', 'avenger', 'img/productos/producto36.png', 'El IJOY Avenger es un tanque subohm potente con un aspecto atractivo y varias bobinas X3 como la bobina X3-X3-C1S y malla helicoidal para lograr el sabor puro y la producción de vapor. Con un tubo de vidrio burbuja extra de colorido, la capacidad de la edición estándar se puede extender a 4,7 ml. El diseño práctico de llenado y control de flujo de aire inferior ajustable hace que sea una combinación perfecta con el Avenger 270. Obtener este dispositivo asombroso ahora!', -1, -1),
(37, 4, 12, 'Avenger Tank', 'avenger tank', 'img/productos/producto37.png', 'IJOY siempre trae una sorpresa para sus clientes! Nos permite introducir el último IJOY Avenger Kit TC 270 234W! Este kit se compone de una caja Avenger 270 MOD y Avenger tanque. El Avenger 270 tiene un sistema de control por voz innovadora, por lo que la operación mucho más fácil que antes. Simplemente puede ajustar la potencia o el modo de trabajo por control de voz a su Avenger 270. Diseñado para los cazadores de la nube.', -1, -1),
(38, 2, 13, 'Drag', 'drag', 'img/productos/producto38.png', 'El VooPoo DRAG 157W TC Box Mod con Gene Chip en su interior es un mod dual 18650 compatible con la aplicación de PC VooPoo para la personalización completa y la configuración de ajuste fino. ¡El chip Gene dentro del DRAG ofrece una suite de control de temperatura completa con una potencia máxima de 157W y una velocidad de disparo de 0.025 segundos! El VooPoo DRAG es un mod de caja de vatiaje variable altamente eficiente con una clasificación de eficiencia del chip del 95% para una salida de potencia precisa y confiable. El chasis del DRAG hecho de aleación de zinc y tiene un panel de acento de fibra de carbono en un lado y la palabra DRAG ligeramente grabado en la puerta de acceso de la batería. El DRAG es compatible con la aplicación de PC VooPoo, que permite al usuario personalizar la co', -1, -1),
(39, 3, 13, 'IPRIV', 'IPRIV', 'img/productos/producto39.png', 'El kit de inicio SMOK I-PRIV 230W TC presenta una de las tecnologías más innovadoras de la industria, con un chipset alimentado por AI capaz de sistema de control por voz y compatible con baterías duales 18650/20700/21700 para emparejar con el TFV12 Prince Tank. Elevando la destreza tecnológica de los mods de caja tradicionales a nuevas alturas, el SMOK I-PRIV 230W Box Mod implementa un sistema de control de voz en el que el mod puede reconocer el comando de voz y realizar ajustes con la tecnología AI (Artificial Intelligent). El I-PRIV Mod integra diseños futuristas con elementos de diseño agresivos inspirados en superhéroes para una pantalla visualmente impactante. La utilización de baterías duales 20700 y 21700 (se venden por separado) proporciona la combinación de rango y flexibilidad ', -1, -1),
(40, 2, 13, 'MOJO', 'MOJO', 'img/productos/producto40.png', 'VOOPOO MOJO 88W Kit viene con el MOJO 88W Box Mod y el tanque UFORCE. Cuenta con el poderoso Gene Chip que tiene la velocidad de disparo más rápida. Con la batería incorporada de 2600 mAh, su potencia puede llegar a 88 W. Además, abarca potentes funciones y apariencia moderna. Junto con el fuerte sabor del tanque UFORCE, el VOOPOO MOJO 88W será el exclusivo kit de vapores Gene Chip de alta calidad.', 0, -1),
(41, 8, 12, 'NRG TANK', 'NRG', 'img/productos/producto41.png', '¡El Vaporesso NRG Tank es una obra maestra diseñada para perseguir nubes con sus capacidades de alto rendimiento! Además de su gran rendimiento, también obtienes un sabor limpio y nítido que es absolutamente necesario. ¡También es muy conveniente con su diseño de relleno superior deslizante, puede rellenar fácilmente sin ensuciar! ¡Disfruta de un sabor fresco, rendimiento monstruoso y excelente conveniencia con el Tanque NRG Vaporesso!', -1, -1),
(42, 5, 11, 'Element Serie Tradicional', 'Element Serie Tradicional', 'img/productos/producto42.png', 'Element E-liquids es una de las marcas de que mayores galardones ha recibido a lo largo de su trayectoria. Líquidos premium que pasan los más altos estándares de calidad de EEUU, 100% macerados y con mejores ingredientes.', 0, -1),
(43, 8, 14, 'Coil Vaporesso Nrg', 'Coil Vaporesso Nrg', 'img/productos/producto43.png', 'Los núcleos GT están especialmente diseñados para encajar en la serie de tanques NRG. Viene en algodón tradicional y cerámica CCELL Vaporesso significativa en diferentes resistencias, desde GT2 a GT8, selección total de 5 resistencias para elegir.\r\n\r\nLas resistencias GT8 de Vaporesso para el NRG Tank soportan 60-110W de potencia con un mejor rendimiento.', 0, -1),
(44, 4, 13, 'SABER', 'SABER', 'img/productos/producto44.png', 'El IJOY Saber 100 es un kit avanzado extremadamente compacto y portátil que consta de 100W de batería. Este kit consta de bateria Saber 100 y atomizador DIAMOND SUBOHM TANK de 2ml con grabado CNC y colores atractivos. Alimentado por una sola batería 20700/18650 con chip avanzado IWEPAL, el Sabre 100 dispara hasta 100W de potencia máxima con potencia ajustable con una pantalla brillante y grande. El saber Mod tiene unas medidas de 97 x 29mm.', -1, -1),
(45, 3, 12, 'TFV-12', 'TFV12', 'img/productos/producto45.png', 'l TFV12 Prince Tank by Smok es un tanque diseñado para usuarios que no quedaron completamente satisfechos con el TFV8 y el TFV12 original. El TFV12 Prince posee una increíble capacidad de líquido de 8ml que logra con una forma abultada del tubo de cristal. También puede utilizar las nuevas resistencias Prince V12 atomizer heads (quadruple, sextuple y decuple coils) especialmente diseñadas para incrementar la producción de vapor y sabor del TFV12 Prince.\r\n\r\nEl atomizador TFV12 Prince presenta 12 agujeros para maximizar la saturación de líquido y la disipación de calor. También presenta una nueva tapa deslizable para el rellenado superior con un mecanismo de bloqueo con un botón que facilita el acceso.', -1, -1),
(46, 7, 11, 'Nasty e-Liquid', 'nasty', 'img/productos/producto46.png', 'Liquidos premium TOPE DE GAMA con excelente presentación (las botellas vienen dentro de cajas de lata) y sabores excitantes.\r\n\r\nSi sos  de paladar exigente y no te conformas con un simple liquido premium. este es el siguiente nivel.\r\n\r\nSabores (únicamente en 3mg de nicotina):\r\n\r\nTrap Queen: Frutillas recien recolectadas del campo, el mejor liquido con sabor a frutilla que puedas encontrar, combina frutillas maduras con un toque refrescante.\r\nSlow Blow: Sabor a jugo de anana con limonada, refrescante para vapear todo el dia, no encontraras uno igual.\r\nJuice Fat Boy: Es un delicioso sabor afrutado a mango maduro dulce y un mango exótico que le da un punto de acidez, con un toque ligeramente mentolado.\r\nWicked Haz:  Descubre este excelente sabor de grosella negra y limonada, juntos haran que ', 0, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tipo` int(2) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `salt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `clave`, `email`, `tipo`, `activo`, `salt`) VALUES
(1, 'Admin', 'Sistema', 'admin', '207acd61a3c1bd506d7e9a4535359f8a', 'admin@carrito.com', 1, 1, 'salt'),
(2, 'Francisco', 'Alcaraz', 'falcaraz', '5f7fad6b95bfbf91d5d8e5f8f7dfb746', 'fran.alcaraz70@gmail.com', 0, 1, '5d4392c6544fa'),
(3, 'test', 'test', 'visual', 'cf516f77d701560e2c87980d0be165ce', 'visual@visual.com.ar', 0, 1, '5d45c88b96d0e'),
(4, 'comentador', 'comentador', 'comentador', 'de121654aed4f8c7c28145c95f7b5e56', 'comentador@comentador.com.ar', 0, 1, '5d45fcd5bcbdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_perfiles`
--

CREATE TABLE `usuarios_perfiles` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios_perfiles`
--

INSERT INTO `usuarios_perfiles` (`id`, `usuario_id`, `perfil_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 2, 1),
(5, 2, 2),
(6, 3, 3),
(7, 4, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_perfil_id` (`perfil_id`),
  ADD KEY `fk_permiso_id` (`permiso_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `precios`
--
ALTER TABLE `precios`
  ADD PRIMARY KEY (`id_producto`,`fecha_desde`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `idx_id_categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_id` (`usuario_id`),
  ADD KEY `fk_perfil_id2` (`perfil_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfil_permisos`
--
ALTER TABLE `perfil_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios_perfiles`
--
ALTER TABLE `usuarios_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
