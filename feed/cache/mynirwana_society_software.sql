-- MySQL dump 10.16  Distrib 10.2.22-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: mynirwana_society_software
-- ------------------------------------------------------
-- Server version	10.2.22-MariaDB

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
-- Table structure for table `Wo_Activities`
--

DROP TABLE IF EXISTS `Wo_Activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL DEFAULT 0,
  `post_id` int(255) NOT NULL DEFAULT 0,
  `activity_type` varchar(32) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  `app_src` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  KEY `activity_type` (`activity_type`),
  KEY `order1` (`user_id`,`id`),
  KEY `order2` (`post_id`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Activities`
--

LOCK TABLES `Wo_Activities` WRITE;
/*!40000 ALTER TABLE `Wo_Activities` DISABLE KEYS */;
INSERT INTO `Wo_Activities` VALUES (3,7,29,'reaction_post',1512556239,'reaction_love.png'),(4,3,44,'reaction_post',1512648611,'reaction_like.png'),(5,1,29,'reaction_post',1512649689,'reaction_haha.png'),(7,1,44,'reaction_post',1512666732,'reaction_like.png'),(8,1,43,'reaction_post',1512666737,'reaction_like.png'),(12,1,58,'reaction_post',1513174018,'reaction_like.png'),(13,1,60,'reaction_post',1513324712,'reaction_like.png'),(14,15,65,'reaction_post',1549866222,'reaction_like.png'),(16,28,65,'reaction_post',1551192511,'reaction_haha.png'),(19,35,19,'commented_post',1551418872,''),(25,34,14,'commented_post',1551509971,''),(26,34,16,'commented_post',1551549657,''),(27,36,30,'reaction_post',1551691839,'reaction_like.png');
/*!40000 ALTER TABLE `Wo_Activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_AdminInvitations`
--

DROP TABLE IF EXISTS `Wo_AdminInvitations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_AdminInvitations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(300) NOT NULL DEFAULT '0',
  `posted` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `code` (`code`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_AdminInvitations`
--

LOCK TABLES `Wo_AdminInvitations` WRITE;
/*!40000 ALTER TABLE `Wo_AdminInvitations` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_AdminInvitations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Ads`
--

DROP TABLE IF EXISTS `Wo_Ads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL DEFAULT '',
  `code` text DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Ads`
--

LOCK TABLES `Wo_Ads` WRITE;
/*!40000 ALTER TABLE `Wo_Ads` DISABLE KEYS */;
INSERT INTO `Wo_Ads` VALUES (1,'header','','1'),(2,'sidebar','','1'),(4,'footer','','1'),(5,'post_first','','1'),(6,'post_second','','1'),(7,'post_third','','1');
/*!40000 ALTER TABLE `Wo_Ads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Affiliates_Requests`
--

DROP TABLE IF EXISTS `Wo_Affiliates_Requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Affiliates_Requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `amount` varchar(100) NOT NULL DEFAULT '0',
  `full_amount` varchar(100) NOT NULL DEFAULT '',
  `status` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `time` (`time`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Affiliates_Requests`
--

LOCK TABLES `Wo_Affiliates_Requests` WRITE;
/*!40000 ALTER TABLE `Wo_Affiliates_Requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Affiliates_Requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Albums_Media`
--

DROP TABLE IF EXISTS `Wo_Albums_Media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Albums_Media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `order1` (`post_id`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Albums_Media`
--

LOCK TABLES `Wo_Albums_Media` WRITE;
/*!40000 ALTER TABLE `Wo_Albums_Media` DISABLE KEYS */;
INSERT INTO `Wo_Albums_Media` VALUES (1,3,'upload/photos/2017/12/AMf7aSFINZZ2WUVS5Qio_05_fbd6652895f0a3ee1405ccda4cd701e2_image.jpg'),(2,3,'upload/photos/2017/12/blgmuVA9gXj2PhSdiJAL_05_fbd6652895f0a3ee1405ccda4cd701e2_image.jpg'),(3,3,'upload/photos/2017/12/pys3YOF19DsjREl7odow_05_be300fb47d3112b260cc61c4591f9409_image.jpg'),(4,3,'upload/photos/2017/12/8ISml3w48iIvqMwAtzVN_05_be300fb47d3112b260cc61c4591f9409_image.jpg'),(5,3,'upload/photos/2017/12/7o3YiMyvY8fFliag267g_05_be300fb47d3112b260cc61c4591f9409_image.jpg'),(6,3,'upload/photos/2017/12/5O8qwvEZr2ECOFmDYnWJ_05_be300fb47d3112b260cc61c4591f9409_image.jpg'),(13,39,'upload/photos/2017/12/qrWkr9bTnNfRBeycmILT_06_0e593372d1ed0fd505a3a7170f000c82_image.jpg'),(14,39,'upload/photos/2017/12/WX1L7wLXysgQlPWcBuPm_06_2e4323e87801b21eb0c303a9ef36d8d0_image.jpg'),(15,39,'upload/photos/2017/12/T9NVKakTMOzhrBfEgmsA_06_2e4323e87801b21eb0c303a9ef36d8d0_image.jpg'),(16,39,'upload/photos/2017/12/DkXXwxsgI7kzOBKMssph_06_2e4323e87801b21eb0c303a9ef36d8d0_image.jpg'),(17,39,'upload/photos/2017/12/HOTUB8GCCIiy5rkmLHGj_06_2e4323e87801b21eb0c303a9ef36d8d0_image.png'),(18,39,'upload/photos/2017/12/SKGCFTptaQCu4CFWcVZ8_06_2e4323e87801b21eb0c303a9ef36d8d0_image.png'),(19,39,'upload/photos/2017/12/JqPm98iartbH2i5ZVgvY_06_2e4323e87801b21eb0c303a9ef36d8d0_image.jpg'),(20,39,'upload/photos/2017/12/vSAP4FxNA99aklmQKNw1_06_2e4323e87801b21eb0c303a9ef36d8d0_image.jpg'),(21,39,'upload/photos/2017/12/FGz41HnG9oLgX5vBRMre_06_2e4323e87801b21eb0c303a9ef36d8d0_image.png'),(22,39,'upload/photos/2017/12/s2ICFr2h2MdMYcPeKGO6_06_2e4323e87801b21eb0c303a9ef36d8d0_image.jpg'),(23,39,'upload/photos/2017/12/LWsaFaWfXkziKN1ExOi6_06_854e1bd353cc3b7ec1a3352ff46c965c_image.jpg'),(24,39,'upload/photos/2017/12/oct4gagbkEZx7n4dTUJ3_06_854e1bd353cc3b7ec1a3352ff46c965c_image.jpg'),(25,39,'upload/photos/2017/12/jHH8SUy33XjItFQCIlGi_06_854e1bd353cc3b7ec1a3352ff46c965c_image.jpg'),(26,39,'upload/photos/2017/12/YchGEp6k7pQMJlUMoMFG_06_854e1bd353cc3b7ec1a3352ff46c965c_image.png');
/*!40000 ALTER TABLE `Wo_Albums_Media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Announcement`
--

DROP TABLE IF EXISTS `Wo_Announcement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` text DEFAULT NULL,
  `time` int(32) NOT NULL DEFAULT 0,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Announcement`
--

LOCK TABLES `Wo_Announcement` WRITE;
/*!40000 ALTER TABLE `Wo_Announcement` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Announcement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Announcement_Views`
--

DROP TABLE IF EXISTS `Wo_Announcement_Views`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Announcement_Views` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `announcement_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `announcement_id` (`announcement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Announcement_Views`
--

LOCK TABLES `Wo_Announcement_Views` WRITE;
/*!40000 ALTER TABLE `Wo_Announcement_Views` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Announcement_Views` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Apps`
--

DROP TABLE IF EXISTS `Wo_Apps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Apps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `app_user_id` int(11) NOT NULL DEFAULT 0,
  `app_name` varchar(32) NOT NULL,
  `app_website_url` varchar(55) NOT NULL,
  `app_description` text NOT NULL,
  `app_avatar` varchar(100) NOT NULL DEFAULT 'upload/photos/app-default-icon.png',
  `app_callback_url` varchar(255) NOT NULL,
  `app_id` varchar(32) NOT NULL,
  `app_secret` varchar(55) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Apps`
--

LOCK TABLES `Wo_Apps` WRITE;
/*!40000 ALTER TABLE `Wo_Apps` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Apps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_AppsSessions`
--

DROP TABLE IF EXISTS `Wo_AppsSessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_AppsSessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `session_id` varchar(120) NOT NULL DEFAULT '',
  `platform` varchar(32) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `session_id` (`session_id`),
  KEY `user_id` (`user_id`),
  KEY `platform` (`platform`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_AppsSessions`
--

LOCK TABLES `Wo_AppsSessions` WRITE;
/*!40000 ALTER TABLE `Wo_AppsSessions` DISABLE KEYS */;
INSERT INTO `Wo_AppsSessions` VALUES (3,2,'828f0bfd4e70af206f7972de443314410e6bf9bd54a4a6f3132ae9e2486ca6adba06998551832281d7e4cdde82a894b8f633e6d61a01ef15','web',1551343968),(5,3,'5f1a3db9cf8ebca7bceb1434d26625862fba3a808aa4db7234e5337fbea79805045bb8e341081568bea6cfd50b4f5e3c735a972cf0eb8450','web',1513169282),(8,4,'eee427db57f63576ce7d0ccc1e70a6cb14c68f40b941fb1e48208b8579dccc3a2089abd897567567fca758e52635df5a640f7063ddb9cdcb','web',1512614361),(12,5,'d70af6253aa9e3d8127fe2c2a62b7be15233144e43095a84d71336ad545a2955fe71e950787263185db30d43f3791ae82e8f09070647e4cb','web',1512561971),(21,11,'42ee12c5877aee104e3a07a6b244065d4f064f47f19c5d2acb8cf8f7de135e873cc78f1222050703f5f3b8d720f34ebebceb7765e447268b','web',1512564866),(25,10,'35106468b61bb8f97448e27da9499c48fb8ea38f917ff02f457349c017675586e36f9477363634677dd11ae2d5ed34925bdbdc9b01866349','web',1512618696),(26,1,'a0481dabf4fa2e82da2f21bb3a3fba4c8835293e012b5ef03f5d13e22bba772d11647b03482062656872937617af85db5a39a5243e858d1f','web',1551418150),(27,7,'762ba26050e8f6fefe3ad89b2ed33e3bb8ab822c5192f54dcfa33cab0044649bd1cb0f7875164850077b83af57538aa183971a2fe0971ec1','web',1512569981),(28,10,'194ca8632f325b0f862b979107f4e885c6a2d350762920e774dec43f4d83424c8fe5a81727863401f3067d687ee39c3cbfa75573457e479d','web',1512618696),(29,1,'5b4f1fb38062c761b6d5068de1a892a5c96ea7e435298e23cbee448a9559d079227e14b433501698624ec1c881656ee6418604df2928494b','web',1551418150),(30,4,'69ede8feb2707cbb66b715d5a79124a4ee1fcddfff9484eec6ab701045ba028c386e2ce0777197868a9c8ac001d3ef9e4ce39b1177295e03','web',1512614361),(31,1,'b7259cbeee6bd1505919eb9c743c158199f0362fcdf243da0c16e81b3fd3aa771218f0007059546251594de14eeb96bc7fe59cf5cad96706','web',1551418150),(32,10,'c27a819e0731436bfc4dff2f4e25b827318de79398e07107a7a85fe53e7d00b920c442bf261954349fa04f87c9138de23e92582b4ce549ec','web',1512618696),(33,1,'7e68b69db82c0a6526d4dd9b3956cb8c66758150a39c486d15ab965e7aa22ec41dfea7281527791929e11dc359bad383e1243f730bdbe032','web',1551418150),(34,1,'9f1cc1dc4e29a7227386ca0b11b8ddb275c48bd5a1366ba82ce85fbc21b43bee854a709716628252161fd33f67dbfd29138ce3f165d5e5dd','web',1551418150),(36,1,'ea027e6529c837f9229b18263f03cfa55e4403196031de79630465bbc1b85b149f0233ad216837343d017ba05931017b15345e3ae2c73cd0','web',1551418150),(37,1,'cee72df568bdeed01cd16d02577281744ce1e649500957110405e99a06d7b2c619e4bea880980889789ba2ae4d335e8a2ad283a3f7effced','web',1551418150),(39,2,'04a8addfe160a2b796d92f0f7c98974ca29f3cb8607236b0dd43316bfbc05eea6f5d57cc85698076becc353586042b6dbcc42c1b794c37b6','web',1551343968),(44,2,'80887b04557adcd190f4a7d2e76dcef10b1118826e9187a22eda4f449ea37747fe9d9ec882476443328e5d4c166bb340b314d457a208dc83','web',1551343968),(45,2,'26530fc0c105f7e97bf6889ae8d7535165007e6c87eb7ffb05a6a6c6057e90cfe8d015d461914728b9b852ac7bd1776bc5ac5ce3b41d8af7','web',1551343968),(47,1,'e2fd494deb733c6a667ee0353fd8d98759e67b4656ab85131fecb5b4c6ad163bbeff74df743140631b89a2e980724cb8997459fadb907712','web',1551418150),(48,1,'d22a686c2ee9e61e1f04f64e88ad9c7e7c453de8a3b2019161f4f019112fbca131e5008f433646155637f327937ff2beb7d0a499a0b99d3c','web',1551418150),(49,3,'8f06b6e5c5506d5298c24a5a7508dc835c8d8a5830a21b4ae695596bad516c15275fd0ff619934714738a8f6fab937d899ae9631beab116f','web',1513169282),(50,6,'d27fb5e42d8e50bc5b0a11cac38cc88164d20304acef965d452c58a0686a54fe73112f8b998474793ae4f12b897c4bb51327a8e1c921df7d','web',1513257758),(51,2,'de92736e64bfca6393b3e1245ffc7fa40070d11d85acf5891c65d54105c03aa49843056465232873a1b63b36ba67b15d2f47da55cdb8018d','web',1551343968),(52,3,'9361ace428497e148ecef476708f6f7e29472389cd0f8a6e8f82201489999507cc8daa81158593301959eb9d5a0f7ebc58ebde81d5df400d','web',1513169282),(53,14,'80b961e2890b6ce4f048492c329b260bcdaeb59148ad61c55c5b1c089885af57061675b52788841162da5a6d47be0029801ba74a17e47e1a','web',1513254229),(56,1,'4f1d181e987bfd540f6ce6d7a76aaa80ac626457a12e37d86fa86a12374df7fc28b8205864220168a6e4f250fb5c56aaf215a236c64e5b0a','web',1551418150),(57,1,'c4e848d71acaf4fcc0e57522454ec392837008f7b9f892539f84b3e102d4fb05fa69909b45613626f7e4dd6300aa79c1ba9425a76dcf26f5','web',1551418150),(58,1,'de704164a15f6d6acf476e670e1ce79e60d132aecb2f408c8bf5b807f02b4191d1c99b2e648599796a30e32e56fce5cf381895dfe6ca7b6f','web',1551418150),(61,16,'d3f34a22bb57c470915c984e9c691137325b9df357029f0431135d4aaaa8fd67b8eb9551583123729b0ead00a217ea2c12e06a72eec4923f','web',1550045805),(64,1,'b85a81825f89dfcc3d6d69cb0951b04a097897c6769a76dbf106d81927b807e8a7f78d9124984722aa85e45da94cb0d78853c50ba636a15a','web',1551418150),(66,16,'5ede60fe7b9b819cb961cb1813fb38bcba8432df5eb9bfc3062461a2663eb19c0ca3a538626455381f490b64a7d1716e9952d627b9baa45e','web',1550045805),(67,15,'e85e52ff339ec84be9804db64f3e1cbf176d2f6c74168f81121618c5aad983842fd96391854776390993b7960f34c29b1fdb6516be27046f','web',1549967099),(68,1,'b0fffb13059d012e269fbe26e67200007406aabc610d76e6a76239dcc8ac18c543f773f5280516306531b32f8d02fece98ff36a64a7c8260','web',1551418150),(70,1,'1b19a10c8b861fc4ff08c311ef9ab033feac8abb133f53205e95c32784aa7b078720ced0461938670c29c7dca6742f69e0e4ff304365d655','web',1551418150),(73,1,'3e3b85c5f877426e0cf9f0148e50e340d17262bde62021395dda846b7f1edff6054d62e31241634346f5ffb3777b7659bb35da6ddab19e05','web',1551418150),(76,1,'8930efa75bce39248bcbb15ec5bdba91b6233ab3a5dfdd7d8fc5a07d260274d7de1023ae15905251bff624c3a469dce7c45ce151902222ba','web',1551418150),(80,18,'4344a7a83b074eabcd66fdc9cd3e3bc2305e96e4ba3f545747ebfdda9a3febbe4846eb9b538607270d9756dc528560b61c85bfefba233aab','web',1550836006),(81,19,'04b334e09e89177559cc10f89ddf304b3aa5d87a19ed35e79e6b30e25cf794eaa0a9da4a90128489ccf0304d099baecfbe7ff6844e1f6d91','web',1551178696),(83,21,'331abc77bee688495df2c24806d331458110af73d8a5130dea15429259d2bec92515b300743980347d38b1e9bd793d3f45e0e212a729a93c','web',1551180617),(95,28,'54664b9b4526df680b50c37cc307ab9e4b79f05d1d41d5cf7b435643a5a075cb0e5675f69278261666fe2bcc701bb627e111be6847a8436c','web',1551192582),(99,1,'b20e4b07e493435f1e5adcb6e5d835729840f856923b96ace60627d4682c09a2b180d38a19459103adf7e293599134777339fdc40ddfa818','web',1551418150),(100,2,'c22a2d8bdffbcac3e451ab01b9f702cf9645b6b901f66e929f41b830bddfce92aaba228517971587ab6b331e94c28169d15cca0cb3bbc73e','web',1551343968),(101,1,'38f33e834f5c932d1ec38531d21944c8d51fd913e24d3a1bbdfa208d37af62f9fba5590c9425536824389bfe4fe2eba8bf9aa9203a44cdad','web',1551418150),(102,2,'1790bb97da7a37abc59df3442ebd2563ba67ae64f1026a70f2805fe923c80e115e587bf050454928a4c42bfd5f5130ddf96e34a036c75e0a','web',1551343968),(103,1,'0b58b6e591da23be9d6fa851dead66584fd9517b6350c04f6a9920219864f84770465e7035093658a3fc981af450752046be179185ebc8b5','web',1551418150),(105,1,'45f6d80390867cc103a220a1e20bb2cf9defac878df077c1e5ed6b968e9f24571d8b7c602622739435675fd71a153bf3baab29b904e525c8','web',1551418150),(108,34,'8701f63899dd807e76688b3845cec7b2b3bd2bb8277a1bf3ea72d1de975adb6d4626b0a013917191565e8a413d0562de9ee4378402d2b481','web',1551623305),(110,1,'0b89df3d43c9c2465cb834865bf46f85a846d026c686cd5cb3dc7be5541086a0914f57d025071361e046ede63264b10130007afca077877f','web',1551418150),(112,35,'0b2d15a3daad6a0e15058bce8ba11b9d71088b9d5149b6ea08678619f6ecbfb6e233e94d38730532837a7924b8c0aa866e41b2721f66135c','web',1551631005),(113,35,'25e3edf9f586df3b0a0b0610cdf91f916a2854da0beac5089795396217b3513490f991f7955771935e5dd00d770ef3e9154a4257edcb80b8','web',1551631005),(116,34,'bdabc10d261282b065c411ff4e23761cfa0a13dacfe5a44449666ddb3148180f2734f35c928048050ce98f53e3aa229aa2f31b16e5dcbb4b','web',1551623305),(122,35,'53c59869c0824cb85bfd4412c268b6aeba246d7e1bf9599ceef0c6653b92e412e996fb786073898017d187eaf6157b4e219552d6a187290a','web',1551631005),(123,35,'6e9ce1a0cd94ea22ed776cf8630c0df4976e405715577dfb13e2292599f5ed8126cb838e60141521aff53752790c8c5348954c335c5ad682','web',1551631005),(124,34,'74191dee5b2c9b8c80a890a17c556f20a6c0ee9dcead6bd9784b697217ac0f214be0482940704337b04c387c8384ca083a71b8da516f65f6','web',1551623305),(125,35,'db29cf23ed2bd43c22313ed4c6ffdafead95264b8a178b4b7babcc2c64ba190e1ff6f96970658645fcdf698a5d673435e0a5a6f9ffea05ca','web',1551631005),(126,34,'8555ed742bf4b9e360f7ebdaa3ca961bfc3340172215f589146cd9c2951cc5e2da21d1bf806983874e0ccd2b894f717df5ebc12f4282ee70','web',1551623305),(128,35,'2ac894f94e0e0b42678a69e74a764f4b77e8972b2032d9dd62322e76a4d61558322411178847695290cc440b1b8caa520c562ac4e4bbcb51','web',1551631005),(130,34,'a7462fda06f835fa70471b97786bedb238392472e045edf14ef1272a99e1664d3bf2dfb380530375f0467e856f9ee5f05a1815fca47b7787','web',1551623305),(131,34,'65dc38f982637c5b6baf6645c7ebb1e0d61cb896ac7676200a77e4c3bf10c3f03102337c6527492861bfdc160e4c099203c72258d8825340','web',1551623305),(132,34,'e646dfe0ee94e30a7f8dab952ecbe9b341263fc69c27ecf25596480d839e24d3fb2225eb96169298bc27acd4e787c0a32597d6e4b8254851','web',1551623305),(133,34,'0be263faa09520553e2e68e97a73008ccf8bcad81535d393724df1e36376182e66dc0344483807736a13382a520e0420014027350a0b3eb4','web',1551623305),(134,34,'ba221300b0f4352a916c485e1177774194280f03f63dd795606f4d706393438072c7db739998283989829755b317d03ea7379c0067e6023c','web',1551623305),(135,35,'d36a428866305d54f06fa58eb1401d6ac21aa9ad05fbcef9e60cac5f8006b24e1b0eb6a79374181770d31b87bd021441e5e6bf23eb84a306','web',1551631005),(136,34,'cd87b01d324759aa405b0cae18a133c9221ab4295ef4e54c87c527bc5070ac35617ecf2f412179325f5d472067f77b5c88f69f1bcfda1e08','web',1551623305),(140,36,'42c748f51b1235f85ee4a9db6c8f041f9547d085c31eb84d3f308031c3457a262047845855724230d9a5cf487c8317dba2cc8fafcf8a18a8','web',1551692001),(141,34,'d1acfeae5281daf57dfaa559532ca42c0e21cf46b8892c6748cc78ca110cccc72c7cb3b678261318a45a1d12ee0fb7f1f872ab91da18f899','web',1551623305),(144,34,'2dac8a07b7789a9e21bdb9c80f1649b7bab892b67a288bf4aef3422b0534fc2c17980e8b60242670d1f157379ea7e51d4a8c07aff102a43f','web',1551623305),(145,34,'1c45097f8febe1bb777f43a2c6c6f92b039e6c08ab9cb047e33b2b2bceadd848a89bdbec47020656c85b2ea9a678e74fdc8bafe5d0707c31','web',1551623305),(146,35,'95352abcbdb24d90a77ffebf8c11901ec64400d17894426a0eae60b9e4de202e7fb44162443552161872e3d47e965d2e64f63ca01dd937f9','web',1551631005);
/*!40000 ALTER TABLE `Wo_AppsSessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Apps_Hash`
--

DROP TABLE IF EXISTS `Wo_Apps_Hash`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Apps_Hash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash_id` varchar(200) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `hash_id` (`hash_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Apps_Hash`
--

LOCK TABLES `Wo_Apps_Hash` WRITE;
/*!40000 ALTER TABLE `Wo_Apps_Hash` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Apps_Hash` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Apps_Permission`
--

DROP TABLE IF EXISTS `Wo_Apps_Permission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Apps_Permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `app_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Apps_Permission`
--

LOCK TABLES `Wo_Apps_Permission` WRITE;
/*!40000 ALTER TABLE `Wo_Apps_Permission` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Apps_Permission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_AudioCalls`
--

DROP TABLE IF EXISTS `Wo_AudioCalls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_AudioCalls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `call_id` varchar(30) NOT NULL DEFAULT '0',
  `access_token` text DEFAULT NULL,
  `call_id_2` varchar(30) NOT NULL DEFAULT '',
  `access_token_2` text DEFAULT NULL,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `to_id` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0,
  `called` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  `declined` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `to_id` (`to_id`),
  KEY `from_id` (`from_id`),
  KEY `call_id` (`call_id`),
  KEY `called` (`called`),
  KEY `declined` (`declined`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_AudioCalls`
--

LOCK TABLES `Wo_AudioCalls` WRITE;
/*!40000 ALTER TABLE `Wo_AudioCalls` DISABLE KEYS */;
INSERT INTO `Wo_AudioCalls` VALUES (3,'0','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTUxMjU2MTM3NCIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTUxMjU2NDk3NCwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiMzdmMjRmYjQ4MTg1ZWIzIiwidmlkZW8iOnsicm9vbSI6ImFkbWluX3Jha2VzaCJ9fX0.OoaIfbGS8S5W431bxlkj5Z7tO2nAdms0VKIUOaN7Vn8','','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTUxMjU2MTM3NCIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTUxMjU2NDk3NCwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiZmNiNWVlNjY4ODcwMDRhIiwidmlkZW8iOnsicm9vbSI6ImFkbWluX3Jha2VzaCJ9fX0.ardWaXJRd9j6vji5vwJo-0Ckx9LaxxFxlWLA85EaQUk',1,2,0,1,1512561374,0),(4,'0','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTU0OTg3NjE1NiIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTU0OTg3OTc1NiwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiMTc3ZmQ1MGM1N2JjNWQ2IiwidmlkZW8iOnsicm9vbSI6ImFydW5rdV9VcGVuZHJhIn19fQ.-_-viqwrZi4qHt7IMktJo2Ag-wpZRkJd6krXlftxqWM','','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTU0OTg3NjE1NiIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTU0OTg3OTc1NiwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiYjExZWQ4Yjk5YTZmNTBkIiwidmlkZW8iOnsicm9vbSI6ImFydW5rdV9VcGVuZHJhIn19fQ.rGj219cNoXvRawwoioskg76nmjPRWXKrLHPVUxJP9iU',16,15,0,16,1549876156,0),(5,'0','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTU1MTQxOTYzNiIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTU1MTQyMzIzNiwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiMWQwODAwNjIxYjgxZjEzIiwidmlkZW8iOnsicm9vbSI6IlNvbnVycnJfUmFqIn19fQ.pQ91p5102yqz5kgSBP17-C1mafLvz3Lleh19z6RQ7zI','','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTU1MTQxOTYzNiIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTU1MTQyMzIzNiwiZ3JhbnRzIjp7ImlkZW50aXR5IjoiMjQ2NTZiNjI1ZmQ0OTc2IiwidmlkZW8iOnsicm9vbSI6IlNvbnVycnJfUmFqIn19fQ.o8QoPo10TJwoOskdsATzNPZvjWbYpT6htb9BfbQ5wOc',35,34,1,35,1551419636,1);
/*!40000 ALTER TABLE `Wo_AudioCalls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Banned_Ip`
--

DROP TABLE IF EXISTS `Wo_Banned_Ip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Banned_Ip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(32) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `ip_address` (`ip_address`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Banned_Ip`
--

LOCK TABLES `Wo_Banned_Ip` WRITE;
/*!40000 ALTER TABLE `Wo_Banned_Ip` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Banned_Ip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Blocks`
--

DROP TABLE IF EXISTS `Wo_Blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blocker` int(11) NOT NULL DEFAULT 0,
  `blocked` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `blocker` (`blocker`),
  KEY `blocked` (`blocked`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Blocks`
--

LOCK TABLES `Wo_Blocks` WRITE;
/*!40000 ALTER TABLE `Wo_Blocks` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Blog`
--

DROP TABLE IF EXISTS `Wo_Blog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Blog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL DEFAULT 0,
  `title` varchar(120) NOT NULL DEFAULT '',
  `content` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `posted` varchar(300) DEFAULT '0',
  `category` int(255) DEFAULT 0,
  `thumbnail` varchar(100) DEFAULT 'upload/photos/d-blog.jpg',
  `view` int(11) DEFAULT 0,
  `shared` int(11) DEFAULT 0,
  `tags` varchar(300) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `title` (`title`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Blog`
--

LOCK TABLES `Wo_Blog` WRITE;
/*!40000 ALTER TABLE `Wo_Blog` DISABLE KEYS */;
INSERT INTO `Wo_Blog` VALUES (1,1,'This is my personal belg This is my personal belg','&lt;p&gt;This is my personal belg&amp;nbsp;This is my personal belg&amp;nbsp;This is my personal belg&amp;nbsp;This is my personal belg&lt;/p&gt;','This is my personal belgThis is my personal belg This is my personal belg This is my personal belg','1549964264',10,'upload/photos/2019/02/T9JJDQLZqg78WJtW6Q3P_12_e1cf2788504207139ea514d5675ff7e1_image.jpg',0,0,'dsadad');
/*!40000 ALTER TABLE `Wo_Blog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_BlogCommentReplies`
--

DROP TABLE IF EXISTS `Wo_BlogCommentReplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_BlogCommentReplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comm_id` int(11) NOT NULL DEFAULT 0,
  `blog_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `text` text DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `posted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `comm_id` (`comm_id`),
  KEY `blog_id` (`blog_id`),
  KEY `order1` (`comm_id`,`id`),
  KEY `order2` (`blog_id`,`id`),
  KEY `order3` (`user_id`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_BlogCommentReplies`
--

LOCK TABLES `Wo_BlogCommentReplies` WRITE;
/*!40000 ALTER TABLE `Wo_BlogCommentReplies` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_BlogCommentReplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_BlogComments`
--

DROP TABLE IF EXISTS `Wo_BlogComments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_BlogComments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `text` text DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `posted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_BlogComments`
--

LOCK TABLES `Wo_BlogComments` WRITE;
/*!40000 ALTER TABLE `Wo_BlogComments` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_BlogComments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_BlogMovieDisLikes`
--

DROP TABLE IF EXISTS `Wo_BlogMovieDisLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_BlogMovieDisLikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_comm_id` int(20) NOT NULL DEFAULT 0,
  `blog_commreply_id` int(20) NOT NULL DEFAULT 0,
  `movie_comm_id` int(20) NOT NULL DEFAULT 0,
  `movie_commreply_id` int(20) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `blog_id` int(50) NOT NULL DEFAULT 0,
  `movie_id` int(50) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `blog_comm_id` (`blog_comm_id`),
  KEY `movie_comm_id` (`movie_comm_id`),
  KEY `user_id` (`user_id`),
  KEY `blog_commreply_id` (`blog_commreply_id`),
  KEY `movie_commreply_id` (`movie_commreply_id`),
  KEY `blog_id` (`blog_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_BlogMovieDisLikes`
--

LOCK TABLES `Wo_BlogMovieDisLikes` WRITE;
/*!40000 ALTER TABLE `Wo_BlogMovieDisLikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_BlogMovieDisLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_BlogMovieLikes`
--

DROP TABLE IF EXISTS `Wo_BlogMovieLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_BlogMovieLikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_comm_id` int(20) NOT NULL DEFAULT 0,
  `blog_commreply_id` int(20) NOT NULL DEFAULT 0,
  `movie_comm_id` int(20) NOT NULL DEFAULT 0,
  `movie_commreply_id` int(20) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `blog_id` int(50) NOT NULL DEFAULT 0,
  `movie_id` int(50) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `blog_id` (`blog_comm_id`),
  KEY `movie_id` (`movie_comm_id`),
  KEY `user_id` (`user_id`),
  KEY `blog_commreply_id` (`blog_commreply_id`),
  KEY `movie_commreply_id` (`movie_commreply_id`),
  KEY `blog_id_2` (`blog_id`),
  KEY `movie_id_2` (`movie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_BlogMovieLikes`
--

LOCK TABLES `Wo_BlogMovieLikes` WRITE;
/*!40000 ALTER TABLE `Wo_BlogMovieLikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_BlogMovieLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Codes`
--

DROP TABLE IF EXISTS `Wo_Codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Codes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL DEFAULT '',
  `app_id` varchar(50) NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `code` (`code`),
  KEY `user_id` (`user_id`),
  KEY `app_id` (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Codes`
--

LOCK TABLES `Wo_Codes` WRITE;
/*!40000 ALTER TABLE `Wo_Codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_CommentLikes`
--

DROP TABLE IF EXISTS `Wo_CommentLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_CommentLikes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `comment_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `comment_id` (`comment_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_CommentLikes`
--

LOCK TABLES `Wo_CommentLikes` WRITE;
/*!40000 ALTER TABLE `Wo_CommentLikes` DISABLE KEYS */;
INSERT INTO `Wo_CommentLikes` VALUES (3,60,4,2),(5,64,8,1),(8,65,5,28),(10,65,17,28),(12,65,14,1),(13,65,15,1),(18,19,25,35),(19,19,25,34),(20,18,27,34),(22,14,28,34);
/*!40000 ALTER TABLE `Wo_CommentLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_CommentWonders`
--

DROP TABLE IF EXISTS `Wo_CommentWonders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_CommentWonders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `comment_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `comment_id` (`comment_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_CommentWonders`
--

LOCK TABLES `Wo_CommentWonders` WRITE;
/*!40000 ALTER TABLE `Wo_CommentWonders` DISABLE KEYS */;
INSERT INTO `Wo_CommentWonders` VALUES (2,65,5,15),(4,65,11,18),(5,65,6,28),(6,65,18,31),(7,5,20,32);
/*!40000 ALTER TABLE `Wo_CommentWonders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Comment_Replies`
--

DROP TABLE IF EXISTS `Wo_Comment_Replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Comment_Replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `text` text DEFAULT NULL,
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `comment_id` (`comment_id`),
  KEY `user_id` (`user_id`,`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Comment_Replies`
--

LOCK TABLES `Wo_Comment_Replies` WRITE;
/*!40000 ALTER TABLE `Wo_Comment_Replies` DISABLE KEYS */;
INSERT INTO `Wo_Comment_Replies` VALUES (2,4,2,0,'haa',1513244194),(3,5,15,0,'heee',1549864197),(4,5,16,0,'dasdasd',1549876953),(5,5,16,0,'tyutu',1549876960),(6,5,1,0,'hi guys',1549961259),(7,11,18,0,'ioop',1550835068),(8,5,28,0,'fhgfghfhgfhgf',1551192548),(9,18,31,0,'hello',1551244348),(10,14,1,0,'ghgfhgghgh',1551269046),(11,20,32,0,'Hii bro , i am living in delhi',1551359942),(14,28,34,0,'thanx',1551509984);
/*!40000 ALTER TABLE `Wo_Comment_Replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Comment_Replies_Likes`
--

DROP TABLE IF EXISTS `Wo_Comment_Replies_Likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Comment_Replies_Likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `reply_id` (`reply_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Comment_Replies_Likes`
--

LOCK TABLES `Wo_Comment_Replies_Likes` WRITE;
/*!40000 ALTER TABLE `Wo_Comment_Replies_Likes` DISABLE KEYS */;
INSERT INTO `Wo_Comment_Replies_Likes` VALUES (3,11,32);
/*!40000 ALTER TABLE `Wo_Comment_Replies_Likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Comment_Replies_Wonders`
--

DROP TABLE IF EXISTS `Wo_Comment_Replies_Wonders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Comment_Replies_Wonders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reply_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `reply_id` (`reply_id`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Comment_Replies_Wonders`
--

LOCK TABLES `Wo_Comment_Replies_Wonders` WRITE;
/*!40000 ALTER TABLE `Wo_Comment_Replies_Wonders` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Comment_Replies_Wonders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Comments`
--

DROP TABLE IF EXISTS `Wo_Comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `text` text DEFAULT NULL,
  `record` varchar(255) NOT NULL DEFAULT '',
  `c_file` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `page_id` (`page_id`),
  KEY `order1` (`user_id`,`id`),
  KEY `order2` (`page_id`,`id`),
  KEY `order3` (`post_id`,`id`),
  KEY `order4` (`user_id`,`id`),
  KEY `order5` (`post_id`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Comments`
--

LOCK TABLES `Wo_Comments` WRITE;
/*!40000 ALTER TABLE `Wo_Comments` DISABLE KEYS */;
INSERT INTO `Wo_Comments` VALUES (4,2,0,60,'congratulation sir.','','',1513244126),(5,15,0,65,'sdasd','','',1549864179),(6,1,0,65,'ghgjgj','','',1549961244),(7,1,0,64,'sadasdasd','','',1549963780),(8,1,0,64,'dsfsf','','',1549963787),(9,15,0,65,'Hey Bro, I am here how about you?','','',1549966632),(10,1,0,65,'dfsdfs','','',1550834377),(11,18,0,65,'asdsafsd','','',1550835049),(12,29,0,65,'dsfsd','','',1551191613),(13,31,0,65,'gdfgd','','',1551192087),(14,31,0,65,'hfhdgh','','',1551192096),(15,28,0,65,'gfdfg','','',1551192105),(16,31,0,65,'fsdf','','',1551192181),(17,28,0,65,'ggghfghfjmjjhgjhghjg','','',1551192533),(18,31,0,65,'hiii','','',1551244341),(19,1,0,65,'gfggfgf','','',1551269033),(20,32,0,5,'Hii','','',1551359930),(21,32,0,5,'&lt;3','','',1551359994),(25,35,0,19,'Nice Pic sir 0) 0) 0) 0)','','',1551418872),(27,34,0,18,'jjdskfjsdkfjsdf','','',1551429308),(28,34,0,14,'happsfjsfskfjslfsdf','','',1551509971),(29,34,0,16,'good','','',1551549657);
/*!40000 ALTER TABLE `Wo_Comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Config`
--

DROP TABLE IF EXISTS `Wo_Config`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `value` varchar(1000) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Config`
--

LOCK TABLES `Wo_Config` WRITE;
/*!40000 ALTER TABLE `Wo_Config` DISABLE KEYS */;
INSERT INTO `Wo_Config` VALUES (1,'siteName','Nirwana'),(2,'siteTitle','Nirwana- Social Community'),(3,'siteKeywords','social,social site'),(4,'siteDesc','Nirwana is a Social Networking Platform. With our new feature, user can Echo  posts, photos, and create Circle'),(5,'siteEmail','admin@nirvanacountry.co.in'),(6,'defualtLang','english'),(7,'emailValidation','0'),(8,'emailNotification','0'),(9,'fileSharing','1'),(10,'seoLink','1'),(11,'cacheSystem','0'),(12,'chatSystem','1'),(13,'useSeoFrindly','1'),(14,'reCaptcha','0'),(15,'reCaptchaKey',''),(16,'user_lastseen','1'),(17,'age','1'),(18,'deleteAccount','1'),(19,'connectivitySystem','0'),(20,'profileVisit','1'),(21,'maxUpload','96000000'),(22,'maxCharacters','640'),(23,'message_seen','1'),(24,'message_typing','1'),(25,'google_map_api','AIzaSyCRcG8HLwk97Ys24u78JZFY3TkcmEV2mvQ'),(26,'allowedExtenstion','jpg,png,jpeg,gif,mkv,docx,zip,rar,pdf,doc,mp3,mp4,flv,wav,txt,mov,avi,webm,wav,mpeg'),(27,'censored_words',''),(28,'googleAnalytics',''),(29,'AllLogin','0'),(30,'googleLogin','1'),(31,'facebookLogin','1'),(32,'twitterLogin','1'),(33,'linkedinLogin','0'),(34,'VkontakteLogin','1'),(35,'facebookAppId','146642739006772'),(36,'facebookAppKey','91f5c74b8267996b1879f2bdbdee28c1'),(37,'googleAppId','1066778025517-unltcla1a5l7st94j2u86pqbe4r0kpp4.apps.googleusercontent.com'),(38,'googleAppKey','dvaXVvGEdc6P0GWlT7c11CiZ'),(39,'twitterAppId','8S0itjizTWFkeAYL4MRSlIS2c'),(40,'twitterAppKey','8YRTYtpJfRkz3hhtBz1mwjNSUvX3BHActeaBa19lZ4fJfhSCWy'),(41,'linkedinAppId',''),(42,'linkedinAppKey',''),(43,'VkontakteAppId','6287526'),(44,'VkontakteAppKey','ELtMasrtMiaI5YUfxT6F'),(45,'theme','socialtheme'),(46,'second_post_button','dislike'),(47,'instagramAppId',''),(48,'instagramAppkey',''),(49,'instagramLogin','0'),(50,'header_background','#ffffff'),(51,'header_hover_border','#333333'),(52,'header_color','#ffffff'),(53,'body_background','#eef1fa'),(54,'btn_color','#ffffff'),(55,'btn_background_color','#28a745'),(56,'btn_hover_color','#ffffff'),(57,'btn_hover_background_color','#218838'),(58,'setting_header_color','#ffffff'),(59,'setting_header_background','#a84849'),(60,'setting_active_sidebar_color','#ffffff'),(61,'setting_active_sidebar_background','#a84849'),(62,'setting_sidebar_background','#ffffff'),(63,'setting_sidebar_color','#444444'),(64,'logo_extension','png'),(65,'online_sidebar','1'),(66,'background_extension','png'),(67,'profile_privacy','1'),(68,'video_upload','1'),(69,'audio_upload','1'),(70,'smtp_or_mail','mail'),(71,'smtp_username',''),(72,'smtp_host','smtp.site.com'),(73,'smtp_password',''),(74,'smtp_port','587'),(75,'smtp_encryption','tls'),(76,'sms_or_email','mail'),(77,'sms_username',''),(78,'sms_password',''),(79,'sms_phone_number',''),(80,'is_ok','1'),(81,'pro','1'),(82,'paypal_id',''),(83,'paypal_secret',''),(84,'paypal_mode','sandbox'),(85,'weekly_price','3'),(86,'monthly_price','8'),(87,'yearly_price','89'),(88,'lifetime_price','259'),(89,'post_limit','20'),(90,'user_limit','10'),(91,'css_upload','0'),(92,'smooth_loading','1'),(93,'header_search_color','#ffffff'),(94,'header_button_shadow','#ffffff'),(95,'currency','USD'),(97,'games','1'),(98,'last_backup','00-00-0000'),(99,'pages','1'),(100,'groups','1'),(101,'order_posts_by','1'),(102,'btn_disabled','#218838'),(103,'developers_page','1'),(104,'user_registration','1'),(105,'maintenance_mode','0'),(106,'video_chat','1'),(107,'video_accountSid',''),(108,'video_apiKeySid',''),(109,'video_apiKeySecret',''),(110,'video_configurationProfileSid',''),(111,'eapi',''),(112,'favicon_extension','png'),(113,'monthly_boosts','5'),(114,'yearly_boosts','20'),(115,'lifetime_boosts','40'),(116,'chat_outgoing_background','#fff9f9'),(117,'windows_app_version','1.0'),(118,'widnows_app_api_id','99607fdae7c468d04a9258f8f1a1b539'),(119,'widnows_app_api_key','74060462720ea81df4ac874b54052860611750a9'),(120,'stripe_id',''),(121,'stripe_secret',''),(122,'credit_card','yes'),(123,'bitcoin','no'),(124,'m_withdrawal','50'),(125,'amount_ref','0.10'),(126,'affiliate_type','0'),(127,'affiliate_system','0'),(128,'classified','1'),(129,'amazone_s3','0'),(130,'bucket_name',''),(131,'amazone_s3_key',''),(132,'amazone_s3_s_key',''),(133,'region','us-east-1'),(134,'alipay','yes'),(135,'is_utf8','1'),(136,'sms_t_phone_number',''),(137,'audio_chat','1'),(138,'sms_twilio_username',''),(139,'sms_twilio_password',''),(140,'sms_provider','twilio'),(141,'footer_background',''),(142,'footer_background_2',''),(143,'footer_text_color',''),(144,'classified_currency','USD'),(145,'classified_currency_s','$'),(146,'mime_types','text/plain,video/mp4,video/mov,video/mpeg,video/flv,video/avi,video/webm,audio/wav,audio/mpeg,video/quicktime,audio/mp3,image/png,image/jpeg,image/gif,application/pdf,application/msword,application/zip,application/x-rar-compressed,text/pdf,application/x-pointplus,text/css'),(147,'footer_background_n',''),(148,'blogs','1'),(149,'can_blogs','1'),(150,'push','1'),(151,'push_id','64e28cff-9388-4922-8bdb-1cabfeeaf61f'),(152,'push_key','NDY4ZDA1MjgtMjc4OS00ZTczLTkzNWQtMzU3NGFjNWNiNTUw'),(153,'events','1'),(154,'forum','1'),(155,'last_update','1512467504'),(156,'movies','1'),(157,'yandex_translation_api','trnsl.1.1.20170601T212421Z.5834b565b8d47a18.2620528213fbf6ee3335f750659fc342e0ea7923'),(158,'update_db_15','1503149537'),(159,'ad_v_price','0.01'),(160,'ad_c_price','0.05'),(161,'emo_cdn','https://cdnjs.cloudflare.com/ajax/libs/emojione/2.1.4/assets/png/'),(162,'user_ads','1'),(163,'user_status','1'),(164,'date_style','m/d/y'),(165,'stickers','1'),(166,'giphy_api','420d477a542b4287b2bf91ac134ae041'),(167,'find_friends','1'),(168,'update_db_152','1504450479'),(169,'push_notifications','1'),(170,'push_messages','1'),(171,'update_db_153','updated'),(172,'ads_currency','USD'),(173,'web_push','1');
/*!40000 ALTER TABLE `Wo_Config` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_CustomPages`
--

DROP TABLE IF EXISTS `Wo_CustomPages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_CustomPages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `page_content` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_type` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_CustomPages`
--

LOCK TABLES `Wo_CustomPages` WRITE;
/*!40000 ALTER TABLE `Wo_CustomPages` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_CustomPages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Egoing`
--

DROP TABLE IF EXISTS `Wo_Egoing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Egoing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Egoing`
--

LOCK TABLES `Wo_Egoing` WRITE;
/*!40000 ALTER TABLE `Wo_Egoing` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Egoing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Einterested`
--

DROP TABLE IF EXISTS `Wo_Einterested`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Einterested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Einterested`
--

LOCK TABLES `Wo_Einterested` WRITE;
/*!40000 ALTER TABLE `Wo_Einterested` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Einterested` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Einvited`
--

DROP TABLE IF EXISTS `Wo_Einvited`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Einvited` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `inviter_id` int(11) NOT NULL,
  `invited_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event_id` (`event_id`),
  KEY `inviter_id` (`invited_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Einvited`
--

LOCK TABLES `Wo_Einvited` WRITE;
/*!40000 ALTER TABLE `Wo_Einvited` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Einvited` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Emails`
--

DROP TABLE IF EXISTS `Wo_Emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `email_to` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `subject` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Emails`
--

LOCK TABLES `Wo_Emails` WRITE;
/*!40000 ALTER TABLE `Wo_Emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Events`
--

DROP TABLE IF EXISTS `Wo_Events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL DEFAULT '',
  `location` varchar(300) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_date` date NOT NULL,
  `end_time` time NOT NULL,
  `poster_id` int(11) NOT NULL,
  `cover` varchar(500) NOT NULL DEFAULT 'upload/photos/d-cover.jpg',
  PRIMARY KEY (`id`),
  KEY `poster_id` (`poster_id`),
  KEY `name` (`name`),
  KEY `start_date` (`start_date`),
  KEY `start_time` (`start_time`),
  KEY `end_time` (`end_time`),
  KEY `end_date` (`end_date`),
  KEY `order1` (`poster_id`,`id`),
  KEY `order2` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Events`
--

LOCK TABLES `Wo_Events` WRITE;
/*!40000 ALTER TABLE `Wo_Events` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Family`
--

DROP TABLE IF EXISTS `Wo_Family`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Family` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `member` int(11) NOT NULL DEFAULT 0,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `requesting` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `member_id` (`member_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Family`
--

LOCK TABLES `Wo_Family` WRITE;
/*!40000 ALTER TABLE `Wo_Family` DISABLE KEYS */;
INSERT INTO `Wo_Family` VALUES (1,14,6,'0',1,1),(2,1,6,'0',14,1),(3,16,6,'0',15,15),(4,15,6,'0',16,15);
/*!40000 ALTER TABLE `Wo_Family` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Followers`
--

DROP TABLE IF EXISTS `Wo_Followers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `following_id` int(11) NOT NULL DEFAULT 0,
  `follower_id` int(11) NOT NULL DEFAULT 0,
  `is_typing` int(11) NOT NULL DEFAULT 0,
  `active` int(255) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `following_id` (`following_id`),
  KEY `follower_id` (`follower_id`),
  KEY `active` (`active`),
  KEY `order1` (`following_id`,`id`),
  KEY `order2` (`follower_id`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Followers`
--

LOCK TABLES `Wo_Followers` WRITE;
/*!40000 ALTER TABLE `Wo_Followers` DISABLE KEYS */;
INSERT INTO `Wo_Followers` VALUES (51,34,35,0,1),(52,35,34,0,1),(53,1,34,0,1),(54,34,36,0,1),(55,36,34,0,1),(56,34,37,0,1);
/*!40000 ALTER TABLE `Wo_Followers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_ForumThreadReplies`
--

DROP TABLE IF EXISTS `Wo_ForumThreadReplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_ForumThreadReplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(11) NOT NULL DEFAULT 0,
  `forum_id` int(11) NOT NULL DEFAULT 0,
  `poster_id` int(11) NOT NULL DEFAULT 0,
  `post_subject` varchar(300) NOT NULL DEFAULT '',
  `post_text` text NOT NULL,
  `post_quoted` int(11) NOT NULL DEFAULT 0,
  `posted_time` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `thread_id` (`thread_id`),
  KEY `forum_id` (`forum_id`),
  KEY `poster_id` (`poster_id`),
  KEY `post_subject` (`post_subject`(255)),
  KEY `post_quoted` (`post_quoted`),
  KEY `posted_time` (`posted_time`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_ForumThreadReplies`
--

LOCK TABLES `Wo_ForumThreadReplies` WRITE;
/*!40000 ALTER TABLE `Wo_ForumThreadReplies` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_ForumThreadReplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Forum_Sections`
--

DROP TABLE IF EXISTS `Wo_Forum_Sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Forum_Sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(300) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `section_name` (`section_name`),
  KEY `description` (`description`(255))
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Forum_Sections`
--

LOCK TABLES `Wo_Forum_Sections` WRITE;
/*!40000 ALTER TABLE `Wo_Forum_Sections` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Forum_Sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Forum_Threads`
--

DROP TABLE IF EXISTS `Wo_Forum_Threads`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Forum_Threads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `headline` varchar(300) NOT NULL DEFAULT '',
  `post` text NOT NULL,
  `posted` varchar(20) NOT NULL DEFAULT '0',
  `last_post` int(11) NOT NULL DEFAULT 0,
  `forum` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user` (`user`),
  KEY `views` (`views`),
  KEY `posted` (`posted`),
  KEY `headline` (`headline`(255)),
  KEY `forum` (`forum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Forum_Threads`
--

LOCK TABLES `Wo_Forum_Threads` WRITE;
/*!40000 ALTER TABLE `Wo_Forum_Threads` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Forum_Threads` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Forums`
--

DROP TABLE IF EXISTS `Wo_Forums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Forums` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `description` varchar(300) NOT NULL DEFAULT '',
  `sections` int(11) NOT NULL DEFAULT 0,
  `posts` int(11) NOT NULL DEFAULT 0,
  `last_post` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `description` (`description`(255)),
  KEY `posts` (`posts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Forums`
--

LOCK TABLES `Wo_Forums` WRITE;
/*!40000 ALTER TABLE `Wo_Forums` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Forums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Games`
--

DROP TABLE IF EXISTS `Wo_Games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_name` varchar(50) NOT NULL,
  `game_avatar` varchar(100) NOT NULL,
  `game_link` varchar(100) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Games`
--

LOCK TABLES `Wo_Games` WRITE;
/*!40000 ALTER TABLE `Wo_Games` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Games_Players`
--

DROP TABLE IF EXISTS `Wo_Games_Players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Games_Players` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `game_id` int(11) NOT NULL DEFAULT 0,
  `last_play` int(11) NOT NULL DEFAULT 0,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`game_id`,`active`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Games_Players`
--

LOCK TABLES `Wo_Games_Players` WRITE;
/*!40000 ALTER TABLE `Wo_Games_Players` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Games_Players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_GroupAdmins`
--

DROP TABLE IF EXISTS `Wo_GroupAdmins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_GroupAdmins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_GroupAdmins`
--

LOCK TABLES `Wo_GroupAdmins` WRITE;
/*!40000 ALTER TABLE `Wo_GroupAdmins` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_GroupAdmins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_GroupChat`
--

DROP TABLE IF EXISTS `Wo_GroupChat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_GroupChat` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL DEFAULT '',
  `avatar` varchar(3000) NOT NULL DEFAULT 'upload/photos/d-group.jpg',
  `time` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`group_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_GroupChat`
--

LOCK TABLES `Wo_GroupChat` WRITE;
/*!40000 ALTER TABLE `Wo_GroupChat` DISABLE KEYS */;
INSERT INTO `Wo_GroupChat` VALUES (1,1,'BlocTolk','upload/photos/d-group.jpg','1512560902');
/*!40000 ALTER TABLE `Wo_GroupChat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_GroupChatUsers`
--

DROP TABLE IF EXISTS `Wo_GroupChatUsers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_GroupChatUsers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `active` enum('1','0') NOT NULL DEFAULT '1',
  `last_seen` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `group_id` (`group_id`),
  KEY `active` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_GroupChatUsers`
--

LOCK TABLES `Wo_GroupChatUsers` WRITE;
/*!40000 ALTER TABLE `Wo_GroupChatUsers` DISABLE KEYS */;
INSERT INTO `Wo_GroupChatUsers` VALUES (1,3,1,'1','0'),(3,1,1,'1','1550043693');
/*!40000 ALTER TABLE `Wo_GroupChatUsers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Group_Members`
--

DROP TABLE IF EXISTS `Wo_Group_Members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Group_Members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Group_Members`
--

LOCK TABLES `Wo_Group_Members` WRITE;
/*!40000 ALTER TABLE `Wo_Group_Members` DISABLE KEYS */;
INSERT INTO `Wo_Group_Members` VALUES (1,1,1,1549953548,'1'),(2,15,2,1549965868,'1'),(3,34,1,1551429960,'1');
/*!40000 ALTER TABLE `Wo_Group_Members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Groups`
--

DROP TABLE IF EXISTS `Wo_Groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `group_name` varchar(32) NOT NULL DEFAULT '',
  `group_title` varchar(40) NOT NULL DEFAULT '',
  `avatar` varchar(120) NOT NULL DEFAULT 'upload/photos/d-group.jpg ',
  `cover` varchar(120) NOT NULL DEFAULT 'upload/photos/d-cover.jpg  ',
  `about` varchar(550) NOT NULL DEFAULT '',
  `category` int(11) NOT NULL DEFAULT 1,
  `privacy` enum('1','2') NOT NULL DEFAULT '1',
  `join_privacy` enum('1','2') NOT NULL DEFAULT '1',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `registered` varchar(32) NOT NULL DEFAULT '0/0000',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `privacy` (`privacy`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Groups`
--

LOCK TABLES `Wo_Groups` WRITE;
/*!40000 ALTER TABLE `Wo_Groups` DISABLE KEYS */;
INSERT INTO `Wo_Groups` VALUES (1,1,'PhpExpert','communication','upload/photos/d-group.jpg ','upload/photos/d-cover.jpg  ','This is testing groups',14,'1','1','1','2/2019'),(2,15,'Expert','communication','upload/photos/2019/02/1ce166xjq2PTjahreOWk_12_771faa1f7491d6c4ba67cfb2d7e8aca7_avatar.jpg','upload/photos/d-cover.jpg  ','asdffsf',2,'1','1','1','2/2019');
/*!40000 ALTER TABLE `Wo_Groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Hashtags`
--

DROP TABLE IF EXISTS `Wo_Hashtags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Hashtags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(255) NOT NULL DEFAULT '',
  `tag` varchar(255) NOT NULL DEFAULT '',
  `last_trend_time` int(11) NOT NULL DEFAULT 0,
  `trend_use_num` int(11) NOT NULL DEFAULT 0,
  `expire` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `last_trend_time` (`last_trend_time`),
  KEY `trend_use_num` (`trend_use_num`),
  KEY `tag` (`tag`),
  KEY `expire` (`expire`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Hashtags`
--

LOCK TABLES `Wo_Hashtags` WRITE;
/*!40000 ALTER TABLE `Wo_Hashtags` DISABLE KEYS */;
INSERT INTO `Wo_Hashtags` VALUES (1,'c1be5a6944942d071cce265d2089c0a7','dsadad',1549964266,1,'2019-02-19'),(2,'bea2233da8204de1c4ba92756f0c753b','Reality',1551429683,1,'2019-03-08'),(3,'7856ebf310dfaa9c041d8b08e0046e50','recruiting',1551429684,1,'2019-03-08'),(4,'adab7b701f23bb82014c8506d3dc784e','hr',1551429684,1,'2019-03-08'),(5,'eb55f9d7139c354ccf0ab95a91efaa7b','hrlife',1551429684,1,'2019-03-08'),(6,'0536dfcb9bba697c6bc45c02eb2048ae','recruitment',1551429685,1,'2019-03-08'),(7,'95a1f9811cbee4674d0f24b21187db3d','Noida',1551429747,1,'2019-03-08'),(8,'1870a829d9bc69abf500eca6f00241fe','wordpress',1551430044,1,'2019-03-08'),(9,'c7a628cba22e28eb17b5f5c6ae2a266a','css',1551430044,1,'2019-03-08'),(10,'d223e1439188e478349d52476506c22e','jquery',1551430045,1,'2019-03-08'),(11,'c7c9cfbb7ed7d1cebb7a4442dc30877f','photoshop',1551430045,1,'2019-03-08'),(12,'e1bfd762321e409cee4ac0b6e841963c','php',1551430045,1,'2019-03-08'),(13,'31c13f47ad87dd7baa2d558a91e0fbb9','design',1551430045,1,'2019-03-08');
/*!40000 ALTER TABLE `Wo_Hashtags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_HiddenPosts`
--

DROP TABLE IF EXISTS `Wo_HiddenPosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_HiddenPosts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_HiddenPosts`
--

LOCK TABLES `Wo_HiddenPosts` WRITE;
/*!40000 ALTER TABLE `Wo_HiddenPosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_HiddenPosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Langs`
--

DROP TABLE IF EXISTS `Wo_Langs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Langs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_key` varchar(160) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `english` text DEFAULT NULL,
  `arabic` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `dutch` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `french` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `german` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `italian` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `portuguese` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `russian` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `spanish` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `turkish` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lang_key` (`lang_key`)
) ENGINE=InnoDB AUTO_INCREMENT=1579 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Langs`
--

LOCK TABLES `Wo_Langs` WRITE;
/*!40000 ALTER TABLE `Wo_Langs` DISABLE KEYS */;
INSERT INTO `Wo_Langs` VALUES (1,'login','Login','تسجيل الدخول','Inloggen','S&#39;identifier','Anmelden','Entra','Login','Вход','Acceder','Giriş'),(2,'register','Register','التسجيل','Registereren','Enregistrez','Registrieren','Iscriviti','Registrar','Регистрация','Registrar','Kayıt'),(3,'guest','Guest','زائر','Gast','Client','Gast','Ospite','Visitante','Гость','Huésped','Konuk'),(4,'username','Username','اسم المستخدم','Gebruikersnaam','le nom d&#39;utilisateur','Benutzername','Nome Utente','Nome de usu&amp;aacute;rio','Имя пользователя','Nombre de Usuario','Kullanıcı adı'),(5,'email','E-mail','البريد الإلكتروني','E-mail','E-mail','Email','E-mail','E-mail','E-mail адрес','E-mail','E-posta'),(6,'password','Password','كلمة المرور','Wachtwoord','Mot de passe','Passwort','Password','Senha','Пароль','Contraseña','Şifre'),(7,'new_password','New password','كلمة المرورالجديدة','Nieuw wachtwoord','Nouveau mot de passe','Neues Passwort','Nuova password','Nova senha','Новый пароль','Nueva Contraseña','Yeni Şifre'),(8,'remember_me','Remember me','تذكرني','Onthoud mij','Souviens-toi de moi','Angemeldet bleiben','Resta collegato','Lembrar','Запомнить меня','Recordarme','Beni hatırla'),(9,'or_login_with','Or login with','أو أدخل عن طريق','Of login met','Ou connectez-vous avec','oder Anmeldung mit','o entra con','Ou ent&amp;atilde;o fa&amp;ccedil;a login por','Или войдите через','O Acceder con:','Ya ile giriş'),(10,'forget_password','Forgot Password?','هل نسيت كلمة المرور؟','Wachtwoord vergeten?','Mot de passe oublié?','Passwort Vergessen?','Password dimenticata?','Esqueceu sua senha?','Забыли пароль?','¿Olvidaste tu Contraseña?','Parolanızı unuttunuz mu?'),(11,'email_address','E-mail address','البريد الإلكتروني','Email','E-mail address','Emailadresse','Indirizo email','E-mail','E-mail адрес','Direcci&amp;oacute; de E-mail','E-posta'),(12,'confirm_password','Confirm Password','تأكيد كلمة المرور','Bevestig wachtwoord','Confirmez le mot de passe','Passwort bestätigen','Conferma Password','Confirmar senha','Подтвердите Пароль','Confirmar Contraseña','Şifreyi Onayla'),(13,'lets_go','Let&#039;s Go !','تسجيل','Ga verder!','Allons-y!','Los gehts!','Andiamo! !','Vamos l&amp;aacute;!','Войти!','¡Vamos!','Haydi gidelim !'),(14,'recover_password','Recover','إعادة تعيين','Recover','Récupérer','Passwort wiederherstellen','Recuperare','Recuperar','Отправить','Recuperar','Kurtarmak'),(15,'reset_new_password_label','Reset Your Password','إعادة تعيين كلمة المرور','Reset Je Wachtwoord','Réinitialisez votre mot de passe','Passwort zurücksetzen','Resetta la tua password','Redefinir senha','Сбросить пароль','Reiniciar Contraseña','Şifrenizi sıfırlamak'),(16,'reset_password','Reset','إعادة تعيين','Reset','Réinitialiser','Zurücksetzen','Resetta','Resetar','Сброс','Reiniciar','Reset'),(17,'invalid_token','Invalid Token','رابط خاطأ','Verkeerde sleutel','Jeton Invalide','Ungültiges Zeichen','Gettone non valido','Token inv&amp;aacute;lido','Недопустимый маркер','Token Invalido','Geçersiz Jetonu'),(18,'incorrect_username_or_password_label','Incorrect username or password','اسم المستخدم أو كلمة المرور غير صحيح','Gebruikersnaam of wachtwoord klopt niet','Identifiant ou mot de passe incorrect','Benutzername oder Passwort falsch','Nome utente o password errati','Nome de usu&amp;aacute;rio ou senha incorreto','Неверное имя пользователя или пароль','Usuario y/o Contraseña incorrectos','Yanlış kullanıcı adı ya da parola'),(19,'account_disbaled_contanct_admin_label','Your account has been disabled, please contact us .','لقد تم إيقاف حسابك مؤقتاَ , يرجى الإتصال بنا .','Je account is inactief gesteld. Neem contact op met account@babster.nl.','Votre compte a été désactivé, s&#39;il vous plaît contactez-nous .','Dein Konto wurde deaktiviert. Bitte setze dich mit uns in Verbindung.','Il tuo account è stato disabilitato, non esitate a contattarci.','Sua conta foi desativada.','Ваш аккаунт был отключен, пожалуйста, свяжитесь с нами.','Tu cuenta ha sido des habilitada, por favor cont&amp;aacute;ctanos .','Hesabınız devre dışı bırakıldı, lütfen bize ulaşın.'),(20,'account_not_active_label','You have to activate your account.','يجب عليك تفعيل الحساب','Je moet je account eerst activeren.','Vous devez activer votre compte.','Bitte aktiviere dein Konto.','Devi attivare il tuo account.','Voc&amp;ecirc; tem que ativar sua conta.','Вы должны активировать свою учетную запись.','Primero debes activar tu cuenta.','Hesabınızı etkinleştirmek gerekiyor.'),(21,'successfully_logged_label','Successfully Logged in, Please wait..','تم تسجيل الدخول .. الرجاء الإنتظار','Succesvol ingelogt, een momentje..','Connecté avec succès, S&#39;il vous plaît attendre..','Erfolgreich angemeldet, bitte warten..','Collegato con successo, Siete pregati di attendere..','Login efetuado com sucesso. Por favor aguarde...','Успешный вход. Пожалуйста, подождите...','Acceso permitido, por favor espere..','Başarıyla Girildi, lütfen bekleyin ..'),(22,'please_check_details','Please check your details.','الرجاء مراجعة المعلومات التي أدخلتها','Controleer je details.','S&#39;il vous plaît vérifier vos coordonnées.','Bitte überprüfe deine Angaben.','Si prega di verificare i tuoi dati.','Por favor marque os detalhes','Пожалуйста, проверьте свои данные.','Por favor revisa tus detalles.','Bilgilerinizi kontrol edin.'),(23,'username_exists','Username is already exists.','اسم المستخدم موجود بالفعل','Gebruikersnaam bestaad al.','Nom d&#39;utilisateur est existe déjà.','Benutzername existiert bereits.','Il nome utente è già esistente.','Desculpe, este nome de usu&amp;aacute;rio j&amp;aacute; esta em uso.','Имя пользователя уже существует.','Nombre de usuario ya existe.','Kullanıcı adı zaten var olduğunu.'),(24,'username_characters_length','Username must be between 5 / 32','اسم المستخدم يجب ان يكون بين 5 إلى 32 حرف','Gebruikersnaam moet tussen de 5 en 32 tekens lang zijn','Nom d&#39;utilisateur doit être comprise entre 5/32','Benutzername muss zwischen 5 und 32 Zeichen sein','Nome utente deve essere compresa tra 5 a 32 lettere','O nome de usu&amp;aacute;rio deve conter entre 5 / 32 caracteres.','Имя пользователя должно быть между 5/32 символами','Nombre de usuario debe ser de entre 5 / 32 caracteres','Kullanıcı adı 5/32 arasında olmalıdır'),(25,'username_invalid_characters','Invalid username characters','صيغة اسم المستخدم خاطئة، الرجاء كتابة اسم المستخدم بالإنجليزية وبلا مسافة مثال enbrash','Ongeldige tekens in je gebruikersnaam','Caractères de nom d&#39;utilisateur non valides','Benutzername enthält unzulässige Zeichen','Caratteri Nome utente non valido','Caracteres inv&amp;aacute;lidos','Недопустимые символы в Имени пользователя','Caracteres Inv&amp;aacute;lidos','Geçersiz kullanıcı adı karakterleri'),(26,'password_invalid_characters','Invalid password characters','صيغة كلمة المرور خاطئة','Ongeldige tekens in je wachtwoord','Caractères de mot de passe invalide','Passwort enthält unzulässige Zeichen','Caratteri della password non validi','Caracteres inv&amp;aacute;lidos','Недопустимые символы в пароле','Caracteres Inv&amp;aacute;lidos','Geçersiz şifre karakteri'),(27,'email_exists','This e-mail is already in use','البريد الإلكتروني مستخدم بالفعل','Dit email adres is al ingebruik.','Cet e-mail est déjà utilisée','Emailadresse wird bereits benutzt','Questa e-mail è già in uso','J&amp;aacute; existe uma conta registrar nesse e-mail.','E-mail адре уже используется','Este correo ya est&amp;aacute; en uso','E-posta kullanımda'),(28,'email_invalid_characters','This e-mail is invalid.','صيغة البريد الإلكتروني خاطئة','Dit is een ongeldige email.','Cet e-mail est invalide.','Ungültige Emailadresse.','Questa e-mail non è valido.','E-mail inv&amp;aacute;lido.','Недействительный адрес электронной почты.','Este correo es invalido.','E-posta geçersiz.'),(29,'password_short','Password is too short.','كلمة المرور قصيرة جداَ','Wachtwoord is te kort.','Mot de passe est trop court.','Passwort ist zu kurz.','La password è troppo corta.','Senha muito pequena.','Пароль слишком короткий.','Contrase&amp;ntilde;a muy corta.','Şifre çok kısa.'),(30,'password_mismatch','Password not match.','كلمة المرور غير متطابقة','Wachtwoorden komen niet overeen.','Mot de passe ne correspond.','Passwörter stimmen nicht überein.','La password non corrisponde.','As senhas n&amp;atilde;o conferem.','Пароли не совпадают.','Contrase&amp;ntilde; diferente.','Şifre eşleşmiyor.'),(31,'reCaptcha_error','Please Check the re-captcha.','الرجاء فحص ال reCaptcha','Controleer de beveiligingscode.','S&#39;il vous plaît Vérifiez la ré-captcha.','Bitte überprüfe den re-captcha.','Ricontrollare la Recaptcha.','Por favor, marque o captcha.','Пожалуйста, введите повторно капчу.','Favor de marcar el Re-Captcha.','ReCAPTCHA&#039;yı kontrol ediniz.'),(32,'successfully_joined_label','Successfully joined, Please wait..','تم الإشتراك بنجاح , الرجاء الإنتظار ..','Succesvol geregistreerd, een momentje..','Réussir rejoint, S&#39;il vous plaît attendre..','Erfolgreich beigetreten, bitte warten..','Iscrizione con sucesso, attendere prego..','Registrado com sucesso, Por favor aguarde..','Успешный вход. Пожалуйста, подождите...','Unido satisfactoriamente, Por favor espera..','Başarıyla katıldı! Lütfen bekleyin ..'),(33,'account_activation','Account Activation','تفعيل الحساب','Account activicatie','Activation de compte','Konto Aktivierung','Account attivato','Ativa&amp;ccedil;&amp;atilde;o de Conta','Активация аккаунта','Activaci&amp;oacute;n de cuenta','Hesap Aktivasyonu'),(34,'successfully_joined_verify_label','Registration successful! We have sent you an email, Please check your inbox/spam to verify your email.','تم الإشتراك بنجاح! لقد تم إرسال رمز التعيل إلى بريدك الإلكتروني','Succesvol geregistreerd, check je inbox/spam voor de activicatie mail.','Inscription réussi! Nous vous avons envoyé un e-mail, S&#39;il vous plaît vérifier votre boîte de réception / spam pour vérifier votre email.','Registrierung war erfolgreich! Wir haben dir eine Email gesandt: Bitte überprüfe dein Postfach und Spamordner zum aktivieren deines Kontos.','Registrazione di successo! Ti abbiamo inviato una e-mail, controlla la tua posta in arrivo / spam per verificare la tua email.','Registrado com sucesso! Enviamos um email, verifique a caixa de entrada/spam para verificar seu e-mail.','Поздравляем вы успешно зарегистрировались! Мы отправили Вам письмо с ссылкой для подтверждения регистрации. Пожалуйста, проверьте ваш почтовый ящик. Рекомендуем проверить папку «Спам» — возможно письмо попало туда.','Registro exitoso, te hemos enviado un correo de verificaci&amp;oacute;n, Revisa tu bandeja de entrada de correo.','Kayıt başarılı! Size bir e-posta gönderdik, e-postanızı doğrulamak için gelen / spam kontrol edin.'),(35,'email_not_found','We can&#039;t find this email.','البريد الإلكتروني غير موجود','We kunnen deze email niet vinden.','Nous ne pouvons pas trouver cet e-mail.','Email konnte nicht gefunden werden.','Non e possibile trovare questo indirizzo mail.','n&amp;atilde;o podemos encontrar este e-mail.','Мы не можем найти этот E-mail.','No encontramos este E-mail.','Biz bu e-postayı bulamıyor.'),(36,'password_rest_request','Password reset request','طلب إعادة تعيين كلمة المرور','Wachtwoord reset aanvraag','Demande de réinitialisation de mot','Passwort-Reset-Anfrage','Richiesta di reimpostazione della password','Pedido para resetar senha','Запрос Восстановление пароля','Solicitud de reinicio de contraseña','Parola sıfırlama isteği'),(37,'email_sent','E-mail has been sent successfully','لقد تم إرسال الرسالة','Email is succesvol verzonden','Le courriel a été envoyé avec succès','Email wurde erfolgreich versendet','E-mail è stata inviata con successo','E-mail enviado com sucesso.','Письмо отправлено','Correo enviado correctamente','E-posta başarıyla gönderildi'),(38,'processing_error','An error found while processing your request, please try again later.','حدث خطأ عند المعالجة , الرجاء المحاولة لاحقاَ','Er is een fout opgetreden, probeer het later nog eens.','Une erreur est survenue lors du traitement de votre demande, s&#39;il vous plaît réessayer plus tard.','In der Bearbeitung wurde ein Fehler festgestellt. Bitte versuche es später noch einmal.','Un errore durante l&#039;elaborazione della richiesta, riprova più tardi.','Algo de errado aconteceu. Por favor, tente novamente mais tarde.','Обнаружена ошибка при обработке вашего запроса, пожалуйста, попробуйте еще раз','Un error a ocurrido procesando tu solicitud, Intenta de nuevo mas tarde.','İsteğiniz işlenirken hata, lütfen tekrar deneyiniz bulundu'),(39,'password_changed','Password successfully changed !','تم تغيير كلمة المرور بنجاح','Wachtwoord succesvol gewijzigd !','Mot de passe changé avec succès !','Passwort erfolgreich geändert!','Password cambiata con successo!','Senha trocada com sucesso !','Пароль успешно изменен!','¡ Contrase&amp;ntilde;a modificada correctamente !','Şifre başarıyla değiştirildi !'),(40,'please_choose_correct_date','Please choose a correct date.','الرجاء أختيار تاريخ الميلاد الصحيح','Selecteer een geldige datum.','S&#39;il vous plaît choisir une date correcte.','Bitte gebe ein korrektes Datum an.','Scegliere una data corretta.','Selecione uma data correta.','Пожалуйста, выберите правильную дату.','Por favor elige una fecha correcta.','Doğru tarih seçiniz.'),(41,'setting_updated','Setting successfully updated !','تم تحديث المعلومات بنجاح !','Instellingen succesvol gewijzigd!','Réglage de mise à jour avec succès !','Einstellungen erfolgreich übernommen!','Impostazioni aggiornate correttamente!','Configura&amp;ccedil;&amp;otilde;es atualizadas !','Настройки успешно обновлены!','¡ Configuraci&amp;oacute;n correctamente guardada !','Ayar Başarıyla Güncellendi!'),(42,'current_password_mismatch','Current password not match','كلمة المرور الحالية غير صحيحة','Huidig wachtwoord komt niet overeen','Mot de passe actuel ne correspond pas','Aktuelles Passwort stimmt nicht','Password corrente non corrisponde','Sua senha atual n&amp;atilde;o confere','Текущий пароль не совпадает','Contrase&amp;ntilde;a actual diferente','Mevcut şifre eşleşmiyor'),(43,'website_invalid_characters','Website is invalid.','صيغة الموقع الإلكتروني غير صحيحة','Website is niet geldig.','Site Web est invalide.','Webseite ist ungültig.','Sito web non è valido.','Site inv&amp;aacute;lido.','Недопустимые символы в сайте.','El sitio web es invalido.','Web sitesi geçersiz.'),(44,'account_deleted','Account successfully deleted, please wait..','تم حذف حسابك نهائياَ , الرجاء الإنتظار ..','Account is succesvol gewijzigd, een momentje..','Compte supprimé avec succès, s&#39;il vous plaît patienter..','Konto erfolgreich gelöscht, bitte warten..','Account cancellato con successo, si prega di attendere..','Conta deletada, por favor aguarde..','Аккаунт успешно удален, пожалуйста, подождите...','Cuenta eliminada correctamente, por favor espere..','Başarıyla silindi Hesap, lütfen bekleyin ..'),(45,'home','Home','الصفحة الرئيسية','Home','Domicile','Start','Home','In&amp;iacute;cio','Главная','Inicio','Ana Sayfa'),(46,'advanced_search','Advanced Search','البحث المتقدم','Uitgebreid zoeken','Recherche Avancée','Erweiterte Suche','Ricerca avanzata','Pesquisa avan&amp;ccedil;ada','Расширенный поиск','B&amp;uacute;squeda Avanzada','Gelişmiş Arama'),(47,'search_header_label','Search for people, pages, groups and #hashtags','إبحث عن أعضاء, #هاشتاغ','Zoek mensen, #hastags en andere dingen..','Recherche de personnes, et les choses #hashtags','Suche Personen, #hashtags und Dinge','Cerca per persone, cose e #hashtags','Procurar pessoas, #hashtags ou coisas','Поиск людей, мест или #хэштегов','Buscar Otakus, #hashtags y lolis','Kişiler, #hashtags ve şeyler ara'),(48,'no_result','No result found','لم يتم العثور على أي نتائج','Geen resultaten gevonden','Aucun résultat trouvé','Leider keine Ergebnisse','Nessun risultato trovato','Nada encontrado','Не найдено ни одного результата','Sin resultados','Herhangi bir ürün bulunamadı'),(49,'last_seen','Last Seen:','آخر ظهور:','Laatst gezien:','Dernière Visite:','Zuletzt online vor:','Ultimo accesso:','Visto por &amp;uacute;ltimo:','Был@:','Hace','Son Görülen:'),(50,'accept','Accept','قبول','Accepteren','Acceptez','Akzeptieren','Accettare','Aceitar','принимать','Aceptar','Kabul etmek'),(51,'cancel','Cancel','إلغاء','Weiger','Annuler','Abbruch','Cancella','Cancelar','Отмена','Cancelar','Iptal'),(52,'delete','Delete','حذف','Verwijder','Effacer','Löschen','Ellimina','Deletar','Удалить','Eliminar','Sil'),(53,'my_profile','My Profile','صفحتي الشخصية','Mijn Profiel','Mon profil','Mein Profil','Mio Profilo','Meu Perfil','Мой профиль','Mi Perfil','Profilim'),(54,'saved_posts','Saved Posts','المنشورات المحفوظة','Opgeslagen berichten','Messages Enregistrés','Gespeicherte Beiträge','Post Salvati','Posts Salvos','Сохраненные заметки','Posts Guardados','Kayıtlı Mesajlar'),(55,'setting','Settings','الإعدادات','Instellingen','Réglage','Einstellungen','Impostazioni','Configura&amp;ccedil;&amp;otilde;es','Настройки','Configuraci&amp;oacute;n','Ayarlar'),(56,'admin_area','Admin Area','لوحة المدير','Beheerpaneel','Admin Area','Administration','Area Administratore','Admin','Админка','Área del Admin','Yönetici Alanı'),(57,'log_out','Log Out','تسجيل الخروج','Uitloggen','Se déconnecter','Abmelden','Esci','Sair','Выйти','Cerrar Sesión','Çıkış Yap'),(58,'no_new_notification','You do not have any notifications','لا يوجد إشعارات','Je hebt geen meldingen','Vous ne disposez pas de toutes les notifications','Derzeit keine neuen Benachrichtigungen','Non avete notifiche','Voc&amp;ecirc; tem 0 notifica&amp;ccedil;&amp;otilde;es','Нет новых уведомлений','No tienes nuevas notificaciones','Bildirim yok'),(59,'no_new_requests','You do not have any requests','لا يوجد طلبات صداقة','Je hebt geen verzoeken','Vous ne disposez pas de toutes les demandes','Derzeit keine neuen Anfragen','Non avete alcuna richiesta','Voc&amp;ecirc; tem 0 pedidos de amizade','Нет новых запросов','No tienes nuevas solicitudes','Istekler yok'),(60,'followed_you','followed you','تابعك','volgt je','je t&#39;ai suivi','folgt dir jetzt','Ti segue','Seguiu voc&amp;ecirc;','последовал@ за тобой','te ha seguido','Seni takip etti.'),(61,'comment_mention','mentioned you on a comment.','أشار لك في تعليق','heeft je vermeld in een reactie.','vous avez mentionné sur un commentaire.','hat dich in einem Kommentar erwähnt.','lei ha citato un commento.','mencionou voc&amp;ecirc; em um coment&amp;aacute;rio.','упомянул@ вас в комментарии.','te ha mencionado en un comentario.','Bir yorumum sizden bahsetti.'),(62,'post_mention','mentioned you on a post.','أشار لك في منشور','heeft je vermeld in een bericht.','vous avez mentionné sur un poteau.','hat dich in einem Beitrag erwähnt.','lei ha citato in un post.','mencionou voc&amp;ecirc; em um post.','упомянул@ вас в заметке.','te menciono en una publicaci&amp;oacute;.','Bir yayında sizden bahsetti.'),(63,'posted_on_timeline','posted on your timeline.','نشر على حائطك','heeft een krabbel op je tijdlijn geplaats.','posté sur votre timeline.','hat an deine Pinwand geschrieben.','pubblicato sulla timeline.','postou algo em sua linha do tempo.','Публикация на стене','publico en tu timeline.','Zaman çizelgesi Yayınlanan.'),(64,'profile_visted','visited your profile.','زار صفحتك الشخصية','heeft je profiel bezocht.','visité votre profil.','hat dein Profil besucht.','ha visitato il tuo profilo.','te visitou.','посетил@ ваш профиль.','visitó tu perfil','Profilinizi ziyaret etti.'),(65,'accepted_friend_request','accepted your friend request.','قبل طلب الصداقة','heeft je vriendschapsverzoek geaccepteerd.','accepté votre demande d&#39;ami.','hat deine Freundschaftsanfrage akzeptiert.','ha accettato la tua richiesta di amicizia.','aceitou seu pedido de amizade.','принял@ запрос о дружбе.','acepto tu solicitud de amistad.','Arkadaşlık isteğin kabul edildi.'),(66,'accepted_follow_request','accepted your follow request.','قبل طلب المتابعة','heeft je volgverzoek geaccepteerd.','accepté votre demande de suivi.','hat deine Folgenanfrage akzeptiert.','ha accettato la tua richiesta di follow/segumento.','aceitou que voc&amp;ecirc; siga ele.','принять запрос.','acepto tu solicitud de seguimiento.','Senin takip talebi kabul etti.'),(67,'liked_comment','liked your comment &quot;{comment}&quot;','أعجب بتعليقك &quot;{comment}&quot;','respecteerd je reactie &quot;{comment}&quot;','aimé votre commentaire &quot;{comment}&quot;','gefällt dein Kommentar &quot;{comment}&quot;','piace il tuo commento &quot;{comment}&quot;','curtiu seu coment&amp;aacute;rio &quot;{comment}&quot;','нравится Ваш комментарий &quot;{comment}&quot;','le gusta tu comentario &quot;{comment}&quot;','Yorumunuzu Beğendi &quot;{comment}&quot;'),(68,'wondered_comment','wondered your comment &quot;{comment}&quot;','تعجب من تعليقك &quot;{comment}&quot;','wondered je reactie &quot;{comment}&quot;','demandé votre commentaire &quot;{comment}&quot;','wundert sich über deinen Kommentar &quot;{comment}&quot;','si chiedeva il tuo commento &quot;{comment}&quot;','n&amp;atilde;o curtiu seu coment&amp;aacute;rio &quot;{comment}&quot;','не нравится &quot;{comment}&quot;','le sorprendioo tu comentario &quot;{comment}&quot;','Yorumunuzu merak etti &quot;{comment}&quot;'),(69,'liked_post','liked your {postType} {post}','أعجب ب {postType} الخاص بك {post}','respecteerd je {postType} {post}','aimé votre {postType} {post}','gefällt dein {postType} {post}','piace il {postType} {post}','curtiu seu {postType} {post}','нравится {postType} {post}','le gusta tu {postType} {post}','Senin {postType} Beğendi {post}'),(70,'wondered_post','wondered your {postType} {post}','تعجب ب {postType} الخاص بك {post}','wondered je {postType} {post}','demandé votre {postType} {post}','wundert sich über deinen {postType} {post}','si chiedeva il tuo {postType} {post}','n&amp;atilde;o curtiu seu {postType} {post}','не нравится {postType} {post}','le sorprendio tu {postType} {post}','Senin {postType} merak etti {post}'),(71,'share_post','Echo your {postType} {post}','شارك {postType} الخاص بك {post}','deelde je {postType} {post}','partagé votre {postType} {post}','hat deinen {postType} {post} geteilt','ha condiviso il tuo {postType} {post}','compartilhou {postType} {post}','сделал@ перепост {postType} {post}','ha compartido tu {postType} {post}','Senin {postType} paylaştı {post}'),(72,'commented_on_post','commented on your {postType} {post}','علق على {postType} {post}','reageerde op je {postType} {post}','commenté sur votre {postType} {post}','hat deinen {postType} {post} kommentiert','ha commentato il tuo {postType} {post}','comentou em seu {postType} {post}','прокомментировал {postType} {post}','comento en tu {postType} {post}','Senin {postType} yorumlananlar {post}'),(73,'activity_liked_post','liked {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','أعجب &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;بمنشور&lt;/a&gt; {user}.','respecteerd {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;bericht&lt;/a&gt;.','aimé {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;poster&lt;/a&gt;.','gefällt {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;Beitrag&lt;/a&gt;.','piace {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','curtiu {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','нравится &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;заметка&lt;/a&gt; {user}.','le gust&amp;oacute; la &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;publicaci&amp;oacute;n&lt;/a&gt; de {user} .','{user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt; beğendi.'),(74,'activity_wondered_post','wondered {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','تعجب &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;بمنشور&lt;/a&gt; {user}.','wondered {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;bericht&lt;/a&gt;.','demandé {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;poster&lt;/a&gt;.','wundert sich über {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;Beitrag&lt;/a&gt;.','chiedeva {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','n&amp;atilde;o curtiu {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','не нравится &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;заметка&lt;/a&gt; {user}.','le sorprendio la &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;publicaci&amp;oacute;n&lt;/a&gt; de {user} .','Wondered {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.'),(75,'activity_share_post','Echoed {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','شارك &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;منشور&lt;/a&gt; {user}.','deelde {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;bericht&lt;/a&gt;.','partagé {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;poster&lt;/a&gt;.','hat {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;Beitrag&lt;/a&gt; geteilt.','condiviso {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','compartilhou {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','поделился &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;заметкой&lt;/a&gt; {user}.','compartio la &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;publicaci&amp;oacute;n&lt;/a&gt; de {user} .','Shared {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.'),(76,'activity_commented_on_post','commented on {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','علق على &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;منشور&lt;/a&gt; {user}.','reageerde op {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;bericht&lt;/a&gt;.','commenté sur {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;poster&lt;/a&gt;.','hat {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;Beitrag&lt;/a&gt; kommentiert.','ha commentato in {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','Comentou no {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','прокомментировал@ &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;заметку&lt;/a&gt; {user}.','comento en la &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;publicaci&amp;oacute;n de &lt;/a&gt;{user} .','Commented on {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.'),(77,'video_n_label','video.','الفيديو','video.','vidéo.','Video','video.','v&amp;iacute;deo.','видео.','video.','video'),(78,'post_n_label','post.','المنشور','bericht.','poster.','Beitrag','post.','post.','пост.','post.','post'),(79,'photo_n_label','photo.','الصورة','foto.','photo.','Foto','imagini.','foto.','фото.','foto.','fotoğraf'),(80,'file_n_label','file.','الملف','bestand.','fichier.','Datei','file.','arquivo.','файл.','archivo.','dosya'),(81,'vine_n_label','vine video.','فيديو الفاين','vine video.','vine vidéo.','Vine-Video','vine video.','Vine.','видео.','vine.','vine video'),(82,'sound_n_label','sound.','الملف الصوتي','muziek.','du son.','Musik','musica.','som.','аудио.','sonido.','ses'),(83,'avatar_n_label','profile picture.','صورتك الشخصية','profiel foto.','Photo de profil.','Profilbild','imagine di profilo.','imagem de perfil.','Фото профиля','foto de perfil.','profil fotoğrafı'),(84,'error_not_found','404 Error','خطأ 404','404 Error','404 Erreur','404 Fehler','404 Errore','Erro 404','Ошибка 404','Error 404','404 Hatası'),(85,'sorry_page_not_found','Sorry, page not found!','عذراَ , الصفحة المطلوبة غير موجودة .','Sorry, pagina niet gevonden!','Désolé, page introuvable!','Entschuldigung: Seite wurde nicht gefunden!','la pagina non trovata!','P&amp;aacute;gina n&amp;atilde;o encontrada!','Извините, страница не обнаружена!','Gommen ne, pagina no encontrada!','Maalesef sayfa bulunamadı!'),(86,'page_not_found','The page you are looking for could not be found. Please check the link you followed to get here and try again.','الصفحة التي طلبتها غير موجودة , الرجاء فحص الرابط مرة أخرى','The page you are looking for could not be found. Please check the link you followed to get here and try again.','La page que vous recherchez n&#39;a pu être trouvée. S&#39;il vous plaît vérifier le lien que vous avez suivi pour arriver ici et essayez à nouveau.','Die Seite die du besuchen möchtest, wurde nicht gefunden. Bitte überprüfe den Link auf Richtigkeit und versuche es erneut.','La pagina che stai cercando non è stato trovato. Si prega di controllare il link che hai seguito per arrivare qui e riprovare.','A p&amp;aacute;gina que voc&amp;ecirc; esta procurando n&amp;atilde;o foi encontrada. Confira o link e tente novamente.','Упс! Мы не можем найти страницу, которую вы ищете. Вы ввели неправильный адрес, или такая страница больше не существует.','La p&amp;aacute;gina que est&amp;aacute;s buscando no se encuentra. Por favor revisa el link y vuelve a intentar.','Aradığınız sayfa bulunamadı. Buraya ve tekrar denemek için izlenen linki kontrol edin.'),(87,'your_account_activated','Your account have been successfully activated!','لقد تم تفعيل حسابك بنجاح !','Je account is succesvol geactiveerd!','Votre compte a été activé avec succès!','Dein Konto wurde erfolgreich aktiviert!','Il tuo account è stato attivato con successo!','Conta ativada!','Ваша учетная запись была успешно активирована!','¡Tu cuenta ha sido activada exitosamente!','Hesabınız başarıyla aktive edildi!'),(88,'free_to_login','You&#039;r free to &lt;a href=&quot;{site_url}&quot;&gt;{login}&lt;/a&gt; !','يمكنك الآن &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Je kan &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Votre libre &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Bitte hier &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Siete liberi di  &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Fa&amp;ccedil;a &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Вы&#039;r войти &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Eres libre de &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; !','Sen serbestsin &lt;a href=&quot;http://localhost/wowonder_update&quot;&gt;{login}&lt;/a&gt; ! için'),(89,'general_setting','General Setting','المعلومات العامة','General Setting','Cadre général','Allgemeine Einstellungen','Impostazioni Generali','Configura&amp;ccedil;&amp;otilde;es gerais','Общие настройки','Configuraci&amp;oacute;n General','Genel Ayar'),(90,'login_setting','Login Setting','ملعومات الدخول','Login Setting','Connexion Cadre','Anmeldungseinstellungen','Impostazioni di accesso','Configura&amp;ccedil;&amp;otilde;es de login','Войти Настройки','Configuraci&amp;oactute;n de Acceso','Üye Girişi Ayarı'),(91,'manage_users','Manage Users','إدارة المستخدمين','Manage Users','gérer les utilisateurs','Benutzer verwalten','Gestisci Utenti','Editar usu&amp;aacute;rios','Управление пользователями','Manejar Usuarios','Kullanıcıları Yönet'),(92,'manage_posts','Manage Posts','إدارة المنشورات','Manage Posts','gérer les messages','Beiträge verwalten','Gestisci Posts','Editar posts','Управление сообщения','Manejar Publicaciones','Mesajlar Yönet'),(93,'manage_reports','Manage Reports','إدارة التبليغات','Manage Reports','gérer les rapports','Meldungen verwalten','Gestisci Segnalazioni','Vizualizar reports','Управление отчетами','Manenjar Reportes','Raporlar Yönet'),(94,'advertisement','Advertisement','الإعلانات','Advertisement','Publicité','Werbung','Publicita','Divulga&amp;ccedil;&amp;atilde;o','Реклама','Aviso','Reklâm'),(95,'more','More','أكثر','Meer','Plus','mehr','Più','Mais','еще','Más información','daha'),(96,'cache_system','Cache System','نظام الكاش','Cache System','Système de cache','Cachsystem','Cache di Systema','Cache','система кэша','Cache','Önbellek Sistemi'),(97,'chat_system','Chat System','نظام الدردشة','Chat System','système chat','Chatsystem','Sistema Chat','Sistema do chat','Чат системы','Chat','Sohbet Sistemi'),(98,'email_validation','Email validation','تأكيد الحساب عبر الايميل','Email validation','Email de validation','Emailbestätigung','Email di convalida','Valida&amp;ccedil;&amp;atilde;o de Email','E-mail валидации','Validaci&amp;oacute;n de correo','E-posta Doğrulama'),(99,'email_notification','Email notification','إرسال الإشعارات عبر الايميل','Email notification','Notification par courriel','Email-Benachrichtigungen','Notifiche Email','Notifica&amp;ccedil;&amp;atilde;o de Email','E-mail уведомления','Notificaciones','E-posta Bildirimi'),(100,'smooth_links','Smooth links','الروابط القصيرة','Smooth links','liens lisses','Einfache Links','Collegamenti Smooth','Links permitidos','Гладкие Ссылки','Smooth links','Pürüzsüz Bağlantılar'),(101,'seo_friendly_url','SEO friendly url','الروابط الداعة لمواقع البحث','SEO friendly url','SEO URL conviviale','SEO freundliche URL','SEO amicizie url','URL','SEO Дружественные ссылки','url amigable para SEO','SEO dost URL'),(102,'file_sharing','File sharing','مشاركة الملفات','File sharing','Partage de fichier','Datenaustausch','Condivisione di file','Compartilhar arquivo','обмена файлами','Compartir Archivos','Dosya paylaşımak'),(103,'themes','Themes','شكل الموقع','Themes','thèmes','Design','Temi','Temas','Темы','Temas','Temalar'),(104,'user_setting','User Setting','إعدادات المستخدم','User Setting','Cadre de l&#39;utilisateur','Benutzereinstellungen','Impostazioni utente','Configura&amp;ccedil;&amp;otilde;es do usu&amp;aacute;rio','настройки пользователя','Configuraci&amp;oacute;n de usuario','Kullanıcı Ayarı'),(105,'site_setting','Site Setting','إعدادات الموقع','Site Setting','site Cadre','Seiteneinstellungen','impostazioni del sito','Configura&amp;ccedil;&amp;otilde;es do site','настройка сайта','Configuraci&amp;oacute;n de sitio','Sitede Ayarı'),(106,'cache_setting_info','Enable cache system to speed up your website, Recommended more than 10,000 active users.','فعل نظام الكاش لتسريع الموقع, يستحسن إستخدامه لأكثر من 10 آلاف مستخدم.','Enable cache system to speed up your website, Recommended more than 10,000 active users.','Activer système de cache pour accélérer votre site, a recommandé plus de 10.000 utilisateurs actifs.','Aktiviere das Cachesystem um die Seiten schneller zu machen, Empfehlenswert ab 10,000 aktiven Benutzern.','Abilita sistema di cache per velocizzare il tuo sito web, consigliato più di 10.000 utenti attivi.','Ativar o cache para aumentar a velocidade do site, Recomendado se tiver mais de 10,000 usu&amp;aacute;rios ativos.','Включить систему кэш для ускорения вашего сайта, Рекомендуем более 10000 активных пользователей.','Habilitar cache para aumentar la velocidad de tu sitio, Recomendado para m&amp;aacute;s de 10,000 usuarios activos.','Web sitenizi hızlandırmak için önbellek sistemi etkinleştirin, 10.000 &#039;den fazla aktif kullanıcı önerilir.'),(107,'chat_setting_info','Enable chat system to chat with friends on the buttom of the page','فعل نظام الدردشة للدردشة مع الإصدقاء في يمين أسفل الصفحة.','Enable chat system to chat with friends on the buttom of the page','Activer système chat pour discuter avec des amis sur le fond de la page','Aktiviere das Chatsystem zum chatten mit Freunden','Attivare il sistema chat per chiacchierare con gli amici in fondo alla pagina','Ativar sistema de chat para conversas com seus amigos no rodap&amp;eacute; da p&amp;aacute;gina','Включить чат системы для общаться с друзьями на дне страницы','Habilitar cache de chat, para hablar con amigos al pie del sitio','Sayfanın altındaki arkadaşlarınızla sohbet etmek için sohbet sistemini etkinleştirme'),(108,'email_validation_info','Enable email validation to send activation link when user registred.','لإرسال رمز التاكيد عبر البريد الإلكتروني عندما يسجل المستخدم.','Enable email validation to send activation link when user registred.','Activer la validation de messagerie pour envoyer le lien d&#39;activation lorsque l&#39;utilisateur référencée.','Aktiviere Email-Aktivierung zum Senden eines Aktivierungslinks wenn sich ein Benutzer registriert.','Abilitare la convalida e-mail per inviare link di attivazione quando utente registrato.','Ativar valida&amp;ccedil;&amp;atilde;o de e-mail quando um usu&amp;aacute;rio se registrar.','Включить проверку электронной почты, чтобы отправить ссылку активации, когда зарегистрированный пользователь.','Habilitar validaci&amp;oacute;n de correo para usuarios registrados.','Kullanıcı kayıt sırasında aktivasyon bağlantısını göndermek için e-posta doğrulama etkinleştirin.'),(109,'email_notification_info','Enable email notification to send user notification via email.','لإرسال الإشعارات عبر البريد الإلكتروني.','Enable email notification to send user notification via email.','Activer la notification par e-mail pour envoyer une notification par e-mail de l&#39;utilisateur.','Aktiviere Email-Benachrichtigungen zum Senden von Benachrichtigungen an die Benutzer.','Abilita notifica e-mail per inviare via e-mail di notifica all&#039;utente.','Enviar notifica&amp;ccedil;&amp;otilde;es por e-mail.','Включить уведомление по электронной почте, чтобы отправить уведомление пользователя по электронной почте.','Habilitar notificaci&amp;oacute;n por correo para enviar al usuario.','E-posta yoluyla kullanıcı bildirim göndermek için e-posta bildirimi etkinleştirin.'),(110,'smooth_links_info','Enable smooth links, e.g.{site_url}/home.','لإستخدام الروابط القصيرة, مثال: http://localhost/wowonder_update/home.','Enable smooth links, e.g.http://localhost/wowonder_update/home.','Activer les liens lisses, e.g.http://localhost/wowonder_update/home.','Aktiviere Einfache Links, z.B.http://localhost/wowonder_update/start','Abilita collegamenti regolari, e.g.http://localhost/wowonder_update/home.','Ativar links limpos, exemplo.http://localhost/wowonder_update/home.','Включить гладкие ссылки, напримерhttp://localhost/wowonder_update/home.','Habilitar smooth links, e.g.http://localhost/wowonder_update/home.','Pürüzsüz bağlantıları etkinleştirme, e.g.http://localhost/wowonder_update/home.'),(111,'seo_frindly_info','Enable SEO friendly url, e.g.{site_url}//1_hello-how-are-you-doing.html','لإستخدام الروابط المساعدة لمواقع البحث, مثال: http://localhost/wowonder_update/1_hello-how-are-you-doing.html','Enable SEO friendly url, e.g.http://localhost/wowonder_update//1_hello-how-are-you-doing.html','Activer SEO URL conviviale, e.g.http://localhost/wowonder_update//1_hello-how-are-you-doing.html','Aktiviere SEO freundliche URL, z.B.http://localhost/wowonder_update//1_hallo-was-machst-du-gerade.html','Abilita SEO friendly url, e.g.http://localhost/wowonder_update//1_hello-how-are-you-doing.html','Ativar SEO URL, exemplo.http://localhost/wowonder_update//1_hello-how-are-you-doing.html','Включить SEO Дружественные ссылки, напримерhttp://localhost/wowonder_update//1_hello-how-are-you-doing.html','Habilitar url amigable para SEO, e.g.http://localhost/wowonder_update//1_hello-how-are-you-doing.html','SEO dostu url etkinleştirme, e.g.http://localhost/wowonder_update//1_hello-how-are-you-doing.html'),(112,'file_sharing_info','Enable File Echoing to Echo &amp; upload videos,images,files,sounds, etc..','لمشاركة الملفات : صوت , فيديو , صورة , الخ ..','Enable File sharing to share &amp; upload videos,images,files,sounds, etc..','Activez le partage de fichiers pour partager et télécharger des vidéos, des images, des fichiers, des sons, etc...','Aktiviere Datenaustausch zum teilen und hochladen von: Videos, Bildern, Dateien, Musik, etc..','Attivare la condivisione di file per condividere e caricare video, immagini, file, suoni, ecc..','Ativar o compartilhamento de arquivos, para compartilhar videos,imagens,arquivos,sons,etc..','Включить общий доступ к файлам, чтобы разделить и загрузить видео, изображения, файлы, звуки и т.д ..','Habilitar compartir archivos, para subir v&amp;iacute;deos, sonido, im&amp;aacute;genes , etc..','Paylaşmak &amp; vb video, görüntü, dosyaları, sesler, yüklemek için Dosya paylaşımını etkinleştirin ..'),(113,'cache','Cache','الكاش','Cache','Cache','Cache','Cache','Cache','кэш','Cache','Önbellek'),(114,'site_information','Site Information','معلومات الموقع','Site Information','Informations sur le site','Seiteninformationen','Informazioni sul sito','Informa&amp;ccedil;&amp;otilde;es do Site','информация о сайте','Informaci&amp;oacute;n del sitio','Site Bilgileri'),(115,'site_title_name','Site Name &amp; Title:','اسم الموقع و عنوانه:','Site Name &amp; Title:','Site Nom et titre:','Seitenname und Titel:','Nome del sito &amp; Titolo:','Nome e t&amp;iacute;tulo do Site:','Название сайта и Заголовок:','Nombre y t&amp;iacute;tulo del sitio:','Site Adı &amp; Başlık:'),(116,'site_name','Site name','اسم الموقع','Site name','Nom du site','Seitenname','Nome del sito','Nome do Site','Название сайта','Nombre del sitio','Site adı'),(117,'site_title','Site title','عنوان الموقع','Site title','Titre du site','Seitentitel','Titolo del sito','T&amp;iacute;tulo do Site','Заголовок сайта','T&amp;iacute;tulo del sitio','Site başlığı'),(118,'site_keywords_description','Site Keywords &amp; Description:','وصف الموقع والكلمات المفتاحية:','Site Keywords &amp; Description:','Site Mots-clés et description:','Seiten-Schlüsselwörter und Beschreibung:','Chave di ricerca e descrizione del sito:','Descri&amp;ccedil;&amp;atilde;o das palavras-chaves:','Сайт Ключевые слова и Описание:','Palabras clave y Descripci&amp;oacute;:','Sitede Anahtar kelimeler ve Açıklama:'),(119,'site_keywords','Site Keywords','كلمات مفتاحية, مثال: موقع, تواصل اجتماعي, الخ ..','Site Keywords (eg: social,wownder ..)','site Mots-clés (eg: social,wownder ..)','Seiten-Schlüsselwörter (z.B: social,wundern ..)','Parole chiave del sito (ad esempio: il mio social network, social etc ..)','Palavras-chaves do site','Ключевые слова Сайт (например: социальная, лучше ..)','Palabras clave (ej: social,wownder ..)','Site Anahtar kelimeler (eg: social,wownder ..)'),(120,'site_description','Site Description','وصف الموقع','Site Description','description du site','Seitenbeschreibung','Descrizione del stio','Descri&amp;ccedil;&amp;atilde;o do site','описание сайта','Descripci&amp;oacute;n del sitio','Site Açıklaması'),(121,'site_email','Site E-mail','بريد الموقع الإلكتروني:','Site E-mail','Site E-mail','System-Email','Indirizo email del sito','E-mail do site','Сайт E-mail','E-mail del sitio','Site E-posta'),(122,'site_lang','Default Language','اللغة الأساسية:','Default Language','Langage par défaut','Standard-Sprache','Lingua di default','Linguagem padr&amp;ccedil;o','Язык по умолчанию','Lenguaje por defecto','Varsayılan dil'),(123,'theme_setting','Theme Setting','إعدادات شكل الموقع','Theme Setting','thème Cadre','Design Einstellungen','Impostazione tema','Configura&amp;ccedil;&amp;otilde;es do tema','тема настройка','Configuraci&amp;oacute;n de Tema','Tema Ayarı'),(124,'activeted','Activated','مفعل','Activeted','Activeted','Aktiviert','Attiva','Ativado','активировал','Activado','Aktif'),(125,'version','Version:','الإصدار:','Version:','Version:','Version:','Versione:','Vers&amp;ccedil;o:','Версия:','Versi&amp;oacute;n:','Sürüm:'),(126,'author','Author:','المالك:','Author:','Auteur:','Autor:','Author:','Autor:','Автор:','Autor:','Yazar:'),(127,'user_status','User status','حالة المستخدم','User status','Le statut de l&#39;utilisateur','Benutzerstatus','Status del utente','Status do usu&amp;aacute;rio','Статус пользователь','Estatus de usuario','Kullanıcı durumu'),(128,'online_lastseen','(online/last seen)','(متصل / آخر ظهور)','(online/last seen)','(en ligne / vu la dernière fois)','(online/zuletzt online)','(Attvo/Ultima visita)','(online/visto por &amp;uacute;ltimo)','(онлайн / в последний раз был@)','(En linea/visto hace)','(çevrimiçi / son görüldüğü)'),(129,'enable','Enable','تفعيل','Enable','Activer','Aktivieren','Attiva','Ativar','Включить','Habilitado','Etkinleştirmek'),(130,'disable','Disable','إلغاء التفعيل','Disable','désactiver','Deaktivieren','Disattiva','Desativar','Отключить','Des habilitado','Devre dışı'),(131,'allow_users_to_delete','Allow users to delete their account','السماح للمستخدم بحذف حسابه؟','Allow users to delete their account:','Autoriser les utilisateurs à supprimer son compte:','Benutzern erlauben ihr Konto zu löschen:','Consentire agli utenti di cancellare il proprio account:','Permitir que usu&amp;uacute;rios deletem suas contas','Разрешить пользователям удалять свой счет:','Permitir a usuarios eliminar su cuenta:','Kullanıcıların kendi hesabını silmek için izin verin:'),(132,'profile_visit_notification','Profile visit notification','تلقي الإشعارات عند زيارة الصفحة الشخصية؟','Profile visit notification:','Profil notification de visite:','Profilbesucher Benachrichtigung:','Notifiche sula visita del tuo profilo:','Notifica&amp;ccedil;&amp;atilde;o de visita no perfil','Профиль уведомление визит:','Notificaci&amp;oacute;n de visita de perfil:','Profil ziyaret bildirimi:'),(133,'display_user_age_as','Display user age as','أظهار العمر ك؟','Display user age as:','Display user d&#39;âge:','Zeige das Alter eines Users als:','Mostra eta utente come:','Mostrar idade como','Показать возраст пользователя, как:','Mostrar edad de usuario como:','Ekran kullanıcı yaşı olarak:'),(134,'date','Date','التاريخ','Date','Rendez-vous amoureux','Datum','Data','Data','Дата','Fecha','Tarih'),(135,'age','Age','العمر','Age','Âge','Alter','Eta','Idade','Возраст','Edad','Yaş'),(136,'connectivity_system','Connectivity System','نظام الصداقة:','Connectivity System:','Système de connectivité:','Communityart:','Connettività del Sistema:','Conectividade do sistema','Связь система:','Sistema de Conectividad:','Bağlantı Sistemi:'),(137,'connectivity_system_note','&lt;span style=&quot;color:red;&quot;&gt;Note:&lt;/span&gt; If you change the system to another one, all existing followings, followers, friends will be deleted.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;ملاحظة:&lt;/span&gt; عند تغيير نظام الصداقة كل الصداقات , المتابعات سوف تحذف من قاعدة البيانات , الرجاء الحذر !&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Note:&lt;/span&gt; If you migrate from one system to another, all existing followings, followers, friends, memberships will be deleted to avoid issues.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Note:&lt;/span&gt; If you migrate from one system to another, all existing followings, followers, friends, memberships will be deleted to avoid issues.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Achtung:&lt;/span&gt; Wenn Du von einem System zu einem anderen migrierst, werden alle existierenden: Folger, Verfolger, Freunde, Mitgliedschaften gelöscht um Probleme zu vermeiden.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Nota:&lt;/span&gt; Se si esegue la migrazione da un sistema all&#039;altro, tutti i seguenti esistenti, seguaci, amici, appartenenze verranno eliminati per evitare problemi.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Observa&amp;ccedil;&amp;atilde;o:&lt;/span&gt; Se voc&amp;ecirc; mudar o sistema, todos aqueles que voc&amp;ecirc; segue, que te seguem e seus amigos ser&amp;ccedil;o perdidos.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Примечание:&lt;/span&gt;  При переходе от одной системы к другой, все существующие Подписан, последователи, друзья, членство будет удален, чтобы избежать проблем.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Nota:&lt;/span&gt; Si migras de un sistema a otro, Toda la informaci&amp;oacute;n existente, seguidos, seguidores, etc.., ser&amp;aacute; eliminada para evitar conflictos.&lt;/small&gt;','&lt;span style=&quot;color:red;&quot;&gt;Not:&lt;/span&gt; Eğer bir sistemden diğerine göç, tüm mevcut followings, takipçileri, arkadaşlar, üyelikleri sorunları önlemek için silinir.&lt;/small&gt;'),(138,'friends_system','Friends system','نظام الصداقة مثل فيسبوك','Friends system','Système d&#39;amis','Freundesystem','Sistema Amici','Sistema de amigos','Друзья система','Sistema de amigos','Arkadaşlar Sistemi'),(139,'follow_system','Follow system','نظام المتابعة مثل تويتر','Follow system','système de suivi','Folgensystem','Sistema con seguire/Follow','Sistema de seguidores','Следуйте системы','Sistema de seguidores','Takip Sistemi'),(140,'max_upload_size','Max upload size for videos, images, sounds, and files','الحد الأقصى لحجم الرفع:','Max upload size:','Taille maximale de téléchargement:','Maximale Dateigröße zum hochladen:','Dimensione massima di upload:','Tamanho m&amp;aacute;ximo de v&amp;iacute;deos, imagens, sons e arquivos','Максимальный размер загрузки:','Limite de subida:','Max upload size:'),(141,'max_characters_length','Max characters length','الحد الأقصى لعدد الأحرف:','Max characters length:','Max longueur des caractères:','Maximale Zeichenlänge:','Lunghezza massima caratteri:','Max characters length','Макс символов длиной:','Limite de caracteres:','Maksimum yükleme boyutu:'),(142,'allowed_extenstions','Allowed extenstions','صيغ الملفات المسومح يها:','Allowed extenstions:','extensions autorisées:','Erlaubte Endungen:','Estensioni ammessi:','Extens&amp;otilde;es permitidas','Допустимые расширения:','Extensiones permitidas:','İzin Uzantıları:'),(143,'reCaptcha_setting','reCaptcha Setting','إعدادات الريكابتا','reCaptcha Setting','reCaptcha Cadre','reCaptcha Einstellungen','reCaptcha Impostazioni','Configura&amp;ccedil;&amp;atilde;o do reCaptcha','настройка ReCaptcha','Configuraci&amp;oacute;n reCaptcha','Tuttum Ayarı'),(144,'reCaptcha_key_is_required','reCaptcha key is required','مفتاح الريكابتشا مطلوب','reCaptcha key is required','reCaptcha clé est nécessaire','reCaptcha schlüßel ist erforderlich','reCaptcha Chiave e richesta','a chave do reCaptcha &amp;eacute; necess&amp;aacute;ria','Ключ ReCaptcha требуется','Llave de reCaptcha es requerida','Tuttum anahtarı gereklidir'),(145,'reCaptcha_key','reCaptcha Key','مفتاح الريكابتشا:','reCaptcha Key :','reCaptcha clé :','reCaptcha Schlüßel :','reCaptcha chiave :','chave do reCaptcha','Ключ ReCaptcha :','Llave de reCaptcha :','Tuttum Anahtarı:'),(146,'google_analytics','Google Analytics','تحليل غوغل','Google Analytics','Google Analytics','Google Analytics','Google Analytics','Google Analytics','Гугл Аналитика','Google Analytics','Google Analiz'),(147,'google_analytics_code','Google analytics code','كود لتحليل غوغل','Google analytics code:','Google code Google Analytics:','Google Analytics Code:','Google analytics Codice:','C&amp;oacute;digo do Google analytics','Гугл Аналитика код:','Google analytics code:','Google Analytics Kodu:'),(148,'cache_setting','Cache Setting','إعدادات الكاش','Cache Setting','cache Cadre','Cache Einstellungen','Cache Impostazioni','Configura&amp;ccedil;&amp;atilde;o de Cache','настройка кэша','Configuraci&amp;oacute;n de Cache','Önbellek Ayarı'),(149,'cache_recomended_clear','It&#039;s highly recommended to clear the cache.','انه من المستحين أن تمسح الكاش.','It&#039;s highly recommended to clear the cache.','Il est fortement recommandé de vider le cache.','Es ist sehr empfehlenswert den Cache zu säubern.','Si raccomanda di cancellare la cache.','&amp;eacute; recomend&amp;aacute;vel que voc&amp;ecirc; limpe o cache.','Это рекомендуется очистить кэш.','Es altamente recomendado limpiar la cache.','Oldukça önbelleği temizlemek için tavsiye edilir.'),(150,'cache_size','Cache Size:','حجم الكاش:','Cache Size:','Taille du cache:','Cachegröße:','Cache Dimensioni:','Tamanho do cache:','Размер кэша:','Tamaño de Cache:','Önbellek Boyutu:'),(151,'clear_cache','Clear Cache','مسح الكاش','Clear Cache','Vider le cache','Cache säubern','Pulisci Cache','Limpar Cache','Очистить кэш','Limpiar Cache','Önbelleği'),(152,'social_login','Social login','دخول التواصل الإجتماعي','Social login','Social login','Social Anmeldung','Social login','Login','Социальный вход','Social login','Sosyal giriş'),(153,'social_login_api','Social login API&#039;S','ال API الخاص ب الدخول بإستخدام التواصل الإجتماعي','Social login API&#039;S','Social login API&#39;S','Social Anmeldung API&#039;S','Social login API&#039;S','Login API','Социальный вход API &#039;S','APIS sociales','Sosyal giriş APIler'),(154,'facebook','Facebook','الفسبوك','Facebook','Facebook','Facebook','Facebook','Facebook','Facebook','Facebook','Facebook'),(155,'google','Google+','غوغل بلاس','Google+','Google+','Google+','Google+','Google+','Google+','Google+','Google+'),(156,'twitter','Twitter','تويتر','Twitter','Twitter','Twitter','Twitter','Twitter','Твиттер','Twitter','Twitter'),(157,'linkedin','Linkedin','لينكد إن','Linkedin','Linkedin','Linkedin','Linkedin','Linkedin','Linkedin','Linkedin','Linkedin'),(158,'vkontakte','Vkontakte','في كينتاكتا','Vkontakte','Vkontakte','Vkontakte','Vkontakte','Vkontakte','Вконтакте','Vkontakte','Vkontakte'),(159,'facebook_api','Facebook API','فيسبوك API','Facebook API','Facebook API','Facebook API','Facebook API','Facebook API','Facebook API','Facebook API','Facebook API'),(160,'google_api','Google API','غوغل API','Google API','Google API','Google API','Google API','Google API','Google API','Google API','Google API'),(161,'twitter_api','Twitter API','تويتر API','Twitter API','Twitter API','Twitter API','Twitter API','Twitter API','Твиттер API','Twitter API','Twitter API'),(162,'linkedin_api','Linkedin API','لينكد إن API','Linkedin API','Linkedin API','Linkedin API','Linkedin API','Linkedin API','Linkedin API','Linkedin API','Linkedin API'),(163,'vkontakte_api','Vkontakte API','في كينتاكتا API','Vkontakte API','Vkontakte API','Vkontakte API','Vkontakte API','Vkontakte API','Vkontakte API','Vkontakte API','Vkontakte API'),(164,'app_id','App ID','رقم التطبيق','App ID','App ID','App ID','App ID','App ID','App ID','ID de aplicaci&amp;oacute;n','App Kimliği'),(165,'app_secret_key','App Secret Key','مفتاح التطبيق','App Secret Key','App Secret Key','App Geheim Schlüssel','Chiave segreta delle app','Chave Secreta APP','App Секретный ключ','Llave secreta de aplicaci&amp;oacute;n','App Gizli Anahtarı'),(166,'login_with','Login with','تسجيل الدخول عن طريق:','Login with','Connectez-vous avec','Anmelden mit','Entra con','Logar com','Войдите с','Ingresar con','İle giriş'),(167,'id','ID','ID','ID','ID','ID','ID','ID','ID','ID','ID'),(168,'source','Source','المصدر','Source','La source','Quelle','Fonte','Source','Источник','Fuente','Kaynak'),(169,'status','Status','الحالة','Status','statut','Status','Stato','Status','Состояние','Estado','Statü'),(170,'pending','Pending','قيد الإنتظار','Pending','en attendant','Anstehend','In atesa','Pendente','В ожидании','Pendiente','Bekleyen'),(171,'first_name','First name','الإسم','First name','Prénom','Vorname','Nome','Primeiro nome','Имя','Nombre','İsim'),(172,'last_name','Last name','الكنية','Last name','Nom de famille','Nachname','Cognome','&amp;uacute;ltimo nome','Фамилия','Apellido','Soyadı'),(173,'about_me','About me','عني','About me','A propos de moi','Über mich','Su di me','Sobre','Обо мне','Sobre mi','Benim hakkımda'),(174,'website','Website','الموقع الإلكتروني','Website','Website','Webseite','Sito Web','Website','Веб-сайт','Website','Web Sitesi'),(175,'action','Action','عمل ','Actie','action','Aktion','Azione','Açao','действие','Acción','Aksiyon'),(176,'show_more_users','Show more users','عرض المزيد من المستخدمين','Show more users','Afficher plus d&#39;utilisateurs','Zeige mehr Benutzer','Mostra piu utenti','Mostrar mais usu&amp;uacute;rios','Показать больше пользователей','Mostrar m&amp;aacute;s usuarios','Daha fazla kullanıcı göster'),(177,'no_more_users_to_show','No more users to show','لا يوجد المزيد','No more users to show','Pas plus aux utilisateurs d&#39;afficher','Keine weiteren Benutzer','Nessun altro utente da mostrare','N&amp;atilde;o me mostre mais usu&amp;uacute;rios','Нет больше пользователей, чтобы показать','No hay m&amp;aacute;s usuarios','Artık kullanıcılar göstermek için'),(178,'user_delete_confirmation','Are you sure you want to delete this user?','هل أنت متأكد من حفذ هذا المستخدم؟','Are you sure you want to delete this user?','Êtes-vous sûr de vouloir supprimer cet utilisateur?','Diesen Benutzer wirklich löschen?','Sei sicuro di voler eliminare questo utente?','Gostaria mesmo de deletar esse usu&amp;uacute;rio?','Вы уверены, что хотите удалить этого пользователя?','¿Seguro que deseas eliminar este amigo?','Bu kullanıcıyı silmek istediğinizden emin misiniz?'),(179,'post_delete_confirmation','Are you sure you want to delete this post?','هل أنت متأكد من حفذ هذا المنشور؟','Are you sure you want to delete this post?','Es-tu sur de vouloir supprimer cette annonce?','Diesen Beitrag wirklich löschen?','Sei sicuro di voler eliminare questo post?','Gostaria mesmo de deletar esse post?','Вы уверены, что хотите удалить это сообщение?','¿Seguro que deseas eliminar est&amp;aacute; punlicaci&amp;oacute;n?','Bu mesajı silmek istediğinizden emin misiniz?'),(180,'show_more_posts','Show more posts','عرض المزيد من المنشورات','Show more posts','Montrer plus d&#39;articles','Zeige mehr Beiträge','Mostra gli altri messaggi','Mostrar mais posts','Показать еще записи','Mostrar m&amp;aacute;s publicaciones','Daha fazla mesajları göster'),(181,'no_more_posts','No more posts','لا يوجد المزيد','No more posts','Pas plus de postes','Keine weiteren Beiträge','Non ci sono altri post','N&amp;atilde;o me mostre mais posts','Нет заметок для отображения','No hay mas publicaciones','Daha mesajlar yok'),(182,'no_posts_found','No posts found','لا يوجد منشورات','No posts found','Aucun post trouvé','Keine Beiträge gefunden','nesun post trovato','Nenhum post encontrado','Заметки не найдены','Publicaci&amp;oacute;n no encontrada','Mesajlar yok'),(183,'publisher','Publisher','الناشر','Publisher','Éditeur','Herausgeber','Editore','Publicador','опубликовал@','Editor','Yayımcı'),(184,'there_are_not_new_posts_for_now','There are not new post for now','لا يوجد منشورات جديدة','There are not new post for now','Il n&#39;y a pas pour le moment nouveau poste','Derzeit keine neuen Beiträge','Nessun nuovo post per ora','Nenhum post novo','На данный момент нет новых сообщений','No hay mas publicaciones por ahora','Henüz okunmamış Mesaja vardır'),(185,'post_link','Post link','رابط المنشور','Post link','lien Poster','Beitragslink','Post link','Link do post','Заметка ссылка','Publicar link','Mesaj bağlantı'),(186,'time','Time','الوقت','Time','Temps','Zeit','Orario','Tempo','Время','Hora','Zaman'),(187,'post','Post','المنشور','Post','Poster','Beitrag','Post','Post','Заметка','Publicacion','Mesaj'),(188,'no_posts_yet','{name} has not posted anything yet','{name} لم ينشر أي منشور بعد.','{name} has not posted anything yet','{name} n&#39;a pas encore posté rien','{name} hat noch keine Beiträge erstellt','{name} non ha pubblicato ancora nulla','{name} n&amp;atilde;o postou nada ainda','{name} еще ничего не опубликовано','{name} no ha publicado nada a&amp;uacute;n','{name} bir şey yayınlamadı'),(189,'search','Search','بحث','Search','Recherche','Suche','Cerca','Procurar','Поиск','Buscar','Aramak'),(190,'on','On','تفعيل','On','Sur','An','Attivo','On','Открыт','Encender','Açık'),(191,'off','Off','إالغاء','Off','De','Aus','Spento','Off','Закрыт','Apagar','Kapalı'),(192,'save','Save','حفظ','Save','sauvegarder','Speichern','Salva','Salvar','Сохранить','Guardar','Kaydet'),(193,'saved','Saved !','تم الحفظ !','Saved !','Enregistré !','Gespeichert!','Salvato !','Salvo !','Сохранено!','¡ Guardado !','Kaydedilen!'),(194,'reporter','Reporter','البالغ','Reporter','Journaliste','Meldungen','Rapporter','Usu&amp;uacute;rio','Отчет','Reportes','Muhabir'),(195,'time_reported','Time Reported','زمن التبليغ','Time Reported','temps Rapporté','Meldungs Zeit','Tempo Segnalato','Hor&amp;aacute;rio','Время отчета','Hora reportada','Bildiren Zaman'),(196,'there_are_no_new_reports','There are no new reports for now.','لا يوجد تبليغات جديدة','There are no new reports for now.','Il n&#39;y a pas de nouveaux rapports pour l&#39;instant.','Derzeit keine neuen Meldungen.','Non ci sono nuovi report per ora.','Nenhum report novo.','На данный момент нет новых отчетов.','No hay nuevos reportes por ahora.','Henüz yeni raporlar vardır.'),(197,'open_post','Open Post','أفتح المنشور','Open Post','Ouvrir Poste','Beitrag öffnen','Apri il post','Abrir Post','Открыть заметку','Abrir publicaci&amp;oacute;n','Henüz Raporlar Vardır Yeni.'),(198,'mark_safe','Mark Safe','تعيين كآمن','Mark Safe','Mark Safe','Als sicher markieren','Mark sicuro','Marcar como seguro','Безопасно','Marcar como seguro','Mark Güvenli'),(199,'delete_post','Delete Post','حذف','Delete Post','Delete Post','Beitrag löschen','Cancella questo Post','Deletar Post','Удалить заметку','Eliminar publicaci&amp;oacute;n','Sil'),(200,'advertisement_setting','Advertisement Setting','إعدادات الإعلانات','Advertisement Setting','Cadre Publicité','Werbeeinstellungen','Impostazione Pubblicità','Configura&amp;ccedil;&amp;otilde;es de divulga&amp;ccedil;&amp;atilde;o','Реклама настройки','Configuraci&amp;oacuten; de avisos','Reklam Ayarı'),(201,'more_setting','More Setting','المزيد','More Setting','plus Cadre','Mehr Einstellungen','Piu Impostazioni','Mais configura&amp;ccedil;&amp;otilde;es','Расширенные настройки','M&amp;aacute;s configuraciones','Daha Ayar'),(202,'mailing_users','Mailing list','القائمة البريدية','Mailing list','Liste de diffusion','Mail an alle User','Lista di email','Lista dos emails','Список рассылки','Lista de correos','Mail listesi'),(203,'send','Send','إرسال','Send','Envoyer','Senden','Invia','Enviar','Отправить','Enviar','Gönder'),(204,'mailing_subject','Subject..','الموضوع..','Subject..','Assujettir..','Gegenstand..','Subject..','T&amp;iacute;tulo..','Тема..','Tema..','Konu ..'),(205,'mailing_message','Message..','الرسالة..','Message..','Message..','Nachricht..','Messaggio..','Mensagem..','Сообщение..','Mensaje..','Mesaj..'),(206,'announcement','Announcement','تصريح','Announcement:','Annonce:','Ankündigung:','Annuncio:','Aviso','Объявление:','Anuncio:','Duyuru:'),(207,'new_announcement','New announcement','تصريح جديد','New announcement ..','nouvelle annonce ..','Neue Ankündigung ..','Nuovo annuncio ..','Novo aviso','Новое объявление...','Nuevo anuncio ..','Yeni duyuru ..'),(208,'add','Add','إضافة','Add','Ajouter','Hinzufügen','Aggiungi','Add','Добавить','Agregar','Ekle'),(209,'views','Views','الآراء','Uitzichten','Vues','Ansichten','Visualizzazioni','Visualizações','Просмотры','Puntos de vista','Görüntüler'),(210,'there_are_no_active_announcements','There are no active announcements.','لا يوجد تصريحات مفعلة','There are no active announcements.','Il n&#39;y a pas d&#39;annonces actives.','Derzeit keine aktiven Ankündigungen.','Non ci sono annunci attivi.','Nenhum aviso novo.','Нет активных объявлений.','No hay avisos activos.','Aktif duyurular hiç yok.'),(211,'there_are_no_inactive_announcements','There are no inactive announcements.','لايوجد تصريحات غير مفعلة','There are no inactive announcements.','Il n&#39;y a aucune annonce inactifs.','Derzeit keine Inaktiven Ankündigungen.','Non ci sono annunci inattivi.','Nenhum aviso inativo.','Нет неактивных объявления.','No hay avisos inactivos.','Aktif değil duyurular hiç yok.'),(212,'add_friend','Add Friend','إضافة صديق','Voeg toe','Ajouter','Als Freund','Aggiungi Amico','Adicionar como amigo','Добавить друга','Agregar amigo','Arkadaş ekle'),(213,'follow','Follow','متابعة','Volgen','Suivre','folgen','Segui','Seguir','Следовать','Seguir','Takip et'),(214,'following','Following','متابَعون','Volgend','Suivant','folgt','Following','Seguindo','Следую','Siguiendo','Aşağıdaki'),(215,'following_btn','Following','متابع','Volgend','Suivant','folgt','Following','Seguindo','Следую','Siguiendo','Aşağıdaki'),(216,'followers','Followers','متابِعون','Volgers','Les adeptes','verfolger','Followers','Seguidores','Подписчики','Seguidores','İzleyiciler'),(217,'message','Message','رسالة','Stuur bericht','Message','Nachricht','Messaggio','Mensagem','Сообщение','Mensaje','Mesaj'),(218,'requested','Requested','طلب','Aangevraagd','Demandé','Gewünscht','richiesto','Requeridos','запрошенный','Pedido','İstenen'),(219,'friends_btn','Friends','الإصدقاء','Vrienden','Friends','Freunde','Amici','Amigos','Друзья','Amigos','Arkadaşlar'),(220,'online','Online','متصل','Online','Online','Online','In Linea','Online','Онлайн','Conectado','Çevrimiçi'),(221,'offline','Offline','غير متصل','Offline','Offline','Offline','Offline','Offline','Оффлайн','Desconectado','Çevrimdışı'),(222,'you_are_currently_offline','You are currently offline','غير متصل','Je bent momenteel offline','Vous êtes actuellement déconnecté','Du wirst als Offline angezeigt!','Attualmente sei offline','Voc&amp;ecirc; esta offline','На данный момент вы в оффлайн','Est&amp;aacute;s actualmente desconectado.','Şu anda çevrimdışı olan'),(223,'no_offline_users','No offline users.','لا يوجد أصدقاء غير متصلين','Geen offline mensen.','Aucun utilisateur hors ligne.','Freunde Offline.','Nessun utente in offline.','Nenhum usu&amp;uacute;rio offline.','Нет пользователей оффлайн.','Sin usuarios desconectados.','Hiçbir çevrimdışı kullanıcıları.'),(224,'no_online_users','No online users.','لا يوجد أصدقاء متصلين','Geen online mensen.','Aucun membre en ligne.','Freunde Online.','Nessun utente in linea.','Nenhum usu&amp;uacute;rio Online.','Нет пользователей онлайн.','Sin usuarios conectados.','Hiçbir online kullanıcılar.'),(225,'search_for_users','Search for users','إبحث عن مستخدمين','Zoek mensen','Recherche d&#39;utilisateurs','Freund suchen','Cerca per utente','Procurar usu&amp;uacute;rios','Поиск пользователей','Buscar usuarios','Kullanıcıları için ara'),(226,'no_users_found','No users found.','لا يوجد نتائج','Geen mensen gevonden.','Aucun utilisateur trouvé.','Leider kein Treffer.','nessun utente trovato.','Nenhum usu&amp;uacute;rio encontrado.','Не найдено ни одного пользователя.','Usuario no encontrado.','Kullanıcı bulunamadı.'),(227,'seen','Seen','تمت القراءة','Gezien','vu','Gesehen','Visto','Visto','посещений','Visto','Görülme'),(228,'load_more_posts','Load more posts','تحميل المزيد من المنشورات','Laad meer berichten','Chargez plus de postes','Mehr Beiträge laden','Carica piu notizie','Carregar mais posts','Загрузка заметок','Cargar m&amp;aacute;s publicaciones','Daha fazla Mesajları yükle'),(229,'load_more_users','Load more users','تحميل المزيد من المستخدمين','Laad meer mensen','Charger plusieurs utilisateurs','Mehr Benutzer laden','Carica piu utenti','Carregar mais usu&amp;uacute;rios','Загрузить больше','Cargar m&amp;aacute;S usuarios','Daha fazla kullanıcı yükle'),(230,'there_are_no_tags_found','No results found for your query.','لا يوجد منشورات حول هذه التاغ','Geen resultaten gevonden.','Aucun résultat n&#39;a été trouvé pour votre recherche.','Keine Ergebnisse für deine Anfrage gefunden.','Nessun risultato corrisponde alla tua richiesta.','Nenhum resultado encontrado.','Не найдено ни одной метки.','Sin resultados para tu b&amp;uacute;squeda.','Bulunan hiçbir etiket bulunmamaktadır.'),(231,'there_are_no_saved_posts','You don&#039;t have any saved posts.','لا يوجد منشورات محفوظة','Je hebt geen opgeslagen berichten.','Vous ne disposez pas de messages enregistrés.','Keine gespeicherten Beiträge.','Non avete nessun post salvato.','Voc&amp;ecirc; n&amp;atilde;o tem nenhum post salvo.','Нет сохраненных заметок.','No tienes ning&amp;uacute;na publicaci&amp;oacute;n guardada.','Kaydedilmiş bir konu bulunmuyor.'),(232,'messages','Messages','الرسائل','Berichten','Messages','Nachrichten','Messaggi','Mensagens','Переписка','Mensajes','Mesajlar'),(233,'write_something','Write Something ..','أكتب رسالة ..','Schrijf iets ..','Écrire quelque chose ..','Schreibe etwas..','Scrivi qualcosa ..','Escreva algo ..','Напишите что-нибудь...','Escribe algo ..','Bir şey yaz ..'),(234,'no_more_message_to_show','No more message','لا يوجد رسائل','Geen berichten om weer te geven','Pas plus un message','Keine weiteren Nachrichten','Niente più messaggi','Nenhuma mensagem nova','Нет больше сообщений','No hay mensajes','Artık mesajı'),(235,'view_more_messages','View more messages','تحميل المزيد من الرسائل','Bekijk meer berichten','Voir plus de messages','Mehr Nachrichten ansehen','Vedi più messaggi','Ver mais mensagens','Посмотреть больше сообщений','Ver m&amp;aacute;s mensajes','Daha fazla ileti görüntüle'),(236,'sorry_cant_reply','Sorry, you can&#039;t reply to this user.','عذراَ لا يمكنك إرسال رسالة لهذا المستخدم.','Sorry, je kan niet reageren op dit bericht.','Désolé, vous ne pouvez pas répondre à cet utilisateur.','Du kannst diesem Benutzer nicht antworten.','Siamo spiacenti, non è possibile rispondere a questo utente.','Voc&amp;ecirc; n&amp;atilde;o pode responder este usu&amp;uacute;rio.','Извините, вы не можете ответить.','Disculpa, no puedes responder a este usuario.','Maalesef, bu kullanıcı cevap veremezsiniz.'),(237,'choose_one_of_your_friends','Choose one of your friends','أخنر واحداَ من أصدقائك','Selecteer een van je vrienden','Choisissez un de vos amis','Wähle einen deiner Freunde','Scegli uno dei tuoi amici','Escolha um de seus amigos','Выберите одного из ваших друзей','Elige uno de tus amigos','Arkadaşlarınızla birini seçin'),(238,'and_say_hello','And Say Hello !','و قل له مرحباً !','En zeg Hallo !','Et dire Bonjour !','und sage Hallo!','E dire Ciao !','E diga ol&amp;aacute; !','И скажите что-нибудь!','¡ Y dile algo!','Ve Merhaba Deyin!'),(239,'download','Download','تحميل','Download','Télécharger','Herunterladen','Download','Download','Скачать','Descargar','İndir'),(240,'update_your_info','Update your info','تحديث المعلومات الخاصة بك','Update je informatie','Mettre à jour vos informations','Aktualisiere deine Informationen','Aggiorna le tue informazioni','Atualizar sua informa&amp;ccedil;&amp;atilde;o','Обновите свою информацию','Actualizar tu informaci&amp;oacute;n','Bilgilerinizi güncelleyin'),(241,'choose_your_username','Choose your username:','أختر اسم مستخدم خاص بك :','Kies een gebruikersnaam:','Choisissez votre nom d&#39;utilisateur:','Wähle deinen Benutzernamen:','Scegli il tuo username:','Escolha seu nome de usu&amp;uacute;rio:','Выберите ваше имя пользователя:','Escoje tu nombre de usuario:','Kullanıcı adınızı seçin:'),(242,'create_your_new_password','Create your new password:','أنشء كملنة المرور:','Geef een nieuw wachtwoord op:','Créer votre nouveau mot de passe:','Erstelle dein neues Passwort:','Crea la tua nuova password:','Nova Senha:','Создать новый пароль:','Crear tu nueva contrase&amp;ntilde;a:','Yeni şifrenizi oluşturun:'),(243,'update','Update','تحديث','Update','Mettre à jour','Aktualisieren','Aggiorna','Atualizar','Обновить','Actualizar','Güncelleme'),(244,'delete_comment','Delete Comment','حذف التعليق','Verwijder reactie','supprimer les commentaires','Kommentar löschen','Ellimina il commento','Deletar coment&amp;aacute;rio','Удалить комментарий','Eliminar comentario','Yorum Sil'),(245,'confirm_delete_comment','Are you sure that you want to delete this comment ?','هل أنت متاكد من حذف هذا التعليق ؟','Weet je zeker dat je deze reactie wil verwijderen?','Etes-vous sûr que vous voulez supprimer ce commentaire ?','Diesen Kommentar wirklich löschen ?','Sei sicuro di voler eliminare questo commento ?','Deletar coment&amp;aacute;rio ?','Вы уверены, что хотите удалить этот комментарий?','¿ Seguro que deseas eliminar est&amp;eacute; comentario ?','Bu yorumu silmek istediğinizden emin misiniz?'),(246,'confirm_delete_post','Are you sure that you want to delete this post ?','هل أنت متاكد من حذف هذا المنشور ؟','Weet je zeker dat je dit bericht wil verwijderd?','Etes-vous sûr que vous voulez supprimer ce message ?','Diesen Beitrag wirklich löschen ?','Sei sicuro di voler eliminare questo post?','Deletar post ?','Вы уверены, что хотите удалить эту заметку?','¿ Seguro que deseas eliminar est&amp;aacute; publicaci&amp;oacute;n?','Eğer bu mesajı silmek istediğinizden emin misiniz?'),(247,'edit_post','Edit Post','تعديل','Wijzig bericht','Modifier le message','Betrag bearbeiten','Modifica Post','Editar Post','Редактировать заметку','Editar Publicaci&amp;oacute;n','Düzenle'),(248,'session_expired','Session Expired','انتهت الجلسة !','Sessie is verlopen','La session a expiré','Sitzung abgelaufen','Sessione scaduta','Sess&amp;ccedil;o expirada','Время сессии истекло','Sesi&amp;oacute;n Expirada','Oturum süresi doldu'),(249,'session_expired_message','Your Session has been expired, please login again.','لقد تم أنتهاء جلستك, الرجاء الدخول مرة أخرى','Je sessie is verlopen, log opnieuw in.','Votre session a expiré, s&#39;il vous plaît vous connecter à nouveau.','Deine Sitzung ist abgelaufen, bitte melde dich erneut an.','La tua sessione è scaduta, effettua il login di nuovo.','Sess&amp;ccedil;o expirada. Fa&amp;ccedil;a login para continuar.','Время сессии истекло, пожалуйста, войдите еще раз.','Tu sesi&amp;oacute;n ha expirado, ingresa nuevamente.','Sizin Oturum süresi dolmuş olması, tekrar giriş yapınız.'),(250,'country','Country','البلد','Land','Pays','Land','Nazione','Pa&amp;iacute;s','Страна','Pa&amp;iacute;s','Ülke'),(251,'all','All','الكل','Alle','Tous','Alle','Tutti','Tudo','Все','Todo','Hepsi'),(252,'gender','Gender','الجنس','Geslacht','Genre','Geschlecht','Genere','Genero','Пол','Genero','Cinsiyet'),(253,'female','Female','أنثى','Vrouw','Femelle','Weiblich','Femmina','Mulher','Женский','Mujer','Dişi'),(254,'male','Male','ذكر','Man','Mâle','Männlich','Maschio','Homem','Мужской','Hombre','Erkek'),(255,'profile_picture','Profile Picture','الصورة الشخصية','Profielfoto','Photo de profil','Profilfoto','Immagine del profilo','Imagem de Perfil','Профиль фото','Imagen de perfil','Profil fotoğrafı'),(256,'result','Result','النتائج:','Resultaat:','Résultat:','Ergebnis:','Risultato:','Resultado','Результат:','Resultado:','Sonuç:'),(257,'yes','Yes','نعم','Ja','Oui','Ja','Si','Sim','Да','Si','Evet'),(258,'no','No','لا','Nee','Non','Nein','No','N&amp;atilde;o','Нет','No','Hayır'),(259,'verified_user','Verified User','حساب موثّق','Bekende Babster','vérifié utilisateur','Verifiziertes Mitglied','Utente Verificato','Contribuidor','Проверенный пользователь','Usuario Verificado','Doğrulanmış Kullanıcı'),(260,'change_password','Change Password','تغير كلمة المرور','Wijzig Wachtwoord','Changer le mot de passe','Passwort ändern','Cambiare la password','Mudar Senha','Изменить пароль','Cambiar contrase&amp;ntilde;a','Şifre değiştir'),(261,'current_password','Current Password','كلمة المرور الحالية','Huidig wachtwoord','Mot de passe actuel','Aktuelles Passwort','Password attuale','Senha Atual','Текущий пароль','Contrase&amp;ntilde;a actual','Şifreniz'),(262,'repeat_password','Repeat password','أعادة كلمة المرور','Herhaal wachtwoord','Répéter le mot de passe','Passwort wiederholen','Ripeti la password','Confirme sua senha atual','Повторите пароль','Repetir contrase&amp;ntilde;a','Şifreyi tekrar girin'),(263,'general','General','العامة','Algemeen','Général','Allgemein','Generale','Geral','Основные','General','Genel'),(264,'profile','Profile','الصفحة الشخصية','Profiel','Profil','Profil','Profilo','Perfil','Профиль','Perfil','Profil'),(265,'privacy','Privacy','الخصوصية','Privacy','Intimité','Privatsphäre','Privacy','Privacidade','Конфиденциальность','Privacidad','Gizlilik'),(266,'delete_account','Delete Account','حذف الحساب','Verwijder je account','Effacer le compte','Konto löschen','Ellimina Account','Deletar conta','Удалить аккаунт','Eliminar cuenta','Hesabım sil'),(267,'delete_account_confirm','Are You sure that you want to delete your account, and leave our network ?','هل أنت متأكد من حذف حسابك , وترك موقعنا ؟','Weet je zeker dat je je account voor goed wil verwijderen?','Etes-vous sûr que vous voulez supprimer votre compte, et de laisser notre réseau ?','Möchtest du Dein Konto wirklich löschen und &quot;wen-kennt-wer&quot; verlassen?','Sei sicuro di voler eliminare il tuo account, e lasciare la nostra rete?','Deletar conta e sair da nossa rede social ?','Вы уверены, что хотите удалить свой аккаунт, и оставить нашу сеть?','¿ Seguro que deseas eliminar tu cuenta ?','Hesabınızı silmek ve ağımızı ayrılmak istediğinizden emin misiniz?'),(268,'delete_go_back','No, I&#039;ll Think','لا , ليس الآن.','Nee, liever niet','Non, je vais y réfléchir','Ich möchte nochmal eine Nacht drüber schlafen','No, ci penserò','N&amp;atilde;o, irei pensar melhor.','Нет, я подумаю','No, fue un error','Hayır, bence olacak'),(269,'verified','Verified','توثيق','Geverifieerd','vérifié','Verifiziert','Verificato','Verificado','Подтвержден','Verificado','Doğrulanmış'),(270,'not_verified','Not verified','غير موثّق','Niet Geverifieerd','non vérifié','Nicht verifiziert','Non Verificato','N&amp;atilde;o &amp;eacute; verificado','Не подтвержден','No verificado','Doğrulanmadı'),(271,'admin','Admin','مدير','Admin','Administrateur','Admin','Administratore','Admin','Админ','Administrador','Yönetici'),(272,'user','User','مستخدم','Gebruiker','Utilisateur','Benutzer','Utente','Usu&amp;uacute;rio','Пользователь','Usuario','Kullanıcı'),(273,'verification','Verification','التأكيد','Verificatie','Vérification','Verifizierung','Verifica','Verifica&amp;ccedil;&amp;atilde;o','Верификация','Verificaci&amp;oacute;n','Doğrulama'),(274,'type','Type','النوع','Type','Type','Typ','Tipo','Tipo','Тип','Tipo','Tip'),(275,'birthday','Birthday','تاريخ الميلاد','Geboortedatum','Anniversaire','Geburtstag','Compleano','Anivers&amp;aacute;rio','Дата рождения','Cumplea&amp;ntilde;os','Doğum Günü'),(276,'active','Active','مفعل','Actief','actif','Aktiv','Attivo','Ativo','Активный','Activo','Aktif'),(277,'inactive','inactive','غير مفعل','Inactief','inactif','Inaktiv','Innativo','Desativar Login','Неактивный','Inactivo','Pasif'),(278,'privacy_setting','Privacy Setting','إعدادات الخصوصية','Privacy Instellingen','Paramètre de confidentialité','Privatsphäre Einstellungen','Impostazione di Privacy','Configura&amp;ccedil;&amp;otilde;es de privacidade','Настройки конфиденциальности','Configuraci&amp;oacute;n de privacidad','Gizlilik ayarı'),(279,'follow_privacy_label','Who can follow me ?','من يستطيع متابعتي ؟','Wie kan mij volgen?','Qui peut me suivre ?','Wer darf mir folgen?','Chi può seguirmi?','Quem pode me seguir ?','Кто может следовать за мной?','¿ Qui&amp;eacute;n puede seguirme ?','Kim beni takip edebilirim?'),(280,'everyone','Everyone','الكل','Iedereen','Toutes les personnes','Jeder','Tutti','Todos','Все','Todos pueden ver','Herkes'),(281,'my_friends','My Friends','أصدقائي','Mijn vrienden','Mes amis','Meine Freunde','Miei amici','Amigos','Мои друзья','Mis Amigos','Arkadaşlarım'),(282,'no_body','No body','لا أحد','Niemand','Personne','Niemand','Nessuno','Ningu&amp;eacute;m','Никто','Nadie','hiçbir vücut'),(283,'people_i_follow','People I Follow','أعضاء أتابعهم','Mensen die ik volg','Les gens que je suivre','Personen denen ich folge','Persone che Seguo','Pessoas que eu sigo','За кем я следую','Personas que sigo','İnsanlar izleyin'),(284,'people_follow_me','People Follow Me','أعضاء يتابعونني','Mensen die mij volgen','Les gens Follow Me','Persone die mir folgen','Persone che mi seguono','Pessoas que me seguem','Кто следует за мной','Personas que me sigue','İnsanlar beni takip etti'),(285,'only_me','Only me','أنا فقط','Alleen ik','Seulement moi','Nur ich','Solo Io','apenas eu','Только мне','Solo yo','Sadece ben'),(286,'message_privacy_label','Who can message me ?','من يستطيع إرسال رسالة لي ؟','Wie kan mij een bericht sturen?','Qui peut me message ?','Wer darf mir Nachrichten schreiben?','Chi può inviarmi i messaggi?','quem pode me enviar mensagem ?','Кто может отправлять мне сообщения?','¿Qui&amp;eacute;n puede enviarme mensajes?','Kim bana mesaj olabilir?'),(287,'timeline_post_privacy_label','Who can post on my timeline ?','من يستطيع النشر على حائطي ؟','Wie kan mij krabbelen?','Qui peut poster sur mon calendrier ?','Wer darf an meine Pinwand schreiben?','Chi può postare su mia timeline?','quem pode postar na minha linha do tempo ?','Кто может публиковать на моей стене?','¿Qui&amp;eacute;n puede publicar en mi perfil?','Benim zaman çizelgesi üzerinde kim gönderebilir?'),(288,'activities_privacy_label','Show my activities ?','إضهار إنشطتي','Laat mijn activiteiten zien?','Afficher mes activités ?','Zeige meine Aktivitäten?','Visualizza le mie attività?','Mostrar minhas atividades ?','Показывать мою деятельность?','¿Mostrar mi actividad?','Benim faaliyetleri göster?'),(289,'show','Show','إظهار','Ja','Montrer','Zeigen','Mostra','Mostrar','Показать','Mostrar','Göster'),(290,'hide','Hide','أخفي','Nee','Cache','Verstecken','Nascondi','Esconder','Скрывать','Ocultar','Gizl'),(291,'confirm_request_privacy_label','Confirm request when someone follows you ?','قبول الطلب أو رفضه عندما يتابعك مستخدم ؟','Bevestig verzoek wanneer iemand jou volgt?','Confirmer la demande quand quelqu&#39;un vous suit ?','Anfrage bestätigen wenn mir jemand folgen möchte?','Confermare richiesta quando qualcuno ti segue?','Aceitar que a pessoa te siga ?','Подтверждать запрос когда кто-то следует за вами?','¿Confirmar cuando alguien te sigue?','Birisi size izlediğinde isteği onaylayın?'),(292,'lastseen_privacy_label','Show my last seen ?','إظهار أخر ظهور ؟','Laat mijn laatst gezien zien?','Afficher mon dernière fois ?','Zeigen was ich zuletzt gesehen habe?','Mostra mia ultima visita?','Mostrar a &amp;uacute;ltima vez que voc&amp;ecirc; foi visto ?','Показывать мой последний визит?','¿Mostrar mi &amp;uacute;ltima conexi&amp;oacute;n?','Benim son görüldüğü göster?'),(293,'site_eg','(e.g: http://www.siteurl.com)','(مثال: http://www.enbrash.com)','(e.g: http://www.siteurl.com)','(e.g: http://www.siteurl.com)','(z.B.: http://www.meine-seite.de)','(Esempio: http://www.siteurl.com)','(exemplo: http://www.siteurl.com)','(например: http://www.siteurl.com)','(e.j: http://www.siteurl.com)','(örneğin: http://www.siteurl.com)'),(294,'profile_setting','Profile Setting','إعدادات الصفحة الشخصية','Profiel Instellingen','Profile Setting','Profil Einstellungen','Impostazioni Profilo','Configura&amp;ccedil;&amp;otilde;es de Perfil','Профиль настройки','Configuraci&amp;oacute;n de perfil','Profil Ayarı'),(295,'pinned_post','Pinned','مثبت','Vastgezete Bericht','épinglé','Angepinnt','Appuntato','Fixo','Важная','Anotado','Sabitlenmiş'),(296,'pin_post','Pin Post','تثبيت','Vastzetten','Pin Poster','Beitrag Anpinnen','Appunta un Post','Fixar post','Закрепить заметку','Anotar publicaci&amp;oacute;n','Pim'),(297,'unpin_post','Unpin Post','إلغاء تثبيت','Niet meer vastzetten','Détacher Poster','Beitrag Abpinnen','Rimuovi il Post Appuntato','Desafixar Post','Снять заметку','Des anotar publicaci&amp;oacute;n','Kaldırılıncaya'),(298,'open_post_in_new_tab','Open post in new tab','أفتح في صفحة جديدة','Open bericht in nieuw tapblad','Ouvrir dans un nouvel onglet après','Beitrag in neuem Fenster öffnen','Alberino aperto in una nuova scheda','Abrir post em uma nova aba','Открыть в новой вкладке','Abrir en nueva pestaña','Yeni sekmede aç sonrası'),(299,'unsave_post','Unsave Post','إلغاء حفظ المنشور','Verwijderen','unsave Poster','Beitrag nicht mehr speichern','Non salvare post','N&amp;atilde;o salvar post','Не сохранять заметку','No guardar publicaci&amp;oacute;n','Kaydetme Seçeneğini'),(300,'save_post','Save Post','حفظ المنشور','Opslaan','Sauvegarder Poster','Beitrag speichern','Salva Post','Salvar Post','Сохранить заметку','Guardar publicaci&amp;oacute;n','Kaydet Mesaj'),(301,'unreport_post','Unreport Post','إلغاء التبليغ','Verwijder Aangeven','Unreport Poster','Beitrag nicht mehr melden','Ellimina segnalazione di questo Post','N&amp;atilde;o reportar Post','Не жаловаться','Quitar reporte','Rapor sil'),(302,'report_post','Report Post','تبليغ المنشور','Bericht aangeven','Signaler le message','Beitrag melden','Segnala questo Post','Reportar Post','Пожаловаться','Reportar publicaci&amp;oacute;n','Rapor'),(303,'shared_this_post','Shared this post','شارك هذا المنشور','Heeft dit bericht gedeeld','Partagé ce post','hat diesen Beitrag geteilt','Condividi questo Post','Compartilhar post','поделился этой записью','Comparti&amp;oacute; est&amp;aacute; publicaci&amp;oacute;n','Bu yazı paylaştı'),(304,'changed_profile_picture_male','Changed his profile picture','غير صورته الشخصية','Heeft zijn profielfoto gewijzigd','Changé sa photo de profil','hat sein Profilbild geändert','Cambiato l&#039;immagine del profilo','Mudou sua imagem de perfil','изменил свою фотографию','Cambio su foto de perfil','Onun profil resimlerini değiştirdi'),(305,'changed_profile_picture_female','Changed her profile picture','غيرت صورتها الشخصية','Heeft haar profielfoto gewijzigd','A changé sa photo de profil','hat ihr Profilbild geändert','Cambiato sua immagine del profilo','Mudou sua imagem de perfil','изменила свою фотографию','Cambio su foto de perfil','Onun profil resimlerini değiştirdi'),(306,'post_login_requriement','Please log in to like,wonder,Echo and comment !','الرجاء الدخول لعمل إعجاب , تعجب , وكومنت !','Login om te respecteren, te reageren!','S&#039;il vous plaît vous connecter à aimer, étonnant, partager et commenter !','Bitte melde dich zuerst an!','Effettua il login per piacere, meraviglia, condividere e commentare!','Fa&amp;ccedil;a login para compartilhar, curtir, comentar, etc !','Пожалуйста войдите или зарегистрируйтесь, чтобы добавлять &quot;Мне нравится&quot; и комментарии!','¡ Ingresa para dar Like, Comentar, Seguir y muchas cosas m&amp;aacute;s !','Merak, pay gibi ve Yorumlamak için giriş yapınız!'),(307,'likes','Likes','الإعجابات','Respects','Aime','Gefällt mir','Mi piace','Curtiu','Нравится','Me gusta','Beğeniler'),(308,'like','Like','إعجاب','Respect!','Aimer','Gefällt mir','Mi piace','Curtir','Мне нравится','Me gusta','Beğen'),(309,'wonder','Wonder','تعجب','Wonder','Merveille','Wundert mich','Wonder','N&amp;atilde;o curtir','Удивляться!','Me sorprende','Merak et'),(310,'wonders','Wonders','التعجبات','Super Respects','Merveilles','Verwundert','Wonders','Dislikes','Удивляться','Me sorprende','Merakler'),(311,'share','Share','شارك','Delen','Partagez','Teilen','Condividi','Compartilhar','Перепост','Compartir','Paylaş'),(312,'comments','Comments','التعليقات','Reacties','commentaires','Kommentare','Commenti','Coment&amp;aacute;rios','Комментарии','Comentarios','Yorumlar'),(313,'no_likes','No likes yet','لا يوجد إعجابات','Geen respects','Aucune aime encore','Noch keine Gefällt mir Angaben','Non hai ancora un mi piace','Nenhuma curtida ainda','Пока нет &quot;Мне нравится&quot;','Sin Me Gusta','Hiç beğeniler yok'),(314,'no_wonders','No wonders yet','لا يوجد تعجبات','Geen super respects','Pas encore wondres','Noch keine Verwunderungen','Ancora nessun wondres','Nenhum dislike ainda','Неудивительно, пока','Sin Me Sorprende','Hiç merakler yok'),(315,'write_comment','Write a comment and press enter','اكتب تعليق وأضغط أنتر ..','Schrijf je reactie en druk dan op enter','Ecrire un commentaire et appuyez sur Entrée','Schreibe einen Kommentar und drücke Enter','Scrivi un commento e premere invio','Escreva um coment&amp;aacute;rio e d&amp;ecirc; enter','Напишите комментарий и нажмите клавишу ВВОД','Escribe un comentario y presiona enter','Bir yorum yazın ve enter tuşuna basın ..'),(316,'view_more_comments','View more comments','إظهار المزيد من التعليقات','Bekijk meer reacties','Voir plus de commentaires','Mehr Kommentare zeigen','Visualizza più commenti','Vizualizar mais coment&amp;aacute;rios','Посмотреть больше комментариев','Ver m&amp;aacute;s comentarios','Daha fazla yorum'),(317,'welcome_to_news_feed','Welcome to your News Feed !','أهلا بك في صفحة أحدث المنشورات !','Welkom op je tijdlijn !','Bienvenue à votre Nouvelles RSS!','Willkkommen in deinem News-Feed!','Benvenuto nel tuo News Feed!','Bem vindo as nossa not&amp;iacute;cias !','Добро пожаловать в ленту новостей!','¡ Bienvenido a tu muro de noticias !','Hoş geldiniz!'),(318,'say_hello','Say Hello !','قل مرحباً !','Zeg snel Hallo !','Dis bonjour !','Sag Hallo!','Saluta !','Diga Ol&amp;aacute; !','Скажи привет!','¡ Di hola !','Merhaba de !'),(319,'publisher_box_placeholder','What&#039;s going on? #Hashtag.. @Mention.. Link..','ما الذي يحصل الآن ؟ #هاشتاغ .. @إشارة','Hoe gaat het vandaag? #Hashtag.. @Vermeld..','Ce qui se passe? #hashtag ..@Mention..','Was ist los? #Hashtag.. @Erwähnen..','A cosa sti pensando? ..','O que voc&amp;ecirc; esta fazendo? #Hashtag.. @Mencione.. Link..','Что у Вас нового? #Хэштегом... @Упоминание...','¿ Que est&amp;aacute;s pensando ? #Anime #lolis.. @Otakus..','Ne söylemek istersin ? #Hashtag .. @Mansiyon ..'),(320,'youtube_link','Youtube Link','رابط اليوتيوب','Youtube Link','Youtube Link','Youtube Link','Youtube Link','Youtube Link','Youtube Ссылка','Link de Youtube','Youtube Bağlantısık'),(321,'vine_link','Vine Link','رابط الفاين','Vine Link','Vine Link','Vine Link','Vine Link','Vine Link','Vine Ссылка','Link de Vine','Vine Bağlantı'),(322,'soundcloud_link','SoundCloud Link','رابط الساوندكلاود','SoundCloud Link','SoundCloud Link','SoundCloud Link','SoundCloud Link','SoundCloud Link','SoundCloud Ссылка','Link de SoundCloud','Soundcloud Bağlantı'),(323,'maps_placeholder','Where are you ?','أين أنت الآن ؟','Waar ben je ?','Où es tu?','Wo bist du?','Dove ti trovi?','Onde voc&amp;ecirc; esta ?','Это где?','¿ Donde est&amp;aacute;s ?','Neredesin ?'),(324,'post_label','Post','نشر','Plaats','Poster','LOS','Post','Post','Отправить','Publicar','Gönder'),(325,'text','Text','النصوص','Tekst','Envoyer des textos','Text','Testo','Texto','Заметки','Texto','Metin'),(326,'photos','Photos','الصور','Foto&#039;s','Photos','Fotos','Foto','Fotos','Фото','Fotos','Resimler'),(327,'sounds','Sounds','الموسيقى','muziek','Des sons','Musik','Musica','Sons','Аудио','Sonidos','Sesler'),(328,'videos','Videos','الفيديو','Video&#039;s','Les vidéos','Videos','Video','V&amp;iacute;deos','Видео','Videos','Videolar'),(329,'maps','Maps','الخرائط','Maps','Plans','Karten','Mappe','Mapas','Карты','Mapas','Haritalar'),(330,'files','Files','الملفات','Files','Dossiers','Dateien','File','Arquivos','Файлы','Archivos','Dosyalar'),(331,'not_following','Not following any user','لا يوجد متابِعين','Volgt nog geen mensen','Ne pas suivre tout utilisateur','folgt niemandem','Non seguire qualsiasi utente','N&amp;atilde;o segue ningu&amp;eacute;m','Не следовать','No sigues a ning&amp;uacute;n usuario','Herhangi kullanıcıları takip Değil'),(332,'no_followers','No followers yet','لا يوجد متابَعين','Heeft geen volgers','Pas encore adeptes','hat keine Verfolger','Non hai ancora nessuno che ti segue','Nenhum seguidor ainda','Пока нет последователей','Sin seguidores','Henüz takipçileri'),(333,'details','Details','المعلومات العامة','Details','Détails','Einzelheiten','Detagli','Detalhes','Информация','Detalles','Detaylar'),(334,'social_links','Social Links','الروابط الاجتماعية','Sociale Links','Liens sociaux','Sociallinks','Link Sociali','Redes Sociais','Социальные ссылки','Enlaces Sociales','Sosyal Bağlantılar'),(335,'online_chat','Chat','الأصدقاء المتصلين','Online vrienden','amis en ligne','Freunde Online','Utenti Attivi','Amigos Online','Друзья онлайн','Amigos Conectados','Çevrimiçi arkadaş'),(336,'about','About','حول','About','Sur','Über Uns','Su di noi','Sobre','О нас','Pin','Yaklaşık'),(337,'contact_us','Contact Us','إتصل بنا','Contact Us','Contactez nous','Kontaktiere uns','Contattaci','Contato','Контакты','Contacto','Bize Ulaşın'),(338,'privacy_policy','Privacy Policy','سياسة الخصوصية','Privacy Policy','politique de confidentialité','Datenschutz','Privacy Policy','Privacidade','Политика','Pol&amp;iacute;tica','Gizlilik Politikası'),(339,'terms_of_use','Terms of Use','شروط الاستخدام','Terms of Use','Conditions d&#39;utilisation','Nutzungsbedingungen','Condizioni d&#039;uso','Termos de Uso','Условия','Condiciones','Kullanım Şartları'),(340,'developers','Developers','المطورين','Developers','Développeurs','Entwickler','Sviluppatori','Desenvolvedores','Разработчикам','Developers','Geliştiriciler'),(341,'language','Language','اللغة','Language','Langue','Sprache','Lingua','Linguagem','Язык','Idioma','Dil'),(342,'copyrights','Copyright © {date} {site_name}. All rights reserved.','حقوق النشر © {date} {site_name} . جميع الحقوق محفوظة','Copyright © {date} {site_name}. All rights reserved.','Copyright © {date} {site_name}. All rights reserved.','Copyright © {date} {site_name}. Alle Rechte vorbehalten.','Copyright © {date} {site_name}. Tutti i diritti riservati.','Direitos reservados © {date} {site_name}. Todos os direitos reservados.','Авторские права © {date} {site_name}. Все права защищены.','Copyright © {date} {site_name}. Todos los derechos reservados.','Telif hakkı © {date} {site_name}. Bütün haklar saklıdır.'),(343,'year','year','سنة','jaar','an','Jahr','Anno','ano','год','A&amp;ntilde;o','yıl'),(344,'month','month','شهر','maand','mois','Monat','mese','m&amp;ecirc;s','месяц','mes','ay'),(345,'day','day','يوم','dag','jour','Tag','giorno','dia','день','d&amp;iacute;a','gün'),(346,'hour','hour','ساعة','uur','heure','Stunde','ora','hora','час','hora','saat'),(347,'minute','minute','دقيقة','minuut','minute','Minute','minuto','minuto','минут','minuto','dakika'),(348,'second','second','ثانية','seconde','deuxième','Sekunde','secondo','segundo','секунд','segundo','saniye'),(349,'years','years','سنوات','jaren','années','Jahre','anni','anos','лет','a&amp;ntilde;os','yıllar'),(350,'months','months','اشهر','maanden','mois','Monate','messi','meses','месяцев','meses','aylar'),(351,'days','days','أيام','dagen','jours','Tage','giorni','dias','дней','d&amp;iacute;as','günler'),(352,'hours','hours','ساعات','uren','des heures','Stunden','ore','horas','часов','horas','saatler'),(353,'minutes','minutes','دقائق','minuten','minutes','Minuten','minuti','minutos','минут','minutos','dakika'),(354,'seconds','seconds','ثانية','seconden','secondes','Sekunden','secondi','segundos','секунд','segundos','saniye'),(355,'time_ago','ago','منذ','geleden','depuis','','fa','atr&amp;aacute;s','назад','','önce'),(356,'time_from_now','from now','من الآن','van nu','à partir de maintenant','ab jetzt','da adesso','agora','С этого момента','desde ahora','şu andan itibaren'),(357,'time_any_moment_now','any moment now','في أي لحظة الآن','een moment geleden','d un moment','jeden Moment','da un momento all&#039;altro','algum tempo atr&amp;aacute;s','В любой момент','cualquier momento','Şimdi her an'),(358,'time_just_now','Just now','ألآن','Net geplaats','Juste maintenant','Gerade eben','Proprio adesso','Neste momento','Прямо сейчас','Ahora','Şu anda'),(359,'time_about_a_minute_ago','about a minute ago','منذ دقيقة','een minuut geleden','Il ya environ une minute','Vor einer Minute','circa un minuto fa','minuto atr&amp;aacute;s','минуту назад','Hace un minuto','yaklaşık bir dakika önce'),(360,'time_minute_ago','%d minutes ago','منذ %d دقائق','%d minuten geleden','%d il y a quelques minutes','vor %d Minuten','%d minuti fa','%d minutos atras','%d минут назад','hace %d minutos','%d dakika önce'),(361,'time_about_an_hour_ago','about an hour ago','منذ ساعة','een uur geleden','il y a à peu près une heure','Vor einer Stunde','circa un&#039;ora fa','uma hora atr&amp;aacute;s','около часа назад','Hace una hora','yaklaşık bir saat önce'),(362,'time_hours_ago','%d hours ago','منذ %d ساعات','%d uren geleden','%d il y a des heures','vor %d Stunden','%d ore fa','%d horas atras','%d часов назад','Hace %d horas','%d saatler önce'),(363,'time_a_day_ago','a day ago','منذ يوم','a dag geleden','a Il ya jour','Gestern','a giorni fa','dia atr&amp;aacute;s','день назад','Hace un dia','bir gün önce'),(364,'time_a_days_ago','%d days ago','منذ %d أيام','%d dagen geleden','%d il y a quelques jours','vor %d Tagen','%d giorni fa','%d dias atras','%d дней назад','Hace %d dias','%d gün önce'),(365,'time_about_a_month_ago','about a month ago','منذ شهر','een maand geleden','il y a environ un mois','vor einem Monat','circa un mese fa','um m&amp;ecirc;s atr&amp;aacute;s','Около месяца назад','Hace un mes','yaklaşık bir ay önce'),(366,'time_months_ago','%d months ago','منذ %d أشهر','%d maanden geleden','%d il y a des mois','vor %d Monaten','%d mesi fa','%d meses atr&amp;aacute;s','%d месяц назад','Hace %d meses','%d aylar önce'),(367,'time_about_a_year_ago','about a year ago','منذ سنة','een jaar geleden','Il ya environ un an','vor einem Jahr','circa un anno fa','um ano atr&amp;aacute;s','около года назад','Hace un año','yaklaşık bir yıl önce'),(368,'time_years_ago','%d years ago','منذ %d سنوات','%d jaar geleden','%d il y a des années','vor %d Jahren','%d anni fa','%d anos atr&amp;aacute;s','%d много лет назад','Hace %d años','%d yıllar önce'),(369,'latest_activities','Latest Activities','آخر النشاطات','Laatste Activiteiten','Dernières activités','Letzte Aktivitäten','Ultimi Attività','&amp;uacute;ltimas atividades','Последнии действия','Actividad reciente','Son Aktiviteler'),(370,'no_activities','No new activities','لا يوجد نشاطات','Geen nieuwe activiteiten','Pas de nouvelles activités','Keine neuen Aktivitäten','Non ci sono nuove attività','Nenhuma atividade nova','Нет действий','No hay actividad reciente','Aktiviteler yok'),(371,'trending','TopTalk !','الهاشتاغات النشطة !','Populair!','Trending !','Im Trend!','Tendenza !','Assunto do momento !','Тенденции!','¡ Popular !','Trend!'),(372,'load_more_activities','Load more activities','تحميل المزيد من النشاطات','Laad meer activiteiten','Chargez plus d&#39;activités','Weitere Aktivitäten laden','Carica altri attività','Carregar mais atividades','Загрузить больше','Cargar mas actividad','Daha fazla faaliyetleri yükle'),(373,'no_more_actitivties','No more actitivties','لا يوجد المزيد من النشاطات','Geen andere activiteiten','Pas plus d&#39;activités','Keine weiteren Aktivitäten','Nessun altro attività','Nenhuma atividade nova','Нет больше действий','No hay mas actividad','Daha faaliyetler yok'),(374,'people_you_may_know','People you may know','مستخدمين قد تعرفهم','Mensen die je misschien kent','Les gens que vous connaissez peut-être','Personen die Du vielleicht kennst','Persone che Potresti Conoscere','Pessoas que voc&amp;ecirc; talvez conhe&amp;ccedil;a','Люди, которых вы можете знать','Personas que tal vez conozcas','Tanıyor olabileceğin kişiler'),(375,'too_long','Too long','طويل جداَ','Te lang','Trop long','Zu Lang','Troppo lungo','Muito grande.','Слишком длинный','Muy largo','Too long'),(376,'too_short','Too short.','قصير جداَ','To kort.','Trop court.','Zu Kurz.','Troppo corto.','Muito curto.','Слишком короткий.','Muy corto.','Too short.'),(377,'available','Available !','متاح !','Beschikbaar!','Disponible !','Verfügbar!','A disposizione !','Available !','Доступный!','¡ Disponible !','Available !'),(378,'in_use','In use.','مستخدم','In gebruik.','En service.','In Benutzung.','In uso.','Em uso.','В использовании.','En uso.','In use.'),(379,'username_invalid_characters_2','Username should not contain any special characters, symbols or spaces.','يجب اسم المستخدم أن لا يحتوي على أية أحرف خاصة أو رموز أو مسافات.','Gebruikersnaam mag geen speciale tekens bevatten.','Nom d&#39;utilisateur ne doit pas contenir de caractères, symboles ou espaces spéciaux.','Bitte keine Sonder- oder Leerzeichen verwenden.','Nome utente non deve contenere caratteri speciali, simboli o spazi.','O nome de usu&amp;uacute;rio N&amp;atilde;o deve conter nenhum carectere especial, s&amp;iacute;mbolo ou espa&amp;ccedil;os.','Имя пользователя не должно содержать каких-либо специальных символов или пробелов.','Nombre de usuario no valido, no debe contener s&amp;iacute;mbolos, caracteres especiales o espacios.','Username should not contain any special characters, symbols or spaces.'),(380,'liked','Liked','معجب','Vond','A aimé','gefällt dir','Piacuto','Curtiu','Нравится','Me gusta','Beğendim'),(381,'my_pages','My Pages','صفحاتي','Mijn pagina&#039;s','Mes Pages','Meine Seiten','Mie Pagine','Minhas P&amp;aacute;ginas','Мои Страницы','Mis páginas','Benim Sayfalar'),(382,'liked_page','Liked your page ({page_name})','أعجب بصفحتك ({page_name})','Vond je pagina ({page_name})','Aimé votre page ({page_name})','gefällt Deine Seite ({page_name})','Piaciuto tua pagina ({page_name})','Curtiu sua p&amp;aacute;gina ({page_name})','нравится ваша страница ({page_name})','Me gustó tu página ({page_name})','Sayfanızı Beğendi ({page_name})'),(383,'this_week','This week','إعجابات هذا الإسبوع','Deze week','Cette semaine','in dieser Woche','Questa settimana','Essa semana','На этой неделе','Esta semana','Bu hafta'),(384,'posts','posts','المشاركات ','posts','des postes','Beiträge','messaggi','Postagens','сообщений','Mensajes','Mesajları'),(385,'located_in','Located in','موجود في','Gelegen in','Situé dans','Wohnt in','Situata in','Localiza&amp;ccedil;&amp;atilde;o','Город','Situado en','Bulunan'),(386,'phone_number','Phone','الهاتف','Telefoon','Téléphone','Telefon','Telefono','Telefone','Телефон','Teléfono','Telefon'),(387,'company','Company','شركة','Bedrijf','Compagnie','Unternehmen','Azienda','Empresa','Компания','Empresa','şirket'),(388,'category','Category','القسم','Categorie','Catégorie','Kategorie','Categoria','Categoria','Категория','Categoría','Kategori'),(389,'search_for_posts','Search for posts','إبحث عن منشورات','Zoeken naar berichten','Rechercher les messages','Nach Beiträgen suchen','Cerca messaggi','Procurar posts','Поиск заметок','Buscar mensajes','Mesajları ara'),(390,'create_new_page','Create New Page','إنشاء صفحة جديدة','Nieuwe pagina','Créer une page','Neue Seite erstellen','Crea nuova pagina','Criar uma nova p&amp;aacute;gina','Создать страницу','Crear nueva página','Yeni Sayfa Oluştur'),(391,'page_name','Page name','إسم الصفحة (الذي يظهر في رابط الصفحة)','Pagina naam','Nom de la page','Seitenname','Nome della Pagina','Nome da p&amp;aacute;gina','Название','Nombre de la página','Sayfa adı'),(392,'page_title','Page title','عنوان الصفحة','Pagina titel','Titre de la page','Seitentitel','Titolo della Pagina','T&amp;iacute;tulo da p&amp;aacute;gina','Заголовок','Título de la página','Sayfa başlığı'),(393,'your_page_title','Your page title','عنوان صفحتك','Uw pagina titel','Votre titre de la page','Dein Seitentitel','Il tuo titolo della Pagina','T&amp;iacute;tulo da sua p&amp;aacute;gina','Заголовок страницы','Tu página de título','Sizin sayfa başlık'),(394,'page_category','Page Category','القسم','Pagina Categorie','page Catégorie','Seiten-Kategorie','Categoria','Categoria da p&amp;aacute;gina','Категория','Página Categoría','Sayfa Kategori'),(395,'page_description','Page description','حول الصفحة','Pagina beschrijving','Description de la page','Seitenbeschreibung','Descrivi la tua pagina','Descri&amp;ccedil;&amp;atilde;o da p&amp;aacute;gina','Описание страницы','Descripción de la página','Sayfa açıklaması'),(396,'page_description_info','Your Page description, Between 10 and 200 characters max.','معلومات حول صفحتك','Uw pagina beschrijving, tussen de 10 en 200 karakters max.','Votre description de la page, entre 10 et 200 caractères max.','Deine Seitenbeschreibung, zwischen 10 und 200 Zeichen max.','La tua descrizione pagina, tra i 10 ei 200 caratteri massimo.','A descri&amp;ccedil;&amp;atilde;o da sua p&amp;aacute;gina deve conter entre 10 e 200 caracteres.','Описание страницы между 10 и 200 символов макс.','Su descripción de página, entre 10 y 200 caracteres máx.','10 ve 200 karakter max Arasında Sayfanız açıklama'),(397,'create','Create','إنشاء','Creëren','Créer','Erstellen','Crea','Criar','Создать','Crear','Yarat'),(398,'page_name_exists','Page name is already exists.','إسم الصفحة مستخدم بل الفعل','Pagina naam is al bestaat.','Nom de la page est existe déjà.','Seitenname ist bereits vorhanden.','Nome della pagina è esiste già.','O nome dessa p&amp;aacute;gina j&amp;aacute; esta sendo usado.','Название страницы уже существует.','Nombre de la página es que ya existe.','Sayfa adı zaten var olduğunu.'),(399,'page_name_characters_length','Page name must be between 5 / 32','إسم الصفحة يجب ان يكون بين 5 الى 32 حرف','Pagina naam moet tussen 5/32','Nom de la page doit être comprise entre 5/32','Seitenname muss zwischen 5 und 32 Zeichen bestehen','Nome della pagina deve essere compresa tra 5/32','O nome da p&amp;aacute;gina deve conter entre 5 / 32 caracteres','Название страницы должно быть между 5/32 символами','Nombre de la página debe estar entre 5/32','Sayfa adı 5/32 arasında olmalıdır'),(400,'page_name_invalid_characters','Invalid page name characters','صيغة اسم الصفحة خاطئة','Ongeldige pagina naam tekens','Invalides nom de la page caractères','Ungültige Zeichen vorhanden','Caratteri del nome di pagina non valida','Caracteres inv&amp;aacute;lidos','Недопустимые символы в Названии страницы','Caracteres del nombre de la página no válidos','Geçersiz sayfa adı karakterleri'),(401,'edit','Edit','تصحيح','Bewerk','modifier','Bearbeiten','Modifica','Editar','редактировать','Editar','Düzenleme'),(402,'page_information','Page Information','معلومات الصفحة','Pagina Informatie','Informations sur la page','Seiteninformationen','Informazioni pagina','Informa&amp;ccedil;&amp;otilde;es da p&amp;aacute;gina','Информация о странице','Página de información','Sayfa Bilgileri'),(403,'delete_page','Delete Page','حذف الصفحة','Pagina Verwijderen','supprimer la page','Seite löschen','Ellimina Pagina','Deletar p&amp;aacute;gina','Удалить страницу','Eliminar página','Sayfayı Sil'),(404,'location','Location','موقع','Plaats','Emplacement','Lage','Posizione','localização','Расположение','Ubicación','Konum'),(405,'pages_you_may_like','Pages you may like','صفحات قد تعجبك','Pagina&#039;s die je misschien graag','Pages que vous aimerez','Seiten, die Dir gefallen','Pagine che potete gradire','P&amp;aacute;ginas que talvez voc&amp;ecirc; goste','Рекомендуемые страницы','Páginas que le gustará','Eğer gibi olabilir Sayfalar'),(406,'show_more_pages','Show more pages','أظهر المزيد من الثفحات','Toon meer pagina&#039;s','Voir plus de pages','Zeige mehr Seiten','Mostra più pagine','Mostrar mais p&amp;aacute;ginas','Показать больше страниц','Mostrar más páginas','Daha fazla sayfa göster'),(407,'no_more_pages','No more pages to show','لا يوجد المزيد','Geen pagina te tonen','No more pages to show','Keine weiteren Seiten vorhanden,','Niente più pagine per mostrare','Nenhuma p&amp;aacute;gina nova para mostrar','Нет больше страниц','No más páginas para mostrar','Yok daha fazla sayfa göstermek için'),(408,'page_delete_confirmation','Are you sure you want to delete this page?','هل أنت متأكد أنك تريد حذف هذه الصفحة ؟','Bent u zeker dat u deze pagina wilt verwijderen?','Etes-vous sûr de vouloir supprimer cette page?','Bist Du sicher das Du diese Seite löschen möchtest?','Sei sicuro di voler cancellare questa pagina?','Deletar p&amp;aacute;gina?','Вы уверены, что хотите удалить эту страницу?','¿Seguro que quieres borrar esta página?','Bu sayfayı silmek istediğinizden emin misiniz?'),(409,'manage_pages','Manage Pages','إدارة الصفحات','Pagina&#039;s beheren','gérer les pages','Seiten verwalten','Gestisci Pagine','Editar p&amp;aacute;ginas','Управление страницами','Gestionar páginas','Sayfaları Yönet'),(410,'owner','Owner','المدير','Eigenaar','Propriétaire','Inhaber','Proprietario','Dono','Владелец','Propietario','Sahib'),(411,'no_pages_found','No pages found','لا يوجد صفحات','Geen pagina&#039;s gevonden','Aucune page trouvé','Keine Seiten gefunden','Nessuna pagina trovata','Nenhuma p&amp;aacute;gina encontrada','Не найдено ни одной страницы','No se encontraron páginas','Hiçbir sayfalar bulunamadı'),(412,'welcome_wonder','Wonder','تعجب','Wonder','Merveille','Wundern','Wonder','N&amp;atilde;o curtiu','Pintter','Pintter','şaşkınlık'),(413,'welcome_connect','Connect','إتصل','Aansluiten','connecter','Verbinden','Connettiti','Conectar','Подключайтесь','Conectar','Bağlamak'),(414,'welcome_share','Share','شارك','Delen','Partagez','Teilen','Condividi','Compartilhar','Делитесь','Compartir','Pay'),(415,'welcome_discover','Discover','إستكشف','Ontdekken','Découvrir','Entdecken','Scoprire','Descobrir','Знакомьтесь','Descubrir','Keşfedin'),(416,'welcome_find_more','Find more','جد المزيد','Vind meer','Trouve plus','Mehr fnden','Trova più','Procurar mais','Найдите больше','Encuentra más','Daha fazla bul'),(417,'welcome_mobile','Mobile Friendly','متناسق مع جميع الأجهزة','Mobile Vriendelijk','mobile bienvenus','100% Mobilfreundlich','Mobile Friendly','Amigos pelo celular','Адаптивный дизайн','Mobile Amistoso','Mobil Dostu'),(418,'welcome_wonder_text','Wonder (NEW), ability to wonder a post if you don&#039;t like it.','تعجب (جديد), ميزة جديدة تستطيع من خلالها التعجب بل المنشورات.','Wonder (NEW), de mogelijkheid om een bericht af of je niet bevalt.','Wonder (NOUVEAU), la capacité à se demander un poste si vous ne l&#39;aimez pas.','(NEU) Wundern, die Möglichkeit, einen Beitrag zu markieren, in Frage zu stellen, weil Du es nicht glaubst oder verstehst.','Wonder (NEW), capacità di stupirsi un post, se non ti piace.','N&amp;atilde;o curtir (NEW), abilidade para N&amp;atilde;o curtir um post.','Свободно и без ограничений, делитесь своими публикациями со всем миром.','Libre y sin restricciones, asombroso para compartir tus publicaciones en todo el mundo.','Eğer beğenmezseniz bir yazı merak (YENİ), yetenek Wonder.'),(419,'welcome_connect_text','Connect with your family and friends and echo your moments.','تواصل مع عائلتك وأصدقائك شارك اللحظات الخاصة بك.','Verbinden met je familie en vrienden en deel je momenten.','Connectez-vous avec votre famille et vos amis et partager vos moments.','Ein modernes soziales Netzwerk für den Kontakt zu Deiner Familie und Freunden.','Connettiti con la tua famiglia e gli amici e condividere i tuoi momenti.','Conecte com seus amigos e fam&amp;iacute;lia, e compartilhe seus momentos.','Общайтесь с вашей семьей и друзьями, поделитесь своими лучшими моментами.','Conéctate con tu familia y amigos para compartir los mejores momentos.','Aileniz ve arkadaşlarınızla bağlamak ve anları paylaşmak.'),(420,'welcome_share_text','Echo what&#039;s new and life moments with your friends.','شارك الحظات الجديدة في حياتك مع أصدقائك.','Deel wat nieuw is en het leven momenten met je vrienden.','Partager ce sont des moments de nouvelles et de la vie avec vos amis.','Teile mit Deinen Freunden, Nachbarn und Kollegen alles was neu ist. Zeige was Dir gefällt.','Condividi ciò che è nuovo e la vita momenti con i tuoi amici.','Compartilhe o que acontece em sua vida com seus amigos.','Поделитесь своим контентом с помощью Pintter и получите самое лучшее продвижение.','Comparte todos tus contenidos a través de Pintter y consigue la mejor promoción.','Arkadaşlarınızla yeni ve yaşam anları ne paylaşın.'),(421,'welcome_discover_text','Discover new people, create new connections and make new friends.','إكتشف أشخاص جدد، وأنشىء اتصالات جديدة وكون صداقات جديدة.','Ontdek nieuwe mensen, nieuwe verbindingen te maken en nieuwe vrienden maken.','Découvrez de nouvelles personnes, créer de nouvelles connexions et de faire de nouveaux amis.','Entdecke neue Leute, neue Verbindungen und neue Freunde.','Scoprire nuove persone, creare nuove connessioni e fare nuove amicizie.','Descubra novas pessoas, fa&amp;ccedil;a amigos e se divirta!','Откройте для себя новых людей, создавайте связи и заводите новых друзей.','Descubre nuevas personas, haz nuevas conexiones y nuevos contactos.','Yeni insanlarla keşfedin, yeni bağlantılar oluşturmak ve yeni arkadaşlar.'),(422,'welcome_find_more_text','Find more of what you&#039;re looking for with WoWonder Search.','أبحث عن ما تريد مع  نظام بحث واواندر','Vind meer van wat je zoekt met WoWonder Search.','Trouver plus de ce que vous n &#39;êtes à la recherche d&#39;avec WoWonder Recherche.','Finde viel mehr, was Du mit wen-kennt-wer-Suche suchst.','Trova più di quello che stai cercando con WoWonder Ricerca.','Veja mais do que voc&amp;ecirc; esta procurando com o WoWonder Search.','Узнайте больше о том, что вы ищете с помощью функции поиска Pintter.','Encuentras más de lo que estás buscando con el nuevo Pintter Buscador.','Eğer WoWonder Arama ile aradığınızı daha bulun.'),(423,'welcome_mobile_text','100% screen adaptable on all tablets and smartphones.','100% متناسق مع جميع الأجهزة من الهواتف الذكية والتابلت','100% scherm passen op alle tablets en smartphones.','Écran 100% adaptable sur toutes les tablettes et les smartphones.','100% für Dein Tablet und Smartphone angepasst.','Schermo100%  adattato su tutti i tablet e smartphone.','Tela 100% adapt&amp;aacute;vel em todos os tablets e smartphones.','100% адаптируется к любому мобильному экрану, таблету или смарт-устройству.','100% adaptable a cualquier pantalla móvil, tabletas o dispositivo inteligentes.','Tüm tabletler ve akıllı telefonlarda uyarlanabilir %100 ekran.'),(424,'working_at','Working at','يعمل في','Werken bij','Travailler à','Arbeitet bei','Lavorare in','Trabalhando em','Работает в','Trabajando en','Çalışmak'),(425,'relationship','Relationship','الحالة الإجتماعية','Verhouding','Relation','Beziehung','Relazione','Relacionamento','Отношения','Relación','ilişki'),(426,'none','None','غير محدد','Geen','Aucun','Keine','Nessuna','Nenhum','Не выбрано','Ninguno','Hiçbiri'),(427,'avatar','Avatar','الصورة الشخصية','Avatar','Avatar','Profilbild','Avatar','Avatar','Аватар','Avatar','Avatar'),(428,'cover','Cover','الغلاف','Deksel','Couverture','Titelbild','Immagine di copertura','Capa','Обложка','Fondo','Kapak'),(429,'background','Background','خلفية صفحتك الشحصية','Achtergrond','Contexte','Hintergrund','Sfondo','Fundo','Задний план','Fondo de Pantalla','Geçmiş'),(430,'theme','Theme','الثيم','Thema','Thème','Thema','Temi','Tema','Тема','Tema','Tema'),(431,'deafult','Default','الإفتراضي','Standaard','Défaut','Standard','Predefinito','Padr&amp;ccedil;o','По умолчанию','Defecto','Standart'),(432,'my_background','My Background','الخاص بي','Mijn Achtergrond','Mon arrière-plan','Mein Hintergrund','Mio Sfondo','Meu fundo','Мой фон','Mi pasado','Benim Arkaplan'),(433,'company_website','Company website','الموقع الإلكتروني للعمل','Bedrijfs websitee','Site Web de l&#39;entreprise','Unternehmenswebseite','Sito Sociaeta','Site da empresa','Веб-сайт компании','Página Web de la compañía','Şirket Web Sitesi'),(434,'liked_my_page','Liked My Page','معجبين بصفحتي','Vond Mijn pagina','Aimé Ma Page','gefällt meine Seite','Mi è piaciuta la mia pagina','Curtiu minha p&amp;aacute;gina','Понравилась моя страница','Me gustó mi página','Benim Sayfam Beğendi'),(435,'dislike','Dislike','عدم الإعجاب','Afkeer','Aversion','Gefällt mir nicht','Antipatia','N&amp;atilde;o curtir','Не нравится','No me gusta','Beğenmeme'),(436,'dislikes','Dislikes','غير معجبين','Antipathieën','Dégoûts','Unbeliebt','Antipatia','N&amp;atilde;o curtiu','Не нравится','No le gusta','Sevmedikleri'),(437,'disliked_post','disliked your {postType} {post}','لم يعجب {postType} {post}','hekel aan je {postType} {post}','détesté votre {postType} {post}','gefällt dein Beitrag {postType} {post} nicht','antipatia tuo {postType} {post}','N&amp;atilde;o curtiu seu {postType} {post}','не нравится {postType} {post}','no le gusta tu {postType} {post}','senin {postType} sevmiyordu {post}'),(438,'disliked_comment','disliked your comment &quot;{comment}&quot;','لم يعجب بتعليقك &quot;{comment}&quot;','hekel aan je reactie &quot;{comment}&quot;','détesté votre commentaire &quot;{comment}&quot;','gefällt dein Kommentar &quot;{comment}&quot;','antipatia tuo commento &quot;{comment}&quot;','N&amp;atilde;o curtiu seu coment&amp;aacute;rio &quot;{comment}&quot;','не нравится ваш комментарий &quot;{comment}&quot;','no le gustaba su comentario &quot;{comment}&quot;','sevilmeyen Yorumunuzu &quot;{comment}&quot;'),(439,'activity_disliked_post','disliked {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','لم يعجب &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;بمنشور&lt;/a&gt; {user} .','hekel {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','détesté {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','unbeliebt {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt; Beitrag &lt;/a&gt;.','antipatia {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','N&amp;atilde;o curtiu {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;post&lt;/a&gt;.','{user} не нравится &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt;пост&lt;/a&gt;.','No me gustó {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt; posterior &lt;/a&gt;.','Sevmediği {user} &lt;a class=&quot;main-color&quot; href=&quot;{post}&quot;&gt; yazılan &lt;/a&gt;.'),(440,'second_button_type','Second post button type','نوع الزر الثاني للمنشور','Tweede post type knop','Deuxième poste de type bouton','Zweiter Likebutton','Secondo palo tipo di pulsante','Segundo tipo de bot&amp;ccedil;o','Второй тип кнопки','Segundo mensaje de tipo botón','İkinci sonrası düğmesi tipi'),(441,'group_name','Group name','إسم المجموعة','Groepsnaam','Nom de groupe','Gruppenname','Nome del gruppo','Nome do grupo','URL группы','Nombre del grupo','Grup ismi'),(442,'group_title','Group title','عنوان المجموعة','Groep titel','Titre de groupe','Gruppentitel','Titolo del gruppo','T&amp;iacute;tulo do grupo','Название группы','Título del Grupo','Grup başlık'),(443,'my_groups','My Groups','مجموعاتي','Mijn Groepen','Mes Groupes','Meine Gruppen','I miei gruppi','Meus grupos','Мои группы','Mis grupos','Gruplar'),(444,'school','School','المدرسة','School','L&#39;école','Schule','Scuola','Escola','Школа','Colegio','Okul'),(445,'site_keywords_help','Example: social, wowonder, social site','Example: social, wowonder, social site','Example: social, wowonder, social site','Example: social, wowonder, social site','Beispiel: soziale, wen-kennt-wer, soziale Website','Esempio: sociale, wowonder, sito di social','Exemplo: social, wowonder, site social','Пример: социальная сеть, pintter, социальный сайт','Ejemplo:, wowonder, sitio social sociales','Örnek: Sosyal, wowonder, sosyal sitesi'),(446,'message_seen','Message Seen','الرسائل المقروئة','Bericht Seen','Vu message','Nachricht gesehen','Messaggio Visto','Mensagem lida','Прочитал@','Mensaje Seen','İleti Seen'),(447,'recommended_for_powerful','Recommended for powerful servers','مستحسن للاسيرفرات القوية','Aanbevolen voor krachtige servers','Recommandé pour les puissants serveurs','Empfohlen für leistungsstarke Server','Consigliato per potenti server','Recomendado para servi&amp;ccedil;os pesados','Рекомендуется для мощных серверов','Recomendado para servidores de gran alcance','Güçlü sunucular için önerilen'),(448,'message_typing','Chat typing system','نظام &quot;يكتب&quot; للشات','Chat typering systeem','Système de typage chat','Chat Typisierungssystem','Sistema di digitazione Chat','Sistema de digita&amp;ccedil;&amp;atilde;o','Набирает сообщение','Sistema de tipificación de Chat','Sohbet yazarak sistemi'),(449,'reCaptcha','reCaptcha','reCaptcha','reCaptcha','reCaptcha','reCaptcha','reCaptcha','reCaptcha','ReCaptcha','reCaptcha','Tuttum'),(450,'instagram','Instagram','الأنستاغرام','Instagram','Instagram','Instagram','Instagram','Instagram','Instagram','Instagram','Instagram'),(451,'profile_visit_notification_help','if you don&#039;t echo your visit event , you won&#039;t be able to see other people visiting your profile.','اذا لم تفعل زيارة الصفحة , فانك لن تكون قادرا على رؤية الاخرين وهم يزورون صفحتك.','als u niet uw bezoek evenement te delen, zult u niet in staat zijn om andere mensen een bezoek aan uw profiel te zien.','si vous ne partagez pas votre événement de la visite, vous ne serez pas en mesure de voir d&#039;autres gens qui visitent votre profil.','Wenn Du Deine Profilbesuche nicht teilen willst, können andere nicht sehen wenn du ihr Profil besucht hast.','se non si condivide il vostro evento visita, non sarà in grado di vedere altre persone che visitano il tuo profilo.','Se voc&amp;ecirc; N&amp;atilde;o abilitar a notifica&amp;ccedil;&amp;atilde;o de perfil, voc&amp;ecirc; N&amp;atilde;o poder&amp;aacute; ver quem visitou seu perfil.','Если отключить это уведомление, вы не будете получать уведомления о том кто посещал ваш профиль.','Si desactivas esta notificación tu tampoco recibirás avisos de visita de otros usuarios.','Eğer ziyaret olayı paylaşmak yoksa, profilinizi ziyaret eden diğer kişileri görmek mümkün olmayacaktır.'),(452,'account_delete','Delete Account','حذف الحساب','Account verwijderen','Effacer le compte','Konto löschen','Eliminare l&#039;account','Deletar conta','Удалить аккаунт','Borrar cuenta','Hesabı sil'),(453,'ip_address','IP Address','IP عنوان','IP Address','Adresse IP','IP Adresse','Indirizzo IP','Endere&amp;ccedil;o IP','Айпи адрес','Dirección IP','IP adresi'),(454,'manage_groups','Manage Groups','إدارة المجموعات','Groepen beheren','Gérer les groupes','Gruppen verwalten','Gestisci gruppi','Editar grupos','Управление группами','Administrar grupos','Grupları Yönet'),(455,'group_delete_confirmation','Are you sure you want to delete this group?','هل أنت متأكد أنك تريد حذف هذه المجموعة؟','Bent u zeker dat u deze groep wilt verwijderen?','Êtes-vous sûr de vouloir supprimer ce groupe?','Bist Du sicher das Du diese Gruppe löschen möchtest?','Sei sicuro di voler eliminare questo gruppo?','Deletar este grupo?','Вы уверены, что хотите удалить эту группу?','¿Seguro que quieres borrar este grupo?','Bu grubu silmek istediğinizden emin misiniz?'),(456,'no_more_groups','No more groups to show','لا يوجد المزيد من المجموعات','Geen groepen tonen','Pas de plusieurs groupes pour montrer','Keine weiteren Gruppen,','Nessun altro gruppo per mostrare','Nenhum grupo para mostrar','Нет больше групп для отображения','No hay más grupos que mostrar','Artık gruplar göstermek için'),(457,'show_more_groups','Show more groups','عرض المزيد من المجموعات','Toon meer groepen','Montrer plus de groupes','Mehrere Gruppen anzeigen','Mostra più gruppi','Mostrar mais grupos','Показать больше групп','Mostrar más grupos','Daha fazla gruplar göster'),(458,'members','Members','أفراد','leden','Membres','Mitglieder','Utenti','Membros','члены','Miembros','Üyeler'),(459,'verifications_requests','Verification Requests','طلبات الحسابات المؤكدة','Verificatie Verzoeken','Demandes de vérification','Verifizierungsanfragen','Richieste di verifica','Pedidos de verifica&amp;ccedil;&amp;atilde;o','Запросы','Solicitudes verificación','Doğrulama İstekleri'),(460,'verify','Verify','تأكيد','Verifiëren','Vérifier','Überprüfen','Verificare','Verificar','Добавить','Verificar','Doğrulamak'),(461,'ignore','Ignore','تجاهل','Negeren','Ignorer','Ignorieren','Ignorare','Ignorar','Игнорировать','Ignorar','Ignore'),(462,'page','Page','صفحة','Pagina','Page','Seite','Pagina','P&amp;aacute;gina','Страница','Página','Sayfa'),(463,'no_new_verification_requests','No new verification requests','لا يوجد طلبات جديدة للتحقق','Geen nieuwe verificatie aanvragen','Aucune nouvelle demande de vérification','Keine neuen Verifizierungsanfragen','Non ci sono nuove richieste di verifica','Nenhum pedido de verifica&amp;ccedil;&amp;atilde;o','Нет новых запросов','No hay nuevas solicitudes de verificación','Yeni doğrulama istekleri'),(464,'ban_user','Ban User','حظر العضو','Ban gebruiker','Ban User','Gesperrte Benutzer','Ban utente','Banir usu&amp;uacute;rio','Забанить','Ban usuario','Ban User'),(465,'banned','Banned','المحظور','Verboden','Banned','Verboten','Vietato','Banido','Забанен','Banned','Yasaklı'),(466,'there_are_no_banned_ips','There are no banned ips.','لا يوجد ips محطورة','Er zijn geen verboden ips.','Il n&#39;y a pas ips interdits.','Es sind keine gesperrte IPs.','Non ci sono ips vietati.','Nenhum IP banido.','Нет забаненных IPS.','No hay ips prohibidas.','Hiçbir yasak ips bulunmamaktadır.'),(467,'invalid_ip','Invalid ip address.','عنوان IP غير صالح.','Ongeldig IP-adres.','Adresse IP non valide.','Ungültige IP-Adresse.','Indirizzo IP non valido.','IP inv&amp;aacute;lido.','Неверный IP адрес.','Dirección IP no válida.','Geçersiz IP adresi.'),(468,'ip_banned','IP address successfully banned.','عنوان IP حظرت بنجاح.','IP-adres succesvol verbannen.','Adresse IP banni avec succès.','IP-Adresse erfolgreich verboten.','Indirizzo IP vietato con successo.','IP banido.','IP-адрес успешно забанен.','Dirección IP prohibida éxito.','IP adresi başarıyla yasaklandı.'),(469,'ip_exist','IP address already exist','عنوان IP موجودة بالفعل','IP-adres bestaan','Adresse IP existent déjà','Bereits vorhanden IP-Adresse','Indirizzo IP già esistente','J&amp;aacute; existe este IP','IP-адрес уже существует','Dirección IP ya existen','IP adresi zaten mevcut'),(470,'please_add_ip','Please add an ip address','يرجى إضافة عنوان IP','Voeg een ip-adres','S&#39;il vous plaît ajouter une adresse ip','Bitte füge eine IP-Adresse hinzu','Si prega di aggiungere un indirizzo IP','Adicione um IP','Пожалуйста, добавьте IP адрес','Por favor, añada una dirección IP','Bir ip adresinizi ekleyiniz'),(471,'ip_deleted','IP address successfully deleted','عنوان IP حذف بنجاح','IP-adres succesvol verwijderd','Adresse IP supprimé avec succès','IP-Adresse erfolgreich gelöscht','Indirizzo IP eliminato','IP deletado','IP-адрес успешно удален','Dirección IP eliminado correctamente','IP adresi başarıyla silindi'),(472,'email_me_when','Email me when','أرسل لي عندما','E-mail me als','Envoyez-moi lorsque','Email-Bnachrichtigung, wenn:','Inviami una email quando','Enviar e-mail quando algu&amp;eacute;m','Напишите, когда','Envíame un email:','Bana e-posta'),(473,'e_likes_my_posts','Someone liked my posts','شخص اعجب بمنشوري','Iemand hield van mijn berichten','Quelqu&#39;un aimait mes messages','Jemand wundert sich über meinen Beitrag','Qualcuno è piaciuto miei post','Curtir meus posts','Нравятся мои заметки','Cuando a alguien le gusta mis posts','Birisi Mesajları sevdim'),(474,'e_wondered_my_posts','Someone wondered my posts','شخص تعجب بمنشوري','Iemand vroeg me af van mijn berichten','Quelqu&#39;un demanda mes messages','Jemand mag meine Beiträge nicht','Qualcuno chiese miei post','Dar dislike em meus posts','Не нравятся мои заметки','Cuando alguien pregunta en mis posts','Birisi Mesajları merak'),(475,'e_commented_my_posts','Someone commented on my posts','شخص علق على منشوراتي','Iemand heeft gereageerd op mijn berichten','Quelqu&#39;un a commenté mes messages','Jemand kommentiert meine Beiträge','Qualcuno ha commentato i miei post','Comentar meus posts','Прокомментировали мои заметки','Cuando alguien comenta mis posts','Birisi benim mesajlar yorumladı'),(476,'e_shared_my_posts','Someone echoed on my posts','شخص شارك منشوراتي','Iemand gedeeld op mijn berichten','Quelqu&#039;un partagé sur mes posts','Jemand teilt meine Beiträge','Qualcuno ha condiviso i miei post','Compartilhar meus posts','Поделились моими заметками','Cuando alguien comparte mis posts','Birisi benim yazılarda paylaştı'),(477,'e_followed_me','Someone followed me','شخص تابعني','Iemand volgde mij','Quelqu&#39;un m&#39;a suivi','Jemand folgt mir','Qualcuno mi ha seguito','Me seguir','Следуют за мной','Cuando alguien me sigue','Biri beni takip'),(478,'e_liked_page','Someone liked my pages','شخص أعجب بصفحة خاصة بي','Iemand hield van mijn pagina&#039;s','Quelqu&#39;un aimait mes pages','Jemand gefällt meine Seiten','Qualcuno è piaciuto mie pagine','Curtir minha p&amp;aacute;gina','Нравится моя страница','Cuando a alguien le gusta mis páginas','Birisi sayfalarını sevdim'),(479,'e_visited_my_profile','Someone visited my profile','شخص زار صفحتي الشخصية','Iemand bezocht mijn profiel','Quelqu&#39;un a visité mon profil','Jemand hat mein Profil besucht','Qualcuno ha visitato il mio profilo','Visitar meu perfil','Посетили мой профиль','Cuando alguien ha visitó mi perfil','Birisi profilimi ziyaret'),(480,'e_mentioned_me','Someone mentioned me','شخص ذكرني','Iemand noemde me','Quelqu&#39;un a parlé de moi','Jemand erwähnte mich','Qualcuno mi ha detto','Te mencionar','Упомянули меня','Cuando alguien me menciona','Biri bana söz'),(481,'e_joined_group','Someone joined my groups','شخص انضم الى مجموعاتي','Iemand trad mijn groepen','Quelqu&#39;un a rejoint mes groupes','Jemand ist meiner Gruppe beigetreten','Qualcuno è entrato miei gruppi','Entrar no meu grupo','Вступили в мою группу','Cuando alguien se une a mis grupos','Birisi grupları katıldı'),(482,'e_accepted','Someone accepted my friend/follow requset','شخص قبل طلب صادقتي/متابعتي','Iemand aanvaard mijn vriend / follow verzoek','Quelqu&#39;un a accepté mon ami / suivre la demande','Jemand akzeptiert mein Freundschaftsanfrage','Qualcuno ha accettato il mio amico / seguire la richiesta','Aceitar o meu pedido para seguir/adicionar aos amigos','Приняли дружбу / запрос следовать','Cuando alguien acepta mi petición','Birisi arkadaşım / takip et requset kabul'),(483,'e_profile_wall_post','Someone posted on my timeline','شخص نشر على صفحتي الشخصية','Iemand gepost op mijn timeline','Quelqu&#39;un a posté sur mon calendrier','Jemand hat etwas in mein Profil geschrieben','Qualcuno ha postato su mia timeline','Postar em sua linha do tempo','Публикация на стене профиля','Cuando alguien escribe en mi muro','Birisi benim zaman çizelgesi yayınlanan'),(484,'no_groups_found','No groups found','لا يوجد مجموعات','Geen groepen gevonden','Pas de groupes trouvés','Keine Gruppen gefunden','Nessun gruppo trovato','Nenhum grupo encontrado','Группы не найдены','No se encontraron grupos','Grup bulunamadı'),(485,'group_information','Group information','معلومات المجموعة','Groep informatie','L&#39;information de groupe','Gruppenthemen','Informazioni Gruppo','Informa&amp;ccedil;&amp;otilde;es do grupo','Информация о группе','Información del Grupo','Grup bilgileri'),(486,'delete_group','Delete Group','حذف المجموعة','Groep verwijderen','Supprimer le groupe','Gruppe löschen','Elimina gruppo','Deletar grupo','Удалить группу','Eliminar grupo','Grubu Sil'),(487,'group_name_exists','Group name is already exists.','اسم المجموعة موجود بالفعل.','Groepsnaam is al bestaat.','Le nom du groupe est existe déjà.','Gruppenname ist bereits vorhanden.','Il nome del gruppo è già esistente.','Nome do grupo j&amp;aacute; esta em uso.','Название группы уже существует.','El nombre del grupo es ya existe.','Grup adı zaten var olduğunu.'),(488,'group_name_invalid_characters','Invalid group name characters','أحرف اسم مجموعة غير صالحة','Ongeldige naam van de groep tekens','Invalides nom de groupe caractères','Ungültige Gruppenname Zeichen','Caratteri del nome del gruppo non validi','Caracteres inv&amp;aacute;lidos','Недопустимые символы в URL группы','Caracteres del nombre de grupo no válido','Geçersiz grup adı karakter'),(489,'group_name_characters_length','Group name must be between 5 / 32','يجب أن يكون اسم المجموعة بين 5/32 حرف','Groepsnaam moet tussen 5/32','Le nom du groupe doit être comprise entre 5/32','Gruppenname muss zwischen 5 und 32 Zeichen bestehen','Il nome del gruppo deve essere compresa tra 5/32','O nome do grupo deve conter entre 5 / 32 caracteres','URL группы должен быть между 5/32 символами','Nombre del grupo debe estar entre 5/32','Grup ismi 5/32 arasında olmalıdır'),(490,'no_requests_found','No requests found!','لم يتم العثور على أية طلبات!','Geen verzoeken gevonden!','Aucune demande trouvée!','Keine Anfragen gefunden!','Nessuna richiesta trovata!','Não foram encontrados pedidos!','Запросов не найдено!','No se han encontrado solicitudes!','İstek bulunamadı!'),(491,'remove','Remove','إزالة','Verwijderen','Enlever','Entfernen','Rimuovere','Remover','Удалить','Eliminar','Kaldır'),(492,'no_members_found','No members found','لم يتم العثور على أي أعضاء ','Er zijn geen leden gevonden','Aucun membre trouvé','Keine Mitglieder gefunden','Nessun membro trovato','Nenhum membro encontrado','Участники не найдены','No se encontraron miembros','Üye bulunamadı'),(493,'group_deleted','Group successfully deleted','تم حذف المجموعة بنجاح','Groep succesvol verwijderd','Groupe supprimé avec succès','Gruppe erfolgreich gelöscht','Gruppo cancellato con successo','Grupo deletado','Группа успешно удалена','Grupo eliminado correctamente','Grup başarıyla silindi'),(494,'create_new_group','Create New Group','إنشاء مجموعة جديدة','Nieuwe groep','Créer un nouveau groupe','Neue Gruppe erstellen','Crea nuovo gruppo','Criar novo grupo','Создать новую группу','Crear nuevo grupo','Yeni Grup Oluştur'),(495,'my_games','My Games','ألعابي','Mijn games','Mes Jeux','Meine Spiele','I miei giochi','Meus jogos','Мои игры','Mis juegos','Benim Oyunlar'),(496,'no_games_found','No games found','لم يتم العثور على ألعاب','Geen games gevonden','Pas de jeux trouvés','Keine Spiele gefunden','Nessun gioco trovato','Nenhum jogo encontrado','Игры не найдены','No se han encontrado juegos','Hiçbir oyun bulunamadı'),(497,'groups','Groups','المجموعات','Groepen','Groupes','Gruppen','Gruppi','Grupos','Группы','Grupos','Gruplar'),(498,'no_friends','No friends yet','ليس لديه أصدقاء حتى الآن','Nog geen vriendent','Pas encore d&#39;amis','Noch keine Freunde','Non ci sono ancora amici','Nenhum amigo','Нет друзей','No tiene amigos todavía','Hiç arkadaşım yok'),(499,'no_groups','Didn&#039;t join any groups yet','لم ينضم أي مجموعة حتى الآن','Heeft een groep nog niet mee','N&#39;a pas encore de rejoindre les groupes','Hat noch keiner Gruppe beigetreten','Non ha ancora aderire a nessun gruppo','N&amp;atilde;o entrou em nenhum grupo','Не вступать ни в какие группы','No unirse a ningún grupo todavía','Henüz hiçbir gruba katılmadı'),(500,'load_more_pages','Load more pages','تحميل المزيد من الصفحات','Laad meer pagina&#039;s','Chargez plus de pages','Weitere Seiten laden','Caricare più pagine','Carregar mais p&amp;aacute;ginas','Загрузить больше страниц','Cargar más páginas','Daha fazla sayfaları yük'),(501,'load_more_groups','Load more groups','تحميل المزيد من المجموعات','Laad meer groepen','Chargez plusieurs groupes','Weitere Gruppen laden','Carica altri gruppi','Carregar mais grupos','Загрузить больше групп','Cargar más grupos','Daha fazla gruplar yükle'),(502,'joined_group','Joined your group ({group_name})','إنضم الى مجموعتك ({group_name})','Toegetreden tot de groep ({group_name})','Rejoint notre groupe ({group_name})','ist deiner Gruppe ({group_name}) beigetreten','Iscritto il nostro gruppo ({group_name})','Entrou no seu grupo ({group_name})','вступил@ в ({group_name})','Se ha unido a tu grupo ({group_name})','Kayıt grup ({group_name})'),(503,'happy','Happy','السعادة','Blij','Heureux','glücklich','Contento','Feliz','Счастливый','Feliz','Mutlu'),(504,'loved','Loved','الحب','Hield','Aimé','begeistert','Amato','Apaixonado','Влюбленный','Me encantaron','Sevilen'),(505,'sad','Sad','الحزن','Verdrietig','Triste','traurig','Triste','Triste','Грустный','Triste','Üzücü'),(506,'so_sad','Very sad','الحزن الشديد','Zeer triest','Très triste','sehr traurig','Molto triste','Muito triste','Очень грустный','Muy triste','Çok üzgün'),(507,'angry','Angry','الغضب','Boos','En colère','verärgert','Arrabbiato','Bravo','Злой','Enfadado','Öfkeli'),(508,'confused','Confused','الحيرة','Verward','Confus','verwirrt','Confuso','Confuso','В замешательстве','Confuso','Şaşkın'),(509,'smirk','Hot','ساخن','Warm','Chaud','Heiß','Caldo','Sexy','Горячий','Caliente','Sıcak'),(510,'broke','Broken','الاحباط','Gebroken','Brisé','am Boden zerstört','Rotte','Tra&amp;iacute;do','Сломанный','Roto','Broken'),(511,'expressionless','expressionless','مستغرب','Wezenloos','Inexpressif','ausdruckslos','Inespressivo','Sem express&amp;atilde;o','Без выражений','inexpresivo','ifadesiz'),(512,'cool','Cool','الروعة','Koel','Bien','cool','Bene','Legal','Круто','Guay','Güzel'),(513,'funny','Funny','الضحك','Grappig','Amusant','komisch','Divertente','Divertido','Веселая','Divertido','Komik'),(514,'tired','Tired','التعب','Moe','Fatigué','müde','Stanco','Cansado','Устала','Cansado','Yorgun'),(515,'lovely','Lovely','محب','Heerlijk','Charmant','sehr verliebt','Bello','Amavel','Прекрасный','Encantador','Güzel'),(516,'blessed','Blessed','المنحة','Gezegend','Béni','gesegnet','Benedetto','AbeN&amp;atilde;oado','Благословенный','Bendito','Mübarek'),(517,'shocked','Shocked','الصدمة','Geschokt','Choqué','schockiert','Scioccato','Chocado','В шоке','Conmocionado','Şokta'),(518,'sleepy','Sleepy','النعاس','Slaperig','Somnolent','schläfrig','Assonnato','Dormindo','Сонный','Soñoliento','Uykulu'),(519,'pretty','Pretty','الجمال','Mooi','Assez','hübsch','Bella','Bonito','Милая','bastante','Oldukça'),(520,'bored','Bored','الملل','Verveeld','Ennuyé','gelangweilt','Annoiato','Entediado','Скучающий','aburrido','Bıkkın'),(521,'total_users','Total Users','كل المستخدمين','Totaal aantal leden','Nombre d&#39;utilisateurs','Benutzer insgesamt','Totale Utenti','Total de usu&amp;uacute;rios','Всего пользователей','Total de usuarios','Toplam Kullanıcılar'),(522,'users','Users','المستخدمين','Gebruikers','Utilisateurs','Benutzer','Utenti','Usu&amp;uacute;rios','Пользователи','Usuarios','Kullanıcılar'),(523,'pages','Pages','الصفحات','Pagina&#039;s','Pages','Seiten','Pagine','P&amp;aacute;ginas','Страницы','Páginas','Sayfalar'),(524,'games','Games','الألعاب','Spelen','Jeux','Spiele','Giochi','Jogos','Игры','Juegos','Oyunlar'),(525,'online_users','Online Users','المستخدمين المتصلين','Online Gebruikers','Utilisateurs en ligne','User online','Utenti Online','Usu&amp;uacute;rios online','Сейчас на сайте','Usuarios en línea','Çevrimiçi Kullanıcılar'),(526,'recent_searches','Recent Searches','عمليات البحث الأخيرة','Recente zoekopdrachten','Recherches récentes','Letzte Suche','Ricerche recenti','Procuras recentes','Последние поисковые запросы','Búsquedas recientes','Son aramalar'),(527,'clear','Clear','مسح','Duidelijk','Clair','Klar','Chiaro','Limpar','Очистить','Claro','Açık'),(528,'search_filter','Search filter','البحث المتقدم','Search filter','Filtre de recherche','Suchfilter','Filtro di ricerca','Filtro de pesquisa','Фильтр поиска','Filtro de búsqueda','Arama filtresi'),(529,'keyword','Keyword','الكلمة','Zoekfilter','Mot-clé','Stichwort','Parola chiave','Palavra-chave','Ключевое слово','Palabra clave','Kelime'),(530,'what_are_looking_for','What are looking for ?','عن ماذا تبحث؟','Wat zoekt?','Que cherchez?','Was suchst du?','Quello che sono in cerca di ?','O que voc&amp;ecirc; esta procurando ?','Что вы ищете?','¿Que están buscando ?','Ne arıyorsun?'),(531,'changed_profile_cover_picture_male','Changed his profile cover','غير صورة الغلاف الخاص به','Veranderd zijn profiel deksel','Changé sa couverture de profil','hat sein Titelbild geändert','Cambiato la sua copertura del profilo','Trocou sua capa de perfil','Сменил обложку','Cambió su foto de perfil','Onun profil kapağı Değiştirildi'),(532,'changed_profile_cover_picture_female','Changed her profile cover','غيرت صورة الغلاف الخاصة بها','Veranderde haar profiel deksel','Changé son profil couvercle','hat ihr Titelbild geändert','Cambiato suo profilo baiar','Trocou sua capa de perfil','Сменила обложку','Cambió su foto de perfil','Onun profil kapağı Değiştirildi'),(533,'latest_games','Latest games','آخر الألعاب','Nieuwste games','Derniers jeux','Neueste Spiele','Ultimi giochi','Jogos novos','Последние игры','Últimos Juegos','Son Eklenen Oyunlar'),(534,'no_albums_found','No albums found','لا يوجد البومات','Geen albums gevonden','Aucun album n&#39;a été trouvé','Kein Album gefunden','Nessun album trovato','Nenhum &amp;aacute;lbum encontrado','Альбомов не найдено','No hay álbumes encontrados','Albüm bulunamadı'),(535,'create_album','Create album','إنشاء ألبوم','Maak een album','Créer un album','Album erstellen','Creare album','Criar &amp;aacute;lbum','Создать альбом','Crear albúm','Albüm oluştur'),(536,'my_albums','My Albums','البوماتي','Mijn Albums','Mes albums','Meine Alben','I miei album','Meus &amp;aacute;lbuns','Мои альбомы','Mis álbumes','Albümlerim'),(537,'album_name','Album name','اسم الالبوم','Albumnaam','Nom de l&#39;album','Name des Albums','Nome album','Nome do &amp;aacute;lbum','Название альбома','Nombre del álbum','Albüm adı'),(538,'upload','Upload','رفع','Uploaden','Télécharger','Hochladen','Caricare','Carregar','Загрузить','Subir','Yükleme'),(539,'add_photos','Add photos','إضافة صور','Foto&#039;s toevoegen','Ajouter des photos','Fotos hinzufügen','Aggiungi foto','Adicionar fotos','Добавить фотографии','Agregar fotos','Fotoğraf ekle'),(540,'replies','Replies','ردود','Antwoorden','Réponses','Antworten','risposte','Respostas','Ответы','Respuestas','Cevaplar'),(541,'reply_to_comment','Reply to comment','ردعلى التعليق','Reageer op reactie','Répondre au commentaire','Auf Kommentar antworten','Rispondi al commento','Responder o coment&amp;aacute;rio','Ответить на комментарий','Responder al comentario','Yorumu yanıtla'),(542,'replied_to_comment','replied to your comment &quot;{comment}&quot;','رد على تعليقك &quot;{comment}&quot;','beantwoord je reactie &quot;{comment}&quot;','répondu à votre commentaire &quot;{comment}&quot;','hat auf Deinen Kommentar geantwortet &quot;{comment}&quot;','Risposto al tuo commento &quot;{comment}&quot;','respondeu seu coment&amp;aacute;rio &quot;{comment}&quot;','ответил@ на ваш комментарий &quot;{comment}&quot;','respondió a tu comentario &quot;{comment}&quot;','Yorumlarınız yanıtladı &quot;{comment}&quot;'),(543,'comment_reply_mention','mentioned you in a reply &quot;{comment}&quot;','ذكرك في رد على تعليق &quot;{comment}&quot;','je genoemd in een antwoord &quot;{comment}&quot;','vous avez mentionné dans une réponse &quot;{comment}&quot;','hat dich in einer Antwort erwähnt &quot;{comment}&quot;','ti ha menzionato in una risposta &quot;{comment}&quot;','mencionou voc&amp;ecirc; em uma resposta &quot;{comment}&quot;','упомянул@ вас в комментарии &quot;{comment}&quot;','te ha mencionado en una respuesta &quot;{comment}&quot;','bir cevapta sizden bahsetti &quot;{comment}&quot;'),(544,'also_replied','replied to the comment &quot;{comment}&quot;','رد على التعليق &quot;{comment}&quot;','antwoordde op de reactiefeed &quot;{comment}&quot;','répondu au commentaire &quot;{comment}&quot;','hat auf den Kommentar zurück kommentiert &quot;{comment}&quot;','risposto al commento &quot;{comment}&quot;','respondeu o coment&amp;aacute;rio &quot;{comment}&quot;','ответил@ на комментарий &quot;{comment}&quot;','respondió al comentario &quot;{comment}&quot;','yorumuna cevap verdi, &quot;{comment}&quot;'),(545,'liked_reply_comment','liked your reply &quot;{comment}&quot;','أعجب بردك &quot;{comment}&quot;','vond uw antwoord &quot;{comment}&quot;','aimé votre réponse &quot;{comment}&quot;','gefält deine Antwort &quot;{comment}&quot;','piaciuto vostra risposta &quot;{comment}&quot;','curtiu sua resposta &quot;{comment}&quot;','понравился ваш ответ &quot;{comment}&quot;','gustado su respuesta &quot;{comment}&quot;','Cevabınızı &quot;{comment}&quot; sevdi'),(546,'wondered_reply_comment','wondered your reply &quot;{comment}&quot;','تعجب بردك &quot;{comment}&quot;','afgevraagd uw antwoord &quot;{comment}&quot;','demandé votre réponse &quot;{comment}&quot;','wundert sich über deine Antwort &quot;{comment}&quot;','wondered la tua risposta &quot;{comment}&quot;','n&amp;atilde;o curtiu sua resposta &quot;{comment}&quot;','Не нравится ваш ответ &quot;{comment}&quot;','preguntó su respuesta &quot;{comment}&quot;','Cevabınızı &quot;{comment}&quot; merak'),(547,'disliked_reply_comment','disliked your reply &quot;{comment}&quot;','لم يعجب بردك &quot;{comment}&quot;','hekel aan uw antwoord &quot;{comment}&quot;','détesté votre réponse &quot;{comment}&quot;','gefällt deine Antwort &quot;{comment}&quot;','non amava la sua risposta &quot;{comment}&quot;','n&amp;atilde;o curtiu sua resposta &quot;{comment}&quot;','Не нравится ответ &quot;{comment}&quot;','no le gustaba su respuesta &quot;{comment}&quot;','Cevabınızı &quot;{comment}&quot; sevmiyordu'),(548,'profile_visit_notification_p','Send users a notification when i visit their profile?','إرسال المستخدمين إخطارا عندما أقوم بزيارة صفحته الشخصية؟','Stuur gebruikers een melding wanneer ik bezoek hun profiel?','Envoyer utilisateurs une notification lorsque je visite son profil?','Benutzern eine Benachrichtigung senden, wenn ich ihr Profil besucht habe?','Inviare agli utenti una notifica durante la mia visita il loro profilo?','Enviar notifica&amp;ccedil;&amp;atilde;o para usu&amp;uacute;rios quando visitar o perfil?','Отправлять пользователям уведомления, когда я посещаю их профили?','¿Enviar a los usuarios aviso de visita?','Ben kendi profilini ziyaret ettiğinizde kullanıcılara bir bildirim gönder?'),(549,'showlastseen_help','if you don&#039;t echo your last seen , you won&#039;t be able to see other people last seen.','اذا لم تشارك اخر ظهور لك , فانك لن تكون قادرا على رؤية اخر ظهور المستخدمين.','als je het niet eens met je voor het laatst gezien, zult u niet in staat zijn om andere mensen het laatst gezien.','si vous ne partagez pas votre dernière fois, vous ne serez pas en mesure de voir d&#039;autres personnes la dernière fois.','wenn du nicht teilen willst was du dir als letztes angesehen hast, kannst Du auch nicht sehen was andere sich angesehen haben.','se non si condivide il visto l&#039;ultima volta, non sarà in grado di vedere altre persone visto l&#039;ultima volta.','Se voc&amp;ecirc; N&amp;atilde;o compartilhar a &amp;uacute;ltima vez que voc&amp;ecirc; foi visto, voc&amp;ecirc; tamb&amp;eacute;m N&amp;atilde;o poder&amp;aacute; ver a ultima vez que os outros usu&amp;uacute;rios foram vistos.','Если отключить это уведомление, вы не сможете видеть последнее подключение других пользователей..','Si desactivas esta notificación tu tampoco podrás ver la conexión de otros usuarios.','Eğer son görüldüğü paylaşmak yoksa, son görüldüğü diğer insanları görmek mümkün olmayacaktır.'),(550,'timeline_birthday_label','Who can see my birthday?','من يمكنه رؤية تاريخ ميلادي؟','Wie kan mijn verjaardag zien?','Qui peut voir mon anniversaire?','Wer kann mein Geburtstag sehen?','Chi può vedere il mio compleanno?','Quem pode ver a data do meu anivers&amp;aacute;rio?','Кто может видеть мой день рождения?','¿Quién puede ver mi cumpleaños?','Kim benim doğum günüm görebilir?'),(551,'people_likes_this','people like this','مستخدم معجبين بهذا','mensen vinden dit leuk','personnes aiment ce','„Gefällt mir“ Angaben','persone piace questo','pessoas gostaram disso','Нравится','Me gusta','Bu gibi insanlar'),(552,'page_inviate_label','Invite friends to like this Page','إدعو أصدقائك للإجاب بهذه الصفحة','Vrienden uitnodigen om deze pagina graag','Inviter des amis à aimer cette page','Freunde einladen, denen diese Seite gefallen könnte','Invita gli amici a piacere questa Pagina','Convidar pessoas para curtir essa p&amp;aacute;gina','Пригласить друзей','Invitar amigos','Sayfaya sevmeye arkadaşlarınızı davet edin'),(553,'invite_your_frineds','Invite your friends/followers','إدعوا اصدقائك/متابعينك','Nodig je vrienden / volgelingen','Invitez vos amis / followers','Laden Sie Ihre Freunde / Follower','Invita i tuoi amici / seguaci','Convidar seus amigos/seguidores','Пригласить друзей','Invita a tus amigos / seguidores para ver si les gusta esto','Arkadaşların / takipçileri davet'),(554,'not_invite','You don&#039;t have any more friends to invite','لا يوجد المزيد للدعوة','U hoeft niet meer vrienden uitnodigen','Vous ne disposez pas d&#39;autres amis à inviter','Du hast keine weiteren Freunde eingeladen','On avete più amici per invitare','Voc&amp;ecirc; j&amp;aacute; convidou todos seus amigos','У Вас нет друзей, чтобы пригласить','No tienes más amigos que invitar...','Davet etmek artık arkadaş yok'),(555,'invite','Invite','إدعو','Nodigen','Invitez','Einladen','Invitare','Convidar','Пригласить','Invitación','Davet etmek'),(556,'invited_page','invited you to like ({page_name})','دعاك للاعجاب بل الصفحة ({page_name})','u uitgenodigd om te willen ({page_name})','vous invite à aimer ({page_name})','Ich möchte dich gerne zu ({page_name}) einladen','invitato a piacere ({page_name})','Convidou voc&amp;ecirc; para curtir ({page_name})','предлагает вам отметить страницу ({page_name}) как понравившуюся','te invito para ver si te gusta ({page_name})','Hoşunuza davet etti ({page_name})'),(557,'accepted_invited_page','accepted your request to like ({page_name})','قبل دعوتك للإجاب ب ({page_name})','aanvaard uw verzoek te willen ({page_name})','accepté votre demande d&#39;aimer ({page_name})','Deine Beitrittsanfrage für die Seite ({page_name}) wurde genehmigt','accettato la richiesta di piacere ({page_name})','aceitou sua solicita&amp;ccedil;&amp;atilde;o para curtir ({page_name})','принял@ ваше приглашение в ({page_name})','acepto tu invitación a ({page_name})','İsteğiniz sevmeye kabul edilir ({page_name})'),(558,'call_to_action','Call to action','Call to action','Oproep tot actie','Appel à l&#39;action','Was möchtest du tun?','Chiamare all&#039;azione','Ligar a&amp;ccedil;&amp;atilde;o','Призыв к действию','Llamar a la acción','Eylem çağrısı'),(559,'call_to_action_target','Call to target url','Call to target url','Bellen om url richten','Appel à l&#39;URL cible','Rufe das URL-Ziel auf','Chiama per indirizzare url','Ligar a uma URL definida','Введите URL сайта','Insertar url','Url hedef Çağrı'),(560,'call_action_type_url_invalid','Call to action website is invalid','Call to action website is invalid','Oproep tot actie website is ongeldig','Appel à l&#39;action est site de invalide','Es besteht Handlungsbedarf, Website ist ungültig','Chiama per il sito di azione non è valido','Website inv&amp;aacute;lido','Неправильный URL','Llamado a la página web de acción no es válido','Eylem web Çağrı geçersiz'),(561,'avatar_and_cover','Avatar &amp; Cover','الصورة الشخصية والغلاف','Avatar &amp; Cover','Avatar &amp; Cover','Profil- und Titelbild','Avatar &amp; Coprire','Avatar &amp; Capa','Аватар и обложка','Avatar y Fondo','Avatar &amp; Kapak'),(562,'online_sidebar_admin_label','Enable online users to show active users in sidebar.','مكن لإظهار المستخدمين النشطين في الشريط الجانبي.','Toelaten online gebruikers actieve gebruikers te laten zien in de zijbalk.','Permettre aux utilisateurs en ligne pour montrer aux utilisateurs actifs dans la barre latérale.','Aktivieren Internetuser zu aktiven Nutzern in Seitenleiste zeigen.','Abilita utenti per mostrare agli utenti attivi in sidebar.','Permitir que usu&amp;uacute;rios vizualizem os usu&amp;uacute;rios ativos na sidebar.','Включить онлайн-пользователей, показать активных пользователей в боковой панели.','Permita que los usuarios en línea para usuarios activos mostrar en la barra lateral.','Kenar çubuğundaki aktif kullanıcıya göstermek için çevrimiçi kullanıcıları etkinleştirin.'),(563,'not_active','Not active','غير فعال','Niet actief','Pas actif','Nicht aktiv','Non attivo','Não ativo','Не активен','No activo','Aktif değil'),(564,'females','Females','الإناث','Niet geactiveerd','Femmes','Frauen','Femmine','Mulheres','Женщины','Las hembras','Dişiler'),(565,'males','Males','الذكور','Mannetjes','Les mâles','Männlich','Maschi','Homens','Мужчины','Los machos','Erkekler'),(566,'dashboard','Dashboard','اللوحة الرئيسية','Dashboard','Tableau de bord','Übersicht','Cruscotto','Painel','Информационная панель','Tablero de instrumentos','Dashboard'),(567,'albums','Albums','الألبومات','Albums','Albums','Alben','Albums','&amp;aacute;lbuns','Альбомы','Álbumes','Albümler'),(568,'name','Name','الإسم','Naam','Prénom','Name','Nome','Nome','Имя','Nombre','Isim'),(569,'players','Players','اللاعبين','Spelers','Des joueurs','Spieler','Giocatori','Jogadores','Игроки','Jugadores','Oyuncular'),(570,'add_new_game','Add New Game','إضافة لعبة جديدة','Voeg een nieuwe game','Ajouter un nouveau jeu','Neues Spiel hinzufügen','Aggiungi nuovo gioco','Adicionar um novo jogo','Добавить новую игру','Añadir Nuevo Juego','Yeni Oyun Ekle'),(571,'game_added','Game added','تم الإضافة بنجاح','Spel toegevoegd','jeu ajouté','Spiel hinzugefügt','Gioco aggiunto','Jogo adicionado','Игра добавлена','Juego añadió','Oyun eklendi'),(572,'url_not_supported_game','This url is not supported','هذا الرابط غير مدعوم','Deze url wordt niet ondersteund','Cet URL est pas pris en charge','Diese URL wird nicht unterstützt','Questo URL non è supportata','URL inv&amp;aacute;lida','Этот URL-адрес не поддерживается','Esta url no es compatible','Bu url desteklenmiyor'),(573,'please_add_a_game','Please add a game url','يرجى إضافة رابط لعبة','Voeg dan een spel url','S&#39;il vous plaît ajouter une url de jeu','Bitte füge ein Spiel hinzu','Si prega di aggiungere un URL di gioco','Please add a game url','Пожалуйста, добавьте игру URL','Por favor, añada una url juego','Bir oyun url ekleyin'),(574,'active_announcements','Active announcements','إعلانات نشطة','actieve aankondigingen','Annonces actives','Aktive Ankündigungen','Annunci attivi','Avisos ativos','Активные объявления','Anuncios activos','Aktif duyurular'),(575,'inactive_announcements','Inactive announcements','إعلانات غير نشطة','inactief aankondigingen','Annonces inactifs','Inaktive Ankündigungen','Annunci inattivi','Avisos in&amp;aacute;tivos','Неактивные объявления','Anuncios inactivos','Etkin olmayan duyurular'),(576,'ban','Ban','حظر','Ban','Ban','Verbot','Bandire','Ban','Запрет','Prohibición','Yasak'),(577,'new_email','New E-mail','رسالة جديدة','Nieuwe E-mail','Nouveau E-mail','Neue Email','Nuova Email','Novo e-mail','Новый E-mail','Nuevo Email','Yeni e-posta'),(578,'html_allowed','Html allowed','ال html مسموح','Html toegestaan','HTML autorisée','HTML erlaubt','Html permesso','HTML permitida','HTML разрешено','Html permitido','Html izin'),(579,'send_me_to_my_email','Send to my email','ارسل الى بريدي الالكتروني','Stuur naar mijn e-mail','Envoyer à mon e-mail','An meine Emailadresse senden','Invia alla mia email','Enviar para o meu email','Отправить на мою электронную почту','Enviar a mi correo electrónico','Benim e-posta gönder'),(580,'test_message','Test message','جرب الراسلة أولا','Test bericht','Message test','Testnachricht','Messaggio di testo','Mensagem teste','Тестовое сообщение','Mensaje de prueba','Deney mesajı'),(581,'joined_members','Joined Members','الأعضاء','Toegetreden leden','Membres Inscrit','Registrierte Mitglieder','Iscritto membri','Membros','Регистрация Пользователей','Miembros Antigüedad','Katılım Üyeler'),(582,'join_requests','Join Requests','طلبات الإنضمام','Join Verzoeken','Rejoignez Demandes','Registrierte Anfragen','Join Richieste','Pedidos para entrar','Регистрация запросов','Únete Solicitudes','İstekler katılın'),(583,'verified_pages','Verified Pages','الصفحاتالؤكدة','Verified Pages','Pages Vérifié','Verifizierte Seiten','Verificato Pagine','P&amp;aacute;ginas verificadas','Официальные страницы','Verificado Páginas','Doğrulanmış Sayfalar'),(584,'file_sharing_extenstions','File sharing extensions (separated with comma,)','ملحقات تبادل الملفات (مفصولة بفاصلة،)','Sharing bestandsextensies (gescheiden met een komma,)','','Daten-Transfer-Erweiterungen (mit Komma getrennt,)','Estensioni di file sharing (separati da una virgola,)','Compartilhar arquivos (separados por uma v&amp;iacute;rgula,)','Расширения обмена файлов (через запятую,)','Extensiones de intercambio de archivos (separados con comas,)','Dosya paylaşımı uzantıları (virgül ile ayrılmış)'),(585,'word_cons','Words to be censored, separated by a comma (,)','كلمات البذيئة، مفصولة بفاصلة (،)','Woorden worden gecensureerd, gescheiden door een komma (,)','Partage de fichiers extensions (séparées par des virgules,)','Zensierte Worte mit einem Komma trennen, (,)','Parole da censurati, separati da una virgola (,)','Palavras censuradas, separadas por v&amp;iacute;rgula (,)','Слова подвергаться цензуре, разделенных запятыми (,)','Palabras para ser censurados, separados por una coma (,)','Kelimeler sansür edilmesi, virgülle ayrılmış (,)'),(586,'join','Join','أنضم','Toetreden','Joindre','Beitreten','Aderire','Entrar','Вступить','Unirse','Katılmak'),(587,'joined','Joined','منضم','Geregistreerd','Inscrit','Beigetreten','Iscritto','Entrou','Выйти','Unido','Katılım'),(588,'request','Request','اطلب','Verzoek','Demande','Anfordern','Richiesta','Solicitar','Запрос','Petición','İstek'),(589,'edit_comment','Edit comment','تحرير تعليق','Reactie bewerken','Modifier commentaire','Kommentar bearbeiten','Modifica commento','Editar coment&amp;aacute;rio','Редактировать комментарий','Editar comentario','Düzenleme Yorum'),(590,'last_play','Last Play:','آخر نشاط','Laatste Play:','Dernière lecture:','Letztes Spiel:','Ultimo Gioco:','&amp;uacute;ltimo jogo:','Последняя игра:','Último juego:','Son Oyun:'),(591,'play','Play','العب','Spelen','Joue','Spielen','Giocare','Jogar','Играть','Jugar','Oyna'),(592,'confirm_request_group_privacy_label','Confirm request when someone joining this group ?','إرسال طلب عندما يقوم شخص بل الإنضمام لهذه المجموعة؟','Bevestigt aanvraag als iemand mee deze groep?','Confirmer la demande lorsque quelqu&#39;un se joindre à ce groupe?','Anfrage bestätigen, wenn jemand dieser Gruppe beitreten will?','Confermare richiesta quando qualcuno entrare in questo gruppo ?','Confirmar solicita&amp;ccedil;&amp;atilde;o quando algu&amp;eacute;m quiser fazer parte do grupo ?','Подтверждать запрос когда, кто-то хочет присоединиться к этой группе?','Confirmar pedido cuando alguien unirse a este grupo?','Birisi bu gruba katılmadan isteği onaylayın?'),(593,'who_can_see_group_posts','Who can see group&#039;s posts ?','Who can see group&#039;s posts ?','Wie kan groepen berichten zien?','Qui peut voir des groupes messages?','Wer kann Gruppenbeiträge sehen?','Chi può vedere gruppi di messaggi?','Quem pode ver os posts do grupo ?','Кто может видеть сообщения группы?','¿Quién puede ver los mensajes de este grupo?','Kim grubun mesajları görebilirim?'),(594,'joined_users','Joined users','الأعشاء المنضمين','Geregistreerd gebruikers','Inscrit utilisateurs','Registriert Nutzer','Iscritto utenti','Usu&amp;uacute;rios','Вступившие пользователи','Usuarios Antigüedad','Katılım kullanıcılar'),(595,'living_in','Living in','يسكن في','Leven in','Vivre dans','Lebt in','Residente a','Morando em','Страна','Viviendo en','Yaşayan'),(596,'design','Design','تصميم','Design','Design','Design','Design','Design','дизайн','Desiño','Dizayn'),(597,'people_you_may_want_to_meet','People you may want to meet','Pأعضاء قد ترغل في لقائهم','Mensen die je misschien wilt ontmoeten','Les personnes que vous pouvez rencontrer','Vielleicht kennst du','La gente si consiglia di rispettare','Pessoas que voc&amp;ecirc; talvez conhe&amp;ccedil;a','Люди, которых вы можете знать','La gente es posible que desee conocer','İnsanlar karşılamak isteyebilirsiniz'),(598,'added_new_photos_to','added new photos to','أضاف صور جديدة الى','Toegevoegd nieuwe foto&#039;s aan','ajoutés nouvelles photos à','hat neue Fotos hinzugefügt','aggiunte nuove foto','adicionou novas fotos','Добавлены новые фотографии в','añadido nuevas fotos a','eklenen yeni fotoğraf'),(599,'is_feeling','is feeling','يشعر ب','is het gevoel','est le sentiment','ist','è la sensazione','se sentindo','это чувство','es la sensación','duygu olduğunu'),(600,'is_traveling','is traveling to','يسافر إلى','is reizen naar','se rend à','ist auf Reisen','è un viaggio in','viajando para','едет в','está viajando a','için seyahat ediyor'),(601,'is_listening','is listening to','يستمع إلى','luistert naar','écoute','hört zu','è l&#039;ascolto','ouvindo','слушает','está escuchando','dinliyor'),(602,'is_playing','is playing','يلعب ب','speelt','est en train de jouer','spielt','sta giocando','jogando','играет','está jugando','oynuyor'),(603,'is_watching','is watching','يشاهد','is aan het kijken','regarde','beobachtet','sta guardando','assistindo','смотрит','esta viendo','izliyor'),(604,'feeling','Feeling','يشعر','Gevoel','Sentiment','Gefühl','Sensazione','Sentindo','Настроение','Sensación','Duygu'),(605,'traveling','Traveling to','يسافر','Reizen naar','Voyager à','Reisen','In viaggio verso','Viajando para','Путешествую','Viajando a','Seyahat'),(606,'watching','Watching','يشاهد','Kijken','En train de regarder','Ansehen','Guardando','Assistindo','Смотрю','Acecho','İzlenen'),(607,'playing','Playing','يلعب','Spelen','En jouant','Spielend','Giocando','Jogando','Играю','Jugando','Oynama'),(608,'listening','Listening to','يستمع إلى','Luisteren naar','Écouter','Hören','Ascoltare','ouvindo','Слушаю','Escuchar','Dinliyorum'),(609,'feeling_q','What are you feeling ?','بماذا تعشر؟','Wat voel je ?','Que ressentez vous ?','Was fühlst du ?','Cosa senti ?','Como voc&amp;ecirc; esta se sentindo ?','Что чувствуете?','Que estás sintiendo ?','Ne hissediyorsun ?'),(610,'traveling_q','Where are you traveling ?','الى أين تسافر','Waar wilt u verblijven?','Où êtes-vous?','Wohin möchtest du reisen?','Dove si viaggia ?','Para onde esta viajando ?','Куда едите?','A donde viajas ?','Nereye seyahat?'),(611,'watching_q','What are you watching ?','ماذا تشاهد؟','Waar ben je naar aan het kijken ?','Qu&#39;est-ce que vous regardez ?','Was schaust Du ?','Cosa stai guardando ?','O que esta assistindo ?','Что смотришь?','Qué estás viendo ?','Ne izliyorsun ?'),(612,'playing_q','What are you Playing ?','ماذا تلعب؟','Wat ben je aan het spelen ?','A quoi tu joues ?','Was spielst du ?','A cosa stai giocando ?','O que esta jogando ?','Во что играешь?','¿A qué juegas?','Ne oynuyorsun ?'),(613,'listening_q','What are you Listening to ?','إلى ماذا تستمع؟','Waar ben je naar aan het luisteren ?','Qu&#39;écoutes-tu ?','Was hörst du ?','Cosa stai ascoltando ?','O que esta ouvindo ?','Что слушаешь?','Qué estás escuchando ?','Ne dinliyorsun ?'),(614,'feel_d','What are you doing ?','ماذا تغعل؟','Wat ben je aan het doen ?','Qu&#39;est-ce que tu fais ?','Was machst Du?','Che stai facendo?','O que esta fazendo ?','Что делаете?','Que estas haciendo ?','Ne yapıyorsun ?'),(615,'studying_at','Studying at','يدرس في','Studeren aan','Etudier à','Studiert an','Studiare a','Estudando em','Образование','Estudiando en','Öğrenim'),(616,'company_website_invalid','Company website is invalid','موقع الشركة غير صالح','Website van het bedrijf is ongeldig','Site de la société est invalide','Unternehmens-Website ist ungültig','Sito internet della Società non è valido','Site da empresa inv&amp;aacute;lido','Веб-сайт компании является недействительным','Página web de la empresa no es válido','Şirket web sitesi geçersiz'),(617,'page_deleted','Page deleted successfully','الصفحة حذفت بنجاح','Pagina succesvol verwijderd','Page supprimée avec succès','Seite erfolgreich gelöscht','Pagina eliminato con successo','P&amp;aacute;gina deletada','Страница успешно удалена','Página eliminado correctamente','Sayfa başarıyla silindi'),(618,'cover_n_label','cover image.','صورة الغلاف.','Bedekken afbeelding.','Image de couverture.','Titelbild.','immagine di copertina.','Capa.','обложка.','Imagen de portada.','Kapak resmi.'),(619,'suggested_groups','Suggested groups','المجموعات المقترحة','Suggereerde groepen','Suggestion de groupes','Empfohlene Gruppen','Gruppi consigliati','Grupos sugeridos','Рекомендуемые группы','Grupos sugeridos','Önerilen gruplar'),(620,'accepted_join_request','accepted your request to join ({group_name})','قبل طلب للإنضمام الى ({group_name})','aanvaard uw verzoek om lid te worden ({group_name})','accepté votre demande d&#39;adhésion ({group_name})','Deine Beitrittsanfrage wurde akzeptiert ({group_name})','accettato tua richiesta di iscrizione ({group_name})','aceitou sua solicita&amp;ccedil;&amp;atilde;o para se juntar ao ({group_name})','Запрос принят на вступление в ({group_name})','aceptó su solicitud para unirse ({group_name})','İsteğiniz katılmak için kabul edilir ({group_name})'),(621,'requested_to_join_group','requested to join your group','طلب منك الإنضمام الى مجموعتك','verzocht om uw groep aan te sluiten','demandé à rejoindre votre groupe','lädt dich ein, dieser Gruppe beizutreten','richiesto di unirsi al vostro gruppo','pediu para entrar no seu grupo','хочет присоединиться к вашей группе','solicitado a unirse a su grupo','senin gruba katılmak istedi'),(622,'no_one_posted','No one posted yet','لا يوجد اي منشور بعد','Maar niemand geplaatst','Personne encore posté','Doch niemand geschrieben','Nessuno ha scritto ancora','Nenhum post ainda','Еще ничего не опубликовано','Nadie ha escrito todavía','Henüz hiç kimse gönderildi'),(623,'add_your_frineds','Add your friends to this group','إضافة أصدقائك إلى هذه المجموعة','Voeg uw vrienden aan deze groep','Ajouter à vos amis de ce groupe','Füge deine Freunde zu dieser Gruppe hinzu','Aggiungi ai tuoi amici di questo gruppo','Adicionar amigos à este grupo','Добавить друзей в эту группу','Añadir amigos a este grupo','Bu gruba arkadaşlarınızı ekleyin'),(624,'added_all_friends','There are no friends to add them','لا يوجد أصدقاء للإضافة','Er zijn geen vrienden om ze toe te voegen','Il n&#39;y a aucun ami à les ajouter','Es gibt keine Freunde, um sie hinzuzufügen','Non ci sono amici da aggiungere loro','Nenhum amigo dispon&amp;iacute;vel para ser adicionado','Добавить всех друзей','No hay amigos para agregarlos','Eklemek için hiçbir arkadaş yok'),(625,'added_you_to_group','added you to the group ({group_name})','أضافك الى المجموعة ({group_name})','u hebt toegevoegd aan de groep ({group_name})','vous ajouté au groupe ({group_name})','hat dich zur Gruppe ({group_name}) hinzugefügt','ti ha aggiunto al gruppo ({group_name})','adicionado ao grupo ({group_name})','добавил@ вас в группу ({group_name})','te agrego al grupo ({group_name})','sizi grubuna ekledi ({group_name})'),(626,'group_type','Group type','نوع المجموعة','groepstype','Type de groupe','Gruppentyp','Tipo di gruppo','Estilo do Grupo','Тип группы','Tipo de grupo','Grup türü'),(627,'public','Public','عام','Openbaar','Public','Öffentlichkeit','Pubblico','P&amp;uacute;blico','Открытая группа','Público','Kamu'),(628,'private','Private','خاص','Private','Privé','Privat','Privato','Privado','Закрытая группа','Privado','Özel'),(629,'reports','Reports','الإبلاغات','Rapporten','Rapports','Meldungen','Rapporti','Reportes','Отчеты','Informes','Raporlar'),(630,'no_dislikes','No dislikes yet','لا يوجد غير معجبين','nog geen hekel','Pas encore aversions','Keiner dem das nicht gefällt','Non hai ancora un antipatie','Nenhum dislike ainda','Пока нет &quot;Не нравится&quot;','Sin embargo no le gusta','Henüz sevmeyen'),(631,'disliked','Disliked','غير معجب','Bevallen','N&#39;a pas aimé','unbeliebt','Malvisto','N&amp;atilde;o curtiu','Не нравится','No me gustó','Sevmediği'),(632,'wondered','Wondered','متعجب','Afgevraagd','Demandé','Verwundert','Si chiese','N&amp;atilde;o curtiu','Не нравится','Se preguntó','Merak eti'),(633,'terms','Terms Pages','صفحات الموقع','Algemene Pagina','Conditions Pages','Allgemeine Seiten','Condizioni Pagine','Termos','Правила и условия','Condiciones Páginas','Şartlar Sayfalar'),(634,'profile_privacy','User Profile Privacy','خصوصية الحساب الشخصي','User Profile Privacy','Profil de confidentialité','Benutzerprofil Datenschutz','Profilo Utente Privacy','Privacidade do perfil','Профиль конфиденциальности','Perfil de usuario de Privacidad','Kullanıcı Profili Gizlilik'),(635,'profile_privacy_info','Enable it to allow non logged users to view users profiles.','مكن هذه الميزة للسماح بعرض المستخدمين لغير المسجلين.','In staat stellen om niet-aangemelde gebruikers gebruikers profielen te bekijken.','Activer qu&#39;il permette non connecté aux utilisateurs de voir les profils des utilisateurs.','Aktivieren Sie es, damit nicht angemeldete Benutzer, um Benutzer Profile anzusehen.','Consentirle di consentire agli utenti non registrati di visualizzare profili utenti.','Permitir usu&amp;uacute;rios que N&amp;atilde;o est&amp;ccedil;o logados de ver os perfils.','Включите его, чтобы не являющихся зарегистрированные пользователи для просмотра профили пользователей.','Activar para permitir que los usuarios no iniciar sesión para ver los perfiles de los usuarios.','Olmayan açmış olan kullanıcılar profillerini görüntülemek için izin için etkinleştirin.'),(636,'video_upload','Video Upload','رفع الفيديو','Video uploaden','Video Upload','Video hochladen','Carica video','Carregar v&amp;iacute;deo','Видео Загрузить','Vídeo Subir','Video Yükleme'),(637,'video_upload_info','Enable video upload to echo &amp; upload videos to the site.','مكن هذه الميزة  لتحميل وتبادل الفيديو على الموقع.','Enable video uploaden om te delen en video&#039;s uploaden naar de site.','Activer télécharger la vidéo pour partager et télécharger des vidéos sur le site.','Aktivieren Sie Video-Upload zu teilen und Videos auf der Website.','Abilita video upload per condividere e caricare i video al sito.','Carregar v&amp;iacute;deo e compartilhar ele no site.','Включить видео загрузки, чтобы разделить и загрузить видео на сайт.','Habilitar subida de vídeo para compartir y subir videos al sitio.','Paylaşmak ve siteye video yüklemek için video upload etkinleştirin.'),(638,'audio_upload','Audio Upload','رفع الموسيقى','Audio uploaden','Audio Upload','Audio hochladen','Audio Upload','Carregar audio','Аудио Загрузить','Audio Subir','Ses Yükleme'),(639,'audio_upload_info','Enable audio upload to echo &amp; upload sounds to the site.','مكن هذه الميزة  لتحميل وتبادل الصوتيات على الموقع.','Enable audio uploaden om te delen en uploaden geluiden naar de site.','Activer audio upload pour partager et télécharger des sons sur le site.','Aktivieren Sie Audio-Upload zu teilen und Upload-Sounds auf der Website.','Abilita audio upload per condividere e caricare i suoni al sito.','Carregar audios e compartilhar no site.','Включить аудио загрузки, чтобы разделить и загрузки звучит на сайт.','Habilitar audio upload compartir y cargar suena al sitio.','Paylaşmak ses yükleme etkinleştirin ve upload sitesine geliyor.'),(640,'read_more','Read more','المزيد ..','Lees Meer..','En lire plus..','Weiterlesen','Leggi di più..','Ler mais','Показать полностью...','Lee mas..','Daha fazla..'),(641,'read_less','Read less','أخفاء ..','Lees Minder..','Lire moins..','Weniger lesen','Leggi meno..','Ler menos','Свернуть...','Cerrar..','Az Oku..'),(642,'add_photo','Add a photo.','أضِف صورة.','Voeg een foto toe.','Ajouter une photo.','Füge ein Bild hinzu.','Aggiungi una foto.','Adicionar foto.','Добавьте фотографию.','Añade una foto.','Bir fotoğraf ekle.'),(643,'add_photo_des','Show your unique personality and style.','أظهِر شخصيّتك وأسلوبك الفريد.','Voeg een foto toe.','Affichez votre personnalité et votre style uniques.','Zeige Deine einzigartige Persönlichkeit und Deinen Stil.','Mostra la tua personalità e il tuo stile.','Mostrar sua personalidade e estilo.','Продемонстрируйте свою индивидуальность и неповторимый стиль.','Muestra tu estilo y personalidad única.','Eşsiz karakterini ve tarzını yansıt.'),(644,'start_up_skip','Or Skip this step for now.','تخطّى هذه الخطوة الآن','Deze stap voor nu overslaan','Sauter cette étape pour le moment','Diesen Schritt vorerst überspringen','Salta questo passaggio per ora','Pular.','Пропустить этот шаг','Omitir este paso por ahora','Bu adımı şimdilik atla'),(645,'start_up_continue','Save &amp; Continue','المتابعة','Opslaan &amp; Doorgaan','Enregistrer &amp; Continuer','Speichern und weiter','Salva e continua','Salvar e continuar','Сохранить &amp; Продолжить','Guardar y Continuar','Kaydet ve Devam Et'),(646,'tell_us','Tell us about you.','أخبرنا عنك.','Vertel ons over jou.','Parlez-nous de vous.','Erzählen Sie uns von Ihnen.','Parlaci di te.','Fale sobre voc&amp;ecirc;.','Расскажите о себе.','Cuéntanos acerca de ti.','Senin hakkında bilgi verin.'),(647,'tell_us_des','Echo your information with our community.','تبادل المعلومات الخاصة بك مع مجتمعنا.','Deel je informatie met onze gemeenschap.','Partager vos informations avec notre communauté.','Ihre Daten an unsere Community.','Condividere le informazioni con la nostra comunità.','Compartilhe informa&amp;ccedil;&amp;otilde;es.','Поделитесь информацией с нашим сообществом.','Comparta su información con nuestra comunidad.','Eden ile bilgilerinizi paylaşın.'),(648,'get_latest_activity','Get latest activities from our popular users.','الحصول على أحدث الأنشطة من أكثر المستخدمين شعبية لدينا.','Ontvang de meest recente activiteiten van onze populaire gebruikers.','Obtenir les dernières activités de nos utilisateurs populaires.','Holen Sie sich aktuelle Aktivitäten aus unserer beliebten Nutzer.','Ottenere ultime attività dei nostri utenti popolari.','Veja novas informa&amp;ccedil;&amp;otilde;es dos usu&amp;uacute;rios mais populares.','Следите за последними действиями популярных пользователей.','Obtener las últimas actividades de los usuarios populares.','Bizim popüler kullanıcılardan son faaliyetleri alın.'),(649,'follow_head','Follow our famous users.','تابع أشهر المستخدمين.','Volg onze beroemde gebruikers.','Suivez nos utilisateurs célèbres.','Folgen Sie unseren berühmten Nutzer.','Segui i nostri utenti famosi.','Siga os usu&amp;uacute;rios famosos.','Следуйте за нашими знаменитыми пользователями.','Siga nuestros usuarios más populares.','Bizim ünlü kullanıcıları izleyin.'),(650,'follow_num','Follow {number} &amp; Finish','تابع {number} وإستمر','Volg {number} &amp; Finish','Suivez {number} &amp; Terminer','Folgen Sie {number} &amp; Finish','Seguire {number} &amp; Finitura','Seguir {number} &amp; terminar','Следовать за {number}','Siga {number} y Finalizar','{number} Takip et ve bit'),(651,'looks_good','Looks good.','يبدو جيّدًا.','Ziet er goed uit.','Ça a l&#39;air bien.','Sieht gut aus.','Sembra buono.','Parece legal.','Неплохо.','Se ve bien.','İyi görünüyor.'),(652,'looks_good_des','You&#039;ll be able to add more to your profile later.','ستكون قادرًا على إضافة المزيد لملفك الشخصيّ لاحقًا.','Je kunt later meer toevoegen aan je profiel.','Vous serez en mesure de compléter votre profil ultérieurement.','Du wirst später mehr zu Deinem Profil hinzufügen können.','Più tardi potrai aggiungere altro al tuo profilo.','Voc&amp;ecirc; poder&amp;aacute; adicionar mais em seu perfil depois.','Вы сможете добавить другую информацию в свой профиль позже.','Podrás añadir más a tu perfil después.','Daha sonra profiline yeni şeyler ekleyebilirsin.'),(653,'upload_your_photo','Upload your photo','إرفع صورتك','Upload je foto','Téléchargez votre photo','Lade Dein Bild hoch','Carica la tua foto','Carregar foto','Загрузите вашу фотографию','Sube tu foto','Fotoğrafını yükle'),(654,'please_wait','Please wait..','الرجاء الإنتظار..','Even geduld aub..','S&#39;il vous plaît, attendez..','Warten Sie mal..','Attendere prego..','Aguarde..','Пожалуйста подождите..','Por favor espera..','Lütfen bekleyin..'),(655,'username_or_email','Username or E-mail','اسم المستخدم أو البريد الإلكتروني','Gebruikersnaam of E-mail','Nom d&#39;utilisateur ou email','Benutzername oder E-Mail-Adresse','Nome utente o E-mail','Nome de usuário ou E-mail','Никнейм или E-mail адрес','Usuario o correo electrónico','Kullanıcı adı ya da email'),(656,'email_setting','E-mail Setting','إعداد البريد الإلكتروني','E-mail instellen','E-mail Réglage','E-Mail Einstellung','E-mail Impostazione','Configuração de E-mail','Электронная почта Настройка','Ajuste de Correo','E-posta Ayarı'),(657,'years_old','years old','سنوات','jaar oud','ans','Jahre alt','Anni','anos','лет','años','yaşında'),(658,'friends_birthdays','Friends Birthdays','اعياد ميلاد الاصدقاء','Verjaardagen van vrienden','Annivarsaire d&#39;amis','Geburtstage von Freunden','amici Compleanni','Aniversários de Amigos','Друзья Дни рождения','Cumpleaños de amigos','Arkadaşlarının Doğumgünü'),(659,'sms_setting','SMS Setting','اعدادات الرسائل القصيرة','SMS Instellingen','Paramètres SMS','SMS Einstellungen','Impostazione SMS','Configuração de SMS','SMS Настройка','Configuración SMS','SMS Ayarları'),(660,'smooth_loading','Smooth Loading','تحمبل سلس','Gelijdelijk laden','Chargement régulier','Schnelles Laden','Smooth Caricamento','Carregamento Suave','Гладкая загрузка','Cargando','Düzgün Yükleme'),(661,'boosted_pages_viewable','Echoed pages are already viewable by all our community members.','الصفحات المعززة يتم مشاهدتها من قبل جميع افراد المجتمع','Omhoog geplaatste pagina&#039;s zijn al zichtbaar voor leden.','Les pages boostées sont déjà visibles par tous les membres de votre communauté','Hervorgehobene Seiten sind sofort für alle Mitglieder der Community Sichtbar.','pagine potenziato sono già visualizzabili da tutti i membri della community.','Páginas impulsionadas já estão visíveis por todos os membros da nossa comunidade.','Усиленные страницы уже доступны для просмотра всеми нашими членами сообщества.','Tus paginas promocionadas seran vistas en toda la comunidad.','Yükseltilen sayfalar tüm kullanıcılarımız tarafından görüntülenebilir.'),(662,'boost_page_in_same_time','You&#039;re a {type_name}, You&#039;re just able to echo {can_boost} pages at the same time.','صفحة في نفس الوقت{can_boost}بامكانك فقط تسريع ,{type_name} انت','Je bent {type_name}, Je kan nu  {can_boost} omhoog plaatsen.','Vous êtes un {type_name}, vous pouvez booster {can_boost} pages en même temps.','Du nutzt einen {type_name} Account, Du kannst nicht {can_boost} Seiten zur selben Zeit hervorheben.','Sei un {type_name}, Sei solo in grado di aumentare {can_boost} pagine in tempo stesso.','Você é um {type_name}, Vocêé apenas capaz de impulsionar {pode_impulsionar} páginas ao mesmo tempo.','Ты {type_name}, Вы просто в состоянии повысить {can_boost} может увеличить страницы в то же самое время.','Tu {type_name}, solo puedes promocionar {can_boost} paginas al mismo tiempo.','Sen bir {type_name}, aynı zamanda {can_boost} sadece sayfaları yükseltebilirsin.'),(663,'boost_posts_in_same_time','You&#039;re a {type_name}, You&#039;re just able to echo {can_boost} posts at the same time.','صفحة في نفس الوقت{can_boost}بامكانك فقط تسريع ,{type_name} انت','Je bent {type_name}, Je kan nu {can_boost} berichten omhoog plaatsen.','You&#039;re a {type_name}, vous pouvez booster {can_boost} posts en même temps.','Du nutzt einen {type_name} Account, Du kannst nicht  {can_boost} Beiträge zur selben Zeit hervorheben.','Sei un {type_name}, Sei solo in grado di aumentare {can_boost} messaggi in tempo stesso.','Você é um {type_name}, Vocêé apenas capaz de impulsionar {pode_impulsionar} postagens ao mesmo tempo.','Ты {type_name}, Вы просто в состоянии повысить {can_boost} может увеличить посты в то же самое время.','Tu {type_name}, solo puedes promocionar {can_boost} posts al mismo tiempo.','Sen bir {type_name}, aynı zamanda {can_boost} sadece mesajları yükseltebilirsin.'),(664,'there_are_no_boosted_pages','There are no echoed pages yet.','لا يوجد صفحات معززة الان','Er zijn geen omhoog geplaatste pagina&#039;s.','Il n&#039;y a pas encore de pages boostées.','Es gibt zu Zeit keine hervorgehobenen Seiten.','Non ci sono ancora pagine potenziati.','Não há páginas impulsionadas ainda.','Там нет Boosted страниц пока.','No hay paginas promocionados aún.','Henüz yükseltilmiş sayfa bulunmuyor.'),(665,'there_are_no_boosted_posts','There are no echoed posts yet.','لا يوجد صفحات معززة الان','Er zijn geen omhoog geplaatste berichten.','Il n&#039;y a pas encore de posts boostés.','Es gibt zur Zeit noch keine hervorgehobenen Beiträge.','Non ci sono ancora messaggi potenziati.','Não há postagens impulsionadas ainda.','Там нет Boosted сообщений пока.','No hay post promocionados aún.','Henüz yükseltilmiş mesaj bulunmuyor.'),(666,'discover_pro_types','Discover more features with {sitename} PRO packages !','اكتشاف المزيد للمحترفين من الميزات مع حزم {sitename}','Ontdek meer opties met {sitename} PRO!','Découvrez plus de fonctionnalités avec {sitename} PRO !','Entdecke mehr Funktionen mit dem {sitename} Pro-Paket !','Scopri di più caratteristiche con WoWonder pacchetti PRO !','Descubra mais recursos com WoWonder PRO packages !','Откройте для себя больше возможностей с WoWonder пакетами PRO !','Descubre mas {sitename} funciones con los nuevos paquetes!','{sitename} PRO paketleri ile daha fazla özellik keşfedin !'),(667,'star','Star','برونزي','Ster','Etoile','Star','Star','Estrela','Star','Star','Yıldız'),(668,'hot','Hot','فضي','Heet','Hot','Hot','Hot','Quente','Hot','Hot','Sıcak'),(669,'ultima','Ultima','ذهبي','Ultimate','Ultima','Ultima','Ultima','Ultima','Ultima','Ultima','Ultima'),(670,'vip','Vip','ماسي','VIP','Vip','Vip','Vip','Vip','Vip','Vip','Vip'),(671,'featured_member','Featured member','عضو متميز','Aanbevolen lid','Membres en vedette','Besonderes Mitglied','membro In primo piano','Membro em destaque','Показанный член','Miembros destacados','Önerilen üye'),(672,'see_profile_visitors','See profile visitors','رأيت صفحات الشخصية للزوار','Bekijk profiel bezoekers','Voir le profil des visiteurs','Sehe wer dein Profil besucht hat','Vedi visitatori profilo','Veja os perfis de visitantes','См посетителей профиля','Ver visitantes en su perfil','Profil ziyaretçilerini gör'),(673,'show_hide_lastseen','Show / Hide last seen','اظهار/إخفاء أخر ظهور','Verberg laatst gezien','Voir / Cacher la dernière fois vu','Anzeigen oder Verstecke zuletzt gesehen','Mostra / Nascondi visto l&#039;ultima volta','Mostra / Esconder visto por último','Показать / Скрыть последний раз видели','Ver / Ocultar ultimas visitas','Son görünmeyi Göster / Gizle'),(674,'verified_badge','Verified badge','شارة التحقق','Vericatie Badge','Badge Vérifié','Verifiziert Abzeichen','distintivo verificato','Crachá verificado','Проверенные значок','Cuenta Verificada','Onaylanmış rozet'),(675,'post_promotion_star','Posts promotion&lt;br&gt;','نشر تريج&lt;br&gt;&lt;small&gt;(غير متاح)&lt;/small&gt;','Bericht promotie&lt;br&gt;&lt;small&gt;(Niet beschikbaar)&lt;/small&gt;','Promotion de post&lt;br&gt;&lt;small&gt;(Indisponible)&lt;/small&gt;','Beitrags Promotion&lt;br&gt;&lt;small&gt;(Nicht verfügbar)&lt;/small&gt;','la promozione Messaggio&lt;br&gt;&lt;small&gt;(Non disponibile)&lt;/small&gt;','Pós promoção&lt;br&gt;&lt;small&gt;(Não disponível)&lt;/small&gt;','продвижение сообщение&lt;br&gt;&lt;small&gt;(Недоступен)&lt;/small&gt;','Promocionar publicación&lt;br&gt;&lt;small&gt;(No Disponible)&lt;/small&gt;','Mesaj tanıtımı&lt;br&gt;&lt;small&gt;(Mevcut değil)&lt;/small&gt;'),(676,'page_promotion_star','Pages promotion&lt;br&gt;','صفحة الترويج&lt;br&gt;&lt;small&gt;(غير متاحة)&lt;/small&gt;','Pagina promotie&lt;br&gt;&lt;small&gt;(Niet beschkbaar)&lt;/small&gt;','Promotion de page&lt;br&gt;&lt;small&gt;(Indisponible)&lt;/small&gt;','Seiten Promotion&lt;br&gt;&lt;small&gt;(Nicht verfügbar)&lt;/small&gt;','promozione pagina&lt;br&gt;&lt;small&gt;(Non disponibile)&lt;/small&gt;','Pré promoção&lt;br&gt;&lt;small&gt;(Não disponível)&lt;/small&gt;','продвижение Page&lt;br&gt;&lt;small&gt;(Недоступен)&lt;/small&gt;','Promocionar pagina&lt;br&gt;&lt;small&gt;(No Disponible)&lt;/small&gt;','Sayfa tanıtımı&lt;br&gt;&lt;small&gt;(Mevcut değil)&lt;/small&gt;'),(677,'0_discount','0% discount','0% تخفيض','0% korting','0% de réduction','0% Nachlass','0% sconto','0% de desconto','0% скидка','0% descuento','0% indirim'),(678,'10_discount','10% discount','10% تخفيض','10% korting','10% de réduction','10% Nachlass','10% sconto','10% de desconto','10% скидка','10% descuento','10% indirim'),(679,'20_discount','20% discount','20% تخفيض','20% korting','20% de réduction','20% Nachlass','20% dsconto','20% de desconto','20% скидка','20% descuento','20% indirim'),(680,'60_discount','60% discount','60% تخفيض','60% korting','60% de réduction','60% Nachlass','60% sconto','60% de desconto','60% скидка','60% descuento','60% indirim'),(681,'per_week','per week','لمدة اسبوع','per week','par semaine','pro Woche','settimanale','por semana','в неделю','por semana','haftada'),(682,'per_month','per month','لمدة شهر','per maand','par mois','pro Monat','al mese','por mês','в месяц','por mes','ayda'),(683,'per_year','per year','لمدة عام','per jaar','par an','pro Jahr','per anno','por ano','в год','por año','yılda'),(684,'life_time','life time','مدى الحياة','levens lang','à vie','Lebenslang','tutta la vita','tempo de vida','продолжительность жизни','de por vida','ömür boyu'),(685,'upgrade_now','Upgrade Now','ترقية الان','Upgrade Nu','Mise à jour maintenant','Jetzt Upgraden','Aggiorna ora','Atualize Agora','Обнови сейчас','Actualiza ahora','Hemen Yükselt'),(686,'boosted_posts','Echoed Posts','المشاركات المعززت','Omhoog geplaatse berichten','Posts boostés','hervorgehobene Beiträge','Messaggi potenziato','Postagens Impulsionadas','Усиленные Сообщений','Promocionar Posts','yükseltılan Mesajlar'),(687,'boosted_pages','Echoed Pages','الصفحات المعززت','Omhoog geplaatsen pagina&#039;s','Pages boostées','hervorgehobene Seiten','Pagine potenziato','Páginas Impulsionadas','Усиленные Страницы','Promocionar Paginas','yükseltılan Sayfalar'),(688,'put_me_here','Put Me Here','ضعني هنا','Zet mij hier nier','Me mettre ici','Setze mich Hier','Mettimi qui','Me Coloque Aqui','Put Me Здесь','Poner aqui','buraya koy'),(689,'promoted','Promoted','معزز','Advertenties','Promoted','Promotions','Promossa','Promovido','Повышен','Promocionar','Tanıtılan'),(690,'oops_something_went_wrong','Oops ! Something went wrong.','Oops ! حدث خطأ ما','Oeps ! Er ging iets mis.','Oops ! Quelquechose s&#39;est mal passé.','Oops ! Irgendetwas ist schief gegangen.','Oops! Qualcosa è andato storto.','Oops! Algo deu errado.','К сожалению! Что-то пошло не так.','Oops ! Algo salio mal.','Hata ! Bir şeyler yanlış gitti.'),(691,'try_again','Try again','حاول مجددا','Probeer het opnieuw','Essayez encore','Versuche es erneut','Riprova','Tente novamente','Попробуй еще раз','Trata de nuevo','Tekrar deneyin'),(692,'boost_page','Echo Page','اضافة صفحة','Plaats pagina omhoog','Echo Page','Seite hervorheben','Echo Pagina','Página Impulsionada','Повышение Page','Promocionar Pagina','Sayfa yükselt'),(693,'page_boosted','Page Echoed','الصفحة المعززة','Pagina omhoog geplaatst','Page Boostée','Die Seite wurde hervorgehoben','pagina potenziato','Página Impulsionada','Страница Echoed','Pagina promocionada','yükseltılan Sayfa'),(694,'un_boost_page','Un-Echo Page','الصفحة الغير معززة','Verwijder omhoog plaatsing','Un-Echo Page','Seite nicht mehr hervorheben','Un-Echo Pagina','Desimpulsionar Página','Un-наддув Page','Des-promover pagina','Sayfayı yükseltma'),(695,'edit_page_settings','Edit Page Settings','تعديل إعدادات الصفحة','Verander pagina instellingen','Editer paramètres de la Page','Seiten Einstellungen bearbeiten','Modifica impostazioni pagina','Editar as configurações de página','Изменить настройки страницы','Editar ajustes de página','Sayfa Ayarlarını Düzenle'),(696,'blocked_users','Blocked Users','المستخدمين المحظورين','Geblokkerde Gebruikers','Utilisateurs bloqués','Blockierte Mitglieder','Gli utenti bloccati','Usuários Bloqueados','Заблокированные пользователи','Blockear usuario','Bloklu Kullanıcılar'),(697,'un_block','Un-Block','غير محضور','Deblokkeer','Débloquer','Blockierung aufheben','Sbloccare','Desbloquear','открыть','Des-blockear','Blok yükselt'),(698,'css_file','CSS file','CSS ملف','CSS bestand','fichier CSS','CSS Datei','file CSS','arquivo CSS','файл CSS','Archivo CCS','CSS dosyası'),(699,'css_status_default','Default design','التصميم الاولي','Standaard design','Design par défaut','Standart Design','disegno predefinito','Design padrão','дизайн По умолчанию','diseño por defecto','Varsayılan dizayn'),(700,'css_status_my','My CSS file','الخاص بي CSS ملف','Mijn CSS bestand','Mon fichier CSS','Meine CSS Datei','Il mio file CSS','Meu arquivo CSS','Мой файл CSS','Mi CSS','CSS dosyam'),(701,'css_file_info','You can fully design your profile by uploading your own CSS file','CSS الخاص بك يمكنك تصميم كامل ملف التعريف الخاص بك عن طريق تحميل ملف','Je kan je profiel helemaal pimpen door je eigen CSS bestand te uploaden','Vous pouvez modifier le design de votre profil via le téléversement de votre propre fichier CSS','Du kannst dein Profil komplett selbst Designen in dem du deine CSS Datei hoch lädst','È possibile progettare completamente il proprio profilo caricando il proprio file CSS','Você pode projetar totalmente o seu perfil através de upload do seu próprio arquivo CSS','Вы можете полностью создать свой профиль, загрузив свой собственный файл CSS','Ahora puedes rediseñar tu perfil con tu propio estilo (Css)','Kendi Css dosyanızı yükleyerek profilinizi tamamen siz tasarlayabilirsiniz.'),(702,'invite_your_frineds_home','Invite Your Friends','دعوة اصدقائك','Nodig je vrienden uit','Inviter vos amis','Lade deine Freunde ein','Invita i tuoi amici','Convidar Seus Amigos','Пригласить друзей','Invita a tus amigos','Arkadaşlarını Davet Et'),(703,'send_invitation','Send Invitation','إرسال الدعوة','Verstuur','Envoyer Invitation','Einladung Versenden','Spedire un invito','Enviar Convite','Выслать пригласительное','Enviar invitación','Davetiye gönder'),(704,'boost_post','Echo Post','تعزيز المنشور','Plaast bericht omhoog','Echo Post','Beitrag Hervorheben','Echo Messaggio','Impulsionar Postagem','Повысьте Post','Promocionar post','Echo Post'),(705,'unboost_post','UnEcho Post','عدم تعزيز المنشور','Verwijder','Un-Echo Post','Beitrag nicht mehr Hervorheben','UnEcho Messaggio','Desimpulsionar Postagem','UnEcho сообщение','Des-promocionar post','Un-Echo Post'),(706,'drag_to_re','Drag to reposition cover','اسحب لتعديل الصورة','Sleep naar de juiste positie','Faites glisser pour repositionner la couverture','Ziehe das Cover mit der Maus um es neu zu Positionieren','Trascinare per riposizionare la copertura','Arraste para reposicionar a cobertura','Перетащите, чтобы изменить положение крышки','Arrastra la portada para recortarla','Kapağı yeniden konumlandırmak için sürükleyin'),(707,'block_user','Block User','حضر المستخدم','Blokkeer gebruiker','Bloquer l&#39;utilisateur','Mitglied Blocken','Blocca utente','Bloquear Usuário','Заблокировать пользователя','Blockear usuario','Kullanıcı Blok'),(708,'edit_user','Edit User','تعديل حساب العضو','Wijzig gebruiker','Editer Utilisateur','Mitglied Bearbeiten','Modifica utente','Editar Usuário','Изменить пользователя','Editar usuario','Kullanıcıyı Düzenle'),(709,'cong','Congratulations ! You&#039;re now a &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','مبروك! انت الان &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Gefeliciteerd ! Je bent nu een &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Félicitation ! Vous êtes maintenant un &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Herzlichen Glückwunsch! Du bist nun ein &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Complimenti ! Ora sei un &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Parabéns ! Você é agora um &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Поздравления ! Ты теперь &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Felicidades! Ahora &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}','Tebrikler ! Artık sen bir &lt;span style=&quot;color:{color}&quot;&gt;&lt;i class=&quot;fa fa-{icon} fa-fw&quot;&gt;&lt;/i&gt;{type_name}'),(710,'cong_2','Start browsing the new features','بدء تصفح الميزات الجديدة','Bekijk nu je nieuwe opties','Commencer à naviguer sur les nouvelles fonctionnalités','Beginne dir die neuen Funktionen anzusehen','Avviare la navigazione le nuove funzionalità','Começe a navegar os novos recursos','Начать просмотр новых функций','Comiencza a utilizar las nuevas funciones','Yeni özellikleri taramaya başlayın'),(711,'activation_oops','Oops, looks like your account is not activated yet.','Oops, .يبدو انه لم يتم تنشيط حسابك بعد','Oeps, het lijkt er op of je account nog niet is geactiveerd.','Oops, votre compte n&#39;est pas encore activé.','Oops, so wie es aussieht wurde dein Account Nachbericht aktiviert.','Spiacenti, sembra che il tuo account non è ancora attivato.','Oops, parece que sua conta não está ativada ainda.','К сожалению, похоже, ваша учетная запись еще не активирована.','Oops, Parece que su cuenta no está activada aún.','Hata, hesabınız henüz aktif edilmemiş gibi görünüyor.'),(712,'activation_method','Please choose a method below to activate your account.','.يرجى اختيار طريقة لتفعيل حسابك أدناه','Selecteer een optie om je account te activeren.','Merci de choisir une méthode ci*dessous pour activer votre compte.','Bitte suche dir eine unten stehende Methode aus um dein Account zu aktivieren.','Si prega di scegliere un metodo seguito per attivare il tuo account.','Por favor escolha um método abaixo para ativar sua conta.','Пожалуйста, выберите метод ниже, чтобы активировать учетную запись.','Por favor trata con otro metodo para activar tu cuenta.','Hesabınızı etkinleştirmek için aşağıda ki yöntemlerden birini seçiniz.'),(713,'activation_email','Via E-mail','عن طريق البريد','Via E-mail','Par E-mail','Via E-mail','Via posta elettronica','Via E-mail','По электронной почте','Via E-mail','E-mail ile'),(714,'activation_phone','Via Phone Number','عن طريق الهاتف','Via Telefoonnummer','Par téléphone','Via Telefonnummer','Via Numero di telefono','Via Número de Telefone','Via номеру телефона','Via SMS','Telefon Numarası ile'),(715,'activation_or','Or','أو','Of','Ou','Oder','O','Ou','Или','O','yada'),(716,'activation_send_code','Send Confirmation Code','إرسال رمز التأكيد','Stuur activatie code','Envoyer le code confirmation','Sende uns deinen Bestätigungs Code Manuell','Invia codice di conferma','Enviar Confirmação do Código','Отправить код подтверждения','Enviar código de activación','Onay Kodu Gönder'),(717,'activation_get_code_again','Didn&#039;t get the code?','لم يتم استقبال الرمز؟','Code niet ontvangen?','Didn&#39;t get the code?','Du hast keinen Code erhalten?','Non avere il codice?','Não obteve o código?','Не получить код?','No he recivido código?','Onay kodunu almadınız mı?'),(718,'activation_resend','Resend','اعادت ارسال','Verstuur opnieuw','Renvoyer','Erneut Senden','inviare di nuovo','Re-enviar','Отправить','Re-enviar','Tekrar gönder'),(719,'activation_should_receive','You should receive the code within','يجب استقبال الرمز في مدة','Je zult de code ontvangen','You should receive the code within','Du solltest den Code in Kürze erhalten.','Si dovrebbe ricevere il codice all&#039;interno','Você deve receber o código dentro de','Вы должны получить код внутри','Debería recibir el código dentro de','içinde kodu almalısınız'),(720,'confirm','Confirm','تأكيد','Bevestig','Confirmer','Bestätigen','Confermare','Confirmar','подтвердить','Confirmar','Onayla'),(721,'phone_num_ex','Phone number (eg. +905...)','(eg. +905...) رقم الهاتف','Telefoonnumer (bijv. +31...)','Numéro de téléphone (eg. +33...)','Telefonnummer  (z.b +49...)','Numero di telefono (eg. +905...)','Número de telefone (ex. +905...)','Номер телефона (eg. +905...)','Numero de Telefono (eg. +001...)','Telefon Numarası (örn. +905...)'),(722,'error_while_activating','Error while activating your account.','.خطأ أثناء تفعيل حسابك','Error tijdens het activeren van uw account.','Error while activating your account.','Fehler beim aktivieren deines Accounts.','Errore durante l&#039;attivazione dell&#039;account.','Erro ao ativar a sua conta.','Ошибка при активации учетной записи.','Error al activar su cuenta.','Hesabınızı onaylarken hata oluştu.'),(723,'wrong_confirmation_code','Wrong confirmation code.','.خطأ في رمز التأكيد','Ongeldige code.','Code de confirmation erroné.','Falscher bestätigungs Code.','codice di conferma errato.','Código de confirmação incorreto.','Неправильный код подтверждения.','Este código no es valido.','Yanlış onay kodu.'),(724,'failed_to_send_code','Failed to send the confirmation code.','.فشل في إرسال رمز التأكيد','Het is niet gelukt de code te verzenden.','Impossible d&#39;envoyer le code de confirmation.','Fehler beim senden des bestätigungs Code.','Impossibile inviare il codice di conferma.','Não foi possível enviar o código de confirmação.','Не удалось отправить код подтверждения.','No se pudo enviar código de activación.','Onay kodu gönderilirken hata oluştu.'),(725,'worng_phone_number','Wrong phone number.','.رقم الهاتف خاطئ','Geen geldige telefoonnummer.','Numéro de téléphone erroné.','Falsche Telefonnummer.','numero di telefono sbagliato.','Número de telefone incorreto.','Неправильный номер телефона.','Numero incorrecto.','Yanlış telefon numarası.'),(726,'phone_already_used','Phone number already used.','.رقم الهاتف موجود','Telefoonnummer is al in gebruik.','Numéro de téléphone déjà utilisé.','Die angebene Telefonnummer wird bereits verwendet.','Numero di telefono già in uso.','Número de telefone já em uso.','Номер телефона уже используется.','Este nuemero ya a sido usado.','Telefon numarası kullanılıyor.'),(727,'sms_has_been_sent','SMS has been sent successfully.','.تم ارسا الرسالة النصية بنجاح','SMS is succsesvol verzonden.','SMS envoyé avec succès.','Die SMS wurde erfolgreich versendet.','SMS è stato inviato con successo.','SMS foi enviado com sucesso.','SMS было отправлено успешно.','El código de activación a sido enviado.','SMS başarıyla gönderildi.'),(728,'error_while_sending_sms','Error while sending the SMS, please try another number.','.خطأ أثناء إرسال الرسالة القصيرة، يرجى المحاولة باستخدام رقم آخر','We konden de SMS niet versturen, probeer een ander nummer.','Erreur lors de l&#39;envooi du SMS, merci d&#39;essayer un autre numéro de téléphone.','Fehler beim Versenden der SMS, bitte versuche eine andere Telefonnummer.','Errore durante l&#039;invio del SMS, prova un altro numero.','Erro ao enviar o SMS, por favor tente outro número.','Ошибка при отправке SMS, пожалуйста, попробуйте другой номер.','Error al enviar código de activacion, por favor trata con otro numero .','SMS gönderilemiyor, lütfen farklı numara deneyiniz.'),(729,'failed_to_send_code_fill','Failed to send the confirmation code, please select one of the activation methods.','.فشل في إرسال رمز التأكيد، يرجى ملء إحدى خانات التنشيط','Het is niet gelukt de code te versturen, probeer een andere methoda.','Impossible d&#39;envoyer le code de confirmation, essayez une des méthodes d&#39;activation.','Fehler beim Versenden des bestätigungs Code, bitte wählen eine andere aktivierungs Methode.','Impossibile inviare il codice di conferma, selezionare uno dei metodi di attivazione.','Não foi possível enviar o código de confirmação, por favor preencha um dos métodos de ativação.','Не удалось отправить код подтверждения, пожалуйста, выберите один из предложенных способов активации.','Error al enviar código de activacion, por favor trata con otro metodo.','Onay kodu gönderilemiyor, lütfen aktivasyon yöntemlerinden birini seçiniz.'),(730,'email_sent_successfully','E-mail has been sent successfully, please check your inbox or spam folder for the activation link.','.تم إرسال البريد الإلكتروني بنجاح، يرجى مراجعة مجلد البريد الوارد أو الرسائل غير المرغوب فيها لرابط التفعيل','E-mail is succesvol verzonden, kijk ook in uw spam/ongewenste inbox.','E-mail envoyé avec succès, merci de vérifier votre boite de réception et dossier spam pour le lien d&#39;activation.','Es wurde dir eine Email gesendet, bitte überprüfe deinen Postfach und gegebenfalls auch den Spam Ordner.','E-mail è stata inviata con successo, controllare la cartella Posta in arrivo o spam per il link di attivazione.','E-mail foi enviado com sucesso, verifique a sua pasta caixa de entrada ou de spam para o link de ativação.','Электронная почта была успешно отправлена, пожалуйста, проверьте свой почтовый ящик или спам папку для ссылки активации.','El correo a sido enviado, por favor check your inbox or spam folder for the activation link.','E-mail gönderildi, aktivasyon linki için lütfen mesaj kutunuzu yada spam kutusunu kontrol ediniz.'),(731,'limit_exceeded','Limit exceeded, please try again later.','.لقد تجاوزت الحد المسموح به، يرجى المحاولة مرة أخرى في وقت لاحق','Te vaak geprobeerd, probeer het later nog eens.','Limite dépassé, merci de réessayer plus tard.','Anzahl an versuche überschritten , bitte versuche es später nochmal..','Limite superato, riprova più tardi.','Limite excedido, tente novamente mais tarde.','Превышен лимит, пожалуйста, повторите попытку позже.','Límite excedido, por favor trata mas tarde.','Limit aşıldı, lütfen daha sonra tekrar deneyin.'),(732,'failed_to_send_code_email','Error while sending the SMS, please try another number or activate your account via email by logging into your account.','.خطأ أثناء إرسال الرسائل القصيرة، يرجى المحاولة رقم آخر أو تفعيل حسابك عبر البريد الإلكتروني عن طريق الدخول في حسابك','Probeer je account te verifiëren via de e-mail, we konden geen sms sturen.','Erreur lors de l&#39;envoi du SMS, merci d&#39;essayer un autre numéro ou activer votre compte par e-mail en vous connectant à votre compte.','Fehler beim Versenden der SMS, bitte benutze eine andere Telefonnummer  oder aktiviere deinen Account via Email, indem  du dich mit deinem Account Anmeldest.','Errore durante l&#039;invio del SMS, prova un altro numero o attivare il tuo account tramite e-mail accedendo al proprio conto.','Erro ao enviar o SMS, tente outro número ou ativar sua conta via e-mail, entrando em sua conta.','Ошибка при отправке SMS, пожалуйста, попробуйте другой номер или активировать свою учетную запись через электронную почту, войдя в свой аккаунт.','Error al enviar código de activacion, por favor trata con otro numero o activa tu cuenta via email accediendo a tu cuenta .','SMS gönderilemiyor, lütfen başka bir numara deneyiniz yada hesabınıza giriş yaparak hesabınızı mail ile etkinleştiriniz.'),(733,'free_member','Free Member','عضو عادي','Gratis Lid','Free member','Kostenlose Mitgliedschaft','Free Member','Membro grátis','Free Member','Usuario gratis','Ücretsiz üye'),(734,'star_member','Star Member','عضو برونزي','Ster Lid','Star Member','Star Mitgliedschaft','Star Member','Membro estrela','Star Member','Usuario star','Yıldız üye'),(735,'hot_member','Hot Member','عضو فضي','Hot Lid','Hot Member','Hot Mitgliedschaft','Hot Member','Membro Quente','Hot Member','Usuario hot','Sıcak Üye'),(736,'ultima_member','Ultima Member','عضو ذهبي','Ultimate Lid','Ultima Member','Ultima Mitgliedschaft','Ultima Member','Ultima Member','Ultima Member','Usuario ultima','Ultima Üye'),(737,'vip_member','Vip Member','عضو ماسي','VIP Lid','Vip Member','Vip Mitgliedschaft','Vip Member','Membro Vip','Vip Member','Usuario VIP','Vip Üye'),(738,'moderator','Moderator','مشرف','Moderator','Modérateur','Moderator','Moderator','Moderador','Moderator','Moderador','Moderator'),(739,'member_type','Member Type','نوع العضوية','Member soort','Type de membres','Mitglieds Typ','Member Type','Tipo de Membro','Member Type','Tipo de menbresia','Üye Türü'),(740,'membership','Membership','العضوية','Membership','Membership','Mitgliedschaft','membri','Filiação','членство','Membresia','Üyelik'),(741,'upgrade','Upgrade','الترقية','Upgrade','Mise à jour','Upgrade','aggiornamento','Atualização','Обновить','Actualización','Yükselt'),(742,'error_please_try_again','Error, Please try again later.','.خطئ, يرجى المحاولة لاحقا','Error, probeer het later opnieuw.','Erreur, merci de réessayer plus tard.','Fehler, bitte versuche es später nochmal.','Errore, riprova più tardi.','Erro, Por favor tente novamente.','Ошибка, пожалуйста, повторите попытку позже.','Error, trata de nuevo.','Hata, Lütfen daha sonra tekrar deneyin.'),(743,'upgrade_to_pro','Upgrade To Pro','لترقية الى مزايا أكثر','Upgraden naar Pro','Passer à Pro','Upgrade auf Pro','Aggiornamento a Pro','Upgrade To Pro','Обновление до Pro','Para actualizar Pro','Pro&#039;ya yükselt'),(744,'no_answer','No answer','لا يوجد رد','Geen antwoord','Pas de réponse','Keine Antwort','Nessuna risposta','Sem resposta','Нет ответа','Sin respuesta','Cevap yok'),(745,'please_try_again_later','Please try again later.','الرجاء المحاولة لاحقا.','Probeer het later opnieuw.','Veuillez réessayer plus tard.','Bitte versuchen Sie es später noch einmal.','Per favore riprova più tardi.','Por favor, tente novamente mais tarde.','Пожалуйста, повторите попытку позже.','Por favor, inténtelo de nuevo más tarde.','Lütfen daha sonra tekrar deneyiniz.'),(746,'answered','Answered !','تم الرد !','Beantwoord !','répondre !','Beantwortet !','Risposte !','Respondidas !','Ответил !','Contestada !','Yanıtlanan !'),(747,'call_declined','Call declined','تم فصل الإتصال من قبل المستخدم','Call gedaald','Appel refusé','Anruf abgelehnt','chiamata rifiutato','chamada diminuiu','Вызов отказался','Llamar declinó','çağrı reddedildi'),(748,'call_declined_desc','The recipient has declined the call, please try again later.','تم فصل الإتصال من قبل المستخدم, الرجاء المحاولة لاحقا.','De ontvanger heeft de oproep geweigerd, probeer het later opnieuw.','Le destinataire a refusé l&#39;appel, s&#39;il vous plaît essayer à nouveau plus tard.','Der Empfänger hat den Anruf abgelehnt, bitte versuchen Sie es später noch einmal.','Il destinatario ha rifiutato la chiamata, si prega di riprovare più tardi.','O destinatário recusou a chamada, por favor tente novamente mais tarde.','Получатель отклонил вызов, пожалуйста, повторите попытку позже.','El receptor ha rechazado la llamada, por favor intente de nuevo más tarde.','Alıcı çağrıyı reddetti, daha sonra tekrar deneyin.'),(749,'new_video_call','New video call','إتصال فيديو','Nieuwe video-oproep','Nouvel appel vidéo','Neue Videoanruf','Nuovo video chiamata','chamada de vídeo novo','Новое видео вызова','Nueva llamada de video','Yeni video görüşmesi'),(750,'new_video_call_desc','wants to video chat with you.','يريد ان يحدثك عن طريق الفيديو.','wil video chatten met je.','veut le chat vidéo avec vous.','möchte mit Ihnen Video-Chat.','vuole chat video con te.','quer vídeo chat com você.','хочет видео-чат с вами.','quiere chatear con video con usted.','Sizinle görüntülü sohbet etmek istiyor.'),(751,'decline','Decline','فصل','Afwijzen','Déclin','Ablehnen','Declino','Declínio','снижение','Disminución','düşüş'),(752,'accept_and_start','Accept &amp; Start','القبول &amp; البدأ','Accepteer &amp; Start','Accepter &amp; Start','Akzeptieren &amp; Start','Accetta &amp; Start','Aceitar &amp; Start','принимать','Aceptar &amp; Start','Kabul Et ve Başlaı'),(753,'calling','Calling','يتم الإتصال','Roeping','Appel','Berufung','chiamata','chamada','призвание','Vocación','çağrı'),(754,'calling_desc','Please wait for your friend answer.','الرجاء الإنتظار لحين يتم الرد من قبل المستخدم.','Wacht tot je vriend antwoord op de video chat starten.','S&#39;il vous plaît attendre votre ami répondre à démarrer le chat vidéo.','Bitte warten Sie, Ihr Freund das Video-Chat zu starten beantworten.','Si prega di attendere per il vostro amico a rispondere per avviare la chat video.','Por favor aguarde o amigo responder para iniciar o bate-papo de vídeo.','Пожалуйста, подождите, ваш друг ответить, чтобы начать видео чат.','Por favor, espere a que su amigo responde a iniciar el chat de vídeo.','Arkadaşınız, video sohbet başlatmak için cevap için bekleyin.'),(755,'your_friends_chat','You&#039;re friends on {site_name}','أنتم أصدقاء في {site_name}','Je bent vrienden op {site_name}','Vous êtes amis sur {site_name}','Sie sind freunde auf {site_name}','Sei amici su {site_name}','Você é amigos {site_name}','Вы друзья на {site_name}','Eres amigos en {site_name}','Üzerinde dostuz {site_name}'),(756,'your_following','You&#039;re following','أنت تتابع','Je volgt','Vous suivez','Sie folgen','Stai seguendo','Você está seguindo','Вы следующие','Usted está siguiendo','İzlediğiniz'),(757,'see_all','See all','الكل','alles zien','Voir tout','Alles sehen','Vedi tutti','Ver todos','Увидеть все','Ver todo','Hepsini gör'),(758,'me','Me','أنا','Me','Moi','Mich','Me','Mim','меня','Yo','Ben'),(759,'post_promotion_hot','Echo up to {monthly_boosts} posts&lt;br&gt;','نشر اكثر من {monthly_boosts} منشورات &lt;br&gt;&lt;small&gt;({monthly_boosts} في نفس الوقت 7/24)&lt;/small&gt;','{monthly_boosts} berichten omhoog plaatsen&lt;br&gt;&lt;small&gt;({monthly_boosts} tegelijk 7/24)&lt;/small&gt;','Echo up to {monthly_boosts} posts&lt;br&gt;&lt;small&gt;({monthly_boosts} in same time 7/24)&lt;/small&gt;','Bis zu {monthly_boosts} Beiträge hervorheben&lt;br&gt;&lt;small&gt;({monthly_boosts} Beiträge gleichen Zeit 7/24)&lt;/small&gt;','Echo fino a {monthly_boosts} posti&lt;br&gt;&lt;small&gt;({monthly_boosts} nel contempo 7/24)&lt;/small&gt;','Impulsionar até {monthly_boosts} postagens&lt;br&gt;&lt;small&gt;({monthly_boosts} ao mesmo tempo 7/24)&lt;/small&gt;','Повышение до {monthly_boosts} сообщений&lt;br&gt;&lt;small&gt;({monthly_boosts} в то же время 7/24)&lt;/small&gt;','Promociona asta {monthly_boosts} posts&lt;br&gt;&lt;small&gt;({monthly_boosts} al mismo tiempo 7/24)&lt;/small&gt;','{monthly_boosts} mesaj yükselt&lt;br&gt;&lt;small&gt;({monthly_boosts} aynı zamanda 7/24)&lt;/small&gt;'),(760,'page_promotion_hot','Echo up to {monthly_boosts} pages&lt;br&gt;','نشر اكثر من {monthly_boosts} صفحات&lt;br&gt;&lt;small&gt;({monthly_boosts} في نفس الوقت 7/24)&lt;/small&gt;','{monthly_boosts} pagina&#039;s omhoog plaatsen&lt;br&gt;&lt;small&gt;({monthly_boosts} tegelijk 7/24)&lt;/small&gt;','Echo up to {monthly_boosts} pages&lt;br&gt;&lt;small&gt;({monthly_boosts} in same time 7/24)&lt;/small&gt;','Bis zu {monthly_boosts} Seiten hervorheben&lt;br&gt;&lt;small&gt;({monthly_boosts} Seiten zur gleichen Zeit 7/24)&lt;/small&gt;','Echo fino a {monthly_boosts} pagine&lt;br&gt;&lt;small&gt;({monthly_boosts} nel contempo 7/24)&lt;/small&gt;','Impulsionar até {monthly_boosts} páginas&lt;br&gt;&lt;small&gt;({monthly_boosts} ao mesmo tempo 7/24)&lt;/small&gt;','Повышение до {monthly_boosts} страниц&lt;br&gt;&lt;small&gt;({monthly_boosts} в то же время 7/24)&lt;/small&gt;','Promociona asta {monthly_boosts} paginas&lt;br&gt;&lt;small&gt;({monthly_boosts} al mismo tiempo 7/24)&lt;/small&gt;','{monthly_boosts} sayfa yükselt&lt;br&gt;&lt;small&gt;({monthly_boosts} aynı zamanda 7/24)&lt;/small&gt;'),(761,'post_promotion_ultima','Boost up to {yearly_boosts} posts&lt;br&gt;','نشر اكثر من {yearly_boosts} منشورات&lt;br&gt;&lt;small&gt;({yearly_boosts} في نفس الوقت 7/24)&lt;/small&gt;','{yearly_boosts} berichten omhoog plaatsen&lt;br&gt;&lt;small&gt;({yearly_boosts} tegelijk 7/24)&lt;/small&gt;','Boost up to {yearly_boosts} posts&lt;br&gt;&lt;small&gt;({yearly_boosts} in same time 7/24)&lt;/small&gt;','Bis zu {yearly_boosts} Beiträge hervorheben&lt;br&gt;&lt;small&gt;({yearly_boosts} Beiträge zur gleichen Zeit 7/24)&lt;/small&gt;','Boost fino a {yearly_boosts} posti&lt;br&gt;&lt;small&gt;({yearly_boosts} nel contempo 7/24)&lt;/small&gt;','Impulsionar até {yearly_boosts} postagens&lt;br&gt;&lt;small&gt;({yearly_boosts} ao mesmo tempo 7/24)&lt;/small&gt;','Повысить до {yearly_boosts} должностей&lt;br&gt;&lt;small&gt;({yearly_boosts} в то же время 7/24)&lt;/small&gt;','Promociona asta {yearly_boosts} posts&lt;br&gt;&lt;small&gt;({yearly_boosts} al mismo tiempo 7/24)&lt;/small&gt;','{yearly_boosts} mesaj yükselt&lt;br&gt;&lt;small&gt;({yearly_boosts} aynı zamanda 7/24)&lt;/small&gt;'),(762,'page_promotion_ultima','Boost up to {yearly_boosts} pages&lt;br&gt;','نشر اكثر من {yearly_boosts} صفحات&lt;br&gt;&lt;small&gt;({yearly_boosts} في نفس الوقت 7/24)&lt;/small&gt;','{yearly_boosts} pagina&#039;s omhoog plaatsen&lt;br&gt;&lt;small&gt;({yearly_boosts} tegelijk 7/24)&lt;/small&gt;','Boost up to {yearly_boosts} pages&lt;br&gt;&lt;small&gt;({yearly_boosts} in same time 7/24)&lt;/small&gt;','Bis zu {yearly_boosts} Seiten hervorheben&lt;br&gt;&lt;small&gt;({yearly_boosts} Seiten zur gleichen Zeit 7/24)&lt;/small&gt;','Boost fino a {yearly_boosts} pagine&lt;br&gt;&lt;small&gt;({yearly_boosts} nel contempo 7/24)&lt;/small&gt;','Impulsionar até {yearly_boosts} páginas&lt;br&gt;&lt;small&gt;({yearly_boosts} ao mesmo tempo 7/24)&lt;/small&gt;','Повышение до {yearly_boosts} страниц&lt;br&gt;&lt;small&gt;({yearly_boosts} в то же время 7/24)&lt;/small&gt;','Promociona asta {yearly_boosts} paginas&lt;br&gt;&lt;small&gt;({yearly_boosts} al mismo tiempo 7/24)&lt;/small&gt;','{yearly_boosts} sayfa yükselt&lt;br&gt;&lt;small&gt;({yearly_boosts} aynı zamanda 7/24)&lt;/small&gt;'),(763,'post_promotion_vip','Boost up to {lifetime_boosts} posts&lt;br&gt;','نشر اكثر من {lifetime_boosts} منشورات&lt;br&gt;&lt;small&gt;({lifetime_boosts} في نفس الوقت 7/24)&lt;/small&gt;','Boost up to {lifetime_boosts} posts&lt;br&gt;&lt;small&gt;({lifetime_boosts} in same time 7/24)&lt;/small&gt;','Boost up to {lifetime_boosts} posts&lt;br&gt;&lt;small&gt;({lifetime_boosts} in same time 7/24)&lt;/small&gt;','Bis zu {lifetime_boosts} Beiträge hervorheben&lt;br&gt;&lt;small&gt;({lifetime_boosts} Beiträge zur gleichen Zeit 7/24)&lt;/small&gt;','Boost fino a {lifetime_boosts} posti&lt;br&gt;&lt;small&gt;({lifetime_boosts} nel contempo 7/24)&lt;/small&gt;','Impulsionar até {lifetime_boosts} postagens&lt;br&gt;&lt;small&gt;({lifetime_boosts} ao mesmo tempo 7/24)&lt;/small&gt;','Повысить до {lifetime_boosts} должностей&lt;br&gt;&lt;small&gt;({lifetime_boosts} in same time 7/24)&lt;/small&gt;','Promociona asta {lifetime_boosts} posts&lt;br&gt;&lt;small&gt;({lifetime_boosts} al mismo tiempo 7/24)&lt;/small&gt;','{lifetime_boosts} mesaj yükselt&lt;br&gt;&lt;small&gt;({lifetime_boosts} aynı zamanda 7/24)&lt;/small&gt;'),(764,'page_promotion_vip','Boost up to {lifetime_boosts} pages&lt;br&gt;','نشر اكثر من {lifetime_boosts} صفحات&lt;br&gt;&lt;small&gt;({lifetime_boosts} في نفس الوقت 7/24)&lt;/small&gt;','Boost up to {lifetime_boosts} pages&lt;br&gt;&lt;small&gt;({lifetime_boosts} in same time 7/24)&lt;/small&gt;','Boost up to {lifetime_boosts} pages&lt;br&gt;&lt;small&gt;({lifetime_boosts} in same time 7/24)&lt;/small&gt;','Bis zu {lifetime_boosts} Seiten hervorheben&lt;br&gt;&lt;small&gt;({lifetime_boosts} Seiten zur gleichen Zeit 7/24)&lt;/small&gt;','Boost fino a {lifetime_boosts} pagine&lt;br&gt;&lt;small&gt;({lifetime_boosts} nel contempo 7/24)&lt;/small&gt;','Impulsionar até {lifetime_boosts} páginas&lt;br&gt;&lt;small&gt;({lifetime_boosts} ao mesmo tempo 7/24)&lt;/small&gt;','Повышение до {lifetime_boosts} страниц&lt;br&gt;&lt;small&gt;({lifetime_boosts} в то же время 7/24)&lt;/small&gt;','Promociona asta {lifetime_boosts} paginas&lt;br&gt;&lt;small&gt;({lifetime_boosts} al mismo tiempo 7/24)&lt;/small&gt;','{lifetime_boosts} sayfa yükselt&lt;br&gt;&lt;small&gt;({lifetime_boosts} aynı zamanda 7/24)&lt;/small&gt;'),(765,'sign_up','Sign up','التسجيل','Aanmelden','S&#39;inscrire','Anmelden','Registrazione','inscrever-se','зарегистрироваться','Regístrate','Kaydol'),(766,'youtube','YouTube','يوتيوب','YouTube','YouTube','YouTube','YouTube','Youtube','YouTube','Youtube','YouTube'),(767,'my_products','My Products','منتجاتي','mijn producten','Mes produits','Meine Produkte','I miei prodotti','meus produtos','Мои продукты','Mis productos','Ürünlerim'),(768,'choose_a_payment_method','Choose a payment method','اختر طريقة الدفع','Kies een betaalmethode','Choisissez une méthode de paiement','Wählen Sie eine Zahlungsmethode','Scegliere un metodo di pagamento','Escolha um método de pagamento','Выберите способ оплаты','Elija un método de pago','Bir ödeme yöntemi seçin'),(769,'paypal','PayPal','باي بال','PayPal','PayPal','PayPal','PayPal','PayPal','PayPal','PayPal','PayPal'),(770,'credit_card','Credit Card','بطاقة ائتمان','Credit Card','Credit Card','Kreditkarte','Carta di credito','Cartão de crédito','Кредитная карта','Tarjeta de crédito','Kredi Kartı'),(771,'bitcoin','Bitcoin','بيتكوين','Bitcoin','Bitcoin','Bitcoin','Bitcoin','Bitcoin','Bitcoin','Bitcoin','Bitcoin'),(772,'categories','Categories','الإقسام','Categorieën','Catégories','Kategorien','Categorie','Categorias','категории','Categorías','Kategoriler'),(773,'latest_products','Latest Products','آخر المنتجات','nieuwste producten','Derniers produits','Neueste Produkte','Gli ultimi prodotti','Produtos Mais recentes','Последние поступления','últimos productos','Yeni ürünler'),(774,'search_for_products_main','Search for products','إبحث عن منتج','Zoeken naar producten','Recherche de produits','Suche nach Produkten','Ricerca di prodotti','Pesquisa de produtos','Поиск продукции','Búsqueda de productos','Ürün ara'),(775,'search_for_products','Search for products in {category_name}','بحث عن منتج في {category_name}','Zoeken naar producten in {category_name}','Recherche de produits dans {category_name}','Suche nach Produkten im {category_name}','Ricerca di prodotti in {category_name}','Pesquisa para os produtos em {category_name}','Поиск продукции в {category_name}','Búsqueda de productos en {category_name}','Ürünlerde ara {category_name}'),(776,'no_available_products','No available products to show.','لا توجد منتجات متاحة.','Geen beschikbare tonend.','Pas de produits disponibles pour afficher.','Keine verfügbaren Produkte zu zeigen.','Non ci sono prodotti disponibili da mostrare.','Não há produtos disponíveis para mostrar.','Нет доступных продуктов для отображения.','No hay productos disponibles para mostrar.','Kullanılabilir bir ürün bulunamadı'),(777,'load_more_products','Load more products','تحميل المزيد من المنتجات','Laad meer producten','Chargez plus de produits','Laden Sie weitere Produkte','Caricare più prodotti','Carregar mais produtos','Загрузить больше продуктов','Cargar más productos','Daha fazla ürün göster'),(778,'sell_new_product','Sell new product','بيع منتج جديد','Verkoop een nieuw product','Vente nouveau produit','Verkauf neuer Produkte','Vendita nuovo prodotto','Vender novo produto','Продаем новый продукт','Vender nuevos productos','Yeni bir ürün sat'),(779,'description','Description','الوصف','Beschrijving','La description','Beschreibung','Descrizione','Descrição','Описание','Descripción','Açıklama'),(780,'please_describe_your_product','Please describe your product.','يرجى وصف المنتج الخاص بك.','Beschrijf uw product.','S&#39;il vous plaît décrire votre produit.','Bitte beschreiben Sie Ihr Produkt.','Si prega di descrivere il tuo prodotto.','Por favor, descreva o seu produto.','Пожалуйста, опишите ваш продукт.','Por favor describa su producto.','Ürününüzü açıklayın'),(781,'used','Used','مستعمل','Gebruikt','Utilisé','Benutzt','Usato','Usava','Используемый','Usado','Kullanılan'),(782,'new','New','جديد','Nieuwe','Nouveau','Neu','Nuovo','Novo','новый','Nuevo','Yeni'),(783,'price','Price','السعر','Prijs','Prix','Preis','Prezzo','Preço','Цена','Precio','Fiyat'),(784,'your_product_price','Your product price in USD currency ($), e.g (10.99)','سعر المنتج في الدولار ($), مثال (10.99)','Uw product prijs in USD valuta ($), e.g (10.99)','Votre prix du produit en monnaie USD ($), e.g (10.99)','Ihr Produktpreis in USD ($), e.g (10.99)','Il prezzo del prodotto in valuta USD ($), e.g (10.99)','Seu preço do produto em USD ($), por exemplo (10,99)','Ваша цена продукта в USD валюте ($) области, например (10,99)','Su precio del producto en USD ($), por ejemplo (10.99)','Ürün fiyatı dolar para birimi cinsinden ($), ör: (10.99)'),(785,'edit_product','Edit product','تحرير المنتج','Product bewerken','Modifier le produit','Bearbeiten Produkt','Modifica del prodotto','Editar produto','Изменить продукт','Editar producto','Ürün düzenle'),(786,'publish','Publish','نشر','Publiceren','Publier','Veröffentlichen','Pubblicare','Publicar','Публиковать','Publicar','Yayınla'),(787,'more_info','More info','المزيد','Meer informatie','More info','Mehr Infos','Ulteriori informazioni','Mais informações','Больше информации','Más información','Daha fazla bilgi'),(788,'contact_seller','Contact seller','تواصل مع البائع','De aanbieders contacteren','Contacter le vendeur','Verkäufer kontaktieren','Contatta il venditore','Contactar fornecedor','Связаться с продавцом','Contacte al vendedor','Satıcı olmak için başvurun'),(789,'by_product','By &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, posted {product_time}, in &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','بواسطة &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, نشر {product_time}, في &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','Door &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, gepost {product_time}, in &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','Par &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, posté {product_time}, dans &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','Durch &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, gesendet {product_time}, im &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','Di &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, postato {product_time}, in &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','Por &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, postou {product_time}, em &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','По &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, размещенном {product_time}, в &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','Por &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, publicado {product_time}, en &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;','Satışda olan ürün: &lt;a href=&quot;{product_url}&quot;&gt;{product_name}&lt;/a&gt;, Satışa başladığı zaman: {product_time}, Satış kategorisi: &lt;a href=&quot;{product_category}&quot;&gt;{product_category_name}&lt;/a&gt;'),(790,'payment_declined','Payment declined, please try again later.','حدثت مشكلة ، يرجى المحاولة مرة أخرى في وقت لاحق.','Betaling geweigerd, probeer het later opnieuw.','Paiement refusé, s&#39;il vous plaît essayer à nouveau plus tard.','Zahlung abgelehnt, bitte versuchen Sie es später noch einmal.','Pagamento rifiutato, riprova più tardi.','Pagamento recusado, por favor tente novamente mais tarde.','Платеж отклонен, пожалуйста, повторите попытку позже.','Pago rechazado, por favor intente de nuevo más tarde.','Ödeme reddedildi, lütfen daha sonra tekrar deneyin.'),(791,'c_payment','Confirming payment, please wait..','تأكيد الدفع، يرجى الانتظار ..','Bevestiging van de betaling, even geduld aub ..','paiement confirmant, s&#39;il vous plaît patienter ..','Bestätigen Zahlung, bitte warten ..','Confermando il pagamento, si prega di attendere ..','Confirmação do pagamento, aguarde por favor ..','Подтверждение оплаты, пожалуйста, подождите ..','Confirmar el pago, por favor espere ..','Ödeme kontrol ediliyor, lütfen bekleyin.'),(792,'earn_users','Earn up to ${amount} for each user your refer to us !','إكسب ما يصل الى ${amount} لكل مستخدم يسجل من جانبك !','Verdien tot ${amount} voor elke gebruiker je verwijzen naar ons!','Gagnez jusqu&#39;à ${amount} pour chaque utilisateur de votre référence à nous!','Verdienen Sie bis zu ${amount} Für jeden Benutzer beziehen Ihr uns!','Guadagna fino a ${amount} per ogni utente il vostro si riferiscono a noi!','Ganhe até ${amount} para cada usuário sua referem-se a nós!','Заработайте до ${amount} для каждого пользователя вашего обратитесь к нам!','Gane hasta ${amount} para cada usuario su refieren a nosotros!','Her kullanıcıdan ${amount} daha fazla kazanmak için bizi izleyin.'),(793,'earn_users_pro','Earn up to ${amount} for each user your refer to us and will subscribe to any of our pro packages.','إكسب ما يصل الى ${amount} لكل مستخدم يسجل من جانبك ويشترك باحدى عروضنا','Verdien tot ${amount} voor elke gebruiker je verwijzen naar ons en zal zich abonneren op een van onze propakketten.','Gagnez jusqu&#39;à ${amount} pour chaque utilisateur de votre référence à nous et souscrira à un de nos forfaits pro.','Verdienen Sie bis zu ${amount} Für jeden Benutzer beziehen Ihr für uns und wird zu einem unserer Pro-Pakete abonnieren.','Guadagna fino a ${amount} per ogni utente il vostro si riferiscono a noi e sottoscriverà uno qualsiasi dei nostri pacchetti pro.','Ganhe até ${amount} para cada usuário sua referem-se a nós e vai inscrever-se a qualquer um dos nossos profissionais pacotes.','Заработайте до ${amount} для каждого пользователя вашего обратитесь к нам и подписаться на любой из наших профессиональных пакетов.','Gane hasta ${amount} para cada usuario su refieren a nosotros y suscribirse a cualquiera de nuestros redactores paquetes.','Her kullanıcıdan ${amount} kazanmak için daha fazla pro paketlerimize abone olacak.'),(794,'my_affiliates','My Affiliates','دعوة الأصدقاء بالمكافأة','Mijn Affiliates','Mes Affiliés','Meine Affiliates','I miei affiliati','meus Afiliados','Мои Филиалы','Mis Afiliados','Benim referanslarım'),(795,'my_balance','My balance','رصيدي','Mijn balans','Mon solde','Mein Gleichgewicht','Il mio equilibrio','Meu saldo','Мой баланс','Mi balance','Bakiyem'),(796,'your_ref_link','Your affiliate link is','اللينك الخاص بك هو','Uw affiliate link is','Votre lien d&#39;affiliation est','Ihre Affiliate Link ist','Il tuo link:','Sua ligação da filial é','Ваша партнерская ссылка','Su red de afiliados es','Referans adresi'),(797,'your_balance','Your balance is ${balance}, minimum withdrawal request is ${m_withdrawal}','رصيدك هو ${balance}, الحد الأدنى لطلب السحب ${m_withdrawal}','Uw saldo is ${balance}, minimum een verzoek tot uitbetaling ${m_withdrawal}','Votre solde est ${balance}, demande de retrait minimum est ${m_withdrawal}','Ihre Waage ist ${balance}, minimum withdrawal request is ${m_withdrawal}','La bilancia è ${balance}, richiesta di prelievo minimo è ${m_withdrawal}','Seu saldo é de R ${balance} equilíbrio, o pedido de retirada mínima é de R ${m_withdrawal}','Ваш баланс составляет ${balance} баланс, минимальный запрос на вывод средств составляет ${m_withdrawal}','Su saldo es de ${balance} equilibrio, la solicitud de retiro mínimo es ${m_withdrawal}','Bakiyeniz ${balance}, minimum çekebileceğiniz tutar ${m_withdrawal}'),(798,'your_balance_is','Your balance is','رصيدك هو','Uw saldo is','Votre solde est','Ihre waage ist','La bilancia è','Seu saldo é','Ваш баланс','Su saldo es','Bakiyeniz'),(799,'paypal_email','PayPal email','أيميل البايبال الخاص بك','PayPal email','PayPal email','PayPal email','PayPal email','Email do Paypal','PayPal по электронной почте','E-mail de Paypal','PayPal e-posta adresi'),(800,'amount_usd','Amount (USD)','القيمة (دولار امريكي)','Bedrag (USD)','Montant (USD)','Menge (USD)','Quantità (USD)','Montante (USD)','Сумма (USD)','Monto (USD)','Tutar (USD)'),(801,'request_withdrawal','Request withdrawal','اسحب الرصيد','verzoek tot uitbetaling','Demande de retrait','Antrag rückzug','richiesta di prelievo','pedido de retirada','Запрос вывода','solicitud de retiro','Para çekme talebi'),(802,'payment_history','Payment History','تاريخ الدفع','Betaalgeschiedenis','Historique de paiement','Zahlungshistorie','Storico dei pagamenti','Histórico de pagamento','История платежей','historial de pagos','Ödeme tarihi'),(803,'amount','Amount','القيمة','Bedrag','Montant','Menge','Quantità','Quantidade','Количество','Cantidad','Tutar'),(804,'declined','Declined','تم الرفض','Afgewezen','Refusée','Abgelehnt','Rifiutato','Recusado','Отклонено','disminuido','Reddedildi'),(805,'approved','Approved','م القبول','Aangenomen','A approuvé','Genehmigt','Approvato','aprovado','утвержденный','Aprobado','Onaylandı'),(806,'total_votes','Total votes','مجموع الأصوات','Totaal aantal stemmen','Des votes','Anzahl der Kundenbewertungen','Totale voti','total de votos','Всего голосов','Total de votos','Toplam oy'),(807,'mark_as_sold','Mark Product As Sold','تم بيع المنتج','Mark Product zoals verkocht','Marque produit vendu','Mark erhältliche Erzeugnis','Mark prodotto commerciale','Mark produto comercializado','Маркировка продукта Как Продано','Marca de producto comercializado','Satılan ürün'),(808,'added_new_product_for_sell','added new product for sell.','ضاف منتج جديد للبيع.','toegevoegd nieuw product voor verkoopt.','nouveau produit ajouté pour vendre.','hinzugefügt neues Produkt zu verkaufen.','nuovo prodotto aggiunto per vendere.','adicionou novo produto para vender.','добавлен новый продукт для продажи.','añadido nuevo producto para la venta.','Yeni ürün satış için eklendi'),(809,'product_name','Product Name','اسم المنتج','productnaam','Nom du produit','Produktname','nome del prodotto','Nome do Produto','наименование товара','nombre del producto','Ürün adı'),(810,'in_stock','In stock','متاح','Op voorraad','en magasin','Auf Lager','Disponibile','Em estoque','В наличии','En stock','Stokda kaç adet var'),(811,'sold','Sold','تم البيع','Uitverkocht','Vendu','Verkauft','Venduto','Vendido','Продан','Vendido','Satılan'),(812,'answer','Answer','الجواب','Antwoord','Répondre','Antworten','Risposta','Responda','Ответ','Responder','Cevap'),(813,'add_answer','Add answer','إضافة جواب','Antwoord toevoegen','Ajouter une réponse','In Antwort','Aggiungi risposta','Adicionar resposta','Добавить ответ','Añadir respuesta','Cevap ekle'),(814,'authenticating','Authenticating','جاري تدقيق المعلومات','Authentiserende','Authentifier','Authentifizieren','autenticazione','autenticação','удостовер','de autenticación','Kimlik doğrulama'),(815,'welcome_back','Welcome back!','أهلا بك!','Welkom terug!','Nous saluons le retour!','Willkommen zurück!','Ben tornato!','Bem vindo de volta!','Добро пожаловать!','¡Dar una buena acogida!','Tekrar hoşgeldiniz!'),(816,'welcome_','Welcome!','أهلا بك!','Welkom!','Bienvenue!','Willkommen!','Benvenuto!','Bem vinda!','Добро пожаловать!','¡Bienvenido!','Hoşgediniz!'),(817,'connect_with_people','Connect with people.','تواصل مع الناس.','Contact maken met mensen.','Communiquer avec les gens.','Verbinden Sie sich mit Menschen.','Connettiti con persone.','Conectar com as pessoas.','Общайтесь с людьми.','Conectar con la gente.','İnsanlarla sürekli bağlantıda ol.'),(818,'make_new_friends','Make new friends.','كون صداقات جديدة.','Maak nieuwe vrienden.','Se faire de nouveaux amis.','Neue Freunde finden.','Fare nuovi amici.','Fazer novos amigos.','Завести новых друзей.','Hacer nuevos amigos.','Yeni arkadaşlar edin.'),(819,'share_your_memories','Echo your memories.','شارك ذكرياتك.','Deel je herinneringen.','Partagez vos souvenirs.','Teilen Sie Ihre Erinnerungen.','Condividi i tuoi ricordi.','Partilhar as suas memórias.','Поделитесь своими воспоминаниями.','Compartir sus recuerdos.','Anılarını paylaş.'),(820,'create_new_relationships','Create new relationships.','أنشىء علاقات جديدة.','Maak nieuwe relaties.','Créer de nouvelles relations.','Erstellen Sie neue Beziehungen.','Crea nuove relazioni.','Criar novos relacionamentos.','Создание новых отношений.','Crear nuevas relaciones.','Yeni bir ilişki oluştur.'),(821,'discover_new_places','Discover new places.','إكتشف أماكن جديدة.','Ontdek nieuwe plaatsen.','Découvrez de nouveaux endroits.','Entdecken Sie neue Orte.','Scoprire posti nuovi.','Descubra novos lugares.','Откройте для себя новые места.','Descubrir nuevos lugares.','Yeni yerler keşfet.'),(822,'forgot_your_password','Forgot your password?','هل نسيت كلمة المرور?','Je wachtwoord vergeten?','Mot de passe oublié?','Haben Sie Ihr Passwort vergessen','Hai dimenticato la password?','Esqueceu sua senha?','Забыли пароль?','¿Olvidaste tu contraseña?','Şifreni mi unuttun?'),(823,'invalid_markup','Invalid markup, please try to reset your password again','العلامة غير صالحة، يرجى المحاولة لإعادة تعيين كلمة المرور الخاصة بك مرة أخرى','Ongeldige markup, dan kunt u proberen om uw wachtwoord opnieuw in te resetten','balisage non valide, s&#39;il vous plaît essayez de réinitialiser votre mot de passe','Ungültige Markup, versuchen Sie Ihr Passwort wieder zurücksetzen','markup non valido, provare a reimpostare nuovamente la password','marcação inválida, por favor, tente redefinir sua senha novamente','Недопустимая разметка, пожалуйста, попробуйте сбросить пароль еще раз','marcado no válido, intenta restablecer la contraseña de nuevo','Geçersiz karakter kullandınız lütfen tekrar deneyin.'),(824,'go_back','Go back','الرجوع','Go back','Go back','Geh zurück','Go back','Volte','Возвращаться','Regresa','Geri git'),(825,'terms_agreement','By creating your account, you agree to our','قبل إنشاء الحساب الخاص بك، فإنك توافق على','Door het maken van uw account, gaat u akkoord met onze','En créant votre compte, vous acceptez nos','Durch die Erstellung Ihres Kontos stimmen Sie unseren','Creando il tuo account, accettate la nostra','Ao criar sua conta, você concorda com a nossa','При создании учетной записи, вы согласны с нашими','Al crear su cuenta, usted está de acuerdo con nuestra','Hesabınızı oluşturduğunuzda gizlilik şartlarımızı kabul etmiş sayılırsınız.'),(826,'please_choose_price','Please choose a price for your product','الرجاء اختيار سعر المنتج الخاص بك','Kies een prijs voor uw product','S&#39;il vous plaît choisir un prix pour votre produit','Bitte wählen Sie einen Preis für Ihr Produkt','Scegliere un prezzo per il prodotto','Por favor, escolha um preço para seu produto','Пожалуйста, выберите цену для вашего продукта','Por favor, elija un precio para su producto','Lütfen dürtmek için bir fiyat seçiniz'),(827,'please_choose_c_price','Please choose a correct value for your price','الرجاء اختيار القيمة الصحيحة للسعر الخاص بك','Kies een juiste waarde voor uw prijs','S&#39;il vous plaît choisir une valeur correcte pour votre prix','Bitte wählen Sie einen korrekten Wert für Ihr Preis','Scegliere un valore corretto per il vostro prezzo','Por favor, escolha um valor correto para o seu preço','Пожалуйста, выберите правильное значение для вашей цене','Por favor, elija un valor correcto para el precio','Lütfen fiyatı güncellerken bir değer giriniz'),(828,'please_upload_image','Please upload at least 1 photo','يرجى تحميل صورة واحد كحد ادنى','Upload ten minste 1 foto','S&#39;il vous plaît télécharger au moins 1 photo','Bitte laden Sie mindestens 1 Foto','Carica almeno 1 foto','Faça o upload de pelo menos 1 foto','Пожалуйста, загрузите по крайней мере 1 фото','Sube al menos 1 foto','Lütfen en az bir fotoğraf yükleyin'),(829,'you_have_already_voted','You have already voted this poll.','لقد قمت بالتصويت بالفعل لهذا الإستطلاع.','Je hebt al deze poll gestemd.','Vous avez déjà voté ce sondage.','Sie haben bereits abgestimmt diese Umfrage.','Hai già votato questo sondaggio.','Você já votou nesta enquete.','Вы уже голосовали этот опрос.','Ya ha votado esta encuesta.','Zaten bu ankete oy kullandın'),(830,'you_have_pending_request','You have already a pending request.','لديك بالفعل طلب معلق.','U heeft al een aanvraag in behandeling.','Vous avez déjà une demande en attente.','Sie haben bereits eine ausstehende Anforderung.','Hai già una richiesta in sospeso.','Você já tem um pedido pendente.','У вас есть уже отложенный запрос.','Ya tiene una solicitud pendiente.','Bekleyen bir isteğin var'),(831,'invalid_amount_value','Invalid amount value','قيمة غير صالحة','Ongeldig bedrag waarde','valeur de quantité non valide','Ungültige Betragswert','valore di importo non valido','valor montante inválido','Неверное значение суммы','valor de la cantidad no válida','Geçersiz bir miktar yazdın'),(832,'invalid_amount_value_your','Invalid amount value, your amount is:','قيمة غير صالحة, رصيدك هو:','Ongeldig bedrag waarde, uw bedrag is:','Valeur de quantité non valide, le montant est:','Ungültige Menge Wert, Ihre Menge ist:','valore di importo non valido, l&#039;importo è:','valor montante inválido, o valor é:','Неверное значение суммы, ваша сумма:','valor de la cantidad no válida, su cantidad es:','Geçersiz bir miktar yazdınız, bu tutar geöerli değildir:'),(833,'invalid_amount_value_withdrawal','Invalid amount value, minimum withdrawal request is:','قيمة غير صالحة, الحد الأدنى لطلب السحب:','Ongeldig bedrag waarde, minimum een verzoek tot uitbetaling:','valeur de quantité non valide, demande de retrait minimum est de:','Ungültige Betragswert , mindestauszahlungs anforderung ist:','Invalid amount value, minimum withdrawal request is:','valor montante inválido, o pedido de retirada mínima é:','Неверное значение суммы, минимальный запрос на вывод средств является:','valor de la cantidad no válida, la solicitud de retiro mínimo es:','Geçersiz tutar yazdınız minimum para çekme talebi:'),(834,'you_request_sent','Your request has been sent, you&#039;ll receive an email regarding the payment details soon.','تم إرسال طلبك، سوف تتلقى رسالة بريد إلكتروني حول تفاصيل المبلغ في وقت قريب.','Uw aanvraag is verzonden, zult u een e-mail met betrekking tot de betalingsgegevens binnenkort.','Votre demande a été envoyée, vous recevrez un e-mail concernant les détails de paiement bientôt.','Ihre Anfrage gesendet wurde, erhalten Sie eine E-Mail in Bezug auf die Zahlungsdetails erhalten bald.','La vostra richiesta è stata inviata, riceverai una e-mail per quanto riguarda i dati di pagamento al più presto.','O seu pedido foi enviado, você receberá um e-mail sobre os detalhes de pagamento em breve.','Ваш запрос был отправлен, вы получите по электронной почте о деталях платежа в ближайшее время.','Su solicitud ha sido enviado, recibirá un correo electrónico con respecto a los datos de pago pronto.','Para çekme isteğiniz başarı bir şekilde bize ulaştı yakında bununla ilgili bir e-posta göndereceğiz.'),(835,'turn_off_notification','Turn off notification sound','إيقاف صوت الإعلام','Schakel meldingsgeluid','Désactiver la notification sonore','Schalten Sie eine Benachrichtigung Sound','Disattiva suono di notifica','Desligar o som de notificação','Выключите звук уведомления','Desactivar el sonido de notificación','Bildirim sesini kapat'),(836,'turn_on_notification','Turn on notification sound','تشغيل صوت الإعلام','Zet meldingsgeluid','Activer la notification sonore','Schalten Sie eine Benachrichtigung Sound','Accendere il suono di notifica','Ligar som de notificação','Включите звук уведомления','Activar el sonido de notificación','Bildirim sesini aç'),(837,'view_more_posts','View {count} new posts','إظهار {count} منشور جديد','Uitzicht {count} nieuwe berichten','Vue {count} de nouveaux messages','Aussicht {count} neuen beiträge','Vista {count} nuovo messaggio','Veja {count} novas mensagens','Просмотр {count} новых сообщений','Ver {count} mensajes nuevos','Yeni mesajları görüntüle {count}'),(838,'store_posts_by','Store posts by','صنف المنشورات','Store berichten van','postes de magasins par','Zeige Beiträge','Visualizza i messaggi di','mensagens de loja por','Магазин сообщения от','almacenar mensajes de','Mağazada paylaşan'),(839,'new_audio_call','New audio call','إتصال جديد','Nieuwe audiogesprek','Nouveau appel audio','Neuer Audioanruf','Nuova chiamata audio','Nova chamada de áudio','Новый аудио вызов','Nueva llamada de audio','Yeni sesli çağrı'),(840,'new_audio_call_desc','wants to talk with you.','يريد التحدث معك.','wil met je praten.','Veut parler avec vous','Möchte mit Ihnen sprechen.','vuole parlare con te.','Quer falar com você','хочет поговорить с вами.','Quiere hablar contigo','Seninle konuşmak istiyor.'),(841,'audio_call','Audio call','مكالمة صوتية','audio oproep','Appel audio','Audioanruf','chiamata audio','Chamada de áudio','Аудиовызов','llamada de audio','Sesli arama'),(842,'audio_call_desc','talking with','يتحدث مع','praten met','parler avec','sprechen mit','parlando con','conversando com','говорить с','Hablando con','ile konuşmak'),(843,'market','Market','السوق','Markt','Marché','Markt','Mercato','Mercado','рынок','Mercado','Piyasa'),(844,'comment_post_label','Comment','علق','Kommentar','Commentaire','Kommentar','Commento','Comentario','Комментарий','Comentario','Yorum Yap'),(846,'by','By','بواسطة','Door','Par','Durch','Di','De','От','Por','Tarafından'),(847,'load_more_blogs','Load more articles','تحميل المزيد من المقالات','Laad meer artikelen',NULL,'Laden Sie weitere Artikel','Carica altri articoli','Carregar mais artigos','Загрузить другие статьи','Cargar más artículos','Daha fazla makale yükle'),(848,'blog','Blog','مدونة','blog','Blog','Blog','blog','Blog','Блог','Blog','Blog'),(849,'no_blogs_found','No articles found','لم يتم العثور على أية مقالات','Geen artikelen gevonden','Aucun article trouvé','Keine Artikel gefunden','Nessun articolo trovato','Nenhum artigo encontrado','Статьи не найдены','No se encontraron artículos','Makale bulunamadı'),(850,'most_recent_art','Most recent articles','أحدث المقالات','Meest recente artikelen','Articles les plus récents','Die neuesten Artikel','Articoli più recenti','Artigos mais recentes','Последние статьи','Artículos más recientes','En yeni makaleler'),(851,'create_new_article','Create new article','إنشاء مقالة جديدة','Nieuwe artikel','Créer un nouvel article','Erstellen Sie einen neuen Artikel','Crea un nuovo articolo','Criar novo artigo','Создать новую статью','Crear un nuevo artículo','Yeni makale oluştur'),(852,'my_articles','My articles','مقالاتي','mijn artikelen','Mes articles','Meine Artikel','I miei articoli','Meus artigos','Мои статьи','Mis artículos','Makalelerim'),(853,'title','Title','عنوان','Titel','Titre','Titel','Titolo','Título','заглавие','Título','Başlık'),(854,'content','Content','يحتوى','Inhoud','Contenu','Inhalt','Soddisfare','Conteúdo','Содержание','Contenido','İçerik'),(855,'select','Select','تحديد','kiezen','Sélectionner','Wählen','Selezionare','Selecionar','Выбрать','Seleccionar','Seç'),(856,'tags','Tags','العلامات','Tags','Mots clés','Tags','tag','Tag','Теги','Etiquetas','Etiketler'),(857,'thumbnail','Thumbnail','صورة مصغرة','thumbnail','La vignette','Miniaturansicht','Thumbnail','Miniatura','Значок видео','Miniatura','Küçük resim'),(858,'published','Published','نشرت','Gepubliceerd','Publié','Veröffentlicht','Pubblicato','Publicados','Опубликовано','Publicado','Yayınlanan'),(859,'views','Views','الآراء','Uitzichten','Vues','Ansichten','Visualizzazioni','Visualizações','Просмотры','Puntos de vista','Görüntüler'),(860,'article_updated','Your article has been successfully updated','تم تحديث مقالتك بنجاح','Uw artikel is bijgewerkt','Votre article a été mis à jour avec succès','Ihr Artikel wurde erfolgreich aktualisiert','Il tuo articolo è stato aggiornato con successo','Seu artigo foi atualizado com sucesso','Ваша статья успешно обновлена','Su artículo ha sido actualizado con éxito','Makaleniz başarıyla güncellendi'),(861,'article_added','Your article has been successfully added','تمت إضافة مقالتك بنجاح','Uw artikel is succesvol toegevoegd','Votre article a été ajouté avec succès','Ihr Artikel wurde erfolgreich hinzugefügt','Il tuo articolo è stato aggiunto','Seu artigo foi adicionado com êxito','Ваша статья успешно добавлена','Su artículo ha sido añadido correctamente','Makalen başarıyla eklendi'),(862,'title_more_than10','Title should be more than 10 characters','يجب أن يكون العنوان أكثر من 10 أحرف','Titel moet meer zijn dan 10 tekens','Le titre doit comporter plus de 10 caractères','Titel sollte mehr als 10 Zeichen sein','Il titolo dovrebbe essere più di 10 caratteri','O título deve ter mais de 10 caracteres','Заголовок должен содержать более 10 символов.','El título debe tener más de 10 caracteres','Başlık en fazla 10 karakter olmalıdır'),(863,'desc_more_than32','Description should be more than 32 characters','يجب أن يكون الوصف أكثر من 32 حرفا','Beschrijving moet meer zijn dan 32 tekens','La description doit comporter plus de 32 caractères','Beschreibung sollte mehr als 32 Zeichen sein','Descrizione dovrebbe essere più di 32 caratteri','A descrição deve ter mais de 32 caracteres','Описание должно содержать более 32 символов.','La descripción debe tener más de 32 caracteres','Açıklama 32 karakterden uzun olmalı'),(864,'please_fill_tags','Please fill the tags field','يرجى ملء حقل العلامات','Vul het veld labels','Remplissez le champ tags','Bitte füllen Sie das Etikettenfeld aus','Si prega di compilare il campo tag','Preencha o campo de tags','Пожалуйста, заполните поле тегов','Por favor rellene el campo de etiquetas','Lütfen etiketler alanını doldurun'),(865,'error_found','Error found, please try again later','حدث خطأ، يرجى إعادة المحاولة لاحقا','Fout gevonden, probeer het later opnieuw','Une erreur a été trouvée, réessayez plus tard','Fehler gefunden, bitte später nochmal versuchen','Errore trovato, si prega di riprovare più tardi','Ocorreu um erro, tente novamente mais tarde','Ошибка найдена. Повторите попытку позже.','Error encontrado. Vuelve a intentarlo más tarde.','Hata bulundu, lütfen daha sonra tekrar deneyin.'),(866,'posted_on_blog','Posted {BLOG_TIME} in {CATEGORY_NAME}.','نشر {BLOG_TIME} في {CATEGORY_NAME}.','Posted {BLOG_TIME} in {CATEGORY_NAME}.','Posted {BLOG_TIME} in {CATEGORY_NAME}.','Posted {BLOG_TIME} in {CATEGORY_NAME}.','Posted {BLOG_TIME} in {CATEGORY_NAME}.','Posted {BLOG_TIME} in {CATEGORY_NAME}.','Posted {BLOG_TIME} in {CATEGORY_NAME}.','Posted {BLOG_TIME} in {CATEGORY_NAME}.','Yayınlanan {BLOG_TIME} {CATEGORY_NAME} da.'),(867,'created_new_blog','created new article','إنشاء مقالة جديدة','creëerde nieuwe artikel','Nouvel article créé','Erstellt neuen Artikel','nuovo articolo creato','Criou um novo artigo','Создал новую статью','Creó nuevo artículo','Yeni makale yazdı'),(868,'forum','Forum','منتدى','Forum','Forum','Forum','Forum','Fórum','Форум','Foro','forum'),(869,'replies','Replies','ردود','Antwoorden','Réponses','Antworten','risposte','Respostas','Ответы','Respuestas','Cevaplar'),(870,'last_post','Last Post','آخر مشاركة','Laatste bericht','Dernier commentaire','Letzter Beitrag','Ultimo messaggio','Última postagem','Последний пост','Ultima publicación','Son Posta'),(871,'topic','topic','موضوع','onderwerp','sujet','Thema','argomento','tema','тема','tema','konu'),(872,'thread_search','Threads search','بحث المواضي ','Zoek naar discussies','Recherche de threads','Threads suchen','Ricerca di thread','Pesquisa de Threads','Поиск по темам','Búsqueda de hilos','Konular arama'),(873,'create_new_topic','Create new topic','إنشاء موضوع جديد ','Maak een nieuw onderwerp aan','Créer un nouveau sujet','Neues Thema erstellen','Crea nuovo argomento','Criar novo tópico','Создать новую тему','Crear nuevo tema','Yeni konu oluştur'),(874,'jump_to','Jump to','انتقل الى ','Spring naar','Sauter à','Springen zu','Salta a','Pule para','Перейти к','Salta a','Atlamak'),(875,'my_threads','My threads','المواضيع ','Mijn draden','Mes fils','Meine Fäden','I miei fili','Meus tópicos','Мои темы','Mis hilos','Konuları ekle'),(876,'my_messages','My Messages','رسائلي ','Mijn berichten','Mes messages','Meine Nachrichten','I miei messaggi','Minhas mensagens','Мои сообщения','Mis mensajes','Mesajlarım'),(877,'headline','Headline','العنوان ','opschrift','Gros titre','Überschrift','Titolo','Título','Заголовок','Titular','manşet'),(878,'your_post','Your post','منشورك ','Uw bericht','Votre publication','Deine Post','Il tuo post','Sua postagem','Ваше сообщение','Tu mensaje','Senin gönderin'),(879,'reply','Reply','الرد ','Antwoord','Répondre','Antworten','rispondere','Resposta','Ответить','Respuesta','cevap'),(880,'started_by','Started by','بدأ ب ','Begonnen door','Commencé par','Angefangen von','Iniziato da','Começado por','Начато','Comenzado por','Başlatan'),(881,'site_admin','Site Admin','مسؤول الموقع ','Site Admin','Administrateur du site','Site Admin','Amministrazione del sito','Administrador do Site','Администратор сайта','Administrador del sitio','Site Yöneticisi'),(882,'registered','Registered','مسجل ','Geregistreerd','Inscrit','Eingetragen','Registrato','Registrado','зарегистрированный','Registrado','Kayıtlı'),(883,'posts','posts','المشاركات ','posts','des postes','Beiträge','messaggi','Postagens','сообщений','Mensajes','Mesajları'),(884,'reply_to_topic','Reply to this topic','الرد على هذا الموضوع ','Antwoord op dit onderwerp','Répondre à ce sujet','Antwort auf dieses Thema','Rispondi a questo argomento','Responder a este tópico','Ответить в эту тему Открыть новую тему','Responder a este tema','Bu konuyu cevapla'),(885,'topic_review','Topic review','مراجعة الموضوع ','Onderwerp review','Examen de sujet','Thema Bewertung','Revisione degli argomenti','Revisão do tópico','Обзор темы','Revisión de temas','Konu incelemesi'),(886,'your_reply','Your Reply','ردك ','Uw reactie','Votre réponse','Deine Antwort','La tua risposta','Sua resposta','Ваш ответ','Tu respuesta','Cevabınızı'),(887,'list_of_users','List of users','قائمة المستخدمين ','Lijst van gebruikers','Liste des utilisateurs','Liste der Benutzer','Elenco degli utenti','Lista de usuários','Список пользователей','Lista de usuarios','Kullanıcı listesi'),(888,'post_count','Posts count','عدد المشاركات ','Berichten tellen','Nombre de postes','Beiträge zählen','I numeri contano','Posts count','Количество сообщений','Los posts cuentan','Mesaj sayısı'),(889,'referrals','Referrals','الإحالات ','Verwijzingen','Renvois','Verweise','Referenti','Referências','Переходов','Referencias','Tavsiye'),(890,'last_visit','Last visit','الزيارة الأخيرة ','Laatste bezoek','Derniere visite','Letzter Besuch','Lultima visita','Ultima visita','Последнее посещение','Última visita','Son ziyaret'),(891,'general_search_terms','General search terms','عبارات البحث العامة ','Algemene zoektermen','Conditions générales de recherche','Allgemeine Suchbegriffe','Termini di ricerca generali','Termos gerais de pesquisa','Общие условия поиска','Términos generales de búsqueda','Genel arama terimleri'),(892,'search_for_term','Search for term','البحث عن مصطلح ','Zoek naar term','Rechercher un terme','Suche nach Begriff','Cerca termine','Pesquisar termo','Поиск термина','Buscar término','Terimi ara'),(893,'search_in','Search in','بحث في ','Zoek in','Rechercher dans','Suchen in','Cerca nel','Procure em','Поиск в','Busca en','Araştır'),(894,'search_in_forums','Search Forums','البحث في المنتديات ','Zoeken in forums','Rechercher dans les forums','Foren durchsuchen','Cerca i forum','Pesquisar Fóruns','Поиск по форуму Главная страница форума Форум','Buscar en los foros','Forumlarda Ara'),(895,'search_in_threads','Search in threads','البحث في المواضيع ','Zoek in discussies','Rechercher dans les discussions','Suche in Threads','Cerca nei thread','Pesquisar nos tópicos','Искать в темах','Buscar en temas','Konuları ara'),(896,'search_in_messages','Search in messages','البحث في الرسائل ','Zoek in berichten','Rechercher dans les messages','Suche in Nachrichten','Cerca nei messaggi','Pesquisar em mensagens','Искать в сообщениях','Buscar en mensajes','Mesajlarda ara'),(897,'search_subject_only','Search subject only','موضوع البحث فقط ','Zoek alleen onderwerp','Rechercher uniquement sur le sujet','Nur Suchbegriff suchen','Cerca solo il soggetto','Procurar somente assunto','Только поиск','Solo tema de búsqueda','Sadece konu ara'),(898,'threads','threads','الخيوط ','threads','Fils','Fäden','fili','tópicos','потоки','trapos','ipler'),(899,'action','Action','عمل ','Actie','action','Aktion','Azione','Açao','действие','Acción','Aksiyon'),(900,'posted','Posted','تم النشر ','Geplaatst','Publié','Gesendet','Pubblicato','Postou','Сообщение','Al corriente','Gönderildi'),(901,'no_forums_found','No forums found','لم يتم العثور على منتديات ','Geen forums gevonden','Aucun forum trouvé','Keine Foren gefunden','Nessun forum trovato','Nenhum fórum encontrado','Форум не найден','No se encontraron foros','Hiçbir forum bulunamadı'),(902,'never','Never','أبدا ','Nooit','Jamais','Nie','Mai','Nunca','Никогда','Nunca','Asla'),(903,'no_replies_found','No replies found','لم يتم العثور على أية ردود ','Geen antwoorden gevonden','Aucune réponse trouvée','Keine Antworten gefunden','Nessuna risposta trovata','Nenhuma resposta encontrada','Нет ответов','No se encontraron respuestas','Yanıt bulunamadı'),(904,'no_threads_found','No threads found','لم يتم العثور على سلاسل محادثات ','Geen discussies gevonden','Aucun sujet trouvé','Keine Fäden gefunden','Non sono stati trovati thread','Nenhum tópico encontrado','Темы не найдены','No se encontraron hilos','Konu bulunamadı'),(905,'no_members_found','No members found','لم يتم العثور على أي أعضاء ','Er zijn geen leden gevonden','Aucun membre trouvé','Keine Mitglieder gefunden','Nessun membro trovato','Nenhum membro encontrado','Участники не найдены','No se encontraron miembros','Üye bulunamadı'),(906,'no_sections_found',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(907,'wrote','wrote','كتب ','schreef','a écrit','schrieb','ha scritto','escrevi','писал','Escribió','yazdı'),(908,'edit','Edit','تصحيح','Bewerk','modifier','Bearbeiten','Modifica','Editar','редактировать','Editar','Düzenleme'),(909,'edit_topic','Edit topic','تعديل الموضوع ','Bewerk onderwerp','Modifier le sujet','Thema bearbeiten','Modifica argomento','Editar tópico','Изменить тему','Editar tema','Konuyu düzenle'),(910,'reply_saved','Your reply was successfully saved','تم حفظ ردك بنجاح ','Uw antwoord is succesvol opgeslagen','Votre réponse a été enregistrée avec succès','Ihre Antwort wurde erfolgreich gespeichert','La tua risposta è stata salvata correttamente','Sua resposta foi salva com êxito','Ваш ответ был успешно сохранен','Tu respuesta se ha guardado correctamente.','Yanıtınız başarıyla kaydedildi'),(911,'reply_added','Your reply was successfully added','تمت إضافة ردك بنجاح','Je antwoord is succesvol toegevoegd','Votre réponse a été ajoutée avec succès','Ihre Antwort wurde erfolgreich hinzugefügt','La tua risposta è stata aggiunta con successo','Sua resposta foi adicionada com êxito','Ваш ответ был успешно добавлен','Tu respuesta se ha agregado correctamente.','Yanıtınız başarıyla eklendi'),(912,'forum_post_added','Your forum has been successfully added','تمت إضافة مشاركة المنتدى بنجاح ','Uw forum is succesvol toegevoegd','Votre forum a été ajouté avec succès','Dein Forum wurde erfolgreich hinzugefügt','Il tuo forum è stato aggiunto con successo','Seu fórum foi adicionado com sucesso','Ваш форум успешно добавлен','Tu foro se ha agregado correctamente','Forumunuz başarıyla eklendi'),(913,'members','Members','أفراد','leden','Membres','Mitglieder','Utenti','Membros','члены','Miembros','Üyeler'),(914,'help','Help','مساعدة ','Helpen','Aidez-moi','Hilfe','Aiuto','Socorro','Помощь','Ayuda','yardım et'),(915,'search_terms_more4','Type in one or more search terms, each must be at least 4 characters','اكتب عبارة بحث واحدة أو أكثر، ويجب ألا يقل عدد الأحرف عن 4 أحرف ','Typ één of meer zoektermen, ieder moet minstens 4 karakters','Tapez un ou plusieurs termes de recherche, chacun doit être dau moins 4 caractères','Geben Sie einen oder mehrere Suchbegriffe ein, die jeweils muss mindestens 4 Zeichen lang sein','Geben Sie einen oder mehrere Suchbegriffe ein, die jeweils muss mindestens 4 Zeichen lang sein','Digite um ou mais termos de pesquisa, cada um deve ter pelo menos 4 caracteres','Введите одно или несколько поисковых терминов, каждый из них должен быть не менее 4-х символов','Tipo de uno o más términos de búsqueda, cada uno debe tener al menos 4 caracteres','Bir veya daha fazla arama terimi girin, her En Az 4 karakter olmalıdır'),(916,'events','Events','أحداث','Evenementen','Événements','Veranstaltungen','eventi','Eventos','Мероприятия','Eventos','Olaylar'),(917,'going','Going','ذاهب','gaand','Aller','Gehen','Andando','Indo','Пойду','Yendo','gidiş'),(918,'interested','Interested','يستفد','Geïnteresseerd','Intéressé','Interessiert','Interessato','Interessado','интересное','Interesado','ilgili'),(919,'past','Pastor','الماضي','Verleden','Passé','Vergangenheit','Passato','Passado','прошлые','Pasado','geçmiş'),(920,'invited','invited','دعوة','Uitgenodigd','Invité','Eingeladen','Invitato','Convidamos','приглашенни','Invitado','Davetli'),(921,'you_are_going','You are going','انت ذاهب','Jij gaat','Vous allez','Du gehst','Stai andando','Você está indo','Вы собираетесь','Usted va','Gidiyorsun'),(922,'you_are_interested','You are interested','كنت مهتما','Je bent geïnteresseerd','Tu es intéressé','Sie sind interessiert','Sei interessato','Você está interessado','Вы заинтересованы','Tú estás interesado','İlgilisin'),(923,'start_date','Start date','تاريخ البدء','Begin datum','Date de début','Anfangsdatum','Data dinizio','Data de início','Дата начала','Fecha de inicio','Başlangıç tarihi'),(924,'end_date','End date','تاريخ الانتهاء','Einddatum','Date de fin','Enddatum','Data di fine','Data final','Дата окончания','Fecha final','Bitiş tarihi'),(925,'location','Location','موقع','Plaats','Emplacement','Lage','Posizione','localização','Расположение','Ubicación','Konum'),(926,'event','Event','هدف','Evenement','un événement','Event','Evento','Evento','Мероприятие','Evento','Olay'),(927,'no_events_found','No events found','لم يتم العثور على أية أحداث','Geen evenementen gevonden','Aucun événement trouvé','Keine Veranstaltungen gefunden','Nessun evento trovato','Nenhum evento encontrado','События не найдены','No se han encontrado eventos','Etkinlik bulunamadı'),(928,'event_you_may_like','Events you may like','الأحداث التي قد تعجبك','Evenementen die je misschien leuk vindt','Événements que vous aimeriez','Veranstaltungen, die Sie mögen können','Eventi che ti piacciono','Eventos que você pode gostar','Мероприятия, которые могут вам понравиться','Eventos que te pueden gustar','Beğeneceğiniz etkinlikler'),(929,'going_people','Going people','الذهاب الناس','Mensen gaan','Aller aux gens','Leute gehen','Andando gente','Indo as pessoas','Идущие люди','Personas que van','İnsanlara gidiyor'),(930,'interested_people','Interested people','الناس المهتمين','Geïnteresseerde mensen','Les personnes intéressées','Interessierte Leute','Persone interessate','Pessoas interessadas','Заинтересованные лица','Personas interesadas','İlgilenen insanlar'),(931,'invited_people','Invited people','الأشخاص المدعوون','Uitgenodigde mensen','Personnes invitées','Eingeladene Leute','Persone invitate','Pessoas convidadas','Приглашенные люди','Personas invitadas','Davet edilenler'),(932,'event_added','Your event was successfully added','تمت إضافة هذا الحدث الخاص بك بنجاح','Uw evenement is toegevoegd','Votre événement a été ajouté avec succès','Ihre Veranstaltung wurde erfolgreich hinzugefügt','Il vostro evento è stato aggiunto','Seu evento foi adicionado com sucesso','Ваше мероприятие успешно добавлено','Su caso se ha añadido con éxito','Etkinliğiniz başarıyla eklendi'),(933,'event_saved','Your event was successfully saved.','تم حفظ هذا الحدث الخاص بك','Uw evenement is opgeslagen','Votre événement a été enregistré','Ihre Veranstaltung wurde gespeichert','Il vostro evento è stato salvato','Seu evento foi salvo','Ваше мероприятие успешно сохранено','Su caso se ha guardado','Etkinlik kaydedildi'),(934,'confirm_delete_event','You are sure that you want to delete this event','كنت متأكدا من أنك تريد حذف هذا الحدث','Bent u zeker dat u wilt dit evenement verwijderen','Vous êtes sûr que vous voulez supprimer cet événement','Sie sind sicher, dass Sie dieses Ereignis löschen möchten','Sei sicuro di voler eliminare questo evento','Você tem certeza de que deseja excluir este evento','Вы уверены что Вы хотите удалить это событие','Está seguro de que desea eliminar este evento','Sen bu etkinliği silmek istediğinizden emin misiniz'),(935,'load_more','Load more','تحميل أكثر','Meer laden','Chargez plus','laden Sie mehr','caricare più','Coloque mais','Показать еще','Cargar más','daha fazla yükle'),(936,'subject','Subject','موضوع','Onderwerpen','Assujettir','Fach','Soggetto','Sujeito','Предмет','Tema','konu'),(937,'go','Go','اذهب','Gaan','Aller','Gehen','Partire','Ir','Идти','Ir','Gitmek'),(938,'created_new_event','created new event','حدث جديد','Aangemaakt nieuw evenement','Nouvel événement créé','Neue Veranstaltung erstellt','Ha creato un nuovo evento','Criou um novo evento','Создано новое мероприятие','Creó nuevo evento','Yeni bir etkinlik yarattı'),(939,'my_events','My events','أحداثي','Mijn gebeurtenissen','Mes événements','Meine ereignisse','I miei eventi','Meus eventos','Мои мероприятия','Mis eventos','Etkinliklerim'),(940,'is_interested','is interested on your event \"{event_name}\"','مهتم بحدثك \"{event_name}\"','Is geïnteresseerd in je evenement \"{event_name}\"','Est intéressé par votre événement \"{event_name}\"','Interessiert sich für deine Veranstaltung \"{event_name}\"','È interessato al tuo evento \"{event_name}\"','Está interessado no seu evento \"{event_name}\"','Заинтересовано в вашем мероприятии \"{event_name}\"','Está interesado en su evento \"{event_name}\"','\"{Event_name}\" etkinliğinizle ilgileniyor.'),(941,'is_going','is going to your event \"{event_name}\"','هو الذهاب إلى الحدث \"{event_name}\"','Gaat naar je evenement \"{event_name}\"','Va à votre événement \"{event_name}\"','Geht zu deiner Veranstaltung \"{event_name}\"','Sta andando al tuo evento \"{event_name}\"','Está indo para o seu evento \"{event_name}\"','Идет на ваше мероприятие \"{event_name}\"','Va a su evento \"{event_name}\"','\"{Event_name}\" etkinliğine gidiyor'),(942,'invited_you_event','invited you to go the event \"{event_name}\"','دعاك إلى الذهاب إلى الحدث \"{event_name}\"','Heeft u uitgenodigd om het evenement te gaan \"{event_name}\"',NULL,'Lud dich ein, die Veranstaltung zu starten \"{event_name}\"',NULL,'Convidou você para ir ao evento \"{event_name}\"','Приглашает вас на мероприятие \"{event_name}\"','Te invitó a ir al evento \"{event_name}\"','Sizi \"{event_name}\" etkinliğine davet etti.'),(943,'replied_to_topic','replied to your topic','أجاب على الموضوع','Antwoordde op je onderwerp','A répondu à votre sujet','Antwortete auf dein Thema','Ha risposto al tuo argomento','Respondeu ao seu tópico','Ответил на вашу тему','Respondió a su tema','Cevabınız cevaplandı'),(944,'movies','Movies','أفلام','Dioscoop','Films','Kino','Film','Filmes','Кино','Películas','Filmler'),(945,'translate','Translate','ترجم','Vertalen','Traduire','übersetzen','Tradurre','Traduzir','перевести','Traducciones','çevirmek'),(946,'genre','Genre','نوع أدبي','Genre','Genre','Genre','Genere','Gênero','Жанр','Genre','tarz'),(947,'recommended','Recommended','موصى به','Aanbevolen','Recommandé','empfohlen','Raccomandato','Recomendado','Рекомендуемые','Se recomienda','Tavsiye'),(948,'most_watched','Most watched','الأكثر مشاهدة','Meest bekeken','Le plus regardé','Die meisten angeschaut ','Più visto','Mais visto','Понравившиеся','Más información','En çok izlenen'),(949,'stars','Stars','نجوم','Stars','Etoiles','Sterne','Stars','Estrelas','Звезды','Estrellas','yıldız'),(950,'more','More','أكثر','Meer','Plus','mehr','Più','Mais','еще','Más información','daha'),(951,'no_movies_found','No movies found','لم يتم العثور على الأفلام','Geen films gevonden','Pas de films trouvés','Keine Filme gefunden','Nessun film trovato','Não há filmes encontrados','Фильмы не найдены','No movies found','Filmlerde Bulunan'),(952,'producer','Producer','منتج','Producent','Producteur','Produzent','Produttore','Produtor','Продюсер','Producer','yapımcı'),(953,'release','Release','إطلاق','Vrijlating','Sortie','Veröffentlichung','Rilascio','Lançamento','Релиз','Versión','salıverme'),(954,'quality','Quality','جودة','Kwaliteit','Qualité','Qualität','Qualità','Qualidade','Качество','Calidad','kalite'),(955,'more_like_this','More like this','أكثر من هذا القبيل','Meer in deze trant','Plus darticles','Ähnliche Titel','Altri risultati simili','Mais como este','Похожие фильмы','Más información','Buna benzer'),(956,'wallet','Wallet','محفظة نقود','Portemonnee','Portefeuille','Brieftasche','Portafoglio','Carteira','Бумажник','Billetera','Cüzdan'),(957,'company','Company','شركة','Bedrijf','Compagnie','Unternehmen','Azienda','Empresa','Компания','Empresa','şirket'),(958,'bidding','Bidding','مزايدة','bod','Enchère','Bieten','offerta','Licitação','торги','Ofertas','teklif verme'),(959,'clicks','Clicks','نقرات','klikken','Clics','Klicks','clic','Cliques','щелчки','Clics','Tıklanma'),(960,'url','Url','رابط','url','Url','Url','url','Url','Веб-сайт','Url','URL'),(961,'audience','Audience','جمهور','Publiek','Public','Publikum','Pubblico','Público','Аудитория','Audiencia','seyirci'),(962,'select_image','Select an image','حدد صورة','Selecteer een afbeelding','Sélectionnez une image','Wählen Sie ein Bild aus','Selezionare unimmagine','Selecione uma imagem','Выберите изображение','Seleccione una imagen','Bir resim seçin'),(963,'my_balance','My balance','رصيدي','Mijn balans','Mon solde','Mein Gleichgewicht','Il mio equilibrio','Meu saldo','Мой баланс','Mi balance','Bakiyem'),(964,'replenish_my_balance','Replenish my balance','تجديد رصيد بلدي','Herstel mijn saldo','Récupérer mon solde','Fülle meine Balance auf','Riempire il mio equilibrio','Reabasteça meu saldo','Пополнить баланс','Reponer mi saldo','Bakiyemi yenile'),(965,'continue','Continue','استمر','voortzetten','Continuer','Fortsetzen','Continua','Continuar','Продолжить','Continuar','Devam et'),(966,'replenishment_notif','Your balance has been replenished by','تمت إعادة تجديد رصيدك بواسطة','Uw saldo is aangevuld door','Votre solde a été reconstitué par','Ihr Gleichgewicht wurde ergänzt durch','Il tuo equilibrio è stato riempito da','Seu saldo foi reabastecido por','Ваш баланс был пополнен','Tu saldo ha sido reabastecido por','Bakiyeniz, tarafından yeniden dolduruldu.'),(967,'ads','Advertising','إعلان','Reclame','Publicité','Werbung','Pubblicità','Publicidade','Реклама','Publicidad','Ilan'),(968,'confirm_delete_ad','Are you sure you want to delete this ad','هل أنت متأكد أنك تريد حذف هذا الإعلان','Weet u zeker dat u deze advertentie wilt verwijderen','Êtes-vous sûr de vouloir supprimer cette annonce?','Möchten Sie diese Anzeige wirklich löschen?','Sei sicuro di voler cancellare questo annuncio','Tem certeza de que quer apagar este anúncio','Вы уверены, что хотите удалить эту рекламу','Estás seguro de que quieres eliminar esta publicidad','Bu reklamı silmek istediğinizden emin misiniz'),(969,'delete_ad','Delete ad','حذف الإعلان','Verwijder advertentie','Supprimer lannonce','Anzeige löschen','Elimina annuncio','Eliminar anúncio','Удалить объявление','Eliminar anuncio','Reklamı sil'),(970,'no_ads_found','No ads found','لم يتم العثور على أية إعلانات','Geen advertenties gevonden','Aucune annonce na été trouvée','Keine Anzeigen gefunden','Nessun annuncio trovato','Nenhum anúncio encontrado','Объявления не найдены','No se han encontrado anuncios','Hiç ilan bulunamadı'),(971,'not_active','Not active','غير فعال','Niet actief','Pas actif','Nicht aktiv','Non attivo','Não ativo','Не активен','No activo','Aktif değil'),(972,'appears','Placement','تحديد مستوى','Plaatsing','Placement','Platzierung','Posizionamento','Colocação','размещение','Colocación','Yerleştirme'),(973,'sidebar','Sidebar','الشريط الجانبي','sidebar','Barre latérale','Seitenleiste','Sidebar','Barra Lateral','Боковая панель','Barra lateral','Kenar çubuğu'),(974,'select_a_page_or_link','Select a page or enter a link to your site','حدد صفحة أو أدخل رابطا إلى موقعك','Selecteer een pagina of voer een link in op uw site','Sélectionnez une page ou entrez un lien vers votre site','Wählen Sie eine Seite aus oder geben Sie einen Link zu Ihrer Website ein','Seleziona una pagina o inserisci un link al tuo sito','Selecione uma página ou insira um link para o seu site','Выберите страницу или введите ссылку на свой сайт','Seleccione una página o ingrese un enlace a su sitio','Bir sayfa seçin veya sitenize bir bağlantı girin'),(975,'story','Story','قصة','Verhaal','Récit','Geschichte','Storia','História','История','Historia','Öykü'),(976,'max_number_status','The maximum number can not exceed 20 files at a time!','الحد الأقصى لعدد لا يمكن أن يتجاوز 20 ملفات في وقت واحد!','Het maximaal aantal kan niet meer dan 20 bestanden tegelijkertijd overschrijden!','Le nombre maximal ne peut pas dépasser 20 fichiers à la fois!','Die maximale Anzahl darf maximal 20 Dateien nicht überschreiten!','Il numero massimo non può superare 20 file alla volta!','O número máximo não pode exceder 20 arquivos de cada vez!','Максимальное число не может превышать 20 файлов за раз!','¡El número máximo no puede superar los 20 archivos a la vez!','Maksimum sayı, aynı anda 20 dosya aşamaz!'),(977,'status_added','Your status has been successfully added!','تمت إضافة حالتك بنجاح!','Uw status is succesvol toegevoegd!','Votre statut a été ajouté avec succès!','Ihr Status wurde erfolgreich hinzugefügt!','Il tuo stato è stato aggiunto con successo!','Seu status foi adicionado com sucesso!','Ваш статус успешно добавлен!','¡Tu estado se ha agregado correctamente!','Durumunuz başarıyla eklendi!'),(978,'create_new_status','Create New Status','إنشاء حالة جديدة','Maak een nieuwe status aan','Créer un nouvel état','Neuen Status anlegen','Crea nuovo stato','Criar novo status','Создать новый статус','Crear nuevo estado','Yeni Durum Oluştur'),(979,'sponsored','Sponsored','برعاية','Sponsored','Sponsorisé','Gefördert','sponsorizzati','Patrocinadas','Рекламные','Patrocinado','Sponsor'),(980,'notification_sent','Your notification has been sent successfully','تم إرسال الإشعار بنجاح','Uw melding is succesvol verzonden','Votre notification a été envoyée avec succès','Ihre Benachrichtigung wurde erfolgreich gesendet','La tua notifica è stata inviata correttamente','Sua notificação foi enviada com sucesso','Ваше уведомление отправлено успешно','Tu notificación se ha enviado correctamente','Bildiriminiz başarıyla gönderildi'),(981,'hide_post','Hide post','آخر اخفاء','Verberg post','Masquer la publication','Beitrag ausblenden','Nascondi post','Ocultar postagem','Скрыть сообщение','Esconder la publicación','Postayı gizle'),(982,'verification_sent','Your verification request  soon will be considered!','سيتم النظر في طلب التحقق قريبا!','Uw verificatieaanvraag zal binnenkort worden overwogen!','Votre demande de vérification sera bientôt prise en considération!','Ihre Bestätigungsanforderung wird bald berücksichtigt!','La tua richiesta di verifica sarà presto presa in considerazione!','Seu pedido de verificação em breve será considerado!','Ваш запрос на подтверждение скоро будет рассмотрен!','Su solicitud de verificación pronto será considerada!','Doğrulama isteğiniz yakında değerlendirilecek!'),(983,'profile_verification','Verification of the profile!','التحقق من الملف الشخصي!','Verificatie van het profiel!','Vérification du profil!','Überprüfung des Profils!','Verifica del profilo!','Verificação do perfil!','Проверка профиля!','Verificación del perfil!','Profilin doğrulanması!'),(984,'verification_complete','Congratulations your profile is verified!','تهانينا تم التحقق من ملفك الشخصي!','Gefeliciteerd, uw profiel is geverifieerd!','Félicitations, votre profil est vérifié!','Herzlichen Glückwunsch, Ihr Profil wird bestätigt!','Complimenti il ​​tuo profilo è verificato!','Parabéns seu perfil está verificado!','Поздравляем Ваш профиль проверен!','¡Felicidades tu perfil está verificado!','Tebrikler, profiliniz doğrulandı!'),(985,'upload_docs','Upload documents','تحميل المستندات','Documenten uploaden','Télécharger des documents','Dokumente hochladen','Carica i documenti','Carregar documentos','Загрузить документы','Subir documentos','Belgeleri yükle'),(986,'select_verif_images','Please upload a photo with your passport / ID  & your distinct photo','يرجى تحميل صورة مع جواز سفرك / إد & أمب؛ صورتك المميزة','Upload een foto met uw paspoort / ID & amp; Jouw eigen foto','Veuillez télécharger une photo avec votre passeport / ID & amp; Votre photo distincte','Bitte laden Sie ein Foto mit Ihrem Pass / ID & amp; Ihr eigenes Foto','Carica una foto con il tuo passaporto / ID & amp; La tua foto distinta','Carregue uma foto com seu passaporte / ID & amp; Sua foto distinta','Пожалуйста, загрузите фотографию с вашим паспортом / ID и amp; Твоя отличная фотография','Cargue una foto con su pasaporte / ID & amp; Tu foto distinta','Lütfen pasaportunuzla bir fotoğraf yükleyin / kimliği ve amp; Farklı fotoğrafın'),(987,'passport_id','Passport / id card','جواز السفر / بطاقة الهوية','Paspoort / ID kaart','Passeport / carte didentité','Pass / ID-Karte','Passaporto / id carta','Passaporte / cartão de identificação','Паспорт / удостоверение личности','Pasaporte / tarjeta de identificación','Pasaport / kimlik kartı'),(988,'your_photo','Your photo','صورتك','Je foto','Ta photo','Dein Foto','La tua foto','Sua foto','Твое фото','Tu foto','Senin resmin'),(989,'please_select_passport_id','Please select your passport/id and photo!','يرجى تحديد جواز السفر / معرف والصورة!','Selecteer alstublieft uw paspoort / id en foto!','Sélectionnez votre passeport / id et photo!','Bitte wählen Sie Ihren Pass / id und Foto!','Seleziona il tuo passaporto / id e foto!','Selecione seu passaporte / id e foto!','Выберите свой паспорт / удостоверение личности и фото!','Por favor, seleccione su pasaporte / identificación y foto!','Lütfen pasaportunuzun / kimlik numaranızı ve fotoğrafınızı seçin!'),(990,'passport_id_invalid','The passport/id picture must be an image','يجب أن تكون صورة الجواز / الصورة صورة','De paspoort / id foto moet een afbeelding zijn','Limage passeport / id doit être une image','Das Pass / id Bild muss ein Bild sein','Limmagine del passaporto / id deve essere unimmagine','A imagem de passaporte / id deve ser uma imagem','Паспорт / идентификатор должен быть изображением','La imagen del pasaporte / id debe ser una imagen','Pasaport / id resmi bir resim olmalıdır'),(991,'user_picture_invalid','The user picture must be an image','يجب أن تكون صورة المستخدم صورة','De gebruikersfoto moet een afbeelding zijn','Limage utilisateur doit être une image','Das Benutzerbild muss ein Bild sein','Limmagine dellutente deve essere unimmagine','A imagem do usuário deve ser uma imagem','Изображение пользователя должно быть изображением','La imagen del usuario debe ser una imagen','Kullanıcı resmi bir resim olmalıdır'),(992,'verification_request_sent','Your request was successfully sent, in the very near future we will consider it!','تم إرسال طلبك بنجاح، في المستقبل القريب جدا سوف ننظر فيه!','Uw aanvraag is succesvol verzonden, in de nabije toekomst zullen we het overwegen!','Votre demande a été envoyée avec succès, dans un avenir très proche, nous lexaminerons!','Ihre Anfrage wurde erfolgreich gesendet, in naher Zukunft werden wir es betrachten!','La tua richiesta è stata inviata con successo, nel prossimo futuro lo considereremo!','Seu pedido foi enviado com sucesso, no futuro muito próximo, vamos considerá-lo!','Ваш запрос был успешно отправлен, в самом ближайшем будущем мы это рассмотрим!','Su solicitud fue enviada con éxito, en un futuro muy próximo lo consideraremos!','İsteğiniz başarıyla gönderildi, çok yakın bir zamanda bunu düşünüyoruz!'),(993,'shared','Echoed','مشترك','gedeelde','partagé','Geteilt','diviso','Compartilhado','Поделился','Compartido','Paylaşılan'),(994,'post_shared','Post was successfully added to your timeline!','تمت إضافة المشاركة بنجاح إلى المخطط الزمني!','Post is succesvol toegevoegd aan je tijdlijn!','Le message a été ajouté avec succès à votre calendrier!','Post wurde erfolgreich zu deinem Zeitplan hinzugefügt!','Lalberino è stato aggiunto con successo alla tua timeline!','O post foi adicionado com sucesso à sua linha de tempo!','Сообщение было успешно добавлено на ваш график!','¡Se ha agregado el mensaje a tu línea de tiempo!','Mesaj, zaman çizelgesine başarıyla eklendi!'),(995,'important','Important!','مهم!','Belangrijk!','Important!','Wichtig!','Importante!','Importante!','Важно!','¡Importante!','Önemli!'),(996,'unverify','Please note that if you change the username you will lose verification','يرجى ملاحظة أنه في حالة تغيير اسم المستخدم، فستفقد التحقق','Houd er rekening mee dat als u de gebruikersnaam wijzigt, u de verificatie verliest','Veuillez noter que si vous modifiez le nom dutilisateur, vous allez perdre la vérification','Bitte beachten Sie, dass Sie bei der Änderung des Benutzernamens die Bestätigung verlieren','Si prega di notare che se si modifica il nome utente perderà la verifica','Observe que se você alterar o nome de usuário, você perderá a verificação','Обратите внимание, что если вы измените имя пользователя, вы потеряете подтверждение','Tenga en cuenta que si cambia el nombre de usuario, perderá la verificación','Kullanıcı adını değiştirirseniz doğrulamayı kaybedeceğinizi lütfen unutmayın'),(997,'friend_privacy','Who can see my friends?','الذين يمكن أن نرى أصدقائي','Wie kan mijn vrienden zien','Qui peut voir mes amis','Wer kann meine Freunde sehen','Chi può vedere i miei amici','Quem pode ver meus amigos','Кто может видеть моих друзей','¿Quién puede ver a mis amigos?','Arkadaşlarımı kim görebilir?'),(998,'added_group_admin','added you group admin','أضافك مشرف المجموعة','Toegevoegd je groep admin','Ajoute ton administrateur de groupe','Fügte Ihnen gruppe admin hinzu',NULL,'Adicionou você administrador do grupo','Добавлен администратор группы','Agregó tu grupo de administración','Grup yöneticisi ekledi'),(999,'added_page_admin','added you page admin','أضافك مشرف الصفحة','Toegevoegd u pagina admin','A ajouté votre page admin','Fügte Ihnen die Seite admin hinzu',NULL,'Adicionou você admin da página','Добавлено администратором страницы','Agregó tu página admin','Size sayfa admin ekledi'),(1000,'no_messages','No messages yet here.','لا توجد رسائل حتى الآن.','Nog geen berichten hier.',NULL,'Noch keine Nachrichten.','Non ci sono ancora messaggi qui.','Ainda não há mensagens aqui.','Пока сообщений нет.','Aún no hay mensajes.','Henüz mesaj yok.'),(1001,'conversation_deleted','Conversation has been deleted!','تم حذف المحادثة!','Conversatie is verwijderd!','La conversation a été supprimée!','Konversation wurde gelöscht!','La conversazione è stata cancellata!','A conversa foi excluída!','Разговор удален!','¡Se ha eliminado la conversación!','İleti dizisi silindi!'),(1002,'close','Close','قريب','Dichtbij','Fermer','Schließen','Vicino','Fechar','Закрыть','Cerca','Kapat'),(1003,'members','Members','أفراد','leden','Membres','Mitglieder','Utenti','Membros','члены','Miembros','Üyeler'),(1004,'exit_group','Exit group','خروج من المجموعة','Exitgroep','Groupe de sortie','Exit-Gruppe','Esci dal gruppo','Grupo de saída','Группа выхода','Salir del grupo','Grubundan çık'),(1005,'clear_history','Clear history','تاريخ واضح','Geschiedenis wissen','Histoire claire','Geschichte löschen','Cancellare la cronologia','Apagar o histórico','Удалить переписку','Borrar historial','Geçmişi temizle'),(1006,'group_members','Group members','أعضاء المجموعة','Groepsleden','Les membres du groupe','Gruppenmitglieder','Membri del gruppo','Membros do grupo','Участники группы','Miembros del grupo','Grup üyeleri'),(1007,'add_parts','Add participant','إضافة مشارك','Voeg deelnemer toe','Ajouter un participant','Teilnehmer hinzufügen','Aggiungi partecipante','Adicionar participante','Добавить участника','Añada participante','Katılımcı ekle'),(1008,'unreport','Cancel Report','إلغاء التقرير','Annuleren rapport','Annuler le rapport','Bericht abbrechen','Annulla rapporto','Cancelar relatório','Отменить отчет','Cancelar informe','Raporu İptal Et'),(1009,'report_user','Report this User','الإبلاغ عن هذا المستخدم','Rapporteer deze gebruiker','Signaler cet utilisateur','Diesen Nutzer melden','Segnala questo utente','Denunciar este usuário','Сообщить об этом пользователе','Reportar a este usuario','Bu kullanıcıyı rapor et'),(1010,'report_page','Report this Page','الإبلاغ عن هذه الصفحة','Meld deze pagina aan','Signaler cette page','Diese Seite melden','Segnala questa pagina','Informe esta página','Сообщить об этой странице','Informar sobre esta página','Bu sayfayı bildir'),(1011,'report_group','Report this Group','الإبلاغ عن هذه المجموعة','Meld deze groep aan','Signaler ce groupe','Diese Gruppe melden','Segnala questo gruppo','Denunciar este grupo','Сообщить об этой группе','Reportar este grupo','Bu Grubu Rapor Et'),(1012,'page_rated','You have already rated this page!','لقد قيمت هذه الصفحة من قبل!','U heeft deze pagina al beoordeeld!','Vous avez déjà noté cette page!','Sie haben diese Seite bereits bewertet!','Hai già valutato questa pagina!','Você já avaliou esta página!','Вы уже оценили эту страницу!','¡Ya has calificado esta página!','Bu sayfaya zaten puan verdiniz!'),(1013,'rating','Rating','تقييم','Beoordeling','Évaluation','Bewertung','Valutazione','Avaliação','Рейтинг','Clasificación','Değerlendirme'),(1014,'reviews','Reviews','التعليقات','beoordelingen','Avis','Bewertungen','Recensioni','Rever','Отзывы','Comentarios','yorumlar'),(1015,'rate','Rate','معدل','tarief','Taux','Preis','Vota','Taxa','Ставка','Tarifa','oran'),(1016,'your_review','Write your review.','اكتب مراجعتك.','Schrijf je beoordeling.','Donnez votre avis.','Schreiben Sie eine Bewertung.','Scrivi la tua recensione.','Escreva sua revisão.','Напишите свой отзыв.','Escribe tu reseña.','Yorumunuzu yazın.'),(1017,'ad_saved','Your ad has been successfully saved!','تم حفظ إعلانك بنجاح!','Uw advertentie is succesvol opgeslagen!','Votre annonce a été enregistrée avec succès!','Ihre Anzeige wurde erfolgreich gespeichert!','Il tuo annuncio è stato salvato con successo!','Seu anúncio foi salvo com sucesso!','Ваше объявление успешно сохранено!','Tu anuncio se ha guardado correctamente.','Reklamınız başarıyla kaydedildi!'),(1018,'ad_added','Your ad has been successfully added!','تمت إضافة إعلانك بنجاح!','Uw advertentie is succesvol toegevoegd!','Votre annonce a été ajoutée avec succès!','Ihre Anzeige wurde erfolgreich hinzugefügt!','Il tuo annuncio è stato aggiunto con successo!','Seu anúncio foi adicionado com sucesso!','Ваше объявление было успешно добавлено!','Su anuncio se ha agregado correctamente.','Reklamınız başarıyla eklendi!'),(1019,'invalid_ad_picture','The ads picture must be an image!','يجب أن تكون صورة الإعلانات صورة!','De advertentie foto moet een afbeelding zijn!',NULL,'Das Anzeigenbild muss ein Bild sein!',NULL,'A imagem dos anúncios deve ser uma imagem!','Изображение объявления должно быть изображением!','¡La imagen de los anuncios debe ser una imagen!','Reklam resimleri bir resim olmalıdır!'),(1020,'enter_valid_desc','Please enter a valid description!','الرجاء إدخال وصف صالح!','Vul alstublieft een geldige omschrijving in!','Entrez une description valable!','Bitte geben Sie eine gültige Beschreibung ein!','Inserisci una descrizione valida!','Digite uma descrição válida!','Введите действительное описание!','Por favor ingrese una descripción válida!','Lütfen geçerli bir açıklama girin!'),(1021,'enter_valid_titile','Please enter a valid title!','يرجى إدخال عنوان صالح!','Vul alstublieft een geldige titel in!','Entrez un titre valide!','Bitte geben Sie einen gültigen Titel ein!','Si prega di inserire un titolo valido!','Digite um título válido!','Введите действительный заголовок!','¡Por favor ingrese un título válido!','Lütfen geçerli bir başlık girin!'),(1022,'enter_valid_url','Please enter a valid link!','الرجاء إدخال رابط صالح!','Vul alstublieft een geldige link in!','Veuillez entrer un lien valide!','Bitte geben Sie einen gültigen Link ein!','Inserisci un link valido!','Digite um link válido!','Пожалуйста, введите действующую ссылку!','Ingrese un enlace válido!','Lütfen geçerli bir bağlantı girin!'),(1023,'invalid_company_name','Please enter a valid company name!','الرجاء إدخال اسم شركة صالح!','Vul alstublieft een geldige bedrijfsnaam in!',NULL,'Bitte geben Sie einen gültigen Firmennamen ein!','Inserisci un nome aziendale valido!','Digite um nome válido da empresa!','Укажите действительное название компании!','Introduzca un nombre de empresa válido!','Lütfen geçerli bir şirket adı girin!'),(1024,'mother','Mother','أم','Moeder','Mère','Mutter','Madre','Mãe','Мама','Madre','anne'),(1025,'father','Father','الآب','Vader','Père','Vater','Padre','Pai','Отец','Padre','baba'),(1026,'daughter','Daughter','ابنة','Dochter','Fille','Tochter','Figlia','Filha','Дочь','Hija','Kız evlat'),(1027,'son','Son','ابن','Zoon','Fils','Sohn','Figlio','Filho','Сын','Hijo','Oğul'),(1028,'sister','Sister','أخت','Zus','Sœur','Schwester','Sorella','Irmã','Сестра','Hermana','Kız kardeş'),(1029,'brother','Brother','شقيق','Broer','Frère','Bruder','Fratello','Irmão','Брат','Hermano','Erkek kardeş'),(1030,'auntie','Auntie','عمة','Tante','Tata','Tante','Auntie','Tia','тетушка','Tía','teyzeciğim'),(1031,'uncle','Uncle','اخو الام','Oom','Oncle','Onkel','Zio','Tio','Дядя','Tío','Amca dayı'),(1032,'niece','Niece','ابنة الاخ','Nicht','Nièce','Nichte','Nipote','Sobrinha','Племянница','Sobrina','Yeğen'),(1033,'nephew','Nephew','ابن أخ','Neef','Neveu','Neffe','Nipote','Sobrinho','Племянник','Sobrino','Erkek yeğen'),(1034,'cousin_female','Cousin (female)','ابن عم (أنثى)','Neef (vrouwelijk)','Cousine)','Cousine)','Cugina)','Prima)','Двоюродная сестра)','Prima)','Kuzenim (kadın)'),(1035,'cousin_male','Cousin (male)','ابن عم (ذكور)','Neef)','Cousin Male)','Cousin)','Cugino maschio)','Primo)','Двоюродный брат)','Primo varón)','Erkek kuzen)'),(1036,'grandmother','Grandmother','جدة','Grootmoeder','Grand-mère','Oma','Nonna','Avó','Бабушка','Abuela','büyükanne'),(1037,'grandfather','Grandfather','جد','Grootvader','Grand-père','Großvater','Nonno','Avô','Дед','Abuelo','Büyük baba'),(1038,'granddaughter','Granddaughter','حفيدة','Kleindochter','Petite fille','Enkelin','Nipotina','Neta','Внучка','Nieta','Kız torun'),(1039,'grandson','Grandson','حفيد','Kleinzoon','Petit fils','Enkel','Nipote','Neto','Внук','Nieto','Erkek torun'),(1040,'stepsister','Stepsister','مثل اختي','Stiefzuster','Demi-soeur','Stiefschwester','Sorellastra','Meia-irmã','Сводная сестра','Hermanastra','Üvey kızkardeş'),(1041,'stepbrother','Stepbrother','أخ غير شقيق','stiefbroeder','Beau-frère','Stiefbruder','Fratellastro','Meio-irmão','Сводный брат','Hermanastro','Üvey erkek kardeş'),(1042,'stepmother','Stepmother','زوجة الأب','Stiefmoeder','Stepmother','Stiefmutter','Matrigna','Madrasta','Мачеха','Madrastra','üvey anne'),(1043,'stepfather','Stepfather','زوج الأم','Stiefvader','Beau-père','Stiefvater','Patrigno','Padrasto','Отчим','Padrastro','üvey baba'),(1044,'stepdaughter','Stepdaughter','ربيبة','Stiefdochter','Belle fille','Stieftochter','Figliastra','Enteada','Падчерица','Hijastra','üvey kız'),(1045,'sister_in_law','Sister-in-law','أخت الزوج أو اخت الزوجة','Schoonzuster','Belle-soeur','Schwägerin','Cognata','Cunhada','Золовка','Cuñada','Baldız'),(1046,'brother_in_law','Brother-in-law','شقيق الزوج','Zwager','Beau-frère','Schwager','Cognato','Cunhado','Шурин','Cuñado','Kayınbirader'),(1047,'mother_in_law','Mother-in-law','حماة \" أم الزوج أو أم الزوجة','Schoonmoeder','Belle-mère','Schwiegermutter','Suocera','Sogra','Свекровь','Suegra','Kayınvalide'),(1048,'father_in_law','Father-in-law','ووالد بالتبنى','Schoonvader','Beau-père','Schwiegervater','Suocero','Sogro','Тесть','Suegro','Kayınpeder'),(1049,'daughter_in_law','Daughter-in-law','ابنة بالنسب','Schoondochter','Belle-fille','Schwiegertochter','Nuora','Nora','Невестка','Hijastra','Gelin'),(1050,'son_in_law','Son-in-law','ابنه قانونياً','Schoonzoon','Beau fils','Schwiegersohn','Genero','Genro','Зять','Yerno','Damat'),(1051,'sibling_gender_neutral','Sibling (gender neutral)','الأخوة (محايدة جنسانيا)','Broers en zussen (geslachtsneutraal)','Sibling (genre neutre)','Geschwister (geschlechtsneutral)','Fidanzamento (genere neutro)','Irmão (neutro em termos de gênero)','Сиблинг (гендерно нейтральный)','Hermano (neutral de género)','Kardeşlik (cinsiyete dayalı)'),(1052,'parent_gender_neutral','Parent (gender neutral)','الوالد (محايد جنسانيا)','Ouder (geslachtsneutraal)','Parent (genre neutre)','Elternteil (geschlechtsneutral)','Genitore (genere neutro)','Pais (neutro em termos de gênero)','Родитель (гендерно нейтральный)','Padre (neutral de género)','Ebeveyn (cinsiyete dayalı)'),(1053,'child_gender_neutral','Child (gender neutral)','الطفل (محايد جنسانيا)','Kind (geslachtsneutraal)','Enfant (genre neutre)','Kind (geschlechtsneutral)','Bambino (sesso neutro)','Criança (neutro em termos de gênero)','Ребенок (гендерно нейтральный)','Niño (neutral de género)','Çocuk (cinsiyete dayalı)'),(1054,'sibling_of_parent_gender_neutral','Sibling of Parent (gender neutral)','شقيق الوالد (محايد جنسانيا)','Broers en zussen van ouder (geslachtsneutraal)','Sibling of Parent (genre neutre)','Geschwister der Eltern (geschlechtsneutral)','Fratellanza del genitore (neutralità di genere)','Sibling of Parent (neutro em termos de gênero)','Братство родителей (гендерно нейтральный)','Hermano de padre (neutral de género)','Ebeveynin Kardeşliği (cinsiyete dayalı)'),(1055,'child_of_sibling_gender_neutral','Child of Sibling (gender neutral)','طفل الأخوة (محايد جنسانيا)','Kind van broer en zus (geslachtsneutraal)','Enfant de fratrie (genre neutre)','Kind des Geschwisters (geschlechtsneutral)','Bambino di fratelli (neutralità di genere)','Criança do irmão (neutro em termos de gênero)','Ребенок Сиблинга (гендерно нейтральный)','Hijo de hermano (neutral de género)','Kardeşlik çocuğu (cinsiyete dayalı tarafsız)'),(1056,'cousin_gender_neutral','Cousin (gender neutral)','ابن عم (محايدة جنسانيا)','Neef (geslachtsneutraal)','Cousin (genre neutre)','Cousin (geschlechtsneutral)','Cugino (neutralità di genere)','Primo (neutro em termos de gênero)','Кузен (гендерно нейтральный)','Primo (neutral de género)','Kuzenim (cinsiyete aykırı)'),(1057,'grandparent_gender_neutral','Grandparent (gender neutral)','الجد (محايد جنسانيا)','Grootouder (geslachtsneutraal)','Grandparent (genre neutre)','Großeltern (geschlechtsneutral)','Nonno (neutralità di genere)','Avós (neutro em termos de gênero)','Бабушка и дедушка (гендерный нейтраль)','Abuelo (neutral de género)','Büyükbaba (cinsiyet eşitliği yok)'),(1058,'grandchild_gender_neutral','Grandchild (gender neutral)','حفيد (محايد جنسانيا)','Grootkind (geslachtsneutraal)','Petit-fils (genre neutre)','Enkelkind (geschlechtsneutral)','Nipote (neutralità di genere)','Neto (neutro em termos de gênero)','Внуки (гендерно нейтральные)','Nieto (neutral de género)','Torun (cinsiyete dayalı)'),(1059,'step_sibling_gender_neutral','Step-sibling (gender neutral)','أخوة الخطوة (محايدة جنسانيا)','Step-sibling (gender neutraal)','Échec-frère (genre neutre)','Schritt-Geschwister (geschlechtsneutral)','Step-sibling (gender neutral)','Irmão-irmão (neutro em termos de gênero)','Step-sibling (гендерно нейтральный)','Hermanastro (neutral de género)','Adım kardeş (cinsiyete dayalı)'),(1060,'step_parent_gender_neutral','Step-parent (gender neutral)','الخطوة الوالد (محايدة جنسانيا)','Step-parent (gender neutraal)','Step-parent (genre neutre)','Schritt-Elternteil (geschlechtsneutral)','Step-parent (neutralità di genere)','Etapa-pai (neutro em termos de gênero)','Пошаговый (гендерно нейтральный)','El padrastro (neutral de género)','Veli-ebeveyn (cinsiyete dayalı)'),(1061,'stepchild_gender_neutral','Stepchild (gender neutral)','ستيبشيلد (محايد جنسانيا)','Stepchild (gender neutraal)','Stepchild (genre neutre)','Stepchild (geschlechtsneutral)','Stepchild (genere neutro)','Stepchild (neutro em termos de gênero)','Stepchild (гендерно нейтральный)','Stepchild (neutral de género)','Üvey çocuk (cinsiyete aykırı)'),(1062,'sibling_in_law_gender_neutral','Sibling-in-law (gender neutral)','شقيق الزوج (محايد جنسانيا)','Sibling-in-law (gender neutraal)','Sage-frère (genre neutre)','Schwangerschaft (geschlechtsneutral)','Sibling-in-law (gender neutral)','Irmão-irmão (neutro em termos de gênero)','Сиблинг в законе (гендерно нейтральный)','Cuñados (neutral de género)','Kayın üstü (cinsiyete dayalı)'),(1063,'parent_in_law_gender_neutral','Parent-in-law (gender neutral)','الوالد (محايد جنسانيا)','Schoonmoeder (geslachtsneutraal)','Parent-en-loi (neutre pour le genre)','Schwiegertochter (geschlechtsneutral)','Genitore di sesso (neutralità di genere)','Sogro (neutro em termos de gênero)','Зять (гендерно нейтральный)','Suegro (neutral de género)','Kayınvalides (cinsiyet eşitli değil)'),(1064,'child_in_law_gender_neutral','Child-in-law (gender neutral)','صهر الطفل (محايد جنسانيا)','Schoonzoon (geslachtsneutraal)','Bien-être (genre neutre)','Schwiegervater (geschlechtsneutral)','Suono (neutrale di genere)','Nora (neutro em termos de gênero)','Тед (гендерно нейтральный)','Niño (s) (género neutral)','Kayın-kuşun (cinsiyet eşitli)'),(1065,'add_to_family','Add to family','إضافة إلى الأسرة','Voeg toe aan familie','Ajouter à la famille','Zu Familie hinzufügen','Aggiungi alla famiglia','Adicionar à família','Добавить в подборку','Añadir a la familia','Ailenize ekleyin'),(1066,'accept','Accept','قبول','Accepteren','Acceptez','Akzeptieren','Accettare','Aceitar','принимать','Aceptar','Kabul etmek'),(1067,'family_member','Family Member','عضو الأسرة','Familielid','Membre de la famille','Familienmitglied','Membro della famiglia','Membro da família','Член семьи','Miembro de la familia','Aile üyesi'),(1068,'family_members','Family members','أفراد الأسرة','Familieleden','Membres de la famille','Familienmitglieder','Membri della famiglia','Membros da família','Члены семьи','Miembros de la familia','Aile üyeleri'),(1069,'add_as','Add as','أضفه ك','Toevoegen als','Ajouter comme','Hinzufügen Als','Aggiungi come','Adicionar como','Добавить как','Agregar como','Olarak ekle'),(1070,'confirm_remove_family_member','Are you sure that you want to remove this member from your family?','هل تريد بالتأكيد إزالة هذا العضو من عائلتك؟','Weet u zeker dat u dit lid van uw familie wilt verwijderen?','Êtes-vous sûr de vouloir supprimer ce membre de votre famille?','Sind Sie sicher, dass Sie dieses Mitglied aus Ihrer Familie entfernen möchten?','Sei sicuro di voler rimuovere questo membro dalla tua famiglia?','Tem certeza de que deseja remover esse membro da sua família?','Вы уверены, что хотите удалить этого участника из своей семьи?','¿Estás seguro de que deseas eliminar este miembro de tu familia?','Bu üyeyi ailenden kaldırmak istediğinizden emin misiniz?'),(1071,'family_member_added','New member was successfully added to your family list!','تمت إضافة عضو جديد بنجاح إلى قائمة عائلتك!','Nieuw lid is succesvol toegevoegd aan je familielijst!','Un nouveau membre a été ajouté avec succès à votre liste de famille!','Neues Mitglied wurde erfolgreich zu Ihrer Familienliste hinzugefügt!','Nuovo membro è stato aggiunto con successo alla tua lista di famiglia!','Novo membro foi adicionado com sucesso à sua lista de família!','Новый член был успешно добавлен в список ваших семей!','¡El nuevo miembro se agregó a su lista de familia!','Yeni üye, aileniz listesine başarıyla eklendi!'),(1072,'request_sent','Your request was successfully sent!','تم إرسال طلبك بنجاح!','Uw verzoek is succesvol verzonden!','Votre demande a été envoyée avec succès!','Ihre Anfrage wurde erfolgreich gesendet!','La tua richiesta è stata inviata con successo!','Seu pedido foi enviado com sucesso!','Ваш запрос был успешно отправлен!','¡Su solicitud ha sido enviada correctamente!','Talebiniz başarıyla gönderildi!'),(1073,'request_accepted','Accepted your request to be your @','قبلت طلبك ليكون الخاص بك @','Geaccepteerd uw verzoek om uw @','A accepté votre demande pour être votre @','Akzeptiert Ihre Anfrage zu Ihrem @','Accettato la tua richiesta per essere il tuo @','Aceitou seu pedido para ser seu @','Принял ваш запрос как ваш @','Aceptado su solicitud para ser su @','@ Olmak isteğinizi kabul ettiniz'),(1074,'sent_u_request','Listed you as his @','المدرجة لك كما له @','Heb je gezien als zijn @',NULL,'Listed Sie als seine @','Ti ha elencato come suo @','Listou você como seu @','Перечислил вас как его @','Listado como su @','Seni onun @'),(1075,'requests','Requests','طلبات','verzoeken','Demandes','Anfragen','richieste','solicitações de','Запросы','Peticiones','İstekler'),(1076,'no_requests_found','No requests found!','لم يتم العثور على أية طلبات!','Geen verzoeken gevonden!','Aucune demande trouvée!','Keine Anfragen gefunden!','Nessuna richiesta trovata!','Não foram encontrados pedidos!','Запросов не найдено!','No se han encontrado solicitudes!','İstek bulunamadı!'),(1077,'relation_with','In relations with ','في العلاقات مع','In relaties met','En relation avec','Im Zusammenhang mit','Nelle relazioni con','Em relação com','В отношениях с','En las relaciones con','Ile ilişkilerinde'),(1078,'married_to','Married to ','متزوج من','Getrouwd met','Marié à','Verheiratet mit','Sposato con','Casado com','В браке с','Casado con','Evli'),(1079,'engaged_to','Engaged to ','مخطوب ل','verloofd met','Fiancé à','verlobt mit','fidanzato con','noivo de','Помолвлены с','comprometido con','Etkileşim kurdu'),(1080,'relationship_status','Relationship Status ','الحالة الاجتماعية','Relatie status','Statut de la relation','Beziehungsstatus','stato delle relazioni','status de relacionamento','Семейное положение','estado civil','ilişki durumu'),(1081,'relationship_request','Relationship request ','طلب العلاقة','Verzoek om relatie','Demande de relation','Beziehungsanfrage','Richiesta di relazione','Pedido de relacionamento','Запрос на отношении','Solicitud de relación','Ilişki talebi'),(1082,'relhip_request_accepted','Accepted your request @ ','قبل طلبك @','Geaccepteerd uw aanvraag @','A accepté votre demande @','Akzeptiert Ihre Anfrage @','Accettato la tua richiesta @','Aceitou seu pedido @','Принял(а) ваш запрос @','Aceptado su solicitud @','İsteğiniz kabul edildi @'),(1083,'relation_rejected','rejected your relation request @','رفض طلب علاقتك @','Heeft uw relatieverzoek geweigerd @','Rejeté votre demande de relation @','Abgelehnt Ihre Beziehung Anfrage @','Ha respinto la tua richiesta di relazione @','Rejeitou sua solicitação de relacionamento @','Отклонил(a) ваш запрос отношения @','Rechazó su solicitud de relación @','Ilişki isteğini reddetti @'),(1084,'file_too_big','File size error: The file exceeds allowed the limit ({file_size}) and can not be uploaded.','خطأ في حجم الملف: يتجاوز الملف الحد المسموح به ({file_size}) ولا يمكن تحميله.','Bestandsgrootte fout: Het bestand overschrijdt de limiet toegestaan ​​({file_size}) en kan niet worden geüpload.','Erreur de taille de fichier: le fichier dépasse autorisé la limite ({image_fichier}) et ne peut pas être téléchargé.','Dateigrößenfehler: Die Datei überschreitet die Begrenzung ({file_size}) und kann nicht hochgeladen werden.','Errore di dimensione del file: il file supera il limite consentito ({file_size}) e non può essere caricato.','Erro de tamanho de arquivo: o arquivo excede permitido o limite ({file_size}) e não pode ser carregado.','Ошибка размера файла: файл превышает допустимый предел ({file_size}) и не может быть загружен.','Error de tamaño de archivo: El archivo excede el límite permitido ({file_size}) y no se puede cargar.','Dosya boyutu hatası: Dosya limiti aştı ({file_size}) ve yüklenemiyor.'),(1085,'file_not_supported','Unable to upload a file: This file type is not supported.','تعذر تحميل ملف: نوع الملف هذا غير متوافق.','Kan een bestand niet uploaden: dit bestandstype wordt niet ondersteund.',NULL,'Kann eine Datei nicht hochladen: Dieser Dateityp wird nicht unterstützt.','Impossibile caricare un file: questo tipo di file non è supportato.','Não é possível carregar um arquivo: esse tipo de arquivo não é suportado.','Не удалось загрузить файл. Этот тип файла не поддерживается.','No se puede cargar un archivo: este tipo de archivo no es compatible.','Dosya yüklenemiyor: Bu dosya türü desteklenmiyor.'),(1086,'years_old','years old','سنوات','jaar oud','ans','Jahre alt','Anni','anos','лет','años','yaşında'),(1087,'find_friends_nearby','Find friends nearby','العثور على الأصدقاء في مكان قريب','Vind vrienden in de buurt','Trouver des amis à proximité','Freunde in der Nähe finden','Trova amici nelle vicinanze','Encontre amigos nas proximidades','Найти друзей поблизости','Encuentra amigos cercanos','Yakınlarda arkadaş bul'),(1088,'location_dist','Location distance','مسافة الموقع','Locatie afstand','Distance demplacement','Standortabstand','Distanza della posizione','Distância de localização','Месторасположение','Ubicación distancia','Yer mesafesi'),(1089,'close_to_u','close to you','قريب منك','dicht bij jou','près de vous','nah bei dir','vicino a te','perto de você','близко к тебе','cerca de usted','sana yakın'),(1090,'find_friends','Find friends','البحث عن أصدقاء','Zoek vrienden','Trouver des amis','Freunde finden','Trova amici','Encontrar amigos','Найти друзей','Encontrar amigos','Arkadaşları bul'),(1091,'distance','distance','مسافه: بعد','afstand','distance','Entfernung','distanza','distância','расстояние','distancia','mesafe'),(1092,'distance_from_u','distance from you','المسافة منك','Afstand van jou','Distance de vous','Entfernung von Ihnen','Distanza da te','Distância de você','Расстояние от вас','Distancia de ti','Senden uzaklık'),(1093,'show_location','Show location','إظهار الموقع','Toon locatie',NULL,'Lage anzeigen','Mostra la posizione','Mostrar localização','Показать на карте','Mostrar ubicación','Yeri göster'),(1094,'share_my_location','Share my location with public?','هل تريد مشاركة موقعي مع الجمهور؟','Deel mijn locatie met publiek?','Partagez mon emplacement avec le public?','Teilen Sie meinen Standort mit der Öffentlichkeit?','Condividi la mia posizione con il pubblico?','Compartilhe minha localização com o público?','Поделитесь своим местоположением с публикой?','Compartir mi ubicación con público?','Konumumu halkla paylaşmak mı istiyorsunuz?'),(1095,'enter_valid_title','Please enter a valid title','يرجى إدخال عنوان صالح','Vul alstublieft een geldige titel in','Entrez un titre valide','Bitte geben Sie einen gültigen Titel ein','Si prega di inserire un titolo valido','Insira um título válido','Введите действительное название','Ingrese un título válido','Lütfen geçerli bir başlık girin'),(1096,'pay_per_click','Pay Per Click (${{PRICE}})','الدفع لكل نقرة (${{PRICE}})','Betaal per klik (${{PRICE}})','Pay Per Click (${{PRICE}})','Pay Per Click (${{PRICE}})','Pay Per Click (${{PRICE}})','Pay Per Click (${{PRICE}})','Платить за клик (${{PRICE}})','Pago por clic (${{PRICE}})','Tıklama başına Öde (${{PRICE}})'),(1097,'pay_per_imprssion','Pay Per Impression (${{PRICE}})','الدفع لكل ظهور (${{PRICE}})','Betaal per indruk (${{PRICE}})','Pay per Impression (${{PRICE}})','Pay per Impression (${{PRICE}})','Pay Per Impression (${{PRICE}})','Pague por impressão (${{PRICE}})','Платить за показ (${{PRICE}})','Pago por impresión (${{PRICE}})','Gösterim Başına Ödeme (${{PRICE}})'),(1098,'top_up','Top up','فوق حتى','Top up','Remplir','Nachfüllen','Riempire','Completar','Пополнить','Completar','Ekleyin'),(1099,'balance_is_0','Your current wallet balance is: 0, please top up your wallet to continue.','رصيد المحفظة الحالي هو: 0، يرجى متابعة محفظتك للمتابعة.','Uw huidige portemonneebalans is: 0, vul uw portemonnee aan om door te gaan.','Votre solde de portefeuille actuel est: 0, veuillez compléter votre portefeuille pour continuer.','Ihre aktuelle Brieftasche Gleichgewicht ist: 0, bitte nach oben Ihre Brieftasche, um fortzufahren.','Il tuo saldo attuale del portafoglio è: 0, ti preghiamo di riempire il portafoglio per continuare.','Seu saldo de carteira atual é: 0, por favor, complete sua carteira para continuar.','Ваш текущий баланс кошелька: 0, пожалуйста, пополните свой кошелек, чтобы продолжить.','Su saldo de cartera actual es: 0, por favor, recargue su cartera para continuar.','Mevcut cüzdan bakiyeniz: 0, devam etmek için lütfen cüzdanınızı doldurun.'),(1100,'messages_delete_confirmation','Are you sure you want to delete this conversation?','هل تريد بالتأكيد حذف هذه المحادثة؟','Weet u zeker dat u dit gesprek wilt verwijderen?','Êtes-vous sûr de vouloir supprimer cette conversation?','Sind Sie sicher, dass Sie diese Konversation löschen möchten?','Sei sicuro di voler eliminare questa conversazione?','Tem certeza de que deseja excluir esta conversa?','Вы действительно хотите удалить этот разговор?','¿Seguro que quieres eliminar esta conversación?','Bu sohbeti silmek istediğinizden emin misiniz?'),(1101,'currency','Currency','دقة','Valuta','Devise','Währung','Moneta','Moeda','валюта','Moneda','Para birimi'),(1102,'friends_stories','Friends Stories','قصص الأصدقاء','Vriendenverhalen',NULL,'Freunde Geschichten','Storie di amici','Histórias de amigos','Истории друзей','Historias de amigos','Arkadaş Hikayeleri'),(1103,'no_messages_here_yet','No messages yet here.','لا توجد رسائل حتى الآن.','Nog geen berichten hier.',NULL,'Noch keine Mitteilungen.','Non ci sono ancora messaggi qui.','Ainda não há mensagens aqui.','Пока сообщений нет.','Aún no hay mensajes.','Henüz mesaj yok.'),(1104,'conver_deleted','Conversation has been deleted.','تم حذف المحادثة.','Conversatie is verwijderd.','La conversation a été supprimée.','Konversation wurde gelöscht.','La conversazione è stata eliminata.','A conversa foi excluída.','Разговор удален.','Se ha eliminado la conversación.','Sohbet silindi.'),(1105,'group_name_limit','Group name must be 4/15 characters','يجب أن يكون اسم المجموعة 4/15 حرفا','De groepsnaam moet 4/15 karakters zijn','Le nom du groupe doit comporter 4/15 caractères','Der Gruppenname muss 4/15 Zeichen lang sein','Il nome del gruppo deve essere di 4/15 caratteri','O nome do grupo deve ser de 4/15 caracteres','Имя группы должно быть 4/15 символов','El nombre del grupo debe tener 4/15 caracteres','Grup adı 4/15 karakter olmalıdır'),(1106,'group_avatar_image','Group avatar must be an image','يجب أن تكون الصورة الرمزية للمجموعة صورة','Groep avatar moet een afbeelding zijn',NULL,'Gruppen-Avatar muss ein Bild sein',NULL,'O avatar do grupo deve ser uma imagem','Групповой аватар должен быть изображением','El avatar del grupo debe ser una imagen','Grup avatar bir resim olmalı'),(1107,'explore','Explore','إستكشاف','Onderzoeken','Explorer','Erforschen','Esplorare','Explorar','Исследовать','Explorar','Keşfetmek'),(1108,'plugin_plugins','Plugins','Plugins','Plugins','Plugins','Plugins','Plugins','Plugins','Plugins','Plugins','Plugins'),(1109,'plugin_plugin_list','Plugin List','Plugin List','Plugin List','Plugin List','Plugin List','Plugin List','Plugin List','Plugin List','Plugin List','Plugin List'),(1110,'plugin_no_plugins_available','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment','No plugins available in this moment'),(1111,'plugin_save_changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes'),(1112,'plugin_no_more_data','There is no more data to show','There is no more data to show','There is no more data to show','There is no more data to show','There is no more data to show','There is no more data to show','There is no more data to show','There is no more data to show','There is no more data to show','There is no more data to show'),(1113,'plugin_configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations'),(1114,'plugin_b_home_col','Column left in home','Column left in home','Column left in home','Column left in home','Column left in home','Column left in home','Column left in home','Column left in home','Column left in home','Column left in home'),(1115,'plugin_b_home_col_desc','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users','Enable column left in home template, is a style more easy for your users'),(1116,'plugin_b_plublisher_new','Publisher new','Publisher new','Publisher new','Publisher new','Publisher new','Publisher new','Publisher new','Publisher new','Publisher new','Publisher new'),(1117,'plugin_b_plublisher_new_desc','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher','Eneable this for create best button and more option in the publisher'),(1118,'plugin_tab_user_id','User ID','User ID','User ID','User ID','User ID','User ID','User ID','User ID','User ID','User ID'),(1119,'plugin_back_to_listing','Back to Listings','Back to Listings','Back to Listings','Back to Listings','Back to Listings','Back to Listings','Back to Listings','Back to Listings','Back to Listings','Back to Listings'),(1120,'plugin_enabled','Enabled','Enabled','Enabled','Enabled','Enabled','Enabled','Enabled','Enabled','Enabled','Enabled'),(1121,'plugin_disabled','Disabled','Disabled','Disabled','Disabled','Disabled','Disabled','Disabled','Disabled','Disabled','Disabled'),(1122,'plugin_edit_profile','Edit Profile','Edit Profile','Edit Profile','Edit Profile','Edit Profile','Edit Profile','Edit Profile','Edit Profile','Edit Profile','Edit Profile'),(1123,'plugin_profile_picture','Profile Picture','Profile Picture','Profile Picture','Profile Picture','Profile Picture','Profile Picture','Profile Picture','Profile Picture','Profile Picture','Profile Picture'),(1124,'plugin_favorites_m','FAVORITES','FAVORITES','FAVORITES','FAVORITES','FAVORITES','FAVORITES','FAVORITES','FAVORITES','FAVORITES','FAVORITES'),(1125,'plugin_news_feed','News Feed','News Feed','News Feed','News Feed','News Feed','News Feed','News Feed','News Feed','News Feed','News Feed'),(1126,'plugin_pages_m','PAGES','PAGES','PAGES','PAGES','PAGES','PAGES','PAGES','PAGES','PAGES','PAGES'),(1127,'plugin_create_page','Create Page','Create Page','Create Page','Create Page','Create Page','Create Page','Create Page','Create Page','Create Page','Create Page'),(1128,'plugin_manage_pages','Manage Pages','Manage Pages','Manage Pages','Manage Pages','Manage Pages','Manage Pages','Manage Pages','Manage Pages','Manage Pages','Manage Pages'),(1129,'plugin_groups_m','GROUPS','GROUPS','GROUPS','GROUPS','GROUPS','GROUPS','GROUPS','GROUPS','GROUPS','GROUPS'),(1130,'plugin_create_group','Create Group','Create Group','Create Group','Create Group','Create Group','Create Group','Create Group','Create Group','Create Group','Create Group'),(1131,'plugin_manage_groups','Manage Groups','Manage Groups','Manage Groups','Manage Groups','Manage Groups','Manage Groups','Manage Groups','Manage Groups','Manage Groups','Manage Groups'),(1132,'plugin_aplications_m','APPLICATIONS','APPLICATIONS','APPLICATIONS','APPLICATIONS','APPLICATIONS','APPLICATIONS','APPLICATIONS','APPLICATIONS','APPLICATIONS','APPLICATIONS'),(1133,'plugin_write_post','Write Post','Write Post','Write Post','Write Post','Write Post','Write Post','Write Post','Write Post','Write Post','Write Post'),(1134,'plugin_create_album','Create Album','Create Album','Create Album','Create Album','Create Album','Create Album','Create Album','Create Album','Create Album','Create Album'),(1135,'plugin_more','More','More','More','More','More','More','More','More','More','More'),(1136,'plugin_add_video','Add Video','Add Video','Add Video','Add Video','Add Video','Add Video','Add Video','Add Video','Add Video','Add Video'),(1137,'plugin_add_audio','Add Audio','Add Audio','Add Audio','Add Audio','Add Audio','Add Audio','Add Audio','Add Audio','Add Audio','Add Audio'),(1138,'plugin_add_file','Add File','Add File','Add File','Add File','Add File','Add File','Add File','Add File','Add File','Add File'),(1139,'plugin_add_product','Add Product','Add Product','Add Product','Add Product','Add Product','Add Product','Add Product','Add Product','Add Product','Add Product'),(1140,'plugin_question_questions','Questions','Questions','Questions','Questions','Questions','Questions','Questions','Questions','Questions','Questions'),(1141,'plugin_question_question','Question','Question','Question','Question','Question','Question','Question','Question','Question','Question'),(1142,'plugin_question_votes','votes','votes','votes','votes','votes','votes','votes','votes','votes','votes'),(1143,'plugin_question_who_vote_this','who vote for this','who vote for this','who vote for this','who vote for this','who vote for this','who vote for this','who vote for this','who vote for this','who vote for this','who vote for this'),(1144,'plugin_question_people_who_vote_this','People Who Vote This','People Who Vote This','People Who Vote This','People Who Vote This','People Who Vote This','People Who Vote This','People Who Vote This','People Who Vote This','People Who Vote This','People Who Vote This'),(1145,'plugin_question_people_no_vote_this','People no vote this','People no vote this','People no vote this','People no vote this','People no vote this','People no vote this','People no vote this','People no vote this','People no vote this','People no vote this'),(1146,'plugin_question_vote_notify','vote you question','vote you question','vote you question','vote you question','vote you question','vote you question','vote you question','vote you question','vote you question','vote you question'),(1147,'plugin_question_question_invite_notify','invite you to vote a question','invite you to vote a question','invite you to vote a question','invite you to vote a question','invite you to vote a question','invite you to vote a question','invite you to vote a question','invite you to vote a question','invite you to vote a question','invite you to vote a question'),(1148,'plugin_question_send_request','Send Request','Send Request','Send Request','Send Request','Send Request','Send Request','Send Request','Send Request','Send Request','Send Request'),(1149,'plugin_question_post_a_question','Post a question','Post a question','Post a question','Post a question','Post a question','Post a question','Post a question','Post a question','Post a question','Post a question'),(1150,'plugin_question_p_limit_answers','Limit To Answers','Limit To Answers','Limit To Answers','Limit To Answers','Limit To Answers','Limit To Answers','Limit To Answers','Limit To Answers','Limit To Answers','Limit To Answers'),(1151,'plugin_question_p_limit_answers_desc','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers','This option allow you to set the limit to answers'),(1152,'plugin_question_p_enable_add_answers','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question','Enable Add Answers in question'),(1153,'plugin_question_p_enable_add_answers_desc','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers','This option allow you to enable or disable add answers'),(1154,'plugin_question_p_enable_multivote','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes','Enable Multiples votes'),(1155,'plugin_question_p_enable_multivote_desc','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question','Option to enable multi vote in a question'),(1156,'plugin_question_p_enable_invite_vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote','Invite to friends to vote'),(1157,'plugin_question_p_enable_invite_vote_desc','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends','Option to enable for button invite friends'),(1158,'plugin_question_p_enable_question_profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile','Enable see questions in profile'),(1159,'plugin_question_p_enable_question_profile_desc','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile','Option to enable questions in profile'),(1160,'plugin_question_question_invite','Invite to friend','Invite to friend','Invite to friend','Invite to friend','Invite to friend','Invite to friend','Invite to friend','Invite to friend','Invite to friend','Invite to friend'),(1161,'plugin_question_question_invite_desc','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this','Invite friends to vote this'),(1162,'plugin_question_p_enable_email_invite_vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote','Email for invite to friends to vote'),(1163,'plugin_question_p_enable_email_invite_vote_desc','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends','Option to enable send email for button invite friends'),(1164,'plugin_combo_all','All','All','All','All','All','All','All','All','All','All'),(1165,'plugin_combo_no_reactions','no reactions','no reactions','no reactions','no reactions','no reactions','no reactions','no reactions','no reactions','no reactions','no reactions'),(1166,'plugin_combo_activity_reacted_post','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.','liked {user} <a class=\"main-color\" href=\"{post}\">post</a>.'),(1167,'plugin_combo_reaction_post','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}','reacted in your {postType} {post}'),(1168,'plugin_combo_comment','Comment','Comment','Comment','Comment','Comment','Comment','Comment','Comment','Comment','Comment'),(1169,'plugin_combo_drag_link_photo','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here','Drag a link or photos here'),(1170,'plugin_combo_place_you_link','Place your link','Place your link','Place your link','Place your link','Place your link','Place your link','Place your link','Place your link','Place your link','Place your link'),(1171,'plugin_combo_place_the_photo','Place the photo','Place the photo','Place the photo','Place the photo','Place the photo','Place the photo','Place the photo','Place the photo','Place the photo','Place the photo'),(1172,'plugin_combo_enable_reactions_desc','You wanna active reactions','You wanna active reactions','You wanna active reactions','You wanna active reactions','You wanna active reactions','You wanna active reactions','You wanna active reactions','You wanna active reactions','You wanna active reactions','You wanna active reactions'),(1173,'plugin_combo_good_morning','Good morning','Good morning','Good morning','Good morning','Good morning','Good morning','Good morning','Good morning','Good morning','Good morning'),(1174,'plugin_combo_good_afternoon','Good afternoon','Good afternoon','Good afternoon','Good afternoon','Good afternoon','Good afternoon','Good afternoon','Good afternoon','Good afternoon','Good afternoon'),(1175,'plugin_combo_good_evening','Good evening','Good evening','Good evening','Good evening','Good evening','Good evening','Good evening','Good evening','Good evening','Good evening'),(1176,'plugin_combo_good_nigth','Good nigth','Good nigth','Good nigth','Good nigth','Good nigth','Good nigth','Good nigth','Good nigth','Good nigth','Good nigth'),(1177,'plugin_combo_enable_reaction','Enable reactions','Enable reactions','Enable reactions','Enable reactions','Enable reactions','Enable reactions','Enable reactions','Enable reactions','Enable reactions','Enable reactions'),(1178,'plugin_combo_enable_reaction_desc','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post','Option to enable reactions in post'),(1179,'plugin_combo_enable_tag_act','Enable tag action','Enable tag action','Enable tag action','Enable tag action','Enable tag action','Enable tag action','Enable tag action','Enable tag action','Enable tag action','Enable tag action'),(1180,'plugin_combo_enable_tag_act_desc','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post','Option to enable post tag friends in post'),(1181,'plugin_combo_enable_welcome','Enable welcome in home','Enable welcome in home','Enable welcome in home','Enable welcome in home','Enable welcome in home','Enable welcome in home','Enable welcome in home','Enable welcome in home','Enable welcome in home','Enable welcome in home'),(1182,'plugin_combo_enable_welcome_desc','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome','Option to enable nice welcome'),(1183,'plugin_combo_enable_dragdrop','Enable drag & drop','Enable drag & drop','Enable drag & drop','Enable drag & drop','Enable drag & drop','Enable drag & drop','Enable drag & drop','Enable drag & drop','Enable drag & drop','Enable drag & drop'),(1184,'plugin_combo_enable_dragdrop_desc','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall','Option to enable drag & drop photos in wall'),(1185,'plugin_combo_you','You','You','You','You','You','You','You','You','You','You'),(1186,'plugin_combo_and','and','and','and','and','and','and','and','and','and','and'),(1187,'plugin_combo_like_this','like this','like this','like this','like this','like this','like this','like this','like this','like this','like this'),(1188,'plugin_combo_peoples','peoples','peoples','peoples','peoples','peoples','peoples','peoples','peoples','peoples','peoples'),(1189,'reaction_1','Like','Like','Like','Like','Like','Like','Like','Like','Like','Like'),(1190,'reaction_2','Love','Love','Love','Love','Love','Love','Love','Love','Love','Love'),(1191,'reaction_3','Haha','Haha','Haha','Haha','Haha','Haha','Haha','Haha','Haha','Haha'),(1192,'reaction_4','Wow','Wow','Wow','Wow','Wow','Wow','Wow','Wow','Wow','Wow'),(1193,'reaction_5','Sad','Sad','Sad','Sad','Sad','Sad','Sad','Sad','Sad','Sad'),(1194,'reaction_6','Angry','Angry','Angry','Angry','Angry','Angry','Angry','Angry','Angry','Angry'),(1195,'reaction_7','Dislike','Dislike','Dislike','Dislike','Dislike','Dislike','Dislike','Dislike','Dislike','Dislike'),(1196,'plugin_poke_pokes','Pokes','Pokes','Pokes','Pokes','Pokes','Pokes','Pokes','Pokes','Pokes','Pokes'),(1197,'plugin_poke_poke_search_friend','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke','Search friends for send a poke'),(1198,'plugin_poke_poke_no_available','No pokes available','No pokes available','No pokes available','No pokes available','No pokes available','No pokes available','No pokes available','No pokes available','No pokes available','No pokes available'),(1199,'plugin_poke_see_more','See More','See More','See More','See More','See More','See More','See More','See More','See More','See More'),(1200,'plugin_poke_poke_suggest','Poke Suggest','Poke Suggest','Poke Suggest','Poke Suggest','Poke Suggest','Poke Suggest','Poke Suggest','Poke Suggest','Poke Suggest','Poke Suggest'),(1201,'plugin_poke_poke_suggest_no_available','No poke suggest available','No poke suggest available','No poke suggest available','No poke suggest available','No poke suggest available','No poke suggest available','No poke suggest available','No poke suggest available','No poke suggest available','No poke suggest available'),(1202,'plugin_poke_gave_a_poke','You gave a poke to','You gave a poke to','You gave a poke to','You gave a poke to','You gave a poke to','You gave a poke to','You gave a poke to','You gave a poke to','You gave a poke to','You gave a poke to'),(1203,'plugin_poke_give_a_poke','Give a poke','Give a poke','Give a poke','Give a poke','Give a poke','Give a poke','Give a poke','Give a poke','Give a poke','Give a poke'),(1204,'plugin_poke_return_poke','Returns the poke','Returns the poke','Returns the poke','Returns the poke','Returns the poke','Returns the poke','Returns the poke','Returns the poke','Returns the poke','Returns the poke'),(1205,'plugin_poke_new_poke_in','New poke in','New poke in','New poke in','New poke in','New poke in','New poke in','New poke in','New poke in','New poke in','New poke in'),(1206,'plugin_poke_a_person_poke','a person send a poke to you','a person send a poke to you','a person send a poke to you','a person send a poke to you','a person send a poke to you','a person send a poke to you','a person send a poke to you','a person send a poke to you','a person send a poke to you','a person send a poke to you'),(1207,'plugin_poke_next_link','You can see more info in next link','You can see more info in next link','You can see more info in next link','You can see more info in next link','You can see more info in next link','You can see more info in next link','You can see more info in next link','You can see more info in next link','You can see more info in next link','You can see more info in next link'),(1208,'plugin_poke_poke_sending','Poke sending','Poke sending','Poke sending','Poke sending','Poke sending','Poke sending','Poke sending','Poke sending','Poke sending','Poke sending'),(1209,'plugin_poke_poke_prev','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user','You send before a poke to this user'),(1210,'plugin_poke_pokecant','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you','Cant send a poke to self you'),(1211,'plugin_poke_pokedeleted','Poke deleted','Poke deleted','Poke deleted','Poke deleted','Poke deleted','Poke deleted','Poke deleted','Poke deleted','Poke deleted','Poke deleted'),(1212,'plugin_poke_try_more_late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late'),(1213,'plugin_poke_poke_to_you','given a poke to you','given a poke to you','given a poke to you','given a poke to you','given a poke to you','given a poke to you','given a poke to you','given a poke to you','given a poke to you','given a poke to you'),(1214,'plugin_share_error','Error','Error','Error','Error','Error','Error','Error','Error','Error','Error'),(1215,'plugin_share_error_post_no_exists','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse','This post no exist or no have permisse'),(1216,'plugin_share_share_post','Echo Post','Share Post','Share Post','Share Post','Share Post','Share Post','Share Post','Share Post','Share Post','Share Post'),(1217,'plugin_share_no_shared','This post no was shared','This post no was shared','This post no was shared','This post no was shared','This post no was shared','This post no was shared','This post no was shared','This post no was shared','This post no was shared','This post no was shared'),(1218,'plugin_share_who_shares','Who Echoes','Who Shares','Who Shares','Who Shares','Who Shares','Who Shares','Who Shares','Who Shares','Who Shares','Who Shares'),(1219,'plugin_share_post','Post','Post','Post','Post','Post','Post','Post','Post','Post','Post'),(1220,'plugin_share_share_noty','Echoed you post','Shared you post','Shared you post','Shared you post','Shared you post','Shared you post','Shared you post','Shared you post','Shared you post','Shared you post'),(1221,'plugin_share_shared_in_wall','Echoed in: Wall','Shared in: Wall','Shared in: Wall','Shared in: Wall','Shared in: Wall','Shared in: Wall','Shared in: Wall','Shared in: Wall','Shared in: Wall','Shared in: Wall'),(1222,'plugin_share_shared_in_you_wall','Echo in your wall','Share in your wall','Share in your wall','Share in your wall','Share in your wall','Share in your wall','Share in your wall','Share in your wall','Share in your wall','Share in your wall'),(1223,'plugin_share_shared_in_wall_friend','Echoed in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend','Shared in: Wall of Friend'),(1224,'plugin_share_shared_in_you_wall_friend','Echo in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend','Share in the wall of a friend'),(1225,'plugin_share_name_friend','Name of you friend','Name of you friend','Name of you friend','Name of you friend','Name of you friend','Name of you friend','Name of you friend','Name of you friend','Name of you friend','Name of you friend'),(1226,'plugin_share_shared_in_group','Echoed in: Group','Echoed in: Group','Echoed in: Group','Echoed in: Group','Echoed in: Group','Echoed in: Group','Echoed in: Group','Echoed in: Group','Echoed in: Group','Echoed in: Group'),(1227,'plugin_share_shared_in_you_group','Echo in your group','Echo in your group','Echo in your group','Echo in your group','Echo in your group','Echo in your group','Echo in your group','Echo in your group','Echo in your group','Echo in your group'),(1228,'plugin_share_name_group','Name of the group','Name of the group','Name of the group','Name of the group','Name of the group','Name of the group','Name of the group','Name of the group','Name of the group','Name of the group'),(1229,'plugin_share_shared_in_event','Echoed in: Event','Echoed in: Event','Echoed in: Event','Echoed in: Event','Echoed in: Event','Echoed in: Event','Echoed in: Event','Echoed in: Event','Echoed in: Event','Echoed in: Event'),(1230,'plugin_share_shared_in_you_event','Echo in your event','Echo in your event','Echo in your event','Echo in your event','Echo in your event','Echo in your event','Echo in your event','Echo in your event','Echo in your event','Echo in your event'),(1231,'plugin_share_name_event','Name of the event','Name of the event','Name of the event','Name of the event','Name of the event','Name of the event','Name of the event','Name of the event','Name of the event','Name of the event'),(1232,'plugin_share_shared_in_page','Echoed in: Page','Echoed in: Page','Echoed in: Page','Echoed in: Page','Echoed in: Page','Echoed in: Page','Echoed in: Page','Echoed in: Page','Echoed in: Page','Echoed in: Page'),(1233,'plugin_share_shared_in_you_page','Echo in your page','Echo in your page','Echo in your page','Echo in your page','Echo in your page','Echo in your page','Echo in your page','Echo in your page','Echo in your page','Echo in your page'),(1234,'plugin_share_name_page','Name of the page','Name of the page','Name of the page','Name of the page','Name of the page','Name of the page','Name of the page','Name of the page','Name of the page','Name of the page'),(1235,'plugin_point_points_rankings','Coins Rankings','Coins Rankings','Coins Rankings','Coins Rankings','Coins Rankings','Coins Rankings','Coins Rankings','Coins Rankings','Coins Rankings','Coins Rankings'),(1236,'plugin_point_enable_points_rankings','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking','Enable Coins Ranking'),(1237,'plugin_point_yes_enable_points_ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking','Yes, enable coins ranking'),(1238,'plugin_point_no_disable_points_ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking','No, disable coins ranking'),(1239,'plugin_point_enable_points_rankings_desc','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page','Control if you want to show rank calculated from users total earned coins till date based on table below on his profile and user home page'),(1240,'plugin_point_points_from','Coins from','Coins from','Coins from','Coins from','Coins from','Coins from','Coins from','Coins from','Coins from','Coins from'),(1241,'plugin_point_rank_title','Rank Title','Rank Title','Rank Title','Rank Title','Rank Title','Rank Title','Rank Title','Rank Title','Rank Title','Rank Title'),(1242,'plugin_point_add_more','Add more','Add more','Add more','Add more','Add more','Add more','Add more','Add more','Add more','Add more'),(1243,'plugin_point_save_changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes','Save Changes'),(1244,'plugin_point_give_points','Give Coins','Give Coins','Give Coins','Give Coins','Give Coins','Give Coins','Give Coins','Give Coins','Give Coins','Give Coins'),(1245,'plugin_point_give_points_desc','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..','Give or Set coins to all users / group / user. Please note: If you select many users, this process may take a while..'),(1246,'plugin_point_give_to','Give to','Give to','Give to','Give to','Give to','Give to','Give to','Give to','Give to','Give to'),(1247,'plugin_point_all_users','All Users','All Users','All Users','All Users','All Users','All Users','All Users','All Users','All Users','All Users'),(1248,'plugin_point_specific_u','Specific user','Specific user','Specific user','Specific user','Specific user','Specific user','Specific user','Specific user','Specific user','Specific user'),(1249,'plugin_point_user','User','User','User','User','User','User','User','User','User','User'),(1250,'plugin_point_amount','Amount','Amount','Amount','Amount','Amount','Amount','Amount','Amount','Amount','Amount'),(1251,'plugin_point_points_negative_desc','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount','You can also enter negative amount'),(1252,'plugin_point_set_points_desc','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)','Set coins (This will set coins to specified amount instead of adding them)'),(1253,'plugin_point_also_send_msg','Also send message','Also send message','Also send message','Also send message','Also send message','Also send message','Also send message','Also send message','Also send message','Also send message'),(1254,'plugin_point_from_u','From User','From User','From User','From User','From User','From User','From User','From User','From User','From User'),(1255,'plugin_point_other','Other','Other','Other','Other','Other','Other','Other','Other','Other','Other'),(1256,'plugin_point_please_specific_u','Please specific user','Please specific user','Please specific user','Please specific user','Please specific user','Please specific user','Please specific user','Please specific user','Please specific user','Please specific user'),(1257,'plugin_point_subject','Subject','Subject','Subject','Subject','Subject','Subject','Subject','Subject','Subject','Subject'),(1258,'plugin_point_message','Message','Message','Message','Message','Message','Message','Message','Message','Message','Message'),(1259,'plugin_point_general_activity','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings','General Activity Coins Settings'),(1260,'plugin_point_enable_rank','Enable Top Users?','Enable Top Users?','Enable Top Users?','Enable Top Users?','Enable Top Users?','Enable Top Users?','Enable Top Users?','Enable Top Users?','Enable Top Users?','Enable Top Users?'),(1261,'plugin_point_yes_enable_top','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.','Yes, enable Top Users.'),(1262,'plugin_point_no_disable_top','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.','No, disable Top Users.'),(1263,'plugin_point_rank_desc','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.','This will show a page of top users ranked by total amount of accumulated coins (regardless of their current coins &quot;balance&quot;) and also show users rank on profile and user homepage.'),(1264,'plugin_point_enable_offers','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?','Enable Offers (Earn Coins)?'),(1265,'plugin_point_yes_enable_offers','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.','Yes, enable Offers.'),(1266,'plugin_point_no_disable_offers','No, disable Offers.','No, disable Offers.','No, disable Offers.','No, disable Offers.','No, disable Offers.','No, disable Offers.','No, disable Offers.','No, disable Offers.','No, disable Offers.','No, disable Offers.'),(1267,'plugin_point_offers_desc','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?','Do you want to allow users to view &quot;Earn Coins&quot; page and participate in offers for gaining coins?'),(1268,'plugin_point_enable_shop','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?','Enable Coins Shop (Spend Coins)?'),(1269,'plugin_point_yes_enable_shop','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.','Yes, enable Coins Shop.'),(1270,'plugin_point_no_disable_shop','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.','No,  disable Coins Shop.'),(1271,'plugin_point_shop_desc','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?','Do you want to allow users to view &quot;Spend Coins&quot; page and purchase items?'),(1272,'plugin_point_assign_activity_points','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins','Assign Activity Coins'),(1273,'plugin_point_assign_activity_desc','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap','This page allows assigning various activity coins. You can limit maximum amount of accumulated coins for a designated period (Rollover period). Enter 0 for Max field to disable limiting. Enter 0 for (Rollover period) field to make it an all time cap'),(1274,'plugin_point_action_name','Action Name','Action Name','Action Name','Action Name','Action Name','Action Name','Action Name','Action Name','Action Name','Action Name'),(1275,'plugin_point_max','Max','Max','Max','Max','Max','Max','Max','Max','Max','Max'),(1276,'plugin_point_rollover_period','Rollover period','Rollover period','Rollover period','Rollover period','Rollover period','Rollover period','Rollover period','Rollover period','Rollover period','Rollover period'),(1277,'plugin_point_requires','Requires','Requires','Requires','Requires','Requires','Requires','Requires','Requires','Requires','Requires'),(1278,'plugin_point_days','day(s)','day(s)','day(s)','day(s)','day(s)','day(s)','day(s)','day(s)','day(s)','day(s)'),(1279,'plugin_point_view_offers','View Offers','View Offers','View Offers','View Offers','View Offers','View Offers','View Offers','View Offers','View Offers','View Offers'),(1280,'plugin_point_admin_offers_desc','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank','This page lists all of the offers available for users. For more information about a specific offer, click on the \"edit\" link in its row. Use the filter fields to find specific offer based on your criteria. To view all offers, leave all the filter fields blank'),(1281,'plugin_point_add_new_offer','Add new offer','Add new offer','Add new offer','Add new offer','Add new offer','Add new offer','Add new offer','Add new offer','Add new offer','Add new offer'),(1282,'plugin_point_title','Title','Title','Title','Title','Title','Title','Title','Title','Title','Title'),(1283,'plugin_point_points','Coins','Coins','Coins','Coins','Coins','Coins','Coins','Coins','Coins','Coins'),(1284,'plugin_point_cost','Cost','Cost','Cost','Cost','Cost','Cost','Cost','Cost','Cost','Cost'),(1285,'plugin_point_cant','Cant','Cant','Cant','Cant','Cant','Cant','Cant','Cant','Cant','Cant'),(1286,'plugin_point_views','Views','Views','Views','Views','Views','Views','Views','Views','Views','Views'),(1287,'plugin_point_add_date','Add date','Add date','Add date','Add date','Add date','Add date','Add date','Add date','Add date','Add date'),(1288,'plugin_point_options','Options','Options','Options','Options','Options','Options','Options','Options','Options','Options'),(1289,'plugin_point_add_offer','Add Offer','Add Offer','Add Offer','Add Offer','Add Offer','Add Offer','Add Offer','Add Offer','Add Offer','Add Offer'),(1290,'plugin_point_add_offer_desc','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id','This type of offer allows you to redirect a user to your affiliate, adding customer parameters such as user id, username or transaction id'),(1291,'plugin_point_desc','Description','Description','Description','Description','Description','Description','Description','Description','Description','Description'),(1292,'plugin_point_quantity_of_clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks','Quantity of clicks'),(1293,'plugin_point_show_in_transactions','Show in transactions?','Show in transactions?','Show in transactions?','Show in transactions?','Show in transactions?','Show in transactions?','Show in transactions?','Show in transactions?','Show in transactions?','Show in transactions?'),(1294,'plugin_point_redirect_url','Redirect URL','Redirect URL','Redirect URL','Redirect URL','Redirect URL','Redirect URL','Redirect URL','Redirect URL','Redirect URL','Redirect URL'),(1295,'plugin_point_tags','Tags','Tags','Tags','Tags','Tags','Tags','Tags','Tags','Tags','Tags'),(1296,'plugin_point_photo','Photo','Photo','Photo','Photo','Photo','Photo','Photo','Photo','Photo','Photo'),(1297,'plugin_point_save_offer','Save offer','Save offer','Save offer','Save offer','Save offer','Save offer','Save offer','Save offer','Save offer','Save offer'),(1298,'plugin_point_view_shop_items','View Shop Items','View Shop Items','View Shop Items','View Shop Items','View Shop Items','View Shop Items','View Shop Items','View Shop Items','View Shop Items','View Shop Items'),(1299,'plugin_point_admin_shop_desc','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank','This page lists all of the items available for users to purchase. For more information about a specific item, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all items, leave all the filter fields blank'),(1300,'plugin_point_add_new_item','Add new item','Add new item','Add new item','Add new item','Add new item','Add new item','Add new item','Add new item','Add new item','Add new item'),(1301,'plugin_point_add_shop_item','Add Shop Item','Add Shop Item','Add Shop Item','Add Shop Item','Add Shop Item','Add Shop Item','Add Shop Item','Add Shop Item','Add Shop Item','Add Shop Item'),(1302,'plugin_point_transaction_state','Transaction state','Transaction state','Transaction state','Transaction state','Transaction state','Transaction state','Transaction state','Transaction state','Transaction state','Transaction state'),(1303,'plugin_point_completed','Completed','Completed','Completed','Completed','Completed','Completed','Completed','Completed','Completed','Completed'),(1304,'plugin_point_pending','Pending','Pending','Pending','Pending','Pending','Pending','Pending','Pending','Pending','Pending'),(1305,'plugin_point_enabled','Enabled?','Enabled?','Enabled?','Enabled?','Enabled?','Enabled?','Enabled?','Enabled?','Enabled?','Enabled?'),(1306,'plugin_point_offers','Offers','Offers','Offers','Offers','Offers','Offers','Offers','Offers','Offers','Offers'),(1307,'plugin_point_offers_u_desc','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins','Here you can see how to earn coins'),(1308,'plugin_point_no_available_offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers'),(1309,'plugin_point_click_and_get','Click and get','Click and get','Click and get','Click and get','Click and get','Click and get','Click and get','Click and get','Click and get','Click and get'),(1310,'plugin_point_points_free','coins FREE','coins FREE','coins FREE','coins FREE','coins FREE','coins FREE','coins FREE','coins FREE','coins FREE','coins FREE'),(1311,'plugin_point_available','Available','Available','Available','Available','Available','Available','Available','Available','Available','Available'),(1312,'plugin_point_participate','Participate','Participate','Participate','Participate','Participate','Participate','Participate','Participate','Participate','Participate'),(1313,'plugin_point_win','Win','Win','Win','Win','Win','Win','Win','Win','Win','Win'),(1314,'plugin_point_shop','Shop','Shop','Shop','Shop','Shop','Shop','Shop','Shop','Shop','Shop'),(1315,'plugin_point_shop_u_desc','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.','Here you can find ways to spend your hard earned coins.'),(1316,'plugin_point_no_available_shop','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers','There are no available offers'),(1317,'plugin_point_points_s','coins','coins','coins','coins','coins','coins','coins','coins','coins','coins'),(1318,'plugin_point_buy_now','Buy now','Buy now','Buy now','Buy now','Buy now','Buy now','Buy now','Buy now','Buy now','Buy now'),(1319,'plugin_point_available_in_market','Available in market','Available in market','Available in market','Available in market','Available in market','Available in market','Available in market','Available in market','Available in market','Available in market'),(1320,'plugin_point_view_list_shop','View Users List of Shop','View Users List of Shop','View Users List of Shop','View Users List of Shop','View Users List of Shop','View Users List of Shop','View Users List of Shop','View Users List of Shop','View Users List of Shop','View Users List of Shop'),(1321,'plugin_point_view_list_shop_desc','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation','This page lists all the users to purchase. For more information about a specific user, click on the \"edit\" link in its row. Use the filter fields to find specific item based on your criteria. To view all users that need a aprovation'),(1322,'plugin_point_id','ID','ID','ID','ID','ID','ID','ID','ID','ID','ID'),(1323,'plugin_point_item','Item','Item','Item','Item','Item','Item','Item','Item','Item','Item'),(1324,'plugin_point_status','Status','Status','Status','Status','Status','Status','Status','Status','Status','Status'),(1325,'plugin_point_date','Date','Date','Date','Date','Date','Date','Date','Date','Date','Date'),(1326,'plugin_point_item_of','Item of','Item of','Item of','Item of','Item of','Item of','Item of','Item of','Item of','Item of'),(1327,'plugin_point_user_id','User ID','User ID','User ID','User ID','User ID','User ID','User ID','User ID','User ID','User ID'),(1328,'plugin_point_invites_of_user','Invites of user','Invites of user','Invites of user','Invites of user','Invites of user','Invites of user','Invites of user','Invites of user','Invites of user','Invites of user'),(1329,'plugin_point_purchase_time','Purchase time','Purchase time','Purchase time','Purchase time','Purchase time','Purchase time','Purchase time','Purchase time','Purchase time','Purchase time'),(1330,'plugin_point_add_invitations','Add more invitations','Add more invitations','Add more invitations','Add more invitations','Add more invitations','Add more invitations','Add more invitations','Add more invitations','Add more invitations','Add more invitations'),(1331,'plugin_point_complete_transaction','Complete transaction','Complete transaction','Complete transaction','Complete transaction','Complete transaction','Complete transaction','Complete transaction','Complete transaction','Complete transaction','Complete transaction'),(1332,'plugin_point_save','Save','Save','Save','Save','Save','Save','Save','Save','Save','Save'),(1333,'plugin_point_invite_friends','Invite Your Friends','Invite Your Friends','Invite Your Friends','Invite Your Friends','Invite Your Friends','Invite Your Friends','Invite Your Friends','Invite Your Friends','Invite Your Friends','Invite Your Friends'),(1334,'plugin_point_my_points','My Coins','My Coins','My Coins','My Coins','My Coins','My Coins','My Points','My Coins','My Coins','My Coins'),(1335,'plugin_point_earn_points','Earn Coins','Earn Coins','Earn Coins','Earn Coins','Earn Coins','Earn Coins','Earn Coins','Earn Coins','Earn Coins','Earn Coins'),(1336,'plugin_point_spend_points','Spend Coins','Spend Coins','Spend Coins','Spend Coins','Spend Coins','Spend Coins','Spend Coins','Spend Coins','Spend Coins','Spend Coins'),(1337,'plugin_point_top_users','Top Users','Top Users','Top Users','Top Users','Top Users','Top Users','Top Users','Top Users','Top Users','Top Users'),(1338,'plugin_point_more_points','More coins!','More coins!','More coins!','More coins!','More coins!','More coins!','More coins!','More coins!','More coins!','More coins!'),(1339,'plugin_point_my_vault','My Vault','My Vault','My Vault','My Vault','My Vault','My Vault','My Vault','My Vault','My Vault','My Vault'),(1340,'plugin_point_text_include_total_points','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance','This is a summary of your account. It includes the total coins earned to date and current balance'),(1341,'plugin_point_balance_m','BALANCE','BALANCE','BALANCE','BALANCE','BALANCE','BALANCE','BALANCE','BALANCE','BALANCE','BALANCE'),(1342,'plugin_point_total_points_earned_m','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED','TOTAL COINS EARNED'),(1343,'plugin_point_star_rating_m','STAR RATING','STAR RATING','STAR RATING','STAR RATING','STAR RATING','STAR RATING','STAR RATING','STAR RATING','STAR RATING','STAR RATING'),(1344,'plugin_point_place','place','place','place','place','place','place','place','place','place','place'),(1345,'plugin_point_not_ranked','Not ranked','Not ranked','Not ranked','Not ranked','Not ranked','Not ranked','Not ranked','Not ranked','Not ranked','Not ranked'),(1346,'plugin_point_my_transaction_history','My Transaction history','My Transaction history','My Transaction history','My Transaction history','My Transaction history','My Transaction history','My Transaction history','My Transaction history','My Transaction history','My Transaction history'),(1347,'plugin_point_text_include_post','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc','This transaction history doesn&#039; t include coins accrued by activities such as posting comments, creating groups, etc'),(1348,'plugin_point_no_have_points','You do not have coins','You do not have coins','You do not have coins','You do not have coins','You do not have coins','You do not have coins','You do not have coins','You do not have coins','You do not have coins','You do not have coins'),(1349,'plugin_point_description','Description','Description','Description','Description','Description','Description','Description','Description','Description','Description'),(1350,'plugin_point_our_all_stars','Our All Time Stars','Our All Time Stars','Our All Time Stars','Our All Time Stars','Our All Time Stars','Our All Time Stars','Our All Time Stars','Our All Time Stars','Our All Time Stars','Our All Time Stars'),(1351,'plugin_point_no_user_withpoint','No exists users with coins','No exists users with coins','No exists users with coins','No exists users with coins','No exists users with coins','No exists users with coins','No exists users with coins','No exists users with coins','No exists users with coins','No exists users with coins'),(1352,'plugin_point_rank','Rank','Rank','Rank','Rank','Rank','Rank','Rank','Rank','Rank','Rank'),(1353,'plugin_point_i_have_invitation','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)','I have an invitation click here(Optional code)'),(1354,'plugin_point_invitation_code','invitation code','invitation code','invitation code','invitation code','invitation code','invitation code','invitation code','invitation code','invitation code','invitation code'),(1355,'plugin_point_invite','Invite','Invite','Invite','Invite','Invite','Invite','Invite','Invite','Invite','Invite'),(1356,'plugin_point_pending_invite','Pending Invite','Pending Invite','Pending Invite','Pending Invite','Pending Invite','Pending Invite','Pending Invite','Pending Invite','Pending Invite','Pending Invite'),(1357,'plugin_point_referal_link','Referal link','Referal link','Referal link','Referal link','Referal link','Referal link','Referal link','Referal link','Referal link','Referal link'),(1358,'plugin_point_you_have','You have','You have','You have','You have','You have','You have','You have','You have','You have','You have'),(1359,'plugin_point_invitations','invitations','invitations','invitations','invitations','invitations','invitations','invitations','invitations','invitations','invitations'),(1360,'plugin_point_invite_friends_to_join','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network','Invite your friends to join! Enter 10 email addresses of your friends in the field below. And start to create you social network'),(1361,'plugin_point_to','To','To','To','To','To','To','To','To','To','To'),(1362,'plugin_point_type_message','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)','Type your message here(optional)'),(1363,'plugin_point_send_invitation','send invitation','send invitation','send invitation','send invitation','send invitation','send invitation','send invitation','send invitation','send invitation','send invitation'),(1364,'plugin_point_pending_invites','Pending Invites','Pending Invites','Pending Invites','Pending Invites','Pending Invites','Pending Invites','Pending Invites','Pending Invites','Pending Invites','Pending Invites'),(1365,'plugin_point_see_status_invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations','Here you can see status of your invitations'),(1366,'plugin_point_havent_pending_invites','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time','You do not have any pending invites at this time'),(1367,'plugin_point_email','Email','Email','Email','Email','Email','Email','Email','Email','Email','Email'),(1368,'plugin_point_code','Code','Code','Code','Code','Code','Code','Code','Code','Code','Code'),(1369,'plugin_point_action','Action','Action','Action','Action','Action','Action','Action','Action','Action','Action'),(1370,'plugin_point_my_referral_link','My Referral Link','My Referral Link','My Referral Link','My Referral Link','My Referral Link','My Referral Link','My Referral Link','My Referral Link','My Referral Link','My Referral Link'),(1371,'plugin_point_you_can_send_invitation','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers','You can either send an invitation from our site or you can copy and paste your Personal Referral Link and send it in an email or instant message to friends, family members or co_workers'),(1372,'plugin_point_send_new_invite','Send invite','Send invite','Send invite','Send invite','Send invite','Send invite','Send invite','Send invite','Send invite','Send invite'),(1373,'plugin_point_invite_no_valid','This invitation no is valid','This invitation no is valid','This invitation no is valid','This invitation no is valid','This invitation no is valid','This invitation no is valid','This invitation no is valid','This invitation no is valid','This invitation no is valid','This invitation no is valid'),(1374,'plugin_point_done_success_saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved','Done, Successfully saved'),(1375,'plugin_point_add_a_title','add a title','add a title','add a title','add a title','add a title','add a title','add a title','add a title','add a title','add a title'),(1376,'plugin_point_please_enter_url','Please enter url','Please enter url','Please enter url','Please enter url','Please enter url','Please enter url','Please enter url','Please enter url','Please enter url','Please enter url'),(1377,'plugin_point_upload_max_filesize','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?','Something wrong with upload! Is upload_max_filesize set correctly?'),(1378,'plugin_point_upload_error_file_is_big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big','Upload Error, The file size is so big'),(1379,'plugin_point_upload_error_can_not','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file','Upload Error, Sorry can not upload the file'),(1380,'plugin_point_done_info_been_updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated','Done, Plugin info have been updated'),(1381,'plugin_point_please_enter_title','Please enter title','Please enter title','Please enter title','Please enter title','Please enter title','Please enter title','Please enter title','Please enter title','Please enter title','Please enter title'),(1382,'plugin_point_done_item_deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted','Done, Item deleted'),(1383,'plugin_point_that_user_doesnt_exist','That user doesnt exist','That user doesnt exist','That user doesnt exist','That user doesnt exist','That user doesnt exist','That user doesnt exist','That user doesnt exist','That user doesnt exist','That user doesnt exist','That user doesnt exist'),(1384,'plugin_point_done_point_was_sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending','Done, Coin was sending'),(1385,'plugin_point_you_iten_shop_was_completed','You item shop was completed in','You item shop was completed in','You item shop was completed in','You item shop was completed in','You item shop was completed in','You item shop was completed in','You item shop was completed in','You item shop was completed in','You item shop was completed in','You item shop was completed in'),(1386,'plugin_point_the_process_was_completed','The process was completed:','The process was completed:','The process was completed:','The process was completed:','The process was completed:','The process was completed:','The process was completed:','The process was completed:','The process was completed:','The process was completed:'),(1387,'plugin_point_done_item_was_updated','Done, Item was updated','Done, Item was updated','Done, Item was updated','Done, Item was updated','Done, Item was updated','Done, Item was updated','Done, Item was updated','Done, Item was updated','Done, Item was updated','Done, Item was updated'),(1388,'plugin_point_status_continue_pending','You status continue pending?','You status continue pending?','You status continue pending?','You status continue pending?','You status continue pending?','You status continue pending?','You status continue pending?','You status continue pending?','You status continue pending?','You status continue pending?'),(1389,'plugin_point_invitations_available','invitations available','invitations available','invitations available','invitations available','invitations available','invitations available','invitations available','invitations available','invitations available','invitations available'),(1390,'plugin_point_please_enter_email_for_invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation','Please enter at least one recipient email address for your invitation'),(1391,'plugin_point_no_autoinvitation','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email','You no can send a invitation to you email'),(1392,'plugin_point_people_invited_before','This people was invited before','This people was invited before','This people was invited before','This people was invited before','This people was invited before','This people was invited before','This people was invited before','This people was invited before','This people was invited before','This people was invited before'),(1393,'plugin_point_email_exists','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork','This email is a user in this socialnetwork'),(1394,'plugin_point_you_have_an_invitation','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network','You have received an invitation to join our social network'),(1395,'plugin_point_best_regards_admin','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration','Best Regards, Social Network Administration'),(1396,'plugin_point_cant_send_email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email','Try more late, the system cant send this email'),(1397,'plugin_point_done_invitation_was_send','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend','Done, you invitation was sending to you friend'),(1398,'plugin_point_error_send_invitation','Error for send invitation','Error for send invitation','Error for send invitation','Error for send invitation','Error for send invitation','Error for send invitation','Error for send invitation','Error for send invitation','Error for send invitation','Error for send invitation'),(1399,'plugin_point_invitation_no_exists','This invitation no exists','This invitation no exists','This invitation no exists','This invitation no exists','This invitation no exists','This invitation no exists','This invitation no exists','This invitation no exists','This invitation no exists','This invitation no exists'),(1400,'plugin_point_no_use_baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher','This people was signup, but no use this baucher'),(1401,'plugin_point_participate_before','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer','Thank you, but you participate before in this offer'),(1402,'plugin_point_try_more_late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late','Try more late'),(1403,'plugin_point_you_purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase','Thank you for you purchase'),(1404,'plugin_point_notification_to_admin','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item','Will to notificate of admin for active this item'),(1405,'plugin_point_you_no_points','You dont have enough coins','You dont have enough coins','You dont have enough coins','You dont have enough coins','You dont have enough coins','You dont have enough coins','You dont have enough coins','You dont have enough coins','You dont have enough coins','You dont have enough coins'),(1406,'plugin_ads_note','Note','Note','Note','Note','Note','Note','Note','Note','Note','Note'),(1407,'plugin_ads_note_change_plan','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using','Once you change the plan and the plan Type it will override the current onces the ad is using'),(1408,'plugin_ads_edit_ad','Edit Ad','Edit Ad','Edit Ad','Edit Ad','Edit Ad','Edit Ad','Edit Ad','Edit Ad','Edit Ad','Edit Ad'),(1409,'plugin_ads_ad_camp_name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name','Ad Campaign Name'),(1410,'plugin_ads_configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations','Configurations'),(1411,'plugin_ads_member_ads','Member Ads','Member Ads','Member Ads','Member Ads','Member Ads','Member Ads','Member Ads','Member Ads','Member Ads','Member Ads'),(1412,'plugin_ads_here_listed','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones','Here listed your members ads with option for you to filter by all, paid, and unpaid ones'),(1413,'plugin_ads_paid','Paid','Paid','Paid','Paid','Paid','Paid','Paid','Paid','Paid','Paid'),(1414,'plugin_ads_unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid','Unpaid'),(1415,'plugin_ads_ads_plans','Ads Plans','Ads Plans','Ads Plans','Ads Plans','Ads Plans','Ads Plans','Ads Plans','Ads Plans','Ads Plans','Ads Plans'),(1416,'plugin_ads_add_ads_plans','Add Ads Plan','Add Ads Plan','Add Ads Plan','Add Ads Plan','Add Ads Plan','Add Ads Plan','Add Ads Plan','Add Ads Plan','Add Ads Plan','Add Ads Plan'),(1417,'plugin_ads_edit_plan','Edit Plan','Edit Plan','Edit Plan','Edit Plan','Edit Plan','Edit Plan','Edit Plan','Edit Plan','Edit Plan','Edit Plan'),(1418,'plugin_ads_plan_title','Plan Title','Plan Title','Plan Title','Plan Title','Plan Title','Plan Title','Plan Title','Plan Title','Plan Title','Plan Title'),(1419,'plugin_ads_plan_unique_name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name','Give your plan a unique name'),(1420,'plugin_ads_plan_desc','Plan Description','Plan Description','Plan Description','Plan Description','Plan Description','Plan Description','Plan Description','Plan Description','Plan Description','Plan Description'),(1421,'plugin_ads_plan_short_desc','Give your plan a short description','Give your plan a short description','Give your plan a short description','Give your plan a short description','Give your plan a short description','Give your plan a short description','Give your plan a short description','Give your plan a short description','Give your plan a short description','Give your plan a short description'),(1422,'plugin_ads_plan_type_be','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks','What type of ads this plan will take, is it pay per impression or by clicks'),(1423,'plugin_ads_plan_price','Plan Price','Plan Price','Plan Price','Plan Price','Plan Price','Plan Price','Plan Price','Plan Price','Plan Price','Plan Price'),(1424,'plugin_ads_plan_quantity','Plan Quantity','Plan Quantity','Plan Quantity','Plan Quantity','Plan Quantity','Plan Quantity','Plan Quantity','Plan Quantity','Plan Quantity','Plan Quantity'),(1425,'plugin_ads_plan_example_30','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c','For example: 30 or 100 or 1000 e.t.c'),(1426,'plugin_ads_for_example_30','for example 30','for example 30','for example 30','for example 30','for example 30','for example 30','for example 30','for example 30','for example 30','for example 30'),(1427,'plugin_ads_plan_example_100','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c','For example: 100 or 1000 e.t.c'),(1428,'plugin_ads_plan_price_dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar','Please price are in dollar'),(1429,'plugin_ads_plan_give_quantity','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing','Give your plan a quantity that must be reach before ads stop showing'),(1430,'plugin_ads_like_clicks_imp','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days','Like 20 clicks , 1000 impression or 7 days'),(1431,'plugin_ads_stop_the_ads','stop the ads from showing','stop the ads from showing','stop the ads from showing','stop the ads from showing','stop the ads from showing','stop the ads from showing','stop the ads from showing','stop the ads from showing','stop the ads from showing','stop the ads from showing'),(1432,'plugin_ads_save_plan','Save Plan','Save Plan','Save Plan','Save Plan','Save Plan','Save Plan','Save Plan','Save Plan','Save Plan','Save Plan'),(1433,'plugin_ads_plan_add','Add Plan','Add Plan','Add Plan','Add Plan','Add Plan','Add Plan','Add Plan','Add Plan','Add Plan','Add Plan'),(1434,'plugin_ads_plan_here_list','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type','Here listed plans your member can add different ads, you can filter by impression or clicks ads type'),(1435,'plugin_ads_c_paypal_sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox','Option to Enable PayPal Sandbox'),(1436,'plugin_ads_c_paypal_sandbox_desc','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox','This option allow you to enable or disable paypal sandbox'),(1437,'plugin_ads_c_limit_img_ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads','Limit To Images To Search On Website Ads'),(1438,'plugin_ads_c_limit_img_ads_desc','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads','This option allow you to set the limit to images to search on website ads'),(1439,'plugin_ads_c_no_ads_left','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column','Number to Display at Left Column'),(1440,'plugin_ads_c_no_ads_left_desc','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column','Option to set the maximum number of ads to display at the left column'),(1441,'plugin_ads_c_no_ads_rigth','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column','Number to Display at Right Column'),(1442,'plugin_ads_c_no_ads_rigth_desc','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column','Option to set the maximum number of ads to display at the right column'),(1443,'plugin_ads_c_ads_rate','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display','Ads Quantity Rate Per Each Display'),(1444,'plugin_ads_c_ads_rate_desc','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads','Option to set the amount of quantity to be deducted upon each display or clicks of ads'),(1445,'plugin_ads_c_ads_ppm','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message','Enable Ads Left Column in Profile/Pages/Message'),(1446,'plugin_ads_c_ads_ppm_desc','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template','This option allow you to enable or disable ads. Note: this edit your template'),(1447,'plugin_ads_c_ads_p','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts','Enable Ads On Posts'),(1448,'plugin_ads_c_ads_p_desc','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post','Option to enable ads on posts, allow your member to boost a post'),(1449,'plugin_ads_c_ads_lc','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column','Enable Ads Left Column'),(1450,'plugin_ads_c_ads_lc_desc','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages','Option to enable ads in tab left on profile and pages'),(1451,'plugin_ads_c_ads_post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post','Show Website Ads In Post'),(1452,'plugin_ads_c_ads_post_desc','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list','Option to enable showing of website ads in post list'),(1453,'plugin_ads_c_ads_ssl','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads','Enable SSL In Activation Of Ads'),(1454,'plugin_ads_c_ads_ssl_desc','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads','Option to enable ssl in activation ads'),(1455,'plugin_ads_c_enable_paypal','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method','Enable PayPal Payment Method'),(1456,'plugin_ads_c_enable_paypal_desc','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method','Option to enable paypal payment method'),(1457,'plugin_ads_c_email_paypal','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email','Corporate Paypal Email'),(1458,'plugin_ads_c_email_paypal_desc','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email','Option to set your paypal email'),(1459,'plugin_ads_c_paypal_notify','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications','Email For Paypal Notifications'),(1460,'plugin_ads_c_paypal_notify_desc','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications','Option to set email for paypal notifications'),(1461,'plugin_ads_c_enable_stripe','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method','Enable Stripe Payment Method'),(1462,'plugin_ads_c_enable_stripe_desc','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method','Option to Stripe paypal payment method'),(1463,'plugin_ads_c_sec_stripe','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key','Stripe Secret Key'),(1464,'plugin_ads_c_sec_stripe_desc','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key','Option to set your stripe secret key'),(1465,'plugin_ads_c_pub_stripe','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key','Stripe Publishable Key'),(1466,'plugin_ads_c_pub_stripe_desc','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key','Option to set your stripe publishable key'),(1467,'plugin_ads_c_enable_ad_left_place','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position'),(1468,'plugin_ads_c_enable_ad_left_place_desc','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show'),(1469,'plugin_ads_c_enable_ad_rigth_place','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position','Delete/add position'),(1470,'plugin_ads_c_enable_ad_rigth_place_desc','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show','Here add \"timeline, page, group, event\" fot show'),(1471,'plugin_ads_ads_manager','Ads Manager','Ads Manager','Ads Manager','Ads Manager','Ads Manager','Ads Manager','Ads Manager','Ads Manager','Ads Manager','Ads Manager'),(1472,'plugin_ads_see_more','See More','See More','See More','See More','See More','See More','See More','See More','See More','See More'),(1473,'plugin_ads_name','Name','Name','Name','Name','Name','Name','Name','Name','Name','Name'),(1474,'plugin_ads_ctr','ctr','ctr','ctr','ctr','ctr','ctr','ctr','ctr','ctr','ctr'),(1475,'plugin_ads_impressions','impressions','impressions','impressions','impressions','impressions','impressions','impressions','impressions','impressions','impressions'),(1476,'plugin_ads_sorry_post_no_exist','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action','Sorry this post no exist or no have permisse for create ads of this action'),(1477,'plugin_ads_continue','Continue','Continue','Continue','Continue','Continue','Continue','Continue','Continue','Continue','Continue'),(1478,'plugin_ads_please_select_a_post','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image','Please you have to select the post you want to create more audience for see the example in the image'),(1479,'plugin_ads_male','Male','Male','Male','Male','Male','Male','Male','Male','Male','Male'),(1480,'plugin_ads_female','Female','Female','Female','Female','Female','Female','Female','Female','Female','Female'),(1481,'plugin_ads_manage_ads','Manage Ads','Manage Ads','Manage Ads','Manage Ads','Manage Ads','Manage Ads','Manage Ads','Manage Ads','Manage Ads','Manage Ads'),(1482,'plugin_ads_create_ads','Create Ads','Create Ads','Create Ads','Create Ads','Create Ads','Create Ads','Create Ads','Create Ads','Create Ads','Create Ads'),(1483,'plugin_ads_ads','Ads','Ads','Ads','Ads','Ads','Ads','Ads','Ads','Ads','Ads'),(1484,'plugin_ads_payment_history','Payment history','Payment history','Payment history','Payment history','Payment history','Payment history','Payment history','Payment history','Payment history','Payment history'),(1485,'plugin_ads_ads_list','Ads List','Ads List','Ads List','Ads List','Ads List','Ads List','Ads List','Ads List','Ads List','Ads List'),(1486,'plugin_ads_create_campaign','Create Campaign','Create Campaign','Create Campaign','Create Campaign','Create Campaign','Create Campaign','Create Campaign','Create Campaign','Create Campaign','Create Campaign'),(1487,'plugin_ads_advertise_here','Advertise here','Advertise here','Advertise here','Advertise here','Advertise here','Advertise here','Advertise here','Advertise here','Advertise here','Advertise here'),(1488,'plugin_ads_advertise_on','Advertise on','Advertise on','Advertise on','Advertise on','Advertise on','Advertise on','Advertise on','Advertise on','Advertise on','Advertise on'),(1489,'plugin_ads_topography_info','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people','Create more awareness to what you care about, and we will help you reach the right people'),(1490,'plugin_ads_step_one_title','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page','Step 1 : Build your page'),(1491,'plugin_ads_step_one_info','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers','Create a page, its simple and the best way to communicate with your customers'),(1492,'plugin_ads_step_two_title','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience','Step 2 : Connect with people and Engage your audience'),(1493,'plugin_ads_step_two_info','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location','Get people to like your page, create ads and target thousands of people by there gender and location'),(1494,'plugin_ads_login_required','Please Login is required','Please Login is required','Please Login is required','Please Login is required','Please Login is required','Please Login is required','Please Login is required','Please Login is required','Please Login is required','Please Login is required'),(1495,'plugin_ads_signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup','Not yet a member, signup'),(1496,'plugin_ads_edit_ads','Edit ads','Edit ads','Edit ads','Edit ads','Edit ads','Edit ads','Edit ads','Edit ads','Edit ads','Edit ads'),(1497,'plugin_ads_delete_ad_warning','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?','Are you sure you want to delete this ad?'),(1498,'plugin_ads_select_payment_method','Select Payment Method','Select Payment Method','Select Payment Method','Select Payment Method','Select Payment Method','Select Payment Method','Select Payment Method','Select Payment Method','Select Payment Method','Select Payment Method'),(1499,'plugin_ads_promote_page','Promote this page','Promote this page','Promote this page','Promote this page','Promote this page','Promote this page','Promote this page','Promote this page','Promote this page','Promote this page'),(1500,'plugin_ads_boost_post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post'),(1501,'plugin_ads_sponsored','Sponsored','Sponsored','Sponsored','Sponsored','Sponsored','Sponsored','Sponsored','Sponsored','Sponsored','Sponsored'),(1502,'plugin_ads_like','Like Page','Like Page','Like Page','Like Page','Like Page','Like Page','Like Page','Like Page','Like Page','Like Page'),(1503,'plugin_ads_unlike','Unlike Page','Unlike Page','Unlike Page','Unlike Page','Unlike Page','Unlike Page','Unlike Page','Unlike Page','Unlike Page','Unlike Page'),(1504,'plugin_ads_suggested_page','Suggested Page','Suggested Page','Suggested Page','Suggested Page','Suggested Page','Suggested Page','Suggested Page','Suggested Page','Suggested Page','Suggested Page'),(1505,'plugin_ads_send_people','Send People to your website','Send People to your website','Send People to your website','Send People to your website','Send People to your website','Send People to your website','Send People to your website','Send People to your website','Send People to your website','Send People to your website'),(1506,'plugin_ads_promote_your_page','Promote your Page','Promote your Page','Promote your Page','Promote your Page','Promote your Page','Promote your Page','Promote your Page','Promote your Page','Promote your Page','Promote your Page'),(1507,'plugin_ads_boost_this_post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post','Boost this post'),(1508,'plugin_ads_boost_your_post','Boost your posts','Boost your posts','Boost your posts','Boost your posts','Boost your posts','Boost your posts','Boost your posts','Boost your posts','Boost your posts','Boost your posts'),(1509,'plugin_ads_ads_info','Ads Info','Ads Info','Ads Info','Ads Info','Ads Info','Ads Info','Ads Info','Ads Info','Ads Info','Ads Info'),(1510,'plugin_ads_campaign_name','Campaign Name','Campaign Name','Campaign Name','Campaign Name','Campaign Name','Campaign Name','Campaign Name','Campaign Name','Campaign Name','Campaign Name'),(1511,'plugin_ads_ads_text','Ads Text','Ads Text','Ads Text','Ads Text','Ads Text','Ads Text','Ads Text','Ads Text','Ads Text','Ads Text'),(1512,'plugin_ads_select_image','Select images you want to use','Select images you want to use','Select images you want to use','Select images you want to use','Select images you want to use','Select images you want to use','Select images you want to use','Select images you want to use','Select images you want to use','Select images you want to use'),(1513,'plugin_ads_change_image','Change Image','Change Image','Change Image','Change Image','Change Image','Change Image','Change Image','Change Image','Change Image','Change Image'),(1514,'plugin_ads_change','Change','Change','Change','Change','Change','Change','Change','Change','Change','Change'),(1515,'plugin_ads_how_to_spend','How do you want to spend','How do you want to spend','How do you want to spend','How do you want to spend','How do you want to spend','How do you want to spend','How do you want to spend','How do you want to spend','How do you want to spend','How do you want to spend'),(1516,'plugin_ads_optimize_for','Optimize for:','Optimize for:','Optimize for:','Optimize for:','Optimize for:','Optimize for:','Optimize for:','Optimize for:','Optimize for:','Optimize for:'),(1517,'plugin_ads_clicks','Clicks','Clicks','Clicks','Clicks','Clicks','Clicks','Clicks','Clicks','Clicks','Clicks'),(1518,'plugin_ads_impression','Impression','Impression','Impression','Impression','Impression','Impression','Impression','Impression','Impression','Impression'),(1519,'plugin_ads_period','Period','Period','Period','Period','Period','Period','Period','Period','Period','Period'),(1520,'plugin_ads_how_much_to_spend','How much do you want to spend','How much do you want to spend','How much do you want to spend','How much do you want to spend','How much do you want to spend','How much do you want to spend','How much do you want to spend','How much do you want to spend','How much do you want to spend','How much do you want to spend'),(1521,'plugin_ads_preview_ad','Preview Your Ad','Preview Your Ad','Preview Your Ad','Preview Your Ad','Preview Your Ad','Preview Your Ad','Preview Your Ad','Preview Your Ad','Preview Your Ad','Preview Your Ad'),(1522,'plugin_ads_who_do_ad_reach','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?','Who do you want your ads to reach?'),(1523,'plugin_ads_locations','Locations','Locations','Locations','Locations','Locations','Locations','Locations','Locations','Locations','Locations'),(1524,'plugin_ads_all_countries','All Countries','All Countries','All Countries','All Countries','All Countries','All Countries','All Countries','All Countries','All Countries','All Countries'),(1525,'plugin_ads_all','All','All','All','All','All','All','All','All','All','All'),(1526,'plugin_ads_save_and_activate','Save and Activate','Save and Activate','Save and Activate','Save and Activate','Save and Activate','Save and Activate','Save and Activate','Save and Activate','Save and Activate','Save and Activate'),(1527,'plugin_ads_save_ad','Save Ad','Save Ad','Save Ad','Save Ad','Save Ad','Save Ad','Save Ad','Save Ad','Save Ad','Save Ad'),(1528,'plugin_ads_gender','Gender','Gender','Gender','Gender','Gender','Gender','Gender','Gender','Gender','Gender'),(1529,'plugin_ads_error','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist','Failed to save Ad : Maybe campaign Name already exist'),(1530,'plugin_ads_delete_cancel_ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad','Delete / Cancel Ad'),(1531,'plugin_ads_invalid_link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link','You have entered invalid website link'),(1532,'plugin_ads_enter_link','Enter a valid website link','Enter a valid website link','Enter a valid website link','Enter a valid website link','Enter a valid website link','Enter a valid website link','Enter a valid website link','Enter a valid website link','Enter a valid website link','Enter a valid website link'),(1533,'plugin_ads_ads_headline','Ad Headline','Ad Headline','Ad Headline','Ad Headline','Ad Headline','Ad Headline','Ad Headline','Ad Headline','Ad Headline','Ad Headline'),(1534,'plugin_ads_display_link','Display Link','Display Link','Display Link','Display Link','Display Link','Display Link','Display Link','Display Link','Display Link','Display Link'),(1535,'plugin_ads_post_engagement','Post Engagement','Post Engagement','Post Engagement','Post Engagement','Post Engagement','Post Engagement','Post Engagement','Post Engagement','Post Engagement','Post Engagement'),(1536,'plugin_ads_ad_status','Ad Status','Ad Status','Ad Status','Ad Status','Ad Status','Ad Status','Ad Status','Ad Status','Ad Status','Ad Status'),(1537,'plugin_ads_ad_running','Ad Running','Ad Running','Ad Running','Ad Running','Ad Running','Ad Running','Ad Running','Ad Running','Ad Running','Ad Running'),(1538,'plugin_ads_ad_stopped','Ad Stopped','Ad Stopped','Ad Stopped','Ad Stopped','Ad Stopped','Ad Stopped','Ad Stopped','Ad Stopped','Ad Stopped','Ad Stopped'),(1539,'plugin_ads_website','Website','Website','Website','Website','Website','Website','Website','Website','Website','Website'),(1540,'plugin_ads_pages','Pages','Pages','Pages','Pages','Pages','Pages','Pages','Pages','Pages','Pages'),(1541,'plugin_ads_posts','Posts','Posts','Posts','Posts','Posts','Posts','Posts','Posts','Posts','Posts'),(1542,'plugin_ads_type','Type','Type','Type','Type','Type','Type','Type','Type','Type','Type'),(1543,'plugin_ads_plan_type','Plan Type','Plan Type','Plan Type','Plan Type','Plan Type','Plan Type','Plan Type','Plan Type','Plan Type','Plan Type'),(1544,'plugin_ads_plan_name','Plan Name','Plan Name','Plan Name','Plan Name','Plan Name','Plan Name','Plan Name','Plan Name','Plan Name','Plan Name'),(1545,'plugin_ads_plan','Plan','Plan','Plan','Plan','Plan','Plan','Plan','Plan','Plan','Plan'),(1546,'plugin_ads_plan_change','Plan Change','Plan Change','Plan Change','Plan Change','Plan Change','Plan Change','Plan Change','Plan Change','Plan Change','Plan Change'),(1547,'plugin_ads_statistics','Statistics','Statistics','Statistics','Statistics','Statistics','Statistics','Statistics','Statistics','Statistics','Statistics'),(1548,'plugin_ads_balance','Balance','Balance','Balance','Balance','Balance','Balance','Balance','Balance','Balance','Balance'),(1549,'plugin_ads_status','Status','Status','Status','Status','Status','Status','Status','Status','Status','Status'),(1550,'plugin_ads_action','Action','Action','Action','Action','Action','Action','Action','Action','Action','Action'),(1551,'plugin_ads_active','Active','Active','Active','Active','Active','Active','Active','Active','Active','Active'),(1552,'plugin_ads_inactive','Inactive','Inactive','Inactive','Inactive','Inactive','Inactive','Inactive','Inactive','Inactive','Inactive'),(1553,'plugin_ads_edit','Edit','Edit','Edit','Edit','Edit','Edit','Edit','Edit','Edit','Edit'),(1554,'plugin_ads_delete','Delete','Delete','Delete','Delete','Delete','Delete','Delete','Delete','Delete','Delete'),(1555,'plugin_ads_activate','Activate','Activate','Activate','Activate','Activate','Activate','Activate','Activate','Activate','Activate'),(1556,'plugin_ads_re_activate','Re_activate','Re_activate','Re_activate','Re_activate','Re_activate','Re_activate','Re_activate','Re_activate','Re_activate','Re_activate'),(1557,'plugin_ads_ad_type','Ad Type','Ad Type','Ad Type','Ad Type','Ad Type','Ad Type','Ad Type','Ad Type','Ad Type','Ad Type'),(1558,'plugin_ads_price','Price','Price','Price','Price','Price','Price','Price','Price','Price','Price'),(1559,'plugin_ads_quantity','Quantity','Quantity','Quantity','Quantity','Quantity','Quantity','Quantity','Quantity','Quantity','Quantity'),(1560,'plugin_ads_transaction_details','Transaction Details','Transaction Details','Transaction Details','Transaction Details','Transaction Details','Transaction Details','Transaction Details','Transaction Details','Transaction Details','Transaction Details'),(1561,'plugin_ads_activate_ad','Activate Ad','Activate Ad','Activate Ad','Activate Ad','Activate Ad','Activate Ad','Activate Ad','Activate Ad','Activate Ad','Activate Ad'),(1562,'plugin_ads_transaction_failed','Transaction Failed','Transaction Failed','Transaction Failed','Transaction Failed','Transaction Failed','Transaction Failed','Transaction Failed','Transaction Failed','Transaction Failed','Transaction Failed'),(1563,'plugin_ads_try_again','Try Again','Try Again','Try Again','Try Again','Try Again','Try Again','Try Again','Try Again','Try Again','Try Again'),(1564,'plugin_ads_transaction_cancel','Transaction cancel','Transaction cancel','Transaction cancel','Transaction cancel','Transaction cancel','Transaction cancel','Transaction cancel','Transaction cancel','Transaction cancel','Transaction cancel'),(1565,'plugin_ads_ad_preview','Ad Preview','Ad Preview','Ad Preview','Ad Preview','Ad Preview','Ad Preview','Ad Preview','Ad Preview','Ad Preview','Ad Preview'),(1566,'plugin_ads_unique_impression','Unique Impression','Unique Impression','Unique Impression','Unique Impression','Unique Impression','Unique Impression','Unique Impression','Unique Impression','Unique Impression','Unique Impression'),(1567,'plugin_ads_unique_clicks','Unique Clicks','Unique Clicks','Unique Clicks','Unique Clicks','Unique Clicks','Unique Clicks','Unique Clicks','Unique Clicks','Unique Clicks','Unique Clicks'),(1568,'plugin_ads_views','Views','Views','Views','Views','Views','Views','Views','Views','Views','Views'),(1569,'plugin_ads_disable','Disable','Disable','Disable','Disable','Disable','Disable','Disable','Disable','Disable','Disable'),(1570,'plugin_ads_this_ads','this ads','this ads','this ads','this ads','this ads','this ads','this ads','this ads','this ads','this ads'),(1571,'plugin_ads_delete_ads','Delete ads','Delete ads','Delete ads','Delete ads','Delete ads','Delete ads','Delete ads','Delete ads','Delete ads','Delete ads'),(1572,'plugin_ads_hidden_ads','Hidde ads','Hidde ads','Hidde ads','Hidde ads','Hidde ads','Hidde ads','Hidde ads','Hidde ads','Hidde ads','Hidde ads'),(1573,'plugin_ads_title','Ad title','Ad title','Ad title','Ad title','Ad title','Ad title','Ad title','Ad title','Ad title','Ad title'),(1574,'plugin_ads_desc','Ad description','Ad description','Ad description','Ad description','Ad description','Ad description','Ad description','Ad description','Ad description','Ad description'),(1575,'plugin_ads_link','Ad link','Ad link','Ad link','Ad link','Ad link','Ad link','Ad link','Ad link','Ad link','Ad link'),(1576,'plugin_ads_image','Ad image','Ad image','Ad image','Ad image','Ad image','Ad image','Ad image','Ad image','Ad image','Ad image'),(1577,'plugin_ads_ads_time_created','Ad created','Ad created','Ad created','Ad created','Ad created','Ad created','Ad created','Ad created','Ad created','Ad created'),(1578,'plugin_ads_ads_time_updated','Ad updated','Ad updated','Ad updated','Ad updated','Ad updated','Ad updated','Ad updated','Ad updated','Ad updated','Ad updated');
/*!40000 ALTER TABLE `Wo_Langs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Likes`
--

DROP TABLE IF EXISTS `Wo_Likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `reaction` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'like',
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Likes`
--

LOCK TABLES `Wo_Likes` WRITE;
/*!40000 ALTER TABLE `Wo_Likes` DISABLE KEYS */;
INSERT INTO `Wo_Likes` VALUES (3,1,2,'love'),(5,1,5,'like'),(8,6,29,'like'),(10,7,29,'love'),(12,1,35,'love'),(13,1,42,'love'),(14,1,17,'like'),(16,2,5,'like'),(17,2,44,'like'),(18,3,44,'like'),(19,1,46,'like'),(20,1,29,'haha'),(23,1,43,'like'),(24,1,52,'like'),(27,1,58,'like'),(33,2,60,'like'),(34,1,60,'like'),(35,1,65,'like'),(40,28,65,'haha'),(42,32,5,'haha'),(47,34,18,'like'),(50,34,20,'love'),(58,34,24,'love'),(61,34,25,'like'),(62,34,29,'like'),(64,34,16,'wow');
/*!40000 ALTER TABLE `Wo_Likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Messages`
--

DROP TABLE IF EXISTS `Wo_Messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `to_id` int(11) NOT NULL DEFAULT 0,
  `text` text DEFAULT NULL,
  `media` varchar(255) NOT NULL DEFAULT '',
  `mediaFileName` varchar(200) NOT NULL DEFAULT '',
  `mediaFileNames` varchar(200) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  `seen` int(11) NOT NULL DEFAULT 0,
  `deleted_one` enum('0','1') NOT NULL DEFAULT '0',
  `deleted_two` enum('0','1') NOT NULL DEFAULT '0',
  `sent_push` int(11) NOT NULL DEFAULT 0,
  `notification_id` varchar(50) NOT NULL DEFAULT '',
  `type_two` varchar(32) NOT NULL DEFAULT '',
  `stickers` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `from_id` (`from_id`),
  KEY `to_id` (`to_id`),
  KEY `seen` (`seen`),
  KEY `time` (`time`),
  KEY `deleted_two` (`deleted_two`),
  KEY `deleted_one` (`deleted_one`),
  KEY `sent_push` (`sent_push`),
  KEY `group_id` (`group_id`),
  KEY `order1` (`from_id`,`id`),
  KEY `order2` (`group_id`,`id`),
  KEY `order3` (`to_id`,`id`),
  KEY `order7` (`seen`,`id`),
  KEY `order8` (`time`,`id`),
  KEY `order4` (`from_id`,`id`),
  KEY `order5` (`group_id`,`id`),
  KEY `order6` (`to_id`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Messages`
--

LOCK TABLES `Wo_Messages` WRITE;
/*!40000 ALTER TABLE `Wo_Messages` DISABLE KEYS */;
INSERT INTO `Wo_Messages` VALUES (1,1,0,2,'hello','','','',1512471579,1512471599,'0','0',1,'','',''),(2,2,0,1,'hi','','','',1512471611,1512471619,'0','0',1,'','',''),(3,1,0,2,'how are you doing','','','',1512471722,1512471728,'0','0',1,'','',''),(4,2,0,1,'doing good','','','',1512471752,1512471764,'0','0',1,'','',''),(5,1,0,2,'what do you feel about this system','','','',1512471790,1512471794,'0','0',1,'','',''),(6,2,0,1,'Its good','','','',1512471804,1512471810,'0','0',1,'','',''),(7,1,0,2,'just testing the calling system','','','',1512472431,1512472441,'0','0',1,'','',''),(8,2,0,1,'voice is not hearing','','','',1512472448,1512472454,'0','0',1,'','',''),(9,1,0,2,'yes','','','',1512472471,1512472474,'0','0',1,'','',''),(10,1,0,2,'no api integrated','','','',1512472481,1512472488,'0','0',1,'','',''),(11,2,0,1,'ok','','','',1512472495,1512472496,'0','0',1,'','',''),(12,1,0,2,'but testing to ensure end to end connection','','','',1512472514,1512472516,'0','0',1,'','',''),(13,2,0,1,'ok','','','',1512472658,1512472660,'0','0',1,'','',''),(14,1,0,2,'pls tell Mr Rahul and others to sign up here','','','',1512473610,1512473948,'0','0',1,'','',''),(15,1,0,2,'have you study the initial BlocTolk features sent to you','','','',1512473667,1512473948,'0','0',1,'','',''),(16,1,0,2,'also carefully study this system and let us know the area which left to work on to achieve BlocTolk','','','',1512473725,1512473948,'0','0',1,'','',''),(17,1,0,2,'am always available to explain better on any features','','','',1512473760,1512473948,'0','0',1,'','',''),(18,1,0,2,'and if you need explanation on how this system can be customized, pls don&#039;t hesitate to contact me because I have worked on this system for long time','','','',1512473820,1512473948,'0','0',1,'','',''),(19,1,0,2,'so I know much about it','','','',1512473832,1512473948,'0','0',1,'','',''),(20,1,0,3,'Hello Sir','','','',1512474387,1512474448,'0','0',1,'','',''),(21,1,0,3,'how are you doing','','','',1512474393,1512474448,'0','0',1,'','',''),(22,1,0,3,'hope this is better','','','',1512474400,1512474448,'0','0',1,'','',''),(23,3,0,1,'yes checking','','','',1512474454,1512474461,'0','0',0,'','',''),(24,1,0,3,'try to check this system very well and tell me if you see any error so as to amend it before I send it to chairman that this is what you acheived today on BlocTolk','','','',1512474470,1512474476,'0','0',1,'','',''),(25,3,0,1,'This is good','','','',1512474608,1512474615,'0','0',0,'','',''),(26,1,0,3,'ok','','','',1512474627,1512474631,'0','0',1,'','',''),(27,1,0,3,'try to check this system very well and tell me if you see any error so as to amend it before I send it to chairman that this is what you acheived today on BlocTolk','','','',1512474643,1512474645,'0','0',1,'','',''),(28,1,0,2,'good day','','','',1512544979,1512545062,'0','0',1,'','',''),(29,1,0,2,'if am right you are the one working on bloctolk','','','',1512545030,1512545062,'0','0',1,'','',''),(30,1,0,2,'???','','','',1512545039,1512545062,'0','0',1,'','',''),(31,2,0,1,'hi sir..','','','',1512545073,1512545822,'0','0',1,'','',''),(32,2,0,1,'yes please let me know ur concern sir','','','',1512545086,1512545822,'0','0',1,'','',''),(33,1,0,2,'[11:35 PM, 12/5/2017] +234 906 895 2668: please check your mail support@adoreinfotech.com for the Bloctolk features','','','',1512545853,1512545856,'0','0',1,'','',''),(34,1,0,2,'kindly study the features very and also study this bloctolk web system and come back so as to discuss how to align it','','','',1512545867,1512545870,'0','0',1,'','',''),(35,2,0,1,'yes got your email','','','',1512546414,1512546415,'0','0',1,'','',''),(36,5,0,1,'hello','','','',1512546497,1512546574,'0','0',0,'','',''),(37,1,0,2,'have you study it','','','',1512546514,1512546515,'0','0',1,'','',''),(38,2,0,1,'yes, but we need to discuss with developer and get back to you..','','','',1512546673,1512546674,'0','0',1,'','',''),(39,1,0,2,'good','','','',1512546697,1512546703,'0','0',1,'','',''),(40,1,0,2,'when should I be expecting your feedback because bwe need to talk together and know how to align all the features, so that we will not delay','','','',1512546756,1512546758,'0','0',1,'','',''),(41,2,0,1,'okay fine sir, we will get back to you very shortly.','','','',1512546822,1512546825,'0','0',1,'','',''),(42,1,0,2,'ok','','','',1512546836,1512546842,'0','0',1,'','',''),(43,1,0,2,'no problem','','','',1512546841,1512546842,'0','0',1,'','',''),(44,1,0,2,'hope it&#039;s your team that will work on UI','','','',1512546969,1512546975,'0','0',1,'','',''),(45,2,0,1,'Sir one thing, do you want us to customized the web module in the Crazy Talk','','','',1512548202,1512548205,'0','0',1,'','',''),(46,2,0,1,'for the mobile version','','','',1512548215,1512548216,'0','0',1,'','',''),(47,1,0,2,'pls give me some minutes','','','',1512548265,1512548270,'0','0',1,'','',''),(48,1,0,2,'am busy chatting with Mr Banoj','','','',1512548278,1512548285,'0','0',1,'','',''),(49,2,0,1,'okay fine sir..','','','',1512548296,1512548298,'0','0',1,'','',''),(50,1,0,2,'hello','','','',1512549644,1512549644,'0','0',1,'','',''),(51,1,0,2,'pls,make it clearer','','','',1512549722,1512549729,'0','0',1,'','',''),(52,1,0,2,'Sir one thing, do you want us to customized the web module in the Crazy Talk  Rakesh Kumar Profile Picture <br> <br>for the mobile version','','','',1512549738,1512549742,'0','0',1,'','',''),(53,1,0,2,'hi','','','',1512556375,1512556377,'0','0',1,'','',''),(54,1,0,2,'facebook login and gmail login is working now. you can test over there','','','',1512556409,1512556412,'0','0',1,'','',''),(55,1,0,3,'facebook login and gmail login is working now. you can test over there','','','',1512556497,1512560627,'0','0',1,'','',''),(56,1,0,2,'login with twitter now working','','','',1512557903,1512557907,'0','0',1,'','',''),(57,1,0,3,'login with twitter now working','','','',1512557905,1512560627,'0','0',1,'','',''),(58,1,0,3,'you can test at your end','','','',1512557915,1512560627,'0','0',1,'','',''),(59,1,0,2,'you can test at your end','','','',1512557918,1512557921,'0','0',1,'','',''),(60,1,0,2,'Vkontakte login with is working now','','','',1512560457,1512560461,'0','0',1,'','',''),(70,1,1,0,'hi','upload/sounds/2017/12/rqobUTrphF9XWvKZQox5_06_437fad26bc59341b2c037828ccae36db_soundFile.mp3','Jim Reeves - I&#039;m Beginning to Forget You (mp3linova.net).mp3','',1512561142,0,'0','0',1,'','',NULL),(71,1,0,2,'hello Rakesh','','','',1512561253,1512561254,'0','0',1,'','',''),(72,1,0,2,'i will send the cpanel details and grant your account admin access.so,from here ,you take over the BlocTolk development','','','',1512561516,1512561521,'0','0',1,'','',''),(73,1,0,2,'admin access granted','','','',1512561727,1512561732,'0','0',1,'','',''),(74,1,0,2,'plss go to [a]http%3A%2F%2Fbloctolk.com%2Fadmin-cp[/a]','','','',1512642591,1512644870,'0','0',1,'','',''),(75,1,0,2,'and [a]http%3A%2F%2Fbloctolk.com%2Findex.php%3Flink1%3Dadmin-plugins[/a]','','','',1512642615,1512644870,'0','0',1,'','',''),(76,1,0,6,'hello','','','',1512654012,0,'0','0',1,'','',''),(77,1,0,6,'are you there?','','','',1512654023,0,'0','0',1,'','',''),(78,1,0,6,'should we grant you admin priviledge so as to see how the admin look like','','','',1512654063,0,'0','0',1,'','',''),(79,1,0,6,'Sir, I just remember to tell you that Find friends is working based on location','','','',1512654160,0,'1','0',1,'','',''),(80,1,0,6,'though it&#039;s not working for now because it requires SSL','','','',1512654202,0,'1','0',1,'','',''),(81,1,0,2,'Sir, I just remember to tell you that Find friends is working based on location','','','',1512654266,1513242428,'1','0',1,'','',''),(82,1,0,2,'though it&#039;s not working for now because it requires SSL','','','',1512654280,1513242428,'1','0',1,'','',''),(83,1,0,3,'Sir, I just remember to tell you that Find friends is working based on location','','','',1512654333,1513162303,'1','0',1,'','',''),(84,1,0,3,'though it&#039;s not working for now because it requires SSL','','','',1512654346,1513162303,'1','0',1,'','',''),(85,15,0,16,'gfhfg gfhgh','','','',1549875876,1549876029,'0','0',1,'','',''),(86,16,0,15,'hello','','','',1549876041,1549876046,'0','0',0,'','',''),(87,15,0,16,'buuyyyyy','','','',1549876056,1549876056,'0','0',0,'','',''),(88,15,0,16,'salary kb aayige','','','',1549876093,1549876098,'0','0',0,'','',''),(89,16,0,15,'15 ko','','','',1549876109,1549876116,'0','0',0,'','',''),(90,1,0,7,'asdas','','','',1549953430,0,'0','0',1,'','',''),(91,1,1,0,'zxcz','','','',1549953872,0,'0','0',1,'','',NULL),(92,1,0,2,'asdada','','','',1549953938,1551273299,'0','0',1,'','',''),(93,1,0,2,'hi','','','',1549961229,1551273299,'0','0',1,'','',''),(94,15,0,16,'fgdgsdfgd','','','',1549965582,1549965605,'0','0',0,'','',NULL),(95,16,0,15,'good work','','','',1549965625,1549965635,'0','0',0,'','',''),(96,2,0,1,'hello','','','',1551273420,1551352106,'0','0',1,'','',''),(97,34,0,35,'Hello','','','',1551360678,1551360682,'0','0',1,'','',''),(98,35,0,34,'Hii sir','','','',1551360687,1551360709,'0','0',0,'','',''),(99,34,0,35,'Hello','','','',1551419050,1551419336,'0','0',1,'','',''),(100,35,0,34,'Good Morning sir','','','',1551419054,1551419057,'0','0',0,'','',''),(101,34,0,35,'Good Morning','','','',1551419063,1551419069,'0','0',1,'','',''),(102,35,0,34,'Hi sir','','','',1551419605,1551419617,'0','0',0,'','',NULL),(103,34,0,35,'Hi','','','',1551419634,1551419637,'0','0',1,'','',NULL),(104,34,0,35,'Hello Upen','','','',1551429815,1551501975,'0','0',1,'','',''),(105,34,0,35,'We are trying to finalize nirwana','','','',1551429830,1551501975,'0','0',1,'','',''),(106,34,0,1,'','upload/photos/2019/03/6IHcEmdodTpb6sS5adN9_02_3e50fc11d7d5a14754f6f924c3e72a2d_image.jpg','IMG_7395.jpg','',1551549628,0,'0','0',1,'','',''),(107,34,0,1,'hi','','','',1551549637,0,'0','0',1,'','',''),(108,34,0,36,'hello bhai','','','',1551550295,1551691813,'0','0',1,'','',''),(109,37,0,34,'Hello sir','','','',1551615158,1551622920,'0','0',1,'','',''),(110,34,0,37,'hi','','','',1551622951,0,'0','0',1,'','','');
/*!40000 ALTER TABLE `Wo_Messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_MovieCommentReplies`
--

DROP TABLE IF EXISTS `Wo_MovieCommentReplies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_MovieCommentReplies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comm_id` int(11) NOT NULL DEFAULT 0,
  `movie_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `text` text DEFAULT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `posted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `comm_id` (`comm_id`),
  KEY `movie_id` (`movie_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_MovieCommentReplies`
--

LOCK TABLES `Wo_MovieCommentReplies` WRITE;
/*!40000 ALTER TABLE `Wo_MovieCommentReplies` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_MovieCommentReplies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_MovieComments`
--

DROP TABLE IF EXISTS `Wo_MovieComments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_MovieComments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `movie_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `posted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_MovieComments`
--

LOCK TABLES `Wo_MovieComments` WRITE;
/*!40000 ALTER TABLE `Wo_MovieComments` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_MovieComments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Movies`
--

DROP TABLE IF EXISTS `Wo_Movies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `genre` varchar(50) NOT NULL DEFAULT '',
  `stars` varchar(300) NOT NULL DEFAULT '',
  `producer` varchar(100) NOT NULL DEFAULT '',
  `country` varchar(50) NOT NULL DEFAULT '',
  `release` year(4) DEFAULT NULL,
  `quality` varchar(10) DEFAULT '',
  `duration` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `cover` varchar(500) NOT NULL DEFAULT 'upload/photos/d-film.jpg',
  `source` varchar(1000) NOT NULL DEFAULT '',
  `iframe` varchar(1000) NOT NULL DEFAULT '',
  `video` varchar(3000) NOT NULL DEFAULT '',
  `views` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `genre` (`genre`),
  KEY `country` (`country`),
  KEY `release` (`release`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Movies`
--

LOCK TABLES `Wo_Movies` WRITE;
/*!40000 ALTER TABLE `Wo_Movies` DISABLE KEYS */;
INSERT INTO `Wo_Movies` VALUES (1,'SWORD MASTER Trailer','action','Unknown','Unknown','china',2016,'hd',33,'Sword Master Trailer (San shao ye de jian Trailer) - 2016 Martial Arts Movie starring Peter Ho, Mengjie Jiang, Yiyan Jiang ...','upload/photos/2017/12/UMQCoAMZq1azrZEjZO5e_07_a88b8c3ccafead2a2ccc806247e26b5d_image.png','','https://www.youtube.com/embed/DgcJ_sHCOzo','',5),(2,'Journey to the West: The Demons Strike Back','action','unknow','Unknown','china',2017,'hd',20,'Journey to the West: The Demons Strike Back Official Trailer #1 (2017) Fantasy Movie HD','upload/photos/2017/12/2wNKmdjUN4xE75vxUxQC_08_43ac04b8f060e64b9ecee5c93b0ff9e4_image.jpg','','https://www.youtube.com/embed/XRg8bbc22IU','',1),(3,'Plastic China','action','unknow','Unknown','china',2017,'hd',20,'Plastic China: A portrait of poverty, ambition and hope set in a world of waste.','upload/photos/2017/12/9lskHARdNA7YmsF6guK9_08_63be23ef56f6304976ae762175a8b55b_image.jpg','','https://www.youtube.com/embed/Fz-suLt88wg','',1),(4,'The Game Changer','action','unknow','Unknown','china',2017,'hd',20,'Two escaped prisoners join one of the most powerful gangs in Shanghai, the Green Gang, as the right-hand men of the head boss Mr. Tang. When Mr. Tang tries to gain total control over business dealings in Shanghai, he discovers his closest allies are not who they seem and','upload/photos/2017/12/GKQmMgyqG5ZAaFNEEF2K_08_e4a2ba78880b5477acdb9e6074493c76_image.png','','https://www.youtube.com/embed/EcfPYKd5UuA','',0),(5,'Lifeline','action','unknow','Unknown','china',2017,'hd',20,'A heroic tale of firefighters, &#039;Lifeline&#039; vividly captures the ferociousness of a firestorm. It also delves into the fireman’s psyche: these audacious firefighters can march into disaster and risk their lives by saving others, yet would they have the equivalent courage to tackle their','upload/photos/2017/12/zRAL84vehdowpr2LBtrZ_08_dcb0a1833c879c79ef9da6094adc8dda_image.jpg','','https://www.youtube.com/embed/Ru4zkxNuJ_I','',0);
/*!40000 ALTER TABLE `Wo_Movies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Notifications`
--

DROP TABLE IF EXISTS `Wo_Notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Notifications` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `notifier_id` int(11) NOT NULL DEFAULT 0,
  `recipient_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `event_id` int(11) NOT NULL DEFAULT 0,
  `thread_id` int(11) NOT NULL DEFAULT 0,
  `seen_pop` int(11) NOT NULL DEFAULT 0,
  `type` varchar(255) NOT NULL DEFAULT '',
  `type2` varchar(32) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `full_link` varchar(1000) NOT NULL DEFAULT '',
  `seen` int(11) NOT NULL DEFAULT 0,
  `sent_push` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  `app_src` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `notifier_id` (`notifier_id`),
  KEY `user_id` (`recipient_id`),
  KEY `post_id` (`post_id`),
  KEY `seen` (`seen`),
  KEY `time` (`time`),
  KEY `page_id` (`page_id`),
  KEY `group_id` (`group_id`,`seen_pop`),
  KEY `sent_push` (`sent_push`),
  KEY `order1` (`seen`,`id`),
  KEY `order2` (`notifier_id`,`id`),
  KEY `order3` (`recipient_id`,`id`),
  KEY `order4` (`post_id`,`id`),
  KEY `order5` (`page_id`,`id`),
  KEY `order6` (`group_id`,`id`),
  KEY `order7` (`time`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Notifications`
--

LOCK TABLES `Wo_Notifications` WRITE;
/*!40000 ALTER TABLE `Wo_Notifications` DISABLE KEYS */;
INSERT INTO `Wo_Notifications` VALUES (29,3,4,0,0,0,0,0,0,'accepted_request','','','index.php?link1=timeline&u=rahul143uv','',0,1,1512560618,''),(37,1,11,35,0,0,0,0,0,'reaction_post','post_avatar','','index.php?link1=post&id=35','',0,1,1512582782,''),(38,4,11,0,0,0,0,0,0,'accepted_request','','','index.php?link1=timeline&u=thundext234','',0,0,1512612737,''),(40,6,7,0,0,0,0,0,0,'accepted_request','','','index.php?link1=timeline&u=sonu4u47','',0,1,1512644899,''),(61,2,5,0,0,0,0,0,0,'accepted_request','','','index.php?link1=timeline&u=rakesh','',0,1,1513243393,''),(86,35,34,19,0,0,0,0,1551418897,'share','',NULL,'index.php?link1=post&id=21','',1551418909,1,1551418897,''),(87,34,35,19,0,0,0,0,1551418903,'liked_comment','','Nice Pic s..','index.php?link1=post&id=19&ref=25','',1551418916,1,1551418902,''),(90,35,34,0,0,0,0,0,1551419016,'following','','','index.php?link1=timeline&u=Sonurrr','',1551419027,1,1551419015,''),(91,34,35,0,0,0,0,0,1551419038,'following','','','index.php?link1=timeline&u=Raj','',1551419434,1,1551419035,''),(95,34,1,0,0,1,0,0,0,'joined_group','','','index.php?link1=timeline&u=PhpExpert','',0,1,1551429960,''),(96,34,1,0,0,0,0,0,0,'following','','','index.php?link1=timeline&u=Raj','',0,1,1551430104,''),(97,34,1,14,0,0,0,0,0,'comment','','sdfdfsf..','index.php?link1=post&id=14&ref=28','',0,1,1551509971,''),(100,34,1,16,0,0,0,0,0,'reaction_post','post_avatar','','index.php?link1=post&id=16','',0,1,1551549670,''),(101,36,34,0,0,0,0,0,1551550123,'following','','','index.php?link1=timeline&u=Sonu','',1551550128,1,1551550086,''),(102,34,36,0,0,0,0,0,0,'following','','','index.php?link1=timeline&u=Raj','',1551550279,1,1551550134,''),(103,34,1,0,0,0,0,0,0,'visited_profile','','','index.php?link1=timeline&u=Raj','',0,1,1551556939,''),(104,37,34,0,0,0,0,0,0,'following','','','index.php?link1=timeline&u=Dharm Kaushal','',1551622957,1,1551615092,'');
/*!40000 ALTER TABLE `Wo_Notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_PageAdmins`
--

DROP TABLE IF EXISTS `Wo_PageAdmins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_PageAdmins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_PageAdmins`
--

LOCK TABLES `Wo_PageAdmins` WRITE;
/*!40000 ALTER TABLE `Wo_PageAdmins` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_PageAdmins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_PageRating`
--

DROP TABLE IF EXISTS `Wo_PageRating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_PageRating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `valuation` int(11) DEFAULT 0,
  `review` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_PageRating`
--

LOCK TABLES `Wo_PageRating` WRITE;
/*!40000 ALTER TABLE `Wo_PageRating` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_PageRating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Pages`
--

DROP TABLE IF EXISTS `Wo_Pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_name` varchar(32) NOT NULL DEFAULT '',
  `page_title` varchar(32) NOT NULL DEFAULT '',
  `page_description` varchar(1000) NOT NULL DEFAULT '',
  `avatar` varchar(255) NOT NULL DEFAULT 'upload/photos/d-page.jpg',
  `cover` varchar(255) NOT NULL DEFAULT 'upload/photos/d-cover.jpg',
  `page_category` int(11) NOT NULL DEFAULT 1,
  `website` varchar(255) NOT NULL DEFAULT '',
  `facebook` varchar(32) NOT NULL DEFAULT '',
  `google` varchar(32) NOT NULL DEFAULT '',
  `vk` varchar(32) NOT NULL DEFAULT '',
  `twitter` varchar(32) NOT NULL DEFAULT '',
  `linkedin` varchar(32) NOT NULL DEFAULT '',
  `company` varchar(32) NOT NULL DEFAULT '',
  `phone` varchar(32) NOT NULL DEFAULT '',
  `address` varchar(100) NOT NULL DEFAULT '',
  `call_action_type` int(11) NOT NULL DEFAULT 0,
  `call_action_type_url` varchar(255) NOT NULL DEFAULT '',
  `background_image` varchar(200) NOT NULL DEFAULT '',
  `background_image_status` int(11) NOT NULL DEFAULT 0,
  `instgram` varchar(32) NOT NULL DEFAULT '',
  `youtube` varchar(100) NOT NULL DEFAULT '',
  `verified` enum('0','1') NOT NULL DEFAULT '0',
  `active` enum('0','1') NOT NULL DEFAULT '0',
  `registered` varchar(32) NOT NULL DEFAULT '0/0000',
  `boosted` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`page_id`),
  KEY `registered` (`registered`),
  KEY `user_id` (`user_id`),
  KEY `page_category` (`page_category`),
  KEY `active` (`active`),
  KEY `verified` (`verified`),
  KEY `boosted` (`boosted`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Pages`
--

LOCK TABLES `Wo_Pages` WRITE;
/*!40000 ALTER TABLE `Wo_Pages` DISABLE KEYS */;
INSERT INTO `Wo_Pages` VALUES (1,1,'wedding','This is my personal belg','This is my personal belg','upload/photos/d-page.jpg','upload/photos/d-cover.jpg',16,'','','','','','','','','',0,'','',0,'','','0','1','2/2019','1');
/*!40000 ALTER TABLE `Wo_Pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Pages_Invites`
--

DROP TABLE IF EXISTS `Wo_Pages_Invites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Pages_Invites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `inviter_id` int(11) NOT NULL DEFAULT 0,
  `invited_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`,`inviter_id`,`invited_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Pages_Invites`
--

LOCK TABLES `Wo_Pages_Invites` WRITE;
/*!40000 ALTER TABLE `Wo_Pages_Invites` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Pages_Invites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Pages_Likes`
--

DROP TABLE IF EXISTS `Wo_Pages_Likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Pages_Likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `active` (`active`),
  KEY `user_id` (`user_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Pages_Likes`
--

LOCK TABLES `Wo_Pages_Likes` WRITE;
/*!40000 ALTER TABLE `Wo_Pages_Likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Pages_Likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Payments`
--

DROP TABLE IF EXISTS `Wo_Payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `type` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `date` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Payments`
--

LOCK TABLES `Wo_Payments` WRITE;
/*!40000 ALTER TABLE `Wo_Payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_PinnedPosts`
--

DROP TABLE IF EXISTS `Wo_PinnedPosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_PinnedPosts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `event_id` int(11) NOT NULL DEFAULT 0,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  KEY `active` (`active`),
  KEY `page_id` (`page_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_PinnedPosts`
--

LOCK TABLES `Wo_PinnedPosts` WRITE;
/*!40000 ALTER TABLE `Wo_PinnedPosts` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_PinnedPosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Polls`
--

DROP TABLE IF EXISTS `Wo_Polls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Polls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `text` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Polls`
--

LOCK TABLES `Wo_Polls` WRITE;
/*!40000 ALTER TABLE `Wo_Polls` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Polls` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Posts`
--

DROP TABLE IF EXISTS `Wo_Posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `recipient_id` int(11) NOT NULL DEFAULT 0,
  `postText` text DEFAULT NULL,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `event_id` int(11) NOT NULL DEFAULT 0,
  `page_event_id` int(11) NOT NULL DEFAULT 0,
  `postLink` varchar(1000) NOT NULL DEFAULT '',
  `postLinkTitle` text DEFAULT NULL,
  `postLinkImage` varchar(100) NOT NULL DEFAULT '',
  `postLinkContent` varchar(1000) NOT NULL DEFAULT '',
  `postVimeo` varchar(100) NOT NULL DEFAULT '',
  `postDailymotion` varchar(100) NOT NULL DEFAULT '',
  `postFacebook` varchar(100) NOT NULL DEFAULT '',
  `postFile` varchar(255) NOT NULL DEFAULT '',
  `postFileName` varchar(200) NOT NULL DEFAULT '',
  `postYoutube` varchar(255) NOT NULL DEFAULT '',
  `postVine` varchar(32) NOT NULL DEFAULT '',
  `postSoundCloud` varchar(255) NOT NULL DEFAULT '',
  `postMap` varchar(255) NOT NULL DEFAULT '',
  `postShare` int(11) NOT NULL DEFAULT 0,
  `postPrivacy` enum('0','1','2','3') NOT NULL DEFAULT '1',
  `postType` varchar(30) NOT NULL DEFAULT '',
  `postFeeling` varchar(255) NOT NULL DEFAULT '',
  `postListening` varchar(255) NOT NULL DEFAULT '',
  `postTraveling` varchar(255) NOT NULL DEFAULT '',
  `postWatching` varchar(255) NOT NULL DEFAULT '',
  `postPlaying` varchar(255) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT 0,
  `registered` varchar(32) NOT NULL DEFAULT '0/0000',
  `album_name` varchar(52) NOT NULL DEFAULT '',
  `multi_image` enum('0','1') NOT NULL DEFAULT '0',
  `boosted` int(11) NOT NULL DEFAULT 0,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `poll_id` int(11) NOT NULL DEFAULT 0,
  `blog_id` int(11) NOT NULL DEFAULT 0,
  `videoViews` int(11) NOT NULL DEFAULT 0,
  `postRecord` varchar(3000) NOT NULL DEFAULT '',
  `postSticker` text DEFAULT NULL,
  `shared_from` int(15) NOT NULL DEFAULT 0,
  `post_url` text DEFAULT NULL,
  `parent_id` int(15) NOT NULL DEFAULT 0,
  `question_id` int(11) NOT NULL DEFAULT 0,
  `shares` int(11) NOT NULL DEFAULT 0,
  `origin_id` int(11) NOT NULL DEFAULT 0,
  `color` int(11) NOT NULL DEFAULT 0,
  `latitute` varchar(255) NOT NULL,
  `longtitute` varchar(255) NOT NULL,
  `postFileThumb` varchar(256) DEFAULT NULL,
  `postPlaytube` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`),
  KEY `recipient_id` (`recipient_id`),
  KEY `postFile` (`postFile`),
  KEY `postShare` (`postShare`),
  KEY `postType` (`postType`),
  KEY `postYoutube` (`postYoutube`),
  KEY `page_id` (`page_id`),
  KEY `group_id` (`group_id`),
  KEY `registered` (`registered`),
  KEY `time` (`time`),
  KEY `boosted` (`boosted`),
  KEY `product_id` (`product_id`),
  KEY `poll_id` (`poll_id`),
  KEY `event_id` (`event_id`),
  KEY `videoViews` (`videoViews`),
  KEY `shared_from` (`shared_from`),
  KEY `order1` (`user_id`,`id`),
  KEY `order2` (`page_id`,`id`),
  KEY `order3` (`group_id`,`id`),
  KEY `order4` (`recipient_id`,`id`),
  KEY `order5` (`event_id`,`id`),
  KEY `order6` (`parent_id`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Posts`
--

LOCK TABLES `Wo_Posts` WRITE;
/*!40000 ALTER TABLE `Wo_Posts` DISABLE KEYS */;
INSERT INTO `Wo_Posts` VALUES (14,14,1,0,'sdfdfsf',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551417390,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(15,15,1,0,'dfsdfa',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551417919,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(16,16,1,0,NULL,0,0,0,0,'',NULL,'','','','','','upload/photos/2019/03/GotyQOmDZ5lPyifjt8LQ_01_3515a0750bd80b35e118cfc5503d0f6a_avatar_full.png','','','','','',0,'0','profile_picture','','','','','',1551417954,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','',NULL,NULL),(17,17,1,0,'Hello Everyone',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551417978,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(18,18,34,0,'Mobile app development requirement for android &amp; ios both!!!! <br>Looking a firm which has built an E- commerce app or product catalogue app. Also had an experience in building learning assessment features. <br> <br>Share your portfolio at raj@phpexperttechnologs.com. Any references would be appreciated.',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551418716,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(19,19,34,0,NULL,0,0,0,0,'',NULL,'','','','','','upload/photos/2019/03/oJn1LVjyh1NX1etNXmAB_01_805e84b0e1ecc34f9c94e749b85cf005_avatar_full.jpeg','','','','','',0,'0','profile_picture_deleted','','','','','',1551418738,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,1,0,0,'','',NULL,NULL),(20,20,34,0,NULL,0,0,0,0,'',NULL,'','','','','','upload/photos/2019/03/ksDgAJRaNqqwcVMXx4fT_01_7c1b7a637082fa4e8234a7b7da91db09_cover_full.png','','','','','',0,'0','profile_picture_deleted','','','','','',1551418843,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','',NULL,NULL),(24,24,34,0,'Hi folks <br> <br>How are you? <br> <br>One of my friend is actively looking for job  in PPC and Digital Marketing profile. He has 1.5 years of experience in SEO profile. He wants to explore his ability and skills in digital marketing industry. <br> <br>If you have any opportunity regarding the mentioned skills please let me know. Their prefered location is - Noida, Delhi <br> <br>Thanks &amp; Regards',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551429403,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(25,25,34,0,'We are looking freelancers for Mechanical engineering , those who can work on  these  tools  IE- <br>Solidworks, CREO, Revit, Pro-E, ANSYS,Auto Cad,CATIA,Mechanical design  <br>2D/3D,Matlab!',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551429593,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(26,26,34,0,'Hello folks, <br> <br>My friend is looking for change in backend development having knowledge of node.js, javascript development, php, codeingniter,laravel, mongodb, mysql, caching etc and experience of 3+ year in industry. <br>Please drop your e-mail id if any requirements. <br> <br>Preferred location: indore',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551429640,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(27,27,34,0,'Candidate to Recruiter : Is your Company 5 day working? <br>Recruiter : Yes, it is. <br>Candidate : Great <br>Recruiter : When can you come  for interview? <br>Candidate : Is it possible on Saturday as i am available on Saturday only. <br>Recruiter : Awkward silence in mind ( You know what i mean) <br> <br>#[2] #[3] #[4] #[5] #[6]',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551429682,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(28,28,34,0,'Just got the good news!!! My Patent Application (201821020584) was granted today, the said application was my second invention. I&#039;m thrilled to share my achievement with all of you. This couldn&#039;t have been possible without the support and help of my parents, Senthil Kumar and his team at Intepat IP Services Pvt Ltd.',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551429711,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(29,29,34,0,'Hello Connections, <br>I have two references of front end development and node js profile. <br>Both have done 3 month industrial training in this profile. <br>Please ping me if there any openings. <br> <br>Skills: HTML, CSS, JAVASCRIPT, JQUERY, NODEJS, ANGULARJS <br> <br>Preferred location #[7] <br> <br>Thanks',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551429747,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(30,30,34,0,'Hi all, <br>One of my friend is looking for job in Rajkot or Ahmedabad location. <br> <br>He is fresher and a very good hands on #[8] #[9] #[10] #[11] #[12] #[13]. <br> <br>Let me know if any requirements for the same. <br> <br>Regards, <br>Aditya',0,0,0,0,'','','','','','','','','','','','','',0,'0','post','','','','','',1551430044,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','','',NULL),(33,33,34,0,NULL,0,0,0,0,'',NULL,'','','','','','upload/photos/2019/03/MexaBqJH8pYQK7UjOEee_02_c29e9f38867df0b92fc8ec7b45d5ffa0_cover_full.jpg','','','','','',0,'0','profile_cover_picture','','','','','',1551557376,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','',NULL,NULL),(34,34,37,0,NULL,0,0,0,0,'',NULL,'','','','','','upload/photos/2019/03/jmVjEm9eGPdEzY2UpUkp_03_22e6486046a0675e4d93a127d95d0f75_avatar_full.png','','','','','',0,'0','profile_picture','','','','','',1551615130,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','',NULL,NULL),(35,35,37,0,NULL,0,0,0,0,'',NULL,'','','','','','upload/photos/2019/03/mzSNe2BBg3bYYuBktPpn_03_30d04a11f7570d2e0c0b0df9c2e55980_cover_full.jpg','','','','','',0,'0','profile_cover_picture','','','','','',1551615142,'3/2019','','0',0,0,0,0,0,'',NULL,0,NULL,0,0,0,0,0,'','',NULL,NULL);
/*!40000 ALTER TABLE `Wo_Posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Products`
--

DROP TABLE IF EXISTS `Wo_Products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `category` int(11) NOT NULL DEFAULT 0,
  `price` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.00',
  `location` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `type` enum('0','1') COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(40) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `time` int(11) NOT NULL DEFAULT 0,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `category` (`category`),
  KEY `price` (`price`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Products`
--

LOCK TABLES `Wo_Products` WRITE;
/*!40000 ALTER TABLE `Wo_Products` DISABLE KEYS */;
INSERT INTO `Wo_Products` VALUES (1,1,'Laptop','Laptop',5,'500','Lagos Nigeria',0,'0','0',1512496539,'1'),(2,1,'Upendra','Description * <br>Please describe your product.',2,'600','',0,'0','1',1549889704,'1');
/*!40000 ALTER TABLE `Wo_Products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Products_Media`
--

DROP TABLE IF EXISTS `Wo_Products_Media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Products_Media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Products_Media`
--

LOCK TABLES `Wo_Products_Media` WRITE;
/*!40000 ALTER TABLE `Wo_Products_Media` DISABLE KEYS */;
INSERT INTO `Wo_Products_Media` VALUES (1,1,'upload/photos/2017/12/z6sZIWhPlp9AN5mMXkhg_05_223ada641b62cf0c32cedd1c79a57211_image.jpg');
/*!40000 ALTER TABLE `Wo_Products_Media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_ProfileFields`
--

DROP TABLE IF EXISTS `Wo_ProfileFields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_ProfileFields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `length` int(11) NOT NULL DEFAULT 0,
  `placement` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'profile',
  `registration_page` int(11) NOT NULL DEFAULT 0,
  `profile_page` int(11) NOT NULL DEFAULT 0,
  `select_type` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'none',
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `registration_page` (`registration_page`),
  KEY `active` (`active`),
  KEY `profile_page` (`profile_page`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_ProfileFields`
--

LOCK TABLES `Wo_ProfileFields` WRITE;
/*!40000 ALTER TABLE `Wo_ProfileFields` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_ProfileFields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_RecentSearches`
--

DROP TABLE IF EXISTS `Wo_RecentSearches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_RecentSearches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `search_id` int(11) NOT NULL DEFAULT 0,
  `search_type` varchar(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`search_id`),
  KEY `search_type` (`search_type`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_RecentSearches`
--

LOCK TABLES `Wo_RecentSearches` WRITE;
/*!40000 ALTER TABLE `Wo_RecentSearches` DISABLE KEYS */;
INSERT INTO `Wo_RecentSearches` VALUES (4,11,1,'user'),(5,11,4,'user'),(10,6,2,'user'),(12,14,6,'user'),(17,6,14,'user'),(18,14,2,'user'),(20,2,1,'user'),(26,16,15,'user'),(27,15,2,'user'),(28,1,7,'user'),(29,1,16,'user'),(30,15,16,'user'),(34,35,34,'user'),(35,34,1,'user');
/*!40000 ALTER TABLE `Wo_RecentSearches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Relationship`
--

DROP TABLE IF EXISTS `Wo_Relationship`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Relationship` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `to_id` int(11) NOT NULL DEFAULT 0,
  `relationship` int(11) NOT NULL DEFAULT 0,
  `active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `from_id` (`from_id`),
  KEY `relationship` (`relationship`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Relationship`
--

LOCK TABLES `Wo_Relationship` WRITE;
/*!40000 ALTER TABLE `Wo_Relationship` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Relationship` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Reports`
--

DROP TABLE IF EXISTS `Wo_Reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `profile_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(15) NOT NULL DEFAULT 0,
  `group_id` int(15) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `text` text DEFAULT NULL,
  `seen` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  KEY `seen` (`seen`),
  KEY `profile_id` (`profile_id`),
  KEY `page_id` (`page_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Reports`
--

LOCK TABLES `Wo_Reports` WRITE;
/*!40000 ALTER TABLE `Wo_Reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_SavedPosts`
--

DROP TABLE IF EXISTS `Wo_SavedPosts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_SavedPosts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_SavedPosts`
--

LOCK TABLES `Wo_SavedPosts` WRITE;
/*!40000 ALTER TABLE `Wo_SavedPosts` DISABLE KEYS */;
INSERT INTO `Wo_SavedPosts` VALUES (1,1,44),(2,1,43);
/*!40000 ALTER TABLE `Wo_SavedPosts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Terms`
--

DROP TABLE IF EXISTS `Wo_Terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Terms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL DEFAULT '',
  `text` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Terms`
--

LOCK TABLES `Wo_Terms` WRITE;
/*!40000 ALTER TABLE `Wo_Terms` DISABLE KEYS */;
INSERT INTO `Wo_Terms` VALUES (1,'terms_of_use','<h4>1- Write your Terms Of Use here.</h4>          \nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,          quis sdnostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.          <br><br>          <h4>2- Random title</h4>          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(2,'privacy_policy',' <h4>1- Write your Privacy Policy here.</h4>          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.          <br><br>          <h4>2- Random title</h4>          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),(3,'about','<h4>1- Write about your website here.</h4>          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.          <br><br>          <h4>2- Random title</h4>          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod          tempor incididunt ut labore et dxzcolore magna aliqua. Ut enim ad minim veniam,          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
/*!40000 ALTER TABLE `Wo_Terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Tokens`
--

DROP TABLE IF EXISTS `Wo_Tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `app_id` int(11) NOT NULL DEFAULT 0,
  `token` varchar(200) NOT NULL DEFAULT '',
  `time` int(32) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `app_id` (`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Tokens`
--

LOCK TABLES `Wo_Tokens` WRITE;
/*!40000 ALTER TABLE `Wo_Tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_UserAds`
--

DROP TABLE IF EXISTS `Wo_UserAds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_UserAds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(3000) NOT NULL DEFAULT '',
  `headline` varchar(200) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  `location` varchar(1000) NOT NULL DEFAULT 'us',
  `audience` longtext DEFAULT NULL,
  `image` varchar(3000) NOT NULL DEFAULT '',
  `gender` varchar(15) CHARACTER SET utf8 COLLATE utf8_danish_ci NOT NULL DEFAULT 'all',
  `bidding` varchar(15) NOT NULL DEFAULT '',
  `clicks` int(15) NOT NULL DEFAULT 0,
  `views` int(15) NOT NULL DEFAULT 0,
  `posted` varchar(15) NOT NULL DEFAULT '',
  `status` int(1) NOT NULL DEFAULT 1,
  `appears` varchar(10) NOT NULL DEFAULT 'post',
  `user_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `appears` (`appears`),
  KEY `user_id` (`user_id`),
  KEY `location` (`location`(255)),
  KEY `gender` (`gender`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_UserAds`
--

LOCK TABLES `Wo_UserAds` WRITE;
/*!40000 ALTER TABLE `Wo_UserAds` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_UserAds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_UserFields`
--

DROP TABLE IF EXISTS `Wo_UserFields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_UserFields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `fid_3` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_UserFields`
--

LOCK TABLES `Wo_UserFields` WRITE;
/*!40000 ALTER TABLE `Wo_UserFields` DISABLE KEYS */;
INSERT INTO `Wo_UserFields` VALUES (1,2,''),(2,3,''),(3,4,''),(4,5,''),(5,6,''),(6,7,''),(7,8,''),(8,9,''),(9,10,''),(10,11,''),(11,12,''),(12,13,''),(13,14,''),(14,15,''),(15,16,''),(16,17,''),(17,18,''),(18,19,''),(19,0,''),(20,0,''),(21,0,''),(22,0,''),(23,0,''),(24,20,''),(25,21,''),(26,22,''),(27,23,''),(28,24,''),(29,25,''),(30,0,''),(31,0,''),(32,26,''),(33,27,'');
/*!40000 ALTER TABLE `Wo_UserFields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_UserStory`
--

DROP TABLE IF EXISTS `Wo_UserStory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_UserStory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(50) NOT NULL DEFAULT 0,
  `title` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(300) NOT NULL DEFAULT '',
  `posted` varchar(50) NOT NULL DEFAULT '',
  `expire` date DEFAULT NULL,
  `thumbnail` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `expires` (`expire`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_UserStory`
--

LOCK TABLES `Wo_UserStory` WRITE;
/*!40000 ALTER TABLE `Wo_UserStory` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_UserStory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_UserStoryMedia`
--

DROP TABLE IF EXISTS `Wo_UserStoryMedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_UserStoryMedia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `story_id` int(30) NOT NULL DEFAULT 0,
  `type` varchar(30) NOT NULL DEFAULT '',
  `filename` text DEFAULT NULL,
  `expire` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expire` (`expire`),
  KEY `story_id` (`story_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_UserStoryMedia`
--

LOCK TABLES `Wo_UserStoryMedia` WRITE;
/*!40000 ALTER TABLE `Wo_UserStoryMedia` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_UserStoryMedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Users`
--

DROP TABLE IF EXISTS `Wo_Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `first_name` varchar(60) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `cover` varchar(100) DEFAULT NULL,
  `background_image` varchar(100) DEFAULT NULL,
  `background_image_status` enum('0','1') DEFAULT NULL,
  `relationship_id` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `working` varchar(32) DEFAULT NULL,
  `working_link` varchar(32) DEFAULT NULL,
  `about` text DEFAULT NULL,
  `school` varchar(32) DEFAULT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `birthday` varchar(50) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `website` varchar(50) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `google` varchar(50) DEFAULT NULL,
  `twitter` varchar(50) DEFAULT NULL,
  `linkedin` varchar(32) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `vk` varchar(32) DEFAULT NULL,
  `instagram` varchar(32) DEFAULT NULL,
  `language` varchar(31) DEFAULT NULL,
  `email_code` varchar(32) DEFAULT NULL,
  `src` varchar(32) DEFAULT NULL,
  `ip_address` varchar(32) DEFAULT NULL,
  `follow_privacy` enum('1','0') DEFAULT NULL,
  `friend_privacy` enum('0','1','2','3') DEFAULT NULL,
  `post_privacy` varchar(255) DEFAULT NULL,
  `message_privacy` enum('1','0') DEFAULT NULL,
  `confirm_followers` enum('1','0') DEFAULT NULL,
  `show_activities_privacy` enum('0','1') DEFAULT NULL,
  `birth_privacy` enum('0','1','2') DEFAULT NULL,
  `visit_privacy` enum('0','1') DEFAULT NULL,
  `verified` enum('1','0') DEFAULT NULL,
  `lastseen` int(32) DEFAULT NULL,
  `showlastseen` enum('1','0') DEFAULT NULL,
  `emailNotification` enum('1','0') DEFAULT NULL,
  `e_liked` enum('0','1') DEFAULT NULL,
  `e_wondered` enum('0','1') DEFAULT NULL,
  `e_shared` enum('0','1') DEFAULT NULL,
  `e_followed` enum('0','1') DEFAULT NULL,
  `e_commented` enum('0','1') DEFAULT NULL,
  `e_visited` enum('0','1') DEFAULT NULL,
  `e_liked_page` enum('0','1') DEFAULT NULL,
  `e_mentioned` enum('0','1') DEFAULT NULL,
  `e_joined_group` enum('0','1') DEFAULT NULL,
  `e_accepted` enum('0','1') DEFAULT NULL,
  `e_profile_wall_post` enum('0','1') DEFAULT NULL,
  `status` enum('1','0') DEFAULT NULL,
  `active` enum('0','1','2') DEFAULT NULL,
  `admin` enum('0','1','2') DEFAULT NULL,
  `type` varchar(11) DEFAULT NULL,
  `registered` varchar(32) DEFAULT NULL,
  `start_up` enum('0','1') DEFAULT NULL,
  `start_up_info` enum('0','1') DEFAULT NULL,
  `startup_follow` enum('0','1') DEFAULT NULL,
  `startup_image` enum('0','1') DEFAULT NULL,
  `last_email_sent` int(32) DEFAULT NULL,
  `phone_number` varchar(32) DEFAULT NULL,
  `sms_code` int(11) DEFAULT NULL,
  `is_pro` enum('0','1') DEFAULT NULL,
  `pro_time` int(11) DEFAULT NULL,
  `pro_type` enum('0','1','2','3','4') DEFAULT NULL,
  `joined` int(11) DEFAULT NULL,
  `css_file` varchar(100) DEFAULT NULL,
  `timezone` varchar(50) DEFAULT NULL,
  `referrer` int(11) DEFAULT NULL,
  `balance` varchar(100) DEFAULT NULL,
  `paypal_email` varchar(100) DEFAULT NULL,
  `notifications_sound` enum('0','1') DEFAULT NULL,
  `order_posts_by` enum('0','1') DEFAULT NULL,
  `social_login` enum('0','1') DEFAULT NULL,
  `device_id` varchar(50) DEFAULT NULL,
  `web_device_id` varchar(100) DEFAULT NULL,
  `wallet` varchar(20) DEFAULT NULL,
  `lat` varchar(200) DEFAULT NULL,
  `lng` varchar(200) DEFAULT NULL,
  `last_location_update` varchar(30) DEFAULT NULL,
  `share_my_location` int(11) DEFAULT NULL,
  `user_allowed` tinyint(1) DEFAULT NULL,
  `user_invitesleft` int(11) DEFAULT NULL,
  `user_referer` int(11) DEFAULT NULL,
  `client_id` int(100) DEFAULT NULL,
  `user_title` varchar(255) DEFAULT NULL,
  `block_id` varchar(255) DEFAULT NULL,
  `house_number_id` varchar(255) DEFAULT NULL,
  `floor_number` varchar(255) DEFAULT NULL,
  `user_type` int(100) DEFAULT NULL,
  `user_resident_type` int(100) DEFAULT NULL,
  `admin_approval` int(100) DEFAULT NULL,
  `email_verify` int(100) DEFAULT NULL,
  `friend_counts` int(100) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `created_ip` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `profile_pics` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `active` (`active`),
  KEY `admin` (`admin`),
  KEY `src` (`src`),
  KEY `gender` (`gender`),
  KEY `avatar` (`avatar`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `registered` (`registered`),
  KEY `joined` (`joined`),
  KEY `phone_number` (`phone_number`) USING BTREE,
  KEY `referrer` (`referrer`),
  KEY `wallet` (`wallet`),
  KEY `friend_privacy` (`friend_privacy`),
  KEY `lat` (`lat`),
  KEY `lng` (`lng`),
  KEY `order1` (`username`,`user_id`),
  KEY `order2` (`email`,`user_id`),
  KEY `order3` (`lastseen`,`user_id`),
  KEY `order4` (`active`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Users`
--

LOCK TABLES `Wo_Users` WRITE;
/*!40000 ALTER TABLE `Wo_Users` DISABLE KEYS */;
INSERT INTO `Wo_Users` VALUES (1,'admin','admin@admin.com','d033e22ae348aeb5660fc2140aec35850c4da997','sonu','singh','upload/photos/2019/03/GotyQOmDZ5lPyifjt8LQ_01_3515a0750bd80b35e118cfc5503d0f6a_avatar.png','upload/photos/2017/12/7UTWWVYsqo3u1AY6NwIC_05_2568bd1750ae9b6f7e81d235003000a9_cover.png','','0',3,'Sector 63, Noida, Uttar Pradesh, India','employee','','','','female','1946-1-1',159,'','','','','','','','','english','','Undefined','61.246.39.131','0','0','ifollow','0','0','1','0','0','0',1551418336,'1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','user','00/0000','1','1','1','1',0,'',0,'1',1512584486,'4',0,'','',0,'0','','0','1','0','','87fe3514-1d8d-45b5-8916-b89ac42baab7','0.00','28.6072842','77.3455322','1551439160',1,1,10,0,0,'','','','',0,0,1,0,0,'','','','','',NULL),(34,'Raj','phpexpertgroup@gmail.com','f7c3bc1d808e04732adf679965ccc34ca7ae3441','Raj','Kaushal','upload/photos/2019/03/oJn1LVjyh1NX1etNXmAB_01_805e84b0e1ecc34f9c94e749b85cf005_avatar.jpeg','upload/photos/2019/03/MexaBqJH8pYQK7UjOEee_02_c29e9f38867df0b92fc8ec7b45d5ffa0_cover.jpg',NULL,'0',0,NULL,'employee',NULL,NULL,NULL,'male','0000-00-00',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'english','43aef2e3a58f39445d6967ec43b5f67d','site','61.246.39.131','0','0','ifollow','0','0','1','0','0','0',1551623302,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','1','user','0/0000','0','0','0','1',0,NULL,0,'0',0,'0',0,NULL,NULL,0,'0',NULL,'0','1','0',NULL,NULL,'0.00','20.593684','78.96288','1551965302',1,1,10,0,2,NULL,'2','100','12',0,0,1,0,NULL,'February 28, 2019, 1:27 pm','61.246.39.131','2019-02-28',NULL,NULL,NULL),(35,'Sonurrr','p1.sonu@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','Upendra','dev','upload/photos/2019/02/O8TCXFEvfozHytbQxzPE_28_dfbf6b510228ecbee32625b681254979_avatar.png','upload/photos/d-cover.jpg',NULL,'0',1,'Noida Sec 02, Noida','employee','','','','male','2007-2-10',99,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'english','2902a10088f89fad466405fa772aff2d','site','123.201.7.82','0','0','ifollow','0','0','1','0','0','0',1551504007,'1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','user','0/0000','0','0','0','1',0,NULL,0,'0',0,'0',0,NULL,NULL,0,'0',NULL,'0','1','0',NULL,'8b06973f-a545-4327-870c-521973baf12f','0.00','20.593684','78.96288','1551965355',1,1,10,0,2,NULL,'1','211','222',1,0,0,0,NULL,'February 28, 2019, 1:28 pm','61.246.39.131','2019-02-28',NULL,NULL,NULL),(36,'Sonu','sonukaushal534@gmail.com','f7c3bc1d808e04732adf679965ccc34ca7ae3441','Sonu','Tiwari','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg',NULL,'0',0,NULL,NULL,NULL,NULL,NULL,'male','0000-00-00',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'english','69fbed45bf24034b9b96fdf2e64951d9','site','223.233.74.163','0','0','ifollow','0','0','1','0','0','0',1551692005,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','0/0000','0','0','0','0',0,NULL,0,'0',0,'0',0,NULL,NULL,0,'0',NULL,'0','1','0',NULL,NULL,'0.00','28.650284600000003','77.44150069999999','1552154879',1,1,10,0,2,NULL,'2','302','2',0,0,0,0,NULL,'March 2, 2019, 6:07 pm','223.233.74.163','2019-03-02',NULL,NULL,NULL),(37,'Dharm Kaushal','dherm9454214684@gmail.com','f7c3bc1d808e04732adf679965ccc34ca7ae3441','Dharm','Kaushal','upload/photos/2019/03/jmVjEm9eGPdEzY2UpUkp_03_22e6486046a0675e4d93a127d95d0f75_avatar.png','upload/photos/2019/03/mzSNe2BBg3bYYuBktPpn_03_30d04a11f7570d2e0c0b0df9c2e55980_cover.jpg',NULL,'0',0,NULL,NULL,NULL,NULL,NULL,'male','0000-00-00',0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'english','3551ba2ad987c932a6e98a50db8de54b','site','106.215.95.31','0','0','ifollow','0','0','1','0','0','0',1551615253,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','0/0000','0','0','0','1',0,NULL,0,'0',0,'0',0,NULL,NULL,0,'0',NULL,'0','1','0',NULL,NULL,'0.00','28.708864000000002','77.11211519999999','1552219860',1,1,10,0,2,'Mr.','1','101','First Floor',0,0,0,1,NULL,'March 3, 2019, 12:09 pm','106.215.95.31','2019-03-03',NULL,NULL,'Raj');
/*!40000 ALTER TABLE `Wo_Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_UsersChat`
--

DROP TABLE IF EXISTS `Wo_UsersChat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_UsersChat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `conversation_user_id` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  `color` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `conversation_user_id` (`conversation_user_id`),
  KEY `time` (`time`),
  KEY `order1` (`user_id`,`id`),
  KEY `order2` (`user_id`,`id`),
  KEY `order3` (`conversation_user_id`,`id`),
  KEY `order4` (`conversation_user_id`,`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_UsersChat`
--

LOCK TABLES `Wo_UsersChat` WRITE;
/*!40000 ALTER TABLE `Wo_UsersChat` DISABLE KEYS */;
INSERT INTO `Wo_UsersChat` VALUES (1,1,2,1551273420,'#056bba'),(2,2,1,1551273420,'#056bba'),(3,1,3,1512654346,''),(4,3,1,1512654346,''),(5,5,1,1512546497,''),(6,1,5,1512546497,''),(7,1,6,1512654202,''),(8,6,1,1512654202,''),(9,15,16,1549965625,'#056bba'),(10,16,15,1549965625,'#056bba'),(11,1,7,1549953430,''),(12,7,1,1549953430,''),(13,34,35,1551429830,''),(14,35,34,1551429830,''),(15,34,1,1551549637,''),(16,1,34,1551549637,''),(17,34,36,1551550295,''),(18,36,34,1551550295,''),(19,37,34,1551622951,''),(20,34,37,1551622951,'');
/*!40000 ALTER TABLE `Wo_UsersChat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Users_all1`
--

DROP TABLE IF EXISTS `Wo_Users_all1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Users_all1` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(50) NOT NULL DEFAULT '',
  `first_name` varchar(60) NOT NULL DEFAULT '',
  `last_name` varchar(32) NOT NULL DEFAULT '',
  `avatar` varchar(100) NOT NULL DEFAULT 'upload/photos/d-avatar.jpg',
  `cover` varchar(100) NOT NULL DEFAULT 'upload/photos/d-cover.jpg',
  `background_image` varchar(100) NOT NULL DEFAULT '',
  `background_image_status` enum('0','1') NOT NULL DEFAULT '0',
  `relationship_id` int(11) NOT NULL DEFAULT 0,
  `address` varchar(100) NOT NULL DEFAULT '',
  `working` varchar(32) NOT NULL DEFAULT '',
  `working_link` varchar(32) NOT NULL DEFAULT '',
  `about` text DEFAULT NULL,
  `school` varchar(32) NOT NULL DEFAULT '',
  `gender` varchar(32) NOT NULL DEFAULT 'male',
  `birthday` varchar(50) NOT NULL DEFAULT '0000-00-00',
  `country_id` int(11) NOT NULL DEFAULT 0,
  `website` varchar(50) NOT NULL DEFAULT '',
  `facebook` varchar(50) NOT NULL DEFAULT '',
  `google` varchar(50) NOT NULL DEFAULT '',
  `twitter` varchar(50) NOT NULL DEFAULT '',
  `linkedin` varchar(32) NOT NULL DEFAULT '',
  `youtube` varchar(100) NOT NULL DEFAULT '',
  `vk` varchar(32) NOT NULL DEFAULT '',
  `instagram` varchar(32) NOT NULL DEFAULT '',
  `language` varchar(31) NOT NULL DEFAULT 'english',
  `email_code` varchar(32) NOT NULL DEFAULT '0',
  `src` varchar(32) NOT NULL DEFAULT 'site',
  `ip_address` varchar(32) DEFAULT '',
  `follow_privacy` enum('1','0') NOT NULL DEFAULT '0',
  `friend_privacy` enum('0','1','2','3') NOT NULL DEFAULT '0',
  `post_privacy` varchar(255) NOT NULL DEFAULT 'ifollow',
  `message_privacy` enum('1','0') NOT NULL DEFAULT '0',
  `confirm_followers` enum('1','0') NOT NULL DEFAULT '0',
  `show_activities_privacy` enum('0','1') NOT NULL DEFAULT '1',
  `birth_privacy` enum('0','1','2') NOT NULL DEFAULT '0',
  `visit_privacy` enum('0','1') NOT NULL DEFAULT '0',
  `verified` enum('1','0') NOT NULL DEFAULT '0',
  `lastseen` int(32) NOT NULL DEFAULT 0,
  `showlastseen` enum('1','0') NOT NULL DEFAULT '1',
  `emailNotification` enum('1','0') NOT NULL DEFAULT '1',
  `e_liked` enum('0','1') NOT NULL DEFAULT '1',
  `e_wondered` enum('0','1') NOT NULL DEFAULT '1',
  `e_shared` enum('0','1') NOT NULL DEFAULT '1',
  `e_followed` enum('0','1') NOT NULL DEFAULT '1',
  `e_commented` enum('0','1') NOT NULL DEFAULT '1',
  `e_visited` enum('0','1') NOT NULL DEFAULT '1',
  `e_liked_page` enum('0','1') NOT NULL DEFAULT '1',
  `e_mentioned` enum('0','1') NOT NULL DEFAULT '1',
  `e_joined_group` enum('0','1') NOT NULL DEFAULT '1',
  `e_accepted` enum('0','1') NOT NULL DEFAULT '1',
  `e_profile_wall_post` enum('0','1') NOT NULL DEFAULT '1',
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `active` enum('0','1','2') NOT NULL DEFAULT '0',
  `admin` enum('0','1','2') NOT NULL DEFAULT '0',
  `type` varchar(11) NOT NULL DEFAULT 'user',
  `registered` varchar(32) NOT NULL DEFAULT '0/0000',
  `start_up` enum('0','1') NOT NULL DEFAULT '0',
  `start_up_info` enum('0','1') NOT NULL DEFAULT '0',
  `startup_follow` enum('0','1') NOT NULL DEFAULT '0',
  `startup_image` enum('0','1') NOT NULL DEFAULT '0',
  `last_email_sent` int(32) NOT NULL DEFAULT 0,
  `phone_number` varchar(32) NOT NULL DEFAULT '',
  `sms_code` int(11) NOT NULL DEFAULT 0,
  `is_pro` enum('0','1') NOT NULL DEFAULT '0',
  `pro_time` int(11) NOT NULL DEFAULT 0,
  `pro_type` enum('0','1','2','3','4') NOT NULL DEFAULT '0',
  `joined` int(11) NOT NULL DEFAULT 0,
  `css_file` varchar(100) NOT NULL DEFAULT '',
  `timezone` varchar(50) NOT NULL DEFAULT '',
  `referrer` int(11) NOT NULL DEFAULT 0,
  `balance` varchar(100) NOT NULL DEFAULT '0',
  `paypal_email` varchar(100) NOT NULL DEFAULT '',
  `notifications_sound` enum('0','1') NOT NULL DEFAULT '0',
  `order_posts_by` enum('0','1') NOT NULL DEFAULT '1',
  `social_login` enum('0','1') NOT NULL DEFAULT '0',
  `device_id` varchar(50) NOT NULL DEFAULT '',
  `web_device_id` varchar(100) NOT NULL DEFAULT '',
  `wallet` varchar(20) NOT NULL DEFAULT '0.00',
  `lat` varchar(200) NOT NULL DEFAULT '0',
  `lng` varchar(200) NOT NULL DEFAULT '0',
  `last_location_update` varchar(30) NOT NULL DEFAULT '0',
  `share_my_location` int(11) NOT NULL DEFAULT 1,
  `user_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `user_invitesleft` int(11) NOT NULL DEFAULT 10,
  `user_referer` int(11) NOT NULL DEFAULT 0,
  `client_id` int(100) DEFAULT NULL,
  `user_title` varchar(255) DEFAULT NULL,
  `block_id` varchar(255) DEFAULT NULL,
  `house_number_id` varchar(255) DEFAULT NULL,
  `floor_number` varchar(255) DEFAULT NULL,
  `user_type` int(100) DEFAULT NULL,
  `user_resident_type` int(100) DEFAULT NULL,
  `admin_approval` int(100) DEFAULT NULL,
  `email_verify` int(100) DEFAULT NULL,
  `friend_counts` int(100) DEFAULT NULL,
  `created_date` varchar(255) DEFAULT NULL,
  `created_ip` varchar(255) DEFAULT NULL,
  `join_date` varchar(255) DEFAULT NULL,
  `profile_pics` varchar(255) DEFAULT NULL,
  `user_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `active` (`active`),
  KEY `admin` (`admin`),
  KEY `src` (`src`),
  KEY `gender` (`gender`),
  KEY `avatar` (`avatar`),
  KEY `first_name` (`first_name`),
  KEY `last_name` (`last_name`),
  KEY `registered` (`registered`),
  KEY `joined` (`joined`),
  KEY `phone_number` (`phone_number`) USING BTREE,
  KEY `referrer` (`referrer`),
  KEY `wallet` (`wallet`),
  KEY `friend_privacy` (`friend_privacy`),
  KEY `lat` (`lat`),
  KEY `lng` (`lng`),
  KEY `order1` (`username`,`user_id`),
  KEY `order2` (`email`,`user_id`),
  KEY `order3` (`lastseen`,`user_id`),
  KEY `order4` (`active`,`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Users_all1`
--

LOCK TABLES `Wo_Users_all1` WRITE;
/*!40000 ALTER TABLE `Wo_Users_all1` DISABLE KEYS */;
INSERT INTO `Wo_Users_all1` VALUES (1,'admin','admin@admin.com','d033e22ae348aeb5660fc2140aec35850c4da997','sonu','singh','upload/photos/2017/12/muaN66mVPJGHJYWq4mQM_05_cbe764708ec12b037b5bb4dc7836efa9_avatar.jpg','upload/photos/2017/12/7UTWWVYsqo3u1AY6NwIC_05_2568bd1750ae9b6f7e81d235003000a9_cover.png','','0',3,'Sector 63, Noida, Uttar Pradesh, India','employee','','','','female','1946-1-1',159,'','','','','','','','','english','','Undefined','171.48.32.28','0','0','ifollow','0','0','1','0','0','0',1550834455,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','1','user','00/0000','1','1','1','1',0,'',0,'1',1512584486,'4',0,'','',0,'0','','0','1','0','','','0.00','28.6072842','77.3455322','1551439160',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(2,'upen','p1.sonu100@gmail.com','9ed97cf87ea9db0d42a019d335ee091f121ab412','Rakesh','Kumar','upload/photos/2017/12/Q3xaTwCXPsZVFYGLyktj_05_88978470b46a2b122fd603a3a09fe14b_avatar.png','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','1983-12-5',99,'','','','','','','','','english','67a05e3822ce48a6386746388e6c81f5','site','111.93.159.50','0','0','ifollow','0','0','1','0','0','1',1513343306,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','1','user','12/2017','0','1','0','1',0,'',0,'1',1512561573,'4',1512471344,'','',0,'0','','0','1','0','','','0.00','28.6426214','77.348852','1513944611',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(4,'thundext234','thundext@gmail.com','4559b343412ecb6f4ab26026befa3bfdca655e1f','Abifarin','Tunde','upload/photos/2017/12/C33PtbommcOJCMnybVCl_05_d5ed6006f05a7689a7a8efc591536e47_avatar.png','upload/photos/2017/12/A9ogbQ5peOjyiB98MJl5_05_6d6d898c0098703cf15f591d85e78f3d_cover.png','','0',0,'','','',NULL,'','male','1985-10-30',159,'','','','','','','','','english','8d4cea2a8d29378bf18f63644a6caac3','site','197.210.24.198','0','0','ifollow','0','0','1','0','0','0',1512614329,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','1','1','1','1',0,'',0,'0',0,'0',1512496833,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(5,'tboy234','tboy_tb234@yahoo.com','4559b343412ecb6f4ab26026befa3bfdca655e1f','Abifarin','T','upload/photos/2017/12/zY9YNzvF2IP6s7BEhxhf_06_dc25e486bd6ccd7cbffcc91a9d787668_avatar.png','upload/photos/2017/12/pCKerduwqfX91c4bfMmI_06_bfd40d82f8c4760a15285b61baf070b6_cover.jpg','','0',0,'','','',NULL,'','male','1960-1-1',2,'','1267897819966084','','','','','','','english','cc4a13d2f3532cdc024df60d3264922c','Facebook','197.210.29.14','0','0','ifollow','0','0','1','0','0','1',1512561974,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','1','1','1','1',0,'',0,'1',1512561696,'4',1512544120,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(6,'sonu4u47','sonu4u47@gmail.com','b2141e1d9a1b7051c434ba50fe874203c8778b63','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','7ca52235b5edb2f9d1c8b43d11012206','site','180.151.230.162','0','0','ifollow','0','0','1','0','0','0',1513257797,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','1','1','1','1',0,'',0,'0',0,'0',1512547056,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(7,'olufemi12','crazytolkapp@gmail.com','97e8aec5e1695d70f25c4a0cdcca533ddc428381','Ajao','Olufemi','upload/photos/2017/12/omPFFX3DfUHsSOQdrfhm_avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','','','','male','0000-00-00',0,'','','108036028888351651644','','','','','','english','c4f51a2e2a048a4175060906c362995c','Google','197.210.47.37','0','0','ifollow','0','0','1','0','0','0',1512569972,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','0','0','0','1',0,'',0,'0',0,'0',1512554995,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(8,'3fa67fefb','tw_938181313332379648@twitter.com','f49c329bb3acb2c096b346f6d538cc9bc127e477','Bloctolk App','','upload/photos/2017/12/PlafNX78VXUSAIs9HjQN_avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','bloctolk','','','','','english','ca03fc13c034d20fc1c449422c51b37a','Twitter','197.210.47.37','0','0','ifollow','0','0','1','0','0','0',1512559583,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','0','0','0','1',0,'',0,'0',0,'0',1512557803,'','',0,'0','','0','1','1','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(9,'506d9c9e6','vk_460821987@vk.com','9bdbe4e5ece5399f76acd823c0183a84f0249d7e','Bloctolk','App','upload/photos/2017/12/fGRzHoEj1SMVzFdFU6FN_avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','','','','male','0000-00-00',0,'','','','','','','id460821987','','english','ba412b3254e6a2ea0d4ebff5db1c23a4','Vkontakte','197.210.47.37','0','0','ifollow','0','0','1','0','0','0',1512560363,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','0','0','0','1',0,'',0,'0',0,'0',1512559602,'','',0,'0','','0','1','1','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(10,'ajao12','skymoveprob@gmail.com','b1ddd6c364f74911f8ef19d6bfd0997acc1c552d','Olufemi','Ajao','upload/photos/2017/12/PXfXOsFGLvq5MSXMCESy_avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','1975-12-6',159,'','103381793521294','','','','','','','english','526378df186d82cf1a1fd7d0d3c5bafc','Facebook','197.210.226.156','0','0','ifollow','0','0','1','0','0','0',1512618684,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','1','1','1','1',0,'',0,'0',0,'0',1512561752,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(11,'Ola247','blacknet.solution@gmail.com','11be2799dc1ad23c6a981ae7268c4b15a22d2ff7','OLA','247','upload/photos/2017/12/36uNeNWNDAXwGhqeSFCz_06_d3e54fd54f9fd42fae86f1044bf5bb72_avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','1970-1-1',159,'','','','','','','','','english','9dcb20af7444ca56e6c7844effa274fa','site','197.210.226.64','0','0','ifollow','0','0','1','2','1','0',1512564858,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','1','1','1','1',0,'',0,'0',0,'0',1512562064,'','',0,'0','','0','1','0','','','0.00','6.6106822785325345','3.323992089678652','1513167752',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(12,'joboy','blacknet.solution@yahoo.com','7c4a8d09ca3762af61e59520943dc26494f8941b','Jefferey','Ajao','upload/photos/2017/12/V1qCQy1US1UY6BPOlHFo_06_2ebfc35250c3158f9109533a3b9b4c1b_avatar.png','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','2001-11-6',5,'','','','','','','','','english','906c0fdf83aa4cffff565bfa58069751','site','197.210.47.37','0','0','ifollow','0','0','1','0','0','0',1512562905,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','1','1','1','1',0,'',0,'0',0,'0',1512562814,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(13,'OLadipupo','Osowe_oladipupo@yahoo.com','8e69a0817afd4f0e315ef1c322bcbac6ca3a3c6a','','','upload/photos/2017/12/YVged4ScWuyM97vJ2CQ2_06_177463d7129bcb61d8a7bbcc8c47c5f3_avatar.png','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','00-00-0000',0,'','','','','','','','','english','fe5ade6cf8139215e6fd3d37fdb9d3a2','site','197.210.47.37','0','0','ifollow','0','0','1','0','0','0',1512563075,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','1','1','1','1',0,'',0,'0',0,'0',1512562990,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(14,'harry','hari@gmail.com','737e255f1623e1fa9588391b58f59ed79714662d','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','3b87c97d15e8eb11e51aa25e9a5770e9','site','180.151.230.162','0','0','ifollow','0','0','1','0','0','0',1513254186,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','12/2017','0','0','0','0',0,'',0,'0',0,'0',1513236192,'','',0,'0','','0','1','0','','','0.00','0','0','0',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(15,'Upendra','upen.aryan100@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/2019/02/ZJzYrJQ1XUjBFsu1e4WD_11_45939e68564b1a026d4f906a1afbe6a0_avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','00-00-0000',0,'','','','','','','','','english','5032955b2d388fccb2143c5e43f64096','site','122.177.18.193','0','0','ifollow','0','0','1','0','0','0',1549967606,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','1','1','1','1',0,'',0,'0',0,'0',1549864085,'','',0,'0','','0','1','0','','','0.00','28.5949952','77.3382144','1550468907',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(16,'arunku','petteam10@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','raj','kumar','upload/photos/2019/02/kyRVqgxAtVWjRKNOTCeN_11_d7ebf0add8087228d949c5d81a91359c_avatar.jpg','upload/photos/d-cover.jpg','upload/photos/2019/02/psRZ7EJGhIcczSDoIADa_12_5ac8e639c4424660f3e4c70a07cbb82f_background_image.jpg','1',3,'','','',NULL,'','male','2001-6-6',99,'','','','','','','','','english','eac6516a7cb3ebb1fe0bffc16bc03d69','site','122.177.45.209','0','0','ifollow','0','0','1','0','0','0',1550048047,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','1','1','1','1',0,'',0,'0',0,'0',1549864316,'','',0,'0','','0','1','0','','','0.00','28.5949952','77.3382144','1550469200',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(17,'Sandy','snady@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','sachin','singh','upload/photos/2019/02/6hzTw2bNvgUdExzXunlB_22_1b70be302530e366ca37676f78c0fac3_avatar.png','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','2007-2-16',99,'','','','','','','','','english','f1b5a149b72512dffa7774d6a793b41b','site','171.48.32.28','0','0','ifollow','0','0','1','0','0','0',1550834652,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','1','1','1','1',0,'',0,'0',0,'0',1550834487,'','',0,'0','','0','1','0','','','0.00','28.6072842','77.3455322','1551439291',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(20,'p1sonus','p1.sonuss@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','a319b44313bf85c62ae021e0464009c7','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551180519,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','0','0','0',0,'',0,'0',0,'0',1551180509,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551785315',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(21,'admindasd','sadfsdfadsf@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','7924172b437eef37a5bc3ed4b54f3e58','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551180620,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','0','0','0',0,'',0,'0',0,'0',1551180617,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551785422',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(22,'adminfssadfaf','sadfasdfsda@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','5a792e48479714740c1b288d93971af6','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551181569,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','1','0','1',0,'',0,'0',0,'0',1551181192,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551785996',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(23,'adminasdasdad','adminasdasdad@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','f3dc3e6660750534496b04de2b4e826e','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551181847,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','0','0','0',0,'',0,'0',0,'0',1551181604,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551786413',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(24,'adminadasd','adminadasd@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','amit','singh','upload/photos/2019/02/2U4qdsYOq59U8npyV2vW_26_26a778a1611f53057e1f703f7d08221b_avatar.png','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','2002-1-15',99,'','','','','','','','','english','766829ebdbf52e7f1baa4c2152559814','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551183069,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','1','0','1',0,'',0,'0',0,'0',1551181877,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551786682',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(25,'wqeqweadmin','wqeqweadmin@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','f497225a9bd2f4a6dd0f133c44881878','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551183838,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','0','0','0',0,'',0,'0',0,'0',1551183097,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551787901',1,1,10,0,0,'','','','',0,0,0,0,0,'','','','',''),(26,'admineqwe','eqewqweqw@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','2383d218aeba815dc8f3df19f39a43dd','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551184107,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','0','0','0',0,'',0,'0',0,'0',1551184093,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551788897',1,1,10,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(27,'qweqwe','eqweqwe@gmail.com','7c4a8d09ca3762af61e59520943dc26494f8941b','','','upload/photos/d-avatar.jpg','upload/photos/d-cover.jpg','','0',0,'','','',NULL,'','male','0000-00-00',0,'','','','','','','','','english','efe6398127928f1b2e9ef3207fb82663','site','122.177.16.151','0','0','ifollow','0','0','1','0','0','0',1551184427,'1','1','1','1','1','1','1','1','1','1','1','1','1','0','1','0','user','2/2019','0','0','0','0',0,'',0,'0',0,'0',1551184147,'','',0,'0','','0','1','0','','','0.00','28.6261534','77.4148034','1551788951',1,1,10,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `Wo_Users_all1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Verification_Requests`
--

DROP TABLE IF EXISTS `Wo_Verification_Requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Verification_Requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `message` text CHARACTER SET utf8 DEFAULT NULL,
  `user_name` varchar(150) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `passport` varchar(3000) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `photo` varchar(3000) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `type` varchar(32) NOT NULL DEFAULT '',
  `seen` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `page_id` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Verification_Requests`
--

LOCK TABLES `Wo_Verification_Requests` WRITE;
/*!40000 ALTER TABLE `Wo_Verification_Requests` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Verification_Requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_VideoCalles`
--

DROP TABLE IF EXISTS `Wo_VideoCalles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_VideoCalles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `access_token` text DEFAULT NULL,
  `access_token_2` text DEFAULT NULL,
  `from_id` int(11) NOT NULL DEFAULT 0,
  `to_id` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 0,
  `called` int(11) NOT NULL DEFAULT 0,
  `time` int(11) NOT NULL DEFAULT 0,
  `declined` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `to_id` (`to_id`),
  KEY `from_id` (`from_id`),
  KEY `called` (`called`),
  KEY `declined` (`declined`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_VideoCalles`
--

LOCK TABLES `Wo_VideoCalles` WRITE;
/*!40000 ALTER TABLE `Wo_VideoCalles` DISABLE KEYS */;
INSERT INTO `Wo_VideoCalles` VALUES (4,'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTU1MTQxOTQ5NyIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTU1MTQyMzA5NywiZ3JhbnRzIjp7ImlkZW50aXR5IjoiNWQ0NDg3OWIwNWVmZjFjIiwidmlkZW8iOnsicm9vbSI6IlJhal9Tb251cnJyIn19fQ.UPKbCanqk-LagZHiyjNl6fERKK_B9ihW8T9mmRuTCFg','eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiIsImN0eSI6InR3aWxpby1mcGE7dj0xIn0.eyJqdGkiOiItMTU1MTQxOTQ5NyIsImlzcyI6IiIsInN1YiI6IiIsImV4cCI6MTU1MTQyMzA5NywiZ3JhbnRzIjp7ImlkZW50aXR5IjoiZjUyNDkwNWRjZDBjNGMwIiwidmlkZW8iOnsicm9vbSI6IlJhal9Tb251cnJyIn19fQ.d-D0DM6ja96sc9xemBX4aY-mIqUknUCdfqvXBhjzIgo',34,35,1,34,1551419497,0);
/*!40000 ALTER TABLE `Wo_VideoCalles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Votes`
--

DROP TABLE IF EXISTS `Wo_Votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Votes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `option_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`),
  KEY `option_id` (`option_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Votes`
--

LOCK TABLES `Wo_Votes` WRITE;
/*!40000 ALTER TABLE `Wo_Votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Wo_Wonders`
--

DROP TABLE IF EXISTS `Wo_Wonders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Wo_Wonders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Wo_Wonders`
--

LOCK TABLES `Wo_Wonders` WRITE;
/*!40000 ALTER TABLE `Wo_Wonders` DISABLE KEYS */;
/*!40000 ALTER TABLE `Wo_Wonders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `actionpoints`
--

DROP TABLE IF EXISTS `actionpoints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `actionpoints` (
  `action_id` int(11) NOT NULL AUTO_INCREMENT,
  `action_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `action_enabled` tinyint(1) NOT NULL DEFAULT 1,
  `action_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `action_points` int(11) NOT NULL,
  `action_pointsmax` int(11) NOT NULL DEFAULT 0,
  `action_rolloverperiod` int(11) NOT NULL DEFAULT 0,
  `action_requiredplugin` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `action_group` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`action_id`),
  KEY `action_type` (`action_type`)
) ENGINE=MyISAM AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `actionpoints`
--

LOCK TABLES `actionpoints` WRITE;
/*!40000 ALTER TABLE `actionpoints` DISABLE KEYS */;
INSERT INTO `actionpoints` VALUES (1,'transferpoints',1,'Transfer Points',1,0,0,NULL,0),(2,'givepoints',1,'Give Points',1,0,0,NULL,0),(101,'invite',1,'Invite Friends (for each invited friend)',200,0,0,NULL,101),(102,'refer',1,'Refer friends (actual signup)',80,0,0,NULL,101),(103,'signup',1,'Signup Bonus',20,20,86400,NULL,101),(104,'addfriend',1,'Add a friend',1,10,86400,NULL,100),(105,'editphoto',1,'Upload profile photo',100,100,86400,NULL,100),(106,'editprofile',1,'Edit / Update profile',100,100,86400,NULL,100),(107,'editcover',1,'Update Cover',100,100,86400,NULL,100),(108,'login',1,'Login to site (requires logout)',1,10,86400,NULL,100),(109,'adclick',1,'Clicking on an ad',10,100,0,NULL,100),(110,'newevent',1,'Create new event',10,200,86400,'Sngine Events plugin',3),(111,'postblog',1,'Post a blog',10,200,86400,'Sngine Blogs plugin',5),(112,'postclassified',1,'Create a classified',10,200,86400,'Sngine Classifieds plugin',4),(113,'newalbum',1,'Upload an album',10,200,86400,NULL,6),(114,'newmedia',1,'Upload new photo / photo to album',10,1000,86400,NULL,6),(115,'newgroup',1,'Create new group',20,200,86400,NULL,1),(116,'joingroup',1,'Join a group',10,100,86400,NULL,1),(117,'leavegroup',1,'Leave a group',1,10,86400,NULL,1),(118,'newpoll',1,'Create a poll',10,0,0,'Sngine Polls plugin',2),(119,'votepoll',1,'Participate in poll',1,0,0,'Sngine Polls plugin',2),(120,'newmusic',1,'Adding a Song',10,100,86400,NULL,9),(121,'post',1,'New Post',1,100,0,NULL,100),(122,'comment',1,'Comment a post',1,100,0,NULL,100),(123,'like',1,'Like a post',1,100,0,NULL,100),(124,'share',1,'Share a post',1,100,0,NULL,100),(125,'newpage',1,'Create new page',10,200,86400,NULL,100),(126,'signup_with_invite',1,'Signup with invitation',200,0,0,NULL,0);
/*!40000 ALTER TABLE `actionpoints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads_ldrsoft`
--

DROP TABLE IF EXISTS `ads_ldrsoft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ads_ldrsoft` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `slug` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `page_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `display_link` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `type_content` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plan_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `plan_id` int(11) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `target_location` varchar(999) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `target_gender` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'all',
  `impression_stats` int(11) NOT NULL DEFAULT 0,
  `clicks_stats` int(11) NOT NULL DEFAULT 0,
  `clicks` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `images` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `paid` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `limit_views` int(11) NOT NULL DEFAULT 0,
  `limit_clicks` int(11) NOT NULL DEFAULT 0,
  `limit_ctr` int(11) NOT NULL DEFAULT 0,
  `position` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `ad_public` int(11) NOT NULL DEFAULT 0,
  `ad_html` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  `date_start` int(11) NOT NULL DEFAULT 0,
  `date_end` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads_ldrsoft`
--

LOCK TABLES `ads_ldrsoft` WRITE;
/*!40000 ALTER TABLE `ads_ldrsoft` DISABLE KEYS */;
INSERT INTO `ads_ldrsoft` VALUES (1,'php expert - Website','3cfcdbc3',1,0,0,'php expert','We understand that communication is essential for your business. This calls the need for a compatib','php expert','php expert','website','','impression',1,0,'all','all',999,1,1,1000,'php expert',1,1,0,0,0,'',0,'',1512481959,1512482011,0,0);
/*!40000 ALTER TABLE `ads_ldrsoft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads_plans`
--

DROP TABLE IF EXISTS `ads_plans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ads_plans` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `money_type` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'USD',
  `quantity` int(11) NOT NULL DEFAULT 0,
  `enable` int(11) NOT NULL DEFAULT 1,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads_plans`
--

LOCK TABLES `ads_plans` WRITE;
/*!40000 ALTER TABLE `ads_plans` DISABLE KEYS */;
INSERT INTO `ads_plans` VALUES (1,'Basic Impression','impression','Basic plan impression',1.5,'USD',1000,1,1512470785,1512470785),(2,'Basic Clicks','clicks','Basic plan clicks',1,'USD',100,1,1512470785,1512470785);
/*!40000 ALTER TABLE `ads_plans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads_purchased`
--

DROP TABLE IF EXISTS `ads_purchased`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ads_purchased` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL DEFAULT 0,
  `payment_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Paypal',
  `item_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `item_number` int(11) NOT NULL DEFAULT 0,
  `payment_status` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_amount` float NOT NULL DEFAULT 0,
  `payment_currency` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `txn_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `receiver_email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payer_email` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `custom` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT 0,
  `updated` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `txn_id` (`txn_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads_purchased`
--

LOCK TABLES `ads_purchased` WRITE;
/*!40000 ALTER TABLE `ads_purchased` DISABLE KEYS */;
INSERT INTO `ads_purchased` VALUES (1,1,'stripe - card','Basic Impression',1,'Complete',1.5,'USD',1,'tok_1BVo7yHjdcmym0YZK8JoGqHK','tboy_tb234@yahoo.com','admin@admin.com','',1512509941,1512509941),(2,1,'stripe - card','Basic Impression',2,'Complete',1.5,'USD',1,'tok_1BWPlkHjdcmym0YZaAimpVwt','aaa@aaa.com','admin@admin.com','',1512654636,1512654636);
/*!40000 ALTER TABLE `ads_purchased` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ads_reports`
--

DROP TABLE IF EXISTS `ads_reports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ads_reports` (
  `report_id` int(9) NOT NULL AUTO_INCREMENT,
  `report_type` int(3) NOT NULL DEFAULT 0,
  `report_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `report_ad_id` int(11) NOT NULL DEFAULT 0,
  `report_user_id` int(11) NOT NULL DEFAULT 0,
  `report_time` int(11) NOT NULL DEFAULT 0,
  `report_view` int(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`report_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ads_reports`
--

LOCK TABLES `ads_reports` WRITE;
/*!40000 ALTER TABLE `ads_reports` DISABLE KEYS */;
/*!40000 ALTER TABLE `ads_reports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0 COMMENT 'Active=0,Inactive=1',
  `created_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48315 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities` DISABLE KEYS */;
/*!40000 ALTER TABLE `cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sortname` varchar(3) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phonecode` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0 COMMENT 'Active=0,Inactive=1',
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES (1,'AF','Afghanistan',93,0,NULL),(2,'AL','Albania',355,0,NULL),(3,'DZ','Algeria',213,0,NULL),(4,'AS','American Samoa',1684,0,NULL),(5,'AD','Andorra',376,0,NULL),(6,'AO','Angola',244,0,NULL),(7,'AI','Anguilla',1264,0,NULL),(8,'AQ','Antarctica',0,0,NULL),(9,'AG','Antigua And Barbuda',1268,0,NULL),(10,'AR','Argentina',54,0,NULL),(11,'AM','Armenia',374,0,NULL),(12,'AW','Aruba',297,0,NULL),(13,'AU','Australia',61,0,NULL),(14,'AT','Austria',43,0,NULL),(15,'AZ','Azerbaijan',994,0,NULL),(16,'BS','Bahamas The',1242,0,NULL),(17,'BH','Bahrain',973,0,NULL),(18,'BD','Bangladesh',880,0,NULL),(19,'BB','Barbados',1246,0,NULL),(20,'BY','Belarus',375,0,NULL),(21,'BE','Belgium',32,0,NULL),(22,'BZ','Belize',501,0,NULL),(23,'BJ','Benin',229,0,NULL),(24,'BM','Bermuda',1441,0,NULL),(25,'BT','Bhutan',975,0,NULL),(26,'BO','Bolivia',591,0,NULL),(27,'BA','Bosnia and Herzegovina',387,0,NULL),(28,'BW','Botswana',267,0,NULL),(29,'BV','Bouvet Island',0,0,NULL),(30,'BR','Brazil',55,0,NULL),(31,'IO','British Indian Ocean Territory',246,0,NULL),(32,'BN','Brunei',673,0,NULL),(33,'BG','Bulgaria',359,0,NULL),(34,'BF','Burkina Faso',226,0,NULL),(35,'BI','Burundi',257,0,NULL),(36,'KH','Cambodia',855,0,NULL),(37,'CM','Cameroon',237,0,NULL),(38,'CA','Canada',1,0,NULL),(39,'CV','Cape Verde',238,0,NULL),(40,'KY','Cayman Islands',1345,0,NULL),(41,'CF','Central African Republic',236,0,NULL),(42,'TD','Chad',235,0,NULL),(43,'CL','Chile',56,0,NULL),(44,'CN','China',86,0,NULL),(45,'CX','Christmas Island',61,0,NULL),(46,'CC','Cocos (Keeling) Islands',672,0,NULL),(47,'CO','Colombia',57,0,NULL),(48,'KM','Comoros',269,0,NULL),(49,'CG','Republic Of The Congo',242,0,NULL),(50,'CD','Democratic Republic Of The Congo',242,0,NULL),(51,'CK','Cook Islands',682,0,NULL),(52,'CR','Costa Rica',506,0,NULL),(53,'CI','Cote D\'Ivoire (Ivory Coast)',225,0,NULL),(54,'HR','Croatia (Hrvatska)',385,0,NULL),(55,'CU','Cuba',53,0,NULL),(56,'CY','Cyprus',357,0,NULL),(57,'CZ','Czech Republic',420,0,NULL),(58,'DK','Denmark',45,0,NULL),(59,'DJ','Djibouti',253,0,NULL),(60,'DM','Dominica',1767,0,NULL),(61,'DO','Dominican Republic',1809,0,NULL),(62,'TP','East Timor',670,0,NULL),(63,'EC','Ecuador',593,0,NULL),(64,'EG','Egypt',20,0,NULL),(65,'SV','El Salvador',503,0,NULL),(66,'GQ','Equatorial Guinea',240,0,NULL),(67,'ER','Eritrea',291,0,NULL),(68,'EE','Estonia',372,0,NULL),(69,'ET','Ethiopia',251,0,NULL),(70,'XA','External Territories of Australia',61,0,NULL),(71,'FK','Falkland Islands',500,0,NULL),(72,'FO','Faroe Islands',298,0,NULL),(73,'FJ','Fiji Islands',679,0,NULL),(74,'FI','Finland',358,0,NULL),(75,'FR','France',33,0,NULL),(76,'GF','French Guiana',594,0,NULL),(77,'PF','French Polynesia',689,0,NULL),(78,'TF','French Southern Territories',0,0,NULL),(79,'GA','Gabon',241,0,NULL),(80,'GM','Gambia The',220,0,NULL),(81,'GE','Georgia',995,0,NULL),(82,'DE','Germany',49,0,NULL),(83,'GH','Ghana',233,0,NULL),(84,'GI','Gibraltar',350,0,NULL),(85,'GR','Greece',30,0,NULL),(86,'GL','Greenland',299,0,NULL),(87,'GD','Grenada',1473,0,NULL),(88,'GP','Guadeloupe',590,0,NULL),(89,'GU','Guam',1671,0,NULL),(90,'GT','Guatemala',502,0,NULL),(91,'XU','Guernsey and Alderney',44,0,NULL),(92,'GN','Guinea',224,0,NULL),(93,'GW','Guinea-Bissau',245,0,NULL),(94,'GY','Guyana',592,0,NULL),(95,'HT','Haiti',509,0,NULL),(96,'HM','Heard and McDonald Islands',0,0,NULL),(97,'HN','Honduras',504,0,NULL),(98,'HK','Hong Kong S.A.R.',852,0,NULL),(99,'HU','Hungary',36,0,NULL),(100,'IS','Iceland',354,0,NULL),(101,'IN','India',91,0,NULL),(102,'ID','Indonesia',62,0,NULL),(103,'IR','Iran',98,0,NULL),(104,'IQ','Iraq',964,0,NULL),(105,'IE','Ireland',353,0,NULL),(106,'IL','Israel',972,0,NULL),(107,'IT','Italy',39,0,NULL),(108,'JM','Jamaica',1876,0,NULL),(109,'JP','Japan',81,0,NULL),(110,'XJ','Jersey',44,0,NULL),(111,'JO','Jordan',962,0,NULL),(112,'KZ','Kazakhstan',7,0,NULL),(113,'KE','Kenya',254,0,NULL),(114,'KI','Kiribati',686,0,NULL),(115,'KP','Korea North',850,0,NULL),(116,'KR','Korea South',82,0,NULL),(117,'KW','Kuwait',965,0,NULL),(118,'KG','Kyrgyzstan',996,0,NULL),(119,'LA','Laos',856,0,NULL),(120,'LV','Latvia',371,0,NULL),(121,'LB','Lebanon',961,0,NULL),(122,'LS','Lesotho',266,0,NULL),(123,'LR','Liberia',231,0,NULL),(124,'LY','Libya',218,0,NULL),(125,'LI','Liechtenstein',423,0,NULL),(126,'LT','Lithuania',370,0,NULL),(127,'LU','Luxembourg',352,0,NULL),(128,'MO','Macau S.A.R.',853,0,NULL),(129,'MK','Macedonia',389,0,NULL),(130,'MG','Madagascar',261,0,NULL),(131,'MW','Malawi',265,0,NULL),(132,'MY','Malaysia',60,0,NULL),(133,'MV','Maldives',960,0,NULL),(134,'ML','Mali',223,0,NULL),(135,'MT','Malta',356,0,NULL),(136,'XM','Man (Isle of)',44,0,NULL),(137,'MH','Marshall Islands',692,0,NULL),(138,'MQ','Martinique',596,0,NULL),(139,'MR','Mauritania',222,0,NULL),(140,'MU','Mauritius',230,0,NULL),(141,'YT','Mayotte',269,0,NULL),(142,'MX','Mexico',52,0,NULL),(143,'FM','Micronesia',691,0,NULL),(144,'MD','Moldova',373,0,NULL),(145,'MC','Monaco',377,0,NULL),(146,'MN','Mongolia',976,0,NULL),(147,'MS','Montserrat',1664,0,NULL),(148,'MA','Morocco',212,0,NULL),(149,'MZ','Mozambique',258,0,NULL),(150,'MM','Myanmar',95,0,NULL),(151,'NA','Namibia',264,0,NULL),(152,'NR','Nauru',674,0,NULL),(153,'NP','Nepal',977,0,NULL),(154,'AN','Netherlands Antilles',599,0,NULL),(155,'NL','Netherlands The',31,0,NULL),(156,'NC','New Caledonia',687,0,NULL),(157,'NZ','New Zealand',64,0,NULL),(158,'NI','Nicaragua',505,0,NULL),(159,'NE','Niger',227,0,NULL),(160,'NG','Nigeria',234,0,NULL),(161,'NU','Niue',683,0,NULL),(162,'NF','Norfolk Island',672,0,NULL),(163,'MP','Northern Mariana Islands',1670,0,NULL),(164,'NO','Norway',47,0,NULL),(165,'OM','Oman',968,0,NULL),(166,'PK','Pakistan',92,0,NULL),(167,'PW','Palau',680,0,NULL),(168,'PS','Palestinian Territory Occupied',970,0,NULL),(169,'PA','Panama',507,0,NULL),(170,'PG','Papua new Guinea',675,0,NULL),(171,'PY','Paraguay',595,0,NULL),(172,'PE','Peru',51,0,NULL),(173,'PH','Philippines',63,0,NULL),(174,'PN','Pitcairn Island',0,0,NULL),(175,'PL','Poland',48,0,NULL),(176,'PT','Portugal',351,0,NULL),(177,'PR','Puerto Rico',1787,0,NULL),(178,'QA','Qatar',974,0,NULL),(179,'RE','Reunion',262,0,NULL),(180,'RO','Romania',40,0,NULL),(181,'RU','Russia',70,0,NULL),(182,'RW','Rwanda',250,0,NULL),(183,'SH','Saint Helena',290,0,NULL),(184,'KN','Saint Kitts And Nevis',1869,0,NULL),(185,'LC','Saint Lucia',1758,0,NULL),(186,'PM','Saint Pierre and Miquelon',508,0,NULL),(187,'VC','Saint Vincent And The Grenadines',1784,0,NULL),(188,'WS','Samoa',684,0,NULL),(189,'SM','San Marino',378,0,NULL),(190,'ST','Sao Tome and Principe',239,0,NULL),(191,'SA','Saudi Arabia',966,0,NULL),(192,'SN','Senegal',221,0,NULL),(193,'RS','Serbia',381,0,NULL),(194,'SC','Seychelles',248,0,NULL),(195,'SL','Sierra Leone',232,0,NULL),(196,'SG','Singapore',65,0,NULL),(197,'SK','Slovakia',421,0,NULL),(198,'SI','Slovenia',386,0,NULL),(199,'XG','Smaller Territories of the UK',44,0,NULL),(200,'SB','Solomon Islands',677,0,NULL),(201,'SO','Somalia',252,0,NULL),(202,'ZA','South Africa',27,0,NULL),(203,'GS','South Georgia',0,0,NULL),(204,'SS','South Sudan',211,0,NULL),(205,'ES','Spain',34,0,NULL),(206,'LK','Sri Lanka',94,0,NULL),(207,'SD','Sudan',249,0,NULL),(208,'SR','Suriname',597,0,NULL),(209,'SJ','Svalbard And Jan Mayen Islands',47,0,NULL),(210,'SZ','Swaziland',268,0,NULL),(211,'SE','Sweden',46,0,NULL),(212,'CH','Switzerland',41,0,NULL),(213,'SY','Syria',963,0,NULL),(214,'TW','Taiwan',886,0,NULL),(215,'TJ','Tajikistan',992,0,NULL),(216,'TZ','Tanzania',255,0,NULL),(217,'TH','Thailand',66,0,NULL),(218,'TG','Togo',228,0,NULL),(219,'TK','Tokelau',690,0,NULL),(220,'TO','Tonga',676,0,NULL),(221,'TT','Trinidad And Tobago',1868,0,NULL),(222,'TN','Tunisia',216,0,NULL),(223,'TR','Turkey',90,0,NULL),(224,'TM','Turkmenistan',7370,0,NULL),(225,'TC','Turks And Caicos Islands',1649,0,NULL),(226,'TV','Tuvalu',688,0,NULL),(227,'UG','Uganda',256,0,NULL),(228,'UA','Ukraine',380,0,NULL),(229,'AE','United Arab Emirates',971,0,NULL),(230,'GB','United Kingdom',44,0,NULL),(231,'US','United States',1,0,NULL),(232,'UM','United States Minor Outlying Islands',1,0,NULL),(233,'UY','Uruguay',598,0,NULL),(234,'UZ','Uzbekistan',998,0,NULL),(235,'VU','Vanuatu',678,0,NULL),(236,'VA','Vatican City State (Holy See)',39,0,NULL),(237,'VE','Venezuela',58,0,NULL),(238,'VN','Vietnam',84,0,NULL),(239,'VG','Virgin Islands (British)',1284,0,NULL),(240,'VI','Virgin Islands (US)',1340,0,NULL),(241,'WF','Wallis And Futuna Islands',681,0,NULL),(242,'EH','Western Sahara',212,0,NULL),(243,'YE','Yemen',967,0,NULL),(244,'YU','Yugoslavia',38,0,NULL),(245,'ZM','Zambia',260,0,NULL),(246,'ZW','Zimbabwe',263,0,NULL);
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gifts`
--

DROP TABLE IF EXISTS `gifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gifts` (
  `gift_id` int(11) NOT NULL AUTO_INCREMENT,
  `gift_filetype` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gift_category` int(11) NOT NULL DEFAULT 0,
  `gift_status` int(11) NOT NULL DEFAULT 1,
  `gift_cost` int(11) NOT NULL DEFAULT 0,
  `gift_lang` int(11) NOT NULL DEFAULT 0,
  `gift_date` int(11) NOT NULL DEFAULT 0,
  `gift_hits` int(55) NOT NULL DEFAULT 0,
  PRIMARY KEY (`gift_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gifts`
--

LOCK TABLES `gifts` WRITE;
/*!40000 ALTER TABLE `gifts` DISABLE KEYS */;
/*!40000 ALTER TABLE `gifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gifts_category`
--

DROP TABLE IF EXISTS `gifts_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gifts_category` (
  `gifts_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `gifts_category_lang` int(11) NOT NULL,
  `gifts_category_icon` int(11) NOT NULL,
  PRIMARY KEY (`gifts_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gifts_category`
--

LOCK TABLES `gifts_category` WRITE;
/*!40000 ALTER TABLE `gifts_category` DISABLE KEYS */;
/*!40000 ALTER TABLE `gifts_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invites`
--

DROP TABLE IF EXISTS `invites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invites` (
  `invite_id` int(9) NOT NULL AUTO_INCREMENT,
  `invite_user_id` int(9) NOT NULL DEFAULT 0,
  `invite_date` int(14) NOT NULL DEFAULT 0,
  `invite_email` varchar(70) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `invite_code` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`invite_id`),
  UNIQUE KEY `invite_set` (`invite_user_id`,`invite_email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invites`
--

LOCK TABLES `invites` WRITE;
/*!40000 ALTER TABLE `invites` DISABLE KEYS */;
/*!40000 ALTER TABLE `invites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invites_stats_user`
--

DROP TABLE IF EXISTS `invites_stats_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invites_stats_user` (
  `user_id` int(9) NOT NULL DEFAULT 0,
  `invites_sent` int(11) NOT NULL DEFAULT 0,
  `invites_converted` int(11) NOT NULL DEFAULT 0,
  `invites_sent_counter` int(11) NOT NULL DEFAULT 0,
  `invites_sent_last` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invites_stats_user`
--

LOCK TABLES `invites_stats_user` WRITE;
/*!40000 ALTER TABLE `invites_stats_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `invites_stats_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plugins_ldrsoft`
--

DROP TABLE IF EXISTS `plugins_ldrsoft`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plugins_ldrsoft` (
  `p_id` int(9) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `p_version` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `p_type` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `p_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `p_icon` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `p_order` int(3) NOT NULL DEFAULT 0,
  `p_active` tinyint(1) NOT NULL DEFAULT 1,
  `p_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_type` (`p_type`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plugins_ldrsoft`
--

LOCK TABLES `plugins_ldrsoft` WRITE;
/*!40000 ALTER TABLE `plugins_ldrsoft` DISABLE KEYS */;
INSERT INTO `plugins_ldrsoft` VALUES (1,'Question Plugin','1.5.2','Question','This plugin gives to your users the ability post questions in your social network.','question',10,1,''),(2,'Plugin Combo','1.2.3','Combo','This plugin gives to your users the ability of create more expresion in a post.','combo',1,1,''),(3,'Plugin Pokes','1.1.4','Pokes','This plugin gives to your users the ability send a poke a friends o other users of your network.','poke',10,1,''),(4,'Share Post Plugin','1.3','Share','This plugin gives to your users the ability share a post, getting information of post.','share',1,1,''),(5,'Plugin Colorbox','1.2','Colorbox','This plugin gives to your users the ability of add color in your post.','colorbox',1,1,''),(6,'Activities Points Advanced','1.0.4','Points','Points allows your users to benefit from activity on your site, earn points on specific actions.','points',10,1,''),(7,'Ads Advanced','1.8.2','Ads','This plugin gives to your users the ability uploads ads in your social network.','ads',10,1,'');
/*!40000 ALTER TABLE `plugins_ldrsoft` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plugins_system`
--

DROP TABLE IF EXISTS `plugins_system`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plugins_system` (
  `system_id` int(9) NOT NULL AUTO_INCREMENT,
  `system_version` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `question_limit_answers` int(11) NOT NULL DEFAULT 20,
  `question_enable_add_answers` int(11) NOT NULL DEFAULT 1,
  `question_enable_multi_votes` int(11) NOT NULL DEFAULT 1,
  `question_enable_invite_to_friends` int(11) NOT NULL DEFAULT 1,
  `question_enable_email_invite_to_friends` int(11) NOT NULL DEFAULT 1,
  `question_enable_show_in_profile` int(11) NOT NULL DEFAULT 1,
  `bonus_enable_plublisher_new` int(11) NOT NULL DEFAULT 1,
  `bonus_enable_home_left_column` int(11) NOT NULL DEFAULT 1,
  `combo_enable_reaction` int(11) NOT NULL DEFAULT 1,
  `combo_enable_tag_action` int(11) NOT NULL DEFAULT 1,
  `combo_enable_welcome` int(11) NOT NULL DEFAULT 1,
  `combo_enable_dragdrop` int(11) NOT NULL DEFAULT 1,
  `share_post_advanced` int(2) NOT NULL DEFAULT 1,
  `level_allow` tinyint(1) NOT NULL DEFAULT 1,
  `level_allow_transfer` tinyint(1) NOT NULL DEFAULT 1,
  `level_max_transfer` int(11) NOT NULL DEFAULT 0,
  `setting_userpoints_charge_postclassified` tinyint(1) NOT NULL DEFAULT 0,
  `setting_userpoints_charge_newevent` tinyint(1) NOT NULL DEFAULT 0,
  `setting_userpoints_charge_newgroup` tinyint(1) NOT NULL DEFAULT 0,
  `setting_userpoints_charge_newpoll` tinyint(1) NOT NULL DEFAULT 0,
  `setting_userpoints_enable_offers` tinyint(1) NOT NULL DEFAULT 1,
  `setting_userpoints_enable_shop` tinyint(1) NOT NULL DEFAULT 1,
  `setting_userpoints_enable_topusers` tinyint(1) NOT NULL DEFAULT 1,
  `setting_userpoints_enable_statistics` tinyint(1) NOT NULL DEFAULT 1,
  `setting_userpoints_enable_pointrank` tinyint(1) NOT NULL DEFAULT 1,
  `setting_userpoints_exchange_rate` int(11) NOT NULL DEFAULT 1000,
  `userpoints_enable` int(11) NOT NULL DEFAULT 1,
  `max_photo_size` int(11) NOT NULL DEFAULT 5120,
  `ads_enable_sandbox` int(11) NOT NULL DEFAULT 1,
  `ads_no_external_images` int(11) NOT NULL DEFAULT 5,
  `ads_no_right_column` int(11) NOT NULL DEFAULT 3,
  `enable_ads_on_post` int(11) NOT NULL DEFAULT 1,
  `enable_website_ads_on_post` int(11) NOT NULL DEFAULT 1,
  `ads_enable_secure` int(11) NOT NULL DEFAULT 0,
  `ads_enable_paypal` int(11) NOT NULL DEFAULT 1,
  `corporate_paypal_email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `paypal_email_notification` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ads_enable_stripe` int(11) NOT NULL DEFAULT 1,
  `stripe_secret_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `stripe_publishable_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ads_enable_voguepay` int(11) NOT NULL DEFAULT 1,
  `voguePayMerchantId` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pagelet_ego` int(11) NOT NULL DEFAULT 1,
  `enable_ads_left_column` int(11) NOT NULL DEFAULT 1,
  `ads_no_left_column` int(11) NOT NULL DEFAULT 1,
  `enable_ads_admin` int(11) NOT NULL DEFAULT 1,
  `enable_ad_rigth_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'timeline,page,group,event',
  PRIMARY KEY (`system_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plugins_system`
--

LOCK TABLES `plugins_system` WRITE;
/*!40000 ALTER TABLE `plugins_system` DISABLE KEYS */;
INSERT INTO `plugins_system` VALUES (1,'1.0',20,1,1,1,1,1,1,1,1,1,1,1,1,1,1,0,0,0,0,0,1,1,1,1,1,1000,1,5120,1,5,3,1,1,0,1,'','',1,'','',1,'',1,1,1,1,'timeline,page,group,event');
/*!40000 ALTER TABLE `plugins_system` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokes`
--

DROP TABLE IF EXISTS `pokes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokes` (
  `user_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `poke_stamp` int(11) NOT NULL,
  UNIQUE KEY `user_id` (`user_id`,`owner_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokes`
--

LOCK TABLES `pokes` WRITE;
/*!40000 ALTER TABLE `pokes` DISABLE KEYS */;
INSERT INTO `pokes` VALUES (1,16,1549964455),(1,14,1549964797);
/*!40000 ALTER TABLE `pokes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_questions`
--

DROP TABLE IF EXISTS `posts_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_questions` (
  `question_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  `question_question` varchar(255) NOT NULL,
  `question_votes` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_questions`
--

LOCK TABLES `posts_questions` WRITE;
/*!40000 ALTER TABLE `posts_questions` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_questions_options`
--

DROP TABLE IF EXISTS `posts_questions_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_questions_options` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `votes` int(10) unsigned NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_questions_options`
--

LOCK TABLES `posts_questions_options` WRITE;
/*!40000 ALTER TABLE `posts_questions_options` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_questions_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_tags`
--

DROP TABLE IF EXISTS `posts_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_tags` (
  `user_id` int(11) NOT NULL DEFAULT 0,
  `post_id` int(11) NOT NULL DEFAULT 0,
  UNIQUE KEY `user_id_post_id` (`user_id`,`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_tags`
--

LOCK TABLES `posts_tags` WRITE;
/*!40000 ALTER TABLE `posts_tags` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions_options_votes`
--

DROP TABLE IF EXISTS `questions_options_votes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions_options_votes` (
  `user_id` int(10) unsigned NOT NULL,
  `question_id` int(10) unsigned NOT NULL,
  `option_id` int(10) unsigned NOT NULL,
  UNIQUE KEY `user_id_question_id` (`user_id`,`question_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions_options_votes`
--

LOCK TABLES `questions_options_votes` WRITE;
/*!40000 ALTER TABLE `questions_options_votes` DISABLE KEYS */;
/*!40000 ALTER TABLE `questions_options_votes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reactions`
--

DROP TABLE IF EXISTS `reactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reactions` (
  `reaction_id` int(11) NOT NULL AUTO_INCREMENT,
  `reaction_key` varchar(55) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reaction_filetype` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reaction_colour` varchar(12) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `reaction_lang` int(11) NOT NULL DEFAULT 0,
  `reaction_status` int(11) NOT NULL DEFAULT 1,
  `reaction_order` int(11) NOT NULL DEFAULT 0,
  `reaction_date` int(11) NOT NULL DEFAULT 0,
  `reaction_hits` int(55) NOT NULL DEFAULT 0,
  PRIMARY KEY (`reaction_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reactions`
--

LOCK TABLES `reactions` WRITE;
/*!40000 ALTER TABLE `reactions` DISABLE KEYS */;
INSERT INTO `reactions` VALUES (1,'like','png','opt-active',1189,1,1,1485545712,0),(2,'love','png','red-opt',1190,1,2,1485546419,0),(3,'haha','png','yellow-opt',1191,1,3,1485546936,0),(4,'wow','png','yellow-opt',1192,1,4,1485547922,0),(5,'sad','png','yellow-opt',1193,1,5,1485548523,0),(6,'angry','png','orange-opt',1194,1,6,1485549175,0),(7,'dislike','png','opt-active',1195,1,7,1485554614,0);
/*!40000 ALTER TABLE `reactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `country_id` int(11) NOT NULL DEFAULT 1,
  `status` int(2) NOT NULL DEFAULT 0 COMMENT 'Active=0,Inactive=1',
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4121 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Andaman and Nicobar Islands',101,0,NULL),(2,'Andhra Pradesh',101,0,NULL),(3,'Arunachal Pradesh',101,0,NULL),(4,'Assam',101,0,NULL),(5,'Bihar',101,0,NULL),(6,'Chandigarh',101,0,NULL),(7,'Chhattisgarh',101,0,NULL),(8,'Dadra and Nagar Haveli',101,0,NULL),(9,'Daman and Diu',101,0,NULL),(10,'Delhi',101,0,NULL),(11,'Goa',101,0,NULL),(12,'Gujarat',101,0,NULL),(13,'Haryana',101,0,NULL),(14,'Himachal Pradesh',101,0,NULL),(15,'Jammu and Kashmir',101,0,NULL),(16,'Jharkhand',101,0,NULL),(17,'Karnataka',101,0,NULL),(18,'Kenmore',101,0,NULL),(19,'Kerala',101,0,NULL),(20,'Lakshadweep',101,0,NULL),(21,'Madhya Pradesh',101,0,NULL),(22,'Maharashtra',101,0,NULL),(23,'Manipur',101,0,NULL),(24,'Meghalaya',101,0,NULL),(25,'Mizoram',101,0,NULL),(26,'Nagaland',101,0,NULL),(27,'Narora',101,0,NULL),(28,'Natwar',101,0,NULL),(29,'Odisha',101,0,NULL),(30,'Paschim Medinipur',101,0,NULL),(31,'Pondicherry',101,0,NULL),(32,'Punjab',101,0,NULL),(33,'Rajasthan',101,0,NULL),(34,'Sikkim',101,0,NULL),(35,'Tamil Nadu',101,0,NULL),(36,'Telangana',101,0,NULL),(37,'Tripura',101,0,NULL),(38,'Uttar Pradesh',101,0,NULL),(39,'Uttarakhand',101,0,NULL),(40,'Vaishali',101,0,NULL),(41,'West Bengal',101,0,NULL),(42,'Badakhshan',1,0,NULL),(43,'Badgis',1,0,NULL),(44,'Baglan',1,0,NULL),(45,'Balkh',1,0,NULL),(46,'Bamiyan',1,0,NULL),(47,'Farah',1,0,NULL),(48,'Faryab',1,0,NULL),(49,'Gawr',1,0,NULL),(50,'Gazni',1,0,NULL),(51,'Herat',1,0,NULL),(52,'Hilmand',1,0,NULL),(53,'Jawzjan',1,0,NULL),(54,'Kabul',1,0,NULL),(55,'Kapisa',1,0,NULL),(56,'Khawst',1,0,NULL),(57,'Kunar',1,0,NULL),(58,'Lagman',1,0,NULL),(59,'Lawghar',1,0,NULL),(60,'Nangarhar',1,0,NULL),(61,'Nimruz',1,0,NULL),(62,'Nuristan',1,0,NULL),(63,'Paktika',1,0,NULL),(64,'Paktiya',1,0,NULL),(65,'Parwan',1,0,NULL),(66,'Qandahar',1,0,NULL),(67,'Qunduz',1,0,NULL),(68,'Samangan',1,0,NULL),(69,'Sar-e Pul',1,0,NULL),(70,'Takhar',1,0,NULL),(71,'Uruzgan',1,0,NULL),(72,'Wardag',1,0,NULL),(73,'Zabul',1,0,NULL),(74,'Berat',2,0,NULL),(75,'Bulqize',2,0,NULL),(76,'Delvine',2,0,NULL),(77,'Devoll',2,0,NULL),(78,'Dibre',2,0,NULL),(79,'Durres',2,0,NULL),(80,'Elbasan',2,0,NULL),(81,'Fier',2,0,NULL),(82,'Gjirokaster',2,0,NULL),(83,'Gramsh',2,0,NULL),(84,'Has',2,0,NULL),(85,'Kavaje',2,0,NULL),(86,'Kolonje',2,0,NULL),(87,'Korce',2,0,NULL),(88,'Kruje',2,0,NULL),(89,'Kucove',2,0,NULL),(90,'Kukes',2,0,NULL),(91,'Kurbin',2,0,NULL),(92,'Lezhe',2,0,NULL),(93,'Librazhd',2,0,NULL),(94,'Lushnje',2,0,NULL),(95,'Mallakaster',2,0,NULL),(96,'Malsi e Madhe',2,0,NULL),(97,'Mat',2,0,NULL),(98,'Mirdite',2,0,NULL),(99,'Peqin',2,0,NULL),(100,'Permet',2,0,NULL),(101,'Pogradec',2,0,NULL),(102,'Puke',2,0,NULL),(103,'Sarande',2,0,NULL),(104,'Shkoder',2,0,NULL),(105,'Skrapar',2,0,NULL),(106,'Tepelene',2,0,NULL),(107,'Tirane',2,0,NULL),(108,'Tropoje',2,0,NULL),(109,'Vlore',2,0,NULL),(110,'\'Ayn Daflah',3,0,NULL),(111,'\'Ayn Tamushanat',3,0,NULL),(112,'Adrar',3,0,NULL),(113,'Algiers',3,0,NULL),(114,'Annabah',3,0,NULL),(115,'Bashshar',3,0,NULL),(116,'Batnah',3,0,NULL),(117,'Bijayah',3,0,NULL),(118,'Biskrah',3,0,NULL),(119,'Blidah',3,0,NULL),(120,'Buirah',3,0,NULL),(121,'Bumardas',3,0,NULL),(122,'Burj Bu Arririj',3,0,NULL),(123,'Ghalizan',3,0,NULL),(124,'Ghardayah',3,0,NULL),(125,'Ilizi',3,0,NULL),(126,'Jijili',3,0,NULL),(127,'Jilfah',3,0,NULL),(128,'Khanshalah',3,0,NULL),(129,'Masilah',3,0,NULL),(130,'Midyah',3,0,NULL),(131,'Milah',3,0,NULL),(132,'Muaskar',3,0,NULL),(133,'Mustaghanam',3,0,NULL),(134,'Naama',3,0,NULL),(135,'Oran',3,0,NULL),(136,'Ouargla',3,0,NULL),(137,'Qalmah',3,0,NULL),(138,'Qustantinah',3,0,NULL),(139,'Sakikdah',3,0,NULL),(140,'Satif',3,0,NULL),(141,'Sayda\'',3,0,NULL),(142,'Sidi ban-al-\'Abbas',3,0,NULL),(143,'Suq Ahras',3,0,NULL),(144,'Tamanghasat',3,0,NULL),(145,'Tibazah',3,0,NULL),(146,'Tibissah',3,0,NULL),(147,'Tilimsan',3,0,NULL),(148,'Tinduf',3,0,NULL),(149,'Tisamsilt',3,0,NULL),(150,'Tiyarat',3,0,NULL),(151,'Tizi Wazu',3,0,NULL),(152,'Umm-al-Bawaghi',3,0,NULL),(153,'Wahran',3,0,NULL),(154,'Warqla',3,0,NULL),(155,'Wilaya d Alger',3,0,NULL),(156,'Wilaya de Bejaia',3,0,NULL),(157,'Wilaya de Constantine',3,0,NULL),(158,'al-Aghwat',3,0,NULL),(159,'al-Bayadh',3,0,NULL),(160,'al-Jaza\'ir',3,0,NULL),(161,'al-Wad',3,0,NULL),(162,'ash-Shalif',3,0,NULL),(163,'at-Tarif',3,0,NULL),(164,'Eastern',4,0,NULL),(165,'Manu\'a',4,0,NULL),(166,'Swains Island',4,0,NULL),(167,'Western',4,0,NULL),(168,'Andorra la Vella',5,0,NULL),(169,'Canillo',5,0,NULL),(170,'Encamp',5,0,NULL),(171,'La Massana',5,0,NULL),(172,'Les Escaldes',5,0,NULL),(173,'Ordino',5,0,NULL),(174,'Sant Julia de Loria',5,0,NULL),(175,'Bengo',6,0,NULL),(176,'Benguela',6,0,NULL),(177,'Bie',6,0,NULL),(178,'Cabinda',6,0,NULL),(179,'Cunene',6,0,NULL),(180,'Huambo',6,0,NULL),(181,'Huila',6,0,NULL),(182,'Kuando-Kubango',6,0,NULL),(183,'Kwanza Norte',6,0,NULL),(184,'Kwanza Sul',6,0,NULL),(185,'Luanda',6,0,NULL),(186,'Lunda Norte',6,0,NULL),(187,'Lunda Sul',6,0,NULL),(188,'Malanje',6,0,NULL),(189,'Moxico',6,0,NULL),(190,'Namibe',6,0,NULL),(191,'Uige',6,0,NULL),(192,'Zaire',6,0,NULL),(193,'Other Provinces',7,0,NULL),(194,'Sector claimed by Argentina/Ch',8,0,NULL),(195,'Sector claimed by Argentina/UK',8,0,NULL),(196,'Sector claimed by Australia',8,0,NULL),(197,'Sector claimed by France',8,0,NULL),(198,'Sector claimed by New Zealand',8,0,NULL),(199,'Sector claimed by Norway',8,0,NULL),(200,'Unclaimed Sector',8,0,NULL),(201,'Barbuda',9,0,NULL),(202,'Saint George',9,0,NULL),(203,'Saint John',9,0,NULL),(204,'Saint Mary',9,0,NULL),(205,'Saint Paul',9,0,NULL),(206,'Saint Peter',9,0,NULL),(207,'Saint Philip',9,0,NULL),(208,'Buenos Aires',10,0,NULL),(209,'Catamarca',10,0,NULL),(210,'Chaco',10,0,NULL),(211,'Chubut',10,0,NULL),(212,'Cordoba',10,0,NULL),(213,'Corrientes',10,0,NULL),(214,'Distrito Federal',10,0,NULL),(215,'Entre Rios',10,0,NULL),(216,'Formosa',10,0,NULL),(217,'Jujuy',10,0,NULL),(218,'La Pampa',10,0,NULL),(219,'La Rioja',10,0,NULL),(220,'Mendoza',10,0,NULL),(221,'Misiones',10,0,NULL),(222,'Neuquen',10,0,NULL),(223,'Rio Negro',10,0,NULL),(224,'Salta',10,0,NULL),(225,'San Juan',10,0,NULL),(226,'San Luis',10,0,NULL),(227,'Santa Cruz',10,0,NULL),(228,'Santa Fe',10,0,NULL),(229,'Santiago del Estero',10,0,NULL),(230,'Tierra del Fuego',10,0,NULL),(231,'Tucuman',10,0,NULL),(232,'Aragatsotn',11,0,NULL),(233,'Ararat',11,0,NULL),(234,'Armavir',11,0,NULL),(235,'Gegharkunik',11,0,NULL),(236,'Kotaik',11,0,NULL),(237,'Lori',11,0,NULL),(238,'Shirak',11,0,NULL),(239,'Stepanakert',11,0,NULL),(240,'Syunik',11,0,NULL),(241,'Tavush',11,0,NULL),(242,'Vayots Dzor',11,0,NULL),(243,'Yerevan',11,0,NULL),(244,'Aruba',12,0,NULL),(245,'Auckland',13,0,NULL),(246,'Australian Capital Territory',13,0,NULL),(247,'Balgowlah',13,0,NULL),(248,'Balmain',13,0,NULL),(249,'Bankstown',13,0,NULL),(250,'Baulkham Hills',13,0,NULL),(251,'Bonnet Bay',13,0,NULL),(252,'Camberwell',13,0,NULL),(253,'Carole Park',13,0,NULL),(254,'Castle Hill',13,0,NULL),(255,'Caulfield',13,0,NULL),(256,'Chatswood',13,0,NULL),(257,'Cheltenham',13,0,NULL),(258,'Cherrybrook',13,0,NULL),(259,'Clayton',13,0,NULL),(260,'Collingwood',13,0,NULL),(261,'Frenchs Forest',13,0,NULL),(262,'Hawthorn',13,0,NULL),(263,'Jannnali',13,0,NULL),(264,'Knoxfield',13,0,NULL),(265,'Melbourne',13,0,NULL),(266,'New South Wales',13,0,NULL),(267,'Northern Territory',13,0,NULL),(268,'Perth',13,0,NULL),(269,'Queensland',13,0,NULL),(270,'South Australia',13,0,NULL),(271,'Tasmania',13,0,NULL),(272,'Templestowe',13,0,NULL),(273,'Victoria',13,0,NULL),(274,'Werribee south',13,0,NULL),(275,'Western Australia',13,0,NULL),(276,'Wheeler',13,0,NULL),(277,'Bundesland Salzburg',14,0,NULL),(278,'Bundesland Steiermark',14,0,NULL),(279,'Bundesland Tirol',14,0,NULL),(280,'Burgenland',14,0,NULL),(281,'Carinthia',14,0,NULL),(282,'Karnten',14,0,NULL),(283,'Liezen',14,0,NULL),(284,'Lower Austria',14,0,NULL),(285,'Niederosterreich',14,0,NULL),(286,'Oberosterreich',14,0,NULL),(287,'Salzburg',14,0,NULL),(288,'Schleswig-Holstein',14,0,NULL),(289,'Steiermark',14,0,NULL),(290,'Styria',14,0,NULL),(291,'Tirol',14,0,NULL),(292,'Upper Austria',14,0,NULL),(293,'Vorarlberg',14,0,NULL),(294,'Wien',14,0,NULL),(295,'Abseron',15,0,NULL),(296,'Baki Sahari',15,0,NULL),(297,'Ganca',15,0,NULL),(298,'Ganja',15,0,NULL),(299,'Kalbacar',15,0,NULL),(300,'Lankaran',15,0,NULL),(301,'Mil-Qarabax',15,0,NULL),(302,'Mugan-Salyan',15,0,NULL),(303,'Nagorni-Qarabax',15,0,NULL),(304,'Naxcivan',15,0,NULL),(305,'Priaraks',15,0,NULL),(306,'Qazax',15,0,NULL),(307,'Saki',15,0,NULL),(308,'Sirvan',15,0,NULL),(309,'Xacmaz',15,0,NULL),(310,'Abaco',16,0,NULL),(311,'Acklins Island',16,0,NULL),(312,'Andros',16,0,NULL),(313,'Berry Islands',16,0,NULL),(314,'Biminis',16,0,NULL),(315,'Cat Island',16,0,NULL),(316,'Crooked Island',16,0,NULL),(317,'Eleuthera',16,0,NULL),(318,'Exuma and Cays',16,0,NULL),(319,'Grand Bahama',16,0,NULL),(320,'Inagua Islands',16,0,NULL),(321,'Long Island',16,0,NULL),(322,'Mayaguana',16,0,NULL),(323,'New Providence',16,0,NULL),(324,'Ragged Island',16,0,NULL),(325,'Rum Cay',16,0,NULL),(326,'San Salvador',16,0,NULL),(327,'\'Isa',17,0,NULL),(328,'Badiyah',17,0,NULL),(329,'Hidd',17,0,NULL),(330,'Jidd Hafs',17,0,NULL),(331,'Mahama',17,0,NULL),(332,'Manama',17,0,NULL),(333,'Sitrah',17,0,NULL),(334,'al-Manamah',17,0,NULL),(335,'al-Muharraq',17,0,NULL),(336,'ar-Rifa\'a',17,0,NULL),(337,'Bagar Hat',18,0,NULL),(338,'Bandarban',18,0,NULL),(339,'Barguna',18,0,NULL),(340,'Barisal',18,0,NULL),(341,'Bhola',18,0,NULL),(342,'Bogora',18,0,NULL),(343,'Brahman Bariya',18,0,NULL),(344,'Chandpur',18,0,NULL),(345,'Chattagam',18,0,NULL),(346,'Chittagong Division',18,0,NULL),(347,'Chuadanga',18,0,NULL),(348,'Dhaka',18,0,NULL),(349,'Dinajpur',18,0,NULL),(350,'Faridpur',18,0,NULL),(351,'Feni',18,0,NULL),(352,'Gaybanda',18,0,NULL),(353,'Gazipur',18,0,NULL),(354,'Gopalganj',18,0,NULL),(355,'Habiganj',18,0,NULL),(356,'Jaipur Hat',18,0,NULL),(357,'Jamalpur',18,0,NULL),(358,'Jessor',18,0,NULL),(359,'Jhalakati',18,0,NULL),(360,'Jhanaydah',18,0,NULL),(361,'Khagrachhari',18,0,NULL),(362,'Khulna',18,0,NULL),(363,'Kishorganj',18,0,NULL),(364,'Koks Bazar',18,0,NULL),(365,'Komilla',18,0,NULL),(366,'Kurigram',18,0,NULL),(367,'Kushtiya',18,0,NULL),(368,'Lakshmipur',18,0,NULL),(369,'Lalmanir Hat',18,0,NULL),(370,'Madaripur',18,0,NULL),(371,'Magura',18,0,NULL),(372,'Maimansingh',18,0,NULL),(373,'Manikganj',18,0,NULL),(374,'Maulvi Bazar',18,0,NULL),(375,'Meherpur',18,0,NULL),(376,'Munshiganj',18,0,NULL),(377,'Naral',18,0,NULL),(378,'Narayanganj',18,0,NULL),(379,'Narsingdi',18,0,NULL),(380,'Nator',18,0,NULL),(381,'Naugaon',18,0,NULL),(382,'Nawabganj',18,0,NULL),(383,'Netrakona',18,0,NULL),(384,'Nilphamari',18,0,NULL),(385,'Noakhali',18,0,NULL),(386,'Pabna',18,0,NULL),(387,'Panchagarh',18,0,NULL),(388,'Patuakhali',18,0,NULL),(389,'Pirojpur',18,0,NULL),(390,'Rajbari',18,0,NULL),(391,'Rajshahi',18,0,NULL),(392,'Rangamati',18,0,NULL),(393,'Rangpur',18,0,NULL),(394,'Satkhira',18,0,NULL),(395,'Shariatpur',18,0,NULL),(396,'Sherpur',18,0,NULL),(397,'Silhat',18,0,NULL),(398,'Sirajganj',18,0,NULL),(399,'Sunamganj',18,0,NULL),(400,'Tangayal',18,0,NULL),(401,'Thakurgaon',18,0,NULL),(402,'Christ Church',19,0,NULL),(403,'Saint Andrew',19,0,NULL),(404,'Saint George',19,0,NULL),(405,'Saint James',19,0,NULL),(406,'Saint John',19,0,NULL),(407,'Saint Joseph',19,0,NULL),(408,'Saint Lucy',19,0,NULL),(409,'Saint Michael',19,0,NULL),(410,'Saint Peter',19,0,NULL),(411,'Saint Philip',19,0,NULL),(412,'Saint Thomas',19,0,NULL),(413,'Brest',20,0,NULL),(414,'Homjel\'',20,0,NULL),(415,'Hrodna',20,0,NULL),(416,'Mahiljow',20,0,NULL),(417,'Mahilyowskaya Voblasts',20,0,NULL),(418,'Minsk',20,0,NULL),(419,'Minskaja Voblasts\'',20,0,NULL),(420,'Petrik',20,0,NULL),(421,'Vicebsk',20,0,NULL),(422,'Antwerpen',21,0,NULL),(423,'Berchem',21,0,NULL),(424,'Brabant',21,0,NULL),(425,'Brabant Wallon',21,0,NULL),(426,'Brussel',21,0,NULL),(427,'East Flanders',21,0,NULL),(428,'Hainaut',21,0,NULL),(429,'Liege',21,0,NULL),(430,'Limburg',21,0,NULL),(431,'Luxembourg',21,0,NULL),(432,'Namur',21,0,NULL),(433,'Ontario',21,0,NULL),(434,'Oost-Vlaanderen',21,0,NULL),(435,'Provincie Brabant',21,0,NULL),(436,'Vlaams-Brabant',21,0,NULL),(437,'Wallonne',21,0,NULL),(438,'West-Vlaanderen',21,0,NULL),(439,'Belize',22,0,NULL),(440,'Cayo',22,0,NULL),(441,'Corozal',22,0,NULL),(442,'Orange Walk',22,0,NULL),(443,'Stann Creek',22,0,NULL),(444,'Toledo',22,0,NULL),(445,'Alibori',23,0,NULL),(446,'Atacora',23,0,NULL),(447,'Atlantique',23,0,NULL),(448,'Borgou',23,0,NULL),(449,'Collines',23,0,NULL),(450,'Couffo',23,0,NULL),(451,'Donga',23,0,NULL),(452,'Littoral',23,0,NULL),(453,'Mono',23,0,NULL),(454,'Oueme',23,0,NULL),(455,'Plateau',23,0,NULL),(456,'Zou',23,0,NULL),(457,'Hamilton',24,0,NULL),(458,'Saint George',24,0,NULL),(459,'Bumthang',25,0,NULL),(460,'Chhukha',25,0,NULL),(461,'Chirang',25,0,NULL),(462,'Daga',25,0,NULL),(463,'Geylegphug',25,0,NULL),(464,'Ha',25,0,NULL),(465,'Lhuntshi',25,0,NULL),(466,'Mongar',25,0,NULL),(467,'Pemagatsel',25,0,NULL),(468,'Punakha',25,0,NULL),(469,'Rinpung',25,0,NULL),(470,'Samchi',25,0,NULL),(471,'Samdrup Jongkhar',25,0,NULL),(472,'Shemgang',25,0,NULL),(473,'Tashigang',25,0,NULL),(474,'Timphu',25,0,NULL),(475,'Tongsa',25,0,NULL),(476,'Wangdiphodrang',25,0,NULL),(477,'Beni',26,0,NULL),(478,'Chuquisaca',26,0,NULL),(479,'Cochabamba',26,0,NULL),(480,'La Paz',26,0,NULL),(481,'Oruro',26,0,NULL),(482,'Pando',26,0,NULL),(483,'Potosi',26,0,NULL),(484,'Santa Cruz',26,0,NULL),(485,'Tarija',26,0,NULL),(486,'Federacija Bosna i Hercegovina',27,0,NULL),(487,'Republika Srpska',27,0,NULL),(488,'Central Bobonong',28,0,NULL),(489,'Central Boteti',28,0,NULL),(490,'Central Mahalapye',28,0,NULL),(491,'Central Serowe-Palapye',28,0,NULL),(492,'Central Tutume',28,0,NULL),(493,'Chobe',28,0,NULL),(494,'Francistown',28,0,NULL),(495,'Gaborone',28,0,NULL),(496,'Ghanzi',28,0,NULL),(497,'Jwaneng',28,0,NULL),(498,'Kgalagadi North',28,0,NULL),(499,'Kgalagadi South',28,0,NULL),(500,'Kgatleng',28,0,NULL),(501,'Kweneng',28,0,NULL),(502,'Lobatse',28,0,NULL),(503,'Ngamiland',28,0,NULL),(504,'Ngwaketse',28,0,NULL),(505,'North East',28,0,NULL),(506,'Okavango',28,0,NULL),(507,'Orapa',28,0,NULL),(508,'Selibe Phikwe',28,0,NULL),(509,'South East',28,0,NULL),(510,'Sowa',28,0,NULL),(511,'Bouvet Island',29,0,NULL),(512,'Acre',30,0,NULL),(513,'Alagoas',30,0,NULL),(514,'Amapa',30,0,NULL),(515,'Amazonas',30,0,NULL),(516,'Bahia',30,0,NULL),(517,'Ceara',30,0,NULL),(518,'Distrito Federal',30,0,NULL),(519,'Espirito Santo',30,0,NULL),(520,'Estado de Sao Paulo',30,0,NULL),(521,'Goias',30,0,NULL),(522,'Maranhao',30,0,NULL),(523,'Mato Grosso',30,0,NULL),(524,'Mato Grosso do Sul',30,0,NULL),(525,'Minas Gerais',30,0,NULL),(526,'Para',30,0,NULL),(527,'Paraiba',30,0,NULL),(528,'Parana',30,0,NULL),(529,'Pernambuco',30,0,NULL),(530,'Piaui',30,0,NULL),(531,'Rio Grande do Norte',30,0,NULL),(532,'Rio Grande do Sul',30,0,NULL),(533,'Rio de Janeiro',30,0,NULL),(534,'Rondonia',30,0,NULL),(535,'Roraima',30,0,NULL),(536,'Santa Catarina',30,0,NULL),(537,'Sao Paulo',30,0,NULL),(538,'Sergipe',30,0,NULL),(539,'Tocantins',30,0,NULL),(540,'British Indian Ocean Territory',31,0,NULL),(541,'Belait',32,0,NULL),(542,'Brunei-Muara',32,0,NULL),(543,'Temburong',32,0,NULL),(544,'Tutong',32,0,NULL),(545,'Blagoevgrad',33,0,NULL),(546,'Burgas',33,0,NULL),(547,'Dobrich',33,0,NULL),(548,'Gabrovo',33,0,NULL),(549,'Haskovo',33,0,NULL),(550,'Jambol',33,0,NULL),(551,'Kardzhali',33,0,NULL),(552,'Kjustendil',33,0,NULL),(553,'Lovech',33,0,NULL),(554,'Montana',33,0,NULL),(555,'Oblast Sofiya-Grad',33,0,NULL),(556,'Pazardzhik',33,0,NULL),(557,'Pernik',33,0,NULL),(558,'Pleven',33,0,NULL),(559,'Plovdiv',33,0,NULL),(560,'Razgrad',33,0,NULL),(561,'Ruse',33,0,NULL),(562,'Shumen',33,0,NULL),(563,'Silistra',33,0,NULL),(564,'Sliven',33,0,NULL),(565,'Smoljan',33,0,NULL),(566,'Sofija grad',33,0,NULL),(567,'Sofijska oblast',33,0,NULL),(568,'Stara Zagora',33,0,NULL),(569,'Targovishte',33,0,NULL),(570,'Varna',33,0,NULL),(571,'Veliko Tarnovo',33,0,NULL),(572,'Vidin',33,0,NULL),(573,'Vraca',33,0,NULL),(574,'Yablaniza',33,0,NULL),(575,'Bale',34,0,NULL),(576,'Bam',34,0,NULL),(577,'Bazega',34,0,NULL),(578,'Bougouriba',34,0,NULL),(579,'Boulgou',34,0,NULL),(580,'Boulkiemde',34,0,NULL),(581,'Comoe',34,0,NULL),(582,'Ganzourgou',34,0,NULL),(583,'Gnagna',34,0,NULL),(584,'Gourma',34,0,NULL),(585,'Houet',34,0,NULL),(586,'Ioba',34,0,NULL),(587,'Kadiogo',34,0,NULL),(588,'Kenedougou',34,0,NULL),(589,'Komandjari',34,0,NULL),(590,'Kompienga',34,0,NULL),(591,'Kossi',34,0,NULL),(592,'Kouritenga',34,0,NULL),(593,'Kourweogo',34,0,NULL),(594,'Leraba',34,0,NULL),(595,'Mouhoun',34,0,NULL),(596,'Nahouri',34,0,NULL),(597,'Namentenga',34,0,NULL),(598,'Noumbiel',34,0,NULL),(599,'Oubritenga',34,0,NULL),(600,'Oudalan',34,0,NULL),(601,'Passore',34,0,NULL),(602,'Poni',34,0,NULL),(603,'Sanguie',34,0,NULL),(604,'Sanmatenga',34,0,NULL),(605,'Seno',34,0,NULL),(606,'Sissili',34,0,NULL),(607,'Soum',34,0,NULL),(608,'Sourou',34,0,NULL),(609,'Tapoa',34,0,NULL),(610,'Tuy',34,0,NULL),(611,'Yatenga',34,0,NULL),(612,'Zondoma',34,0,NULL),(613,'Zoundweogo',34,0,NULL),(614,'Bubanza',35,0,NULL),(615,'Bujumbura',35,0,NULL),(616,'Bururi',35,0,NULL),(617,'Cankuzo',35,0,NULL),(618,'Cibitoke',35,0,NULL),(619,'Gitega',35,0,NULL),(620,'Karuzi',35,0,NULL),(621,'Kayanza',35,0,NULL),(622,'Kirundo',35,0,NULL),(623,'Makamba',35,0,NULL),(624,'Muramvya',35,0,NULL),(625,'Muyinga',35,0,NULL),(626,'Ngozi',35,0,NULL),(627,'Rutana',35,0,NULL),(628,'Ruyigi',35,0,NULL),(629,'Banteay Mean Chey',36,0,NULL),(630,'Bat Dambang',36,0,NULL),(631,'Kampong Cham',36,0,NULL),(632,'Kampong Chhnang',36,0,NULL),(633,'Kampong Spoeu',36,0,NULL),(634,'Kampong Thum',36,0,NULL),(635,'Kampot',36,0,NULL),(636,'Kandal',36,0,NULL),(637,'Kaoh Kong',36,0,NULL),(638,'Kracheh',36,0,NULL),(639,'Krong Kaeb',36,0,NULL),(640,'Krong Pailin',36,0,NULL),(641,'Krong Preah Sihanouk',36,0,NULL),(642,'Mondol Kiri',36,0,NULL),(643,'Otdar Mean Chey',36,0,NULL),(644,'Phnum Penh',36,0,NULL),(645,'Pousat',36,0,NULL),(646,'Preah Vihear',36,0,NULL),(647,'Prey Veaeng',36,0,NULL),(648,'Rotanak Kiri',36,0,NULL),(649,'Siem Reab',36,0,NULL),(650,'Stueng Traeng',36,0,NULL),(651,'Svay Rieng',36,0,NULL),(652,'Takaev',36,0,NULL),(653,'Adamaoua',37,0,NULL),(654,'Centre',37,0,NULL),(655,'Est',37,0,NULL),(656,'Littoral',37,0,NULL),(657,'Nord',37,0,NULL),(658,'Nord Extreme',37,0,NULL),(659,'Nordouest',37,0,NULL),(660,'Ouest',37,0,NULL),(661,'Sud',37,0,NULL),(662,'Sudouest',37,0,NULL),(663,'Alberta',38,0,NULL),(664,'British Columbia',38,0,NULL),(665,'Manitoba',38,0,NULL),(666,'New Brunswick',38,0,NULL),(667,'Newfoundland and Labrador',38,0,NULL),(668,'Northwest Territories',38,0,NULL),(669,'Nova Scotia',38,0,NULL),(670,'Nunavut',38,0,NULL),(671,'Ontario',38,0,NULL),(672,'Prince Edward Island',38,0,NULL),(673,'Quebec',38,0,NULL),(674,'Saskatchewan',38,0,NULL),(675,'Yukon',38,0,NULL),(676,'Boavista',39,0,NULL),(677,'Brava',39,0,NULL),(678,'Fogo',39,0,NULL),(679,'Maio',39,0,NULL),(680,'Sal',39,0,NULL),(681,'Santo Antao',39,0,NULL),(682,'Sao Nicolau',39,0,NULL),(683,'Sao Tiago',39,0,NULL),(684,'Sao Vicente',39,0,NULL),(685,'Grand Cayman',40,0,NULL),(686,'Bamingui-Bangoran',41,0,NULL),(687,'Bangui',41,0,NULL),(688,'Basse-Kotto',41,0,NULL),(689,'Haut-Mbomou',41,0,NULL),(690,'Haute-Kotto',41,0,NULL),(691,'Kemo',41,0,NULL),(692,'Lobaye',41,0,NULL),(693,'Mambere-Kadei',41,0,NULL),(694,'Mbomou',41,0,NULL),(695,'Nana-Gribizi',41,0,NULL),(696,'Nana-Mambere',41,0,NULL),(697,'Ombella Mpoko',41,0,NULL),(698,'Ouaka',41,0,NULL),(699,'Ouham',41,0,NULL),(700,'Ouham-Pende',41,0,NULL),(701,'Sangha-Mbaere',41,0,NULL),(702,'Vakaga',41,0,NULL),(703,'Batha',42,0,NULL),(704,'Biltine',42,0,NULL),(705,'Bourkou-Ennedi-Tibesti',42,0,NULL),(706,'Chari-Baguirmi',42,0,NULL),(707,'Guera',42,0,NULL),(708,'Kanem',42,0,NULL),(709,'Lac',42,0,NULL),(710,'Logone Occidental',42,0,NULL),(711,'Logone Oriental',42,0,NULL),(712,'Mayo-Kebbi',42,0,NULL),(713,'Moyen-Chari',42,0,NULL),(714,'Ouaddai',42,0,NULL),(715,'Salamat',42,0,NULL),(716,'Tandjile',42,0,NULL),(717,'Aisen',43,0,NULL),(718,'Antofagasta',43,0,NULL),(719,'Araucania',43,0,NULL),(720,'Atacama',43,0,NULL),(721,'Bio Bio',43,0,NULL),(722,'Coquimbo',43,0,NULL),(723,'Libertador General Bernardo O\'',43,0,NULL),(724,'Los Lagos',43,0,NULL),(725,'Magellanes',43,0,NULL),(726,'Maule',43,0,NULL),(727,'Metropolitana',43,0,NULL),(728,'Metropolitana de Santiago',43,0,NULL),(729,'Tarapaca',43,0,NULL),(730,'Valparaiso',43,0,NULL),(731,'Anhui',44,0,NULL),(732,'Anhui Province',44,0,NULL),(733,'Anhui Sheng',44,0,NULL),(734,'Aomen',44,0,NULL),(735,'Beijing',44,0,NULL),(736,'Beijing Shi',44,0,NULL),(737,'Chongqing',44,0,NULL),(738,'Fujian',44,0,NULL),(739,'Fujian Sheng',44,0,NULL),(740,'Gansu',44,0,NULL),(741,'Guangdong',44,0,NULL),(742,'Guangdong Sheng',44,0,NULL),(743,'Guangxi',44,0,NULL),(744,'Guizhou',44,0,NULL),(745,'Hainan',44,0,NULL),(746,'Hebei',44,0,NULL),(747,'Heilongjiang',44,0,NULL),(748,'Henan',44,0,NULL),(749,'Hubei',44,0,NULL),(750,'Hunan',44,0,NULL),(751,'Jiangsu',44,0,NULL),(752,'Jiangsu Sheng',44,0,NULL),(753,'Jiangxi',44,0,NULL),(754,'Jilin',44,0,NULL),(755,'Liaoning',44,0,NULL),(756,'Liaoning Sheng',44,0,NULL),(757,'Nei Monggol',44,0,NULL),(758,'Ningxia Hui',44,0,NULL),(759,'Qinghai',44,0,NULL),(760,'Shaanxi',44,0,NULL),(761,'Shandong',44,0,NULL),(762,'Shandong Sheng',44,0,NULL),(763,'Shanghai',44,0,NULL),(764,'Shanxi',44,0,NULL),(765,'Sichuan',44,0,NULL),(766,'Tianjin',44,0,NULL),(767,'Xianggang',44,0,NULL),(768,'Xinjiang',44,0,NULL),(769,'Xizang',44,0,NULL),(770,'Yunnan',44,0,NULL),(771,'Zhejiang',44,0,NULL),(772,'Zhejiang Sheng',44,0,NULL),(773,'Christmas Island',45,0,NULL),(774,'Cocos (Keeling) Islands',46,0,NULL),(775,'Amazonas',47,0,NULL),(776,'Antioquia',47,0,NULL),(777,'Arauca',47,0,NULL),(778,'Atlantico',47,0,NULL),(779,'Bogota',47,0,NULL),(780,'Bolivar',47,0,NULL),(781,'Boyaca',47,0,NULL),(782,'Caldas',47,0,NULL),(783,'Caqueta',47,0,NULL),(784,'Casanare',47,0,NULL),(785,'Cauca',47,0,NULL),(786,'Cesar',47,0,NULL),(787,'Choco',47,0,NULL),(788,'Cordoba',47,0,NULL),(789,'Cundinamarca',47,0,NULL),(790,'Guainia',47,0,NULL),(791,'Guaviare',47,0,NULL),(792,'Huila',47,0,NULL),(793,'La Guajira',47,0,NULL),(794,'Magdalena',47,0,NULL),(795,'Meta',47,0,NULL),(796,'Narino',47,0,NULL),(797,'Norte de Santander',47,0,NULL),(798,'Putumayo',47,0,NULL),(799,'Quindio',47,0,NULL),(800,'Risaralda',47,0,NULL),(801,'San Andres y Providencia',47,0,NULL),(802,'Santander',47,0,NULL),(803,'Sucre',47,0,NULL),(804,'Tolima',47,0,NULL),(805,'Valle del Cauca',47,0,NULL),(806,'Vaupes',47,0,NULL),(807,'Vichada',47,0,NULL),(808,'Mwali',48,0,NULL),(809,'Njazidja',48,0,NULL),(810,'Nzwani',48,0,NULL),(811,'Bouenza',49,0,NULL),(812,'Brazzaville',49,0,NULL),(813,'Cuvette',49,0,NULL),(814,'Kouilou',49,0,NULL),(815,'Lekoumou',49,0,NULL),(816,'Likouala',49,0,NULL),(817,'Niari',49,0,NULL),(818,'Plateaux',49,0,NULL),(819,'Pool',49,0,NULL),(820,'Sangha',49,0,NULL),(821,'Bandundu',50,0,NULL),(822,'Bas-Congo',50,0,NULL),(823,'Equateur',50,0,NULL),(824,'Haut-Congo',50,0,NULL),(825,'Kasai-Occidental',50,0,NULL),(826,'Kasai-Oriental',50,0,NULL),(827,'Katanga',50,0,NULL),(828,'Kinshasa',50,0,NULL),(829,'Maniema',50,0,NULL),(830,'Nord-Kivu',50,0,NULL),(831,'Sud-Kivu',50,0,NULL),(832,'Aitutaki',51,0,NULL),(833,'Atiu',51,0,NULL),(834,'Mangaia',51,0,NULL),(835,'Manihiki',51,0,NULL),(836,'Mauke',51,0,NULL),(837,'Mitiaro',51,0,NULL),(838,'Nassau',51,0,NULL),(839,'Pukapuka',51,0,NULL),(840,'Rakahanga',51,0,NULL),(841,'Rarotonga',51,0,NULL),(842,'Tongareva',51,0,NULL),(843,'Alajuela',52,0,NULL),(844,'Cartago',52,0,NULL),(845,'Guanacaste',52,0,NULL),(846,'Heredia',52,0,NULL),(847,'Limon',52,0,NULL),(848,'Puntarenas',52,0,NULL),(849,'San Jose',52,0,NULL),(850,'Abidjan',53,0,NULL),(851,'Agneby',53,0,NULL),(852,'Bafing',53,0,NULL),(853,'Denguele',53,0,NULL),(854,'Dix-huit Montagnes',53,0,NULL),(855,'Fromager',53,0,NULL),(856,'Haut-Sassandra',53,0,NULL),(857,'Lacs',53,0,NULL),(858,'Lagunes',53,0,NULL),(859,'Marahoue',53,0,NULL),(860,'Moyen-Cavally',53,0,NULL),(861,'Moyen-Comoe',53,0,NULL),(862,'N\'zi-Comoe',53,0,NULL),(863,'Sassandra',53,0,NULL),(864,'Savanes',53,0,NULL),(865,'Sud-Bandama',53,0,NULL),(866,'Sud-Comoe',53,0,NULL),(867,'Vallee du Bandama',53,0,NULL),(868,'Worodougou',53,0,NULL),(869,'Zanzan',53,0,NULL),(870,'Bjelovar-Bilogora',54,0,NULL),(871,'Dubrovnik-Neretva',54,0,NULL),(872,'Grad Zagreb',54,0,NULL),(873,'Istra',54,0,NULL),(874,'Karlovac',54,0,NULL),(875,'Koprivnica-Krizhevci',54,0,NULL),(876,'Krapina-Zagorje',54,0,NULL),(877,'Lika-Senj',54,0,NULL),(878,'Medhimurje',54,0,NULL),(879,'Medimurska Zupanija',54,0,NULL),(880,'Osijek-Baranja',54,0,NULL),(881,'Osjecko-Baranjska Zupanija',54,0,NULL),(882,'Pozhega-Slavonija',54,0,NULL),(883,'Primorje-Gorski Kotar',54,0,NULL),(884,'Shibenik-Knin',54,0,NULL),(885,'Sisak-Moslavina',54,0,NULL),(886,'Slavonski Brod-Posavina',54,0,NULL),(887,'Split-Dalmacija',54,0,NULL),(888,'Varazhdin',54,0,NULL),(889,'Virovitica-Podravina',54,0,NULL),(890,'Vukovar-Srijem',54,0,NULL),(891,'Zadar',54,0,NULL),(892,'Zagreb',54,0,NULL),(893,'Camaguey',55,0,NULL),(894,'Ciego de Avila',55,0,NULL),(895,'Cienfuegos',55,0,NULL),(896,'Ciudad de la Habana',55,0,NULL),(897,'Granma',55,0,NULL),(898,'Guantanamo',55,0,NULL),(899,'Habana',55,0,NULL),(900,'Holguin',55,0,NULL),(901,'Isla de la Juventud',55,0,NULL),(902,'La Habana',55,0,NULL),(903,'Las Tunas',55,0,NULL),(904,'Matanzas',55,0,NULL),(905,'Pinar del Rio',55,0,NULL),(906,'Sancti Spiritus',55,0,NULL),(907,'Santiago de Cuba',55,0,NULL),(908,'Villa Clara',55,0,NULL),(909,'Government controlled area',56,0,NULL),(910,'Limassol',56,0,NULL),(911,'Nicosia District',56,0,NULL),(912,'Paphos',56,0,NULL),(913,'Turkish controlled area',56,0,NULL),(914,'Central Bohemian',57,0,NULL),(915,'Frycovice',57,0,NULL),(916,'Jihocesky Kraj',57,0,NULL),(917,'Jihochesky',57,0,NULL),(918,'Jihomoravsky',57,0,NULL),(919,'Karlovarsky',57,0,NULL),(920,'Klecany',57,0,NULL),(921,'Kralovehradecky',57,0,NULL),(922,'Liberecky',57,0,NULL),(923,'Lipov',57,0,NULL),(924,'Moravskoslezsky',57,0,NULL),(925,'Olomoucky',57,0,NULL),(926,'Olomoucky Kraj',57,0,NULL),(927,'Pardubicky',57,0,NULL),(928,'Plzensky',57,0,NULL),(929,'Praha',57,0,NULL),(930,'Rajhrad',57,0,NULL),(931,'Smirice',57,0,NULL),(932,'South Moravian',57,0,NULL),(933,'Straz nad Nisou',57,0,NULL),(934,'Stredochesky',57,0,NULL),(935,'Unicov',57,0,NULL),(936,'Ustecky',57,0,NULL),(937,'Valletta',57,0,NULL),(938,'Velesin',57,0,NULL),(939,'Vysochina',57,0,NULL),(940,'Zlinsky',57,0,NULL),(941,'Arhus',58,0,NULL),(942,'Bornholm',58,0,NULL),(943,'Frederiksborg',58,0,NULL),(944,'Fyn',58,0,NULL),(945,'Hovedstaden',58,0,NULL),(946,'Kobenhavn',58,0,NULL),(947,'Kobenhavns Amt',58,0,NULL),(948,'Kobenhavns Kommune',58,0,NULL),(949,'Nordjylland',58,0,NULL),(950,'Ribe',58,0,NULL),(951,'Ringkobing',58,0,NULL),(952,'Roervig',58,0,NULL),(953,'Roskilde',58,0,NULL),(954,'Roslev',58,0,NULL),(955,'Sjaelland',58,0,NULL),(956,'Soeborg',58,0,NULL),(957,'Sonderjylland',58,0,NULL),(958,'Storstrom',58,0,NULL),(959,'Syddanmark',58,0,NULL),(960,'Toelloese',58,0,NULL),(961,'Vejle',58,0,NULL),(962,'Vestsjalland',58,0,NULL),(963,'Viborg',58,0,NULL),(964,'\'Ali Sabih',59,0,NULL),(965,'Dikhil',59,0,NULL),(966,'Jibuti',59,0,NULL),(967,'Tajurah',59,0,NULL),(968,'Ubuk',59,0,NULL),(969,'Saint Andrew',60,0,NULL),(970,'Saint David',60,0,NULL),(971,'Saint George',60,0,NULL),(972,'Saint John',60,0,NULL),(973,'Saint Joseph',60,0,NULL),(974,'Saint Luke',60,0,NULL),(975,'Saint Mark',60,0,NULL),(976,'Saint Patrick',60,0,NULL),(977,'Saint Paul',60,0,NULL),(978,'Saint Peter',60,0,NULL),(979,'Azua',61,0,NULL),(980,'Bahoruco',61,0,NULL),(981,'Barahona',61,0,NULL),(982,'Dajabon',61,0,NULL),(983,'Distrito Nacional',61,0,NULL),(984,'Duarte',61,0,NULL),(985,'El Seybo',61,0,NULL),(986,'Elias Pina',61,0,NULL),(987,'Espaillat',61,0,NULL),(988,'Hato Mayor',61,0,NULL),(989,'Independencia',61,0,NULL),(990,'La Altagracia',61,0,NULL),(991,'La Romana',61,0,NULL),(992,'La Vega',61,0,NULL),(993,'Maria Trinidad Sanchez',61,0,NULL),(994,'Monsenor Nouel',61,0,NULL),(995,'Monte Cristi',61,0,NULL),(996,'Monte Plata',61,0,NULL),(997,'Pedernales',61,0,NULL),(998,'Peravia',61,0,NULL),(999,'Puerto Plata',61,0,NULL),(1000,'Salcedo',61,0,NULL),(1001,'Samana',61,0,NULL),(1002,'San Cristobal',61,0,NULL),(1003,'San Juan',61,0,NULL),(1004,'San Pedro de Macoris',61,0,NULL),(1005,'Sanchez Ramirez',61,0,NULL),(1006,'Santiago',61,0,NULL),(1007,'Santiago Rodriguez',61,0,NULL),(1008,'Valverde',61,0,NULL),(1009,'Aileu',62,0,NULL),(1010,'Ainaro',62,0,NULL),(1011,'Ambeno',62,0,NULL),(1012,'Baucau',62,0,NULL),(1013,'Bobonaro',62,0,NULL),(1014,'Cova Lima',62,0,NULL),(1015,'Dili',62,0,NULL),(1016,'Ermera',62,0,NULL),(1017,'Lautem',62,0,NULL),(1018,'Liquica',62,0,NULL),(1019,'Manatuto',62,0,NULL),(1020,'Manufahi',62,0,NULL),(1021,'Viqueque',62,0,NULL),(1022,'Azuay',63,0,NULL),(1023,'Bolivar',63,0,NULL),(1024,'Canar',63,0,NULL),(1025,'Carchi',63,0,NULL),(1026,'Chimborazo',63,0,NULL),(1027,'Cotopaxi',63,0,NULL),(1028,'El Oro',63,0,NULL),(1029,'Esmeraldas',63,0,NULL),(1030,'Galapagos',63,0,NULL),(1031,'Guayas',63,0,NULL),(1032,'Imbabura',63,0,NULL),(1033,'Loja',63,0,NULL),(1034,'Los Rios',63,0,NULL),(1035,'Manabi',63,0,NULL),(1036,'Morona Santiago',63,0,NULL),(1037,'Napo',63,0,NULL),(1038,'Orellana',63,0,NULL),(1039,'Pastaza',63,0,NULL),(1040,'Pichincha',63,0,NULL),(1041,'Sucumbios',63,0,NULL),(1042,'Tungurahua',63,0,NULL),(1043,'Zamora Chinchipe',63,0,NULL),(1044,'Aswan',64,0,NULL),(1045,'Asyut',64,0,NULL),(1046,'Bani Suwayf',64,0,NULL),(1047,'Bur Sa\'id',64,0,NULL),(1048,'Cairo',64,0,NULL),(1049,'Dumyat',64,0,NULL),(1050,'Kafr-ash-Shaykh',64,0,NULL),(1051,'Matruh',64,0,NULL),(1052,'Muhafazat ad Daqahliyah',64,0,NULL),(1053,'Muhafazat al Fayyum',64,0,NULL),(1054,'Muhafazat al Gharbiyah',64,0,NULL),(1055,'Muhafazat al Iskandariyah',64,0,NULL),(1056,'Muhafazat al Qahirah',64,0,NULL),(1057,'Qina',64,0,NULL),(1058,'Sawhaj',64,0,NULL),(1059,'Sina al-Janubiyah',64,0,NULL),(1060,'Sina ash-Shamaliyah',64,0,NULL),(1061,'ad-Daqahliyah',64,0,NULL),(1062,'al-Bahr-al-Ahmar',64,0,NULL),(1063,'al-Buhayrah',64,0,NULL),(1064,'al-Fayyum',64,0,NULL),(1065,'al-Gharbiyah',64,0,NULL),(1066,'al-Iskandariyah',64,0,NULL),(1067,'al-Ismailiyah',64,0,NULL),(1068,'al-Jizah',64,0,NULL),(1069,'al-Minufiyah',64,0,NULL),(1070,'al-Minya',64,0,NULL),(1071,'al-Qahira',64,0,NULL),(1072,'al-Qalyubiyah',64,0,NULL),(1073,'al-Uqsur',64,0,NULL),(1074,'al-Wadi al-Jadid',64,0,NULL),(1075,'as-Suways',64,0,NULL),(1076,'ash-Sharqiyah',64,0,NULL),(1077,'Ahuachapan',65,0,NULL),(1078,'Cabanas',65,0,NULL),(1079,'Chalatenango',65,0,NULL),(1080,'Cuscatlan',65,0,NULL),(1081,'La Libertad',65,0,NULL),(1082,'La Paz',65,0,NULL),(1083,'La Union',65,0,NULL),(1084,'Morazan',65,0,NULL),(1085,'San Miguel',65,0,NULL),(1086,'San Salvador',65,0,NULL),(1087,'San Vicente',65,0,NULL),(1088,'Santa Ana',65,0,NULL),(1089,'Sonsonate',65,0,NULL),(1090,'Usulutan',65,0,NULL),(1091,'Annobon',66,0,NULL),(1092,'Bioko Norte',66,0,NULL),(1093,'Bioko Sur',66,0,NULL),(1094,'Centro Sur',66,0,NULL),(1095,'Kie-Ntem',66,0,NULL),(1096,'Litoral',66,0,NULL),(1097,'Wele-Nzas',66,0,NULL),(1098,'Anseba',67,0,NULL),(1099,'Debub',67,0,NULL),(1100,'Debub-Keih-Bahri',67,0,NULL),(1101,'Gash-Barka',67,0,NULL),(1102,'Maekel',67,0,NULL),(1103,'Semien-Keih-Bahri',67,0,NULL),(1104,'Harju',68,0,NULL),(1105,'Hiiu',68,0,NULL),(1106,'Ida-Viru',68,0,NULL),(1107,'Jarva',68,0,NULL),(1108,'Jogeva',68,0,NULL),(1109,'Laane',68,0,NULL),(1110,'Laane-Viru',68,0,NULL),(1111,'Parnu',68,0,NULL),(1112,'Polva',68,0,NULL),(1113,'Rapla',68,0,NULL),(1114,'Saare',68,0,NULL),(1115,'Tartu',68,0,NULL),(1116,'Valga',68,0,NULL),(1117,'Viljandi',68,0,NULL),(1118,'Voru',68,0,NULL),(1119,'Addis Abeba',69,0,NULL),(1120,'Afar',69,0,NULL),(1121,'Amhara',69,0,NULL),(1122,'Benishangul',69,0,NULL),(1123,'Diredawa',69,0,NULL),(1124,'Gambella',69,0,NULL),(1125,'Harar',69,0,NULL),(1126,'Jigjiga',69,0,NULL),(1127,'Mekele',69,0,NULL),(1128,'Oromia',69,0,NULL),(1129,'Somali',69,0,NULL),(1130,'Southern',69,0,NULL),(1131,'Tigray',69,0,NULL),(1132,'Christmas Island',70,0,NULL),(1133,'Cocos Islands',70,0,NULL),(1134,'Coral Sea Islands',70,0,NULL),(1135,'Falkland Islands',71,0,NULL),(1136,'South Georgia',71,0,NULL),(1137,'Klaksvik',72,0,NULL),(1138,'Nor ara Eysturoy',72,0,NULL),(1139,'Nor oy',72,0,NULL),(1140,'Sandoy',72,0,NULL),(1141,'Streymoy',72,0,NULL),(1142,'Su uroy',72,0,NULL),(1143,'Sy ra Eysturoy',72,0,NULL),(1144,'Torshavn',72,0,NULL),(1145,'Vaga',72,0,NULL),(1146,'Central',73,0,NULL),(1147,'Eastern',73,0,NULL),(1148,'Northern',73,0,NULL),(1149,'South Pacific',73,0,NULL),(1150,'Western',73,0,NULL),(1151,'Ahvenanmaa',74,0,NULL),(1152,'Etela-Karjala',74,0,NULL),(1153,'Etela-Pohjanmaa',74,0,NULL),(1154,'Etela-Savo',74,0,NULL),(1155,'Etela-Suomen Laani',74,0,NULL),(1156,'Ita-Suomen Laani',74,0,NULL),(1157,'Ita-Uusimaa',74,0,NULL),(1158,'Kainuu',74,0,NULL),(1159,'Kanta-Hame',74,0,NULL),(1160,'Keski-Pohjanmaa',74,0,NULL),(1161,'Keski-Suomi',74,0,NULL),(1162,'Kymenlaakso',74,0,NULL),(1163,'Lansi-Suomen Laani',74,0,NULL),(1164,'Lappi',74,0,NULL),(1165,'Northern Savonia',74,0,NULL),(1166,'Ostrobothnia',74,0,NULL),(1167,'Oulun Laani',74,0,NULL),(1168,'Paijat-Hame',74,0,NULL),(1169,'Pirkanmaa',74,0,NULL),(1170,'Pohjanmaa',74,0,NULL),(1171,'Pohjois-Karjala',74,0,NULL),(1172,'Pohjois-Pohjanmaa',74,0,NULL),(1173,'Pohjois-Savo',74,0,NULL),(1174,'Saarijarvi',74,0,NULL),(1175,'Satakunta',74,0,NULL),(1176,'Southern Savonia',74,0,NULL),(1177,'Tavastia Proper',74,0,NULL),(1178,'Uleaborgs Lan',74,0,NULL),(1179,'Uusimaa',74,0,NULL),(1180,'Varsinais-Suomi',74,0,NULL),(1181,'Ain',75,0,NULL),(1182,'Aisne',75,0,NULL),(1183,'Albi Le Sequestre',75,0,NULL),(1184,'Allier',75,0,NULL),(1185,'Alpes-Cote dAzur',75,0,NULL),(1186,'Alpes-Maritimes',75,0,NULL),(1187,'Alpes-de-Haute-Provence',75,0,NULL),(1188,'Alsace',75,0,NULL),(1189,'Aquitaine',75,0,NULL),(1190,'Ardeche',75,0,NULL),(1191,'Ardennes',75,0,NULL),(1192,'Ariege',75,0,NULL),(1193,'Aube',75,0,NULL),(1194,'Aude',75,0,NULL),(1195,'Auvergne',75,0,NULL),(1196,'Aveyron',75,0,NULL),(1197,'Bas-Rhin',75,0,NULL),(1198,'Basse-Normandie',75,0,NULL),(1199,'Bouches-du-Rhone',75,0,NULL),(1200,'Bourgogne',75,0,NULL),(1201,'Bretagne',75,0,NULL),(1202,'Brittany',75,0,NULL),(1203,'Burgundy',75,0,NULL),(1204,'Calvados',75,0,NULL),(1205,'Cantal',75,0,NULL),(1206,'Cedex',75,0,NULL),(1207,'Centre',75,0,NULL),(1208,'Charente',75,0,NULL),(1209,'Charente-Maritime',75,0,NULL),(1210,'Cher',75,0,NULL),(1211,'Correze',75,0,NULL),(1212,'Corse-du-Sud',75,0,NULL),(1213,'Cote-d\'Or',75,0,NULL),(1214,'Cotes-d\'Armor',75,0,NULL),(1215,'Creuse',75,0,NULL),(1216,'Crolles',75,0,NULL),(1217,'Deux-Sevres',75,0,NULL),(1218,'Dordogne',75,0,NULL),(1219,'Doubs',75,0,NULL),(1220,'Drome',75,0,NULL),(1221,'Essonne',75,0,NULL),(1222,'Eure',75,0,NULL),(1223,'Eure-et-Loir',75,0,NULL),(1224,'Feucherolles',75,0,NULL),(1225,'Finistere',75,0,NULL),(1226,'Franche-Comte',75,0,NULL),(1227,'Gard',75,0,NULL),(1228,'Gers',75,0,NULL),(1229,'Gironde',75,0,NULL),(1230,'Haut-Rhin',75,0,NULL),(1231,'Haute-Corse',75,0,NULL),(1232,'Haute-Garonne',75,0,NULL),(1233,'Haute-Loire',75,0,NULL),(1234,'Haute-Marne',75,0,NULL),(1235,'Haute-Saone',75,0,NULL),(1236,'Haute-Savoie',75,0,NULL),(1237,'Haute-Vienne',75,0,NULL),(1238,'Hautes-Alpes',75,0,NULL),(1239,'Hautes-Pyrenees',75,0,NULL),(1240,'Hauts-de-Seine',75,0,NULL),(1241,'Herault',75,0,NULL),(1242,'Ile-de-France',75,0,NULL),(1243,'Ille-et-Vilaine',75,0,NULL),(1244,'Indre',75,0,NULL),(1245,'Indre-et-Loire',75,0,NULL),(1246,'Isere',75,0,NULL),(1247,'Jura',75,0,NULL),(1248,'Klagenfurt',75,0,NULL),(1249,'Landes',75,0,NULL),(1250,'Languedoc-Roussillon',75,0,NULL),(1251,'Larcay',75,0,NULL),(1252,'Le Castellet',75,0,NULL),(1253,'Le Creusot',75,0,NULL),(1254,'Limousin',75,0,NULL),(1255,'Loir-et-Cher',75,0,NULL),(1256,'Loire',75,0,NULL),(1257,'Loire-Atlantique',75,0,NULL),(1258,'Loiret',75,0,NULL),(1259,'Lorraine',75,0,NULL),(1260,'Lot',75,0,NULL),(1261,'Lot-et-Garonne',75,0,NULL),(1262,'Lower Normandy',75,0,NULL),(1263,'Lozere',75,0,NULL),(1264,'Maine-et-Loire',75,0,NULL),(1265,'Manche',75,0,NULL),(1266,'Marne',75,0,NULL),(1267,'Mayenne',75,0,NULL),(1268,'Meurthe-et-Moselle',75,0,NULL),(1269,'Meuse',75,0,NULL),(1270,'Midi-Pyrenees',75,0,NULL),(1271,'Morbihan',75,0,NULL),(1272,'Moselle',75,0,NULL),(1273,'Nievre',75,0,NULL),(1274,'Nord',75,0,NULL),(1275,'Nord-Pas-de-Calais',75,0,NULL),(1276,'Oise',75,0,NULL),(1277,'Orne',75,0,NULL),(1278,'Paris',75,0,NULL),(1279,'Pas-de-Calais',75,0,NULL),(1280,'Pays de la Loire',75,0,NULL),(1281,'Pays-de-la-Loire',75,0,NULL),(1282,'Picardy',75,0,NULL),(1283,'Puy-de-Dome',75,0,NULL),(1284,'Pyrenees-Atlantiques',75,0,NULL),(1285,'Pyrenees-Orientales',75,0,NULL),(1286,'Quelmes',75,0,NULL),(1287,'Rhone',75,0,NULL),(1288,'Rhone-Alpes',75,0,NULL),(1289,'Saint Ouen',75,0,NULL),(1290,'Saint Viatre',75,0,NULL),(1291,'Saone-et-Loire',75,0,NULL),(1292,'Sarthe',75,0,NULL),(1293,'Savoie',75,0,NULL),(1294,'Seine-Maritime',75,0,NULL),(1295,'Seine-Saint-Denis',75,0,NULL),(1296,'Seine-et-Marne',75,0,NULL),(1297,'Somme',75,0,NULL),(1298,'Sophia Antipolis',75,0,NULL),(1299,'Souvans',75,0,NULL),(1300,'Tarn',75,0,NULL),(1301,'Tarn-et-Garonne',75,0,NULL),(1302,'Territoire de Belfort',75,0,NULL),(1303,'Treignac',75,0,NULL),(1304,'Upper Normandy',75,0,NULL),(1305,'Val-d\'Oise',75,0,NULL),(1306,'Val-de-Marne',75,0,NULL),(1307,'Var',75,0,NULL),(1308,'Vaucluse',75,0,NULL),(1309,'Vellise',75,0,NULL),(1310,'Vendee',75,0,NULL),(1311,'Vienne',75,0,NULL),(1312,'Vosges',75,0,NULL),(1313,'Yonne',75,0,NULL),(1314,'Yvelines',75,0,NULL),(1315,'Cayenne',76,0,NULL),(1316,'Saint-Laurent-du-Maroni',76,0,NULL),(1317,'Iles du Vent',77,0,NULL),(1318,'Iles sous le Vent',77,0,NULL),(1319,'Marquesas',77,0,NULL),(1320,'Tuamotu',77,0,NULL),(1321,'Tubuai',77,0,NULL),(1322,'Amsterdam',78,0,NULL),(1323,'Crozet Islands',78,0,NULL),(1324,'Kerguelen',78,0,NULL),(1325,'Estuaire',79,0,NULL),(1326,'Haut-Ogooue',79,0,NULL),(1327,'Moyen-Ogooue',79,0,NULL),(1328,'Ngounie',79,0,NULL),(1329,'Nyanga',79,0,NULL),(1330,'Ogooue-Ivindo',79,0,NULL),(1331,'Ogooue-Lolo',79,0,NULL),(1332,'Ogooue-Maritime',79,0,NULL),(1333,'Woleu-Ntem',79,0,NULL),(1334,'Banjul',80,0,NULL),(1335,'Basse',80,0,NULL),(1336,'Brikama',80,0,NULL),(1337,'Janjanbureh',80,0,NULL),(1338,'Kanifing',80,0,NULL),(1339,'Kerewan',80,0,NULL),(1340,'Kuntaur',80,0,NULL),(1341,'Mansakonko',80,0,NULL),(1342,'Abhasia',81,0,NULL),(1343,'Ajaria',81,0,NULL),(1344,'Guria',81,0,NULL),(1345,'Imereti',81,0,NULL),(1346,'Kaheti',81,0,NULL),(1347,'Kvemo Kartli',81,0,NULL),(1348,'Mcheta-Mtianeti',81,0,NULL),(1349,'Racha',81,0,NULL),(1350,'Samagrelo-Zemo Svaneti',81,0,NULL),(1351,'Samche-Zhavaheti',81,0,NULL),(1352,'Shida Kartli',81,0,NULL),(1353,'Tbilisi',81,0,NULL),(1354,'Auvergne',82,0,NULL),(1355,'Baden-Wurttemberg',82,0,NULL),(1356,'Bavaria',82,0,NULL),(1357,'Bayern',82,0,NULL),(1358,'Beilstein Wurtt',82,0,NULL),(1359,'Berlin',82,0,NULL),(1360,'Brandenburg',82,0,NULL),(1361,'Bremen',82,0,NULL),(1362,'Dreisbach',82,0,NULL),(1363,'Freistaat Bayern',82,0,NULL),(1364,'Hamburg',82,0,NULL),(1365,'Hannover',82,0,NULL),(1366,'Heroldstatt',82,0,NULL),(1367,'Hessen',82,0,NULL),(1368,'Kortenberg',82,0,NULL),(1369,'Laasdorf',82,0,NULL),(1370,'Land Baden-Wurttemberg',82,0,NULL),(1371,'Land Bayern',82,0,NULL),(1372,'Land Brandenburg',82,0,NULL),(1373,'Land Hessen',82,0,NULL),(1374,'Land Mecklenburg-Vorpommern',82,0,NULL),(1375,'Land Nordrhein-Westfalen',82,0,NULL),(1376,'Land Rheinland-Pfalz',82,0,NULL),(1377,'Land Sachsen',82,0,NULL),(1378,'Land Sachsen-Anhalt',82,0,NULL),(1379,'Land Thuringen',82,0,NULL),(1380,'Lower Saxony',82,0,NULL),(1381,'Mecklenburg-Vorpommern',82,0,NULL),(1382,'Mulfingen',82,0,NULL),(1383,'Munich',82,0,NULL),(1384,'Neubeuern',82,0,NULL),(1385,'Niedersachsen',82,0,NULL),(1386,'Noord-Holland',82,0,NULL),(1387,'Nordrhein-Westfalen',82,0,NULL),(1388,'North Rhine-Westphalia',82,0,NULL),(1389,'Osterode',82,0,NULL),(1390,'Rheinland-Pfalz',82,0,NULL),(1391,'Rhineland-Palatinate',82,0,NULL),(1392,'Saarland',82,0,NULL),(1393,'Sachsen',82,0,NULL),(1394,'Sachsen-Anhalt',82,0,NULL),(1395,'Saxony',82,0,NULL),(1396,'Schleswig-Holstein',82,0,NULL),(1397,'Thuringia',82,0,NULL),(1398,'Webling',82,0,NULL),(1399,'Weinstrabe',82,0,NULL),(1400,'schlobborn',82,0,NULL),(1401,'Ashanti',83,0,NULL),(1402,'Brong-Ahafo',83,0,NULL),(1403,'Central',83,0,NULL),(1404,'Eastern',83,0,NULL),(1405,'Greater Accra',83,0,NULL),(1406,'Northern',83,0,NULL),(1407,'Upper East',83,0,NULL),(1408,'Upper West',83,0,NULL),(1409,'Volta',83,0,NULL),(1410,'Western',83,0,NULL),(1411,'Gibraltar',84,0,NULL),(1412,'Acharnes',85,0,NULL),(1413,'Ahaia',85,0,NULL),(1414,'Aitolia kai Akarnania',85,0,NULL),(1415,'Argolis',85,0,NULL),(1416,'Arkadia',85,0,NULL),(1417,'Arta',85,0,NULL),(1418,'Attica',85,0,NULL),(1419,'Attiki',85,0,NULL),(1420,'Ayion Oros',85,0,NULL),(1421,'Crete',85,0,NULL),(1422,'Dodekanisos',85,0,NULL),(1423,'Drama',85,0,NULL),(1424,'Evia',85,0,NULL),(1425,'Evritania',85,0,NULL),(1426,'Evros',85,0,NULL),(1427,'Evvoia',85,0,NULL),(1428,'Florina',85,0,NULL),(1429,'Fokis',85,0,NULL),(1430,'Fthiotis',85,0,NULL),(1431,'Grevena',85,0,NULL),(1432,'Halandri',85,0,NULL),(1433,'Halkidiki',85,0,NULL),(1434,'Hania',85,0,NULL),(1435,'Heraklion',85,0,NULL),(1436,'Hios',85,0,NULL),(1437,'Ilia',85,0,NULL),(1438,'Imathia',85,0,NULL),(1439,'Ioannina',85,0,NULL),(1440,'Iraklion',85,0,NULL),(1441,'Karditsa',85,0,NULL),(1442,'Kastoria',85,0,NULL),(1443,'Kavala',85,0,NULL),(1444,'Kefallinia',85,0,NULL),(1445,'Kerkira',85,0,NULL),(1446,'Kiklades',85,0,NULL),(1447,'Kilkis',85,0,NULL),(1448,'Korinthia',85,0,NULL),(1449,'Kozani',85,0,NULL),(1450,'Lakonia',85,0,NULL),(1451,'Larisa',85,0,NULL),(1452,'Lasithi',85,0,NULL),(1453,'Lesvos',85,0,NULL),(1454,'Levkas',85,0,NULL),(1455,'Magnisia',85,0,NULL),(1456,'Messinia',85,0,NULL),(1457,'Nomos Attikis',85,0,NULL),(1458,'Nomos Zakynthou',85,0,NULL),(1459,'Pella',85,0,NULL),(1460,'Pieria',85,0,NULL),(1461,'Piraios',85,0,NULL),(1462,'Preveza',85,0,NULL),(1463,'Rethimni',85,0,NULL),(1464,'Rodopi',85,0,NULL),(1465,'Samos',85,0,NULL),(1466,'Serrai',85,0,NULL),(1467,'Thesprotia',85,0,NULL),(1468,'Thessaloniki',85,0,NULL),(1469,'Trikala',85,0,NULL),(1470,'Voiotia',85,0,NULL),(1471,'West Greece',85,0,NULL),(1472,'Xanthi',85,0,NULL),(1473,'Zakinthos',85,0,NULL),(1474,'Aasiaat',86,0,NULL),(1475,'Ammassalik',86,0,NULL),(1476,'Illoqqortoormiut',86,0,NULL),(1477,'Ilulissat',86,0,NULL),(1478,'Ivittuut',86,0,NULL),(1479,'Kangaatsiaq',86,0,NULL),(1480,'Maniitsoq',86,0,NULL),(1481,'Nanortalik',86,0,NULL),(1482,'Narsaq',86,0,NULL),(1483,'Nuuk',86,0,NULL),(1484,'Paamiut',86,0,NULL),(1485,'Qaanaaq',86,0,NULL),(1486,'Qaqortoq',86,0,NULL),(1487,'Qasigiannguit',86,0,NULL),(1488,'Qeqertarsuaq',86,0,NULL),(1489,'Sisimiut',86,0,NULL),(1490,'Udenfor kommunal inddeling',86,0,NULL),(1491,'Upernavik',86,0,NULL),(1492,'Uummannaq',86,0,NULL),(1493,'Carriacou-Petite Martinique',87,0,NULL),(1494,'Saint Andrew',87,0,NULL),(1495,'Saint Davids',87,0,NULL),(1496,'Saint George\'s',87,0,NULL),(1497,'Saint John',87,0,NULL),(1498,'Saint Mark',87,0,NULL),(1499,'Saint Patrick',87,0,NULL),(1500,'Basse-Terre',88,0,NULL),(1501,'Grande-Terre',88,0,NULL),(1502,'Iles des Saintes',88,0,NULL),(1503,'La Desirade',88,0,NULL),(1504,'Marie-Galante',88,0,NULL),(1505,'Saint Barthelemy',88,0,NULL),(1506,'Saint Martin',88,0,NULL),(1507,'Agana Heights',89,0,NULL),(1508,'Agat',89,0,NULL),(1509,'Barrigada',89,0,NULL),(1510,'Chalan-Pago-Ordot',89,0,NULL),(1511,'Dededo',89,0,NULL),(1512,'Hagatna',89,0,NULL),(1513,'Inarajan',89,0,NULL),(1514,'Mangilao',89,0,NULL),(1515,'Merizo',89,0,NULL),(1516,'Mongmong-Toto-Maite',89,0,NULL),(1517,'Santa Rita',89,0,NULL),(1518,'Sinajana',89,0,NULL),(1519,'Talofofo',89,0,NULL),(1520,'Tamuning',89,0,NULL),(1521,'Yigo',89,0,NULL),(1522,'Yona',89,0,NULL),(1523,'Alta Verapaz',90,0,NULL),(1524,'Baja Verapaz',90,0,NULL),(1525,'Chimaltenango',90,0,NULL),(1526,'Chiquimula',90,0,NULL),(1527,'El Progreso',90,0,NULL),(1528,'Escuintla',90,0,NULL),(1529,'Guatemala',90,0,NULL),(1530,'Huehuetenango',90,0,NULL),(1531,'Izabal',90,0,NULL),(1532,'Jalapa',90,0,NULL),(1533,'Jutiapa',90,0,NULL),(1534,'Peten',90,0,NULL),(1535,'Quezaltenango',90,0,NULL),(1536,'Quiche',90,0,NULL),(1537,'Retalhuleu',90,0,NULL),(1538,'Sacatepequez',90,0,NULL),(1539,'San Marcos',90,0,NULL),(1540,'Santa Rosa',90,0,NULL),(1541,'Solola',90,0,NULL),(1542,'Suchitepequez',90,0,NULL),(1543,'Totonicapan',90,0,NULL),(1544,'Zacapa',90,0,NULL),(1545,'Alderney',91,0,NULL),(1546,'Castel',91,0,NULL),(1547,'Forest',91,0,NULL),(1548,'Saint Andrew',91,0,NULL),(1549,'Saint Martin',91,0,NULL),(1550,'Saint Peter Port',91,0,NULL),(1551,'Saint Pierre du Bois',91,0,NULL),(1552,'Saint Sampson',91,0,NULL),(1553,'Saint Saviour',91,0,NULL),(1554,'Sark',91,0,NULL),(1555,'Torteval',91,0,NULL),(1556,'Vale',91,0,NULL),(1557,'Beyla',92,0,NULL),(1558,'Boffa',92,0,NULL),(1559,'Boke',92,0,NULL),(1560,'Conakry',92,0,NULL),(1561,'Coyah',92,0,NULL),(1562,'Dabola',92,0,NULL),(1563,'Dalaba',92,0,NULL),(1564,'Dinguiraye',92,0,NULL),(1565,'Faranah',92,0,NULL),(1566,'Forecariah',92,0,NULL),(1567,'Fria',92,0,NULL),(1568,'Gaoual',92,0,NULL),(1569,'Gueckedou',92,0,NULL),(1570,'Kankan',92,0,NULL),(1571,'Kerouane',92,0,NULL),(1572,'Kindia',92,0,NULL),(1573,'Kissidougou',92,0,NULL),(1574,'Koubia',92,0,NULL),(1575,'Koundara',92,0,NULL),(1576,'Kouroussa',92,0,NULL),(1577,'Labe',92,0,NULL),(1578,'Lola',92,0,NULL),(1579,'Macenta',92,0,NULL),(1580,'Mali',92,0,NULL),(1581,'Mamou',92,0,NULL),(1582,'Mandiana',92,0,NULL),(1583,'Nzerekore',92,0,NULL),(1584,'Pita',92,0,NULL),(1585,'Siguiri',92,0,NULL),(1586,'Telimele',92,0,NULL),(1587,'Tougue',92,0,NULL),(1588,'Yomou',92,0,NULL),(1589,'Bafata',93,0,NULL),(1590,'Bissau',93,0,NULL),(1591,'Bolama',93,0,NULL),(1592,'Cacheu',93,0,NULL),(1593,'Gabu',93,0,NULL),(1594,'Oio',93,0,NULL),(1595,'Quinara',93,0,NULL),(1596,'Tombali',93,0,NULL),(1597,'Barima-Waini',94,0,NULL),(1598,'Cuyuni-Mazaruni',94,0,NULL),(1599,'Demerara-Mahaica',94,0,NULL),(1600,'East Berbice-Corentyne',94,0,NULL),(1601,'Essequibo Islands-West Demerar',94,0,NULL),(1602,'Mahaica-Berbice',94,0,NULL),(1603,'Pomeroon-Supenaam',94,0,NULL),(1604,'Potaro-Siparuni',94,0,NULL),(1605,'Upper Demerara-Berbice',94,0,NULL),(1606,'Upper Takutu-Upper Essequibo',94,0,NULL),(1607,'Artibonite',95,0,NULL),(1608,'Centre',95,0,NULL),(1609,'Grand\'Anse',95,0,NULL),(1610,'Nord',95,0,NULL),(1611,'Nord-Est',95,0,NULL),(1612,'Nord-Ouest',95,0,NULL),(1613,'Ouest',95,0,NULL),(1614,'Sud',95,0,NULL),(1615,'Sud-Est',95,0,NULL),(1616,'Heard and McDonald Islands',96,0,NULL),(1617,'Atlantida',97,0,NULL),(1618,'Choluteca',97,0,NULL),(1619,'Colon',97,0,NULL),(1620,'Comayagua',97,0,NULL),(1621,'Copan',97,0,NULL),(1622,'Cortes',97,0,NULL),(1623,'Distrito Central',97,0,NULL),(1624,'El Paraiso',97,0,NULL),(1625,'Francisco Morazan',97,0,NULL),(1626,'Gracias a Dios',97,0,NULL),(1627,'Intibuca',97,0,NULL),(1628,'Islas de la Bahia',97,0,NULL),(1629,'La Paz',97,0,NULL),(1630,'Lempira',97,0,NULL),(1631,'Ocotepeque',97,0,NULL),(1632,'Olancho',97,0,NULL),(1633,'Santa Barbara',97,0,NULL),(1634,'Valle',97,0,NULL),(1635,'Yoro',97,0,NULL),(1636,'Hong Kong',98,0,NULL),(1637,'Bacs-Kiskun',99,0,NULL),(1638,'Baranya',99,0,NULL),(1639,'Bekes',99,0,NULL),(1640,'Borsod-Abauj-Zemplen',99,0,NULL),(1641,'Budapest',99,0,NULL),(1642,'Csongrad',99,0,NULL),(1643,'Fejer',99,0,NULL),(1644,'Gyor-Moson-Sopron',99,0,NULL),(1645,'Hajdu-Bihar',99,0,NULL),(1646,'Heves',99,0,NULL),(1647,'Jasz-Nagykun-Szolnok',99,0,NULL),(1648,'Komarom-Esztergom',99,0,NULL),(1649,'Nograd',99,0,NULL),(1650,'Pest',99,0,NULL),(1651,'Somogy',99,0,NULL),(1652,'Szabolcs-Szatmar-Bereg',99,0,NULL),(1653,'Tolna',99,0,NULL),(1654,'Vas',99,0,NULL),(1655,'Veszprem',99,0,NULL),(1656,'Zala',99,0,NULL),(1657,'Austurland',100,0,NULL),(1658,'Gullbringusysla',100,0,NULL),(1659,'Hofu borgarsva i',100,0,NULL),(1660,'Nor urland eystra',100,0,NULL),(1661,'Nor urland vestra',100,0,NULL),(1662,'Su urland',100,0,NULL),(1663,'Su urnes',100,0,NULL),(1664,'Vestfir ir',100,0,NULL),(1665,'Vesturland',100,0,NULL),(1666,'Aceh',102,0,NULL),(1667,'Bali',102,0,NULL),(1668,'Bangka-Belitung',102,0,NULL),(1669,'Banten',102,0,NULL),(1670,'Bengkulu',102,0,NULL),(1671,'Gandaria',102,0,NULL),(1672,'Gorontalo',102,0,NULL),(1673,'Jakarta',102,0,NULL),(1674,'Jambi',102,0,NULL),(1675,'Jawa Barat',102,0,NULL),(1676,'Jawa Tengah',102,0,NULL),(1677,'Jawa Timur',102,0,NULL),(1678,'Kalimantan Barat',102,0,NULL),(1679,'Kalimantan Selatan',102,0,NULL),(1680,'Kalimantan Tengah',102,0,NULL),(1681,'Kalimantan Timur',102,0,NULL),(1682,'Kendal',102,0,NULL),(1683,'Lampung',102,0,NULL),(1684,'Maluku',102,0,NULL),(1685,'Maluku Utara',102,0,NULL),(1686,'Nusa Tenggara Barat',102,0,NULL),(1687,'Nusa Tenggara Timur',102,0,NULL),(1688,'Papua',102,0,NULL),(1689,'Riau',102,0,NULL),(1690,'Riau Kepulauan',102,0,NULL),(1691,'Solo',102,0,NULL),(1692,'Sulawesi Selatan',102,0,NULL),(1693,'Sulawesi Tengah',102,0,NULL),(1694,'Sulawesi Tenggara',102,0,NULL),(1695,'Sulawesi Utara',102,0,NULL),(1696,'Sumatera Barat',102,0,NULL),(1697,'Sumatera Selatan',102,0,NULL),(1698,'Sumatera Utara',102,0,NULL),(1699,'Yogyakarta',102,0,NULL),(1700,'Ardabil',103,0,NULL),(1701,'Azarbayjan-e Bakhtari',103,0,NULL),(1702,'Azarbayjan-e Khavari',103,0,NULL),(1703,'Bushehr',103,0,NULL),(1704,'Chahar Mahal-e Bakhtiari',103,0,NULL),(1705,'Esfahan',103,0,NULL),(1706,'Fars',103,0,NULL),(1707,'Gilan',103,0,NULL),(1708,'Golestan',103,0,NULL),(1709,'Hamadan',103,0,NULL),(1710,'Hormozgan',103,0,NULL),(1711,'Ilam',103,0,NULL),(1712,'Kerman',103,0,NULL),(1713,'Kermanshah',103,0,NULL),(1714,'Khorasan',103,0,NULL),(1715,'Khuzestan',103,0,NULL),(1716,'Kohgiluyeh-e Boyerahmad',103,0,NULL),(1717,'Kordestan',103,0,NULL),(1718,'Lorestan',103,0,NULL),(1719,'Markazi',103,0,NULL),(1720,'Mazandaran',103,0,NULL),(1721,'Ostan-e Esfahan',103,0,NULL),(1722,'Qazvin',103,0,NULL),(1723,'Qom',103,0,NULL),(1724,'Semnan',103,0,NULL),(1725,'Sistan-e Baluchestan',103,0,NULL),(1726,'Tehran',103,0,NULL),(1727,'Yazd',103,0,NULL),(1728,'Zanjan',103,0,NULL),(1729,'Babil',104,0,NULL),(1730,'Baghdad',104,0,NULL),(1731,'Dahuk',104,0,NULL),(1732,'Dhi Qar',104,0,NULL),(1733,'Diyala',104,0,NULL),(1734,'Erbil',104,0,NULL),(1735,'Irbil',104,0,NULL),(1736,'Karbala',104,0,NULL),(1737,'Kurdistan',104,0,NULL),(1738,'Maysan',104,0,NULL),(1739,'Ninawa',104,0,NULL),(1740,'Salah-ad-Din',104,0,NULL),(1741,'Wasit',104,0,NULL),(1742,'al-Anbar',104,0,NULL),(1743,'al-Basrah',104,0,NULL),(1744,'al-Muthanna',104,0,NULL),(1745,'al-Qadisiyah',104,0,NULL),(1746,'an-Najaf',104,0,NULL),(1747,'as-Sulaymaniyah',104,0,NULL),(1748,'at-Ta\'mim',104,0,NULL),(1749,'Armagh',105,0,NULL),(1750,'Carlow',105,0,NULL),(1751,'Cavan',105,0,NULL),(1752,'Clare',105,0,NULL),(1753,'Cork',105,0,NULL),(1754,'Donegal',105,0,NULL),(1755,'Dublin',105,0,NULL),(1756,'Galway',105,0,NULL),(1757,'Kerry',105,0,NULL),(1758,'Kildare',105,0,NULL),(1759,'Kilkenny',105,0,NULL),(1760,'Laois',105,0,NULL),(1761,'Leinster',105,0,NULL),(1762,'Leitrim',105,0,NULL),(1763,'Limerick',105,0,NULL),(1764,'Loch Garman',105,0,NULL),(1765,'Longford',105,0,NULL),(1766,'Louth',105,0,NULL),(1767,'Mayo',105,0,NULL),(1768,'Meath',105,0,NULL),(1769,'Monaghan',105,0,NULL),(1770,'Offaly',105,0,NULL),(1771,'Roscommon',105,0,NULL),(1772,'Sligo',105,0,NULL),(1773,'Tipperary North Riding',105,0,NULL),(1774,'Tipperary South Riding',105,0,NULL),(1775,'Ulster',105,0,NULL),(1776,'Waterford',105,0,NULL),(1777,'Westmeath',105,0,NULL),(1778,'Wexford',105,0,NULL),(1779,'Wicklow',105,0,NULL),(1780,'Beit Hanania',106,0,NULL),(1781,'Ben Gurion Airport',106,0,NULL),(1782,'Bethlehem',106,0,NULL),(1783,'Caesarea',106,0,NULL),(1784,'Centre',106,0,NULL),(1785,'Gaza',106,0,NULL),(1786,'Hadaron',106,0,NULL),(1787,'Haifa District',106,0,NULL),(1788,'Hamerkaz',106,0,NULL),(1789,'Hazafon',106,0,NULL),(1790,'Hebron',106,0,NULL),(1791,'Jaffa',106,0,NULL),(1792,'Jerusalem',106,0,NULL),(1793,'Khefa',106,0,NULL),(1794,'Kiryat Yam',106,0,NULL),(1795,'Lower Galilee',106,0,NULL),(1796,'Qalqilya',106,0,NULL),(1797,'Talme Elazar',106,0,NULL),(1798,'Tel Aviv',106,0,NULL),(1799,'Tsafon',106,0,NULL),(1800,'Umm El Fahem',106,0,NULL),(1801,'Yerushalayim',106,0,NULL),(1802,'Abruzzi',107,0,NULL),(1803,'Abruzzo',107,0,NULL),(1804,'Agrigento',107,0,NULL),(1805,'Alessandria',107,0,NULL),(1806,'Ancona',107,0,NULL),(1807,'Arezzo',107,0,NULL),(1808,'Ascoli Piceno',107,0,NULL),(1809,'Asti',107,0,NULL),(1810,'Avellino',107,0,NULL),(1811,'Bari',107,0,NULL),(1812,'Basilicata',107,0,NULL),(1813,'Belluno',107,0,NULL),(1814,'Benevento',107,0,NULL),(1815,'Bergamo',107,0,NULL),(1816,'Biella',107,0,NULL),(1817,'Bologna',107,0,NULL),(1818,'Bolzano',107,0,NULL),(1819,'Brescia',107,0,NULL),(1820,'Brindisi',107,0,NULL),(1821,'Calabria',107,0,NULL),(1822,'Campania',107,0,NULL),(1823,'Cartoceto',107,0,NULL),(1824,'Caserta',107,0,NULL),(1825,'Catania',107,0,NULL),(1826,'Chieti',107,0,NULL),(1827,'Como',107,0,NULL),(1828,'Cosenza',107,0,NULL),(1829,'Cremona',107,0,NULL),(1830,'Cuneo',107,0,NULL),(1831,'Emilia-Romagna',107,0,NULL),(1832,'Ferrara',107,0,NULL),(1833,'Firenze',107,0,NULL),(1834,'Florence',107,0,NULL),(1835,'Forli-Cesena ',107,0,NULL),(1836,'Friuli-Venezia Giulia',107,0,NULL),(1837,'Frosinone',107,0,NULL),(1838,'Genoa',107,0,NULL),(1839,'Gorizia',107,0,NULL),(1840,'L\'Aquila',107,0,NULL),(1841,'Lazio',107,0,NULL),(1842,'Lecce',107,0,NULL),(1843,'Lecco',107,0,NULL),(1844,'Lecco Province',107,0,NULL),(1845,'Liguria',107,0,NULL),(1846,'Lodi',107,0,NULL),(1847,'Lombardia',107,0,NULL),(1848,'Lombardy',107,0,NULL),(1849,'Macerata',107,0,NULL),(1850,'Mantova',107,0,NULL),(1851,'Marche',107,0,NULL),(1852,'Messina',107,0,NULL),(1853,'Milan',107,0,NULL),(1854,'Modena',107,0,NULL),(1855,'Molise',107,0,NULL),(1856,'Molteno',107,0,NULL),(1857,'Montenegro',107,0,NULL),(1858,'Monza and Brianza',107,0,NULL),(1859,'Naples',107,0,NULL),(1860,'Novara',107,0,NULL),(1861,'Padova',107,0,NULL),(1862,'Parma',107,0,NULL),(1863,'Pavia',107,0,NULL),(1864,'Perugia',107,0,NULL),(1865,'Pesaro-Urbino',107,0,NULL),(1866,'Piacenza',107,0,NULL),(1867,'Piedmont',107,0,NULL),(1868,'Piemonte',107,0,NULL),(1869,'Pisa',107,0,NULL),(1870,'Pordenone',107,0,NULL),(1871,'Potenza',107,0,NULL),(1872,'Puglia',107,0,NULL),(1873,'Reggio Emilia',107,0,NULL),(1874,'Rimini',107,0,NULL),(1875,'Roma',107,0,NULL),(1876,'Salerno',107,0,NULL),(1877,'Sardegna',107,0,NULL),(1878,'Sassari',107,0,NULL),(1879,'Savona',107,0,NULL),(1880,'Sicilia',107,0,NULL),(1881,'Siena',107,0,NULL),(1882,'Sondrio',107,0,NULL),(1883,'South Tyrol',107,0,NULL),(1884,'Taranto',107,0,NULL),(1885,'Teramo',107,0,NULL),(1886,'Torino',107,0,NULL),(1887,'Toscana',107,0,NULL),(1888,'Trapani',107,0,NULL),(1889,'Trentino-Alto Adige',107,0,NULL),(1890,'Trento',107,0,NULL),(1891,'Treviso',107,0,NULL),(1892,'Udine',107,0,NULL),(1893,'Umbria',107,0,NULL),(1894,'Valle d\'Aosta',107,0,NULL),(1895,'Varese',107,0,NULL),(1896,'Veneto',107,0,NULL),(1897,'Venezia',107,0,NULL),(1898,'Verbano-Cusio-Ossola',107,0,NULL),(1899,'Vercelli',107,0,NULL),(1900,'Verona',107,0,NULL),(1901,'Vicenza',107,0,NULL),(1902,'Viterbo',107,0,NULL),(1903,'Buxoro Viloyati',108,0,NULL),(1904,'Clarendon',108,0,NULL),(1905,'Hanover',108,0,NULL),(1906,'Kingston',108,0,NULL),(1907,'Manchester',108,0,NULL),(1908,'Portland',108,0,NULL),(1909,'Saint Andrews',108,0,NULL),(1910,'Saint Ann',108,0,NULL),(1911,'Saint Catherine',108,0,NULL),(1912,'Saint Elizabeth',108,0,NULL),(1913,'Saint James',108,0,NULL),(1914,'Saint Mary',108,0,NULL),(1915,'Saint Thomas',108,0,NULL),(1916,'Trelawney',108,0,NULL),(1917,'Westmoreland',108,0,NULL),(1918,'Aichi',109,0,NULL),(1919,'Akita',109,0,NULL),(1920,'Aomori',109,0,NULL),(1921,'Chiba',109,0,NULL),(1922,'Ehime',109,0,NULL),(1923,'Fukui',109,0,NULL),(1924,'Fukuoka',109,0,NULL),(1925,'Fukushima',109,0,NULL),(1926,'Gifu',109,0,NULL),(1927,'Gumma',109,0,NULL),(1928,'Hiroshima',109,0,NULL),(1929,'Hokkaido',109,0,NULL),(1930,'Hyogo',109,0,NULL),(1931,'Ibaraki',109,0,NULL),(1932,'Ishikawa',109,0,NULL),(1933,'Iwate',109,0,NULL),(1934,'Kagawa',109,0,NULL),(1935,'Kagoshima',109,0,NULL),(1936,'Kanagawa',109,0,NULL),(1937,'Kanto',109,0,NULL),(1938,'Kochi',109,0,NULL),(1939,'Kumamoto',109,0,NULL),(1940,'Kyoto',109,0,NULL),(1941,'Mie',109,0,NULL),(1942,'Miyagi',109,0,NULL),(1943,'Miyazaki',109,0,NULL),(1944,'Nagano',109,0,NULL),(1945,'Nagasaki',109,0,NULL),(1946,'Nara',109,0,NULL),(1947,'Niigata',109,0,NULL),(1948,'Oita',109,0,NULL),(1949,'Okayama',109,0,NULL),(1950,'Okinawa',109,0,NULL),(1951,'Osaka',109,0,NULL),(1952,'Saga',109,0,NULL),(1953,'Saitama',109,0,NULL),(1954,'Shiga',109,0,NULL),(1955,'Shimane',109,0,NULL),(1956,'Shizuoka',109,0,NULL),(1957,'Tochigi',109,0,NULL),(1958,'Tokushima',109,0,NULL),(1959,'Tokyo',109,0,NULL),(1960,'Tottori',109,0,NULL),(1961,'Toyama',109,0,NULL),(1962,'Wakayama',109,0,NULL),(1963,'Yamagata',109,0,NULL),(1964,'Yamaguchi',109,0,NULL),(1965,'Yamanashi',109,0,NULL),(1966,'Grouville',110,0,NULL),(1967,'Saint Brelade',110,0,NULL),(1968,'Saint Clement',110,0,NULL),(1969,'Saint Helier',110,0,NULL),(1970,'Saint John',110,0,NULL),(1971,'Saint Lawrence',110,0,NULL),(1972,'Saint Martin',110,0,NULL),(1973,'Saint Mary',110,0,NULL),(1974,'Saint Peter',110,0,NULL),(1975,'Saint Saviour',110,0,NULL),(1976,'Trinity',110,0,NULL),(1977,'\'Ajlun',111,0,NULL),(1978,'Amman',111,0,NULL),(1979,'Irbid',111,0,NULL),(1980,'Jarash',111,0,NULL),(1981,'Ma\'an',111,0,NULL),(1982,'Madaba',111,0,NULL),(1983,'al-\'Aqabah',111,0,NULL),(1984,'al-Balqa\'',111,0,NULL),(1985,'al-Karak',111,0,NULL),(1986,'al-Mafraq',111,0,NULL),(1987,'at-Tafilah',111,0,NULL),(1988,'az-Zarqa\'',111,0,NULL),(1989,'Akmecet',112,0,NULL),(1990,'Akmola',112,0,NULL),(1991,'Aktobe',112,0,NULL),(1992,'Almati',112,0,NULL),(1993,'Atirau',112,0,NULL),(1994,'Batis Kazakstan',112,0,NULL),(1995,'Burlinsky Region',112,0,NULL),(1996,'Karagandi',112,0,NULL),(1997,'Kostanay',112,0,NULL),(1998,'Mankistau',112,0,NULL),(1999,'Ontustik Kazakstan',112,0,NULL),(2000,'Pavlodar',112,0,NULL),(2001,'Sigis Kazakstan',112,0,NULL),(2002,'Soltustik Kazakstan',112,0,NULL),(2003,'Taraz',112,0,NULL),(2004,'Central',113,0,NULL),(2005,'Coast',113,0,NULL),(2006,'Eastern',113,0,NULL),(2007,'Nairobi',113,0,NULL),(2008,'North Eastern',113,0,NULL),(2009,'Nyanza',113,0,NULL),(2010,'Rift Valley',113,0,NULL),(2011,'Western',113,0,NULL),(2012,'Abaiang',114,0,NULL),(2013,'Abemana',114,0,NULL),(2014,'Aranuka',114,0,NULL),(2015,'Arorae',114,0,NULL),(2016,'Banaba',114,0,NULL),(2017,'Beru',114,0,NULL),(2018,'Butaritari',114,0,NULL),(2019,'Kiritimati',114,0,NULL),(2020,'Kuria',114,0,NULL),(2021,'Maiana',114,0,NULL),(2022,'Makin',114,0,NULL),(2023,'Marakei',114,0,NULL),(2024,'Nikunau',114,0,NULL),(2025,'Nonouti',114,0,NULL),(2026,'Onotoa',114,0,NULL),(2027,'Phoenix Islands',114,0,NULL),(2028,'Tabiteuea North',114,0,NULL),(2029,'Tabiteuea South',114,0,NULL),(2030,'Tabuaeran',114,0,NULL),(2031,'Tamana',114,0,NULL),(2032,'Tarawa North',114,0,NULL),(2033,'Tarawa South',114,0,NULL),(2034,'Teraina',114,0,NULL),(2035,'Chagangdo',115,0,NULL),(2036,'Hamgyeongbukto',115,0,NULL),(2037,'Hamgyeongnamdo',115,0,NULL),(2038,'Hwanghaebukto',115,0,NULL),(2039,'Hwanghaenamdo',115,0,NULL),(2040,'Kaeseong',115,0,NULL),(2041,'Kangweon',115,0,NULL),(2042,'Nampo',115,0,NULL),(2043,'Pyeonganbukto',115,0,NULL),(2044,'Pyeongannamdo',115,0,NULL),(2045,'Pyeongyang',115,0,NULL),(2046,'Yanggang',115,0,NULL),(2047,'Busan',116,0,NULL),(2048,'Cheju',116,0,NULL),(2049,'Chollabuk',116,0,NULL),(2050,'Chollanam',116,0,NULL),(2051,'Chungbuk',116,0,NULL),(2052,'Chungcheongbuk',116,0,NULL),(2053,'Chungcheongnam',116,0,NULL),(2054,'Chungnam',116,0,NULL),(2055,'Daegu',116,0,NULL),(2056,'Gangwon-do',116,0,NULL),(2057,'Goyang-si',116,0,NULL),(2058,'Gyeonggi-do',116,0,NULL),(2059,'Gyeongsang ',116,0,NULL),(2060,'Gyeongsangnam-do',116,0,NULL),(2061,'Incheon',116,0,NULL),(2062,'Jeju-Si',116,0,NULL),(2063,'Jeonbuk',116,0,NULL),(2064,'Kangweon',116,0,NULL),(2065,'Kwangju',116,0,NULL),(2066,'Kyeonggi',116,0,NULL),(2067,'Kyeongsangbuk',116,0,NULL),(2068,'Kyeongsangnam',116,0,NULL),(2069,'Kyonggi-do',116,0,NULL),(2070,'Kyungbuk-Do',116,0,NULL),(2071,'Kyunggi-Do',116,0,NULL),(2072,'Kyunggi-do',116,0,NULL),(2073,'Pusan',116,0,NULL),(2074,'Seoul',116,0,NULL),(2075,'Sudogwon',116,0,NULL),(2076,'Taegu',116,0,NULL),(2077,'Taejeon',116,0,NULL),(2078,'Taejon-gwangyoksi',116,0,NULL),(2079,'Ulsan',116,0,NULL),(2080,'Wonju',116,0,NULL),(2081,'gwangyoksi',116,0,NULL),(2082,'Al Asimah',117,0,NULL),(2083,'Hawalli',117,0,NULL),(2084,'Mishref',117,0,NULL),(2085,'Qadesiya',117,0,NULL),(2086,'Safat',117,0,NULL),(2087,'Salmiya',117,0,NULL),(2088,'al-Ahmadi',117,0,NULL),(2089,'al-Farwaniyah',117,0,NULL),(2090,'al-Jahra',117,0,NULL),(2091,'al-Kuwayt',117,0,NULL),(2092,'Batken',118,0,NULL),(2093,'Bishkek',118,0,NULL),(2094,'Chui',118,0,NULL),(2095,'Issyk-Kul',118,0,NULL),(2096,'Jalal-Abad',118,0,NULL),(2097,'Naryn',118,0,NULL),(2098,'Osh',118,0,NULL),(2099,'Talas',118,0,NULL),(2100,'Attopu',119,0,NULL),(2101,'Bokeo',119,0,NULL),(2102,'Bolikhamsay',119,0,NULL),(2103,'Champasak',119,0,NULL),(2104,'Houaphanh',119,0,NULL),(2105,'Khammouane',119,0,NULL),(2106,'Luang Nam Tha',119,0,NULL),(2107,'Luang Prabang',119,0,NULL),(2108,'Oudomxay',119,0,NULL),(2109,'Phongsaly',119,0,NULL),(2110,'Saravan',119,0,NULL),(2111,'Savannakhet',119,0,NULL),(2112,'Sekong',119,0,NULL),(2113,'Viangchan Prefecture',119,0,NULL),(2114,'Viangchan Province',119,0,NULL),(2115,'Xaignabury',119,0,NULL),(2116,'Xiang Khuang',119,0,NULL),(2117,'Aizkraukles',120,0,NULL),(2118,'Aluksnes',120,0,NULL),(2119,'Balvu',120,0,NULL),(2120,'Bauskas',120,0,NULL),(2121,'Cesu',120,0,NULL),(2122,'Daugavpils',120,0,NULL),(2123,'Daugavpils City',120,0,NULL),(2124,'Dobeles',120,0,NULL),(2125,'Gulbenes',120,0,NULL),(2126,'Jekabspils',120,0,NULL),(2127,'Jelgava',120,0,NULL),(2128,'Jelgavas',120,0,NULL),(2129,'Jurmala City',120,0,NULL),(2130,'Kraslavas',120,0,NULL),(2131,'Kuldigas',120,0,NULL),(2132,'Liepaja',120,0,NULL),(2133,'Liepajas',120,0,NULL),(2134,'Limbazhu',120,0,NULL),(2135,'Ludzas',120,0,NULL),(2136,'Madonas',120,0,NULL),(2137,'Ogres',120,0,NULL),(2138,'Preilu',120,0,NULL),(2139,'Rezekne',120,0,NULL),(2140,'Rezeknes',120,0,NULL),(2141,'Riga',120,0,NULL),(2142,'Rigas',120,0,NULL),(2143,'Saldus',120,0,NULL),(2144,'Talsu',120,0,NULL),(2145,'Tukuma',120,0,NULL),(2146,'Valkas',120,0,NULL),(2147,'Valmieras',120,0,NULL),(2148,'Ventspils',120,0,NULL),(2149,'Ventspils City',120,0,NULL),(2150,'Beirut',121,0,NULL),(2151,'Jabal Lubnan',121,0,NULL),(2152,'Mohafazat Liban-Nord',121,0,NULL),(2153,'Mohafazat Mont-Liban',121,0,NULL),(2154,'Sidon',121,0,NULL),(2155,'al-Biqa',121,0,NULL),(2156,'al-Janub',121,0,NULL),(2157,'an-Nabatiyah',121,0,NULL),(2158,'ash-Shamal',121,0,NULL),(2159,'Berea',122,0,NULL),(2160,'Butha-Buthe',122,0,NULL),(2161,'Leribe',122,0,NULL),(2162,'Mafeteng',122,0,NULL),(2163,'Maseru',122,0,NULL),(2164,'Mohale\'s Hoek',122,0,NULL),(2165,'Mokhotlong',122,0,NULL),(2166,'Qacha\'s Nek',122,0,NULL),(2167,'Quthing',122,0,NULL),(2168,'Thaba-Tseka',122,0,NULL),(2169,'Bomi',123,0,NULL),(2170,'Bong',123,0,NULL),(2171,'Grand Bassa',123,0,NULL),(2172,'Grand Cape Mount',123,0,NULL),(2173,'Grand Gedeh',123,0,NULL),(2174,'Loffa',123,0,NULL),(2175,'Margibi',123,0,NULL),(2176,'Maryland and Grand Kru',123,0,NULL),(2177,'Montserrado',123,0,NULL),(2178,'Nimba',123,0,NULL),(2179,'Rivercess',123,0,NULL),(2180,'Sinoe',123,0,NULL),(2181,'Ajdabiya',124,0,NULL),(2182,'Fezzan',124,0,NULL),(2183,'Banghazi',124,0,NULL),(2184,'Darnah',124,0,NULL),(2185,'Ghadamis',124,0,NULL),(2186,'Gharyan',124,0,NULL),(2187,'Misratah',124,0,NULL),(2188,'Murzuq',124,0,NULL),(2189,'Sabha',124,0,NULL),(2190,'Sawfajjin',124,0,NULL),(2191,'Surt',124,0,NULL),(2192,'Tarabulus',124,0,NULL),(2193,'Tarhunah',124,0,NULL),(2194,'Tripolitania',124,0,NULL),(2195,'Tubruq',124,0,NULL),(2196,'Yafran',124,0,NULL),(2197,'Zlitan',124,0,NULL),(2198,'al-\'Aziziyah',124,0,NULL),(2199,'al-Fatih',124,0,NULL),(2200,'al-Jabal al Akhdar',124,0,NULL),(2201,'al-Jufrah',124,0,NULL),(2202,'al-Khums',124,0,NULL),(2203,'al-Kufrah',124,0,NULL),(2204,'an-Nuqat al-Khams',124,0,NULL),(2205,'ash-Shati\'',124,0,NULL),(2206,'az-Zawiyah',124,0,NULL),(2207,'Balzers',125,0,NULL),(2208,'Eschen',125,0,NULL),(2209,'Gamprin',125,0,NULL),(2210,'Mauren',125,0,NULL),(2211,'Planken',125,0,NULL),(2212,'Ruggell',125,0,NULL),(2213,'Schaan',125,0,NULL),(2214,'Schellenberg',125,0,NULL),(2215,'Triesen',125,0,NULL),(2216,'Triesenberg',125,0,NULL),(2217,'Vaduz',125,0,NULL),(2218,'Alytaus',126,0,NULL),(2219,'Anyksciai',126,0,NULL),(2220,'Kauno',126,0,NULL),(2221,'Klaipedos',126,0,NULL),(2222,'Marijampoles',126,0,NULL),(2223,'Panevezhio',126,0,NULL),(2224,'Panevezys',126,0,NULL),(2225,'Shiauliu',126,0,NULL),(2226,'Taurages',126,0,NULL),(2227,'Telshiu',126,0,NULL),(2228,'Telsiai',126,0,NULL),(2229,'Utenos',126,0,NULL),(2230,'Vilniaus',126,0,NULL),(2231,'Capellen',127,0,NULL),(2232,'Clervaux',127,0,NULL),(2233,'Diekirch',127,0,NULL),(2234,'Echternach',127,0,NULL),(2235,'Esch-sur-Alzette',127,0,NULL),(2236,'Grevenmacher',127,0,NULL),(2237,'Luxembourg',127,0,NULL),(2238,'Mersch',127,0,NULL),(2239,'Redange',127,0,NULL),(2240,'Remich',127,0,NULL),(2241,'Vianden',127,0,NULL),(2242,'Wiltz',127,0,NULL),(2243,'Macau',128,0,NULL),(2244,'Berovo',129,0,NULL),(2245,'Bitola',129,0,NULL),(2246,'Brod',129,0,NULL),(2247,'Debar',129,0,NULL),(2248,'Delchevo',129,0,NULL),(2249,'Demir Hisar',129,0,NULL),(2250,'Gevgelija',129,0,NULL),(2251,'Gostivar',129,0,NULL),(2252,'Kavadarci',129,0,NULL),(2253,'Kichevo',129,0,NULL),(2254,'Kochani',129,0,NULL),(2255,'Kratovo',129,0,NULL),(2256,'Kriva Palanka',129,0,NULL),(2257,'Krushevo',129,0,NULL),(2258,'Kumanovo',129,0,NULL),(2259,'Negotino',129,0,NULL),(2260,'Ohrid',129,0,NULL),(2261,'Prilep',129,0,NULL),(2262,'Probishtip',129,0,NULL),(2263,'Radovish',129,0,NULL),(2264,'Resen',129,0,NULL),(2265,'Shtip',129,0,NULL),(2266,'Skopje',129,0,NULL),(2267,'Struga',129,0,NULL),(2268,'Strumica',129,0,NULL),(2269,'Sveti Nikole',129,0,NULL),(2270,'Tetovo',129,0,NULL),(2271,'Valandovo',129,0,NULL),(2272,'Veles',129,0,NULL),(2273,'Vinica',129,0,NULL),(2274,'Antananarivo',130,0,NULL),(2275,'Antsiranana',130,0,NULL),(2276,'Fianarantsoa',130,0,NULL),(2277,'Mahajanga',130,0,NULL),(2278,'Toamasina',130,0,NULL),(2279,'Toliary',130,0,NULL),(2280,'Balaka',131,0,NULL),(2281,'Blantyre City',131,0,NULL),(2282,'Chikwawa',131,0,NULL),(2283,'Chiradzulu',131,0,NULL),(2284,'Chitipa',131,0,NULL),(2285,'Dedza',131,0,NULL),(2286,'Dowa',131,0,NULL),(2287,'Karonga',131,0,NULL),(2288,'Kasungu',131,0,NULL),(2289,'Lilongwe City',131,0,NULL),(2290,'Machinga',131,0,NULL),(2291,'Mangochi',131,0,NULL),(2292,'Mchinji',131,0,NULL),(2293,'Mulanje',131,0,NULL),(2294,'Mwanza',131,0,NULL),(2295,'Mzimba',131,0,NULL),(2296,'Mzuzu City',131,0,NULL),(2297,'Nkhata Bay',131,0,NULL),(2298,'Nkhotakota',131,0,NULL),(2299,'Nsanje',131,0,NULL),(2300,'Ntcheu',131,0,NULL),(2301,'Ntchisi',131,0,NULL),(2302,'Phalombe',131,0,NULL),(2303,'Rumphi',131,0,NULL),(2304,'Salima',131,0,NULL),(2305,'Thyolo',131,0,NULL),(2306,'Zomba Municipality',131,0,NULL),(2307,'Johor',132,0,NULL),(2308,'Kedah',132,0,NULL),(2309,'Kelantan',132,0,NULL),(2310,'Kuala Lumpur',132,0,NULL),(2311,'Labuan',132,0,NULL),(2312,'Melaka',132,0,NULL),(2313,'Negeri Johor',132,0,NULL),(2314,'Negeri Sembilan',132,0,NULL),(2315,'Pahang',132,0,NULL),(2316,'Penang',132,0,NULL),(2317,'Perak',132,0,NULL),(2318,'Perlis',132,0,NULL),(2319,'Pulau Pinang',132,0,NULL),(2320,'Sabah',132,0,NULL),(2321,'Sarawak',132,0,NULL),(2322,'Selangor',132,0,NULL),(2323,'Sembilan',132,0,NULL),(2324,'Terengganu',132,0,NULL),(2325,'Alif Alif',133,0,NULL),(2326,'Alif Dhaal',133,0,NULL),(2327,'Baa',133,0,NULL),(2328,'Dhaal',133,0,NULL),(2329,'Faaf',133,0,NULL),(2330,'Gaaf Alif',133,0,NULL),(2331,'Gaaf Dhaal',133,0,NULL),(2332,'Ghaviyani',133,0,NULL),(2333,'Haa Alif',133,0,NULL),(2334,'Haa Dhaal',133,0,NULL),(2335,'Kaaf',133,0,NULL),(2336,'Laam',133,0,NULL),(2337,'Lhaviyani',133,0,NULL),(2338,'Male',133,0,NULL),(2339,'Miim',133,0,NULL),(2340,'Nuun',133,0,NULL),(2341,'Raa',133,0,NULL),(2342,'Shaviyani',133,0,NULL),(2343,'Siin',133,0,NULL),(2344,'Thaa',133,0,NULL),(2345,'Vaav',133,0,NULL),(2346,'Bamako',134,0,NULL),(2347,'Gao',134,0,NULL),(2348,'Kayes',134,0,NULL),(2349,'Kidal',134,0,NULL),(2350,'Koulikoro',134,0,NULL),(2351,'Mopti',134,0,NULL),(2352,'Segou',134,0,NULL),(2353,'Sikasso',134,0,NULL),(2354,'Tombouctou',134,0,NULL),(2355,'Gozo and Comino',135,0,NULL),(2356,'Inner Harbour',135,0,NULL),(2357,'Northern',135,0,NULL),(2358,'Outer Harbour',135,0,NULL),(2359,'South Eastern',135,0,NULL),(2360,'Valletta',135,0,NULL),(2361,'Western',135,0,NULL),(2362,'Castletown',136,0,NULL),(2363,'Douglas',136,0,NULL),(2364,'Laxey',136,0,NULL),(2365,'Onchan',136,0,NULL),(2366,'Peel',136,0,NULL),(2367,'Port Erin',136,0,NULL),(2368,'Port Saint Mary',136,0,NULL),(2369,'Ramsey',136,0,NULL),(2370,'Ailinlaplap',137,0,NULL),(2371,'Ailuk',137,0,NULL),(2372,'Arno',137,0,NULL),(2373,'Aur',137,0,NULL),(2374,'Bikini',137,0,NULL),(2375,'Ebon',137,0,NULL),(2376,'Enewetak',137,0,NULL),(2377,'Jabat',137,0,NULL),(2378,'Jaluit',137,0,NULL),(2379,'Kili',137,0,NULL),(2380,'Kwajalein',137,0,NULL),(2381,'Lae',137,0,NULL),(2382,'Lib',137,0,NULL),(2383,'Likiep',137,0,NULL),(2384,'Majuro',137,0,NULL),(2385,'Maloelap',137,0,NULL),(2386,'Mejit',137,0,NULL),(2387,'Mili',137,0,NULL),(2388,'Namorik',137,0,NULL),(2389,'Namu',137,0,NULL),(2390,'Rongelap',137,0,NULL),(2391,'Ujae',137,0,NULL),(2392,'Utrik',137,0,NULL),(2393,'Wotho',137,0,NULL),(2394,'Wotje',137,0,NULL),(2395,'Fort-de-France',138,0,NULL),(2396,'La Trinite',138,0,NULL),(2397,'Le Marin',138,0,NULL),(2398,'Saint-Pierre',138,0,NULL),(2399,'Adrar',139,0,NULL),(2400,'Assaba',139,0,NULL),(2401,'Brakna',139,0,NULL),(2402,'Dhakhlat Nawadibu',139,0,NULL),(2403,'Hudh-al-Gharbi',139,0,NULL),(2404,'Hudh-ash-Sharqi',139,0,NULL),(2405,'Inshiri',139,0,NULL),(2406,'Nawakshut',139,0,NULL),(2407,'Qidimagha',139,0,NULL),(2408,'Qurqul',139,0,NULL),(2409,'Taqant',139,0,NULL),(2410,'Tiris Zammur',139,0,NULL),(2411,'Trarza',139,0,NULL),(2412,'Black River',140,0,NULL),(2413,'Eau Coulee',140,0,NULL),(2414,'Flacq',140,0,NULL),(2415,'Floreal',140,0,NULL),(2416,'Grand Port',140,0,NULL),(2417,'Moka',140,0,NULL),(2418,'Pamplempousses',140,0,NULL),(2419,'Plaines Wilhelm',140,0,NULL),(2420,'Port Louis',140,0,NULL),(2421,'Riviere du Rempart',140,0,NULL),(2422,'Rodrigues',140,0,NULL),(2423,'Rose Hill',140,0,NULL),(2424,'Savanne',140,0,NULL),(2425,'Mayotte',141,0,NULL),(2426,'Pamanzi',141,0,NULL),(2427,'Aguascalientes',142,0,NULL),(2428,'Baja California',142,0,NULL),(2429,'Baja California Sur',142,0,NULL),(2430,'Campeche',142,0,NULL),(2431,'Chiapas',142,0,NULL),(2432,'Chihuahua',142,0,NULL),(2433,'Coahuila',142,0,NULL),(2434,'Colima',142,0,NULL),(2435,'Distrito Federal',142,0,NULL),(2436,'Durango',142,0,NULL),(2437,'Estado de Mexico',142,0,NULL),(2438,'Guanajuato',142,0,NULL),(2439,'Guerrero',142,0,NULL),(2440,'Hidalgo',142,0,NULL),(2441,'Jalisco',142,0,NULL),(2442,'Mexico',142,0,NULL),(2443,'Michoacan',142,0,NULL),(2444,'Morelos',142,0,NULL),(2445,'Nayarit',142,0,NULL),(2446,'Nuevo Leon',142,0,NULL),(2447,'Oaxaca',142,0,NULL),(2448,'Puebla',142,0,NULL),(2449,'Queretaro',142,0,NULL),(2450,'Quintana Roo',142,0,NULL),(2451,'San Luis Potosi',142,0,NULL),(2452,'Sinaloa',142,0,NULL),(2453,'Sonora',142,0,NULL),(2454,'Tabasco',142,0,NULL),(2455,'Tamaulipas',142,0,NULL),(2456,'Tlaxcala',142,0,NULL),(2457,'Veracruz',142,0,NULL),(2458,'Yucatan',142,0,NULL),(2459,'Zacatecas',142,0,NULL),(2460,'Chuuk',143,0,NULL),(2461,'Kusaie',143,0,NULL),(2462,'Pohnpei',143,0,NULL),(2463,'Yap',143,0,NULL),(2464,'Balti',144,0,NULL),(2465,'Cahul',144,0,NULL),(2466,'Chisinau',144,0,NULL),(2467,'Chisinau Oras',144,0,NULL),(2468,'Edinet',144,0,NULL),(2469,'Gagauzia',144,0,NULL),(2470,'Lapusna',144,0,NULL),(2471,'Orhei',144,0,NULL),(2472,'Soroca',144,0,NULL),(2473,'Taraclia',144,0,NULL),(2474,'Tighina',144,0,NULL),(2475,'Transnistria',144,0,NULL),(2476,'Ungheni',144,0,NULL),(2477,'Fontvieille',145,0,NULL),(2478,'La Condamine',145,0,NULL),(2479,'Monaco-Ville',145,0,NULL),(2480,'Monte Carlo',145,0,NULL),(2481,'Arhangaj',146,0,NULL),(2482,'Bajan-Olgij',146,0,NULL),(2483,'Bajanhongor',146,0,NULL),(2484,'Bulgan',146,0,NULL),(2485,'Darhan-Uul',146,0,NULL),(2486,'Dornod',146,0,NULL),(2487,'Dornogovi',146,0,NULL),(2488,'Dundgovi',146,0,NULL),(2489,'Govi-Altaj',146,0,NULL),(2490,'Govisumber',146,0,NULL),(2491,'Hentij',146,0,NULL),(2492,'Hovd',146,0,NULL),(2493,'Hovsgol',146,0,NULL),(2494,'Omnogovi',146,0,NULL),(2495,'Orhon',146,0,NULL),(2496,'Ovorhangaj',146,0,NULL),(2497,'Selenge',146,0,NULL),(2498,'Suhbaatar',146,0,NULL),(2499,'Tov',146,0,NULL),(2500,'Ulaanbaatar',146,0,NULL),(2501,'Uvs',146,0,NULL),(2502,'Zavhan',146,0,NULL),(2503,'Montserrat',147,0,NULL),(2504,'Agadir',148,0,NULL),(2505,'Casablanca',148,0,NULL),(2506,'Chaouia-Ouardigha',148,0,NULL),(2507,'Doukkala-Abda',148,0,NULL),(2508,'Fes-Boulemane',148,0,NULL),(2509,'Gharb-Chrarda-Beni Hssen',148,0,NULL),(2510,'Guelmim',148,0,NULL),(2511,'Kenitra',148,0,NULL),(2512,'Marrakech-Tensift-Al Haouz',148,0,NULL),(2513,'Meknes-Tafilalet',148,0,NULL),(2514,'Oriental',148,0,NULL),(2515,'Oujda',148,0,NULL),(2516,'Province de Tanger',148,0,NULL),(2517,'Rabat-Sale-Zammour-Zaer',148,0,NULL),(2518,'Sala Al Jadida',148,0,NULL),(2519,'Settat',148,0,NULL),(2520,'Souss Massa-Draa',148,0,NULL),(2521,'Tadla-Azilal',148,0,NULL),(2522,'Tangier-Tetouan',148,0,NULL),(2523,'Taza-Al Hoceima-Taounate',148,0,NULL),(2524,'Wilaya de Casablanca',148,0,NULL),(2525,'Wilaya de Rabat-Sale',148,0,NULL),(2526,'Cabo Delgado',149,0,NULL),(2527,'Gaza',149,0,NULL),(2528,'Inhambane',149,0,NULL),(2529,'Manica',149,0,NULL),(2530,'Maputo',149,0,NULL),(2531,'Maputo Provincia',149,0,NULL),(2532,'Nampula',149,0,NULL),(2533,'Niassa',149,0,NULL),(2534,'Sofala',149,0,NULL),(2535,'Tete',149,0,NULL),(2536,'Zambezia',149,0,NULL),(2537,'Ayeyarwady',150,0,NULL),(2538,'Bago',150,0,NULL),(2539,'Chin',150,0,NULL),(2540,'Kachin',150,0,NULL),(2541,'Kayah',150,0,NULL),(2542,'Kayin',150,0,NULL),(2543,'Magway',150,0,NULL),(2544,'Mandalay',150,0,NULL),(2545,'Mon',150,0,NULL),(2546,'Nay Pyi Taw',150,0,NULL),(2547,'Rakhine',150,0,NULL),(2548,'Sagaing',150,0,NULL),(2549,'Shan',150,0,NULL),(2550,'Tanintharyi',150,0,NULL),(2551,'Yangon',150,0,NULL),(2552,'Caprivi',151,0,NULL),(2553,'Erongo',151,0,NULL),(2554,'Hardap',151,0,NULL),(2555,'Karas',151,0,NULL),(2556,'Kavango',151,0,NULL),(2557,'Khomas',151,0,NULL),(2558,'Kunene',151,0,NULL),(2559,'Ohangwena',151,0,NULL),(2560,'Omaheke',151,0,NULL),(2561,'Omusati',151,0,NULL),(2562,'Oshana',151,0,NULL),(2563,'Oshikoto',151,0,NULL),(2564,'Otjozondjupa',151,0,NULL),(2565,'Yaren',152,0,NULL),(2566,'Bagmati',153,0,NULL),(2567,'Bheri',153,0,NULL),(2568,'Dhawalagiri',153,0,NULL),(2569,'Gandaki',153,0,NULL),(2570,'Janakpur',153,0,NULL),(2571,'Karnali',153,0,NULL),(2572,'Koshi',153,0,NULL),(2573,'Lumbini',153,0,NULL),(2574,'Mahakali',153,0,NULL),(2575,'Mechi',153,0,NULL),(2576,'Narayani',153,0,NULL),(2577,'Rapti',153,0,NULL),(2578,'Sagarmatha',153,0,NULL),(2579,'Seti',153,0,NULL),(2580,'Bonaire',154,0,NULL),(2581,'Curacao',154,0,NULL),(2582,'Saba',154,0,NULL),(2583,'Sint Eustatius',154,0,NULL),(2584,'Sint Maarten',154,0,NULL),(2585,'Amsterdam',155,0,NULL),(2586,'Benelux',155,0,NULL),(2587,'Drenthe',155,0,NULL),(2588,'Flevoland',155,0,NULL),(2589,'Friesland',155,0,NULL),(2590,'Gelderland',155,0,NULL),(2591,'Groningen',155,0,NULL),(2592,'Limburg',155,0,NULL),(2593,'Noord-Brabant',155,0,NULL),(2594,'Noord-Holland',155,0,NULL),(2595,'Overijssel',155,0,NULL),(2596,'South Holland',155,0,NULL),(2597,'Utrecht',155,0,NULL),(2598,'Zeeland',155,0,NULL),(2599,'Zuid-Holland',155,0,NULL),(2600,'Iles',156,0,NULL),(2601,'Nord',156,0,NULL),(2602,'Sud',156,0,NULL),(2603,'Area Outside Region',157,0,NULL),(2604,'Auckland',157,0,NULL),(2605,'Bay of Plenty',157,0,NULL),(2606,'Canterbury',157,0,NULL),(2607,'Christchurch',157,0,NULL),(2608,'Gisborne',157,0,NULL),(2609,'Hawke\'s Bay',157,0,NULL),(2610,'Manawatu-Wanganui',157,0,NULL),(2611,'Marlborough',157,0,NULL),(2612,'Nelson',157,0,NULL),(2613,'Northland',157,0,NULL),(2614,'Otago',157,0,NULL),(2615,'Rodney',157,0,NULL),(2616,'Southland',157,0,NULL),(2617,'Taranaki',157,0,NULL),(2618,'Tasman',157,0,NULL),(2619,'Waikato',157,0,NULL),(2620,'Wellington',157,0,NULL),(2621,'West Coast',157,0,NULL),(2622,'Atlantico Norte',158,0,NULL),(2623,'Atlantico Sur',158,0,NULL),(2624,'Boaco',158,0,NULL),(2625,'Carazo',158,0,NULL),(2626,'Chinandega',158,0,NULL),(2627,'Chontales',158,0,NULL),(2628,'Esteli',158,0,NULL),(2629,'Granada',158,0,NULL),(2630,'Jinotega',158,0,NULL),(2631,'Leon',158,0,NULL),(2632,'Madriz',158,0,NULL),(2633,'Managua',158,0,NULL),(2634,'Masaya',158,0,NULL),(2635,'Matagalpa',158,0,NULL),(2636,'Nueva Segovia',158,0,NULL),(2637,'Rio San Juan',158,0,NULL),(2638,'Rivas',158,0,NULL),(2639,'Agadez',159,0,NULL),(2640,'Diffa',159,0,NULL),(2641,'Dosso',159,0,NULL),(2642,'Maradi',159,0,NULL),(2643,'Niamey',159,0,NULL),(2644,'Tahoua',159,0,NULL),(2645,'Tillabery',159,0,NULL),(2646,'Zinder',159,0,NULL),(2647,'Abia',160,0,NULL),(2648,'Abuja Federal Capital Territor',160,0,NULL),(2649,'Adamawa',160,0,NULL),(2650,'Akwa Ibom',160,0,NULL),(2651,'Anambra',160,0,NULL),(2652,'Bauchi',160,0,NULL),(2653,'Bayelsa',160,0,NULL),(2654,'Benue',160,0,NULL),(2655,'Borno',160,0,NULL),(2656,'Cross River',160,0,NULL),(2657,'Delta',160,0,NULL),(2658,'Ebonyi',160,0,NULL),(2659,'Edo',160,0,NULL),(2660,'Ekiti',160,0,NULL),(2661,'Enugu',160,0,NULL),(2662,'Gombe',160,0,NULL),(2663,'Imo',160,0,NULL),(2664,'Jigawa',160,0,NULL),(2665,'Kaduna',160,0,NULL),(2666,'Kano',160,0,NULL),(2667,'Katsina',160,0,NULL),(2668,'Kebbi',160,0,NULL),(2669,'Kogi',160,0,NULL),(2670,'Kwara',160,0,NULL),(2671,'Lagos',160,0,NULL),(2672,'Nassarawa',160,0,NULL),(2673,'Niger',160,0,NULL),(2674,'Ogun',160,0,NULL),(2675,'Ondo',160,0,NULL),(2676,'Osun',160,0,NULL),(2677,'Oyo',160,0,NULL),(2678,'Plateau',160,0,NULL),(2679,'Rivers',160,0,NULL),(2680,'Sokoto',160,0,NULL),(2681,'Taraba',160,0,NULL),(2682,'Yobe',160,0,NULL),(2683,'Zamfara',160,0,NULL),(2684,'Niue',161,0,NULL),(2685,'Norfolk Island',162,0,NULL),(2686,'Northern Islands',163,0,NULL),(2687,'Rota',163,0,NULL),(2688,'Saipan',163,0,NULL),(2689,'Tinian',163,0,NULL),(2690,'Akershus',164,0,NULL),(2691,'Aust Agder',164,0,NULL),(2692,'Bergen',164,0,NULL),(2693,'Buskerud',164,0,NULL),(2694,'Finnmark',164,0,NULL),(2695,'Hedmark',164,0,NULL),(2696,'Hordaland',164,0,NULL),(2697,'Moere og Romsdal',164,0,NULL),(2698,'Nord Trondelag',164,0,NULL),(2699,'Nordland',164,0,NULL),(2700,'Oestfold',164,0,NULL),(2701,'Oppland',164,0,NULL),(2702,'Oslo',164,0,NULL),(2703,'Rogaland',164,0,NULL),(2704,'Soer Troendelag',164,0,NULL),(2705,'Sogn og Fjordane',164,0,NULL),(2706,'Stavern',164,0,NULL),(2707,'Sykkylven',164,0,NULL),(2708,'Telemark',164,0,NULL),(2709,'Troms',164,0,NULL),(2710,'Vest Agder',164,0,NULL),(2711,'Vestfold',164,0,NULL),(2712,'ÃƒÂ˜stfold',164,0,NULL),(2713,'Al Buraimi',165,0,NULL),(2714,'Dhufar',165,0,NULL),(2715,'Masqat',165,0,NULL),(2716,'Musandam',165,0,NULL),(2717,'Rusayl',165,0,NULL),(2718,'Wadi Kabir',165,0,NULL),(2719,'ad-Dakhiliyah',165,0,NULL),(2720,'adh-Dhahirah',165,0,NULL),(2721,'al-Batinah',165,0,NULL),(2722,'ash-Sharqiyah',165,0,NULL),(2723,'Baluchistan',166,0,NULL),(2724,'Federal Capital Area',166,0,NULL),(2725,'Federally administered Tribal ',166,0,NULL),(2726,'North-West Frontier',166,0,NULL),(2727,'Northern Areas',166,0,NULL),(2728,'Punjab',166,0,NULL),(2729,'Sind',166,0,NULL),(2730,'Aimeliik',167,0,NULL),(2731,'Airai',167,0,NULL),(2732,'Angaur',167,0,NULL),(2733,'Hatobohei',167,0,NULL),(2734,'Kayangel',167,0,NULL),(2735,'Koror',167,0,NULL),(2736,'Melekeok',167,0,NULL),(2737,'Ngaraard',167,0,NULL),(2738,'Ngardmau',167,0,NULL),(2739,'Ngaremlengui',167,0,NULL),(2740,'Ngatpang',167,0,NULL),(2741,'Ngchesar',167,0,NULL),(2742,'Ngerchelong',167,0,NULL),(2743,'Ngiwal',167,0,NULL),(2744,'Peleliu',167,0,NULL),(2745,'Sonsorol',167,0,NULL),(2746,'Ariha',168,0,NULL),(2747,'Bayt Lahm',168,0,NULL),(2748,'Bethlehem',168,0,NULL),(2749,'Dayr-al-Balah',168,0,NULL),(2750,'Ghazzah',168,0,NULL),(2751,'Ghazzah ash-Shamaliyah',168,0,NULL),(2752,'Janin',168,0,NULL),(2753,'Khan Yunis',168,0,NULL),(2754,'Nabulus',168,0,NULL),(2755,'Qalqilyah',168,0,NULL),(2756,'Rafah',168,0,NULL),(2757,'Ram Allah wal-Birah',168,0,NULL),(2758,'Salfit',168,0,NULL),(2759,'Tubas',168,0,NULL),(2760,'Tulkarm',168,0,NULL),(2761,'al-Khalil',168,0,NULL),(2762,'al-Quds',168,0,NULL),(2763,'Bocas del Toro',169,0,NULL),(2764,'Chiriqui',169,0,NULL),(2765,'Cocle',169,0,NULL),(2766,'Colon',169,0,NULL),(2767,'Darien',169,0,NULL),(2768,'Embera',169,0,NULL),(2769,'Herrera',169,0,NULL),(2770,'Kuna Yala',169,0,NULL),(2771,'Los Santos',169,0,NULL),(2772,'Ngobe Bugle',169,0,NULL),(2773,'Panama',169,0,NULL),(2774,'Veraguas',169,0,NULL),(2775,'East New Britain',170,0,NULL),(2776,'East Sepik',170,0,NULL),(2777,'Eastern Highlands',170,0,NULL),(2778,'Enga',170,0,NULL),(2779,'Fly River',170,0,NULL),(2780,'Gulf',170,0,NULL),(2781,'Madang',170,0,NULL),(2782,'Manus',170,0,NULL),(2783,'Milne Bay',170,0,NULL),(2784,'Morobe',170,0,NULL),(2785,'National Capital District',170,0,NULL),(2786,'New Ireland',170,0,NULL),(2787,'North Solomons',170,0,NULL),(2788,'Oro',170,0,NULL),(2789,'Sandaun',170,0,NULL),(2790,'Simbu',170,0,NULL),(2791,'Southern Highlands',170,0,NULL),(2792,'West New Britain',170,0,NULL),(2793,'Western Highlands',170,0,NULL),(2794,'Alto Paraguay',171,0,NULL),(2795,'Alto Parana',171,0,NULL),(2796,'Amambay',171,0,NULL),(2797,'Asuncion',171,0,NULL),(2798,'Boqueron',171,0,NULL),(2799,'Caaguazu',171,0,NULL),(2800,'Caazapa',171,0,NULL),(2801,'Canendiyu',171,0,NULL),(2802,'Central',171,0,NULL),(2803,'Concepcion',171,0,NULL),(2804,'Cordillera',171,0,NULL),(2805,'Guaira',171,0,NULL),(2806,'Itapua',171,0,NULL),(2807,'Misiones',171,0,NULL),(2808,'Neembucu',171,0,NULL),(2809,'Paraguari',171,0,NULL),(2810,'Presidente Hayes',171,0,NULL),(2811,'San Pedro',171,0,NULL),(2812,'Amazonas',172,0,NULL),(2813,'Ancash',172,0,NULL),(2814,'Apurimac',172,0,NULL),(2815,'Arequipa',172,0,NULL),(2816,'Ayacucho',172,0,NULL),(2817,'Cajamarca',172,0,NULL),(2818,'Cusco',172,0,NULL),(2819,'Huancavelica',172,0,NULL),(2820,'Huanuco',172,0,NULL),(2821,'Ica',172,0,NULL),(2822,'Junin',172,0,NULL),(2823,'La Libertad',172,0,NULL),(2824,'Lambayeque',172,0,NULL),(2825,'Lima y Callao',172,0,NULL),(2826,'Loreto',172,0,NULL),(2827,'Madre de Dios',172,0,NULL),(2828,'Moquegua',172,0,NULL),(2829,'Pasco',172,0,NULL),(2830,'Piura',172,0,NULL),(2831,'Puno',172,0,NULL),(2832,'San Martin',172,0,NULL),(2833,'Tacna',172,0,NULL),(2834,'Tumbes',172,0,NULL),(2835,'Ucayali',172,0,NULL),(2836,'Batangas',173,0,NULL),(2837,'Bicol',173,0,NULL),(2838,'Bulacan',173,0,NULL),(2839,'Cagayan',173,0,NULL),(2840,'Caraga',173,0,NULL),(2841,'Central Luzon',173,0,NULL),(2842,'Central Mindanao',173,0,NULL),(2843,'Central Visayas',173,0,NULL),(2844,'Cordillera',173,0,NULL),(2845,'Davao',173,0,NULL),(2846,'Eastern Visayas',173,0,NULL),(2847,'Greater Metropolitan Area',173,0,NULL),(2848,'Ilocos',173,0,NULL),(2849,'Laguna',173,0,NULL),(2850,'Luzon',173,0,NULL),(2851,'Mactan',173,0,NULL),(2852,'Metropolitan Manila Area',173,0,NULL),(2853,'Muslim Mindanao',173,0,NULL),(2854,'Northern Mindanao',173,0,NULL),(2855,'Southern Mindanao',173,0,NULL),(2856,'Southern Tagalog',173,0,NULL),(2857,'Western Mindanao',173,0,NULL),(2858,'Western Visayas',173,0,NULL),(2859,'Pitcairn Island',174,0,NULL),(2860,'Biale Blota',175,0,NULL),(2861,'Dobroszyce',175,0,NULL),(2862,'Dolnoslaskie',175,0,NULL),(2863,'Dziekanow Lesny',175,0,NULL),(2864,'Hopowo',175,0,NULL),(2865,'Kartuzy',175,0,NULL),(2866,'Koscian',175,0,NULL),(2867,'Krakow',175,0,NULL),(2868,'Kujawsko-Pomorskie',175,0,NULL),(2869,'Lodzkie',175,0,NULL),(2870,'Lubelskie',175,0,NULL),(2871,'Lubuskie',175,0,NULL),(2872,'Malomice',175,0,NULL),(2873,'Malopolskie',175,0,NULL),(2874,'Mazowieckie',175,0,NULL),(2875,'Mirkow',175,0,NULL),(2876,'Opolskie',175,0,NULL),(2877,'Ostrowiec',175,0,NULL),(2878,'Podkarpackie',175,0,NULL),(2879,'Podlaskie',175,0,NULL),(2880,'Polska',175,0,NULL),(2881,'Pomorskie',175,0,NULL),(2882,'Poznan',175,0,NULL),(2883,'Pruszkow',175,0,NULL),(2884,'Rymanowska',175,0,NULL),(2885,'Rzeszow',175,0,NULL),(2886,'Slaskie',175,0,NULL),(2887,'Stare Pole',175,0,NULL),(2888,'Swietokrzyskie',175,0,NULL),(2889,'Warminsko-Mazurskie',175,0,NULL),(2890,'Warsaw',175,0,NULL),(2891,'Wejherowo',175,0,NULL),(2892,'Wielkopolskie',175,0,NULL),(2893,'Wroclaw',175,0,NULL),(2894,'Zachodnio-Pomorskie',175,0,NULL),(2895,'Zukowo',175,0,NULL),(2896,'Abrantes',176,0,NULL),(2897,'Acores',176,0,NULL),(2898,'Alentejo',176,0,NULL),(2899,'Algarve',176,0,NULL),(2900,'Braga',176,0,NULL),(2901,'Centro',176,0,NULL),(2902,'Distrito de Leiria',176,0,NULL),(2903,'Distrito de Viana do Castelo',176,0,NULL),(2904,'Distrito de Vila Real',176,0,NULL),(2905,'Distrito do Porto',176,0,NULL),(2906,'Lisboa e Vale do Tejo',176,0,NULL),(2907,'Madeira',176,0,NULL),(2908,'Norte',176,0,NULL),(2909,'Paivas',176,0,NULL),(2910,'Arecibo',177,0,NULL),(2911,'Bayamon',177,0,NULL),(2912,'Carolina',177,0,NULL),(2913,'Florida',177,0,NULL),(2914,'Guayama',177,0,NULL),(2915,'Humacao',177,0,NULL),(2916,'Mayaguez-Aguadilla',177,0,NULL),(2917,'Ponce',177,0,NULL),(2918,'Salinas',177,0,NULL),(2919,'San Juan',177,0,NULL),(2920,'Doha',178,0,NULL),(2921,'Jarian-al-Batnah',178,0,NULL),(2922,'Umm Salal',178,0,NULL),(2923,'ad-Dawhah',178,0,NULL),(2924,'al-Ghuwayriyah',178,0,NULL),(2925,'al-Jumayliyah',178,0,NULL),(2926,'al-Khawr',178,0,NULL),(2927,'al-Wakrah',178,0,NULL),(2928,'ar-Rayyan',178,0,NULL),(2929,'ash-Shamal',178,0,NULL),(2930,'Saint-Benoit',179,0,NULL),(2931,'Saint-Denis',179,0,NULL),(2932,'Saint-Paul',179,0,NULL),(2933,'Saint-Pierre',179,0,NULL),(2934,'Alba',180,0,NULL),(2935,'Arad',180,0,NULL),(2936,'Arges',180,0,NULL),(2937,'Bacau',180,0,NULL),(2938,'Bihor',180,0,NULL),(2939,'Bistrita-Nasaud',180,0,NULL),(2940,'Botosani',180,0,NULL),(2941,'Braila',180,0,NULL),(2942,'Brasov',180,0,NULL),(2943,'Bucuresti',180,0,NULL),(2944,'Buzau',180,0,NULL),(2945,'Calarasi',180,0,NULL),(2946,'Caras-Severin',180,0,NULL),(2947,'Cluj',180,0,NULL),(2948,'Constanta',180,0,NULL),(2949,'Covasna',180,0,NULL),(2950,'Dambovita',180,0,NULL),(2951,'Dolj',180,0,NULL),(2952,'Galati',180,0,NULL),(2953,'Giurgiu',180,0,NULL),(2954,'Gorj',180,0,NULL),(2955,'Harghita',180,0,NULL),(2956,'Hunedoara',180,0,NULL),(2957,'Ialomita',180,0,NULL),(2958,'Iasi',180,0,NULL),(2959,'Ilfov',180,0,NULL),(2960,'Maramures',180,0,NULL),(2961,'Mehedinti',180,0,NULL),(2962,'Mures',180,0,NULL),(2963,'Neamt',180,0,NULL),(2964,'Olt',180,0,NULL),(2965,'Prahova',180,0,NULL),(2966,'Salaj',180,0,NULL),(2967,'Satu Mare',180,0,NULL),(2968,'Sibiu',180,0,NULL),(2969,'Sondelor',180,0,NULL),(2970,'Suceava',180,0,NULL),(2971,'Teleorman',180,0,NULL),(2972,'Timis',180,0,NULL),(2973,'Tulcea',180,0,NULL),(2974,'Valcea',180,0,NULL),(2975,'Vaslui',180,0,NULL),(2976,'Vrancea',180,0,NULL),(2977,'Adygeja',181,0,NULL),(2978,'Aga',181,0,NULL),(2979,'Alanija',181,0,NULL),(2980,'Altaj',181,0,NULL),(2981,'Amur',181,0,NULL),(2982,'Arhangelsk',181,0,NULL),(2983,'Astrahan',181,0,NULL),(2984,'Bashkortostan',181,0,NULL),(2985,'Belgorod',181,0,NULL),(2986,'Brjansk',181,0,NULL),(2987,'Burjatija',181,0,NULL),(2988,'Chechenija',181,0,NULL),(2989,'Cheljabinsk',181,0,NULL),(2990,'Chita',181,0,NULL),(2991,'Chukotka',181,0,NULL),(2992,'Chuvashija',181,0,NULL),(2993,'Dagestan',181,0,NULL),(2994,'Evenkija',181,0,NULL),(2995,'Gorno-Altaj',181,0,NULL),(2996,'Habarovsk',181,0,NULL),(2997,'Hakasija',181,0,NULL),(2998,'Hanty-Mansija',181,0,NULL),(2999,'Ingusetija',181,0,NULL),(3000,'Irkutsk',181,0,NULL),(3001,'Ivanovo',181,0,NULL),(3002,'Jamalo-Nenets',181,0,NULL),(3003,'Jaroslavl',181,0,NULL),(3004,'Jevrej',181,0,NULL),(3005,'Kabardino-Balkarija',181,0,NULL),(3006,'Kaliningrad',181,0,NULL),(3007,'Kalmykija',181,0,NULL),(3008,'Kaluga',181,0,NULL),(3009,'Kamchatka',181,0,NULL),(3010,'Karachaj-Cherkessija',181,0,NULL),(3011,'Karelija',181,0,NULL),(3012,'Kemerovo',181,0,NULL),(3013,'Khabarovskiy Kray',181,0,NULL),(3014,'Kirov',181,0,NULL),(3015,'Komi',181,0,NULL),(3016,'Komi-Permjakija',181,0,NULL),(3017,'Korjakija',181,0,NULL),(3018,'Kostroma',181,0,NULL),(3019,'Krasnodar',181,0,NULL),(3020,'Krasnojarsk',181,0,NULL),(3021,'Krasnoyarskiy Kray',181,0,NULL),(3022,'Kurgan',181,0,NULL),(3023,'Kursk',181,0,NULL),(3024,'Leningrad',181,0,NULL),(3025,'Lipeck',181,0,NULL),(3026,'Magadan',181,0,NULL),(3027,'Marij El',181,0,NULL),(3028,'Mordovija',181,0,NULL),(3029,'Moscow',181,0,NULL),(3030,'Moskovskaja Oblast',181,0,NULL),(3031,'Moskovskaya Oblast',181,0,NULL),(3032,'Moskva',181,0,NULL),(3033,'Murmansk',181,0,NULL),(3034,'Nenets',181,0,NULL),(3035,'Nizhnij Novgorod',181,0,NULL),(3036,'Novgorod',181,0,NULL),(3037,'Novokusnezk',181,0,NULL),(3038,'Novosibirsk',181,0,NULL),(3039,'Omsk',181,0,NULL),(3040,'Orenburg',181,0,NULL),(3041,'Orjol',181,0,NULL),(3042,'Penza',181,0,NULL),(3043,'Perm',181,0,NULL),(3044,'Primorje',181,0,NULL),(3045,'Pskov',181,0,NULL),(3046,'Pskovskaya Oblast',181,0,NULL),(3047,'Rjazan',181,0,NULL),(3048,'Rostov',181,0,NULL),(3049,'Saha',181,0,NULL),(3050,'Sahalin',181,0,NULL),(3051,'Samara',181,0,NULL),(3052,'Samarskaya',181,0,NULL),(3053,'Sankt-Peterburg',181,0,NULL),(3054,'Saratov',181,0,NULL),(3055,'Smolensk',181,0,NULL),(3056,'Stavropol',181,0,NULL),(3057,'Sverdlovsk',181,0,NULL),(3058,'Tajmyrija',181,0,NULL),(3059,'Tambov',181,0,NULL),(3060,'Tatarstan',181,0,NULL),(3061,'Tjumen',181,0,NULL),(3062,'Tomsk',181,0,NULL),(3063,'Tula',181,0,NULL),(3064,'Tver',181,0,NULL),(3065,'Tyva',181,0,NULL),(3066,'Udmurtija',181,0,NULL),(3067,'Uljanovsk',181,0,NULL),(3068,'Ulyanovskaya Oblast',181,0,NULL),(3069,'Ust-Orda',181,0,NULL),(3070,'Vladimir',181,0,NULL),(3071,'Volgograd',181,0,NULL),(3072,'Vologda',181,0,NULL),(3073,'Voronezh',181,0,NULL),(3074,'Butare',182,0,NULL),(3075,'Byumba',182,0,NULL),(3076,'Cyangugu',182,0,NULL),(3077,'Gikongoro',182,0,NULL),(3078,'Gisenyi',182,0,NULL),(3079,'Gitarama',182,0,NULL),(3080,'Kibungo',182,0,NULL),(3081,'Kibuye',182,0,NULL),(3082,'Kigali-ngali',182,0,NULL),(3083,'Ruhengeri',182,0,NULL),(3084,'Ascension',183,0,NULL),(3085,'Gough Island',183,0,NULL),(3086,'Saint Helena',183,0,NULL),(3087,'Tristan da Cunha',183,0,NULL),(3088,'Christ Church Nichola Town',184,0,NULL),(3089,'Saint Anne Sandy Point',184,0,NULL),(3090,'Saint George Basseterre',184,0,NULL),(3091,'Saint George Gingerland',184,0,NULL),(3092,'Saint James Windward',184,0,NULL),(3093,'Saint John Capesterre',184,0,NULL),(3094,'Saint John Figtree',184,0,NULL),(3095,'Saint Mary Cayon',184,0,NULL),(3096,'Saint Paul Capesterre',184,0,NULL),(3097,'Saint Paul Charlestown',184,0,NULL),(3098,'Saint Peter Basseterre',184,0,NULL),(3099,'Saint Thomas Lowland',184,0,NULL),(3100,'Saint Thomas Middle Island',184,0,NULL),(3101,'Trinity Palmetto Point',184,0,NULL),(3102,'Anse-la-Raye',185,0,NULL),(3103,'Canaries',185,0,NULL),(3104,'Castries',185,0,NULL),(3105,'Choiseul',185,0,NULL),(3106,'Dennery',185,0,NULL),(3107,'Gros Inlet',185,0,NULL),(3108,'Laborie',185,0,NULL),(3109,'Micoud',185,0,NULL),(3110,'Soufriere',185,0,NULL),(3111,'Vieux Fort',185,0,NULL),(3112,'Miquelon-Langlade',186,0,NULL),(3113,'Saint-Pierre',186,0,NULL),(3114,'Charlotte',187,0,NULL),(3115,'Grenadines',187,0,NULL),(3116,'Saint Andrew',187,0,NULL),(3117,'Saint David',187,0,NULL),(3118,'Saint George',187,0,NULL),(3119,'Saint Patrick',187,0,NULL),(3120,'A\'ana',188,0,NULL),(3121,'Aiga-i-le-Tai',188,0,NULL),(3122,'Atua',188,0,NULL),(3123,'Fa\'asaleleaga',188,0,NULL),(3124,'Gaga\'emauga',188,0,NULL),(3125,'Gagaifomauga',188,0,NULL),(3126,'Palauli',188,0,NULL),(3127,'Satupa\'itea',188,0,NULL),(3128,'Tuamasaga',188,0,NULL),(3129,'Va\'a-o-Fonoti',188,0,NULL),(3130,'Vaisigano',188,0,NULL),(3131,'Acquaviva',189,0,NULL),(3132,'Borgo Maggiore',189,0,NULL),(3133,'Chiesanuova',189,0,NULL),(3134,'Domagnano',189,0,NULL),(3135,'Faetano',189,0,NULL),(3136,'Fiorentino',189,0,NULL),(3137,'Montegiardino',189,0,NULL),(3138,'San Marino',189,0,NULL),(3139,'Serravalle',189,0,NULL),(3140,'Agua Grande',190,0,NULL),(3141,'Cantagalo',190,0,NULL),(3142,'Lemba',190,0,NULL),(3143,'Lobata',190,0,NULL),(3144,'Me-Zochi',190,0,NULL),(3145,'Pague',190,0,NULL),(3146,'Al Khobar',191,0,NULL),(3147,'Aseer',191,0,NULL),(3148,'Ash Sharqiyah',191,0,NULL),(3149,'Asir',191,0,NULL),(3150,'Central Province',191,0,NULL),(3151,'Eastern Province',191,0,NULL),(3152,'Ha\'il',191,0,NULL),(3153,'Jawf',191,0,NULL),(3154,'Jizan',191,0,NULL),(3155,'Makkah',191,0,NULL),(3156,'Najran',191,0,NULL),(3157,'Qasim',191,0,NULL),(3158,'Tabuk',191,0,NULL),(3159,'Western Province',191,0,NULL),(3160,'al-Bahah',191,0,NULL),(3161,'al-Hudud-ash-Shamaliyah',191,0,NULL),(3162,'al-Madinah',191,0,NULL),(3163,'ar-Riyad',191,0,NULL),(3164,'Dakar',192,0,NULL),(3165,'Diourbel',192,0,NULL),(3166,'Fatick',192,0,NULL),(3167,'Kaolack',192,0,NULL),(3168,'Kolda',192,0,NULL),(3169,'Louga',192,0,NULL),(3170,'Saint-Louis',192,0,NULL),(3171,'Tambacounda',192,0,NULL),(3172,'Thies',192,0,NULL),(3173,'Ziguinchor',192,0,NULL),(3174,'Central Serbia',193,0,NULL),(3175,'Kosovo and Metohija',193,0,NULL),(3176,'Vojvodina',193,0,NULL),(3177,'Anse Boileau',194,0,NULL),(3178,'Anse Royale',194,0,NULL),(3179,'Cascade',194,0,NULL),(3180,'Takamaka',194,0,NULL),(3181,'Victoria',194,0,NULL),(3182,'Eastern',195,0,NULL),(3183,'Northern',195,0,NULL),(3184,'Southern',195,0,NULL),(3185,'Western',195,0,NULL),(3186,'Singapore',196,0,NULL),(3187,'Banskobystricky',197,0,NULL),(3188,'Bratislavsky',197,0,NULL),(3189,'Kosicky',197,0,NULL),(3190,'Nitriansky',197,0,NULL),(3191,'Presovsky',197,0,NULL),(3192,'Trenciansky',197,0,NULL),(3193,'Trnavsky',197,0,NULL),(3194,'Zilinsky',197,0,NULL),(3195,'Benedikt',198,0,NULL),(3196,'Gorenjska',198,0,NULL),(3197,'Gorishka',198,0,NULL),(3198,'Jugovzhodna Slovenija',198,0,NULL),(3199,'Koroshka',198,0,NULL),(3200,'Notranjsko-krashka',198,0,NULL),(3201,'Obalno-krashka',198,0,NULL),(3202,'Obcina Domzale',198,0,NULL),(3203,'Obcina Vitanje',198,0,NULL),(3204,'Osrednjeslovenska',198,0,NULL),(3205,'Podravska',198,0,NULL),(3206,'Pomurska',198,0,NULL),(3207,'Savinjska',198,0,NULL),(3208,'Slovenian Littoral',198,0,NULL),(3209,'Spodnjeposavska',198,0,NULL),(3210,'Zasavska',198,0,NULL),(3211,'Pitcairn',199,0,NULL),(3212,'Central',200,0,NULL),(3213,'Choiseul',200,0,NULL),(3214,'Guadalcanal',200,0,NULL),(3215,'Isabel',200,0,NULL),(3216,'Makira and Ulawa',200,0,NULL),(3217,'Malaita',200,0,NULL),(3218,'Rennell and Bellona',200,0,NULL),(3219,'Temotu',200,0,NULL),(3220,'Western',200,0,NULL),(3221,'Awdal',201,0,NULL),(3222,'Bakol',201,0,NULL),(3223,'Banadir',201,0,NULL),(3224,'Bari',201,0,NULL),(3225,'Bay',201,0,NULL),(3226,'Galgudug',201,0,NULL),(3227,'Gedo',201,0,NULL),(3228,'Hiran',201,0,NULL),(3229,'Jubbada Hose',201,0,NULL),(3230,'Jubbadha Dexe',201,0,NULL),(3231,'Mudug',201,0,NULL),(3232,'Nugal',201,0,NULL),(3233,'Sanag',201,0,NULL),(3234,'Shabellaha Dhexe',201,0,NULL),(3235,'Shabellaha Hose',201,0,NULL),(3236,'Togdher',201,0,NULL),(3237,'Woqoyi Galbed',201,0,NULL),(3238,'Eastern Cape',202,0,NULL),(3239,'Free State',202,0,NULL),(3240,'Gauteng',202,0,NULL),(3241,'Kempton Park',202,0,NULL),(3242,'Kramerville',202,0,NULL),(3243,'KwaZulu Natal',202,0,NULL),(3244,'Limpopo',202,0,NULL),(3245,'Mpumalanga',202,0,NULL),(3246,'North West',202,0,NULL),(3247,'Northern Cape',202,0,NULL),(3248,'Parow',202,0,NULL),(3249,'Table View',202,0,NULL),(3250,'Umtentweni',202,0,NULL),(3251,'Western Cape',202,0,NULL),(3252,'South Georgia',203,0,NULL),(3253,'Central Equatoria',204,0,NULL),(3254,'A Coruna',205,0,NULL),(3255,'Alacant',205,0,NULL),(3256,'Alava',205,0,NULL),(3257,'Albacete',205,0,NULL),(3258,'Almeria',205,0,NULL),(3259,'Andalucia',205,0,NULL),(3260,'Asturias',205,0,NULL),(3261,'Avila',205,0,NULL),(3262,'Badajoz',205,0,NULL),(3263,'Balears',205,0,NULL),(3264,'Barcelona',205,0,NULL),(3265,'Bertamirans',205,0,NULL),(3266,'Biscay',205,0,NULL),(3267,'Burgos',205,0,NULL),(3268,'Caceres',205,0,NULL),(3269,'Cadiz',205,0,NULL),(3270,'Cantabria',205,0,NULL),(3271,'Castello',205,0,NULL),(3272,'Catalunya',205,0,NULL),(3273,'Ceuta',205,0,NULL),(3274,'Ciudad Real',205,0,NULL),(3275,'Comunidad Autonoma de Canarias',205,0,NULL),(3276,'Comunidad Autonoma de Cataluna',205,0,NULL),(3277,'Comunidad Autonoma de Galicia',205,0,NULL),(3278,'Comunidad Autonoma de las Isla',205,0,NULL),(3279,'Comunidad Autonoma del Princip',205,0,NULL),(3280,'Comunidad Valenciana',205,0,NULL),(3281,'Cordoba',205,0,NULL),(3282,'Cuenca',205,0,NULL),(3283,'Gipuzkoa',205,0,NULL),(3284,'Girona',205,0,NULL),(3285,'Granada',205,0,NULL),(3286,'Guadalajara',205,0,NULL),(3287,'Guipuzcoa',205,0,NULL),(3288,'Huelva',205,0,NULL),(3289,'Huesca',205,0,NULL),(3290,'Jaen',205,0,NULL),(3291,'La Rioja',205,0,NULL),(3292,'Las Palmas',205,0,NULL),(3293,'Leon',205,0,NULL),(3294,'Lerida',205,0,NULL),(3295,'Lleida',205,0,NULL),(3296,'Lugo',205,0,NULL),(3297,'Madrid',205,0,NULL),(3298,'Malaga',205,0,NULL),(3299,'Melilla',205,0,NULL),(3300,'Murcia',205,0,NULL),(3301,'Navarra',205,0,NULL),(3302,'Ourense',205,0,NULL),(3303,'Pais Vasco',205,0,NULL),(3304,'Palencia',205,0,NULL),(3305,'Pontevedra',205,0,NULL),(3306,'Salamanca',205,0,NULL),(3307,'Santa Cruz de Tenerife',205,0,NULL),(3308,'Segovia',205,0,NULL),(3309,'Sevilla',205,0,NULL),(3310,'Soria',205,0,NULL),(3311,'Tarragona',205,0,NULL),(3312,'Tenerife',205,0,NULL),(3313,'Teruel',205,0,NULL),(3314,'Toledo',205,0,NULL),(3315,'Valencia',205,0,NULL),(3316,'Valladolid',205,0,NULL),(3317,'Vizcaya',205,0,NULL),(3318,'Zamora',205,0,NULL),(3319,'Zaragoza',205,0,NULL),(3320,'Amparai',206,0,NULL),(3321,'Anuradhapuraya',206,0,NULL),(3322,'Badulla',206,0,NULL),(3323,'Boralesgamuwa',206,0,NULL),(3324,'Colombo',206,0,NULL),(3325,'Galla',206,0,NULL),(3326,'Gampaha',206,0,NULL),(3327,'Hambantota',206,0,NULL),(3328,'Kalatura',206,0,NULL),(3329,'Kegalla',206,0,NULL),(3330,'Kilinochchi',206,0,NULL),(3331,'Kurunegala',206,0,NULL),(3332,'Madakalpuwa',206,0,NULL),(3333,'Maha Nuwara',206,0,NULL),(3334,'Malwana',206,0,NULL),(3335,'Mannarama',206,0,NULL),(3336,'Matale',206,0,NULL),(3337,'Matara',206,0,NULL),(3338,'Monaragala',206,0,NULL),(3339,'Mullaitivu',206,0,NULL),(3340,'North Eastern Province',206,0,NULL),(3341,'North Western Province',206,0,NULL),(3342,'Nuwara Eliya',206,0,NULL),(3343,'Polonnaruwa',206,0,NULL),(3344,'Puttalama',206,0,NULL),(3345,'Ratnapuraya',206,0,NULL),(3346,'Southern Province',206,0,NULL),(3347,'Tirikunamalaya',206,0,NULL),(3348,'Tuscany',206,0,NULL),(3349,'Vavuniyawa',206,0,NULL),(3350,'Western Province',206,0,NULL),(3351,'Yapanaya',206,0,NULL),(3352,'kadawatha',206,0,NULL),(3353,'A\'ali-an-Nil',207,0,NULL),(3354,'Bahr-al-Jabal',207,0,NULL),(3355,'Central Equatoria',207,0,NULL),(3356,'Gharb Bahr-al-Ghazal',207,0,NULL),(3357,'Gharb Darfur',207,0,NULL),(3358,'Gharb Kurdufan',207,0,NULL),(3359,'Gharb-al-Istiwa\'iyah',207,0,NULL),(3360,'Janub Darfur',207,0,NULL),(3361,'Janub Kurdufan',207,0,NULL),(3362,'Junqali',207,0,NULL),(3363,'Kassala',207,0,NULL),(3364,'Nahr-an-Nil',207,0,NULL),(3365,'Shamal Bahr-al-Ghazal',207,0,NULL),(3366,'Shamal Darfur',207,0,NULL),(3367,'Shamal Kurdufan',207,0,NULL),(3368,'Sharq-al-Istiwa\'iyah',207,0,NULL),(3369,'Sinnar',207,0,NULL),(3370,'Warab',207,0,NULL),(3371,'Wilayat al Khartum',207,0,NULL),(3372,'al-Bahr-al-Ahmar',207,0,NULL),(3373,'al-Buhayrat',207,0,NULL),(3374,'al-Jazirah',207,0,NULL),(3375,'al-Khartum',207,0,NULL),(3376,'al-Qadarif',207,0,NULL),(3377,'al-Wahdah',207,0,NULL),(3378,'an-Nil-al-Abyad',207,0,NULL),(3379,'an-Nil-al-Azraq',207,0,NULL),(3380,'ash-Shamaliyah',207,0,NULL),(3381,'Brokopondo',208,0,NULL),(3382,'Commewijne',208,0,NULL),(3383,'Coronie',208,0,NULL),(3384,'Marowijne',208,0,NULL),(3385,'Nickerie',208,0,NULL),(3386,'Para',208,0,NULL),(3387,'Paramaribo',208,0,NULL),(3388,'Saramacca',208,0,NULL),(3389,'Wanica',208,0,NULL),(3390,'Svalbard',209,0,NULL),(3391,'Hhohho',210,0,NULL),(3392,'Lubombo',210,0,NULL),(3393,'Manzini',210,0,NULL),(3394,'Shiselweni',210,0,NULL),(3395,'Alvsborgs Lan',211,0,NULL),(3396,'Angermanland',211,0,NULL),(3397,'Blekinge',211,0,NULL),(3398,'Bohuslan',211,0,NULL),(3399,'Dalarna',211,0,NULL),(3400,'Gavleborg',211,0,NULL),(3401,'Gaza',211,0,NULL),(3402,'Gotland',211,0,NULL),(3403,'Halland',211,0,NULL),(3404,'Jamtland',211,0,NULL),(3405,'Jonkoping',211,0,NULL),(3406,'Kalmar',211,0,NULL),(3407,'Kristianstads',211,0,NULL),(3408,'Kronoberg',211,0,NULL),(3409,'Norrbotten',211,0,NULL),(3410,'Orebro',211,0,NULL),(3411,'Ostergotland',211,0,NULL),(3412,'Saltsjo-Boo',211,0,NULL),(3413,'Skane',211,0,NULL),(3414,'Smaland',211,0,NULL),(3415,'Sodermanland',211,0,NULL),(3416,'Stockholm',211,0,NULL),(3417,'Uppsala',211,0,NULL),(3418,'Varmland',211,0,NULL),(3419,'Vasterbotten',211,0,NULL),(3420,'Vastergotland',211,0,NULL),(3421,'Vasternorrland',211,0,NULL),(3422,'Vastmanland',211,0,NULL),(3423,'Vastra Gotaland',211,0,NULL),(3424,'Aargau',212,0,NULL),(3425,'Appenzell Inner-Rhoden',212,0,NULL),(3426,'Appenzell-Ausser Rhoden',212,0,NULL),(3427,'Basel-Landschaft',212,0,NULL),(3428,'Basel-Stadt',212,0,NULL),(3429,'Bern',212,0,NULL),(3430,'Canton Ticino',212,0,NULL),(3431,'Fribourg',212,0,NULL),(3432,'Geneve',212,0,NULL),(3433,'Glarus',212,0,NULL),(3434,'Graubunden',212,0,NULL),(3435,'Heerbrugg',212,0,NULL),(3436,'Jura',212,0,NULL),(3437,'Kanton Aargau',212,0,NULL),(3438,'Luzern',212,0,NULL),(3439,'Morbio Inferiore',212,0,NULL),(3440,'Muhen',212,0,NULL),(3441,'Neuchatel',212,0,NULL),(3442,'Nidwalden',212,0,NULL),(3443,'Obwalden',212,0,NULL),(3444,'Sankt Gallen',212,0,NULL),(3445,'Schaffhausen',212,0,NULL),(3446,'Schwyz',212,0,NULL),(3447,'Solothurn',212,0,NULL),(3448,'Thurgau',212,0,NULL),(3449,'Ticino',212,0,NULL),(3450,'Uri',212,0,NULL),(3451,'Valais',212,0,NULL),(3452,'Vaud',212,0,NULL),(3453,'Vauffelin',212,0,NULL),(3454,'Zug',212,0,NULL),(3455,'Zurich',212,0,NULL),(3456,'Aleppo',213,0,NULL),(3457,'Dar\'a',213,0,NULL),(3458,'Dayr-az-Zawr',213,0,NULL),(3459,'Dimashq',213,0,NULL),(3460,'Halab',213,0,NULL),(3461,'Hamah',213,0,NULL),(3462,'Hims',213,0,NULL),(3463,'Idlib',213,0,NULL),(3464,'Madinat Dimashq',213,0,NULL),(3465,'Tartus',213,0,NULL),(3466,'al-Hasakah',213,0,NULL),(3467,'al-Ladhiqiyah',213,0,NULL),(3468,'al-Qunaytirah',213,0,NULL),(3469,'ar-Raqqah',213,0,NULL),(3470,'as-Suwayda',213,0,NULL),(3471,'Changhwa',214,0,NULL),(3472,'Chiayi Hsien',214,0,NULL),(3473,'Chiayi Shih',214,0,NULL),(3474,'Eastern Taipei',214,0,NULL),(3475,'Hsinchu Hsien',214,0,NULL),(3476,'Hsinchu Shih',214,0,NULL),(3477,'Hualien',214,0,NULL),(3478,'Ilan',214,0,NULL),(3479,'Kaohsiung Hsien',214,0,NULL),(3480,'Kaohsiung Shih',214,0,NULL),(3481,'Keelung Shih',214,0,NULL),(3482,'Kinmen',214,0,NULL),(3483,'Miaoli',214,0,NULL),(3484,'Nantou',214,0,NULL),(3485,'Northern Taiwan',214,0,NULL),(3486,'Penghu',214,0,NULL),(3487,'Pingtung',214,0,NULL),(3488,'Taichung',214,0,NULL),(3489,'Taichung Hsien',214,0,NULL),(3490,'Taichung Shih',214,0,NULL),(3491,'Tainan Hsien',214,0,NULL),(3492,'Tainan Shih',214,0,NULL),(3493,'Taipei Hsien',214,0,NULL),(3494,'Taipei Shih / Taipei Hsien',214,0,NULL),(3495,'Taitung',214,0,NULL),(3496,'Taoyuan',214,0,NULL),(3497,'Yilan',214,0,NULL),(3498,'Yun-Lin Hsien',214,0,NULL),(3499,'Yunlin',214,0,NULL),(3500,'Dushanbe',215,0,NULL),(3501,'Gorno-Badakhshan',215,0,NULL),(3502,'Karotegin',215,0,NULL),(3503,'Khatlon',215,0,NULL),(3504,'Sughd',215,0,NULL),(3505,'Arusha',216,0,NULL),(3506,'Dar es Salaam',216,0,NULL),(3507,'Dodoma',216,0,NULL),(3508,'Iringa',216,0,NULL),(3509,'Kagera',216,0,NULL),(3510,'Kigoma',216,0,NULL),(3511,'Kilimanjaro',216,0,NULL),(3512,'Lindi',216,0,NULL),(3513,'Mara',216,0,NULL),(3514,'Mbeya',216,0,NULL),(3515,'Morogoro',216,0,NULL),(3516,'Mtwara',216,0,NULL),(3517,'Mwanza',216,0,NULL),(3518,'Pwani',216,0,NULL),(3519,'Rukwa',216,0,NULL),(3520,'Ruvuma',216,0,NULL),(3521,'Shinyanga',216,0,NULL),(3522,'Singida',216,0,NULL),(3523,'Tabora',216,0,NULL),(3524,'Tanga',216,0,NULL),(3525,'Zanzibar and Pemba',216,0,NULL),(3526,'Amnat Charoen',217,0,NULL),(3527,'Ang Thong',217,0,NULL),(3528,'Bangkok',217,0,NULL),(3529,'Buri Ram',217,0,NULL),(3530,'Chachoengsao',217,0,NULL),(3531,'Chai Nat',217,0,NULL),(3532,'Chaiyaphum',217,0,NULL),(3533,'Changwat Chaiyaphum',217,0,NULL),(3534,'Chanthaburi',217,0,NULL),(3535,'Chiang Mai',217,0,NULL),(3536,'Chiang Rai',217,0,NULL),(3537,'Chon Buri',217,0,NULL),(3538,'Chumphon',217,0,NULL),(3539,'Kalasin',217,0,NULL),(3540,'Kamphaeng Phet',217,0,NULL),(3541,'Kanchanaburi',217,0,NULL),(3542,'Khon Kaen',217,0,NULL),(3543,'Krabi',217,0,NULL),(3544,'Krung Thep',217,0,NULL),(3545,'Lampang',217,0,NULL),(3546,'Lamphun',217,0,NULL),(3547,'Loei',217,0,NULL),(3548,'Lop Buri',217,0,NULL),(3549,'Mae Hong Son',217,0,NULL),(3550,'Maha Sarakham',217,0,NULL),(3551,'Mukdahan',217,0,NULL),(3552,'Nakhon Nayok',217,0,NULL),(3553,'Nakhon Pathom',217,0,NULL),(3554,'Nakhon Phanom',217,0,NULL),(3555,'Nakhon Ratchasima',217,0,NULL),(3556,'Nakhon Sawan',217,0,NULL),(3557,'Nakhon Si Thammarat',217,0,NULL),(3558,'Nan',217,0,NULL),(3559,'Narathiwat',217,0,NULL),(3560,'Nong Bua Lam Phu',217,0,NULL),(3561,'Nong Khai',217,0,NULL),(3562,'Nonthaburi',217,0,NULL),(3563,'Pathum Thani',217,0,NULL),(3564,'Pattani',217,0,NULL),(3565,'Phangnga',217,0,NULL),(3566,'Phatthalung',217,0,NULL),(3567,'Phayao',217,0,NULL),(3568,'Phetchabun',217,0,NULL),(3569,'Phetchaburi',217,0,NULL),(3570,'Phichit',217,0,NULL),(3571,'Phitsanulok',217,0,NULL),(3572,'Phra Nakhon Si Ayutthaya',217,0,NULL),(3573,'Phrae',217,0,NULL),(3574,'Phuket',217,0,NULL),(3575,'Prachin Buri',217,0,NULL),(3576,'Prachuap Khiri Khan',217,0,NULL),(3577,'Ranong',217,0,NULL),(3578,'Ratchaburi',217,0,NULL),(3579,'Rayong',217,0,NULL),(3580,'Roi Et',217,0,NULL),(3581,'Sa Kaeo',217,0,NULL),(3582,'Sakon Nakhon',217,0,NULL),(3583,'Samut Prakan',217,0,NULL),(3584,'Samut Sakhon',217,0,NULL),(3585,'Samut Songkhran',217,0,NULL),(3586,'Saraburi',217,0,NULL),(3587,'Satun',217,0,NULL),(3588,'Si Sa Ket',217,0,NULL),(3589,'Sing Buri',217,0,NULL),(3590,'Songkhla',217,0,NULL),(3591,'Sukhothai',217,0,NULL),(3592,'Suphan Buri',217,0,NULL),(3593,'Surat Thani',217,0,NULL),(3594,'Surin',217,0,NULL),(3595,'Tak',217,0,NULL),(3596,'Trang',217,0,NULL),(3597,'Trat',217,0,NULL),(3598,'Ubon Ratchathani',217,0,NULL),(3599,'Udon Thani',217,0,NULL),(3600,'Uthai Thani',217,0,NULL),(3601,'Uttaradit',217,0,NULL),(3602,'Yala',217,0,NULL),(3603,'Yasothon',217,0,NULL),(3604,'Centre',218,0,NULL),(3605,'Kara',218,0,NULL),(3606,'Maritime',218,0,NULL),(3607,'Plateaux',218,0,NULL),(3608,'Savanes',218,0,NULL),(3609,'Atafu',219,0,NULL),(3610,'Fakaofo',219,0,NULL),(3611,'Nukunonu',219,0,NULL),(3612,'Eua',220,0,NULL),(3613,'Ha\'apai',220,0,NULL),(3614,'Niuas',220,0,NULL),(3615,'Tongatapu',220,0,NULL),(3616,'Vava\'u',220,0,NULL),(3617,'Arima-Tunapuna-Piarco',221,0,NULL),(3618,'Caroni',221,0,NULL),(3619,'Chaguanas',221,0,NULL),(3620,'Couva-Tabaquite-Talparo',221,0,NULL),(3621,'Diego Martin',221,0,NULL),(3622,'Glencoe',221,0,NULL),(3623,'Penal Debe',221,0,NULL),(3624,'Point Fortin',221,0,NULL),(3625,'Port of Spain',221,0,NULL),(3626,'Princes Town',221,0,NULL),(3627,'Saint George',221,0,NULL),(3628,'San Fernando',221,0,NULL),(3629,'San Juan',221,0,NULL),(3630,'Sangre Grande',221,0,NULL),(3631,'Siparia',221,0,NULL),(3632,'Tobago',221,0,NULL),(3633,'Aryanah',222,0,NULL),(3634,'Bajah',222,0,NULL),(3635,'Bin \'Arus',222,0,NULL),(3636,'Binzart',222,0,NULL),(3637,'Gouvernorat de Ariana',222,0,NULL),(3638,'Gouvernorat de Nabeul',222,0,NULL),(3639,'Gouvernorat de Sousse',222,0,NULL),(3640,'Hammamet Yasmine',222,0,NULL),(3641,'Jundubah',222,0,NULL),(3642,'Madaniyin',222,0,NULL),(3643,'Manubah',222,0,NULL),(3644,'Monastir',222,0,NULL),(3645,'Nabul',222,0,NULL),(3646,'Qabis',222,0,NULL),(3647,'Qafsah',222,0,NULL),(3648,'Qibili',222,0,NULL),(3649,'Safaqis',222,0,NULL),(3650,'Sfax',222,0,NULL),(3651,'Sidi Bu Zayd',222,0,NULL),(3652,'Silyanah',222,0,NULL),(3653,'Susah',222,0,NULL),(3654,'Tatawin',222,0,NULL),(3655,'Tawzar',222,0,NULL),(3656,'Tunis',222,0,NULL),(3657,'Zaghwan',222,0,NULL),(3658,'al-Kaf',222,0,NULL),(3659,'al-Mahdiyah',222,0,NULL),(3660,'al-Munastir',222,0,NULL),(3661,'al-Qasrayn',222,0,NULL),(3662,'al-Qayrawan',222,0,NULL),(3663,'Adana',223,0,NULL),(3664,'Adiyaman',223,0,NULL),(3665,'Afyon',223,0,NULL),(3666,'Agri',223,0,NULL),(3667,'Aksaray',223,0,NULL),(3668,'Amasya',223,0,NULL),(3669,'Ankara',223,0,NULL),(3670,'Antalya',223,0,NULL),(3671,'Ardahan',223,0,NULL),(3672,'Artvin',223,0,NULL),(3673,'Aydin',223,0,NULL),(3674,'Balikesir',223,0,NULL),(3675,'Bartin',223,0,NULL),(3676,'Batman',223,0,NULL),(3677,'Bayburt',223,0,NULL),(3678,'Bilecik',223,0,NULL),(3679,'Bingol',223,0,NULL),(3680,'Bitlis',223,0,NULL),(3681,'Bolu',223,0,NULL),(3682,'Burdur',223,0,NULL),(3683,'Bursa',223,0,NULL),(3684,'Canakkale',223,0,NULL),(3685,'Cankiri',223,0,NULL),(3686,'Corum',223,0,NULL),(3687,'Denizli',223,0,NULL),(3688,'Diyarbakir',223,0,NULL),(3689,'Duzce',223,0,NULL),(3690,'Edirne',223,0,NULL),(3691,'Elazig',223,0,NULL),(3692,'Erzincan',223,0,NULL),(3693,'Erzurum',223,0,NULL),(3694,'Eskisehir',223,0,NULL),(3695,'Gaziantep',223,0,NULL),(3696,'Giresun',223,0,NULL),(3697,'Gumushane',223,0,NULL),(3698,'Hakkari',223,0,NULL),(3699,'Hatay',223,0,NULL),(3700,'Icel',223,0,NULL),(3701,'Igdir',223,0,NULL),(3702,'Isparta',223,0,NULL),(3703,'Istanbul',223,0,NULL),(3704,'Izmir',223,0,NULL),(3705,'Kahramanmaras',223,0,NULL),(3706,'Karabuk',223,0,NULL),(3707,'Karaman',223,0,NULL),(3708,'Kars',223,0,NULL),(3709,'Karsiyaka',223,0,NULL),(3710,'Kastamonu',223,0,NULL),(3711,'Kayseri',223,0,NULL),(3712,'Kilis',223,0,NULL),(3713,'Kirikkale',223,0,NULL),(3714,'Kirklareli',223,0,NULL),(3715,'Kirsehir',223,0,NULL),(3716,'Kocaeli',223,0,NULL),(3717,'Konya',223,0,NULL),(3718,'Kutahya',223,0,NULL),(3719,'Lefkosa',223,0,NULL),(3720,'Malatya',223,0,NULL),(3721,'Manisa',223,0,NULL),(3722,'Mardin',223,0,NULL),(3723,'Mugla',223,0,NULL),(3724,'Mus',223,0,NULL),(3725,'Nevsehir',223,0,NULL),(3726,'Nigde',223,0,NULL),(3727,'Ordu',223,0,NULL),(3728,'Osmaniye',223,0,NULL),(3729,'Rize',223,0,NULL),(3730,'Sakarya',223,0,NULL),(3731,'Samsun',223,0,NULL),(3732,'Sanliurfa',223,0,NULL),(3733,'Siirt',223,0,NULL),(3734,'Sinop',223,0,NULL),(3735,'Sirnak',223,0,NULL),(3736,'Sivas',223,0,NULL),(3737,'Tekirdag',223,0,NULL),(3738,'Tokat',223,0,NULL),(3739,'Trabzon',223,0,NULL),(3740,'Tunceli',223,0,NULL),(3741,'Usak',223,0,NULL),(3742,'Van',223,0,NULL),(3743,'Yalova',223,0,NULL),(3744,'Yozgat',223,0,NULL),(3745,'Zonguldak',223,0,NULL),(3746,'Ahal',224,0,NULL),(3747,'Asgabat',224,0,NULL),(3748,'Balkan',224,0,NULL),(3749,'Dasoguz',224,0,NULL),(3750,'Lebap',224,0,NULL),(3751,'Mari',224,0,NULL),(3752,'Grand Turk',225,0,NULL),(3753,'South Caicos and East Caicos',225,0,NULL),(3754,'Funafuti',226,0,NULL),(3755,'Nanumanga',226,0,NULL),(3756,'Nanumea',226,0,NULL),(3757,'Niutao',226,0,NULL),(3758,'Nui',226,0,NULL),(3759,'Nukufetau',226,0,NULL),(3760,'Nukulaelae',226,0,NULL),(3761,'Vaitupu',226,0,NULL),(3762,'Central',227,0,NULL),(3763,'Eastern',227,0,NULL),(3764,'Northern',227,0,NULL),(3765,'Western',227,0,NULL),(3766,'Cherkas\'ka',228,0,NULL),(3767,'Chernihivs\'ka',228,0,NULL),(3768,'Chernivets\'ka',228,0,NULL),(3769,'Crimea',228,0,NULL),(3770,'Dnipropetrovska',228,0,NULL),(3771,'Donets\'ka',228,0,NULL),(3772,'Ivano-Frankivs\'ka',228,0,NULL),(3773,'Kharkiv',228,0,NULL),(3774,'Kharkov',228,0,NULL),(3775,'Khersonska',228,0,NULL),(3776,'Khmel\'nyts\'ka',228,0,NULL),(3777,'Kirovohrad',228,0,NULL),(3778,'Krym',228,0,NULL),(3779,'Kyyiv',228,0,NULL),(3780,'Kyyivs\'ka',228,0,NULL),(3781,'L\'vivs\'ka',228,0,NULL),(3782,'Luhans\'ka',228,0,NULL),(3783,'Mykolayivs\'ka',228,0,NULL),(3784,'Odes\'ka',228,0,NULL),(3785,'Odessa',228,0,NULL),(3786,'Poltavs\'ka',228,0,NULL),(3787,'Rivnens\'ka',228,0,NULL),(3788,'Sevastopol\'',228,0,NULL),(3789,'Sums\'ka',228,0,NULL),(3790,'Ternopil\'s\'ka',228,0,NULL),(3791,'Volyns\'ka',228,0,NULL),(3792,'Vynnyts\'ka',228,0,NULL),(3793,'Zakarpats\'ka',228,0,NULL),(3794,'Zaporizhia',228,0,NULL),(3795,'Zhytomyrs\'ka',228,0,NULL),(3796,'Abu Zabi',229,0,NULL),(3797,'Ajman',229,0,NULL),(3798,'Dubai',229,0,NULL),(3799,'Ras al-Khaymah',229,0,NULL),(3800,'Sharjah',229,0,NULL),(3801,'Sharjha',229,0,NULL),(3802,'Umm al Qaywayn',229,0,NULL),(3803,'al-Fujayrah',229,0,NULL),(3804,'ash-Shariqah',229,0,NULL),(3805,'Aberdeen',230,0,NULL),(3806,'Aberdeenshire',230,0,NULL),(3807,'Argyll',230,0,NULL),(3808,'Armagh',230,0,NULL),(3809,'Bedfordshire',230,0,NULL),(3810,'Belfast',230,0,NULL),(3811,'Berkshire',230,0,NULL),(3812,'Birmingham',230,0,NULL),(3813,'Brechin',230,0,NULL),(3814,'Bridgnorth',230,0,NULL),(3815,'Bristol',230,0,NULL),(3816,'Buckinghamshire',230,0,NULL),(3817,'Cambridge',230,0,NULL),(3818,'Cambridgeshire',230,0,NULL),(3819,'Channel Islands',230,0,NULL),(3820,'Cheshire',230,0,NULL),(3821,'Cleveland',230,0,NULL),(3822,'Co Fermanagh',230,0,NULL),(3823,'Conwy',230,0,NULL),(3824,'Cornwall',230,0,NULL),(3825,'Coventry',230,0,NULL),(3826,'Craven Arms',230,0,NULL),(3827,'Cumbria',230,0,NULL),(3828,'Denbighshire',230,0,NULL),(3829,'Derby',230,0,NULL),(3830,'Derbyshire',230,0,NULL),(3831,'Devon',230,0,NULL),(3832,'Dial Code Dungannon',230,0,NULL),(3833,'Didcot',230,0,NULL),(3834,'Dorset',230,0,NULL),(3835,'Dunbartonshire',230,0,NULL),(3836,'Durham',230,0,NULL),(3837,'East Dunbartonshire',230,0,NULL),(3838,'East Lothian',230,0,NULL),(3839,'East Midlands',230,0,NULL),(3840,'East Sussex',230,0,NULL),(3841,'East Yorkshire',230,0,NULL),(3842,'England',230,0,NULL),(3843,'Essex',230,0,NULL),(3844,'Fermanagh',230,0,NULL),(3845,'Fife',230,0,NULL),(3846,'Flintshire',230,0,NULL),(3847,'Fulham',230,0,NULL),(3848,'Gainsborough',230,0,NULL),(3849,'Glocestershire',230,0,NULL),(3850,'Gwent',230,0,NULL),(3851,'Hampshire',230,0,NULL),(3852,'Hants',230,0,NULL),(3853,'Herefordshire',230,0,NULL),(3854,'Hertfordshire',230,0,NULL),(3855,'Ireland',230,0,NULL),(3856,'Isle Of Man',230,0,NULL),(3857,'Isle of Wight',230,0,NULL),(3858,'Kenford',230,0,NULL),(3859,'Kent',230,0,NULL),(3860,'Kilmarnock',230,0,NULL),(3861,'Lanarkshire',230,0,NULL),(3862,'Lancashire',230,0,NULL),(3863,'Leicestershire',230,0,NULL),(3864,'Lincolnshire',230,0,NULL),(3865,'Llanymynech',230,0,NULL),(3866,'London',230,0,NULL),(3867,'Ludlow',230,0,NULL),(3868,'Manchester',230,0,NULL),(3869,'Mayfair',230,0,NULL),(3870,'Merseyside',230,0,NULL),(3871,'Mid Glamorgan',230,0,NULL),(3872,'Middlesex',230,0,NULL),(3873,'Mildenhall',230,0,NULL),(3874,'Monmouthshire',230,0,NULL),(3875,'Newton Stewart',230,0,NULL),(3876,'Norfolk',230,0,NULL),(3877,'North Humberside',230,0,NULL),(3878,'North Yorkshire',230,0,NULL),(3879,'Northamptonshire',230,0,NULL),(3880,'Northants',230,0,NULL),(3881,'Northern Ireland',230,0,NULL),(3882,'Northumberland',230,0,NULL),(3883,'Nottinghamshire',230,0,NULL),(3884,'Oxford',230,0,NULL),(3885,'Powys',230,0,NULL),(3886,'Roos-shire',230,0,NULL),(3887,'SUSSEX',230,0,NULL),(3888,'Sark',230,0,NULL),(3889,'Scotland',230,0,NULL),(3890,'Scottish Borders',230,0,NULL),(3891,'Shropshire',230,0,NULL),(3892,'Somerset',230,0,NULL),(3893,'South Glamorgan',230,0,NULL),(3894,'South Wales',230,0,NULL),(3895,'South Yorkshire',230,0,NULL),(3896,'Southwell',230,0,NULL),(3897,'Staffordshire',230,0,NULL),(3898,'Strabane',230,0,NULL),(3899,'Suffolk',230,0,NULL),(3900,'Surrey',230,0,NULL),(3901,'Sussex',230,0,NULL),(3902,'Twickenham',230,0,NULL),(3903,'Tyne and Wear',230,0,NULL),(3904,'Tyrone',230,0,NULL),(3905,'Utah',230,0,NULL),(3906,'Wales',230,0,NULL),(3907,'Warwickshire',230,0,NULL),(3908,'West Lothian',230,0,NULL),(3909,'West Midlands',230,0,NULL),(3910,'West Sussex',230,0,NULL),(3911,'West Yorkshire',230,0,NULL),(3912,'Whissendine',230,0,NULL),(3913,'Wiltshire',230,0,NULL),(3914,'Wokingham',230,0,NULL),(3915,'Worcestershire',230,0,NULL),(3916,'Wrexham',230,0,NULL),(3917,'Wurttemberg',230,0,NULL),(3918,'Yorkshire',230,0,NULL),(3919,'Alabama',231,0,NULL),(3920,'Alaska',231,0,NULL),(3921,'Arizona',231,0,NULL),(3922,'Arkansas',231,0,NULL),(3923,'Byram',231,0,NULL),(3924,'California',231,0,NULL),(3925,'Cokato',231,0,NULL),(3926,'Colorado',231,0,NULL),(3927,'Connecticut',231,0,NULL),(3928,'Delaware',231,0,NULL),(3929,'District of Columbia',231,0,NULL),(3930,'Florida',231,0,NULL),(3931,'Georgia',231,0,NULL),(3932,'Hawaii',231,0,NULL),(3933,'Idaho',231,0,NULL),(3934,'Illinois',231,0,NULL),(3935,'Indiana',231,0,NULL),(3936,'Iowa',231,0,NULL),(3937,'Kansas',231,0,NULL),(3938,'Kentucky',231,0,NULL),(3939,'Louisiana',231,0,NULL),(3940,'Lowa',231,0,NULL),(3941,'Maine',231,0,NULL),(3942,'Maryland',231,0,NULL),(3943,'Massachusetts',231,0,NULL),(3944,'Medfield',231,0,NULL),(3945,'Michigan',231,0,NULL),(3946,'Minnesota',231,0,NULL),(3947,'Mississippi',231,0,NULL),(3948,'Missouri',231,0,NULL),(3949,'Montana',231,0,NULL),(3950,'Nebraska',231,0,NULL),(3951,'Nevada',231,0,NULL),(3952,'New Hampshire',231,0,NULL),(3953,'New Jersey',231,0,NULL),(3954,'New Jersy',231,0,NULL),(3955,'New Mexico',231,0,NULL),(3956,'New York',231,0,NULL),(3957,'North Carolina',231,0,NULL),(3958,'North Dakota',231,0,NULL),(3959,'Ohio',231,0,NULL),(3960,'Oklahoma',231,0,NULL),(3961,'Ontario',231,0,NULL),(3962,'Oregon',231,0,NULL),(3963,'Pennsylvania',231,0,NULL),(3964,'Ramey',231,0,NULL),(3965,'Rhode Island',231,0,NULL),(3966,'South Carolina',231,0,NULL),(3967,'South Dakota',231,0,NULL),(3968,'Sublimity',231,0,NULL),(3969,'Tennessee',231,0,NULL),(3970,'Texas',231,0,NULL),(3971,'Trimble',231,0,NULL),(3972,'Utah',231,0,NULL),(3973,'Vermont',231,0,NULL),(3974,'Virginia',231,0,NULL),(3975,'Washington',231,0,NULL),(3976,'West Virginia',231,0,NULL),(3977,'Wisconsin',231,0,NULL),(3978,'Wyoming',231,0,NULL),(3979,'United States Minor Outlying I',232,0,NULL),(3980,'Artigas',233,0,NULL),(3981,'Canelones',233,0,NULL),(3982,'Cerro Largo',233,0,NULL),(3983,'Colonia',233,0,NULL),(3984,'Durazno',233,0,NULL),(3985,'FLorida',233,0,NULL),(3986,'Flores',233,0,NULL),(3987,'Lavalleja',233,0,NULL),(3988,'Maldonado',233,0,NULL),(3989,'Montevideo',233,0,NULL),(3990,'Paysandu',233,0,NULL),(3991,'Rio Negro',233,0,NULL),(3992,'Rivera',233,0,NULL),(3993,'Rocha',233,0,NULL),(3994,'Salto',233,0,NULL),(3995,'San Jose',233,0,NULL),(3996,'Soriano',233,0,NULL),(3997,'Tacuarembo',233,0,NULL),(3998,'Treinta y Tres',233,0,NULL),(3999,'Andijon',234,0,NULL),(4000,'Buhoro',234,0,NULL),(4001,'Buxoro Viloyati',234,0,NULL),(4002,'Cizah',234,0,NULL),(4003,'Fargona',234,0,NULL),(4004,'Horazm',234,0,NULL),(4005,'Kaskadar',234,0,NULL),(4006,'Korakalpogiston',234,0,NULL),(4007,'Namangan',234,0,NULL),(4008,'Navoi',234,0,NULL),(4009,'Samarkand',234,0,NULL),(4010,'Sirdare',234,0,NULL),(4011,'Surhondar',234,0,NULL),(4012,'Toskent',234,0,NULL),(4013,'Malampa',235,0,NULL),(4014,'Penama',235,0,NULL),(4015,'Sanma',235,0,NULL),(4016,'Shefa',235,0,NULL),(4017,'Tafea',235,0,NULL),(4018,'Torba',235,0,NULL),(4019,'Vatican City State (Holy See)',236,0,NULL),(4020,'Amazonas',237,0,NULL),(4021,'Anzoategui',237,0,NULL),(4022,'Apure',237,0,NULL),(4023,'Aragua',237,0,NULL),(4024,'Barinas',237,0,NULL),(4025,'Bolivar',237,0,NULL),(4026,'Carabobo',237,0,NULL),(4027,'Cojedes',237,0,NULL),(4028,'Delta Amacuro',237,0,NULL),(4029,'Distrito Federal',237,0,NULL),(4030,'Falcon',237,0,NULL),(4031,'Guarico',237,0,NULL),(4032,'Lara',237,0,NULL),(4033,'Merida',237,0,NULL),(4034,'Miranda',237,0,NULL),(4035,'Monagas',237,0,NULL),(4036,'Nueva Esparta',237,0,NULL),(4037,'Portuguesa',237,0,NULL),(4038,'Sucre',237,0,NULL),(4039,'Tachira',237,0,NULL),(4040,'Trujillo',237,0,NULL),(4041,'Vargas',237,0,NULL),(4042,'Yaracuy',237,0,NULL),(4043,'Zulia',237,0,NULL),(4044,'Bac Giang',238,0,NULL),(4045,'Binh Dinh',238,0,NULL),(4046,'Binh Duong',238,0,NULL),(4047,'Da Nang',238,0,NULL),(4048,'Dong Bang Song Cuu Long',238,0,NULL),(4049,'Dong Bang Song Hong',238,0,NULL),(4050,'Dong Nai',238,0,NULL),(4051,'Dong Nam Bo',238,0,NULL),(4052,'Duyen Hai Mien Trung',238,0,NULL),(4053,'Hanoi',238,0,NULL),(4054,'Hung Yen',238,0,NULL),(4055,'Khu Bon Cu',238,0,NULL),(4056,'Long An',238,0,NULL),(4057,'Mien Nui Va Trung Du',238,0,NULL),(4058,'Thai Nguyen',238,0,NULL),(4059,'Thanh Pho Ho Chi Minh',238,0,NULL),(4060,'Thu Do Ha Noi',238,0,NULL),(4061,'Tinh Can Tho',238,0,NULL),(4062,'Tinh Da Nang',238,0,NULL),(4063,'Tinh Gia Lai',238,0,NULL),(4064,'Anegada',239,0,NULL),(4065,'Jost van Dyke',239,0,NULL),(4066,'Tortola',239,0,NULL),(4067,'Saint Croix',240,0,NULL),(4068,'Saint John',240,0,NULL),(4069,'Saint Thomas',240,0,NULL),(4070,'Alo',241,0,NULL),(4071,'Singave',241,0,NULL),(4072,'Wallis',241,0,NULL),(4073,'Bu Jaydur',242,0,NULL),(4074,'Wad-adh-Dhahab',242,0,NULL),(4075,'al-\'Ayun',242,0,NULL),(4076,'as-Samarah',242,0,NULL),(4077,'\'Adan',243,0,NULL),(4078,'Abyan',243,0,NULL),(4079,'Dhamar',243,0,NULL),(4080,'Hadramaut',243,0,NULL),(4081,'Hajjah',243,0,NULL),(4082,'Hudaydah',243,0,NULL),(4083,'Ibb',243,0,NULL),(4084,'Lahij',243,0,NULL),(4085,'Ma\'rib',243,0,NULL),(4086,'Madinat San\'a',243,0,NULL),(4087,'Sa\'dah',243,0,NULL),(4088,'Sana',243,0,NULL),(4089,'Shabwah',243,0,NULL),(4090,'Ta\'izz',243,0,NULL),(4091,'al-Bayda',243,0,NULL),(4092,'al-Hudaydah',243,0,NULL),(4093,'al-Jawf',243,0,NULL),(4094,'al-Mahrah',243,0,NULL),(4095,'al-Mahwit',243,0,NULL),(4096,'Central Serbia',244,0,NULL),(4097,'Kosovo and Metohija',244,0,NULL),(4098,'Montenegro',244,0,NULL),(4099,'Republic of Serbia',244,0,NULL),(4100,'Serbia',244,0,NULL),(4101,'Vojvodina',244,0,NULL),(4102,'Central',245,0,NULL),(4103,'Copperbelt',245,0,NULL),(4104,'Eastern',245,0,NULL),(4105,'Luapala',245,0,NULL),(4106,'Lusaka',245,0,NULL),(4107,'North-Western',245,0,NULL),(4108,'Northern',245,0,NULL),(4109,'Southern',245,0,NULL),(4110,'Western',245,0,NULL),(4111,'Bulawayo',246,0,NULL),(4112,'Harare',246,0,NULL),(4113,'Manicaland',246,0,NULL),(4114,'Mashonaland Central',246,0,NULL),(4115,'Mashonaland East',246,0,NULL),(4116,'Mashonaland West',246,0,NULL),(4117,'Masvingo',246,0,NULL),(4118,'Matabeleland North',246,0,NULL),(4119,'Matabeleland South',246,0,NULL),(4120,'Midlands',246,0,NULL);
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ads_management_directory`
--

DROP TABLE IF EXISTS `tbl_ads_management_directory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ads_management_directory` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ads_management_tilte` varchar(256) DEFAULT NULL,
  `client_id` int(255) DEFAULT NULL,
  `ads_management_file` varchar(256) DEFAULT NULL,
  `ads_management_file_name` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ads_management_directory`
--

LOCK TABLES `tbl_ads_management_directory` WRITE;
/*!40000 ALTER TABLE `tbl_ads_management_directory` DISABLE KEYS */;
INSERT INTO `tbl_ads_management_directory` VALUES (1,'Nirvana Country',2,'5c7baf9c5532311.jpg','11.jpg',1,'106.215.95.31','2019-03-03'),(2,'Nirvana Country',2,'5c7bafaa88b02111.jpg','111.jpg',1,'106.215.95.31','2019-03-03'),(3,'Nirvana Country Apartment',2,'5c7bafbae7a0a1111.jpg','1111.jpg',1,'106.215.95.31','2019-03-03');
/*!40000 ALTER TABLE `tbl_ads_management_directory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_advertise_request`
--

DROP TABLE IF EXISTS `tbl_advertise_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_advertise_request` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `request_name` varchar(256) DEFAULT NULL,
  `request_email` varchar(256) DEFAULT NULL,
  `request_mobile` varchar(256) DEFAULT NULL,
  `request_message` text DEFAULT NULL,
  `request_attachment` varchar(256) DEFAULT NULL,
  `request_attachment_name` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `client_id` int(255) DEFAULT NULL,
  `request_start_date` varchar(256) DEFAULT NULL,
  `request_end_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_advertise_request`
--

LOCK TABLES `tbl_advertise_request` WRITE;
/*!40000 ALTER TABLE `tbl_advertise_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_advertise_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_amenities`
--

DROP TABLE IF EXISTS `tbl_amenities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_amenities` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `amenities_title` varchar(256) DEFAULT NULL,
  `amenities_image` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_amenities`
--

LOCK TABLES `tbl_amenities` WRITE;
/*!40000 ALTER TABLE `tbl_amenities` DISABLE KEYS */;
INSERT INTO `tbl_amenities` VALUES (2,2,'Landscaped Greens','5c4ec7fce11c2landscaped_greens.png',1,'2019-01-28','122.177.152.12'),(3,2,'Horticulture Parks','5c4ec816040aea-5.jpg',1,'2019-01-28','122.177.152.12'),(4,2,'Children’s Play Area','5c4ec829beed0a-2.png',1,'2019-01-28','122.177.152.12'),(6,2,'Sports Facilities','5c4ec85a625c9a-3.png',1,'2019-01-28','122.177.152.12');
/*!40000 ALTER TABLE `tbl_amenities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bank_information`
--

DROP TABLE IF EXISTS `tbl_bank_information`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bank_information` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(256) DEFAULT NULL,
  `bank_holder_name` varchar(256) DEFAULT NULL,
  `bank_account_number` varchar(256) DEFAULT NULL,
  `bank_ifsc_code` varchar(256) DEFAULT NULL,
  `bank_branch_name` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bank_information`
--

LOCK TABLES `tbl_bank_information` WRITE;
/*!40000 ALTER TABLE `tbl_bank_information` DISABLE KEYS */;
INSERT INTO `tbl_bank_information` VALUES (1,'ICICI BANK','Fresh Rush Logistics','0423050017227','ICIC0000423','Azadpur',1,'2018-12-14','223.190.109.250');
/*!40000 ALTER TABLE `tbl_bank_information` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_block_entry`
--

DROP TABLE IF EXISTS `tbl_block_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_block_entry` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(256) DEFAULT NULL,
  `block_code` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `client_id` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_block_entry`
--

LOCK TABLES `tbl_block_entry` WRITE;
/*!40000 ALTER TABLE `tbl_block_entry` DISABLE KEYS */;
INSERT INTO `tbl_block_entry` VALUES (1,'Aspen Greens','AG',1,'2019-01-24','2','122.177.110.218'),(2,'Birch Court','BC',1,'2019-01-24','2','122.177.110.218'),(3,'Cedar Crest','CC',1,'2019-01-24','2','122.177.110.218'),(4,'Deerwood Estate','DW',1,'2019-01-29','2','176.249.215.76'),(5,'E Space','ES',1,'2019-01-29','2','176.249.215.76');
/*!40000 ALTER TABLE `tbl_block_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_category_entry`
--

DROP TABLE IF EXISTS `tbl_category_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_category_entry` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `category_name` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_category_entry`
--

LOCK TABLES `tbl_category_entry` WRITE;
/*!40000 ALTER TABLE `tbl_category_entry` DISABLE KEYS */;
INSERT INTO `tbl_category_entry` VALUES (1,2,'Restaurant','2019-03-03','106.215.95.31',1);
/*!40000 ALTER TABLE `tbl_category_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_client_sub_account`
--

DROP TABLE IF EXISTS `tbl_client_sub_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_client_sub_account` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `client_name` varchar(256) DEFAULT NULL,
  `client_email` varchar(256) DEFAULT NULL,
  `client_mobile` varchar(256) DEFAULT NULL,
  `client_password` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `highlight_event` int(2) DEFAULT NULL,
  `notice_board` int(2) DEFAULT NULL,
  `home_slider` int(2) DEFAULT NULL,
  `blocks_management` int(2) DEFAULT NULL,
  `event_management` int(2) DEFAULT NULL,
  `amenities_management` int(2) DEFAULT NULL,
  `user_management` int(2) DEFAULT NULL,
  `document_management` int(2) DEFAULT NULL,
  `team_management` int(2) DEFAULT NULL,
  `cms_management` int(2) DEFAULT NULL,
  `google_ad_management` int(2) DEFAULT NULL,
  `setting_management` int(2) DEFAULT NULL,
  `advertise_request_management` int(2) DEFAULT NULL,
  `service_bazaar_management` int(2) DEFAULT NULL,
  `vendor_admin_management` int(2) DEFAULT NULL,
  `login_type` int(2) DEFAULT NULL COMMENT 'Vendor=1,SubVendor=0',
  `profile_image` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_client_sub_account`
--

LOCK TABLES `tbl_client_sub_account` WRITE;
/*!40000 ALTER TABLE `tbl_client_sub_account` DISABLE KEYS */;
INSERT INTO `tbl_client_sub_account` VALUES (1,2,'Kushal Bhasin','Office.NRWA@nirvanacountry.co.in','+ 911244 295885','admin12345@',1,'2019-01-25',NULL,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'5c52c4e45a0a5nirwana_banner.jpg'),(2,2,'Raj Kaushal','dherm9454214684@gmail.com','07428069025','raj12345@',1,'2019-01-31','122.177.171.117',1,1,1,1,1,1,1,1,1,1,1,NULL,1,1,NULL,0,NULL);
/*!40000 ALTER TABLE `tbl_client_sub_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_clients`
--

DROP TABLE IF EXISTS `tbl_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_clients` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_code` varchar(256) DEFAULT NULL,
  `client_name` varchar(256) DEFAULT NULL,
  `client_company_name` varchar(256) DEFAULT NULL,
  `client_email` varchar(256) DEFAULT NULL,
  `client_password` varchar(256) DEFAULT NULL,
  `client_mobile` varchar(256) DEFAULT NULL,
  `client_phone` varchar(256) DEFAULT NULL,
  `client_fax_number` varchar(256) DEFAULT NULL,
  `client_city` varchar(256) DEFAULT NULL,
  `client_country` varchar(256) DEFAULT NULL,
  `client_state` varchar(256) DEFAULT NULL,
  `client_zipcode` varchar(256) DEFAULT NULL,
  `client_address` text DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `ip_address` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `client_logo` varchar(256) DEFAULT NULL,
  `client_gst_number` varchar(200) DEFAULT NULL,
  `client_company_number` varchar(200) DEFAULT NULL,
  `client_website_url` varchar(200) DEFAULT NULL,
  `client_facebook_url` varchar(200) DEFAULT NULL,
  `client_twitter_url` varchar(200) DEFAULT NULL,
  `client_google_url` varchar(200) DEFAULT NULL,
  `client_youtube_url` varchar(200) DEFAULT NULL,
  `client_instagram_url` varchar(200) DEFAULT NULL,
  `client_copy_right` varchar(200) DEFAULT NULL,
  `client_google_play_store` varchar(256) DEFAULT NULL,
  `client_apple_store` varchar(256) DEFAULT NULL,
  `client_support_email` varchar(256) DEFAULT NULL,
  `client_office_email` varchar(256) DEFAULT NULL,
  `client_accountant_email` varchar(256) DEFAULT NULL,
  `client_info_email` varchar(256) DEFAULT NULL,
  `client_office_timings` varchar(256) DEFAULT NULL,
  `client_advertise_email` varchar(256) DEFAULT NULL,
  `profile_image` varchar(256) DEFAULT NULL,
  `highlight_content` text DEFAULT NULL,
  `first_client_logo` varchar(256) DEFAULT NULL,
  `second_client_logo` varchar(256) DEFAULT NULL,
  `client_youtube_embed_url` varchar(256) DEFAULT NULL,
  `client_type` int(2) DEFAULT NULL COMMENT 'Vendor=1,SubVendor=0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_clients`
--

LOCK TABLES `tbl_clients` WRITE;
/*!40000 ALTER TABLE `tbl_clients` DISABLE KEYS */;
INSERT INTO `tbl_clients` VALUES (2,'09844','Kushal Bhasin','Nivana Country','Office.NRWA@nirvanacountry.co.in','admin12345@','+ 911244 295885','+ 911244 295885','+ 911244 295885','Gurgoan','India','Haryana','122018','Block D, Sector 50, Gurugram,Haryana 122018, India','2019-01-25',NULL,1,'5c4af13edde8dhome-logo.png','432423243','434324324324343','http://nirvanacountry.co.in','','','','','','Copyright © 2019 Innovatus Technologies Pvt. Ltd. All rights reserved','','','office.nrwa@nirvanacountry.co.in','office@nirvanacountry.co.in','accountant@nirvanacountry.co.in','info@nirvanacountry.co.in','9:00 am - 6:30 pm, All days','advertise@nirvanacountry.co.in',NULL,'Welcome to the digital abode of Nirvana Country. Coming soon, a host of features for Communication, Marketing and lots more. ','5c50351b89458WhatsApp-Image-2019-01-21-at-5.10.10-AM.jpeg','5c50351b897cfDSCN0904.JPG','https://www.youtube.com/embed/FhQJxpvXE_c',1);
/*!40000 ALTER TABLE `tbl_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cms_management`
--

DROP TABLE IF EXISTS `tbl_cms_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cms_management` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `page_name` varchar(256) DEFAULT NULL,
  `content_data` text DEFAULT NULL,
  `meta_title` text DEFAULT NULL,
  `meta_keyword` text DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cms_management`
--

LOCK TABLES `tbl_cms_management` WRITE;
/*!40000 ALTER TABLE `tbl_cms_management` DISABLE KEYS */;
INSERT INTO `tbl_cms_management` VALUES (1,2,'aboutus','<p>\r\n	Nirvana Country is the township to young families, retirees and everyone in between. It is a friendly, welcoming and inclusive community &ndash; the kind of place where you know your neighbours and the next community event is never far away.</p>\r\n<p>\r\n	The association of residents exists primarily to serve its members, who are the owners or residents of properties within Nirvana Country and to maintain the standards set for the community. We have a Constitution and a set of Rules that all Members must follow to ensure our Community stays looking great in years to come.</p>\r\n<p>\r\n	The association working body is made up of volunteers,elected periodically, who administer the society, respond to residents&rsquo; queries and maintain the high standard of living that we all enjoy. You are welcome to contact us at any time.</p>\r\n<h4>\r\n	&nbsp;</h4>\r\n<h4>\r\n	About Nirvana Country:</h4>\r\n<p>\r\n	Nirvana Country, Gurgaon&rsquo;s prestigious township, homes over 1000 families, It is a gated community of villas that contains lush green trees, colorful horticultured parks and well planned connecting roads.</p>\r\n<p>\r\n	Nirvana Country is all about experiencing nature and modern living together. It brings together best of both modern amenities coexisting within nature&rsquo;s lap. It affords ample green spaces, luxurious housing, a host of amenities in one location, with world class schools, club, restaurant, office and retail places in close neighbourhood. Best part about Nirvana Country is not the facilities alone but its community that works tirelessly to maintain and elevate the standard of living in Nirvana Country.</p>\r\n<h4>\r\n	Nirvana Country consists of ....</h4>\r\n<p>\r\n	Aspen Greens, Birch Courts, Deerwood Chase, Espace and Cedar Crest blocks which are a combination of Simplex and Duplex Villas and plots with 24&times;7 power backup and gated security.</p>\r\n<h4>\r\n	Accomplishments and Green Initiatives</h4>\r\n<h4>\r\n	Award</h4>\r\n<p>\r\n	Nirvana Country has been awarded as Gurugram&rsquo;s cleanest society by Municipal Corporation of Gurgaon. This survey was conducted under Swachh Survekshan as announced by Ministry of Urban Development in 2018.</p>\r\n<h4>\r\n	Waste Disposal &amp; Composting Unit</h4>\r\n<p>\r\n	Nirvana Country had begun waste disposal around 3 years back and has waste segregators etc. Today that waste is used into creation of Composts.Residents have come together and today almost 80-90% of households are segregating waste and helping in waste disposal. Society has its own composting unit and the compost is used in parks and planters all over Nirvana.</p>\r\n<h4>\r\n	Public Toilets</h4>\r\n<p>\r\n	Society has created 10 public toilets and has 35 member cleaning staff managing the cleanliness in the society.</p>\r\n<h4>\r\n	Water Consumption Quota</h4>\r\n<p>\r\n	Society has a quota of 500 Litres of waste consumption per day. Anyone found violating this may be penalised an amount of Rs 20,000 under society rules. This quota includes houses under construction and renovation.</p>\r\n<h4>\r\n	Email IDs for reporting litter</h4>\r\n<p>\r\n	Society has created a common Email ID for reporting of areas with litter problems.</p>\r\n<p>\r\n	All in all it&rsquo;s a community that is making living in the township a truly delightful experience.</p>\r\n','About Us','About Us','About Us','2019-01-29'),(7,2,'advertise','<p>\r\n	<span open=\"\" style=\"color: rgb(51, 51, 51); font-family: \" text-align:=\"\">Email to&nbsp;</span><a href=\"mailto:advertise@nirvanacountry.co.in\"><span color:=\"\" open=\"\" style=\"box-sizing: border-box; font-family: \" text-align:=\"\">advertise@nirvanacountry.co.in</span></a></p>\r\n','Advertise','Advertise','Advertise','2019-01-29'),(2,2,'contribute','<p>\r\n	<span open=\"\" style=\"color: rgb(51, 51, 51); font-family: \">Please share any content that you would like to contribute to your nirvana website - photos, articles, etc. send email to&nbsp;</span><a href=\"mailto:support@nirvanacountry.co.in?subject=Advertise%20Contribute\"><span color:=\"\" open=\"\" style=\"box-sizing: border-box; font-family: \">support@nirvanacountry.co.in</span></a></p>\r\n','Contribute','Contribute','Contribute','2019-01-29'),(3,2,'cookies-policy','<h5 style=\"font-weight:bold; \">\r\n	<strong>1.</strong> Introduction</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>1.1</strong> Our website uses cookies.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>1.2</strong> Insofar as those cookies are not strictly necessary for the provision of www.nirvanacountry.in, we will ask you to consent to our use of cookies when you first visit our website.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>2.</strong> Credit</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>2.1</strong> This document was created using a template from SEQ Legal <a href=\"\">(https://seqlegal.com).</a></p>\r\n<br />\r\n<h5 style=\"font-weight:bold; margin-top:0;\">\r\n	<strong>3.</strong> About cookies</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>3.1</strong> A cookie is a file containing an identifier (a string of letters and numbers) that is sent by a web server to a web browser and is stored by the browser. The identifier is then sent back to the server each time the browser requests a page from the server.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>3.2</strong> Cookies may be either &quot;persistent&quot; cookies or &quot;session&quot; cookies: a persistent cookie will be stored by a web browser and will remain valid until its set expiry date, unless deleted by the user before the expiry date; a session cookie, on the other hand, will expire at the end of the user session, when the web browser is closed.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>3.3</strong> Cookies do not typically contain any information that personally identifies a user, but personal information that we store about you may be linked to the information stored in and obtained from cookies.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; margin-top:0;\">\r\n	<strong>4.</strong> Cookies that we use</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>4.1</strong> We use cookies for the following purposes:</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>a) Security -</strong> we use cookies as an element of the security measures used to protect user accounts, including preventing fraudulent use of login credentials, and to protect our website and services generally;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>b) Status -</strong> we use cookies to help us to determine if you are logged into our website;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>c) Shopping cart -</strong> we use cookies to maintain the state of your shopping cart as you navigate our website;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>d) Personalisation -</strong> we use cookies to store information about your preferences and to personalise our website for you;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>e) Authentication -</strong> we use cookies to identify you when you visit our website and as you navigate our website</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>f) Advertising -</strong> we use cookies to help us to display advertisements that will be relevant to you;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>g) Analysis -</strong> we use cookies to help us to analyse the use and performance of our website and services; and</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>h) Cookie consent -</strong> we use cookies to store your preferences in relation to the use of cookies more generally.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; margin-top:0;\">\r\n	<strong>5.</strong> Cookies used by our service providers</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>5.1</strong> Our service providers use cookies and those cookies may be stored on your computer when you visit our website.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>5.2</strong> We use Google Analytics to analyse the use of our website. Google Analytics gathers information about website use by means of cookies. The information gathered relating to our website is used to create reports about the use of our website. Google&#39;s privacy policy is available at: <a href=\"\">https://www.google.com/policies/privacy/.</a></p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>5.3</strong> We publish Google AdSense interest-based advertisements on our website. These are tailored by Google to reflect your interests. To determine your interests, Google will track your behaviour on our website and on other websites across the web using cookies.. This behaviour tracking allows Google to tailor the advertisements that you see on other websites to reflect your interests. You can view, delete or add interest categories associated with your browser by visiting: <a href=\"\">https://adssettings.google.com</a>. You can also opt out of the AdSense partner network cookie using those settings or using the Network Advertising Initiative&#39;s multi-cookie opt-out mechanism at: <a href=\"\">http://optout.networkadvertising.org</a>. However, these opt-out mechanisms themselves use cookies, and if you clear the cookies from your browser your opt-out will not be maintained. To ensure that an opt-out is maintained in respect of a particular browser, you may wish to consider using the Google browser plug-ins available at: <a href=\"\">https://support.google.com/ads/answer/7395996</a>.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; margin-top:0;\">\r\n	<strong>6.</strong> Managing cookies</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>6.1</strong> Most browsers allow you to refuse to accept cookies and to delete cookies. The methods for doing so vary from browser to browser, and from version to version. You can however obtain up-to-date information about blocking and deleting cookies via these links:</p>\r\n<p style=\"margin-bottom:0;\">\r\n	(<strong>a)</strong> <a href=\"\">https://support.google.com/chrome/answer/95647?hl=en</a> (Chrome);</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>b)</strong> <a href=\"\">https://support.mozilla.org/en-US/kb/enable-and-disable-cookies-website-preferences</a> (Firefox);</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>c)</strong> <a href=\"\">http://www.opera.com/help/tutorials/security/cookies/</a> (Opera);</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>d)</strong> <a href=\"\">https://support.microsoft.com/en-gb/help/17442/windows-internet-explorer-delete-manage-cookies</a> (Internet Explorer);</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>e)</strong> <a href=\"\">https://support.apple.com/kb/PH21411</a> (Safari); and</p>\r\n<p style=\"\">\r\n	<strong>f)</strong> <a href=\"\">https://privacy.microsoft.com/en-us/windows-10-microsoft-edge-and-privacy</a> (Edge).</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>6.2</strong> Blocking all cookies will have a negative impact upon the usability of many websites.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>6.3</strong> If you block cookies, you will not be able to use all the features on our website.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; margin-top:0;\">\r\n	<strong>7.</strong> Cookie preferences</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>7.1</strong> You can manage your preferences relating to the use of cookies on our website.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; margin-top:0;\">\r\n	<strong>8.</strong> Our details</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>8.1</strong> This website is owned and operated by <span style=\"font-style:italic;\">Innovatus Technologies Private Limited.</span></p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>8.1</strong> We are registered in India.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>8.1</strong> Our principal place of business is at <span style=\"font-style:italic;\">Gurgaon.</span></p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>8.1</strong> You can contact us: at <a href=\"\">support@innovatuslimited.com</a></p>\r\n<br />\r\n<p>\r\n	<strong>&bull; Either specify an email address or give details of where the relevant email address may be found.</strong></p>\r\n','Cookies Policy','Cookies Policy','Cookies Policy','2019-01-28'),(4,2,'privacy-policy','<p>\r\n	This privacy policy applies to all users of <a href=\"\">http://www.nirvanacountry.co.in/</a> (&ldquo;Website&rdquo;). Please note that we provide our services through our website and mobile application, (&ldquo;App&rdquo;) (Collectively the &ldquo;Platform&rdquo;)</p>\r\n<p style=\"font-style:italic; font-weight:600;\">\r\n	&ldquo;We&rdquo;, &ldquo;ITPL&rdquo;, or the &ldquo;Company&rdquo; refers to Innovatus Technologies Private Limited. The term &ldquo;You&rdquo; or &ldquo;User&rdquo; refers to you (a registered or unregistered user, customer, merchant, visitor, third party service provider, or any visitor of the Platforms). The Website, the App, and any other online/offline platform where information is collected by ITPL, shall be collectively referred to as &ldquo;Platforms&rdquo;.</p>\r\n<br />\r\n<h5>\r\n	If You wish to continue using our Platform, You agree to provide us such information as detailed here and also agree to the terms of this Privacy Policy.</h5>\r\n<p>\r\n	This Privacy Policy has been drafted by Innovatus Technologies Private Limited, (Hereinafter referred to as &ldquo;ITPL&rdquo;), in accordance with the Information Technology Act, 2000 and the Information Technology (Reasonable security practices and procedures and sensitive personal data or information) Rules, 2011. This Privacy Policy is subject to the Terms of Use and constitute a valid and legally binding agreement between You and ITPL. The Platform and any services thereon are being provided to You as a service on a revocable, limited, non-exclusive, and non-transferable license.</p>\r\n<br />\r\n<h5>\r\n	This Privacy Policy is a part of and subject to Our Terms and Conditions of Use at <a href=\"\">https://nirvanacountry.in/TermsOfUse</a></h5>\r\n<p>\r\n	For ITPL to provide You the Services, it is essential for us to collect some basic information about You. Accordingly, You consent to the collection, storage and use of the information You disclose on our App in accordance with this Privacy Policy. If we decide to change our Privacy Policy, ITPL will try our best to keep you informed, s so that You always know the information we collect, how we use it, and the purposes of the same.</p>\r\n<h5>\r\n	If You do not agree with this Policy or our Terms of use, please do not continue to use or access our Platforms or any part thereof.</h5>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>1.</strong> The information we collect:</h5>\r\n<p>\r\n	<strong>a)</strong> At each point, you will clearly know the information we are collecting from you. For logging into the Website, ITPL collect:</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>i.</strong> Your full name,</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>ii.</strong> Your e-mail address,</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>iii.</strong> Your mobile number,</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>iv.</strong> You house/ flat number in the complex (&ldquo;Premises&rdquo;),</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>vi.</strong> and such other data that You may have chosen to provide on the Platforms.</p>\r\n<br />\r\n<p style=\"margin-bottom:0;\">\r\n	ITPL do so purely for recording and security purposes.</p>\r\n<br />\r\n<p>\r\n	<strong>b)</strong> When you visit Our Website, or use our App, Our software will automatically collect the following information:</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>i.</strong> Your IP address;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>ii.</strong> The website from which you were referred to our website (e.g. if you followed a link);</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>iii.</strong> The webpages you are visiting on our website;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>iv.</strong> The browser you are using and its display settings;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>v.</strong> Your operating system; and/or</p>\r\n<p>\r\n	<strong>vi.</strong> The date and duration of your visit.</p>\r\n<p>\r\n	<strong>c)</strong> ITPL will not be responsible for the accuracy or correctness of any such information. You undertake to indemnify ITPL for any losses that ITPL may suffer due to any claim raised against ITPL with respect to any data and/or information that is provided by You to ITPL which are not attributable to negligence, fraud or misrepresentation on Our part.</p>\r\n<p>\r\n	<strong>d)</strong> Information will be recorded by us on own storage devices or on cloud storage.</p>\r\n<p>\r\n	<strong>e)</strong> During the registration process, You may decide to not provide such information to ITPL. In case you choose to decline to submit information on the App, ITPL may not be able to provide certain services to You. Any information provided by You will not be considered as sensitive and confidential if it is freely available and/or accessible in the public domain.</p>\r\n<p>\r\n	<strong>f)</strong> On Our Website, ITPL use data collection devices such as &quot;cookies&quot; on certain pages to help analyse our web page flow, measure promotional effectiveness, and promote trust and safety. &quot;Cookies&quot; are small files placed on your hard drive that assist ITPL in providing Our services. ITPL offer certain features that are only available through the use of a &quot;cookie&quot;. You are always free to decline our cookies if Your browser permits, although in that case You may not be able to use certain features on the Platforms. Additionally, You may encounter &quot;cookies&quot; or other similar devices on certain pages of the Website that are placed by third parties. ITPL do not control the use of cookies by third parties.</p>\r\n<p>\r\n	<strong>g)</strong> You also understand that this service is an extension of the services offered by the Association / Societies (being our Direct Customer) of the Premises, whether registered or unregistered, and accordingly, the data mentioned in point 1 (a) &amp; (b) above, will also be shared with them, as a part our Services, we share the Information with them for recording and security purposes, however, we take no guarantee of the way the information shall or will be used by them.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>2.</strong> Additional Information</h5>\r\n<p>\r\n	When You use Our services, ITPL may collect information about You, with Your permission, in the following general categories:</p>\r\n<p>\r\n	<strong>a.</strong> Location Information: When You use the Platforms through the telecommunication device, we may collect Your location data if you provide us specific permission in this regard. Although You provide us Your complete address, If You permit the App to access Your location through the permission system used by Your mobile operating system, ITPL may also collect the precise location of Your device when the App is running in the foreground or background.</p>\r\n<p>\r\n	<strong>b.</strong> Device Information: ITPL may collect information about Your mobile device, including, for example, the hardware model, operating system and version, preferred language, unique device identifier, and mobile network information.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>3.</strong> Use of Information</h5>\r\n<p>\r\n	<strong>a.)</strong> The information collected by ITPL through our Platforms may be used for the following purposes:</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>i.</strong> To provide Our services to You;</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>ii.</strong> Internal record keeping;</p>\r\n<p>\r\n	<strong>iii.</strong> To improve Our services or provide new services.</p>\r\n<p>\r\n	<strong>b.)</strong> ITPL may periodically send promotional e-mails or messages about special offers related to the Website (e.g. information about enhancements / new features of the App/Platform)</p>\r\n<p>\r\n	<strong>c.)</strong> From time to time, ITPL may use the information to customize the Website or App.</p>\r\n<p>\r\n	<strong>d.)</strong> You agree that ITPL may use the collected information to:</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>i.</strong> Compile, or analyse any information provided by You, on an aggregated basis only. ITPL will do so without personally identifying You or Your personal information;</p>\r\n<p>\r\n	<strong>ii.</strong> ITPLdoesn&rsquo;t sell or trade your data to/with anyone. ITPL only use it for the purposes of making your experience better by introducing real time entries, permissions, etc. or to provide you value added third party services.</p>\r\n<p>\r\n	<strong>e.)</strong> ITPL may use the information provided by You to resolve disputes that may arise with the use of Our Services, help promote a safe service to all the Users of the Platforms, measure consumer interest in our services, customize your experience, detect and protect ITPL against error, fraud and other criminal activity and to enforce Our terms and conditions.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>f.)</strong> ITPL identify and use Your IP address to help diagnose problems with Our server, and to administer Our Platforms.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>4.</strong> Sharing of Information</h5>\r\n<p>\r\n	<strong>a.)</strong> ITPL have to disclose your Information, if required to do so by law or in the good faith belief that such disclosure is reasonably necessary to respond to subpoenas, court orders, or other legal process. ITPL may disclose this information to law enforcement offices; third party rights owners, or others in the good faith belief that such disclosure is reasonably necessary to enforce our Terms or Privacy Policy.</p>\r\n<p>\r\n	<strong>b.)</strong> Your Information will be shared with another business entity should ITPL (or our assets) plan to merge with, or be acquired by another business entity, or re-organization, amalgamation, restructuring of business. Should such a transaction occur, the new business entity will follow this Privacy Policy?</p>\r\n<p>\r\n	<strong>c.)</strong> ITPL do not disclose information provided by You to advertisers in any form that discloses Your personal information</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>5.</strong> Information Safety</h5>\r\n<p>\r\n	<strong>a.)</strong>All information is saved and stored on servers, which are secured with passwords and pins to ensure no unauthorised person has access to it. Once Your information is in our possession, we adhere to strict security guidelines, and to the best extent possible protecting it against unauthorized access.</p>\r\n<p>\r\n	<strong>b.)</strong> ITPL stores your information over secure cloud service providers who offer security standards competitive with the industry norms. ITPL also protect our servers with firewalls and data encryption using SSL, and information access authorization controls. ITPL uses reasonable safeguards to preserve the integrity and security of Your information against loss, theft, unauthorised access, disclosure, reproduction, use or amendment. To achieve the same, ITPL uses reasonable security practices and procedures as mandated under applicable laws for the protection of Your information. Information You provide to ITPL may be stored on Our secure servers located within or outside India.</p>\r\n<p>\r\n	<strong>c.)</strong> However, You understand and accept that there is no guarantee that data transmission over the Internet will be completely secure and that any information that You transmit to ITPL is at Your own risk. ITPL assumes no liability for any disclosure of information due to errors in transmission issues, unauthorized third-party access to our Platform and data bases or other acts of third parties or acts or omissions beyond Our reasonable control and You shall not be entitled to hold the Company responsible for any breach of security except in case of wilful negligence on the part of the Company.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>6.</strong> Choice/Opt-Out</h5>\r\n<p>\r\n	<strong>a.)</strong> ITPL provides all Users with the opportunity to opt-out of receiving non-essential (promotional, marketing-related) communications from ITPL on behalf of our partners, and from ITPL in general, after providing ITPL with information. If You want to remove your contact information from all lists and newsletters, please contact support@innovatuslimited.com</p>\r\n<p>\r\n	<strong>b.)</strong> If You choose to unsubscribe from the Platform or delete any or all of your information, you may uninstall the App or delete Your account on the Website. You may also send an e-mail to support@nirvancountry.co.in. Please note, ITPL may still retain some information and record of transactions as required by any law, contract or policy applicable to ITPL.</p>\r\n<br />\r\n<p style=\"font-style:italic; font-weight:600;\">\r\n	By visiting / accessing the Website or the App, through the website or the mobile app and voluntarily providing us with information (personal and/ or non- personal), you are consenting to our use of it in accordance with this Privacy Policy. This policy does not apply to third-party websites/ applications that are connected via links to the platform. If you do not agree with the terms and conditions of this Privacy Policy, please do not proceed further to use or access the Platform / Website / App, or any part thereof.</p>\r\n','Privacy & Policy','Privacy & Policy','Privacy & Policy','2019-01-28'),(5,2,'terms-conditions','<p>\r\n	The below terms of service are applicable to all Users of <a href=\"\">nirvanacountry.co.in</a>, the WebPortal.</p>\r\n<h4>\r\n	DEFINITIONS:</h4>\r\n<p>\r\n	&quot;Innovatus Technologies Private Limited&quot;, (hereinafter referred to as &ldquo;ITPL&rdquo;),represent the &quot;Service Provider&quot; and are interchangeable.</p>\r\n<p>\r\n	&quot;Products&quot; imply all offerings of Innovatus Technologies Private Limited&rdquo;that are including but not limited to the WebPortal as above.</p>\r\n<p>\r\n	&quot;You&quot; addresses the individual User reading and agreeing to these Terms.</p>\r\n<p>\r\n	&quot;Apartment Complex&quot;, hereinafter referred to as the &ldquo;Complex&rdquo;, can mean a Villa Complex or an Apartment Complex. It can also imply any such Organisation of Users utilising the Products.</p>\r\n<p>\r\n	&quot;Website&quot; means the specific WebPortal of the specific Complex, accessible to Residents and Office Staff of only that Complex.</p>\r\n<p>\r\n	&quot;Association&quot;, &quot;Society&quot;, &quot;RWA&quot; are used interchangeably.</p>\r\n<p>\r\n	&quot;Website &quot; is Products of Innovatus Technologies Private Limited. ITPL plays the role of a custodian for the information stored by the User via either of these Products on Servers maintained by ITPL or its vendors.</p>\r\n<p>\r\n	The following paragraphs contain further information about our Terms of Service, Privacy Policy. Please make sure you read through this carefully. Please proceed with the use of the Products upon agreement with the Terms.</p>\r\n<h4>\r\n	<strong>TERMS OF SERVICE</strong></h4>\r\n<p>\r\n	<strong>ITPL provides its service to you, subject to the following Terms of Service (&quot;ToS&quot;), which may be updated by us from time to time with information to you.</strong></p>\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>1.</strong> DESCRIPTION OF SERVICE</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	ITPL provides a suite of Productsincluding The &ldquo;Website&rdquo; which provides Central Database of the Complex, integrated with Tools for Communication, Facility Management, Billing and Accounting.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>2.</strong> ITPL PRIVACY POLICY</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	Personal information about you are subject to our PRIVACY POLICY which is listed on the site.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>3.</strong> USER ACCOUNT, PASSWORD AND SECURITY</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	You are responsible for maintaining the confidentiality of the UserID and password you choose when you create your account, and are fully responsible for all activities that occur under your account. You agree to immediately notify ITPL of any unauthorized use of your password. ITPL will not be liable for any consequence arising from your failure to comply with this Section.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>4.</strong> ABUSE OF SERVICE</h5>\r\n<p>\r\n	You understand that all information (such as data files, written text, audio files, images or any other media) which you may have access to as part of, or through your use of the Products of ITPL are the sole responsibility of the person from which such content originated. ITPL takes no responsibility for abusive content, and it is the responsibility of the users to regulate such content. ITPL takes no responsibility for any data generated within any of its Products and published or distributed outside by the user.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	ITPL reserves the right to suspend its service to Users involving in service abuse.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>5.</strong> LIST OF PROHIBITED ITEMS</h5>\r\n<p>\r\n	Users are prohibited from aiding in the sale / exchange of any item present in the below list. This is only a partial list and items can be added as and when prohibited to law or brought to the notice of ITPL .</p>\r\n<p>\r\n	Any item that restrict transfer, other unauthorized sale - Alcohol or tobacco products - Blood, bodily fluids or parts - Bulk email or mailing lists that contain names, addresses, phone numbers, or other personal identifying info Burglary tools, including but not limited to lock-picks or motor vehicle keys - Controlled substances or illegal drugs, substances and items used to manufacture controlled substances and drug paraphernalia -Counterfeit currency, coins and stamps, tickets, as well as equipment designed to make them - Counterfeit, replica, or knock-off brand name goods - Coupons or gift cards that restrict transfer, other unauthorized coupons or gift cards - False identification cards, forged certificates - Fireworks, firearms and explosives - Gambling items, including but not limited to lottery tickets - Material that infringes copyright, including but not limited to software or other unauthorized digital goods sale - Pornography - Pet animal parts, blood, or fluids - Prescription drugs and medical devices, including but not limited to prescription or contact lenses, defibrillators, hypodermic needles or hearing aids - Stolen property, or property with serial number removed or altered, anything else that is illegal or trading/ sale of which is restricted/ licensed by law and You do not have the license to do so.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	Items can be included in the above list as and when prohibited.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>6.</strong> NO RESALE OF SERVICE</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	You agree not to reproduce, duplicate, copy, sell, resell or exploit for any commercial purposes, any portion of the Products, use of the Products, or access to the Products.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>7.</strong> MODIFICATIONS TO SERVICE</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	As SaaS products, all of ITPL offerings will undergo continuous modifications in its Features and Service. In case any feature or service is phased out, adequate time and notice will be given to you, so that you may retain the Information assets created by you as part of that Feature. Beyond the time given, you agree that ITPL shall not be liable to you or to any third party.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>8.</strong> ITPL PROPRIETARY RIGHTS</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	You acknowledge and agree that the Products contain proprietary and confidential information that is protected by applicable intellectual property and other laws. Except as expressly authorized by ITPL , you agree not to modify, rent, lease, loan, sell, distribute or create derivative works based on the Products, in whole or in part. You also agree not to extract the code or reverse-engineer it in anyway. Any attempt at hacking or unlawful use of the Products can and will invite the maximum prosecution allowable under the law.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>9.</strong> WARRANTIES AND DISCLAIMERS</h5>\r\n<p>\r\n	<strong>Our Warranties. We warrant that</strong></p>\r\n<p style=\"margin-bottom:0;\">\r\n	<strong>i.</strong> the Products shall perform materially in accordance with the Functionality listed in Features List shared or published periodically.</p>\r\n<p>\r\n	<strong>ii.</strong> the functionality of the Products will not be materially decreased during a subscription term. A Subscription Term is defined by the term for which the Subscription Payment is already made. For any breach of either such warranty, your exclusive remedy shall be Termination of Use including Refund of Advance Payments made for the Subscription Term.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	For integrations of the Product with 3rd Party Software or Hardware, ITPL warrants that it will perform due diligence while selecting the 3rd Party Software or Hardware. However, ITPL does not warrant error-free functioning of such 3rd Party Software or Hardware.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>10.</strong> LIMITATION OF LIABILITY</h5>\r\n<p>\r\n	In no event shall either party&rsquo;s aggregate liability arising out of or related to these Terms/Agreement, whether in contract, tort or under any other theory of liability, exceed the total amount paid by you under the current active Subscription Term.</p>\r\n<p>\r\n	In specific ITPL is not liable to respond to queries from third parties about a Multi Dwelling Unit&rsquo;s use of the Product. All queries must come from the officially designated Users of the Complex itself.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	By using this Product You confirm that You have the legal authority of uploading and sharing the specific data that You would upload or share on this Product. You indemnify ITPL of any disputes regarding the ownership of such data.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold;\">\r\n	<strong>11.</strong> SUPPORT SLA</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	All Support queries are to be lodged via support email whichcan be sent to <a href=\"\">support@innovatuslimited.com</a>.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; text-transform:uppercase;\">\r\n	REGISTRATION</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	In order to use the Products, a user must first complete the registration form. During registration a user is required to give their contact information and proof of being associated with the Complex. The registration information given by the user must always be accurate, correct and up to date. This ensures the User can get the maximum benefit from the Product.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; text-transform:uppercase;\">\r\n	YOUR PERSONAL INFORMATION</h5>\r\n<p>\r\n	The User stores information about himself/herself under his/her User Profile. Information provided is available to the User and the Administrative Users belonging to the same Complexas the user. The Visitor information entered in Website Security is available to the Unit to which the Visitor is visiting, and to the Administrative Users belonging to the same Complex as the user. The Domestic Staff information entered in Website Security is available to the Flats in which the specific Domestic Staff member works and to the Administrative Users belonging to the specific Multi Dwelling Unit. The Vendor information entered is available to the Administrative Users belonging to the specific Multi Dwelling Unit. Administrative Users may also enter Personal Information of the Users. ITPL takes no responsibility for the accuracy of such data entered by the Users or Administrative Users.</p>\r\n<p style=\"margin-bottom:0;\">\r\n	These Personal Information are retained for the period covered by the Subscription Term, unless the Administrative Users choose to delete the Personal Information.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; text-transform:uppercase;\">\r\n	LINKS</h5>\r\n<p style=\"margin-bottom:0;\">\r\n	Links to other sites may be present in the Products. Please be aware that we are not responsible for the privacy practices of such other sites. Please be aware when you leave the Product site and visit these other sites, to read the privacy statements of such sites especially in case they collect personally identifiable information. This privacy policy applies solely to information collected by the Products of ITPL.</p>\r\n<br />\r\n<h5 style=\"font-weight:bold; text-transform:uppercase;\">\r\n	SECURITY</h5>\r\n<p>\r\n	ITPL takes every precaution to protect users&#39; information. When users submit sensitive information via the portal, the information is protected both online and off-line. We have enabled SSL encryption so as to ensure that your data remains encrypted during transmission to and from the site. These precautions, though industry standard are nonetheless only as secure as the end-user&#39;s practice. To ensure that unauthorised parties do not get access to information on this portal, we encourage all users make sure that they log-off from all sessions - especially from public computers such as at internet cafes.</p>\r\n<p>\r\n	As part of our disaster recovery strategy, we have regular backups taken to protect you from sudden data loss. If you have any questions about the security at our portal, you can send an email to <a href=\"\">support@innovatuslimited.com.</a></p>\r\n','Terms & Conditions','Terms & Conditions','Terms & Conditions','2019-01-28'),(6,2,'discussion-forum','<p>\r\n	This is the platform for you to connect with your neighbours, the RWA and the community at large to make the most out of the community living.</p>\r\n','Discussion','Discussion','Discussion','2019-01-28');
/*!40000 ALTER TABLE `tbl_cms_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_document_directory`
--

DROP TABLE IF EXISTS `tbl_document_directory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_document_directory` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `document_tilte` varchar(256) DEFAULT NULL,
  `document_file` varchar(256) DEFAULT NULL,
  `document_file_name` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_document_directory`
--

LOCK TABLES `tbl_document_directory` WRITE;
/*!40000 ALTER TABLE `tbl_document_directory` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_document_directory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_events`
--

DROP TABLE IF EXISTS `tbl_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_events` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `event_name` varchar(256) DEFAULT NULL,
  `event_location` text DEFAULT NULL,
  `event_date` varchar(256) DEFAULT NULL,
  `event_time` varchar(256) DEFAULT NULL,
  `event_month` varchar(256) DEFAULT NULL,
  `event_day` varchar(256) DEFAULT NULL,
  `event_description` text DEFAULT NULL,
  `event_contact_number` varchar(256) DEFAULT NULL,
  `event_terms` text DEFAULT NULL,
  `event_pic` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_events`
--

LOCK TABLES `tbl_events` WRITE;
/*!40000 ALTER TABLE `tbl_events` DISABLE KEYS */;
INSERT INTO `tbl_events` VALUES (2,2,'New Year Event','Block D, Sector 50, Gurugram,Haryana 122018, India','2019-01-01','07:30 PM','January','Tue','New Year Event','7428069025','New Year Event','5c500fd09921ae-1.png',1,'122.177.118.176','2019-01-29'),(3,2,'Lohri','Block D, Sector 50, Gurugram,Haryana 122018, India','2019-01-13','07:30 PM','January','Sun','Lohri','7428069025','Lohri','5c5010200d071e-2.png',1,'122.177.118.176','2019-01-29'),(4,2,'Republic Day','Block D, Sector 50, Gurugram,Haryana 122018, India','2019-01-26','9:30 AM','January','Sat','Republic Day','7428069025','Republic Day','5c50104a66f0de-3.png',1,'122.177.118.176','2019-01-29'),(5,2,'Holi','Block D, Sector 50, Gurugram,Haryana 122018, India','2019-03-21','11:00 AM','March','Thu','Holi','7428069025','Holi','5c501088c20abe-4.jpg',1,'122.177.118.176','2019-01-29'),(6,2,'Diwali','Block D, Sector 50, Gurugram,Haryana 122018, India','2019-10-27','07:30 PM','October','Sun','Diwali','7428069025','Diwali','5c5010c1a032fe-5.png',1,'122.177.118.176','2019-01-29');
/*!40000 ALTER TABLE `tbl_events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_google_ad_management`
--

DROP TABLE IF EXISTS `tbl_google_ad_management`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_google_ad_management` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `page_name` varchar(256) DEFAULT NULL,
  `google_ad1` text DEFAULT NULL,
  `google_ad2` text DEFAULT NULL,
  `google_ad3` text DEFAULT NULL,
  `google_ad4` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_google_ad_management`
--

LOCK TABLES `tbl_google_ad_management` WRITE;
/*!40000 ALTER TABLE `tbl_google_ad_management` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_google_ad_management` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_home_flash_banner`
--

DROP TABLE IF EXISTS `tbl_home_flash_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_home_flash_banner` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `banner_title` varchar(256) DEFAULT NULL,
  `banner_image` varchar(256) DEFAULT NULL,
  `banner_content` text DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `client_id` int(255) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_home_flash_banner`
--

LOCK TABLES `tbl_home_flash_banner` WRITE;
/*!40000 ALTER TABLE `tbl_home_flash_banner` DISABLE KEYS */;
INSERT INTO `tbl_home_flash_banner` VALUES (1,'.','5c4aed5485482nirwana_banner.jpg','\r\n\r\n\r\n\r\n.',1,'2019-01-29',2,'176.249.215.76');
/*!40000 ALTER TABLE `tbl_home_flash_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_house_number_entry`
--

DROP TABLE IF EXISTS `tbl_house_number_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_house_number_entry` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(2) DEFAULT NULL,
  `block_id` int(255) DEFAULT NULL,
  `house_number` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_house_number_entry`
--

LOCK TABLES `tbl_house_number_entry` WRITE;
/*!40000 ALTER TABLE `tbl_house_number_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_house_number_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_loginAccess`
--

DROP TABLE IF EXISTS `tbl_loginAccess`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_loginAccess` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `adminName` varchar(256) DEFAULT NULL,
  `adminemail` varchar(256) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `accountStatus` int(2) DEFAULT NULL,
  `AdminImage` varchar(256) DEFAULT NULL,
  `lastlogin_date` varchar(256) DEFAULT NULL,
  `lastlogin_time` varchar(256) DEFAULT NULL,
  `adminCity` varchar(256) DEFAULT NULL,
  `adminMobile` varchar(256) DEFAULT NULL,
  `adminDesignation` varchar(256) DEFAULT NULL,
  `adminPostcode` varchar(256) DEFAULT NULL,
  `adminaddresss` text DEFAULT NULL,
  `mainAdmin` int(2) DEFAULT NULL,
  `Vehicle_Management` int(2) DEFAULT NULL,
  `Driver_Management` int(2) DEFAULT NULL,
  `Trip_Management` int(2) DEFAULT NULL,
  `Live_Tracking` int(2) DEFAULT NULL,
  `Accounts_Management` int(2) DEFAULT NULL,
  `Report_Management` int(2) DEFAULT NULL,
  `Client_Management` int(2) DEFAULT NULL,
  `Settings` int(2) DEFAULT NULL,
  `Admin_Management` int(2) DEFAULT NULL,
  `InsertPermissionAccess` int(2) DEFAULT NULL,
  `DeletePermissionAccess` int(2) DEFAULT NULL,
  `UpdatePermissionAccess` int(2) DEFAULT NULL,
  `ActivatePermissionAccess` int(2) DEFAULT NULL,
  `DeactivatePermissionAccess` int(2) DEFAULT NULL,
  `LanguageAccess` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_loginAccess`
--

LOCK TABLES `tbl_loginAccess` WRITE;
/*!40000 ALTER TABLE `tbl_loginAccess` DISABLE KEYS */;
INSERT INTO `tbl_loginAccess` VALUES (1,'Aman Kohli','admin@freshrushlogistics.com','admin000@#$',1,'5b9660c8584depan.png','2018-06-18','11:53 AM','Noida','7428069025','Marketing Head','201301','Sector 63',1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,'2017-12-28','122.177.111.122'),(10,'Deepak','dherm9454214684@gmail.com','Hello9090@#$%',1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,1,1,1,1,1,1,1,1,1,NULL,NULL,NULL,NULL,NULL,NULL,'2018-09-07','122.177.213.139');
/*!40000 ALTER TABLE `tbl_loginAccess` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_notice_post`
--

DROP TABLE IF EXISTS `tbl_notice_post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_notice_post` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `notice_title` varchar(256) DEFAULT NULL,
  `notice_content` text DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_notice_post`
--

LOCK TABLES `tbl_notice_post` WRITE;
/*!40000 ALTER TABLE `tbl_notice_post` DISABLE KEYS */;
INSERT INTO `tbl_notice_post` VALUES (1,2,'Electricity Bill Due','Dear Friends,\r\n\r\nPlease submit pending electric bill till 30 Jan 2019 otherwise You have to per day 1000 INR penatly ','2019-01-25','122.177.226.136',1);
/*!40000 ALTER TABLE `tbl_notice_post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_office_bearers`
--

DROP TABLE IF EXISTS `tbl_office_bearers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_office_bearers` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `office_bearers_name` varchar(256) DEFAULT NULL,
  `office_bearers_email` varchar(256) DEFAULT NULL,
  `office_bearers_mobile` varchar(256) DEFAULT NULL,
  `office_bearers_designation` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_office_bearers`
--

LOCK TABLES `tbl_office_bearers` WRITE;
/*!40000 ALTER TABLE `tbl_office_bearers` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_office_bearers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_service_bazzar`
--

DROP TABLE IF EXISTS `tbl_service_bazzar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_service_bazzar` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `catgeory_id` int(255) DEFAULT NULL,
  `catgeory_sub_id` int(255) DEFAULT NULL,
  `service_state_id` int(255) DEFAULT NULL,
  `service_city_id` int(255) DEFAULT NULL,
  `service_pic` varchar(256) DEFAULT NULL,
  `service_name` varchar(256) DEFAULT NULL,
  `service_address` text DEFAULT NULL,
  `service_contact_mobile` varchar(256) DEFAULT NULL,
  `service_contact_name` varchar(256) DEFAULT NULL,
  `service_contact_email` varchar(256) DEFAULT NULL,
  `service_contact_phone` varchar(256) DEFAULT NULL,
  `service_contact_website` varchar(200) DEFAULT NULL,
  `service_locality` varchar(200) DEFAULT NULL,
  `service_zipcode` varchar(200) DEFAULT NULL,
  `service_opening_times` varchar(200) DEFAULT NULL,
  `service_opening_days` varchar(200) DEFAULT NULL,
  `about_service` text DEFAULT NULL,
  `seo_service_url` text DEFAULT NULL,
  `seo_category_url` text DEFAULT NULL,
  `seo_state_url` varchar(256) DEFAULT NULL,
  `seo_city_url` varchar(256) DEFAULT NULL,
  `state_name` varchar(256) DEFAULT NULL,
  `city_name` varchar(256) DEFAULT NULL,
  `category_name` varchar(256) DEFAULT NULL,
  `subcategory_name` varchar(256) DEFAULT NULL,
  `created_date` varchar(200) DEFAULT NULL,
  `created_ip` varchar(200) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `rating` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_service_bazzar`
--

LOCK TABLES `tbl_service_bazzar` WRITE;
/*!40000 ALTER TABLE `tbl_service_bazzar` DISABLE KEYS */;
INSERT INTO `tbl_service_bazzar` VALUES (2,2,1,0,38,4759,'5c7b93a19c5camadan-sweets-and-restaurant-nehru-nagar-ghaziabad-restaurants-in7tvl.jpg','Madan Sweets and Restaurant','23, 3rd K Block, Rakesh Marg, Nehru Nagar, Near Vaishnav Mandir, Ghaziabad, Uttar Pradesh 201001','088100 10101','Madan','madan@gmail.com','088100 10101','https://nirvanacountry.co.in','Rakesh Marg','201001','7:30 AM - 11:00 PM','Monday - Sunday','Best place in ghaziabad to celebrate any occasion or for kitty parties. Very spacious and reasonable. this place serves you only vegetarian, tasty and hygenic food. The staff is polite and the service is really quick. ','madan-sweets-and-restaurant','restaurant','uttar-pradesh','ghaziabad','Uttar Pradesh','Ghaziabad','Restaurant',NULL,'2019-03-03','106.215.95.31',1,5),(3,2,1,0,38,4759,'5c7b94700cb94JFC_Family_Restaurant.jpg','JFC Family Restaurant','G-2, River Heights Plaza, Raj Nagar Ext Rd, Sehani Khurd, Ghukna, Ghaziabad, Uttar Pradesh 201003','093121 22612','JFC Family Restaurant','jfcfamily@gmail.com','093121 22612','https://nirvanacountry.co.in','Rakesh Marg','201003','7:30 AM - 11:00 PM','Monday - Sunday','Best place in ghaziabad to celebrate any occasion or for kitty parties. Very spacious and reasonable. this place serves you only vegetarian, tasty and hygenic food. The staff is polite and the service is really quick. ','jfc-family-restaurant','restaurant','uttar-pradesh','ghaziabad','Uttar Pradesh','Ghaziabad','Restaurant',NULL,'2019-03-03','106.215.95.31',1,5),(4,2,1,0,38,4759,'5c7b953857935925042632s.JPG','Haveli Pure Veg Family Restaurant','Shop No. 28-29, Express Garden Market, Vaibhav Khand, Indirapuram, Ghaziabad, Uttar Pradesh 201014','0120 416 0020','Haveli Pure Veg Family Restaurant','havelipure@gmail.com','0120 416 0020','https://dineout.co.in','Rakesh Marg','201014','7:30 AM - 11:00 PM','Monday - Sunday','It was overall good place to eat. However it is having less space and AC was also not working due to which there was not air flow. However I would say it is good restaurant to go','haveli-pure-veg-family-restaurant','restaurant','uttar-pradesh','ghaziabad','Uttar Pradesh','Ghaziabad','Restaurant',NULL,'2019-03-03','106.215.95.31',1,4),(5,2,1,0,38,4759,'5c7b95ef9bc98102305_landscape.jpg','Aashiana Restaurant','A54, Rampuri, Surya Nagar, Ghaziabad, Uttar Pradesh 201011','098911 17129','Aashiana Restaurant','Aashiana@gmail.com','098911 17129','https://dineout.co.in','Surya Nagar','201011','11:30 AM - 11:00 PM','Monday - Sunday','The place is quiet popular in the vicinity n usually there is lot of waiting here. The ambience is quiet basic but the food is good. It\'s serves both veg n non veg. But I liked non veg better than veg.','aashiana-restaurant','restaurant','uttar-pradesh','ghaziabad','Uttar Pradesh','Ghaziabad','Restaurant',NULL,'2019-03-03','106.215.95.31',1,5),(6,2,1,0,38,4759,'5c7b9690f1e43banner_franchise.jpg','Exotic Bikaner Sweets & Family Resturant','2c/327,Vasundhara, Sec-2c, Opp Mewar College, Ghaziabad, Uttar Pradesh 201012','097181 54100','Exotic Bikaner Sweets & Family Resturant','exoticbikaner@gmail.com','097181 54100','https://dineout.co.in','Vasundhara','201012','08:30 AM - 11:00 PM','Monday - Sunday','The place is quiet popular in the vicinity n usually there is lot of waiting here. The ambience is quiet basic but the food is good. It\'s serves both veg n non veg. But I liked non veg better than veg. chilli potato , taste is upto the mark. You should definitely try this place. ','exotic-bikaner-sweets-amp-family-resturant','restaurant','uttar-pradesh','ghaziabad','Uttar Pradesh','Ghaziabad','Restaurant',NULL,'2019-03-03','106.215.95.31',1,3);
/*!40000 ALTER TABLE `tbl_service_bazzar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sitesetting`
--

DROP TABLE IF EXISTS `tbl_sitesetting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sitesetting` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `siteName` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `sitelogo` varchar(256) DEFAULT NULL,
  `sitefavicon` varchar(256) DEFAULT NULL,
  `sitecity` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `sitepostcode` varchar(1000) CHARACTER SET utf8 DEFAULT NULL,
  `siteaddress` text CHARACTER SET utf8 DEFAULT NULL,
  `sitecountry` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `siteStateprovince` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `siteSMSsender` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `siteSMSAPIKey` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `complaint_email` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `registrationemail` varchar(256) DEFAULT NULL,
  `support_email` varchar(256) DEFAULT NULL,
  `website_CurrencySymbole` varchar(256) DEFAULT NULL,
  `website_Currency` varchar(256) DEFAULT NULL,
  `TaxAmount` decimal(10,2) DEFAULT NULL,
  `creditCardFee` varchar(256) DEFAULT NULL,
  `siteAdminName` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `siteAdminEmail` varchar(256) DEFAULT NULL,
  `sitecall_us` varchar(256) DEFAULT NULL,
  `meta_title` text CHARACTER SET utf8 DEFAULT NULL,
  `fblink` varchar(256) DEFAULT NULL,
  `twitterlink` varchar(256) DEFAULT NULL,
  `plink` varchar(256) DEFAULT NULL,
  `gpluslink` varchar(256) DEFAULT NULL,
  `youtubelink` varchar(256) DEFAULT NULL,
  `website_copyrights` varchar(256) DEFAULT NULL,
  `googlePlayimg` varchar(256) DEFAULT NULL,
  `googlePlayUrl` varchar(256) DEFAULT NULL,
  `ApplePlayimg` varchar(256) DEFAULT NULL,
  `ApplePlayUrl` varchar(256) DEFAULT NULL,
  `BloggerImg` varchar(256) DEFAULT NULL,
  `BloggerUrl` varchar(256) DEFAULT NULL,
  `plinkImg` varchar(256) DEFAULT NULL,
  `youtubeImg` varchar(256) DEFAULT NULL,
  `instagramImg` varchar(256) DEFAULT NULL,
  `instagramlink` varchar(256) DEFAULT NULL,
  `twitterlinkImg` varchar(256) DEFAULT NULL,
  `fblinkImg` varchar(256) DEFAULT NULL,
  `sitefaxnumber` varchar(256) DEFAULT NULL,
  `siteAdminMobile` varchar(256) DEFAULT NULL,
  `meta_keyword` text CHARACTER SET utf8 DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8 DEFAULT NULL,
  `flickrURL` varchar(256) DEFAULT NULL,
  `instagramURL` varchar(256) DEFAULT NULL,
  `linkedinURL` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `googleAPIKey` text CHARACTER SET utf8 DEFAULT NULL,
  `googleAnalyticsCode` text CHARACTER SET utf8 DEFAULT NULL,
  `site_url` varchar(256) DEFAULT NULL,
  `website_Title` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `GST_number` varchar(256) DEFAULT NULL,
  `GST_Tax` varchar(256) DEFAULT NULL,
  `trip_incentive_green_amount` varchar(100) DEFAULT NULL,
  `trip_incentive_yellow_amount` varchar(100) DEFAULT NULL,
  `trip_incentive_red_amount` varchar(100) DEFAULT NULL,
  `company_registration_number` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sitesetting`
--

LOCK TABLES `tbl_sitesetting` WRITE;
/*!40000 ALTER TABLE `tbl_sitesetting` DISABLE KEYS */;
INSERT INTO `tbl_sitesetting` VALUES (1,'Nirvana Country','5c13b89d9d6a3freshrush.png','5b16913bc62d0logopng','Delhi','110033','C - 70, New Fruit Market, Azadpur, Delhi - 110033','India','Delhi','FRESHR','171557AOlowEWqung599f08ab','info@nirvanacountry.co.in','info@nirvanacountry.co.in','info@nirvanacountry.co.in',NULL,NULL,10.00,'0','Aman Kohli','info@nirvanacountry.co.in','+919711100026','Tri Bitrage Coin is Smart Money A new generation monetization platform','https://www.facebook.com/','https://twitter.com/','','https://plus.google.com/110619669739095733421','https://www.youtube.com/watch?v=LbO69JznuV0','Copyright © 2017 Php Expert Technologies Pvt. Ltd.','57f50ddc6dd25google-play-get-it.png','','57f50ddc6dd70available-app-store.png','','57f50ddc6ddbablogg.png','https://www.facebook.com/','57f50ddc6de28pinter.png','57f50ddc6de7eyoutub.png','57f50ddc6decbinstagram.png','http://phpexpertfoodordering.in/fikret/','57f50ddc6df16tw.png','57f50ddc6df60fb.png','+918860878811','+919289898927','A new generation Monetization platform','A new generation Monetization platform','','','https://www.linkedin.com/company/','June 5, 2018, 1:33 pm','182.69.201.245','AIzaSyACcbgl4pGEk_WTuQIe2jLSFp6PiyY_jQY','AIzaSyACcbgl4pGEk_WTuQIe2jLSFp6PiyY_jQY','www.freshrushlogistics.com','Tri Bitrage Coin is Smart Money A new generation monetization platform','UT7428069025','18','1.5','1','0.50','786876786876878');
/*!40000 ALTER TABLE `tbl_sitesetting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sub_category_entry`
--

DROP TABLE IF EXISTS `tbl_sub_category_entry`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sub_category_entry` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `catgeory_id` int(255) DEFAULT NULL,
  `sub_category_name` varchar(256) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sub_category_entry`
--

LOCK TABLES `tbl_sub_category_entry` WRITE;
/*!40000 ALTER TABLE `tbl_sub_category_entry` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sub_category_entry` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_team`
--

DROP TABLE IF EXISTS `tbl_team`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_team` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `team_name` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `team_email` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `team_mobile_no` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `team_destination` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `team_pic` varchar(256) CHARACTER SET utf8 DEFAULT NULL,
  `team_address` text CHARACTER SET utf8 DEFAULT NULL,
  `team_description` text CHARACTER SET utf8 DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `order_position` int(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_team`
--

LOCK TABLES `tbl_team` WRITE;
/*!40000 ALTER TABLE `tbl_team` DISABLE KEYS */;
INSERT INTO `tbl_team` VALUES (2,2,'Mr. Sunder Kalra','office.nrwa@nivanacountry.co.in','','President     ',NULL,'','',1,'176.249.215.76','2019-01-29',1),(3,2,'Mr. Rohit Chopra','','','Secretary',NULL,'','',1,'122.177.118.176','2019-01-29',3),(4,2,'Mr. Alok Bansal','','','Vice President',NULL,'','',1,'122.177.118.176','2019-01-29',2),(5,2,'Mrs. Madhu Nathani','','','Jt. Secretary',NULL,'','',1,'122.177.118.176','2019-01-29',4);
/*!40000 ALTER TABLE `tbl_team` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user_registration`
--

DROP TABLE IF EXISTS `tbl_user_registration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user_registration` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `client_id` int(255) DEFAULT NULL,
  `user_title` varchar(256) DEFAULT NULL,
  `middle_name` varchar(256) DEFAULT NULL,
  `first_name` varchar(256) DEFAULT NULL,
  `last_name` varchar(256) DEFAULT NULL,
  `block_id` int(255) DEFAULT NULL,
  `house_number_id` int(255) DEFAULT NULL,
  `floor_number` varchar(256) DEFAULT NULL,
  `user_email` varchar(256) DEFAULT NULL,
  `user_pass` varchar(256) DEFAULT NULL,
  `user_type` int(2) DEFAULT NULL COMMENT 'Landlord=0,Tenant=1',
  `user_resident_type` int(2) DEFAULT NULL COMMENT 'Residing in the society=0,Non Resident=1',
  `status` int(2) DEFAULT NULL,
  `admin_approval` int(2) DEFAULT NULL,
  `email_verify` int(2) DEFAULT NULL,
  `friend_counts` int(255) DEFAULT NULL,
  `created_date` varchar(256) DEFAULT NULL,
  `created_ip` varchar(256) DEFAULT NULL,
  `join_date` varchar(256) DEFAULT NULL,
  `profile_pics` varchar(256) DEFAULT NULL,
  `user_phone` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user_registration`
--

LOCK TABLES `tbl_user_registration` WRITE;
/*!40000 ALTER TABLE `tbl_user_registration` DISABLE KEYS */;
INSERT INTO `tbl_user_registration` VALUES (5,2,NULL,NULL,'Raj','Kaushal',1,101,'First Floor','dherm9454214684@gmail.com','rEqbiBtYxeOa4ZSRiIuwkVh532h7w2Ldbgtv+UJ47ek=',0,0,1,0,1,NULL,'January 24, 2019, 12:21 pm','122.177.110.218','2019-01-24',NULL,NULL),(6,2,NULL,NULL,'vaishno','tiwari',1,234,'3','tiwari.vaishno399@gmail.com','nGMxe/VCqcKxgMTVFMQSFO0IUevB9JHi22JFtvtl/H8=',0,0,1,0,1,NULL,'January 24, 2019, 1:05 pm','122.177.110.218','2019-01-24',NULL,NULL),(8,2,NULL,NULL,'Shweta','Tangri',2,115,'','tangrishweta@hotmail.com','5/CEgfaWwpAQKaYKOBvnEP+6pyFtENRaGu7t1AJombY=',0,1,0,0,0,NULL,'January 30, 2019, 8:43 am','90.218.44.44','2019-01-30',NULL,NULL),(17,2,'Mr.','','Upendra','Singh',1,211,'205','p1.sonu100@gmail.com','XnCOFXzvzFGHXS/GZ5kVEZ9PAE2N+oCeqydK87yGuwo=',0,0,1,0,1,NULL,'February 8, 2019, 6:38 am','122.177.72.227','2019-02-08',NULL,NULL),(15,2,'Mr.','','Ram','Kaushal',4,102,NULL,'ram123@gmail.com','rEqbiBtYxeOa4ZSRiIuwkVh532h7w2Ldbgtv+UJ47ek=',NULL,NULL,1,1,1,NULL,'January 31, 2019, 11:30 am','122.177.171.117','2019-01-31',NULL,NULL);
/*!40000 ALTER TABLE `tbl_user_registration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unsubscribe`
--

DROP TABLE IF EXISTS `unsubscribe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `unsubscribe` (
  `unsubscribe_id` int(11) NOT NULL AUTO_INCREMENT,
  `unsubscribe_user_id` int(11) NOT NULL DEFAULT 0,
  `unsubscribe_user_email` varchar(255) NOT NULL,
  `unsubscribe_type` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`unsubscribe_id`),
  KEY `unsubscribe_user_email` (`unsubscribe_user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unsubscribe`
--

LOCK TABLES `unsubscribe` WRITE;
/*!40000 ALTER TABLE `unsubscribe` DISABLE KEYS */;
/*!40000 ALTER TABLE `unsubscribe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uptransactions`
--

DROP TABLE IF EXISTS `uptransactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uptransactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `cat` int(11) NOT NULL DEFAULT 0,
  `state` tinyint(4) NOT NULL,
  `text` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=315 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uptransactions`
--

LOCK TABLES `uptransactions` WRITE;
/*!40000 ALTER TABLE `uptransactions` DISABLE KEYS */;
INSERT INTO `uptransactions` VALUES (1,1,121,1,0,'New Post',1512470675,1),(2,1,121,1,0,'New Post',1512471147,1),(3,2,105,1,0,'Upload profile photo',1512471382,100),(4,1,104,1,0,'Add a friend',1512471804,1),(5,2,104,1,0,'Add a friend',1512472347,1),(6,1,108,1,0,'Login to site (requires logout)',1512473470,1),(7,1,105,1,0,'Upload profile photo',1512473981,100),(8,1,107,1,0,'Update Cover',1512474129,100),(9,3,105,1,0,'Upload profile photo',1512474235,100),(10,1,123,1,0,'Like a post',1512474328,1),(11,1,122,1,0,'Comment a post',1512474345,1),(12,3,104,1,0,'Add a friend',1512474346,1),(13,1,104,1,0,'Add a friend',1512474354,1),(14,2,104,1,0,'Add a friend',1512474358,1),(15,3,104,1,0,'Add a friend',1512474363,1),(16,3,107,1,0,'Update Cover',1512474623,100),(17,1,121,1,0,'New Post',1512474809,1),(18,1,121,1,0,'New Post',1512474980,1),(19,1,121,1,0,'New Post',1512475392,1),(20,1,108,1,0,'Login to site (requires logout)',1512481233,1),(21,1,123,1,0,'Like a post',1512481841,1),(22,1,108,1,0,'Login to site (requires logout)',1512493621,1),(23,1,121,1,0,'New Post',1512496385,1),(24,1,123,1,0,'Like a post',1512496442,1),(25,4,105,1,0,'Upload profile photo',1512496863,100),(26,4,104,1,0,'Add a friend',1512497043,1),(27,4,104,1,0,'Add a friend',1512497048,1),(28,4,104,1,0,'Add a friend',1512497053,1),(29,4,107,1,0,'Update Cover',1512497091,100),(30,1,104,1,0,'Add a friend',1512497159,1),(31,1,108,1,0,'Login to site (requires logout)',1512501648,1),(32,1,121,1,0,'New Post',1512503398,1),(33,1,100,1,0,'Offert 1 - Visit MiRed10.com',1512503728,25),(34,1,1,2,1,'Buy of Test',1512503862,-1),(35,1,108,1,0,'Login to site (requires logout)',1512504718,1),(36,1,123,1,0,'Like a post',1512504752,1),(37,1,121,1,0,'New Post',1512509273,1),(38,1,121,1,0,'New Post',1512509476,1),(39,1,121,1,0,'New Post',1512509496,1),(40,1,108,1,0,'Login to site (requires logout)',1512515637,1),(41,5,105,1,0,'Upload profile photo',1512544473,100),(42,5,107,1,0,'Update Cover',1512544503,100),(43,2,104,1,0,'Add a friend',1512544928,1),(44,5,104,1,0,'Add a friend',1512546189,1),(45,5,104,1,0,'Add a friend',1512546194,1),(46,5,104,1,0,'Add a friend',1512546214,1),(47,5,104,1,0,'Add a friend',1512546224,1),(48,1,104,1,0,'Add a friend',1512546479,1),(49,6,121,1,0,'New Post',1512547150,1),(50,6,123,1,0,'Like a post',1512547469,1),(51,6,122,1,0,'Comment a post',1512547484,1),(52,7,123,1,0,'Like a post',1512556236,1),(53,7,123,1,0,'Like a post',1512556239,1),(54,7,104,1,0,'Add a friend',1512556281,1),(55,1,104,1,0,'Add a friend',1512556290,1),(56,1,104,1,0,'Add a friend',1512556334,1),(57,3,104,1,0,'Add a friend',1512560618,1),(58,3,104,1,0,'Add a friend',1512560619,1),(59,11,105,1,0,'Upload profile photo',1512562154,100),(60,11,104,1,0,'Add a friend',1512562504,1),(61,11,104,1,0,'Add a friend',1512562510,1),(62,11,104,1,0,'Add a friend',1512562537,1),(63,11,104,1,0,'Add a friend',1512562544,1),(64,12,105,1,0,'Upload profile photo',1512562839,100),(65,11,108,1,0,'Login to site (requires logout)',1512562932,1),(66,13,105,1,0,'Upload profile photo',1512563044,100),(67,1,108,1,0,'Login to site (requires logout)',1512563082,1),(68,1,104,1,0,'Add a friend',1512564448,1),(69,1,104,1,0,'Add a friend',1512564528,1),(70,6,108,1,0,'Login to site (requires logout)',1512565148,1),(71,10,108,1,0,'Login to site (requires logout)',1512567315,1),(72,1,108,1,0,'Login to site (requires logout)',1512567664,1),(73,7,108,1,0,'Login to site (requires logout)',1512568122,1),(74,7,121,1,0,'New Post',1512568183,1),(75,7,104,1,0,'Add a friend',1512568432,1),(76,10,108,1,0,'Login to site (requires logout)',1512581964,1),(77,1,108,1,0,'Login to site (requires logout)',1512582090,1),(78,1,123,1,0,'Like a post',1512582776,1),(79,1,123,1,0,'Like a post',1512582782,1),(80,1,121,1,0,'New Post',1512583395,1),(81,1,121,1,0,'New Post',1512583628,1),(82,1,121,1,0,'New Post',1512583822,1),(83,1,123,1,0,'Like a post',1512583925,1),(84,1,123,1,0,'Like a post',1512584154,1),(85,4,108,1,0,'Login to site (requires logout)',1512612701,1),(86,4,104,1,0,'Add a friend',1512612737,1),(87,4,104,1,0,'Add a friend',1512612739,1),(88,1,108,1,0,'Login to site (requires logout)',1512617873,1),(89,10,108,1,0,'Login to site (requires logout)',1512618682,1),(90,1,108,1,0,'Login to site (requires logout)',1512618829,1),(91,1,108,1,0,'Login to site (requires logout)',1512619359,1),(92,1,108,1,0,'Login to site (requires logout)',1512619480,1),(93,1,108,1,0,'Login to site (requires logout)',1512619875,1),(94,1,108,1,0,'Login to site (requires logout)',1512620041,1),(95,2,108,1,0,'Login to site (requires logout)',1512632472,1),(96,2,108,1,0,'Login to site (requires logout)',1512637181,1),(97,1,108,1,0,'Login to site (requires logout)',1512639070,1),(98,2,108,1,0,'Login to site (requires logout)',1512640249,1),(99,2,108,1,0,'Login to site (requires logout)',1512640373,1),(100,2,108,1,0,'Login to site (requires logout)',1512641496,1),(101,2,108,1,0,'Login to site (requires logout)',1512641719,1),(102,2,121,1,0,'New Post',1512644594,1),(103,2,121,1,0,'New Post',1512644655,1),(104,3,108,1,0,'Login to site (requires logout)',1512644696,1),(105,6,108,1,0,'Login to site (requires logout)',1512644781,1),(106,6,121,1,0,'New Post',1512644846,1),(107,6,104,1,0,'Add a friend',1512644899,1),(108,6,104,1,0,'Add a friend',1512644900,1),(109,1,121,1,0,'New Post',1512648039,1),(110,1,123,1,0,'Like a post',1512648048,1),(111,2,123,1,0,'Like a post',1512648565,1),(112,2,123,1,0,'Like a post',1512648596,1),(113,3,123,1,0,'Like a post',1512648611,1),(114,1,123,1,0,'Like a post',1512649398,1),(115,1,123,1,0,'Like a post',1512649689,1),(116,1,123,1,0,'Like a post',1512654396,1),(117,1,121,1,0,'New Post',1512663925,1),(118,1,121,1,0,'New Post',1512664182,1),(119,1,121,1,0,'New Post',1512664538,1),(120,1,123,1,0,'Like a post',1512666732,1),(121,1,123,1,0,'Like a post',1512666737,1),(122,1,121,1,0,'New Post',1512683118,1),(123,1,121,1,0,'New Post',1512683375,1),(124,1,121,1,0,'New Post',1512713823,1),(125,1,123,1,0,'Like a post',1512714418,1),(126,1,121,1,0,'New Post',1512759739,1),(127,1,121,1,0,'New Post',1512761548,1),(128,1,121,1,0,'New Post',1512761568,1),(129,1,121,1,0,'New Post',1512839489,1),(130,1,121,1,0,'New Post',1512906904,1),(131,2,108,1,0,'Login to site (requires logout)',1513157925,1),(132,3,108,1,0,'Login to site (requires logout)',1513162065,1),(133,3,123,1,0,'Like a post',1513162566,1),(134,3,123,1,0,'Like a post',1513162572,1),(135,3,122,1,0,'Comment a post',1513162592,1),(136,2,121,1,0,'New Post',1513167264,1),(137,1,123,1,0,'Like a post',1513174018,1),(138,6,104,1,0,'Add a friend',1513236051,1),(139,14,104,1,0,'Add a friend',1513236263,1),(140,14,104,1,0,'Add a friend',1513238549,1),(141,2,104,1,0,'Add a friend',1513243392,1),(142,2,104,1,0,'Add a friend',1513243393,1),(143,2,121,1,0,'New Post',1513243765,1),(144,2,123,1,0,'Like a post',1513244067,1),(145,2,123,1,0,'Like a post',1513244073,1),(146,2,122,1,0,'Comment a post',1513244126,1),(147,2,123,1,0,'Like a post',1513244140,1),(148,2,123,1,0,'Like a post',1513244146,1),(149,2,123,1,0,'Like a post',1513244148,1),(150,2,123,1,0,'Like a post',1513244150,1),(151,2,121,1,0,'New Post',1513244460,1),(152,2,121,1,0,'New Post',1513244506,1),(153,2,121,1,0,'New Post',1513244899,1),(154,14,104,1,0,'Add a friend',1513245350,1),(155,2,104,1,0,'Add a friend',1513245374,1),(156,2,108,1,0,'Login to site (requires logout)',1513312849,1),(157,1,121,1,0,'New Post',1513324703,1),(158,1,123,1,0,'Like a post',1513324712,1),(159,1,123,1,0,'Like a post',1513324713,1),(160,1,123,1,0,'Like a post',1513326248,1),(161,1,123,1,0,'Like a post',1513326276,1),(162,1,108,1,0,'Login to site (requires logout)',1513347288,1),(163,1,108,1,0,'Login to site (requires logout)',1513347632,1),(164,1,108,1,0,'Login to site (requires logout)',1513351315,1),(165,1,108,1,0,'Login to site (requires logout)',1513373973,1),(166,15,105,1,0,'Upload profile photo',1549864127,100),(167,15,122,1,0,'Comment a post',1549864180,1),(168,16,105,1,0,'Upload profile photo',1549864334,100),(169,15,123,1,0,'Like a post',1549866222,1),(170,16,108,1,0,'Login to site (requires logout)',1549875917,1),(171,1,108,1,0,'Login to site (requires logout)',1549877459,1),(172,1,115,1,0,'Create new group',1549953548,20),(173,15,108,1,0,'Login to site (requires logout)',1549960931,1),(174,1,108,1,0,'Login to site (requires logout)',1549961063,1),(175,1,122,1,0,'Comment a post',1549961244,1),(176,1,108,1,0,'Login to site (requires logout)',1549963662,1),(177,1,122,1,0,'Comment a post',1549963780,1),(178,1,122,1,0,'Comment a post',1549963787,1),(179,1,125,1,0,'Create new page',1549964342,10),(180,16,108,1,0,'Login to site (requires logout)',1549964607,1),(181,15,108,1,0,'Login to site (requires logout)',1549965549,1),(182,15,115,1,0,'Create new group',1549965868,20),(183,15,122,1,0,'Comment a post',1549966632,1),(184,1,108,1,0,'Login to site (requires logout)',1549968786,1),(185,1,108,1,0,'Login to site (requires logout)',1549975465,1),(186,1,108,1,0,'Login to site (requires logout)',1549977084,1),(187,1,108,1,0,'Login to site (requires logout)',1549980173,1),(188,1,104,1,0,'Add a friend',1550043669,1),(189,1,104,1,0,'Add a friend',1550043688,1),(190,16,108,1,0,'Login to site (requires logout)',1550043781,1),(191,1,104,1,0,'Add a friend',1550043816,1),(192,16,104,1,0,'Add a friend',1550043898,1),(193,1,108,1,0,'Login to site (requires logout)',1550054482,1),(194,1,104,1,0,'Add a friend',1550054684,1),(195,1,108,1,0,'Login to site (requires logout)',1550317290,1),(196,1,108,1,0,'Login to site (requires logout)',1550317730,1),(197,1,108,1,0,'Login to site (requires logout)',1550317952,1),(198,1,108,1,0,'Login to site (requires logout)',1550834353,1),(199,1,122,1,0,'Comment a post',1550834377,1),(200,17,105,1,0,'Upload profile photo',1550834495,100),(201,17,108,1,0,'Login to site (requires logout)',1550834569,1),(202,18,122,1,0,'Comment a post',1550835049,1),(203,24,105,1,0,'Upload profile photo',1551182018,100),(204,27,108,1,0,'Login to site (requires logout)',1551184352,1),(205,27,108,1,0,'Login to site (requires logout)',1551184425,1),(206,29,108,1,0,'Login to site (requires logout)',1551191598,1),(207,29,122,1,0,'Comment a post',1551191613,1),(208,31,108,1,0,'Login to site (requires logout)',1551191665,1),(209,31,108,1,0,'Login to site (requires logout)',1551191715,1),(210,31,122,1,0,'Comment a post',1551192087,1),(211,31,122,1,0,'Comment a post',1551192096,1),(212,28,122,1,0,'Comment a post',1551192105,1),(213,31,108,1,0,'Login to site (requires logout)',1551192168,1),(214,31,122,1,0,'Comment a post',1551192181,1),(215,28,123,1,0,'Like a post',1551192509,1),(216,28,123,1,0,'Like a post',1551192511,1),(217,28,122,1,0,'Comment a post',1551192533,1),(218,31,122,1,0,'Comment a post',1551244341,1),(219,1,122,1,0,'Comment a post',1551269033,1),(220,1,105,1,0,'Upload profile photo',1551269320,100),(221,2,104,1,0,'Add a friend',1551273391,1),(222,2,105,1,0,'Upload profile photo',1551273453,100),(223,2,107,1,0,'Update Cover',1551273468,100),(224,1,108,1,0,'Login to site (requires logout)',1551358410,1),(225,1,108,1,0,'Login to site (requires logout)',1551358670,1),(226,1,121,1,0,'New Post',1551358771,1),(227,1,108,1,0,'Login to site (requires logout)',1551359602,1),(228,1,121,1,0,'New Post',1551359631,1),(229,32,121,1,0,'New Post',1551359864,1),(230,32,121,1,0,'New Post',1551359875,1),(231,32,121,1,0,'New Post',1551359914,1),(232,32,123,1,0,'Like a post',1551359921,1),(233,32,123,1,0,'Like a post',1551359922,1),(234,32,122,1,0,'Comment a post',1551359930,1),(235,32,122,1,0,'Comment a post',1551359994,1),(236,32,121,1,0,'New Post',1551360034,1),(237,32,121,1,0,'New Post',1551360078,1),(238,32,104,1,0,'Add a friend',1551360171,1),(239,34,121,1,0,'New Post',1551360519,1),(240,34,123,1,0,'Like a post',1551360525,1),(241,35,104,1,0,'Add a friend',1551360567,1),(242,34,104,1,0,'Add a friend',1551360583,1),(243,35,104,1,0,'Add a friend',1551360620,1),(244,35,121,1,0,'New Post',1551360798,1),(245,34,123,1,0,'Like a post',1551360895,1),(246,34,122,1,0,'Comment a post',1551360900,1),(247,34,121,1,0,'New Post',1551361545,1),(248,1,108,1,0,'Login to site (requires logout)',1551361707,1),(249,35,108,1,0,'Login to site (requires logout)',1551361744,1),(250,34,122,1,0,'Comment a post',1551362103,1),(251,34,123,1,0,'Like a post',1551362230,1),(252,34,122,1,0,'Comment a post',1551362238,1),(253,35,108,1,0,'Login to site (requires logout)',1551363260,1),(254,35,108,1,0,'Login to site (requires logout)',1551363533,1),(255,35,121,1,0,'New Post',1551364970,1),(256,35,105,1,0,'Upload profile photo',1551364998,100),(257,34,121,1,0,'New Post',1551412282,1),(258,34,123,1,0,'Like a post',1551412285,1),(259,1,108,1,0,'Login to site (requires logout)',1551412366,1),(260,1,108,1,0,'Login to site (requires logout)',1551417184,1),(261,1,121,1,0,'New Post',1551417390,1),(262,1,108,1,0,'Login to site (requires logout)',1551417908,1),(263,1,121,1,0,'New Post',1551417920,1),(264,1,105,1,0,'Upload profile photo',1551417954,100),(265,1,121,1,0,'New Post',1551417978,1),(266,1,108,1,0,'Login to site (requires logout)',1551418327,1),(267,34,121,1,0,'New Post',1551418716,1),(268,34,123,1,0,'Like a post',1551418723,1),(269,34,105,1,0,'Upload profile photo',1551418739,100),(270,34,107,1,0,'Update Cover',1551418843,100),(271,35,122,1,0,'Comment a post',1551418872,1),(272,35,123,1,0,'Like a post',1551418878,1),(273,34,123,1,0,'Like a post',1551418879,1),(274,34,123,1,0,'Like a post',1551418880,1),(275,35,123,1,0,'Like a post',1551418880,1),(276,34,123,1,0,'Like a post',1551418916,1),(277,34,123,1,0,'Like a post',1551418918,1),(278,34,121,1,0,'New Post',1551418988,1),(279,34,123,1,0,'Like a post',1551418998,1),(280,35,104,1,0,'Add a friend',1551419015,1),(281,34,104,1,0,'Add a friend',1551419035,1),(282,35,123,1,0,'Like a post',1551426438,1),(283,35,123,1,0,'Like a post',1551426439,1),(284,35,122,1,0,'Comment a post',1551426461,1),(285,34,122,1,0,'Comment a post',1551429309,1),(286,34,121,1,0,'New Post',1551429404,1),(287,34,123,1,0,'Like a post',1551429417,1),(288,34,123,1,0,'Like a post',1551429426,1),(289,34,121,1,0,'New Post',1551429593,1),(290,34,121,1,0,'New Post',1551429640,1),(291,34,123,1,0,'Like a post',1551429644,1),(292,34,123,1,0,'Like a post',1551429652,1),(293,34,123,1,0,'Like a post',1551429658,1),(294,34,121,1,0,'New Post',1551429685,1),(295,34,121,1,0,'New Post',1551429711,1),(296,34,121,1,0,'New Post',1551429747,1),(297,34,123,1,0,'Like a post',1551429752,1),(298,34,116,1,0,'Join a group',1551429960,10),(299,34,121,1,0,'New Post',1551430045,1),(300,34,104,1,0,'Add a friend',1551430105,1),(301,34,121,1,0,'New Post',1551457780,1),(302,34,122,1,0,'Comment a post',1551509971,1),(303,34,122,1,0,'Comment a post',1551549657,1),(304,34,123,1,0,'Like a post',1551549665,1),(305,34,123,1,0,'Like a post',1551549670,1),(306,36,104,1,0,'Add a friend',1551550086,1),(307,34,104,1,0,'Add a friend',1551550134,1),(308,34,121,1,0,'New Post',1551554662,1),(309,34,107,1,0,'Update Cover',1551557376,100),(310,37,104,1,0,'Add a friend',1551615092,1),(311,37,105,1,0,'Upload profile photo',1551615130,100),(312,37,107,1,0,'Update Cover',1551615142,100),(313,37,123,1,0,'Like a post',1551615166,1),(314,36,123,1,0,'Like a post',1551691839,1);
/*!40000 ALTER TABLE `uptransactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpointcounters`
--

DROP TABLE IF EXISTS `userpointcounters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpointcounters` (
  `user_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL,
  `lastrollover` int(4) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL DEFAULT 0,
  `cumulative` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`,`action_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpointcounters`
--

LOCK TABLES `userpointcounters` WRITE;
/*!40000 ALTER TABLE `userpointcounters` DISABLE KEYS */;
INSERT INTO `userpointcounters` VALUES (1,121,1551358771,5,31),(2,105,1551273453,100,200),(1,104,1550043669,4,12),(2,104,1551273391,1,7),(1,108,1551358410,8,40),(1,105,1551417954,100,300),(1,107,1512474129,100,100),(3,105,1512474235,100,100),(1,123,1513324712,4,20),(1,122,1551269033,1,6),(3,104,1512474346,4,4),(3,107,1512474623,100,100),(4,105,1512496863,100,100),(4,104,1512612737,2,5),(4,107,1512497091,100,100),(1,400,1512503728,25,25),(5,105,1512544473,100,100),(5,107,1512544503,100,100),(5,104,1512546189,4,4),(6,121,1512644846,1,2),(6,123,1512547469,1,1),(6,122,1512547484,1,1),(7,123,1512556236,2,2),(7,104,1512556281,2,2),(11,105,1512562154,100,100),(11,104,1512562504,4,4),(12,105,1512562839,100,100),(11,108,1512562932,1,1),(13,105,1512563044,100,100),(6,108,1512565148,2,2),(10,108,1512567315,3,3),(7,108,1512568122,1,1),(7,121,1512568183,1,1),(4,108,1512612701,1,1),(2,108,1513312849,1,8),(2,121,1513167264,5,7),(3,108,1513162065,1,2),(6,104,1513236051,1,3),(2,123,1513244067,6,8),(3,123,1513162566,2,3),(3,122,1513162592,1,1),(14,104,1513236263,3,3),(2,122,1513244126,1,1),(15,105,1549864127,100,100),(15,122,1549966632,1,2),(16,105,1549864334,100,100),(15,123,1549866222,1,1),(16,108,1549964607,2,3),(1,115,1549953548,20,20),(15,108,1549960931,2,2),(1,125,1549964342,10,10),(15,115,1549965868,20,20),(16,104,1550043898,1,1),(17,105,1550834495,100,100),(17,108,1550834569,1,1),(18,122,1550835049,1,1),(24,105,1551182018,100,100),(27,108,1551184352,2,2),(29,108,1551191598,1,1),(29,122,1551191613,1,1),(31,108,1551191665,3,3),(31,122,1551192087,4,4),(28,122,1551192105,2,2),(28,123,1551192509,2,2),(2,107,1551273468,100,100),(32,121,1551359864,5,5),(32,123,1551359921,2,2),(32,122,1551359930,2,2),(32,104,1551360171,1,1),(34,121,1551554662,1,14),(34,123,1551549665,2,18),(35,104,1551360567,3,3),(34,104,1551550134,1,4),(35,121,1551360798,2,2),(34,122,1551509971,2,6),(35,108,1551361744,3,3),(35,105,1551364998,100,100),(34,105,1551418739,100,100),(34,107,1551557376,100,200),(35,122,1551418872,2,2),(35,123,1551418878,4,4),(34,116,1551429960,10,10),(36,104,1551550086,1,1),(37,104,1551615092,1,1),(37,105,1551615130,100,100),(37,107,1551615142,100,100),(37,123,1551615166,1,1),(36,123,1551691839,1,1);
/*!40000 ALTER TABLE `userpointcounters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpointearner`
--

DROP TABLE IF EXISTS `userpointearner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpointearner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(4) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(4) NOT NULL DEFAULT 0,
  `photo` int(11) NOT NULL DEFAULT 0,
  `ext` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` int(11) NOT NULL DEFAULT 0,
  `cant` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `comments` int(11) NOT NULL DEFAULT 0,
  `comments_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `transact_state` int(11) NOT NULL DEFAULT 0,
  `metadata` text COLLATE utf8_unicode_ci NOT NULL,
  `redirect_on_buy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `field1` int(11) NOT NULL DEFAULT 0,
  `engagements` int(11) NOT NULL DEFAULT 0,
  `levels` text COLLATE utf8_unicode_ci NOT NULL,
  `appear_in_transactions` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `field1` (`field1`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpointearner`
--

LOCK TABLES `userpointearner` WRITE;
/*!40000 ALTER TABLE `userpointearner` DISABLE KEYS */;
INSERT INTO `userpointearner` VALUES (1,100,'','Visit MiRed10.com','This is the site of he autor, this point is free for you.',1479363323,0,'',25,999,2,0,1,1,0,'a:2:{s:3:\"url\";s:19:\"http://mired10.com/\";s:1:\"t\";i:1;}','http://mired10.com/','affiliate',0,1,'',1);
/*!40000 ALTER TABLE `userpointearner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpointearner_users`
--

DROP TABLE IF EXISTS `userpointearner_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpointearner_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL DEFAULT 0,
  `offer` int(11) NOT NULL DEFAULT 0,
  `stamp` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `transaction_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpointearner_users`
--

LOCK TABLES `userpointearner_users` WRITE;
/*!40000 ALTER TABLE `userpointearner_users` DISABLE KEYS */;
INSERT INTO `userpointearner_users` VALUES (1,1,1,1512503728,0,33);
/*!40000 ALTER TABLE `userpointearner_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpointranks`
--

DROP TABLE IF EXISTS `userpointranks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpointranks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` int(11) NOT NULL,
  `text` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpointranks`
--

LOCK TABLES `userpointranks` WRITE;
/*!40000 ALTER TABLE `userpointranks` DISABLE KEYS */;
INSERT INTO `userpointranks` VALUES (1,0,'Rookie'),(2,500,'Lieutenant'),(3,1000,'Member'),(4,2000,'Advanced Member'),(5,10000,'King'),(6,100000,'Impossible');
/*!40000 ALTER TABLE `userpointranks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpoints`
--

DROP TABLE IF EXISTS `userpoints`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpoints` (
  `user_id` int(11) NOT NULL,
  `count` int(11) NOT NULL DEFAULT 0,
  `totalearned` int(11) NOT NULL DEFAULT 0,
  `totalspent` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`user_id`),
  KEY `totalearned` (`totalearned`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpoints`
--

LOCK TABLES `userpoints` WRITE;
/*!40000 ALTER TABLE `userpoints` DISABLE KEYS */;
INSERT INTO `userpoints` VALUES (1,563,564,1),(2,331,331,0),(3,210,210,0),(4,206,206,0),(5,204,204,0),(6,9,9,0),(7,6,6,0),(11,105,105,0),(12,100,100,0),(13,100,100,0),(10,3,3,0),(14,3,3,0),(15,125,125,0),(16,104,104,0),(17,101,101,0),(18,1,1,0),(24,100,100,0),(27,2,2,0),(29,2,2,0),(31,7,7,0),(28,4,4,0),(32,10,10,0),(34,352,352,0),(35,114,114,0),(36,2,2,0),(37,202,202,0);
/*!40000 ALTER TABLE `userpoints` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpointspender`
--

DROP TABLE IF EXISTS `userpointspender`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpointspender` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `date` int(11) NOT NULL DEFAULT 0,
  `photo` int(11) NOT NULL DEFAULT 0,
  `ext` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cost` int(11) NOT NULL DEFAULT 0,
  `cant` int(11) NOT NULL DEFAULT 0,
  `views` int(11) NOT NULL DEFAULT 0,
  `comments` int(11) NOT NULL DEFAULT 0,
  `comments_allowed` tinyint(1) NOT NULL DEFAULT 1,
  `enabled` tinyint(1) NOT NULL DEFAULT 1,
  `transact_state` int(11) NOT NULL DEFAULT 0,
  `metadata` text COLLATE utf8_unicode_ci NOT NULL,
  `redirect_on_buy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `engagements` int(11) NOT NULL DEFAULT 0,
  `levels` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `appear_in_transactions` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpointspender`
--

LOCK TABLES `userpointspender` WRITE;
/*!40000 ALTER TABLE `userpointspender` DISABLE KEYS */;
INSERT INTO `userpointspender` VALUES (1,1,'','Test','Spend 1 point in this test',1485375516,0,NULL,1,99999,1,0,1,1,1,'a:2:{s:3:\"url\";s:0:\"\";s:1:\"t\";i:1;}','','',1,NULL,1),(2,2,'','Active ads','Active an ads of this website, the admin will to contact for active you ads.',1485375517,0,NULL,1000,10,0,0,1,1,1,'a:2:{s:3:\"url\";s:0:\"\";s:1:\"t\";i:1;}','','',0,NULL,1),(3,3,'','Invitations','Buy more invitations, and win more points',1485375518,0,NULL,1000,1000,0,0,1,1,1,'a:2:{s:3:\"url\";s:0:\"\";s:1:\"t\";i:1;}','','',0,NULL,1);
/*!40000 ALTER TABLE `userpointspender` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpointspender_users`
--

DROP TABLE IF EXISTS `userpointspender_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpointspender_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(4) NOT NULL DEFAULT 0,
  `offer` int(11) NOT NULL DEFAULT 0,
  `stamp` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `transaction_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpointspender_users`
--

LOCK TABLES `userpointspender_users` WRITE;
/*!40000 ALTER TABLE `userpointspender_users` DISABLE KEYS */;
INSERT INTO `userpointspender_users` VALUES (1,1,1,1512503862,1,34);
/*!40000 ALTER TABLE `userpointspender_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpointstats`
--

DROP TABLE IF EXISTS `userpointstats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpointstats` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` int(9) NOT NULL DEFAULT 0,
  `earn` int(9) NOT NULL DEFAULT 0,
  `spend` int(9) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`,`date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpointstats`
--

LOCK TABLES `userpointstats` WRITE;
/*!40000 ALTER TABLE `userpointstats` DISABLE KEYS */;
/*!40000 ALTER TABLE `userpointstats` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-05 14:13:52