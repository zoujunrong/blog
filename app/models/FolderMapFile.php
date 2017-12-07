<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use File;

class FolderMapFile extends Model
{
	static private $tables = [];

	/**
	 * 获取表名
	 * @param  folderId 文件夹ID
	 * @return tableName 表名
	 */
	static public function getTableName($folderId)
	{
		$baseTable = 'folder_map_files';
		$tableName = "{$baseTable}_".ceil($folderId/config("model.folder_map_files_max_folder"));
		// 检测表是否存在，不存在时创建
		if (!isset(self::$tables[$tableName])) {
			DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
			self::$tables[$tableName] = 1;
		}
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

	/**
	 * 获取文件夹下的文件
	 * @param  [type] $folderIds [description]
	 * @return [type]            [description]
	 */
	public function getFolderFilesByFolderIds($folderIds, $option=[])
	{
		// 获取对应的分表
		$tables = self::getTables($folderIds);
		// 获取分表下的文件ID
		$maps = collect([]);
		if (!empty($tables)) {
			foreach ($tables as $table => $ids) {
				$maps->merge(DB::table($table)->whereIn(id, $ids)->where($option)->get());
			}

			$folderFiles = $maps->keyBy('folder_id');
			$fileIds = $maps->keyBy('file_id')->keys()->all();
			// 获取文件数据
			if (!empty($fileIds)) {
				return (new File())->getFilesByIds($fileIds);
			}

		}

		return [];

	}


}
