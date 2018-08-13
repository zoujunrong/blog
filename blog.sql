/*
SQLyog v10.2 
MySQL - 5.5.5-10.1.21-MariaDB : Database - blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;

USE `blog`;

/*Table structure for table `bookmarks` */

DROP TABLE IF EXISTS `bookmarks`;

CREATE TABLE `bookmarks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '作者ID',
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `url_md5` char(32) DEFAULT '' COMMENT 'url的md5值 可以用来查询文章地址',
  `url` varchar(500) DEFAULT '' COMMENT '原始地址',
  `childrens` smallint(6) unsigned DEFAULT '0' COMMENT '子节点数量',
  `is_folder` tinyint(3) unsigned DEFAULT '0' COMMENT '是否为文件夹 0 否  1 是',
  `open_status` tinyint(3) unsigned DEFAULT '0' COMMENT '公开状态：0 不公开，1公开',
  `parent_path` varchar(120) DEFAULT NULL COMMENT '父级书签路径',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `quotes` int(10) unsigned DEFAULT '1' COMMENT '引用数',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`,`url_md5`) USING BTREE,
  KEY `select2` (`url_md5`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `bookmarks` */

/*Table structure for table `bookmarks_1` */

DROP TABLE IF EXISTS `bookmarks_1`;

CREATE TABLE `bookmarks_1` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '作者ID',
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `url_md5` char(32) DEFAULT '' COMMENT 'url的md5值 可以用来查询文章地址',
  `url` varchar(500) DEFAULT '' COMMENT '原始地址',
  `childrens` smallint(6) unsigned DEFAULT '0' COMMENT '子节点数量',
  `is_folder` tinyint(3) unsigned DEFAULT '0' COMMENT '是否为文件夹 0 否  1 是',
  `open_status` tinyint(3) unsigned DEFAULT '0' COMMENT '公开状态：0 不公开，1公开',
  `parent_path` varchar(120) DEFAULT NULL COMMENT '父级书签路径',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `quotes` int(10) unsigned DEFAULT '1' COMMENT '引用数',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`,`url_md5`) USING BTREE,
  KEY `select2` (`url_md5`,`deleted_at`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=257 DEFAULT CHARSET=utf8;

/*Data for the table `bookmarks_1` */

insert  into `bookmarks_1`(`id`,`uid`,`fid`,`title`,`desc`,`url_md5`,`url`,`childrens`,`is_folder`,`open_status`,`parent_path`,`sortid`,`quotes`,`created_at`,`deleted_at`,`updated_at`) values (1,1,0,'','','d41d8cd98f00b204e9800998ecf8427e','',2,1,0,'0',0,1,1512782300,0,1512782300),(2,1,1,'书签栏','','33340633670e3f8521b355a6cc0a8039','',15,1,0,'0-1',0,1,1409985848,0,1512368293),(3,1,2,'最近','','046c6233e03af774df7b90b4504fa96c','',8,1,0,NULL,0,1,1510299197,1517108409,1512702044),(4,1,3,'在线JSON解析','','fff00ee74c1efa4a94271e46b82fe01b','https://www.bejson.com/jsonviewernew/',0,0,0,NULL,0,1,1512702044,0,1512702044),(5,1,3,'JSON对比工具','','f224a9c42cebf5d3dbd9b973ee67d0c8','http://jsoneditoronline.org/',0,0,0,NULL,1,1,1512702036,0,1512702036),(6,1,3,'第1章　初步接触Chrome扩展应用开发-图灵社区','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,NULL,2,1,1512553846,0,1512553846),(7,1,3,'前段技术','','65968bba8d8f7fc6c39e887240509ec3','http://www.webhek.com/css-flip/',0,0,0,NULL,3,1,1512553841,0,1512553841),(8,1,3,'禅道项目','','be3e5d5f4d826c75c786de1868a4c12d','http://project.manage.valsun.cn:88/index.php?m=my&f=index',0,0,0,NULL,4,1,1512004009,0,1512004009),(9,1,3,'在线编辑器','','21274cab46736f90c8b8c6210a9d403e','https://codenvy.com/docs/',0,0,0,NULL,5,1,1511917894,0,1511917894),(10,1,3,'jQuery API 中文文档 | jQuery API 中文在线手册 | jquery api 下载 | jquery api chm','','d53ce648fc094d83aab48498afa7cac4','http://jquery.cuishifeng.cn/',0,0,0,NULL,6,1,1510321429,0,1510321429),(11,1,3,'AdminLTE 2 | Documentation','','1d194ed0ac15a2609adb8eafc0a5d4b7','https://adminlte.io/themes/AdminLTE/documentation/index.html',0,0,0,NULL,7,1,1510321369,0,1510321369),(12,1,2,'常用','','f7e68bde2caa2cb5696d6a37fe4a23a4','',13,1,0,NULL,1,1,1509969929,1517108409,1512702044),(13,1,12,'第1章　初步接触Chrome扩展应用开发-图灵社区','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,NULL,0,1,1509969937,0,1509969937),(14,1,12,'范本总表-范本系统','','90fd07163bb40110524cf6b7022a8d5f','http://template.valsun.cn/index.php?mod=templateTotal&act=admin',0,0,0,NULL,1,1,1509969947,0,1509969947),(15,1,12,'Laravel 5.2 使用 JWT 完成多用户认证 | Laravel China 社区 - 高品质的 Laravel 开发者社区 - Powered by PHPHub','','c893bb75787ea3aad8a13ee6436ad728','https://laravel-china.org/topics/2811/laravel-52-uses-jwt-to-complete-multi-user-authentication',0,0,0,NULL,2,1,1510060475,0,1510060475),(16,1,12,'Laravel 5.5 中文文档 | Laravel 5.5 中文文档','','12fd38fc30f14c091d64b94fa95d8040','https://d.laravel-china.org/docs/5.5',0,0,0,NULL,3,1,1510147734,0,1510147734),(17,1,12,'php+中文分词scws+sphinx+mysql打造千万级数据全文搜索 - CSDN博客','','6c1c598c846297acf76331d48d439e4c','http://blog.csdn.net/nuli888/article/details/51892776',0,0,0,NULL,4,1,1510063778,0,1510063778),(18,1,12,'Overview - Google Chrome','','ee2cd2d90101736789efc77ba90d05dd','https://developer.chrome.com/extensions/overview',0,0,0,NULL,5,1,1510278628,0,1510278628),(19,1,12,'AdminLTE 2 | Documentation','','1d194ed0ac15a2609adb8eafc0a5d4b7','https://adminlte.io/themes/AdminLTE/documentation/index.html',0,0,0,NULL,6,1,1510321369,0,1510321369),(20,1,12,'jQuery API 中文文档 | jQuery API 中文在线手册 | jquery api 下载 | jquery api chm','','d53ce648fc094d83aab48498afa7cac4','http://jquery.cuishifeng.cn/',0,0,0,NULL,7,1,1510321429,0,1510321429),(21,1,12,'在线编辑器','','21274cab46736f90c8b8c6210a9d403e','https://codenvy.com/docs/',0,0,0,NULL,8,1,1511917894,0,1511917894),(22,1,12,'禅道项目','','be3e5d5f4d826c75c786de1868a4c12d','http://project.manage.valsun.cn:88/index.php?m=my&f=index',0,0,0,NULL,9,1,1512004009,0,1512004009),(23,1,12,'前段技术','','65968bba8d8f7fc6c39e887240509ec3','http://www.webhek.com/css-flip/',0,0,0,NULL,10,1,1512553841,0,1512553841),(24,1,12,'JSON对比工具','','f224a9c42cebf5d3dbd9b973ee67d0c8','http://jsoneditoronline.org/',0,0,0,NULL,11,1,1512702036,0,1512702036),(25,1,12,'在线JSON解析','','fff00ee74c1efa4a94271e46b82fe01b','https://www.bejson.com/jsonviewernew/',0,0,0,NULL,12,1,1512702044,0,1512702044),(26,1,2,'开发工具','','2c509530bf439a36168a86e21c160c06','',3,1,0,'0-1-2',2,1,1509585372,0,1509586154),(27,1,26,'正则匹配网站','','31760270da2559a247a64a82b5848975','https://regex101.com/',0,0,0,'0-1-2-26',0,1,1501749084,0,1501749084),(28,1,26,'JSON对比工具','','f224a9c42cebf5d3dbd9b973ee67d0c8','http://jsoneditoronline.org/',0,0,0,'0-1-2-26',1,1,1428485340,0,1428485340),(29,1,26,'在线JSON解析','','fff00ee74c1efa4a94271e46b82fe01b','https://www.bejson.com/jsonviewernew/',0,0,0,'0-1-2-26',2,1,1421300984,0,1421300984),(30,1,2,'赛维系统','','719e437a5eb775cdbffcadb6252af5f3','',2,1,0,'0-1-2',3,1,1509585253,0,1509587913),(31,1,30,'范本总表-范本系统','','90fd07163bb40110524cf6b7022a8d5f','http://template.valsun.cn/index.php?mod=templateTotal&act=admin',0,0,0,'0-1-2-30',0,1,1508311227,0,1508311227),(32,1,30,'禅道项目','','be3e5d5f4d826c75c786de1868a4c12d','http://project.manage.valsun.cn:88/index.php?m=my&f=index',0,0,0,'0-1-2-30',1,1,1411626018,0,1411626018),(33,1,2,'前端技术','','40d75c2ce5736588a6e7d58df6d5aee1','',11,1,0,'0-1-2',4,1,1411993750,0,1512098328),(34,1,33,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-1-2-33',0,1,1411993728,1517108409,1411993728),(35,1,33,'前段技术','','65968bba8d8f7fc6c39e887240509ec3','http://www.webhek.com/css-flip/',0,0,0,'0-1-2-33',1,1,1411992331,0,1411992331),(36,1,33,'谷歌驱动器的Web API的','','b7006b08dcd8a5e5d85dcbfe3bdecff9','https://developers.google.com/drive/web/about-sdk',0,0,0,'0-1-2-33',2,1,1412488293,0,1412488293),(37,1,33,'SkyDrive API 的使用','','757695c7842a488d142b3d9879cbdb6b','http://www.cnblogs.com/zoho/archive/2013/02/09/2909530.html',0,0,0,'0-1-2-33',3,1,1412488277,0,1412488277),(38,1,33,'SkyDrive的API：Codenvy教程','','21274cab46736f90c8b8c6210a9d403e','https://codenvy.com/docs/',0,0,0,'0-1-2-33',4,1,1412489812,0,1412489812),(39,1,33,'Wish API','','1c754f7f8edba2f6e53fa8baeac15662','http://merchant.wish.com/documentation/api',0,0,0,NULL,5,1,1429322371,1517108409,1429322371),(40,1,33,'Overview - Google Chrome','','ee2cd2d90101736789efc77ba90d05dd','https://developer.chrome.com/extensions/overview',0,0,0,NULL,6,1,1508758331,1517108409,1508758331),(41,1,33,'AdminLTE 2 | Documentation','','1d194ed0ac15a2609adb8eafc0a5d4b7','https://adminlte.io/themes/AdminLTE/documentation/index.html',0,0,0,'0-1-2-33',7,1,1509451995,0,1509451995),(42,1,33,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-1-2-33',8,1,1509518526,0,1509518526),(43,1,33,'jQuery API 中文文档 | jQuery API 中文在线手册 | jquery api 下载 | jquery api chm','','d53ce648fc094d83aab48498afa7cac4','http://jquery.cuishifeng.cn/',0,0,0,'0-1-2-33',9,1,1509542743,0,1509542743),(44,1,33,'What are extensions? - Google Chrome','','d6c2f248976d2761a138dcd933f280ef','https://developer.chrome.com/extensions',0,0,0,NULL,10,1,1512098321,1517108409,1512098321),(45,1,2,'linux','','e206a54e97690cce50cc872dd70ee896','',1,1,0,'0-1-2',5,1,1509585468,0,1509627702),(46,1,45,'Linux下Postfix的配置和使用','','9c3816d2df4648ac3219f38ec7579a0d','http://blog.csdn.net/hitabc141592/article/details/25986911',0,0,0,'0-1-2-45',0,1,1427096133,0,1427096133),(47,1,2,'python','','23eeeb4347bdd26bfc6b7ee9a3b755dd','',1,1,0,'0-1-2',6,1,1505443039,0,1505732353),(48,1,47,'python restful api搭建','','882067308850b1eea2562479c2247202','http://www.cnblogs.com/vovlie/p/4178077.html',0,0,0,'0-1-2-47',0,1,1505442984,0,1505442984),(49,1,2,'tensorflow','','2c39bc19b761ac36dc046245d1d47fe6','',5,1,0,'0-1-2',7,1,1505732372,0,1512436490),(50,1,49,'tensorflow','','ab5a8b727eba2f9a2692d525f69a3c69','https://www.leiphone.com/news/201703/JNPkCt08zJd9znzZ.html',0,0,0,'0-1-2-49',0,1,1505732353,0,1505732353),(51,1,49,'书签--扩展开发文档','','d7d233973f49480bc8c89fb48082b0c4','http://open.chrome.360.cn/extension_dev/bookmarks.html',0,0,0,'0-1-2-49',1,1,1507973009,0,1507973009),(52,1,49,'chrome.bookmarks - Google Chrome','','3b62cc442d52aae9c815c6c7b79b1801','https://developer.chrome.com/extensions/bookmarks',0,0,0,'0-1-2-49',2,1,1508310687,0,1508310687),(53,1,49,'用 TensorFlow 做个聊天机器人','','be579de8edd75446639a2bc5d8538c10','http://www.jianshu.com/p/3c6f1e32e128',0,0,0,'0-1-2-49',3,1,1512435909,0,1512435909),(54,1,49,'自己动手做聊天机器人 一-涉及知识 - SharEDITor - 关注大数据技术','','181b1294023aac0b1f8bc6049b5fecff','http://www.shareditor.com/blogshow?blogId=63',0,0,0,'0-1-2-49',4,1,1512436490,0,1512436490),(55,1,2,'sphinx','','4a2c09ffbc6e7d0414d1ae731e3a0ce5','',6,1,0,'0-1-2',8,1,1509346935,0,1512098321),(56,1,55,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-1-2-55',0,1,1509346909,0,1509346909),(57,1,55,'sphinx全文检索 安装配置和使用 - Lion_coder - 博客园','','8d0fa459b20fd4651a062f5c7f1d758f','http://www.cnblogs.com/findgor/p/5644540.html',0,0,0,'0-1-2-55',1,1,1509370367,0,1509370367),(58,1,55,'php+中文分词scws+sphinx+mysql打造千万级数据全文搜索 - CSDN博客','','6c1c598c846297acf76331d48d439e4c','http://blog.csdn.net/nuli888/article/details/51892776',0,0,0,'0-1-2-55',2,1,1509370672,0,1509370672),(59,1,55,'sphinx php 扩展安装','','ed2886468d1a31493e808e6f63d57048','http://blog.csdn.net/fenglailea/article/details/38115821',0,0,0,'0-1-2-55',3,1,1510046393,0,1510046393),(60,1,55,'Sphinx配置文件详细介绍','','90ff1084b209042fc8fe97d3ea980b2a','http://blog.sina.com.cn/s/blog_6c971aa301012yfb.html',0,0,0,'0-1-2-55',4,1,1510120321,0,1510120321),(61,1,55,'SphinxSearch','','a454738df83b9eb9fdc5ec49ee0ab90c','https://www.mediawiki.org/wiki/Extension:SphinxSearch#Step_1_-_Install_Sphinx',0,0,0,'0-1-2-55',5,1,1512013443,0,1512013443),(62,1,2,'mysql','','81c3b080dad537de7e10e0987a4bf52e','',2,1,0,'0-1-2',9,1,1510211013,0,1512435909),(63,1,62,'MySQL配置参数详解','','655b7dcb7654656f5b221ee8c0b86351','http://blog.csdn.net/wlzx120/article/details/52301383',0,0,0,'0-1-2-62',0,1,1510210997,0,1510210997),(64,1,62,'mysql官方文档','','8086d6e5c8c49569785e1ef58a8a57b6','https://dev.mysql.com/doc/refman/5.5/en/preface.html',0,0,0,'0-1-2-62',1,1,1512368293,0,1512368293),(65,1,2,'laravel','','0659e0de287281473da4d859f0b9ef35','',3,1,0,'0-1-2',10,1,1509962543,1517108409,1510147725),(66,1,65,'社会化登录组件','','bc5bdedd21cd17846326acdbf9a19eff','http://socialiteproviders.github.io/',0,0,0,'0-1-2-65',0,1,1509962514,0,1509962514),(67,1,65,'Laravel 5.2 使用 JWT 完成多用户认证 | Laravel China 社区 - 高品质的 Laravel 开发者社区 - Powered by PHPHub','','c893bb75787ea3aad8a13ee6436ad728','https://laravel-china.org/topics/2811/laravel-52-uses-jwt-to-complete-multi-user-authentication',0,0,0,'0-1-2-65',1,1,1509972092,0,1509972092),(68,1,65,'Laravel 5.5 中文文档 | Laravel 5.5 中文文档','','12fd38fc30f14c091d64b94fa95d8040','https://d.laravel-china.org/docs/5.5',0,0,0,'0-1-2-65',2,1,1510147719,0,1510147719),(69,1,2,'php','','e1bfd762321e409cee4ac0b6e841963c','',0,1,0,'0-1-2',11,1,1509587628,0,1509611764),(70,1,2,'区块链','','75d8fafb0706c9381d4c91e3b184f19d','',1,1,0,'0-1-2',12,1,1510210406,0,1510210997),(71,1,70,'区块链技术指南','','453abeaa1c8024bce68cbd21ec5b715a','https://yeasy.gitbooks.io/blockchain_guide/content/',0,0,0,'0-1-2-70',0,1,1510210381,0,1510210381),(72,1,2,'git','','ba9f11ecc3497d9993b933fdc2bd61e5','',1,1,0,'0-1-2',14,1,1510197915,0,1510210381),(73,1,72,'git - the simple guide - no deep shit!','','ba0a4203e749c0c3d878c8ecf4f317b4','http://rogerdudler.github.io/git-guide/index.zh.html',0,0,0,'0-1-2-72',0,1,1510197885,0,1510197885),(74,1,2,'在线编辑器','','21274cab46736f90c8b8c6210a9d403e','https://codenvy.com/docs/',0,0,0,'0-1-2',13,1,1509609402,0,1509609402),(75,1,1,'其他书签','','cb8fd0a93609eef1ae04301e9d2f40ab','',18,1,0,'0-1',1,1,1409985848,0,1510286119),(76,1,75,'aaa','','47bce5c74f589f4867dbd57e9ca9f808','',0,1,0,'0-1-75',1,1,1510059142,0,1510059142),(77,1,75,'ebay开发者中心','','c4bf61c480713678426716760e17a731','',7,1,0,'0-1-75',4,1,1430106150,0,1476148959),(78,1,77,'eBay API 开发-eBay外贸社区 - Powered by Discuz!','','cb0ac9b75c2c66b4215ec2e99c62686e','http://community.ebay.cn/forum-400000108-1.html',0,0,0,'0-1-75-77',0,1,1430106133,0,1430106133),(79,1,77,'Call Index - API Reference - Trading API','','6c51941754b2efc3d0acfdd4292922a5','http://developer.ebay.com/DevZone/XML/docs/Reference/ebay/index.html',0,0,0,'0-1-75-77',1,1,1438830029,0,1438830029),(80,1,77,'华成云商开发者API文档-运输方式','','6483b73c4c987c7a89674c325dcd461d','http://developer.valsun.cn/index.php?mod=developerDoc&act=shippingType',0,0,0,'0-1-75-77',2,1,1440730394,0,1440730394),(81,1,77,'一键分销','','0a33c94e368fe5b545acce14f375cf36','http://sub.fenxiao.valsun.cn/',0,0,0,'0-1-75-77',3,1,1444617752,0,1444617752),(82,1,77,'www.techweb.com.cn/rss/data.xml','','483d6f0a8abe0e547d7730bcfd8caf96','http://www.techweb.com.cn/rss/data.xml',0,0,0,'0-1-75-77',4,1,1449121188,0,1449121188),(83,1,77,'速卖通 api文档','','d066a11c4960fe47d5d7a5788c769f7b','http://gw.api.alibaba.com/dev/doc/intl/api.htm?ns=aliexpress.open&n=api.findOrderListQuery&v=1',0,0,0,'0-1-75-77',5,1,1470917982,0,1470917982),(84,1,77,'ebay api文档','','e9ec12bd1f35c392da944bdd42d526bd','http://developer.ebay.com/Devzone/XML/docs/Reference/ebay/index.html',0,0,0,'0-1-75-77',6,1,1470918356,0,1470918356),(85,1,75,'unix时间戳','','1fce04717dae407d0b0c16db3ecb186c','',2,1,0,'0-1-75',6,1,1435546461,0,1438830029),(86,1,85,'Unix时间戳(Unix timestamp)转换工具 - 站长工具','','fceef11627f9a6e3f0f64d226e1310bc','http://tool.chinaz.com/Tools/unixtime.aspx',0,0,0,'0-1-75-85',0,1,1435546442,0,1435546442),(87,1,85,'PHP: PHP 手册 - Manual','','5852402aa7c7d194ed0336dca491ac14','http://php.net/manual/zh/',0,0,0,'0-1-75-85',1,1,1438325896,0,1438325896),(88,1,75,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,NULL,0,1,1510286119,1517061535,1510286119),(89,1,75,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,NULL,2,1,1509969805,1517061535,1509969805),(90,1,75,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,NULL,3,1,1509969802,1517061535,1509969802),(91,1,75,'修改订单详情页','','a9928503070e422b681d363de6b80ad2','http://local.hc/developerInformationList/index.php?mod=orderDetails&act=update&dp_id=160&id=8315',0,0,0,'0-1-75',5,1,1434173337,0,1434173337),(92,1,75,'Python 字典(Dictionary) fromkeys()方法 | 菜鸟教程','','a3f9cd873efae5eb36586db8c1ee2691','http://www.runoob.com/python/att-dictionary-fromkeys.html',0,0,0,'0-1-75',7,1,1476148959,1517061535,1476148959),(93,1,75,'分享Centos6.5升级glibc过程 - CNode技术社区','','558050221a9aa278e7e3a58683e51b2b','http://cnodejs.org/topic/56dc21f1502596633dc2c3dc',0,0,0,'0-1-75',8,1,1476338365,1517061535,1476338365),(94,1,75,'Wish 商户平台','','366f999513d5feb1a13eb855eec7c85d','https://merchant.wish.com/transactions/action',0,0,0,'0-1-75',9,1,1479526893,1517061535,1479526893),(95,1,75,'php-rdkafka','','1da472b20b4903caae2028579e4a384a','https://github.com/arnaud-lb/php-rdkafka#documentation',0,0,0,'0-1-75',10,1,1492837102,1517061535,1492837102),(96,1,75,'开始使用  |  TensorFlow','','4160f164f5a1fdce4e7211e7aa00cdc8','https://www.tensorflow.org/get_started/',0,0,0,'0-1-75',11,1,1504506593,1517061535,1504506593),(97,1,75,'Chrome 网上应用店 - bookmarks','','8a0b350ef5889d054b0cbbdc373a0dfd','https://chrome.google.com/webstore/search/bookmarks?hl=zh-CN',0,0,0,'0-1-75',12,1,1508899533,1517061535,1508899533),(98,1,75,'Profile & Contacts | eBay','','491124c1bec7c7fe52dd54d302d24138','https://developer.ebay.com/my/profile#',0,0,0,'0-1-75',13,1,1508911307,1517061535,1508911307),(99,1,75,'大本营','','be5582b018741b37cc2da76fa35bf163','chrome://newtab/',0,0,0,'0-1-75',14,1,1509000466,1517061535,1509000466),(100,1,75,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-1-75',15,1,1509969802,0,1509969802),(101,1,75,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-1-75',16,1,1509969805,0,1509969805),(102,1,75,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-1-75',17,1,1510286119,0,1510286119),(103,1,3,'Font Awesome, 为 Bootstrap 而创造的图标字体','','89c9c605f256193b98103b123acd5d70','http://www.bootcss.com/p/font-awesome/',0,0,0,NULL,9,1,1509817497,0,1509817497),(104,1,3,'九九藏书网','','4f2fd26a429060476215e41b6fcad376','http://www.99lib.net/book/8365/index.htm',0,0,0,NULL,10,1,1511703264,0,1511703264),(105,1,3,'PostNL','','53dd90507f82eca48030e7a404913f51','http://merchant.wish.com/documentation/api#provider',0,0,0,NULL,11,1,1509815249,0,1509815249),(106,1,3,'58同城','','f2279e66aadb2eb4b33af91a7b471c11','http://sz.58.com/shenghuo.shtml?utm_source=link&spm=s-39164286688275-ps-f-803.pjz_huangye1',0,0,0,NULL,12,1,1509817583,0,1509817583),(107,1,3,'SQL命令 - Adminer','','7f5ec225f0f96711a07271e89430c672','http://admin.app/?username=root&db=blog&sql=',0,0,0,NULL,13,1,1511060836,0,1511060836),(108,1,3,'icono | Pure CSS icons','','6b4beedeb91a667c133b5e4b40ecb7e4','https://saeedalipoor.github.io/icono/',0,0,0,NULL,14,1,1510486664,0,1510486664),(109,1,3,'ELK+Filebeat+Kafka+ZooKeeper 构建海量日志分析平台 - 推酷','','59c2730ed45c80c41bf722ca0b11cd7d','http://www.tuicool.com/articles/R77fieA',0,0,0,NULL,15,1,1510069891,0,1510069891),(110,1,3,'大众点评订单分库分表实践之路__够过瘾——挨踢男的葵花宝典','','1bbb318bf55e98a0cacacb1024eb42de','http://www.gouguoyin.cn/it/105.html',0,0,0,NULL,16,1,1509986528,0,1509986528),(111,1,3,'JSON校验','','3e7d1a0bc18f60205fd9d0dc72ce2806','http://www.bejson.com/',0,0,0,NULL,17,1,1509892506,0,1509892506),(112,1,3,'Wish 商户平台','','366f999513d5feb1a13eb855eec7c85d','https://merchant.wish.com/transactions/action',0,0,0,NULL,18,1,1509815265,0,1509815265),(113,1,3,'百度地图','','0bd3434011b834e321cfbcd7de379a35','http://map.baidu.com/',0,0,0,NULL,19,1,1509817384,0,1509817384),(114,1,3,'深圳市考试院','','bedec1c2bf610bbf6501d44bce803485','http://www.testcenter.gov.cn/ksyweb/',0,0,0,NULL,20,1,1509817418,0,1509817418),(115,1,3,'打开新的标签页','','be5582b018741b37cc2da76fa35bf163','chrome://newtab/',0,0,0,NULL,21,1,1509817409,0,1509817409),(116,1,3,'深圳教师招聘 | 深圳教师招聘网2016第一品牌 - 深圳教师求职网','','f19c449c35c2d55d68883d1e46190303','http://jiaoshiqiuzhi.com/',0,0,0,NULL,22,1,1509815182,0,1509815182),(117,1,3,'Wish','','8da8cf45b46a0ebb3f580da59086ffe4','http://merchant.wish.com/',0,0,0,NULL,23,1,1509815155,0,1509815155),(118,1,12,'JSON校验','','3e7d1a0bc18f60205fd9d0dc72ce2806','http://www.bejson.com/',0,0,0,NULL,14,1,1509812675,1513182320,1509812675),(119,1,12,'Weex','','33b7864ace9b64268927fd2ec0944427','http://weex.apache.org/',0,0,0,NULL,15,1,1509196625,0,1509196625),(120,1,12,'深圳教师招聘 | 深圳教师招聘网2016第一品牌 - 深圳教师求职网','','f19c449c35c2d55d68883d1e46190303','http://jiaoshiqiuzhi.com/',0,0,0,NULL,16,1,1509815182,0,1509815182),(121,1,12,'Font Awesome, 为 Bootstrap 而创造的图标字体','','89c9c605f256193b98103b123acd5d70','http://www.bootcss.com/p/font-awesome/',0,0,0,NULL,17,1,1509817510,0,1509817510),(122,1,12,'百度地图','','0bd3434011b834e321cfbcd7de379a35','http://map.baidu.com/',0,0,0,NULL,18,1,1509817384,0,1509817384),(123,1,12,'58同城','','f2279e66aadb2eb4b33af91a7b471c11','http://sz.58.com/shenghuo.shtml?utm_source=link&spm=s-39164286688275-ps-f-803.pjz_huangye1',0,0,0,NULL,19,1,1509817583,0,1509817583),(124,1,12,'大众点评订单分库分表实践之路__够过瘾——挨踢男的葵花宝典','','1bbb318bf55e98a0cacacb1024eb42de','http://www.gouguoyin.cn/it/105.html',0,0,0,NULL,20,1,1509986528,0,1509986528),(125,1,12,'icono | Pure CSS icons','','6b4beedeb91a667c133b5e4b40ecb7e4','https://saeedalipoor.github.io/icono/',0,0,0,NULL,21,1,1510486664,0,1510486664),(126,1,12,'SQL命令 - Adminer','','7f5ec225f0f96711a07271e89430c672','http://admin.app/?username=root&db=blog&sql=',0,0,0,NULL,22,1,1511060672,0,1511060672),(127,1,12,'ELK+Filebeat+Kafka+ZooKeeper 构建海量日志分析平台 - 推酷','','59c2730ed45c80c41bf722ca0b11cd7d','http://www.tuicool.com/articles/R77fieA',0,0,0,NULL,23,1,1510069891,0,1510069891),(128,1,12,'九九藏书网','','4f2fd26a429060476215e41b6fcad376','http://www.99lib.net/book/8365/index.htm',0,0,0,NULL,24,1,1511703264,0,1511703264),(129,1,2,'PhantomJS','','eb65cd5a673129979f89111624f535f3','',2,1,0,'0-1-2',16,1,1438014076,0,1438448283),(130,1,129,'PhantomJS快速入门教程 - 推酷','','e1fbe280867986de48ea56e8b739901d','http://www.tuicool.com/articles/beeMNj/',0,0,0,'0-1-2-129',0,1,1438014044,0,1438014044),(131,1,129,'PhantomJS安装及快速入门教程 - PHPERZ中文资讯站','','5ac2fd45228ca62c6169c11e35e237d9','http://www.phperz.com/article/14/1115/35197.html',0,0,0,'0-1-2-129',1,1,1438014827,0,1438014827),(132,1,2,'互动','','6da1ce3eec873f0f32993743fef001c6','',0,1,0,'0-1-2',17,1,1438448302,0,1509196625),(133,1,2,'技术','','a95dd3e179418be1ecd2a719a22db70e','',7,1,0,'0-1-2',18,1,1441253331,0,1509894241),(134,1,133,'Dark Blue  ','','181f6bb6a4e4d2e00a3722f97ee44ae2','http://www.merchant.wish.com/documentation/colors',0,0,0,'0-1-2-133',0,1,1442848868,0,1442848868),(135,1,133,'教师结构化面试题目汇总_百度文库','','732b90495610cacae87a491ae146479f','http://wenku.baidu.com/link?url=-i2Pk6BCCfWxPkR_fBSa5htJnfky4sOfs5Ir_NFI8K_vIxLZaB67gnLObEbdle4C0VWUuZhXy-VNztDFz3MElTADJl7AyiH4aDtkYOeXHjq',0,0,0,'0-1-2-133',1,1,1469073430,0,1469073430),(136,1,133,'ELK+Filebeat+Kafka+ZooKeeper 构建海量日志分析平台 - 推酷','','59c2730ed45c80c41bf722ca0b11cd7d','http://www.tuicool.com/articles/R77fieA',0,0,0,'0-1-2-133',2,1,1492311348,0,1492311348),(137,1,133,'Font Awesome, 为 Bootstrap 而创造的图标字体','','89c9c605f256193b98103b123acd5d70','http://www.bootcss.com/p/font-awesome/',0,0,0,'0-1-2-133',3,1,1498495886,0,1498495886),(138,1,133,'九九藏书网','','4f2fd26a429060476215e41b6fcad376','http://www.99lib.net/book/8365/index.htm',0,0,0,'0-1-2-133',4,1,1500393226,0,1500393226),(139,1,133,'2.1　操作用户正在浏览的页面-图灵社区','','00244ea5b18f526a1777b87f983f192b','http://www.ituring.com.cn/book/miniarticle/60212',0,0,0,'0-1-2-133',5,1,1507988968,0,1507988968),(140,1,133,'大众点评订单分库分表实践之路__够过瘾——挨踢男的葵花宝典','','1bbb318bf55e98a0cacacb1024eb42de','http://www.gouguoyin.cn/it/105.html',0,0,0,'0-1-2-133',6,1,1509894229,0,1509894229),(141,1,2,'前端','','9abfe4a03928eb88a75a5cd95822dfef','',1,1,0,'0-1-2',20,1,1510335578,0,1510335578),(142,1,141,'icono | Pure CSS icons','','6b4beedeb91a667c133b5e4b40ecb7e4','https://saeedalipoor.github.io/icono/',0,0,0,'0-1-2-141',0,1,1510335557,0,1510335557),(143,1,2,'JSON校验','','3e7d1a0bc18f60205fd9d0dc72ce2806','http://www.bejson.com/',0,0,0,NULL,14,1,1433050693,1517108409,1433050693),(144,1,2,'第1章　初步接触Chrome扩展应用开发-图灵社区','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-1-2',19,1,1509286763,0,1509286763),(145,2,0,'','','d41d8cd98f00b204e9800998ecf8427e','',2,1,0,'0',0,1,1513473335,0,1513473335),(146,2,145,'书签栏','','33340633670e3f8521b355a6cc0a8039','',18,1,0,'0-145',0,1,1432220696,0,1512840283),(147,2,146,'开发工具','','2c509530bf439a36168a86e21c160c06','',3,1,0,'0-145-146',0,1,1512840282,0,1512841116),(148,2,147,'正则匹配网站','','31760270da2559a247a64a82b5848975','https://regex101.com/',0,0,0,'0-145-146-147',0,1,1512841116,0,1512841116),(149,2,147,'JSON对比工具','','f224a9c42cebf5d3dbd9b973ee67d0c8','http://jsoneditoronline.org/',0,0,0,'0-145-146-147',1,1,1512841116,0,1512841116),(150,2,147,'在线JSON解析','','fff00ee74c1efa4a94271e46b82fe01b','https://www.bejson.com/jsonviewernew/',0,0,0,'0-145-146-147',2,1,1512841116,0,1512841116),(151,2,146,'赛维系统','','719e437a5eb775cdbffcadb6252af5f3','',2,1,0,'0-145-146',1,1,1512840282,0,1512841116),(152,2,151,'范本总表-范本系统','','90fd07163bb40110524cf6b7022a8d5f','http://template.valsun.cn/index.php?mod=templateTotal&act=admin',0,0,0,'0-145-146-151',0,1,1512841116,0,1512841116),(153,2,151,'禅道项目','','be3e5d5f4d826c75c786de1868a4c12d','http://project.manage.valsun.cn:88/index.php?m=my&f=index',0,0,0,'0-145-146-151',1,1,1512841116,0,1512841116),(154,2,146,'前端技术','','40d75c2ce5736588a6e7d58df6d5aee1','',8,1,0,'0-145-146',2,1,1512840283,0,1512841116),(155,2,154,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-145-146-154',0,1,1512841116,0,1512841116),(156,2,154,'前段技术','','65968bba8d8f7fc6c39e887240509ec3','http://www.webhek.com/css-flip/',0,0,0,'0-145-146-154',1,1,1512841116,0,1512841116),(157,2,154,'谷歌驱动器的Web API的','','b7006b08dcd8a5e5d85dcbfe3bdecff9','https://developers.google.com/drive/web/about-sdk',0,0,0,'0-145-146-154',2,1,1512841116,0,1512841116),(158,2,154,'SkyDrive API 的使用','','757695c7842a488d142b3d9879cbdb6b','http://www.cnblogs.com/zoho/archive/2013/02/09/2909530.html',0,0,0,'0-145-146-154',3,1,1512841116,0,1512841116),(159,2,154,'SkyDrive的API：Codenvy教程','','21274cab46736f90c8b8c6210a9d403e','https://codenvy.com/docs/',0,0,0,'0-145-146-154',4,1,1512841116,0,1512841116),(160,2,154,'AdminLTE 2 | Documentation','','1d194ed0ac15a2609adb8eafc0a5d4b7','https://adminlte.io/themes/AdminLTE/documentation/index.html',0,0,0,'0-145-146-154',5,1,1512841116,0,1512841116),(161,2,154,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-145-146-154',6,1,1512841116,0,1512841116),(162,2,154,'jQuery API 中文文档 | jQuery API 中文在线手册 | jquery api 下载 | jquery api chm','','d53ce648fc094d83aab48498afa7cac4','http://jquery.cuishifeng.cn/',0,0,0,'0-145-146-154',7,1,1512841116,0,1512841116),(163,2,146,'linux','','e206a54e97690cce50cc872dd70ee896','',1,1,0,'0-145-146',3,1,1512840283,0,1512841116),(164,2,163,'Linux下Postfix的配置和使用','','9c3816d2df4648ac3219f38ec7579a0d','http://blog.csdn.net/hitabc141592/article/details/25986911',0,0,0,'0-145-146-163',0,1,1512841116,0,1512841116),(165,2,146,'python','','23eeeb4347bdd26bfc6b7ee9a3b755dd','',1,1,0,'0-145-146',4,1,1512840283,0,1512841116),(166,2,165,'python restful api搭建','','882067308850b1eea2562479c2247202','http://www.cnblogs.com/vovlie/p/4178077.html',0,0,0,'0-145-146-165',0,1,1512841116,0,1512841116),(167,2,146,'tensorflow','','2c39bc19b761ac36dc046245d1d47fe6','',5,1,0,'0-145-146',5,1,1512840283,0,1512841116),(168,2,167,'tensorflow','','ab5a8b727eba2f9a2692d525f69a3c69','https://www.leiphone.com/news/201703/JNPkCt08zJd9znzZ.html',0,0,0,'0-145-146-167',0,1,1512841116,0,1512841116),(169,2,167,'书签--扩展开发文档','','d7d233973f49480bc8c89fb48082b0c4','http://open.chrome.360.cn/extension_dev/bookmarks.html',0,0,0,'0-145-146-167',1,1,1512841116,0,1512841116),(170,2,167,'chrome.bookmarks - Google Chrome','','3b62cc442d52aae9c815c6c7b79b1801','https://developer.chrome.com/extensions/bookmarks',0,0,0,'0-145-146-167',2,1,1512841116,0,1512841116),(171,2,167,'用 TensorFlow 做个聊天机器人','','be579de8edd75446639a2bc5d8538c10','http://www.jianshu.com/p/3c6f1e32e128',0,0,0,'0-145-146-167',3,1,1512841116,0,1512841116),(172,2,167,'自己动手做聊天机器人 一-涉及知识 - SharEDITor - 关注大数据技术','','181b1294023aac0b1f8bc6049b5fecff','http://www.shareditor.com/blogshow?blogId=63',0,0,0,'0-145-146-167',4,1,1512841116,0,1512841116),(173,2,146,'sphinx','','4a2c09ffbc6e7d0414d1ae731e3a0ce5','',6,1,0,'0-145-146',6,1,1512840283,0,1512841116),(174,2,173,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-145-146-173',0,1,1512841116,0,1512841116),(175,2,173,'sphinx全文检索 安装配置和使用 - Lion_coder - 博客园','','8d0fa459b20fd4651a062f5c7f1d758f','http://www.cnblogs.com/findgor/p/5644540.html',0,0,0,'0-145-146-173',1,1,1512841116,0,1512841116),(176,2,173,'php+中文分词scws+sphinx+mysql打造千万级数据全文搜索 - CSDN博客','','6c1c598c846297acf76331d48d439e4c','http://blog.csdn.net/nuli888/article/details/51892776',0,0,0,'0-145-146-173',2,1,1512841116,0,1512841116),(177,2,173,'sphinx php 扩展安装','','ed2886468d1a31493e808e6f63d57048','http://blog.csdn.net/fenglailea/article/details/38115821',0,0,0,'0-145-146-173',3,1,1512841116,0,1512841116),(178,2,173,'Sphinx配置文件详细介绍','','90ff1084b209042fc8fe97d3ea980b2a','http://blog.sina.com.cn/s/blog_6c971aa301012yfb.html',0,0,0,'0-145-146-173',4,1,1512841116,0,1512841116),(179,2,173,'SphinxSearch','','a454738df83b9eb9fdc5ec49ee0ab90c','https://www.mediawiki.org/wiki/Extension:SphinxSearch#Step_1_-_Install_Sphinx',0,0,0,'0-145-146-173',5,1,1512841116,0,1512841116),(180,2,146,'mysql','','81c3b080dad537de7e10e0987a4bf52e','',2,1,0,'0-145-146',7,1,1512840283,0,1512841116),(181,2,180,'MySQL配置参数详解','','655b7dcb7654656f5b221ee8c0b86351','http://blog.csdn.net/wlzx120/article/details/52301383',0,0,0,'0-145-146-180',0,1,1512841116,0,1512841116),(182,2,180,'mysql官方文档','','8086d6e5c8c49569785e1ef58a8a57b6','https://dev.mysql.com/doc/refman/5.5/en/preface.html',0,0,0,'0-145-146-180',1,1,1512841116,0,1512841116),(183,2,146,'laravel','','0659e0de287281473da4d859f0b9ef35','',3,1,0,'0-145-146',8,1,1512840283,0,1512841116),(184,2,183,'社会化登录组件','','bc5bdedd21cd17846326acdbf9a19eff','http://socialiteproviders.github.io/',0,0,0,'0-145-146-183',0,1,1512841116,0,1512841116),(185,2,183,'Laravel 5.2 使用 JWT 完成多用户认证 | Laravel China 社区 - 高品质的 Laravel 开发者社区 - Powered by PHPHub','','c893bb75787ea3aad8a13ee6436ad728','https://laravel-china.org/topics/2811/laravel-52-uses-jwt-to-complete-multi-user-authentication',0,0,0,'0-145-146-183',1,1,1512841116,0,1512841116),(186,2,183,'Laravel 5.5 中文文档 | Laravel 5.5 中文文档','','12fd38fc30f14c091d64b94fa95d8040','https://d.laravel-china.org/docs/5.5',0,0,0,'0-145-146-183',2,1,1512841116,0,1512841116),(187,2,146,'php','','e1bfd762321e409cee4ac0b6e841963c','',0,1,0,'0-145-146',9,1,1512840283,0,1512840283),(188,2,146,'区块链','','75d8fafb0706c9381d4c91e3b184f19d','',1,1,0,'0-145-146',10,1,1512840283,0,1512841116),(189,2,188,'区块链技术指南','','453abeaa1c8024bce68cbd21ec5b715a','https://yeasy.gitbooks.io/blockchain_guide/content/',0,0,0,'0-145-146-188',0,1,1512841116,0,1512841116),(190,2,146,'git','','ba9f11ecc3497d9993b933fdc2bd61e5','',1,1,0,'0-145-146',12,1,1512840283,0,1512841116),(191,2,190,'git - the simple guide - no deep shit!','','ba0a4203e749c0c3d878c8ecf4f317b4','http://rogerdudler.github.io/git-guide/index.zh.html',0,0,0,'0-145-146-190',0,1,1512841116,0,1512841116),(192,2,146,'PhantomJS','','eb65cd5a673129979f89111624f535f3','',2,1,0,'0-145-146',13,1,1438014076,0,1438448283),(193,2,192,'PhantomJS快速入门教程 - 推酷','','e1fbe280867986de48ea56e8b739901d','http://www.tuicool.com/articles/beeMNj/',0,0,0,'0-145-146-192',0,1,1438014044,0,1438014044),(194,2,192,'PhantomJS安装及快速入门教程 - PHPERZ中文资讯站','','5ac2fd45228ca62c6169c11e35e237d9','http://www.phperz.com/article/14/1115/35197.html',0,0,0,'0-145-146-192',1,1,1438014827,0,1438014827),(195,2,146,'互动','','6da1ce3eec873f0f32993743fef001c6','',0,1,0,'0-145-146',14,1,1438448302,0,1509196625),(196,2,146,'技术','','a95dd3e179418be1ecd2a719a22db70e','',7,1,0,'0-145-146',15,1,1441253331,0,1509894241),(197,2,196,'Dark Blue  ','','181f6bb6a4e4d2e00a3722f97ee44ae2','http://www.merchant.wish.com/documentation/colors',0,0,0,'0-145-146-196',0,1,1442848868,0,1442848868),(198,2,196,'教师结构化面试题目汇总_百度文库','','732b90495610cacae87a491ae146479f','http://wenku.baidu.com/link?url=-i2Pk6BCCfWxPkR_fBSa5htJnfky4sOfs5Ir_NFI8K_vIxLZaB67gnLObEbdle4C0VWUuZhXy-VNztDFz3MElTADJl7AyiH4aDtkYOeXHjq',0,0,0,'0-145-146-196',1,1,1469073430,0,1469073430),(199,2,196,'ELK+Filebeat+Kafka+ZooKeeper 构建海量日志分析平台 - 推酷','','59c2730ed45c80c41bf722ca0b11cd7d','http://www.tuicool.com/articles/R77fieA',0,0,0,'0-145-146-196',2,1,1492311348,0,1492311348),(200,2,196,'Font Awesome, 为 Bootstrap 而创造的图标字体','','89c9c605f256193b98103b123acd5d70','http://www.bootcss.com/p/font-awesome/',0,0,0,'0-145-146-196',3,1,1498495886,0,1498495886),(201,2,196,'九九藏书网','','4f2fd26a429060476215e41b6fcad376','http://www.99lib.net/book/8365/index.htm',0,0,0,'0-145-146-196',4,1,1500393226,0,1500393226),(202,2,196,'2.1　操作用户正在浏览的页面-图灵社区','','00244ea5b18f526a1777b87f983f192b','http://www.ituring.com.cn/book/miniarticle/60212',0,0,0,'0-145-146-196',5,1,1507988968,0,1507988968),(203,2,196,'大众点评订单分库分表实践之路__够过瘾——挨踢男的葵花宝典','','1bbb318bf55e98a0cacacb1024eb42de','http://www.gouguoyin.cn/it/105.html',0,0,0,'0-145-146-196',6,1,1509894229,0,1509894229),(204,2,146,'前端','','9abfe4a03928eb88a75a5cd95822dfef','',1,1,0,'0-145-146',17,1,1510335578,0,1510335578),(205,2,204,'icono | Pure CSS icons','','6b4beedeb91a667c133b5e4b40ecb7e4','https://saeedalipoor.github.io/icono/',0,0,0,'0-145-146-204',0,1,1510335557,0,1510335557),(206,2,146,'在线编辑器','','21274cab46736f90c8b8c6210a9d403e','https://codenvy.com/docs/',0,0,0,'0-145-146',11,1,1512840283,0,1512840283),(207,2,146,'第1章　初步接触Chrome扩展应用开发-图灵社区','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-145-146',16,1,1509286763,0,1509286763),(208,2,145,'其他书签','','cb8fd0a93609eef1ae04301e9d2f40ab','',27,1,0,'0-145',1,1,1432220696,0,1513182306),(209,2,208,'aaa','','47bce5c74f589f4867dbd57e9ca9f808','',0,1,0,'0-145-208',1,1,1512841976,0,1512841976),(210,2,208,'ebay开发者中心','','c4bf61c480713678426716760e17a731','',7,1,0,'0-145-208',4,1,1512842024,0,1512842157),(211,2,210,'eBay API 开发-eBay外贸社区 - Powered by Discuz!','','cb0ac9b75c2c66b4215ec2e99c62686e','http://community.ebay.cn/forum-400000108-1.html',0,0,0,'0-145-208-210',0,1,1512842157,0,1512842157),(212,2,210,'Call Index - API Reference - Trading API','','6c51941754b2efc3d0acfdd4292922a5','http://developer.ebay.com/DevZone/XML/docs/Reference/ebay/index.html',0,0,0,'0-145-208-210',1,1,1512842157,0,1512842157),(213,2,210,'华成云商开发者API文档-运输方式','','6483b73c4c987c7a89674c325dcd461d','http://developer.valsun.cn/index.php?mod=developerDoc&act=shippingType',0,0,0,'0-145-208-210',2,1,1512842157,0,1512842157),(214,2,210,'一键分销','','0a33c94e368fe5b545acce14f375cf36','http://sub.fenxiao.valsun.cn/',0,0,0,'0-145-208-210',3,1,1512842157,0,1512842157),(215,2,210,'www.techweb.com.cn/rss/data.xml','','483d6f0a8abe0e547d7730bcfd8caf96','http://www.techweb.com.cn/rss/data.xml',0,0,0,'0-145-208-210',4,1,1512842157,0,1512842157),(216,2,210,'速卖通 api文档','','d066a11c4960fe47d5d7a5788c769f7b','http://gw.api.alibaba.com/dev/doc/intl/api.htm?ns=aliexpress.open&n=api.findOrderListQuery&v=1',0,0,0,'0-145-208-210',5,1,1512842157,0,1512842157),(217,2,210,'ebay api文档','','e9ec12bd1f35c392da944bdd42d526bd','http://developer.ebay.com/Devzone/XML/docs/Reference/ebay/index.html',0,0,0,'0-145-208-210',6,1,1512842157,0,1512842157),(218,2,208,'unix时间戳','','1fce04717dae407d0b0c16db3ecb186c','',2,1,0,'0-145-208',6,1,1512842157,0,1512842212),(219,2,218,'Unix时间戳(Unix timestamp)转换工具 - 站长工具','','fceef11627f9a6e3f0f64d226e1310bc','http://tool.chinaz.com/Tools/unixtime.aspx',0,0,0,'0-145-208-218',0,1,1512842212,0,1512842212),(220,2,218,'PHP: PHP 手册 - Manual','','5852402aa7c7d194ed0336dca491ac14','http://php.net/manual/zh/',0,0,0,'0-145-208-218',1,1,1512842212,0,1512842212),(221,2,208,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-145-208',0,1,1512841116,1514817828,1512841116),(222,2,208,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-145-208',2,1,1512841976,1514817828,1512841976),(223,2,208,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-145-208',3,1,1512841976,1514817828,1512841976),(224,2,208,'修改订单详情页','','a9928503070e422b681d363de6b80ad2','http://local.hc/developerInformationList/index.php?mod=orderDetails&act=update&dp_id=160&id=8315',0,0,0,'0-145-208',5,1,1512842024,0,1512842024),(225,2,208,'Python 字典(Dictionary) fromkeys()方法 | 菜鸟教程','','a3f9cd873efae5eb36586db8c1ee2691','http://www.runoob.com/python/att-dictionary-fromkeys.html',0,0,0,'0-145-208',7,1,1512842157,0,1512842157),(226,2,208,'分享Centos6.5升级glibc过程 - CNode技术社区','','558050221a9aa278e7e3a58683e51b2b','http://cnodejs.org/topic/56dc21f1502596633dc2c3dc',0,0,0,'0-145-208',8,10,1512842157,0,1512842157),(227,2,208,'Wish 商户平台','','366f999513d5feb1a13eb855eec7c85d','https://merchant.wish.com/transactions/action',0,0,0,'0-145-208',9,1,1512842157,0,1512842157),(228,2,208,'php-rdkafka','','1da472b20b4903caae2028579e4a384a','https://github.com/arnaud-lb/php-rdkafka#documentation',0,0,0,'0-145-208',10,1,1512842157,0,1512842157),(229,2,208,'开始使用  |  TensorFlow','','4160f164f5a1fdce4e7211e7aa00cdc8','https://www.tensorflow.org/get_started/',0,0,0,'0-145-208',11,1,1512842157,0,1512842157),(230,2,208,'Chrome 网上应用店 - bookmarks','','8a0b350ef5889d054b0cbbdc373a0dfd','https://chrome.google.com/webstore/search/bookmarks?hl=zh-CN',0,0,0,'0-145-208',12,1,1512842157,0,1512842157),(231,2,208,'Profile & Contacts | eBay','','491124c1bec7c7fe52dd54d302d24138','https://developer.ebay.com/my/profile#',0,0,0,'0-145-208',13,1,1512842157,0,1512842157),(232,2,208,'大本营','','be5582b018741b37cc2da76fa35bf163','chrome://newtab/',0,0,0,'0-145-208',14,1,1512842157,0,1512842157),(233,2,208,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-145-208',15,1,1513182306,1514817828,1513182306),(234,2,208,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-145-208',16,1,1513182306,1514817828,1513182306),(235,2,208,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-145-208',17,1,1512921470,1514817828,1512921470),(236,2,208,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-145-208',18,1,1512921470,1514817828,1512921470),(237,2,208,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-145-208',19,1,1513182306,1514817828,1513182306),(238,2,208,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-145-208',20,1,1512921470,1514817828,1512921470),(239,2,208,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-145-208',21,1,1512921111,1514817828,1512921111),(240,2,208,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-145-208',22,1,1512921111,1514817828,1512921111),(241,2,208,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-145-208',23,1,1512921111,1514817828,1512921111),(242,2,208,'10个顶级的CSS和Javascript动画框架推荐','','7c3de6ec969476be50beeb6bd380b6b6','http://www.iteye.com/news/23535',0,0,0,'0-145-208',24,1,1512921096,0,1512921096),(243,2,208,'Chrome扩展应用开发','','7e2b1047f1d0e8f799cfe39b1dceef98','http://www.ituring.com.cn/book/miniarticle/60223',0,0,0,'0-145-208',25,1,1512921096,0,1512921096),(244,2,208,'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客','','310acba10223a92992809684feda2c57','http://blog.csdn.net/baidu_34812181/article/details/51263028',0,0,0,'0-145-208',26,1,1512921096,0,1512921096),(245,1,33,'【干货】Chrome插件(扩展)开发全攻略 - 我是小茗同学 - 博客园','','206f3416e8124c9295d6b145953e2184','https://www.cnblogs.com/liuxianan/p/chrome-plugin-develop.html',0,0,0,'0-1-2-33',8,1,1513786843,0,1513786843),(248,2,208,'非深号牌载客汽车进入深圳自助申报','','3f707976b8d2265cf154d133fbbcc2bb','https://app4.stc.gov.cn:9080/hlwzh/xwspace/xw_getXwclCxdjPage.action',0,0,0,'0-145-208',27,1,1514817819,0,1514817819),(246,2,154,'【干货】Chrome插件(扩展)开发全攻略 - 我是小茗同学 - 博客园','','206f3416e8124c9295d6b145953e2184','https://www.cnblogs.com/liuxianan/p/chrome-plugin-develop.html',0,0,0,'0-145-146-154',8,1,1513786843,0,1513786843),(249,1,75,'非深号牌载客汽车进入深圳自助申报','','3f707976b8d2265cf154d133fbbcc2bb','https://app4.stc.gov.cn:9080/hlwzh/xwspace/xw_getXwclCxdjPage.action',0,0,0,'0-1-75',27,1,1514817819,1517061535,1514817819),(252,1,250,'Laravel 5.2 使用 JWT 完成多用户认证 | Laravel China 社区 - 高品质的 Laravel 开发者社区 - Powered by PHPHub','','c893bb75787ea3aad8a13ee6436ad728','https://laravel-china.org/topics/2811/laravel-52-uses-jwt-to-complete-multi-user-authentication',0,0,0,'0-1-2-69-250',1,1,1512841116,0,1512841116),(251,1,250,'社会化登录组件','','bc5bdedd21cd17846326acdbf9a19eff','http://socialiteproviders.github.io/',0,0,0,'0-1-2-69-250',0,1,1512841116,0,1512841116),(250,1,69,'laravel','','0659e0de287281473da4d859f0b9ef35','',3,1,0,'0-1-2-69',0,1,1512840283,0,1512841116),(247,2,154,'非深号牌载客汽车进入深圳自助申报','','3f707976b8d2265cf154d133fbbcc2bb','https://app4.stc.gov.cn:9080/hlwzh/xwspace/xw_getXwclCxdjPage.action',0,0,0,'0-145-146-154',9,1,1514817819,1514817828,1514817819),(253,1,250,'Laravel 5.5 中文文档 | Laravel 5.5 中文文档','','12fd38fc30f14c091d64b94fa95d8040','https://d.laravel-china.org/docs/5.5',0,0,0,'0-1-2-69-250',2,1,1512841116,0,1512841116),(254,1,69,'今日头条推荐算法原理全文详解 - CocoaChina_让移动开发更简单','','d0ad5e725c121a70a0fc08f9394d2c8d','http://www.cocoachina.com/programmer/20180116/21876.html',0,0,0,'0-1-2-69',1,1,1517108364,1517108409,1517108364),(255,1,2,'算法','','046a899ee7a6ec88d370211a518c9e80','',1,1,0,'0-1-2',17,1,1517108406,0,1517108406),(256,1,255,'今日头条推荐算法原理全文详解','','d0ad5e725c121a70a0fc08f9394d2c8d','http://www.cocoachina.com/programmer/20180116/21876.html',0,0,0,'0-1-2-255',0,1,1517108364,0,1517108364);

/*Table structure for table `files` */

DROP TABLE IF EXISTS `files`;

CREATE TABLE `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) DEFAULT '0' COMMENT '作者ID',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `type` tinyint(4) DEFAULT '0' COMMENT '文件内容类型 ''0: article'', ''1: news''',
  `url` varchar(500) DEFAULT '' COMMENT '原始地址',
  `location` tinyint(4) DEFAULT '0' COMMENT '文件存储的位置 ''0: remote'',''1: local'', ''2: oss''',
  `reads` int(11) DEFAULT '0' COMMENT '文件阅读次数',
  `quotes` int(11) DEFAULT '0' COMMENT '引用数',
  `reviews` int(11) DEFAULT '0' COMMENT '评论数',
  `remarks` int(11) DEFAULT '0' COMMENT '备注数',
  `shares` int(11) DEFAULT '0' COMMENT '推荐次数',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`author`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `files` */

/*Table structure for table `folder_map_files` */

DROP TABLE IF EXISTS `folder_map_files`;

CREATE TABLE `folder_map_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件夹ID',
  `file_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件ID',
  `quote_user_id` int(10) unsigned DEFAULT '0' COMMENT '引用哪个用户的文件， 为0 默认使用原作者的',
  PRIMARY KEY (`id`),
  KEY `folder_id` (`folder_id`) USING BTREE,
  KEY `file_id` (`file_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `folder_map_files` */

/*Table structure for table `folders` */

DROP TABLE IF EXISTS `folders`;

CREATE TABLE `folders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `fid` int(11) unsigned DEFAULT '0' COMMENT '父文件夹ID',
  `local_id` mediumint(10) unsigned DEFAULT '0' COMMENT '本地ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `status` tinyint(4) DEFAULT '0' COMMENT '标签状态, ''0: private'',''1: protect'',''2: public''',
  `files` int(10) unsigned DEFAULT '0' COMMENT '文件数',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`fid`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='书签文件夹';

/*Data for the table `folders` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

/*Table structure for table `notebooks` */

DROP TABLE IF EXISTS `notebooks`;

CREATE TABLE `notebooks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '作者ID',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '标题',
  `has_photo` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否上传头像 0 否， 1是',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `source_id` int(11) unsigned DEFAULT '0' COMMENT '引用ID: 0 原创， 非零 引用ID',
  `quotes` int(10) unsigned DEFAULT '0' COMMENT '引用数量',
  `assists` int(11) DEFAULT '0' COMMENT '赞的数量',
  `reviews` int(11) DEFAULT '0' COMMENT '评论数量',
  `open_status` tinyint(1) unsigned DEFAULT '0' COMMENT '开放状态： 0 私有，1开放',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT NULL COMMENT '软删除',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=129 DEFAULT CHARSET=utf8;

/*Data for the table `notebooks` */

/*Table structure for table `notebooks_0` */

DROP TABLE IF EXISTS `notebooks_0`;

CREATE TABLE `notebooks_0` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '作者ID',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '标题',
  `has_photo` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否上传头像 0 否， 1是',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `source_id` int(11) unsigned DEFAULT '0' COMMENT '引用ID: 0 原创， 非零 引用ID',
  `quotes` int(10) unsigned DEFAULT '0' COMMENT '引用数量',
  `assists` int(11) DEFAULT '0' COMMENT '赞的数量',
  `reviews` int(11) DEFAULT '0' COMMENT '评论数量',
  `open_status` tinyint(1) unsigned DEFAULT '0' COMMENT '开放状态： 0 私有，1开放',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT NULL COMMENT '软删除',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `notebooks_0` */

/*Table structure for table `notebooks_1` */

DROP TABLE IF EXISTS `notebooks_1`;

CREATE TABLE `notebooks_1` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '作者ID',
  `title` varchar(60) NOT NULL DEFAULT '' COMMENT '标题',
  `has_photo` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否上传头像 0 否， 1是',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `source_id` int(11) unsigned DEFAULT '0' COMMENT '引用ID: 0 原创， 非零 引用ID',
  `quotes` int(10) unsigned DEFAULT '0' COMMENT '引用数量',
  `assists` int(11) DEFAULT '0' COMMENT '赞的数量',
  `reviews` int(11) DEFAULT '0' COMMENT '评论数量',
  `open_status` tinyint(1) unsigned DEFAULT '0' COMMENT '开放状态： 0 私有，1开放',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT NULL COMMENT '软删除',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `notebooks_1` */

insert  into `notebooks_1`(`id`,`uid`,`title`,`has_photo`,`desc`,`source_id`,`quotes`,`assists`,`reviews`,`open_status`,`sortid`,`created_at`,`deleted_at`,`updated_at`) values (1,1,'sfdg',0,'fff',0,0,0,0,1,0,1513438418,1513613650,1513613650),(2,1,'sfdgwww',0,'fff',0,0,0,0,0,0,1513438502,1513614228,1513614228),(3,1,'sdfgsdgfsd',0,'sdfgsdfgsdfgdsf',0,0,0,0,1,0,1513441049,1513614024,1513614024),(4,1,'asdfas',0,'sdfsdf',0,0,0,0,1,0,1513441144,1513614259,1513614259),(5,1,'我的第一本笔记',0,'大致描述下我做什么吧',0,0,0,0,1,0,1513614459,1513614467,1513614467),(6,1,'这是我的第一本笔记',0,'记录每天的琐事',0,0,0,0,1,0,1513614511,NULL,1513615660),(7,1,'laravel',0,'laravel相关知识',0,0,0,0,1,0,1514124238,NULL,1514124238),(8,1,'未命名文档',0,'adas',0,0,0,0,1,0,1532238554,NULL,1532238554);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `sharebookmarks` */

DROP TABLE IF EXISTS `sharebookmarks`;

CREATE TABLE `sharebookmarks` (
  `id` int(11) NOT NULL,
  `author` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分享者',
  `has_img` tinyint(4) DEFAULT '0' COMMENT '是否存在头像',
  `bookmark_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '书签ID',
  `subscribes` int(10) unsigned DEFAULT '0' COMMENT '订阅数',
  `deleted_at` tinyint(1) unsigned DEFAULT '0' COMMENT '删除标志',
  PRIMARY KEY (`id`),
  KEY `select1` (`author`,`bookmark_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `sharebookmarks` */

/*Table structure for table `sharefolders` */

DROP TABLE IF EXISTS `sharefolders`;

CREATE TABLE `sharefolders` (
  `id` int(11) NOT NULL,
  `author` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分享者',
  `has_img` tinyint(4) DEFAULT '0' COMMENT '是否存在头像',
  `folder_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '文件夹ID',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `subscribes` int(10) unsigned DEFAULT '0' COMMENT '订阅数',
  PRIMARY KEY (`id`),
  KEY `select1` (`folder_id`) USING BTREE,
  KEY `select2` (`author`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `sharefolders` */

/*Table structure for table `subscribes` */

DROP TABLE IF EXISTS `subscribes`;

CREATE TABLE `subscribes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件夹ID',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`) USING BTREE,
  KEY `select2` (`folder_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `subscribes` */

/*Table structure for table `tag_maps` */

DROP TABLE IF EXISTS `tag_maps`;

CREATE TABLE `tag_maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '植入标签对象的类型 ''0:bookmark'',''1:notebook'',''2:user''',
  `tag_id` int(11) unsigned NOT NULL,
  `obj_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对象ID',
  `created_at` int(11) unsigned DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `select1` (`type`,`obj_id`) USING BTREE,
  KEY `tag_id_type` (`tag_id`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `tag_maps` */

/*Table structure for table `tag_maps_1` */

DROP TABLE IF EXISTS `tag_maps_1`;

CREATE TABLE `tag_maps_1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '植入标签对象的类型 ''0:bookmark'',''1:notebook'',''2:user''',
  `tag_id` int(11) unsigned NOT NULL,
  `obj_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '对象ID',
  `created_at` int(11) unsigned DEFAULT '0' COMMENT '创建时间',
  `updated_at` int(11) unsigned DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`id`),
  KEY `select1` (`type`,`obj_id`) USING BTREE,
  KEY `tag_id_type` (`tag_id`,`type`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `tag_maps_1` */

insert  into `tag_maps_1`(`id`,`type`,`tag_id`,`obj_id`,`created_at`,`updated_at`) values (10,1,9,7,1514124247,1514124247),(12,1,11,7,1514124259,1514124259),(11,1,10,7,1514124252,1514124252),(4,1,4,2,1513515396,1513515396),(5,1,5,2,1513515403,1513515403),(6,1,1,2,1513515457,1513515457);

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '标签创建者',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '标签名',
  `uses` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '标签使用次数',
  `created_at` int(11) unsigned DEFAULT '0',
  `updated_at` int(11) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `tags` */

insert  into `tags`(`id`,`author`,`name`,`uses`,`created_at`,`updated_at`) values (1,1,'哲学',1,1513515376,1513613489),(10,1,'php',1,1514124252,1514124252),(9,1,'laravel',1,1514124247,1514124247),(4,1,'文学',1,1513515396,1513515396),(5,1,'国学',1,1513515403,1513515403),(11,1,'php开发框架',1,1514124259,1514124259);

/*Table structure for table `url_reviews` */

DROP TABLE IF EXISTS `url_reviews`;

CREATE TABLE `url_reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论者',
  `url_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论对象ID',
  `url_md5_4` char(4) NOT NULL COMMENT 'url md5 前4位字符',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '内容',
  `reply_which_user` int(10) unsigned DEFAULT '0' COMMENT '回复哪个用户',
  `created_at` int(11) DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `url_reviews` */

/*Table structure for table `url_visitors` */

DROP TABLE IF EXISTS `url_visitors`;

CREATE TABLE `url_visitors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `url_id` int(11) unsigned DEFAULT NULL,
  `url_md5_4` char(4) COLLATE utf8_bin DEFAULT NULL COMMENT 'url md5值的前4个字符',
  `is_love` tinyint(4) DEFAULT '0' COMMENT '是否喜欢 0 否， 1 是',
  `visit_times` mediumint(8) unsigned DEFAULT NULL COMMENT '访问次数',
  `created_at` int(11) unsigned DEFAULT NULL COMMENT '创建时间',
  `updated_at` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `url_visitors` */

/*Table structure for table `urls` */

DROP TABLE IF EXISTS `urls`;

CREATE TABLE `urls` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url_md5` char(32) COLLATE utf8_bin DEFAULT NULL,
  `title` varchar(120) COLLATE utf8_bin DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `reads` int(10) unsigned DEFAULT NULL COMMENT '阅读数',
  `reviews` int(10) unsigned DEFAULT NULL COMMENT '评论数',
  `loves` int(10) unsigned DEFAULT NULL COMMENT '赞数',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `index_url_md5` (`url_md5`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

/*Data for the table `urls` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bookmark_updatetime` int(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`,`bookmark_updatetime`) values (1,'zoujunrong','zoujunrong@sailvan.com','$2y$10$6J71Fg68CIY1FRY/x8UFouo.AJPeTDUWLfsadnAoCmluVKE9.mbxm','h07z8pbgQgMZSclnx02EWNbAHYOoX8Y0PhRjbEXCZkSI3nvo7JfLlLCknZyx','2017-07-24 12:06:26','2018-01-28 03:00:09',1517108409),(2,'zjr','zjr@sailvan.com','$2y$10$zQNJKPtV5snr.u.sO3SDFuTcP6.YpFNa4AZSiAWe1q/5lEIXEFm3i',NULL,'2017-07-26 12:08:16','2018-01-01 14:43:48',1514817827),(3,'zoujunrong','82056704@qq.com','$2y$10$sKT/uckb0.OGLCdoxnv/z.jBYeuIXk3mWdGGrd5HwVVYU8S79GwVe',NULL,'2017-12-09 15:24:48','2017-12-09 15:24:48',NULL),(4,'admin','admin@qq.com','$2y$10$3M0r1QMWCY0HeiNX/tzR3O5uAc620.VTkH2FkjKi/k3Ufz0AJvZE2',NULL,'2018-07-22 07:02:19','2018-07-22 07:02:19',0);

/*Table structure for table `users_bak` */

DROP TABLE IF EXISTS `users_bak`;

CREATE TABLE `users_bak` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users_bak` */

insert  into `users_bak`(`id`,`name`,`email`,`password`,`remember_token`,`created_at`,`updated_at`) values (1,'zoujunrong','82056704@qq.com','$2y$10$mz8b5J7aQcLbVbbCzDsSF.gF84s3cnVMGIUcAkx9Y.DHvALB.S//O',NULL,'2017-12-09 15:22:11','2017-12-09 15:22:11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
