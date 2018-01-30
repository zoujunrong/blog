<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
	static private $tables = [];
    static private $baseTable = 'bookmarks';
	/**
	 * 获取表名
	 * @param  userId 用户ID
	 * @return tableName 表名
	 */
	static public function getTableName($userId)
	{
		$tableName = "{$this->baseTable}_".ceil($userId/config("model.bookmark_max_user"));
		// 检测表是否存在，不存在时创建
		if (!isset(self::$tables[$tableName])) {
			DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$this->baseTable.'`');
			self::$tables[$tableName] = 1;
		}
		return $tableName;
	}

    /**
     * 获取最新表
     * @return [type] [description]
     */
    static public function getLatestTable()
    {
        $tables = DB::select('select table_name from information_schema.tables where table_name LIKE "'.self::$baseTable.'_%"');
        $latestIndex = null;
        foreach($tables as $key => $item) {
            $tmpIndex = substr($item->table_name, stripos($item->table_name, '_')+1);
            if ($tmpIndex > $latestIndex) {
                $latestIndex = $tmpIndex;
            }
        }
        return self::$baseTable.'_'.$latestIndex;
    }

    /**
     * 设置表名
     */
    public function setTableName($userId)
    {
        $this->setTable(self::getTableName($userId));
    }

    /**
     * 获取是否删除
     * @param  [type] $where    [description]
     * @param  [type] $isDelete [description]
     * @return [type]           [description]
     */
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
    public function syncBookmarksTree($uid, $bookmarks, $fid=0, $path='0')
    {
        // 先插
        if (!empty($bookmarks) && $uid > 0) {
            // 先删除所有
            DB::table(self::getTableName($uid))->where([['uid', $uid], ['fid', $fid]])
                        ->update(['deleted_at' => time()]);
            // 首先查找出同级下的所有文件
            $exists = $this->getUserBookmarksByFid($uid, $fid);
            // 非文件夹可以批量保存
            $insertUrls = [];
            $replyIds = [];    // 恢复已删除标识
            foreach ($bookmarks as $bookmarkData) {
                $insertData = [];
                $md5val = isset($bookmarkData['url']) && !empty($bookmarkData['url']) ? md5($bookmarkData['url']) : md5($bookmarkData['title']);
                
                if (isset($exists[$md5val])) {
                    if ($exists[$md5val]->title != $bookmarkData['title']) {

                        $updateWhere = ['title' => $bookmarkData['title']];
                        $updateWhere['is_folder'] = isset($bookmarkData['children']) ? 1 : 0;
                        $updateWhere['childrens'] = isset($bookmarkData['children']) ? count($bookmarkData['children']) : 0;
                        $updateWhere['sortid'] = isset($bookmarkData['index']) ? $bookmarkData['index'] : 0;
                        $updateWhere['deleted_at'] = 0;
                        $updateWhere['parent_path'] = $path;   // 存父级的路径

                        DB::table(self::getTableName($uid))->where('id', $exists[$md5val]->id)
                        ->update($updateWhere);
                    } else {
                        $replyIds[] = $exists[$md5val]->id;
                    }

                    if (isset($bookmarkData['children'])) {
                        $this->syncBookmarksTree($uid, $bookmarkData['children'], $exists[$md5val]->id, $path.'-'.$exists[$md5val]->id);
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
                        'parent_path' => $path
                    ];
                    
                    // 判断是文件夹还是链接
                    if (isset($bookmarkData['children'])) {
                        $insertData['is_folder'] = 1;
                        $insertData['childrens'] = count($bookmarkData['children']);
                        $newid = DB::table(self::getTableName($uid))->insertGetId($insertData);
                        $this->syncBookmarksTree($uid, $bookmarkData['children'], $newid, $path.'-'.$newid);
                    } else {
                        $insertUrls[] = $insertData;
                    }

                }

            }

            // 查看批量插入书签链接地址
            if (!empty($insertUrls)) {
                DB::table(self::getTableName($uid))->insert($insertUrls);
            }

            // 需要恢复的ID
            if (!empty($replyIds)) {
                DB::table(self::getTableName($uid))->whereIn('id', $replyIds)->update(['deleted_at' => 0, 'parent_path' => $path]);
            }
            
        }
    }


    /**
     *  修改信息
     */
    public function updateDatasByIds($uid, $ids, $data)
    {
        return DB::table(self::getTableName($uid))->whereIn('id', $ids)->update($data);
    }


    public function getBookmarks($uid, $action)
    {
        $this->setTable(self::getLatestTable());
        $where = [['fid', '>', 1]];
        if ($action == 'folders') {
            $where[] = ['childrens', '>', 0];
        }
        if ($action == 'bookmarks') {
            $where[] = ['is_folder', 0];
        }
        return $this->orderBy('quotes', 'desc')->where($where)->paginate(50);
    }



    

}
