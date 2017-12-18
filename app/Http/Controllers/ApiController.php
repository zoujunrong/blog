<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

use App\User;
use App\models\Bookmark;
use App\models\ShareBookmark;
use App\models\Notebook;
use App\models\Tag;
use App\models\TagMap;

class ApiController extends CommonController
{

    /*登陆*/
    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            self::setErrorMsg(40001, '邮箱或密码错误.');
        }
        $user = JWTAuth::toUser($token);
        $user['token'] = $token;
        return self::response($user);
    }

    /*获取用户信息*/
    public function getUserDetails(Request $request)
    {
        $input = $request->all();
        $user = JWTAuth::toUser($input['token']);
        return self::response($user);
    }


    /**
     * 同步用户bookmarks信息
     */
    public function getBookmarks(Request $request) {
        $input = $request->all();
        $bookmarks = (new Bookmark())->getUserBookmarksTreeByFid($input['uid'], $input['fid'], 0);
        return self::response($bookmarks);
    }

    /**
     * 同步用户bookmarks信息
     */
    public function syncBookmarks(Request $request)
    {
        $input = $request->all();
        $input['bookmarks'] = json_decode($input['bookmarks'], true);
        if (empty($input['bookmarks'])) {
            self::setErrorMsg(4001, '未获取到书签信息');
            return self::response();
        }

        (new Bookmark())->syncBookmarksTree($input['uid'], $input['bookmarks'], 0);
        (new User())->updateBookmarktime($input['uid'], $input['updatetime']);

        return self::response();

    }

    /**
     * 分享文件夹
     */
    public function shareBookmarks(Request $request)
    {
        $input = $request->all();
        $input['bookmarks'] = json_decode($input['bookmarks'], true);

        $shareRequestDatas = $this->handleShareRequestData($input['uid'], $input['bookmarks']);
        $response = (new ShareBookmark())->insertOrUpdateDatas($input['uid'], $shareRequestDatas);
        // 此处不追求连贯性
        (new Bookmark())->updateDatasByIds($input['uid'], array_keys($shareRequestDatas), ['open_status' => 1]);

        return self::response($response);
    }

    public function handleShareRequestData($uid, $bookmarks)
    {
        $returnData = [];
        if (!empty($bookmarks)) {
            foreach ($bookmarks as $bookmark) {
                $returnData[$bookmark['id']] = [
                    'author'    => $uid,
                    'bookmark_id' => $bookmark['id']
                ];
            }
        }
        return $returnData;

    }



    /**
     * 创建笔记
     */
    public function createOrUpdateNotebook(Request $request)
    {
        // 先存储文件
        $input = $request->all();
        $result = (new Notebook())->createOrUpdateNotebook($input['uid'], $input);
        return self::response($result);
    }

    /**
     * 获取笔记
     */
    public function getNotebooks(Request $request)
    {
        $input = $request->all();
        $notebooks = (new Notebook())->getNotebooks($input['uid']);
        // 获取对应的标签信息
        $tags = (new TagMap())->getTagsByObjs('1', $notebooks->keys()->all())->groupBy('obj_id');
        $response = ['notebooks' => $notebooks, 'tags' => $tags];
        return self::response($response);
    }
    
    /**
     * 删除笔记
     */
    public function deleteNotebook(Request $request)
    {
        $response = (new Notebook())->deleteNotebook($request->input('uid'), $request->input('id'));
        return self::response($response);
    }
    
    
    /**
     * 创建标签
     */
    public function createtag(Request $request)
    {
        $response = (new TagMap())->insertTag($request->all());
        return self::response($response);
    }
    
    /**
     * 删除标签
     */
    public function deletetag(Request $request)
    {
        $response = (new TagMap())->deleteTag($request->input('obj_id'), $request->input('tag_map_id'));
        return self::response($response);
    }
    
    /**
     * 获取与我相关的所有标签
     */
    public function getAllMyTags(Request $request)
    {
        
    }
    
    

}