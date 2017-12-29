<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\DomCrawler\Crawler;

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
     * 获取笔记本文件内容
     */
    public function getnotebookfile(Request $request)
    {
        // 查询笔记本信息
        $notebook = (new Notebook())->getNotebookById($request->input('uid'), $request->input('id'));
        $content = '';
        if (isset($notebook->id)) {
            $active = $request->input('active');
            if (!empty($active)) {
            //     echo 'notebook/'.$notebook->id."/{$active}.html\r\n";
            //     $storage = Storage::disk('oss');
            //     $dirs = $storage->get('notebook/'.$notebook->id."/{$active}.html");
            // print_r($dirs);die;
                $content    = Storage::disk('oss')->has($notebook->uid."/notebook/{$notebook->id}/{$active}.html") ? Storage::disk('oss')->get($notebook->uid."/notebook/{$notebook->id}/{$active}.html") : '';
                // echo $content;
            }
        } else {
            self::setErrorMsg(302, '你要查找的笔记本不存在.');
        }
        return self::response($content);
    }
    
    /**
     * 编辑笔记
     */
    public function notebookShow(Request $request)
    {
        // 查询笔记本信息
        $notebook = (new Notebook())->getNotebookById($request->input('author'), $request->input('id'));
        if (isset($notebook->id) && ($notebook->open_status > 0 || $request->input('author') == $request->input('uid')) ) {
            $folders    = Storage::disk('oss')->has($notebook->uid."/notebook/{$notebook->id}/folders.json") ? Storage::disk('oss')->get($notebook->uid."/notebook/{$notebook->id}/folders.json") : '[{"text":"'.$notebook->title.'","isFolder":true,"isExpanded":true,"id":"'.$notebook->uid.'_'.$notebook->id.'","isActive":false,"children":[{"text":"首页","tooltip":"首页","href":"#_start","id":"_start","isActive":true}]}]';
            // 获取激活页ID
            $active = (new Notebook())->getNotebookTree(json_decode($folders, true));
            $active = !empty($active) ? $active : '_start';
            if (!empty($active)) {
                $content    = Storage::disk('oss')->has($notebook->uid."/notebook/{$notebook->id}/{$active}.html") ? Storage::disk('oss')->get($notebook->uid."/notebook/{$notebook->id}/{$active}.html") : '<h1>'.$notebook->title.'</h1><p>世界你好！</p>';
            }
        } else {
            self::setErrorMsg(302, '你要查找的笔记本不存在.');
            return self::response('notebook may not exist!');
        }
    
        return view('doc.showdoc', ['content' => $content, 'folders'=> $folders, 'title' => $notebook->title, 'token' => $request->input('token', ''), 'id' => $notebook->id, 'uid' => $request->input('uid') ]);
    }

    /**
     * 编辑笔记
     */
    public function notebookEdit(Request $request)
    {
        // 查询笔记本信息
        $notebook = (new Notebook())->getNotebookById($request->input('uid'), $request->input('id'));
        if (isset($notebook->id)) {
            $folders    = Storage::disk('oss')->has($notebook->uid."/notebook/{$notebook->id}/folders.json") ? Storage::disk('oss')->get($notebook->uid."/notebook/{$notebook->id}/folders.json") : '[{"text":"'.$notebook->title.'","isFolder":true,"isExpanded":true,"id":"'.$notebook->uid.'_'.$notebook->id.'","isActive":false,"children":[{"text":"首页","tooltip":"首页","href":"#_start","id":"_start","isActive":true}]}]';
            // 获取激活页ID
            $active = (new Notebook())->getNotebookTree(json_decode($folders, true));
            $active = !empty($active) ? $active : '_start';
            if (!empty($active)) {
                $content    = Storage::disk('oss')->has($notebook->uid."/notebook/{$notebook->id}/{$active}.html") ? Storage::disk('oss')->get($notebook->uid."/notebook/{$notebook->id}/{$active}.html") : '<h1>'.$notebook->title.'</h1><p>世界你好！</p>';
            }
        } else {
            self::setErrorMsg(302, '你要查找的笔记本不存在.');
            return self::response('notebook may not exist!');
        }

        return view('doc.editdoc', ['content' => $content, 'folders'=> $folders, 'active' => $active, 'token' => $request->input('token', ''), 'id' => $notebook->id, 'uid' => $request->input('uid') ]);
    }


    /**
     * 同步笔记本分类
     */
    public function syncNotebookInfo(Request $request)
    {
        // 查询笔记本信息
        $notebook = (new Notebook())->getNotebookById($request->input('uid'), $request->input('id'));
        $response = false;
        if (isset($notebook->id)) {
            if ($request->input('folderList')) {
                $response = Storage::disk('oss')->put($notebook->uid."/notebook/{$notebook->id}/folders.json", $request->input('folderList'));
            }

            if ($request->input('content') && $request->input('active')) {
//                 $crawler = new Crawler($request->input('content'));
//                 $crawler = $crawler->filter('h1');
// foreach ($crawler as $domElement)
// {
// var_dump($domElement->nodeName);
// }
// die;
                $response = Storage::disk('oss')->put($notebook->uid."/notebook/{$notebook->id}/".$request->input('active').".html", $request->input('content'));
                if ($response) {
                    // $data = [
                    //     'notebook_id' => $notebook->id,
                    //     'file_id'   => $request->input('active'),
                    //     'title' => '',
                    //     'desc'  => ''
                    // ];
                    // (new NotebookFile())->createOrUpdateNoteBookFile();
                }
            }
        } else {
            self::setErrorMsg(302, '你要查找的笔记本不存在.');
        }
        return self::response($response);
    }

    /**
     * 删除笔记本目录
     * @return [type] [description]
     */
    public function deleteNotebookTree(Request $request)
    {

    }

}