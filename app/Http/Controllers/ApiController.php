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
    public function shareBookmarks()
    {
        $input = $request->all();
        $input['bookmarks'] = json_decode($input['bookmarks'], true);
        $response = (new ShareBookmark())->insertOrUpdateDatas($input['uid'], $input['bookmarks']);

        return self::response($response);
    }

}