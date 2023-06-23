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
-- Table structure for table `produtos`
--

DROP TABLE IF EXISTS `produtos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `produtos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(255) NOT NULL,
  `Descricao` longtext NOT NULL,
  `imagem` longtext NOT NULL,
  `Preco` double NOT NULL,
  `Categoria` int NOT NULL,
  `Status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produtos`
--

LOCK TABLES `produtos` WRITE;
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT INTO `produtos` VALUES (2,'Agulha de Croche Bambu - Kasmaq','Agulha de bambu eco é leve e com uma superfície perfeitamente lisa, \r\n                        proporcionando mais conforto e agilidade para seu trabalho. \r\n                        Resistente, extremamente leve e confortável. Qualidade e acabamento garantido!','1301378116_produto-6.jpg',18.69,1,1),(3,'Agulha de Crochê Soft - LANMAX','Agulhas de Crochê Soft, além de lindas e coloridas, possuem uma maior comodidade por terem o cabo \r\n                        emborrachado e a ponta de alumínio, o que proporciona um ajuste a mão confortável e um melhor manuseio.','1020990735_produto-5.jpg',14.79,1,1),(4,'Novelo 100g - Alvorada','Linhas resistentes, macias e brilhantes. Alvorada trás os novelos de linha com maior versatilidade\r\n                        de todo o mercado!','112798692_produto-4.jpg',11.99,2,1),(5,'Novelo - Cisne',' Ideal Para Tricotar Uma Roupa, Fazer Uma Manta, Uma Peça De Decoração Em Crochê Ou Para Qualquer Projeto De \r\n                    Artesanato Como Cabelos De Boneca, Por Exemplo. D`Primera É O Produto Perfeito Para Artesanato, Além De \r\n                    Ser Pedido Em Algumas Listas Escolares Com Uma Gama De Cores Vasta E Equilibrada.','1114973459_produto-7.png',20,2,1);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-21 14:32:15
