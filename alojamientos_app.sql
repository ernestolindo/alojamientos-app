-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2024 at 12:06 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alojamientos_app`
--
-- --------------------------------------------------------

--
-- Table structure for table `alojamientos`
--
CREATE DATABASE alojamientos_app;
USE alojamientos_app;

CREATE TABLE `alojamientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `minpersona` INT(10) NOT NULL,
  `maxpersona` INT(10) NOT NULL,
  `departamento` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

select * from alojamientos;
--
-- Dumping data for table `alojamientos`
--

INSERT INTO `alojamientos` (`id`, `nombre`, `descripcion`, `direccion`, `precio`, `imagen`, `minpersona`, `maxpersona`, `departamento`) VALUES
(1, 'Hotel Paradise', 'Un hotel de lujo con todas las comodidades modernas.', 'Avenida Siempre Viva 123', 120.50, '/Alojamientos_app_PHP/public/uploads/hotel-paradaise.jpg', '3', '10', 'la libertad'),
(2, 'Hostal Aurora', 'Alojamiento económico con excelente ubicación.', 'Calle Estrella 45', 30.00, '/Alojamientos_app_PHP/public/uploads/hotel-aurora.jpg', '2', '8', 'la paz'),
(3, 'Casa de Playa', 'Casa privada frente al mar, ideal para vacaciones familiares.', 'Carretera Costera KM 12', 250.00, '/Alojamientos_app_PHP/public/uploads/casa-playa.jpg', '2', '15', 'sonsonate'),
(4, 'Casa de campo', 'Casa en un ambiente primaveral para disfrutar lo hermoso de la naturaleza.', 'ciudad vieja, casa de campo, suchitoto', 175.00, '/Alojamientos_app_PHP/public/uploads/casa-campo.jpg', '1', '10', 'suchitoto');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasenia` varchar(255) NOT NULL,
  `tipo` enum('usuario','admin') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasenia`, `tipo`) VALUES
(1, 'Admin', 'admin@example.com', 'adminpass', 'admin'),
(2, 'Juan Pérez', 'juan.perez@example.com', '123456', 'usuario'),
(3, 'Ana López', 'ana.lopez@example.com', 'password123', 'usuario');

SELECT * FROM usuarios;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_alojamientos`
--

CREATE TABLE `usuarios_alojamientos` (
  `usuario_id` int(11) NOT NULL,
  `alojamiento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios_alojamientos`
--

-- INSERT INTO `usuarios_alojamientos` (`usuario_id`, `alojamiento_id`) VALUES
-- (1, 1),
-- (1, 2),
-- (2, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alojamientos`
--
ALTER TABLE `alojamientos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nombre` (`nombre`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`);

--
-- Indexes for table `usuarios_alojamientos`
--
ALTER TABLE `usuarios_alojamientos`
  ADD PRIMARY KEY (`usuario_id`,`alojamiento_id`),
  ADD KEY `alojamiento_id` (`alojamiento_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alojamientos`
--
ALTER TABLE `alojamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuarios_alojamientos`
--
ALTER TABLE `usuarios_alojamientos`
  ADD CONSTRAINT `usuarios_alojamientos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `usuarios_alojamientos_ibfk_2` FOREIGN KEY (`alojamiento_id`) REFERENCES `alojamientos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
