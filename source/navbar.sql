-- ---------------------------------------------------------------------------------
-- Author: Andrea Gallotta
-- Website: http://andlink.net/
-- Version: 1.0.0
-- Date: 2018-09-01
-- 
-- This program is free software; you can redistribute it and/or modify it under
-- the terms of the GNU General Public License as published by the Free Software
-- Foundation; either version 3 of the License, or (at your option) any later version.
-- 
-- This program is distributed in the hope that it will be useful, but WITHOUT
-- ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
-- FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
-- 
-- Get the full text of the GPL here: http://www.gnu.org/licenses/gpl.txt
-- ---------------------------------------------------------------------------------


CREATE DATABASE IF NOT EXISTS `andlink_db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `andlink_db`;
-- MySQL     Database: andlink_db
-- ------------------------------------------------------

--
-- Table structure for table `navbar`
--

DROP TABLE IF EXISTS `navbar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `navbar` (
  `idnavbar` int(11) NOT NULL AUTO_INCREMENT,
  `nav_language` varchar(2) NOT NULL DEFAULT 'en',
  `nav_pos` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Three levels possible: XYZ; \n- X: first level;\n- Y: second level;\n- Z: third level.',
  `nav_name` varchar(45) NOT NULL DEFAULT '' COMMENT 'Visible name in the navbar',
  `nav_link` varchar(255) NOT NULL DEFAULT '' COMMENT 'the link associated',
  `meta_title` varchar(45) NOT NULL DEFAULT '' COMMENT 'the title of the page',
  `meta_description` varchar(255) NOT NULL DEFAULT '' COMMENT 'a description of the page',
  `meta_robots` varchar(45) NOT NULL DEFAULT '' COMMENT 'noindex, nofollow, nosnippet, noarchive, unavailable_after:[date], noimageindex',
  `meta_googlebot` varchar(45) NOT NULL DEFAULT '' COMMENT 'noindex, nofollow, nosnippet, noarchive, unavailable_after:[date], noimageindex',
  `meta_google` varchar(45) NOT NULL DEFAULT '' COMMENT 'nositelinkssearchbox, notranslate\n',
  PRIMARY KEY (`idnavbar`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `navbar`
--

LOCK TABLES `navbar` WRITE;
/*!40000 ALTER TABLE `navbar` DISABLE KEYS */;
INSERT INTO `navbar` VALUES (1,'en',100,'Home','/','The Home','this is the home','','',''),(2,'en',300,'Products','/products.php','Products page','this is the products page','','',''),(3,'en',310,'Prod 01','/products_p01.php','Prod 01 page','this is the prod 01  page','','',''),(4,'en',320,'Prod 02','/products_p02.php','Prod 02  page','this is the prod 02  page','','',''),(5,'en',321,'Prod 02a','/products_p02_a.php','Prod 02a  page','this is the prod 02a  page','','',''),(6,'en',322,'Prod 02b','/products_p02_b.php','Prod 02b  page','this is the prod 02b  page','','',''),(7,'en',330,'Prod 03','/products_p03.php','Prod 03  page','this is the prod 03 page','','',''),(8,'en',200,'Company','','','','','',''),(9,'en',210,'Mission','/company_mission.php','Mission page','this it the mission page','','',''),(10,'en',220,'About us','/company_aboutus.php','About us page','this is the about us page','','',''),(11,'en',400,'Contacts','/contacts.php','Contacts page','this is the contacts page','','',''),(12,'en',410,'Request Information','/contacts_information.php','Request Information page','this is the request Information page','','',''),(13,'en',420,'How to reach us','/reachus.php','How to reach us page','this is the How to reach us page','','',''),(14,'us',100,'Home','/index.us.php','The Home','This is the Home page (US)','','',''),(15,'us',200,'Company','','','','','',''),(16,'us',210,'Mission','/company_mission.us.php','Mission page','this is the mission page (US)','','',''),(17,'us',220,'About us','/company_aboutus.us.php','About us page','this is the About us page (US)','','','');
/*!40000 ALTER TABLE `navbar` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

