-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 01, 2023 at 10:28 AM
-- Server version: 8.0.33-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SuperMarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `categoriaId` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`categoriaId`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'negro', 'cosas para jugar', 0x696d6167652e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `clienteId` int NOT NULL,
  `celular` varchar(50) NOT NULL,
  `compañia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`clienteId`, `celular`, `compañia`) VALUES
(1, '32111212124312', 'et'),
(2, '2352352', '14141'),
(3, '3412786', 'khgkg'),
(4, '3291221312', 'Predel'),
(5, 'asxsax', 'asxsax'),
(6, '2352352', 'fgjf'),
(7, '123', '321'),
(8, '232112232', 'Colvver');

-- --------------------------------------------------------

--
-- Table structure for table `empleados`
--

CREATE TABLE `empleados` (
  `empleadoId` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `celular` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `imagen` mediumblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `empleados`
--

INSERT INTO `empleados` (`empleadoId`, `nombre`, `celular`, `direccion`, `imagen`) VALUES
(1, '4eu6', 'rtujht', 'udujsre', 0x757473727475),
(2, 'arture', '35134|151351', 'fsge243t5', 0x6e696f),
(3, 'antonel', '12453322221', 'cll 2  veticuatro 5', 0x6e6f20706f722061686f7261);

-- --------------------------------------------------------

--
-- Table structure for table `facturaDetalle`
--

CREATE TABLE `facturaDetalle` (
  `facturaDetalleId` int NOT NULL,
  `facturaId` int DEFAULT NULL,
  `productoId` int DEFAULT NULL,
  `cantidad` int DEFAULT NULL,
  `precioVenta` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facturaDetalle`
--

INSERT INTO `facturaDetalle` (`facturaDetalleId`, `facturaId`, `productoId`, `cantidad`, `precioVenta`) VALUES
(2, 4, 4, 12, 30000),
(3, 4, 3, 11, 2343),
(4, 2, 2, 12, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `facturas`
--

CREATE TABLE `facturas` (
  `facturaId` int NOT NULL,
  `empleadoId` int DEFAULT NULL,
  `clienteId` int DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `facturas`
--

INSERT INTO `facturas` (`facturaId`, `empleadoId`, `clienteId`, `fecha`) VALUES
(1, 1, 3, '2023-05-17'),
(2, 2, 2, '2023-05-10'),
(3, 3, 4, '2023-05-03'),
(4, 2, 3, '2023-05-03');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `productoId` int NOT NULL,
  `categoriaId` int DEFAULT NULL,
  `precioUnitario` int NOT NULL,
  `stock` int NOT NULL,
  `unidadesPedidas` int NOT NULL,
  `proveedorId` int DEFAULT NULL,
  `nombreProducto` varchar(50) NOT NULL,
  `descontinuado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`productoId`, `categoriaId`, `precioUnitario`, `stock`, `unidadesPedidas`, `proveedorId`, `nombreProducto`, `descontinuado`) VALUES
(2, 1, 4, 3, 2, 3, '1', '5'),
(3, 1, 4, 3, 2, 2, 'cadelo', '5'),
(4, 1, 3, 2, 1, 2, 'nombre', '4');

-- --------------------------------------------------------

--
-- Table structure for table `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedorId` int NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `ciudad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `proveedores`
--

INSERT INTO `proveedores` (`proveedorId`, `nombre`, `telefono`, `ciudad`) VALUES
(2, 'sillas', '3214234', 'cali'),
(3, 'a', 'esry', 'cali');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `empleadoId` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `tipoUsuario` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoriaId`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`clienteId`);

--
-- Indexes for table `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`empleadoId`);

--
-- Indexes for table `facturaDetalle`
--
ALTER TABLE `facturaDetalle`
  ADD PRIMARY KEY (`facturaDetalleId`),
  ADD KEY `facturaId` (`facturaId`),
  ADD KEY `productoId` (`productoId`);

--
-- Indexes for table `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`facturaId`),
  ADD KEY `empleadoId` (`empleadoId`),
  ADD KEY `clienteId` (`clienteId`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`productoId`),
  ADD KEY `categoriaId` (`categoriaId`),
  ADD KEY `proveedorId` (`proveedorId`);

--
-- Indexes for table `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedorId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleadoId` (`empleadoId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoriaId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `clienteId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `empleados`
--
ALTER TABLE `empleados`
  MODIFY `empleadoId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `facturaDetalle`
--
ALTER TABLE `facturaDetalle`
  MODIFY `facturaDetalleId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `facturas`
--
ALTER TABLE `facturas`
  MODIFY `facturaId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `productoId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `proveedorId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `facturaDetalle`
--
ALTER TABLE `facturaDetalle`
  ADD CONSTRAINT `facturaDetalle_ibfk_1` FOREIGN KEY (`facturaId`) REFERENCES `facturas` (`facturaId`),
  ADD CONSTRAINT `facturaDetalle_ibfk_2` FOREIGN KEY (`productoId`) REFERENCES `productos` (`productoId`);

--
-- Constraints for table `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`empleadoId`) REFERENCES `empleados` (`empleadoId`),
  ADD CONSTRAINT `facturas_ibfk_2` FOREIGN KEY (`clienteId`) REFERENCES `clientes` (`clienteId`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoriaId`) REFERENCES `categorias` (`categoriaId`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`proveedorId`) REFERENCES `proveedores` (`proveedorId`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`empleadoId`) REFERENCES `empleados` (`empleadoId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
