-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: d9c88q3e09w6fdb2.cbetxkdyhwsb.us-east-1.rds.amazonaws.com    Database: yj3q0vxvbwkmsws2
-- ------------------------------------------------------
-- Server version	5.7.23-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
-- SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

-- SET @@GLOBAL.GTID_PURGED='';

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `email_id` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `preference` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email_id_UNIQUE` (`email_id`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES ('email1@gmail.com','Name1','both','user1','password'),('email2@gmail.com','Nmae2','both','user2','password');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `food_name` varchar(45) NOT NULL,
  `food_details` varchar(400) DEFAULT NULL,
  `food_preference` varchar(45) NOT NULL,
  `restaurant_username` varchar(45) NOT NULL,
  `food_price` varchar(45) NOT NULL,
  `food_quantity` varchar(45) NOT NULL,
  `imglink` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`food_id`),
  UNIQUE KEY `imglink_UNIQUE` (`imglink`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Meal','4 Rotis, 1 cup rice, daal, bhindi sabji','both','rest 1','140','4 Rotis, 1 cup rice, daal, bhindi sabji','uploads/meal.jpeg'),(2,'Burger','Burger','both','rest 2','80','1','uploads/burger.webp'),(3,'Sandwich','Grilled Cheese Sandwich','both','rest 2','100','100gms','uploads/sandwich.jpeg'),(4,'Pav Bhaji','It consists of a thick vegetable curry served with a soft bread roll. Its origins are in the state of Maharashtra.','both','rest 1','100','4 bread, 1 plate bhaji','uploads/pav_bhaji.jpeg'),(5,'Chole Bhature ','It is a combination of chana masala and bhatura/Puri, a fried bread made from maida. There is a distinct Punjabi variant of the dish.','both','rest 3','75','2 bhature, 1 plate Chole, onion, pickle and p','uploads/chole_bhature.jpeg'),(7,'Pie','Apple Pie ','both','rest 2','500','1 pie, 1 Kg','uploads/pie.jpg');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `restaurants`
--

DROP TABLE IF EXISTS `restaurants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `restaurants` (
  `restaurant_name` varchar(45) NOT NULL,
  `restaurant_details` varchar(45) DEFAULT NULL,
  `restaurant_preference` varchar(45) NOT NULL,
  `restaurant_username` varchar(45) NOT NULL,
  `restaurant_password` varchar(45) NOT NULL,
  PRIMARY KEY (`restaurant_username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `restaurants`
--

LOCK TABLES `restaurants` WRITE;
/*!40000 ALTER TABLE `restaurants` DISABLE KEYS */;
INSERT INTO `restaurants` VALUES ('Restaurant 1','r1','both','r1','password');
/*!40000 ALTER TABLE `restaurants` ENABLE KEYS */;
UNLOCK TABLES;
-- SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-29 21:59:54
