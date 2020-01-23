-- MySQL dump 10.13  Distrib 8.0.19, for Linux (x86_64)
--
-- Host: localhost    Database: mildhat_db
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'logo.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'bearbrand','bearbrand.png','2020-01-17 07:07:10','2020-01-17 07:07:10'),(2,'authentic','authentic.png','2020-01-17 07:14:32','2020-01-17 07:14:32'),(3,'hosoren','hosoren.png','2020-01-17 07:15:00','2020-01-17 07:15:00'),(4,'stores','stores.png','2020-01-17 07:17:51','2020-01-17 07:17:51'),(5,'woodwork','woodwork.png','2020-01-17 07:18:13','2020-01-17 07:18:13');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'home decors','2020-01-17 07:23:44','2020-01-17 07:23:44'),(2,'furniture','2020-01-17 07:25:10','2020-01-17 07:25:10'),(4,'woman\'s','2020-01-17 07:25:26','2020-01-17 07:25:26'),(5,'men\'s','2020-01-17 07:25:32','2020-01-17 07:25:32'),(6,'fashions','2020-01-17 07:26:00','2020-01-17 07:26:00'),(7,'wrist watches','2020-01-17 07:26:10','2020-01-17 07:26:10');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `is_sale` tinyint DEFAULT '0',
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_product_image.png',
  `small_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default_small_image.png',
  `availability` tinyint DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `products_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Pair Waterbottle','Perfectly designed to maintain hydration while at work, on the road, at school or camping, the CamelBak Eddy+ with straw features cutting-edge technology, is made from quality materials, and insulated.','<p>Perfectly designed to maintain hydration while at work, on the road, at school or camping, the CamelBak Eddy+ with straw features cutting-edge technology, is made from quality materials, and insulated. Our insulated water bottle is spill- and leak-proof. It was recently redesigned for better water flow per sip. In fact, the new bite valve allows you to consume 25% more water per sip to stay hydrated throughout the day. We designed this water bottle for convenience and easy care. It’s also compatible with additional CamelBak products and is dishwasher safe, easy to carry, and made from high-quality materials. The Eddy+ water bottle is made from safe materials. The plastic is derived from BPA-, BPS-, and BPF-free materials. CamelBak uses spectrographic testing on all plastics used in our insulated water bottles to verify that BPA is not detected at one part per million or greater. The BPA-free materials ensure that your water is as pure as possible. The insulation keeps it cooler, longer. The universal cap is leak-proof when closed and spill-proof when open. The double-wall vacuum insulation keeps drinks cold and free from condensation. Our Got Your Bak Lifetime Guarantee covers all reservoirs, backpacks, bottles, and accessories from manufacturing defects in materials and workmanship for the lifetime of the product. The CamelBak Eddy+ Insulated Water Bottle is available in multiple colors and with different measurements and weights.</p>',NULL,89,'793',2,6,0,'waterBottle.jpg','default_small_image.png',1,'2020-01-17 07:40:09','2020-01-17 08:09:59'),(2,'Sullivans Small White Vase Set (Ceramic)','All three neutral bottle-style pieces feature 1 inch openings, perfect for a favorite stem or to simply stand alone. Waterproof.','<p>All three neutral bottle-style pieces feature 1 inch openings, perfect for a favorite stem or to simply stand alone. Waterproof.</p><p>All three neutral bottle-style pieces feature 1 inch openings, perfect for a favorite stem or to simply stand alone. Waterproof.</p>',NULL,99,'2094',4,1,0,'vaseSet.png','default_small_image.png',1,'2020-01-17 08:20:35','2020-01-17 08:20:35'),(3,'Wall Clock','Keep track of time with this classic black round wall clock.<br>\nGreat for any room at home, work office or classroom. The classic frame will dress up any room’s decor such as your kitchen, living room, bedroom, family room, meeting room or dining room.','<p>Keep track of time with this classic black round wall clock.</p><p>Great for any room at home, work office or classroom. The classic frame will dress up any room’s decor such as your kitchen, living room, bedroom, family room, meeting room or dining room.</p>',NULL,19,NULL,4,1,0,'clock.png','default_small_image.png',1,'2020-01-17 08:27:12','2020-01-17 08:27:28'),(4,'Vintage Distresse candle lantern','Impress guests at your wedding or special event With Kate Aspen vintage White Distressed Lantern in a medium size. These miniature lanterns really show your rustic style! Simply place them on a table or hang them at your venue to light up the space.','<p>Impress guests at your wedding or special event With Kate Aspen vintage White Distressed Lantern in a medium size. These miniature lanterns really show your rustic style! Simply place them on a table or hang them at your venue to light up the space.</p>',NULL,19,'430',4,1,0,'candleLantern.png','default_small_image.png',1,'2020-01-17 08:42:53','2020-01-17 08:42:53'),(5,'Sommerford Nightstand','Made with reclaimed Pine solids that have taken on the patina of time and will include nail holes, patches, dings and gouges. Finished in a light grayish brown color that accentuates the color variations brought on by time and use. Drawers have fully finished English dovetail drawer construction with ball bearing side glides. Arched bar pull hardware with nail head detailing in an industrial silver/bronze color finish.','<p>Made with reclaimed Pine solids that have taken on the patina of time and will include nail holes, patches, dings and gouges. Finished in a light grayish brown color that accentuates the color variations brought on by time and use. Drawers have fully finished English dovetail drawer construction with ball bearing side glides. Arched bar pull hardware with nail head detailing in an industrial silver/bronze color finish.</p>',NULL,209,'9320',5,2,0,'nightstand.png','default_small_image.png',1,'2020-01-17 08:48:43','2020-01-17 08:48:43'),(6,'MIJIA QUARTZ WATCH','Main Features:\nBluetooth 4.0 chip, low consumption and fast-paced\nIP67 waterproof, not afraid of rainy days or any outdoor activities\n1.5 inch round glass screen, show you high-resolution images\nAutomatic calibration time switch time zone freely\nPedometer, built-in motion sensor, record every step of life','<p>Brand: Xiaomi Mijia<br>\nBluetooth Version: Bluetooth 4.0<br>\nBuilt-in chip type: NRF52832<br>\nIP rating: IP67<br>\nWaterproof: Yes<br>\nAlert type: Vibration<br>\nBluetooth calling: Phone call reminder<br>\nHealth tracker: Pedometer<br>\nOther Function: Bluetooth,Alarm,Waterproof<br>\nOperating mode: Press button<br>\nBattery Capacity: 320mAh<br>\nStandby time: 6 months<br>\nType of battery: CR2430<br>\nBand material: Leather<br>\nCase material: Stainless Steel<br>\nShape of the dial: Square<br>\nCompatability: Android 4.4 / iOS 7.0 or above<br>\nCompatible OS: Android,IOS<br>\nDial size: 4.00 x 4.00 x 1.19<br>\nPackage size (L x W x H): 31.00 x 3.50 x 8.00 cm / 12.2 x 1.38 x 3.15 inches<br>\nPackage weight: 0.1870 kg<br>\nProduct size (L x W x H): 24.00 x 4.00 x 1.19 cm / 9.45 x 1.57 x 0.47 inches<br>\nProduct weight: 0.0420 kg</p>',NULL,49,'4210',1,7,0,'xiaomi_mijia_watch.png','default_small_image.png',1,'2020-01-17 08:54:36','2020-01-17 08:56:40'),(7,'Solar Lights Outdoor','IP65 waterproof to ensure the light work properly no matter rain, snow or heat. Great workmanship and high quality material keep your house light up every night','<p>Empty</p>',NULL,29,'32',2,6,0,'outdoorLights.png','default_small_image.png',1,'2020-01-17 09:14:06','2020-01-17 09:14:06');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'user','2020-01-18 11:13:08','2020-01-18 11:13:08');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `role_id` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-19 12:07:28
