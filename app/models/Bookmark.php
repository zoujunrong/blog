<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
	static private $tables = [];

	/**
	 * 获取表名
	 * @param  userId 用户ID
	 * @return tableName 表名
	 */
	static public function getTableName($userId)
	{
		$baseTable = 'bookmarks';
		$tableName = "{$baseTable}_".ceil($userId/config("model.bookmark_max_user"));
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
     * 更新主表
     */
    public function updateMainData($userId, $data)
    {
        DB::table($this->table)->where('uid', $userId)->get();
    }


	/**
	 * 获取书签
	 * @param  userId 用户ID
	 * @param  fid 父级文件夹ID
	 * @return folders array 所有文件夹
	 */
    public function getUserBookmarksByFid($userId, $fid=null, $isDelete=null)
    {
        $where = [['uid', '=', $userId]];
    	if ($fid !== null) {
            $where[] = ['fid', '=', intval($fid)];
    	}
        $where = $this->getIsDelete($where, $isDelete);
    	return DB::table(self::getTableName($userId))->where($where)->get()->keyBy('url_md5');

    }

    /**
     * 获取书签信息
     */
    public function getUserBookmarksTreeByFid($userId, $fid=null, $isDelete=null)
    {
        $where = [['uid', '=', $userId]];
        if ($fid !== null) {
            $where[] = ['fid', '=', intval($fid)];
        }
        $where = $this->getIsDelete($where, $isDelete);
        $datas = DB::table(self::getTableName($userId))->where($where)->get();
        if (!empty($datas)) {
            foreach ($datas as $key=>$data) {
                if ($data->is_folder && $data->childrens > 0) {
                    $datas[$key]->children = $this->getUserBookmarksTreeByFid($userId, $data->id, $isDelete);
                }
            }
        }
        return $datas;
        
    }


    /**
     *  同步书签信息
     */
    public function syncBookmarksTree($uid, $bookmarks, $fid=0)
    {
        // 先插
        if (!empty($bookmarks)) {
            // 首先查找出同级下的所有文件
            $exists = $this->getUserBookmarksByFid($uid, $fid);
            // 非文件夹可以批量保存
            $insertUrls = [];
            foreach ($bookmarks as $bookmarkData) {
                $insertData = [];
                $md5val = isset($bookmarkData['url']) && !empty($bookmarkData['url']) ? md5($bookmarkData['url']) : md5($bookmarkData['title']);
                
                if (isset($exists[$md5val])) {
                    if ($exists[$md5val]->title != $bookmarkData['title']) {
                        $updateWhere = ['title' => $bookmarkData['title']];
                        $updateWhere['is_folder'] = isset($bookmarkData['children']) ? 1 : 0;
                        $updateWhere['childrens'] = isset($bookmarkData['children']) ? count($bookmarkData['children']) : 0;
                        DB::table(self::getTableName($uid))->where('id', $exists[$md5val]->id)
                        ->update($updateWhere);
                    }

                    if (isset($bookmarkData['children'])) {
                        $this->syncBookmarksTree($uid, $bookmarkData['children'], $exists[$md5val]->id);
                    }

                } else {
                    // 需要先提取出ID, 批量插入
                    $insertData = [
                        'uid'   => $uid,
                        'fid'   => $fid,
                        'title' => $bookmarkData['title'],
                        'url_md5' => $md5val,
                        'url' => isset($bookmarkData['url']) ? $bookmarkData['url'] : '',
                        'sortid' => isset($bookmarkData['index']) ? $bookmarkData['index'] : 0,
                        'created_at' => substr($bookmarkData['dateAdded'], 0, 10),
                        'updated_at' => isset($bookmarkData['dateGroupModified']) ? substr($bookmarkData['dateGroupModified'], 0, 10) : substr($bookmarkData['dateAdded'], 0, 10),
                    ];
                    
                    // 判断是文件夹还是链接
                    if (isset($bookmarkData['children'])) {
                        $insertData['is_folder'] = 1;
                        $insertData['childrens'] = count($bookmarkData['children']);
                        $newid = DB::table(self::getTableName($uid))->insertGetId($insertData);
                        $this->syncBookmarksTree($uid, $bookmarkData['children'], $newid);
                    } else {
                        $insertUrls[] = $insertData;
                    }

                }

            }

            // 查看批量插入书签链接地址
            if (!empty($insertUrls)) {
                DB::table(self::getTableName($uid))->insert($insertUrls);
            }
            
        }
    }



    

}
