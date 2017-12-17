-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

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
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`,`url_md5`) USING BTREE,
  KEY `select2` (`url_md5`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`,`url_md5`) USING BTREE,
  KEY `select2` (`url_md5`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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


SET NAMES utf8mb4;

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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


DROP TABLE IF EXISTS `subscribes`;
CREATE TABLE `subscribes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '文件夹ID',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`) USING BTREE,
  KEY `select2` (`folder_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2017-12-17 16:28:00