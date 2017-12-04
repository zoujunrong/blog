<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Sharefloder extends Model
{
	static private $tables = [];

	/**
	 * 获取表名
	 * @param  folderId 文件夹ID
	 * @return tableName 表名
	 */
	static public function getTableName($folderId)
	{
		$baseTable = 'sharefloders';
		// $tableName = "{$baseTable}_".ceil($folderId/config("model.folder_map_files_max_folder"));
		// // 检测表是否存在，不存在时创建
		// if (!isset(self::$tables[$tableName])) {
		// 	DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
		// 	self::$tables[$tableName] = 1;
		// }

		return $tableName;
	}


}
