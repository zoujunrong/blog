-- Adminer 4.3.0 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `bookmarks`;
CREATE TABLE `bookmarks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '����ID',
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '��ID',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '����',
  `desc` varchar(255) DEFAULT '' COMMENT '����',
  `url_md5` char(32) DEFAULT '' COMMENT 'url��md5ֵ ����������ѯ���µ�ַ',
  `url` varchar(500) DEFAULT '' COMMENT 'ԭʼ��ַ',
  `childrens` smallint(6) unsigned DEFAULT '0' COMMENT '�ӽڵ�����',
  `is_folder` tinyint(3) unsigned DEFAULT '0' COMMENT '�Ƿ�Ϊ�ļ��� 0 ��  1 ��',
  `open_status` tinyint(3) unsigned DEFAULT '0' COMMENT '����״̬��0 ��������1����',
  `parent_path` varchar(120) DEFAULT NULL COMMENT '������ǩ·��',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '����ID',
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
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '����ID',
  `fid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '��ID',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '����',
  `desc` varchar(255) DEFAULT '' COMMENT '����',
  `url_md5` char(32) DEFAULT '' COMMENT 'url��md5ֵ ����������ѯ���µ�ַ',
  `url` varchar(500) DEFAULT '' COMMENT 'ԭʼ��ַ',
  `childrens` smallint(6) unsigned DEFAULT '0' COMMENT '�ӽڵ�����',
  `is_folder` tinyint(3) unsigned DEFAULT '0' COMMENT '�Ƿ�Ϊ�ļ��� 0 ��  1 ��',
  `open_status` tinyint(3) unsigned DEFAULT '0' COMMENT '����״̬��0 ��������1����',
  `parent_path` varchar(120) DEFAULT NULL COMMENT '������ǩ·��',
  `sortid` mediumint(8) unsigned DEFAULT '0' COMMENT '����ID',
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
  `author` int(11) DEFAULT '0' COMMENT '����ID',
  `title` varchar(120) NOT NULL DEFAULT '' COMMENT '����',
  `desc` varchar(255) DEFAULT '' COMMENT '����',
  `type` tinyint(4) DEFAULT '0' COMMENT '�ļ��������� ''0: article'', ''1: news''',
  `url` varchar(500) DEFAULT '' COMMENT 'ԭʼ��ַ',
  `location` tinyint(4) DEFAULT '0' COMMENT '�ļ��洢��λ�� ''0: remote'',''1: local'', ''2: oss''',
  `reads` int(11) DEFAULT '0' COMMENT '�ļ��Ķ�����',
  `quotes` int(11) DEFAULT '0' COMMENT '������',
  `reviews` int(11) DEFAULT '0' COMMENT '������',
  `remarks` int(11) DEFAULT '0' COMMENT '��ע��',
  `shares` int(11) DEFAULT '0' COMMENT '�Ƽ�����',
  `created_at` int(11) DEFAULT '0',
  `deleted_at` int(11) DEFAULT '0',
  `updated_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `select1` (`author`,`deleted_at`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `folders`;
CREATE TABLE `folders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '�û�ID',
  `fid` int(11) unsigned DEFAULT '0' COMMENT '���ļ���ID',
  `local_id` mediumint(10) unsigned DEFAULT '0' COMMENT '����ID',
  `title` varchar(50) NOT NULL DEFAULT '' COMMENT '����',
  `status` tinyint(4) DEFAULT '0' COMMENT '��ǩ״̬, ''0: private'',''1: protect'',''2: public''',
  `files` int(10) unsigned DEFAULT '0' COMMENT '�ļ���',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`,`fid`) USING BTREE,
  KEY `status` (`status`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='��ǩ�ļ���';


DROP TABLE IF EXISTS `folder_map_files`;
CREATE TABLE `folder_map_files` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `folder_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '�ļ���ID',
  `file_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '�ļ�ID',
  `quote_user_id` int(10) unsigned DEFAULT '0' COMMENT '�����ĸ��û����ļ��� Ϊ0 Ĭ��ʹ��ԭ���ߵ�',
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
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '������',
  `obj_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '���۶���ID',
  `obj_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '���۶������ͣ� 0:file, 1:folder, 2:user',
  `content` varchar(255) NOT NULL DEFAULT '' COMMENT '����',
  `reply_which_user` int(10) unsigned DEFAULT '0' COMMENT '�ظ��ĸ��û�',
  `created_at` int(11) DEFAULT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `sharebookmarks`;
CREATE TABLE `sharebookmarks` (
  `id` int(11) NOT NULL,
  `author` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '������',
  `has_img` tinyint(4) DEFAULT '0' COMMENT '�Ƿ����ͷ��',
  `bookmark_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '��ǩID',
  `subscribes` int(10) unsigned DEFAULT '0' COMMENT '������',
  `deleted_at` tinyint(1) unsigned DEFAULT '0' COMMENT 'ɾ����־',
  PRIMARY KEY (`id`),
  KEY `select1` (`author`,`bookmark_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `sharefolders`;
CREATE TABLE `sharefolders` (
  `id` int(11) NOT NULL,
  `author` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '������',
  `has_img` tinyint(4) DEFAULT '0' COMMENT '�Ƿ����ͷ��',
  `folder_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '�ļ���ID',
  `desc` varchar(255) DEFAULT '' COMMENT '����',
  `subscribes` int(10) unsigned DEFAULT '0' COMMENT '������',
  PRIMARY KEY (`id`),
  KEY `select1` (`folder_id`) USING BTREE,
  KEY `select2` (`author`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `subscribes`;
CREATE TABLE `subscribes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '�û�ID',
  `folder_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '�ļ���ID',
  PRIMARY KEY (`id`),
  KEY `select1` (`uid`) USING BTREE,
  KEY `select2` (`folder_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `author` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '��ǩ������',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '��ǩ��',
  `created_at` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tag_maps`;
CREATE TABLE `tag_maps` (
  `id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'ֲ���ǩ��������� ''0:file'',''1:folder'',''2:user''',
  `tag_id` int(11) NOT NULL,
  `obj_id` int(11) NOT NULL DEFAULT '0' COMMENT '����ID',
  `created_at` int(11) DEFAULT '0' COMMENT '����ʱ��',
  PRIMARY KEY (`id`),
  KEY `select1` (`type`,`obj_id`) USING BTREE,
  KEY `select2` (`obj_id`,`type`) USING BTREE
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


-- 2017-12-15 00:03:25