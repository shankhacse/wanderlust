/*
SQLyog Ultimate v10.00 Beta1
MySQL - 5.5.5-10.1.34-MariaDB : Database - wanderlust
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`wanderlust` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `wanderlust`;

/*Table structure for table `activity_log` */

DROP TABLE IF EXISTS `activity_log`;

CREATE TABLE `activity_log` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `activity_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `activity_url` varchar(200) DEFAULT NULL,
  `activity_module` varchar(200) DEFAULT NULL,
  `activity_desc` varchar(200) DEFAULT NULL,
  `activity_action` enum('VIEW','UPDATE','DELETE','INSERT','LOGIN_SUCCESS','LOGIN_FAILED','LOGOUT','INSERT_ERROR','UPDATE_ERROR','ERROR','DELETE_ERROR') DEFAULT NULL,
  `master_id` int(10) DEFAULT '0',
  `ip` varchar(100) DEFAULT NULL,
  `browser` varchar(100) DEFAULT NULL,
  `platform` varchar(100) DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8;

/*Data for the table `activity_log` */

insert  into `activity_log`(`id`,`activity_date`,`activity_url`,`activity_module`,`activity_desc`,`activity_action`,`master_id`,`ip`,`browser`,`platform`,`user_id`) values (1,'2020-06-03 16:27:59','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(2,'2020-06-03 16:28:17','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',1,'::1','Firefox','Windows 7',1),(3,'2020-06-03 16:29:08','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Chrome','Windows 7',1),(4,'2020-06-03 16:29:27','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(5,'2020-06-03 16:29:34','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',4,'::1','Firefox','Windows 7',1),(6,'2020-06-03 16:34:16','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(7,'2020-06-03 16:38:10','http://localhost/wanderlust/adminportal/user/InactiveUser/11','User','Update successfully','UPDATE',11,'::1','Firefox','Windows 7',2),(8,'2020-06-03 16:38:14','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',6,'::1','Firefox','Windows 7',2),(9,'2020-06-03 16:38:17','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(10,'2020-06-03 16:38:22','http://localhost/wanderlust/adminportal/user/InactiveUser/2','User','Update successfully','UPDATE',2,'::1','Firefox','Windows 7',1),(11,'2020-06-03 16:38:27','http://localhost/wanderlust/adminportal/user/ActiveUser/2','User','Update successfully','UPDATE',2,'::1','Firefox','Windows 7',1),(12,'2020-06-03 16:40:27','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',9,'::1','Firefox','Windows 7',1),(13,'2020-06-03 16:41:32','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(14,'2020-06-03 16:42:23','http://localhost/wanderlust/adminportal/user/ActiveUser/11','User','Update successfully','UPDATE',11,'::1','Firefox','Windows 7',1),(15,'2020-06-04 13:54:00','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(16,'2020-06-04 15:53:46','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',15,'::1','Firefox','Windows 7',1),(17,'2020-06-04 15:54:06','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(18,'2020-06-04 15:54:32','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',17,'::1','Firefox','Windows 7',2),(19,'2020-06-04 15:54:39','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(20,'2020-06-04 15:54:49','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(21,'2020-06-04 15:55:32','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(22,'2020-06-04 15:56:03','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(23,'2020-06-04 15:56:45','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(24,'2020-06-04 15:57:09','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(25,'2020-06-04 15:58:10','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',24,'::1','Firefox','Windows 7',1),(26,'2020-06-04 15:58:21','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(27,'2020-06-04 16:13:27','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',26,'::1','Firefox','Windows 7',2),(28,'2020-06-04 16:13:44','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(29,'2020-06-04 16:15:04','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(30,'2020-06-04 16:15:08','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',29,'::1','Firefox','Windows 7',1),(31,'2020-06-04 16:15:21','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(32,'2020-06-04 16:18:01','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',31,'::1','Firefox','Windows 7',2),(33,'2020-06-04 16:18:08','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(34,'2020-06-04 16:20:02','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Chrome','Windows 7',1),(35,'2020-06-04 16:20:20','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',34,'::1','Chrome','Windows 7',1),(36,'2020-06-04 16:20:38','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Chrome','Windows 7',2),(37,'2020-06-04 16:22:39','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',33,'::1','Firefox','Windows 7',1),(38,'2020-06-04 16:22:53','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(39,'2020-06-04 16:41:54','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',13,'::1','Firefox','Windows 7',2),(40,'2020-06-04 16:41:54','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',14,'::1','Firefox','Windows 7',2),(41,'2020-06-04 16:41:54','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',15,'::1','Firefox','Windows 7',2),(42,'2020-06-04 16:41:54','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',16,'::1','Firefox','Windows 7',2),(43,'2020-06-04 16:42:04','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',38,'::1','Firefox','Windows 7',2),(44,'2020-06-04 16:42:06','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(45,'2020-06-04 16:42:29','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',44,'::1','Firefox','Windows 7',1),(46,'2020-06-04 16:42:32','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(47,'2020-06-04 16:43:21','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',17,'::1','Firefox','Windows 7',2),(48,'2020-06-04 16:43:21','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',18,'::1','Firefox','Windows 7',2),(49,'2020-06-04 16:43:21','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',19,'::1','Firefox','Windows 7',2),(50,'2020-06-04 16:43:21','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',20,'::1','Firefox','Windows 7',2),(51,'2020-06-04 16:43:21','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',21,'::1','Firefox','Windows 7',2),(52,'2020-06-04 16:43:26','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',46,'::1','Firefox','Windows 7',2),(53,'2020-06-04 16:43:42','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',11),(54,'2020-06-04 16:44:50','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',53,'::1','Firefox','Windows 7',11),(55,'2020-06-04 16:44:56','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(56,'2020-06-04 16:45:04','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',22,'::1','Firefox','Windows 7',2),(57,'2020-06-04 16:45:04','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',23,'::1','Firefox','Windows 7',2),(58,'2020-06-04 16:45:04','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',24,'::1','Firefox','Windows 7',2),(59,'2020-06-04 16:45:04','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',25,'::1','Firefox','Windows 7',2),(60,'2020-06-04 16:45:04','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',26,'::1','Firefox','Windows 7',2),(61,'2020-06-04 16:45:06','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',55,'::1','Firefox','Windows 7',2),(62,'2020-06-04 16:45:11','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',11),(63,'2020-06-04 16:45:34','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',62,'::1','Firefox','Windows 7',11),(64,'2020-06-04 16:45:38','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(65,'2020-06-04 17:15:47','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',27,'::1','Firefox','Windows 7',2),(66,'2020-06-04 17:15:47','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',28,'::1','Firefox','Windows 7',2),(67,'2020-06-04 17:16:45','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',29,'::1','Firefox','Windows 7',2),(68,'2020-06-04 17:16:45','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',30,'::1','Firefox','Windows 7',2),(69,'2020-06-04 17:17:35','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',31,'::1','Firefox','Windows 7',2),(70,'2020-06-04 17:17:35','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',32,'::1','Firefox','Windows 7',2),(71,'2020-06-04 17:17:59','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',33,'::1','Firefox','Windows 7',2),(72,'2020-06-04 17:17:59','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',34,'::1','Firefox','Windows 7',2),(73,'2020-06-04 17:18:05','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',64,'::1','Firefox','Windows 7',2),(74,'2020-06-04 17:18:07','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(75,'2020-06-04 17:18:20','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',74,'::1','Firefox','Windows 7',1),(76,'2020-06-04 17:18:25','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(77,'2020-06-04 17:18:48','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',35,'::1','Firefox','Windows 7',2),(78,'2020-06-04 17:18:48','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',36,'::1','Firefox','Windows 7',2),(79,'2020-06-04 17:18:48','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',37,'::1','Firefox','Windows 7',2),(80,'2020-06-04 17:18:53','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',76,'::1','Firefox','Windows 7',2),(81,'2020-06-04 17:19:01','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(82,'2020-06-04 17:19:14','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',38,'::1','Firefox','Windows 7',2),(83,'2020-06-04 17:19:14','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',39,'::1','Firefox','Windows 7',2),(84,'2020-06-04 17:19:14','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',40,'::1','Firefox','Windows 7',2),(85,'2020-06-04 17:19:18','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',81,'::1','Firefox','Windows 7',2),(86,'2020-06-04 17:19:21','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',11),(87,'2020-06-04 17:19:28','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',86,'::1','Firefox','Windows 7',11),(88,'2020-06-04 17:19:31','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(89,'2020-06-04 17:21:13','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',88,'::1','Firefox','Windows 7',1),(90,'2020-06-04 17:21:16','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(91,'2020-06-04 17:21:32','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',41,'::1','Firefox','Windows 7',2),(92,'2020-06-04 17:21:32','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',42,'::1','Firefox','Windows 7',2),(93,'2020-06-04 17:21:58','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',90,'::1','Firefox','Windows 7',2),(94,'2020-06-04 17:22:01','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(95,'2020-06-04 17:22:31','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',94,'::1','Firefox','Windows 7',1),(96,'2020-06-04 17:22:35','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(97,'2020-06-04 17:22:52','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',43,'::1','Firefox','Windows 7',2),(98,'2020-06-04 17:22:52','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',44,'::1','Firefox','Windows 7',2),(99,'2020-06-04 17:22:52','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',45,'::1','Firefox','Windows 7',2),(100,'2020-06-04 17:22:52','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',46,'::1','Firefox','Windows 7',2),(101,'2020-06-04 17:22:52','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',47,'::1','Firefox','Windows 7',2),(102,'2020-06-04 17:22:52','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',48,'::1','Firefox','Windows 7',2),(103,'2020-06-04 17:22:52','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',49,'::1','Firefox','Windows 7',2),(104,'2020-06-04 17:22:55','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',96,'::1','Firefox','Windows 7',2),(105,'2020-06-04 17:23:00','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(106,'2020-06-04 17:23:45','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',105,'::1','Firefox','Windows 7',1),(107,'2020-06-04 17:23:48','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(108,'2020-06-04 17:24:03','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',50,'::1','Firefox','Windows 7',2),(109,'2020-06-04 17:24:13','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',107,'::1','Firefox','Windows 7',2),(110,'2020-06-04 17:24:16','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(111,'2020-06-04 17:24:49','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',51,'::1','Firefox','Windows 7',2),(112,'2020-06-04 17:24:49','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',52,'::1','Firefox','Windows 7',2),(113,'2020-06-05 12:50:37','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(114,'2020-06-05 12:50:42','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',113,'::1','Firefox','Windows 7',1),(115,'2020-06-05 12:50:45','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(116,'2020-06-05 12:52:43','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',53,'::1','Firefox','Windows 7',2),(117,'2020-06-05 12:52:43','http://localhost/wanderlust/adminportal/menupermission/AssignMenu','User Management','Menu permitted successfully','INSERT',54,'::1','Firefox','Windows 7',2),(118,'2020-06-05 14:05:00','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',115,'::1','Firefox','Windows 7',2),(119,'2020-06-05 14:05:04','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(120,'2020-06-05 14:58:05','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',119,'::1','Firefox','Windows 7',2),(121,'2020-06-05 14:58:11','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(122,'2020-06-05 14:58:29','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(123,'2020-06-05 21:01:55','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(124,'2020-06-05 22:36:02','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(125,'2020-06-05 23:07:43','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',124,'::1','Firefox','Windows 7',2),(126,'2020-06-05 23:07:47','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(127,'2020-06-05 23:07:53','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',126,'::1','Firefox','Windows 7',1),(128,'2020-06-05 23:07:56','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(129,'2020-06-06 10:57:55','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(130,'2020-06-06 11:38:31','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',129,'::1','Firefox','Windows 7',2),(131,'2020-06-06 11:38:34','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(132,'2020-06-06 11:42:05','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',131,'::1','Firefox','Windows 7',2),(133,'2020-06-06 11:42:09','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1),(134,'2020-06-06 11:42:19','http://localhost/wanderlust/adminportal/login/logout','Logout','Logout done','LOGOUT',133,'::1','Firefox','Windows 7',1),(135,'2020-06-06 11:42:23','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(136,'2020-06-06 13:59:04','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(137,'2020-06-07 14:56:27','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(138,'2020-06-07 17:52:00','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login Failed','LOGIN_FAILED',0,'::1','Firefox','Windows 7',0),(139,'2020-06-07 17:52:05','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',2),(140,'2020-06-08 16:38:09','http://localhost/wanderlust/adminportal/login/verifylogin','Login','Login successfully','LOGIN_SUCCESS',0,'::1','Firefox','Windows 7',1);

/*Table structure for table `admin_menu_master` */

DROP TABLE IF EXISTS `admin_menu_master`;

CREATE TABLE `admin_menu_master` (
  `admin_menu_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `is_submenu` enum('N','Y') DEFAULT NULL,
  `parent_menu_id` int(10) DEFAULT NULL,
  `srl` int(10) DEFAULT NULL,
  `active` tinyint(1) DEFAULT '1',
  `is_developer_menu` tinyint(1) DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `admin_menu_master` */

insert  into `admin_menu_master`(`admin_menu_id`,`name`,`link`,`is_submenu`,`parent_menu_id`,`srl`,`active`,`is_developer_menu`,`created_on`,`created_by`,`icon`) values (1,'User Management','#','N',0,2,1,1,'2020-06-02 23:02:46',1,'nav-icon fas fa-user'),(2,'User','user','Y',1,1,1,0,'2020-06-02 23:02:57',1,'far fa-circle nav-icon'),(3,'User Audit','useraudit','Y',1,2,1,0,'2020-06-02 23:03:38',1,'far fa-circle nav-icon'),(4,'Menu Permission','menupermission','Y',1,3,1,0,'2020-06-02 23:03:55',1,'far fa-circle nav-icon'),(5,'Master','#','N',0,3,1,0,'2020-06-02 23:04:25',1,'nav-icon fas fa-edit'),(6,'Hotel','masters/hotels','Y',5,1,1,0,'2020-06-02 23:05:39',1,'far fa-circle nav-icon'),(7,'Room Type','masters/roomtype','Y',5,2,1,0,'2020-06-02 23:06:33',1,'far fa-circle nav-icon'),(8,'Room Master','masters/room','Y',5,3,1,0,'2020-06-02 23:06:58',1,'far fa-circle nav-icon'),(9,'Room Rate','masters/addRoomrate','Y',5,4,1,0,'2020-06-02 23:07:21',1,'far fa-circle nav-icon'),(10,'Dashboard','dashboard','Y',0,1,1,0,'2020-06-06 11:01:08',NULL,'nav-icon fas fa-tachometer-alt');

/*Table structure for table `admin_user_menus` */

DROP TABLE IF EXISTS `admin_user_menus`;

CREATE TABLE `admin_user_menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `adm_menu_id` int(10) DEFAULT NULL,
  `read` tinyint(1) DEFAULT '0',
  `write` tinyint(1) DEFAULT '0',
  `assigned_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `assigned_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

/*Data for the table `admin_user_menus` */

insert  into `admin_user_menus`(`id`,`user_id`,`adm_menu_id`,`read`,`write`,`assigned_on`,`assigned_by`) values (1,2,1,1,0,'2020-06-04 16:15:56',1),(2,2,2,0,0,'2020-06-04 16:15:57',1),(3,2,3,0,0,'2020-06-04 16:15:57',1),(4,2,4,0,0,'2020-06-04 16:15:58',1),(5,2,5,0,0,'2020-06-04 16:15:58',1),(6,2,6,0,0,'2020-06-04 16:15:59',1),(7,2,7,0,0,'2020-06-04 16:15:59',1),(8,2,8,0,0,'2020-06-04 16:16:01',1),(9,2,9,0,0,'2020-06-04 16:16:02',1),(51,1,2,1,1,'2020-06-04 18:10:24',2),(52,1,1,1,1,'2020-06-04 17:24:49',2),(53,13,3,1,1,'2020-06-05 12:52:43',2),(54,13,1,1,1,'2020-06-05 12:52:43',2),(55,2,10,0,0,'2020-06-06 11:01:44',2);

/*Table structure for table `booking_details` */

DROP TABLE IF EXISTS `booking_details`;

CREATE TABLE `booking_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `booking_id` int(10) NOT NULL,
  `room_id` int(10) NOT NULL,
  `no_of_mattress` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `booking_details` */

/*Table structure for table `booking_master` */

DROP TABLE IF EXISTS `booking_master`;

CREATE TABLE `booking_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `check_in_dt` datetime DEFAULT NULL,
  `check_out_dt` datetime DEFAULT NULL,
  `booking_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `booking_ref_no` varchar(255) DEFAULT NULL,
  `no_of_adults` int(10) DEFAULT NULL,
  `no_of_child` int(10) DEFAULT NULL,
  `member_id` int(10) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(25) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `booking_master` */

/*Table structure for table `facility_master` */

DROP TABLE IF EXISTS `facility_master`;

CREATE TABLE `facility_master` (
  `facility_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`facility_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `facility_master` */

insert  into `facility_master`(`facility_id`,`name`,`icon`) values (1,'24-hour Reception','flaticon-room-service'),(2,'Room Service','flaticon-room-service'),(3,'Flat Screen TV','flaticon-graph-line-screen'),(4,'Gym','flaticon-weightlifting'),(5,'Free Parking','flaticon-parking'),(6,'Air conditioning','flaticon-air-conditioning'),(7,'Balcony','flaticon-balcony-and-door'),(8,'Bedroom','flaticon-bed');

/*Table structure for table `floor_master` */

DROP TABLE IF EXISTS `floor_master`;

CREATE TABLE `floor_master` (
  `floor_id` int(10) NOT NULL AUTO_INCREMENT,
  `floor_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`floor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `floor_master` */

insert  into `floor_master`(`floor_id`,`floor_name`) values (1,'Ground'),(2,'First'),(3,'Second'),(4,'Third'),(5,'Fourth'),(6,'Fifth');

/*Table structure for table `homepage_settings` */

DROP TABLE IF EXISTS `homepage_settings`;

CREATE TABLE `homepage_settings` (
  `home_set_id` int(10) NOT NULL AUTO_INCREMENT,
  `home_title` varchar(255) DEFAULT NULL,
  `home_logo` varchar(255) DEFAULT NULL,
  `banner_1` varchar(255) DEFAULT NULL,
  `banner_2` varchar(255) DEFAULT NULL,
  `banner_3` varchar(255) DEFAULT NULL,
  `dm_desk_info` text,
  `dm_image` varchar(255) DEFAULT NULL,
  `notable_achievments` text,
  `succes_stories` text,
  `type` enum('DIST','BLOCK') DEFAULT NULL,
  `block_slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`home_set_id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

/*Data for the table `homepage_settings` */

insert  into `homepage_settings`(`home_set_id`,`home_title`,`home_logo`,`banner_1`,`banner_2`,`banner_3`,`dm_desk_info`,`dm_image`,`notable_achievments`,`succes_stories`,`type`,`block_slug`) values (1,'South 24 Parganas , WEST BENGAL','5dc66c9331adc1573285011.png','1dad962d6ccb7d5382a268bfb0e6977c.jpg','0448901cc378dd2f78956febf54bde3d.jpg','9f6b20148b6cb887ad86ec807dc843f7.jpg','South 24 Parganas is, indeed, a complex district, stretching from the metropolitan Kolkata to the remote riverine villages upto the mouth of Bay of Bengal, Apart from its staggering size and population, the district administration has to contend with problems typical of metropolitan living in the urban area such as high population density and overload civic infrastructure and in complete contrast2','dm.jpg','&lt;p&gt;&lt;em&gt;&lt;strong&gt;South 24 Parganas&lt;/strong&gt;&lt;/em&gt; is, indeed, a complex district, stretching from the metropolitan Kolkata to the remote riverine villages upto the mouth of Bay of Bengal, Apart from its staggering size and population, the district administration has to contend with problems typical of metropolitan living in the urban area ss&lt;/p&gt;','&lt;p&gt;The nomenclature 24-Parganas has been in vogue since 15 July 1757 when Mir Jafar whom the East India Company had just established as Nawab of Bengal ceded to the Company the rights of 24 mahals. The treaty by which the cession is recorded says that &amp;amp;ldquoall the land lying to the south of Calcutta as far as Culpee, shall be under the Zemindari of the English Company and all the officers of this Zemindari shall be under their jurisdiction. The revenue to be paid by it (the company) in the same manner with other Zemindari&amp;amp;rdquo. The Parwana notifying effect to the Treaty mentions the name of the 24 units of granted land.&lt;/p&gt;\r\n\r\n&lt;p&gt;The District of 24-Parganas started taking shape under Clause Nos.2,3 and 9 of the Regualtion of 1793. The respective jurisdictions of the civil and criminal courts for the district and revenue jurisdiction of the District Collector were demarcated by the Regulations. This arrangement remained valid till 1800.&lt;/p&gt;\r\n\r\n&lt;p&gt;The present district of South 24 Parganas came into existence on 1st of March, 1986. It then comprised of two sub divisions- Alipore and Diamond Harbour and of 30 blocks. Presently there are five sub divisions (Alipore, Baruipur, Canning, Diamond Harbour and Kakdwip), 29 blocks and 7 Municipalities.&lt;/p&gt;\r\n\r\n&lt;p&gt;South 24 Parganas is, indeed, a complex district, stretching from the metropolitan Kolkata to the remote riverine villages upto the mouth of Bay of Bengal, Apart from its staggering size and population, the district administration has to contend with problems typical of metropolitan living in the urban area such as high population density and overload civic infrastructure and in complete contrast, in the rural area the lack of transport and communication facilities and weak delivery systems. 84% of the population lives in the rural areas, where development is taken care of by the panchayat bodies. The remaining 16% population is looked after by the Kolkata Municipal Corporation and seven municipalities. The scheduled caste comprises 39% of the total population and B.P.L. families constitute 37.21% of the population.&lt;/p&gt;','DIST',NULL),(2,NULL,NULL,'0a96d64ec20a90248e755461b61a6c3e.jpg','2de2069b48965c7fda27f091f6c83ad2.jpg','8541cb0dc85218aba77aa445aa0db608.jpg',NULL,NULL,NULL,NULL,'BLOCK','baruipur'),(3,NULL,NULL,'05bd0ca23016d4d76aacb0f7faa53003.jpg','2770359b1296e0cf2821eea518e8ae38.jpg',NULL,NULL,NULL,NULL,NULL,'BLOCK','basanti'),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','bhangore_I'),(5,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','bhangore_II'),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','bishnupur_I'),(7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','bishnupur_II'),(8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','budge_budge_I'),(9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','budge_budge_II'),(10,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','canning_I'),(11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','canning_II'),(12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','diamond_harbour_I'),(13,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','diamond_harbour_II'),(14,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','falta'),(15,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','gosaba'),(16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','joynagar_I'),(17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','joynagar_II'),(18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','kakdwip'),(19,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','kulpi'),(20,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','kultali'),(21,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','magrahat_I'),(22,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','magrahat_II'),(23,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','mandirbazar'),(24,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','mathurapur_I'),(25,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','mathurapur_II'),(26,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','namkhana'),(27,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','pathar_pratima'),(28,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','sagar'),(29,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','sonarpur'),(30,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BLOCK','thakurpukur_mahestala');

/*Table structure for table `hotels` */

DROP TABLE IF EXISTS `hotels`;

CREATE TABLE `hotels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) DEFAULT NULL,
  `hotel_desc` mediumtext,
  `hotel_uniq_code` varchar(100) DEFAULT NULL,
  `hotel_address` text,
  `hotel_pincode` varchar(20) DEFAULT NULL,
  `hotel_contact_no` varchar(20) DEFAULT NULL,
  `hotel_email` varchar(100) DEFAULT NULL,
  `state_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `hotels` */

/*Table structure for table `hotels_master` */

DROP TABLE IF EXISTS `hotels_master`;

CREATE TABLE `hotels_master` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `gstin` varchar(255) DEFAULT NULL,
  `contactno` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `description` text,
  `pincode` varchar(255) DEFAULT NULL,
  `state` int(10) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_by` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `hotels_master` */

insert  into `hotels_master`(`id`,`name`,`gstin`,`contactno`,`email`,`address`,`description`,`pincode`,`state`,`created_on`,`created_by`) values (1,'Mi','hgh','ghggf g','ghgfg','vggfg','ghg','hghg',0,'2020-03-30 23:16:34',1);

/*Table structure for table `member_master` */

DROP TABLE IF EXISTS `member_master`;

CREATE TABLE `member_master` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `member_code` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` text,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `member_master` */

insert  into `member_master`(`id`,`member_code`,`name`,`mobile_no`,`email`,`address`,`city`,`state`,`pincode`,`profile_image`,`reg_date`,`password`) values (15,'WL0018','Anil Kumar','9883535635','anilk6385@gmail.com',NULL,NULL,NULL,NULL,NULL,'2020-06-06 13:16:22','e10adc3949ba59abbe56e057f20f883e'),(16,'WL0019','Sunil Gupta','8910088950','sunil@gmail.com',NULL,NULL,NULL,NULL,NULL,'2020-06-06 13:50:54','e10adc3949ba59abbe56e057f20f883e'),(17,'WL0020','bddgh','4252542345','anilk6385@gmail.com',NULL,NULL,NULL,NULL,NULL,'2020-06-06 14:04:31','e10adc3949ba59abbe56e057f20f883e'),(18,'WL0021','sdfdg','2542356356','anilk6385@gmail.com',NULL,NULL,NULL,NULL,NULL,'2020-06-06 14:32:21','e10adc3949ba59abbe56e057f20f883e');

/*Table structure for table `package_type_master` */

DROP TABLE IF EXISTS `package_type_master`;

CREATE TABLE `package_type_master` (
  `package_type_id` int(10) NOT NULL AUTO_INCREMENT,
  `package_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`package_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `package_type_master` */

insert  into `package_type_master`(`package_type_id`,`package_name`) values (1,'3 days'),(2,'6 days'),(3,'7 days');

/*Table structure for table `room_facilities` */

DROP TABLE IF EXISTS `room_facilities`;

CREATE TABLE `room_facilities` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) DEFAULT NULL,
  `facility_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=316 DEFAULT CHARSET=latin1;

/*Data for the table `room_facilities` */

insert  into `room_facilities`(`id`,`room_id`,`facility_id`) values (280,24,1),(281,24,3),(298,23,1),(299,23,2),(300,23,3),(301,23,4),(306,25,1),(307,25,3),(308,22,1),(309,22,2),(310,22,3),(311,22,4),(312,22,5),(313,22,6),(314,22,7),(315,22,8);

/*Table structure for table `room_gallery` */

DROP TABLE IF EXISTS `room_gallery`;

CREATE TABLE `room_gallery` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `large_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=latin1;

/*Data for the table `room_gallery` */

insert  into `room_gallery`(`id`,`room_id`,`thumbnail`,`large_image`) values (11,1,'11433c46ed1c1d64a3a556c4e11bc552.jpg','11433c46ed1c1d64a3a556c4e11bc552.jpg'),(12,1,'1eee2c95f9f25efb70a2d6931018374d.jpg','1eee2c95f9f25efb70a2d6931018374d.jpg'),(13,1,'ca163c9f46641a03bd44cc23ea315563.jpg','ca163c9f46641a03bd44cc23ea315563.jpg'),(37,11,'a25999f98bf7d1e7b9345fa7d33672a5.jpg','a25999f98bf7d1e7b9345fa7d33672a5.jpg'),(44,11,'5870fedcdd2831af0cf4f0dc50ce030a.jpg','5870fedcdd2831af0cf4f0dc50ce030a.jpg'),(48,21,'63ff3e9096ed65f9b38130d99dce19aa.jpg','63ff3e9096ed65f9b38130d99dce19aa.jpg'),(49,21,'20825f7248dd62059ad3820fcc659fec.jpg','20825f7248dd62059ad3820fcc659fec.jpg'),(50,21,'dcd3ef6a6d006d04b67bf52d075c0b0f.jpg','dcd3ef6a6d006d04b67bf52d075c0b0f.jpg'),(53,11,'67440dce720c992f0a5cfc18c27ddd69.jpg','67440dce720c992f0a5cfc18c27ddd69.jpg'),(54,22,'57dcc753fbb52fad5bcde5a02fb02abf.jpg','57dcc753fbb52fad5bcde5a02fb02abf.jpg'),(55,22,'b9e82bb0ff432131fac1f8f4c74e3a0e.jpg','b9e82bb0ff432131fac1f8f4c74e3a0e.jpg'),(56,22,'0dd3e3e45495f9ab27b0142664ca3286.jpg','0dd3e3e45495f9ab27b0142664ca3286.jpg'),(57,23,'aebc3096961b28555f244e7bf34c54e3.jpg','aebc3096961b28555f244e7bf34c54e3.jpg'),(58,23,'ecde65a0ec19568e4d4374c679dfcb69.jpg','ecde65a0ec19568e4d4374c679dfcb69.jpg'),(59,23,'5a8317536027696bd87099bf8a328ec3.jpg','5a8317536027696bd87099bf8a328ec3.jpg'),(60,24,'20359f0d6ae79fc86077e4e91c39a473.jpg','20359f0d6ae79fc86077e4e91c39a473.jpg'),(61,24,'def23d48ab083c5437aaf837ab1ad115.jpg','def23d48ab083c5437aaf837ab1ad115.jpg'),(62,24,'80fe894b64de5559512a0aa4f9a0a7ec.jpg','80fe894b64de5559512a0aa4f9a0a7ec.jpg'),(63,25,'df83c529ab525a152d82f6e6dae24ff7.jpg','df83c529ab525a152d82f6e6dae24ff7.jpg'),(64,25,'e89fa0e372e57e8d68dad62abdbbd271.jpg','e89fa0e372e57e8d68dad62abdbbd271.jpg'),(65,25,'1b1f19c3d961597e2c3272def69e7155.jpg','1b1f19c3d961597e2c3272def69e7155.jpg');

/*Table structure for table `room_master` */

DROP TABLE IF EXISTS `room_master`;

CREATE TABLE `room_master` (
  `room_id` int(10) NOT NULL AUTO_INCREMENT,
  `floor_id` int(10) DEFAULT NULL,
  `room_type_id` int(10) DEFAULT NULL,
  `room_no` varchar(255) DEFAULT NULL,
  `room_short_desc` varchar(255) DEFAULT NULL,
  `full_desc` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `created_on` datetime DEFAULT NULL,
  `max_adult` int(10) DEFAULT NULL,
  `max_child` int(10) DEFAULT NULL,
  `cover_photo` varchar(255) DEFAULT NULL,
  `no_of_mattress` int(10) DEFAULT NULL,
  `each_mattress_price` int(10) DEFAULT NULL,
  `maximum_no_person` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `room_master` */

insert  into `room_master`(`room_id`,`floor_id`,`room_type_id`,`room_no`,`room_short_desc`,`full_desc`,`price`,`created_on`,`max_adult`,`max_child`,`cover_photo`,`no_of_mattress`,`each_mattress_price`,`maximum_no_person`) values (22,1,1,'001','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su',NULL,'2020-05-07 00:00:00',2,1,'7806a89f9526b57b97c4d08a5fd2d999.jpg',3,500,6),(23,2,2,'002','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su',NULL,'2020-05-07 00:00:00',5,2,'7055b3240d0e2b37ade363426699358f.jpg',5,300,NULL),(24,2,1,'123','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su',NULL,'2020-05-09 00:00:00',3,2,'0ac7c850bfbf99d678ae244ba37b565a.jpg',2,250,NULL),(25,1,1,'004','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su',NULL,'2020-05-11 00:00:00',2,2,'d20ea2862612109279c59d47f5ed7dac.jpg',2,600,NULL);

/*Table structure for table `room_rate_details` */

DROP TABLE IF EXISTS `room_rate_details`;

CREATE TABLE `room_rate_details` (
  `room_rate_id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) DEFAULT NULL,
  `rate` decimal(10,2) DEFAULT NULL,
  `package_type_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`room_rate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=119 DEFAULT CHARSET=utf8;

/*Data for the table `room_rate_details` */

insert  into `room_rate_details`(`room_rate_id`,`room_id`,`rate`,`package_type_id`) values (99,24,'1230.00',1),(100,24,'2340.00',3),(108,23,'2000.00',1),(109,23,'3500.00',2),(114,25,'1600.00',1),(115,25,'3000.00',2),(116,22,'1000.00',1),(117,22,'1800.00',2),(118,22,'2000.00',3);

/*Table structure for table `room_review` */

DROP TABLE IF EXISTS `room_review`;

CREATE TABLE `room_review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `room_id` int(10) DEFAULT NULL,
  `no_of_star` double(10,2) DEFAULT NULL,
  `comment` longtext,
  `member_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `room_review` */

/*Table structure for table `room_type` */

DROP TABLE IF EXISTS `room_type`;

CREATE TABLE `room_type` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `room_type` */

insert  into `room_type`(`id`,`type`,`code`) values (1,'Single Room','SNG'),(2,'Double Room','DBL'),(3,'Delux Room','DLX');

/*Table structure for table `serial_master` */

DROP TABLE IF EXISTS `serial_master`;

CREATE TABLE `serial_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial` int(11) DEFAULT NULL,
  `moduleTag` varchar(255) DEFAULT NULL,
  `lastnumber` int(11) DEFAULT NULL,
  `noofpaddingdigit` int(11) DEFAULT NULL,
  `module` varchar(255) DEFAULT NULL,
  `booking_type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `serial_master` */

insert  into `serial_master`(`id`,`serial`,`moduleTag`,`lastnumber`,`noofpaddingdigit`,`module`,`booking_type`) values (1,22,'WL',22,3,'REGISTER',NULL),(2,29,'WLB',29,3,'BOOKING CODE',NULL);

/*Table structure for table `user_role` */

DROP TABLE IF EXISTS `user_role`;

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `user_role` */

insert  into `user_role`(`id`,`role`) values (1,'Developer'),(2,'Admin'),(3,'User');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_password` varchar(50) DEFAULT NULL,
  `mobileno` varchar(15) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `user_type` enum('DIST','BLOCK') DEFAULT NULL,
  `block_slug_url` varchar(50) DEFAULT NULL,
  `permission_type` set('R','W') DEFAULT NULL,
  `salt` varchar(50) DEFAULT NULL,
  `user_role` int(10) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_medified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) DEFAULT NULL,
  `is_online` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`user_id`,`user_name`,`user_password`,`mobileno`,`firstname`,`lastname`,`user_type`,`block_slug_url`,`permission_type`,`salt`,`user_role`,`active`,`created_on`,`last_medified_on`,`created_by`,`is_online`) values (1,'admin','c11a9035c9d4cea36d023ce1e1016b7e93f6398e','1234567890','Admin',NULL,'DIST',NULL,'R,W','=Zvaxa.v',2,1,'2019-10-12 14:46:05','2019-10-12 14:46:05',1,'Y'),(2,'developer','c11a9035c9d4cea36d023ce1e1016b7e93f6398e','2345678912','Developer',NULL,'DIST',NULL,'R,W','=Zvaxa.v',1,1,'2019-12-03 16:08:53','2019-12-03 16:08:53',1,'Y'),(11,'mith123','c11a9035c9d4cea36d023ce1e1016b7e93f6398e','9898989898','Mithilesh','Routh','BLOCK','bhangore_II','R,W','=Zvaxa.v',3,1,'2020-02-07 16:59:22','2020-02-07 16:59:22',1,'N'),(12,'shankha','9a20b183f670142cb15097dc8ca72a8281426aa9','9898989812','Shankha','Ghosh','BLOCK','budge_budge_I','R,W','=Zvaxa.v',3,1,'2020-02-07 17:00:02','2020-02-07 17:00:02',1,'N'),(13,'sandeepan','0fdda5bf83c969cca5f923dad6782f1748a2d335','9898989898','Sandeepan','Sarkar','BLOCK','bhangore_I','R,W','aMpvpjjW',3,1,'2020-02-07 17:00:44','2020-02-07 17:00:44',1,'N');

/*Table structure for table `web_menu_master` */

DROP TABLE IF EXISTS `web_menu_master`;

CREATE TABLE `web_menu_master` (
  `menu_id` mediumint(3) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `link` varchar(100) DEFAULT NULL,
  `url_slug` varchar(100) DEFAULT NULL,
  `menu_title` varchar(100) DEFAULT NULL,
  `is_submenu` enum('N','Y') DEFAULT 'N',
  `parent_menu_id` mediumint(3) DEFAULT '0',
  `srl` smallint(2) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `menu_type` enum('BLOCK','DIST') DEFAULT NULL COMMENT 'D=District,B=Block,S=System',
  `is_menu_enabled` tinyint(1) DEFAULT '0',
  `page_or_link_id` int(11) DEFAULT NULL,
  `page_or_link_type` enum('PAGE','LINK') DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(10) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

/*Data for the table `web_menu_master` */

insert  into `web_menu_master`(`menu_id`,`name`,`link`,`url_slug`,`menu_title`,`is_submenu`,`parent_menu_id`,`srl`,`active`,`menu_type`,`is_menu_enabled`,`page_or_link_id`,`page_or_link_type`,`created_on`,`created_by`) values (1,'Administration','administration','administration','administration','Y',22,15,1,'DIST',1,6,'PAGE','2019-11-27 13:43:37',1),(2,'Blocks And Gram Panchayat','blocks_and_gram_panchayat','blocks_and_gram_panchayat','blocks_and_gram_panchayat','Y',22,17,1,'DIST',1,8,'PAGE','2019-11-27 13:43:37',1),(3,'Census','census','census','census','Y',26,24,1,'DIST',1,14,'PAGE','2019-11-27 13:43:37',1),(4,'Circular','circular','circular','circular','Y',36,31,1,'DIST',1,18,'PAGE','2019-11-27 13:43:37',1),(5,'Download Forms','download_forms','download_forms','download_forms','Y',36,33,1,'DIST',1,20,'PAGE','2019-11-27 13:43:37',1),(6,'Geography','geography','geography','geography','Y',24,4,1,'DIST',1,3,'PAGE','2019-11-27 13:43:37',1),(7,'Historical Background','historical_background','historical_background','historical_background','Y',24,3,1,'DIST',1,2,'PAGE','2019-11-27 13:43:37',1),(8,'Home','home','home','home','N',0,1,1,'DIST',1,1,'PAGE','2019-11-27 13:43:37',1),(9,'Important Offices','important_offices','important_offices','important_offices','Y',26,22,1,'DIST',1,12,'PAGE','2019-11-27 13:43:37',1),(10,'Industry','geography/industry','geography/industry','industry','Y',6,5,1,'DIST',1,4,'PAGE','2019-11-27 13:43:37',1),(11,'Message','message','message','message','Y',22,14,1,'DIST',1,5,'PAGE','2019-11-27 13:43:37',1),(12,'MP MLA','mp_mla','mp_mla','mp_mla','Y',26,21,1,'DIST',1,11,'PAGE','2019-11-27 13:43:37',1),(13,'News','news','news','news','Y',36,29,1,'DIST',1,17,'PAGE','2019-11-27 13:43:37',1),(14,'Notice & Orders','notice_&_orders','notice_&_orders','notice_&_orders','Y',36,28,1,'DIST',1,16,'PAGE','2019-11-27 13:43:37',1),(15,'Places of Interest','places_of_interest','places_of_interest','places_of_interest','Y',26,25,1,'DIST',1,15,'PAGE','2019-11-27 13:43:37',1),(16,'Political','blocks_and_gram_panchayat/political','blocks_and_gram_panchayat/political','political','Y',2,18,1,'DIST',1,9,'PAGE','2019-11-27 13:43:37',1),(17,'Recruitment','recruitment','recruitment','recruitment','Y',36,32,1,'DIST',1,19,'PAGE','2019-11-27 13:43:37',1),(18,'Sub Division','administration/sub_division','administration/sub_division','sub_division','Y',1,16,1,'DIST',1,7,'PAGE','2019-11-27 13:43:37',1),(19,'Telephone Directory','telephone_directory','telephone_directory','telephone_directory','Y',26,20,1,'DIST',1,10,'PAGE','2019-11-27 13:43:37',1),(20,'Tourism','tourism','tourism','tourism','Y',26,23,1,'DIST',1,13,'PAGE','2019-11-27 13:43:37',1),(21,'Where to Stay','where_to_stay','where_to_stay','where_to_stay','Y',25,45,1,'DIST',1,21,'PAGE','2019-11-27 13:43:37',1),(22,'Administration','','',NULL,'N',0,13,1,'DIST',1,2,'LINK','2019-11-27 13:43:51',1),(23,'Childline India','www.childlineindia.org.in/http:','www.childlineindia.org.in/http:','http://www.childlineindia.org.in','Y',28,43,1,'DIST',1,14,'LINK','2019-11-27 13:43:51',1),(24,'District Profile','','',NULL,'N',0,2,1,'DIST',1,1,'LINK','2019-11-27 13:43:51',1),(25,'EDISTRICT','','',NULL,'N',0,44,1,'DIST',0,15,'LINK','2019-11-27 13:43:51',1),(26,'General','','',NULL,'N',0,19,1,'DIST',1,3,'LINK','2019-11-27 13:43:51',1),(27,'GOI Official Website','www.india.gov.in/https:','www.india.gov.in/https:','https://www.india.gov.in','Y',28,35,1,'DIST',1,6,'LINK','2019-11-27 13:43:51',1),(28,'Important Links','','',NULL,'N',0,34,1,'DIST',1,5,'LINK','2019-11-27 13:43:51',1),(29,'Ministry Rural Website','www.rural.nic.in/http:','www.rural.nic.in/http:','http://www.rural.nic.in','Y',28,36,1,'DIST',1,7,'LINK','2019-11-27 13:43:51',1),(30,'NFCH','nfch.nic.in/http:','nfch.nic.in/http:','http://nfch.nic.in','Y',28,42,1,'DIST',1,13,'LINK','2019-11-27 13:43:51',1),(31,'Panchayat Rural Dev','wbprd.nic.in/http:','wbprd.nic.in/http:','http://wbprd.nic.in','Y',28,37,1,'DIST',1,8,'LINK','2019-11-27 13:43:51',1),(32,'Right To Information','rti.gov.in/http:','rti.gov.in/http:','http://rti.gov.in','Y',28,40,1,'DIST',1,11,'LINK','2019-11-27 13:43:51',1),(33,'South 24 Parganas ZP','www.zps24pgs.gov.in/http:','www.zps24pgs.gov.in/http:','http://www.zps24pgs.gov.in','Y',28,38,1,'DIST',1,9,'LINK','2019-11-27 13:43:51',1),(34,'WB Finance Dept','www.wbfin.gov.in/http:','www.wbfin.gov.in/http:','http://www.wbfin.gov.in','Y',28,39,1,'DIST',1,10,'LINK','2019-11-27 13:43:51',1),(35,'WB Govt. Official Website','www.westbengal.gov.in/http:','www.westbengal.gov.in/http:','http://www.westbengal.gov.in','Y',28,41,1,'DIST',1,12,'LINK','2019-11-27 13:43:51',1),(36,'Citizen','','',NULL,'N',0,27,1,'DIST',1,4,'LINK','2019-11-27 14:04:00',1),(37,'Tender','','',NULL,'Y',36,30,1,'DIST',1,17,'LINK','2019-11-27 14:08:20',1),(38,'Block','block','block','block','N',0,26,1,'DIST',1,22,'PAGE','2019-11-28 13:54:42',1),(45,'About Block','about_block','about_block','about_block','N',0,2,1,'BLOCK',1,24,'PAGE','2020-02-11 18:33:24',1),(46,'Administrative Unit','administrative_unit','administrative_unit','administrative_unit','N',0,3,1,'BLOCK',1,25,'PAGE','2020-02-11 18:33:24',1),(47,'Agriculture Dept','agriculture_dept','agriculture_dept','agriculture_dept','N',0,4,1,'BLOCK',1,29,'PAGE','2020-02-11 18:33:24',1),(48,'Climate','climate','climate','climate','N',0,5,1,'BLOCK',1,26,'PAGE','2020-02-11 18:33:24',1),(49,'Home','home','home','home','N',0,1,1,'BLOCK',1,23,'PAGE','2020-02-11 18:33:24',1),(50,'Line Department','line_department','line_department','line_department','N',0,6,1,'BLOCK',1,28,'PAGE','2020-02-11 18:33:24',1),(51,'Road','road','road','road','N',0,7,1,'BLOCK',1,27,'PAGE','2020-02-11 18:33:24',1),(52,'Places of Interest','places_of_interest','places_of_interest','Places of Interest','N',0,1,1,'BLOCK',0,30,'PAGE','2020-02-24 17:43:25',1),(61,'Department','','',NULL,'N',0,6,1,'DIST',1,36,'LINK','2020-02-28 16:57:00',1),(63,'Backward Class Welfare','backward_class_welfare','backward_class_welfare','backward_class_welfare','Y',61,7,1,'DIST',1,31,'PAGE','2020-02-28 17:34:13',1),(64,'Citizenship and Political sufferer pensi','citizenship_and_political_sufferer_pension_(sss)','citizenship_and_political_sufferer_pension_(sss)','citizenship_and_political_sufferer_pension_(sss)','Y',61,8,1,'DIST',1,33,'PAGE','2020-02-28 17:34:13',1),(65,'Civil Defence','civil_defence','civil_defence','civil_defence','Y',61,9,1,'DIST',1,34,'PAGE','2020-02-28 17:34:13',1),(66,'Disaster Management','disaster_management','disaster_management','disaster_management','Y',61,10,1,'DIST',1,37,'PAGE','2020-02-28 17:34:13',1),(67,'District Election Section','district_election_section','district_election_section','district_election_section','Y',61,11,1,'DIST',1,38,'PAGE','2020-02-28 17:34:13',1),(68,'District Industries Centre','district_industries_centre','district_industries_centre','district_industries_centre','Y',61,12,1,'DIST',1,39,'PAGE','2020-02-28 17:34:13',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
