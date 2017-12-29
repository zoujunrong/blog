<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class NotebookFile extends Model
{
	static private $tables = [];

	/**
	 * 获取表名
	 * @param  userId 用户ID
	 * @return tableName 表名
	 */
	static public function getTableName($userId)
	{
		$baseTable = 'notebook_files';
		$tableName = "{$baseTable}_".ceil($userId/config("model.notebook_file_max_notebook"));
		// 检测表是否存在，不存在时创建
		if (!isset(self::$tables[$tableName])) {
			DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
			self::$tables[$tableName] = 1;
		}
		return $tableName;

	}
	
	/**
	 * 设置自动维护的字段格式
	 */
	public function fromDateTime($value)
	{
	    return strtotime(parent::fromDateTime($value));
	}

    /**
     * 获取分表
     * @param unknown $notebook_ids
     * @return Ambigous <multitype:, unknown>
     */
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
     * 新增或修改笔记
     */
    public function createOrUpdateNoteBookFile($data)
    {
        // 
    }

    

}
