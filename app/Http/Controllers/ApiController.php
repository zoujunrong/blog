<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\models\Bookmark;
use App\models\ShareBookmark;

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

}