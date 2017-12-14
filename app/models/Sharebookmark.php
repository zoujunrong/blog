<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Sharebookmark extends Model
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

	/**
	 * 插入或修改数据
	 * @param  [type] $userId [description]
	 * @param  [type] $datas  [description]
	 * @return [type]         [description]
	 */
	public function insertOrUpdateDatas($userId, $datas)
	{
		// 首先判断是否重复
		$shares = DB::table($this->getTableName)->where('author', $userId)->get()->keyBy('bookmark_path')->all();

		$inserts = [];
		$returnData = [];
		foreach ($datas as $data) {
			if (isset($shares[$data['bookmark_path']])) {
				// 修改
				$returnData[] = DB::table($this->getTableName)->where('id', $shares[$data['bookmark_path']]['id'])->update($data);
			} else {
				$data['author'] = $userId;
				$inserts[] = $data;
			}
		}

		// 批量插入
		if (!empty($inserts)) {
			$insertResult = DB::table('users')->insert($inserts);
			$returnData = array_merge($returnData, array_fill(0, count($inserts), $insertResult));
		}

		return $returnData;

	}


}
