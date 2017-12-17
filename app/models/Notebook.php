<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class NoteBook extends Model
{
	static private $tables = [];

	/**
	 * 获取表名
	 * @param  userId 用户ID
	 * @return tableName 表名
	 */
	static public function getTableName($userId)
	{
		$baseTable = 'notebooks';
		$tableName = "{$baseTable}_".ceil($userId/config("model.notebook_max_user"));
		// 检测表是否存在，不存在时创建
		if (!isset(self::$tables[$tableName])) {
			DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
			self::$tables[$tableName] = 1;
		}
		return $tableName;

	}

    public function getIsDelete($where, $isDelete)
    {
        if ($isDelete === 0) {
            $where[] = ['deleted_at', '=', 0];
        } elseif ($isDelete === 1) {
            $where[] = ['deleted_at', '>', 0];
        }
        return $where;
    }


	/**
     * 新建笔记本
     */
    public function createNoteBooks($uid, $datas)
    {
        $returnData = [];
        $datas = $this->handleInsertDatas($uid, $datas);
        if (!empty($datas)) {
            // 插入之前要先判断是否已经存在
            $notebooks = DB::table($this->getTableName($uid))->where('uid', $uid)->whereIn('title', array_keys($datas))->get()->keyBy('title')->all();
            
            $inserts = [];
            foreach ($datas as $data) {
                if (isset($notebooks[$data['title']])) {
                    // 判断是否需要修改
                    if ($notebooks[$data['title']]->deleted_at != 0) {
                        $data['deleted_at'] = 0;
                        $updateRes = DB::table($this->getTableName($uid))->where('id', $notebooks[$data['title']]->id)->update($data);
                        $returnData[] = $notebooks[$data['title']]->id;
                    } else {
                        $returnData[] = $notebooks[$data['title']]->id;
                    }
                    
                } else {
                    $inserts[] = $data;
                }
            }

            if (!empty($inserts)) {
                // 如果只插入一条，直接返回对应的ID, 否则只返回true, 因为暂时还无法获取批量插入的ID
                if (count($inserts) == 1) {
                    $returnData[] = DB::table($this->getTableName($uid))->insertGetId(end($inserts));
                } else {
                    $insertResult = DB::table($this->getTableName($uid))->insert($inserts);
                    $returnData = array_merge($returnData, array_fill(0, count($inserts), $insertResult));
                }
                
            }
            
        }
        return $returnData;
    }

    /**
     * 处理组装数据
     * @param  [type] $uid   [description]
     * @param  [type] $datas [description]
     * @return [type]        [description]
     */
    public function handleInsertDatas($uid, $datas)
    {
        $currenttime = time();
        $returnDatas = [];
        if (!empty($datas)) {
            foreach ($datas as $data) {
                $data['title'] = trim($data['title']);
                $returnDatas[$data['title']] = [
                    'title' => $data['title'],
                    'desc'  => $data['desc'],
                    'uid'   => $uid,
                    'open_status' => isset($data['open_status']) ? $data['open_status'] : 0,
                    'created_at' => $currenttime,
                    'updated_at' => $currenttime,
                    'has_photo' => isset($data['photo']) && !empty($data['photo']) ? 1 : 0
                ];
            }
        }
        return $returnDatas;
    }


    /**
     * 获取笔记
     */
    public function getNotebooks($uid, $where=[], $isDelete=0)
    {
        $where = $this->getIsDelete($where, $isDelete);
        $where['uid'] = $uid;
        return DB::table($this->getTableName($uid))->where($where)->get()->keyBy('id');
    }



    

}
