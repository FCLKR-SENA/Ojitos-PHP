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
  `motivo` text,
  PRIMARY KEY (`id_animaladopcion`),
  KEY `Animal_Adopcioncol` (`animal_adopcioncol`),
  KEY `fk_adopcion_usuarios1_idx` (`usuarios_id_usuario`),
  CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`animal_adopcioncol`) REFERENCES `animales_en_adopcion` (`id`),
  CONSTRAINT `fk_adopcion_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.adopcion: ~4 rows (aproximadamente)
INSERT INTO `adopcion` (`id_animaladopcion`, `fecha_adopcion`, `animal_adopcioncol`, `usuarios_id_usuario`, `img`, `created_at`, `updated_at`, `probabilidad`, `adoption_status`, `motivo`) VALUES
	(111, '2024-03-09', 95, 50, 'storage/images/1709336130_Luker.jpg', '2024-03-07 03:09:53', '2024-03-07 03:09:53', 75, 'Aprobado', 'Estoy muy emocionado por ayudar a un animalito que lo necesita.'),
	(112, '2024-03-09', 96, 55, 'storage/images/1709697464_Petro.jpg', '2024-03-07 19:22:45', '2024-03-07 19:22:45', 40, 'Aprobado', 'Me gustan los animales.'),
	(113, '2024-03-09', 95, 51, 'storage/images/1709336130_Luker.jpg', '2024-03-07 19:27:05', '2024-03-07 19:27:05', 30, 'Aprobado', 'No me gusta estar solo y ese es mi perro ideal');

-- Volcando estructura para tabla ojitos_db1.animales_en_adopcion
CREATE TABLE IF NOT EXISTS `animales_en_adopcion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fechaEncuentro` date DEFAULT NULL,
  `nombreAnimaladopocion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `especie_Animal` enum('Perro','Gato') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `raza` varchar(30) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `observacionesAnimal` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `estadoSolicitud` enum('Disponible','Solicitado','Adoptado','Rechazado') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Disponible',
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.animales_en_adopcion: ~8 rows (aproximadamente)
INSERT INTO `animales_en_adopcion` (`id`, `fechaEncuentro`, `nombreAnimaladopocion`, `especie_Animal`, `raza`, `age`, `observacionesAnimal`, `estadoSolicitud`, `img`, `created_at`, `updated_at`) VALUES
	(89, '2024-02-25', 'Grande', 'Perro', 'Criollo', 24, 'Se dono de un refugio aliado. Falta Desparacitar. Vacunas al dia.', 'Disponible', 'storage/images/1709336216_Grande.jpg', '2024-02-25 08:38:30', '2024-03-01 18:36:56'),
	(90, '2024-02-13', 'Loco', 'Gato', 'Siberiano', 6, 'Gato encontrado en un apto', 'Disponible', 'storage/images/1709336290_Loco.jpg', '2024-02-25 02:43:40', '2024-03-01 18:38:31'),
	(91, '2024-02-13', 'Lion', 'Gato', 'angora', 6, 'Encontrado en santa marta, vacunas al dia. No se entrega solo', 'Disponible', 'storage/images/1709336273_Lion.jpg', '2024-02-25 03:45:45', '2024-03-01 18:37:53'),
	(92, '2024-02-13', 'Labra', 'Perro', 'Criollo', 60, 'Se recogio de un refugio aliado. Vacuna antifelina. Falta desparacitante.', 'Disponible', 'storage/images/1709336245_Labra.jpg', '2024-02-25 04:30:16', '2024-03-01 18:37:25'),
	(93, '2024-02-26', 'Lulu', 'Perro', 'Beagle', 24, 'Encontrada en la calle', 'Disponible', 'storage/images/1709336185_Chiquis.jpg', '2024-02-26 19:52:31', '2024-03-01 18:36:25'),
	(94, '2024-02-27', 'Bear', 'Perro', 'Criollo', 6, 'Gato encontrado en Sta Marta. Vacunas al dia se entrega con su hermano Ramon.', 'Disponible', 'storage/images/1709336150_Bear.jpg', '2024-02-26 20:00:59', '2024-03-01 18:36:06'),
	(95, '2024-02-27', 'Luker', 'Perro', 'Criollo', 25, 'El perrito encontrado en la calle parece ser un canino de tamaño pequeño, con un pelaje marrón claro y brillante. A pesar de su aspecto algo desaliñado, muestra signos de buen estado de salud y vitalidad. Su comportamiento es amigable y afectuoso, demostrando una clara necesidad de contacto humano y atención. Sin embargo, su aparente falta de pertenencia sugiere que puede haber estado perdido o abandonado recientemente.', 'Disponible', 'storage/images/1709336130_Luker.jpg', '2024-02-26 20:57:01', '2024-03-09 18:57:44'),
	(96, '2024-03-06', 'Petro', 'Perro', 'Siberiano', 60, 'Perro encontrado a las afueras de la ciudad. Vacuna antirrábica, desparasitado.', 'Disponible', 'storage/images/1709697464_Petro.jpg', '2024-03-05 22:57:45', '2024-03-05 22:57:45'),
	(127, '2024-03-10', 'Negro', 'Gato', 'Criollo', 31, 'Gato encontrado en un apto', 'Disponible', 'storage/images/1710047547_Negro.jpg', '2024-03-10 00:12:27', '2024-03-10 00:33:33'),
	(129, '2024-03-10', 'Ramon', 'Gato', 'Siberiano', 27, 'Gato encontrado en un apto', 'Disponible', NULL, '2024-03-10 01:15:22', '2024-03-10 01:15:22');

-- Volcando estructura para tabla ojitos_db1.animal_vacuna
CREATE TABLE IF NOT EXISTS `animal_vacuna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `animal_id` int NOT NULL,
  `vacuna_id` int NOT NULL,
  `adquisicion` enum('Sin_Aplicar','Aplicada') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Sin_Aplicar',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_animal_id` (`animal_id`),
  KEY `FK_vacuna_id` (`vacuna_id`),
  CONSTRAINT `FK_animal_id` FOREIGN KEY (`animal_id`) REFERENCES `animales_en_adopcion` (`id`),
  CONSTRAINT `FK_vacuna_id` FOREIGN KEY (`vacuna_id`) REFERENCES `vacunas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.animal_vacuna: ~8 rows (aproximadamente)
INSERT INTO `animal_vacuna` (`id`, `animal_id`, `vacuna_id`, `adquisicion`, `created_at`, `updated_at`) VALUES
	(88, 127, 6, 'Aplicada', NULL, NULL),
	(89, 127, 7, 'Sin_Aplicar', NULL, NULL),
	(90, 127, 8, 'Aplicada', NULL, NULL),
	(91, 127, 10, 'Sin_Aplicar', NULL, NULL),
	(96, 129, 6, 'Sin_Aplicar', NULL, NULL),
	(97, 129, 7, 'Aplicada', NULL, NULL),
	(98, 129, 8, 'Sin_Aplicar', NULL, NULL),
	(99, 129, 10, 'Sin_Aplicar', NULL, NULL);

-- Volcando estructura para procedimiento ojitos_db1.AprobacionAdoptar
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `AprobacionAdoptar`(
	IN `p_id_animaladopcion` INT,
	IN `p_status` VARCHAR(50),
	IN `p_fecha_adopcion` DATE
)
BEGIN
    UPDATE adopcion 
    SET adoption_status = p_status, fecha_adopcion = p_fecha_adopcion
    WHERE id_animaladopcion = p_id_animaladopcion;
    
    
END//
DELIMITER ;

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

-- Volcando estructura para procedimiento ojitos_db1.InsertarVacuna
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarVacuna`(
    IN `id_animal` INT,
    IN `vacuna_id` INT,
    IN `aplicada` VARCHAR(20)
)
BEGIN
    INSERT INTO animal_vacuna (animal_id, vacuna_id, adquisicion)
    VALUES (id_animal, vacuna_id, aplicada);
END//
DELIMITER ;

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
  `product_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `product_price` decimal(10,0) NOT NULL,
  `descripcion` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `stock` int NOT NULL,
  `img` blob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.product: ~0 rows (aproximadamente)
INSERT INTO `product` (`id_product`, `product_name`, `product_price`, `descripcion`, `stock`, `img`, `created_at`, `updated_at`) VALUES
	(15, 'Cama', 100000, 'Cama para perro grande', 50, NULL, '2024-03-07 04:18:48', '2024-03-07 13:49:08'),
	(18, 'Cama', 10000, 'Cama para perro grande', 50, _binary 0x70726f647563745f696d616765732f3350326a4b6e4975766268724c774c6774577655327a6533324869364949587572305650324a6f672e6a7067, '2024-03-07 04:30:51', '2024-03-07 19:32:47'),
	(19, 'Cama', -522, 'Cama para perro grande', -6, NULL, '2024-03-07 13:48:34', '2024-03-07 13:48:34'),
	(20, 'G. Vacuna FVRCP', 30000, 'Vacuna FVRCP (Rinotraqueítis Viral Felina, Calicivirus y Panleucopenia) Protege contra el herpesvirus felino tipo 1 (rinotraqueítis viral felina), calicivirus felino y el virus de la panleucopenia felina. Se administra a partir de las 6-8 semanas de edad, con refuerzos cada 3-4 semanas hasta las 16-20 semanas, y luego se aplica anualmente.', 40, NULL, '2024-03-09 13:32:02', '2024-03-09 13:58:57'),
	(21, 'G. Vacuna contra la Leucemia Felina (FeLV)', 40000, 'Protege contra el virus de la leucemia felina, una enfermedad viral que puede causar tumores, anemia y inmunosupresión en gatos. Se recomienda para gatos con acceso al exterior o que conviven con otros gatos de estado de salud desconocido. Se administra a partir de las 8 semanas de edad, con una segunda dosis 3-4 semanas después, y luego se aplica anualmente.', 20, NULL, '2024-03-09 13:58:10', '2024-03-09 13:59:11'),
	(22, 'G. Vacuna contra la Rabia', 40000, 'Protege contra el virus de la rabia, una enfermedad zoonótica mortal. Es legalmente obligatoria en muchos países y se administra a partir de los 3 meses de edad, con refuerzos anuales o según las regulaciones locales.', 30, NULL, '2024-03-09 13:59:50', '2024-03-09 14:01:41'),
	(23, 'P. Vacuna DHPP (Distemper, Hepatitis, Parvovirus y Parainfluenza)', 60000, 'Protege contra el moquillo canino, la hepatitis infecciosa canina, el parvovirus canino y el virus de la parainfluenza canina. Se administra a partir de las 6-8 semanas de edad, con refuerzos cada 3-4 semanas hasta las 16-20 semanas, y luego se aplica anualmente.', 25, NULL, '2024-03-09 14:01:17', '2024-03-09 14:02:04'),
	(24, 'P. Vacuna contra la Leptospirosis', 20000, 'Protege contra diferentes serovariedades de Leptospira, una bacteria que puede causar enfermedad renal y hepática en perros. Se recomienda especialmente para perros con acceso al exterior o que viven en áreas con mayor riesgo de exposición. Se administra a partir de las 8 semanas de edad, con una segunda dosis 3-4 semanas después, y luego se aplica anualmente.', 10, NULL, '2024-03-09 14:02:45', '2024-03-09 14:03:02'),
	(25, 'P. Vacuna contra la Rabia', 50000, 'Protege contra el virus de la rabia, una enfermedad zoonótica mortal. Es legalmente obligatoria en muchos países y se administra a partir de los 3 meses de edad, con refuerzos anuales o según las regulaciones locales.', 30, NULL, '2024-03-09 14:03:58', '2024-03-09 14:04:11');

-- Volcando estructura para tabla ojitos_db1.producto_vacuna
CREATE TABLE IF NOT EXISTS `producto_vacuna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `producto_id` int NOT NULL,
  `vacuna_id` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_2_vacuna_id` (`vacuna_id`),
  KEY `FK_producto_id` (`producto_id`),
  CONSTRAINT `FK_2_vacuna_id` FOREIGN KEY (`vacuna_id`) REFERENCES `vacunas` (`id`),
  CONSTRAINT `FK_producto_id` FOREIGN KEY (`producto_id`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.producto_vacuna: ~0 rows (aproximadamente)

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.users: ~6 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `lastname`, `document`, `email`, `password`, `estado`, `age`, `updated_at`, `created_at`, `roles_idroles`, `remember_token`) VALUES
	(49, 'Jefferson Alexander', 'Arenas Zea', '1013671072', 'faceluker@outlook.e', '$2y$10$FOjLcEql267KlVwitBUpEOK4RmpJWR22.AKC6kORL/CmZySgr3VTW', 'Activo', 27, '2024-02-28 20:22:01', '2024-02-21 22:22:22', 1, 'yalaXZlQJwlwhkcc85iovxJPQg8FFDejWz7VFFAF5rkzbPCj0Wnc18O5RuPQ'),
	(50, 'Jose Raul', 'Beltran Sanabria', '234243218', 'faceluker@outlook.', '$2y$10$RwRPgVYvC7qrwj3f7AYYBeowcELtav39HdjZci1sFKPAQErOj3J92', 'Activo', 27, '2024-02-27 10:58:58', '2024-02-22 23:41:43', 3, NULL),
	(51, 'Mario', 'Casas', '10182677823', 'faceluker@outlook.es', '$2y$10$H8wW6aRaBqDtO0wQH1JaguDtw9cmEsgJ75YEQCqlJGmRd63bsxJe6', 'Activo', 32, '2024-03-07 19:25:42', '2024-02-28 19:02:53', 3, 'oweH3mBSW1PrTCkRCvA9xQ2poHkfcfCfcX9XhJ8PQqCZuWaYvGEkMbw5JA7r'),
	(52, 'Novak', 'Djokovic', '10187858745', 'melosrun7@gmail.com', '$2y$10$KiX3V5TgSd6dAJLj7wlLM.9gCoXF3iMq1NzxK2wrB3Sv/h1/nBFWi', 'Activo', 36, '2024-02-28 19:08:47', '2024-02-28 19:08:47', 3, NULL),
	(53, 'Tom', 'Brady', '10187853269', 'pythiasdamon21@gmail.com', '$2y$10$Np6RfPOeSA1lyWUR8T1eYe/EGp92hG7VQxZruhxg7.Hm5w3B.I.6i', 'Activo', 40, '2024-02-28 19:13:20', '2024-02-28 19:13:20', 3, NULL),
	(54, 'Ana', 'Perez', '2468105', 'anaq@hotmail.com', '$2y$10$FYloTOLC6a3vRuS7y8xPU.776eEFgIc0QlnahuRR4MxlRYhiGPiNC', 'Activo', 30, '2024-02-28 19:35:23', '2024-02-28 19:35:23', 3, NULL),
	(55, 'Alfredo', 'Gutierrez Hernandez', '25489652', 'jbeltransanabria@gmail.com', '$2y$10$o.OtdhXnnuFYz3nRLtz3he5K.WuljAYaAPbsKuOMc2fF2YUNmy4oC', 'Activo', 56, '2024-03-07 19:20:02', '2024-03-07 19:20:02', 3, NULL),
	(56, 'Jeison', 'Jimenez', '123456789', 'faceluker@outlook', '$2y$10$lLBTHeIdztt6QGAdPY9stui5SqZM9tGfPZrdl.1vdd8R65Dmx51Be', 'Activo', 12, '2024-03-10 00:57:05', '2024-03-10 00:57:05', 3, NULL);

-- Volcando estructura para tabla ojitos_db1.vacunas
CREATE TABLE IF NOT EXISTS `vacunas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `especie` enum('Perro','Gato') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.vacunas: ~8 rows (aproximadamente)
INSERT INTO `vacunas` (`id`, `nombre`, `descripcion`, `especie`, `created_at`, `updated_at`) VALUES
	(3, 'P. Vacuna DHPP (Distemper, Hepatitis, Parvovirus y Parainfluenza)', 'Protege contra el moquillo canino, la hepatitis infecciosa canina, el parvovirus canino y el virus de la parainfluenza canina. Se administra a partir de las 6-8 semanas de edad, con refuerzos cada 3-4 semanas hasta las 16-20 semanas, y luego se aplica anualmente.', 'Perro', NULL, NULL),
	(4, 'P. Vacuna contra la Leptospirosis', 'Protege contra diferentes serovariedades de Leptospira, una bacteria que puede causar enfermedad renal y hepática en perros. Se recomienda especialmente para perros con acceso al exterior o que viven en áreas con mayor riesgo de exposición. Se administra a partir de las 8 semanas de edad, con una segunda dosis 3-4 semanas después, y luego se aplica anualmente.', 'Perro', NULL, NULL),
	(5, 'P. Vacuna contra la Rabia', 'Protege contra el virus de la rabia, una enfermedad zoonótica mortal. Es legalmente obligatoria en muchos países y se administra a partir de los 3 meses de edad, con refuerzos anuales o según las regulaciones locales.', 'Perro', NULL, NULL),
	(6, 'G. Vacuna FVRCP', 'Vacuna FVRCP (Rinotraqueítis Viral Felina, Calicivirus y Panleucopenia) Protege contra el herpesvirus felino tipo 1 (rinotraqueítis viral felina), calicivirus felino y el virus de la panleucopenia felina. Se administra a partir de las 6-8 semanas de edad, con refuerzos cada 3-4 semanas hasta las 16-20 semanas, y luego se aplica anualmente.', 'Gato', NULL, NULL),
	(7, 'G. Vacuna contra la Leucemia Felina (FeLV)', 'Protege contra el virus de la leucemia felina, una enfermedad viral que puede causar tumores, anemia y inmunosupresión en gatos. Se recomienda para gatos con acceso al exterior o que conviven con otros gatos de estado de salud desconocido. Se administra a partir de las 8 semanas de edad, con una segunda dosis 3-4 semanas después, y luego se aplica anualmente.', 'Gato', NULL, NULL),
	(8, 'G. Vacuna contra la Rabia', 'Protege contra el virus de la rabia, una enfermedad zoonótica mortal. Es legalmente obligatoria en muchos países y se administra a partir de los 3 meses de edad, con refuerzos anuales o según las regulaciones locales.', 'Gato', NULL, NULL),
	(9, 'P. Vacuna para la gripe', 'Protege de virus de gripa', 'Perro', NULL, NULL),
	(10, 'G. Vacuna para la gripe', 'Protege de virus de gripa', 'Gato', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
