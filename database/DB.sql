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
  `usuarios_id_usuario` int DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `probabilidad` decimal(65,0) DEFAULT NULL,
  `adoption_status` varchar(50) DEFAULT NULL,
  `motivo` text,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_animaladopcion`),
  KEY `Animal_Adopcioncol` (`animal_adopcioncol`),
  KEY `fk_adopcion_usuarios1_idx` (`usuarios_id_usuario`),
  CONSTRAINT `adopcion_ibfk_1` FOREIGN KEY (`animal_adopcioncol`) REFERENCES `animales_en_adopcion` (`id`),
  CONSTRAINT `fk_adopcion_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.adopcion: ~1 rows (aproximadamente)
INSERT INTO `adopcion` (`id_animaladopcion`, `fecha_adopcion`, `animal_adopcioncol`, `usuarios_id_usuario`, `img`, `created_at`, `updated_at`, `probabilidad`, `adoption_status`, `motivo`, `file`) VALUES
	(198, '2024-03-16', 137, 56, 'storage/images/1710564304_Lucho.jpg', '2024-03-16 04:47:43', '2024-03-16 04:47:43', 40, 'Adoptado', 'Estoy muy emocionado por ayudar a un animalito que lo necesita.', 'storage/documents/1710582463_Rechazo_Borrador.pdf'),
	(199, '2024-03-16', 136, 56, 'storage/images/1710564235_Loco.jpg', '2024-03-16 13:19:38', '2024-03-16 13:19:38', 70, 'Adoptado', 'Estoy muy emocionado por ayudar a un animalito que lo necesita.', 'storage/documents/1710613178_Rechazo_Borrador.pdf');

-- Volcando estructura para tabla ojitos_db1.animales_en_adopcion
CREATE TABLE IF NOT EXISTS `animales_en_adopcion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fechaEncuentro` date DEFAULT NULL,
  `nombreAnimaladopocion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `especie_Animal` enum('Perro','Gato') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `raza` varchar(30) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `observacionesAnimal` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `estadoSolicitud` enum('Disponible','Solicitado','Adoptado') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT 'Disponible',
  `img` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.animales_en_adopcion: ~10 rows (aproximadamente)
INSERT INTO `animales_en_adopcion` (`id`, `fechaEncuentro`, `nombreAnimaladopocion`, `especie_Animal`, `raza`, `age`, `observacionesAnimal`, `estadoSolicitud`, `img`, `created_at`, `updated_at`) VALUES
	(89, '2024-02-25', 'Grande', 'Perro', 'Criollo', 24, 'Se dono de un refugio aliado. Falta Desparacitar. Vacunas al dia.', 'Disponible', 'storage/images/1709336216_Grande.jpg', '2024-02-25 08:38:30', '2024-03-01 18:36:56'),
	(91, '2024-02-13', 'Lion', 'Gato', 'angora', 6, 'Encontrado en santa marta, vacunas al dia. No se entrega solo', 'Disponible', 'storage/images/1709336273_Lion.jpg', '2024-02-25 03:45:45', '2024-03-01 18:37:53'),
	(93, '2024-03-15', 'Labra', 'Perro', 'Golden', 24, 'Encontrada en la calle', 'Disponible', 'storage/images/1710564553_Labra.jpg', '2024-02-26 19:52:31', '2024-03-15 23:49:13'),
	(95, '2024-02-27', 'Luker', 'Perro', 'Criollo', 25, 'El perrito encontrado en la calle parece ser un canino de tamaño pequeño, con un pelaje marrón claro y brillante. A pesar de su aspecto algo desaliñado, muestra signos de buen estado de salud y vitalidad. Su comportamiento es amigable y afectuoso, demostrando una clara necesidad de contacto humano y atención. Sin embargo, su aparente falta de pertenencia sugiere que puede haber estado perdido o abandonado recientemente.', 'Disponible', 'storage/images/1709336130_Luker.jpg', '2024-02-26 20:57:01', '2024-03-09 18:57:44'),
	(127, '2024-03-10', 'Negro', 'Gato', 'Criollo', 31, 'Gato encontrado en un apto', 'Disponible', 'storage/images/1710047547_Negro.jpg', '2024-03-10 00:12:27', '2024-03-10 00:33:33'),
	(132, '2024-03-11', 'Pachis', 'Perro', 'Persa', 20, 'Animal abandonado por ser tan bonito, pero no hace nada mas que holgazanear en la casa. Según informan los vecinos.', 'Disponible', 'storage/images/1710121829_Pachis.jpg', '2024-03-10 20:47:48', '2024-03-10 20:50:29'),
	(134, '2024-03-16', 'Bear', 'Perro', 'Siberiano', 27, 'Se recogio de un refugio aliado.', 'Disponible', 'storage/images/1710564096_Bear.jpg', '2024-03-15 23:41:36', '2024-03-15 23:41:36'),
	(135, '2024-03-16', 'Chiquis', 'Perro', 'Chiguagua', 27, 'Perro encontrado a las afueras de la ciudad.', 'Disponible', 'storage/images/1710564168_Chiquis.jpg', '2024-03-15 23:42:48', '2024-03-15 23:42:48'),
	(136, '2024-03-16', 'Loco', 'Gato', 'angora', 32, 'Gato encontrado en un apto', 'Adoptado', 'storage/images/1710564235_Loco.jpg', '2024-03-15 23:43:55', '2024-03-15 23:43:55'),
	(137, '2024-03-16', 'Lucho', 'Perro', 'Golden', 120, 'Se sabe que un vecino llamado Jose lo abandono por cansón', 'Adoptado', 'storage/images/1710564304_Lucho.jpg', '2024-03-15 23:45:04', '2024-03-15 23:45:04'),
	(138, '2024-03-16', 'Picholis', 'Perro', 'Peludin', 89, 'Perro encontrado asustado en un parque.', 'Disponible', 'storage/images/1710564653_Picholis.jpg', '2024-03-15 23:50:53', '2024-03-15 23:50:53'),
	(139, '2024-03-16', 'Trasmi', 'Perro', 'Carlino', 156, 'Perro encontrado abandonado en un baño publico', 'Disponible', 'storage/images/1710564777_Trasmi.jpg', '2024-03-15 23:52:57', '2024-03-15 23:52:57');

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
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.animal_vacuna: ~24 rows (aproximadamente)
INSERT INTO `animal_vacuna` (`id`, `animal_id`, `vacuna_id`, `adquisicion`, `created_at`, `updated_at`) VALUES
	(116, 134, 3, 'Sin_Aplicar', NULL, NULL),
	(117, 134, 4, 'Aplicada', NULL, NULL),
	(118, 134, 5, 'Sin_Aplicar', NULL, NULL),
	(119, 134, 9, 'Aplicada', NULL, NULL),
	(120, 135, 3, 'Sin_Aplicar', NULL, NULL),
	(121, 135, 4, 'Aplicada', NULL, NULL),
	(122, 135, 5, 'Sin_Aplicar', NULL, NULL),
	(123, 135, 9, 'Sin_Aplicar', NULL, NULL),
	(124, 136, 6, 'Aplicada', NULL, NULL),
	(125, 136, 7, 'Aplicada', NULL, NULL),
	(126, 136, 8, 'Aplicada', NULL, NULL),
	(127, 136, 10, 'Aplicada', NULL, NULL),
	(128, 137, 3, 'Aplicada', NULL, NULL),
	(129, 137, 4, 'Aplicada', NULL, NULL),
	(130, 137, 5, 'Aplicada', NULL, NULL),
	(131, 137, 9, 'Aplicada', NULL, NULL),
	(132, 138, 3, 'Sin_Aplicar', NULL, NULL),
	(133, 138, 4, 'Aplicada', NULL, NULL),
	(134, 138, 5, 'Aplicada', NULL, NULL),
	(135, 138, 9, 'Sin_Aplicar', NULL, NULL),
	(136, 139, 3, 'Aplicada', NULL, NULL),
	(137, 139, 4, 'Aplicada', NULL, NULL),
	(138, 139, 5, 'Aplicada', NULL, NULL),
	(139, 139, 9, 'Sin_Aplicar', NULL, NULL);

-- Volcando estructura para procedimiento ojitos_db1.AprobacionAdoptar
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `AprobacionAdoptar`(
	IN `p_id_animaladopcion` INT,
	IN `p_status` VARCHAR(50)
)
BEGIN
    UPDATE adopcion 
    SET adoption_status = p_status
    WHERE id_animaladopcion = p_id_animaladopcion;
       
END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.comprarVacuna
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `comprarVacuna`(
	IN `in_IVA` DECIMAL(20,6),
	IN `in_totalProductos` DECIMAL(20,6),
	IN `in_totalFactura` DECIMAL(20,6),
	IN `in_user` DECIMAL(20,6),
	IN `in_metodoPago` VARCHAR(50),
	IN `in_idAnimal` INT
)
BEGIN
DECLARE in_date DATE DEFAULT CURDATE();

INSERT INTO factura (fecha_factura, usuarios_id_usuario,valor_factura,iva,total_factura,especificacion,metodoPago,idAnimal  )
VALUES (in_date, in_user,in_totalProductos,in_IVA,in_totalFactura, "Vacunas adopcion",in_metodoPago,in_idAnimal);


END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.concluirAdopcion
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `concluirAdopcion`(
	IN `in_date` DATE,
	IN `p_id_animaladopcion` INT,
	IN `p_status` VARCHAR(50)
)
BEGIN
  UPDATE adopcion 
    SET fecha_adopcion = in_date ,adoption_status = p_status
    WHERE id_animaladopcion = p_id_animaladopcion;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.encontrar_vacunas_modal
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `encontrar_vacunas_modal`(
	IN `e_id_animal` INT
)
BEGIN
SELECT adquisicion, nombre FROM animal_vacuna JOIN vacunas ON animal_vacuna.vacuna_id = vacunas.id WHERE  animal_vacuna.animal_id = e_id_animal;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.estadosolicitudAnimales
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `estadosolicitudAnimales`(
	IN `p_id` INT,
	IN `in_status` VARCHAR(50)
)
BEGIN
    UPDATE animales_en_adopcion
    SET estadoSolicitud = in_status
    WHERE id = p_id;
END//
DELIMITER ;

-- Volcando estructura para tabla ojitos_db1.factura
CREATE TABLE IF NOT EXISTS `factura` (
  `idfactura` int NOT NULL AUTO_INCREMENT,
  `fecha_factura` date NOT NULL,
  `valor_factura` decimal(10,0) DEFAULT NULL,
  `iva` decimal(10,0) DEFAULT NULL,
  `total_factura` decimal(10,0) DEFAULT NULL,
  `especificacion` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `usuarios_id_usuario` int NOT NULL,
  `idAnimal` int DEFAULT NULL,
  `metodoPago` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idfactura`),
  KEY `fk_factura_usuarios1_idx` (`usuarios_id_usuario`),
  KEY `FK_factura_animales_en_adopcion` (`idAnimal`),
  CONSTRAINT `FK_factura_animales_en_adopcion` FOREIGN KEY (`idAnimal`) REFERENCES `animales_en_adopcion` (`id`),
  CONSTRAINT `fk_factura_usuarios1` FOREIGN KEY (`usuarios_id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=173 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.factura: ~16 rows (aproximadamente)
INSERT INTO `factura` (`idfactura`, `fecha_factura`, `valor_factura`, `iva`, `total_factura`, `especificacion`, `usuarios_id_usuario`, `idAnimal`, `metodoPago`, `created_at`, `updated_at`) VALUES
	(99, '2024-03-15', 20000, 3800, 23800, NULL, 56, NULL, NULL, '2024-03-15 14:35:56', '2024-03-15 14:35:56'),
	(100, '2024-03-15', 100000, 19000, 119000, NULL, 56, NULL, NULL, '2024-03-15 15:01:30', '2024-03-15 15:01:30'),
	(101, '2024-03-15', 90000, 17100, 0, NULL, 56, NULL, NULL, '2024-03-15 15:04:05', '2024-03-15 15:04:05'),
	(102, '2024-03-15', 90000, 17100, 0, NULL, 56, 137, NULL, '2024-03-15 15:04:05', '2024-03-15 15:04:05'),
	(144, '2024-03-16', 0, 0, 0, 'Vacunas adopcion', 56, NULL, 'Efectivo', NULL, NULL),
	(145, '2024-03-16', 0, 0, 0, 'Vacunas adopcion', 56, NULL, 'Efectivo', NULL, NULL),
	(146, '2024-03-16', 0, 0, 0, 'Vacunas adopcion', 56, NULL, 'PayPal', NULL, NULL),
	(147, '2024-03-16', 0, 0, 0, 'Vacunas adopcion', 56, NULL, 'PayPal', NULL, NULL),
	(148, '2024-03-16', 0, 0, 0, 'Vacunas adopcion', 56, NULL, 'PayPal', NULL, NULL),
	(149, '2024-03-16', 0, 0, 0, 'Vacunas adopcion', 56, NULL, 'PayPal', NULL, NULL),
	(150, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, NULL, 'Efectivo', NULL, NULL),
	(151, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, NULL, 'Efectivo', NULL, NULL),
	(152, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(153, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(154, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(155, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(156, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(157, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(158, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(159, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(160, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(161, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(162, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(163, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(164, '2024-03-16', 75000, 14250, 89250, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(165, '2024-03-16', 140000, 26600, 166600, 'Vacunas adopcion', 56, 137, 'Tarjeta de Credito', NULL, NULL),
	(166, '2024-03-16', 140000, 26600, 166600, 'Vacunas adopcion', 56, 137, 'PayPal', NULL, NULL),
	(167, '2024-03-16', 125000, 23750, 148750, 'Vacunas adopcion', 56, 137, 'PayPal', NULL, NULL),
	(168, '2024-03-16', 125000, 23750, 148750, 'Vacunas adopcion', 56, 137, 'PayPal', NULL, NULL),
	(169, '2024-03-16', 125000, 23750, 148750, 'Vacunas adopcion', 56, 137, 'Efectivo', NULL, NULL),
	(170, '2024-03-16', 10000, 1900, 11900, 'Vacunas adopcion', 56, 136, 'Tarjeta de Credito', NULL, NULL),
	(171, '2024-03-16', 30000, 5700, 35700, NULL, 56, NULL, NULL, '2024-03-16 13:45:25', '2024-03-16 13:45:25'),
	(172, '2024-03-16', 30000, 5700, 35700, NULL, 56, NULL, NULL, '2024-03-16 13:47:43', '2024-03-16 13:47:43');

-- Volcando estructura para tabla ojitos_db1.factura_details
CREATE TABLE IF NOT EXISTS `factura_details` (
  `factura_idfactura` int NOT NULL,
  `product_id_product` int NOT NULL,
  `quantity` int NOT NULL,
  `iva` decimal(10,0) NOT NULL,
  `products_totals` decimal(10,0) NOT NULL,
  `descriptionF` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`factura_idfactura`,`product_id_product`),
  KEY `fk_factura_has_product_product1_idx` (`product_id_product`),
  KEY `fk_factura_has_product_factura1_idx` (`factura_idfactura`),
  CONSTRAINT `fk_factura_has_product_factura1` FOREIGN KEY (`factura_idfactura`) REFERENCES `factura` (`idfactura`),
  CONSTRAINT `fk_factura_has_product_product1` FOREIGN KEY (`product_id_product`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.factura_details: ~4 rows (aproximadamente)
INSERT INTO `factura_details` (`factura_idfactura`, `product_id_product`, `quantity`, `iva`, `products_totals`, `descriptionF`, `created_at`, `updated_at`) VALUES
	(99, 15025, 1, 3800, 20000, 'Cama', '2024-03-15 14:35:56', '2024-03-15 14:35:56'),
	(100, 15025, 5, 19000, 100000, 'Cama', '2024-03-15 15:01:30', '2024-03-15 15:01:30'),
	(101, 15025, 3, 11400, 60000, 'Cama', '2024-03-15 15:04:05', '2024-03-15 15:04:05'),
	(101, 15026, 1, 5700, 30000, 'Vacuna contra la Rabia', '2024-03-15 15:04:05', '2024-03-15 15:04:05'),
	(172, 15025, 1, 3800, 20000, 'Cama', '2024-03-16 13:47:43', '2024-03-16 13:47:43'),
	(172, 15031, 2, 1900, 10000, 'Hueso', '2024-03-16 13:47:43', '2024-03-16 13:47:43');

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
  `categoria` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `stock` int NOT NULL,
  `img` blob,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=15032 DEFAULT CHARSET=utf8mb3;

-- Volcando datos para la tabla ojitos_db1.product: ~4 rows (aproximadamente)
INSERT INTO `product` (`id_product`, `product_name`, `product_price`, `descripcion`, `categoria`, `stock`, `img`, `created_at`, `updated_at`) VALUES
	(15025, 'Cama', 20000, 'Cama para perro', NULL, 20, NULL, '2024-03-15 14:35:15', '2024-03-15 14:35:15'),
	(15026, 'Vacuna contra la Rabia', 30000, 'Vacuna para perro', NULL, 30, NULL, '2024-03-15 15:02:48', '2024-03-15 15:02:48'),
	(15029, 'Vacunas Perros', 0, 'Lista de vacunas para perros', NULL, 100, NULL, NULL, NULL),
	(15030, 'Vacunas Gatos', 0, 'Lista de vacunas para gatos', NULL, 100, NULL, NULL, NULL),
	(15031, 'Hueso', 5000, 'Hueso para perro (Carnasa)', NULL, 40, _binary 0x70726f647563745f696d616765732f4947305745436a594372597966535465453749354436515631644a504a6852666f6d76684c6a58482e6a7067, '2024-03-16 13:37:43', '2024-03-16 13:38:30');

-- Volcando estructura para tabla ojitos_db1.producto_vacuna
CREATE TABLE IF NOT EXISTS `producto_vacuna` (
  `id` int NOT NULL AUTO_INCREMENT,
  `producto_id` int NOT NULL,
  `vacuna_id` int NOT NULL,
  `price` decimal(65,0) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_2_vacuna_id` (`vacuna_id`),
  KEY `FK_producto_id` (`producto_id`),
  CONSTRAINT `FK_2_vacuna_id` FOREIGN KEY (`vacuna_id`) REFERENCES `vacunas` (`id`),
  CONSTRAINT `FK_producto_id` FOREIGN KEY (`producto_id`) REFERENCES `product` (`id_product`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla ojitos_db1.producto_vacuna: ~8 rows (aproximadamente)
INSERT INTO `producto_vacuna` (`id`, `producto_id`, `vacuna_id`, `price`, `created_at`, `updated_at`) VALUES
	(1, 15029, 4, 30000, NULL, NULL),
	(2, 15029, 5, 45000, NULL, NULL),
	(3, 15029, 3, 50000, NULL, NULL),
	(4, 15029, 9, 15000, NULL, NULL),
	(5, 15030, 7, 30000, NULL, NULL),
	(6, 15030, 8, 25000, NULL, NULL),
	(7, 15030, 6, 18000, NULL, NULL),
	(8, 15030, 10, 10000, NULL, NULL);

-- Volcando estructura para procedimiento ojitos_db1.prueba
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `prueba`(
	OUT `nombre` INT
)
BEGIN
SELECT idfactura
FROM factura
WHERE usuarios_id_usuario = 56
  AND fecha_factura IS NOT NULL
  AND total_factura IS NULL;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.rechazarAdopcion
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `rechazarAdopcion`(
	IN `in_idAnimal` INT
)
BEGIN
DELETE FROM adopcion WHERE animal_adopcioncol = in_idAnimal;
END//
DELIMITER ;

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

-- Volcando estructura para procedimiento ojitos_db1.SearchP_Vacunas
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `SearchP_Vacunas`(
	IN `in_idAnimal` INT
)
BEGIN
SELECT * FROM animal_vacuna WHERE adquisicion = 'Sin_Aplicar' AND animal_id= in_idAnimal;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.Search_VN_Sin_Aplicar
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `Search_VN_Sin_Aplicar`(
	IN `in_idAnimal` INT
)
BEGIN
SELECT vacunas.nombre, producto_vacuna.price
FROM producto_vacuna
INNER JOIN vacunas ON producto_vacuna.vacuna_id = vacunas.id
INNER JOIN animal_vacuna ON animal_vacuna.vacuna_id = vacunas.id
WHERE animal_vacuna.adquisicion ='Sin_Aplicar' AND animal_vacuna.animal_id = in_idAnimal;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.updateStatusAnimalList
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateStatusAnimalList`(
	IN `in_id_animaladopcion` INT,
	IN `in_status` VARCHAR(50)
)
BEGIN
  UPDATE animales_en_adopcion
    SET estadoSolicitud = in_status
    WHERE id = in_id_animaladopcion;
END//
DELIMITER ;

-- Volcando estructura para procedimiento ojitos_db1.updateTablesForCompra
DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateTablesForCompra`(
	IN `idAnimal` INT
)
BEGIN
   UPDATE adopcion 
   SET adoption_status = "P. Entrega"
   WHERE animal_adopcioncol = idAnimal;


  UPDATE animales_en_adopcion
    SET estadoSolicitud = "Adoptado"
    WHERE id = idAnimal;
    
       UPDATE animal_vacuna
    SET adquisicion = "Aplicada"
    WHERE animal_id =idAnimal;
    
END//
DELIMITER ;

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
	(49, 'Jefferson Alexander', 'Arenas Zea', '1013671072', 'faceluker@outlook.es', '$2y$10$FOjLcEql267KlVwitBUpEOK4RmpJWR22.AKC6kORL/CmZySgr3VTW', 'Activo', 27, '2024-02-28 20:22:01', '2024-02-21 22:22:22', 1, 'is57bX5INfDmspn1Sw0hRzV9MgZjbzI2QRtraT0vm6CeV7d5FHTcvAu6xi4t'),
	(50, 'Jose Raul', 'Beltran Sanabria', '234243218', 'mabeluker_jeffer@hotmail.com', '$2y$10$RwRPgVYvC7qrwj3f7AYYBeowcELtav39HdjZci1sFKPAQErOj3J92', 'Activo', 27, '2024-02-27 10:58:58', '2024-02-22 23:41:43', 1, NULL),
	(51, 'Mario', 'Casas', '10182677823', 'faceluker@outlook.__', '$2y$10$H8wW6aRaBqDtO0wQH1JaguDtw9cmEsgJ75YEQCqlJGmRd63bsxJe6', 'Activo', 32, '2024-03-07 19:25:42', '2024-02-28 19:02:53', 3, 'oweH3mBSW1PrTCkRCvA9xQ2poHkfcfCfcX9XhJ8PQqCZuWaYvGEkMbw5JA7r'),
	(52, 'Novak', 'Djokovic', '10187858745', 'melosrun7@gmail.com', '$2y$10$KiX3V5TgSd6dAJLj7wlLM.9gCoXF3iMq1NzxK2wrB3Sv/h1/nBFWi', 'Activo', 36, '2024-02-28 19:08:47', '2024-02-28 19:08:47', 3, NULL),
	(53, 'Tom', 'Brady', '10187853269', 'pythiasdamon21@gmail.com', '$2y$10$Np6RfPOeSA1lyWUR8T1eYe/EGp92hG7VQxZruhxg7.Hm5w3B.I.6i', 'Activo', 40, '2024-02-28 19:13:20', '2024-02-28 19:13:20', 3, NULL),
	(54, 'Ana', 'Perez', '2468105', 'anaq@hotmail.com', '$2y$10$FYloTOLC6a3vRuS7y8xPU.776eEFgIc0QlnahuRR4MxlRYhiGPiNC', 'Activo', 30, '2024-02-28 19:35:23', '2024-02-28 19:35:23', 3, NULL),
	(55, 'Alfredo', 'Gutierrez Hernandez', '25489652', 'jbeltransanabria@gmail.es', '$2y$10$o.OtdhXnnuFYz3nRLtz3he5K.WuljAYaAPbsKuOMc2fF2YUNmy4oC', 'Activo', 56, '2024-03-07 19:20:02', '2024-03-07 19:20:02', 3, NULL),
	(56, 'Jeison', 'Jimenez', '123456789', 'jaarenas27@soy.sena.edu.co', '$2y$10$lLBTHeIdztt6QGAdPY9stui5SqZM9tGfPZrdl.1vdd8R65Dmx51Be', 'Activo', 12, '2024-03-10 00:57:05', '2024-03-10 00:57:05', 3, NULL);

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
