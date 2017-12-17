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
	static public function getTableName($userId)
	{
		$baseTable = 'sharebookmarks';
		// $tableName = "{$baseTable}_".ceil($folderId/config("model.folder_map_files_max_folder"));
		// // 检测表是否存在，不存在时创建
		// if (!isset(self::$tables[$tableName])) {
		// 	DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
		// 	self::$tables[$tableName] = 1;
		// }

		return $baseTable;
	}

	/**
	 * 插入或修改数据
	 * @param  [type] $userId [description]
	 * @param  [type] $datas  [description]
	 * @return [type]         [description]
	 */
	public function insertOrUpdateDatas($userId, $datas)
	{
		if (empty($userId) || empty($datas)) return [];
		// 首先判断是否重复
		$shares = DB::table($this->getTableName($userId))->where('author', $userId)->get()->keyBy('bookmark_id')->all();

		$inserts = [];
		$returnData = [];
		foreach ($datas as $data) {
			if (isset($shares[$data['bookmark_id']])) {
				// 判断是否需要修改
				if ($shares[$data['bookmark_id']]->deleted_at != 0) {
					$data['deleted_at'] = 0;
					$returnData[] = DB::table($this->getTableName($userId))->where('id', $shares[$data['bookmark_id']]->id)->update($data);
				} else {
					$returnData[] = true;
				}
				
			} else {
				$data['author'] = $userId;
				$inserts[] = $data;
			}
		}

		// 批量插入
		if (!empty($inserts)) {
			$insertResult = DB::table($this->getTableName($userId))->insert($inserts);
			$returnData = array_merge($returnData, array_fill(0, count($inserts), $insertResult));
		}

		return $returnData;

	}


}
