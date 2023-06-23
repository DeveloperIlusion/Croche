-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: croche
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `blog-etapas`
--

DROP TABLE IF EXISTS `blog-etapas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `blog-etapas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `Descricao` longtext NOT NULL,
  `Blog` int NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog-etapas`
--

LOCK TABLES `blog-etapas` WRITE;
/*!40000 ALTER TABLE `blog-etapas` DISABLE KEYS */;
INSERT INTO `blog-etapas` VALUES (1,'1ª PASSO','Começaremos apresentando os materiais necessários, especificando quais caracteristicas você deve buscar nas ferramentas e linhas usadas para que tenha maior facilidade em fazer a peça e garantir que ela dure por muito tempo.',1,1),(2,'2ª PASSO','Em seguida, explicaremos os pontos básicos de crochê necessários, como o ponto correntinha, ponto baixo e ponto alto.',1,1),(3,'3ª PASSO','A proxíma etapa será criar cada parte do coração, explicaremos técnicas como aumentos e diminuições para dar forma ao seu coração.',1,1),(4,'4º PASSO','Então explicaremos como unir as partes do coração e a adicionar um acabamento bonito, além de também como desfazer ou separar alguma parte especifíca para expandir ou alterar um crochê já pronto!',1,1),(5,'5º PASSO','Pratique cada etapa e aproveite para experimentar com cores e combinações de fios para criar diferentes efeitos. Com paciência e dedicação, você será capaz de criar muitos corações de crochê maravilhosos para decorar sua casa ou presentear alguém especial.',1,1);
/*!40000 ALTER TABLE `blog-etapas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-21 14:32:16
