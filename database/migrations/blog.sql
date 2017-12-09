/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-12-09 12:28:14
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bookmarks
-- ----------------------------
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
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`,`url_md5`) USING BTREE,
  KEY `select2` (`url_md5`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bookmarks
-- ----------------------------

-- ----------------------------
-- Table structure for bookmarks_1
-- ----------------------------
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
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`,`url_md5`) USING BTREE,
  KEY `select2` (`url_md5`,`deleted_at`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bookmarks_1
-- ----------------------------
INSERT INTO `bookmarks_1` VALUES ('1', '1', '0', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '', '2', '1', '0', '1512782300', '0', '1512782300');
INSERT INTO `bookmarks_1` VALUES ('2', '1', '1', '书签栏', '', '33340633670e3f8521b355a6cc0a8039', '', '15', '1', '0', '1409985848', '0', '1512368293');
INSERT INTO `bookmarks_1` VALUES ('3', '1', '2', '最近', '', '046c6233e03af774df7b90b4504fa96c', '', '8', '1', '0', '1510299197', '0', '1512702044');
INSERT INTO `bookmarks_1` VALUES ('4', '1', '3', '在线JSON解析', '', 'fff00ee74c1efa4a94271e46b82fe01b', 'https://www.bejson.com/jsonviewernew/', '0', '0', '0', '1512702044', '0', '1512702044');
INSERT INTO `bookmarks_1` VALUES ('5', '1', '3', 'JSON对比工具', '', 'f224a9c42cebf5d3dbd9b973ee67d0c8', 'http://jsoneditoronline.org/', '0', '0', '1', '1512702036', '0', '1512702036');
INSERT INTO `bookmarks_1` VALUES ('6', '1', '3', 'Chrome扩展应用开发', '', '7e2b1047f1d0e8f799cfe39b1dceef98', 'http://www.ituring.com.cn/book/miniarticle/60223', '0', '0', '2', '1512553846', '0', '1512553846');
INSERT INTO `bookmarks_1` VALUES ('7', '1', '3', '前段技术', '', '65968bba8d8f7fc6c39e887240509ec3', 'http://www.webhek.com/css-flip/', '0', '0', '3', '1512553841', '0', '1512553841');
INSERT INTO `bookmarks_1` VALUES ('8', '1', '3', '禅道项目', '', 'be3e5d5f4d826c75c786de1868a4c12d', 'http://project.manage.valsun.cn:88/index.php?m=my&f=index', '0', '0', '4', '1512004009', '0', '1512004009');
INSERT INTO `bookmarks_1` VALUES ('9', '1', '3', '在线编辑器', '', '21274cab46736f90c8b8c6210a9d403e', 'https://codenvy.com/docs/', '0', '0', '5', '1511917894', '0', '1511917894');
INSERT INTO `bookmarks_1` VALUES ('10', '1', '3', 'jQuery API 中文文档 | jQuery API 中文在线手册 | jquery api 下载 | jquery api chm', '', 'd53ce648fc094d83aab48498afa7cac4', 'http://jquery.cuishifeng.cn/', '0', '0', '6', '1510321429', '0', '1510321429');
INSERT INTO `bookmarks_1` VALUES ('11', '1', '3', 'AdminLTE 2 | Documentation', '', '1d194ed0ac15a2609adb8eafc0a5d4b7', 'https://adminlte.io/themes/AdminLTE/documentation/index.html', '0', '0', '7', '1510321369', '0', '1510321369');
INSERT INTO `bookmarks_1` VALUES ('12', '1', '2', '常用', '', 'f7e68bde2caa2cb5696d6a37fe4a23a4', '', '13', '1', '1', '1509969929', '0', '1512702044');
INSERT INTO `bookmarks_1` VALUES ('13', '1', '12', 'Chrome扩展应用开发', '', '7e2b1047f1d0e8f799cfe39b1dceef98', 'http://www.ituring.com.cn/book/miniarticle/60223', '0', '0', '0', '1509969937', '0', '1509969937');
INSERT INTO `bookmarks_1` VALUES ('14', '1', '12', '范本总表-范本系统', '', '90fd07163bb40110524cf6b7022a8d5f', 'http://template.valsun.cn/index.php?mod=templateTotal&act=admin', '0', '0', '1', '1509969947', '0', '1509969947');
INSERT INTO `bookmarks_1` VALUES ('15', '1', '12', 'Laravel 5.2 使用 JWT 完成多用户认证 | Laravel China 社区 - 高品质的 Laravel 开发者社区 - Powered by PHPHub', '', 'c893bb75787ea3aad8a13ee6436ad728', 'https://laravel-china.org/topics/2811/laravel-52-uses-jwt-to-complete-multi-user-authentication', '0', '0', '2', '1510060475', '0', '1510060475');
INSERT INTO `bookmarks_1` VALUES ('16', '1', '12', 'Laravel 5.5 中文文档 | Laravel 5.5 中文文档', '', '12fd38fc30f14c091d64b94fa95d8040', 'https://d.laravel-china.org/docs/5.5', '0', '0', '3', '1510147734', '0', '1510147734');
INSERT INTO `bookmarks_1` VALUES ('17', '1', '12', 'php+中文分词scws+sphinx+mysql打造千万级数据全文搜索 - CSDN博客', '', '6c1c598c846297acf76331d48d439e4c', 'http://blog.csdn.net/nuli888/article/details/51892776', '0', '0', '4', '1510063778', '0', '1510063778');
INSERT INTO `bookmarks_1` VALUES ('18', '1', '12', 'Overview - Google Chrome', '', 'ee2cd2d90101736789efc77ba90d05dd', 'https://developer.chrome.com/extensions/overview', '0', '0', '5', '1510278628', '0', '1510278628');
INSERT INTO `bookmarks_1` VALUES ('19', '1', '12', 'AdminLTE 2 | Documentation', '', '1d194ed0ac15a2609adb8eafc0a5d4b7', 'https://adminlte.io/themes/AdminLTE/documentation/index.html', '0', '0', '6', '1510321369', '0', '1510321369');
INSERT INTO `bookmarks_1` VALUES ('20', '1', '12', 'jQuery API 中文文档 | jQuery API 中文在线手册 | jquery api 下载 | jquery api chm', '', 'd53ce648fc094d83aab48498afa7cac4', 'http://jquery.cuishifeng.cn/', '0', '0', '7', '1510321429', '0', '1510321429');
INSERT INTO `bookmarks_1` VALUES ('21', '1', '12', '在线编辑器', '', '21274cab46736f90c8b8c6210a9d403e', 'https://codenvy.com/docs/', '0', '0', '8', '1511917894', '0', '1511917894');
INSERT INTO `bookmarks_1` VALUES ('22', '1', '12', '禅道项目', '', 'be3e5d5f4d826c75c786de1868a4c12d', 'http://project.manage.valsun.cn:88/index.php?m=my&f=index', '0', '0', '9', '1512004009', '0', '1512004009');
INSERT INTO `bookmarks_1` VALUES ('23', '1', '12', '前段技术', '', '65968bba8d8f7fc6c39e887240509ec3', 'http://www.webhek.com/css-flip/', '0', '0', '10', '1512553841', '0', '1512553841');
INSERT INTO `bookmarks_1` VALUES ('24', '1', '12', 'JSON对比工具', '', 'f224a9c42cebf5d3dbd9b973ee67d0c8', 'http://jsoneditoronline.org/', '0', '0', '11', '1512702036', '0', '1512702036');
INSERT INTO `bookmarks_1` VALUES ('25', '1', '12', '在线JSON解析', '', 'fff00ee74c1efa4a94271e46b82fe01b', 'https://www.bejson.com/jsonviewernew/', '0', '0', '12', '1512702044', '0', '1512702044');
INSERT INTO `bookmarks_1` VALUES ('26', '1', '2', '开发工具', '', '2c509530bf439a36168a86e21c160c06', '', '3', '1', '2', '1509585372', '0', '1509586154');
INSERT INTO `bookmarks_1` VALUES ('27', '1', '26', '正则匹配网站', '', '31760270da2559a247a64a82b5848975', 'https://regex101.com/', '0', '0', '0', '1501749084', '0', '1501749084');
INSERT INTO `bookmarks_1` VALUES ('28', '1', '26', 'JSON对比工具', '', 'f224a9c42cebf5d3dbd9b973ee67d0c8', 'http://jsoneditoronline.org/', '0', '0', '1', '1428485340', '0', '1428485340');
INSERT INTO `bookmarks_1` VALUES ('29', '1', '26', '在线JSON解析', '', 'fff00ee74c1efa4a94271e46b82fe01b', 'https://www.bejson.com/jsonviewernew/', '0', '0', '2', '1421300984', '0', '1421300984');
INSERT INTO `bookmarks_1` VALUES ('30', '1', '2', '赛维系统', '', '719e437a5eb775cdbffcadb6252af5f3', '', '2', '1', '3', '1509585253', '0', '1509587913');
INSERT INTO `bookmarks_1` VALUES ('31', '1', '30', '范本总表-范本系统', '', '90fd07163bb40110524cf6b7022a8d5f', 'http://template.valsun.cn/index.php?mod=templateTotal&act=admin', '0', '0', '0', '1508311227', '0', '1508311227');
INSERT INTO `bookmarks_1` VALUES ('32', '1', '30', '禅道项目', '', 'be3e5d5f4d826c75c786de1868a4c12d', 'http://project.manage.valsun.cn:88/index.php?m=my&f=index', '0', '0', '1', '1411626018', '0', '1411626018');
INSERT INTO `bookmarks_1` VALUES ('33', '1', '2', '前端技术', '', '40d75c2ce5736588a6e7d58df6d5aee1', '', '11', '1', '4', '1411993750', '0', '1512098328');
INSERT INTO `bookmarks_1` VALUES ('34', '1', '33', '10个顶级的CSS和Javascript动画框架推荐', '', '7c3de6ec969476be50beeb6bd380b6b6', 'http://www.iteye.com/news/23535', '0', '0', '0', '1411993728', '0', '1411993728');
INSERT INTO `bookmarks_1` VALUES ('35', '1', '33', '前段技术', '', '65968bba8d8f7fc6c39e887240509ec3', 'http://www.webhek.com/css-flip/', '0', '0', '1', '1411992331', '0', '1411992331');
INSERT INTO `bookmarks_1` VALUES ('36', '1', '33', '谷歌驱动器的Web API的', '', 'b7006b08dcd8a5e5d85dcbfe3bdecff9', 'https://developers.google.com/drive/web/about-sdk', '0', '0', '2', '1412488293', '0', '1412488293');
INSERT INTO `bookmarks_1` VALUES ('37', '1', '33', 'SkyDrive API 的使用', '', '757695c7842a488d142b3d9879cbdb6b', 'http://www.cnblogs.com/zoho/archive/2013/02/09/2909530.html', '0', '0', '3', '1412488277', '0', '1412488277');
INSERT INTO `bookmarks_1` VALUES ('38', '1', '33', 'SkyDrive的API：Codenvy教程', '', '21274cab46736f90c8b8c6210a9d403e', 'https://codenvy.com/docs/', '0', '0', '4', '1412489812', '0', '1412489812');
INSERT INTO `bookmarks_1` VALUES ('39', '1', '33', 'Wish API', '', '1c754f7f8edba2f6e53fa8baeac15662', 'http://merchant.wish.com/documentation/api', '0', '0', '5', '1429322371', '0', '1429322371');
INSERT INTO `bookmarks_1` VALUES ('40', '1', '33', 'Overview - Google Chrome', '', 'ee2cd2d90101736789efc77ba90d05dd', 'https://developer.chrome.com/extensions/overview', '0', '0', '6', '1508758331', '0', '1508758331');
INSERT INTO `bookmarks_1` VALUES ('41', '1', '33', 'AdminLTE 2 | Documentation', '', '1d194ed0ac15a2609adb8eafc0a5d4b7', 'https://adminlte.io/themes/AdminLTE/documentation/index.html', '0', '0', '7', '1509451995', '0', '1509451995');
INSERT INTO `bookmarks_1` VALUES ('42', '1', '33', 'Chrome扩展应用开发', '', '7e2b1047f1d0e8f799cfe39b1dceef98', 'http://www.ituring.com.cn/book/miniarticle/60223', '0', '0', '8', '1509518526', '0', '1509518526');
INSERT INTO `bookmarks_1` VALUES ('43', '1', '33', 'jQuery API 中文文档 | jQuery API 中文在线手册 | jquery api 下载 | jquery api chm', '', 'd53ce648fc094d83aab48498afa7cac4', 'http://jquery.cuishifeng.cn/', '0', '0', '9', '1509542743', '0', '1509542743');
INSERT INTO `bookmarks_1` VALUES ('44', '1', '33', 'What are extensions? - Google Chrome', '', 'd6c2f248976d2761a138dcd933f280ef', 'https://developer.chrome.com/extensions', '0', '0', '10', '1512098321', '0', '1512098321');
INSERT INTO `bookmarks_1` VALUES ('45', '1', '2', 'linux', '', 'e206a54e97690cce50cc872dd70ee896', '', '1', '1', '5', '1509585468', '0', '1509627702');
INSERT INTO `bookmarks_1` VALUES ('46', '1', '45', 'Linux下Postfix的配置和使用', '', '9c3816d2df4648ac3219f38ec7579a0d', 'http://blog.csdn.net/hitabc141592/article/details/25986911', '0', '0', '0', '1427096133', '0', '1427096133');
INSERT INTO `bookmarks_1` VALUES ('47', '1', '2', 'python', '', '23eeeb4347bdd26bfc6b7ee9a3b755dd', '', '1', '1', '6', '1505443039', '0', '1505732353');
INSERT INTO `bookmarks_1` VALUES ('48', '1', '47', 'python restful api搭建', '', '882067308850b1eea2562479c2247202', 'http://www.cnblogs.com/vovlie/p/4178077.html', '0', '0', '0', '1505442984', '0', '1505442984');
INSERT INTO `bookmarks_1` VALUES ('49', '1', '2', 'tensorflow', '', '2c39bc19b761ac36dc046245d1d47fe6', '', '5', '1', '7', '1505732372', '0', '1512436490');
INSERT INTO `bookmarks_1` VALUES ('50', '1', '49', 'tensorflow', '', 'ab5a8b727eba2f9a2692d525f69a3c69', 'https://www.leiphone.com/news/201703/JNPkCt08zJd9znzZ.html', '0', '0', '0', '1505732353', '0', '1505732353');
INSERT INTO `bookmarks_1` VALUES ('51', '1', '49', '书签--扩展开发文档', '', 'd7d233973f49480bc8c89fb48082b0c4', 'http://open.chrome.360.cn/extension_dev/bookmarks.html', '0', '0', '1', '1507973009', '0', '1507973009');
INSERT INTO `bookmarks_1` VALUES ('52', '1', '49', 'chrome.bookmarks - Google Chrome', '', '3b62cc442d52aae9c815c6c7b79b1801', 'https://developer.chrome.com/extensions/bookmarks', '0', '0', '2', '1508310687', '0', '1508310687');
INSERT INTO `bookmarks_1` VALUES ('53', '1', '49', '用 TensorFlow 做个聊天机器人', '', 'be579de8edd75446639a2bc5d8538c10', 'http://www.jianshu.com/p/3c6f1e32e128', '0', '0', '3', '1512435909', '0', '1512435909');
INSERT INTO `bookmarks_1` VALUES ('54', '1', '49', '自己动手做聊天机器人 一-涉及知识 - SharEDITor - 关注大数据技术', '', '181b1294023aac0b1f8bc6049b5fecff', 'http://www.shareditor.com/blogshow?blogId=63', '0', '0', '4', '1512436490', '0', '1512436490');
INSERT INTO `bookmarks_1` VALUES ('55', '1', '2', 'sphinx', '', '4a2c09ffbc6e7d0414d1ae731e3a0ce5', '', '6', '1', '8', '1509346935', '0', '1512098321');
INSERT INTO `bookmarks_1` VALUES ('56', '1', '55', 'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客', '', '310acba10223a92992809684feda2c57', 'http://blog.csdn.net/baidu_34812181/article/details/51263028', '0', '0', '0', '1509346909', '0', '1509346909');
INSERT INTO `bookmarks_1` VALUES ('57', '1', '55', 'sphinx全文检索 安装配置和使用 - Lion_coder - 博客园', '', '8d0fa459b20fd4651a062f5c7f1d758f', 'http://www.cnblogs.com/findgor/p/5644540.html', '0', '0', '1', '1509370367', '0', '1509370367');
INSERT INTO `bookmarks_1` VALUES ('58', '1', '55', 'php+中文分词scws+sphinx+mysql打造千万级数据全文搜索 - CSDN博客', '', '6c1c598c846297acf76331d48d439e4c', 'http://blog.csdn.net/nuli888/article/details/51892776', '0', '0', '2', '1509370672', '0', '1509370672');
INSERT INTO `bookmarks_1` VALUES ('59', '1', '55', 'sphinx php 扩展安装', '', 'ed2886468d1a31493e808e6f63d57048', 'http://blog.csdn.net/fenglailea/article/details/38115821', '0', '0', '3', '1510046393', '0', '1510046393');
INSERT INTO `bookmarks_1` VALUES ('60', '1', '55', 'Sphinx配置文件详细介绍', '', '90ff1084b209042fc8fe97d3ea980b2a', 'http://blog.sina.com.cn/s/blog_6c971aa301012yfb.html', '0', '0', '4', '1510120321', '0', '1510120321');
INSERT INTO `bookmarks_1` VALUES ('61', '1', '55', 'SphinxSearch', '', 'a454738df83b9eb9fdc5ec49ee0ab90c', 'https://www.mediawiki.org/wiki/Extension:SphinxSearch#Step_1_-_Install_Sphinx', '0', '0', '5', '1512013443', '0', '1512013443');
INSERT INTO `bookmarks_1` VALUES ('62', '1', '2', 'mysql', '', '81c3b080dad537de7e10e0987a4bf52e', '', '2', '1', '9', '1510211013', '0', '1512435909');
INSERT INTO `bookmarks_1` VALUES ('63', '1', '62', 'MySQL配置参数详解', '', '655b7dcb7654656f5b221ee8c0b86351', 'http://blog.csdn.net/wlzx120/article/details/52301383', '0', '0', '0', '1510210997', '0', '1510210997');
INSERT INTO `bookmarks_1` VALUES ('64', '1', '62', 'mysql官方文档', '', '8086d6e5c8c49569785e1ef58a8a57b6', 'https://dev.mysql.com/doc/refman/5.5/en/preface.html', '0', '0', '1', '1512368293', '0', '1512368293');
INSERT INTO `bookmarks_1` VALUES ('65', '1', '2', 'laravel', '', '0659e0de287281473da4d859f0b9ef35', '', '3', '1', '10', '1509962543', '0', '1510147725');
INSERT INTO `bookmarks_1` VALUES ('66', '1', '65', '社会化登录组件', '', 'bc5bdedd21cd17846326acdbf9a19eff', 'http://socialiteproviders.github.io/', '0', '0', '0', '1509962514', '0', '1509962514');
INSERT INTO `bookmarks_1` VALUES ('67', '1', '65', 'Laravel 5.2 使用 JWT 完成多用户认证 | Laravel China 社区 - 高品质的 Laravel 开发者社区 - Powered by PHPHub', '', 'c893bb75787ea3aad8a13ee6436ad728', 'https://laravel-china.org/topics/2811/laravel-52-uses-jwt-to-complete-multi-user-authentication', '0', '0', '1', '1509972092', '0', '1509972092');
INSERT INTO `bookmarks_1` VALUES ('68', '1', '65', 'Laravel 5.5 中文文档 | Laravel 5.5 中文文档', '', '12fd38fc30f14c091d64b94fa95d8040', 'https://d.laravel-china.org/docs/5.5', '0', '0', '2', '1510147719', '0', '1510147719');
INSERT INTO `bookmarks_1` VALUES ('69', '1', '2', 'php', '', 'e1bfd762321e409cee4ac0b6e841963c', '', '0', '1', '11', '1509587628', '0', '1509611764');
INSERT INTO `bookmarks_1` VALUES ('70', '1', '2', '区块链', '', '75d8fafb0706c9381d4c91e3b184f19d', '', '1', '1', '12', '1510210406', '0', '1510210997');
INSERT INTO `bookmarks_1` VALUES ('71', '1', '70', '区块链技术指南', '', '453abeaa1c8024bce68cbd21ec5b715a', 'https://yeasy.gitbooks.io/blockchain_guide/content/', '0', '0', '0', '1510210381', '0', '1510210381');
INSERT INTO `bookmarks_1` VALUES ('72', '1', '2', 'git', '', 'ba9f11ecc3497d9993b933fdc2bd61e5', '', '1', '1', '14', '1510197915', '0', '1510210381');
INSERT INTO `bookmarks_1` VALUES ('73', '1', '72', 'git - the simple guide - no deep shit!', '', 'ba0a4203e749c0c3d878c8ecf4f317b4', 'http://rogerdudler.github.io/git-guide/index.zh.html', '0', '0', '0', '1510197885', '0', '1510197885');
INSERT INTO `bookmarks_1` VALUES ('74', '1', '2', '在线编辑器', '', '21274cab46736f90c8b8c6210a9d403e', 'https://codenvy.com/docs/', '0', '0', '13', '1509609402', '0', '1509609402');
INSERT INTO `bookmarks_1` VALUES ('75', '1', '1', '其他书签', '', 'cb8fd0a93609eef1ae04301e9d2f40ab', '', '18', '1', '1', '1409985848', '0', '1510286119');
INSERT INTO `bookmarks_1` VALUES ('76', '1', '75', 'aaa', '', '47bce5c74f589f4867dbd57e9ca9f808', '', '0', '1', '1', '1510059142', '0', '1510059142');
INSERT INTO `bookmarks_1` VALUES ('77', '1', '75', 'ebay开发者中心', '', 'c4bf61c480713678426716760e17a731', '', '7', '1', '4', '1430106150', '0', '1476148959');
INSERT INTO `bookmarks_1` VALUES ('78', '1', '77', 'eBay API 开发-eBay外贸社区 - Powered by Discuz!', '', 'cb0ac9b75c2c66b4215ec2e99c62686e', 'http://community.ebay.cn/forum-400000108-1.html', '0', '0', '0', '1430106133', '0', '1430106133');
INSERT INTO `bookmarks_1` VALUES ('79', '1', '77', 'Call Index - API Reference - Trading API', '', '6c51941754b2efc3d0acfdd4292922a5', 'http://developer.ebay.com/DevZone/XML/docs/Reference/ebay/index.html', '0', '0', '1', '1438830029', '0', '1438830029');
INSERT INTO `bookmarks_1` VALUES ('80', '1', '77', '华成云商开发者API文档-运输方式', '', '6483b73c4c987c7a89674c325dcd461d', 'http://developer.valsun.cn/index.php?mod=developerDoc&act=shippingType', '0', '0', '2', '1440730394', '0', '1440730394');
INSERT INTO `bookmarks_1` VALUES ('81', '1', '77', '一键分销', '', '0a33c94e368fe5b545acce14f375cf36', 'http://sub.fenxiao.valsun.cn/', '0', '0', '3', '1444617752', '0', '1444617752');
INSERT INTO `bookmarks_1` VALUES ('82', '1', '77', 'www.techweb.com.cn/rss/data.xml', '', '483d6f0a8abe0e547d7730bcfd8caf96', 'http://www.techweb.com.cn/rss/data.xml', '0', '0', '4', '1449121188', '0', '1449121188');
INSERT INTO `bookmarks_1` VALUES ('83', '1', '77', '速卖通 api文档', '', 'd066a11c4960fe47d5d7a5788c769f7b', 'http://gw.api.alibaba.com/dev/doc/intl/api.htm?ns=aliexpress.open&n=api.findOrderListQuery&v=1', '0', '0', '5', '1470917982', '0', '1470917982');
INSERT INTO `bookmarks_1` VALUES ('84', '1', '77', 'ebay api文档', '', 'e9ec12bd1f35c392da944bdd42d526bd', 'http://developer.ebay.com/Devzone/XML/docs/Reference/ebay/index.html', '0', '0', '6', '1470918356', '0', '1470918356');
INSERT INTO `bookmarks_1` VALUES ('85', '1', '75', 'unix时间戳', '', '1fce04717dae407d0b0c16db3ecb186c', '', '2', '1', '6', '1435546461', '0', '1438830029');
INSERT INTO `bookmarks_1` VALUES ('86', '1', '85', 'Unix时间戳(Unix timestamp)转换工具 - 站长工具', '', 'fceef11627f9a6e3f0f64d226e1310bc', 'http://tool.chinaz.com/Tools/unixtime.aspx', '0', '0', '0', '1435546442', '0', '1435546442');
INSERT INTO `bookmarks_1` VALUES ('87', '1', '85', 'PHP: PHP 手册 - Manual', '', '5852402aa7c7d194ed0336dca491ac14', 'http://php.net/manual/zh/', '0', '0', '1', '1438325896', '0', '1438325896');
INSERT INTO `bookmarks_1` VALUES ('88', '1', '75', 'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客', '', '310acba10223a92992809684feda2c57', 'http://blog.csdn.net/baidu_34812181/article/details/51263028', '0', '0', '0', '1510286119', '0', '1510286119');
INSERT INTO `bookmarks_1` VALUES ('89', '1', '75', 'Chrome扩展应用开发', '', '7e2b1047f1d0e8f799cfe39b1dceef98', 'http://www.ituring.com.cn/book/miniarticle/60223', '0', '0', '2', '1509969805', '0', '1509969805');
INSERT INTO `bookmarks_1` VALUES ('90', '1', '75', '10个顶级的CSS和Javascript动画框架推荐', '', '7c3de6ec969476be50beeb6bd380b6b6', 'http://www.iteye.com/news/23535', '0', '0', '3', '1509969802', '0', '1509969802');
INSERT INTO `bookmarks_1` VALUES ('91', '1', '75', '修改订单详情页', '', 'a9928503070e422b681d363de6b80ad2', 'http://local.hc/developerInformationList/index.php?mod=orderDetails&act=update&dp_id=160&id=8315', '0', '0', '5', '1434173337', '0', '1434173337');
INSERT INTO `bookmarks_1` VALUES ('92', '1', '75', 'Python 字典(Dictionary) fromkeys()方法 | 菜鸟教程', '', 'a3f9cd873efae5eb36586db8c1ee2691', 'http://www.runoob.com/python/att-dictionary-fromkeys.html', '0', '0', '7', '1476148959', '0', '1476148959');
INSERT INTO `bookmarks_1` VALUES ('93', '1', '75', '分享Centos6.5升级glibc过程 - CNode技术社区', '', '558050221a9aa278e7e3a58683e51b2b', 'http://cnodejs.org/topic/56dc21f1502596633dc2c3dc', '0', '0', '8', '1476338365', '0', '1476338365');
INSERT INTO `bookmarks_1` VALUES ('94', '1', '75', 'Wish 商户平台', '', '366f999513d5feb1a13eb855eec7c85d', 'https://merchant.wish.com/transactions/action', '0', '0', '9', '1479526893', '0', '1479526893');
INSERT INTO `bookmarks_1` VALUES ('95', '1', '75', 'php-rdkafka', '', '1da472b20b4903caae2028579e4a384a', 'https://github.com/arnaud-lb/php-rdkafka#documentation', '0', '0', '10', '1492837102', '0', '1492837102');
INSERT INTO `bookmarks_1` VALUES ('96', '1', '75', '开始使用  |  TensorFlow', '', '4160f164f5a1fdce4e7211e7aa00cdc8', 'https://www.tensorflow.org/get_started/', '0', '0', '11', '1504506593', '0', '1504506593');
INSERT INTO `bookmarks_1` VALUES ('97', '1', '75', 'Chrome 网上应用店 - bookmarks', '', '8a0b350ef5889d054b0cbbdc373a0dfd', 'https://chrome.google.com/webstore/search/bookmarks?hl=zh-CN', '0', '0', '12', '1508899533', '0', '1508899533');
INSERT INTO `bookmarks_1` VALUES ('98', '1', '75', 'Profile & Contacts | eBay', '', '491124c1bec7c7fe52dd54d302d24138', 'https://developer.ebay.com/my/profile#', '0', '0', '13', '1508911307', '0', '1508911307');
INSERT INTO `bookmarks_1` VALUES ('99', '1', '75', '大本营', '', 'be5582b018741b37cc2da76fa35bf163', 'chrome://newtab/', '0', '0', '14', '1509000466', '0', '1509000466');
INSERT INTO `bookmarks_1` VALUES ('100', '1', '75', '10个顶级的CSS和Javascript动画框架推荐', '', '7c3de6ec969476be50beeb6bd380b6b6', 'http://www.iteye.com/news/23535', '0', '0', '15', '1509969802', '0', '1509969802');
INSERT INTO `bookmarks_1` VALUES ('101', '1', '75', 'Chrome扩展应用开发', '', '7e2b1047f1d0e8f799cfe39b1dceef98', 'http://www.ituring.com.cn/book/miniarticle/60223', '0', '0', '16', '1509969805', '0', '1509969805');
INSERT INTO `bookmarks_1` VALUES ('102', '1', '75', 'sphinx+mysql+php做千万数据级别的搜索引擎 - CSDN博客', '', '310acba10223a92992809684feda2c57', 'http://blog.csdn.net/baidu_34812181/article/details/51263028', '0', '0', '17', '1510286119', '0', '1510286119');

-- ----------------------------
-- Table structure for files
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) DEFAULT '0' COMMENT '作者ID',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '标题',
  `desc` varchar(255) DEFAULT '' COMMENT '描述',
  `type` tinyint(4) DEFAULT '0' COMMENT '文件内容类型 ''0: article'', ''1: news''',
  `url_md5` char(32) DEFAULT NULL COMMENT 'url的md5值',
  `url` varchar(500) DEFAULT '' COMMENT '原始地址',
  `location` tinyint(4) DEFAULT '0' COMMENT '文件存储的位置 ''0: remote'',''1: local'', ''2: oss''',
  `reads` int(11) DEFAULT '0' COMMENT '文件阅读次数',
  `quotes` int(11) DEFAULT '0' COMMENT '引用数',
  `reviews` int(11) DEFAULT '0' COMMENT '评论数',
  `remarks` int(11) DEFAULT '0' COMMENT '备注数',
  `shares` int(11) DEFAULT '0' COMMENT '推荐次数',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `select2` (`url_md5`,`deleted_at`) USING BTREE,
  KEY `select1` (`author`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------

-- ----------------------------
-- Table structure for folders
-- ----------------------------
DROP TABLE IF EXISTS `folders`;
CREATE TABLE `folders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '标题',
  `path` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '' COMMENT '路径',
  `status` tinyint(4) DEFAULT '0' COMMENT '标签状态, ''0: private'',''1: protect'',''2: public''',
  `files` int(10) unsigned DEFAULT '0' COMMENT '文件数',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '排序ID',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `select1` (`status`,`uid`) USING BTREE,
  KEY `select2` (`uid`,`fid`,`title`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='书签文件夹';

-- ----------------------------
-- Records of folders
-- ----------------------------

-- ----------------------------
-- Table structure for folder_map_files
-- ----------------------------
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

-- ----------------------------
-- Records of folder_map_files
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for reviews
-- ----------------------------
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE `reviews` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论者',
  `obj_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论对象ID',
  `obj_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '评论对象类型： 0:file, 1:folder, 2:user',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '内容',
  `reply_which_user` int(10) unsigned DEFAULT '0' COMMENT '回复哪个用户',
  `created_at` int(11) DEFAULT NULL COMMENT '评论时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reviews
-- ----------------------------

-- ----------------------------
-- Table structure for sharefolders
-- ----------------------------
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

-- ----------------------------
-- Records of sharefolders
-- ----------------------------

-- ----------------------------
-- Table structure for subscribes
-- ----------------------------
DROP TABLE IF EXISTS `subscribes`;
CREATE TABLE `subscribes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件夹ID',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`) USING BTREE,
  KEY `select2` (`folder_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of subscribes
-- ----------------------------

-- ----------------------------
-- Table structure for tags
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '标签创建者',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '标签名',
  `created_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------

-- ----------------------------
-- Table structure for tag_maps
-- ----------------------------
DROP TABLE IF EXISTS `tag_maps`;
CREATE TABLE `tag_maps` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '植入标签对象的类型 ''0:file'',''1:folder'',''2:user''',
  `tag_id` int(11) NOT NULL,
  `obj_id` int(11) NOT NULL DEFAULT '0' COMMENT '对象ID',
  `created_at` int(11) DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`id`),
  KEY `select1` (`type`,`obj_id`) USING BTREE,
  KEY `select2` (`obj_id`,`type`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tag_maps
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'zoujunrong', 'zoujunrong@sailvan.com', '$2y$10$6J71Fg68CIY1FRY/x8UFouo.AJPeTDUWLfsadnAoCmluVKE9.mbxm', 'UkqLy9PaIJXoQIC4XIyLyn5farRG71uhyVFceJx90x5E7AUsmLDzAyE0eclZ', '2017-07-24 12:06:26', '2017-07-24 12:06:26');
INSERT INTO `users` VALUES ('2', 'zjr', 'zjr@sailvan.com', '$2y$10$zQNJKPtV5snr.u.sO3SDFuTcP6.YpFNa4AZSiAWe1q/5lEIXEFm3i', null, '2017-07-26 12:08:16', '2017-07-26 12:08:16');
