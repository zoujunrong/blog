<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{

    // 错误信息
    static private $errInfo = [];

    /**
     * 设置消息
     * @author  <zoujunrong@sailvan.com>
     */
    static public function setErrorMsg($code, $msg)
    {
        self::$errInfo[$code] = [$code, $msg];
    }

    /**
     * 获取所有消息
     * @author  <zoujunrong@sailvan.com>
     */
    static public function getErrorMsg()
    {
        return self::$errInfo;
    }

    /**
     * 获取最新的消息
     * @author  <zoujunrong@sailvan.com>
     */
    static public function getLatestErrorMsg()
    {
        return !empty(self::$errInfo) ? end(self::$errInfo) : [];
    }

    /**
     * 返回数据
     * @author  <zoujunrong@sailvan.com>
     */
    static public function response($data=null)
    {
        $latestMsg = empty(self::$errInfo) ? [0, '操作成功'] : end(self::$errInfo);
        $response = ['code' => $latestMsg[0], 'msg' => $latestMsg[1], 'data' => $data];
        return response()->json($response);
    }

}