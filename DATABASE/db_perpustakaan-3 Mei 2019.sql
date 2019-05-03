-- MySQL dump 10.13  Distrib 8.0.13, for macos10.14 (x86_64)
--
-- Host: localhost    Database: db_perpustakaan
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `anggota`
--

DROP TABLE IF EXISTS `anggota`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `anggota` (
  `kd_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `prodi` varchar(50) DEFAULT NULL,
  `jenjang` varchar(45) DEFAULT NULL,
  `alamat` text,
  `username` varchar(45) DEFAULT NULL,
  `password` text,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `anggota`
--

LOCK TABLES `anggota` WRITE;
/*!40000 ALTER TABLE `anggota` DISABLE KEYS */;
INSERT INTO `anggota` VALUES (3,'anggota','ILKOM','S1','Denpasar','anggota','7db5345b01396df74f676a334f74c3d5','2019-05-03 06:44:19'),(4,'anggota2','Farmasi','S1','Teuku Umar','dinda','a1b7b1ddfd296af4899e8ba338657e9d',NULL);
/*!40000 ALTER TABLE `anggota` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `buku` (
  `kd_register` int(11) NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(45) DEFAULT NULL,
  `pengarang` varchar(45) DEFAULT NULL,
  `penerbit` varchar(45) DEFAULT NULL,
  `tahun_terbit` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`kd_register`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (9,'Buku Laris 123','Angga Purnajiwa','Gramedia','2019'),(10,'Buku Laris','Angga Purnajiwa','Gramedia','2019'),(11,'Buku Laris','Angga Purnajiwa','Gramedia','2019'),(12,'Buku Laris','Angga Purnajiwa','Gramedia','2019'),(13,'asa','sas','aas','12'),(14,'asa','sfdf','asda','8787');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detil_pinjam`
--

DROP TABLE IF EXISTS `detil_pinjam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `detil_pinjam` (
  `kd_register` int(11) DEFAULT NULL,
  `kd_pinjam` int(11) DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detil_pinjam`
--

LOCK TABLES `detil_pinjam` WRITE;
/*!40000 ALTER TABLE `detil_pinjam` DISABLE KEYS */;
INSERT INTO `detil_pinjam` VALUES (9,2,'2019-05-04',NULL),(9,3,'2019-05-04',NULL);
/*!40000 ALTER TABLE `detil_pinjam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `peminjaman` (
  `kd_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `kd_anggota` int(11) DEFAULT NULL,
  `kd_petugas` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_pinjam`),
  KEY `fk_peminjaman_anggota_idx` (`kd_anggota`),
  CONSTRAINT `fk_peminjaman_anggota` FOREIGN KEY (`kd_anggota`) REFERENCES `anggota` (`kd_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (2,4,3),(3,3,3);
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `petugas`
--

DROP TABLE IF EXISTS `petugas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `petugas` (
  `kd_petugas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) DEFAULT NULL,
  `alamat` text,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`kd_petugas`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `petugas`
--

LOCK TABLES `petugas` WRITE;
/*!40000 ALTER TABLE `petugas` DISABLE KEYS */;
INSERT INTO `petugas` VALUES (3,'Angga Petugas','Denpasar','anggapur','757574ddc7fe973cf18606c2ed79ca79','2019-05-03 06:44:52'),(4,'Petugas Abal Abal','Sembung Jawa','petugas','570c396b3fc856eceb8aa7357f32af1a',NULL);
/*!40000 ALTER TABLE `petugas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-03 14:49:43
