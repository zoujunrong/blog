<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiController extends Controller
{

    /*登陆*/
    public function login(Request $request)
    {
        $input = $request->all();
        if (!$token = JWTAuth::attempt($input)) {
            return response()->json(['code'=> 40001, 'result' => '邮箱或密码错误.']);
        }
        return response()->json(['code'=> 0, 'result' => $token]);
    }

    /*获取用户信息*/
    public function get_user_details(Request $request)
    {
        $input = $request->all();
        $user = JWTAuth::toUser($input['token']);
        return response()->json(['result' => $user]);
    }

    /**
     * 同步用户bookmarks信息
     */
    public function syncBookmarks(Request $request)
    {
        $input = $request->all();
        $bookmarks = $input['bookmarks'];

    }

}