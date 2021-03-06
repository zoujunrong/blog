<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	static private $tables = [];

	/**
	 * 获取表名
	 * @param  id 用户ID
	 * @return tableName 表名
	 */
	static public function getTableName($id=0)
	{
		$baseTable = strtolower(__CLASS__).'s';
		// $tableName = "{$baseTable}_".ceil($userId/config("model.folder_max_user"));
		// // 检测表是否存在，不存在时创建
		// if (!isset(self::$tables[$tableName])) {
		// 	DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
		// 	self::$tables[$tableName] = 1;
		// }

		return $tableName;
	}

	static public function getTables($ids)
	{
		$tables = [];

		if (!empty($ids)) {
			foreach ($ids as $id) {
				$tables[self::getTableName($id)][] = $id;
			}
		}
		return $tables;

	}


	public function getFilesByIds($fileIds, $options=[])
	{
		// 获取表
		$tables = self::getTables($fileIds);

		$files = collect([]);

		if (!empty($tables)) {
			foreach ($tables as $table) {
				$files->merge(DB::table($table)->whereIn(id, $ids)->where($options)->get());
			}

		}
		return $files;

	}


	

}
