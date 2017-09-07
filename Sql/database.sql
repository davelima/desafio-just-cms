-- MySQL dump 10.16  Distrib 10.2.7-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: just
-- ------------------------------------------------------
-- Server version	10.2.7-MariaDB-10.2.7+maria~jessie

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

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrators` (
  `name` varchar(64) NOT NULL,
  `login` varchar(24) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrators`
--

LOCK TABLES `administrators` WRITE;
/*!40000 ALTER TABLE `administrators` DISABLE KEYS */;
INSERT INTO `administrators` VALUES ('Just.','just','$2y$10$eViudzqF99wADnnXx2jANOLRVXj5b9jmAafJ5UcmRoqkfFQ315HBa',3);
/*!40000 ALTER TABLE `administrators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `title` varchar(128) NOT NULL,
  `body` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES ('Post de teste 1','\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed molestie nisi. Fusce velit diam, congue quis elementum at, volutpat nec justo. Morbi eu blandit mauris. In iaculis tortor vitae accumsan euismod. Sed vitae egestas odio. Ut quis lorem ultrices nunc auctor rhoncus. Curabitur sagittis massa sit amet dui mollis auctor. In suscipit nunc nec eleifend tempor. Vestibulum fermentum odio eu mi gravida accumsan. Curabitur eget sollicitudin velit, ut fermentum libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam tortor ligula, congue condimentum pulvinar sit amet, elementum quis lorem. Donec eleifend, libero ut eleifend rhoncus, sem felis posuere eros, et fermentum velit eros in metus.\r\nNam quis maximus purus, ac congue est. Nunc consectetur, lacus sed congue rutrum, leo urna dictum est, vel facilisis enim lectus eget sapien. Nunc est libero, faucibus eget felis non, dapibus faucibus justo. Nunc iaculis, velit nec viverra iaculis, mi est mattis nunc, ornare fermentum tortor dolor ut dui. Sed ante purus, consectetur eu velit viverra, rhoncus facilisis sapien. Pellentesque erat massa, condimentum nec bibendum vel, interdum et augue. Cras felis nibh, dignissim at diam quis, aliquam vulputate nisl. Vivamus vitae libero vehicula, fermentum mi non, aliquam dolor. Duis tortor nibh, iaculis sed euismod feugiat, imperdiet vel sapien. Morbi sodales tellus sit amet sagittis blandit. Duis ut massa id lectus lobortis eleifend et non enim. Nam ut augue eget purus luctus fermentum. In augue tortor, aliquam non ligula vel, auctor faucibus dui. In odio mauris, fermentum id nisi eu, bibendum sodales nulla.\r\nPellentesque pretium, sapien sit amet pretium ultrices, quam diam consectetur risus, nec aliquam nisi magna ac diam. Donec nec semper nunc, nec auctor turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam metus mauris, tempus a pharetra sed, scelerisque et ante. Cras sit amet odio libero. Donec lobortis volutpat elementum. Donec malesuada justo sed pulvinar condimentum. Proin ac euismod urna, at fermentum erat. Suspendisse nunc risus, commodo in ultrices a, facilisis at lorem. In hac habitasse platea dictumst.\r\nNunc venenatis mauris sapien, vel commodo odio tincidunt eu. Vivamus fringilla, tortor in commodo tincidunt, magna magna ornare erat, vitae mattis nisi mi ac neque. Pellentesque imperdiet imperdiet turpis ut congue. Fusce pellentesque congue ligula, a cursus purus facilisis vel. Cras faucibus arcu et molestie venenatis. Cras nec tincidunt lacus. Ut vitae dui lacus. Nullam dictum sagittis porttitor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquam eleifend mi in congue. Nam ac porta est. Fusce nec porta tortor, ultricies tristique leo. Maecenas vel ante volutpat, porttitor odio a, sagittis neque. Nam pretium eros ut gravida scelerisque. Sed sed purus neque. Phasellus sed nulla nec felis imperdiet faucibus scelerisque et mi.\r\nIn blandit vehicula magna eget vehicula. Cras non augue suscipit, posuere est in, venenatis nulla. Donec scelerisque elit tortor, ut commodo urna ornare in. Nulla vel sapien turpis. Nulla nec mi eu odio rutrum mattis. Integer sit amet tempor ipsum. Quisque egestas nulla ut iaculis fermentum. Fusce eros est, pellentesque in lorem sed, dignissim lobortis orci.\r\n','post-teste-1',13),('Post de teste 2','Este &eacute; o post de teste 2 &nbsp; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sed molestie nisi. Fusce velit diam, congue quis elementum at, volutpat nec justo. Morbi eu blandit mauris. In iaculis tortor vitae accumsan euismod. Sed vitae egestas odio. Ut quis lorem ultrices nunc auctor rhoncus. Curabitur sagittis massa sit amet dui mollis auctor. In suscipit nunc nec eleifend tempor. Vestibulum fermentum odio eu mi gravida accumsan. Curabitur eget sollicitudin velit, ut fermentum libero. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Etiam tortor ligula, congue condimentum pulvinar sit amet, elementum quis lorem. Donec eleifend, libero ut eleifend rhoncus, sem felis posuere eros, et fermentum velit eros in metus. Nam quis maximus purus, ac congue est. Nunc consectetur, lacus sed congue rutrum, leo urna dictum est, vel facilisis enim lectus eget sapien. Nunc est libero, faucibus eget felis non, dapibus faucibus justo. Nunc iaculis, velit nec viverra iaculis, mi est mattis nunc, ornare fermentum tortor dolor ut dui. Sed ante purus, consectetur eu velit viverra, rhoncus facilisis sapien. Pellentesque erat massa, condimentum nec bibendum vel, interdum et augue. Cras felis nibh, dignissim at diam quis, aliquam vulputate nisl. Vivamus vitae libero vehicula, fermentum mi non, aliquam dolor. Duis tortor nibh, iaculis sed euismod feugiat, imperdiet vel sapien. Morbi sodales tellus sit amet sagittis blandit. Duis ut massa id lectus lobortis eleifend et non enim. Nam ut augue eget purus luctus fermentum. In augue tortor, aliquam non ligula vel, auctor faucibus dui. In odio mauris, fermentum id nisi eu, bibendum sodales nulla. Pellentesque pretium, sapien sit amet pretium ultrices, quam diam consectetur risus, nec aliquam nisi magna ac diam. Donec nec semper nunc, nec auctor turpis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nullam metus mauris, tempus a pharetra sed, scelerisque et ante. Cras sit amet odio libero. Donec lobortis volutpat elementum. Donec malesuada justo sed pulvinar condimentum. Proin ac euismod urna, at fermentum erat. Suspendisse nunc risus, commodo in ultrices a, facilisis at lorem. In hac habitasse platea dictumst. Nunc venenatis mauris sapien, vel commodo odio tincidunt eu. Vivamus fringilla, tortor in commodo tincidunt, magna magna ornare erat, vitae mattis nisi mi ac neque. Pellentesque imperdiet imperdiet turpis ut congue. Fusce pellentesque congue ligula, a cursus purus facilisis vel. Cras faucibus arcu et molestie venenatis. Cras nec tincidunt lacus. Ut vitae dui lacus. Nullam dictum sagittis porttitor. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec aliquam eleifend mi in congue. Nam ac porta est. Fusce nec porta tortor, ultricies tristique leo. Maecenas vel ante volutpat, porttitor odio a, sagittis neque. Nam pretium eros ut gravida scelerisque. Sed sed purus neque. Phasellus sed nulla nec felis imperdiet faucibus scelerisque et mi. In blandit vehicula magna eget vehicula. Cras non augue suscipit, posuere est in, venenatis nulla. Donec scelerisque elit tortor, ut commodo urna ornare in. Nulla vel sapien turpis. Nulla nec mi eu odio rutrum mattis. Integer sit amet tempor ipsum. Quisque egestas nulla ut iaculis fermentum. Fusce eros est, pellentesque in lorem sed, dignissim lobortis orci.','post-teste-2',14);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-07 13:16:30
