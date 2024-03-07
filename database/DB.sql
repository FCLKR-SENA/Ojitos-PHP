-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para ojitos_db1
CREATE DATABASE IF NOT EXISTS `ojitos_db1` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `ojitos_db1`;

-- Volcando estructura para tabla ojitos_db1.adopcion
CREATE TABLE IF NOT EXISTS `adopcion` (
  `id_animaladopcion` int NOT NULL AUTO_INCREMENT,
  `fecha_adopcion` date DEFAULT NULL,
  `animal_adopcioncol` int NOT NULL,
  `usuarios_id_usuario` int NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `probabilidad` decimal(65,0) DEFAULT NULL,
  `adoption_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_animaladopcion`),
  KEY `Animal_Adopcioncol` (`animal_adopcioncol`),
  KEY `fk_adopcion_usuarios1_idx` (`usuarios_id_usuario`),
  CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`animal_adopcioncol`) REFERENCES `animales_en_adopcion` (`id`),
  CONSTRAINT `fk_adopcion_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.adopcion: ~2 rows (aproximadamente)
INSERT INTO `adopcion` (`id_animaladopcion`, `fecha_adopcion`, `animal_adopcioncol`, `usuarios_id_usuario`, `img`, `created_at`, `updated_at`, `probabilidad`, `adoption_status`) VALUES
	(103, '2024-03-03', 90, 51, NULL, '2024-03-03 04:22:28', '2024-03-03 04:22:29', 98, 'Aprobado'),
	(105, NULL, 93, 50, 'storage/images/1709336185_Chiquis.jpg', '2024-03-05 21:11:59', '2024-03-05 21:11:59', 60, 'En proceso');

-- Volcando estructura para tabla ojitos_db1.animales_en_adopcion
CREATE TABLE IF NOT EXISTS `animales_en_adopcion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fechaEncuentro` date DEFAULT NULL,
  `nombreAnimaladopocion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `especie_Animal` enum('Perro','Gato') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `raza` varchar(30) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `observacionesAnimal` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `estadoSolicitud` enum('Disponible','Solicitado','Adoptado','Rechazado') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Disponible',
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.animales_en_adopcion: ~6 rows (aproximadamente)
INSERT INTO `animales_en_adopcion` (`id`, `fechaEncuentro`, `nombreAnimaladopocion`, `especie_Animal`, `raza`, `age`, `observacionesAnimal`, `estadoSolicitud`, `img`, `created_at`, `updated_at`) VALUES
	(89, '2024-02-25', 'Grande', 'Perro', 'Criollo', 24, 'Se dono de un refugio aliado. Falta Desparacitar. Vacunas al dia.', 'Disponible', 'storage/images/1709336216_Grande.jpg', '2024-02-25 08:38:30', '2024-03-01 18:36:56'),
	(90, '2024-02-13', 'Loco', 'Gato', 'Siberiano', 6, 'Gato encontrado en un apto', 'Disponible', 'storage/images/1709336290_Loco.jpg', '2024-02-25 02:43:40', '2024-03-01 18:38:31'),
	(91, '2024-02-13', 'Lion', 'Gato', 'angora', 6, 'Encontrado en santa marta, vacunas al dia. No se entrega solo', 'Disponible', 'storage/images/1709336273_Lion.jpg', '2024-02-25 03:45:45', '2024-03-01 18:37:53'),
	(92, '2024-02-13', 'Labra', 'Perro', 'Criollo', 60, 'Se recogio de un refugio aliado. Vacuna antifelina. Falta desparacitante.', 'Disponible', 'storage/images/1709336245_Labra.jpg', '2024-02-25 04:30:16', '2024-03-01 18:37:25'),
	(93, '2024-02-26', 'Lulu', 'Perro', 'Beagle', 24, 'Encontrada en la calle', 'Disponible', 'storage/images/1709336185_Chiquis.jpg', '2024-02-26 19:52:31', '2024-03-01 18:36:25'),
	(94, '2024-02-27', 'Bear', 'Perro', 'Criollo', 6, 'Gato encontrado en Sta Marta. Vacunas al dia se entrega con su hermano Ramon.', 'Disponible', 'storage/images/1709336150_Bear.jpg', '2024-02-26 20:00:59', '2024-03-01 18:36:06'),
	(95, '2024-02-27', 'Luker', 'Perro', 'Criollo', 25, 'Gato encontrado en un apto', 'Disponible', 'storage/images/1709336130_Luker.jpg', '2024-02-26 20:57:01', '2024-03-01 18:35:31'),
	(96, '2024-03-06', 'Petro', 'Perro', 'Siberiano', 60, 'Perro encontrado a las afueras de la ciudad. Vacuna antirrábica, desparasitado.', 'Disponible', 'storage/images/1709697464_Petro.jpg', '2024-03-05 22:57:45', '2024-03-05 22:57:45');

-- Volcando estructura para tabla ojitos_db1.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `idfactura` int NOT NULL AUTO_INCREMENT,
  `fecha_factura` date NOT NULL,
  `valor_factura` decimal(10,0) NOT NULL,
  `iva` decimal(10,0) NOT NULL,
  `total_factura` decimal(10,0) NOT NULL,
  `usuarios_id_usuario` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idfactura`),
  KEY `fk_factura_usuarios1_idx` (`usuarios_id_usuario`),
  CONSTRAINT `fk_factura_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.factura: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ojitos_db1.factura_details
CREATE TABLE IF NOT EXISTS `factura_details` (
  `factura_idfactura` int NOT NULL,
  `product_id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `iva` decimal(10,0) NOT NULL,
  `products_totals` decimal(10,0) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`factura_idfactura`,`product_id_product`),
  KEY `fk_factura_has_product_product1_idx` (`product_id_product`),
  KEY `fk_factura_has_product_factura1_idx` (`factura_idfactura`),
  CONSTRAINT `fk_factura_has_product_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`),
  CONSTRAINT `fk_factura_has_product_product1` FOREIGN KEY (`product_id_product`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.factura_details: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ojitos_db1.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(50) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.password_resets: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ojitos_db1.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(50) NOT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.password_reset_tokens: ~1 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('faceluker@outlook.es', '$2y$10$aBvJXi026eEmnxfW71JaMOoLH9vrOFKp5OzQGgj.JdlyHG9nKNdYe', '2024-02-28 20:59:10');

-- Volcando estructura para tabla ojitos_db1.pet
CREATE TABLE IF NOT EXISTS `pet` (
  `id_mascota` int NOT NULL AUTO_INCREMENT,
  `pet_name` varchar(100) NOT NULL,
  `pet_sex` enum('Macho','Hembra') NOT NULL,
  `pet_age` int NOT NULL,
  `users_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_mascota`),
  KEY `fk_pet_users1_idx` (`users_id`),
  CONSTRAINT `fk_pet_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.pet: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ojitos_db1.product
CREATE TABLE IF NOT EXISTS `product` (
  `id_product` int NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `stock` int NOT NULL,
  `img` blob,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  UNIQUE KEY `nombre_servicio` (`product_name`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.product: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ojitos_db1.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.roles: ~2 rows (aproximadamente)
INSERT INTO `roles` (`id`, `name`) VALUES
	(1, 'ADMIN'),
	(2, 'STAFF'),
	(3, 'USER');

-- Volcando estructura para tabla ojitos_db1.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `document` varchar(45) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` enum('Activo','Inactivo','Suspendido') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'Activo',
  `age` int NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `roles_idroles` int NOT NULL DEFAULT '3',
  `remember_token` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`document`),
  KEY `fk_users_roles1_idx` (`roles_idroles`),
  CONSTRAINT `fk_users_roles1` FOREIGN KEY (`roles_idroles`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.users: ~6 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `lastname`, `document`, `email`, `password`, `estado`, `age`, `updated_at`, `created_at`, `roles_idroles`, `remember_token`) VALUES
	(49, 'Jefferson Alexander', 'Arenas Zea', '1013671072', 'faceluker@outlook.e', '$2y$10$FOjLcEql267KlVwitBUpEOK4RmpJWR22.AKC6kORL/CmZySgr3VTW', 'Activo', 27, '2024-02-28 20:22:01', '2024-02-21 22:22:22', 1, 'qkgG7k9mGQ2tiYtSakxhCf6Ndr2NhbACMjkX2HGnPXe6IlqTtrJuz7hP7VS5'),
	(50, 'Jose Raul', 'Beltran Sanabria', '234243218', 'faceluker@outlook.es', '$2y$10$RwRPgVYvC7qrwj3f7AYYBeowcELtav39HdjZci1sFKPAQErOj3J92', 'Activo', 27, '2024-02-27 10:58:58', '2024-02-22 23:41:43', 3, NULL),
	(51, 'Mario', 'Casas', '10182677823', 'ojitosmascotas@gmail.com', '$2y$10$LxJAGkh.dOhaIvSlEsbx1eL9gLffqOUySRiLDZvABQsXr.j6GRgAa', 'Activo', 32, '2024-02-28 19:02:53', '2024-02-28 19:02:53', 3, NULL),
	(52, 'Novak', 'Djokovic', '10187858745', 'melosrun7@gmail.com', '$2y$10$KiX3V5TgSd6dAJLj7wlLM.9gCoXF3iMq1NzxK2wrB3Sv/h1/nBFWi', 'Activo', 36, '2024-02-28 19:08:47', '2024-02-28 19:08:47', 3, NULL),
	(53, 'Tom', 'Brady', '10187853269', 'pythiasdamon21@gmail.com', '$2y$10$Np6RfPOeSA1lyWUR8T1eYe/EGp92hG7VQxZruhxg7.Hm5w3B.I.6i', 'Activo', 40, '2024-02-28 19:13:20', '2024-02-28 19:13:20', 3, NULL),
	(54, 'Ana', 'Perez', '2468105', 'anaq@hotmail.com', '$2y$10$FYloTOLC6a3vRuS7y8xPU.776eEFgIc0QlnahuRR4MxlRYhiGPiNC', 'Activo', 30, '2024-02-28 19:35:23', '2024-02-28 19:35:23', 3, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
