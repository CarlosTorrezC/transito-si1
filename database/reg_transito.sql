-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2020 at 06:36 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reg_transito`
--

-- --------------------------------------------------------

--
-- Table structure for table `bitacoras`
--

CREATE TABLE `bitacoras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `modulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_documento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datos_antiguos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datos_nuevos` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_operacion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bitacoras`
--

INSERT INTO `bitacoras` (`id`, `fecha_hora`, `modulo`, `codigo_documento`, `ip`, `datos_antiguos`, `datos_nuevos`, `id_usuario`, `id_operacion`) VALUES
(1, '2020-10-18 20:42:07', 'LOGOUT', NULL, '127.0.0.1', NULL, NULL, 1, 5),
(2, '2020-10-18 20:44:50', 'LOGIN', NULL, '127.0.0.1', NULL, NULL, 1, 4),
(3, '2020-10-18 20:47:53', 'CIUDADANO', '8341181', '127.0.0.1', NULL, 'Nombres:JOSEFINA MARIELA | Apellidos:DO SANTO MELLINI | Sexo:F | Nacionalidad:EXTRANJERO | Fecha Nacimiento:1992-03-27 | Direccion:URUBO | Grupo Sanguineo:B+ | Email:josefmari@gmail.com', 1, 1),
(4, '2020-10-18 20:48:47', 'CIUDADANO', '8341182', '127.0.0.1', 'Nombres:FERNANDO | Apellidos:AMELLER | Nacionalidad:BOLIVIANA | Direccion:URUBO | Email:fercho199758@gmail.com', 'Nombres:FERNANDO | Apellidos:AMELLER | Nacionalidad:BOLIVIANA | Direccion:URUBO | Email:fercho199758@gmail.com', 1, 3),
(5, '2020-10-18 20:49:51', 'OFICIAL', '8341181', '127.0.0.1', NULL, 'Nombres:JOSEFINA MARIELA | Apellidos:DO SANTO MELLINI | Sexo:F | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1992-03-27 | Direccion:AV. BANZER | Grupo Sanguineo:O+ | Email:josef@gmail.com | Codigo Oficial:josef67890', 1, 1),
(6, '2020-10-18 20:51:28', 'OFICIAL', '8341189', '127.0.0.1', NULL, 'Nombres:MARIO | Apellidos:VACA MENDOZA | Sexo:M | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1990-09-22 | Direccion:AV. ALEMANA | Grupo Sanguineo:A- | Email:mario@gmail.com | Codigo Oficial:mario12345', 1, 1),
(7, '2020-10-18 20:51:49', 'USUARIO', '2', '127.0.0.1', NULL, 'Usuario:mario | Codigo Oficial:mario12345 | Rol:2, ', 1, 1),
(8, '2020-10-18 20:53:09', 'CIUDADANO', '8341091', '127.0.0.1', NULL, 'Nombres:LUIS CARLOS | Apellidos:MARTINEZ SANCHEZ | Sexo:M | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1996-11-02 | Direccion:AV. BENI | Grupo Sanguineo:A+ | Email:lucarlos@gmail.com', 1, 1),
(9, '2020-10-18 20:53:46', 'LICENCIA M', '1', '127.0.0.1', NULL, 'CI Portador:8341091 | Emision:2020-10-18 20:53:46 | Vencimiento:2024-10-18 20:53:46 | Lentes:1 | Audifonos:1', 1, 1),
(10, '2020-10-18 20:55:16', 'OFICIAL', '8341181', '127.0.0.1', 'Nombres:JOSEFINA MARIELA | Apellidos:DO SANTO MELLINI | Nacionalidad:BOLIVIANA | Direccion:AV. BANZER | Email:josef@gmail.com | Codigo Oficial:josef67890', 'Nombres:JOSEFINA MARIELA | Apellidos:DO SANTO MELLINI | Nacionalidad:EXTRANJERO | Direccion:AV. BANZER | Email:josef@gmail.com | Codigo Oficial:josef67890', 1, 3),
(11, '2020-10-18 21:04:32', 'ROL', '3', '127.0.0.1', NULL, 'Rol:Operador | Slug:operador', 1, 1),
(12, '2020-10-18 21:04:43', 'USUARIO', '2', '127.0.0.1', 'Usuario:mario | Codigo Oficial:mario12345 | Rol:[\"Operador\"]', 'Usuario:mario | Codigo Oficial:mario12345 | Rol:3, ', 1, 3),
(13, '2020-10-18 21:11:02', 'LICENCIA M', '1', '127.0.0.1', 'CI Portador:8341091 | Emision:2020-10-18 | Vencimiento:2024-10-18 | Lentes:1 | Audifonos:1', 'CI Portador:8341091 | Emision:2020-10-18 21:11:02 | Vencimiento:2024-10-18 21:11:02 | Lentes:1 | Audifonos:', 1, 3),
(14, '2020-10-18 21:12:34', 'CIUDADANO', '8341123', '127.0.0.1', NULL, 'Nombres:JOSE MARIA | Apellidos:ROMERO LANZA | Sexo:M | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1991-07-16 | Direccion:AV. BUSH | Grupo Sanguineo:B- | Email:joma@gmail.com', 1, 1),
(15, '2020-10-18 21:13:16', 'LICENCIA T', '1', '127.0.0.1', NULL, 'CI Portador:8341123 | Emision:2020-10-18 21:13:16 | Vencimiento:2024-10-18 21:13:16 | Lentes:1 | Audifonos:', 1, 1),
(16, '2020-10-18 21:14:45', 'LICENCIA T', '1', '127.0.0.1', 'CI Portador:8341123 | Emision:2020-10-18 | Vencimiento:2024-10-18 | Lentes:1 | Audifonos:0', 'CI Portador:8341123 | Emision:2020-10-18 21:14:45 | Vencimiento:2024-10-18 21:14:45 | Lentes:1 | Audifonos:1', 1, 3),
(17, '2020-10-18 21:16:02', 'CIUDADANO', '8341890', '127.0.0.1', NULL, 'Nombres:MARIANA | Apellidos:CUETO BALLIVIAN | Sexo:F | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1993-07-12 | Direccion:AV. SAN MARTIN | Grupo Sanguineo:B- | Email:mari@gmail.com', 1, 1),
(18, '2020-10-18 21:18:32', 'LICENCIA A', '1', '127.0.0.1', NULL, 'CI Portador:8341182 | Emision:2020-10-18 21:18:32 | Vencimiento:2024-10-18 21:18:32 | Lentes:1 | Audifonos:1 | Categoria:P', 1, 1),
(19, '2020-10-18 21:20:39', 'LICENCIA A', '1', '127.0.0.1', 'CI Portador:8341182 | Emision:2020-10-18 | Vencimiento:2024-10-18 | Lentes:1 | Audifonos:1 | Categoria:P', 'CI Portador:8341182 | Emision:2020-10-18 21:20:39 | Vencimiento:2024-10-18 21:20:39 | Lentes: | Audifonos:1 | Categoria:P', 1, 3),
(20, '2020-10-18 21:20:46', 'LICENCIA A', '1', '127.0.0.1', 'CI Portador:8341182 | Emision:2020-10-18 | Vencimiento:2024-10-18 | Lentes:0 | Audifonos:1 | Categoria:P', 'CI Portador:8341182 | Emision:2020-10-18 21:20:46 | Vencimiento:2024-10-18 21:20:46 | Lentes:1 | Audifonos:1 | Categoria:P', 1, 3),
(21, '2020-10-18 21:30:46', 'CATEGORIA', NULL, '127.0.0.1', NULL, 'Nombre:Test | Descripcion:just testing', 1, 1),
(22, '2020-10-18 21:30:55', 'CATEGORIA', NULL, '127.0.0.1', 'Nombre:Test | Descripcion:just testing', 'Nombre:Test | Descripcion:just testing!!!!!!', 1, 3),
(23, '2020-10-18 21:30:59', 'CATEGORIA', NULL, '127.0.0.1', 'Nombre:Test | Descripcion:just testing!!!!!!', NULL, 1, 2),
(24, '2020-10-18 21:32:15', 'CIUDADANO', '8341345', '127.0.0.1', NULL, 'Nombres:JULIAN | Apellidos:MERCADO BARBA | Sexo:M | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1899-06-27 | Direccion:AV. PARAGUA 2DO ANILLO | Grupo Sanguineo:O- | Email:juli@gmail.com', 1, 1),
(25, '2020-10-18 21:33:14', 'VEHICULO', '123QWE', '127.0.0.1', NULL, 'CI:8341182 | Marca:NISSAN | Nombre:ALTIMA | Modelo:2015 | Nro Chasis:1234QWER | Nro Motor:5678ASD | Color:8  | Tipo Vehiculo:8', 1, 1),
(26, '2020-10-18 21:33:47', 'VEHICULO', '123QWE', '127.0.0.1', 'CI:8341182 | Color:8', 'CI:8341182 | Color:2', 1, 3),
(27, '2020-10-18 21:34:48', 'REPORTE', '1', '127.0.0.1', NULL, 'CI Reporta:8341890 | Placa Vehiculo:123QWE | Descripcion:VEHICULO FUE ROBADO EN EL CENTRO DE LA CIUDAD DE SANTA CRUZ DE LA SIERRA A HORAS DE LAS 2-3 AM EL DIA DOMINGO 13 DE OCTUBRE', 1, 1),
(28, '2020-10-18 21:35:16', 'SEGURO', '1', '127.0.0.1', NULL, 'Empresa:FORTALEZA | Placa Vehiculo:123QWE | Emision:2020-10-18 | Vencimiento:2021-10-18 00:00:00', 1, 1),
(29, '2020-10-18 21:35:52', 'TIPO VEHICULO', '9', '127.0.0.1', NULL, 'Descripcion:Test', 1, 1),
(30, '2020-10-18 21:35:59', 'TIPO VEHICULO', '9', '127.0.0.1', 'Descripcion:Test', 'Descripcion:Testing', 1, 3),
(31, '2020-10-18 21:36:01', 'TIPO VEHICULO', '9', '127.0.0.1', 'Descripcion:Testing', NULL, 1, 2),
(32, '2020-10-18 21:36:12', 'MARCA', '5', '127.0.0.1', NULL, 'Marca:TESLA', 1, 1),
(33, '2020-10-18 21:36:39', 'MARCA', '5', '127.0.0.1', 'Marca:TESLA', 'Marca:TESLAs', 1, 3),
(34, '2020-10-18 21:36:46', 'MARCA', '5', '127.0.0.1', 'Marca:TESLAs', 'Marca:TESLA', 1, 3),
(35, '2020-10-18 21:38:18', 'MARCA', '5', '127.0.0.1', 'Marca:TESLA', 'Marca:TESLAS', 1, 3),
(36, '2020-10-18 21:38:24', 'MARCA', '5', '127.0.0.1', 'Marca:TESLAS', 'Marca:TESLA', 1, 3),
(37, '2020-10-18 21:38:50', 'MARCA', '6', '127.0.0.1', NULL, 'Marca:VOLSWAGEN', 1, 1),
(38, '2020-10-18 21:39:02', 'NOMBRE', '9', '127.0.0.1', NULL, 'Nombre:MODEL 3 | Marca:TESLA', 1, 1),
(39, '2020-10-18 21:39:17', 'NOMBRE', '10', '127.0.0.1', NULL, 'Nombre:GOL | Marca:VOLSWAGEN', 1, 1),
(40, '2020-10-18 21:39:25', 'NOMBRE', '11', '127.0.0.1', NULL, 'Nombre:X | Marca:TESLA', 1, 1),
(41, '2020-10-18 21:39:33', 'NOMBRE', '12', '127.0.0.1', NULL, 'Nombre:JETTA | Marca:VOLSWAGEN', 1, 1),
(42, '2020-10-18 21:43:37', 'TITULO', '2', '127.0.0.1', NULL, 'Titulo:titulo de prueba', 1, 1),
(43, '2020-10-18 21:45:02', 'TITULO', '2', '127.0.0.1', 'Titulo:titulo de prueba', 'Titulo:TITULO DE PRUEBA', 1, 3),
(44, '2020-10-18 21:45:32', 'TITULO', '3', '127.0.0.1', NULL, 'Titulo:JUST TESTING', 1, 1),
(45, '2020-10-18 21:45:59', 'CAPITULO', '3', '127.0.0.1', NULL, 'Nombre:capitulo de prueba | Marca:TITULO DE PRUEBA', 1, 1),
(46, '2020-10-18 21:47:02', 'CAPITULO', '3', '127.0.0.1', 'Nombre:capitulo de prueba | Titulo:TITULO DE PRUEBA', 'Nombre:CAPITULO DE PRUEBA | Titulo:TITULO DE PRUEBA', 1, 3),
(47, '2020-10-18 21:48:44', 'INFRACCION', '123', '127.0.0.1', NULL, 'Descripcion:INFRACCION DE PRUEBA | Monto:300', 1, 1),
(48, '2020-10-18 21:49:16', 'INFRACCION', '123', '127.0.0.1', 'Descripcion:INFRACCION DE PRUEBA | Monto:300', 'Descripcion:INFRACCION DE PRUEBA! | Monto:300', 1, 3),
(49, '2020-10-18 21:49:20', 'INFRACCION', '123', '127.0.0.1', 'Descripcion:INFRACCION DE PRUEBA! | Monto:300', NULL, 1, 2),
(50, '2020-10-18 22:01:14', 'LOGOUT', NULL, '127.0.0.1', NULL, NULL, 1, 5),
(51, '2020-10-18 22:28:15', 'LOGIN', NULL, '127.0.0.1', NULL, NULL, 1, 4),
(52, '2020-10-18 22:31:30', 'MULTA', '1', '127.0.0.1', NULL, 'Placa Vehiculo:123QWENombre Infractor:FERNANDO AMELLERNro Licencia:8341182 | Oficial:VACA MENDOZA, MARIO | Descripcion:CONDUCTOR FUE ENCONTRADO CON CARGA EXTREMA Y CONDUCIENDO ALTAS VELOCIDAD EN LA AV. SANTOS DUMONT | Cod. Infracciones:3, |  Monto:200', 1, 1),
(53, '2020-10-18 22:31:47', 'LOGOUT', NULL, '127.0.0.1', NULL, NULL, 1, 5),
(54, '2020-10-18 23:36:16', 'LOGIN', NULL, '127.0.0.1', NULL, NULL, 1, 4),
(55, '2020-10-18 23:37:12', 'MULTA', '2', '127.0.0.1', NULL, 'Placa Vehiculo:123QWENombre Infractor:FERNANDO AMELLERNro Licencia:8341181 | Oficial:VACA MENDOZA, MARIO | Descripcion:TESTING | Cod. Infracciones:1, |  Monto:100', 1, 1),
(56, '2020-10-18 23:41:44', 'MULTA', '3', '127.0.0.1', NULL, 'Placa Vehiculo:123QWENombre Infractor:FERNANDO AMELLERNro Licencia:8341181 | Oficial:VACA MENDOZA, MARIO | Descripcion:TESTING | Cod. Infracciones:1, |  Monto:100', 1, 1),
(57, '2020-10-18 23:48:14', 'CIUDADANO', '8341890', '127.0.0.1', 'Nombres:MARIANA | Apellidos:CUETO BALLIVIAN | Sexo:F | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1993-07-12 | Direccion:AV. SAN MARTIN | Grupo Sanguineo:B- | Email:mari@gmail.com', NULL, 1, 2),
(58, '2020-10-19 00:01:18', 'CIUDADANO', '8341123', '127.0.0.1', 'Nombres:JOSE MARIA | Apellidos:ROMERO LANZA | Sexo:M | Nacionalidad:BOLIVIANA | Fecha Nacimiento:1991-07-16 | Direccion:AV. BUSH | Grupo Sanguineo:B- | Email:joma@gmail.com', NULL, 1, 2),
(59, '2020-10-19 00:01:41', 'LOGOUT', NULL, '127.0.0.1', NULL, NULL, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `capitulos`
--

CREATE TABLE `capitulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `id_titulo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `capitulos`
--

INSERT INTO `capitulos` (`id`, `nombre`, `estado`, `id_titulo`) VALUES
(1, 'DE LAS INFRACCIONES Y SANCIONES', 0, 1),
(2, 'DE LAS NORMAS DE LA APLICACION DE LAS SANCIONES', 0, 1),
(3, 'CAPITULO DE PRUEBA', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `categoria` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`categoria`, `nombre`, `descripcion`, `estado`) VALUES
('A', 'Profesional A', 'Esta licencia está permitido para personas conducir vehículos de la categoría P. Vehículos como automóviles, vagonetas, camionetas, jeeps y minibuses, con 10 pasajeros. Carga hasta de 2 1/2 toneladas', 0),
('B', 'Profesional B', 'Esta licencia está permitido para personas conducir vehículos de las categorías P y Profesional A. Vehículos como minibuses, micros, escolar, turístico y de emergencia, con 25 pasajeros. Carga hasta 6 toneladas', 0),
('C', 'Profesional C', 'Licencia permite a personas conducir vehículos de las categorías P y Profesionales A y B. Vehículos como micros, colectivos, buses, camiones medianos, de alto tonelaje, con y sin acople, volquetas y cisternas, con 25 pasajeros. Carga superior 6 toneladas', 0),
('P', 'Particular P', 'Esta licencia está especialmente determinada, para personas que puedan conducir automóviles, camionetas, vagonetas de uso particular, con capacidad de hasta 7 ocupantes, incluyendo al conductor', 0),
('X', 'Test', 'just testing!!!!!!', 1);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `nombre` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `nombre`, `estado`) VALUES
(1, 'AZUL', 0),
(2, 'ROJO', 0),
(3, 'VERDE', 0),
(4, 'NEGRO', 0),
(5, 'BLANCO', 0),
(6, 'PLATA', 0),
(7, 'GRIS', 0),
(8, 'CELESTE', 0),
(9, 'NARANJA', 0),
(10, 'NEGRO', 0);

-- --------------------------------------------------------

--
-- Table structure for table `detalle_multas`
--

CREATE TABLE `detalle_multas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_multa` bigint(20) UNSIGNED NOT NULL,
  `id_infraccion` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detalle_multas`
--

INSERT INTO `detalle_multas` (`id`, `id_multa`, `id_infraccion`) VALUES
(1, 1, 3),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historials`
--

CREATE TABLE `historials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa_vehiculo` char(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `historials`
--

INSERT INTO `historials` (`id`, `fecha_hora`, `descripcion`, `placa_vehiculo`) VALUES
(1, '2020-10-18 21:34:48', 'Identificacion del documento Reporte 1 Reportado por el ciudadano:8341890', '123QWE'),
(2, '2020-10-18 22:31:30', 'Identificacion de la multa 1 Multado por el oficial:mario12345 con los siguientes codigos de infracciones:3, |  Monto:200', '123QWE'),
(3, '2020-10-18 23:37:12', 'Identificacion de la multa 2 Multado por el oficial:mario12345 con los siguientes codigos de infracciones:1, |  Monto:100', '123QWE'),
(4, '2020-10-18 23:41:44', 'Identificacion de la multa 3 Multado por el oficial:mario12345 con los siguientes codigos de infracciones:1, |  Monto:100', '123QWE');

-- --------------------------------------------------------

--
-- Table structure for table `infraccions`
--

CREATE TABLE `infraccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `id_capitulo` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infraccions`
--

INSERT INTO `infraccions` (`id`, `descripcion`, `monto`, `estado`, `id_capitulo`) VALUES
(1, 'POR CIRCULAR CON UN VEHICULO SIN PLACA', 100, 0, 1),
(2, 'POR EXCESO EN EL TRANSPORTE DE PASAJEROS O CARGA', 200, 0, 1),
(3, 'POR CIRCULAR CON EXCESO DE VELOCIDAD', 200, 0, 1),
(4, 'POR ENCANDILARES LOS CRUCES', 500, 0, 1),
(5, 'POR CIRCULAR CONTRA RUTA SEÑALIZADA', 100, 0, 1),
(6, 'POR ESTACIONAR O DETENER EL VEHICULO EN LA CARRETERA EN FORMA QUE HAGA PELIGROSO', 400, 0, 1),
(7, 'POR OMITIR LAS SEÑALES REGLAMENTARIAS EN EL CASO DE TRANSPORTE DE CARGA PELIGROSAS', 200, 0, 1),
(8, 'POR LLEVAR PASAJEROS O PERMITIRLOS CUANDO SE TRANSPORTE CARGAS PELIGROSAS', 400, 0, 1),
(9, 'POR VIAJAR SIN EQUIPO, HERRAMIENTAS, SEÑALES DE EMERGENCIAS E IMPLEMENTO DE AUXILIO', 100, 0, 1),
(10, 'POR UTILIZAR EL VEHICULO EN USO DISTINTO AL QUE SE HALLA DESTINADO', 50, 0, 1),
(11, 'POR NEGARSE A EXHIBIR EL BREVET, LICENCIA O AUTORIZACION DE CONDUCTOR A LA AUTORIDAD DE TRANSITO', 50, 0, 1),
(12, 'POR NO OBSERVAR LAS SEÑALES DE TRANSITO', 50, 0, 1),
(13, 'POR EFECTUAR MANIOBRA ZIGZAG', 50, 0, 1),
(14, 'POR CIRCULAR POR UNA VIA DE TRANSITO SUSPENDIDO', 30, 0, 1),
(15, 'POR ESTACIONAR INCORRECTAMENTE EN VIAS URBANAS', 20, 0, 1),
(16, 'POR NO CONSERVAR SU DERECHA AL CONDUCIR UN VEHICULO', 20, 0, 1),
(17, 'POR LLEVAR PASAJEROS COMO CONDICION PARA PRESTARLES EL SERVICIO', 30, 0, 1),
(18, 'POR ENTREGAR AL CONDUCTOR SU LICENCIA O BREVET EN PRENDA', 50, 0, 1),
(19, 'POR CIRCULAR SIN LIMPIABRISAS', 20, 0, 1),
(20, 'EN CASO DE QUE EL INFRACTOR SE NIEGUE A CANCELAR MULTA', 50, 0, 2),
(123, 'INFRACCION DE PRUEBA!', 300, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `licencia_a_s`
--

CREATE TABLE `licencia_a_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emision` date NOT NULL,
  `vencimiento` date NOT NULL,
  `lentes` tinyint(1) NOT NULL,
  `audifonos` tinyint(1) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `ci_persona` bigint(20) UNSIGNED NOT NULL,
  `categoria_licencia` char(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licencia_a_s`
--

INSERT INTO `licencia_a_s` (`id`, `emision`, `vencimiento`, `lentes`, `audifonos`, `cover_image`, `estado`, `ci_persona`, `categoria_licencia`) VALUES
(1, '2020-10-18', '2024-10-18', 1, 1, 'WhatsApp Image 2020-10-06 at 4.54.33 PM_1603070312.jpeg', 0, 8341182, 'P');

-- --------------------------------------------------------

--
-- Table structure for table `licencia_m_s`
--

CREATE TABLE `licencia_m_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emision` date NOT NULL,
  `vencimiento` date NOT NULL,
  `lentes` tinyint(1) NOT NULL,
  `audifonos` tinyint(1) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `ci_persona` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licencia_m_s`
--

INSERT INTO `licencia_m_s` (`id`, `emision`, `vencimiento`, `lentes`, `audifonos`, `cover_image`, `estado`, `ci_persona`) VALUES
(1, '2020-10-18', '2024-10-18', 1, 0, 'noimage.jpg', 0, 8341091);

-- --------------------------------------------------------

--
-- Table structure for table `licencia_t_s`
--

CREATE TABLE `licencia_t_s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `emision` date NOT NULL,
  `vencimiento` date NOT NULL,
  `lentes` tinyint(1) NOT NULL,
  `audifonos` tinyint(1) NOT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `ci_persona` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `licencia_t_s`
--

INSERT INTO `licencia_t_s` (`id`, `emision`, `vencimiento`, `lentes`, `audifonos`, `cover_image`, `estado`, `ci_persona`) VALUES
(1, '2020-10-18', '2024-10-18', 1, 1, 'noimage.jpg', 1, 8341123);

-- --------------------------------------------------------

--
-- Table structure for table `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marcas`
--

INSERT INTO `marcas` (`id`, `marca`, `estado`) VALUES
(1, 'NISSAN', 0),
(2, 'TOYOTA', 0),
(3, 'SUZUKI', 0),
(4, 'HONDA', 0),
(5, 'TESLA', 0),
(6, 'VOLSWAGEN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(156, '2014_10_11_033527_create_personas_table', 1),
(157, '2014_10_12_000000_create_users_table', 1),
(158, '2014_10_12_034531_create_operacions_table', 1),
(159, '2014_10_12_034532_create_bitacoras_table', 1),
(160, '2014_10_12_100000_create_password_resets_table', 1),
(161, '2015_01_20_084450_create_roles_table', 1),
(162, '2015_01_20_084525_create_role_user_table', 1),
(163, '2015_01_24_080208_create_permissions_table', 1),
(164, '2015_01_24_080433_create_permission_role_table', 1),
(165, '2015_12_04_003040_add_special_role_column', 1),
(166, '2017_10_17_170735_create_permission_user_table', 1),
(167, '2019_08_19_000000_create_failed_jobs_table', 1),
(168, '2020_07_09_040813_create_telefonos_table', 1),
(169, '2020_07_09_042937_create_licencia_t_s_table', 1),
(170, '2020_07_09_045025_create_licencia_m_s_table', 1),
(171, '2020_07_09_045147_create_categorias_table', 1),
(172, '2020_07_09_045148_create_licencia_a_s_table', 1),
(173, '2020_07_11_052143_create_colors_table', 1),
(174, '2020_07_11_052232_create_tipo_vehiculos_table', 1),
(175, '2020_07_11_052233_create_vehiculos_table', 1),
(176, '2020_07_11_060814_create_seguros_table', 1),
(177, '2020_07_11_062413_create_historials_table', 1),
(178, '2020_07_11_071131_create_titulos_table', 1),
(179, '2020_07_11_071132_create_capitulos_table', 1),
(180, '2020_07_11_071133_create_infraccions_table', 1),
(181, '2020_07_11_073854_create_multas_table', 1),
(182, '2020_07_11_074231_create_detalle_multas_table', 1),
(183, '2020_07_30_010725_create_products_table', 1),
(184, '2020_08_01_032518_create_reportes_table', 1),
(185, '2020_08_10_093142_create_marcas_table', 1),
(186, '2020_08_10_093153_create_nombres_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `multas`
--

CREATE TABLE `multas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_infractor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nrolicencia_infractor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_licencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `fecha_hora` datetime NOT NULL,
  `codigo_oficial` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa_vehiculo` char(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sended_email` tinyint(1) NOT NULL DEFAULT 1,
  `sended_sms` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multas`
--

INSERT INTO `multas` (`id`, `descripcion`, `nombre_infractor`, `nrolicencia_infractor`, `tipo_licencia`, `estado`, `fecha_hora`, `codigo_oficial`, `placa_vehiculo`, `sended_email`, `sended_sms`) VALUES
(1, 'CONDUCTOR FUE ENCONTRADO CON CARGA EXTREMA Y CONDUCIENDO ALTAS VELOCIDAD EN LA AV. SANTOS DUMONT', 'FERNANDO AMELLER', '8341182', 'LICENCIA A', 0, '2020-10-18 22:31:30', 'mario12345', '123QWE', 1, 1),
(2, 'TESTING', 'FERNANDO AMELLER', '8341181', 'LICENCIA A', 0, '2020-10-18 23:37:12', 'mario12345', '123QWE', 1, 1),
(3, 'TESTING', 'FERNANDO AMELLER', '8341181', 'LICENCIA A', 0, '2020-10-18 23:41:44', 'mario12345', '123QWE', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nombres`
--

CREATE TABLE `nombres` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `id_marca` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nombres`
--

INSERT INTO `nombres` (`id`, `nombre`, `estado`, `id_marca`) VALUES
(1, 'ALTIMA', 0, 1),
(2, 'QASHQAI', 0, 1),
(3, 'COROLLA', 0, 2),
(4, 'BALENO', 0, 3),
(5, 'VITARA', 0, 3),
(6, 'IGNIS', 0, 3),
(7, 'PILOT', 0, 4),
(8, 'CIVIC', 0, 4),
(9, 'MODEL 3', 0, 5),
(10, 'GOL', 0, 6),
(11, 'X', 0, 5),
(12, 'JETTA', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `operacions`
--

CREATE TABLE `operacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `operacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `operacions`
--

INSERT INTO `operacions` (`id`, `operacion`) VALUES
(1, 'REGISTRAR'),
(2, 'ELIMINAR'),
(3, 'EDITAR'),
(4, 'LOGIN'),
(5, 'LOGOUT');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Navegar Usuarios', 'users.index', 'Lista y navega todos los usuarios del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(2, 'Crear Usuarios', 'users.create', 'Crear usuarios al sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(3, 'Ver Usuarios', 'users.show', 'Ver detalles de los usuarios del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(4, 'Editar Usuarios', 'users.edit', 'Editar datos de los usuarios del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(5, 'Eliminar Usuarios', 'users.destroy', 'Eliminar cualquier usuarios del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(6, 'Navegar Roles', 'roles.index', 'Lista y navega todos los roles del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(7, 'Ver Roles', 'roles.show', 'Ver detalles de los roles del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(8, 'Crear Roles', 'roles.create', 'Crear roles en el sistema sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(9, 'Editar Roles', 'roles.edit', 'Editar cualquier roles del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(10, 'Eliminar Roles', 'roles.destroy', 'Eliminar cualquier roles del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(11, 'Navegar Vehiculo', 'vehiculo.index', 'Lista y navega todos los vehiculos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(12, 'Ver Vehiculo', 'vehiculo.show', 'Ver detalles de los vehiculos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(13, 'Crear Vehiculo', 'vehiculo.create', 'Crear vehiculos al sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(14, 'Editar Vehiculo', 'vehiculo.edit', 'Editar cualquier vehiculos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(15, 'Eliminar Vehiculo', 'vehiculo.destroy', 'Eliminar cualquier vehiculos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(16, 'Navegar Multa', 'multa.index', 'Lista y navega todos los multas del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(17, 'Ver Multa', 'multa.show', 'Ver detalles de los multas del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(18, 'Crear Multa', 'multa.create', 'Crear multas al sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(19, 'Editar Multa', 'multa.edit', 'Editar cualquier multas del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(20, 'Eliminar Multa', 'multa.destroy', 'Eliminar cualquier multas del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(21, 'Navegar Oficial', 'oficial.index', 'Lista y navega todos los oficials del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(22, 'Ver Oficial', 'oficial.show', 'Ver detalles de los oficials del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(23, 'Crear Oficial', 'oficial.create', 'Crear oficials al sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(24, 'Editar Oficial', 'oficial.edit', 'Editar cualquier oficials del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(25, 'Eliminar Oficial', 'oficial.destroy', 'Eliminar cualquier oficials del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(26, 'Navegar Ciudadano', 'ciudadano.index', 'Lista y navega todos los ciudadanos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(27, 'Ver Ciudadano', 'ciudadano.show', 'Ver detalles de los ciudadanos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(28, 'Crear Ciudadano', 'ciudadano.create', 'Crear ciudadanos al sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(29, 'Editar Ciudadano', 'ciudadano.edit', 'Editar cualquier ciudadanos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(30, 'Eliminar Ciudadano', 'ciudadano.destroy', 'Eliminar cualquier ciudadanos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(31, 'Navegar Licencias T', 'licenciasT.index', 'Lista y navega todos las licenciasT del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(32, 'Ver Licencias T', 'licenciasT.show', 'Ver detalles de las licenciasT del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(33, 'Crear Licencias T', 'licenciasT.create', 'Crear licenciasT en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(34, 'Editar Licencias T', 'licenciasT.edit', 'Editar cualquier licenciasT del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(35, 'Eliminar Licencias T', 'licenciasT.destroy', 'Eliminar cualquier ciudadanos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(36, 'Navegar Licencias M', 'licenciasM.index', 'Lista y navega todos las licenciasM del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(37, 'Ver Licencias M', 'licenciasM.show', 'Ver detalles de las licenciasM del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(38, 'Crear Licencias M', 'licenciasM.create', 'Crear licenciasM en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(39, 'Editar Licencias M', 'licenciasM.edit', 'Editar cualquier licenciasM del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(40, 'Eliminar Licencias M', 'licenciasM.destroy', 'Eliminar cualquier licenciasM del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(41, 'Navegar licencias A', 'licenciasA.index', 'Lista y navega todos las licenciasA del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(42, 'Ver licencias A', 'licenciasA.show', 'Ver detalles de las licenciasA del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(43, 'Crear licencias A', 'licenciasA.create', 'Crear licenciasA en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(44, 'Editar licencias A', 'licenciasA.edit', 'Editar cualquier licenciasA del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(45, 'Eliminar licencias A', 'licenciasA.destroy', 'Eliminar cualquier licenciasA del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(46, 'Navegar infraccion', 'infraccion.index', 'Lista y navega todos las infraccion del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(47, 'Crear infraccion', 'infraccion.create', 'Crear infraccion en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(48, 'Editar infraccion', 'infraccion.edit', 'Editar cualquier infraccion del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(49, 'Eliminar infraccion', 'infraccion.destroy', 'Eliminar cualquier infraccion del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(50, 'Navegar categorias', 'categorias.index', 'Lista y navega todos las categorias del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(51, 'Crear categorias', 'categorias.create', 'Crear categorias en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(52, 'Editar categorias', 'categorias.edit', 'Editar cualquier categorias del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(53, 'Eliminar categorias', 'categorias.destroy', 'Eliminar cualquier categorias del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(54, 'Navegar reporte', 'reporte.index', 'Lista y navega todos los reporte del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(55, 'Ver reporte', 'reporte.show', 'Ver detalles de los reporte del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(56, 'Crear reporte', 'reporte.create', 'Crear reporte en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(57, 'Eliminar reporte', 'reporte.destroy', 'Eliminar cualquier reporte del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(58, 'Navegar seguro', 'seguro.index', 'Lista y navega todos los seguro del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(59, 'Ver seguro', 'seguro.show', 'Ver detalles de los seguro del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(60, 'Crear seguro', 'seguro.create', 'Crear seguro en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(61, 'Editar seguro', 'seguro.edit', 'Editar cualquier seguro vehicular del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(62, 'Eliminar seguro', 'seguro.destroy', 'Eliminar cualquier seguro del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(63, 'Navegar marcas de autos', 'marcas.index', 'Lista y navega todos los marcas de autos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(64, 'Crear marcas de autos', 'marcas.create', 'Crear marca de auto en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(65, 'Editar marca', 'marcas.edit', 'Editar cualquier marca vehicular del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(66, 'Eliminar marcas de autos', 'marcas.destroy', 'Eliminar cualquier marca de auto del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(67, 'Navegar nombres de marcas', 'nombre.index', 'Lista y navega todos los nombres de marcas del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(68, 'Crear nombre de autos', 'nombre.create', 'Crear nombre de marca en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(69, 'Editar nombre de autos', 'nombre.edit', 'Editar cualquier nombre vehicular del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(70, 'Eliminar nombre de autos', 'nombre.destroy', 'Eliminar cualquier nombre de marca del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(71, 'Navegar titulos del Codigo de Transito', 'titulos.index', 'Lista y navega todos los titulos del Codigo de Transito en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(72, 'Crear titulos', 'titulos.create', 'Crear titulos del Codigo de Transito  al sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(73, 'Editar titulos', 'titulos.edit', 'Editar cualquier titulo del Codigo de Transito del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(74, 'Eliminar titulos', 'titulos.destroy', 'Eliminar cualquier titulos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(75, 'Navegar Capitulos de Titulo del Codigo de Transito', 'capitulos.index', 'Lista y navega todos los capitulos en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(76, 'Crear capitulos', 'capitulos.create', 'Crear capitulos en el sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(77, 'Editar capitulos', 'capitulos.edit', 'Editar cualquier capitulos', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(78, 'Eliminar capitulos', 'capitulos.destroy', 'Eliminar cualquier capitulos del sistema', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(79, 'Visualizar Bitacora', 'bitacora.index', 'Solo acceso administrativo permitido', '2020-10-19 00:42:00', '2020-10-19 00:42:00'),
(80, 'Consultar Licencias', 'pages.consulta', 'Consulta de todas las licencias que tenga el ciudadano', '2020-10-19 00:42:00', '2020-10-19 00:42:00');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 11, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(2, 12, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(3, 13, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(4, 14, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(5, 15, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(6, 16, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(7, 17, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(8, 20, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(9, 21, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(10, 22, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(11, 23, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(12, 24, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(13, 25, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(14, 26, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(15, 27, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(16, 28, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(17, 29, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(18, 30, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(19, 31, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(20, 32, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(21, 33, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(22, 34, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(23, 35, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(24, 36, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(25, 37, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(26, 38, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(27, 39, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(28, 40, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(29, 41, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(30, 42, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(31, 43, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(32, 44, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(33, 45, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(34, 54, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(35, 55, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(36, 56, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(37, 57, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(38, 58, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(39, 59, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(40, 60, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(41, 61, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(42, 62, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(43, 63, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(44, 64, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(45, 65, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(46, 66, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(47, 67, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(48, 68, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(49, 69, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(50, 70, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32'),
(51, 80, 3, '2020-10-19 01:04:32', '2020-10-19 01:04:32');

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personas`
--

CREATE TABLE `personas` (
  `ci` bigint(20) UNSIGNED NOT NULL,
  `nombres` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sexo` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grupo_sanguineo` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_oficial` char(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado_ciudadano` tinyint(1) DEFAULT NULL,
  `estado_oficial` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personas`
--

INSERT INTO `personas` (`ci`, `nombres`, `apellidos`, `sexo`, `nacionalidad`, `fecha_nacimiento`, `direccion`, `grupo_sanguineo`, `email`, `codigo_oficial`, `estado_ciudadano`, `estado_oficial`) VALUES
(8341091, 'LUIS CARLOS', 'MARTINEZ SANCHEZ', 'M', 'BOLIVIANA', '1996-11-02', 'AV. BENI', 'A+', 'lucarlos@gmail.com', NULL, 0, NULL),
(8341123, 'JOSE MARIA', 'ROMERO LANZA', 'M', 'BOLIVIANA', '1991-07-16', 'AV. BUSH', 'B-', 'joma@gmail.com', NULL, 1, NULL),
(8341181, 'JOSEFINA MARIELA', 'DO SANTO MELLINI', 'F', 'EXTRANJERO', '1992-03-27', 'AV. BANZER', 'O+', 'josef@gmail.com', 'josef67890', 0, 0),
(8341182, 'FERNANDO', 'AMELLER', 'M', 'BOLIVIANA', '1997-03-12', 'URUBO', 'ORH+', 'fercho199758@gmail.com', 'fercho12345', 0, 0),
(8341189, 'MARIO', 'VACA MENDOZA', 'M', 'BOLIVIANA', '1990-09-22', 'AV. ALEMANA', 'A-', 'mario@gmail.com', 'mario12345', 0, 0),
(8341345, 'JULIAN', 'MERCADO BARBA', 'M', 'BOLIVIANA', '1899-06-27', 'AV. PARAGUA 2DO ANILLO', 'O-', 'juli@gmail.com', NULL, 0, NULL),
(8341890, 'MARIANA', 'CUETO BALLIVIAN', 'F', 'BOLIVIANA', '1993-07-12', 'AV. SAN MARTIN', 'B-', 'mari@gmail.com', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reportes`
--

CREATE TABLE `reportes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_persona` int(10) UNSIGNED NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `placa_vehiculo` char(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reportes`
--

INSERT INTO `reportes` (`id`, `descripcion`, `ci_persona`, `fecha_hora`, `estado`, `placa_vehiculo`) VALUES
(1, 'VEHICULO FUE ROBADO EN EL CENTRO DE LA CIUDAD DE SANTA CRUZ DE LA SIERRA A HORAS DE LAS 2-3 AM EL DIA DOMINGO 13 DE OCTUBRE', 8341890, '2020-10-18 21:34:48', 0, '123QWE');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `special` enum('all-access','no-access') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `special`) VALUES
(1, 'Admin', 'admin', NULL, '2020-10-19 00:42:00', '2020-10-19 00:42:00', 'all-access'),
(2, 'Suspendido', 'suspendido', NULL, '2020-10-19 00:42:00', '2020-10-19 00:42:00', 'no-access'),
(3, 'Operador', 'operador', 'Operador administrativo', '2020-10-19 01:04:32', '2020-10-19 01:04:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 3, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seguros`
--

CREATE TABLE `seguros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `empresa` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emision` date NOT NULL,
  `vencimiento` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `placa_vehiculo` char(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seguros`
--

INSERT INTO `seguros` (`id`, `empresa`, `emision`, `vencimiento`, `estado`, `placa_vehiculo`) VALUES
(1, 'FORTALEZA', '2020-10-18', '2021-10-18', 0, '123QWE');

-- --------------------------------------------------------

--
-- Table structure for table `telefonos`
--

CREATE TABLE `telefonos` (
  `numero` int(10) UNSIGNED NOT NULL,
  `ci_persona` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `telefonos`
--

INSERT INTO `telefonos` (`numero`, `ci_persona`) VALUES
(74551511, 8341182);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_vehiculos`
--

CREATE TABLE `tipo_vehiculos` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `descripcion` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipo_vehiculos`
--

INSERT INTO `tipo_vehiculos` (`id`, `descripcion`, `estado`) VALUES
(1, 'AUTO', 0),
(2, 'CAMIONETA', 0),
(3, 'VAGONETA', 0),
(4, 'MINIVAN', 0),
(5, 'COMPACTO', 0),
(6, 'HATCHBACK', 0),
(7, 'CAMION', 0),
(8, 'SEDAN', 0),
(9, 'Testing', 1);

-- --------------------------------------------------------

--
-- Table structure for table `titulos`
--

CREATE TABLE `titulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `titulos`
--

INSERT INTO `titulos` (`id`, `nombre`, `estado`) VALUES
(1, 'DE LAS FALTAS Y SANCIONES', 0),
(2, 'TITULO DE PRUEBA', 0),
(3, 'JUST TESTING', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `codigo_oficial` char(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `remember_token`, `created_at`, `updated_at`, `estado`, `codigo_oficial`) VALUES
(1, 'admin', '$2y$10$ynN6YChrvda.vbugg09aLOjdNxNZHwRLTRodfNuqknqvTVyJvYG8G', 'fercho199758@gmail.com', 'rBWCxQ0D9ft3rEYSO8PcEtuaK66uUUG32qEZUcMAIlcsvLwD6ly5Mf9sWH7X', '2020-10-19 00:42:00', '2020-10-19 00:42:00', 0, 'fercho12345'),
(2, 'mario', '$2y$10$v9eBcDxyZFRnB78AlEBR2u4Oz285v7gjLX6GVox9QKbqcnXs.IXx2', 'mario@gmail.com', 'ytfPvkLQ1lZv2UNMvVTZgN8CkEowOtGgQEW33xXJ', '2020-10-19 00:51:49', '2020-10-19 01:04:43', 0, 'mario12345');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `placa` char(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` char(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` int(11) NOT NULL,
  `nrochasis` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nromotor` char(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 0,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_color` tinyint(3) UNSIGNED NOT NULL,
  `id_tipovehiculo` tinyint(3) UNSIGNED NOT NULL,
  `ci_persona` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`placa`, `marca`, `nombre`, `modelo`, `nrochasis`, `nromotor`, `estado`, `cover_image`, `id_color`, `id_tipovehiculo`, `ci_persona`, `created_at`, `updated_at`) VALUES
('123QWE', 'NISSAN', 'ALTIMA', 2015, '1234QWER', '5678ASD', 0, 'NissanAltima_1603071194.jpg', 2, 8, 8341182, '2020-10-19 01:33:14', '2020-10-19 01:33:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bitacoras`
--
ALTER TABLE `bitacoras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bitacoras_id_usuario_foreign` (`id_usuario`),
  ADD KEY `bitacoras_id_operacion_foreign` (`id_operacion`);

--
-- Indexes for table `capitulos`
--
ALTER TABLE `capitulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `capitulos_id_titulo_foreign` (`id_titulo`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detalle_multas`
--
ALTER TABLE `detalle_multas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_multas_id_multa_foreign` (`id_multa`),
  ADD KEY `detalle_multas_id_infraccion_foreign` (`id_infraccion`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `historials`
--
ALTER TABLE `historials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historials_placa_vehiculo_foreign` (`placa_vehiculo`);

--
-- Indexes for table `infraccions`
--
ALTER TABLE `infraccions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infraccions_id_capitulo_foreign` (`id_capitulo`);

--
-- Indexes for table `licencia_a_s`
--
ALTER TABLE `licencia_a_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licencia_a_s_ci_persona_foreign` (`ci_persona`),
  ADD KEY `licencia_a_s_categoria_licencia_foreign` (`categoria_licencia`);

--
-- Indexes for table `licencia_m_s`
--
ALTER TABLE `licencia_m_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licencia_m_s_ci_persona_foreign` (`ci_persona`);

--
-- Indexes for table `licencia_t_s`
--
ALTER TABLE `licencia_t_s`
  ADD PRIMARY KEY (`id`),
  ADD KEY `licencia_t_s_ci_persona_foreign` (`ci_persona`);

--
-- Indexes for table `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `multas_placa_vehiculo_foreign` (`placa_vehiculo`);

--
-- Indexes for table `nombres`
--
ALTER TABLE `nombres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombres_id_marca_foreign` (`id_marca`);

--
-- Indexes for table `operacions`
--
ALTER TABLE `operacions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_slug_unique` (`slug`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission_user_permission_id_index` (`permission_id`),
  ADD KEY `permission_user_user_id_index` (`user_id`);

--
-- Indexes for table `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`ci`),
  ADD UNIQUE KEY `personas_email_unique` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reportes_placa_vehiculo_foreign` (`placa_vehiculo`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD UNIQUE KEY `roles_slug_unique` (`slug`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_index` (`role_id`),
  ADD KEY `role_user_user_id_index` (`user_id`);

--
-- Indexes for table `seguros`
--
ALTER TABLE `seguros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguros_placa_vehiculo_foreign` (`placa_vehiculo`);

--
-- Indexes for table `telefonos`
--
ALTER TABLE `telefonos`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `telefonos_ci_persona_foreign` (`ci_persona`);

--
-- Indexes for table `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `titulos`
--
ALTER TABLE `titulos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `vehiculos_id_color_foreign` (`id_color`),
  ADD KEY `vehiculos_id_tipovehiculo_foreign` (`id_tipovehiculo`),
  ADD KEY `vehiculos_ci_persona_foreign` (`ci_persona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bitacoras`
--
ALTER TABLE `bitacoras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `capitulos`
--
ALTER TABLE `capitulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `detalle_multas`
--
ALTER TABLE `detalle_multas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `historials`
--
ALTER TABLE `historials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `infraccions`
--
ALTER TABLE `infraccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `licencia_a_s`
--
ALTER TABLE `licencia_a_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `licencia_m_s`
--
ALTER TABLE `licencia_m_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `licencia_t_s`
--
ALTER TABLE `licencia_t_s`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `multas`
--
ALTER TABLE `multas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nombres`
--
ALTER TABLE `nombres`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `operacions`
--
ALTER TABLE `operacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `permission_user`
--
ALTER TABLE `permission_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personas`
--
ALTER TABLE `personas`
  MODIFY `ci` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8341891;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seguros`
--
ALTER TABLE `seguros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `telefonos`
--
ALTER TABLE `telefonos`
  MODIFY `numero` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74551512;

--
-- AUTO_INCREMENT for table `tipo_vehiculos`
--
ALTER TABLE `tipo_vehiculos`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `titulos`
--
ALTER TABLE `titulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bitacoras`
--
ALTER TABLE `bitacoras`
  ADD CONSTRAINT `bitacoras_id_operacion_foreign` FOREIGN KEY (`id_operacion`) REFERENCES `operacions` (`id`),
  ADD CONSTRAINT `bitacoras_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Constraints for table `capitulos`
--
ALTER TABLE `capitulos`
  ADD CONSTRAINT `capitulos_id_titulo_foreign` FOREIGN KEY (`id_titulo`) REFERENCES `titulos` (`id`);

--
-- Constraints for table `detalle_multas`
--
ALTER TABLE `detalle_multas`
  ADD CONSTRAINT `detalle_multas_id_infraccion_foreign` FOREIGN KEY (`id_infraccion`) REFERENCES `infraccions` (`id`),
  ADD CONSTRAINT `detalle_multas_id_multa_foreign` FOREIGN KEY (`id_multa`) REFERENCES `multas` (`id`);

--
-- Constraints for table `historials`
--
ALTER TABLE `historials`
  ADD CONSTRAINT `historials_placa_vehiculo_foreign` FOREIGN KEY (`placa_vehiculo`) REFERENCES `vehiculos` (`placa`);

--
-- Constraints for table `infraccions`
--
ALTER TABLE `infraccions`
  ADD CONSTRAINT `infraccions_id_capitulo_foreign` FOREIGN KEY (`id_capitulo`) REFERENCES `capitulos` (`id`);

--
-- Constraints for table `licencia_a_s`
--
ALTER TABLE `licencia_a_s`
  ADD CONSTRAINT `licencia_a_s_categoria_licencia_foreign` FOREIGN KEY (`categoria_licencia`) REFERENCES `categorias` (`categoria`),
  ADD CONSTRAINT `licencia_a_s_ci_persona_foreign` FOREIGN KEY (`ci_persona`) REFERENCES `personas` (`ci`);

--
-- Constraints for table `licencia_m_s`
--
ALTER TABLE `licencia_m_s`
  ADD CONSTRAINT `licencia_m_s_ci_persona_foreign` FOREIGN KEY (`ci_persona`) REFERENCES `personas` (`ci`);

--
-- Constraints for table `licencia_t_s`
--
ALTER TABLE `licencia_t_s`
  ADD CONSTRAINT `licencia_t_s_ci_persona_foreign` FOREIGN KEY (`ci_persona`) REFERENCES `personas` (`ci`);

--
-- Constraints for table `multas`
--
ALTER TABLE `multas`
  ADD CONSTRAINT `multas_placa_vehiculo_foreign` FOREIGN KEY (`placa_vehiculo`) REFERENCES `vehiculos` (`placa`);

--
-- Constraints for table `nombres`
--
ALTER TABLE `nombres`
  ADD CONSTRAINT `nombres_id_marca_foreign` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`);

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `reportes_placa_vehiculo_foreign` FOREIGN KEY (`placa_vehiculo`) REFERENCES `vehiculos` (`placa`);

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seguros`
--
ALTER TABLE `seguros`
  ADD CONSTRAINT `seguros_placa_vehiculo_foreign` FOREIGN KEY (`placa_vehiculo`) REFERENCES `vehiculos` (`placa`);

--
-- Constraints for table `telefonos`
--
ALTER TABLE `telefonos`
  ADD CONSTRAINT `telefonos_ci_persona_foreign` FOREIGN KEY (`ci_persona`) REFERENCES `personas` (`ci`);

--
-- Constraints for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ci_persona_foreign` FOREIGN KEY (`ci_persona`) REFERENCES `personas` (`ci`),
  ADD CONSTRAINT `vehiculos_id_color_foreign` FOREIGN KEY (`id_color`) REFERENCES `colors` (`id`),
  ADD CONSTRAINT `vehiculos_id_tipovehiculo_foreign` FOREIGN KEY (`id_tipovehiculo`) REFERENCES `tipo_vehiculos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
