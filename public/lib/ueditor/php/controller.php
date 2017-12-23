<?php
//header('Access-Control-Allow-Origin: http://www.baidu.com'); //设置http://www.baidu.com允许跨域访问
//header('Access-Control-Allow-Headers: X-Requested-With,X_Requested_With'); //设置允许的跨域header
include $_SERVER['DOCUMENT_ROOT'].'/../vendor/aliyuncs/oss-sdk-php/autoload.php';
include $_SERVER['DOCUMENT_ROOT'].'/../vendor/tymon/jwt-auth/autoload.php';
date_default_timezone_set("Asia/chongqing");
error_reporting(E_ERROR);
header("Content-Type: text/html; charset=utf-8");
use Tymon\JWTAuth\Facades\JWTAuth;

try {
            // 如果用户登陆后的所有请求没有jwt的token抛出异常
    $user = JWTAuth::toUser($_GET['token']);
} catch (Exception $e) {
    if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
        return json_encode(['error'=>'Token 无效']);
    } elseif ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
        return json_encode(['error'=>'Token 已过期']);
    } else {
        return json_encode(['error'=>'出错了']);
    }
}

$CONFIG = json_decode(preg_replace("/\/\*[\s\S]+?\*\//", "", file_get_contents("config.json")), true);
$action = $_GET['action'];

switch ($action) {
    case 'config':
        $result =  json_encode($CONFIG);
        break;

    /* 上传图片 */
    case 'uploadimage':
    /* 上传涂鸦 */
    case 'uploadscrawl':
    /* 上传视频 */
    case 'uploadvideo':
    /* 上传文件 */
    case 'uploadfile':
        $result = include("action_upload.php");
        break;

    /* 列出图片 */
    case 'listimage':
        $result = include("action_list.php");
        break;
    /* 列出文件 */
    case 'listfile':
        $result = include("action_list.php");
        break;

    /* 抓取远程文件 */
    case 'catchimage':
        $result = include("action_crawler.php");
        break;

    default:
        $result = json_encode(array(
            'state'=> '请求地址出错'
        ));
        break;
}

/* 输出结果 */
if (isset($_GET["callback"])) {
    if (preg_match("/^[\w_]+$/", $_GET["callback"])) {
        echo htmlspecialchars($_GET["callback"]) . '(' . $result . ')';
    } else {
        echo json_encode(array(
            'state'=> 'callback参数不合法'
        ));
    }
} else {
    echo $result;
}