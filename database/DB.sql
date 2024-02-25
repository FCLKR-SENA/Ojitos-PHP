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
  `fecha_adopcion` date NOT NULL,
  `animal_adopcioncol` int NOT NULL,
  `usuarios_id_usuario` int NOT NULL,
  `img` blob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_animaladopcion`),
  KEY `Animal_Adopcioncol` (`animal_adopcioncol`),
  KEY `fk_adopcion_usuarios1_idx` (`usuarios_id_usuario`),
  CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`animal_adopcioncol`) REFERENCES `animales_en_adopcion` (`id_animaldisponible`),
  CONSTRAINT `fk_adopcion_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.adopcion: ~0 rows (aproximadamente)

-- Volcando estructura para tabla ojitos_db1.animales_en_adopcion
CREATE TABLE IF NOT EXISTS `animales_en_adopcion` (
  `id_animaldisponible` int NOT NULL AUTO_INCREMENT,
  `fecha_encuentro` date DEFAULT NULL,
  `nombre_animaladopocion` varchar(50) DEFAULT NULL,
  `especie_animal` enum('Perro','Gato') DEFAULT NULL,
  `raza` varchar(30) DEFAULT NULL,
  `observaciones_animal` varchar(100) DEFAULT NULL,
  `estado_solicitud` enum('Disponible','Solicitado','Adoptado','Rechazado') DEFAULT 'Disponible',
  `img` blob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_animaldisponible`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.animales_en_adopcion: ~0 rows (aproximadamente)

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

-- Volcando datos para la tabla ojitos_db1.password_reset_tokens: ~0 rows (aproximadamente)
INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
	('faceluker@outlook.es', '$2y$10$c/cn4p9HiDhsTCyJf.IyqeN.dp/MOumeyyrrB6882vbCbVRuIx.WG', '2024-02-21 22:22:40');

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
  `idroles` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idroles`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.roles: ~0 rows (aproximadamente)
INSERT INTO `roles` (`idroles`, `name`) VALUES
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`document`),
  KEY `fk_users_roles1_idx` (`roles_idroles`),
  CONSTRAINT `fk_users_roles1` FOREIGN KEY (`roles_idroles`) REFERENCES `roles` (`idroles`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.users: ~0 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `lastname`, `document`, `email`, `password`, `estado`, `age`, `updated_at`, `created_at`, `roles_idroles`) VALUES
	(49, 'Jefferson Alexander', 'Arenas Zea', '1013671072', 'faceluker@outlook.es', '$2y$10$RhDN75Vna6N8yjmCzhIFTeZ8wDJY6DjSFD9/WingLoyclBKmfHABy', 'Activo', 27, '2024-02-21 22:23:33', '2024-02-21 22:22:22', 3);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
