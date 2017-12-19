<?php

namespace App\models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\models\Tag;

class TagMap extends Model
{
    static private $tables = [];

    public function __construct($objId=0)
    {
        if (!empty($objId)) {
            $this->table = self::getTableName($objId);
        }
    }
    
	/**
	 * 获取表名
	 * @param  folderId 文件夹ID
	 * @return tableName 表名
	 */
	static public function getTableName($objId)
	{
		$baseTable = 'tag_maps';
		$tableName = "{$baseTable}_".ceil($objId/config("model.tag_map_max_obj"));
		// 检测表是否存在，不存在时创建
		if (!isset(self::$tables[$tableName])) {
			DB::statement('CREATE TABLE IF NOT EXISTS `'.$tableName.'` LIKE `'.$baseTable.'`');
			self::$tables[$tableName] = 1;
		}
        
		return $tableName;
	}
	
	/**
	 * 获取分表
	 * @param unknown $ids
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
	 * 设置表名
	 */
	public function setTableName($objId)
	{
	    $this->setTable(self::getTableName($objId));
	}
	
	/**
	 * 设置自动维护的字段格式
	 */
	public function fromDateTime($value)
	{
	    return strtotime(parent::fromDateTime($value));
	}
	
	/**
	 * 插入标签
	 */
	public function insertTag($input)
	{
	    $tag = Tag::where('name', $input['name'])->first();
	    if (!isset($tag->id)) {
	        $tag = new Tag;
	        $tag->author = $input['uid'];
	        $tag->name = $input['name'];
	        $tag->save();
	    }
	    
	    if (isset($tag->id)) {
	        $this->setTableName($input['obj_id']);
	        $tagMap = $this->where(
	               [
	                   ['type', $input['type']],
	                   ['obj_id', $input['obj_id']],
	                   ['tag_id', $tag->id]
	               ]
	            )->first();
	        if (!isset($tagMap->id)) {
	            $this->type = $input['type'];
	            $this->tag_id = $tag->id;
	            $this->obj_id = $input['obj_id'];
	            $this->save();
	            $response = $this->id;
	            $tag->increment('uses');
	        } else {
	        	$response = $tagMap->id;
	        }
	    }
	    
	    $response = isset($response) ? $response : 0;
	    return $response;
	}
	
	/**
	 * 删除Tag
	 */
	public function deleteTag($useTagobjId, $tagMapId)
	{
	    $response = false;
	    $this->setTableName($useTagobjId);
	    $tagMap = $this->where('id', $tagMapId)->first();
	    // 删除映射
	    $tagMap->setTableName($useTagobjId);

	    if (isset($tagMap->tag_id) && $tagMap->delete()) {
	        $tag = Tag::find($tagMap->tag_id);
	        
            if ($tag->uses < 2) {
                $response = $tag->delete();
            } else {
                $response = $tag->decrement('uses');
            }
	    }
	    return $response;
	    
	}
	
	
	/**
	 * 通过批量对象ID获取标签
	 */
	public function getTagsByObjs($type, $objIds)
	{
	    $response = collect([]);
	    $tables = self::getTables($objIds);
	    if (!empty($tables)) {
	        foreach ($tables as $table => $newObjIds) {
	            $this->setTable($table);
	            $tagMaps = $this->where('type', $type)->whereIn('obj_id', $newObjIds)->get();
	            
	            if (!$tagMaps->isEmpty()) {
                    $tags = Tag::find($tagMaps->pluck('tag_id')->unique()->all())->keyBy('id');
                    
                    foreach ($tagMaps as &$tagMap) {
                        $tagMap->tag = $tags->has($tagMap->tag_id) ? $tags[$tagMap->tag_id] : [];
                    }
	            }
	            $response = $response->merge($tagMaps);
	        }
	    }
	    return $response;
	    
	}
	
	
	/**
	 * 获取所有相关的标签
	 */
	public function getUserAllTagsByType($uid, $type=null)
	{
	    $this->setTable(self::getTableName($uid));
	    $where[] = ['obj_id', $uid];
	    if (!empty($type)) {
	    	$where[] = ['type', $type];
	    }
	    $tagMaps = $this->where($where)->get()->keyBy('tag_id');

	    return Tag::whereIn('id', $tagMaps->keys()->all())->get();
	}


}
