<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use FolderMapFile;
use File;

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

    public function getFolderFilesByFolderIds($folderIds)
    {
        $files = (new FolderMapFile())->getFolderFilesByFolderIds($folderIds);
        return $files;
    }

    /**
     * @param  userId 用户ID
     * @param  data 插入数据
     * @return [type]
     */
    public function insertFoldersAndFilesByTree($userId, $treeData)
    {
        foreach ($treeData as $value) {
            # code...
        }
    	return DB::table(self::getTableName($userId))->insert($datas);
    }

    /**
     * 分离文件夹和文件
     * @return [type] [description]
     */
    private function separateFolderAndFiles($userId, $treeData, $fid=null)
    {
        if (!empty($treeData)) {
            $folders = $files = $fileMaps = [];

            foreach ($treeData as $data) {
                if (isset($data['children'])) {
                    $time = time();
                    $folders[$data['id']] = [
                        'uid' => $userId,
                        'fid' => $fid,
                        'title' => $data['title'],
                        'files' => isset($data['children']) ? count($data['children']) : 0,
                        'updated_at' => $time,
                    ];
                } else {
                    $urlmd5 = md5($data['url']);

                    $files[] = [
                        'folder_id' => $fid,
                        'title' => $data['title'],
                        'url_md5' => $urlmd5,

                    ];
                }

            }
        }
    }

}
