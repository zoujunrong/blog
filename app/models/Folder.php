<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
	static private $tables = [];

	/**
	 * 获取表名
	 * @param  userId 用户ID
	 * @return tableName 表名
	 */
	static public function getTableName($userId)
	{
		$baseTable = strtolower(__CLASS__).'s';
		$tableName = "{$baseTable}_".ceil($userId/config("model.folder_max_user"));
		// 检测表是否存在，不存在时创建
		if (!isset(self::$tables[$tableName])) {
			DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
			self::$tables[$tableName] = 1;
		}

		return $tableName;
	}


	/**
	 * 用户文件夹
	 * @param  userId 用户ID
	 * @param  fid 父级文件夹ID
	 * @return folders array 所有文件夹
	 */
    public function getUserFoldersByFid($userId, $fid=null)
    {
    	$where = [
    		['uid', $userId]
    	];
    	if (!$fid === null) {
    		$where[] = ['fid', int($fid)];
    	}
    	return DB::table(self::getTableName($userId))->where($where)->get();
    }

    /**
     * @param  userId 用户ID
     * @param  data 插入数据
     * @return [type]
     */
    public function insertFolders($userId, $datas)
    {
    	return DB::table(self::getTableName($userId))->insert($datas);
    }

}
