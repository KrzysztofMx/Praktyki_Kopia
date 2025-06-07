-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: praktyki
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `annex`
--

DROP TABLE IF EXISTS `annex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `annex` (
  `id_Annex` int(11) NOT NULL AUTO_INCREMENT,
  `id_File` int(11) NOT NULL,
  `path` text COLLATE utf8_polish_ci NOT NULL,
  `name_Annex` int(11) NOT NULL,
  PRIMARY KEY (`id_Annex`),
  KEY `Add_Annex_File` (`id_File`),
  CONSTRAINT `Add_Annex_File` FOREIGN KEY (`id_File`) REFERENCES `file` (`id_File`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `annex`
--

LOCK TABLES `annex` WRITE;
/*!40000 ALTER TABLE `annex` DISABLE KEYS */;
/*!40000 ALTER TABLE `annex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `id_File` int(11) NOT NULL AUTO_INCREMENT,
  `name_File` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `id_Project` int(11) NOT NULL,
  `content` text COLLATE utf8_polish_ci NOT NULL,
  `id_User` int(11) NOT NULL,
  `id_Parent` int(11) DEFAULT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_File`),
  KEY `Connect_Project_Id` (`id_Project`),
  KEY `Add_User_File` (`id_User`),
  CONSTRAINT `Add_User_File` FOREIGN KEY (`id_User`) REFERENCES `user` (`id_user`),
  CONSTRAINT `Connect_Project_Id` FOREIGN KEY (`id_Project`) REFERENCES `project` (`id_Project`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
INSERT INTO `file` VALUES (1,'File 1',1,'# Opis działania projektu\r\n\r\n*Projekt aolikacji umożliwiającej tworzenie oraz edytowanie plików markdown.*',3,NULL,0),(2,'File 2',1,'### Spis Treści\r\n- [Opis działania projektu](#opis-działania-projektu)\r\n    - [Spis Treści](#spis-treści)\r\n  - [Użytkownik](#użytkownik)\r\n    - [Users - tabela DB](#users---tabela-db)\r\n  - [Role](#role)\r\n    - [UserRoles - tabela DB](#userroles---tabela-db)\r\n  - [Projekt](#projekt)\r\n    - [Projects - tabela DB](#projects---tabela-db)\r\n  - [Pliki Md](#pliki-md)\r\n    - [Pliki Md - tabela DB](#pliki-md---tabela-db)\r\n---',3,1,1),(3,'File 1',1,'## Użytkownik\r\n*Osoba korzystająca ze strony.*\r\n\r\nUżytkowników w bazie tworzy administrator dopiero po tej czynniści użytkownik może sie zalogować.\r\n\r\nKażdy z zalogowanych użytkowników posiada rolę umożliwiającą **wyświetlanie** lub **edytowanie** treści.',3,1,1),(4,'File 2',2,'### Users - tabela DB\r\n\r\n*Opis kolumn*\r\n\r\n| Nazwa       | Typ         | Opis        |\r\n| ----------- | ----------- | ----------- |\r\n| id | int | indeks tabeli - klucz główny |\r\n| login |varchar(50)| potrzebny do logowania|\r\n| password |varchar(156)| hasło - Md5 hashowane |\r\n| User_Role |varchar(50)| rola użytkownika |\r\n---',3,NULL,0),(5,'FIle 1',6,'### Role\r\n- **Editor -** rola daję możliwość edycji oraz utworzenia nowego [*Projektu*](#projekt) i [*Pliku*](#pliki-md) i dodania załącznika pliku pdf.\r\nPodczas edycji mamy możliwość podglądu renderingu pliku md w czasie rzeczywistym.\r\n',3,NULL,0),(6,'File 45',5,'- **Reader -** rola ta pozwala jedynie na wyświetlanie treści i pobierać załączniki. Nie wyświetla ekranu edycji tylko podgląd.\r\n---',3,NULL,0),(7,'File 1',4,'## Projekt\r\n Każdy z utworzonych projektów na własną bazę [plików](#pliki-Md) które nie są związane z innymi projektami. \r\n',3,NULL,0),(8,'File 2',5,'### Pliki Md - tabela DB\r\n\r\n*Opis kolumn - uzupełnić*\r\n\r\n| Nazwa       | Typ         | Opis        |\r\n| ----------- | ----------- | ----------- |\r\n| id | int | indeks tabeli - klucz główny |\r\n| name_File |varchar(50)| nazwa pliku Md|\r\n| id_Project  |int(11)| id Projektu do któreko należy plik  |\r\n| content  |text|zawartość tekstowa pliku Md|\r\n| id_User   |	int(11)|id Kreatora pliku|\r\n| id_Parent   |	int(11)|id pliku nadrzędnego w drzewie|',3,NULL,0);
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project`
--

DROP TABLE IF EXISTS `project`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project` (
  `id_Project` int(11) NOT NULL AUTO_INCREMENT,
  `name_Project` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `user_Creator` int(11) NOT NULL,
  `user_Owner` int(11) NOT NULL,
  PRIMARY KEY (`id_Project`),
  KEY `Add_User_Creator` (`user_Creator`),
  KEY `Add_User_Owner` (`user_Owner`),
  CONSTRAINT `Add_User_Creator` FOREIGN KEY (`user_Creator`) REFERENCES `user` (`id_user`),
  CONSTRAINT `Add_User_Owner` FOREIGN KEY (`user_Owner`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project`
--

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` VALUES (1,'Projekt 1',3,3),(2,'Projekt 2',3,3),(3,'Projekt 1',4,4),(4,'Projekt 2',4,4),(5,'Projekt 3',3,3),(6,'Projekt 4',3,3);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id_Role` int(11) NOT NULL AUTO_INCREMENT,
  `name_Role` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_Role`),
  UNIQUE KEY `name_Role` (`name_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Editor'),(2,'Reader');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(156) COLLATE utf8_polish_ci NOT NULL,
  `User_Role` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `User_Add_Role` (`User_Role`),
  CONSTRAINT `User_Add_Role` FOREIGN KEY (`User_Role`) REFERENCES `roles` (`name_Role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'admin','81dc9bdb52d04dc20036dbd8313ed055','Editor'),(4,'root','63a9f0ea7bb98050796b649e85481845','Reader');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-23  9:39:48
