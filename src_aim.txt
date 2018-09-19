# Host: localhost  (Version: 5.5.53)
# Date: 2018-09-19 18:15:17
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "src_aim"
#

DROP TABLE IF EXISTS `src_aim`;
CREATE TABLE `src_aim` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `short_url` varchar(255) DEFAULT NULL,
  `long_url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

#
# Data for table "src_aim"
#

/*!40000 ALTER TABLE `src_aim` DISABLE KEYS */;
INSERT INTO `src_aim` VALUES (3,'www.bian.com/a','www.baidu.com'),(23,'f','www.jd.com'),(24,'y','baidu.com'),(25,'z','http://baidu.com'),(26,'ba','http://360.com'),(27,'bb',''),(28,'bc','&lt;b&gt;bold&lt;/b&gt;'),(29,'bd','www.baidu.com&quot;333&quot;'),(30,'be','baidu.com113331'),(31,'bf','baidu.com1133'),(32,'bg','https://m.jb51.net/show/25084'),(33,'bh','http://baidu.comtttt'),(34,'bi','http://baidu.comlll'),(35,'bj','http://baidu.commmm'),(36,'bk','http://baidu.comjjj'),(37,'bl','http://baidu.combbb'),(38,'bm','http://baidu.comvvv');
/*!40000 ALTER TABLE `src_aim` ENABLE KEYS */;
