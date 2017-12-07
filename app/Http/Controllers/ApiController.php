<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\models\Folder;

class ApiController extends CommonController
{

    /*登陆*/
    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            self::setErrorMsg(40001, '邮箱或密码错误.');
        }
        return self::response($token);
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
        $folders = (new Folder())->getUserFoldersByFid($input['uid'], $input['fid']);

    }

    /**
     * 同步用户bookmarks信息
     */
    public function syncBookmarks(Request $request)
    {
        $input = $request->all();

        if (empty($input['bookmarks'])) {
            self::setErrorMsg(4001, '未获取到书签信息');
        }

        $insertRes = (new Folder())->insertFoldersAndFilesByTree($input['uid'], $input['bookmarks']);

        return self::response($insertRes);

    }

}