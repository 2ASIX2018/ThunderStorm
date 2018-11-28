-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Temps de generació: 28-11-2018 a les 06:43:44
-- Versió del servidor: 5.7.24-0ubuntu0.18.04.1
-- Versió de PHP: 7.2.10-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `ThunderStorm`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `Noticias`
--

CREATE TABLE `Noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(64) DEFAULT NULL,
  `contenido` tinytext,
  `id_autor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `Pedidos`
--

CREATE TABLE `Pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_categoria_pedido` int(11) NOT NULL,
  `slots` int(4) DEFAULT NULL,
  `fecha-pedido` date DEFAULT NULL,
  `fecha-vencimiento` date DEFAULT NULL,
  `estado` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `Servicios`
--

CREATE TABLE `Servicios` (
  `id_servicio` int(11) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `precio_por_slot` varchar(8) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `Servicios`
--

INSERT INTO `Servicios` (`id_servicio`, `nombre`, `precio_por_slot`, `imagen`) VALUES
(1, 'ARK: Survival Evolved', '1.00', './media/gfx/games/ark.jpg'),
(2, 'Arma 3', '0.75', './media/gfx/games/arma3.jpg'),
(3, 'CS:GO', '0.50', './media/gfx/games/csgo.jpg'),
(4, 'Minecraft', '0.10', './media/gfx/games/mc.jpg'),
(5, 'Rust', '0.60', './media/gfx/games/rust.jpg'),
(6, 'Unturned', '0.65', './media/gfx/games/unturned.jpg'),
(7, 'Urban Terror 4', '0.25', './media/gfx/games/rust.jpg');

-- --------------------------------------------------------

--
-- Estructura de la taula `Servidores`
--

CREATE TABLE `Servidores` (
  `id_servidor` int(11) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `capacidad` int(4) DEFAULT NULL,
  `id_propietario` int(11) NOT NULL,
  `id_categoria_servidor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de la taula `Usuarios`
--

CREATE TABLE `Usuarios` (
  `id_usuari` int(11) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `email` varchar(48) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `rol` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Bolcant dades de la taula `Usuarios`
--

INSERT INTO `Usuarios` (`id_usuari`, `nombre`, `email`, `password`, `rol`) VALUES
(1, 'admin', 'admin@thunderstorm.com', '1234', 'admin'),
(2, 'user', 'usuario@usuarioIAW.com', 'user', 'user'),
(9, 'pepito', 'pepito@thunderstorm.com', 'esunaprueba', 'user'),
(10, 'encriptado', 'password@encriptada.com', '*296B26BA33B602372F522695C765CA532FCCA773', 'user'),
(11, 'otroencriptado', 'otro@encriptado.com', '*CF358614AFC7F44D1C40BE1705146410D3BA84EF', 'user'),
(12, 'unomas', 'unomas@unomas.com', '*BB0DF76E8DAD77A2B3486BE4E403B5ADA997B7EA', 'user'),
(13, 'quemasda', 'SiSon@cosasdela.edad', 'quemasda', 'user');

--
-- Indexos per taules bolcades
--

--
-- Index de la taula `Noticias`
--
ALTER TABLE `Noticias`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_Noticias_Usuarios1_idx` (`id_autor`);

--
-- Index de la taula `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD PRIMARY KEY (`id_pedido`,`id_cliente`,`id_categoria_pedido`),
  ADD KEY `fk_Usuarios_has_Servicios_Servicios1_idx` (`id_categoria_pedido`),
  ADD KEY `fk_Usuarios_has_Servicios_Usuarios1_idx` (`id_cliente`);

--
-- Index de la taula `Servicios`
--
ALTER TABLE `Servicios`
  ADD PRIMARY KEY (`id_servicio`);

--
-- Index de la taula `Servidores`
--
ALTER TABLE `Servidores`
  ADD PRIMARY KEY (`id_servidor`),
  ADD KEY `fk_Servidores_Usuarios1_idx` (`id_propietario`),
  ADD KEY `fk_Servidores_Servicios1_idx` (`id_categoria_servidor`);

--
-- Index de la taula `Usuarios`
--
ALTER TABLE `Usuarios`
  ADD PRIMARY KEY (`id_usuari`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `Noticias`
--
ALTER TABLE `Noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Pedidos`
--
ALTER TABLE `Pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Servicios`
--
ALTER TABLE `Servicios`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT per la taula `Servidores`
--
ALTER TABLE `Servidores`
  MODIFY `id_servidor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la taula `Usuarios`
--
ALTER TABLE `Usuarios`
  MODIFY `id_usuari` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Restriccions per taules bolcades
--

--
-- Restriccions per la taula `Noticias`
--
ALTER TABLE `Noticias`
  ADD CONSTRAINT `fk_Noticias_Usuarios1` FOREIGN KEY (`id_autor`) REFERENCES `Usuarios` (`id_usuari`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `Pedidos`
--
ALTER TABLE `Pedidos`
  ADD CONSTRAINT `fk_Usuarios_has_Servicios_Servicios1` FOREIGN KEY (`id_categoria_pedido`) REFERENCES `Servicios` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuarios_has_Servicios_Usuarios1` FOREIGN KEY (`id_cliente`) REFERENCES `Usuarios` (`id_usuari`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restriccions per la taula `Servidores`
--
ALTER TABLE `Servidores`
  ADD CONSTRAINT `fk_Servidores_Servicios1` FOREIGN KEY (`id_categoria_servidor`) REFERENCES `Servicios` (`id_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Servidores_Usuarios1` FOREIGN KEY (`id_propietario`) REFERENCES `Usuarios` (`id_usuari`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
